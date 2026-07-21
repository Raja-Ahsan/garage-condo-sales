@php
    $bentleyImages = [
        [
            'src' => asset('images/bentleypromotion/IMG_0363.JPG'),
            'alt' => 'Bentley promotion — suite interior',
        ],
        [
            'src' => asset('images/bentleypromotion/IMG_0361.JPG'),
            'alt' => 'Bentley promotion — loft overlook',
        ],
    ];
@endphp

<section class="container-lux mt-16 md:mt-28 grid md:grid-cols-12 gap-8 md:gap-12 items-start">
    <div class="md:col-span-5 min-w-0">
        <p class="eyebrow">Exclusive Showcase</p>
        <h2 class="section-title-lux mt-4 md:mt-6">
            Bentley <span class="gold-text">promotion</span>
        </h2>
        <div class="gold-divider my-6 md:my-8 max-w-[120px]"></div>
        <p class="text-muted-foreground leading-relaxed">
            Immediately after or prominently connected to this section, feature the Bentley promotion.
        </p>
        <p class="mt-4 text-muted-foreground leading-relaxed">
            The Bentley promotion should be highly visible and use the images/content provided by the client.
        </p>
        <a href="{{ Route::has('web.bentley') ? route('web.bentley') : '#' }}" class="btn-ghost-lux mt-8">
            View Details
        </a>
    </div>
    <div class="md:col-span-7 grid grid-cols-2 gap-3 sm:gap-4 min-w-0">
        @foreach ($bentleyImages as $image)
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
</section>
