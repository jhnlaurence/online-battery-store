<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */
            
        </style>
    </head>
    <body >
                <div class= "w-screen h-screen overflow-hidden relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:left-0 before:z-10 before:opacity-40">
                    <img src="{{ URL('images/background.jpg') }}" class="absolute top-0 left-0 min-h-full ob object-cover" alt="">
                    <header class=" text-white pt-10 z-20 relative mx-3 md:mx-auto">
                        <nav class="container mx-auto flex justify-start px-5 sm:justify-end lg:px-20">
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
                    <main class="relative z-20 max-w-screen-lg md:mx-10 lg:mx-auto grid md:grid-cols-12 h-full items-center">
                        <div class="col-span-6">
                            <span class="uppercase text-white text-xs font-bold mb-2 block">WE ARE EXPERTS</span>
                            <h1 class="text-white font-extrabold mb-8 text-5xl lg:text-7xl">
                                Yokohama provides Long Lasting batteries in different sizes
                            </h1>
                            <p class="text-stone-100 text-base">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <a href="{{ route('orders.create') }}">
                            <button class="mt-8 text-white uppercase py-4 text-base font-light px-10 border w-fit
                                 border-white hover:bg-white hover:bg-opacity-10">
                                Get started
                            </button>
                            </a>
                        </div>
                    </main>
                </div>
                {{-- <footer class="bg-gray-800 text-white text-center py-4 absolute bottom-0 w-full">
                        <div class="container mx-auto">
                          &copy; 2024 Battery Shop. All rights reserved.
                        </div>
                </footer> --}}

    </body>
</html>
