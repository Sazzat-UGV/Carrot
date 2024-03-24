@extends('admin.layouts.master')
@section('title')
    Pickup Points List
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('pickup_point.create') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-plus"></i>
                            Add New</a>
                    </div>
                    <div class="table-responsive">
                        <table id="responsiveTable" class="display responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pickup Points Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Alternative Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pickup_points as $index => $pickuppoint)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $pickuppoint->pickup_point_name }}</td>
                                        <td>{{ $pickuppoint->pickup_point_address }}</td>
                                        <td>{{ $pickuppoint->pickup_point_phone }}</td>
                                        <td>{{ $pickuppoint->pickup_point_phone_alt }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('pickup_point.edit', ['pickup_point' => $pickuppoint->id]) }}"
                                                class="badge light badge-warning"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                            <form
                                                action="{{ route('pickup_point.destroy', ['pickup_point' => $pickuppoint->id]) }}"
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
@endpush
