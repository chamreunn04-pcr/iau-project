@extends('layouts.auth')

@section('content')
    <div
        class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center order-last">
        <div class="container container-tight my-5 px-lg-5">
            <div class="text-center mb-4">
                <!-- BEGIN NAVBAR LOGO -->
                <a href="." aria-label="Tabler" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('favicon.ico') }}" width="100" alt="">
                </a>
            </div>
            <h2 class="h3 text-center mb-3">{{ __('app.login.title') }}</h2>
            <form action="{{ route('user.login') }}" method="post" autocomplete="off" novalidate="">
                @csrf
                <div class="mb-3">
                    <label class="form-label required">{{ __('app.login.email') }}</label>
                    <input type="email" name="email" class="form-control"
                        placeholder="{{ __('app.login.email_placeholder') }}" value="admin@gmail.com" autocomplete="off">
                    @error('email')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label required">
                        {{ __('app.login.password') }}
                        <span class="form-label-description">
                            <a href="./forgot-password.html">{{ __('app.login.forgot_password') }}</a>
                        </span>
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control"
                            placeholder="{{ __('app.login.password_placeholder') }}" value="Admin@123" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password"
                                data-bs-original-title="{{ __('app.login.show_password') }}">
                                <x-icon name="eye" class="icon" />
                            </a>
                        </span>

                    </div>
                    @error('password')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input">
                        <span class="form-check-label">{{ __('app.login.remember_me') }}</span>
                    </label>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('app.login.sign_in') }}</button>
                </div>
            </form>
            <div class="text-center text-secondary mt-3">{{ __('app.login.login_as') }}
                <a href="{{ route('admin.login.form') }}" tabindex="-1">{{ __('app.login.admin') }}</a>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
        <!-- Photo -->
        <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('img/backgrounds/bg.jpg') }})">
        </div>
    </div>
@endsection
