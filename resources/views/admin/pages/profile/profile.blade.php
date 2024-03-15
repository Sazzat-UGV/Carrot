@extends('admin.layouts.master')
@section('title')
    My Profile
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo rounded"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="{{ asset('uploads/user') }}/{{ Auth::user()->image }}"
                                class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{ Auth::user()->name }}</h4>
                                <p>
                                    @if (Auth::user()->is_admin == 1)
                                        Admin
                                    @endif
                                </p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
                                <p>Email</p>
                            </div>
                            <div class="dropdown ms-auto">
                                <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown"
                                    aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                        </g>
                                    </svg></a>
                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                    <a href="{{ route('admin.edit_profile_page') }}">
                                        <li class="dropdown-item"><i class="fa fa-edit text-primary me-2"></i> Edit
                                            profile</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-statistics">
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="profile-photo">
                                                <img src="{{ asset('uploads/user') }}/{{ Auth::user()->image }}"
                                                    class="img-fluid rounded-circle w-75" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal"
                                            data-bs-target="#change_image">Change Image</a>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="change_image">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Change Image</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="comment-form"
                                                    action="{{ route('admin.profile_image_update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <input type="file"
                                                                    class="form-control dropify @error('image')
                                                                    is-invalid
                                                                @enderror"
                                                                    name="image"
                                                                    data-default-file="{{ asset('uploads/user') }}/{{ Auth::user()->image }}"
                                                                    data-height="230">
                                                                @error('image')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                                @enderror
                                                                <label for="image" class="text-danger"
                                                                    style="font-size: 10px;font-weight: bold">JPG or PNG no
                                                                    larger than 10 MB</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="mb-3 mb-0">
                                                            <input type="submit" value="Update"
                                                                class="submit btn btn-primary" name="submit">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card h-auto">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation"><a href="#about-me" data-bs-toggle="tab"
                                        class="nav-link active" aria-selected="false" role="tab"
                                        tabindex="-1">About
                                        Me</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="about-me" class="tab-pane fade active show" role="tabpanel">
                                    <div class="profile-personal-info mt-4">
                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ Auth::user()->name }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Phone <span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ Auth::user()->phone }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Address <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ Auth::user()->address }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        })
    </script>
@endpush
