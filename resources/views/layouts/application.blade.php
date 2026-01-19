<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield(__('app.title'), config('app.name'))</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="page">
        {{-- nav bar  --}}
        @include('partials.navbar.application-nav')

        <div class="page-wrapper">

            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')

</body>

</html>
