@extends('frontend.layouts.app')

@section('title')
    Home
@endsection

@push('style')
    <style>
        .cr-banner-image-one,
        .cr-banner-image-two {
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
@endpush

@section('content')
    <section class="section-hero hero-2 padding-b-100 next">
        <div class="container-fluid p-0">
            <div class="cr-slider swiper-container">
                <span class="shape"></span>
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide" data-swiper-slide-index="{{ $loop->index }}">
                            <div class="cr-hero-banner"
                                style="background-image: url('{{ asset('uploads/slider') }}/{{ $slider->image }}')">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cr-left-side-contain slider-animation">
                                                <h5><span>{{ $slider->title }}</span></h5>
                                                <h1>{{ $slider->heading }}</h1>
                                                <p>{{ $slider->description }}</p>
                                                <div class="cr-last-buttons">
                                                    <a href="{{ $slider->button_link }}"
                                                        class="cr-button">{{ $slider->button_name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                    @foreach ($sliders as $index => $slider)
                        <span class="swiper-pagination-bullet" tabindex="0" role="button"
                            aria-label="Go to slide {{ $index + 1 }}"></span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
