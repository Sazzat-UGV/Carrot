@extends('admin.layouts.master')
@section('title')
    Change Password
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Change Password</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.change_password', ['id' => Auth::user()->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label class="form-label">Current Password <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('current_password')
                                    is-invalid
                                @enderror"
                                        placeholder="Enter current password" name="current_password"
                                        value="{{ old('current_password') }}">
                                    @error('current_password')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">New Password <span class="text-danger">*</span></label>
                                    <input type="password"
                                        class="form-control  @error('new_password')
                                is-invalid
                            @enderror"
                                        placeholder="Enter new password" name="new_password"
                                        value="{{ old('new_password') }}">
                                    @error('new_password')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Retype Password <span class="text-danger">*</span></label>
                                    <input type="password"
                                        class="form-control  @error('retype_password')
                                is-invalid
                            @enderror"
                                        placeholder="Enter retype password" name="retype_password"
                                        value="{{ old('retype_password') }}">
                                    @error('retype_password')
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
