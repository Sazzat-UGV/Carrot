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
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
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

        $('.mark_all_notification').on('click', function() {
            var url = '{{ route('mark.all') }}'
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    console.error(response);
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });
        $('.delete_notification').on('click', function(event) {
            event.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    console.log(response);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    });
</script>
@stack('script')
