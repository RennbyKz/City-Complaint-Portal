<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">{{ __('ကျေနပ်မှုအဆင့်') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-stat-card label="{{ __('ပျမ်းမျှ ကျေနပ်မှုအဆင့်') }}" :value="$averageRating ? number_format($averageRating, 1) . ' / 5' : '—'" />

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($recentRatings->isEmpty())
                    <p class="p-6 text-gray-500 dark:text-gray-400">{{ __('အဆင့်သတ်မှတ်မှု မရှိသေးပါ။') }}</p>
                @else
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($recentRatings as $rating)
                            <li class="p-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-amber-500 dark:text-amber-400">{{ str_repeat('★', $rating->score) }}{{ str_repeat('☆', 5 - $rating->score) }}</span>
                                    <span class="text-xs text-gray-400 dark:text-gray-500">{{ $rating->created_at->format('Y-m-d') }}</span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $rating->complaint->title }}</p>
                                @if ($rating->comment)
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">"{{ $rating->comment }}"</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
