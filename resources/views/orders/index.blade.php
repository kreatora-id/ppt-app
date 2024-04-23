@extends('layouts.app')

@section('content')
    <main id="main" style="margin-top: 85px;">
        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container my-4">
                <div class="mb-4">
                    <h4 class="title">Lihat Pesananmu</h4>
                    <form>
                        <div class="d-flex">
                            <input type="text" class="form-control" placeholder="Masukkan no. pesanan anda"
                                   name="order_number" style="margin-right: 15px;">
                            <button type="submit" class="kr-btn-outline-primary">
                                <i class="bi bi-search"></i>&nbsp;Cari
                            </button>
                        </div>
                    </form>
                </div>
                <div class="mb-5">
                    <h4 class="title">Pesananmu</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="icon-box">
                                <div class="d-flex justify-content-between">
                                    <h5 class="title">
                                        <a href="#">JH2832912</a>
                                    </h5>
                                    <div>Success</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Services Section -->
        @include('layouts.why_kreatora')
    </main>
@endsection
