@extends('frontend.layouts.app')
@section('title')
    Verify Password
@endsection
@push('style')
@endpush
@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Verify Password'])
    <section class="section-login padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Verify Password</h2>
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
                        <p class="mb-3">Thanks for signing up! Before getting started, could you verify your email address
                            by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly
                            send you another.</p>
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success" role="alert">
                                <p>A new verification link has been sent to the email address you provided during
                                    registration.</p>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center">
                            <form class="cr-content-form" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div class="cr-register-buttons">
                                    <button type="submit" class="cr-button">Resend Verification Email</button>
                                </div>
                            </form>

                            <form method="POST" class="logout ms-3" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    style="background: none; border: none; padding: 0; color: #7A7A7A; text-decoration: underline; cursor: pointer;">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
