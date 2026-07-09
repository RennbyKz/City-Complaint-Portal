<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('စီမံခန့်ခွဲသူ ဒက်ရှ်ဘုတ်') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-3">{{ __('ခြုံငုံသုံးသပ်ချက်') }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    <x-stat-card icon="clock" color="amber" label="{{ __('စောင့်ဆိုင်းဆဲ') }}" :value="$stats['pending']" />
                    <x-stat-card icon="refresh" color="blue" label="{{ __('ဆောင်ရွက်နေဆဲ') }}" :value="$stats['in_progress']" />
                    <x-stat-card icon="check" color="green" label="{{ __('ပြီးစီးပြီ') }}" :value="$stats['resolved']" />
                    <x-stat-card icon="question" color="gray" label="{{ __('ဌာနမသတ်မှတ်ရသေး') }}" :value="$stats['unassigned']" />
                    <x-stat-card icon="user-check" color="purple" label="{{ __('အတည်ပြုရန်စောင့်နေသော ပြည်သူများ') }}" :value="$stats['pending_citizens']" />
                </div>
            </div>

            <div>
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-3">{{ __('စာရင်းအင်းများ') }}</h3>
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

            <div>
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-3">{{ __('အမြန်လုပ်ဆောင်ချက်များ') }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('admin.complaints.index') }}" class="flex items-center gap-3 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-4 hover:shadow-md dark:hover:bg-gray-700/60 transition">
                        <div class="shrink-0 flex items-center justify-center w-9 h-9 rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('တိုင်ကြားစာများ') }}</span>
                    </a>
                    <a href="{{ route('admin.citizens.index', ['status' => 'pending']) }}" class="flex items-center gap-3 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-4 hover:shadow-md dark:hover:bg-gray-700/60 transition">
                        <div class="shrink-0 flex items-center justify-center w-9 h-9 rounded-lg bg-purple-50 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25l-1.5 1.5-3-3" /></svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('ပြည်သူအကောင့်များ') }}</span>
                    </a>
                    <a href="{{ route('admin.departments.index') }}" class="flex items-center gap-3 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-4 hover:shadow-md dark:hover:bg-gray-700/60 transition">
                        <div class="shrink-0 flex items-center justify-center w-9 h-9 rounded-lg bg-amber-50 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" /></svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('ဌာနများ') }}</span>
                    </a>
                    <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-4 hover:shadow-md dark:hover:bg-gray-700/60 transition">
                        <div class="shrink-0 flex items-center justify-center w-9 h-9 rounded-lg bg-green-50 text-green-600 dark:bg-green-900/30 dark:text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" /></svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('အစီရင်ခံစာ') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/charts.js'])
</x-app-layout>
