<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = [];
        $message = '';
        $is_send_code = false;
        if ($request->filled('search')) {
            if (filter_var($request->search, FILTER_VALIDATE_EMAIL) && false) {
                // using email
                $order = Order::query()->select(['id', 'order_number', 'email'])
                    ->where('email', $request->search)->first();
                // check is email has orderan
                if ($order) {
                    $is_send_code = true;
                    if ($request->filled('code')) {
                        $orders = Order::query()->where('email', $request->search)
                            ->with('product:id,name,slug')->orderByDesc('id')->get();
                    }
                } else {
                    $message =  'Pesanan dengan email '.$request->search.' tidak ditemukan';
                }
            } else {
                // using order number
                $order = Order::query()->select(['id', 'order_number'])
                    ->where('order_number', $request->search)->first();
                if ($order) {
                    return response()->redirectToRoute('order.show', ['order_number' => $order->order_number]);
                } else {
                    $message =  'Pesanan dengan nomor '.$request->search.' tidak ditemukan';
                }
            }
        }
        return response()->view('orders.index', [
            'orders' => $orders,
            'message' => $message,
            'is_send_code' => $is_send_code,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_number)
    {
        $order = Order::query()->where('order_number', $order_number)->with('product:id,name,slug')
            ->first();
        if (!$order) abort(404);
        return response()->view('orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function callback(Request $request)
    {
        $update = [];
        $message = 'Order id or signature key not found';
        if ($request->filled('order_id') && $request->filled('signature_key')) {
            $update = Order::query()->where('order_number', $request->order_id)->first();
            $message = 'Order record not found';
            if ($update) {
                $signature_key = hash('sha512', ($update->order_number . $update->status_code . $update->amount . config('midtrans.server_key')));
                if ($request->signature_key == $signature_key) {
                    $midtrans_tr_status = Order::MIDTRANS_TR_STATUS;
                    $midtrans_payment = Order::MIDTRANS_PAYMENT;
                    $payment_status = Order::PAYMENT_STATUS;
                    $payment = Order::PAYMENT;
                    if ($request->transaction_status == $midtrans_tr_status[0] || $request->transaction_status == $midtrans_tr_status[1])
                        $update->payment_status = $payment_status[2];
                    if ($request->payment_type == $midtrans_payment[1]) $update->payment = $payment[1];
                    elseif ($request->payment_type == $midtrans_payment[2]) $update->payment = $payment[2];
                    else $update->payment = $payment[0];
                    $update->save();
                    $message = 'Success update status';
                    return response()->json([
                        'status' => 'success',
                        'message' => $message,
                        'update' => $update,
                    ])->setStatusCode(200);
                }
                $message = 'Signature not match';
            }
        }
        return response()->json([
            'status' => 'fail',
            'message' => $message,
            'update' => $update,
        ])->setStatusCode(400);
    }

    public function redirect_finish(Request $request)
    {
        if ($request->filled('order_id')) {
            $order = Order::query()->where('order_number', $request->order_id)->first();
            if ($order) {
                return redirect()->route('order.show', ['order_number' => $order->order_number]);
            }
        }
        return redirect()->route('order.index');
    }
}
