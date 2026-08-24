<section class="container-lux mt-16 md:mt-32">
    <div class="flex items-end justify-between flex-wrap gap-6 mb-8 md:mb-10">
        <div class="min-w-0">
            <p class="eyebrow">Legal</p>
            <h2 class="section-title-lux mt-4">Disclaimers</h2>
        </div>
        <p class="max-w-md text-sm text-muted-foreground leading-relaxed">
            Please read the following notices carefully before relying on any information on Gotallenresale.com.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-4 md:gap-6">
        @foreach ([
            [
                'title' => 'Informational Purposes Only',
                'body' => 'The information provided by the site, Gotallenresale.com, (the site), is for general informational purposes only. All information on the site is provided in good faith, however Seller(s) make no representation or warranty of any kind, expressed or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information on the site.',
            ],
            [
                'title' => 'No Liability · Use at Your Own Risk',
                'body' => "UNDER NO CIRCUMSTANCES SHALL SELLER HAVE ANY LIABILITY TO BUYER OR PERSPECTIVE BUYER(S), FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THIS SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THIS SITE.\n\nANY USE OF THIS SITE AND OR RELIANCE ON ANY INFORMATION ON OR FROM THIS SITE IS SOLEY AT YOUR OWN RISK.",
            ],
            [
                'title' => 'Sold “AS IS”',
                'body' => 'The Seller(s) is/are selling the property in “AS IS” condition. The Buyer(s) acknowledges and agrees that they accept the property “AS IS” without any warranties, representations, or guarantees, either expressed or implied, of any kind, nature, or type whatsoever, from or on behalf of the seller.',
            ],
            [
                'title' => 'Notice to Prospective Buyers',
                'body' => 'Notice to perspective Buyer(s). In reference to the sale and or usage of this property any and all information solicited, disseminated or distributed, in any form or fashion by developer(s), brokers, realtor’s, current or past HOA officers, current owners, contracted management or their representatives should be verified and confirmed by seller prior to entering into any purchase agreement or the purchase of subject property.',
            ],
        ] as $card)
            <article class="card-lux p-6 sm:p-8 min-w-0 flex flex-col">
                <div class="w-10 h-10 hairline grid place-items-center mb-6 shrink-0">
                    <span class="gold-text font-display">✦</span>
                </div>
                <h3 class="text-xl sm:text-2xl font-display">{{ $card['title'] }}</h3>
                <div class="gold-divider my-5 max-w-[80px]"></div>
                <div class="space-y-4 text-sm text-muted-foreground leading-relaxed whitespace-pre-line">
                    {{ $card['body'] }}
                </div>
            </article>
        @endforeach
    </div>
</section>
