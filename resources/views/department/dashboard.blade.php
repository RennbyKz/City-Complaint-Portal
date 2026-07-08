<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('ဌာနဆိုင်ရာ ဒက်ရှ်ဘုတ်') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (! $department)
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-500 dark:text-gray-400">
                    {{ __('သင့်အကောင့်တွင် ဌာနတစ်ခု သတ်မှတ်မထားပါ။ စီမံခန့်ခွဲသူထံ ဆက်သွယ်ပါ။') }}
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    <x-stat-card label="{{ __('စောင့်ဆိုင်းဆဲ') }}" :value="$statusCounts['pending'] ?? 0" />
                    <x-stat-card label="{{ __('ဆောင်ရွက်နေဆဲ') }}" :value="$statusCounts['in_progress'] ?? 0" />
                    <x-stat-card label="{{ __('ပြီးစီးပြီ') }}" :value="$statusCounts['resolved'] ?? 0" />
                    <x-stat-card label="{{ __('ပျမ်းမျှကျေနပ်မှု') }}" :value="$averageRating ? number_format($averageRating, 1) . ' / 5' : '—'" />
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
