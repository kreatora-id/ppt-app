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

        dd($order->toArray());
    }
}
