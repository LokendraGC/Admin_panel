<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/admin.png') }}">

    @include('backend.assets.cssfile')
</head>

<style>
    body {
        /* font-family: "Figtree", sans-serif !important; */
        font-size: 0.9rem !important;
    }

    .content-header h1 {
        font-size: 1.5rem;
        margin: 0;
    }

    .content-wrapper {
        min-height: 1070px !important;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('backend.layouts.header')

        @include('backend.layouts.sidebar')

        <div class="content-wrapper">
            @yield('main-section')
        </div>

        @include('backend.assets.jsfile')

        @include('backend.layouts.footer')

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</body>

</html>
