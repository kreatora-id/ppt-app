@php
$payment_status = \App\Models\Order::PAYMENT_STATUS;
@endphp
@extends('layouts.app')
@section('head')
    @if(config('midtrans.is_production'))
        <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
                data-client-key="{{config('midtrans.client_key')}}"></script>
    @else
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="{{config('midtrans.client_key')}}"></script>
    @endif
@endsection
@section('content')
    <main id="main" style="margin-top: 85px;">
        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container my-4">
                <div class="mb-5">
                    <h4 class="title">Pesananmu</h4>
                    <div class="icon-box">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="title">
                                <a href="{{route('order.show', ['order_number' => $order->order_number])}}">
                                    {{$order->order_number}}
                                </a>
                            </div>
                            <div class="kr-badge kr-badge-success">{{$order->payment_status}}</div>
                        </div>
                        <div class="mb-2">
                            <b>
                                <a href="{{route('slide.show', ['slug' => $order->product->slug])}}">
                                    {{$order->product->name}}
                                </a>
                            </b>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <small>Metode Pembayaran</small>
                                <div>{{$order->payment ?? '-'}}</div>
                            </div>
                            <div class="col-md-6">
                                <small>Total Pembayaran</small>
                                <div>{{Helper::numberToCurrency($order->amount)}}</div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <small>Nama Pemesan</small>
                            <div>{{$order->name}}</div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <small>Email</small>
                                <div>{{$order->email}}</div>
                            </div>
                            <div class="col-md-6">
                                <small>WhatsApp</small>
                                <div>{{$order->whatsapp}}</div>
                            </div>
                        </div>
                        <div class="mb-4 text-center">
                            @if($order->payment_status == $payment_status[2])
                                <p>Silahkan download template melalui tombol dibawah ini</p>
                                <form method="post" action="{{route('slide.download')}}">
                                    @csrf
                                    <input type="hidden" name="order_number" value="{{$order->order_number}}">
                                    <button class="kr-btn-outline-primary" type="submit">
                                        <i class="bi bi-download"></i>&nbsp;
                                        Download template
                                    </button>
                                </form>
                            @elseif($order->payment_token && $order->payment_status == $payment_status[1])
                                <p>
                                    Silahkan lakukan pembayaran melalui tombol dibawah ini.
                                    <br/>Link download template akan muncul ketika pembayaran telah berhasil
                                </p>
                                <button class="kr-btn-outline-primary" id="pay-button">Bayar</button>
                                <script type="text/javascript">
                                    let payButton = document.getElementById('pay-button');
                                    payButton.addEventListener('click', function () {
                                        snap.pay('{{$order->payment_token}}', {
                                            onSuccess: function(){window.location.reload()},
                                            onPending: function(){window.location.reload()},
                                            onError: function(){window.location.reload()},
                                            onClose: function(){
                                                console.log('customer closed the popup without finishing the payment');
                                                window.location.reload();
                                            }
                                        });
                                    });
                                </script>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Services Section -->
        @include('layouts.why_kreatora')
    </main>
@endsection
