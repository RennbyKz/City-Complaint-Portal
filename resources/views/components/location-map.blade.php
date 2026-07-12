@props(['complaint'])

@if ($complaint->latitude && $complaint->longitude)
    <div>
        <dt class="text-gray-500 dark:text-gray-400 text-sm mb-1">{{ __('တည်နေရာ မြေပုံ') }}</dt>
        <div class="location-picker-map h-56 rounded-md ring-1 ring-gray-200 dark:ring-gray-600"
            data-readonly="true" data-lat="{{ $complaint->latitude }}" data-lng="{{ $complaint->longitude }}"></div>
    </div>
@endif
