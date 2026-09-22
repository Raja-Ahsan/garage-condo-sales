<div class="page-title">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h3>@yield('page_title', 'Dashboard')</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}" aria-label="Admin home">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                @hasSection('breadcrumb')
                    @yield('breadcrumb')
                @else
                    <li class="breadcrumb-item active">Dashboard</li>
                @endif
            </ol>
        </div>
    </div>
</div>
