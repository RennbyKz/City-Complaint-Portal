<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">{{ __('ပြည်သူအကောင့်များ') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-flash-messages />

            <div class="flex gap-2">
                @foreach (['' => __('အားလုံး'), 'pending' => __('အတည်ပြုရန်စောင့်နေ'), 'active' => __('အသက်ဝင်နေသော'), 'blocked' => __('ပိတ်ထားသော')] as $value => $label)
                    <a href="{{ route('admin.citizens.index', $value ? ['status' => $value] : []) }}"
                        class="px-3 py-1.5 rounded-md text-sm {{ $status === $value || (! $status && $value === '') ? 'bg-gray-800 dark:bg-gray-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($citizens->isEmpty())
                    <p class="p-6 text-gray-500 dark:text-gray-400">{{ __('အကောင့်များ မရှိသေးပါ။') }}</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('အမည်') }}</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('ဖုန်း') }}</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('မှတ်ပုံတင်') }}</th>
                                <th class="px-4 py-2 text-left text-gray-500 dark:text-gray-400">{{ __('အခြေအနေ') }}</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @foreach ($citizens as $citizen)
                                <tr>
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $citizen->name }}</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $citizen->phone }}</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $citizen->nrc_number }}</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $citizen->status->label() }}</td>
                                    <td class="px-4 py-2 text-right space-x-2 whitespace-nowrap">
                                        @if ($citizen->status->value === 'pending')
                                            <form method="POST" action="{{ route('admin.citizens.approve', $citizen) }}" class="inline">
                                                @csrf @method('PATCH')
                                                <button class="text-green-600 dark:text-green-400 hover:underline">{{ __('အတည်ပြုမည်') }}</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.citizens.reject', $citizen) }}" class="inline"
                                                data-confirm="{{ __(':name ၏ အကောင့်လျှောက်ထားမှုကို ငြင်းပယ်မှာ သေချာပါသလား?', ['name' => $citizen->name]) }}"
                                                data-confirm-title="{{ __('အကောင့် ငြင်းပယ်ရန်') }}"
                                                data-confirm-button="{{ __('ငြင်းပယ်မည်') }}"
                                                data-cancel-button="{{ __('ပယ်ဖျက်မည်') }}"
                                                data-confirm-icon="warning">
                                                @csrf @method('PATCH')
                                                <button class="text-red-600 dark:text-red-400 hover:underline">{{ __('ငြင်းပယ်မည်') }}</button>
                                            </form>
                                        @elseif ($citizen->status->value === 'active')
                                            <form method="POST" action="{{ route('admin.citizens.block', $citizen) }}" class="inline"
                                                data-confirm="{{ __(':name ၏ အကောင့်ကို ပိတ်မှာ သေချာပါသလား?', ['name' => $citizen->name]) }}"
                                                data-confirm-title="{{ __('အကောင့် ပိတ်ရန်') }}"
                                                data-confirm-button="{{ __('ပိတ်မည်') }}"
                                                data-cancel-button="{{ __('ပယ်ဖျက်မည်') }}"
                                                data-confirm-icon="warning">
                                                @csrf @method('PATCH')
                                                <button class="text-red-600 dark:text-red-400 hover:underline">{{ __('ပိတ်မည်') }}</button>
                                            </form>
                                        @elseif ($citizen->status->value === 'blocked')
                                            <form method="POST" action="{{ route('admin.citizens.unblock', $citizen) }}" class="inline">
                                                @csrf @method('PATCH')
                                                <button class="text-green-600 dark:text-green-400 hover:underline">{{ __('ပြန်ဖွင့်မည်') }}</button>
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
