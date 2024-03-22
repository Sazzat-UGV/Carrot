@extends('admin.layouts.master')
@section('title')
    Edit Coupon
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Coupon</h4>
                </div>
                <div class="card-body">
                    <div class=" mb-3">
                        <a href="{{ route('coupon.index') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-arrow-alt-circle-left"></i>
                            Back to Coupon List</a>
                    </div>
                    <div class="basic-form">
                        <form action="{{ route('coupon.update', ['coupon' => $coupon->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label class="form-label">Coupon Code<span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('coupon_code')
                                    is-invalid
                                    @enderror"
                                        placeholder="Enter coupon code" name="coupon_code"
                                        value="{{ old('coupon_code', $coupon->coupon_code) }}">
                                    @error('coupon_code')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Coupon Type <span class="text-danger">*</span></label>
                                    <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                        <select name="type"
                                            class="default-select form-control wide @error('type')
                                            is-invalid
                                                @enderror"
                                            tabindex="null">
                                            <option value="1" @if (old('type', $coupon->type) == 1) selected @endif>Fixed
                                            </option>
                                            <option value="2" @if (old('type', $coupon->type) == 2) selected @endif>
                                                Percentage
                                            </option>
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="mb-3 col-12">
                                    <label class="form-label">Amount <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('coupon_amount')
                                    is-invalid
                                    @enderror"
                                        placeholder="Enter coupon amount" name="coupon_amount"
                                        value="{{ old('coupon_amount', $coupon->coupon_amount) }}">
                                    @error('coupon_amount')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Valid Date <span class="text-danger">*</span></label>
                                    <input type="date"
                                        class="form-control @error('valid_date')
                                    is-invalid
                                    @enderror"
                                        placeholder="Enter valid date" name="valid_date"
                                        value="{{ old('valid_date', $coupon->valid_date) }}">
                                    @error('valid_date')
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
