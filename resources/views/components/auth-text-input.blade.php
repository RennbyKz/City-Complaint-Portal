@props(['icon' => null, 'disabled' => false])

<div class="relative">
    @if ($icon)
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 dark:text-gray-500">
            @switch($icon)
                @case('email')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0-.83.67-1.5 1.5-1.5h16.5c.83 0 1.5.67 1.5 1.5v10.5a1.5 1.5 0 01-1.5 1.5H3.75a1.5 1.5 0 01-1.5-1.5V6.75z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9 6 9-6" />
                    </svg>
                    @break

                @case('password')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V7.5a4.5 4.5 0 10-9 0v3M6 10.5h12a1.5 1.5 0 011.5 1.5v7.5a1.5 1.5 0 01-1.5 1.5H6a1.5 1.5 0 01-1.5-1.5V12A1.5 1.5 0 016 10.5z" />
                    </svg>
                    @break

                @case('user')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    @break

                @case('phone')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 002.25-2.25v-1.372a1 1 0 00-.628-.928l-4.34-1.735a1 1 0 00-1.155.325l-.827 1.104a1 1 0 01-1.243.29 11.27 11.27 0 01-4.93-4.93 1 1 0 01.29-1.243l1.104-.827a1 1 0 00.325-1.155L8.35 2.878a1 1 0 00-.928-.628H6.05A2.25 2.25 0 003.8 3.5v.75" />
                    </svg>
                    @break

                @case('id')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 5.25h15A2.25 2.25 0 0121.75 7.5v9a2.25 2.25 0 01-2.25 2.25h-15A2.25 2.25 0 012.25 16.5v-9A2.25 2.25 0 014.5 5.25zM10.5 12a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zM13.5 10.5h4.5M13.5 13.5h4.5" />
                    </svg>
                    @break
            @endswitch
        </div>
    @endif

    <input @disabled($disabled) {{ $attributes->merge([
        'class' => 'block w-full rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/60 dark:text-gray-100 py-2.5 '
            . ($icon ? 'pl-10' : 'pl-3.5') . ' pr-3.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 shadow-sm transition '
            . 'focus:border-blue-900 dark:focus:border-blue-400 focus:bg-white dark:focus:bg-gray-700 focus:ring-4 focus:ring-blue-900/10 dark:focus:ring-blue-400/10 focus:outline-none'
    ]) }}>
</div>
