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

        /* Dropdown Button */
        .btn-status {
            width: 120px;
            text-align: left;
            border-radius: 5px;
            padding: 8px 12px;
            font-weight: 600;
            border: none;
            background-color: #f8f9fa;
            color: #333;
            transition: all 0.3s ease;
        }

        .btn-status:hover {
            background-color: #e9ecef;
        }

        /* Status Dropdown */
        .status-dropdown {
            min-width: 150px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .status-dropdown .dropdown-item {
            padding: 8px 15px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .status-dropdown .dropdown-item i {
            margin-right: 8px;
            font-size: 16px;
        }

        /* Hover Effect */
        .status-dropdown .dropdown-item:hover {
            background-color: rgba(0, 0, 0, 0.05);
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
                                    <th>Action</th>
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
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-status dropdown-toggle" type="button"
                                                    id="dropdownMenuButton{{ $order->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class="status-text">{{ ucfirst($order->status) }}</span>
                                                </button>

                                                <ul class="dropdown-menu status-dropdown"
                                                    aria-labelledby="dropdownMenuButton{{ $order->id }}">
                                                    <li><a class="dropdown-item status-option text-secondary"
                                                            data-value="Pending" data-order-id="{{ $order->id }}"><i
                                                                class="bi bi-clock"></i> Pending</a></li>
                                                    <li><a class="dropdown-item status-option text-info"
                                                            data-value="Received" data-order-id="{{ $order->id }}"><i
                                                                class="bi bi-check-circle"></i> Received</a></li>
                                                    <li><a class="dropdown-item status-option text-primary"
                                                            data-value="Shipped" data-order-id="{{ $order->id }}"><i
                                                                class="bi bi-truck"></i> Shipped</a></li>
                                                    <li><a class="dropdown-item status-option text-success"
                                                            data-value="Complete" data-order-id="{{ $order->id }}"><i
                                                                class="bi bi-bag-check"></i> Complete</a></li>
                                                    <li><a class="dropdown-item status-option text-warning"
                                                            data-value="Return" data-order-id="{{ $order->id }}"><i
                                                                class="bi bi-arrow-return-left"></i> Return</a></li>
                                                    <li><a class="dropdown-item status-option text-danger"
                                                            data-value="Cancel" data-order-id="{{ $order->id }}"><i
                                                                class="bi bi-x-circle"></i> Cancel</a></li>
                                                </ul>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item" href="javascript()" data-bs-toggle="modal"
                                                        data-bs-target="#order_details{{ $order->id }}"><i
                                                            class="bx bx-show-alt me-1"></i> Show</a>
                                                    <form action="{{ route('admin.order.delete', $order->id) }}"
                                                        class="show_confirm" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit"><i
                                                                class="bx bx-trash me-1"></i>
                                                            Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="order_details{{ $order->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Order Details -
                                                                {{ $order->order_id }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-2"><b>Name:</b>
                                                                        {{ $order->name }}</div>
                                                                    <div class="col-md-6 mb-2"><b>Email:</b>
                                                                        {{ $order->email }}</div>
                                                                    <div class="col-md-6 mb-2"><b>Address:</b>
                                                                        {{ $order->address }}</div>
                                                                    <div class="col-md-6 mb-2"><b>City:</b>
                                                                        {{ $order->city }}</div>
                                                                    <div class="col-md-6 mb-2"><b>Post Code:</b>
                                                                        {{ $order->post }}</div>
                                                                    <div class="col-md-6 mb-2"><b>Country:</b>
                                                                        {{ $order->country }}</div>
                                                                    <div class="col-md-6 mb-2"><b>Region/State:</b>
                                                                        {{ $order->region_state }}</div>
                                                                    <div class="col-md-6 mb-2"><b>Payment Type:</b>
                                                                        {{ $order->payment_type }}</div>
                                                                    <div class="col-md-6 mb-2"><b>Total:</b>
                                                                        {{ $setting->currency }}{{ $order->total }}</div>
                                                                    <div class="col-md-6 mb-2">
                                                                        @if ($order->status == 'Pending')
                                                                            <span
                                                                                class="badge bg-secondary">{{ $order->status }}</span>
                                                                        @elseif($order->status == 'Received')
                                                                            <span
                                                                                class="badge bg-info">{{ $order->status }}</span>
                                                                        @elseif($order->status == 'Shipped')
                                                                            <span
                                                                                class="badge bg-primary">{{ $order->status }}</span>
                                                                        @elseif($order->status == 'Complete')
                                                                            <span
                                                                                class="badge bg-success">{{ $order->status }}</span>
                                                                        @elseif($order->status == 'Return')
                                                                            <span
                                                                                class="badge bg-warning">{{ $order->status }}</span>
                                                                        @elseif($order->status == 'Cancel')
                                                                            <span
                                                                                class="badge bg-danger">{{ $order->status }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h6>Order Items</h6>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered">
                                                                        <thead class="table-light">
                                                                            <tr>
                                                                                <th>Product</th>
                                                                                <th>Size</th>
                                                                                <th>Color</th>
                                                                                <th>Qty</th>
                                                                                <th>Price</th>
                                                                                <th>Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $order_details = App\Models\OrderDetail::where(
                                                                                    'order_id',
                                                                                    $order->id,
                                                                                )->get();
                                                                            @endphp
                                                                            @foreach ($order_details as $item)
                                                                                <tr>
                                                                                    <td>{{ $item->product_name }}</td>
                                                                                    <td>{{ $item->size }}</td>
                                                                                    <td>{{ $item->color }}</td>
                                                                                    <td>{{ $item->qty }}</td>
                                                                                    <td>{{ $setting->currency }}{{ $item->single_price }}
                                                                                    </td>
                                                                                    <td>{{ $setting->currency }}{{ $item->subtotal_price }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
    <script>
        $(document).ready(function() {
            $('.show_confirm').on('click', function(event) {
                event.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.status-option').on('click', function() {
                let newStatus = $(this).data('value');
                let orderId = $(this).data('order-id');
                let button = $(`#dropdownMenuButton${orderId}`);
                let statusText = button.find('.status-text');
                let url = "{{ route('admin.order.status', ':id') }}".replace(':id', orderId);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: newStatus,
                    },
                    success: function(response) {
                        if (response.status) {
                            statusText.text(newStatus);
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated!',
                                text: 'Status updated successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Failed to update status.',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later!',
                        });
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
