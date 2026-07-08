<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __(config('app.name', 'Laravel')) }}</title>

        @include('partials.theme-init')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/7.5.0/css/flag-icons.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <x-locale-loading-overlay />

        <div class="min-h-screen grid lg:grid-cols-2 bg-gray-50 dark:bg-gray-900">
            <!-- Brand panel -->
            <div class="relative hidden lg:flex flex-col justify-between overflow-hidden p-12 text-white bg-cover bg-center" style="background-image: url('{{ asset('images/background.jpg') }}')">
                <!-- legibility overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-950/95 via-blue-900/85 to-blue-950/95"></div>

                <div class="relative z-10 flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ __(config('app.name')) }}" class="w-14 h-14 rounded-full ring-2 ring-white/40 shadow-lg object-contain bg-white" />
                    <span class="text-lg font-semibold tracking-tight">{{ __(config('app.name')) }}</span>
                </div>

                <div class="relative z-10 max-w-md">
                    <h1 class="text-4xl font-bold leading-tight mb-4">{{ __('ပြည်သူ့အသံ၊ မြို့တော်၏ တိုးတက်မှု') }}</h1>
                    <p class="text-white/80 text-lg leading-relaxed">{{ __('လမ်းမီးပျက်ခြင်းမှ အမှိုက်ပုံများအထိ — တိုင်ကြားရန် လွယ်ကူပြီး လျင်မြန်စွာ ဖြေရှင်းပေးပါသည်။') }}</p>
                </div>

                <div class="relative z-10 flex items-center gap-2 text-sm text-white/60">
                    <span>&copy; {{ date('Y') }} {{ __(config('app.name')) }}</span>
                    <span>&middot;</span>
                    <span>{{ __('အားလုံးအတွက် ပွင့်လင်းမြင်သာသော မြို့တော်စီမံခန့်ခွဲမှု') }}</span>
                </div>
            </div>

            <!-- Form panel -->
            <div class="flex flex-col min-h-screen">
                <div class="flex items-center justify-between lg:justify-end gap-3 p-6">
                    <a href="/" class="flex items-center gap-2 lg:hidden">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ __(config('app.name')) }}" class="w-9 h-9 rounded-full ring-1 ring-gray-200 dark:ring-gray-600 object-contain bg-white" />
                        <span class="font-semibold text-gray-800 dark:text-gray-100">{{ __(config('app.name')) }}</span>
                    </a>

                    <div class="flex items-center gap-2">
                        <x-locale-switcher />
                        <x-theme-toggle />
                    </div>
                </div>

                <div class="flex-1 flex flex-col items-center justify-center px-6">
                    <div class="w-full sm:max-w-md px-6 py-8 sm:px-8 sm:py-10 bg-white dark:bg-gray-800 shadow-xl shadow-gray-200/60 dark:shadow-none ring-1 ring-gray-900/5 dark:ring-white/10 rounded-2xl">
                        {{ $slot }}
                    </div>
                </div>

                <footer class="text-center text-xs text-gray-400 dark:text-gray-500 py-6 px-6">
                    &copy; {{ date('Y') }} {{ __(config('app.name')) }}. {{ __('မူပိုင်ခွင့် ရယူပြီးဖြစ်သည်') }}
                </footer>
            </div>
        </div>
    </body>
</html>
