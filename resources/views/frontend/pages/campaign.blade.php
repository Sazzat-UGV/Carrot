@extends('frontend.layouts.app')
@section('title')
    Campaign
@endsection

@push('style')
@endpush

@section('content')
<section class="cr-product-tab cr-products padding-b-100 wow fadeInUp padding-t-50">
        <div class="container">
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000">
                <div class="col">
                    <div class="tab-content">
                        <div class="tab-pane fade show active product-block" id="all">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div
                                        class="col-md-4 col-sm-6 col-xs-6 cr-col-5 cr-product-box mb-4">
                                        <div class="cr-product-card">
                                            <div class="cr-product-image">
                                                <div class="cr-image-inner zoom-image-hover">
                                                    <img src="{{ asset('uploads/product') }}/{{ $product->thumbnail }}"
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
                                                                ->where('product_id', $product->id)
                                                                ->first();
                                                        }
                                                    @endphp
                                                    <a href="{{ route('wishlist_store', $product->id) }}"
                                                        class="">
                                                        @if ($wishlist)
                                                            <i class="ri-heart-fill"></i>
                                                        @else
                                                            <i class="ri-heart-line"></i>
                                                        @endif
                                                    </a>

                                                </div>
                                                <a class="cr-shopping-bag" href="javascript:void(0)">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </a>
                                            </div>
                                            <div class="cr-product-details">
                                                <div class="cr-brand">
                                                    <a
                                                        href="{{ route('allProducts', ['type' => 'category', 'slug' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                                                    @php
                                                        $averageRating =
                                                            $product->reviews_count > 0
                                                                ? round(
                                                                    $product->reviews_sum_rating /
                                                                        $product->reviews_count,
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
                                                <a href="{{ route('campaign.products.details', [$campaign->id, $product->id]) }}"
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
                                @endforeach
                            </div>
                            {{ $products->links('pagination::custom_pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
