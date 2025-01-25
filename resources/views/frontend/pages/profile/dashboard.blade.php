@extends('frontend.layouts.app')

@section('title')
    Profile
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
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Profile'])
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="cr-checkout-rightside col-lg-4 col-md-12">

                    <div class="cr-sidebar-wrap cr-check-pay-img-wrap">
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-check-pay-img-inner"
                                    style="display: flex; justify-content: center; align-items: center;">
                                    <div class="cr-check-pay-img position-relative">
                                        <img id="profile-image" src="{{ asset('uploads/user') }}/{{ Auth::user()->image }}"
                                            alt="payment" style="max-width: 180px;"
                                            class="border border-2 rounded-circle border-success-subtle">
                                        <p id="edit-button"
                                            style="position: absolute; bottom:10px; right: 5px; background:#E4F2ED; border-radius: 50%; border: 1px solid #bcc9c4;
                                            padding-left: 7px; padding-right: 7px; align-items: center; cursor: pointer;">
                                            <i class="ri-edit-2-fill" style="font-size: 18px"></i>
                                        </p>
                                        <form action="{{ route('update_profile') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" id="file-input" name="image" style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                </div>
                <div class="cr-checkout-leftside col-lg-8 col-md-12 m-t-991">
                    <!-- checkout content Start -->
                    <div class="cr-checkout-content">
                        <div class="cr-checkout-inner">

                            <div class="cr-checkout-wrap">
                                <div class="cr-checkout-block cr-check-bill">
                                    <h3 class="cr-checkout-title">Profile Info</h3>
                                    <div class="cr-bl-block-content">
                                        <div class="cr-check-bill-form mb-minus-24">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Name<span class="text-danger">*</span></label>
                                                        <input type="text" placeholder="Enter your name"
                                                            class="cr-form-control form-control @error('name')
                                                                is-invalid
                                                            @enderror"
                                                            value="{{ old('name', Auth::user()->name) }}" name="name">
                                                        @error('name')
                                                            <span class="invalid-feedback" style="font-size: 13px"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Phone<span class="text-danger">*</span></label>
                                                        <input type="text" placeholder="Enter your phone"
                                                            class="cr-form-control form-control @error('phone')
                                                                is-invalid
                                                            @enderror"
                                                            value="{{ old('phone', Auth::user()->phone) }}" name="phone">
                                                        @error('phone')
                                                            <span class="invalid-feedback" style="font-size: 13px"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-4">
                                                    <div class="form-group">
                                                        <label>Address<span class="text-danger">*</span></label>
                                                        <input type="text" placeholder="Enter your address"
                                                            class="cr-form-control form-control @error('address')
                                                                is-invalid
                                                            @enderror"
                                                            value="{{ old('address', Auth::user()->address) }}"
                                                            name="address">
                                                        @error('address')
                                                            <span class="invalid-feedback" style="font-size: 13px;"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" placeholder="Enter your password"
                                                            class="cr-form-control form-control @error('password')
                                                                is-invalid
                                                            @enderror"
                                                            value="{{ old('password') }}" name="password">
                                                        @error('password')
                                                            <span class="invalid-feedback" style="font-size: 13px"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input type="password" placeholder="Retype password"
                                                            class="cr-form-control form-control @error('password_confirmation')
                                                                is-invalid
                                                            @enderror"
                                                            value="{{ old('password_confirmation') }}"
                                                            name="password_confirmation">
                                                        @error('password_confirmation')
                                                            <span class="invalid-feedback" style="font-size: 11px"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="cr-check-order-btn">
                                            <button type="submit" class="cr-button mt-30">Save</button>
                                        </span>
                                        </form>

                                    </div>
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
        document.getElementById("edit-button").addEventListener("click", function() {
            document.getElementById("file-input").click();
        });

        document.getElementById("file-input").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("profile-image").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
