@extends('backend.layouts.app')
@section('title')
    Create Pickup Point
@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <h5 class="card-header">Add New Pickup Point</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="">
                                <a href="{{ route('admin.pickup-point.index') }}" class="btn btn-secondary mb-2">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Pickup Points
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.pickup-point.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12  mb-4">
                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter pickup point name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <label class="form-label">Primary Phone<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('primary_phone')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter primary phone" name="primary_phone"
                                    value="{{ old('primary_phone') }}">
                                @error('primary_phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <label class="form-label">Secondary Phone</label>
                                <input
                                    class="form-control @error('secondary_phone')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter secondary phone" name="secondary_phone"
                                    value="{{ old('secondary_phone') }}">
                                @error('secondary_phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Address<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('address')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter address" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary px-4" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
