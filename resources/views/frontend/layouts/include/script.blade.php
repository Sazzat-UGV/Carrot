<!-- Vendor Custom -->
<script src="{{ asset('assets/frontend') }}/js/vendor/jquery-3.6.4.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/jquery.zoom.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/mixitup.min.js"></script>

<script src="{{ asset('assets/frontend') }}/js/vendor/range-slider.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/aos.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/slick.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/owl.carousel.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/vendor/countdownTimer.js"></script>

<!-- Main Custom -->
<script src="{{ asset('assets/frontend') }}/js/main.js"></script>
<script src="{{ asset('assets/frontend') }}/js/demo-2.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Logout confirmation-->
<script>
    $(document).ready(function() {
        $('.logout').on('submit', function(event) {
            event.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#64B496",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, logout!"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@stack('script')
