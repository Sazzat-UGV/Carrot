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
    <style>
        .cat-list {
            list-style-type: none;
            padding: 0 !important;
            margin: 0 !important;
        }

        .cat-list li {
            border: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .cat-list a {
            text-decoration: none;
            color: inherit;
            border: none !important;
            display: block;
            padding: 0 !important;
            margin: 0 !important;
        }

        .cr-cat-tab .tab-content .tab-pane .tab-list .col {
            border: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .cr-cat-tab .tab-content .tab-pane .tab-list .col a {
            border: none !important;
            outline: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .cr-cat-tab .tab-content .tab-pane .tab-list .col ul {
            border: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .cr-cat-tab .tab-content .tab-pane .tab-list .col li {
            border: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .custom-logout-btn:hover {
            color: #64B496 !important;
        }
    </style>

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
    @include('frontend.layouts.include.product_modal')

    <!-- Cart -->
    @include('frontend.layouts.include.my_cart')
    @include('frontend.layouts.include.script')
</body>

</html>
