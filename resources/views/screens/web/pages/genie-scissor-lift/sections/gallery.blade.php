<section class="container-lux mt-12 md:mt-16 mb-4 md:mb-8" aria-labelledby="genie-gallery-heading">
    <div class="flex items-end justify-between flex-wrap gap-6 mb-8 md:mb-10">
        <div class="min-w-0">
            <p class="eyebrow">Gallery</p>
            <h2 id="genie-gallery-heading" class="section-title-lux mt-4">
                The Equipment
            </h2>
        </div>
    </div>

    @if (empty($images))
        <div class="aspect-[21/9] grid place-items-center text-center p-8 bg-surface/40">
            <div>
                <p class="eyebrow justify-center">Coming Soon</p>
                <p class="mt-3 text-lg text-muted-foreground">Scissor lift imagery will appear here</p>
            </div>
        </div>
    @else
        @php
            $hero = $images[0];
            $rest = array_slice($images, 1);
        @endphp

        <div class="mx-auto max-w-3xl overflow-hidden group mb-3 sm:mb-4">
            <div class="aspect-[4/3] sm:aspect-[16/11]">
                <img
                    src="{{ $hero['src'] }}"
                    alt="{{ $hero['alt'] }}"
                    loading="eager"
                    class="w-full h-full object-cover transition-transform duration-[1200ms] group-hover:scale-105"
                >
            </div>
        </div>

        @if (count($rest) > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                @foreach ($rest as $image)
                    <div class="aspect-[4/3] overflow-hidden group min-w-0">
                        <img
                            src="{{ $image['src'] }}"
                            alt="{{ $image['alt'] }}"
                            loading="lazy"
                            class="w-full h-full object-cover transition-transform duration-[1200ms] group-hover:scale-110"
                        >
                    </div>
                @endforeach
            </div>
        @endif
    @endif
</section>
