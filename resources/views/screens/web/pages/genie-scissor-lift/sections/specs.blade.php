@php
    $specPanels = [
        [
            'key' => 'platform',
            'eyebrow' => 'GS-1930',
            'heading' => 'Platform',
            'data' => $platform,
            'preview' => collect($platform['rows'])->take(3),
            'cta' => 'View full platform specs →',
        ],
        [
            'key' => 'dimensions',
            'eyebrow' => 'GS-1930',
            'heading' => 'Dimensions',
            'data' => $dimensions,
            'preview' => collect($dimensions['rows'])->take(3),
            'cta' => 'View full dimensions →',
        ],
        [
            'key' => 'specifications',
            'eyebrow' => 'GS-1930',
            'heading' => 'Specifications',
            'data' => $specifications,
            'preview' => collect($specifications['groups'][0]['rows'] ?? [])->take(2)
                ->merge(collect($specifications['groups'][1]['rows'] ?? [])->take(1)),
            'cta' => 'View full specifications →',
        ],
    ];
@endphp

<section
    class="container-lux mt-12 md:mt-16"
    x-data="{ panel: null }"
    @keydown.escape.window="panel = null"
>
    <div class="flex items-end justify-between flex-wrap gap-6 mb-8 md:mb-10">
        <div class="min-w-0">
            <p class="eyebrow">Machine Specs</p>
            <h2 class="section-title-lux mt-4">
                Platform, Dimensions &amp; Specs
            </h2>
        </div>
        <p class="max-w-md text-sm text-muted-foreground leading-relaxed">
            Open any card for the full Genie GS-1930 specifications from the attached reference sheets.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-4 md:gap-6">
        @foreach ($specPanels as $card)
            <button
                type="button"
                class="w-full text-left card-lux p-6 sm:p-8 group min-w-0 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                @click="panel = '{{ $card['key'] }}'"
                aria-haspopup="dialog"
                :aria-expanded="(panel === '{{ $card['key'] }}').toString()"
            >
                <p class="text-xs uppercase tracking-[0.25em] text-muted-foreground">{{ $card['eyebrow'] }}</p>
                <h3 class="mt-3 text-2xl sm:text-3xl font-display">{{ $card['heading'] }}</h3>
                <p class="mt-3 text-sm text-muted-foreground leading-relaxed">
                    {{ $card['data']['subtitle'] }}
                </p>
                <div class="gold-divider my-6 max-w-[100px]"></div>
                <div class="space-y-3">
                    @foreach ($card['preview'] as $preview)
                        <div class="min-w-0">
                            <p class="text-[10px] uppercase tracking-[0.18em] text-muted-foreground">{{ $preview['label'] }}</p>
                            <p class="mt-1 text-sm gold-text font-display truncate">{{ $preview['value'] }}</p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-6 text-xs uppercase tracking-[0.2em] text-primary group-hover:text-gold-soft transition-colors">
                    {{ $card['cta'] }}
                </p>
            </button>
        @endforeach
    </div>

    {{-- Shared detail modals --}}
    @foreach ($specPanels as $card)
        <div
            x-show="panel === '{{ $card['key'] }}'"
            x-cloak
            class="fixed inset-0 z-[80] flex items-end sm:items-center justify-center p-0 sm:p-6"
            role="dialog"
            aria-modal="true"
            aria-labelledby="genie-{{ $card['key'] }}-title"
        >
            <div
                class="absolute inset-0 bg-background/80 backdrop-blur-md"
                @click="panel = null"
                x-show="panel === '{{ $card['key'] }}'"
                x-transition.opacity
            ></div>

            <div
                class="relative w-full max-w-xl max-h-[92dvh] overflow-hidden bg-surface border border-border/80 shadow-2xl sm:rounded-sm"
                @click.stop
                x-show="panel === '{{ $card['key'] }}'"
                x-transition
            >
                <div class="flex items-start justify-between gap-4 px-5 sm:px-8 pt-5 sm:pt-7 pb-4 border-b border-border/60">
                    <div class="min-w-0">
                        <p class="eyebrow">{{ $card['heading'] }}</p>
                        <h3 id="genie-{{ $card['key'] }}-title" class="mt-3 text-xl sm:text-2xl md:text-3xl font-display leading-tight">
                            {{ $card['data']['title'] }}
                        </h3>
                        <p class="mt-2 text-xs sm:text-sm text-muted-foreground leading-relaxed">
                            {{ $card['data']['subtitle'] }}
                        </p>
                    </div>
                    <button
                        type="button"
                        class="shrink-0 w-11 h-11 grid place-items-center hairline rounded-sm text-muted-foreground hover:text-primary transition-colors"
                        @click="panel = null"
                        aria-label="Close {{ $card['heading'] }}"
                    >
                        <span class="text-xl leading-none" aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="overflow-y-auto max-h-[calc(92dvh-9rem)] px-5 sm:px-8 py-2 sm:py-3">
                    @if (! empty($card['data']['groups']))
                        @foreach ($card['data']['groups'] as $group)
                            <div class="py-4 first:pt-2">
                                <p class="mb-3 text-lg sm:text-xl font-display font-medium text-white tracking-wide">
                                    {{ $group['heading'] }}
                                </p>
                                <ul class="divide-y divide-border/50">
                                    @foreach ($group['rows'] as $row)
                                        <li class="flex items-start gap-4 py-4">
                                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shrink-0" aria-hidden="true"></span>
                                            <div class="min-w-0 flex-1">
                                                <p class="text-xs uppercase tracking-[0.2em] text-muted-foreground">{{ $row['label'] }}</p>
                                                <p class="mt-1 text-base sm:text-lg font-medium text-foreground">{{ $row['value'] }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @else
                        <ul class="divide-y divide-border/50">
                            @foreach ($card['data']['rows'] as $row)
                                <li class="flex items-start gap-4 py-4">
                                    @if (! empty($row['mark']))
                                        <span class="mt-0.5 w-6 h-6 rounded-full bg-primary text-primary-foreground text-[11px] font-semibold grid place-items-center shrink-0" aria-hidden="true">
                                            {{ $row['mark'] }}
                                        </span>
                                    @else
                                        <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shrink-0" aria-hidden="true"></span>
                                    @endif
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs uppercase tracking-[0.2em] text-muted-foreground">{{ $row['label'] }}</p>
                                        <p class="mt-1 text-base sm:text-lg font-medium text-foreground">{{ $row['value'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</section>
