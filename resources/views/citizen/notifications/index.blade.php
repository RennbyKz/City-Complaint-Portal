<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('အကြောင်းကြားစာများ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($notifications->isEmpty())
                    <p class="p-6 text-gray-500 dark:text-gray-400">{{ __('အကြောင်းကြားစာများ မရှိသေးပါ။') }}</p>
                @else
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($notifications as $notification)
                            <li class="p-4 flex items-start justify-between gap-4 {{ $notification->read_at ? '' : 'bg-indigo-50 dark:bg-indigo-900/20' }}">
                                <div>
                                    <p class="text-sm text-gray-800 dark:text-gray-200">
                                        @if ($notification->type === \App\Notifications\ComplaintForwarded::class)
                                            {{ __('သင့်တိုင်ကြားစာ ":title" ကို :department ဌာနသို့ လွှဲပြောင်းလိုက်ပါပြီ။', ['title' => $notification->data['title'], 'department' => $notification->data['department_name']]) }}
                                        @elseif ($notification->type === \App\Notifications\ComplaintResolved::class)
                                            {{ __('သင့်တိုင်ကြားစာ ":title" ကို ပြင်ဆင်ပြီးစီးပါပြီ။ ကျေနပ်မှုအဆင့် ပေးပါ။', ['title' => $notification->data['title']]) }}
                                        @endif
                                    </p>
                                    <time class="text-xs text-gray-400 dark:text-gray-500">{{ $notification->created_at->format('Y-m-d H:i') }}</time>
                                </div>
                                @unless ($notification->read_at)
                                    <form method="POST" action="{{ route('citizen.notifications.read', $notification->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline whitespace-nowrap">{{ __('ဖတ်ပြီးပြသမည်') }}</button>
                                    </form>
                                @endunless
                            </li>
                        @endforeach
                    </ul>
                    <div class="p-4">
                        {{ $notifications->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
