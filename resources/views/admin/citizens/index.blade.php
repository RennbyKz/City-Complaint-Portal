<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">ပြည်သူအကောင့်များ</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-flash-messages />

            <div class="flex gap-2">
                @foreach (['' => 'အားလုံး', 'pending' => 'အတည်ပြုရန်စောင့်နေ', 'active' => 'အသက်ဝင်နေသော', 'blocked' => 'ပိတ်ထားသော'] as $value => $label)
                    <a href="{{ route('admin.citizens.index', $value ? ['status' => $value] : []) }}"
                        class="px-3 py-1.5 rounded-md text-sm {{ $status === $value || (! $status && $value === '') ? 'bg-gray-800 text-white' : 'bg-white text-gray-600 border border-gray-200' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($citizens->isEmpty())
                    <p class="p-6 text-gray-500">အကောင့်များ မရှိသေးပါ။</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-500">အမည်</th>
                                <th class="px-4 py-2 text-left text-gray-500">ဖုန်း</th>
                                <th class="px-4 py-2 text-left text-gray-500">မှတ်ပုံတင်</th>
                                <th class="px-4 py-2 text-left text-gray-500">အခြေအနေ</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($citizens as $citizen)
                                <tr>
                                    <td class="px-4 py-2 text-gray-800">{{ $citizen->name }}</td>
                                    <td class="px-4 py-2 text-gray-600">{{ $citizen->phone }}</td>
                                    <td class="px-4 py-2 text-gray-600">{{ $citizen->nrc_number }}</td>
                                    <td class="px-4 py-2 text-gray-600">{{ $citizen->status->value }}</td>
                                    <td class="px-4 py-2 text-right space-x-2 whitespace-nowrap">
                                        @if ($citizen->status->value === 'pending')
                                            <form method="POST" action="{{ route('admin.citizens.approve', $citizen) }}" class="inline">
                                                @csrf @method('PATCH')
                                                <button class="text-green-600 hover:underline">အတည်ပြုမည်</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.citizens.reject', $citizen) }}" class="inline">
                                                @csrf @method('PATCH')
                                                <button class="text-red-600 hover:underline">ငြင်းပယ်မည်</button>
                                            </form>
                                        @elseif ($citizen->status->value === 'active')
                                            <form method="POST" action="{{ route('admin.citizens.block', $citizen) }}" class="inline">
                                                @csrf @method('PATCH')
                                                <button class="text-red-600 hover:underline">ပိတ်မည်</button>
                                            </form>
                                        @elseif ($citizen->status->value === 'blocked')
                                            <form method="POST" action="{{ route('admin.citizens.unblock', $citizen) }}" class="inline">
                                                @csrf @method('PATCH')
                                                <button class="text-green-600 hover:underline">ပြန်ဖွင့်မည်</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-4">{{ $citizens->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
