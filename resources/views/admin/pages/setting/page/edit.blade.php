@extends('admin.layouts.master')
@section('title')
    Edit Page
@endsection
@push('admin_style')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Page</h4>
                </div>
                <div class="card-body">
                    <div class=" mb-3">
                        <a href="{{ route('page.index') }}" class="btn btn-primary px-4"><i
                                class="fa-solid fa-arrow-alt-circle-left"></i>
                            Back to Page List</a>
                    </div>
                    <div class="basic-form">
                        <form action="{{ route('page.update', ['id' => $page->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label class="form-label">Page Position</label>
                                    <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                        <select name="page_position"
                                            class="default-select form-control wide @error('page_position')
                                            is-invalid
                                                @enderror"
                                            tabindex="null">
                                            <option value="1" @if ($page->id == 1) selected @endif>Line
                                                One</option>
                                            <option value="2" @if ($page->id == 2) selected @endif>
                                                Line Two</option>
                                            <option value="3" @if ($page->id == 3) selected @endif>
                                                Line Three</option>
                                        </select>
                                        @error('page_position')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Page Name</label>
                                    <input type="text"
                                        class="form-control @error('page_name')
                                is-invalid
                            @enderror"
                                        placeholder="Enter page name" name="page_name"
                                        value="{{ old('page_name', $page->page_name) }}">
                                    @error('page_name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Page Title</label>
                                    <input type="text"
                                        class="form-control @error('page_title')
                                is-invalid
                            @enderror"
                                        placeholder="Enter page title" name="page_title"
                                        value="{{ old('page_title', $page->page_title) }}">
                                    @error('page_title')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Page Description <small class="text-success"><strong>( This
                                                data will show on your webpage. )</strong></small></label>
                                    <textarea
                                        class="form-txtarea form-control @error('page_description')
                                    is-invalid
                                @enderror"
                                        name="page_description" id="editor" placeholder="enter page description" rows="4" id="comment">{{ old('page_description', $page->page_description) }}</textarea>
                                    @error('page_description')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update Page</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
