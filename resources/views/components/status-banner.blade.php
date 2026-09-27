@props(['type' => 'info'])

@php
    // Semantic colour per banner type; anything unknown falls back to info.
    $styles = [
        'success' => 'border-success bg-success/10',
        'error' => 'border-error bg-error/10',
        'info' => 'border-primary bg-primary/10',
    ];
@endphp

{{-- Zero radius + 4px semantic left rule, per the BMW corporate dialect --}}
<div role="alert"
    {{ $attributes->merge(['class' => 'border-l-4 p-6 text-base text-ink dark:text-on-dark ' . ($styles[$type] ?? $styles['info'])]) }}>
    {{ $slot }}
</div>
