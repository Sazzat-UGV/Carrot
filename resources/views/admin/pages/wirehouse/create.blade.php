@extends('admin.layouts.master')
@section('title')
    Add Warehouse
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Warehouse</h4>
                </div>
                <div class="card-body">
                    <div class=" mb-3">
                        <a href="{{ route('warehouse.index') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-arrow-alt-circle-left"></i>
                            Back to Warehouse List</a>
                    </div>
                    <div class="basic-form">
                        <form action="{{ route('warehouse.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label class="form-label">Warehouse Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('warehouse_name')
                                    is-invalid
                                    @enderror"
                                        placeholder="Enter warehouse name" name="warehouse_name"
                                        value="{{ old('warehouse_name') }}">
                                    @error('warehouse_name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Warehouse Phone <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('warehouse_phone')
                                    is-invalid
                                    @enderror"
                                        placeholder="Enter warehouse phone" name="warehouse_phone"
                                        value="{{ old('warehouse_phone') }}">
                                    @error('warehouse_phone')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Warehouse Address <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('warehouse_address')
                                    is-invalid
                                    @enderror"
                                        placeholder="Enter warehouse address" name="warehouse_address"
                                        value="{{ old('warehouse_address') }}">
                                    @error('warehouse_address')
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
