@extends('admin.layouts.master')
@section('title')
    Product List
@endsection
@push('admin_style')
    <style>
        .text-wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('product.create') }}" class="btn btn-primary px-4"><i class="fa-solid fa-plus"></i>
                            Add New</a>
                    </div>
                    <div class="table-responsive">
                        <table id="responsiveTable" class="display responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Brand</th>
                                    <th>Featured</th>
                                    <th>Today Deal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td class="text-wrap"><img
                                                src="{{ asset('uploads/product') }}/{{ $product->thumbnail }}"
                                                alt="" class="w-50 rounded-2"></td>
                                        <td class="text-wrap">{{ $product->product_name }}</td>
                                        <td class="text-wrap">{{ $product->product_code }}</td>
                                        <td class="text-wrap">{{ $product->category->category_name }}</td>
                                        <td class="text-wrap">{{ $product->subcategory->subcategory_name }}</td>
                                        <td class="text-wrap">{{ $product->brand->brand_name }}</td>
                                        <td class="text-wrap">
                                            @if ($product->featured_product == 1)
                                                <a href="" data-id="{{ $product->id }}" class="featured">
                                                    <span
                                                        class="live_text text-white px-2  rounded-pill bg-success">Active</span>
                                                </a>
                                            @else
                                                <a href="" data-id="{{ $product->id }}" class="featured">
                                                    <span
                                                        class="live_text text-white px-2  rounded-pill bg-danger">Deactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-wrap">
                                            @if ($product->today_deal == 1)
                                                <a href="" data-id="{{ $product->id }}" class="today_deal">
                                                    <span
                                                        class="live_text text-white px-2  rounded-pill bg-success">Active</span>
                                                </a>
                                            @else
                                                <a href="" data-id="{{ $product->id }}" class="today_deal">
                                                    <span
                                                        class="live_text text-white px-2  rounded-pill bg-danger">Deactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-wrap">
                                            @if ($product->status == 1)
                                                <a href="" data-id="{{ $product->id }}" class="status">
                                                    <span
                                                        class="live_text text-white px-2  rounded-pill bg-success">Active</span>
                                                </a>
                                            @else
                                                <a href="" data-id="{{ $product->id }}" class="status">
                                                    <span
                                                        class="live_text text-white px-2  rounded-pill bg-danger">Deactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="d-flex m-auto">
                                            <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                                class="badge light badge-warning"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#"
                                                class="badge light badge-warning"><i class="fa-solid fa-eye"></i></a>

                                            <form action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                                method="POST" class="show_confirm">
                                                @csrf
                                                @method('DELETE')
                                                <button class="badge light badge-danger ">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
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
    </div>
@endsection
@push('admin_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Function to apply design to select elements
            function applySelectpicker() {
                $('.status-select').selectpicker();
            }

            // Apply design and event listeners on initial page load
            applySelectpicker();
            attachEventListeners();

            // Reapply design and event listeners after each page change
            $('#responsiveTable').on('draw.dt', function() {
                applySelectpicker();
                attachEventListeners();
            });

            // Function to attach event listeners
            function attachEventListeners() {
                // Event listener for delete confirmation
                $('.show_confirm').click(function(event) {
                    event.preventDefault();
                    let form = $(this).closest('form');
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                            form.submit();
                        } else {
                            Swal.fire({
                                title: "Canceled!",
                            });
                        }
                    });
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.featured').click(function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var $live_text = $(this).find('.live_text');

                $.ajax({
                    url: "/admin/featured/update/" + id,
                    method: "GET",
                    success: function(data) {
                        if ($live_text.text() === 'Active') {
                            toastr.success('Featured deactivated!');
                            $live_text.text('Deactive').removeClass('bg-success').addClass(
                                'bg-danger');
                        } else {
                            toastr.success('Featured activated!');
                            $live_text.text('Active').removeClass('bg-danger').addClass(
                                'bg-success');
                        }
                        console.log('done');
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            });
            $('.today_deal').click(function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var $live_text = $(this).find('.live_text');

                $.ajax({
                    url: "/admin/today_deal/update/" + id,
                    method: "GET",
                    success: function(data) {
                        if ($live_text.text() === 'Active') {
                            toastr.success('Today deal deactivated!');
                            $live_text.text('Deactive').removeClass('bg-success').addClass(
                                'bg-danger');
                        } else {
                            toastr.success('Today deal activated!');
                            $live_text.text('Active').removeClass('bg-danger').addClass(
                                'bg-success');
                        }
                        console.log('done');
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            });
            $('.status').click(function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var $live_text = $(this).find('.live_text');

                $.ajax({
                    url: "/admin/status/update/" + id,
                    method: "GET",
                    success: function(data) {
                        if ($live_text.text() === 'Active') {
                            toastr.success('Product deactivated!');
                            $live_text.text('Deactive').removeClass('bg-success').addClass(
                                'bg-danger');
                        } else {
                            toastr.success('Product activated!');
                            $live_text.text('Active').removeClass('bg-danger').addClass(
                                'bg-success');
                        }
                        console.log('done');
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            });
        });
    </script>
@endpush
