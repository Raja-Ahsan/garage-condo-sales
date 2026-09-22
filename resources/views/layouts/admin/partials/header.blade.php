@php
    $authUser = auth()->user();
    $initials = collect(explode(' ', (string) ($authUser?->name ?? 'A')))
        ->filter()
        ->take(2)
        ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
        ->implode('');
@endphp

<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="toggle-sidebar">
                <button type="button" class="btn p-0 border-0 bg-transparent" data-sidebar-toggle aria-label="Toggle sidebar">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
            </div>
        </div>

        <div class="nav-right col p-0 ms-auto">
            <ul class="nav-menus">
                <li>
                    <div class="mode" role="button" tabindex="0" data-theme-toggle aria-label="Toggle color mode">
                        <i class="fa-solid fa-moon"></i>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="d-flex profile-media" data-profile-toggle>
                        <span class="profile-avatar">{{ $initials ?: 'A' }}</span>
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
                                <i class="fa-regular fa-user"></i><span>Account</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('web.home') }}" target="_blank" rel="noopener">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i><span>View site</span>
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i><span>Log out</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
