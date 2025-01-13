@extends('backend.layouts.app')
@section('title')
    User List
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
                    <h5 class="card-header mb-1 ">User List</h5>
                    <form action="{{ route('admin.user.index') }}" method="GET">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto mb-4">
                                <div class="dropdown mt-4 mt-sm-0">
                                    <a href="#"
                                        class="btn bg-label-primary dropdown-toggle d-flex align-items-center justify-content-center"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>Export</span>
                                    </a>
                                    <div class="dropdown-menu" style="">
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.exportPDF', ['search' => request('search')]) }}"><i
                                                    class="bx bxs-file-pdf font-size-16"></i> Export as PDF</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.exportExcel', ['search' => request('search')]) }}"><i
                                                    class="bx bxs-file-export font-size-16"></i> Export as Excel</a>
                                        </li>
                                    </div>
                                </div>
                            </div>
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
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>
                                            <img src="{{ asset('uploads/user') }}/{{ $user->image }}" alt="Image"
                                                height="50" width="50" class="me-3">
                                        </td>
                                        <td class="wrap">{{ $user->name }}</td>
                                        <td class="wrap">{{ $user->email }}</td>
                                        <td class="wrap">{{ $user->phone }}</td>
                                        <td class="wrap">{{ $user->address }}</td>
                                        <td>
                                            <label class="switch switch-success">
                                                <input class="switch-input toggle-class" type="checkbox"
                                                    data-id="{{ $user->id }}" id="user-{{ $user->id }}"
                                                    {{ $user->status ? 'checked' : '' }}>
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
                                                        href="{{ route('admin.user.show', $user->id) }}"><i
                                                            class="bx bx-show-alt me-1"></i> View</a>
                                                    <form action="{{ route('admin.user.destroy', $user->id) }}"
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
                        {{ $users->links() }}
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

            $('.toggle-class').change(function() {
                var is_active = $(this).prop('checked') ? 1 : 0;
                var item_id = $(this).data('id');
                var url = '{{ route('admin.user.status', ':id') }}'.replace(':id', item_id);

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire(
                            'Status Updated!',
                            'The user status has been successfully updated.',
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
