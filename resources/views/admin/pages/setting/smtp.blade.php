@extends('admin.layouts.master')
@section('title')
    SMTP Setting
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SMTP Setting</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('smtp.settingUpdate', ['id' => $smtp->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="mb-3 col-6">
                                    <label class="form-label">Mail Mailer </label>
                                    <input type="text"
                                        class="form-control @error('mail_mailer')
                                is-invalid
                            @enderror"
                                        placeholder="Enter mail mailer" name="mail_mailer"
                                        value="{{ old('mail_mailer', $smtp->mail_mailer) }}">
                                    @error('mail_mailer')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">Mail Host </label>
                                    <input type="text"
                                        class="form-control @error('mail_host')
                                is-invalid
                            @enderror"
                                        placeholder="Enter mail host" name="mail_host"
                                        value="{{ old('mail_host', $smtp->mail_host) }}">
                                    @error('mail_host')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">Mail Port </label>
                                    <input type="text"
                                        class="form-control @error('mail_port')
                                is-invalid
                            @enderror"
                                        placeholder="Enter mail port" name="mail_port"
                                        value="{{ old('mail_port', $smtp->mail_port) }}">
                                    @error('mail_port')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">Mail Username </label>
                                    <input type="text"
                                        class="form-control @error('mail_username')
                                is-invalid
                            @enderror"
                                        placeholder="Enter mail username" name="mail_username"
                                        value="{{ old('mail_username', $smtp->mail_username) }}">
                                    @error('mail_username')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">Mail Password</label>
                                    <input type="text"
                                        class="form-control @error('mail_encryption')
                                is-invalid
                            @enderror"
                                        placeholder="Enter mail password" name="mail_encryption"
                                        value="{{ old('mail_encryption', $smtp->mail_encryption) }}">
                                    @error('mail_encryption')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">Mail Encryption</label>
                                    <input type="text"
                                        class="form-control @error('mail_username')
                                is-invalid
                            @enderror"
                                        placeholder="Enter mail encryption" name="mail_password"
                                        value="{{ old('mail_password', $smtp->mail_password) }}">
                                    @error('mail_password')
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
