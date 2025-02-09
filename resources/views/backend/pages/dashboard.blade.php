@extends('backend.layouts.app')
@section('title')
    Dashboard
@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row g-6 mb-6">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Category</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_category }}</h4>
                                        <p class="text-success mb-0">({{ $total_active_category }})</p>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class="bx bx-category-alt bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Subcategory</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_subcategory }}</h4>
                                        <p class="text-success mb-0">({{ $total_active_subcategory }})</p>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-secondary">
                                        <i class="bx bx-category-alt bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Brand</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_brand }}</h4>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-info">
                                        <i class="bx bxs-category-alt bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Warehouse</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_warehouse }}</h4>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class="bx bx-buildings bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Active Coupon</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $active_coupon }}</h4>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-danger">
                                        <i class="bx bxs-coupon bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Pickup Point</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_pickup_point }}</h4>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-success">
                                        <i class="bx bxs-truck bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Product</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_product }}</h4>
                                        <p class="text-success mb-0">({{ $total_active_product }})</p>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-dark">
                                        <i class="bx  bx-shopping-bag bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Campaign</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_campaign }}</h4>
                                        <p class="text-success mb-0">({{ $total_active_campaign }})</p>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class="bx bx-list-check bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Blog</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_blog }}</h4>
                                        <p class="text-success mb-0">({{ $total_active_blog }})</p>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-secondary">
                                        <i class="bx bxl-blogger bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">User</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_user }}</h4>
                                        <p class="text-success mb-0">({{ $total_active_user }})</p>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-info">
                                        <i class="bx bx-user bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Order</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_order }}</h4>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class="bx bx-list-ol bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>









                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Paid Users</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">4,567</h4>
                                        <p class="text-success mb-0">(+18%)</p>
                                    </div>
                                    <small class="mb-0">Last week analytics </small>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-danger">
                                        <i class="bx bx-user-plus bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Active Users</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">19,860</h4>
                                        <p class="text-danger mb-0">(-14%)</p>
                                    </div>
                                    <small class="mb-0">Last week analytics</small>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-success">
                                        <i class="bx bx-user-check bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Pending Users</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">237</h4>
                                        <p class="text-success mb-0">(+42%)</p>
                                    </div>
                                    <small class="mb-0">Last week analytics</small>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class="bx bx-user-voice bx-lg"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Top Courses</h5>
                    <div class="dropdown">
                        <button class="btn text-muted p-0" type="button" id="topCourses" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="topCourses">
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">View All</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex mb-6 align-items-center">
                            <div class="avatar flex-shrink-0 me-4">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bx-video bx-lg"></i></span>
                            </div>
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-8 col-md-12 col-xxl-8 mb-1 mb-sm-0 mb-md-1 mb-xxl-0">
                                    <h6 class="mb-0">Videography Basic Design Course</h6>
                                </div>
                                <div class="col-sm-4 col-md-12 col-xxl-4 d-flex justify-content-xxl-end">
                                    <div class="badge bg-label-secondary">1.2k Views</div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-6 align-items-center">
                            <div class="avatar flex-shrink-0 me-4">
                                <span class="avatar-initial rounded bg-label-info"><i
                                        class="bx bx-code-alt bx-lg"></i></span>
                            </div>
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-8 col-md-12 col-xxl-8 mb-1 mb-sm-0 mb-md-1 mb-xxl-0">
                                    <h6 class="mb-0">Basic Front-end Development Course</h6>
                                </div>
                                <div class="col-sm-4 col-md-12 col-xxl-4 d-flex justify-content-xxl-end">
                                    <div class="badge bg-label-secondary">834 Views</div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-6 align-items-center">
                            <div class="avatar flex-shrink-0 me-4">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class="bx bx-camera bx-lg"></i></span>
                            </div>
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-8 col-md-12 col-xxl-8 mb-1 mb-sm-0 mb-md-1 mb-xxl-0">
                                    <h6 class="mb-0">Basic Fundamentals of Photography</h6>
                                </div>
                                <div class="col-sm-4 col-md-12 col-xxl-4 d-flex justify-content-xxl-end">
                                    <div class="badge bg-label-secondary">3.7k Views</div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-6 align-items-center">
                            <div class="avatar flex-shrink-0 me-4">
                                <span class="avatar-initial rounded bg-label-warning"><i
                                        class="bx bx-basketball bx-lg"></i></span>
                            </div>
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-8 col-md-12 col-xxl-8 mb-1 mb-sm-0 mb-md-1 mb-xxl-0">
                                    <h6 class="mb-0">Advance Dribble Base Visual Design</h6>
                                </div>
                                <div class="col-sm-4 col-md-12 col-xxl-4 d-flex justify-content-xxl-end">
                                    <div class="badge bg-label-secondary">2.5k Views</div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="avatar flex-shrink-0 me-4">
                                <span class="avatar-initial rounded bg-label-danger"><i
                                        class="bx bx-microphone bx-lg"></i></span>
                            </div>
                            <div class="row w-100 align-items-center">
                                <div class="col-sm-8 col-md-12 col-xxl-8 mb-1 mb-sm-0 mb-md-1 mb-xxl-0">
                                    <h6 class="mb-0">Your First Singing Lesson</h6>
                                </div>
                                <div class="col-sm-4 col-md-12 col-xxl-4 d-flex justify-content-xxl-end">
                                    <div class="badge bg-label-secondary">948 Views</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Transactions</h5>
                    <div class="dropdown">
                        <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <ul class="p-0 m-0">
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/backend') }}/img/icons/unicons/paypal.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Paypal</small>
                                    <h6 class="fw-normal mb-0">Send money</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">+82.6</h6> <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/backend') }}/img/icons/unicons/wallet.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Wallet</small>
                                    <h6 class="fw-normal mb-0">Mac'D</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">+270.69</h6> <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/backend') }}/img/icons/unicons/chart.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Transfer</small>
                                    <h6 class="fw-normal mb-0">Refund</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">+637.91</h6> <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/backend') }}/img/icons/unicons/cc-primary.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Credit Card</small>
                                    <h6 class="fw-normal mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">-838.71</h6> <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/backend') }}/img/icons/unicons/wallet.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Wallet</small>
                                    <h6 class="fw-normal mb-0">Starbucks</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">+203.33</h6> <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/backend') }}/img/icons/unicons/cc-warning.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Mastercard</small>
                                    <h6 class="fw-normal mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">-92.45</h6> <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="mb-1 me-2">Order Statistics</h5>
                        <p class="card-subtitle">42.82k Total Sales</p>
                    </div>
                    <div class="dropdown">
                        <button class="btn text-muted p-0" type="button" id="orederStatistics"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-6" style="position: relative;">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h3 class="mb-1">8,258</h3>
                            <small>Total Orders</small>
                        </div>
                        <div id="orderStatisticsChart" style="min-height: 117.55px;">
                            <div id="apexchartsdsvhl4zz"
                                class="apexcharts-canvas apexchartsdsvhl4zz apexcharts-theme-light"
                                style="width: 110px; height: 117.55px;"><svg id="SvgjsSvg2170" width="110"
                                    height="117.55" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG2172" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(-7, 0)">
                                        <defs id="SvgjsDefs2171">
                                            <clipPath id="gridRectMaskdsvhl4zz">
                                                <rect id="SvgjsRect2174" width="130" height="153" x="-4.5" y="-2.5"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskdsvhl4zz"></clipPath>
                                            <clipPath id="nonForecastMaskdsvhl4zz"></clipPath>
                                            <clipPath id="gridRectMarkerMaskdsvhl4zz">
                                                <rect id="SvgjsRect2175" width="125" height="152" x="-2" y="-2"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <g id="SvgjsG2176" class="apexcharts-pie">
                                            <g id="SvgjsG2177" transform="translate(0, 0) scale(1)">
                                                <circle id="SvgjsCircle2178" r="37.518292682926834" cx="60.5"
                                                    cy="60.5" fill="transparent"></circle>
                                                <g id="SvgjsG2179" class="apexcharts-slices">
                                                    <g id="SvgjsG2180" class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Electronic" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath2181"
                                                            d="M 60.5 10.475609756097555 A 50.024390243902445 50.024390243902445 0 0 1 110.52439024390245 60.5 L 98.01829268292684 60.5 A 37.518292682926834 37.518292682926834 0 0 0 60.5 22.981707317073166 L 60.5 10.475609756097555 z"
                                                            fill="rgba(113,221,55,1)" fill-opacity="1" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5" stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-0"
                                                            index="0" j="0" data:angle="90" data:startAngle="0"
                                                            data:strokeWidth="5" data:value="50"
                                                            data:pathOrig="M 60.5 10.475609756097555 A 50.024390243902445 50.024390243902445 0 0 1 110.52439024390245 60.5 L 98.01829268292684 60.5 A 37.518292682926834 37.518292682926834 0 0 0 60.5 22.981707317073166 L 60.5 10.475609756097555 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                    <g id="SvgjsG2182" class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Sports" rel="2" data:realIndex="1">
                                                        <path id="SvgjsPath2183"
                                                            d="M 110.52439024390245 60.5 A 50.024390243902445 50.024390243902445 0 0 1 15.92794192413799 83.21059792599539 L 27.07095644310349 77.53294844449654 A 37.518292682926834 37.518292682926834 0 0 0 98.01829268292684 60.5 L 110.52439024390245 60.5 z"
                                                            fill="rgba(105,108,255,1)" fill-opacity="1"
                                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-1"
                                                            index="0" j="1" data:angle="153" data:startAngle="90"
                                                            data:strokeWidth="5" data:value="85"
                                                            data:pathOrig="M 110.52439024390245 60.5 A 50.024390243902445 50.024390243902445 0 0 1 15.92794192413799 83.21059792599539 L 27.07095644310349 77.53294844449654 A 37.518292682926834 37.518292682926834 0 0 0 98.01829268292684 60.5 L 110.52439024390245 60.5 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                    <g id="SvgjsG2184" class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Decor" rel="3" data:realIndex="2">
                                                        <path id="SvgjsPath2185"
                                                            d="M 15.92794192413799 83.21059792599539 A 50.024390243902445 50.024390243902445 0 0 1 12.923977684844871 45.04161328138981 L 24.817983263633657 48.90620996104236 A 37.518292682926834 37.518292682926834 0 0 0 27.07095644310349 77.53294844449654 L 15.92794192413799 83.21059792599539 z"
                                                            fill="rgba(133,146,163,1)" fill-opacity="1"
                                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-2"
                                                            index="0" j="2" data:angle="45" data:startAngle="243"
                                                            data:strokeWidth="5" data:value="25"
                                                            data:pathOrig="M 15.92794192413799 83.21059792599539 A 50.024390243902445 50.024390243902445 0 0 1 12.923977684844871 45.04161328138981 L 24.817983263633657 48.90620996104236 A 37.518292682926834 37.518292682926834 0 0 0 27.07095644310349 77.53294844449654 L 15.92794192413799 83.21059792599539 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                    <g id="SvgjsG2186" class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Fashion" rel="4" data:realIndex="3">
                                                        <path id="SvgjsPath2187"
                                                            d="M 12.923977684844871 45.04161328138981 A 50.024390243902445 50.024390243902445 0 0 1 60.491269096883734 10.475610518012587 L 60.4934518226628 22.98170788850944 A 37.518292682926834 37.518292682926834 0 0 0 24.817983263633657 48.90620996104236 L 12.923977684844871 45.04161328138981 z"
                                                            fill="rgba(3,195,236,1)" fill-opacity="1" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5" stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-3"
                                                            index="0" j="3" data:angle="72" data:startAngle="288"
                                                            data:strokeWidth="5" data:value="40"
                                                            data:pathOrig="M 12.923977684844871 45.04161328138981 A 50.024390243902445 50.024390243902445 0 0 1 60.491269096883734 10.475610518012587 L 60.4934518226628 22.98170788850944 A 37.518292682926834 37.518292682926834 0 0 0 24.817983263633657 48.90620996104236 L 12.923977684844871 45.04161328138981 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="SvgjsG2188" class="apexcharts-datalabels-group"
                                                transform="translate(0, 0) scale(1)"><text id="SvgjsText2189"
                                                    font-family="Helvetica, Arial, sans-serif" x="60.5" y="77.5"
                                                    text-anchor="middle" dominant-baseline="auto" font-size="13px"
                                                    font-weight="400" fill="#646e78"
                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                    style="font-family: Helvetica, Arial, sans-serif;">Weekly</text><text
                                                    id="SvgjsText2190" font-family="Public Sans" x="60.5" y="59.5"
                                                    text-anchor="middle" dominant-baseline="auto" font-size="18px"
                                                    font-weight="500" fill="#384551"
                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                    style="font-family: &quot;Public Sans&quot;;">38%</text></g>
                                        </g>
                                        <line id="SvgjsLine2191" x1="0" y1="0" x2="121"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                            stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine2192" x1="0" y1="0" x2="121"
                                            y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                    <g id="SvgjsG2173" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                                <div class="apexcharts-tooltip apexcharts-theme-dark">
                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(113, 221, 55);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(105, 108, 255);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 3;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(133, 146, 163);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 4;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(3, 195, 236);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 360px; height: 119px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex align-items-center mb-5">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bx-mobile-alt"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Electronic</h6>
                                    <small>Mobile, Earbuds, TV</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">82.5k</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-5">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Fashion</h6>
                                    <small>T-shirt, Jeans, Shoes</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">23.8k</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-5">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Decor</h6>
                                    <small>Fine Art, Dining</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">849k</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class="bx bx-football"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Sports</h6>
                                    <small>Football, Cricket Kit</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">99</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-6">
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm text-nowrap table-border-top-0">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Payment</th>
                                <th>Order Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/backend') }}/img/products/oneplus-lg.png"
                                            alt="Oneplus" height="32" width="32" class="me-3">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0">OnePlus 7Pro</h6>
                                            <small class="text-body">OnePlus</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-primary rounded-pill p-1_5 me-3"><i
                                            class="bx bx-mobile-alt bx-xs"></i></span> Smart Phone</td>
                                <td>
                                    <div class="text-body"><span class="text-primary fw-medium">$120</span>/499</div>
                                    <small class="text-body">Partially Paid</small>
                                </td>
                                <td><span class="badge bg-label-primary">Confirmed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/backend') }}/img/products/magic-mouse.png"
                                            alt="Apple" height="32" width="32" class="me-3">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0">Magic Mouse</h6>
                                            <small class="text-body">Apple</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-warning rounded-pill p-1_5 me-3"><i
                                            class="bx bx-mouse bx-xs"></i></span> Mouse</td>
                                <td>
                                    <div><span class="text-primary fw-medium">$149</span></div>
                                    <small class="text-body">Fully Paid</small>
                                </td>
                                <td><span class="badge bg-label-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/backend') }}/img/products/imac-pro.png" alt="Apple"
                                            height="32" width="32" class="me-3">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0">iMac Pro</h6>
                                            <small class="text-body">Apple</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-info rounded-pill p-1_5 me-3"><i
                                            class="bx bx-desktop bx-xs"></i></span> Computer</td>
                                <td>
                                    <div class="text-body"><span class="text-primary fw-medium">$0</span>/899</div>
                                    <small class="text-body">Unpaid</small>
                                </td>
                                <td><span class="badge bg-label-danger">Cancelled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/backend') }}/img/products/note10.png" alt="Samsung"
                                            height="32" width="32" class="me-3">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0">Note 10</h6>
                                            <small class="text-body">Samsung</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-primary rounded-pill p-1_5 me-3"><i
                                            class="bx bx-mobile-alt bx-xs"></i></span> Smart Phone</td>
                                <td>
                                    <div><span class="text-primary fw-medium">$149</span></div>
                                    <small class="text-body">Fully Paid</small>
                                </td>
                                <td><span class="badge bg-label-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/backend') }}/img/products/iphone.png" alt="Apple"
                                            height="32" width="32" class="me-3">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0">iPhone 11 Pro</h6>
                                            <small class="text-body">Apple</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-primary rounded-pill p-1_5 me-3"><i
                                            class="bx bx-mobile-alt bx-xs"></i></span> Smart Phone</td>
                                <td>
                                    <div><span class="text-primary fw-medium">$399</span></div>
                                    <small class="text-body">Fully Paid</small>
                                </td>
                                <td><span class="badge bg-label-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/backend') }}/img/products/mi-tv.png" alt="Xiaomi"
                                            height="32" width="32" class="me-3">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0">Mi LED TV 4X</h6>
                                            <small class="text-body">Xiaomi</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-danger rounded-pill p-1_5 me-3"><i
                                            class="bx bx-tv bx-xs"></i></span> Smart TV</td>
                                <td>
                                    <div class="text-body"><span class="text-primary fw-medium">$349</span>/2499</div>
                                    <small class="text-body">Partially Paid</small>
                                </td>
                                <td><span class="badge bg-label-primary">Confirmed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/backend') }}/img/products/logitech-mx.png"
                                            alt="Logitech" height="32" width="32" class="me-3">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0">Logitech MX</h6>
                                            <small class="text-body">Logitech</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-warning rounded-pill p-1_5 me-3"><i
                                            class="bx bx-mouse bx-xs"></i></span> Mouse</td>
                                <td>
                                    <div><span class="text-primary fw-medium">$89</span></div>
                                    <small class="text-body">Fully Paid</small>
                                </td>
                                <td><span class="badge bg-label-primary">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
