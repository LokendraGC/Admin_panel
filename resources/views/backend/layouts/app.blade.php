<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

   @include('backend.assets.cssfile')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div> --}}

        @include('backend.layouts.header')

        @include('backend.layouts.sidebar')

        <div class="content-wrapper">
            @yield('main-section')
        </div>

        @include('backend.layouts.footer')

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('backend.assets.jsfile')
</body>

</html>
