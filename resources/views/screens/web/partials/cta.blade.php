@php
    $contact = config('property.contact');
@endphp

<section class="container-lux my-16 md:my-24">
    <div class="card-lux p-6 sm:p-10 md:p-16 text-center relative overflow-hidden">
        <div class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/10 blur-3xl pointer-events-none"></div>
        <p class="eyebrow justify-center">{{ $eyebrow ?? 'Private Showings' }}</p>
        <h2 class="section-title-lux mt-6 max-w-2xl mx-auto">{{ $title ?? 'Schedule Your Private Tour' }}</h2>
        <p class="mt-4 text-muted-foreground max-w-xl mx-auto">
            {{ $body ?? 'Serious inquiries only. Tours are arranged directly with the owner and typically last 45–60 minutes.' }}
        </p>
        <div class="cta-actions mt-8 flex flex-wrap gap-3 sm:gap-4 justify-center">
            <a href="{{ Route::has('web.contact') ? route('web.contact') : '#' }}" class="btn-gold btn-gold-hover">
                Book Consultation Call
            </a>
            <a href="{{ $contact['phone_href'] }}" class="btn-ghost-lux">
                Call {{ $contact['phone'] }}
            </a>
        </div>
    </div>
</section>
