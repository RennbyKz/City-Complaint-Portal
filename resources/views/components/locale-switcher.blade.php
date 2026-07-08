@php
    $isMy = app()->getLocale() === 'my';
    $target = $isMy ? 'en' : 'my';
@endphp

<a href="{{ route('locale.switch', $target) }}"
   onclick="document.getElementById('locale-loading-overlay')?.classList.remove('hidden')"
   class="inline-flex items-center gap-2 select-none group"
   aria-label="{{ __('Toggle language') }}">
   
    <span class="text-xs font-bold tracking-wide transition-colors {{ ! $isMy ? 'text-gray-800 dark:text-gray-100' : 'text-gray-400 dark:text-gray-500' }}">EN</span>

    <span class="relative inline-flex h-7 w-14 shrink-0 items-center rounded-full bg-gray-200 dark:bg-gray-700 ring-1 ring-inset ring-black/5">
        <span class="absolute left-0.5 top-1/2 -translate-y-1/2 h-6 w-6 rounded-full overflow-hidden shadow ring-1 ring-black/10 transition-transform duration-200 ease-out {{ $isMy ? 'translate-x-7' : 'translate-x-0' }}">
            <span class="fi {{ $isMy ? 'fi-mm' : 'fi-gb' }} block h-full w-full" style="background-size: cover;" aria-hidden="true"></span>
        </span>
    </span>

    <span class="text-xs font-bold tracking-wide transition-colors {{ $isMy ? 'text-gray-800 dark:text-gray-100' : 'text-gray-400 dark:text-gray-500' }}">MM</span>
</a>