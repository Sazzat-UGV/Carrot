@extends('backend.layouts.app')
@section('title')
    User Details
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/css/pages/page-profile.css" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-6">
                <div class="user-profile-header-banner">
                    <img src="{{ asset('assets/backend') }}/img/pages/profile-banner.png" alt="Banner image"
                        class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">
                    <div class="flex-shrink-0 mt-1 mx-sm-0 mx-auto">
                        <img src="{{ $user->image }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-6 rounded-3 user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-lg-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4 class="mb-2 mt-lg-7">{{ $user->name }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
                                    <li class="list-inline-item">
                                        <i class="bx bx-palette me-2 align-top"></i><span
                                            class="fw-medium">{{ $user->role }}</span>
                                    </li>
                                    @if ($user->address)
                                        <li class="list-inline-item">
                                            <i class="bx bx-map me-2 align-top"></i><span
                                                class="fw-medium">{{ $user->address }}</span>
                                        </li>
                                    @endif
                                    <li class="list-inline-item">
                                        <i class="bx bx-calendar me-2 align-top"></i><span class="fw-medium"> Joined
                                            {{ $user->created_at->format('F Y') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <div class="card mb-6">
                <div class="card-body">
                    <small class="card-text text-uppercase text-muted small">About</small>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-user"></i><span
                                class="fw-medium mx-2">Full Name:</span> <span>{{ $user->name }}</span></li>
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-check"></i><span
                                class="fw-medium mx-2">Status:</span>{!! $user->status == 1
                                    ? '<span class="badge bg-label-success">Active</span>'
                                    : '<span class="badge bg-label-danger">Inactive</span>' !!}
                        </li>
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-crown"></i><span
                                class="fw-medium mx-2">Role:</span> <span>{{ $user->role }}</span></li>

                    </ul>
                    <small class="card-text text-uppercase text-muted small">Contacts</small>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-phone"></i><span
                                class="fw-medium mx-2">Contact:</span> <span>{{ $user->phone }}</span></li>
                        <li class="d-flex align-items-center mb-4"><i class="bx bx-envelope"></i><span
                                class="fw-medium mx-2">Email:</span> <span>{{ $user->email }}</span></li>
                    </ul>

                </div>
            </div>
        </div>



        <div class="col-xl-8 col-lg-7 col-md-7">
            <!-- Activity Timeline -->
            <div class="card card-action mb-6">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0"><i class="bx bx-bar-chart-alt-2 bx-lg text-body me-4"></i>Activity
                        Timeline</h5>
                </div>
                <div class="card-body pt-3">
                    <ul class="timeline mb-0">
                        <li class="timeline-item timeline-item-transparent">
                            <span class="timeline-point timeline-point-primary"></span>
                            <div class="timeline-event">
                                <div class="timeline-header mb-3">
                                    <h6 class="mb-0">Successfully Registered</h6>
                                    <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-2">
                                    This user have successfully registered.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
