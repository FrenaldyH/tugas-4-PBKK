@props([
    'title' => null,
    'subtitle' => null,
])

{{-- BMW model-card: flat plate, hairline outline, zero radius, no shadow.
     Title/subtitle arrive as attributes, the body content as the default slot. --}}
<div
    {{ $attributes->merge(['class' => 'border border-hairline bg-canvas p-6 transition-colors dark:border-surface-dark-elevated dark:bg-surface-dark-elevated']) }}>
    @if ($subtitle)
        <p class="link-cta text-muted dark:text-on-dark-soft">{{ $subtitle }}</p>
    @endif

    @if ($title)
        <h3 class="mt-3 text-lg font-bold text-ink dark:text-on-dark">{{ $title }}</h3>
    @endif

    <div class="mt-3 text-base leading-relaxed text-body dark:text-on-dark-soft">
        {{ $slot }}
    </div>
</div>
