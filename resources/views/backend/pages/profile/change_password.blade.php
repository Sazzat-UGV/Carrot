@extends('backend.layouts.app')
@section('title')
    Profile
@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-6">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body pt-1">
                    <form action="{{ route('admin.changePassword') }}" method="POST"
                        class="fv-plugins-bootstrap5 fv-plugins-framework">
                        @csrf
                        <div class="row">
                            <div class="mb-6 col-12 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="current_password">Current Password<span
                                        class="text-danger">*</span></label>
                                <div class="input-group input-group-merge has-validation">
                                    <input
                                        class="form-control @error('current_password')
                                        is-invalid
                                    @enderror"
                                        type="password" name="current_password" id="current_password"
                                        name="current_password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="mb-6 col-12 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="new_password">New Password<span
                                        class="text-danger">*</span></label>
                                <div class="input-group input-group-merge has-validation">
                                    <input
                                        class="form-control @error('new_password')
                                        is-invalid
                                    @enderror"
                                        type="password" name="new_password" id="new_password" name="new_password"
                                        placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="mb-6 col-12 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="confirm_new_password">Confirm New Password<span
                                        class="text-danger">*</span></label>
                                <div class="input-group input-group-merge has-validation">
                                    <input
                                        class="form-control @error('confirm_new_password')
                                        is-invalid
                                    @enderror"
                                        type="password" name="confirm_new_password" id="confirm_new_password"
                                        name="confirm_new_password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('confirm_new_password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <h6 class="text-body">Password Requirements:</h6>
                        <ul class="ps-4 mb-0">
                            <li class="mb-4">Minimum 6 characters long - the more, the better</li>
                            <li class="mb-4">At least one lowercase character</li>
                            <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary me-3">Save</button>
                            <button type="reset" class="btn btn-label-secondary">Reset</button>
                        </div>
                        <input type="hidden">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
