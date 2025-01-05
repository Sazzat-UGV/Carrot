@extends('backend.layouts.app')
@section('title')
Privacy Policy
@endsection
@push('style')

@endpush
@section('content')
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.privacyPolicy') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-12 mb-4">
                            <label class="form-label">Privacy Policy<span class="text-danger">*</span></label>
                            <textarea name="privacy_policy" id="editor" cols="30" rows="5"
                                class="form-control @error('privacy_policy')
                            is-invalid
                            @enderror"
                                placeholder="Enter privacy policy">{{ old('privacy_policy', $page->privacy_policy) }}</textarea>
                            @error('privacy_policy')
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
