@extends('frontend.layouts.app')

@section('title')
    Checkout
@endsection

@push('style')
    <style>
        input.cr-form-control,
        input.form-control {
            margin-bottom: 0 !important;
        }

        .invalid-feedback {
            font-size: 13px !important;
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Checkout'])
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="cr-checkout-rightside col-lg-4 col-md-12">
                    <div class="cr-sidebar-wrap">
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Summary</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-pro">
                                    @foreach ($cart_items as $item)
                                        <div class="col-sm-12 mb-6">
                                            <div class="cr-product-inner" style="position: relative">
                                                <div class="cr-pro-image-outer">
                                                    <div class="cr-pro-image">
                                                        <a href="javascript::void(0)" class="image">
                                                            <img class="main-image"
                                                                src="{{ asset('uploads/product') }}/{{ $item->options->thumbnail }}"
                                                                alt="image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cr-pro-content cr-product-details">
                                                    <h5 class="cr-pro-title"><a
                                                            href="javascript::void(0)">{{ $item->name }}</a></h5>
                                                    <div class="cr-pro-rating d-flex list-inline gap-2 m-2">
                                                        @if ($item->options->color)
                                                            <li class="border border-1 px-2 py-0 rounded-1 m-0"
                                                                style="color: #7A7A7A; font-size: 11px;">
                                                                {{ $item->options->color }}</li>
                                                        @endif
                                                        @if ($item->options->size)
                                                            <li class="border border-1 px-2 py-0 rounded-1 m-0"
                                                                style="color: #7A7A7A; font-size: 11px;">
                                                                {{ $item->options->size }}</li>
                                                        @endif
                                                    </div>
                                                    <p class="cr-price"><span
                                                            class="new-price">{{ $setting->currency }}{{ $item->price }}</span>
                                                    </p>
                                                </div>
                                                <p class="align-items-center text-black"
                                                    style="font-weight: 500; position: absolute; bottom:2px; right: 0px;">
                                                    {{ $setting->currency }}{{ $item->price }}*{{ $item->qty }}={{ $setting->currency }}{{ $item->price * $item->qty }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <hr>
                                <div class="cr-checkout-summary">
                                    <div>
                                        <span class="text-left">Subtotal</span>
                                        <span class="text-right">{{ $setting->currency }}{{ Cart::subtotal() }}</span>
                                    </div>
                                    @if (Session::has('coupon'))
                                        <div>
                                            <div style="display: flex; align-items: center; justify-content: center;">
                                                <span class="text-left" style="margin-right: 8px;">Coupon
                                                    <b>({{ Session::get('coupon')['name'] }})</b></span>
                                                <a href="{{ route('remove_coupon') }}"
                                                    style="text-decoration: none; align-items: center; margin-top: 3px;">
                                                    <i class="ri-close-fill text-danger" style="font-size: 24px;"></i>
                                                </a>
                                            </div>

                                            <span
                                                class="text-right">{{ $setting->currency }}{{ Session::get('coupon')['discount'] }}</span>
                                        </div>
                                    @endif
                                    <div>
                                        <span class="text-left">Tax</span>
                                        <span class="text-right">%</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Delivery Charges</span>
                                        <span class="text-right">{{ $setting->currency }}</span>
                                    </div>
                                    @if (Session::has('coupon'))
                                        <div class="cr-checkout-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <span
                                                class="text-right">{{ $setting->currency }}{{ Session::get('coupon')['after_discount'] }}</span>
                                        </div>
                                    @else
                                        <div class="cr-checkout-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <span class="text-right">{{ $setting->currency }}{{ Cart::total() }}</span>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-checkout-pay-wrap">
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-pay">
                                    <div class="cr-pay-desc">Please select the preferred payment method to use on this
                                        order.</div>

                                    <span class="cr-pay-option">
                                        <span>
                                            <input type="radio" id="pay1" name="payment_method"
                                                value="Cash On Delivery" checked>
                                            <label for="pay1">Cash On Delivery</label>
                                        </span>
                                    </span>
                                    <span class="cr-pay-option">
                                        <span>
                                            <input type="radio" id="pay2" name="payment_method" value="SSLCOMMERZ">
                                            <label for="pay2">SSLCOMMERZ</label>
                                        </span>
                                    </span>
                                    <span class="cr-pay-option">
                                        <span>
                                            <input type="radio" id="pay3" name="payment_method" value="PayPal">
                                            <label for="pay3">PayPal</label>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="cr-sidebar-wrap cr-check-pay-img-wrap">
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-check-pay-img-inner">
                                    <div class="cr-check-pay-img">
                                        <img src="{{ asset('assets/frontend') }}/img/banner/payment.png" alt="payment">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cr-checkout-leftside col-lg-8 col-md-12 m-t-991">
                    <div class="cr-checkout-content">
                        <div class="cr-checkout-inner">

                            <div class="cr-checkout-wrap mb-30">
                                <div class="cr-checkout-block cr-check-bill">
                                    <h3 class="cr-checkout-title">Billing Details</h3>
                                    <div class="cr-bl-block-content">

                                        <div class="cr-check-bill-form mb-minus-24">
                                            <form action="{{ route('place_order') }}" method="post" id="place_order">
                                                @csrf
                                                <span class="cr-bill-wrap cr-bill-half mb-3">
                                                    <label>Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" placeholder="Enter name"
                                                        class="form-control @error('name')
                                                        is-invalid
                                                    @enderror">
                                                    @error('name')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half mb-3">
                                                    <label>Phone<span class="text-danger">*</span></label>
                                                    <input type="text" name="phone" placeholder="Enter phone"
                                                        class="form-control @error('phone')
                                                            is-invalid
                                                        @enderror">
                                                    @error('phone')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror </span>
                                                <span class="cr-bill-wrap mb-3">
                                                    <label>Address<span class="text-danger">*</span></label>
                                                    <input type="text" name="address" placeholder="Enter address"
                                                        class="form-control @error('address')
                                                                is-invalid
                                                            @enderror">
                                                    @error('address')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half mb-3">
                                                    <label>City<span class="text-danger">*</span></label>
                                                    <input type="text" name="city" placeholder="Enter city"
                                                        class="form-control @error('city')
                                                                is-invalid
                                                            @enderror">
                                                    @error('city')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half  mb-3">
                                                    <label>Post Code<span class="text-danger">*</span></label>
                                                    <input type="text" name="postalcode"
                                                        class="form-control @error('postalcode')
                                                                is-invalid
                                                            @enderror"
                                                        placeholder="Enter post code">
                                                    @error('postalcode')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half mb-3">
                                                    <label>Country<span class="text-danger">*</span></label>
                                                    <input type="text" name="country" placeholder="Enter country"
                                                        class="form-control @error('country')
                                                        is-invalid
                                                    @enderror">
                                                    @error('country')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half mb-3">
                                                    <label>Region State</label>
                                                    <input type="text" name="region_state"
                                                        class="form-control @error('region_state')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Enter region state">
                                                    @error('region_state')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </span>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @if (!Session::has('coupon'))
                                <div class="cr-checkout-wrap">
                                    <div class="cr-checkout-block cr-check-new">
                                        <h3 class="cr-checkout-title">Coupon Apply</h3>
                                        <div class="cr-check-block-content">
                                            <div class="cr-check-bill-form mb-minus-24">
                                                <form action="{{ route('apply_coupon') }}" method="post">
                                                    @csrf
                                                    <span class="cr-bill-wrap">
                                                        <input type="text" name="coupon_code"
                                                            class="form-control @error('coupon_code')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="Enter coupon code">
                                                        @error('coupon_code')
                                                            <span class="invalid-feedback"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                        <button type="submit" class="cr-button mt-4">Apply
                                                            Coupon</button>
                                                    </span>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <span class="cr-check-order-btn">
                                <a href="javascript::void(0)" class="cr-button mt-30 place_order_submit">Place Order</a>
                            </span>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.place_order_submit').on('click', function(event) {
                event.preventDefault();
                var paymentMethod = $('input[name="payment_method"]:checked').val();
                if (!$('#place_order input[name="payment_method"]').length) {
                    $('#place_order').append('<input type="hidden" name="payment_method" value="' +
                        paymentMethod + '">');
                } else {
                    $('#place_order input[name="payment_method"]').val(paymentMethod);
                }
                $('#place_order').submit();
            });
        });
    </script>
@endpush
