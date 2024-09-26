<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite('resources/sass/app.scss')
    @stack('styles')


</head>

<body class="theme-light">
    <div class="page">
        @include('layouts.navigation')

        <div class="page-wrapper">
            <!-- Page header -->
            @include('layouts.topbar')

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        @yield('content')
                        {{ $slot ?? '' }}
                    </div>
                </div>
            </div>

            @include('layouts.footer')
        </div>
    </div>

    <!-- Core plugin JavaScript-->



    @vite('resources/js/app.js')



    @stack('scripts')

    <!-- Page level custom scripts -->
    @yield('custom_scripts')

</body>

</html>
