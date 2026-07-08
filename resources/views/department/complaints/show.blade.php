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
                </dl>

                <div>
                    <dt class="text-gray-500 dark:text-gray-400 text-sm">{{ __('အသေးစိတ်ဖော်ပြချက်') }}</dt>
                    <dd class="text-gray-800 dark:text-gray-200 mt-1">{{ $complaint->description }}</dd>
                </div>

                @if ($complaint->photo_path)
                    <img src="{{ Storage::url($complaint->photo_path) }}" alt="" class="rounded-md max-h-64" />
                @endif
            </div>

            @if ($complaint->status->value === 'pending')
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form method="POST" action="{{ route('department.complaints.start', $complaint) }}">
                        @csrf
                        @method('PATCH')
                        <x-primary-button>{{ __('ဆောင်ရွက်နေဆဲ အဖြစ် ပြောင်းလဲမည်') }}</x-primary-button>
                    </form>
                </div>
            @elseif ($complaint->status->value === 'in_progress')
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ __('ပြင်ဆင်ပြီးစီးကြောင်း တင်ပြရန်') }}</h3>
                    <form method="POST" action="{{ route('department.complaints.resolve', $complaint) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <x-input-label for="resolution_photo" value="{{ __('သက်သေဓာတ်ပုံ') }}" />
                        <input id="resolution_photo" name="resolution_photo" type="file" accept="image/*" required class="block mt-1 w-full text-sm text-gray-600 dark:text-gray-400" />
                        <x-input-error :messages="$errors->get('resolution_photo')" class="mt-2" />

                        <div class="mt-4">
                            <x-primary-button>{{ __('ပြီးစီးကြောင်း သတ်မှတ်မည်') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            @endif

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
