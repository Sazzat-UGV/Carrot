<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-header">
                    <a href="{{ url(' ') }}" class="cr-logo">
                        <img src="{{ asset('assets/frontend') }}/img/logo/logo.png" alt="logo" class="logo">
                        <img src="{{ asset('assets/frontend') }}/img/logo/dark-logo.png" alt="logo"
                            class="dark-logo">
                    </a>
                    <form class="cr-search">
                        <input class="search-input" type="text" placeholder="Search For items...">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>All Categories</option>
                            <option value="1">Mens</option>
                            <option value="2">Womens</option>
                            <option value="3">Electronics</option>
                        </select>
                        <a href="javascript:void(0)" class="search-btn">
                            <i class="ri-search-line"></i>
                        </a>
                    </form>
                    <div class="cr-right-bar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                    <i class="ri-user-3-line"></i>
                                    <span>Account</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="register.html">Register</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login.html">Login</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a href="wishlist.html" class="cr-right-bar-item">
                            <i class="ri-heart-3-line"></i>
                            <span>Wishlist</span>
                        </a>
                        <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                            <i class="ri-shopping-cart-line"></i>
                            <span>Cart</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cr-fix" id="cr-main-menu-desk">
        <div class="container">
            <div class="cr-menu-list">

                <div class="cr-category-icon-block">
                    <div class="cr-category-menu">
                        <div class="cr-category-toggle">
                            <i class="ri-menu-2-line"></i>
                        </div>
                    </div>
                    <div class="cr-cat-dropdown">
                        <div class="cr-cat-block">
                            <div class="cr-cat-tab">
                                <div class="cr-tab-list nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    @foreach ($categories as $category)
                                        <button class="nav-link @if ($loop->first) active @endif"
                                            id="v-{{ $category->id }}-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-{{ $category->id }}" type="button" role="tab"
                                            aria-controls="v-{{ $category->id }}"
                                            aria-selected="@if ($loop->first) true @else false @endif">
                                            {{ $category->category_name }}</button>
                                    @endforeach
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    @foreach ($categories as $category)
                                        <div class="tab-pane fade @if ($loop->first) show active @endif"
                                            id="v-{{ $category->id }}" role="tabpanel"
                                            aria-labelledby="v-{{ $category->id }}-tab">
                                            <div class="tab-list row">
                                                @php
                                                    $subcategories = \App\Models\Subcategory::where(
                                                        'category_id',
                                                        $category->id,
                                                    )->get();
                                                    $subcategoriesCount = $subcategories->count();
                                                    $subcategoriesPerColumn = ceil($subcategoriesCount / 2);
                                                @endphp
                                                <div class="col">
                                                    <ul class="cat-list">
                                                        @foreach ($subcategories->take($subcategoriesPerColumn) as $index => $subcategory)
                                                            <li><a class="nav-link @if ($index === 0) active @endif"
                                                                    id="v-sub-{{ $subcategory->id }}-tab"
                                                                    data-bs-toggle="pill"
                                                                    data-bs-target="#v-sub-{{ $subcategory->id }}"
                                                                    href="#">{{ $subcategory->subcategory_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="cat-list">
                                                        @foreach ($subcategories->slice($subcategoriesPerColumn) as $index => $subcategory)
                                                            <li><a class="nav-link @if ($index === 0) active @endif"
                                                                    id="v-sub-{{ $subcategory->id }}-tab"
                                                                    data-bs-toggle="pill"
                                                                    data-bs-target="#v-sub-{{ $subcategory->id }}"
                                                                    href="#">{{ $subcategory->subcategory_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    // Show the first category's subcategories by default
                                    $('.tab-pane:first').addClass('show active');

                                    // Handle click on category tab
                                    $('.nav-link').click(function() {
                                        $('.tab-pane').removeClass('show active'); // Hide all tab contents
                                        var target = $(this).attr('data-bs-target'); // Get target tab ID
                                        $(target).addClass('show active'); // Show target tab
                                    });
                                });
                            </script>

                        </div>
                    </div>

                </div>

                <nav class="navbar navbar-expand-lg">
                    <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                        <i class="ri-menu-3-line"></i>
                    </a>
                    <div class="cr-header-buttons">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:void(0)">
                                    <i class="ri-user-3-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="register.html">Register</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login.html">Login</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a href="javascript:void(0)" class="cr-right-bar-item">
                            <i class="ri-heart-line"></i>
                        </a>
                        <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                            <i class="ri-shopping-cart-line"></i>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Category
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="shop-left-sidebar.html">Shop Left
                                            sidebar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="shop-right-sidebar.html">Shop
                                            Right
                                            sidebar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="shop-full-width.html">Full
                                            Width</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Products
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="product-left-sidebar.html">product
                                            Left
                                            sidebar </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="product-right-sidebar.html">product
                                            Right
                                            sidebar </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="product-full-width.html">Product
                                            Full
                                            Width
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Pages
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="about.html">About Us</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="contact-us.html">Contact Us</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="cart.html">Cart</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="track-order.html">Track Order</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="faq.html">Faq</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login.html">Login</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="register.html">Register</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="policy.html">Policy</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
                <div class="cr-calling">
                    <i class="ri-phone-line"></i>
                    <a href="javascript:void(0)">+123 ( 456 ) ( 7890 )</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile menu -->
<div class="cr-sidebar-overlay"></div>
<div id="cr_mobile_menu" class="cr-side-cart cr-mobile-menu">
    <div class="cr-menu-title">
        <span class="menu-title">My Menu</span>
        <button type="button" class="cr-close">×</button>
    </div>
    <div class="cr-menu-inner">
        <div class="cr-menu-content">
            <ul>
                <li class="dropdown drop-list">
                    <a href="index.html">Home</a>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Category</a>
                    <ul class="sub-menu">
                        <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                        <li><a href="shop-right-sidebar.html">Shop Right sidebar</a></li>
                        <li><a href="shop-full-width.html">Full Width</a></li>
                    </ul>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">product</a>
                    <ul class="sub-menu">
                        <li><a href="product-left-sidebar.html">product Left sidebar</a></li>
                        <li><a href="product-right-sidebar.html">product Right sidebar</a></li>
                        <li><a href="product-full-width.html">Product Full Width </a></li>
                    </ul>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="track-order.html">Track Order</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="policy.html">Policy</a></li>
                    </ul>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                        <li><a href="blog-full-width.html">Full Width</a></li>
                        <li><a href="blog-detail-left-sidebar.html">Detail Left Sidebar</a></li>
                        <li><a href="blog-detail-right-sidebar.html">Detail Right Sidebar</a></li>
                        <li><a href="blog-detail-full-width.html">Detail Full Width</a></li>
                    </ul>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)">Element</a>
                    <ul class="sub-menu">
                        <li><a href="elements-products.html">Products</a></li>
                        <li><a href="elements-typography.html">Typography</a></li>
                        <li><a href="elements-buttons.html">Buttons</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
