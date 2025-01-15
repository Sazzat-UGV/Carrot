@extends('backend.layouts.app')
@section('title')
    Product List
@endsection
@push('style')
    <style>
        .wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }
    </style>
@endpush
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header mb-1 ">Product List</h5>
                    <div class="text-sm-end mb-4">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> New
                            Product</a>
                    </div>
                    <form action="{{ route('admin.product.index') }}" method="GET">
                        <div class="row">
                            <div class="col-12 d-flex flex-wrap gap-3">
                                <div class="col-12 col-md-2 mb-4">
                                    <label class="form-label">Category</label>
                                    <select id="category" class="form-select" name="category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (request('category') == $category->id) selected @endif>{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-2 mb-4">
                                    <label class="form-label">Brand</label>
                                    <select id="brand" class="form-select @error('brand') is-invalid @enderror"
                                        name="brand">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                @if (request('brand') == $brand->id) selected @endif>{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-2 mb-4">
                                    <label class="form-label">Warehouse</label>
                                    <select id="warehouse" class="form-select @error('warehouse') is-invalid @enderror"
                                        name="warehouse">
                                        <option value="">Select Warehouse</option>
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}"
                                                @if (request('warehouse') == $warehouse->id) selected @endif>{{ $warehouse->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-2 mb-4">
                                    <label class="form-label">Status</label>
                                    <select id="status" class="form-select @error('status') is-invalid @enderror"
                                        name="status">
                                        <option>Select Status</option>
                                        <option value="active" @if (request('status') == 'active') selected @endif>Active
                                        </option>
                                        <option value="inactive" @if (request('status') == 'inactive') selected @endif>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-end">
                            <div class="col-auto mb-4 d-flex">
                                <input class="form-control me-2" type="text" placeholder="Search" name="search"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn badge bg-label-primary waves-effect waves-light">
                                    <i class="bx bx-search align-middle"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Product Name</th>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Brand</th>
                                    <th>Featured</th>
                                    <th>Total Deal</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>
                                            <img src="{{ asset('uploads/product') }}/{{ $product->thumbnail }}"
                                                alt="Image" height="50" width="50" class="me-3">
                                        </td>
                                        <td class="wrap">{{ $product->name }}</td>
                                        <td class="wrap">{{ $product->code }}</td>
                                        <td class="wrap">{{ $product->category->name }}</td>
                                        <td class="wrap">{{ $product->subcategory->name }}</td>
                                        <td class="wrap">{{ $product->brand->name }}</td>
                                        <td>
                                            <label class="switch switch-success">
                                                <input class="switch-input featured" type="checkbox"
                                                    data-id="{{ $product->id }}" id="product-{{ $product->id }}"
                                                    {{ $product->featured ? 'checked' : '' }}>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on">
                                                        <i class="bx bx-check"></i>
                                                    </span>
                                                    <span class="switch-off">
                                                        <i class="bx bx-x"></i>
                                                    </span>
                                                </span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="switch switch-success">
                                                <input class="switch-input today-deal" type="checkbox"
                                                    data-id="{{ $product->id }}" id="product-{{ $product->id }}"
                                                    {{ $product->today_deal ? 'checked' : '' }}>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on">
                                                        <i class="bx bx-check"></i>
                                                    </span>
                                                    <span class="switch-off">
                                                        <i class="bx bx-x"></i>
                                                    </span>
                                                </span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="switch switch-success">
                                                <input class="switch-input status" type="checkbox"
                                                    data-id="{{ $product->id }}" id="product-{{ $product->id }}"
                                                    {{ $product->status ? 'checked' : '' }}>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on">
                                                        <i class="bx bx-check"></i>
                                                    </span>
                                                    <span class="switch-off">
                                                        <i class="bx bx-x"></i>
                                                    </span>
                                                </span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.product.edit', $product->id) }}"><i
                                                            class="bx bx-edit me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.product.show', $product->id) }}"><i
                                                            class="bx bx-show-alt me-1"></i> View</a>
                                                    <form action="{{ route('admin.product.destroy', $product->id) }}"
                                                        class="show_confirm" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit"><i
                                                                class="bx bx-trash me-1"></i>
                                                            Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {

            $('.featured').change(function() {
                var is_active = $(this).prop('checked') ? 1 : 0;
                var item_id = $(this).data('id');
                var url = '{{ route('admin.product.featured', ':id') }}'.replace(':id', item_id);

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire(
                            'Status Updated!',
                            'The status has been successfully updated.',
                            'success'
                        );
                    },
                    error: function(err) {
                        console.error(err);
                        Swal.fire(
                            'Error!',
                            'Unable to update status. Please try again later.',
                            'error'
                        );
                    }
                });
            });
            $('.today-deal').change(function() {
                var is_active = $(this).prop('checked') ? 1 : 0;
                var item_id = $(this).data('id');
                var url = '{{ route('admin.product.todayDeal', ':id') }}'.replace(':id', item_id);

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire(
                            'Status Updated!',
                            'The status has been successfully updated.',
                            'success'
                        );
                    },
                    error: function(err) {
                        console.error(err);
                        Swal.fire(
                            'Error!',
                            'Unable to update status. Please try again later.',
                            'error'
                        );
                    }
                });
            });
            $('.status').change(function() {
                var is_active = $(this).prop('checked') ? 1 : 0;
                var item_id = $(this).data('id');
                var url = '{{ route('admin.product.status', ':id') }}'.replace(':id', item_id);

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire(
                            'Status Updated!',
                            'The status has been successfully updated.',
                            'success'
                        );
                    },
                    error: function(err) {
                        console.error(err);
                        Swal.fire(
                            'Error!',
                            'Unable to update status. Please try again later.',
                            'error'
                        );
                    }
                });
            });

            $(document).on('click', '.show_confirm', function(event) {
                event.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
