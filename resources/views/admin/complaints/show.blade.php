<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('admin.complaints.index') }}" class="inline-flex items-center gap-1 text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    {{ __('တိုင်ကြားစာများ') }}
                </a>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">{{ $complaint->title }}</h2>
            </div>
            <x-status-badge :status="$complaint->status" />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <x-flash-messages />

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                <!-- Main column -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl p-6 space-y-5">
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-sm">
                            <div class="flex items-start gap-3">
                                <div class="shrink-0 flex items-center justify-center w-9 h-9 rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                                </div>
                                <div>
                                    <dt class="text-gray-400 dark:text-gray-500 text-xs">{{ __('တိုင်သူ') }}</dt>
                                    <dd class="text-gray-800 dark:text-gray-200 font-medium">{{ $complaint->user->name }}</dd>
                                    <dd class="text-gray-500 dark:text-gray-400 text-xs">{{ $complaint->user->phone }}</dd>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="shrink-0 flex items-center justify-center w-9 h-9 rounded-lg bg-amber-50 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z M6 6h.008v.008H6V6z" /></svg>
                                </div>
                                <div>
                                    <dt class="text-gray-400 dark:text-gray-500 text-xs">{{ __('အမျိုးအစား') }}</dt>
                                    <dd class="text-gray-800 dark:text-gray-200 font-medium">{{ $complaint->category->label() }}</dd>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="shrink-0 flex items-center justify-center w-9 h-9 rounded-lg bg-red-50 text-red-600 dark:bg-red-900/30 dark:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                </div>
                                <div>
                                    <dt class="text-gray-400 dark:text-gray-500 text-xs">{{ __('တည်နေရာ') }}</dt>
                                    <dd class="text-gray-800 dark:text-gray-200 font-medium">{{ $complaint->location }}</dd>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="shrink-0 flex items-center justify-center w-9 h-9 rounded-lg bg-purple-50 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" /></svg>
                                </div>
                                <div>
                                    <dt class="text-gray-400 dark:text-gray-500 text-xs">{{ __('တာဝန်ရှိဌာန') }}</dt>
                                    <dd class="text-gray-800 dark:text-gray-200 font-medium">{{ $complaint->department?->name ?? __('သတ်မှတ်ရသေးမရှိ') }}</dd>
                                </div>
                            </div>
                        </dl>

                        <div class="pt-4 border-t border-gray-100 dark:border-gray-700">
                            <dt class="text-gray-400 dark:text-gray-500 text-xs mb-1">{{ __('အသေးစိတ်ဖော်ပြချက်') }}</dt>
                            <dd class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">{{ $complaint->description }}</dd>
                        </div>

                        <!-- Photos -->
                        <div class="pt-4 border-t border-gray-100 dark:border-gray-700 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-gray-400 dark:text-gray-500 text-xs mb-2 flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C3.005 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.755-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z" /></svg>
                                    {{ __('တိုင်ကြားသူ တင်ခဲ့သော ဓာတ်ပုံ') }}
                                </dt>
                                @if ($complaint->photo_path)
                                    <a href="{{ Storage::url($complaint->photo_path) }}" target="_blank" rel="noopener" class="block group">
                                        <img src="{{ Storage::url($complaint->photo_path) }}" alt="" class="rounded-lg w-full h-48 object-cover ring-1 ring-gray-200 dark:ring-gray-600 group-hover:opacity-90 transition" />
                                    </a>
                                @else
                                    <div class="h-48 rounded-lg bg-gray-50 dark:bg-gray-700/50 flex flex-col items-center justify-center text-gray-300 dark:text-gray-500 gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M18 12.75h.008v.008H18v-.008zM4.5 3.75h15a1.5 1.5 0 011.5 1.5v13.5a1.5 1.5 0 01-1.5 1.5h-15a1.5 1.5 0 01-1.5-1.5V5.25a1.5 1.5 0 011.5-1.5z" /></svg>
                                        <span class="text-xs">{{ __('ဓာတ်ပုံ မတင်ခဲ့ပါ') }}</span>
                                    </div>
                                @endif
                            </div>

                            <div>
                                <dt class="text-gray-400 dark:text-gray-500 text-xs mb-2 flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
                                    {{ __('ပြင်ဆင်ပြီးကြောင်း သက်သေဓာတ်ပုံ') }}
                                </dt>
                                @if ($complaint->resolution_photo_path)
                                    <a href="{{ Storage::url($complaint->resolution_photo_path) }}" target="_blank" rel="noopener" class="block group">
                                        <img src="{{ Storage::url($complaint->resolution_photo_path) }}" alt="" class="rounded-lg w-full h-48 object-cover ring-1 ring-green-200 dark:ring-green-800 group-hover:opacity-90 transition" />
                                    </a>
                                @else
                                    <div class="h-48 rounded-lg bg-gray-50 dark:bg-gray-700/50 flex flex-col items-center justify-center text-gray-300 dark:text-gray-500 gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>
                                        <span class="text-xs">{{ __('ပြီးစီးခြင်း မရှိသေးပါ') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl p-6">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ __('အခြေအနေ မှတ်တမ်း') }}</h3>
                        <ol class="relative border-s border-gray-200 dark:border-gray-700 ms-3 space-y-6">
                            @foreach ($complaint->statusLogs as $log)
                                <li class="ms-4">
                                    <div class="absolute w-2.5 h-2.5 bg-blue-900 dark:bg-blue-500 rounded-full mt-1.5 -start-1.25"></div>
                                    <time class="text-xs text-gray-400 dark:text-gray-500">{{ $log->created_at->format('Y-m-d H:i') }}</time>
                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                        @if ($log->notes)
                                            {{ __('ဌာနသို့ လွှဲပြောင်းလိုက်ပါပြီ — :department', ['department' => $log->notes]) }}
                                        @else
                                            {{ $log->status->label() }}
                                        @endif
                                    </p>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                <!-- Side column -->
                <div class="space-y-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl p-6">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ __('ဌာနသို့ လွှဲပြောင်းရန်') }}</h3>
                        <form method="POST" action="{{ route('admin.complaints.forward', $complaint) }}" class="space-y-3"
                            data-confirm="{{ __('ဤတိုင်ကြားစာကို ရွေးချယ်ထားသော ဌာနသို့ လွှဲပြောင်းမှာ သေချာပါသလား?') }}"
                            data-confirm-title="{{ __('ဌာနသို့ လွှဲပြောင်းရန်') }}"
                            data-confirm-button="{{ __('လွှဲပြောင်းမည်') }}"
                            data-cancel-button="{{ __('ပယ်ဖျက်မည်') }}"
                            data-confirm-icon="question">
                            @csrf
                            @method('PATCH')
                            <select name="department_id" required class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg shadow-sm text-sm focus:border-blue-900 focus:ring-blue-900/10">
                                <option value="">{{ __('ဌာနရွေးပါ') }}</option>
                                @foreach ($departments as $d)
                                    <option value="{{ $d->id }}" @selected($complaint->department_id === $d->id)>{{ $d->name }}</option>
                                @endforeach
                            </select>
                            <x-primary-button class="w-full justify-center">{{ __('လွှဲပြောင်းမည်') }}</x-primary-button>
                        </form>
                    </div>

                    @if ($complaint->rating)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl p-6">
                            <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-100 mb-3">{{ __('ကျေနပ်မှုအဆင့်') }}</h3>
                            <div class="text-amber-500 dark:text-amber-400 text-lg">{{ str_repeat('★', $complaint->rating->score) }}{{ str_repeat('☆', 5 - $complaint->rating->score) }}</div>
                            @if ($complaint->rating->comment)
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">"{{ $complaint->rating->comment }}"</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
