@props(['complaint'])

@php
    $level = $complaint->agingLevel();
    $hours = (int) $complaint->agingHours();
    $config = [
        'good' => ['icon' => '●', 'class' => 'text-green-700 bg-green-50 dark:text-green-300 dark:bg-green-900/30', 'label' => __('ပုံမှန်')],
        'warning' => ['icon' => '▲', 'class' => 'text-amber-700 bg-amber-50 dark:text-amber-300 dark:bg-amber-900/30', 'label' => __('အာရုံစိုက်ရန်')],
        'critical' => ['icon' => '■', 'class' => 'text-red-700 bg-red-50 dark:text-red-300 dark:bg-red-900/30', 'label' => __('အလွန်ကြာနေပြီ')],
    ][$level];
@endphp

<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs font-medium {{ $config['class'] }}">
    <span aria-hidden="true">{{ $config['icon'] }}</span>
    {{ $config['label'] }} ({{ $hours }} {{ __('နာရီ') }})
</span>
