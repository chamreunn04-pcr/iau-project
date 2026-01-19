@props([
    'href' => null,
    'target' => null,
])

@php
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    @if($href && $target) target="{{ $target }}" @endif
    {{ $attributes->merge([
        'class' => $href
            ? 'card card-link card-link-pop border-0 shadow-sm'
            : 'card border-0 shadow-sm'
    ]) }}>
    {{-- Header --}}
    @isset($header)
        <div class="card-header text-primary {{ $headerClass }}">
            {{ $header }}
        </div>
    @endisset

    {{-- Content --}}
    {{ $slot }}

    {{-- Footer --}}
    @isset($footer)
        <div class="card-footer {{ $footerClass }}">
            {{ $footer }}
        </div>
    @endisset
</{{ $tag }}>
