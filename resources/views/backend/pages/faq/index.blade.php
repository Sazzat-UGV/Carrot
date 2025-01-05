@extends('backend.layouts.app')
@section('title')
    Faq List
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
                    <h5 class="card-header">Faq List</h5>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="text-sm-end">
                                <a href="{{ route('admin.faq.create') }}" class="btn btn-primary  mb-2"><i
                                        class="bx bx-plus me-1"></i> New Faq</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="example" class="table table-" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Created at</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $index => $faq)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $faq->created_at->format('d-m-Y') }}</td>
                                        <td class="wrap">{{ $faq->question }}</td>
                                        <td class="wrap">{{ $faq->answer }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.faq.edit', $faq->id) }}"><i
                                                            class="bx bx-edit me-1"></i> Edit</a>
                                                    <form action="{{ route('admin.faq.destroy', $faq->id) }}"
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
    <script>
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

        new DataTable('#example');
    </script>
@endpush
