<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">{{ $complaint->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-flash-messages />

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <x-status-badge :status="$complaint->status" />
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $complaint->created_at->format('Y-m-d H:i') }}</span>
                </div>

                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-gray-500 dark:text-gray-400">{{ __('တိုင်သူ') }}</dt>
                        <dd class="text-gray-800 dark:text-gray-200">{{ $complaint->user->name }} ({{ $complaint->user->phone }})</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500 dark:text-gray-400">{{ __('အမျိုးအစား') }}</dt>
                        <dd class="text-gray-800 dark:text-gray-200">{{ $complaint->category->label() }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500 dark:text-gray-400">{{ __('တည်နေရာ') }}</dt>
                        <dd class="text-gray-800 dark:text-gray-200">{{ $complaint->location }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500 dark:text-gray-400">{{ __('တာဝန်ရှိဌာန') }}</dt>
                        <dd class="text-gray-800 dark:text-gray-200">{{ $complaint->department?->name ?? __('သတ်မှတ်ရသေးမရှိ') }}</dd>
                    </div>
                </dl>

                <div>
                    <dt class="text-gray-500 dark:text-gray-400 text-sm">{{ __('အသေးစိတ်ဖော်ပြချက်') }}</dt>
                    <dd class="text-gray-800 dark:text-gray-200 mt-1">{{ $complaint->description }}</dd>
                </div>

                @if ($complaint->photo_path)
                    <img src="{{ Storage::url($complaint->photo_path) }}" alt="" class="rounded-md max-h-64" />
                @endif
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ __('ဌာနသို့ လွှဲပြောင်းရန်') }}</h3>
                <form method="POST" action="{{ route('admin.complaints.forward', $complaint) }}" class="flex gap-3 items-end">
                    @csrf
                    @method('PATCH')
                    <select name="department_id" required class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm text-sm flex-1">
                        <option value="">{{ __('ဌာနရွေးပါ') }}</option>
                        @foreach ($departments as $d)
                            <option value="{{ $d->id }}" @selected($complaint->department_id === $d->id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                    <x-primary-button>{{ __('လွှဲပြောင်းမည်') }}</x-primary-button>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ __('အခြေအနေ မှတ်တမ်း') }}</h3>
                <ol class="relative border-s border-gray-200 dark:border-gray-700 ms-3 space-y-6">
                    @foreach ($complaint->statusLogs as $log)
                        <li class="ms-4">
                            <div class="absolute w-2.5 h-2.5 bg-gray-400 dark:bg-gray-500 rounded-full mt-1.5 -start-1.25"></div>
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
    </div>
</x-app-layout>
