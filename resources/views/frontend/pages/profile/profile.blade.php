@extends('frontend.pages.profile.layouts.app', ['title' => 'Profile'])
@section('profile_content')
    <div class="cr-bl-block-content">
        <form action="{{ route('update_profile') }}" method="POST" enctype="multipart/form-data" class="change_profile_submit">
            @csrf
            <div class="cr-check-bill-form mb-minus-24">
                <div class="row">
                    <div class="col-12">
                        <p>Profile</p>
                        <hr>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="cr-bl-block-content">
                            <div class="cr-check-bill-form mb-minus-24">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Name<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter your name"
                                                class="cr-form-control form-control @error('name')
                                        is-invalid
                                    @enderror"
                                                value="{{ old('name', Auth::user()->name) }}" name="name">
                                            @error('name')
                                                <span class="invalid-feedback" style="font-size: 13px"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Phone<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter your phone"
                                                class="cr-form-control form-control @error('phone')
                                        is-invalid
                                    @enderror"
                                                value="{{ old('phone', Auth::user()->phone) }}" name="phone">
                                            @error('phone')
                                                <span class="invalid-feedback" style="font-size: 13px"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Address<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter your address"
                                                class="cr-form-control form-control @error('address')
                                        is-invalid
                                    @enderror"
                                                value="{{ old('address', Auth::user()->address) }}" name="address">
                                            @error('address')
                                                <span class="invalid-feedback" style="font-size: 13px;"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>City<span class="text-danger">*</span></label>
                                            <input type="text" name="city" placeholder="Enter city"
                                                value="{{ old('city', Auth::user()->city) }}"
                                                class="form-control @error('city')
                                            is-invalid
                                        @enderror">
                                            @error('city')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Post Code<span class="text-danger">*</span></label>
                                            <input type="text" name="postalcode"
                                                value="{{ old('postalcode', Auth::user()->postalcode) }}"
                                                class="form-control @error('postalcode')
                                        is-invalid
                                    @enderror"
                                                placeholder="Enter post code">
                                            @error('postalcode')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Country<span class="text-danger">*</span></label>
                                            <input type="text" name="country" placeholder="Enter country"
                                                value="{{ old('country', Auth::user()->country) }}"
                                                class="form-control @error('country')
                                    is-invalid
                                @enderror">
                                            @error('country')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Region State</label>
                                            <input type="text" name="region_state"
                                                value="{{ old('region_state', Auth::user()->region_state) }}"
                                                class="form-control @error('region_state')
                                    is-invalid
                                @enderror"
                                                placeholder="Enter region state">
                                            @error('region_state')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" placeholder="Enter your password"
                                                class="cr-form-control form-control @error('password')
                                        is-invalid
                                    @enderror"
                                                value="{{ old('password') }}" name="password">
                                            @error('password')
                                                <span class="invalid-feedback" style="font-size: 13px"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" placeholder="Retype password"
                                                class="cr-form-control form-control @error('password_confirmation')
                                        is-invalid
                                    @enderror"
                                                value="{{ old('password_confirmation') }}" name="password_confirmation">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" style="font-size: 11px"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="cr-check-order-btn change_profile">
                                <button type="submit" class="cr-button mt-30">Save</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
