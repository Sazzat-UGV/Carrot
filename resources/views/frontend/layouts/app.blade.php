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

        .icon-container {
            position: relative;
            display: inline-block;
        }

        .counter {
            bottom: -8px;
            left: 14px;
            font-weight: 800;
            font-size: 11px;
            border-radius: 50%;
            padding: 2px 6px;
        }

        .cr-size-weight {
            margin-bottom: 15px;
        }

        .size-dropdown,
        .color-dropdown {
            position: relative;
            width: 100%;
        }

        #size-select,
        #color-select {
            width: 100%;
            padding: 1px 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            color: #7A7A7A;
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            transition: border-color 0.3s ease;
            font-size: 14px;
        }

        #size-select option,
        #color-select option {
            padding: 6px 10px;
            font-size: 14px;
            font-weight: normal;
            background: white
        }

        #size-select:focus,
        #color-select:focus {
            border-color: #64b496;
            outline: none;
        }

        .udashboard {
            color: #7A7A7A;
        }

        .udashboard:hover {
            background: #E4F2ED;
            transition: .6s;
        }

        .udashboard_active {
            background: #E4F2ED;
            color: #7A7A7A !important;
        }

        .udashboard-i {
            font-size: 18px;
        }
    </style>

</head>


<body class="body-bg-6">

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>

    @include('frontend.layouts.include.header')
    @yield('content')

    @include('frontend.layouts.include.footer')

    @include('frontend.layouts.include.tab_to_top')

    @include('frontend.layouts.include.product_modal')

    @include('frontend.layouts.include.script')
</body>

</html>
