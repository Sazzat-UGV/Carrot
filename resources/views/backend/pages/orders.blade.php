@extends('backend.layouts.app')
@section('title')
    Orders
@endsection
@push('style')
    <style>
        .wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }
    </style>
@endpush
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header mb-1 ">Order List</h5>
                    <form action="{{ route('admin.order.list') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-12 d-flex flex-wrap gap-3">
                                <div class="col-12 col-md-3 mb-4">
                                    <label class="form-label">Payment Type</label>
                                    <select id="payment_type"
                                        class="form-select @error('payment_type') is-invalid @enderror" name="payment_type">
                                        <option value="All" {{ request('payment_type') == 'All' ? 'selected' : '' }}>All
                                        </option>
                                        <option value="Cash On Delivery"
                                            {{ request('payment_type') == 'Cash On Delivery' ? 'selected' : '' }}>
                                            Cash On Delivery
                                        </option>
                                        <option value="SSLCOMMERZ"
                                            {{ request('payment_type') == 'SSLCOMMERZ' ? 'selected' : '' }}>
                                            SSLCOMMERZ
                                        </option>
                                        <option value="PayPal" {{ request('payment_type') == 'PayPal' ? 'selected' : '' }}>
                                            PayPal
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-3 mb-4">
                                    <label class="form-label">Status</label>
                                    <select id="status" class="form-select @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="All">All</option>
                                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="Received" {{ request('status') == 'Received' ? 'selected' : '' }}>
                                            Received</option>
                                        <option value="Shipped" {{ request('status') == 'Shipped' ? 'selected' : '' }}>
                                            Shipped</option>
                                        <option value="Return" {{ request('status') == 'Return' ? 'selected' : '' }}>Return
                                        </option>
                                        <option value="Cancel" {{ request('status') == 'Cancel' ? 'selected' : '' }}>Cancel
                                        </option>
                                        <option value="Complete" {{ request('status') == 'Complete' ? 'selected' : '' }}>
                                            Complete</option>

                                    </select>
                                </div>
                                <div class="col-12 col-md-3 mb-4">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date"
                                        value="{{ request('date') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-between">
                            <div class="col-auto mb-4">
                                <div class="dropdown mt-4 mt-sm-0">
                                    <a href="#"
                                        class="btn bg-label-primary dropdown-toggle d-flex align-items-center justify-content-center"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>Export</span>
                                    </a>
                                    <div class="dropdown-menu" style="">
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.order.exportPDF', ['search' => request('search'), 'payment_type' => request('payment_type'), 'date' => request('date'), 'status' => request('status')]) }}"><i
                                                    class="bx bxs-file-pdf font-size-16"></i> Export as PDF</a>
                                        </li>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto mb-4 d-flex">
                                <input class="form-control me-2" type="text" placeholder="Search" name="search"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn badge bg-label-primary waves-effect waves-light">
                                    <i class="bx bx-search align-middle"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subtotal</th>
                                    <th>Total</th>
                                    <th>Payment Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td class="wrap">{{ $order->order_id }}</td>
                                        <td class="wrap">{{ $order->created_at->format('d M, Y') }}</td>
                                        <td class="wrap">{{ $order->name }}</td>
                                        <td class="wrap">{{ $order->email }}</td>
                                        <td class="wrap">{{ $setting->currency }}{{ $order->subtotal }}</td>
                                        <td class="wrap">{{ $setting->currency }}{{ $order->total }}</td>
                                        <td class="">{{ $order->payment_type }}</td>
                                        <td class="">
                                            @if ($order->status == 'Pending')
                                                <span class="badge bg-secondary">{{ $order->status }}</span>
                                            @elseif($order->status == 'Received')
                                                <span class="badge bg-info">{{ $order->status }}</span>
                                            @elseif($order->status == 'Shipped')
                                                <span class="badge bg-primary">{{ $order->status }}</span>
                                            @elseif($order->status == 'Complete')
                                                <span class="badge bg-success">{{ $order->status }}</span>
                                            @elseif($order->status == 'Return')
                                                <span class="badge bg-warning">{{ $order->status }}</span>
                                            @elseif($order->status == 'Cancel')
                                                <span class="badge bg-danger">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
