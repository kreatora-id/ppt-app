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
            if (filter_var($request->search, FILTER_VALIDATE_EMAIL)) {
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
}
