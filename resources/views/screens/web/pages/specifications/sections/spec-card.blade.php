<article class="card-lux overflow-hidden min-w-0">
    <div
        class="aspect-[16/9] bg-cover bg-center"
        style="background-image: url('{{ $image }}')"
        role="img"
        aria-label="{{ $tag }}"
    ></div>
    <div class="p-5 sm:p-6 md:p-8 min-w-0">
        <p class="eyebrow">{{ $tag }}</p>
        <ul class="mt-5 sm:mt-6 space-y-3">
            @foreach ($items as $item)
                <li class="flex gap-3 text-sm text-muted-foreground leading-relaxed min-w-0">
                    <span class="text-primary mt-1 shrink-0" aria-hidden="true">◆</span>
                    <span class="min-w-0 break-words">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</article>
