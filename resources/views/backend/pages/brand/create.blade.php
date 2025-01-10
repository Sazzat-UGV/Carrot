@extends('backend.layouts.app')
@section('title')
    Create Brand
@endsection
@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.dropify-wrapper .dropify-message p {
    font-size: 20px;
}
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Add New Brand</h5>
            <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="">
                                <a href="{{ route('admin.brand.index') }}"
                                    class="btn btn-secondary mb-2">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Brands
                                </a>
                            </div>
                        </div>
                    </div>
                <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label class="form-label">Brand Name<span class="text-danger">*</span></label>
                            <input
                                class="form-control @error('brand_name')
                                        is-invalid
                                    @enderror"
                                type="text" placeholder="Enter brand name" name="brand_name" value="{{ old('brand_name') }}">
                            @error('brand_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 mb-4">
                            <label class="form-label">Photo<span class="text-danger">*</span></label>
                            <input
                                class="form-control dropify @error('photo')
                                        is-invalid
                                    @enderror"
                                type="file" name="photo">
                            @error('photo')
                                <span style="font-size: 13px;" class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$('.dropify').dropify();
</script>
@endpush
