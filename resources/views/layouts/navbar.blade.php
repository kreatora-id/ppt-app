<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <!--<h1 class="logo"><a href="/">Kreatora</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        {{--      update home link--}}
        <a href="/" class="logo"><img src="{{asset('/assets_homepage/img/logo_kreatora.png')}}" alt="" class="img-fluid"></a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto {{\Request::route()->getName() == 'home' ? 'active' : ''}}" href="/">Home</a></li>
                <li>
                    <a class="nav-link scrollto {{\Request::route()->getName() == 'order.index' ? 'active' : ''}}"
                       href="{{route('order.index')}}">Pesananmu</a>
                </li>
{{--                <li><a class="nav-link scrollto " href="/blog">Blog</a></li>--}}
{{--                <li><a class="getstarted scrollto" href="/campaign">App Kreatora</a></li>--}}
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
<!-- End Header -->
