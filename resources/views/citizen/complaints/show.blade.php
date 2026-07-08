<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $complaint->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-flash-messages />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <x-status-badge :status="$complaint->status" />
                    <span class="text-sm text-gray-500">{{ $complaint->created_at->format('Y-m-d H:i') }}</span>
                </div>

                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-gray-500">အမျိုးအစား</dt>
                        <dd class="text-gray-800">{{ $complaint->category->label() }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">တည်နေရာ</dt>
                        <dd class="text-gray-800">{{ $complaint->location }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">တာဝန်ရှိဌာန</dt>
                        <dd class="text-gray-800">{{ $complaint->department?->name ?? 'သတ်မှတ်ရသေးမရှိ' }}</dd>
                    </div>
                </dl>

                <div>
                    <dt class="text-gray-500 text-sm">အသေးစိတ်ဖော်ပြချက်</dt>
                    <dd class="text-gray-800 mt-1">{{ $complaint->description }}</dd>
                </div>

                @if ($complaint->photo_path)
                    <div>
                        <dt class="text-gray-500 text-sm mb-1">ဓာတ်ပုံ</dt>
                        <img src="{{ Storage::url($complaint->photo_path) }}" alt="" class="rounded-md max-h-64" />
                    </div>
                @endif

                @if ($complaint->resolution_photo_path)
                    <div>
                        <dt class="text-gray-500 text-sm mb-1">သက်သေဓာတ်ပုံ (ပြင်ဆင်ပြီး)</dt>
                        <img src="{{ Storage::url($complaint->resolution_photo_path) }}" alt="" class="rounded-md max-h-64" />
                    </div>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">အခြေအနေ မှတ်တမ်း</h3>
                <ol class="relative border-s border-gray-200 ms-3 space-y-6">
                    @foreach ($complaint->statusLogs as $log)
                        <li class="ms-4">
                            <div class="absolute w-2.5 h-2.5 bg-gray-400 rounded-full mt-1.5 -start-1.25"></div>
                            <time class="text-xs text-gray-400">{{ $log->created_at->format('Y-m-d H:i') }}</time>
                            <p class="text-sm text-gray-700">{{ $log->status->label() }}{{ $log->notes ? " — {$log->notes}" : '' }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>

            @if ($complaint->status->value === 'resolved')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">ကျေနပ်မှုအဆင့် သတ်မှတ်ရန်</h3>
                    @if ($complaint->rating)
                        <p class="text-gray-600">သင် {{ $complaint->rating->score }} ကြယ်ပွင့် ပေးထားပါပြီ။</p>
                        @if ($complaint->rating->comment)
                            <p class="text-gray-500 text-sm mt-1">"{{ $complaint->rating->comment }}"</p>
                        @endif
                    @else
                        <form method="POST" action="{{ route('citizen.complaints.rating.store', $complaint) }}">
                            @csrf
                            <div class="flex gap-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="score" value="{{ $i }}" class="sr-only peer" required>
                                        <span class="text-2xl text-gray-300 peer-checked:text-amber-400">★</span>
                                    </label>
                                @endfor
                            </div>
                            <x-input-error :messages="$errors->get('score')" class="mt-2" />

                            <textarea name="comment" rows="2" placeholder="မှတ်ချက် (မလိုအပ်ပါ)"
                                class="block mt-3 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>

                            <div class="mt-3">
                                <x-primary-button>အဆင့်သတ်မှတ်မည်</x-primary-button>
                            </div>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
