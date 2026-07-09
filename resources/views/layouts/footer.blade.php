<footer class="border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="{{ __(config('app.name')) }}" class="h-6 w-6 rounded-full object-contain bg-white ring-1 ring-gray-200 dark:ring-gray-600" />
            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ __(config('app.name')) }}</span>
        </div>

        <p class="text-xs text-gray-400 dark:text-gray-500 text-center">
            &copy; {{ date('Y') }} {{ __(config('app.name')) }}. {{ __('မူပိုင်ခွင့် ရယူပြီးဖြစ်သည်') }}
            &middot; {{ __('အားလုံးအတွက် ပွင့်လင်းမြင်သာသော မြို့တော်စီမံခန့်ခွဲမှု') }}
        </p>
    </div>
</footer>
