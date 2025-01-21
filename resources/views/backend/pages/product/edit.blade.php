@extends('backend.layouts.app')
@section('title')
    Edit Product
@endsection
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css">
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <style>
        .vertical-divider {
            border-left: 1px solid #ddd;
            height: 100%;
        }

        .dropify-wrapper .dropify-message p {
            font-size: 20px;
        }
    </style>
@endpush
@section('content')
    <div class="row g-0 align-items-stretch">
        <div class="col-12 p-0">
            <div class="card">
                <h5 class="card-header">Edit Product</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary mb-2">
                                <i class="bx bx-arrow-back me-1"></i> Back to Products
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-0">
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-12 col-md-8 mb-4">
                                        <label class="form-label">Product Name<span class="text-danger">*</span></label>
                                        <input class="form-control @error('product_name') is-invalid @enderror"
                                            type="text" placeholder="Enter product name" name="product_name"
                                            value="{{ old('product_name', $product->name) }}">
                                        @error('product_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4 mb-4">
                                        <label class="form-label">Product Code<span class="text-danger">*</span></label>
                                        <input class="form-control @error('product_code') is-invalid @enderror"
                                            type="text" placeholder="Enter product code" name="product_code"
                                            value="{{ old('product_code', $product->code) }}">
                                        @error('product_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label class="form-label">Category<span class="text-danger">*</span></label>
                                        <select id="category" class="form-select @error('category') is-invalid @enderror"
                                            name="category">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" data-id="{{ $category->id }}"
                                                    {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label class="form-label">Subcategory<span class="text-danger">*</span></label>
                                        <select id="subcategory"
                                            class="form-select @error('subcategory') is-invalid @enderror"
                                            name="subcategory"></select>

                                        @error('subcategory')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label class="form-label">Brand<span class="text-danger">*</span></label>
                                        <select id="brand" class="form-select @error('brand') is-invalid @enderror"
                                            name="brand">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label class="form-label">Pickup Point</label>
                                        <select id="pickup_point"
                                            class="form-select @error('pickup_point') is-invalid @enderror"
                                            name="pickup_point">
                                            <option value="">Select Pickup Point</option>
                                            @foreach ($pickup_points as $pickup_point)
                                                <option value="{{ $pickup_point->id }}"
                                                    {{ old('pickup_point', $product->pickup_point_id) == $pickup_point->id ? 'selected' : '' }}>
                                                    {{ $pickup_point->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pickup_point')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label class="form-label">Tags</label>
                                        <input class="form-control @error('tags') is-invalid @enderror" type="text"
                                            placeholder="Enter tags" name="tags"
                                            value="{{ old('tags', $product->tags) }}" id="tags">
                                        @error('tags')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4 mb-4">
                                        <label class="form-label">Purchase Price</label>
                                        <input class="form-control @error('purchase_price') is-invalid @enderror"
                                            type="number" placeholder="Enter purchase price" name="purchase_price"
                                            value="{{ old('purchase_price', $product->purchase_price) }}">
                                        @error('purchase_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4 mb-4">
                                        <label class="form-label">Selling Price<span class="text-danger">*</span></label>
                                        <input class="form-control @error('selling_price') is-invalid @enderror"
                                            type="number" placeholder="Enter selling price" name="selling_price"
                                            value="{{ old('selling_price', $product->selling_price) }}">
                                        @error('selling_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4 mb-4">
                                        <label class="form-label">Discount Price</label>
                                        <input class="form-control @error('discount_price') is-invalid @enderror"
                                            type="number" placeholder="Enter discount price" name="discount_price"
                                            value="{{ old('discount_price', $product->discount_price) }}">
                                        @error('discount_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label class="form-label">Warehouse<span class="text-danger">*</span></label>
                                        <select id="warehouse"
                                            class="form-select @error('warehouse') is-invalid @enderror"
                                            name="warehouse">
                                            <option value="">Select Warehouse</option>
                                            @foreach ($warehouses as $warehouse)
                                                <option value="{{ $warehouse->id }}"
                                                    {{ old('warehouse', $product->warehouse_id) == $warehouse->id ? 'selected' : '' }}>
                                                    {{ $warehouse->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('warehouse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label class="form-label">Stock</label>
                                        <input class="form-control @error('stock') is-invalid @enderror" type="number"
                                            placeholder="Enter stock" name="stock"
                                            value="{{ old('stock', $product->stock_quantity) }}">
                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label class="form-label">Color</label>
                                        <input class="form-control @error('color') is-invalid @enderror" type="text"
                                            placeholder="Enter color" name="color" id="color"
                                            value="{{ old('color', $product->color) }}">
                                        @error('color')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <label class="form-label">Size</label>
                                        <input class="form-control @error('size') is-invalid @enderror" type="text"
                                            placeholder="Enter size" name="size" id="size"
                                            value="{{ old('size', $product->size) }}">
                                        @error('size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Short Description<span
                                                class="text-danger">*</span></label>
                                        <textarea name="short_description" id="" cols="30" rows="5"
                                            class="form-control @error('short_description')
                                    is-invalid
                                    @enderror"
                                            placeholder="Enter short description">{{ old('short_description', $product->short_description) }}</textarea>
                                        @error('short_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Description<span class="text-danger">*</span></label>
                                        <textarea name="description" id="editor" cols="30" rows="5"
                                            class="form-control @error('description')
                                    is-invalid
                                    @enderror"
                                            placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-md-1 d-flex justify-content-center">
                                <div class="vertical-divider"></div>
                            </div>

                            <div class="col-12 col-md-3">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Thumbnail</label>
                                        <input class="form-control dropify @error('thumbnail') is-invalid @enderror"
                                            type="file" name="thumbnail"
                                            data-default-file='{{ asset('uploads/product') }}/{{ $product->thumbnail }}'>
                                        @error('thumbnail')
                                            <span style="font-size: 13px;" class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label class="form-label">Multiple Images</label>
                                        <input class="form-control @error('multiple_images') is-invalid @enderror"
                                            type="file" placeholder="Enter images" name="multiple_images[]" multiple
                                            value="{{ old('multiple_images') }}">
                                        @error('multiple_images')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <label class="form-label">Existing Images</label>
                                    <div class="col-12 mb-5">
                                        @foreach (json_decode($product->images, true) as $image)
                                            <img src="{{ asset('uploads/product/' . $image) }}" alt=""
                                                class="w-20 mb-1">
                                        @endforeach
                                    </div>

                                    <hr>
                                    <div class="col-12 mb-5">
                                        <label for="">Feature Product</label>
                                        <br>
                                        <label class="switch switch-success">
                                            <input class="switch-input toggle-class" type="checkbox" name="featured"
                                                value="1"
                                                {{ old('featured', $product->featured) == 1 ? 'checked' : '' }}>
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="bx bx-check"></i>
                                                </span>
                                                <span class="switch-off">
                                                    <i class="bx bx-x"></i>
                                                </span>
                                            </span>
                                            @error('featured')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <hr>
                                    <div class="col-12 mb-5">
                                        <label for="">Today Deal</label>
                                        <br>
                                        <label class="switch switch-success">
                                            <input class="switch-input toggle-class" type="checkbox" name="today_deal"
                                                value="1"
                                                {{ old('today_deal', $product->today_deal) == 1 ? 'checked' : '' }}>
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="bx bx-check"></i>
                                                </span>
                                                <span class="switch-off">
                                                    <i class="bx bx-x"></i>
                                                </span>
                                            </span>
                                            @error('today_deal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <hr>
                                    <div class="col-12 mb-5">
                                        <label for="">Trending</label>
                                        <br>
                                        <label class="switch switch-success">
                                            <input class="switch-input toggle-class" type="checkbox" name="trending"
                                                value="1"
                                                {{ old('trending', $product->trending) == 1 ? 'checked' : '' }}>
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="bx bx-check"></i>
                                                </span>
                                                <span class="switch-off">
                                                    <i class="bx bx-x"></i>
                                                </span>
                                            </span>
                                            @error('trending')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <hr>
                                    <div class="col-12 mb-5">
                                        <label for="">Status</label>
                                        <br>
                                        <label class="switch switch-success">
                                            <input class="switch-input toggle-class" type="checkbox" name="status"
                                                value="1"
                                                {{ old('status', $product->status) == 1 ? 'checked' : '' }}>
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="bx bx-check"></i>
                                                </span>
                                                <span class="switch-off">
                                                    <i class="bx bx-x"></i>
                                                </span>
                                            </span>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary px-4" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        $('.dropify').dropify();
        var tags = document.querySelector('#tags');
        var color = document.querySelector('#color');
        var size = document.querySelector('#size');
        var tagify1 = new Tagify(tags);
        var tagify2 = new Tagify(color);
        var tagify3 = new Tagify(size);
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        type: 'GET',
                        url: '/admin/product/sub-category/' + categoryId,
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.subcategories && response.subcategories.length > 0) {
                                $('#subcategory').html(
                                    '<option value="">Select Subcategory</option>');
                                $.each(response.subcategories, function(index, subcategory) {

                                    $('#subcategory').append('<option value="' +
                                        subcategory.id + '">' + subcategory.name +
                                        '</option>');
                                });
                            } else {
                                $('#subcategory').html(
                                    '<option value="">No subcategories available</option>');
                            }
                        },
                        error: function(err) {
                            console.error(err);
                            Swal.fire('Error!',
                                'Unable to fetch subcategories, please try again later.',
                                'error');
                        }
                    });
                } else {
                    $('#subcategory').html('<option value="">Select Subcategory</option>');
                }
            });
        });
    </script>
@endpush
