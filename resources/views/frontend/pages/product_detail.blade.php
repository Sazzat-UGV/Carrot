@extends('frontend.layouts.app')

@section('title')
    Details
@endsection

@push('style')
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Details'])
    <section class="section-product padding-t-100">
        <div class="container">
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-xxl-4 col-xl-5 col-md-6 col-12 mb-24">
                    <div class="vehicle-detail-banner banner-content clearfix">
                        <div class="banner-slider">
                            <div class="slider slider-for">
                                <div class="slider-banner-image">
                                    <div class="zoom-image-hover">
                                        <img src="{{ asset('uploads/product') }}/{{ $product->thumbnail }}" alt="image"
                                            class="product-image">
                                    </div>
                                </div>

                                @foreach (json_decode($product->images, true) as $image)
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="{{ asset('uploads/product') }}/{{ $image }}" alt="image"
                                                class="product-image">
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <div class="slider slider-nav thumb-image">
                                <!-- Main Thumbnail -->
                                <div class="thumbnail-image">
                                    <div class="thumbImg">
                                        <img src="{{ asset('uploads/product') }}/{{ $product->thumbnail }}" alt="image">
                                    </div>
                                </div>

                                @foreach (json_decode($product->images, true) as $image)
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="{{ asset('uploads/product') }}/{{ $image }}" alt="image">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-7 col-md-6 col-12 mb-24">
                    <div class="cr-size-and-weight-contain">
                        <h2 class="heading">{{ $product->name }}</h2>
                        <p>{{ $product->short_description }}</p>
                    </div>
                    <div class="cr-size-and-weight">
                        <div class="cr-review-star">
                            <div class="cr-star">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p>( 100 Review )</p>
                        </div>
                        <div class="list">
                            <ul>
                                <li><label>Brand <span>:</span></label>{{ $product->brand->name }}</li>
                                <li><label>Code <span>:</span></label>{{ $product->code }}</li>
                                <li><label>Warehouse <span>:</span></label>{{ $product->warehouse->name }}</li>
                                @if ($product->pickup_point)
                                    <li><label>Pickup Point <span>:</span></label>{{ $product->pickup_point->name }}</li>
                                @endif
                                <li><label>Stock <span>:</span></label>
                                    @if ($product->stock_quantity >= 1)
                                        <span class="badge" style="background: #64B496">In Stock</span>
                                    @else
                                        <span class="badge" style="background: #F5624A">Out of Stock</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="cr-product-price">
                            <span class="new-price">{{ $setting->currency }}{{ $product->selling_price }}</span>
                            @if ($product->discount_price)
                                <span class="old-price">{{ $setting->currency }}{{ $product->discount_price }}</span>
                            @endif
                        </div>
                        <div class="cr-size-weight">
                            <h5><span>Size</span> :</h5>
                            <div class="cr-kg">
                                <ul id="size-list">
                                    @foreach (json_decode($product->size) as $size)
                                        <li class="{{ $loop->first ? '' : '' }}">{{ $size->value }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="cr-size-weight">
                            <h5><span>Color</span> :</h5>
                            <div class="cr-kg">
                                <ul id="color-list">
                                    @foreach (json_decode($product->color) as $color)
                                        <li class="{{ $loop->first ? '' : '' }}">{{ $color->value }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="cr-add-card">
                            <div class="cr-qty-main">
                                <input type="text" placeholder="." value="1" minlength="1" maxlength="20"
                                    class="quantity">
                                <button type="button" class="plus">+</button>
                                <button type="button" class="minus">-</button>
                            </div>
                            <div class="cr-add-button">
                                <button type="button" class="cr-button cr-shopping-bag">Add to cart</button>
                            </div>
                            <div class="cr-card-icon">
                                <a href="javascript:void(0)" class="wishlist">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                    <i class="ri-eye-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-12">
                    <div class="cr-paking-delivery">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                    aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                type="button" role="tab" aria-controls="review"
                                aria-selected="false">Review</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                  {{ $product->description }}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="cr-tab-content-from">
                                    <div class="post">
                                        <div class="content">
                                            <img src="{{ asset('assets/frontend') }}/img/review/1.jpg" alt="review">
                                            <div class="details">
                                                <span class="date">Jan 08, 2024</span>
                                                <span class="name">Oreo Noman</span>
                                            </div>
                                            <div class="cr-t-review-rating">
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                            sapiente doloribus debitis corporis, eaque dicta, repellat amet, illum
                                            adipisci vel
                                            perferendis dolor! quae vero in perferendis provident quis.</p>
                                        <div class="content mt-30">
                                            <img src="{{ asset('assets/frontend') }}/img/review/2.jpg" alt="review">
                                            <div class="details">
                                                <span class="date">Mar 22, 2024</span>
                                                <span class="name">Lina Wilson</span>
                                            </div>
                                            <div class="cr-t-review-rating">
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-line"></i>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                            sapiente doloribus debitis corporis, eaque dicta, repellat amet, illum
                                            adipisci vel
                                            perferendis dolor! quae vero in perferendis provident quis.</p>
                                    </div>

                                    <h4 class="heading">Add a Review</h4>
                                    <form action="javascript:void(0)">
                                        <div class="cr-ratting-star">
                                            <span>Your rating :</span>
                                            <div class="cr-t-review-rating">
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-line"></i>
                                                <i class="ri-star-s-line"></i>
                                                <i class="ri-star-s-line"></i>
                                            </div>
                                        </div>
                                        <div class="cr-ratting-input">
                                            <input name="your-name" placeholder="Name" type="text">
                                        </div>
                                        <div class="cr-ratting-input">
                                            <input name="your-email" placeholder="Email*" type="email" required="">
                                        </div>
                                        <div class="cr-ratting-input form-submit">
                                            <textarea name="your-commemt" placeholder="Enter Your Comment"></textarea>
                                            <button class="cr-button" type="submit" value="Submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-products padding-tb-100" data-aos="fade-up" data-aos-duration="2000"
        data-aos-delay="400">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30">
                        <div class="cr-banner">
                            <h2>Related Products</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Browse through our recommendations and find the perfect additions to your collection.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-popular-product">
                        @foreach ($related_products as $rproduct)
                            <div class="slick-slide">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('uploads/product') }}/{{ $rproduct->thumbnail }}"
                                                alt="image">
                                        </div>
                                        <div class="cr-side-view">
                                            <a href="javascript:void(0)" class="wishlist">
                                                <i class="ri-heart-line"></i>
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
                                            <a href="shop-left-sidebar.html">{{ $rproduct->category->name }}</a>
                                            <div class="cr-star">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-line"></i>
                                                <p>(4.5)</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('productDetail', $rproduct->slug) }}"
                                            class="title">{{ Str::limit($rproduct->name, 25, '') }}</a>
                                        <p class="cr-price"><span
                                                class="new-price">{{ $setting->currency }}{{ $rproduct->selling_price }}</span>
                                            @if ($rproduct->discount_price)
                                                <span
                                                    class="old-price">{{ $setting->currency }}{{ $rproduct->discount_price }}</span>
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
