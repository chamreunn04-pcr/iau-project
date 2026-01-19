<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield(__('app.title'), config('app.name'))</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column">

    <div class="row g-0 flex-fill">
        @yield('content')
    </div>

    @stack('scripts')

</body>

</html>
