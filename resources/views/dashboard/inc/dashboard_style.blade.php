<link rel="icon" type="image/x-icon" href="{{ asset('dashboard/assets/img/favicon.ico') }}" />
<link href="{{ asset('dashboard/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('dashboard/assets/js/loader.js') }}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="{{ asset('dashboard/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('dashboard/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('dashboard/plugins/sweetaler2/sweetalert2.min.css') }}">
<!-- END GLOBAL MANDATORY STYLES -->

@yield('dashoard_style')
@stack('dashboard_style')
