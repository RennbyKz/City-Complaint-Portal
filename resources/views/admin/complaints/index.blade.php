<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">{{ __('တိုင်ကြားစာများ') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-flash-messages />

            <form method="GET" class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4 flex flex-wrap gap-3 items-end">
                <div>
                    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">{{ __('အခြေအနေ') }}</label>
                    <select name="status" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg shadow-sm text-sm focus:border-blue-900 focus:ring-blue-900/10">
                        <option value="">{{ __('အားလုံး') }}</option>
                        @foreach ($statuses as $s)
                            <option value="{{ $s->value }}" @selected(request('status') === $s->value)>{{ $s->label() }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">{{ __('ဌာန') }}</label>
                    <select name="department_id" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg shadow-sm text-sm focus:border-blue-900 focus:ring-blue-900/10">
                        <option value="">{{ __('အားလုံး') }}</option>
                        @foreach ($departments as $d)
                            <option value="{{ $d->id }}" @selected((string) request('department_id') === (string) $d->id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">{{ __('အမျိုးအစား') }}</label>
                    <select name="category_id" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg shadow-sm text-sm focus:border-blue-900 focus:ring-blue-900/10">
                        <option value="">{{ __('အားလုံး') }}</option>
                        @foreach ($categoryGroups as $group)
                            <optgroup label="{{ $group->label() }}">
                                @foreach ($group->categories as $category)
                                    <option value="{{ $category->id }}" @selected((string) request('category_id') === (string) $category->id)>{{ $category->label() }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <button class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-900 dark:bg-blue-800 text-white text-sm font-medium rounded-lg hover:bg-blue-800 dark:hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" /></svg>
                    {{ __('စစ်ထုတ်မည်') }}
                </button>

                @if (request('status') || request('department_id') || request('category_id'))
                    <a href="{{ route('admin.complaints.index') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:underline">{{ __('ရှင်းလင်းမည်') }}</a>
                @endif
            </form>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl">
                @if ($complaints->isEmpty())
                    <div class="p-12 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" class="w-12 h-12 mx-auto text-gray-300 dark:text-gray-600 mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('တိုင်ကြားစာများ မရှိသေးပါ။') }}</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                            <thead class="bg-gray-50 dark:bg-gray-700/50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('ဓာတ်ပုံ') }}</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('ခေါင်းစဉ်') }}</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('တိုင်သူ') }}</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('ဌာန') }}</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('အခြေအနေ') }}</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('ကြာချိန်') }}</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">{{ __('ရက်စွဲ') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @foreach ($complaints as $complaint)
                                    <tr class="group hover:bg-blue-50/60 dark:hover:bg-gray-700/40 transition-colors">
                                        <td class="px-4 py-3">
                                            <a href="{{ route('admin.complaints.show', $complaint) }}">
                                                @if ($complaint->thumbnailPath())
                                                    <img src="{{ Storage::url($complaint->thumbnailPath()) }}" alt="" class="h-12 w-12 rounded-lg object-cover ring-1 ring-gray-200 dark:ring-gray-600 group-hover:ring-blue-900/40 transition" />
                                                @elseif ($complaint->hasVideoOnly())
                                                    <div class="h-12 w-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-400 dark:text-gray-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-2.834A.75.75 0 0121.5 8.35v7.3a.75.75 0 01-1.03.684L15.75 13.5M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-7.5A2.25 2.25 0 0013.5 6.75h-9A2.25 2.25 0 002.25 9v7.5a2.25 2.25 0 002.25 2.25z" /></svg>
                                                    </div>
                                                @else
                                                    <div class="h-12 w-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-300 dark:text-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M18 12.75h.008v.008H18v-.008zM4.5 3.75h15a1.5 1.5 0 011.5 1.5v13.5a1.5 1.5 0 01-1.5 1.5h-15a1.5 1.5 0 01-1.5-1.5V5.25a1.5 1.5 0 011.5-1.5z" /></svg>
                                                    </div>
                                                @endif
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('admin.complaints.show', $complaint) }}" class="font-medium text-gray-800 dark:text-gray-200 group-hover:text-blue-900 dark:group-hover:text-blue-400 hover:underline">{{ $complaint->title }}</a>
                                            <div class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">{{ $complaint->category->label() }}</div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="text-gray-700 dark:text-gray-300">{{ $complaint->user->name }}</div>
                                            <div class="text-xs text-gray-400 dark:text-gray-500">{{ $complaint->user->phone }}</div>
                                        </td>
                                        <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $complaint->department?->name ?? '—' }}</td>
                                        <td class="px-4 py-3"><x-status-badge :status="$complaint->status" /></td>
                                        <td class="px-4 py-3">
                                            @if ($complaint->status->value !== 'resolved')
                                                <x-aging-badge :complaint="$complaint" />
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500">—</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-gray-500 dark:text-gray-400 whitespace-nowrap">{{ $complaint->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 border-t border-gray-100 dark:border-gray-700">{{ $complaints->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
