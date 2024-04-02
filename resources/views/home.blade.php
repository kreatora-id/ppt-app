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
    <section id="hero" class="d-flex align-items-center section-bg">
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
                            <a href="{{route('home.index', ['type' => 'free'])}}"
                               class="kr-btn-outline-primary {{ app('request')->input('type') == 'free' ? 'active' : '' }}"
                            >
                                <i class="bi bi-cloudy-fill" style="margin-right: 2px;"></i>
                                Gratis
                            </a>
                            <a href="{{route('home.index', ['type' => 'premium'])}}"
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
                                        'tags' => convertTags(app('request')->input('tags'), $top)
                                    ])}}"
                                >{{$top}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

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
                <div class="row mb-5">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="icon-box">
                                @if(count(json_decode($product->images)))
                                    <div class="icon">
                                        <img src="{{asset('storage/'.json_decode($product->images)[0])}}"
                                             class="img-fluid rounded mx-auto d-block">
                                    </div>
                                @endif
                                <h4 class="title">
                                    <a href="{{route('home.show', ['slug' => $product->slug])}}">{{$product->name}}</a>
                                </h4>
                                <p class="description">
                                    {{str_limit(strip_tags($product->description), $limit = 150, $end = '...')}}
                                </p>
                            </div>
                        </div>
                    @endforeach
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

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-title">
                    <span>Portfolio</span>
                    <h2>Portfolio</h2>
                    <p>Karya yang sudah rilis</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{asset('/assets_homepage/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <a href="{{asset('/assets_homepage/img/portfolio/portfolio-1.jpg')}}"
                               data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <img src="{{asset('/assets_homepage/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="{{asset('/assets_homepage/img/portfolio/portfolio-2.jpg')}}"
                               data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{asset('/assets_homepage/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                            <a href="{{asset('/assets_homepage/img/portfolio/portfolio-3.jpg')}}"
                               data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <img src="{{asset('/assets_homepage/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <a href="{{asset('/assets_homepage/img/portfolio/portfolio-4.jpg')}}"
                               data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <img src="{{asset('/assets_homepage/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <a href="{{asset('/assets_homepage/img/portfolio/portfolio-5.jpg')}}"
                               data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{asset('/assets_homepage/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                            <a href="{{asset('/assets_homepage/img/portfolio/portfolio-6.jpg')}}"
                               data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <img src="{{asset('/assets_homepage/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                            <a href="{{asset('/assets_homepage/img/portfolio/portfolio-7.jpg')}}"
                               data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <img src="{{asset('/assets_homepage/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                            <a href="{{asset('/assets_homepage/img/portfolio/portfolio-8.jpg')}}"
                               data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <img src="{{asset('/assets_homepage/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="{{asset('/assets_homepage/img/portfolio/portfolio-9.jpg')}}"
                               data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->
    </main>
    <!-- End #main -->
@endsection
