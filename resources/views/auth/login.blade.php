<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">{{ __('ဝင်ရောက်မည်') }}</h2>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="{{ __('အီးမေးလ်') }}" />
            <x-auth-text-input id="email" icon="email" class="mt-1.5" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="{{ __('စကားဝှက်') }}" />

            <x-auth-text-input id="password" icon="password" class="mt-1.5"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-blue-900 focus:ring-blue-900/30" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('မှတ်ထားမည်') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-900 dark:text-blue-400 hover:underline focus:outline-none" href="{{ route('password.request') }}">
                    {{ __('စကားဝှက် မေ့နေပါသလား') }}
                </a>
            @endif
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('ဝင်ရောက်မည်') }}
        </x-primary-button>

        @if (Route::has('register'))
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                {{ __('အကောင့်မရှိသေးပါသလား') }}
                <a href="{{ route('register') }}" class="text-blue-900 dark:text-blue-400 font-medium hover:underline">{{ __('အကောင့်ဖွင့်မည်') }}</a>
            </p>
        @endif
    </form>
</x-guest-layout>
