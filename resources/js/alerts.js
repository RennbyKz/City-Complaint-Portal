import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Swal = Swal;

function isDark() {
    return document.documentElement.classList.contains('dark');
}

function fireToast(icon, message) {
    if (!message) return;

    Swal.fire({
        toast: true,
        position: 'top-end',
        icon,
        title: message,
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
        background: isDark() ? '#1f2937' : '#ffffff',
        color: isDark() ? '#f3f4f6' : '#1f2937',
        didOpen: (el) => {
            el.addEventListener('mouseenter', Swal.stopTimer);
            el.addEventListener('mouseleave', Swal.resumeTimer);
        },
    });
}

window.showToast = fireToast;

document.addEventListener('DOMContentLoaded', () => {
    const queue = window.__pendingToasts || [];
    queue.forEach((t) => fireToast(t.icon, t.message));
    window.__pendingToasts = [];
});

// Any <form data-confirm="..."> is intercepted: shows a SweetAlert2 confirm
// dialog before actually submitting. Configure per-form via data attributes:
// data-confirm-title, data-confirm-button, data-cancel-button, data-confirm-icon.
document.addEventListener('submit', function (e) {
    const form = e.target;

    if (!(form instanceof HTMLFormElement) || !form.dataset.confirm || form.dataset.confirmed) {
        return;
    }

    e.preventDefault();

    Swal.fire({
        title: form.dataset.confirmTitle || 'Are you sure?',
        text: form.dataset.confirm,
        icon: form.dataset.confirmIcon || 'warning',
        showCancelButton: true,
        confirmButtonText: form.dataset.confirmButton || 'Confirm',
        cancelButtonText: form.dataset.cancelButton || 'Cancel',
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        reverseButtons: true,
        background: isDark() ? '#1f2937' : '#ffffff',
        color: isDark() ? '#f3f4f6' : '#1f2937',
    }).then((result) => {
        if (result.isConfirmed) {
            form.dataset.confirmed = 'true';
            form.requestSubmit ? form.requestSubmit() : form.submit();
        }
    });
}, true);
