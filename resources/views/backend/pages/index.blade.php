@extends('backend.layouts.app')
@section('title')
    Dashboard
@endsection
@push('style')
@endpush
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header">Table Header</h5>
                    <div class="col-md-12 col-lg-12 col-sm-12 py-4">
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary">
                                <i class="bx bx-plus"></i>
                                Add New
                            </a>
                        </div>
                    </div>
                    <form action="#" method="GET">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto mb-4">
                                <div class="dropdown mt-4 mt-sm-0">
                                    <a href="#"
                                        class="btn bg-label-primary dropdown-toggle d-flex align-items-center justify-content-center"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>Export</span>
                                    </a>
                                    <div class="dropdown-menu" style="">
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bx bxs-file-pdf font-size-16"></i> Export as PDF</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bx bxs-file-export font-size-16"></i> Export as Excel</a>
                                        </li>
                                    </div>
                                </div>

                            </div>
                            <div class="col-auto mb-4 d-flex">
                                <input class="form-control me-2" type="text" placeholder="Search" name="search"
                                    value="#">
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
                                    <th>Project</th>
                                    <th>Client</th>
                                    <th>Users</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $u)
                                <tr>
                                    <td><i class="fab fa-angular fa-xl text-danger me-4"></i> <span>Angular Project</span>
                                    </td>
                                    <td>Albert Cook</td>
                                    <td>
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class="avatar avatar-xs pull-up" aria-label="Lilian Fuller"
                                                data-bs-original-title="Lilian Fuller">
                                                <img src="{{ asset('assets/backend') }}/img/avatars/5.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </li>
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson"
                                                data-bs-original-title="Sophia Wilkerson">
                                                <img src="{{ asset('assets/backend') }}/img/avatars/6.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </li>
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class="avatar avatar-xs pull-up" aria-label="Christina Parker"
                                                data-bs-original-title="Christina Parker">
                                                <img src="{{ asset('assets/backend') }}/img/avatars/7.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
