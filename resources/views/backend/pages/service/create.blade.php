@extends('backend.layouts.app')
@section('title')
    Create Service
@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <h5 class="card-header">Add New Service</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="">
                                <a href="{{ route('admin.service.index') }}" class="btn btn-secondary mb-2">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Services
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <label class="form-label">Icon<span class="text-danger">*</span> <b class="text-warning"
                                        style="font-size: 12px">(Remix Icon)</b></label>
                                <input
                                    class="form-control @error('icon')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter service icon" name="icon"
                                    value="{{ old('icon') }}">
                                @error('icon')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('title')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter service title" name="title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="" cols="30" rows="3"
                                    class="form-control @error('description')
                        is-invalid
                        @enderror"
                                    placeholder="Enter service description">{{ old('description') }}</textarea>
                                @error('description')
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
