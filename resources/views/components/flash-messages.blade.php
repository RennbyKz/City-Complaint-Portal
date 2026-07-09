@if (session('status'))
    <script>(window.__pendingToasts = window.__pendingToasts || []).push({ icon: 'success', message: @json(session('status')) });</script>
@endif

@if (session('error'))
    <script>(window.__pendingToasts = window.__pendingToasts || []).push({ icon: 'error', message: @json(session('error')) });</script>
@endif
