@if (session('status'))
    <div class="mb-4 px-4 py-3 rounded-md bg-green-50 text-green-800 text-sm">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 px-4 py-3 rounded-md bg-red-50 text-red-800 text-sm">
        {{ session('error') }}
    </div>
@endif
