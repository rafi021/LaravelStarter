<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('dashboard/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('dashboard/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('dashboard/assets/js/custom.js') }}"></script>
<script src="{{ asset('dashboard/plugins/sweetaler2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
@yield('dashoard_script')
@stack('dashboard_script')
