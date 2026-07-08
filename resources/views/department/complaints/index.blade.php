<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">{{ __('တာဝန်ရှိ တိုင်ကြားစာများ') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="GET" class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-4 flex gap-3 items-end">
                <div>
                    <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">{{ __('အခြေအနေ') }}</label>
                    <select name="status" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm text-sm">
                        <option value="">{{ __('အားလုံး') }}</option>
                        @foreach ($statuses as $s)
                            <option value="{{ $s->value }}" @selected(request('status') === $s->value)>{{ $s->label() }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="px-4 py-2 bg-gray-800 dark:bg-gray-600 text-white text-sm rounded-md hover:bg-gray-700 dark:hover:bg-gray-500">{{ __('စစ်ထုတ်မည်') }}</button>
            </form>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($complaints->isEmpty())
                    <p class="p-6 text-gray-500 dark:text-gray-400">{{ __('တိုင်ကြားစာများ မရှိသေးပါ။') }}</p>
                @else
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($complaints as $complaint)
                            <li class="p-4 flex items-center justify-between">
                                <div>
                                    <a href="{{ route('department.complaints.show', $complaint) }}" class="text-gray-800 dark:text-gray-200 font-medium hover:underline">{{ $complaint->title }}</a>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $complaint->created_at->format('Y-m-d') }}</div>
                                </div>
                                <x-status-badge :status="$complaint->status" />
                            </li>
                        @endforeach
                    </ul>
                    <div class="p-4">{{ $complaints->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
