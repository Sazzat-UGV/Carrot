@extends('frontend.layouts.app')

@section('title')
    Shop
@endsection

@push('style')
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Shop'])
    <section class="section-shop padding-tb-100">
        <div class="container">
            <form action="{{ route('allProducts', ['type' => 'filter', 'slug' => 'data']) }}">
                <div class="row" style="display: flex;">
                    <div class="col-lg-3 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-shop-sideview">
                            <div class="cr-shop-categories">
                                <h4 class="cr-shop-sub-title">Category</h4>
                                <div class="cr-checkbox">
                                    @foreach ($categories as $category)
                                        <div class="checkbox-group">
                                            <input type="checkbox" id="category-{{ $category->id }}" name="category_id[]"
                                                value="{{ $category->id }}"
                                                @if (is_array(request('category_id')) && in_array($category->id, request('category_id'))) checked @endif>
                                            <label for="category-{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                            <span>[{{ $category->products_count }}]</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @if ($colors)
                                <div class="cr-shop-color">
                                    <h4 class="cr-shop-sub-title">Colors</h4>
                                    <div class="cr-checkbox">
                                        @foreach ($colors as $color)
                                            <div class="checkbox-group">
                                                <input type="checkbox" id="{{ $color }}" name="color[]"
                                                    value="{{ $color }}"
                                                    @if (is_array(request('color')) && in_array($color, request('color'))) checked @endif>
                                                <label for="{{ $color }}">{{ $color }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if ($sizes)
                                <div class="cr-shop-weight">
                                    <h4 class="cr-shop-sub-title">Sizes</h4>
                                    <div class="cr-checkbox">
                                        @foreach ($sizes as $size)
                                            <div class="checkbox-group">
                                                <input type="checkbox" id="{{ $size }}" name="size[]"
                                                    value="{{ $size }}"
                                                    @if (is_array(request('size')) && in_array($size, request('size'))) checked @endif>
                                                <label for="{{ $size }}">{{ $size }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="cr-shop-tags">
                                <button type="submit" class="cr-button">Filter</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                        <div class="row">
                            <div class="col-12">
                                <div class="cr-shop-bredekamp">
                                    <div class="cr-toggle">
                                        <a href="javascript:void(0)" class="gridCol active-grid">
                                            <i class="ri-grid-line"></i>
                                        </a>
                                    </div>
                                    <div class="center-content">
                                        <span>We found {{ $totalProducts }} items for you!</span>
                                    </div>
                                    <div class="cr-select">
                                        <label>Sort By :</label>
                                        <select class="form-select" aria-label="Default select example" name="sort_by">
                                            <option value="name_asc" @if (request('sort_by') == 'name_asc') selected @endif>Name:
                                                A to Z</option>
                                            <option value="name_desc" @if (request('sort_by') == 'name_desc') selected @endif>
                                                Name: Z to A</option>
                                            <option value="price_asc" @if (request('sort_by') == 'price_asc') selected @endif>
                                                Price: Low to High</option>
                                            <option value="price_desc" @if (request('sort_by') == 'price_desc') selected @endif>
                                                Price: High to Low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-100 mb-minus-24">
                            @foreach ($products as $product)
                                <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
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
                                                <a href="{{ route('wishlist_store', $product->id) }}" class="">
                                                    @if ($wishlist)
                                                        <i class="ri-heart-fill"></i>
                                                    @else
                                                        <i class="ri-heart-line"></i>
                                                    @endif
                                                </a>
                                                <a class="model-oraganic-product quickViewModal" data-bs-toggle="modal"
                                                    href="#" data-id="{{ $product->id }}" role="button">
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
                                                    href="{{ route('allProducts', ['type' => 'category', 'slug' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                                                @php
                                                    $averageRating =
                                                        $product->reviews_count > 0
                                                            ? round(
                                                                $product->reviews_sum_rating / $product->reviews_count,
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
                            @endforeach
                        </div>
                        {{ $products->appends(request()->query())->links('pagination::custom_pagination') }}
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@push('script')
@endpush
