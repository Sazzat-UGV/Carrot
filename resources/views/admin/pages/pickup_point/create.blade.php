@extends('admin.layouts.master')
@section('title')
    Add Pickup Point
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Pickup Point</h4>
                </div>
                <div class="card-body">
                    <div class=" mb-3">
                        <a href="{{ route('pickup_point.index') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-arrow-alt-circle-left"></i>
                            Back to Pickup Point List</a>
                    </div>
                    <div class="basic-form">
                        <form action="{{ route('pickup_point.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label class="form-label">Pickup Points Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('pickup_point_name')
                                    is-invalid
                                    @enderror"
                                        placeholder="Enter pickup point name" name="pickup_point_name"
                                        value="{{ old('pickup_point_name') }}">
                                    @error('pickup_point_name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Pickup Point Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('pickup_point_address')
                                    is-invalid
                                    @enderror"
                                        placeholder="Enter pickup point address" name="pickup_point_address"
                                        value="{{ old('pickup_point_address') }}">
                                    @error('pickup_point_address')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Pickup Point Phone <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('pickup_point_phone')
                                                                    is-invalid
                                                                    @enderror"
                                        placeholder="Enter pickup point phone" name="pickup_point_phone"
                                        value="{{ old('pickup_point_phone') }}">
                                    @error('pickup_point_phone')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Alternative Pickup Point Phone</label>
                                    <input type="text"
                                        class="form-control @error('pickup_point_phone_alt')
                                                                    is-invalid
                                                                    @enderror"
                                        placeholder="Enter pickup point phone alt" name="pickup_point_phone_alt"
                                        value="{{ old('pickup_point_phone_alt') }}">
                                    @error('pickup_point_phone_alt')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
