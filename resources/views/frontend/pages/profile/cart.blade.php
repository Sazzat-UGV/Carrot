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
            @if (Cart::count() > 0)
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
                                                                        <select name="color" id="size-select"
                                                                            data-rowId="{{ $item->rowId }}"
                                                                            class="colorSelect">
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
                                                                        <select name="size" id="size-select"
                                                                            data-rowId="{{ $item->rowId }}"
                                                                            class="sizeSelect">
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
                                                                <button type="button" class="plus qty"
                                                                    data-rowId="{{ $item->rowId }}">+</button>
                                                                <input type="text" placeholder="" name="qty_name"
                                                                    value="{{ $item->qty }}" class="quantity qty_value"
                                                                    data-rowId="{{ $item->rowId }}">
                                                                <button type="button" class="minus qty"
                                                                    data-rowId="{{ $item->rowId }}">-</button>
                                                            </div>
                                                        </td>

                                                        <td class="cr-cart-price">
                                                            <span
                                                                class="amount">{{ $setting->currency }}{{ $item->price }}*{{ $item->qty }}</span>
                                                        </td>
                                                        <td class="cr-cart-subtotal">
                                                            {{ $setting->currency }}{{ $item->price * $item->qty }}</td>
                                                        <td class="cr-cart-remove">
                                                            <a href="{{ route('remove_single_item', $item->rowId) }}"
                                                                class="item_delete">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cr-cart-update-bottom">
                                                <div class="mb-3">
                                                    <a href="{{ route('homePage') }}" class="cr-links">Continue
                                                        Shopping</a>
                                                </div>
                                                <div class="d-flex flex-wrap gap-3 justify-content-between">
                                                    <a href="{{ route('delete_cart') }}"
                                                        class="cr-button btn-secondary text-center item_delete">
                                                        Delete Cart
                                                    </a>
                                                    <a href="#" class="cr-button text-center">
                                                        Check Out ({{ $setting->currency }}{{ Cart::total() }})
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h1 style="color: #777777; text-align: center;">Nothing in cart.</h1>
            @endif
        </div>
    </section>

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.item_delete').on('click', function(event) {
                event.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#64B496",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Remove!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                    }
                });
            });

            $('.colorSelect').on('change', function(event) {
                var color = $(this).val();
                var rowId = $(this).data('rowid');
                var url = `{{ route('update_item_color', ['color' => ':color', 'rowId' => ':rowId']) }}`;
                url = url.replace(':color', color).replace(':rowId', rowId);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(res) {
                        console.log(res.message);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            });

            $('.sizeSelect').on('change', function(event) {
                var size = $(this).val();
                var rowId = $(this).data('rowid');
                var url = `{{ route('update_item_size', ['size' => ':size', 'rowId' => ':rowId']) }}`;
                url = url.replace(':size', size).replace(':rowId', rowId);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(res) {
                        console.log(res.message);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            });

            var updatedQty;
            var rowId;
            $('.plus').on('click', function() {
                var inputField = $(this).siblings('.qty_value');
                var currentQty = inputField.val();
                updatedQty = inputField.val();
                rowId = $(this).data('rowid');
            });

            $('.minus').on('click', function() {
                var inputField = $(this).siblings('.qty_value');
                var currentQty = inputField.val();
                updatedQty = inputField.val();
                rowId = $(this).data('rowid');
            });

            $('.qty').on('blur', function(event) {
                var qty = updatedQty || $(this).val();
                var url = `{{ route('update_item_qty', ['qty' => ':qty', 'rowId' => ':rowId']) }}`;
                url = url.replace(':qty', qty).replace(':rowId', rowId);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(res) {
                        console.log(res.message);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            });

        });
    </script>
@endpush
