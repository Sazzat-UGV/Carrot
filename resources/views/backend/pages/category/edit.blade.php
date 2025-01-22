@extends('backend.layouts.app')
@section('title')
    Edit Category
@endsection
@push('style')
    <style>
        i {
            font-size: 50px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <h5 class="card-header">Edit Category</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="">
                                <a href="{{ route('admin.category.index') }}" class="btn btn-secondary mb-2">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Categories
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-md- mb-4">
                                {!! $category->icon !!}
                                <strong>(Existing Icon)</strong>
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <label class="form-label">Category Icon<span class="text-danger">*</span> <b class="text-warning"
                                    style="font-size: 12px">(Remix Icon)</b></label>
                                <input
                                    class="form-control @error('category_icon')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter category icon" name="category_icon"
                                    value="{{ old('category_icon', $category->icon) }}">
                                @error('category_icon')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <label class="form-label">Category Name<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('category_name')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter category name" name="category_name"
                                    value="{{ old('category_name', $category->name) }}">
                                @error('category_name')
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
