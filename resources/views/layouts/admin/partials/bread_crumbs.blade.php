<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h3>@yield('page_title', 'Dashboard')</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}" aria-label="Admin home">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/admin/svg/icon-sprite.svg#stroke-home') }}"></use>
                        </svg>
                    </a>
                </li>
                @hasSection('breadcrumb')
                    @yield('breadcrumb')
                @else
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Default</li>
                @endif
            </ol>
        </div>
    </div>
</div>
