<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ပြည်သူ့ ဒက်ရှ်ဘုတ်
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <x-stat-card label="စောင့်ဆိုင်းဆဲ" :value="$statusCounts['pending'] ?? 0" />
                <x-stat-card label="ဆောင်ရွက်နေဆဲ" :value="$statusCounts['in_progress'] ?? 0" />
                <x-stat-card label="ပြီးစီးပြီ" :value="$statusCounts['resolved'] ?? 0" />
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">မကြာသေးမီက တိုင်ကြားစာများ</h3>
                    <a href="{{ route('citizen.complaints.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">
                        တိုင်ကြားစာအသစ်တင်ရန်
                    </a>
                </div>

                @if ($recentComplaints->isEmpty())
                    <p class="text-gray-500">တိုင်ကြားစာများ မရှိသေးပါ။</p>
                @else
                    <ul class="divide-y divide-gray-200">
                        @foreach ($recentComplaints as $complaint)
                            <li class="py-3 flex items-center justify-between">
                                <a href="{{ route('citizen.complaints.show', $complaint) }}" class="text-gray-800 hover:underline">
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
</x-app-layout>
