@extends('backend.layouts.app')
@section('title')
    Edit Warehouse
@endsection
@push('style')
@endpush
@section('content')
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Edit Warehouse</h5>
            <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="">
                                <a href="{{ route('admin.warehouse.index') }}"
                                    class="btn btn-secondary mb-2">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Warehouses
                                </a>
                            </div>
                        </div>
                    </div>
                <form action="{{ route('admin.warehouse.update',$warehouse->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6 mb-4">
                            <label class="form-label">Warehouse Name<span class="text-danger">*</span></label>
                            <input
                                class="form-control @error('warehouse_name')
                                        is-invalid
                                    @enderror"
                                type="text" placeholder="Enter warehouse name" name="warehouse_name" value="{{ old('warehouse_name',$warehouse->name) }}">
                            @error('warehouse_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-6 mb-4">
                            <label class="form-label">Warehouse Phone<span class="text-danger">*</span></label>
                            <input
                                class="form-control @error('warehouse_phone')
                                        is-invalid
                                    @enderror"
                                type="text" placeholder="Enter warehouse phone" name="warehouse_phone" value="{{ old('warehouse_phone',$warehouse->phone) }}">
                            @error('warehouse_phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 mb-4">
                            <label class="form-label">Warehouse Address<span class="text-danger">*</span></label>
                            <input
                                class="form-control @error('warehouse_address')
                                        is-invalid
                                    @enderror"
                                type="text" placeholder="Enter warehouse address" name="warehouse_address" value="{{ old('warehouse_address',$warehouse->address) }}">
                            @error('warehouse_address')
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
