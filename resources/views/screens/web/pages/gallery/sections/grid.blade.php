<section class="container-lux mt-12 md:mt-16 mb-4 md:mb-8" aria-labelledby="gallery-heading">
    <div class="flex items-end justify-between flex-wrap gap-6 mb-8 md:mb-10">
        <div class="min-w-0">
            <p class="eyebrow">Showcase</p>
            <h2 id="gallery-heading" class="section-title-lux mt-4">
                A Closer Look
            </h2>
        </div>
      
    </div>

    @if (empty($images))
        <div class="aspect-[21/9] grid place-items-center text-center p-8 bg-surface/40">
            <div>
                <p class="eyebrow justify-center">Coming Soon</p>
                <p class="mt-3 text-lg text-muted-foreground">Gallery imagery will appear here</p>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
            @foreach ($images as $image)
                <div class="relative aspect-[4/3] overflow-hidden group min-w-0">
                    <img
                        src="{{ $image['src'] }}"
                        alt="{{ $image['alt'] }}"
                        loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-[1200ms] group-hover:scale-110"
                    >
                </div>
            @endforeach
        </div>
    @endif
</section>
