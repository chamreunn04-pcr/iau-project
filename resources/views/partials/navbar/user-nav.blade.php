<header class="navbar navbar-expand-md d-print-none sticky-top">
    <div class="container-xl">
        <!-- BEGIN NAVBAR TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- END NAVBAR TOGGLER -->
        <!-- BEGIN NAVBAR LOGO -->
        <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="." aria-label="Tabler">
                <img src="{{ asset('favicon.ico') }}" style="max-width: 35px;" alt="">
            </a>
        </div>
        <!-- END NAVBAR LOGO -->
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <div class="nav-item">
                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" aria-label="Enable dark mode"
                        data-bs-original-title="Enable dark mode">
                        <x-icon name="moon" />
                    </a>
                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" aria-label="Enable light mode"
                        data-bs-original-title="Enable light mode">
                        <x-icon name="sun" />
                    </a>
                </div>
                <div class="nav-item d-none d-md-flex">
                    <a href="{{ route('settings') }}" class="nav-link {{ active_class('settings', 'active bg-primary-lt') }} px-0" tabindex="-1"
                        aria-label="Show notifications" aria-expanded="false">
                        <x-icon name="settings" />
                    </a>
                </div>
                {{-- Language Switch --}}
                <div class="nav-item dropdown me-2">
                    <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown">
                        @if (app()->getLocale() == 'en')
                            <span class="flag flag-country-us me-2" style="width: 20px; height: 18px;"></span> English
                        @else
                            <span class="flag flag-country-kh me-2" style="width: 20px; height: 18px;"></span> ខ្មែរ
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('lang/en') }}">
                            <span class="flag flag-country-us me-2" style="width: 20px; height: 18px;"></span>
                            English
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('lang/km') }}">
                            <span class="flag flag-country-kh me-2" style="width: 20px; height: 18px;"></span> ខ្មែរ
                        </a>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(./static/avatars/003m.jpg)"> </span>
                    <div class="d-none d-xl-block ps-2">
                        @auth
                            <div>{{ auth()->user()->name }}</div>

                            @foreach (auth()->user()->roles as $role)
                                <div class="mt-1 small text-secondary-fg bg-{{ $role->color }} p-1 rounded text-center">
                                    {{ ucfirst($role->name) }}
                                </div>
                            @endforeach
                        @endauth
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Status</a>
                    <a href="./profile.html" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Feedback</a>
                    <div class="dropdown-divider"></div>
                    <a href="./settings.html" class="dropdown-item">Settings</a>
                    <a href="{{ route('user.logout') }}" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>

    </div>
</header>
