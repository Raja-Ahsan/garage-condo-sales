@php
    $modules = dynamic_sidebar();
    $currentRoute = optional(request()->route())->getName();
@endphp

<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div class="logo-wrapper">
        <a href="{{ route('admin.dashboard') }}">
            <img
                class="img-fluid for-light"
                src="{{ asset('assets/admin/images/logo/logo.png') }}"
                alt="{{ config('app.name') }}"
                style="max-width: 200px"
            />
            <img
                class="img-fluid for-dark"
                src="{{ asset('assets/admin/images/logo/logo_dark.png') }}"
                alt="{{ config('app.name') }}"
                style="max-width: 200px"
            />
        </a>

        <div class="back-btn" role="button" tabindex="0" aria-label="Collapse sidebar">
            <i class="fa-solid fa-angle-left"></i>
        </div>
    </div>

    <nav class="sidebar-main" aria-label="Admin navigation">
        <div class="left-arrow" id="left-arrow">
            <i data-feather="arrow-left"></i>
        </div>

        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn">
                    <div class="mobile-back text-end">
                        <span>Back</span>
                        <i class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i>
                    </div>
                </li>

                <li class="pin-title sidebar-main-title">
                    <div>
                        <h6>Pinned</h6>
                    </div>
                </li>

                @forelse ($modules as $module)
                    @php
                        $hasChildren = $module->children && $module->children->count() > 0;
                        $childActive = $hasChildren && $module->children->contains(
                            fn ($child) => $child->route_name && $currentRoute === $child->route_name
                        );
                        $isActive = ($module->route_name && $currentRoute === $module->route_name) || $childActive;
                        $moduleUrl = $hasChildren
                            ? 'javascript:void(0)'
                            : (Route::has($module->route_name) ? route($module->route_name) : 'javascript:void(0)');
                    @endphp

                    <li class="sidebar-list {{ $isActive ? 'active' : '' }}">
                        <i class="fa-solid fa-thumbtack"></i>

                        <a
                            href="{{ $moduleUrl }}"
                            class="sidebar-link sidebar-title {{ $hasChildren ? '' : 'link-nav' }} {{ $isActive ? 'active' : '' }}"
                            @if ($hasChildren)
                                aria-expanded="{{ $childActive ? 'true' : 'false' }}"
                            @endif
                        >
                            <span class="theme-icons">
                                <i class="{{ $module->icon }}" aria-hidden="true"></i>
                            </span>
                            <span>{{ $module->name }}</span>
                            @if ($hasChildren)
                                <div class="according-menu">
                                    <i class="fa-solid fa-angle-{{ $childActive ? 'down' : 'right' }}"></i>
                                </div>
                            @endif
                        </a>

                        @if ($hasChildren)
                            <ul class="sidebar-submenu" @if ($childActive) style="display: block;" @endif>
                                @foreach ($module->children as $child)
                                    @php
                                        $childIsActive = $child->route_name && $currentRoute === $child->route_name;
                                        $childUrl = Route::has($child->route_name)
                                            ? route($child->route_name)
                                            : 'javascript:void(0)';
                                    @endphp
                                    <li class="{{ $childIsActive ? 'active' : '' }}">
                                        <a
                                            href="{{ $childUrl }}"
                                            class="{{ $childIsActive ? 'active' : '' }}"
                                            @if (! Route::has($child->route_name))
                                                title="Module not available yet"
                                            @endif
                                        >
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @empty
                    <li class="sidebar-list active">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link sidebar-title link-nav active">
                            <span class="theme-icons">
                                <i class="fa-regular fa-house" aria-hidden="true"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endforelse
            </ul>
        </div>

        <div class="right-arrow" id="right-arrow">
            <i data-feather="arrow-right"></i>
        </div>
    </nav>
</div>
