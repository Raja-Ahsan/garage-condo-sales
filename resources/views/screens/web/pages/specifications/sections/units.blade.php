<section class="container-lux mt-10 sm:mt-12 md:mt-16 grid md:grid-cols-2 gap-5 md:gap-8 min-w-0">
    @include('screens.web.pages.specifications.sections.spec-card', [
        'tag' => 'Right Unit',
        'image' => $rightUnitImage,
        'items' => $rightSpecs,
    ])

    @include('screens.web.pages.specifications.sections.spec-card', [
        'tag' => 'Left Unit',
        'image' => $leftUnitImage,
        'items' => $leftSpecs,
    ])
</section>
