@extends('admin.layouts.master')
@section('title')
    Add Sub Category
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Sub Category</h4>
                </div>
                <div class="card-body">
                    <div class=" mb-3">
                        <a href="{{ route('subcategory.index') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-arrow-alt-circle-left"></i>
                            Back to Sub Category List</a>
                    </div>
                    <div class="basic-form">
                        <form action="{{ route('subcategory.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Select Category <span class="text-danger">*</span></label>
                                        <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                            <select name="category_name"
                                                class="default-select form-control wide @error('category_name')
                                            is-invalid
                                                @enderror"
                                                tabindex="null">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if (old('category_name', $category->id) == $category->id) selected @endif>
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_name')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Sub Category Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('subcategory_name')
                                is-invalid
                            @enderror"
                                        placeholder="Enter subcategory name" name="subcategory_name"
                                        value="{{ old('subcategory_name') }}">
                                    @error('subcategory_name')
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
