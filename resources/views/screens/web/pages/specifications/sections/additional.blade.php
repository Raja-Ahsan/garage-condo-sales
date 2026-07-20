<section class="container-lux mt-10 sm:mt-12 md:mt-16 min-w-0">
    <div class="card-lux p-5 sm:p-8 md:p-10 min-w-0">
        <p class="eyebrow">Additional Features</p>
        <h2 class="section-title-lux mt-4">Shared Between the Suites</h2>
        <ul class="mt-5 sm:mt-6 grid gap-4 sm:gap-5 md:grid-cols-3 md:gap-6">
            @foreach ($additionalFeatures as $feature)
                <li class="text-sm text-muted-foreground leading-relaxed border-l-2 border-primary/50 pl-4 min-w-0 break-words">
                    {{ $feature }}
                </li>
            @endforeach
        </ul>
    </div>
</section>
