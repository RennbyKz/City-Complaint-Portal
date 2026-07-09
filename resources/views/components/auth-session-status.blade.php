@props(['status'])

@if ($status)
    <script>(window.__pendingToasts = window.__pendingToasts || []).push({ icon: 'success', message: @json($status) });</script>
@endif
