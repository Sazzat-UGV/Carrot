@extends('backend.layouts.app')
@section('title')
    Review List
@endsection
@push('style')
    <style>
        .wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }

        .description-content {
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: pre-wrap;
        }
    </style>
@endpush
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header mb-1 ">Review List</h5>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary mb-2">
                                <i class="bx bx-arrow-back me-1"></i> Back to Products
                            </a>
                        </div>
                    </div>
                    <form action="#" method="GET">
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
                                    <th>Created At</th>
                                    <th>User Image</th>
                                    <th>User Name</th>
                                    <th>Comment</th>
                                    <th>Rating</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $index => $review)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td class="wrap">{{ $review->created_at->diffForHumans() }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/user') }}/{{ $review->user->image }}" alt="Image"
                                                style="max-width: 100px" class="me-3 rounded-circle">
                                        </td>
                                        <td class="wrap">{{ $review->user->name }}</td>
                                        <td class="wrap">{{ $review->comment }}</td>
                                        <td class="">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <i class="bx bxs-star"></i>
                                                @else
                                                    <i class="bx bx-star"></i>
                                                @endif
                                            @endfor
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu" style="">
                                                    <form action="{{ route('admin.review_delete', $review->id) }}"
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
                        {{ $reviews->links() }}
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
