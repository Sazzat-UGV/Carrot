@extends('frontend.pages.profile.layouts.app', ['title' => ' My Order'])
@section('profile_content')
    <div class="cr-bl-block-content">
        <div class="cr-check-bill-form mb-minus-24">
            <div class="row">
                <div class="col-12">
                    <p>My Order</p>
                    <hr>
                </div>
                <div class="col-12 mb-3">
                    <div class="cr-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Payment Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="cr-cart-price">
                                            <b class="amount">{{ $order->order_id }}</b>
                                        </td>
                                        <td class="cr-cart-price">
                                            <span class="amount">{{ $order->created_at->format('d F, Y') }}</span>
                                        </td>
                                        <td class="cr-cart-price">
                                            @if ($order->coupon_code)
                                                <span class="amount">
                                                    {{ $setting->currency }}{{ $order->after_discount + $order->tax }}</span>
                                            @else
                                                <span class="amount">
                                                    {{ $setting->currency }}{{ $order->total }}</span>
                                            @endif
                                        </td>
                                        <td class="cr-cart-price">
                                            <span class="amount">{{ $order->payment_type }}</span>
                                        </td>
                                        <td class="cr-cart-price">
                                            <span class="amount">
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
                                            </span>
                                        </td>
                                        <td class="cr-cart-remove">
                                            <a class="badge bg-info text-white" href="javascript()" data-bs-toggle="modal"
                                                data-bs-target="#order_details{{ $order->id }}">
                                                <i class="ri-eye-line"></i></a>
                                            <!-- Order Details Modal -->
                                            <div class="modal fade" id="order_details{{ $order->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-start">Order Details -
                                                                {{ $order->order_id }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-2"><b>Name:</b> {{ $order->name }}
                                                                </div>
                                                                <div class="col-md-6 mb-2"><b>Email:</b>
                                                                    {{ $order->email }}</div>
                                                                <div class="col-md-6 mb-2"><b>Address:</b>
                                                                    {{ $order->address }}</div>
                                                                <div class="col-md-6 mb-2"><b>City:</b> {{ $order->city }}
                                                                </div>
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
                                                                    @foreach ($order->orderDetails as $item)
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
                        {{ $orders->links('pagination::custom_pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
