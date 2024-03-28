@extends('admin.layouts.master')
@section('title')
    Edit Product
@endsection
@push('admin_style')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 16px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div>
                <a href="{{ route('product.index') }}" class="btn btn-primary mb-4 px-4"><i
                        class="fa-solid fa-arrow-alt-circle-left"></i>
                    Back to Product List</a>
            </div>
            <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card h-auto">
                            <div class="card-body">
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">
                                            Edit Product
                                        </div>
                                    </div>
                                    <div class="cm-content-body form excerpt">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Product Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="product_name"
                                                            value="{{ old('product_name', $product->product_name) }}"
                                                            class="form-control @error('product_name')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter product name">
                                                            @error('product_name')
                                                            <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Product Code <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="product_code"
                                                            value="{{ old('product_code', $product->product_code) }}"
                                                            class="form-control @error('product_code')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter product code">
                                                            @error('product_code')
                                                            <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Category/Subcategory <span
                                                                class="text-danger">*</span></label>
                                                        <div
                                                            class="dropdown bootstrap-select default-select form-control wide dropup">
                                                            <select
                                                                class="default-select form-control wide @error('subcategory') is-invalid @enderror"
                                                                tabindex="null" name="subcategory" id="subcategory">
                                                                <option disabled selected>Choose Category</option>
                                                                @foreach ($categories as $category)
                                                                    <option class="text-bg-primary" disabled>Category:
                                                                        {{ $category->category_name }}</option>
                                                                    @php
                                                                        $subcategories = \App\Models\Subcategory::where(
                                                                            'category_id',
                                                                            $category->id,
                                                                        )
                                                                            ->select('id', 'subcategory_name')
                                                                            ->get();
                                                                    @endphp
                                                                    @foreach ($subcategories as $subcategory)
                                                                        <option value="{{ $subcategory->id }}"
                                                                            @if (old('category') == $subcategory->id || $product->subcategory_id == $subcategory->id) selected @endif>
                                                                            - {{ $subcategory->subcategory_name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endforeach
                                                            </select>
                                                            @error('subcategory')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Child Category </label>
                                                        <div
                                                            class="dropdown
                                                             wide dropup">
                                                            <select class="form-control wide @error('child_category') is-invalid @enderror" id="child_category"
                                                                value="{{ old('child_category', $product->childcategory_id) }}"
                                                                name="child_category" tabindex="null">
                                                            </select>
                                                            @error('child_category')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Brand <span
                                                                class="text-danger">*</span></label>
                                                        <div
                                                            class="dropdown bootstrap-select default-select form-control wide dropup">
                                                            <select
                                                                class="default-select form-control wide @error('brand')
                                                            is-invalid
                                                        @enderror"
                                                                tabindex="null" name="brand">
                                                                <option disabled selected>Choose Brand</option>
                                                                @foreach ($brands as $brand)
                                                                    <option value="{{ $brand->id }}"
                                                                        @if (old('brand') == $brand->id || $product->brand_id == $brand->id) selected @endif>
                                                                        {{ $brand->brand_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('brand')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Pickup Point</label>
                                                        <div
                                                            class="dropdown bootstrap-select default-select form-control wide dropup">
                                                            <select
                                                                class="default-select form-control wide  @error('pickup_point')
                                                            is-invalid
                                                        @enderror "
                                                                tabindex="null" name="pickup_point">
                                                                <option disabled selected>Choose Pickup Point</option>
                                                                @foreach ($pickup_points as $pickup_point)
                                                                    <option value="{{ $pickup_point->id }}"
                                                                        @if (old('pickup_point') == $pickup_point->id || $product->pickup_point_id == $pickup_point->id) selected @endif>
                                                                        {{ $pickup_point->pickup_point_name }}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('pickup_point')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Unit <span
                                                                class="text-danger">*</span></label>
                                                        <div
                                                            class="dropdown bootstrap-select default-select form-control wide dropup">
                                                            <input type="text" name="unit"
                                                                value="{{ old('unit', $product->unit) }}"
                                                                class="form-control @error('unit')
                                                        is-invalid
                                                    @enderror"
                                                                placeholder="enter unit">
                                                            @error('unit')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Product Tags</label>
                                                        <input type="text" name="product_tags"
                                                            class="form-control @error('product_tags')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter product tags"
                                                            value="{{ old('product_tags', $product->product_tags) }}">
                                                            @error('product_tags')
                                                        <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Purchase Price</label>
                                                        <input type="text" name="purchase_price"
                                                            class="form-control @error('purchase_price')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter purchase price"
                                                            value="{{ old('purchase_price', $product->purchase_price) }}">
                                                            @error('purchase_price')
                                                            <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Selling Price <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="selling_price"
                                                            class="form-control @error('selling_price')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter selling price"
                                                            value="{{ old('selling_price', $product->selling_price) }}">
                                                            @error('selling_price')
                                                            <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                        </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Discount Price</label>
                                                        <input type="text" name="discount_price"
                                                            value="{{ old('discount_price', $product->discount_price) }}"
                                                            class="form-control @error('discount_price')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter discount price">
                                                            @error('discount_price')
                                                        <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Warehouse <span
                                                                class="text-danger">*</span></label>
                                                        <div
                                                            class="dropdown bootstrap-select default-select form-control wide dropup">
                                                            <select name="warehouse"
                                                                class="default-select form-control wide @error('warehouse')
                                                            is-invalid
                                                        @enderror "
                                                                tabindex="null">
                                                                <option disabled selected>Choose Warehouse</option>
                                                                @foreach ($warehouses as $warehouse)
                                                                    <option value="{{ $warehouse->id }}"
                                                                        @if (old('warehouse') == $warehouse->id || $product->warehouse_id == $warehouse->id) selected @endif>
                                                                        {{ $warehouse->warehouse_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('warehouse')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Stock</label>
                                                        <input type="text" name="stock"
                                                            class="form-control @error('stock')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter stock"
                                                            value="{{ old('stock', $product->stock) }}">
                                                        @error('stock')
                                                            <span class="invalid-feedback"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Color</label>
                                                        <input type="text" name="color" data-role="tagsinput"
                                                            class="form-control @error('color')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter color"
                                                            value="{{ old('color', $product->color) }}">
                                                        @error('color')
                                                            <span class="invalid-feedback"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Size</label>
                                                        <input type="text"
                                                            class="form-control @error('size')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter size" name="size"
                                                            value="{{ old('size', $product->size) }}">
                                                        @error('size')
                                                            <span class="invalid-feedback"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Product Details</label>
                                                        <textarea
                                                            class="form-txtarea form-control  @error('product_details')
                                                        is-invalid
                                                    @enderror"
                                                            name="product_details" id="editor" placeholder="enter product details" rows="4" id="comment">{{ old('product_details', $product->product_details, $product->product_name) }}</textarea>
                                                        @error('product_details')
                                                            <span class="invalid-feedback"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Video Embed Code</label>
                                                        <input type="text" name="video_embed_code"
                                                            value="{{ old('video_embed_code', $product->video_embed_code) }}"
                                                            class="form-control @error('video_embed_code')
                                                        is-invalid
                                                    @enderror"
                                                            placeholder="enter code"> @error('video_embed_code')
                                                            <span class="invalid-feedback"
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-xl-4">
                        <div class="right-sidebar-sticky">

                            <div class="filter cm-content-box box-primary">

                                <div class="cm-content-body publish-content form excerpt">
                                    <div class="card-body">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Main Thumbnail <span
                                                        class="text-danger">*</span></label>
                                                <input type="file"
                                                    data-default-file="{{ asset('uploads/product') }}/{{ $product->thumbnail, $product->product_name }}"
                                                    class="form-control dropify @error('thumbnail')
                                                is-invalid
                                            @enderror"
                                                    data-width="100" data-height="130" name="thumbnail">
                                                @error('thumbnail')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">More Image <small class="text-success"><strong>(
                                                            Multiple Images )</strong></small></label>
                                                <input type="file" multiple name="multiple_image[]"
                                                    class="form-control @error('multiple_image')
                                                is-invalid
                                            @enderror">
                                                @error('multiple_image')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label" for="featured_product">Featured
                                                        Product</label>
                                                    <input
                                                        class="form-check-input @error('featured_product')
                                                    is-invalid
                                                @enderror"
                                                        name="featured_product" type="checkbox"id="featured_product"
                                                        @if (old('featured_product') || $product->featured_product == 1) checked @endif>
                                                    @error('featured_product')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label" for="today_deal">Today Deal</label>
                                                    <input class="form-check-input  @error('today_deal')
                                                    is-invalid
                                                @enderror" type="checkbox" id="today_deal" name="today_deal"
                                                        @if (old('today_deal') || $product->today_deal == 1) checked @endif>
                                                    @error('today_deal')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label" for="status">Status</label>
                                                    <input
                                                        class="form-check-input @error('status')
                                                        is-invalid
                                                    @enderror"
                                                        name="status" type="checkbox"id="status"
                                                        @if (old('status') || $product->status == 1) checked @endif>
                                                    @error('status')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary mt-3 px-5">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('admin_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#subcategory').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/admin/get-child-category/' + id,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        var child_category = $('#child_category');
                        child_category.empty();
                        $.each(data, function(key, value) {
                            child_category.append('<option value="' + value
                                .id +
                                '">' + value.childcategory_name + '</option>');
                        });
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endpush
