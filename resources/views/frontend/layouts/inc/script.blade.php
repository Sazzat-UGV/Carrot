<!-- Vendor Custom -->
<script src="{{ asset('assets/frontend') }}/js/vendor/jquery-3.6.4.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/jquery.zoom.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/mixitup.min.js"></script>

<script src="{{ asset('assets/frontend') }}/js/vendor/range-slider.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/aos.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/slick.min.js"></script>

<!-- Main Custom -->
<script src="{{ asset('assets/frontend') }}/js/main.js"></script>

<!-- Toastr js -->
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<!-- sweetalert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- custom js -->
@stack('frontend_script')
