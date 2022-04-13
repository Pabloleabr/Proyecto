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

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="">
        <div class="">
            @include('layouts.navigation')

            <div class="p-4" style="margin-left: 15vw;">

                <!-- Page Content -->
                <main class="pt-8">
                    @if (session()->has('error'))
                    <div class="bg-red-100 rounded-lg p-4 mt-4 mb-4 text-sm text-red-700" role="alert">
                        <span class="font-semibold">Error:</span> {{ session('error') }}
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="bg-green-100 rounded-lg p-4 mt-4 mb-4 text-sm text-green-700" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mt-6">
                    {{ $slot }}

                </div>
                </main>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
