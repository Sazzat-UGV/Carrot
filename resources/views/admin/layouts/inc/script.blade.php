 <!-- Required vendors -->
 <script src="{{ asset('assets/admin') }}/vendor/global/global.min.js"></script>
 <script src="{{ asset('assets/admin') }}/vendor/chart-js/chart.bundle.min.js"></script>
 <script src="{{ asset('assets/admin') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
 <script src="{{ asset('assets/admin') }}/vendor/apexchart/apexchart.js"></script>

 <!-- Dashboard 1 -->
 <script src="{{ asset('assets/admin') }}/js/dashboard/dashboard-3.js"></script>

 <!-- tagify -->
 <script src="{{ asset('assets/admin') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
 <script src="{{ asset('assets/admin') }}/vendor/datatables/js/dataTables.buttons.min.js"></script>
 <script src="{{ asset('assets/admin') }}/vendor/datatables/js/buttons.html5.min.js"></script>
 <script src="{{ asset('assets/admin') }}/vendor/datatables/js/jszip.min.js"></script>
 <script src="{{ asset('assets/admin') }}/js/plugins-init/datatables.init.js"></script>

 <!-- Apex Chart -->
 <script src="{{ asset('assets/admin') }}/vendor/bootstrap-datetimepicker/js/moment.js"></script>
 <script src="{{ asset('assets/admin') }}/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


 <!-- Vectormap -->
 <script src="{{ asset('assets/admin') }}/js/custom.min.js"></script>
 <script src="{{ asset('assets/admin') }}/js/deznav-init.js"></script>
 <script src="{{ asset('assets/admin') }}/js/demo.js"></script>
 <script src="{{ asset('assets/admin') }}/js/styleSwitcher.js"></script>

 <!-- Toastr js -->
 <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 {!! Toastr::message() !!}

 <!-- sweetalert js -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
     $(document).ready(function() {
         $('#logout').click(function(event) {
             event.preventDefault();
             var link = $(this).attr('href');
             Swal.fire({
                 title: "Are you sure?",
                 text: "",
                 icon: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#3085d6",
                 cancelButtonColor: "#d33",
                 confirmButtonText: "Yes, logout"
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = link;
                 } else {
                     Swal.fire({
                         title: "Canceled!",
                     });
                 }
             });

         });
     })
 </script>

 <!-- custom js -->
 @stack('admin_script')
