@extends('admin.layouts.master')
@section('title')
    Edit Child Category
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Child Category</h4>
                </div>
                <div class="card-body">
                    <div class=" mb-3">
                        <a href="{{ route('childcategory.index') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-arrow-alt-circle-left"></i>
                            Back to Child Category List</a>
                    </div>
                    <div class="basic-form">
                        <form action="{{ route('childcategory.update', ['childcategory' => $childcategory->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Select Sub Category <span
                                                class="text-danger">*</span></label>
                                        <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                            <select name="sub_category_name"
                                                class="default-select form-control wide @error('sub_category_name')
                                            is-invalid
                                                @enderror"
                                                tabindex="null">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" class="text-bg-primary text-bold"
                                                        disabled>Category: {{ $category->category_name }}</option>
                                                    @php
                                                        $subcategories = \App\Models\Subcategory::where(
                                                            'category_id',
                                                            $category->id,
                                                        )->get();
                                                    @endphp
                                                    @foreach ($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}"
                                                            @if (old('sub_category_name') == $subcategory->id || $childcategory->subcategory_id == $subcategory->id) selected @endif>
                                                            {{ $subcategory->subcategory_name }}
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            @error('sub_category_name')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Child Category Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('childcategory_name')
                                is-invalid
                            @enderror"
                                        placeholder="Enter childcategory name" name="childcategory_name"
                                        value="{{ old('childcategory_name', $childcategory->childcategory_name) }}">
                                    @error('childcategory_name')
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
