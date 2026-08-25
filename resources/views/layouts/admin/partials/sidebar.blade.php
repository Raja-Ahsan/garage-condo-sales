@php
    $modules = dynamic_sidebar();
    $currentRoute = optional(request()->route())->getName();
    $brand = config('property.name', config('app.name'));
@endphp

<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div class="logo-wrapper">
        <a href="{{ route('admin.dashboard') }}" class="admin-brand">
            <span class="admin-brand-mark">GC</span>
            <span class="admin-brand-text">{{ $brand }}</span>
        </a>

        <div class="back-btn" role="button" tabindex="0" data-sidebar-toggle aria-label="Collapse sidebar">
            <i class="fa-solid fa-angle-left"></i>
        </div>
    </div>

    <nav class="sidebar-main" aria-label="Admin navigation">
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                @forelse ($modules as $module)
                    @php
                        $hasChildren = $module->children && $module->children->count() > 0;
                        $childActive = $hasChildren && $module->children->contains(
                            fn ($child) => $child->route_name && $currentRoute === $child->route_name
                        );
                        $routePrefix = $module->route_name
                            ? (string) preg_replace('/\.(index|create|edit|show)$/', '', $module->route_name)
                            : '';
                        $isActive = ($module->route_name && $currentRoute === $module->route_name)
                            || ($routePrefix !== '' && $currentRoute && str_starts_with($currentRoute, $routePrefix.'.'))
                            || $childActive;
                        $moduleUrl = $hasChildren
                            ? 'javascript:void(0)'
                            : (Route::has($module->route_name) ? route($module->route_name) : 'javascript:void(0)');
                    @endphp

                    <li class="sidebar-list {{ $isActive ? 'active' : '' }} {{ $hasChildren ? 'has-children' : '' }} {{ $childActive ? 'is-open' : '' }}">
                        <a
                            href="{{ $moduleUrl }}"
                            class="sidebar-link sidebar-title {{ $hasChildren ? '' : 'link-nav' }} {{ $isActive ? 'active' : '' }}"
                            @if ($hasChildren)
                                data-submenu-toggle
                                aria-expanded="{{ $childActive ? 'true' : 'false' }}"
                            @endif
                        >
                            <span class="theme-icons">
                                <i class="{{ $module->icon }}" aria-hidden="true"></i>
                            </span>
                            <span>{{ $module->name }}</span>
                            @if ($hasChildren)
                                <div class="according-menu ms-auto">
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
                                        <a href="{{ $childUrl }}" class="{{ $childIsActive ? 'active' : '' }}">
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
                    <li class="sidebar-list {{ $currentRoute === 'admin.inquiries.index' || $currentRoute === 'admin.inquiries.show' ? 'active' : '' }}">
                        <a href="{{ route('admin.inquiries.index') }}" class="sidebar-link sidebar-title link-nav {{ $currentRoute === 'admin.inquiries.index' || $currentRoute === 'admin.inquiries.show' ? 'active' : '' }}">
                            <span class="theme-icons">
                                <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                            </span>
                            <span>Inquiries</span>
                        </a>
                    </li>
                    <li class="sidebar-list {{ str_starts_with((string) $currentRoute, 'admin.sliders') ? 'active' : '' }}">
                        <a href="{{ route('admin.sliders.index') }}" class="sidebar-link sidebar-title link-nav {{ str_starts_with((string) $currentRoute, 'admin.sliders') ? 'active' : '' }}">
                            <span class="theme-icons">
                                <i class="fa-solid fa-images" aria-hidden="true"></i>
                            </span>
                            <span>Slider</span>
                        </a>
                    </li>
                @endforelse
            </ul>
        </div>
    </nav>
</div>
