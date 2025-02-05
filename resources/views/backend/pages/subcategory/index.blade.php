@extends('backend.layouts.app')
@section('title')
    Subcategory List
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header">Subcategory List</h5>
                    <div class="col-md-12 col-lg-12 col-sm-12 py-4">
                        <div class="d-flex justify-content-end">

                            <div class="text-sm-end">
                                <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary"><i
                                        class="bx bx-plus"></i> New Subcategory</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="example" class="table table-" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Created At</th>
                                    <th>SubCategory Name</th>
                                    <th>SubCategory Slug</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $index => $subcategory)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                                        <td class="wrap">{{ $subcategory->name }}</td>
                                        <td class="wrap">{{ $subcategory->slug }}</td>
                                        <td class="wrap">{{ $subcategory->category->name }}</td>
                                        <td>
                                            <label class="switch switch-success">
                                                <input class="switch-input toggle-class" type="checkbox"
                                                    data-id="{{ $subcategory->id }}" id="subcategory-{{ $subcategory->id }}"
                                                    {{ $subcategory->status ? 'checked' : '' }}>
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
                                                        href="{{ route('admin.subcategory.edit', $subcategory->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <form
                                                        action="{{ route('admin.subcategory.destroy', $subcategory->id) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            var table = new DataTable('#example');
            $('#example').on('change', '.toggle-class', function() {
                var is_active = $(this).prop('checked') ? 1 : 0;
                var item_id = $(this).data('id');
                var url = '{{ route('admin.subcategory.status', ':id') }}'.replace(':id', item_id);

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire({
                                icon: 'success',
                                title: 'Updated!',
                                text: 'Status updated successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            });
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

            $('#example').on('click', '.show_confirm', function(event) {
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
