<script src="{{ asset('assets/backend') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/libs/hammer/hammer.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/libs/i18n/i18n.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/js/menu.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{ asset('assets/backend') }}/js/main.js"></script>
<script src="{{ asset('assets/backend') }}/js/dashboards-analytics.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Logout confirmation-->
<script>
    $(document).ready(function() {
        $('#logout').on('submit', function(event) {
            event.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
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
