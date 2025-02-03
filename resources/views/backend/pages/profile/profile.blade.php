@extends('backend.layouts.app')
@section('title')
    Profile
@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <form action="{{ route('admin.profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                            <img src="{{ Auth::user()->image }}" alt="image"
                                class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="image" id="upload"
                                        class="account-file-input @error('image')
                                    is-invalid
                                    @enderror"
                                        hidden="">
                                </label>
                                <button type="submit" class="btn btn-outline-primary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Save</span>
                                </button>
                                @error('image')
                                    <p class="text-danger" style="font-size: 14px"><strong>{{ $message }}</strong></p>
                                @enderror
                                <p class="text-muted mb-0">Allowed JPG, PNG, JPEG. Max size of 10M</p>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{ route('admin.profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                <input type="text" id="name" value="{{ old('name', Auth::user()->name) }}"
                                    name="name"
                                    class="form-control @error('name')
                                        is-invalid
                                    @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" value="{{ old('email', Auth::user()->email) }}"
                                    class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                    disabled>
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" value="{{ old('phone', Auth::user()->phone) }}"
                                    name="phone"
                                    class="form-control @error('phone')
                                        is-invalid
                                    @enderror">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address" value="{{ old('address', Auth::user()->address) }}"
                                    name="address"
                                    class="form-control @error('address')
                                        is-invalid
                                    @enderror">
                                @error('address')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('script')
@endpush
