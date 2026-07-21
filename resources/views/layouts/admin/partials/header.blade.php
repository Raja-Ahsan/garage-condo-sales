@php
    $authUser = auth()->user();
@endphp

<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
                <a href="{{ route('admin.dashboard') }}">
                    <img class="img-fluid for-light" src="{{ asset('assets/admin/images/logo/logo.png') }}" alt="{{ config('app.name') }}" />
                    <img class="img-fluid for-dark" src="{{ asset('assets/admin/images/logo/logo_dark.png') }}" alt="{{ config('app.name') }}" />
                </a>
            </div>
            <div class="toggle-sidebar">
                <button type="button" class="btn p-0 border-0 bg-transparent" aria-label="Toggle sidebar">
                    <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                </button>
            </div>
        </div>

        <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                <li>
                    <div class="mode" role="button" tabindex="0" aria-label="Toggle color mode">
                        <svg>
                            <use href="{{ asset('assets/admin/svg/icon-sprite.svg#moon') }}"></use>
                        </svg>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="d-flex profile-media">
                        <img
                            class="b-r-10"
                            src="{{ asset('assets/admin/images/dashboard/profile.png') }}"
                            alt="{{ $authUser?->name ?? 'User' }}"
                        />
                        <div class="flex-grow-1">
                            <span>{{ $authUser?->name ?? 'Guest' }}</span>
                            <p class="mb-0">
                                {{ formatRole($authUser?->role ?? 'user') }}
                                <i class="middle fa-solid fa-angle-down"></i>
                            </p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{ route('profile.edit') }}">
                                <i data-feather="user"></i><span>Account</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}">
                                <i data-feather="settings"></i><span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i data-feather="log-out"></i><span>Log out</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
