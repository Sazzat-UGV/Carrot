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
<script>
    $(document).ready(function() {
        $('.quickViewModal').on('click', function() {
            let id = $(this).data('id');
            let url = "{{ route('product.quickView', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                url: url,
                dataType: "JSON",
                success: function(res) {
                    const product = res.data;
                    let imageUrl = "{{ asset('uploads/product') }}" + '/' + product
                        .thumbnail;
                    var currency = "{{ $setting->currency }}";
                    let sizeOptions = '';
                    let colorOptions = '';
                    let averageRating =
                        product.reviews_count > 0 ?
                        Math.round((product.reviews_sum_rating / product.reviews_count) *
                            10) / 10 :
                        0;

                    $('#modal_image').attr('src',
                        imageUrl);
                    $('#modal_product_name').text(
                        product.name);
                    $('#modal_product_description').text(product
                        .short_description);
                    let ratingStars = '';

                    for (let i = 1; i <= 5; i++) {
                        if (i <= Math.floor(averageRating)) {
                            ratingStars += '<i class="ri-star-fill"></i>';
                        } else if (i === Math.ceil(averageRating) && averageRating - Math
                            .floor(averageRating) > 0) {
                            ratingStars += '<i class="ri-star-half-line"></i>';
                        } else {
                            ratingStars += '<i class="ri-star-line"></i>';
                        }
                    }
                    $('#modal_product_rating').html(ratingStars);


                    $('#modal_reviewCount').text(`(${product.reviews_count} Review)`);
                    $('#modal_product_selling_price').text(currency +
                        product.selling_price);
                    if (product.discount_price) {
                        $('#modal_product_discount_price').text(
                            currency +
                            product.discount_price);
                    }
                    if (product.size && Array.isArray(product.size)) {
                        product.size.forEach(function(size) {
                            sizeOptions += '<li>' + size.value +
                                '</li>';
                        });
                        $('#sizeText').text('Size :');
                        $('#sizeOptions').html(sizeOptions);

                    }
                    if (product.color && Array.isArray(product.color)) {
                        product.color.forEach(function(color) {
                            colorOptions += '<li>' + color.value +
                                '</li>';
                            });
                            $('#colorText').text('Color :');
                        $('#colorOptions').html(colorOptions);
                    }


                    $('#quickview').modal('show');
                },
                error: function(err) {
                    alert('Error loading product details.');
                }
            });
        });
    });
</script>
@stack('script')
