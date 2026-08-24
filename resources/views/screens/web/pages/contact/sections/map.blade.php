<section class="container-lux mt-16 mb-8">
    <div class="flex items-end justify-between flex-wrap gap-4 mb-6">
        <div>
            <p class="eyebrow">Location</p>
            <h2 class="mt-4 text-2xl md:text-3xl">Find the Property</h2>
        </div>
        <p class="text-sm text-muted-foreground max-w-md">{{ $property['address'] }}</p>
    </div>
    @include('screens.web.partials.map-embed', [
        'title' => 'Property Location — '.$property['address'],
    ])
</section>
