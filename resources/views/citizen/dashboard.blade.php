<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('ပြည်သူ့ ဒက်ရှ်ဘုတ်') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <x-stat-card icon="clock" color="amber" label="{{ __('စောင့်ဆိုင်းဆဲ') }}" :value="$statusCounts['pending'] ?? 0" />
                    <x-stat-card icon="refresh" color="blue" label="{{ __('ဆောင်ရွက်နေဆဲ') }}" :value="$statusCounts['in_progress'] ?? 0" />
                    <x-stat-card icon="check" color="green" label="{{ __('ပြီးစီးပြီ') }}" :value="$statusCounts['resolved'] ?? 0" />
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 flex items-center justify-center h-56">
                    <canvas id="citizen-status-chart"
                        data-counts="{{ json_encode([
                            'pending' => $statusCounts['pending'] ?? 0,
                            'inProgress' => $statusCounts['in_progress'] ?? 0,
                            'resolved' => $statusCounts['resolved'] ?? 0,
                            'pendingLabel' => __('စောင့်ဆိုင်းဆဲ'),
                            'inProgressLabel' => __('ဆောင်ရွက်နေဆဲ'),
                            'resolvedLabel' => __('ပြီးစီးပြီ'),
                        ]) }}"></canvas>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ __('မကြာသေးမီက တိုင်ကြားစာများ') }}</h3>
                    <a href="{{ route('citizen.complaints.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-600 text-white text-sm rounded-md hover:bg-gray-700 dark:hover:bg-gray-500">
                        {{ __('တိုင်ကြားစာအသစ်တင်ရန်') }}
                    </a>
                </div>

                @if ($recentComplaints->isEmpty())
                    <p class="text-gray-500 dark:text-gray-400">{{ __('တိုင်ကြားစာများ မရှိသေးပါ။') }}</p>
                @else
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($recentComplaints as $complaint)
                            <li class="py-3 flex items-center justify-between">
                                <a href="{{ route('citizen.complaints.show', $complaint) }}" class="text-gray-800 dark:text-gray-200 hover:underline">
                                    {{ $complaint->title }}
                                </a>
                                <x-status-badge :status="$complaint->status" />
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    @vite(['resources/js/charts.js'])
</x-app-layout>
