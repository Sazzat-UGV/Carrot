@extends('frontend.layouts.app')
@section('title')
    Register
@endsection
@push('style')
@endpush
@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Register'])
    <section class="section-register padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Register</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cr-register aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <div class="form-logo">
                            <img src="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}" alt="logo">
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="POST" action="{{ route('register') }}" class="cr-content-form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your name"
                                            class="cr-form-control form-control @error('name')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('name') }}" name="name">
                                        @error('name')
                                            <span class="invalid-feedback" style="font-size: 11px"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <input type="email" placeholder="Enter your email"
                                            class="cr-form-control form-control @error('email')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('email') }}" name="email">
                                        @error('email')
                                            <span class="invalid-feedback" style="font-size: 11px"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Phone<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your phone"
                                            class="cr-form-control form-control @error('phone')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('phone') }}" name="phone">
                                        @error('phone')
                                            <span class="invalid-feedback" style="font-size: 11px"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Address<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your address"
                                            class="cr-form-control form-control @error('address')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('address') }}" name="address">
                                        @error('address')
                                            <span class="invalid-feedback" style="font-size: 11px"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 ">
                                    <div class="form-group">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <input type="password" placeholder="Enter your password"
                                            class="cr-form-control form-control @error('password')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('password') }}" name="password">
                                        @error('password')
                                            <span class="invalid-feedback" style="font-size: 11px"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 ">
                                    <div class="form-group">
                                        <label>Confirm Password<span class="text-danger">*</span></label>
                                        <input type="password" placeholder="Retype password"
                                            class="cr-form-control form-control @error('password_confirmation')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('password_confirmation') }}" name="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" style="font-size: 11px"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="cr-register-buttons">
                                    <button type="submit" class="cr-button">Signup</button>
                                    <a href="{{ route('login') }}" class="link">
                                        Have an account?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
