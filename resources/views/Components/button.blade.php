@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'disabled' => false,
])

@php
    $baseClasses =
        'inline-flex items-center justify-center font-medium rounded focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200';

    $variants = [
        'primary' => 'bg-blue-500 text-white hover:bg-blue-700 focus:ring-blue-500',
        'secondary' => 'bg-gray-500 text-white hover:bg-gray-700 focus:ring-gray-500',
        'danger' => 'bg-red-500 text-white hover:bg-red-700 focus:ring-red-500',
        'success' => 'bg-green-500 text-white hover:bg-green-700 focus:ring-green-500',
        'link' => 'text-blue-500 hover:text-blue-700 focus:ring-blue-500 bg-transparent',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
    ];

    $classes =
        $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);

    if ($disabled) {
        $classes .= ' opacity-50 cursor-not-allowed';
    }
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
