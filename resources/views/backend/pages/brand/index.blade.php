@extends('backend.layouts.app')
@section('title')
    Brand List
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
                    <h5 class="card-header">Brand List</h5>
                    <div class="col-md-12 col-lg-12 col-sm-12 py-4">
                        <div class="d-flex justify-content-end">

                            <div class="text-sm-end">
                                <a href="{{ route('admin.brand.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>
                                    New Brand</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="example" class="table table-" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Created At</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $index => $brand)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $brand->created_at->diffForHumans() }}</td>
                                        <td><img src="{{ asset('uploads/brand') }}/{{ $brand->photo }}" alt=""
                                                class="w-50"></td>
                                        <td class="wrap">{{ $brand->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.brand.edit', $brand->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <form action="{{ route('admin.brand.destroy', $brand->id) }}"
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
