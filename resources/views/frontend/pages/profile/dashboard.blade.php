@extends('frontend.pages.profile.layouts.app', ['title' => 'Dashboard'])
@section('profile_content')
    <div class="cr-bl-block-content">
        <div class="cr-check-bill-form mb-minus-24">
            <div class="row">
                <div class="col-12 col-md-3 mb-3">
                    <div class="div border rounded-3 py-3 px-4 ">
                        <p class="text-center text-primary fw-semibold">Total Order</p>
                        <p class="text-center fw-bold text-black">{{ $total_order }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="div border rounded-3 py-3 px-4 ">
                        <p class="text-center text-success fw-semibold">Complete Order</p>
                        <p class="text-center fw-bold text-black">{{ $complete_order }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="div border rounded-3 py-3 px-4 ">
                        <p class="text-center text-danger fw-semibold">Cancel Order</p>
                        <p class="text-center fw-bold text-black">{{ $cancel_order }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="div border rounded-3 py-3 px-4 ">
                        <p class="text-center text-warning fw-semibold">Return Order</p>
                        <p class="text-center fw-bold text-black">{{ $return_order }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Recent Order</p>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
