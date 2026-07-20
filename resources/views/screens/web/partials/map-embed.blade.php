{{--
    Reusable Google Maps embed.
    @param string|null $title
    @param string|null $src  Defaults to config('property.map_embed_url')
--}}
@php
    $mapSrc = $src ?? config('property.map_embed_url');
    $mapTitle = $title ?? 'Property Location';
@endphp

<div class="hairline overflow-hidden aspect-[16/9] bg-surface/40 responsive-embed max-w-full">
    <iframe
        title="{{ $mapTitle }}"
        class="w-full h-full border-0"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen
        src="{{ $mapSrc }}"
    ></iframe>
</div>
