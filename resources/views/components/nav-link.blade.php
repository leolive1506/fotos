@props(['active' => false, 'icon' => null])

@php
    $classActive = ($active)
                    ? 'bg-cyan-900 text-white'
                    : 'text-cyan-100 hover:text-white hover:bg-cyan-600';

@endphp

<a {{ $attributes->merge(['class' => "bg-cyan-800 text-white group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md " . $classActive]) }} class= aria-current="page">
    @if ($icon)
        {{ $icon }}
    @endif
    {{ $slot }}
</a>
