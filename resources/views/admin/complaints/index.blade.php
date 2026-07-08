<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">တိုင်ကြားစာများ</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="GET" class="bg-white shadow-sm sm:rounded-lg p-4 flex flex-wrap gap-3 items-end">
                <div>
                    <label class="block text-xs text-gray-500 mb-1">အခြေအနေ</label>
                    <select name="status" class="border-gray-300 rounded-md shadow-sm text-sm">
                        <option value="">အားလုံး</option>
                        @foreach ($statuses as $s)
                            <option value="{{ $s->value }}" @selected(request('status') === $s->value)>{{ $s->label() }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">ဌာန</label>
                    <select name="department_id" class="border-gray-300 rounded-md shadow-sm text-sm">
                        <option value="">အားလုံး</option>
                        @foreach ($departments as $d)
                            <option value="{{ $d->id }}" @selected((string) request('department_id') === (string) $d->id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="px-4 py-2 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">စစ်ထုတ်မည်</button>
            </form>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($complaints->isEmpty())
                    <p class="p-6 text-gray-500">တိုင်ကြားစာများ မရှိသေးပါ။</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-500">ခေါင်းစဉ်</th>
                                <th class="px-4 py-2 text-left text-gray-500">တိုင်သူ</th>
                                <th class="px-4 py-2 text-left text-gray-500">ဌာန</th>
                                <th class="px-4 py-2 text-left text-gray-500">အခြေအနေ</th>
                                <th class="px-4 py-2 text-left text-gray-500">ကြာချိန်</th>
                                <th class="px-4 py-2 text-left text-gray-500">ရက်စွဲ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('admin.complaints.show', $complaint) }}" class="text-gray-800 hover:underline">{{ $complaint->title }}</a>
                                    </td>
                                    <td class="px-4 py-2 text-gray-600">{{ $complaint->user->name }}</td>
                                    <td class="px-4 py-2 text-gray-600">{{ $complaint->department?->name ?? '—' }}</td>
                                    <td class="px-4 py-2"><x-status-badge :status="$complaint->status" /></td>
                                    <td class="px-4 py-2">
                                        @if ($complaint->status->value !== 'resolved')
                                            <x-aging-badge :complaint="$complaint" />
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-gray-500">{{ $complaint->created_at->format('Y-m-d') }}</td>
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
