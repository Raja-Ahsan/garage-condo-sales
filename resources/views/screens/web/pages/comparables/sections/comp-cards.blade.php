<section class="container-lux mt-16 grid md:grid-cols-3 gap-6">
    @foreach ($compCards as $card)
        <div @class(['card-lux p-8', 'border-primary/40' => !($card['highlight'] ?? true)])>
            <p class="text-xs uppercase tracking-[0.25em] text-muted-foreground">{{ $card['label'] }}</p>
            <p class="mt-4 text-4xl gold-text font-display">{{ $card['value'] }}</p>
            <p class="mt-3 text-sm text-muted-foreground">{{ $card['note'] }}</p>
        </div>
    @endforeach
</section>
