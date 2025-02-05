@extends('frontend.layouts.app')

@section('title')
    Track Order
@endsection

@push('style')
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Track Order'])
    @if (!isset($order))
        <section class="cr-track padding-tb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('track.order') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="order_id" placeholder="Enter your order id..."
                                    required>
                                <button class="btn" type="submit"
                                    style="background: #64b496;color:white;font-size: 22px; border-radius: 0px 5px 5px 0px;">
                                    <i class="ri-search-line"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (isset($order))
        <section class="cr-track padding-tb-100">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="cr-track-box">
                            <!-- Details-->
                            <div class="row">
                                <div class="col-md-4 m-b-767">
                                    <div class="cr-track-card"><span
                                            class="cr-track-title">order</span><span>#{{ $order->order_id }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 m-b-767">
                                    <div class="cr-track-card"><span
                                            class="cr-track-title">{{ $order->name }}</span><span>{{ $order->address }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 m-b-767">
                                    <div class="cr-track-card"><span class="cr-track-title">Expected
                                            date</span><span>
                                            @if ($order->status == 'Cancel')
                                                N/A
                                            @elseif ($order->status == 'Return')
                                                {{ $order->created_at->addMonths(1)->format('M d, Y') }}
                                        </span>
                                    @else
                                        {{ $order->created_at->addDays(7)->format('M d, Y') }}</span>
    @endif
    </div>
    </div>
    </div>

    <!-- Progress-->
    <div class="cr-steps">
        <div class="cr-steps-body">
            @if ($order->status == 'Cancel')
                <div class="cr-step cr-step-completed">
                    <span class="cr-step-indicator">
                        <i class="ri-check-line"></i>
                    </span>
                    <span class="cr-step-icon">
                        <i class="ri-close-line"></i>
                    </span>Cancel<br> Order
                </div>
            @else
                <div class="cr-step @if (in_array($order->status, ['Pending', 'Received', 'Shipped', 'Complete', 'Return'])) cr-step-completed @endif">
                    <span class="cr-step-indicator">
                        <i class="ri-check-line"></i>
                    </span>
                    <span class="cr-step-icon">
                        <i class="ri-history-line"></i>
                    </span>Pending<br> Order
                </div>
                <div class="cr-step @if (in_array($order->status, ['Received', 'Shipped', 'Complete', 'Return'])) cr-step-completed @endif">
                    <span class="cr-step-indicator">
                        <i class="ri-check-line"></i>
                    </span>
                    <span class="cr-step-icon">
                        <i class="ri-shield-check-line"></i>
                    </span>Received<br> Order
                </div>

                <div class="cr-step @if (in_array($order->status, ['Shipped', 'Complete', 'Return'])) cr-step-completed @endif">
                    <span class="cr-step-indicator">
                        <i class="ri-check-line"></i>
                    </span>
                    <span class="cr-step-icon">
                        <i class="ri-truck-line"></i>
                    </span>Shipped<br> Order
                </div>
                <div class="cr-step @if (in_array($order->status, ['Complete', 'Return'])) cr-step-completed @endif">
                    <span class="cr-step-indicator">
                        <i class="ri-check-line"></i>
                    </span>
                    <span class="cr-step-icon">
                        <i class="ri-home-5-line"></i>
                    </span>Product<br> Delivered
                </div>

                @if ($order->status == 'Return')
                    <div class="cr-step cr-step-completed">
                        <span class="cr-step-indicator">
                            <i class="ri-check-line"></i>
                        </span>
                        <span class="cr-step-icon">
                            <i class="ri-arrow-left-line"></i>
                        </span>Return<br> Order
                    </div>
                @endif
            @endif

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    @endif
@endsection

@push('script')
@endpush
