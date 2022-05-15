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

        <!-- mi cosas css -->
        <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">

        <link rel="shortcut icon" href="{{ asset('img/logomini.png') }}" type="image/x-icon">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/myjs.js') }}" defer></script>
        <!-- alpinejs -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    </head>
    <body class="">
        <div class="" style="position: relative; z-index: 0;">

            @include('layouts.navigation')

            <div class="p-4 " id="main" >

                <!-- Page Content -->
                <main class="pt-8">
                @if (session()->has('error'))
                    <div class=" bg-gray-100 rounded-lg p-4 mt-4 mb-4 text-red-800" role="alert">
                        <span class="font-semibold">Error:</span> {{ session('error') }}
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="bg-gray-100 rounded-lg p-4 mt-4 mb-4 text-m text-green-700" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mt-6" >
                    {{ $slot }}

                </div>
                </main>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
