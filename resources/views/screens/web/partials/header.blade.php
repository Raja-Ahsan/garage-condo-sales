@php
    $nav = [
        ['route' => 'web.home', 'label' => 'Home'],
        ['route' => 'web.gallery', 'label' => 'Gallery'],
    
        ['route' => 'web.specifications', 'label' => 'Specifications'],
        ['route' => 'web.comparables', 'label' => 'Comparables'],
        ['route' => 'web.map', 'label' => 'Location'],
        ['route' => 'web.contact', 'label' => 'Contact'],
    ];
    $contact = config('property.contact');
@endphp

<!-- ['route' => 'web.bentley', 'label' => 'Bentley'], -->
<header
    class="fixed top-0 inset-x-0 z-50 backdrop-blur-md bg-background/70 border-b border-border/60"
    @keydown.escape.window="mobileNavOpen = false"
    @click.outside="mobileNavOpen = false"
>
    <div class="container-lux flex items-center justify-between gap-3 h-16 min-w-0">
        <a href="{{ route('web.home') }}" class="flex items-center gap-2 sm:gap-3 group min-w-0 shrink">
            <span class="w-8 h-8 shrink-0 grid place-items-center hairline rounded-sm">
                <span class="gold-text font-display text-lg leading-none">G</span>
            </span>
            <span class="hidden sm:flex flex-col leading-tight min-w-0">
                <span class="text-[11px] tracking-[0.3em] text-muted-foreground uppercase truncate">Garages of America</span>
                <span class="text-sm font-medium truncate">Dual Luxury Suites · Allen, TX</span>
            </span>
        </a>

        <nav class="hidden lg:flex items-center gap-8" aria-label="Primary">
            @foreach ($nav as $item)
                @php $isActive = request()->routeIs($item['route']); @endphp
                <a
                    href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                    class="text-xs uppercase tracking-[0.2em] transition-colors {{ $isActive ? 'text-primary' : 'text-muted-foreground hover:text-primary' }}"
                    @if ($isActive) aria-current="page" @endif
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex items-center gap-2 sm:gap-3 shrink-0">
            <a href="{{ $contact['phone_href'] }}" class="hidden md:inline text-xs uppercase tracking-[0.2em] text-muted-foreground hover:text-primary">
                {{ $contact['phone'] }}
            </a>
            <a
                href="{{ Route::has('web.contact') ? route('web.contact') : '#' }}"
                class="btn-gold btn-gold-hover hidden md:inline-flex"
            >
                Book Consultation
            </a>
            <button
                type="button"
                class="lg:hidden w-11 h-11 grid place-items-center hairline rounded-sm"
                aria-label="{{ __('Toggle navigation menu') }}"
                aria-controls="mobile-nav"
                :aria-expanded="mobileNavOpen.toString()"
                @click.stop="mobileNavOpen = !mobileNavOpen"
            >
                <span class="block w-4 h-px bg-primary shadow-[0_5px_0_var(--gold),0_-5px_0_var(--gold)]" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <div
        id="mobile-nav"
        class="lg:hidden border-t border-border/60 bg-background/95"
        x-show="mobileNavOpen"
        x-cloak
        x-transition
        role="navigation"
        aria-label="Mobile"
    >
        <div class="container-lux py-4 flex flex-col gap-1 max-h-[calc(100dvh-4rem)] overflow-y-auto">
            @foreach ($nav as $item)
                @php $isActive = request()->routeIs($item['route']); @endphp
                <a
                    href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                    class="text-sm uppercase tracking-[0.2em] py-3 min-h-[44px] flex items-center {{ $isActive ? 'text-primary' : 'text-muted-foreground hover:text-primary' }}"
                    @click="mobileNavOpen = false"
                    @if ($isActive) aria-current="page" @endif
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
            <a
                href="{{ Route::has('web.contact') ? route('web.contact') : '#' }}"
                class="btn-gold btn-gold-hover mt-3 w-full"
                @click="mobileNavOpen = false"
            >
                Book Consultation
            </a>
        </div>
    </div>
</header>
