<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>Kreatora</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/enno-free-simple-bootstrap-template/ -->
            {{--        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>--}}
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
{{--<script src="{{asset('/assets_homepage/vendor/purecounter/purecounter.js')}}"></script>--}}
<script src="{{asset('/assets_homepage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{--<script src="{{asset('/assets_homepage/vendor/glightbox/js/glightbox.min.js')}}"></script>--}}
{{--<script src="{{asset('/assets_homepage/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>--}}
<script src="{{asset('/assets_homepage/vendor/swiper/swiper-bundle.min.js')}}"></script>
{{--<script src="{{asset('/assets_homepage/vendor/php-email-form/validate.js')}}"></script>--}}

<!-- Template Main JS File -->
<script src="{{asset('/assets_homepage/js/main.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-240985797-1"></script>--}}
{{--<script>--}}
{{--    window.dataLayer = window.dataLayer || [];--}}
{{--    function gtag(){dataLayer.push(arguments);}--}}
{{--    gtag('js', new Date());--}}
{{--    gtag('config', 'UA-240985797-1');--}}
{{--</script>--}}
@yield('script')
