@props(['variant' => 'default'])

@php
    $base = $variant === 'onDark'
        ? 'text-white/70 hover:text-white'
        : 'text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-100';

    $activeBase = $variant === 'onDark'
        ? 'bg-white/15 text-white'
        : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-100';
@endphp

<div class="inline-flex items-center gap-0.5 p-0.5 rounded-full {{ $variant === 'onDark' ? 'bg-white/10' : 'bg-gray-100/70 dark:bg-gray-700/50' }}">
    <a href="{{ route('locale.switch', 'my') }}"
        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium transition {{ app()->getLocale() === 'my' ? $activeBase : $base }}">
        <span aria-hidden="true">🇲🇲</span>
        <span>MY</span>
    </a>
    <a href="{{ route('locale.switch', 'en') }}"
        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium transition {{ app()->getLocale() === 'en' ? $activeBase : $base }}">
        <span aria-hidden="true">🇬🇧</span>
        <span>EN</span>
    </a>
</div>
