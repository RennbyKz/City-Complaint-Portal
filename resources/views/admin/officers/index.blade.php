<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">ဌာနဝန်ထမ်းများ</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-flash-messages />

            <div class="flex justify-end">
                <a href="{{ route('admin.officers.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">
                    ဝန်ထမ်းအကောင့်အသစ် ဖန်တီးရန်
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-500">အမည်</th>
                            <th class="px-4 py-2 text-left text-gray-500">အီးမေးလ်</th>
                            <th class="px-4 py-2 text-left text-gray-500">ဌာန</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($officers as $officer)
                            <tr>
                                <td class="px-4 py-2 text-gray-800">{{ $officer->name }}</td>
                                <td class="px-4 py-2 text-gray-600">{{ $officer->email }}</td>
                                <td class="px-4 py-2 text-gray-600">{{ $officer->department?->name ?? '—' }}</td>
                                <td class="px-4 py-2 text-right">
                                    <a href="{{ route('admin.officers.edit', $officer) }}" class="text-indigo-600 hover:underline">ပြင်ဆင်ရန်</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4">{{ $officers->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
