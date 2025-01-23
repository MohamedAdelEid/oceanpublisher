<!-- ======= Footer ======= -->
<footer id="footer" class="footer p-0">

    {{-- <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to get the new updates in your inbox!</p>
                </div>
                <div class="col-lg-6">
                    <form action="" method="post" id="ourNewsletter">
                        @csrf
                        <input type="email" name="email">
                        <input type="submit" value="Subscribe">
                    </form>
                    <div id="newsletterMessage"></div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-9 col-md-12 footer-info">
                    <a href="{{ route('/') }}" class="logo">
                        <img src="{{ $data['lookup']->logo }}" alt="">
                    </a>
                    <p class="mt-4">{{ $data['lookup']->title }}</p>
                    <div class="social-links mt-3">
                        {{-- <a href="{{ $data['lookup']->twitter }}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a> --}}
                        <a href="{{ $data['lookup']->facebook }}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $data['lookup']->instagram }}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://wa.me/{{ $data['lookup']->whatsapp }}" target="_blank" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 footer-links mt-lg-5">
                    <h4>USEFUL LINKS</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('termsAndConditions') }}">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="border"></div>
            <div class="copyright mb-5">
                &copy; Copyright <strong><span>{{ env('APP_NAME') }}</span></strong>. All Rights Reserved
            </div>
        </div>
    </div>

</footer><!-- End Footer -->

<a class="whatsapp-btn" href="https://wa.me/{{ $data['lookup']->whatsapp }}" target="_blank">
    <i class="bi bi-whatsapp"></i>
</a>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert2.min.js') }}"></script>

<!-- Template Main JS File -->
<script>
    const NEWSLETTER_ROUTE = "{{ route('storeNewsletter') }}";
    const DOWNLOAD_ROUTE = "{{ route('downloadSource') }}";
</script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
