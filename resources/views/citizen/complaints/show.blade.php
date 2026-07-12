<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ $complaint->title }}
        </h2>
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

                <x-attachment-gallery :complaint="$complaint" />

                @if ($complaint->resolution_photo_path)
                    <div>
                        <dt class="text-gray-500 dark:text-gray-400 text-sm mb-1">{{ __('သက်သေဓာတ်ပုံ (ပြင်ဆင်ပြီး)') }}</dt>
                        <img src="{{ Storage::url($complaint->resolution_photo_path) }}" alt="" class="rounded-md max-h-64" />
                    </div>
                @endif

                <x-location-map :complaint="$complaint" />
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

            @if ($complaint->status->value === 'resolved')
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ __('ကျေနပ်မှုအဆင့် သတ်မှတ်ရန်') }}</h3>
                    @if ($complaint->rating)
                        <p class="text-gray-600 dark:text-gray-400">{{ __('သင် :score ကြယ်ပွင့် ပေးထားပါပြီ။', ['score' => $complaint->rating->score]) }}</p>
                        @if ($complaint->rating->comment)
                            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">"{{ $complaint->rating->comment }}"</p>
                        @endif
                    @else
                        <form method="POST" action="{{ route('citizen.complaints.rating.store', $complaint) }}">
                            @csrf
                            <div class="flex gap-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="score" value="{{ $i }}" class="sr-only peer" required>
                                        <span class="text-2xl text-gray-300 dark:text-gray-600 peer-checked:text-amber-400">★</span>
                                    </label>
                                @endfor
                            </div>
                            <x-input-error :messages="$errors->get('score')" class="mt-2" />

                            <textarea name="comment" rows="2" placeholder="{{ __('မှတ်ချက် (မလိုအပ်ပါ)') }}"
                                class="block mt-3 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>

                            <div class="mt-3">
                                <x-primary-button>{{ __('အဆင့်သတ်မှတ်မည်') }}</x-primary-button>
                            </div>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>

    @vite(['resources/js/location-picker.js'])
</x-app-layout>
