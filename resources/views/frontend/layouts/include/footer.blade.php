    <!-- Footer -->
    <footer class="footer padding-t-100 bg-off-white">
        <div class="container">
            <div class="row footer-top padding-b-100">
                <div class="col-xl-4 col-lg-6 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer-logo">
                        <div class="image">
                            <img src="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}" alt="logo"
                                class="logo">
                            <img src="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}" alt="logo"
                                class="dark-logo">
                        </div>
                        <p>{{ $setting->site_description }}
                        </p>
                    </div>
                    <div class="cr-footer">
                        <h4 class="cr-sub-title cr-title-hidden">
                            Contact us
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li class="location-icon">
                                {{ $setting->physical_address }}
                            </li>
                            <li class="mail-icon">
                                <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            </li>
                            <li class="phone-icon">
                                <a href="{{ $setting->phone_number }}">{{ $setting->phone_number }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer">
                        <h4 class="cr-sub-title">
                            Company
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="track-order.html">Delivery Information</a></li>
                            <li><a href="policy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms & Conditions</a></li>
                            <li><a href="contact-us.html">contact Us</a></li>
                            <li><a href="faq.html">Support Center</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-12 col-12 cr-footer-border footer-list">
                    <div class="cr-footer">
                        <h4 class="cr-sub-title">
                            Category
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li><a href="shop-left-sidebar.html">Fashion & Clothes</a></li>
                            <li><a href="shop-left-sidebar.html">Dairy & Bakery</a></li>
                            <li><a href="shop-left-sidebar.html">Fruits & Vegetable</a></li>
                            <li><a href="shop-left-sidebar.html">Snack & Spice</a></li>
                            <li><a href="shop-left-sidebar.html">Juice & Drinks</a></li>
                            <li><a href="shop-left-sidebar.html">Fast Food</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer cr-newsletter">
                        <h4 class="cr-sub-title">
                            Newsletter
                            <span class="cr-heading-res"></span>
                        </h4>
                        <div class="cr-footer-links cr-footer-dropdown">
                            <p class="news">Subscribe to get in touch.</p>
                            <form class="cr-search-footer">
                                <input class="search-input" type="text" placeholder="Search here...">
                                <a href="javascript:void(0)" class="search-btn">
                                    <i class="ri-send-plane-fill"></i>
                                </a>
                            </form>
                        </div>
                        <div class="cr-social-media">
                            @if ($setting->facebook_url)
                                <span><a href="{{ $setting->facebook_url }}"><i
                                            class="ri-facebook-line"></i></a></span>
                            @endif
                            @if ($setting->twitter_url)
                                <span><a href="{{ $setting->twitter_url }}"><i
                                            class="ri-twitter-x-line"></i></a></span>
                            @endif
                            @if ($setting->instagram_url)
                                <span><a href="{{ $setting->instagram_url }}"><i
                                            class="ri-instagram-line"></i></a></span>
                            @endif
                            @if ($setting->linkedin_url)
                                <span><a href="{{ $setting->linkedin_url }}"><i
                                            class="ri-linkedin-line"></i></a></span>
                            @endif
                            @if ($setting->youtube_url)
                                <span><a href="{{ $setting->youtube_url }}"><i class="ri-youtube-line"></i></a></span>
                            @endif
                        </div>
                        <div class="cr-apps">
                            <a href="#" class="app-img"><img
                                    src="{{ asset('assets/frontend') }}/img/apps/android.png" class="adroid"
                                    alt="apple"></a>
                            <a href="#" class="app-img"><img
                                    src="{{ asset('assets/frontend') }}/img/apps/apple.png" class="apple"
                                    alt="apple"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cr-last-footer">
                <p>&copy; <span id="copyright_year"></span> <a
                        href="{{ route('homePage') }}">{{ $setting->site_name }}</a>, All rights reserved.
                </p>
                <div class="payment-link">
                    <img src="{{ asset('assets/frontend') }}/img/banner/payment.png" alt="payment">
                </div>
            </div>
        </div>
    </footer>
