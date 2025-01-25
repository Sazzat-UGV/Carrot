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
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                @forelse ($products as $product)
                    <div class="col-lg-3 col-6 cr-product-box mb-24">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="{{ asset('uploads/product') }}/{{ $product->thumbnail }}" alt="image">
                                </div>
                                <div class="cr-side-view">
                                    <a class="" href="{{ route('wishlist_store',$product->id) }}">
                                        <i class="ri-close-line"></i>
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
                                    <a href="shop-left-sidebar.html">{{ $product->category->name }}</a>
                                    @php
                                        $averageRating =
                                            $product->reviews_count > 0
                                                ? round($product->reviews_sum_rating / $product->reviews_count, 1)
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
                                <a href="{{ route('productDetail', $product->slug) }}"
                                    class="title">{{ $product->name }}</a>
                                <p class="cr-price"><span
                                        class="new-price">{{ $setting->currency }}{{ $product->selling_price }}</span>
                                    @if ($product->discount_price)
                                        <span
                                            class="old-price">{{ $setting->currency }}{{ $product->discount_price }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                  <h1 style="color: #777777; text-align: center;">Nothing in wishlist.</h1>
                @endforelse
                {{ $products->links('pagination::custom_pagination') }}
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
