@extends('frontend.layouts.app')
@section('title')
    Home Page
@endsection
@push('style')
@endpush
@section('content')

    <!-- Hero slider -->
    <section class="section-hero hero-2 padding-b-100 next">
        <div class="container-fluid p-0">
            <div class="cr-slider swiper-container">
                <span class="shape"></span>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="cr-hero-banner cr-banner-image-two">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-left-side-contain slider-animation">
                                            <h5><span>100%</span> Cotton Fabric</h5>
                                            <h1>Fashion sale for women's.</h1>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis
                                                beatae consequuntur.</p>
                                            <div class="cr-last-buttons">
                                                <a href="shop-left-sidebar.html" class="cr-button">
                                                    shop now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cr-hero-banner cr-banner-image-one">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-left-side-contain slider-animation">
                                            <h5><span>100%</span> Cotton Fabric</h5>
                                            <h1>Explore jeans summer sale.</h1>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis
                                                beatae consequuntur.</p>
                                            <div class="cr-last-buttons">
                                                <a href="shop-left-sidebar.html" class="cr-button">
                                                    shop now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Category -->
    <section class="section-popular margin-b-100" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <div class="row">
                <div class="title-2 mb-30 d-none">
                    <h2>Categories</h2>
                </div>
                <div class="category-slider owl-carousel">
                    <div class="category-block">
                        <div class="category-icon icon-1">
                            <i class="fi fi-tr-shirt-long-sleeve"></i>
                        </div>
                        <div class="category-title">
                            <h4><a href="shop-left-sidebar.html">Shirt</a></h4>
                            <p>(67 Items)</p>
                        </div>
                    </div>
                    <div class="category-block">
                        <div class="category-icon icon-2">
                            <i class="fi fi-tr-hat-cowboy-side"></i>
                        </div>
                        <div class="category-title">
                            <h4><a href="shop-left-sidebar.html">Hats</a></h4>
                            <p>(81 Items)</p>
                        </div>
                    </div>
                    <div class="category-block">
                        <div class="category-icon icon-3">
                            <i class="fi fi-tr-boot-heeled"></i>
                        </div>
                        <div class="category-title">
                            <h4><a href="shop-left-sidebar.html">Boot</a></h4>
                            <p>(32 Items)</p>
                        </div>
                    </div>
                    <div class="category-block">
                        <div class="category-icon icon-4">
                            <i class="fi fi-tr-shirt-tank-top"></i>
                        </div>
                        <div class="category-title">
                            <h4><a href="shop-left-sidebar.html">Tops</a></h4>
                            <p>(78 Items)</p>
                        </div>
                    </div>
                    <div class="category-block">
                        <div class="category-icon icon-5">
                            <i class="fi fi-tr-vest"></i>
                        </div>
                        <div class="category-title">
                            <h4><a href="shop-left-sidebar.html">Vest</a></h4>
                            <p>(64 Items)</p>
                        </div>
                    </div>
                    <div class="category-block">
                        <div class="category-icon icon-6">
                            <i class="fi fi-tr-socks"></i>
                        </div>
                        <div class="category-title">
                            <h4><a href="shop-left-sidebar.html">Socks</a></h4>
                            <p>(24 Items)</p>
                        </div>
                    </div>
                    <div class="category-block">
                        <div class="category-icon icon-7">
                            <i class="fi fi-tr-sunglasses"></i>
                        </div>
                        <div class="category-title">
                            <h4><a href="shop-left-sidebar.html">Sunglasses</a></h4>
                            <p>(46 Items)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Products -->
    <section class="section-product padding-b-100" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-2 mb-30">
                        <div class="title-box">
                            <div class="cr-banner">
                                <h2>New Arrivals</h2>
                            </div>
                            <div class="cr-banner-sub-title">
                                <p>Browse The Collection of Top Products.</p>
                            </div>
                        </div>
                        <div id="dealend" class="dealend-timer"></div>
                    </div>
                </div>
            </div>
            <div class="new-product-slider owl-carousel mb-minus-24">
                <div class="product-card-2">
                    <div class="cr-product-inner">
                        <div class="cr-pro-image-outer">
                            <div class="cr-pro-image">
                                <a href="product-left-sidebar.html" class="image">
                                    <img class="main-image" src="{{ asset('assets/frontend') }}/img/product/18.jpg"
                                        alt="Product">
                                    <img class="hover-image" src="{{ asset('assets/frontend') }}/img/product/19.jpg"
                                        alt="Product">
                                </a>
                                <span class="flags">
                                    <span class="sale">50% Sale</span>
                                </span>
                                <div class="cr-pro-actions">
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                        role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="compare.html" class="cr-btn-group compare" title="Compare">
                                        <i class="mdi mdi-vector-arrange-below"></i>
                                    </a>
                                    <a href="javascript:void(0)" title="Add To Cart"
                                        class="add-to-cart cr-shopping-bag">
                                        <i class="ri-shopping-cart-line"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="cr-btn-group wishlist" title="Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="cr-pro-content">
                            <div class="cr-info">
                                <a href="shop-left-sidebar.html">Women Tops</a>
                                <div class="cr-pro-rating">
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                </div>
                            </div>

                            <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Colorful top for women</a>
                            </h5>
                            <span class="cr-price">
                                <span class="new-price">$6.00</span>
                                <span class="old-price">$9.00</span>
                            </span>
                            <div class="cr-pro-option">
                                <div class="cr-pro-color">
                                    <ul class="cr-opt-swatch cr-change-img">
                                        <li class="active">
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <span style="background-color:#74c7ff;"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <span style="background-color:#f39fab;"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cr-pro-size">
                                    <ul class="cr-opt-size">
                                        <li><a href="javascript:void(0)" class="cr-opt-sz" data-old="$22.00"
                                                data-new="$17.00" data-tooltip="Medium">M</a></li>
                                        <li><a href="javascript:void(0)" class="cr-opt-sz" data-old="$25.00"
                                                data-new="$20.00" data-tooltip="Large">L</a></li>
                                        <li><a href="javascript:void(0)" class="cr-opt-sz" data-old="$27.00"
                                                data-new="$22.00" data-tooltip="Extra Large">XL</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-card-2">
                    <div class="cr-product-inner">
                        <div class="cr-pro-image-outer">
                            <div class="cr-pro-image">
                                <a href="product-left-sidebar.html" class="image">
                                    <img class="main-image" src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                        alt="Product">
                                    <img class="hover-image" src="{{ asset('assets/frontend') }}/img/product/29.jpg"
                                        alt="Product">
                                </a>
                                <span class="flags">
                                    <span class="trending">Trending</span>
                                </span>
                                <div class="cr-pro-actions">
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                        role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="compare.html" class="cr-btn-group compare" title="Compare">
                                        <i class="mdi mdi-vector-arrange-below"></i>
                                    </a>
                                    <a href="javascript:void(0)" title="Add To Cart"
                                        class="add-to-cart cr-shopping-bag">
                                        <i class="ri-shopping-cart-line"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="cr-btn-group wishlist" title="Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="cr-pro-content">
                            <div class="cr-info">
                                <a href="shop-left-sidebar.html">Men T-shirt</a>
                                <div class="cr-pro-rating">
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                            </div>

                            <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Blue T-shirt for men</a>
                            </h5>
                            <span class="cr-price">
                                <span class="new-price">$11.00</span>
                                <span class="old-price">$22.00</span>
                            </span>
                            <div class="cr-pro-option">
                                <div class="cr-pro-color">
                                    <ul class="cr-opt-swatch cr-change-img">
                                        <li class="active">
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <img src="{{ asset('assets/frontend') }}/img/product/28.jpg"
                                                    alt="product">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <img src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                    alt="product">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <img src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                    alt="product">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cr-pro-size">
                                    <ul class="cr-opt-size">
                                        <li><a href="javascript:void(0)" class="cr-opt-sz" data-old="$22.00"
                                                data-new="$17.00" data-tooltip="Medium">M</a></li>
                                        <li><a href="javascript:void(0)" class="cr-opt-sz" data-old="$27.00"
                                                data-new="$22.00" data-tooltip="Extra Large">XL</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-card-2">
                    <div class="cr-product-inner">
                        <div class="cr-pro-image-outer">
                            <div class="cr-pro-image">
                                <a href="product-left-sidebar.html" class="image">
                                    <img class="main-image" src="{{ asset('assets/frontend') }}/img/product/24.jpg"
                                        alt="Product">
                                    <img class="hover-image" src="{{ asset('assets/frontend') }}/img/product/25.jpg"
                                        alt="Product">
                                </a>
                                <div class="cr-pro-actions">
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                        role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="compare.html" class="cr-btn-group compare" title="Compare">
                                        <i class="mdi mdi-vector-arrange-below"></i>
                                    </a>
                                    <a href="javascript:void(0)" title="Add To Cart"
                                        class="add-to-cart cr-shopping-bag">
                                        <i class="ri-shopping-cart-line"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="cr-btn-group wishlist" title="Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="cr-pro-content">
                            <div class="cr-info">
                                <a href="shop-left-sidebar.html">Kids</a>
                                <div class="cr-pro-rating">
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                            </div>

                            <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Pink T-shirt for girl</a>
                            </h5>
                            <span class="cr-price">
                                <span class="new-price">$29.00</span>
                                <span class="old-price">$39.00</span>
                            </span>
                            <div class="cr-pro-option">
                                <div class="cr-pro-color">
                                    <ul class="cr-opt-swatch cr-change-img">
                                        <li class="active">
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <img src="{{ asset('assets/frontend') }}/img/product/24.jpg"
                                                    alt="product">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <img src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                    alt="product">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <img src="{{ asset('assets/frontend') }}/img/product/27.jpg"
                                                    alt="product">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cr-pro-size">
                                    <ul class="cr-opt-size">
                                        <li class="active"><a href="#" class="cr-opt-sz" data-old="$20.00"
                                                data-new="$15.00" data-tooltip="Small">S</a></li>
                                        <li><a href="javascript:void(0)" class="cr-opt-sz" data-old="$22.00"
                                                data-new="$17.00" data-tooltip="Medium">M</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-card-2">
                    <div class="cr-product-inner">
                        <div class="cr-pro-image-outer">
                            <div class="cr-pro-image">
                                <a href="product-left-sidebar.html" class="image">
                                    <img class="main-image" src="{{ asset('assets/frontend') }}/img/product/20.jpg"
                                        alt="Product">
                                    <img class="hover-image" src="{{ asset('assets/frontend') }}/img/product/21.jpg"
                                        alt="Product">
                                </a>
                                <span class="flags">
                                    <span class="new">New</span>
                                </span>
                                <div class="cr-pro-actions">
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                        role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="compare.html" class="cr-btn-group compare" title="Compare">
                                        <i class="mdi mdi-vector-arrange-below"></i>
                                    </a>
                                    <a href="javascript:void(0)" title="Add To Cart"
                                        class="add-to-cart cr-shopping-bag">
                                        <i class="ri-shopping-cart-line"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="cr-btn-group wishlist" title="Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="cr-pro-content">
                            <div class="cr-info">
                                <a href="shop-left-sidebar.html">Shorts</a>
                                <div class="cr-pro-rating">
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                </div>
                            </div>

                            <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Girl nightdress shorts</a>
                            </h5>
                            <span class="cr-price">
                                <span class="new-price">$57.00</span>
                                <span class="old-price">$62.00</span>
                            </span>
                            <div class="cr-pro-option">
                                <div class="cr-pro-color">
                                    <ul class="cr-opt-swatch cr-change-img">
                                        <li class="active">
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <span style="background-color:#50aae7;"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <span style="background-color:#f2f05f;"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <img src="{{ asset('assets/frontend') }}/img/product/32.jpg"
                                                    alt="product">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cr-pro-size">
                                    <ul class="cr-opt-size">
                                        <li class="active"><a href="#" class="cr-opt-sz" data-old="$20.00"
                                                data-new="$15.00" data-tooltip="Small">S</a></li>
                                        <li><a href="javascript:void(0)" class="cr-opt-sz" data-old="$22.00"
                                                data-new="$17.00" data-tooltip="Medium">M</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-card-2">
                    <div class="cr-product-inner">
                        <div class="cr-pro-image-outer">
                            <div class="cr-pro-image">
                                <a href="product-left-sidebar.html" class="image">
                                    <img class="main-image" src="{{ asset('assets/frontend') }}/img/product/22.jpg"
                                        alt="Product">
                                    <img class="hover-image" src="{{ asset('assets/frontend') }}/img/product/23.jpg"
                                        alt="Product">
                                </a>
                                <div class="cr-pro-actions">
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                        role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="compare.html" class="cr-btn-group compare" title="Compare">
                                        <i class="mdi mdi-vector-arrange-below"></i>
                                    </a>
                                    <a href="javascript:void(0)" title="Add To Cart"
                                        class="add-to-cart cr-shopping-bag">
                                        <i class="ri-shopping-cart-line"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="cr-btn-group wishlist" title="Wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="cr-pro-content">
                            <div class="cr-info">
                                <a href="shop-left-sidebar.html">T-shirt</a>
                                <div class="cr-pro-rating">
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                    <i class="ri-star-line fill"></i>
                                </div>
                            </div>

                            <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Black T-shirt for women</a>
                            </h5>
                            <span class="cr-price">
                                <span class="new-price">$35.00</span>
                                <span class="old-price">$42.00</span>
                            </span>
                            <div class="cr-pro-option">
                                <div class="cr-pro-color">
                                    <ul class="cr-opt-swatch cr-change-img">
                                        <li>
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <span style="background-color:#000000;"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <span style="background-color:#837aff;"></span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                <img src="{{ asset('assets/frontend') }}/img/product/22.jpg"
                                                    alt="product">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cr-pro-size">
                                    <ul class="cr-opt-size">
                                        <li class="active"><a href="#" class="cr-opt-sz" data-old="$20.00"
                                                data-new="$15.00" data-tooltip="Small">S</a></li>
                                        <li><a href="javascript:void(0)" class="cr-opt-sz" data-old="$22.00"
                                                data-new="$17.00" data-tooltip="Medium">M</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
                    <div class="cr-services-border" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-service-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-red-packet-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Product Packing</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-customer-service-2-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>24X7 Support</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-truck-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Delivery in 5 Days</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-money-dollar-box-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Payment Secure</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Deal -->
    <section class="section-deal padding-b-100">
        <div class="bg-banner-deal">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cr-deal-rightside">
                            <div class="cr-deal-content" data-aos="fade-up" data-aos-duration="2000">
                                <span><code>40%</code> OFF</span>
                                <h4 class="cr-deal-title">Great deal on Womens Fashion.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do maecenas accumsan
                                    lacus
                                    vel facilisis. </p>
                                <div id="timer" class="cr-counter">
                                    <div class="cr-counter-inner">
                                        <h4>
                                            <span id="days"></span>
                                            Days
                                        </h4>
                                        <h4>
                                            <span id="hours"></span>
                                            Hrs
                                        </h4>
                                        <h4>
                                            <span id="minutes"></span>
                                            Min
                                        </h4>
                                        <h4>
                                            <span id="seconds"></span>
                                            Sec
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product banner -->
    <section class="section-product-banner padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-banner-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-product-banner-image">
                                    <img src="{{ asset('assets/frontend') }}/img/product-banner/4.jpg"
                                        alt="product-banner">
                                    <div class="cr-product-banner-contain">
                                        <h5>Womens <br> Summer Fashion</h5>
                                        <p><span class="percent">25%</span> Off <span class="text">on first
                                                order</span>
                                        </p>
                                        <div class="cr-product-banner-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-product-banner-image">
                                    <img src="{{ asset('assets/frontend') }}/img/product-banner/5.jpg"
                                        alt="product-banner">
                                    <div class="cr-product-banner-contain">
                                        <h5>Cotton <br>Jacket for mens</h5>
                                        <p><span class="percent">33%</span> Off <span class="text">on first
                                                order</span>
                                        </p>
                                        <div class="cr-product-banner-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-product-banner-image">
                                    <img src="{{ asset('assets/frontend') }}/img/product-banner/6.jpg"
                                        alt="product-banner">
                                    <div class="cr-product-banner-contain">
                                        <h5>Children <br> Latest Fashion</h5>
                                        <p><span class="percent">15%</span> Off <span class="text">on first
                                                order</span>
                                        </p>
                                        <div class="cr-product-banner-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Collection Area Start -->
    <section class="cr-product-tab cr-products padding-b-100 wow fadeInUp">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12">
                    <div class="title-2 mb-30">
                        <div class="title-box">
                            <div class="cr-banner">
                                <h2>Top Collection</h2>
                            </div>
                            <div class="cr-banner-sub-title">
                                <p>Shop online for top collection and get free shipping!</p>
                            </div>
                        </div>
                        <div class="cr-pro-tab">
                            <ul class="cr-pro-tab-nav nav">
                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                        href="#all">All</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                        href="#womens">Womens</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                        href="#mens">Mens</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                        href="#kids">Kids</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New Product -->
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000">
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st Product tab start -->
                        <div class="tab-pane fade show active product-block" id="all">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/33.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/34.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">50% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Women Tops</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Pink
                                                        T-shirt for women</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$7.00</span>
                                                    <span class="old-price">$9.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#74c7ff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#f39fab;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#85ffeb;"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">L</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Blue
                                                        T-Shirt for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$125.00</span>
                                                    <span class="old-price">$250.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">L</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$27.00" data-new="$22.00"
                                                                    data-tooltip="Extra Large">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/53.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/53.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Jacket</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Jacket
                                                        for boy</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$65.00</span>
                                                    <span class="old-price">$95.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/24.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/25.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/39.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/40.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Tops</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Flower
                                                        top for women</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$44.00</span>
                                                    <span class="old-price">$60.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#50aae7;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/39.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/46.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/45.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Jacket</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Leather
                                                        jacket for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$255.00</span>
                                                    <span class="old-price">$299.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/46.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/58.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/59.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-Shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Pink
                                                        T-shirt for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$75.00</span>
                                                    <span class="old-price">$86.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#74c7ff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#f39fab;"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$25.00"
                                                                    data-new="$20.00" data-tooltip="Large">X</a>
                                                            </li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$27.00" data-new="$22.00"
                                                                    data-tooltip="Extra Large">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/42.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/43.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="trending">Trending</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Red
                                                        T-shirt for women</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$26.00</span>
                                                    <span class="old-price">$35.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/28.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$22.00"
                                                                    data-new="$17.00" data-tooltip="Medium">M</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/51.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/52.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Blue
                                                        T-shirt for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$76.00</span>
                                                    <span class="old-price">$82.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/28.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$22.00"
                                                                    data-new="$17.00" data-tooltip="Medium">M</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/27.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-Shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">White
                                                        T-shirt for boys</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$50.00</span>
                                                    <span class="old-price">$60.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/27.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">X</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$27.00" data-new="$22.00"
                                                                    data-tooltip="Extra Large">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box d-n-1199">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/22.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/23.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Black
                                                        T-Shirt for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$71.00</span>
                                                    <span class="old-price">$98.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#000000;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/22.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$22.00"
                                                                    data-new="$17.00" data-tooltip="Medium">M</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 1st Product tab end -->
                        <!-- 2nd Product tab start -->
                        <div class="tab-pane fade" id="womens">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/33.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/34.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">50% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Women Tops</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Pink
                                                        T-shirt for women</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$7.00</span>
                                                    <span class="old-price">$9.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#74c7ff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#f39fab;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#85ffeb;"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">L</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/35.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/36.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Flower
                                                        T-Shirt for women</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$22.00</span>
                                                    <span class="old-price">$25.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/35.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/36.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">L</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$27.00" data-new="$22.00"
                                                                    data-tooltip="Extra Large">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/37.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/38.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">15% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Red
                                                        shirt for women</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$26.00</span>
                                                    <span class="old-price">$33.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/37.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/38.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/39.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/40.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Tops</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Flower
                                                        top for women</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$44.00</span>
                                                    <span class="old-price">$60.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#50aae7;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/39.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/41.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/41.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Top</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Feather
                                                        top for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$52.00</span>
                                                    <span class="old-price">$72.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#000000;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/41.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$25.00"
                                                                    data-new="$20.00" data-tooltip="Large">XL</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/18.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/19.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">50% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-Shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a
                                                        href="product-left-sidebar.html">Colorful T-shirt for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$55.00</span>
                                                    <span class="old-price">$82.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#74c7ff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#f39fab;"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$25.00"
                                                                    data-new="$20.00" data-tooltip="Large">L</a>
                                                            </li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$27.00" data-new="$22.00"
                                                                    data-tooltip="Extra Large">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/42.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/43.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="trending">Trending</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Red
                                                        T-shirt for women</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$26.00</span>
                                                    <span class="old-price">$35.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/28.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$22.00"
                                                                    data-new="$17.00" data-tooltip="Medium">M</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/24.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/25.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">15% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Pink
                                                        T-Shirt for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$15.00</span>
                                                    <span class="old-price">$20.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/25.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/24.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/20.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/21.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Shorts</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Girl
                                                        nightdress shorts</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$39.00</span>
                                                    <span class="old-price">$99.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#50aae7;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/32.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box d-n-1199">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/22.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/23.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Black
                                                        T-Shirt for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$71.00</span>
                                                    <span class="old-price">$98.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#000000;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/22.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$22.00"
                                                                    data-new="$17.00" data-tooltip="Medium">M</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 2nd Product tab end -->
                        <!-- 3rd Product tab start -->
                        <div class="tab-pane fade" id="mens">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/28.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/29.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">50% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Black
                                                        T-Shirt for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$152.00</span>
                                                    <span class="old-price">$200.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#74c7ff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#f39fab;"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">L</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="trending">Trending</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Blue
                                                        T-Shirt for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$125.00</span>
                                                    <span class="old-price">$250.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">L</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$27.00" data-new="$22.00"
                                                                    data-tooltip="Extra Large">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/27.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-Shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">T-Shirt
                                                        for boys</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$99.00</span>
                                                    <span class="old-price">$120.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#50aae7;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/44.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/45.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">15% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Jacket</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Jacket
                                                        for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$180.00</span>
                                                    <span class="old-price">$199.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/45.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/44.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/46.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/45.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Jacket</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Leather
                                                        jacket for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$255.00</span>
                                                    <span class="old-price">$299.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/46.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/47.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/48.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Suits</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Blue
                                                        suit for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$500.00</span>
                                                    <span class="old-price">$600.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#000000;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/47.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$25.00"
                                                                    data-new="$20.00" data-tooltip="Large">XL</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/50.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/50.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">50% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Suits</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Blue
                                                        suit for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$175.00</span>
                                                    <span class="old-price">$290.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#74c7ff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#f39fab;"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$25.00"
                                                                    data-new="$20.00" data-tooltip="Large">L</a>
                                                            </li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$27.00" data-new="$22.00"
                                                                    data-tooltip="Extra Large">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/51.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/52.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="trending">Trending</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Blue
                                                        T-shirt for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$76.00</span>
                                                    <span class="old-price">$82.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/28.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$22.00"
                                                                    data-new="$17.00" data-tooltip="Medium">M</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/27.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">15% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Pink
                                                        T-shirt for boy</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$15.00</span>
                                                    <span class="old-price">$20.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/25.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box d-n-1199">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Yellow
                                                        T-shirt for men</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$65.00</span>
                                                    <span class="old-price">$70.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$22.00"
                                                                    data-new="$17.00" data-tooltip="Medium">M</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 3rd Product tab end -->
                        <!-- 4th Product tab start -->
                        <div class="tab-pane fade" id="kids">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/24.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/25.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">50% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Pink
                                                        T-shirt for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$63.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#74c7ff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#f39fab;"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">X</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/27.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="trending">Trending</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Pink
                                                        T-shirt for boy</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$28.00</span>
                                                    <span class="old-price">$65.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/30.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/31.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">X</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/53.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/53.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">15% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Jacket</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Jacket
                                                        for boy</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$65.00</span>
                                                    <span class="old-price">$95.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/24.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/25.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/54.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/55.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Jacket</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Jacket
                                                        for girls</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$36.00</span>
                                                    <span class="old-price">$64.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#50aae7;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/32.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/56.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/57.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Frock</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Frock
                                                        for girls</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$34.00</span>
                                                    <span class="old-price">$95.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#000000;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/22.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$25.00"
                                                                    data-new="$20.00" data-tooltip="Large">XL</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/58.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/59.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">50% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-Shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Pink
                                                        T-shirt for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$75.00</span>
                                                    <span class="old-price">$86.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#74c7ff;"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#f39fab;"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$25.00"
                                                                    data-new="$20.00" data-tooltip="Large">X</a>
                                                            </li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$27.00" data-new="$22.00"
                                                                    data-tooltip="Extra Large">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/60.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/61.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="trending">Trending</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Jacket</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Cotton
                                                        jacket for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$63.00</span>
                                                    <span class="old-price">$85.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/60.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/61.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$22.00"
                                                                    data-new="$17.00" data-tooltip="Medium">M</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/25.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/24.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">15% Sale</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-Shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Round
                                                        t-shirt for girl</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$25.00</span>
                                                    <span class="old-price">$45.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/25.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/24.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li class="active"><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/27.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="trending">Trending</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">T-Shirt</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">White
                                                        T-shirt for boys</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$50.00</span>
                                                    <span class="old-price">$60.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/27.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/26.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$22.00" data-new="$17.00"
                                                                    data-tooltip="Medium">M</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$25.00" data-new="$20.00"
                                                                    data-tooltip="Large">X</a></li>
                                                            <li><a href="javascript:void(0)" class="cr-opt-sz"
                                                                    data-old="$27.00" data-new="$22.00"
                                                                    data-tooltip="Extra Large">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box d-n-1199">
                                    <div class="product-card-2">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/62.jpg"
                                                            alt="Product">
                                                        <img class="hover-image"
                                                            src="{{ asset('assets/frontend') }}/img/product/63.jpg"
                                                            alt="Product">
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="cr-pro-actions">
                                                        <a class="model-oraganic-product" data-bs-toggle="modal"
                                                            href="#quickview" role="button">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a href="compare.html" class="cr-btn-group compare"
                                                            title="Compare">
                                                            <i class="mdi mdi-vector-arrange-below"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                            class="add-to-cart cr-shopping-bag">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="cr-btn-group wishlist"
                                                            title="Wishlist">
                                                            <i class="ri-heart-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content">
                                                <div class="cr-info">
                                                    <a href="shop-left-sidebar.html">Jacket</a>
                                                    <div class="cr-pro-rating">
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                        <i class="ri-star-line fill"></i>
                                                    </div>
                                                </div>

                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html">Jacket
                                                        for girls</a>
                                                </h5>
                                                <span class="cr-price">
                                                    <span class="new-price">$65.00</span>
                                                    <span class="old-price">$94.00</span>
                                                </span>
                                                <div class="cr-pro-option">
                                                    <div class="cr-pro-color">
                                                        <ul class="cr-opt-swatch cr-change-img">
                                                            <li>
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <span style="background-color:#837aff;"></span>
                                                                </a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="javascript:void(0)" class="cr-opt-clr-img">
                                                                    <img src="{{ asset('assets/frontend') }}/img/product/22.jpg"
                                                                        alt="product">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cr-pro-size">
                                                        <ul class="cr-opt-size">
                                                            <li><a href="#" class="cr-opt-sz"
                                                                    data-old="$20.00" data-new="$15.00"
                                                                    data-tooltip="Small">S</a></li>
                                                            <li class="active"><a href="javascript:void(0)"
                                                                    class="cr-opt-sz" data-old="$22.00"
                                                                    data-new="$17.00" data-tooltip="Medium">M</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 4th Product tab end -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <section class="section-blog padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-banner">
                            <h2>Latest News</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12">
                    <div class="cr-blog-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-blog">
                                    <div class="cr-blog-image">
                                        <img src="{{ asset('assets/frontend') }}/img/blog/4.jpg" alt="blog-2">
                                        <div class="cr-blog-date">
                                            <span>
                                                10
                                                <code>oct</code>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cr-blog-content">
                                        <span><code>By Admin</code> | <a
                                                href="blog-left-sidebar.html">Snacks</a></span>
                                        <h5>Urna pretium elit mauris cursus at elit Vestibulum.</h5>
                                        <a class="read" href="blog-detail-left-sidebar.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-blog">
                                    <div class="cr-blog-image">
                                        <img src="{{ asset('assets/frontend') }}/img/blog/5.jpg" alt="blog-1">
                                        <div class="cr-blog-date">
                                            <span>
                                                09<code>sep</code>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cr-blog-content">
                                        <span><code>By Admin</code> | <a href="blog-left-sidebar.html">Food</a></span>
                                        <h5>Best guide to Shopping for organic ingredients.</h5>
                                        <a class="read" href="blog-detail-left-sidebar.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-blog">
                                    <div class="cr-blog-image">
                                        <img src="{{ asset('assets/frontend') }}/img/blog/6.jpg" alt="blog-2">
                                        <div class="cr-blog-date">
                                            <span>
                                                12
                                                <code>oct</code>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cr-blog-content">
                                        <span><code>By Admin</code> | <a
                                                href="blog-left-sidebar.html">Snacks</a></span>
                                        <h5>Cursus at elit vestibulum urna pretium elit mauris.</h5>
                                        <a class="read" href="blog-detail-left-sidebar.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-blog">
                                    <div class="cr-blog-image">
                                        <img src="{{ asset('assets/frontend') }}/img/blog/7.jpg" alt="blog-3">
                                        <div class="cr-blog-date">
                                            <span>
                                                22
                                                <code>jan</code>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cr-blog-content">
                                        <span><code>By Admin</code> | <a
                                                href="blog-left-sidebar.html">Vegetable</a></span>
                                        <h5>Condimentum Nam enim bestMorbi odio sodales.</h5>
                                        <a class="read" href="blog-detail-left-sidebar.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram -->
    <section class="section-insta padding-b-100" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <h2 class="d-none">@Instagram</h2>
            <div class="cr-insta swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#" class="cr-insta-image">
                            <img src="{{ asset('assets/frontend') }}/img/insta/9.jpg" alt="insta">
                            <div class="insta-overlay"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="cr-insta-image">
                            <img src="{{ asset('assets/frontend') }}/img/insta/10.jpg" alt="insta">
                            <div class="insta-overlay"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="cr-insta-image">
                            <img src="{{ asset('assets/frontend') }}/img/insta/11.jpg" alt="insta">
                            <div class="insta-overlay"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="cr-insta-image">
                            <img src="{{ asset('assets/frontend') }}/img/insta/12.jpg" alt="insta">
                            <div class="insta-overlay"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="cr-insta-image">
                            <img src="{{ asset('assets/frontend') }}/img/insta/13.jpg" alt="insta">
                            <div class="insta-overlay"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="cr-insta-image">
                            <img src="{{ asset('assets/frontend') }}/img/insta/14.jpg" alt="insta">
                            <div class="insta-overlay"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="cr-insta-image">
                            <img src="{{ asset('assets/frontend') }}/img/insta/15.jpg" alt="insta">
                            <div class="insta-overlay"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="cr-insta-image">
                            <img src="{{ asset('assets/frontend') }}/img/insta/16.jpg" alt="insta">
                            <div class="insta-overlay"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
