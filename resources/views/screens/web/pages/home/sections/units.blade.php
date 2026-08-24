<section class="container-lux mt-16 md:mt-32 grid md:grid-cols-2 gap-6 md:gap-8">
    @foreach ([
        [
            'tag' => 'Right Unit',
            'size' => "20' × 40'",
            'loft' => "15' × 20' finished office loft",
            'value' => 'Est. value $495,000',
            'body' => 'Full bath with glass-enclosed shower, tankless water heater, commercial floor sink, upgraded electrical, stained cement floors, 72" industrial fan with remote. Original staircase retained in storage and available for reinstall.',
            'img' => $photos[1]['src'] ?? $photos[0]['src'],
        ],
        [
            'tag' => 'Left Unit',
            'size' => "22.5' × 50'",
            'loft' => "18' × 22.5' office loft + split-level 18' × 14' lounge",
            'value' => 'Comparable units at $695k+',
            'body' => 'Full kitchen with double SS sink, 12 LF countertop, appliances and commercial microwave. Larger private ½ bath, bronzed skylights, contemporary wire handrails, oak trim, hardwired data. Ground floor easily reconfigured.',
            'img' => asset('images/gallery/C17-1.webp'),
        ],
    ] as $unit)
        <article class="card-lux overflow-hidden min-w-0">
            <div class="aspect-[4/3] bg-cover bg-center" style="background-image: url('{{ $unit['img'] }}')"></div>
            <div class="p-5 sm:p-8">
                <p class="eyebrow">{{ $unit['tag'] }}</p>
                <h3 class="mt-4 text-2xl sm:text-3xl gold-text">{{ $unit['size'] }}</h3>
                <p class="mt-2 text-sm text-muted-foreground">{{ $unit['loft'] }}</p>
                <div class="gold-divider my-6"></div>
                <p class="text-sm text-muted-foreground leading-relaxed">{{ $unit['body'] }}</p>
                <p class="mt-6 text-xs uppercase tracking-[0.25em] text-primary">{{ $unit['value'] }}</p>
            </div>
        </article>
    @endforeach
</section>
