<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">{{ __('အကောင့်ဖွင့်မည်') }}</h2>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="{{ __('အမည်') }}" />
            <x-auth-text-input id="name" icon="user" class="mt-1.5" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" value="{{ __('ဖုန်းနံပါတ်') }}" />
            <x-auth-text-input id="phone" icon="phone" class="mt-1.5" type="text" name="phone" :value="old('phone')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- NRC Number -->
        <div>
            <x-input-label for="nrc_number" value="{{ __('မှတ်ပုံတင်အမှတ်') }}" />
            <x-auth-text-input id="nrc_number" icon="id" class="mt-1.5" type="text" name="nrc_number" :value="old('nrc_number')" required placeholder="၁၂/ကမတ(နိုင်)၁၂၃၄၅၆" />
            <x-input-error :messages="$errors->get('nrc_number')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="{{ __('အီးမေးလ်') }}" />
            <x-auth-text-input id="email" icon="email" class="mt-1.5" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="{{ __('စကားဝှက်') }}" />

            <x-auth-text-input id="password" icon="password" class="mt-1.5"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" value="{{ __('စကားဝှက် အတည်ပြုပါ') }}" />

            <x-auth-text-input id="password_confirmation" icon="password" class="mt-1.5"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('အကောင့်ဖွင့်မည်') }}
        </x-primary-button>

        <p class="text-center text-sm text-gray-500 dark:text-gray-400">
            {{ __('အကောင့်ရှိပြီးသားလား') }}
            <a href="{{ route('login') }}" class="text-blue-900 dark:text-blue-400 font-medium hover:underline">{{ __('ဝင်ရောက်မည်') }}</a>
        </p>
    </form>
</x-guest-layout>
