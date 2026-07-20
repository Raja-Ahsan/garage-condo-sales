<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#131418">

    <title>@yield('title', config('property.name').' · Allen, TX')</title>
    <meta name="description" content="@yield('meta_description', 'Rare side-by-side luxury garage condo suites in Allen, Texas. 2,930 sq ft of curated space in the StarCreek Community. Offered at '.config('property.price_label').'.')">
    <meta name="author" content="{{ config('property.contact.name') }}">

    <meta property="og:title" content="@yield('og_title', config('property.name').' · Allen, TX | Gotallenresale')">
    <meta property="og:description" content="@yield('og_description', 'A unicorn opportunity: two connected luxury garage condos totaling 2,930 sq ft. Private tours by appointment.')">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Gotallenresale">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @viteReactRefresh
    @vite(['resources/css/web.css', 'resources/js/app.jsx'])

    @stack('styles')

    @hasSection('canonical')
        <link rel="canonical" href="@yield('canonical')">
    @endif

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'RealEstateListing',
            'name' => config('property.name'),
            'url' => url('/'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '2137 Chelsea Blvd',
                'addressLocality' => 'Allen',
                'addressRegion' => 'TX',
                'postalCode' => '75013',
                'addressCountry' => 'US',
            ],
            'offers' => [
                '@type' => 'Offer',
                'price' => config('property.price'),
                'priceCurrency' => 'USD',
                'availability' => 'https://schema.org/InStock',
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
</head>
<body
    class="web-site antialiased"
    x-data="{ mobileNavOpen: false }"
    :class="{ 'overflow-hidden': mobileNavOpen }"
>
    @include('screens.web.partials.header')

    <main class="min-h-screen pt-16">
        @if (session('success'))
            <div class="container-lux pt-6">
                <div class="card-lux px-4 py-3 text-sm text-primary" role="status">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="container-lux pt-6">
                <div class="card-lux px-4 py-3 text-sm text-destructive" role="alert">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    @include('screens.web.partials.footer')

    @stack('scripts')
</body>
</html>
