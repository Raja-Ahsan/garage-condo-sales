<section
    class="container-lux mt-12 md:mt-16"
    x-data="{ panel: null }"
    @keydown.escape.window="panel = null"
>
    <div class="flex items-end justify-between flex-wrap gap-6 mb-8 md:mb-10">
        <div class="min-w-0">
            <p class="eyebrow">Vehicle Specs</p>
            <h2 class="section-title-lux mt-4">
            Bentley Mulsanne Details
            </h2>
        </div>
        <p class="max-w-md text-sm text-muted-foreground leading-relaxed">
            Open either card for the full 2013 Bentley Mulsanne specifications.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-4 md:gap-6">
        {{-- Dimensions card --}}
        <button
            type="button"
            class="w-full text-left card-lux p-6 sm:p-8 group min-w-0 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
            @click="panel = 'dimensions'"
            aria-haspopup="dialog"
            :aria-expanded="(panel === 'dimensions').toString()"
        >
            <p class="text-xs uppercase tracking-[0.25em] text-muted-foreground">2013 · Mulsanne</p>
            <h3 class="mt-3 text-2xl sm:text-3xl font-display">Dimensions</h3>
            <p class="mt-3 text-sm text-muted-foreground leading-relaxed">
                {{ $dimensions['subtitle'] }}
            </p>
            <div class="gold-divider my-6 max-w-[100px]"></div>
            <div class="grid grid-cols-3 gap-3">
                @foreach (array_slice($dimensions['rows'], 0, 3) as $preview)
                    <div class="min-w-0">
                        <p class="text-[10px] uppercase tracking-[0.18em] text-muted-foreground">{{ $preview['label'] }}</p>
                        <p class="mt-1 text-sm gold-text font-display">{{ $preview['imperial'] }}</p>
                    </div>
                @endforeach
            </div>
            <p class="mt-6 text-xs uppercase tracking-[0.2em] text-primary group-hover:text-gold-soft transition-colors">
                View full dimensions →
            </p>
        </button>

        {{-- Vehicle details card --}}
        <button
            type="button"
            class="w-full text-left card-lux p-6 sm:p-8 group min-w-0 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
            @click="panel = 'details'"
            aria-haspopup="dialog"
            :aria-expanded="(panel === 'details').toString()"
        >
            <p class="text-xs uppercase tracking-[0.25em] text-muted-foreground">2013 · Mulsanne</p>
            <h3 class="mt-3 text-2xl sm:text-3xl font-display">Vehicle Details</h3>
            <p class="mt-3 text-sm text-muted-foreground leading-relaxed">
                {{ $vehicleDetails['subtitle'] }}
            </p>
            <div class="gold-divider my-6 max-w-[100px]"></div>
            <div class="grid grid-cols-3 gap-3">
                @foreach (array_slice($vehicleDetails['rows'], 0, 3) as $preview)
                    <div class="min-w-0">
                        <p class="text-[10px] uppercase tracking-[0.18em] text-muted-foreground">{{ $preview['label'] }}</p>
                        <p class="mt-1 text-sm gold-text font-display truncate">{{ $preview['value'] }}</p>
                    </div>
                @endforeach
            </div>
            <p class="mt-6 text-xs uppercase tracking-[0.2em] text-primary group-hover:text-gold-soft transition-colors">
                View full details →
            </p>
        </button>
    </div>

    {{-- Dimensions modal --}}
    <div
        x-show="panel === 'dimensions'"
        x-cloak
        class="fixed inset-0 z-[80] flex items-end sm:items-center justify-center p-0 sm:p-6"
        role="dialog"
        aria-modal="true"
        aria-labelledby="bentley-dimensions-title"
    >
        <div
            class="absolute inset-0 bg-background/80 backdrop-blur-md"
            @click="panel = null"
            x-show="panel === 'dimensions'"
            x-transition.opacity
        ></div>

        <div
            class="relative w-full max-w-3xl max-h-[92dvh] overflow-hidden bg-surface border border-border/80 shadow-2xl sm:rounded-sm"
            @click.stop
            x-show="panel === 'dimensions'"
            x-transition
        >
            <div class="flex items-start justify-between gap-4 px-5 sm:px-8 pt-5 sm:pt-7 pb-4 border-b border-border/60">
                <div class="min-w-0">
                    <p class="eyebrow">Specifications</p>
                    <h3 id="bentley-dimensions-title" class="mt-3 text-xl sm:text-2xl md:text-3xl font-display leading-tight">
                        {{ $dimensions['title'] }}
                    </h3>
                    <p class="mt-2 text-xs sm:text-sm text-muted-foreground leading-relaxed">
                        {{ $dimensions['subtitle'] }}
                    </p>
                </div>
                <button
                    type="button"
                    class="shrink-0 w-11 h-11 grid place-items-center hairline rounded-sm text-muted-foreground hover:text-primary transition-colors"
                    @click="panel = null"
                    aria-label="Close dimensions"
                >
                    <span class="text-xl leading-none" aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="overflow-y-auto max-h-[calc(92dvh-9rem)] px-5 sm:px-8 py-5 sm:py-6">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[28rem] text-left border-collapse">
                        <thead>
                            <tr class="border-b border-primary/30">
                                <th class="pb-3 pr-4 text-[10px] sm:text-xs uppercase tracking-[0.22em] text-muted-foreground font-medium">Dimension</th>
                                <th class="pb-3 pr-4 text-[10px] sm:text-xs uppercase tracking-[0.22em] text-muted-foreground font-medium">Metric</th>
                                <th class="pb-3 text-[10px] sm:text-xs uppercase tracking-[0.22em] text-muted-foreground font-medium">Imperial</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dimensions['rows'] as $row)
                                <tr class="border-b border-border/50 last:border-0">
                                    <td class="py-3.5 sm:py-4 pr-4 text-sm sm:text-base">
                                        <span class="text-muted-foreground">Bentley Mulsanne</span>
                                        <span class="font-medium text-foreground"> {{ $row['label'] }}</span>
                                    </td>
                                    <td class="py-3.5 sm:py-4 pr-4 text-sm sm:text-base text-muted-foreground whitespace-nowrap">
                                        {{ $row['metric'] }}
                                    </td>
                                    <td class="py-3.5 sm:py-4 text-sm sm:text-base gold-text font-display whitespace-nowrap">
                                        {{ $row['imperial'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Vehicle details modal --}}
    <div
        x-show="panel === 'details'"
        x-cloak
        class="fixed inset-0 z-[80] flex items-end sm:items-center justify-center p-0 sm:p-6"
        role="dialog"
        aria-modal="true"
        aria-labelledby="bentley-details-title"
    >
        <div
            class="absolute inset-0 bg-background/80 backdrop-blur-md"
            @click="panel = null"
            x-show="panel === 'details'"
            x-transition.opacity
        ></div>

        <div
            class="relative w-full max-w-xl max-h-[92dvh] overflow-hidden bg-surface border border-border/80 shadow-2xl sm:rounded-sm"
            @click.stop
            x-show="panel === 'details'"
            x-transition
        >
            <div class="flex items-start justify-between gap-4 px-5 sm:px-8 pt-5 sm:pt-7 pb-4 border-b border-border/60">
                <div class="min-w-0">
                    <p class="eyebrow">Vehicle Details</p>
                    <h3 id="bentley-details-title" class="mt-3 text-xl sm:text-2xl md:text-3xl font-display leading-tight">
                        {{ $vehicleDetails['title'] }}
                    </h3>
                    <p class="mt-2 text-xs sm:text-sm text-muted-foreground leading-relaxed">
                        {{ $vehicleDetails['subtitle'] }}
                    </p>
                </div>
                <button
                    type="button"
                    class="shrink-0 w-11 h-11 grid place-items-center hairline rounded-sm text-muted-foreground hover:text-primary transition-colors"
                    @click="panel = null"
                    aria-label="Close vehicle details"
                >
                    <span class="text-xl leading-none" aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="overflow-y-auto max-h-[calc(92dvh-9rem)] px-5 sm:px-8 py-2 sm:py-3">
                <ul class="divide-y divide-border/50">
                    @foreach ($vehicleDetails['rows'] as $row)
                        <li class="flex items-start gap-4 py-4">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shrink-0" aria-hidden="true"></span>
                            <div class="min-w-0 flex-1">
                                <p class="text-xs uppercase tracking-[0.2em] text-muted-foreground">{{ $row['label'] }}</p>
                                <p class="mt-1 text-base sm:text-lg font-medium text-foreground break-all">{{ $row['value'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
