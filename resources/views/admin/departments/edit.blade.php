<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">{{ __('ဌာန ပြင်ဆင်ရန်') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.departments.update', $department) }}">
                    @csrf
                    @method('PUT')
                    <x-input-label for="name" value="{{ __('ဌာနအမည်') }}" />
                    <x-text-input id="name" name="name" class="block mt-1 w-full" :value="old('name', $department->name)" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <div class="flex justify-end mt-6">
                        <x-primary-button>{{ __('သိမ်းဆည်းမည်') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
