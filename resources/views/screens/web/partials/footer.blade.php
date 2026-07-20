@php
    $property = config('property');
    $contact = $property['contact'];
@endphp

<footer class="mt-16 md:mt-32 border-t border-border/60 bg-surface/50">
    <div class="container-lux py-10 md:py-16 grid gap-10 md:gap-12 md:grid-cols-4">
        <div class="md:col-span-2 min-w-0">
            <p class="eyebrow">Garages of America</p>
            <h3 class="mt-4 text-xl sm:text-2xl gold-text">{{ $property['name'] }}</h3>
            <p class="mt-4 text-sm text-muted-foreground max-w-md leading-relaxed">
                A rare side-by-side ownership opportunity in the StarCreek Community —
                2,930 sq ft of curated space engineered for collectors, creators and investors.
            </p>
        </div>
        <div class="min-w-0">
            <p class="text-xs uppercase tracking-[0.25em] text-primary">Visit</p>
            <p class="mt-3 text-sm text-muted-foreground leading-relaxed break-words">
                {{ $property['address'] }}<br>
                StarCreek Community
            </p>
        </div>
        <div class="min-w-0">
            <p class="text-xs uppercase tracking-[0.25em] text-primary">Private Inquiries</p>
            <p class="mt-3 text-sm text-muted-foreground leading-relaxed">
                {{ $contact['name'] }}<br>
                <a class="hover:text-primary break-all" href="{{ $contact['phone_href'] }}">{{ $contact['phone'] }}</a><br>
                <a class="hover:text-primary break-all" href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
            </p>
        </div>
    </div>
    <div class="border-t border-border/50">
        <div class="container-lux site-footer-meta py-6 flex flex-col md:flex-row items-center justify-between gap-3 text-[11px] uppercase tracking-[0.25em] text-muted-foreground">
            <span>&copy; {{ date('Y') }} Gotallenresale — All Rights Reserved</span>
            <span>Offered directly by owner · No brokerage commission</span>
        </div>
    </div>
</footer>
