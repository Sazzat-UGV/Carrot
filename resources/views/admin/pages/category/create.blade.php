@extends('admin.layouts.master')
@section('title')
    Add Category
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Category</h4>
                </div>
                <div class="card-body">
                    <div class=" mb-3">
                        <a href="{{ route('category.index') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-arrow-alt-circle-left"></i>
                            Back to Categories</a>
                    </div>
                    <div class="basic-form">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label class="form-label">Category Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('category_name')
                                is-invalid
                            @enderror"
                                        placeholder="Enter category name" name="category_name"
                                        value="{{ old('category_name') }}">
                                    @error('category_name')
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
