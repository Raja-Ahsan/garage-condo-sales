<section class="container-lux mt-12 md:mt-16">
    <div class="card-lux p-6 sm:p-10 md:p-14 relative overflow-hidden">
        <div class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/10 blur-3xl pointer-events-none"></div>

        <div class="relative grid md:grid-cols-12 gap-8 md:gap-10 items-center">
            <div class="md:col-span-8 min-w-0">
                <!-- <p class="eyebrow">Additional Offer</p> -->
                <h2 class="section-title-lux mt-4 md:mt-6">
                    Double <span class="gold-text">Bonus</span>
                </h2>
                <div class="gold-divider my-6 max-w-[120px]"></div>
                <p class="text-muted-foreground leading-relaxed max-w-2xl">
                    With an accepted full-price cash closing, receive the additional bonus —
                    a refurbished Genie GS-1930 Scissor Lift. View full platform, dimensions,
                    and operational specs.
                </p>
            </div>
            <div class="md:col-span-4 flex md:justify-end">
                <a
                    href="{{ Route::has('web.genie') ? route('web.genie') : '#' }}"
                    class="btn-gold btn-gold-hover inline-flex w-full md:w-auto justify-center"
                >
                    Double Bonus
                </a>
            </div>
        </div>
    </div>
</section>
