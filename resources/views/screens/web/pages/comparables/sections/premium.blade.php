<section class="container-lux mt-24">
    <p class="eyebrow">Why the Premium is Justified</p>
    <div class="mt-8 grid md:grid-cols-2 gap-6">
        @foreach ($premiumReasons as $reason)
            @php
                $href = ! empty($reason['href']) && Route::has($reason['href'])
                    ? route($reason['href'])
                    : null;
            @endphp

            @if ($href)
                <a href="{{ $href }}" class="block p-6 hairline transition-colors hover:border-primary/60 group">
                    <h3 class="text-lg group-hover:text-primary transition-colors">{{ $reason['title'] }}</h3>
                    <p class="mt-3 text-sm text-muted-foreground leading-relaxed">{{ $reason['body'] }}</p>
                    <p class="mt-4 text-xs uppercase tracking-[0.2em] text-primary">View bonus offers →</p>
                </a>
            @else
                <div class="p-6 hairline">
                    <h3 class="text-lg">{{ $reason['title'] }}</h3>
                    <p class="mt-3 text-sm text-muted-foreground leading-relaxed">{{ $reason['body'] }}</p>
                </div>
            @endif
        @endforeach
    </div>
</section>
