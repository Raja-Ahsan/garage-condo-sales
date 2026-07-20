<section class="container-lux mt-12 grid md:grid-cols-3 gap-6">
    @foreach ($infoCards as $card)
        <div class="hairline p-6">
            <p class="text-[11px] uppercase tracking-[0.3em] text-muted-foreground">{{ $card['label'] }}</p>
            <p class="mt-2 text-lg">{{ $card['value'] }}</p>
        </div>
    @endforeach
</section>
