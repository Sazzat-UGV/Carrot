@extends('backend.layouts.app')
@section('title')
    Create Coupon
@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <h5 class="card-header">Add New Coupon</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="">
                                <a href="{{ route('admin.coupon.index') }}" class="btn btn-secondary mb-2">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Coupons
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-10 mb-4">
                                <label class="form-label">Coupon Code<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('coupon_code')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter coupon code" name="coupon_code"
                                    value="{{ old('coupon_code') }}">
                                @error('coupon_code')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-2 mb-4">
                                <label class="form-label">Type<span class="text-danger">*</span></label>
                                <select id="type" class="form-select @error('type') is-invalid @enderror"
                                    name="type">
                                    <option value="">Select Type</option>
                                    <option value="Fixed" {{ old('type') == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                                    <option value="Percentage" {{ old('type') == 'Percentage' ? 'selected' : '' }}>
                                        Percentage
                                    </option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <label class="form-label">Amount<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('amount')
                                        is-invalid
                                    @enderror"
                                    type="number" placeholder="Enter amount" name="amount" value="{{ old('amount') }}">
                                @error('amount')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <label class="form-label">Validate Date<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('validate_date')
                                        is-invalid
                                    @enderror"
                                    type="date" name="validate_date" value="{{ old('validate_date') }}">
                                @error('validate_date')
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
