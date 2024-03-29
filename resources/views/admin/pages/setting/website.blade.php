@extends('admin.layouts.master')
@section('title')
    Website Setting
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Website Setting</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('website.settingUpdate', ['id' => $setting->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="mb-3 col-4">
                                    <label class="form-label">Phone One</label>
                                    <input type="text"
                                        class="form-control @error('phone_one')
                                is-invalid
                            @enderror"
                                        placeholder="Enter phone one" name="phone_one"
                                        value="{{ old('phone_one', $setting->phone_one) }}">
                                    @error('phone_one')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-4">
                                    <label class="form-label">Phone Two</label>
                                    <input type="text"
                                        class="form-control @error('phone_two')
                                is-invalid
                            @enderror"
                                        placeholder="Enter phone two" name="phone_two"
                                        value="{{ old('phone_two', $setting->phone_two) }}">
                                    @error('phone_two')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-4">
                                    <label class="form-label">Main Email</label>
                                    <input type="email"
                                        class="form-control @error('main_email')
                                is-invalid
                            @enderror"
                                        placeholder="Enter main email" name="main_email"
                                        value="{{ old('main_email', $setting->main_email) }}">
                                    @error('main_email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">Support Email</label>
                                    <input type="email"
                                        class="form-control @error('support_email')
                                is-invalid
                            @enderror"
                                        placeholder="Enter support email" name="support_email"
                                        value="{{ old('support_email', $setting->support_email) }}">
                                    @error('support_email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">Currency</label>
                                    <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                        <select name="currency"
                                            class="default-select form-control wide @error('currency')
                                            is-invalid
                                                @enderror"
                                            tabindex="null">
                                            <option value="৳" @if ($setting->currency == '৳') selected @endif>Taka
                                            </option>
                                            <option value="$" @if ($setting->currency == '$') selected @endif>USD
                                            </option>
                                            <option value="₹" @if ($setting->currency == '₹') selected @endif>Rupee
                                            </option>
                                        </select>
                                        @error('currency')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-4">
                                    <label class="form-label">Address</label>
                                    <input type="text"
                                        class="form-control @error('address')
                                is-invalid
                            @enderror"
                                        placeholder="Enter address" name="address"
                                        value="{{ old('address', $setting->address) }}">
                                    @error('address')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-4">
                                    <label class="form-label">Facebook (<i class="fa-brands fa-facebook"></i>)</label>
                                    <input type="text"
                                        class="form-control @error('facebook')
                                is-invalid
                            @enderror"
                                        placeholder="Enter facebook link" name="facebook"
                                        value="{{ old('facebook', $setting->facebook) }}">
                                    @error('facebook')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-4">
                                    <label class="form-label">Twitter (<i class="fa-brands fa-twitter"></i>)</label>
                                    <input type="text"
                                        class="form-control @error('twitter')
                                is-invalid
                            @enderror"
                                        placeholder="Enter twitter link" name="twitter"
                                        value="{{ old('twitter', $setting->twitter) }}">
                                    @error('twitter')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-4">
                                    <label class="form-label">Instagram (<i class="fa-brands fa-instagram"></i>)</label>
                                    <input type="text"
                                        class="form-control @error('instagram')
                                is-invalid
                            @enderror"
                                        placeholder="Enter instagram link" name="instagram"
                                        value="{{ old('instagram', $setting->instagram) }}">
                                    @error('instagram')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-4">
                                    <label class="form-label">Linkedin (<i class="fa-brands fa-linkedin"></i>)</label>
                                    <input type="text"
                                        class="form-control @error('linkedin')
                                is-invalid
                            @enderror"
                                        placeholder="Enter linkedin link" name="linkedin"
                                        value="{{ old('linkedin', $setting->linkedin) }}">
                                    @error('linkedin')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-4">
                                    <label class="form-label">Youtube (<i class="fa-brands fa-youtube"></i>)</label>
                                    <input type="text"
                                        class="form-control @error('youtube')
                                is-invalid
                            @enderror"
                                        placeholder="Enter youtube link" name="youtube"
                                        value="{{ old('youtube', $setting->youtube) }}">
                                    @error('youtube')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">Logo</label>
                                    <input type="file"
                                        class="form-control @error('logo')
                                is-invalid
                                    @enderror"
                                        name="logo">
                                    @error('logo')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">Favicon</label>
                                    <input type="file"
                                        class="form-control @error('favicon')
                                is-invalid
                                    @enderror"
                                        name="favicon">
                                    @error('favicon')
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
