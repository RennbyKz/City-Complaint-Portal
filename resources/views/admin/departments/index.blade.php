<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">ဌာနများ</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-flash-messages />

            <div class="flex justify-end">
                <a href="{{ route('admin.departments.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">
                    ဌာနအသစ် ဖန်တီးရန်
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-500">ဌာနအမည်</th>
                            <th class="px-4 py-2 text-left text-gray-500">ဝန်ထမ်းအရေအတွက်</th>
                            <th class="px-4 py-2 text-left text-gray-500">တိုင်ကြားစာအရေအတွက်</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($departments as $department)
                            <tr>
                                <td class="px-4 py-2 text-gray-800">{{ $department->name }}</td>
                                <td class="px-4 py-2 text-gray-600">{{ $department->users_count }}</td>
                                <td class="px-4 py-2 text-gray-600">{{ $department->complaints_count }}</td>
                                <td class="px-4 py-2 text-right">
                                    <a href="{{ route('admin.departments.edit', $department) }}" class="text-indigo-600 hover:underline">ပြင်ဆင်ရန်</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
