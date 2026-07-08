<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">လစဉ် အစီရင်ခံစာ</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="GET" action="{{ route('admin.reports.download') }}" class="flex gap-3 items-end">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">နှစ်</label>
                        <input type="number" name="year" value="{{ $year }}" class="border-gray-300 rounded-md shadow-sm text-sm w-28">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">လ</label>
                        <select name="month" class="border-gray-300 rounded-md shadow-sm text-sm">
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}" @selected($m === $month)>{{ $m }}</option>
                            @endfor
                        </select>
                    </div>
                    <button class="px-4 py-2 bg-gray-800 text-white text-sm rounded-md hover:bg-gray-700">PDF ထုတ်ယူမည်</button>
                </form>
            </div>

            @if ($files->isNotEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">ယခင်ထုတ်ယူထားသော အစီရင်ခံစာများ</h3>
                    <ul class="text-sm space-y-1">
                        @foreach ($files as $file)
                            <li><a href="{{ Storage::url($file) }}" class="text-indigo-600 hover:underline">{{ basename($file) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
