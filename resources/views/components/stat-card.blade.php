@props(['label', 'value'])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6']) }}>
    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $label }}</div>
    <div class="mt-1 text-3xl font-semibold text-gray-800 dark:text-gray-100">{{ $value }}</div>
</div>
