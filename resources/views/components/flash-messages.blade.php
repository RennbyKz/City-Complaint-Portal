@if (session('status'))
    <div class="mb-4 px-4 py-3 rounded-md bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-300 text-sm">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 px-4 py-3 rounded-md bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-300 text-sm">
        {{ session('error') }}
    </div>
@endif
