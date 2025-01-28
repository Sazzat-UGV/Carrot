<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-header">
                    <a href="{{ route('homePage') }}" class="cr-logo">
                        <img src="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}" alt="logo" class="logo">
                        <img src="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}" alt="logo"
                            class="dark-logo">
                    </a>
                    <form class="cr-search">
                        <input class="search-input" type="text" placeholder="Search For items...">
                        @php
                            $categories = App\Models\Category::where('status', 1)->get();
                        @endphp
                        <select class="form-select" aria-label="Default select example">
                            <option selected>All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
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
                                    <span>@auth
                                            {{ Auth::user()->name }}
                                        @endauth
                                        @guest
                                            Account
                                        @endguest
                                    </span>
                                </a>
                                @auth
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class=" text-start" href="{{ route('dashboard') }}">
                                                My Profile
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0 logout">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-start custom-logout-btn"
                                                    style="font-size:14px; border: none; background: none; padding: 10px 20px; text-align: left; color: #7A7A7A;">
                                                    Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                @endauth
                                @guest
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        </li>
                                    </ul>
                                @endguest
                            </li>
                        </ul>
                        <a href="{{ route('wishlist_list') }}" class="cr-right-bar-item d-flex align-items-center">
                            <div class="icon-container position-relative">
                                <i class="ri-heart-line"></i>
                                @php
                                    $wishlist_count = App\Models\Wishlist::where('user_id', Auth::id())->count();
                                @endphp
                                @if ($wishlist_count)
                                    <p class="counter position-absolute text-danger text-bold">{{ $wishlist_count }}
                                    </p>
                                @endif
                            </div>
                            <span class="ms-2">Wishlist</span>
                        </a>
                        <a href="{{ route('my_cart') }}" class="cr-right-bar-item ">
                            <div class="icon-container position-relative">
                                <i class="ri-shopping-cart-line"></i>
                                <p class="counter position-absolute text-danger text-bold">
                                    @if (Cart::count())
                                        {{ Cart::count() }}
                                    @endif
                                </p>
                            </div>
                            <span class="ms-2">Cart</span>
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
                                @php
                                    $categories = App\Models\Category::with([
                                        'subcategories' => function ($query) {
                                            $query->where('status', 1);
                                        },
                                    ])
                                        ->where('status', 1)
                                        ->get();
                                @endphp

                                <!-- Tab Navigation -->
                                <div class="cr-tab-list nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    @foreach ($categories as $key => $category)
                                        <button class="nav-link {{ $key === 0 ? 'active' : '' }}"
                                            id="v-pills-{{ $category->id }}-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-{{ $category->id }}" type="button" role="tab"
                                            aria-controls="v-pills-{{ $category->id }}"
                                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                                            {{ $category->name }}
                                        </button>
                                    @endforeach
                                </div>

                                <!-- Tab Content -->
                                <div class="tab-content" id="v-pills-tabContent">
                                    @foreach ($categories as $key => $category)
                                        <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                            id="v-pills-{{ $category->id }}" role="tabpanel"
                                            aria-labelledby="v-pills-{{ $category->id }}-tab">
                                            <div class="tab-list row">
                                                @foreach ($category->subcategories as $subcategory)
                                                    <div class="col-md-6 mb-3">
                                                        <ul class="cat-list">
                                                            <li><a
                                                                    href="{{ route('allProducts', ['type' => 'subcategory', 'slug' => $subcategory->slug]) }}">{{ $subcategory->name }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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
                                    @auth
                                        <li>
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">My Profile</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0 logout">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-start custom-logout-btn"
                                                    style="font-size:14px; border: none; background: none; padding: 10px 20px; text-align: left; color: #7A7A7A;">
                                                    Logout
                                                </button>
                                            </form>
                                        </li>
                                    @endauth
                                    @guest
                                        <li>
                                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        </li>
                                    @endguest
                                </ul>
                            </li>
                        </ul>
                        <a href="{{ route('wishlist_list') }}" class="cr-right-bar-item">
                            <div class="icon-container position-relative">
                                <i class="ri-heart-line"></i>
                                @if ($wishlist_count)
                                    <p class="counter position-absolute text-danger text-bold">{{ $wishlist_count }}
                                    </p>
                                @endif
                            </div>
                        </a>
                        <a href="{{ route('my_cart') }}" class="cr-right-bar-item ">
                            <div class="icon-container position-relative">
                                <i class="ri-shopping-cart-line"></i>
                                <p class="counter position-absolute text-danger text-bold">
                                    @if (Cart::count())
                                        {{ Cart::count() }}
                                    @endif
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('homePage') }}">
                                    Home
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Categories
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('allProducts', ['type' => 'category', 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Campaign
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    FAQ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="cr-calling">
                    <i class="ri-phone-line"></i>
                    <a href="javascript:void(0)">{{ $setting->phone_number }}</a>
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
                    <a href="{{ route('homePage') }}">Home</a>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Categories</a>
                    <ul class="sub-menu">
                        @foreach ($categories as $category)
                            <li><a
                                    href="{{ route('allProducts', ['type' => 'category', 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="dropdown drop-list">
                    <a class="" href="#">
                        Campaign
                    </a>
                </li>
                <li class="dropdown drop-list">
                    <a class="" href="#">
                        FAQ
                    </a>
                </li>
                <li class="dropdown drop-list">
                    <a class="" href="#">
                        Blog
                    </a>
                </li>
                <li class="dropdown drop-list">
                    <a class="" href="#">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
