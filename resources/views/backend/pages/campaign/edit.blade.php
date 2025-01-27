@extends('backend.layouts.app')
@section('title')
    Edit Campaign
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
                <h5 class="card-header">Edit Campaign</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="">
                                <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary mb-2">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Campaigns
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.campaign.update', $campaign->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('title')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter title" name="title"
                                    value="{{ old('title', $campaign->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-4 mb-4">
                                <label class="form-label">Start Date<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('start_date')
                                        is-invalid
                                    @enderror"
                                    type="date" placeholder="Enter start date" name="start_date"
                                    value="{{ old('start_date', $campaign->start_date) }}">
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-4 mb-4">
                                <label class="form-label">End Date<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('end_date')
                                        is-invalid
                                    @enderror"
                                    type="date" placeholder="Enter end date" name="end_date"
                                    value="{{ old('end_date', $campaign->end_date) }}">
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-4 mb-4">
                                <label class="form-label">Discount<span class="text-danger">*</span><span
                                        class="text-warning"> (Discount percentage are apply for all product selling
                                        price)</span></label>
                                <input
                                    class="form-control @error('discount')
                                        is-invalid
                                    @enderror"
                                    type="text" placeholder="Enter discount" name="discount"
                                    value="{{ old('discount', $campaign->discount) }}">
                                @error('discount')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Image<span class="text-danger">*</span></label>
                                <input
                                    class="form-control dropify @error('image')
                                        is-invalid
                                    @enderror"
                                    type="file" name="image"
                                    data-default-file='{{ asset('uploads/campaign') }}/{{ $campaign->image }}'>
                                @error('image')
                                    <span style="font-size: 13px;" class="text-danger"
                                        role="alert"><strong>{{ $message }}</strong></span>
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
