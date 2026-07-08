<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">ဌာနဝန်ထမ်း အကောင့်အသစ် ဖန်တီးရန်</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.officers.store') }}">
                    @csrf

                    <x-input-label for="name" value="အမည်" />
                    <x-text-input id="name" name="name" class="block mt-1 w-full" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <div class="mt-4">
                        <x-input-label for="email" value="အီးမေးလ်" />
                        <x-text-input id="email" name="email" type="email" class="block mt-1 w-full" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="department_id" value="ဌာန" />
                        <select id="department_id" name="department_id" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">ရွေးပါ</option>
                            @foreach ($departments as $d)
                                <option value="{{ $d->id }}" @selected(old('department_id') == $d->id)>{{ $d->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" value="စကားဝှက်" />
                        <x-text-input id="password" name="password" type="password" class="block mt-1 w-full" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password_confirmation" value="စကားဝှက် အတည်ပြုပါ" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full" required />
                    </div>

                    <div class="flex justify-end mt-6">
                        <x-primary-button>ဖန်တီးမည်</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
