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
                                            <a href="£">
                                                <i class="ri-eye-fill"></i>
                                            </a>
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
