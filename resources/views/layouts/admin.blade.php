<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield(__('app.title'), config('app.name'))</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/settings.js'])

</head>

<body>
    <!-- ✅ Main App Content (Hidden until loaded) -->
    <div class="page">
        @include('partials.sidebar.admin-side')
        @include('partials.navbar.admin-nav')

        <div class="page-wrapper">

            {{-- page header --}}
            @hasSection('page-header')
                @yield('page-header')
            @endif

            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')

    {{-- for calendar flatpickr --}}
    {{-- Flatpickr locale data --}}
    @php
        $months = [
            'en' => [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December',
            ],
            'km' => [
                'មករា',
                'កុម្ភៈ',
                'មិនា',
                'មេសា',
                'ឧសភា',
                'មិថុនា',
                'កក្កដា',
                'សីហា',
                'កញ្ញា',
                'តុលា',
                'វិច្ឆិកា',
                'ធ្នូ',
            ],
        ];

        $weekdays = [
            'en' => ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            'km' => ['អាទិត្យ', 'ច័ន្ទ', 'អង្គារ', 'ពុធ', 'ព្រហស្បតិ៍', 'សុក្រ', 'សៅរ៍'],
        ];
    @endphp

    <script>
        window.APP_LOCALE = "{{ app()->getLocale() }}";
        window.FLATPICKR_I18N = {
            months: @json($months),
            weekdays: @json($weekdays),
        };
    </script>
</body>

</html>
