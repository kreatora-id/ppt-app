@extends('layouts.app')

@section('content')
    <!-- ======= Hero Section ======= -->
{{--    <section id="hero" class="d-flex align-items-center section-bg">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 pt-3 pt-lg-0 d-flex flex-column justify-content-center">--}}
{{--                    lalaaa--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section><!-- End Hero -->--}}

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
                                @if($detail->images && count(json_decode($detail->images)))
                                    <img src="{{asset('storage/'.json_decode($detail->images)[0])}}"
                                         class="img-fluid rounded mx-auto d-block">
                                @else
                                    <i class="bx bxs-file-archive"></i>
                                @endif
                            </div>
                            <div class="title" style="font-size: 26px;">
                                <a href="{{route('home.show', ['slug' => $detail->slug])}}">{{$detail->name}}</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-purchase-tag-alt" style="margin-right: 10px; font-size: 28px"></i>
                                <span style="font-size: 20px; text-decoration: line-through">Rp. 400000</span>
                            </div>
                            <p class="description">
                                {!! $detail->description !!}
                            </p>
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
