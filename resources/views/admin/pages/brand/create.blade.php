@extends('admin.layouts.master')
@section('title')
    Add Brand
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Brand </h4>
                </div>
                <div class="card-body">
                    <div class=" mb-3">
                        <a href="{{ route('brand.index') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-arrow-alt-circle-left"></i>
                            Back to Brand List</a>
                    </div>
                    <div class="basic-form">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label class="form-label">Brand Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('brand_name')
                                is-invalid
                            @enderror"
                                        placeholder="Enter brand name" name="brand_name"
                                        value="{{ old('brand_name') }}">
                                    @error('brand_name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>


                                <div class="mb-3 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Select Status<span
                                                class="text-danger">*</span></label>
                                        <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                            <select name="status"
                                                class="default-select form-control wide @error('status')
                                            is-invalid
                                                @enderror"
                                                tabindex="null">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Brand Image<span
                                                class="text-danger">*</span></label>
                                                <input type="file"
                                                class="form-control dropify @error('image')
                                                is-invalid
                                            @enderror"
                                                name="image"
                                                data-height="230">
                                            @error('image')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                            <label for="image" class="text-danger"
                                                style="font-size: 10px;font-weight: bold">JPG or PNG no
                                                larger than 10 MB</label>
                                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function() {
    $('.dropify').dropify();
})
</script>
@endpush
