@extends('backend.layouts.app')
@section('title')
    Dashboard
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
    <link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css">
    <script src="https://unpkg.com/@yaireo/tagify"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <h6 class="text-muted">General Setting</h6>
            <div class="nav-align-top mb-6">
                <ul class="nav nav-pills mb-4" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link  {{ request('stage') == 'site' ? 'active' : '' }}"
                            role="tab" data-bs-toggle="tab" data-bs-target="#site" aria-controls="site"
                            aria-selected="true">Site Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link  {{ request('stage') == 'contact' ? 'active' : '' }}"
                            role="tab" data-bs-toggle="tab" data-bs-target="#contact" aria-controls="contact"
                            aria-selected="false">Contact
                            Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link  {{ request('stage') == 'breadcrumb' ? 'active' : '' }}"
                            role="tab" data-bs-toggle="tab" data-bs-target="#breadcrumb" aria-controls="breadcrumb"
                            aria-selected="false">Breadcrumb
                            Image</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link  {{ request('stage') == 'social' ? 'active' : '' }}"
                            role="tab" data-bs-toggle="tab" data-bs-target="#social" aria-controls="social"
                            aria-selected="false">Social Media
                            Links</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link  {{ request('stage') == 'map' ? 'active' : '' }}"
                            role="tab" data-bs-toggle="tab" data-bs-target="#map" aria-controls="map"
                            aria-selected="false">Map</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- Site Information Tab -->
                    <div class="tab-pane fade {{ request('stage') == 'site' ? 'show active' : '' }}" id="site"
                        role="tabpanel">
                        <form action="{{ route('admin.general_setting_submit') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label class="form-label">Site Name</label>
                                    <input
                                        class="form-control @error('site_name')
                                 is-invalid
                            @enderror"
                                        type="text" placeholder="Enter site name" name="site_name"
                                        value="{{ old('site_name', $setting->site_name) }}">
                                    @error('site_name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label class="form-label">Site Logo</label>
                                    <input
                                        class="form-control dropify @error('site_logo')
                                is-invalid
                            @enderror"
                                        type="file"
                                        data-default-file="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}"
                                        name="site_logo">
                                    @error('site_logo')
                                        <span class="text-danger" style="font-size: 11px"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label class="form-label">Site Favicon</label>
                                    <input
                                        class="form-control dropify @error('site_favicon')
                            is-invalid
                            @enderror"
                                        type="file"
                                        data-default-file="{{ asset('uploads/settings') }}/{{ $setting->site_favicon }}"
                                        name="site_favicon">
                                    @error('site_favicon')
                                        <span class="text-danger" style="font-size: 11px"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-12  mb-4">
                                    <label class="form-label">Site Description</label>
                                    <textarea name="site_description"
                                        class="form-control @error('site_description')
                                 is-invalid
                            @enderror"
                                        cols="30" rows="4">{{ old('site_description', $setting->site_description) }}</textarea>
                                    @error('site_description')
                                        <span class="text-danger" style="font-size: 11px"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-4">
                                    <label class="form-label">Site Keywords</label>
                                    <input type="text" id="siteKeywords" name="site_keywords"
                                        value="{{ old('site_keywords', $setting->site_keywords) }}" class="form-control">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary px-4" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Contact Information Tab -->
                    <div class="tab-pane fade {{ request('stage') == 'contact' ? 'show active' : '' }}" id="contact"
                        role="tabpanel">
                        <form action="{{ route('admin.general_setting_submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label class="form-label">Email</label>
                                    <input
                                        class="form-control @error('email')
                                     is-invalid
                                @enderror"
                                        type="email" placeholder="Enter email" name="email"
                                        value="{{ old('email', $setting->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12  mb-4">
                                    <label class="form-label">Phone Number</label>
                                    <input
                                        class="form-control @error('phone_number')
                                     is-invalid
                                @enderror"
                                        type="text" placeholder="Enter phone number" name="phone_number"
                                        value="{{ old('phone_number', $setting->phone_number) }}">
                                    @error('phone_number')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12  mb-4">
                                    <label class="form-label">Physical Address</label>
                                    <textarea name="physical_address"
                                        class="form-control @error('physical_address')
                                     is-invalid
                                @enderror"
                                        cols="30" rows="3" placeholder="Enter physical address">{{ old('physical_address', $setting->physical_address) }}</textarea>
                                    @error('physical_address')
                                        <span class="text-danger" style="font-size: 11px"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary px-4" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Breadcrumb Image Tab -->
                    <div class="tab-pane fade {{ request('stage') == 'breadcrumb' ? 'show active' : '' }}"
                        id="breadcrumb" role="tabpanel">
                        <form action="{{ route('admin.general_setting_submit') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12  mb-4">
                                    <label class="form-label">Image</label>
                                    <input
                                        class="form-control dropify @error('breadcrumb_image')
                                                    is-invalid
                                                @enderror"
                                        type="file"
                                        data-default-file="{{ asset('uploads/settings') }}/{{ $setting->breadcrumb_image }}"
                                        name="breadcrumb_image">
                                    @error('breadcrumb_image')
                                        <span class="text-danger" style="font-size: 11px"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary px-4" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Social Media Links Tab -->
                    <div class="tab-pane fade {{ request('stage') == 'social' ? 'show active' : '' }}" id="social"
                        role="tabpanel">
                        <form action="{{ route('admin.general_setting_submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12  mb-4">
                                    <label class="form-label">Facebook URL</label>
                                    <input
                                        class="form-control @error('facebook_url')
                                     is-invalid
                                @enderror"
                                        type="text" placeholder="Enter facebook url" name="facebook_url"
                                        value="{{ old('facebook_url', $setting->facebook_url) }}">
                                    @error('facebook_url')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12  mb-4">
                                    <label class="form-label">Twitter URL</label>
                                    <input
                                        class="form-control @error('twitter_url')
                                     is-invalid
                                @enderror"
                                        type="text" placeholder="Enter twitter url" name="twitter_url"
                                        value="{{ old('twitter_url', $setting->twitter_url) }}">
                                    @error('twitter_url')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12  mb-4">
                                    <label class="form-label">Instagram URL</label>
                                    <input
                                        class="form-control @error('instagram_url')
                                     is-invalid
                                @enderror"
                                        type="text" placeholder="Enter instagram url" name="instagram_url"
                                        value="{{ old('instagram_url', $setting->instagram_url) }}">
                                    @error('instagram_url')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12  mb-4">
                                    <label class="form-label">YouTube URL</label>
                                    <input
                                        class="form-control @error('youtube_url')
                                     is-invalid
                                @enderror"
                                        type="text" placeholder="Enter youtube url" name="youtube_url"
                                        value="{{ old('youtube_url', $setting->youtube_url) }}">
                                    @error('youtube_url')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12  mb-4">
                                    <label class="form-label">LinkedIn URL</label>
                                    <input
                                        class="form-control @error('linkedin_url')
                                     is-invalid
                                @enderror"
                                        type="text" placeholder="Enter linkedin url" name="linkedin_url"
                                        value="{{ old('linkedin_url', $setting->linkedin_url) }}">
                                    @error('linkedin_url')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary px-4" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Map Tab -->
                    <div class="tab-pane fade {{ request('stage') == 'map' ? 'show active' : '' }}" id="map"
                        role="tabpanel">
                        <form action="{{ route('admin.general_setting_submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12  mb-4">
                                    <label class="form-label">Map<span class="text-danger">*</span></label>
                                    <textarea name="map" id="" cols="30" rows="5" placeholder="Enter ifream code"
                                        class="form-control @error('map')
                            is-invalid
                       @enderror">{{ old('map', $setting->map) }}</textarea> @error('map')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary px-4" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <script>
        var input = document.querySelector('#siteKeywords');
        var tagify = new Tagify(input);
    </script>
@endpush
