<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('တိုင်ကြားစာအသစ်တင်ရန်') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <x-flash-messages />

                <form method="POST" action="{{ route('citizen.complaints.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="title" value="{{ __('ခေါင်းစဉ်') }}" />
                        <x-text-input id="title" name="title" class="block mt-1 w-full" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category_id" value="{{ __('အမျိုးအစား') }}" />
                        <select id="category_id" name="category_id" required
                            class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">{{ __('ရွေးပါ') }}</option>
                            @foreach ($categoryGroups as $group)
                                <optgroup label="{{ $group->label() }}">
                                    @foreach ($group->categories as $category)
                                        <option value="{{ $category->id }}" @selected((string) old('category_id') === (string) $category->id)>
                                            {{ $category->label() }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="location" value="{{ __('တည်နေရာ / မှတ်တိုင်') }}" />
                        <x-text-input id="location" name="location" class="block mt-1 w-full" :value="old('location')" required />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label value="{{ __('မြေပုံပေါ်တွင် တည်နေရာညွှန်ပြရန် (မလိုအပ်ပါ)') }}" />
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5 mb-1.5">{{ __('တည်နေရာကို သေချာစွာညွှန်ပြလိုပါက မြေပုံပေါ်တွင် နှိပ်ပါ။') }}</p>
                        <div id="complaint-location-map" class="location-picker-map h-64 rounded-md ring-1 ring-gray-200 dark:ring-gray-600"
                            data-lat-input="latitude" data-lng-input="longitude"></div>
                        <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
                        <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">
                        <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" value="{{ __('အသေးစိတ်ဖော်ပြချက်') }}" />
                        <textarea id="description" name="description" rows="5" required
                            class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mt-4" x-data="{ files: [] }">
                        <x-input-label value="{{ __('ဓာတ်ပုံ သို့မဟုတ် ဗီဒီယို — အများဆုံး ၅ ခု (မလိုအပ်ပါ)') }}" />

                        <label for="attachments"
                            class="mt-1 flex items-center justify-center gap-2 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-5 cursor-pointer hover:border-blue-900 dark:hover:border-blue-400 transition text-sm text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l-3.75 3.75M12 9.75l3.75 3.75M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                            </svg>
                            <span x-text="files.length ? `${files.length} {{ __('ဖိုင်ရွေးထားသည်') }}` : '{{ __('ဖိုင်ရွေးရန် နှိပ်ပါ') }}'"></span>
                        </label>
                        <input id="attachments" name="attachments[]" type="file" accept="image/*,video/*" multiple class="hidden"
                            @change="files = Array.from($event.target.files)">

                        <div class="mt-3 grid grid-cols-3 sm:grid-cols-5 gap-2" x-show="files.length > 0" x-cloak>
                            <template x-for="(file, index) in files" :key="index">
                                <div class="relative rounded-lg overflow-hidden ring-1 ring-gray-200 dark:ring-gray-600 aspect-square bg-gray-50 dark:bg-gray-700 flex items-center justify-center">
                                    <template x-if="file.type.startsWith('image/')">
                                        <img :src="URL.createObjectURL(file)" class="w-full h-full object-cover">
                                    </template>
                                    <template x-if="file.type.startsWith('video/')">
                                        <div class="flex flex-col items-center text-gray-400 dark:text-gray-500 text-xs px-1 gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-2.834A.75.75 0 0121.5 8.35v7.3a.75.75 0 01-1.03.684L15.75 13.5M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-7.5A2.25 2.25 0 0013.5 6.75h-9A2.25 2.25 0 002.25 9v7.5a2.25 2.25 0 002.25 2.25z" />
                                            </svg>
                                            <span class="truncate w-full text-center" x-text="file.name"></span>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>

                        <x-input-error :messages="$errors->get('attachments')" class="mt-2" />
                        <x-input-error :messages="$errors->get('attachments.0')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button>{{ __('တင်သွင်းမည်') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @vite(['resources/js/location-picker.js'])
</x-app-layout>
