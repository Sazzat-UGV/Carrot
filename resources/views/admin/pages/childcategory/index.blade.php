@extends('admin.layouts.master')
@section('title')
    Child Category List
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('childcategory.create') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-plus"></i>
                            Add New</a>
                    </div>
                    <div class="table-responsive">
                        <table id="responsiveTable" class="display responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Child Category Name</th>
                                    <th>Child Category Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($childategories as $index => $childcategory)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $childcategory->category->category_name }}</td>
                                        <td>{{ $childcategory->subcategory->subcategory_name }}</td>
                                        <td>{{ $childcategory->childcategory_name }}</td>
                                        <td>{{ $childcategory->childcategory_slug }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('childcategory.edit', ['childcategory' => $childcategory->id]) }}"
                                                class="badge light badge-warning"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                            <form
                                                action="{{ route('childcategory.destroy', ['childcategory' => $childcategory->id]) }}"
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
        })
    </script>
@endpush