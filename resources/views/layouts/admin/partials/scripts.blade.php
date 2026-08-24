<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/icons/feather-icon/feather-icon.js') }}"></script>
<script src="{{ asset('assets/admin/js/scrollbar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/scrollbar/custom.js') }}"></script>
<script src="{{ asset('assets/admin/js/config.js') }}"></script>
<script>
    window.CubaAdminConfig = Object.assign({}, window.CubaAdminConfig || {}, {
        primary: '#d9b678',
        secondary: '#a9aeb8',
        success: '#2f9e8f',
    });
</script>
<script src="{{ asset('assets/admin/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/admin/js/sidebar-pin.js') }}"></script>
<script src="{{ asset('assets/admin/js/clock.js') }}"></script>
<script src="{{ asset('assets/admin/js/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/slick/slick.js') }}"></script>
<script src="{{ asset('assets/admin/js/header-slick.js') }}"></script>
<script src="{{ asset('assets/admin/js/script.js') }}"></script>
<script src="{{ asset('assets/admin/js/script1.js') }}"></script>

@stack('scripts')
