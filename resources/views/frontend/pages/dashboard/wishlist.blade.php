@extends('frontend.layouts.app')

@section('title')
    Wishlist
@endsection

@push('style')
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Wishlist'])
    <section class="section-wishlist padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Wishlist</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                @foreach ($wishlists as $wishlist)
                <div class="col-lg-3 col-6 cr-product-box mb-24">
                    <div class="cr-product-card">
                        <div class="cr-product-image">
                            <div class="cr-image-inner zoom-image-hover">
                                <img src="{{ asset('uploads/product') }}/{{ $wishlist->product->thumbnail }}" alt="image">
                            </div>
                            <div class="cr-side-view">
                                <a class="cr-remove-product" href="javascript:void(0)">
                                    <i class="ri-close-line"></i>
                                </a>
                                <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                    <i class="ri-eye-line"></i>
                                </a>
                            </div>
                            <a class="cr-shopping-bag" href="javascript:void(0)">
                                <i class="ri-shopping-bag-line"></i>
                            </a>
                        </div>
                        <div class="cr-product-details">
                            <div class="cr-brand">
                                <a href="shop-left-sidebar.html">{{ $wishlist->product->category->name }}</a>
                                <div class="cr-star">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                    <p>(4.5)</p>
                                </div>
                            </div>
                            <a href="product-left-sidebar.html" class="title">{{ $wishlist->product->name }}</a>
                            <p class="cr-price"><span class="new-price">{{ $setting->currency }}{{ $wishlist->product->selling_price }}</span> @if ($wishlist->product->discount_price)
                                <span
                                    class="old-price">{{ $setting->currency }}{{ $wishlist->product->discount_price }}</span>
                            @endif</p>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $wishlists->links('pagination::custom_pagination') }}
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
