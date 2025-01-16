<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="{{ implode(', ', array_column(json_decode($setting->site_keywords, true), 'value')) }}">
    <meta name="description" content="{{ $setting->site_description }}">
    <meta name="author" content="{{ $setting->site_name }}">
    <title>@yield('title') | {{ config('app.name') }}</title>
    @include('frontend.layouts.include.style')
</head>


<body class="body-bg-6">

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>

    <!-- Header -->
    @include('frontend.layouts.include.header')
    @yield('content')

    @include('frontend.layouts.include.footer')

    @include('frontend.layouts.include.tab_to_top')

    <!-- Model -->
    @include('frontend.layouts.include.product_model')

    <!-- Cart -->
    @include('frontend.layouts.include.my_cart')
    @include('frontend.layouts.include.script')
</body>

</html>
