@extends('backend.layouts.app')
@section('title')
    Database Backup
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
                    <h5 class="card-header">Backup List</h5>
                    <div class="col-md-12 col-lg-12 col-sm-12 py-4">
                        <div class="d-flex justify-content-end">

                            <div class="text-sm-end">
                                <button type="button" class="btn btn-primary"
                                    onclick="event.preventDefault(); document.getElementById('new-backup-form').submit();">
                                    <i class="bx bx-plus"></i> New Backup</button>
                                <form action="{{ route('admin.backup.store') }}" method="POST" class="d-none"
                                    id="new-backup-form">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="example" class="table table-" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Last Backup</th>
                                    <th>File Name</th>
                                    <th>File Size</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($backups as $index => $backup)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $backup['created_at'] }}</td>
                                        <td>{{ $backup['file_name'] }}</td>
                                        <td>{{ $backup['file_size'] }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.backupDownload', $backup['file_name']) }}"><i
                                                            class="bx bxs-download me-1"></i> Download</a>
                                                    <form action="{{ route('admin.backup.destroy', $backup['file_name']) }}"
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
