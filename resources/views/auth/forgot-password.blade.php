@extends('frontend.layouts.app')
@section('title')
    Forgot Password
@endsection
@push('style')
@endpush
@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Forgot Password'])
    <section class="section-login padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Forgot Password</h2>
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
                        <form class="cr-content-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" placeholder="Enter your email" value="{{ old('email') }}"
                                    class="cr-form-control form-control @error('email')
                                    is-invalid
                                @enderror"
                                    name="email">
                                @error('email')
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
