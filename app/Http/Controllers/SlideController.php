<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use TCG\Voyager\Models\DataRow;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        $tag_options = DataRow::query()->select('details')->where('field', 'tags')->first();
        $tag_options = $tag_options && $tag_options->details && $tag_options->details->options ? $tag_options->details->options : [];

        $products = Product::query()->select(['name', 'description', 'tags', 'type', 'slug', 'images']);
        if ($request->filled('search')) {
            $products = $products->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('type'))
            $products = $products->where('type', $request->type);
        if ($request->filled('tags')) {
            $tags = array_flatten(array_filter(explode(',', $request->tags)));
            $products = $products->whereJsonContains('tags', $tags[0]);
            for($i = 1; $i < count($tags); $i++) {
                $products = $products->orWhereJsonContains('tags', $tags[$i]);
            }
        }
        $products = $products
            ->paginate(9, '*', 'page', $request->filled('page') ? $request->page : 1);

        return view('slides.index', [
            'tag_options' => $tag_options,
            'products' => $products
        ]);
    }

    public function show($slug)
    {
        $detail = Product::query()->where('slug', $slug)->first();
        if (!$detail) abort(404);
        $others = Product::query()->select(['name', 'description', 'tags', 'type', 'slug', 'images'])->limit(3)->get();
        return view('slides.show', [
            'detail' => $detail,
            'others' => $others,
            'payments' => Order::PAYMENT
        ]);
    }

    public function checkout(Request $request)
    {
        $payment = Order::PAYMENT;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:255',
            'payment' => 'required|string|in:'.implode($payment, ',').',Gratis',
            'slug' => 'required|string|max:255',
        ]);

        $product = Product::query()->select(['id', 'slug', 'price'])->where('slug', $request->slug)->first();
        if (!$product) return redirect()->back();
        $payment_status = Order::PAYMENT_STATUS;

        $order = new Order();
        $order->product_id = $product->id;
        $order->amount = $product->price;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->whatsapp = $request->whatsapp;
        $order->payment = $request->payment;
        $order->payment_status = $product->price ? $payment_status[1] : $payment_status[2];
        $order->save();

        $client = new Client();
        $is_production = config('midtrans.is_production');
        $url_production = 'https://app.midtrans.com';
        $url_sandbox = 'https://app.sandbox.midtrans.com';
        $codeServer = base64_encode(config('midtrans.server_key').":");
        $payload = array(
            'transaction_details' => array(
                'order_id' => $order->order_number,
                'gross_amount' => $order->amount,
            )
        );
        $res = $client->request('POST',($is_production ? $url_production : $url_sandbox).'/snap/v1/transactions', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . $codeServer,
                'X-Override-Notification' => 'kreatora.id, kreatora.id',
            ],
            'json' => $payload
        ]);
        $res_content = json_decode($res->getBody()->getContents());
        dd($res_content);

        return response()->redirectToRoute('order.show', ['order_number' => $order->order_number]);
    }

    public function download(Request $request)
    {
        if (!$request->filled('order_number')) return redirect()->back();
        $order = Order::query()->select(['id', 'product_id', 'order_number'])
            ->where([
                'order_number' => $request->order_number,
                'payment_status' => Order::PAYMENT_STATUS[2],
            ])
            ->with('product:id,file,slug')->first();
        if ($order && $order->product && $order->product->file) {
            $files = json_decode($order->product->file);
            $file = $files[0]->download_link;
            $formats = explode('.', $file);
            return response()->download(
                storage_path('app/public/'. $file), $order->product->slug.'.'.end($formats)
            );
        }
        return redirect()->back();
    }
}
