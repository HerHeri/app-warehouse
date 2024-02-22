<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Warehouse App">
    <meta name="keywords" content="warehouse app, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Page' }} - App Warehouse</title>
    <link rel="apple-touch-icon" href="{{ url('/') }}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/authentication.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/dashboard-ecommerce.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/charts/chart-apex.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern {{ (request()->is('login') ? 'blank-page' : '') || request()->is('registrasi') ? 'blank-page' : '' }} navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="{{ (request()->is('login') ? 'blank-page' : '') || request()->is('registrasi') ? 'blank-page' : '' }}">

    @yield('content')

    <!-- BEGIN: Vendor JS-->
    <script src="{{ url('/') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ url('/') }}/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    {{-- <script src="{{ url('/') }}/app-assets/vendors/js/charts/apexcharts.min.js"></script> --}}
    <script src="{{ url('/') }}/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ url('/') }}/app-assets/js/core/app-menu.js"></script>
    <script src="{{ url('/') }}/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ url('/') }}/app-assets/js/scripts/pages/auth-login.js"></script>
    <script src="{{ url('/') }}/global.js"></script>
    {{-- <script src="{{ url('/') }}/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script> --}}
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', async function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            let user = await userAuth()
            $('#nama-user').html(user.nama)
            $('#role-user').html(user.role)
        })
    </script>

    @yield('js')
</body>
<!-- END: Body-->

</html>
