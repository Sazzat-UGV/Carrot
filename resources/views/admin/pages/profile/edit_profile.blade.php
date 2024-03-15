@extends('admin.layouts.master')
@section('title')
    Edit Profile
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.edit_profile', ['id' => Auth::user()->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                        placeholder="Enter name" name="name"
                                        value="{{ old('name', Auth::user()->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email"
                                        class="form-control  @error('email')
                                is-invalid
                            @enderror"
                                        placeholder="Enter email" name="email"
                                        value="{{ old('email', Auth::user()->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control  @error('phone')
                                is-invalid
                            @enderror"
                                        placeholder="Enter phone" name="phone"
                                        value="{{ old('phone', Auth::user()->phone) }}">
                                    @error('phone')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control  @error('address')
                                is-invalid
                            @enderror"
                                        placeholder="Enter address" name="address"
                                        value="{{ old('address', Auth::user()->address) }}">
                                    @error('address')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
