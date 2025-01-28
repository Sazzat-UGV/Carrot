@extends('frontend.layouts.app')

@section('title')
    Checkout
@endsection

@push('style')
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
                                        <span class="text-left">Sub-Total</span>
                                        <span class="text-right">$00.00</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Delivery Charges</span>
                                        <span class="text-right">$00.00</span>
                                    </div>
                                    <div class="cr-checkout-summary-total">
                                        <span class="text-left">Total Amount</span>
                                        <span class="text-right">$00.00</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>



                    {{-- <div class="cr-sidebar-wrap cr-checkout-del-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Delivery Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-del">
                                    <div class="cr-del-desc">Please select the preferred shipping method to use on this
                                        order.</div>
                                    <form action="#">
                                        <span class="cr-del-option">
                                            <span>
                                                <span class="cr-del-opt-head">Free Shipping</span>
                                                <input type="radio" id="del1" name="radio-group" checked="">
                                                <label for="del1">Rate - $0 .00</label>
                                            </span>
                                            <span>
                                                <span class="cr-del-opt-head">Flat Rate</span>
                                                <input type="radio" id="del2" name="radio-group">
                                                <label for="del2">Rate - $5.00</label>
                                            </span>
                                        </span>
                                        <span class="cr-del-commemt">
                                            <span class="cr-del-opt-head">Add Comments About Your Order</span>
                                            <textarea name="your-commemt" placeholder="Comments"></textarea>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div> --}}





                    <div class="cr-sidebar-wrap cr-checkout-pay-wrap">
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-pay">
                                    <div class="cr-pay-desc">Please select the preferred payment method to use on this
                                        order.</div>
                                    <form action="#" class="payment-options">
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay1" name="radio-group" checked="">
                                                <label for="pay1">Cash On Delivery</label>
                                            </span>
                                        </span>
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay2" name="radio-group">
                                                <label for="pay2">SSLCOMMERZ</label>
                                            </span>
                                        </span>
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay3" name="radio-group">
                                                <label for="pay3">PayPal</label>
                                            </span>
                                        </span>
                                    </form>
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
                                <div class="cr-checkout-block cr-check-new">
                                    <h3 class="cr-checkout-title">New Customer</h3>
                                    <div class="cr-check-block-content">
                                        <div class="cr-check-subtitle">Checkout Options</div>
                                        <form action="#">
                                            <span class="cr-new-option">
                                                <span>
                                                    <input type="radio" id="account1" name="radio-group"
                                                        checked="">
                                                    <label for="account1">Register Account</label>
                                                </span>
                                                <span>
                                                    <input type="radio" id="account2" name="radio-group">
                                                    <label for="account2">Guest Account</label>
                                                </span>
                                            </span>
                                        </form>
                                        <div class="cr-new-desc">By creating an account you will be able to shop faster,
                                            be up to date on an order's status, and keep track of the orders you have
                                            previously made.
                                        </div>
                                        <span>
                                            <button class="cr-button mt-30" type="submit">Continue</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="cr-checkout-block cr-check-login">
                                    <h3 class="cr-checkout-title">Returning Customer</h3>
                                    <div class="cr-check-login-form">
                                        <form action="#" method="post">
                                            <span class="cr-check-login-wrap">
                                                <label>Email Address</label>
                                                <input type="text" name="name"
                                                    placeholder="Enter your email address" required="">
                                            </span>
                                            <span class="cr-check-login-wrap">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Enter your password"
                                                    required="">
                                            </span>

                                            <span class="cr-check-login-wrap cr-check-login-btn">
                                                <button class="cr-button mr-15" type="submit">Login</button>
                                                <a class="cr-check-login-fp" href="#">Forgot Password?</a>
                                            </span>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="cr-checkout-wrap">
                                <div class="cr-checkout-block cr-check-bill">
                                    <h3 class="cr-checkout-title">Billing Details</h3>
                                    <div class="cr-bl-block-content">
                                        <div class="cr-check-subtitle">Checkout Options</div>
                                        <span class="cr-bill-option">
                                            <span>
                                                <input type="radio" id="bill1" name="radio-group">
                                                <label for="bill1">I want to use an existing address</label>
                                            </span>
                                            <span>
                                                <input type="radio" id="bill2" name="radio-group" checked="">
                                                <label for="bill2">I want to use new address</label>
                                            </span>
                                        </span>
                                        <div class="cr-check-bill-form mb-minus-24">
                                            <form action="#" method="post">
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>First Name*</label>
                                                    <input type="text" name="firstname"
                                                        placeholder="Enter your first name" required="">
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Last Name*</label>
                                                    <input type="text" name="lastname"
                                                        placeholder="Enter your last name" required="">
                                                </span>
                                                <span class="cr-bill-wrap">
                                                    <label>Address</label>
                                                    <input type="text" name="address" placeholder="Address Line 1">
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>City *</label>
                                                    <span class="cr-bl-select-inner">
                                                        <select name="cr_select_city" id="cr-select-city"
                                                            class="cr-bill-select">
                                                            <option selected="" disabled="">City</option>
                                                            <option value="1">City 1</option>
                                                            <option value="2">City 2</option>
                                                            <option value="3">City 3</option>
                                                            <option value="4">City 4</option>
                                                            <option value="5">City 5</option>
                                                        </select>
                                                    </span>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Post Code</label>
                                                    <input type="text" name="postalcode" placeholder="Post Code">
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Country *</label>
                                                    <span class="cr-bl-select-inner">
                                                        <select name="cr_select_country" id="cr-select-country"
                                                            class="cr-bill-select">
                                                            <option selected="" disabled="">Country</option>
                                                            <option value="1">Country 1</option>
                                                            <option value="2">Country 2</option>
                                                            <option value="3">Country 3</option>
                                                            <option value="4">Country 4</option>
                                                            <option value="5">Country 5</option>
                                                        </select>
                                                    </span>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Region State</label>
                                                    <span class="cr-bl-select-inner">
                                                        <select name="cr_select_state" id="cr-select-state"
                                                            class="cr-bill-select">
                                                            <option selected="" disabled="">Region/State</option>
                                                            <option value="1">Region/State 1</option>
                                                            <option value="2">Region/State 2</option>
                                                            <option value="3">Region/State 3</option>
                                                            <option value="4">Region/State 4</option>
                                                            <option value="5">Region/State 5</option>
                                                        </select>
                                                    </span>
                                                </span>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <span class="cr-check-order-btn">
                                <a class="cr-button mt-30" href="#">Place Order</a>
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
@endpush
