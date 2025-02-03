@extends('frontend.layouts.app')
@section('title')
    Contact Us
@endsection
@push('style')
@endpush
@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Contact Us'])

    <section class="section-Contact padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Get in Touch</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Prepared is me marianne pleasure likewise debating. Wonder an unable except better stairs
                                do ye
                                admire. His secure called esteem praise.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-minus-24">
                <div class="col-lg-4 col-md-6 col-12 mb-24 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="400">
                    <div class="cr-info-box">
                        <div class="cr-icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div class="cr-info-content">
                            <h4 class="heading">Contact</h4>
                            <p><a href="javascript:void(0)"><i class="ri-phone-line"></i> &nbsp;
                                    {{ $setting->phone_number }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-24 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="600">
                    <div class="cr-info-box">
                        <div class="cr-icon">
                            <i class="ri-mail-line"></i>
                        </div>
                        <div class="cr-info-content">
                            <h4 class="heading">Mail &amp; Website</h4>
                            <p><a href="javascript:void(0)"><i class="ri-mail-line"></i> &nbsp;
                                    {{ $setting->email }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-24 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="800">
                    <div class="cr-info-box">
                        <div class="cr-icon">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <div class="cr-info-content">
                            <h4 class="heading">Address</h4>
                            <p><a href="javascript:void(0)"><i class="ri-map-pin-line"></i> &nbsp;
                                    {{ $setting->physical_address }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row padding-t-100 mb-minus-24">
                <div class="col-md-6 col-12 mb-24 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="400">
                    {!! $setting->map !!}
                </div>
                <div class="col-md-6 col-12 mb-24 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="800">
                    <form class="cr-content-form" action="{{ route('contact.us') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="Name"
                                class="cr-form-control @error('name')
                                is-invalid
                            @enderror"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email"
                                class="cr-form-control  @error('email')
                                is-invalid
                            @enderror"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Phone"
                                class="cr-form-control  @error('phone')
                                is-invalid
                            @enderror"
                                name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea
                                class="cr-form-control  @error('message')
                                is-invalid
                            @enderror"
                                name="message" id="exampleFormControlTextarea1" rows="4" placeholder="Message">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <button type="submit" class="cr-button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
