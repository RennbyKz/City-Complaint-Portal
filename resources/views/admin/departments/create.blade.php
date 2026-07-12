<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">{{ __('ဌာနအသစ် ဖန်တီးရန်') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.departments.store') }}"
                    x-data="{
                        districts: {{ Illuminate\Support\Js::from($districts) }},
                        district: '{{ old('district') }}',
                        township: '{{ old('township') }}',
                        get townships() { return this.district ? this.districts[this.district] ?? [] : []; },
                    }">
                    @csrf

                    <div>
                        <x-input-label for="district" value="{{ __('ခရိုင်ရွေးချယ်ရန်') }}" />
                        <select id="district" name="district" x-model="district" @change="township = ''"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm">
                            <option value="">{{ __('ရွေးပါ') }}</option>
                            <template x-for="d in Object.keys(districts)" :key="d">
                                <option :value="d" x-text="d" :selected="d === district"></option>
                            </template>
                        </select>
                        <x-input-error :messages="$errors->get('district')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="township" value="{{ __('မြို့နယ်ရွေးချယ်ရန်') }}" />
                        <select id="township" name="township" x-model="township" :disabled="! district"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm disabled:opacity-50">
                            <option value="">{{ __('ရွေးပါ') }}</option>
                            <template x-for="t in townships" :key="t">
                                <option :value="t" x-text="t" :selected="t === township"></option>
                            </template>
                        </select>
                        <x-input-error :messages="$errors->get('township')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="name" value="{{ __('ဌာနအမည်') }}" />
                        <x-text-input id="name" name="name" class="block mt-1 w-full" :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="flex justify-end mt-6">
                        <x-primary-button>{{ __('ဖန်တီးမည်') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
