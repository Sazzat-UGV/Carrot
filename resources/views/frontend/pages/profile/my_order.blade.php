@extends('frontend.layouts.app')
@section('title')
    My Order
@endsection
@push('style')
@endpush
@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'My Order'])
    <section class="section-cart padding-t-100 padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cr-cart-content aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <div class="row">
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
                                        <tr>
                                            @foreach ($orders as $order)
                                                <td class="cr-cart-price">
                                                    <span class="amount">{{ $order->order_id }}</span>
                                                </td>
                                                <td class="cr-cart-price">
                                                    <span class="amount">{{ $order->created_at->format('d M, Y') }}</span>
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
                                                        @if ($order->status == 0)
                                                            <span class="badge bg-danger">Pending</span>
                                                        @elseif($order->status == 1)
                                                            <span class="badge bg-info">Received</span>
                                                        @elseif($order->status == 2)
                                                            <span class="badge bg-primary">Shipped</span>
                                                        @elseif($order->status == 3)
                                                            <span class="badge bg-success">Done</span>
                                                        @elseif($order->status == 4)
                                                            <span class="badge bg-warning">Return</span>
                                                        @elseif($order->status == 5)
                                                            <span class="badge bg-danger">Cancel</span>
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
        </div>
    </section>
@endsection

@push('script')
@endpush
