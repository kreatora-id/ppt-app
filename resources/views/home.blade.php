@php
    function tagActive($params, $value): string {
        $tags = explode(',', $params);
        if (in_array($value, $tags)) return 'active';
        else return '';
    }
    function convertTags($params, $value): string {
        $tags = explode(',', $params);
        if (($key = array_search($value, $tags)) !== false) unset($tags[$key]);
        else $tags[] = $value;
        return implode(',', $tags);
    }
    function searchResult($search = '', $type = '', $tags = ''): string {
        $tags = explode(',', $tags);
        $arr = [$search, $type];
        return implode(', ', array_filter(array_merge($arr, $tags)));
    }
@endphp

@extends('layouts.app')

@section('content')
    <!-- ======= Hero Section ======= -->
    <div id="hero" class="d-flex align-items-center section-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 pt-3 pt-lg-0 d-flex flex-column justify-content-center">
                    <h1>Download template PowerPoint atau Google Slides gratis dan premium pasti disini</h1>
                    <div class="position-relative my-3">
                        <form>
                            <input type="hidden" name="type" value="{{app('request')->input('type')}}">
                            <input type="hidden" name="tags" value="{{app('request')->input('tags')}}">
                            <input type="text" placeholder="Cari template" class="form-control" name="search"
                                   value="{{app('request')->input('search')}}">
                            <button type="submit" class="btn btn-sm btn-link position-absolute" style="right: 6px; top: 0;">
                                <i class="bi bi-search" style="font-size: 20px"></i>
                            </button>
                        </form>
                    </div>
                    <div class="my-2">
                        <label>Tipe Template:</label>
                        <div class="d-flex mt-1">
                            <a href="{{route('home.index', [
                                    'search' => app('request')->input('search'),
                                    'type' => 'free',
                                    'tags' => app('request')->input('tags'),
                                ])}}"
                               class="kr-btn-outline-primary {{ app('request')->input('type') == 'free' ? 'active' : '' }}"
                            >
                                <i class="bi bi-cloudy-fill" style="margin-right: 2px;"></i>
                                Gratis
                            </a>
                            <a href="{{route('home.index', [
                                    'search' => app('request')->input('search'),
                                    'type' => 'premium',
                                    'tags' => app('request')->input('tags'),
                                ])}}"
                               class="kr-btn-outline-primary {{ app('request')->input('type') == 'premium' ? 'active' : '' }}"
                            >
                                <i class="bx bxs-crown" style="margin-right: 2px;"></i>
                                Premium
                            </a>
                        </div>
                    </div>
                    <div class="my-2">
                        <label>Cari berdasarkan tag:</label>
                        <div class="d-flex overflow-auto mt-1 pb-2">
                            @foreach($tag_options as $top)
                                <a class="kr-btn-outline-primary {{ tagActive(app('request')->input('tags'), $top) }}"
                                   href="{{route('home.index', [
                                        'search' => app('request')->input('search'),
                                        'type' => app('request')->input('type'),
                                        'tags' => convertTags(app('request')->input('tags'), $top),
                                    ])}}"
                                >{{$top}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Hero -->

    <main id="main">
        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container my-4">
                @if(app('request')->input('search') || app('request')->input('type') || app('request')->input('tags'))
                    <div class="mb-4">
                        <label class="mb-1">Hasil pencarian untuk:</label>
                        <div class="title">{{searchResult(app('request')->input('search'), app('request')->input('type'), app('request')->input('tags'))}}</div>
                    </div>
                @endif
                <div class="row mb-2">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="{{route('home.show', ['slug' => $product->slug])}}">
                                <div class="icon-box">
                                    <div class="icon position-relative">
                                        @if($product->type == 'Premium')
                                            <i class="bx bxs-crown position-absolute"
                                               style="top:10px; right: 10px; font-size: 32px"
                                            ></i>
                                        @endif
                                        @if($product->images && count(json_decode($product->images)))
                                            <img src="{{asset('storage/'.json_decode($product->images)[0])}}"
                                                 class="img-fluid rounded mx-auto d-block">
                                        @else
                                            <i class="bx bxs-file-archive"></i>
                                        @endif
                                    </div>
                                    <h4 class="title">
                                        <a href="{{route('home.show', ['slug' => $product->slug])}}">{{$product->name}}</a>
                                    </h4>
                                    <p class="description">
                                        {{str_limit(strip_tags($product->description), $limit = 150, $end = '...')}}
                                    </p>
                                    @if($product->tags && count(json_decode($product->tags)))
                                        <div>
                                            <i class="bx bx-tag bx-rotate-180" style="margin-right: 5px"></i>
                                            {{implode(', ', json_decode($product->tags))}}
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $products->appends([
                        'search' => app('request')->input('search'),
                        'type' => app('request')->input('type'),
                        'tags' => app('request')->input('tags')
                    ])->links() }}
                </div>
            </div>
        </section>
        <!-- End Featured Services Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="section-title">
                    <span>Kenapa Kreatora?</span>
                    <h2>Kenapa Kreatora?</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
                            <h4><a href="">Transparan</a></h4>
                            <p>Pantau proses pengembangan dari pembuatan hingga game bisa di rilis</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-controller"></i></div>
                            <h4><a href="">Eksklusif</a></h4>
                            <p>Temukan game eksklusif yang belum pernah kamu lihat sebelumnya</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-wallet"></i></div>
                            <h4><a href="">Jaminan uang kembali</a></h4>
                            <p>Jaminan uang kembali jika game yang kamu dukung tidak memenuhi target campaign</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->
    </main>
    <!-- End #main -->
@endsection
