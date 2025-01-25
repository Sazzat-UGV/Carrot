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

    <!-- Category -->
    <section class="section-popular margin-b-100 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <div class="row">
                <div class="title-2 mb-30 d-none">
                    <h2>Categories</h2>
                </div>
                <div class="category-slider owl-carousel owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-1320px, 0px, 0px); transition: all; width: 4180px;">
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($categories as $category)
                                <div class="owl-item" style="width: 196px; margin-right: 24px;">
                                    <div class="category-block">
                                        <div class="category-icon icon-{{ $counter }}">
                                            {!! $category->icon !!}
                                        </div>
                                        <div class="category-title">
                                            <h4><a
                                                    href="{{ route('allProducts', ['type' => 'category', 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                                            </h4>
                                            <p>({{ $category->products_count }} Items)</p>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $counter++;
                                    if ($counter > 8) {
                                        $counter = 1;
                                    }
                                @endphp
                            @endforeach

                        </div>
                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                aria-label="Previous">‹</span></button><button type="button" role="presentation"
                            class="owl-next"><span aria-label="Next">›</span></button></div>
                    <div class="owl-dots disabled"></div>
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
                                            <a class="model-oraganic-product quickViewModal" data-bs-toggle="modal"
                                                href="#" data-id="{{ $featured->id }}" role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                        <a class="cr-shopping-bag" href="javascript:void(0)">
                                            <i class="ri-shopping-bag-line"></i>
                                        </a>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <a
                                                href="{{ route('allProducts', ['type' => 'category', 'slug' => $featured->category->slug]) }}">{{ $featured->category->name }}</a>
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

    <!-- Services -->
    <section class="section-services padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-services-border aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-service-slider swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($services as $service)
                                    <div class="swiper-slide">
                                        <div class="cr-services">
                                            <div class="cr-services-image">
                                                {!! $service->icon !!}
                                            </div>
                                            <div class="cr-services-contain">
                                                <h4>{{ $service->title }}</h4>
                                                <p>{{ $service->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- most popular products -->
    <section class="cr-product-tab cr-products padding-b-100 wow fadeInUp">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12">
                    <div class="title-2 mb-30">
                        <div class="title-box">
                            <div class="cr-banner">
                                <h2>Most popular</h2>
                            </div>
                            <div class="cr-banner-sub-title">
                                <p>Shop the Hottest Products That Everyone is Talking About.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000">
                <div class="col">
                    <div class="tab-content">
                        <div class="tab-pane fade show active product-block" id="all">
                            <div class="row">
                                @foreach ($most_populars as $popular)
                                    <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box mb-4">
                                        <div class="cr-product-card">
                                            <div class="cr-product-image">
                                                <div class="cr-image-inner zoom-image-hover">
                                                    <img src="{{ asset('uploads/product') }}/{{ $popular->thumbnail }}"
                                                        alt="image">
                                                </div>
                                                <div class="cr-side-view">
                                                    @php
                                                        $wishlist = null;
                                                        if (Auth::check()) {
                                                            $wishlist = App\Models\Wishlist::where(
                                                                'user_id',
                                                                Auth::user()->id,
                                                            )
                                                                ->where('product_id', $popular->id)
                                                                ->first();
                                                        }
                                                    @endphp
                                                    <a href="{{ route('wishlist_store', $popular->id) }}" class="">
                                                        @if ($wishlist)
                                                            <i class="ri-heart-fill"></i>
                                                        @else
                                                            <i class="ri-heart-line"></i>
                                                        @endif
                                                    </a>
                                                    <a class="model-oraganic-product quickViewModal"
                                                        data-bs-toggle="modal" href="#"
                                                        data-id="{{ $popular->id }}" role="button">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </div>
                                                <a class="cr-shopping-bag" href="javascript:void(0)">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </a>
                                            </div>
                                            <div class="cr-product-details">
                                                <div class="cr-brand">
                                                    <a
                                                        href="{{ route('allProducts', ['type' => 'category', 'slug' => $popular->category->slug]) }}">{{ $popular->category->name }}</a>
                                                    @php
                                                        $averageRating =
                                                            $popular->reviews_count > 0
                                                                ? round(
                                                                    $popular->reviews_sum_rating /
                                                                        $popular->reviews_count,
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
                                                <a href="{{ route('productDetail', $popular->slug) }}"
                                                    class="title">{{ $popular->name }}</a>
                                                <p class="cr-price"><span
                                                        class="new-price">{{ $setting->currency }}{{ $popular->selling_price }}</span>
                                                    @if ($popular->discount_price)
                                                        <span
                                                            class="old-price">{{ $setting->currency }}{{ $popular->discount_price }}</span>
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
            </div>
        </div>
    </section>

    <!-- brand -->
    <section class="section-insta padding-b-100 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <h2 class="d-none">@Instagram</h2>
            <div class="cr-insta swiper-container swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" id="swiper-wrapper-56a2abb1103e83b5a" aria-live="polite"
                    style="transform: translate3d(-1500px, 0px, 0px); transition: all;">
                    @foreach ($brands as $brand)
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group"
                            aria-label="1 / 24" style="width: 163.5px; margin-right: 24px;">
                            <a href="{{ route('allProducts', ['type' => 'brand', 'slug' => $brand->slug]) }}"
                                class="cr-insta-image">
                                <img src="{{ asset('uploads/brand') }}/{{ $brand->photo }}" alt="insta">
                            </a>
                        </div>
                    @endforeach
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </section>

    <!-- trendy products -->
    <section class="section-popular margin-b-100">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12">
                    <div class="title-2 mb-30">
                        <div class="title-box">
                            <div class="cr-banner">
                                <h2>Trendy</h2>
                            </div>
                            <div class="cr-banner-sub-title">
                                <p>Stay Ahead of the Trends with Our Most Popular and Stylish Picks.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-7 col-xl-6 col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-twocolumns-product">
                        @foreach ($trendies as $trendy)
                            <div class="slick-slide">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('uploads/product') }}/{{ $trendy->thumbnail }}"
                                                alt="image">
                                        </div>
                                        <div class="cr-side-view">
                                            @php
                                                $wishlist = null;
                                                if (Auth::check()) {
                                                    $wishlist = App\Models\Wishlist::where('user_id', Auth::user()->id)
                                                        ->where('product_id', $trendy->id)
                                                        ->first();
                                                }
                                            @endphp
                                            <a href="{{ route('wishlist_store', $trendy->id) }}" class="">
                                                @if ($wishlist)
                                                    <i class="ri-heart-fill"></i>
                                                @else
                                                    <i class="ri-heart-line"></i>
                                                @endif
                                            </a>
                                            <a class="model-oraganic-product quickViewModal" data-bs-toggle="modal"
                                                href="#" data-id="{{ $trendy->id }}" role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                        <a class="cr-shopping-bag" href="javascript:void(0)">
                                            <i class="ri-shopping-bag-line"></i>
                                        </a>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <a
                                                href="{{ route('allProducts', ['type' => 'category', 'slug' => $trendy->category->slug]) }}">{{ $trendy->category->name }}</a>
                                            @php
                                                $averageRating =
                                                    $trendy->reviews_count > 0
                                                        ? round($trendy->reviews_sum_rating / $trendy->reviews_count, 1)
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
                                        <a href="{{ route('productDetail', $trendy->slug) }}"
                                            class="title">{{ $trendy->name }}</a>
                                        <p class="cr-price"><span
                                                class="new-price">{{ $setting->currency }}{{ $trendy->selling_price }}</span>
                                            @if ($trendy->discount_price)
                                                <span
                                                    class="old-price">{{ $setting->currency }}{{ $trendy->discount_price }}</span>
                                            @endif
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-products-rightbar">
                        <img src="{{ asset('assets/frontend') }}/img/product/products-rightview.jpg"
                            alt="products-rightview">
                        <div class="cr-products-rightbar-content">
                            <h4>Organic & Healthy <br> Vegetables</h4>
                            <div class="cr-off">
                                <span>25% <code>OFF</code></span>
                            </div>
                            <div class="rightbar-buttons">
                                <a href="shop-left-sidebar.html" class="cr-button">
                                    shop now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
