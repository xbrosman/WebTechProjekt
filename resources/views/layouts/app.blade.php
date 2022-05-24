<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="container bg-secondary text-white ">
    <br>

            <!-- Page Heading -->
            <header class="bg-dark">
                <div class=" text-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div class="align-center">
                    <div class="btn-group btn-group-sm btn-lg btn-block">
                        <a href="/info" class="btn btn-secondary">{{ __('Info') }}</a>
                        <a href="/main" class="btn btn-secondary">{{ __('Main') }}</a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="bg-secondary">
                {{ $slot }}
            </main>
            <!-- Page Footer -->
            <footer class="bg-dark">
                <div class="btn-group  btn-group-sm btn-lg btn-block">
                <a href="/language/en" class="btn btn-secondary">{{ __('English') }}</a>
                <a href="/language/sk" class="btn btn-secondary">{{ __('Slovak') }}</a>
            
            </div>
            {{ $footer }}
            <div class="text-center p-3">
                       © 2022 Copyright: Andrašovič, Baranec, Brosman, Teplanský
                   </div>
            </footer>
    </body>
</html>