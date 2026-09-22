<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.admin.partials.head')
</head>

<body class="admin-panel dark-only">
    <div class="loader-wrapper" aria-hidden="true">
        <div class="loader-index"></div>
    </div>

    <div class="tap-top" role="button" tabindex="0" aria-label="Back to top">
        <i class="fa-solid fa-chevron-up"></i>
    </div>

    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('layouts.admin.partials.header')

        <div class="page-body-wrapper">
            @include('layouts.admin.partials.sidebar')
            <div class="sidebar-backdrop" data-sidebar-dismiss></div>

            <div class="page-body">
                <div class="container-fluid">
                    @include('layouts.admin.partials.bread_crumbs')

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>

            @include('layouts.admin.partials.footer')
        </div>
    </div>

    @include('layouts.admin.partials.scripts')
</body>

</html>
