<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">{{ __('တိုင်ကြားစာများ') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="GET" class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-4 flex flex-wrap gap-3 items-end">
                <div>
                    <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">{{ __('အခြေအနေ') }}</label>
                    <select name="status" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm text-sm">
                        <option value="">{{ __('အားလုံး') }}</option>
                        @foreach ($statuses as $s)
                            <option value="{{ $s->value }}" @selected(request('status') === $s->value)>{{ $s->label() }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">{{ __('ဌာန') }}</label>
                    <select name="department_id" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm text-sm">
                        <option value="">{{ __('အားလုံး') }}</option>
                        @foreach ($departments as $d)
                            <option value="{{ $d->id }}" @selected((string) request('department_id') === (string) $d->id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="px-4 py-2 bg-gray-800 dark:bg-gray-600 text-white text-sm rounded-md hover:bg-gray-700 dark:hover:bg-gray-500">{{ __('စစ်ထုတ်မည်') }}</button>
            </form>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($complaints->isEmpty())
                    <p class="p-6 text-gray-500 dark:text-gray-400">{{ __('တိုင်ကြားစာများ မရှိသေးပါ။') }}</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('ခေါင်းစဉ်') }}</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('တိုင်သူ') }}</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('ဌာန') }}</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('အခြေအနေ') }}</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('ကြာချိန်') }}</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('ရက်စွဲ') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('admin.complaints.show', $complaint) }}" class="text-gray-800 dark:text-gray-200 hover:underline">{{ $complaint->title }}</a>
                                    </td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $complaint->user->name }}</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $complaint->department?->name ?? '—' }}</td>
                                    <td class="px-4 py-2"><x-status-badge :status="$complaint->status" /></td>
                                    <td class="px-4 py-2">
                                        @if ($complaint->status->value !== 'resolved')
                                            <x-aging-badge :complaint="$complaint" />
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500">—</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-gray-500 dark:text-gray-400">{{ $complaint->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-4">{{ $complaints->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
