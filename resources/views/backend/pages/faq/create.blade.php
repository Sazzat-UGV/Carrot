@extends('backend.layouts.app')
@section('title')
    Create Faq
@endsection
@push('style')
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
                <h5 class="card-header">Add New Faq</h5>
                <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="">
                                    <a href="{{ route('admin.faq.index') }}"
                                        class="btn btn-secondary mb-2">
                                        <i class="bx bx-arrow-back me-1"></i> Back to Faqs
                                    </a>
                                </div>
                            </div>
                        </div>
                    <form action="{{ route('admin.faq.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Question<span class="text-danger">*</span></label>
                                <input
                                    class="form-control @error('question')
                                            is-invalid
                                        @enderror"
                                    type="text" placeholder="Enter question" name="question" value="{{ old('question') }}">
                                @error('question')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Answer<span class="text-danger">*</span></label>
                                <textarea name="answer" id="" cols="30" rows="5"
                                    class="form-control @error('answer')
                                is-invalid
                                @enderror"
                                    placeholder="Enter answer">{{ old('answer') }}</textarea>
                                @error('answer')
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
