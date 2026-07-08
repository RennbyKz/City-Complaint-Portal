<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('စီမံခန့်ခွဲသူ ဒက်ရှ်ဘုတ်') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                <x-stat-card label="{{ __('စောင့်ဆိုင်းဆဲ') }}" :value="$stats['pending']" />
                <x-stat-card label="{{ __('ဆောင်ရွက်နေဆဲ') }}" :value="$stats['in_progress']" />
                <x-stat-card label="{{ __('ပြီးစီးပြီ') }}" :value="$stats['resolved']" />
                <x-stat-card label="{{ __('ဌာနမသတ်မှတ်ရသေး') }}" :value="$stats['unassigned']" />
                <x-stat-card label="{{ __('အတည်ပြုရန်စောင့်နေသော ပြည်သူများ') }}" :value="$stats['pending_citizens']" />
            </div>

            <div id="admin-dashboard-charts" data-chart-data-url="{{ route('admin.dashboard.chart-data') }}" class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-3">{{ __('လအလိုက် တိုင်ကြားစာအရေအတွက်') }}</h3>
                    <canvas id="volume-by-month-chart" height="200"></canvas>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-3">{{ __('အမျိုးအစားအလိုက် တိုင်ကြားစာအရေအတွက်') }}</h3>
                    <canvas id="by-category-chart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/charts.js'])
</x-app-layout>
