<!DOCTYPE html>
<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/backend/') }}/" data-template="vertical-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/frontend') }}/img/logo/favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/css/demo.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/vendor/libs/@form-validation/form-validation.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/') }}/vendor/css/pages/page-auth.css">
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/frontend/img/logo/logo.png') }}" alt="">
                                </span>
                            </a>
                        </div>
                        <form id="" class="mb-6" action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                    name="email" placeholder="Enter your email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Password<span
                                        class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="password"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('password')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-8">
                                <div class="d-flex justify-content-between mt-8">
                                    <div class="form-check mb-0 ms-2">
                                        <input class="form-check-input" type="checkbox" id="remember-me"
                                            name="remember">
                                        <label class="form-check-label" for="remember-me">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/backend/') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/js/template-customizer.js"></script>
    <script src="{{ asset('assets/backend/') }}/js/config.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/js/menu.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/libs/@form-validation/popular.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="{{ asset('assets/backend/') }}/js/main.js"></script>
    <script src="{{ asset('assets/backend/') }}/js/pages-auth.js"></script>
</body>

</html>
