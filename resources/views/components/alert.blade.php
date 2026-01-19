<div id="notification-stack" class="notification-stack">
    @php
        $notifications = [];

        if (session('success')) {
            $notifications[] = ['type' => 'success', 'message' => session('success')];
        }
        if (session('warning')) {
            $notifications[] = ['type' => 'warning', 'message' => session('warning')];
        }
        if (session('danger')) {
            $notifications[] = ['type' => 'danger', 'message' => session('danger')];
        }
        if (session('error')) {
            $notifications[] = ['type' => 'danger', 'message' => session('error')];
        }
    @endphp

    @foreach ($notifications as $note)
        <div class="alert alert-important alert-{{ $note['type'] }} alert-dismissible shadow-lg notification-item">

            <div class="d-flex align-items-start gap-2">

                <div class="alert-icon mt-1">
                    @if ($note['type'] === 'success')
                        <x-icon name="check" />
                    @elseif ($note['type'] === 'warning')
                        <x-icon name="alert-triangle" />
                    @elseif ($note['type'] === 'danger')
                        <x-icon name="x" />
                    @endif
                </div>

                <div class="flex-fill">
                    <h4 class="alert-heading mb-1 text-capitalize">
                        {{ $note['type'] }}
                    </h4>
                    <div class="alert-description">
                        {{ $note['message'] }}
                    </div>
                </div>

                <a class="btn-close" data-bs-dismiss="alert"></a>

            </div>
        </div>
    @endforeach
</div>
<style>
    /* Stack container */
    .notification-stack {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1080;
        display: flex;
        flex-direction: column;
        gap: 12px;
        min-width: 320px;
        max-width: 420px;
    }

    /* Each notification */
    .notification-item {
        animation: slideInRight 0.4s ease forwards;
    }

    /* Slide in */
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(120%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Slide out */
    .alert-hide {
        animation: slideOutRight 0.5s ease forwards;
    }

    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }

        to {
            opacity: 0;
            transform: translateX(120%);
        }
    }
</style>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.notification-item');

            alerts.forEach(function(alertEl, index) {

                // Delay each slightly so they feel stacked nicely
                setTimeout(function() {

                    // Auto close after 4 seconds
                    setTimeout(function() {

                        // Play hide animation
                        alertEl.classList.add('alert-hide');

                        // Remove after animation
                        setTimeout(function() {
                            alertEl.remove();
                        }, 500);

                    }, 4000);

                }, index * 150); // small stagger when showing
            });
        });
    </script>
@endpush
