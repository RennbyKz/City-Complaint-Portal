<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            အကြောင်းကြားစာများ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($notifications->isEmpty())
                    <p class="p-6 text-gray-500">အကြောင်းကြားစာများ မရှိသေးပါ။</p>
                @else
                    <ul class="divide-y divide-gray-200">
                        @foreach ($notifications as $notification)
                            <li class="p-4 flex items-start justify-between gap-4 {{ $notification->read_at ? '' : 'bg-indigo-50' }}">
                                <div>
                                    <p class="text-sm text-gray-800">{{ $notification->data['message'] ?? '' }}</p>
                                    <time class="text-xs text-gray-400">{{ $notification->created_at->format('Y-m-d H:i') }}</time>
                                </div>
                                @unless ($notification->read_at)
                                    <form method="POST" action="{{ route('citizen.notifications.read', $notification->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-xs text-indigo-600 hover:underline whitespace-nowrap">ဖတ်ပြီးပြသမည်</button>
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
