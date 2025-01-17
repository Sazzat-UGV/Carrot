@extends('frontend.layouts.app')
@section('title')
    Reset Password
@endsection
@push('style')
@endpush
@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Reset Password'])
    <section class="section-login padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Reset Password</h2>
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
                        <form class="cr-content-form" method="POST" action="{{ route('password.store') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" placeholder="Enter your email"
                                    value="{{ old('email', $request->email) }}"
                                    class="cr-form-control form-control @error('email')
                                    is-invalid
                                @enderror"
                                    name="email">
                                @error('email')
                                    <span class="invalid-feedback" style="font-size: 11px"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" placeholder="Enter your password"
                                    class="cr-form-control form-control @error('password')
                                    is-invalid
                                @enderror"
                                    name="password">
                                @error('password')
                                    <span class="invalid-feedback" style="font-size: 11px"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password<span class="text-danger">*</span></label>
                                <input type="password" placeholder="Retype password"
                                    class="cr-form-control form-control @error('password_confirmation')
                                    is-invalid
                                @enderror"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" style="font-size: 11px"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <br>
                            <div class="cr-register-buttons">
                                <button type="submit" class="cr-button">Submit</button>
                                <a href="{{ route('register') }}" class="link">
                                    Signup?
                                </a>
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
