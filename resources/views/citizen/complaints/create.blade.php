<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            တိုင်ကြားစာအသစ်တင်ရန်
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <x-flash-messages />

                <form method="POST" action="{{ route('citizen.complaints.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="title" value="ခေါင်းစဉ်" />
                        <x-text-input id="title" name="title" class="block mt-1 w-full" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" value="အမျိုးအစား" />
                        <select id="category" name="category" required
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach ($categories as $category)
                                <option value="{{ $category->value }}" @selected(old('category') === $category->value)>
                                    {{ $category->label() }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="location" value="တည်နေရာ / မှတ်တိုင်" />
                        <x-text-input id="location" name="location" class="block mt-1 w-full" :value="old('location')" required />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" value="အသေးစိတ်ဖော်ပြချက်" />
                        <textarea id="description" name="description" rows="5" required
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="photo" value="ဓာတ်ပုံ (မလိုအပ်ပါ)" />
                        <input id="photo" name="photo" type="file" accept="image/*" class="block mt-1 w-full text-sm text-gray-600" />
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button>တင်သွင်းမည်</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
