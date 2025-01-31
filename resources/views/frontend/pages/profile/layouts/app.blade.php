@extends('frontend.layouts.app')

@section('title')
    {{ $title }}
@endsection

@push('style')
    <style>
        input.cr-form-control,
        input.form-control {
            margin-bottom: 0 !important;
        }

        .invalid-feedback {
            font-size: 13px !important;
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => $title])
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">
            <div class="row">
                @include('frontend.pages.profile.layouts.inc.sidebar')
                <div class="cr-checkout-leftside col-12 col-md-8 col-lg-9  m-t-991">
                    <!-- checkout content Start -->
                    <div class="cr-checkout-content">
                        <div class="cr-checkout-inner">

                            <div class="cr-checkout-wrap">
                                <div class="cr-checkout-block cr-check-bill">
                                    @yield('profile_content')
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        document.getElementById("file-input").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("profile-image").src = e.target.result;
                    document.getElementById("profile-form").submit();
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.profile_image').on('change', function() {
                var form = $('.update_profile_image_form');
                form.submit();
            });
        });
    </script>
@endpush
