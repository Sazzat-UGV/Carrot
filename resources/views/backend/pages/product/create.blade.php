@extends('backend.layouts.app')
@section('title')
    Create Product
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
                <h5 class="card-header">Add New Product</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary mb-2">
                                <i class="bx bx-arrow-back me-1"></i> Back to Products
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-0">
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-12 col-md-8 mb-4">
                                        <label class="form-label">Product Name<span class="text-danger">*</span></label>
                                        <input class="form-control @error('product_name') is-invalid @enderror"
                                            type="text" placeholder="Enter product name" name="product_name"
                                            value="{{ old('product_name') }}">
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
                                            value="{{ old('product_code') }}">
                                        @error('product_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Category<span class="text-danger">*</span></label>
                                        <select id="category" class="form-select @error('category') is-invalid @enderror"
                                            name="category">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-6 mb-4">
                                        <label class="form-label">SubCategory<span class="text-danger">*</span></label>
                                        <select id="sub_category"
                                            class="form-select @error('sub_category') is-invalid @enderror"
                                            name="sub_category">
                                            <option value="">Select Type</option>
                                            <option value="Fixed" {{ old('type') == 'Fixed' ? 'selected' : '' }}>Fixed
                                            </option>
                                            <option value="Percentage" {{ old('type') == 'Percentage' ? 'selected' : '' }}>
                                                Percentage
                                            </option>
                                        </select>
                                        @error('sub_category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Brand<span class="text-danger">*</span></label>
                                        <select id="brand" class="form-select @error('brand') is-invalid @enderror"
                                            name="brand">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ old('brand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Pickup Point</label>
                                        <select id="pickup_point"
                                            class="form-select @error('pickup_point') is-invalid @enderror"
                                            name="pickup_point">
                                            <option value="">Select Pickup Point</option>
                                            @foreach ($pickup_points as $pickup_point)
                                            <option value="{{ $pickup_point->id }}" {{ old('pickup_point') == $pickup_point->id ? 'selected' : '' }}>{{ $pickup_point->name }}
                                            </option>
                                        @endforeach
                                        </select>
                                        @error('pickup_point')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Unit<span class="text-danger">*</span></label>
                                        <input class="form-control @error('unit') is-invalid @enderror" type="number"
                                            placeholder="Enter unit" name="unit" value="{{ old('unit') }}">
                                        @error('unit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>










                                    <div class="col-6 mb-4">
                                        <label class="form-label">Tags<span class="text-danger">*</span></label>
                                        <input class="form-control @error('tags') is-invalid @enderror" type="text"
                                            placeholder="Enter tags" name="tags" value="{{ old('tags') }}"
                                            id="siteKeywords">
                                        @error('tags')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


















                                    <div class="col-6 mb-4">
                                        <label class="form-label">Discount Price<span class="text-danger">*</span></label>
                                        <input class="form-control @error('discount_price') is-invalid @enderror"
                                            type="number" placeholder="Enter discount price" name="discount_price"
                                            value="{{ old('discount_price') }}">
                                        @error('discount_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Selling Price<span class="text-danger">*</span></label>
                                        <input class="form-control @error('selling_price') is-invalid @enderror"
                                            type="number" placeholder="Enter selling price" name="selling_price"
                                            value="{{ old('selling_price') }}">
                                        @error('selling_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Discount Price<span class="text-danger">*</span></label>
                                        <input class="form-control @error('discount_price') is-invalid @enderror"
                                            type="number" placeholder="Enter discount price" name="discount_price"
                                            value="{{ old('discount_price') }}">
                                        @error('discount_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Warehouse<span class="text-danger">*</span></label>
                                        <select id="warehouse"
                                            class="form-select @error('warehouse') is-invalid @enderror"
                                            name="warehouse">
                                            <option value="">Select Type</option>
                                            <option value="Fixed" {{ old('type') == 'Fixed' ? 'selected' : '' }}>Fixed
                                            </option>
                                            <option value="Percentage"
                                                {{ old('type') == 'Percentage' ? 'selected' : '' }}>
                                                Percentage
                                            </option>
                                        </select>
                                        @error('warehouse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Stock<span class="text-danger">*</span></label>
                                        <input class="form-control @error('stock') is-invalid @enderror" type="number"
                                            placeholder="Enter stock" name="stock" value="{{ old('stock') }}">
                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Color<span class="text-danger">*</span></label>
                                        <input class="form-control @error('color') is-invalid @enderror" type="number"
                                            placeholder="Enter color" name="color" value="{{ old('color') }}">
                                        @error('color')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label">Size<span class="text-danger">*</span></label>
                                        <input class="form-control @error('size') is-invalid @enderror" type="number"
                                            placeholder="Enter size" name="size" value="{{ old('size') }}">
                                        @error('size')
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
                                            placeholder="Enter product description">{{ old('description') }}</textarea>
                                        @error('size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Embeded Video<span class="text-danger">*</span></label>
                                        <textarea name="embeded_video" id="" cols="30" rows="5"
                                            class="form-control @error('embeded_video')
                                    is-invalid
                                    @enderror"
                                            placeholder="Enter product embeded video">{{ old('embeded_video') }}</textarea>
                                        @error('size')
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
                                        <label class="form-label">Thumbnail<span class="text-danger">*</span></label>
                                        <input class="form-control dropify @error('thumbnail') is-invalid @enderror"
                                            type="file" name="thumbnail">
                                        @error('thumbnail')
                                            <span style="font-size: 13px;" class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label class="form-label">Multiple Images<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control @error('multiple_images') is-invalid @enderror"
                                            type="file" placeholder="Enter images" name="multiple_images"
                                            value="{{ old('multiple_images') }}">
                                        @error('multiple_images')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-5">
                                        <input class="switch-input toggle-class" type="checkbox" name="feature_product">
                                        <label class="switch switch-success">Feature Product<span
                                                class="text-danger">*</span>
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="bx bx-check"></i>
                                                </span>
                                                <span class="switch-off">
                                                    <i class="bx bx-x"></i>
                                                </span>
                                            </span>
                                            @error('feature_product')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label class="switch switch-success">Today Deal<span class="text-danger">*</span>
                                            <input class="switch-input toggle-class" type="checkbox" name="today_deal">
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
                                    <div class="col-12 mb-5">
                                        <label class="switch switch-success">Status<span class="text-danger">*</span>
                                            <input class="switch-input toggle-class" type="checkbox" name="status">
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
        var input = document.querySelector('#siteKeywords');
        var tagify = new Tagify(input);

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
