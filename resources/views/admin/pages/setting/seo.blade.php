@extends('admin.layouts.master')
@section('title')
    SEO Setting
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SEO Setting</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('seo.settingUpdate', ['id' => $seo->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="mb-3 col-6">
                                    <label class="form-label">Meta Title </label>
                                    <input type="text"
                                        class="form-control @error('meta_title')
                                is-invalid
                            @enderror"
                                        placeholder="Enter meta title" name="meta_title"
                                        value="{{ old('meta_title', $seo->meta_title) }}">
                                    @error('meta_title')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">Meta Author </label>
                                    <input type="text"
                                        class="form-control @error('meta_author')
                                is-invalid
                            @enderror"
                                        placeholder="Enter meta author" name="meta_author"
                                        value="{{ old('meta_author', $seo->meta_author) }}">
                                    @error('meta_author')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">Meta Tags </label>
                                    <input type="text"
                                        class="form-control @error('meta_tag')
                                is-invalid
                            @enderror"
                                        placeholder="Enter meta tags" name="meta_tag"
                                        value="{{ old('meta_tag', $seo->meta_tag) }}">
                                    @error('meta_tag')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">Meta Keyword <small class="text-success"><strong>( Example:
                                                ecommerce,online shop,online market )</strong></small></label>
                                    <input type="text"
                                        class="form-control @error('meta_keyword')
                                is-invalid
                            @enderror"
                                        placeholder="Enter meta keyword" name="meta_keyword"
                                        value="{{ old('meta_keyword', $seo->meta_keyword) }}">
                                    @error('meta_keyword')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Meta Description</label>
                                    <textarea
                                        class="form-txtarea form-control @error('meta_description')
                                    is-invalid
                                @enderror"
                                        name="meta_description" placeholder="enter meta description" rows="4" id="comment">{{ old('meta_description', $seo->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label class="form-label">Google Verification <small class="text-success"><strong>( Put
                                                here only verification code )</strong></small></label>
                                    <input type="text"
                                        class="form-control @error('google_verification')
                                is-invalid
                            @enderror"
                                        placeholder="Enter google verification code" name="google_verification"
                                        value="{{ old('google_verification', $seo->google_verification) }}">
                                    @error('google_verification')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">Alexa Verification <small class="text-success"><strong>( Put
                                                here only verification code )</strong></small></label>
                                    <input type="text"
                                        class="form-control @error('alexa_verification')
                                is-invalid
                            @enderror"
                                        placeholder="Enter alexa verification code" name="alexa_verification"
                                        value="{{ old('alexa_verification', $seo->alexa_verification) }}">
                                    @error('alexa_verification')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Google Analytics</label>
                                    <textarea
                                        class="form-txtarea form-control @error('google_analytics')
                                    is-invalid
                                @enderror"
                                        name="google_analytics" placeholder="enter google analytics" rows="4" id="comment">{{ old('google_analytics', $seo->google_analytics) }}</textarea>
                                    @error('google_analytics')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label">Google Absense</label>
                                    <textarea
                                        class="form-txtarea form-control @error('google_absense')
                                    is-invalid
                                @enderror"
                                        name="google_absense" placeholder="enter google absense" rows="4" id="comment">{{ old('google_absense', $seo->google_absense) }}</textarea>
                                    @error('google_absense')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary mt-3">update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
