<section class="container-lux mt-24">
    <p class="eyebrow">Why the Premium is Justified</p>
    <div class="mt-8 grid md:grid-cols-2 gap-6">
        @foreach ($premiumReasons as $reason)
            <div class="p-6 hairline">
                <h3 class="text-lg">{{ $reason['title'] }}</h3>
                <p class="mt-3 text-sm text-muted-foreground leading-relaxed">{{ $reason['body'] }}</p>
            </div>
        @endforeach
    </div>
</section>
