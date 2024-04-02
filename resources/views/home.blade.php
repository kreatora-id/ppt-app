@extends('layouts.app')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center section-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 pt-3 pt-lg-0 d-flex flex-column justify-content-center">
                    <h1>Download template PowerPoint atau Google Slides gratis dan premium pasti disini</h1>
                    <div class="position-relative my-3">
                        <input type="text" placeholder="Cari template" class="form-control">
                        <button class="btn btn-sm btn-link position-absolute" style="right: 6px; top: 0;">
                            <i class="bi bi-search" style="font-size: 20px"></i>
                        </button>
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
                            <a  href="{{route('home.index', ['type' => 'premium'])}}"
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
                            <button class="kr-btn-outline-primary active">Bisnis</button>
                            <button class="kr-btn-outline-primary">Edukasi</button>
                            <button class="kr-btn-outline-primary">Komputer</button>
                            <button class="kr-btn-outline-primary">Chart</button>
                            <button class="kr-btn-outline-primary active">Bisnis</button>
                            <button class="kr-btn-outline-primary">Edukasi</button>
                            <button class="kr-btn-outline-primary">Komputer</button>
                            <button class="kr-btn-outline-primary">Chart</button>
                            <button class="kr-btn-outline-primary active">Bisnis</button>
                            <button class="kr-btn-outline-primary">Edukasi</button>
                            <button class="kr-btn-outline-primary">Komputer</button>
                            <button class="kr-btn-outline-primary">Chart</button>
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
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-laptop"></i></div>
                            <h4 class="title"><a href="">Dapatkan exposure</a></h4>
                            <p class="description">Tunjukkan hasil game terbaikmu dan dapatkan perhatian</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-card-checklist"></i></div>
                            <h4 class="title"><a href="">Validasi ketertarikan gamer</a></h4>
                            <p class="description">Dapatkan feedback dari gamer untuk membuat game yang menarik hati sehingga akan
                                pasti laku jika kamu merilisnya</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-clipboard-data"></i></div>
                            <h4 class="title"><a href="">Berikan dukungan untuk game favoritmu</a></h4>
                            <p class="description">Ikutlah berpartisipasi dan dukung game creator dalam negeri untuk membuat game yang
                                benar-benar kamu inginkan</p>
                        </div>
                    </div>
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
                  <a href="{{asset('/assets_homepage/img/portfolio/portfolio-1.jpg')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{asset('/assets_homepage/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <a href="{{asset('/assets_homepage/img/portfolio/portfolio-2.jpg')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{asset('/assets_homepage/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 2</h4>
                  <p>App</p>
                  <a href="{{asset('/assets_homepage/img/portfolio/portfolio-3.jpg')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="{{asset('/assets_homepage/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 2</h4>
                  <p>Card</p>
                  <a href="{{asset('/assets_homepage/img/portfolio/portfolio-4.jpg')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{asset('/assets_homepage/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 2</h4>
                  <p>Web</p>
                  <a href="{{asset('/assets_homepage/img/portfolio/portfolio-5.jpg')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{asset('/assets_homepage/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 3</h4>
                  <p>App</p>
                  <a href="{{asset('/assets_homepage/img/portfolio/portfolio-6.jpg')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="{{asset('/assets_homepage/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 1</h4>
                  <p>Card</p>
                  <a href="{{asset('/assets_homepage/img/portfolio/portfolio-7.jpg')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="{{asset('/assets_homepage/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 3</h4>
                  <p>Card</p>
                  <a href="{{asset('/assets_homepage/img/portfolio/portfolio-8.jpg')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{asset('/assets_homepage/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <a href="{{asset('/assets_homepage/img/portfolio/portfolio-9.jpg')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Portfolio Section -->
    </main>
    <!-- End #main -->
@endsection
