@php
    $formatter_number = new NumberFormatter('id_ID',  NumberFormatter::CURRENCY);
@endphp

@extends('layouts.app')

@section('content')
    <main id="main" style="margin-top: 85px;">
        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container my-4">
                <div class="row mb-2">
                    <div class="col-md-9 mb-5">
                        <div class="icon-box">
                            <div class="icon position-relative">
                                @if($detail->type == 'Premium')
                                    <i class="bx bxs-crown position-absolute"
                                       style="top:10px; right: 10px; font-size: 32px"
                                    ></i>
                                @endif
                                @if($detail->embed)
                                    <div>
                                        {!! $detail->embed !!}
                                    </div>
                                @elseif($detail->images && count(json_decode($detail->images)))
                                    <img src="{{asset('storage/'.json_decode($detail->images)[0])}}"
                                         class="img-fluid rounded mx-auto d-block">
                                @else
                                    <i class="bx bxs-file-archive"></i>
                                @endif
                            </div>
                            <div class="title fontSize24">
                                <a href="{{route('home.show', ['slug' => $detail->slug])}}">{{$detail->name}}</a>
                            </div>
                            @if($detail->regular_price)
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bx bx-purchase-tag-alt fontSize28" style="margin-right: 10px;"></i>
                                    <span class="fontSize24" style="text-decoration: line-through">
                                        {{$formatter_number->formatCurrency($detail->regular_price, 'IDR')}}
                                    </span>
                                </div>
                            @endif
                            <button class="kr-btn-outline-primary w-100 fontSize18">
                                Dapatkan {{$detail->price ? 'hanya '.$formatter_number->formatCurrency($detail->price, 'IDR') : 'secara Gratis'}}
                            </button>
                            <div class="my-5">
                                {!! $detail->description !!}
                            </div>
                            @if($detail->faq)
                                <div class="my-5">
                                    <h4 class="title">FAQ:</h4>
                                    {!! $detail->faq !!}
                                </div>
                            @endif
                            @if($detail->tags && count(json_decode($detail->tags)))
                                <div>
                                    <i class="bx bx-tag bx-rotate-180" style="margin-right: 5px"></i>
                                    {{implode(', ', json_decode($detail->tags))}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 py-3 px-3">
                        <h5 class="title">Template lainnya</h5>
                        @foreach($others as $other)
                            <div class="mb-4">
                                <div class="icon-box">
                                    <div class="icon position-relative">
                                        @if($other->type == 'Premium')
                                            <i class="bx bxs-crown position-absolute"
                                               style="top:10px; right: 10px; font-size: 32px"
                                            ></i>
                                        @endif
                                        @if($other->images && count(json_decode($other->images)))
                                            <img src="{{asset('storage/'.json_decode($other->images)[0])}}"
                                                 class="img-fluid rounded mx-auto d-block">
                                        @else
                                            <i class="bx bxs-file-archive"></i>
                                        @endif
                                    </div>
                                    <h4 class="title">
                                        <a href="{{route('home.show', ['slug' => $other->slug])}}">{{$other->name}}</a>
                                    </h4>
                                    <p class="description">
                                        {{str_limit(strip_tags($other->description), $limit = 150, $end = '...')}}
                                    </p>
                                    @if($other->tags && count(json_decode($other->tags)))
                                        <div>
                                            <i class="bx bx-tag bx-rotate-180" style="margin-right: 5px"></i>
                                            {{implode(', ', json_decode($other->tags))}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Services Section -->
    </main>
    <!-- End #main -->
@endsection
