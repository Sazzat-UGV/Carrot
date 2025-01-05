@extends('backend.layouts.app')
@section('title')
Terms & Conditions
@endsection
@push('style')

@endpush
@section('content')
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.termsCondition') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-12 mb-4">
                            <label class="form-label">Terms & Conditions<span class="text-danger">*</span></label>
                            <textarea name="terms_condition" id="editor" cols="30" rows="5"
                                class="form-control @error('terms_condition')
                            is-invalid
                            @enderror"
                                placeholder="Enter terms conditions">{{ old('terms_condition', $page->terms_condition) }}</textarea>
                            @error('terms_condition')
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
