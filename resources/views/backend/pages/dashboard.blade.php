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
                                    <span class="text-heading">Support Ticket</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $total_support_ticket }}</h4>
                                    </div>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-danger">
                                        <i class="bx bx-send bx-lg"></i>
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
                    <h5 class="card-title m-0 me-2">Top Products</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        @foreach ($top_products as $product)
                            <li class="d-flex mb-6 align-items-center">
                                <div class="avatar flex-shrink-0 me-4">
                                    <img src="{{ asset('uploads/product') }}/{{ $product->thumbnail }}" class="rounded"
                                        alt="image">
                                </div>
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-8 col-md-12 col-xxl-8 mb-1 mb-sm-0 mb-md-1 mb-xxl-0">
                                        <h6 class="mb-0">{{ $product->name }}</h6>
                                    </div>
                                    <div class="col-sm-4 col-md-12 col-xxl-4 d-flex justify-content-xxl-end">
                                        <div class="badge bg-label-secondary">
                                            @if ($product->product_view >= 1000000)
                                                {{ number_format($product->product_view / 1000000, 1) . 'M' }}
                                            @elseif ($product->product_view >= 1000)
                                                {{ number_format($product->product_view / 1000, 1) . 'K' }}
                                            @else
                                                {{ $product->product_view }}
                                            @endif Views
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Transactions</h5>
                </div>
                <div class="card-body pt-4">
                    <ul class="p-0 m-0">
                        @foreach ($transactions as $transaction)
                            <li class="d-flex align-items-center mb-6">
                                <div class="avatar flex-shrink-0 me-3">
                                    @if ($transaction->payment_type == 'Cash On Delivery')
                                        <span class="avatar-initial rounded bg-label-warning"><i
                                                class="bx bx-dollar-circle"></i></span>
                                    @elseif ($transaction->payment_type == 'Stripe')
                                        <span class="avatar-initial rounded bg-label-dark"><i
                                                class="bx bxl-stripe"></i></span>
                                    @elseif ($transaction->payment_type == 'PayPal')
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="bx bxl-paypal"></i></span>
                                    @endif
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="d-block">{{ $transaction->payment_type }}</small>
                                        <h6 class="fw-normal mb-0">{{ $transaction->status }}</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-2">
                                        <h6 class="fw-normal mb-0">{{ $transaction->total }}</h6>
                                        @if ($setting->currency == '$')
                                            <span class="text-muted">USD</span>
                                        @elseif ($setting->currency == '৳')
                                            <span class="text-muted">TAKA</span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Payment charts </h5>
                    </div>
                </div>
                <canvas id="myChart" style="text-center"></canvas>
                <div class="card-body" style="position: relative;">
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
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($order_histories as $history)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('uploads/product') }}/{{ $history->product->thumbnail }}"
                                                alt="Oneplus" height="32" width="32" class="me-3">
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-0">{{ $history->product->name }}</h6>
                                                <small class="text-body">{{ $history->product->brand->name }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $history->product->category->name }}</td>
                                    <td>
                                        <div class="text-body"><span
                                                class="text-primary fw-medium">{{ $setting->currency }}{{ $history->single_price }}</span>/{{ $history->product->selling_price }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($history->order->status == 'Pending')
                                            <span class="badge bg-label-secondary">{{ $history->order->status }}</span>
                                        @elseif($history->order->status == 'Received')
                                            <span class="badge bg-label-info">{{ $history->order->status }}</span>
                                        @elseif($history->order->status == 'Shipped')
                                            <span class="badge bg-label-primary">{{ $history->order->status }}</span>
                                        @elseif($history->order->status == 'Complete')
                                            <span class="badge bg-label-success">{{ $history->order->status }}</span>
                                        @elseif($history->order->status == 'Return')
                                            <span class="badge bg-label-warning">{{ $history->order->status }}</span>
                                        @elseif($history->order->status == 'Cancel')
                                            <span class="badge bg-label-danger">{{ $history->order->status }}</span>
                                        @endif
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Cash On Delivery', 'Stripe', 'PayPal'],
                datasets: [{
                    label: 'Payment',
                    data: [{{ $cash_on_delivery_chart }}, {{ $stripe_chart }}, {{ $paypal_chart }}],
                    borderWidth: 1,
                    backgroundColor: ['#5AB12C', '#94FA6A', '#8DE45F']
                }]
            },
        });
    </script>
@endpush
