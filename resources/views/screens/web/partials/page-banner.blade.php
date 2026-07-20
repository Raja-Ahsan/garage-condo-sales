<section class="container-lux pt-10 sm:pt-14 md:pt-16 min-w-0">
    <p class="eyebrow">{{ $eyebrow ?? 'Page' }}</p>
    <h1 class="page-banner-title mt-4 sm:mt-6">
        {!! $titleHtml ?? e($title ?? '') !!}
    </h1>
    @if (!empty($description))
        <p class="mt-4 sm:mt-6 max-w-2xl text-muted-foreground text-base sm:text-lg leading-relaxed">
            {{ $description }}
        </p>
    @endif
</section>
