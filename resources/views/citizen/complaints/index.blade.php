<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ကျွန်ုပ်၏ တိုင်ကြားစာများ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-end">
                <a href="{{ route('citizen.complaints.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">
                    တိုင်ကြားစာအသစ်တင်ရန်
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($complaints->isEmpty())
                    <p class="p-6 text-gray-500">တိုင်ကြားစာများ မရှိသေးပါ။</p>
                @else
                    <ul class="divide-y divide-gray-200">
                        @foreach ($complaints as $complaint)
                            <li class="p-4 flex items-center justify-between">
                                <div>
                                    <a href="{{ route('citizen.complaints.show', $complaint) }}" class="text-gray-800 font-medium hover:underline">
                                        {{ $complaint->title }}
                                    </a>
                                    <div class="text-sm text-gray-500">{{ $complaint->category->label() }} · {{ $complaint->created_at->format('Y-m-d') }}</div>
                                </div>
                                <x-status-badge :status="$complaint->status" />
                            </li>
                        @endforeach
                    </ul>
                    <div class="p-4">
                        {{ $complaints->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
