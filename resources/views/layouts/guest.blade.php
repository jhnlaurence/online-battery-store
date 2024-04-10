<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @if (Request::route()->getName() === 'login' || Request::route()->getName() === 'register')
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class=" font-bold text-white text-4xl">
                <a href="{{ url('/') }}">
                    Brand Name
                </a>
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        @else
            <header class="bg-gray-800 text-white py-4">
                <nav class="container mx-auto flex justify-between items-center px-4">
                    <div class="text-xl font-bold">
                        <a href="{{ url('/') }}">
                            Brand Name
                        </a>
                    </div>
                    <div class="mx-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white mr-10">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-white mr-10">
                                Log in
                            </a>
        
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="w-fit text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 text-md focus:ring-blue-300 rounded-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </nav>
            </header>

            <div>
                {{ $slot }}
            </div>
        @endif
    
    </body>
</html>
