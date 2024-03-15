<!DOCTYPE html>
<html lang="en">

<head>
    <!--Title-->
    <title>@yield('title')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('admin.layouts.inc.style')
</head>

<body>

    <!-- Main wrapper start -->
    <div id="main-wrapper">
        <!-- Nav header start -->
        @include('admin.layouts.inc.nav-header')
        <!-- Nav header end -->

        <!-- Header start -->
        @include('admin.layouts.inc.header')
        <!-- Header end ti-comment-alt -->

        <!-- Sidebar start -->
        @include('admin.layouts.inc.sidebar')
        <!-- Sidebar end -->

        <!-- Content body start -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Content body end -->

        <!-- Footer start -->
        @include('admin.layouts.inc.footer')
        <!-- Footer end -->

    </div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    @include('admin.layouts.inc.script')

</body>

</html>
