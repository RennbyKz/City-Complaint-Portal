@props(['complaint'])

@php
    $hasLegacyPhoto = $complaint->photo_path && $complaint->attachments->isEmpty();
@endphp

@if ($hasLegacyPhoto || $complaint->attachments->isNotEmpty())
    <div>
        <dt class="text-gray-500 dark:text-gray-400 text-sm mb-2 flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C3.005 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.755-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z" />
            </svg>
            {{ __('တိုင်ကြားသူ တင်ခဲ့သော ဓာတ်ပုံ/ဗီဒီယို') }}
        </dt>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
            @if ($hasLegacyPhoto)
                <a href="{{ Storage::url($complaint->photo_path) }}" target="_blank" rel="noopener"
                    class="block group aspect-square rounded-lg overflow-hidden ring-1 ring-gray-200 dark:ring-gray-600">
                    <img src="{{ Storage::url($complaint->photo_path) }}" alt="" class="w-full h-full object-cover group-hover:opacity-90 transition" />
                </a>
            @endif

            @foreach ($complaint->attachments as $attachment)
                <div class="aspect-square rounded-lg overflow-hidden ring-1 ring-gray-200 dark:ring-gray-600 bg-black">
                    @if ($attachment->isVideo())
                        <video controls preload="metadata" class="w-full h-full object-cover bg-black">
                            <source src="{{ Storage::url($attachment->path) }}">
                        </video>
                    @else
                        <a href="{{ Storage::url($attachment->path) }}" target="_blank" rel="noopener" class="block w-full h-full group">
                            <img src="{{ Storage::url($attachment->path) }}" alt="" class="w-full h-full object-cover group-hover:opacity-90 transition" />
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
