
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login Boxed | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard') }}/assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('dashboard') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard') }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard') }}/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/assets/css/forms/switches.css">
    @stack('auth_style')
</head>
<body class="form">
    @yield('admin_auth_content')

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('dashboard') }}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('dashboard') }}/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('dashboard') }}/bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('dashboard') }}/assets/js/authentication/form-2.js"></script>
    @stack('auth_script')
</body>
</html>
