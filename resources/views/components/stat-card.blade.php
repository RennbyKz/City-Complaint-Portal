@props(['label', 'value'])

<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow-sm sm:rounded-lg p-6']) }}>
    <div class="text-sm font-medium text-gray-500">{{ $label }}</div>
    <div class="mt-1 text-3xl font-semibold text-gray-800">{{ $value }}</div>
</div>
