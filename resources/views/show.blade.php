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
                    <div class="col-md-8  py-3 px-3 section-bg">
                        <p>lalalaaaaa</p>
                    </div>
                    <div class="col-md-4 py-3 px-3">
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
