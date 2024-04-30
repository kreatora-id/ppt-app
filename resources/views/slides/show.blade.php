@extends('layouts.app')

@section('head')
    <style>
        iframe {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <main id="main" style="margin-top: 85px;">
        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container my-4">
                <div class="row mb-2">
                    <div class="col-lg-9 mb-5">
                        <div class="icon-box">
                            <div class="icon position-relative">
                                @if($detail->type == 'Premium')
                                    <i class="bi bi-patch-check-fill position-absolute fontSize32" style="top:10px; right: 10px;"></i>
                                @endif
                                @if($detail->embed)
                                    <div>
                                        {!! $detail->embed !!}
                                    </div>
                                @elseif($detail->images && count(json_decode($detail->images)))
                                    <div id="carouselTemplateImage" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach(json_decode($detail->images) as $key => $image)
                                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                                    <img class="d-block w-100" src="{{asset('storage/'.$image)}}"
                                                        alt="Image {{$key+1}}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTemplateImage" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselTemplateImage" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <i class="bx bxs-file-archive"></i>
                                @endif
                            </div>
                            <div class="title fontSize24">
                                <a href="{{route('slide.show', ['slug' => $detail->slug])}}">{{$detail->name}}</a>
                            </div>
                            @if($detail->regular_price)
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bx bx-purchase-tag-alt fontSize28" style="margin-right: 10px;"></i>
                                    <span class="fontSize24" style="text-decoration: line-through">
                                        {{Helper::numberToCurrency($detail->regular_price)}}
                                    </span>
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul style="margin-bottom: 0;">
                                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                                    </ul>
                                </div>
                            @endif
                            <button class="kr-btn-outline-primary w-100 fontSize18" type="button" data-bs-toggle="modal"
                                    data-bs-target="#modalCheckoutTemplate">
                                Dapatkan {{$detail->price ? 'hanya '.Helper::numberToCurrency($detail->price) : 'secara Gratis'}}
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
                    <div class="col-lg-3 py-3 px-3">
                        <h5 class="title">Template lainnya</h5>
                        @foreach($others as $other)
                            <div class="mb-4">
                                <div class="icon-box">
                                    <div class="icon position-relative">
                                        @if($other->type == 'Premium')
                                            <i class="bi bi-patch-check-fill position-absolute"
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
                                        <a href="{{route('slide.show', ['slug' => $other->slug])}}">{{$other->name}}</a>
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
    <!-- Modal -->
    <div class="modal fade" id="modalCheckoutTemplate" tabindex="-1" role="dialog" aria-labelledby="modalCheckoutTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalCheckoutTitle">
                        Dapatkan {{$detail->name}} {{$detail->price ? 'hanya '.Helper::numberToCurrency($detail->price) : 'secara Gratis'}}
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="orderTemplate" method="post" action="{{route('slide.checkout')}}">
                        @csrf
                        <div class="form-text mb-3">
                            Lengkapi data dibawah ini untuk melanjutkan <br/>
                            *Gunakan email aktif karena kami akan mengirimkan kode verifikasi
                        </div>
                        <div class="row">
                            <input type="hidden" name="slug" value="{{$detail->slug}}">
                            <div class="col-12 mb-2">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label for="whatsapp" class="form-label">No Whatsapp</label>
                                <input type="tel" class="form-control" id="whatsapp" name="whatsapp" required>
                            </div>
                            {!! RecaptchaV3::field('register') !!}
{{--                            <div class="col-12 mb-2">--}}
{{--                                <label for="payment" class="form-label">Pembayaran</label>--}}
{{--                                <select class="form-select" name="payment" required>--}}
{{--                                    @if($detail->price)--}}
{{--                                        @foreach($payments as $payment)--}}
{{--                                            <option value="{{$payment}}" {{$loop->first ? 'selected' : ''}}>{{$payment}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    @else--}}
{{--                                        <option value="Gratis" selected>Gratis</option>--}}
{{--                                    @endif--}}
{{--                                </select>--}}
{{--                            </div>--}}
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="w-100 mb-4">
                        <button type="submit" class="kr-btn-outline-primary w-100" form="orderTemplate">
                            Checkout {{$detail->price ? Helper::numberToCurrency($detail->price) : 'Gratis'}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.querySelectorAll(".punch-viewer-navbar-logo").forEach(el => el.remove());
    </script>
@endsection
