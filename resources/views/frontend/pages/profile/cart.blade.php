@extends('frontend.layouts.app')

@section('title')
    Cart
@endsection

@push('style')
@endpush

@section('content')
    @include('frontend.layouts.include.breadcrumb', ['page_name' => 'Cart'])
    <section class="section-cart padding-tb-100">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="cr-cart-content aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <div class="row">
                            <form action="#">
                                <div class="cr-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th class="text-center">Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart_content as $item)
                                                @php
                                                    $product = App\Models\Product::where('id', $item->id)->first();
                                                    $color = json_decode($product->color);
                                                    $size = json_decode($product->size);
                                                @endphp
                                                <tr>
                                                    <td class="cr-cart-name">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset('uploads/product') }}/{{ $item->options->thumbnail }}"
                                                                alt="image" class="cr-cart-img">
                                                            {{ $item->name }}
                                                        </a>
                                                    </td>
                                                    @if ($item->options->color)
                                                        <td class="cr-cart-price">
                                                            <div class="cr-kg">
                                                                <div class="size-dropdown">
                                                                    <select name="size" id="size-select">
                                                                        @foreach (json_decode($product->color) as $color)
                                                                            <option value="{{ $color->value }}"
                                                                                class="size-option"
                                                                                {{ $color->value == $item->options->color ? 'selected' : '' }}>
                                                                                {{ $color->value }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @else
                                                        <td class="cr-cart-price">
                                                            <p>N/A</p>
                                                        </td>
                                                    @endif
                                                    @if ($item->options->size)
                                                        <td class="cr-cart-price">
                                                            <div class="cr-kg">
                                                                <div class="size-dropdown">
                                                                    <select name="size" id="size-select">
                                                                        @foreach (json_decode($product->size) as $size)
                                                                            <option value="{{ $size->value }}"
                                                                                class="size-option"
                                                                                {{ $size->value == $item->options->size ? 'selected' : '' }}>
                                                                                {{ $size->value }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @else
                                                        <td class="cr-cart-price">
                                                            <p>N/A</p>
                                                        </td>
                                                    @endif
                                                    <td class="cr-cart-qty">
                                                        <div class="cart-qty-plus-minus">
                                                            <button type="button" class="plus">+</button>
                                                            <input type="text" placeholder="."
                                                                value="{{ $item->qty }}" minlength="1" maxlength="20"
                                                                class="quantity">
                                                            <button type="button" class="minus">-</button>
                                                        </div>
                                                    </td>
                                                    <td class="cr-cart-price">
                                                        <span
                                                            class="amount">{{ $setting->currency }}{{ $item->price }}*{{ $item->qty }}</span>
                                                    </td>
                                                    <td class="cr-cart-subtotal">
                                                        {{ $setting->currency }}{{ $item->price * $item->qty }}</td>
                                                    <td class="cr-cart-remove">
                                                        <a href="{{ route('remove_single_item', $item->rowId) }}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                        <form action="" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <!-- Assuming you are using DELETE method for removal -->
                                                            <button type="submit"
                                                                style="border: none; background: none; cursor: pointer;">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-cart-update-bottom">
                                            <a href="{{ route('homePage') }}" class="cr-links">Continue Shopping</a>
                                            <a href="cart.html" class="cr-button">
                                                Check Out
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
