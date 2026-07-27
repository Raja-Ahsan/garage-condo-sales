<section class="container-lux mt-16 md:mt-32">
    <div class="flex items-end justify-between flex-wrap gap-6 mb-8 md:mb-10">
        <div class="min-w-0">
            <p class="eyebrow">The Property, In Detail</p>
            <h2 class="section-title-lux mt-4">A Closer Look</h2>
        </div>
        <a href="{{ Route::has('web.bentley') ? route('web.bentley') : '#' }}" class="btn-ghost-lux">
            Open Full Gallery
        </a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        @foreach (array_slice($photos, 0, 4) as $photo)
            <div class="aspect-square overflow-hidden hairline group">
                <img
                    src="{{ $photo['thumb'] }}"
                    alt="{{ $photo['caption'] }}"
                    loading="lazy"
                    class="w-full h-full object-cover transition-transform duration-[1200ms] group-hover:scale-110"
                >
            </div>
        @endforeach
    </div>
    <div class="mt-6 grid md:grid-cols-2 gap-3">
        <div class="aspect-[16/7] hairline grid place-items-center text-center p-8 bg-surface/40">
            <div>
                <p class="eyebrow justify-center">Coming Soon</p>
                <p class="mt-3 text-lg text-muted-foreground">Bentley in-suite showcase photography</p>
            </div>
        </div>
        <div class="aspect-[16/7] hairline grid place-items-center text-center p-8 bg-surface/40">
            <div>
                <p class="eyebrow justify-center">Coming Soon</p>
                <p class="mt-3 text-lg text-muted-foreground">Scissor lift &amp; service bay photography</p>
            </div>
        </div>
    </div>
</section>
