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
    <!-- Hero slider -->
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

    <!-- featured products -->
    <section class="section-popular-products padding-tb-100" data-aos="fade-up" data-aos-duration="2000"
        data-aos-delay="400">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-2 mb-30">
                        <div class="title-box">
                            <div class="cr-banner">
                                <h2>Featured</h2>
                            </div>
                            <div class="cr-banner-sub-title">
                                <p>Explore Our Handpicked Selection of Top-Rated Products.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-popular-product">
                        @foreach ($featureds as $featured)
                            <div class="slick-slide">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('uploads/product') }}/{{ $featured->thumbnail }}"
                                                alt="image">
                                        </div>
                                        <div class="cr-side-view">
                                            @php
                                                $wishlist = null;
                                                if (Auth::check()) {
                                                    $wishlist = App\Models\Wishlist::where('user_id', Auth::user()->id)
                                                        ->where('product_id', $featured->id)
                                                        ->first();
                                                }
                                            @endphp
                                            <a href="{{ route('wishlist_store', $featured->id) }}" class="">
                                                @if ($wishlist)
                                                    <i class="ri-heart-fill"></i>
                                                @else
                                                    <i class="ri-heart-line"></i>
                                                @endif
                                            </a>
                                            <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                                role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                        <a class="cr-shopping-bag" href="javascript:void(0)">
                                            <i class="ri-shopping-bag-line"></i>
                                        </a>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <a href="shop-left-sidebar.html">{{ $featured->category->name }}</a>
                                            @php
                                                $averageRating =
                                                    $featured->reviews_count > 0
                                                        ? round(
                                                            $featured->reviews_sum_rating / $featured->reviews_count,
                                                            1,
                                                        )
                                                        : 0;
                                            @endphp

                                            <div class="cr-star">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($averageRating))
                                                        <i class="ri-star-fill"></i>
                                                    @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) > 0)
                                                        <i class="ri-star-half-line"></i>
                                                    @else
                                                        <i class="ri-star-line"></i>
                                                    @endif
                                                @endfor
                                                <p>({{ $averageRating }})</p>
                                            </div>

                                        </div>
                                        <a href="{{ route('productDetail', $featured->slug) }}"
                                            class="title">{{ $featured->name }}</a>
                                        <p class="cr-price"><span
                                                class="new-price">{{ $setting->currency }}{{ $featured->selling_price }}</span>
                                            @if ($featured->discount_price)
                                                <span
                                                    class="old-price">{{ $setting->currency }}{{ $featured->discount_price }}</span>
                                            @endif
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@push('script')
@endpush
