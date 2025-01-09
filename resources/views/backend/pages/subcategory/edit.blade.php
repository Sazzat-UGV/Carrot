@extends('backend.layouts.app')
@section('title')
    Edit Subcategory
@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <h5 class="card-header">Edit Subcategory</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="">
                                <a href="{{ route('admin.subcategory.index') }}" class="btn btn-secondary mb-2">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Subcategories
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.subcategory.update', $subcategory->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label for="category" class="form-label">Category<span class="text-danger">*</span></label>
                                <select id="category" class="form-select @error('category') is-invalid @enderror" name="category">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category', $subcategory->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Subcategory Name<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('subcategory_name')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter subcategory name" name="subcategory_name"
                                    value="{{ old('subcategory_name', $subcategory->name) }}">
                                @error('subcategory_name')
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
