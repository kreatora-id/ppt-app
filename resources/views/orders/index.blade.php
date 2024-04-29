@extends('layouts.app')

@section('content')
    <main id="main" style="margin-top: 85px;">
        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container my-4">
                <div class="mb-4">
                    <h4 class="title">Lihat Pesananmu</h4>
                    <form method="post" action="{{route('order.search')}}">
                        @csrf
                        <div class="row mb-3">
                            @if($is_send_code)
                                <div class="col-md-5 mb-2">
                                    <input type="text" class="form-control" placeholder="Masukkan no. pesanan anda"
                                           name="search" style="margin-right: 15px;"
                                           value="{{app('request')->input('search')}}"}}>
                                </div>
                                <div class="col-md-5 mb-2">
                                    <input type="text" class="form-control" placeholder="Masukkan kode verifikasi"
                                           name="code" style="margin-right: 15px;" value="{{app('request')->input('code')}}">
                                </div>
                            @else
                                <div class="col-md-10 mb-2">
                                    <input type="text" class="form-control" placeholder="Masukkan no. pesanan anda"
                                           name="search" style="margin-right: 15px;" value="{{app('request')->input('search')}}">
                                </div>
                            @endif
                            <div class="col-md-2 mb-2">
                                <button type="submit" class="kr-btn-outline-primary w-100">
                                    <i class="bi bi-search"></i>&nbsp;Cari
                                </button>
                            </div>
                        </div>
                        @if($is_send_code && !app('request')->input('code'))
                        <div class="alert alert-warning" role="alert">
                            <small>Kami telah mengirimkan kode verifikasi ke email {{app('request')->input('search')}}.&nbsp;
                                Jika belum menerima silahkan <a href="#">kirim ulang</a></small>
                        </div>
                        @endif
                    </form>
                </div>
                @if($message)
                <div class="text-center" style="margin-top: 75px; margin-bottom: 75px;">
                    <div class="title">{{$message}}</div>
                </div>
                @endif
                @if($orders && $orders->count())
                <div class="mb-5">
                    <h4 class="title">Pesananmu</h4>
                    <div class="row">
                        @foreach($orders as $order)
                        <div class="col-md-6 mb-4">
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
                                        <a href="{{route('slide.show', ['slug' => $order->product->slug])}}"
                                           target="_blank">
                                            {{$order->product->name}}
                                        </a>
                                    </b>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <small>Metode Pembayaran</small>
                                        <div>{{$order->payment}}</div>
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
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <small>Email</small>
                                        <div>{{$order->email}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <small>WhatsApp</small>
                                        <div>{{$order->whatsapp}}</div>
                                    </div>
                                </div>
                                <div class="mb-2" style="text-align: right;">
                                    <a href="{{route('order.show', ['order_number' => $order->order_number])}}">
                                        Detail...
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </section>
        <!-- End Featured Services Section -->
        @include('layouts.why_kreatora')
    </main>
@endsection
