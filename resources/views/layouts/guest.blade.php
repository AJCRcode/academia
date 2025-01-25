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
        <div class=" grid grid-cols-1 sm:grid-cols-2 h-screen sm:justify-center items-center pt-6 sm:pt-0 bg-[url('https://amarmedi.amarmedi.com/images/aula.png')] bg-cover backdrop-blur-sm bg-white/30  dark:bg-gray-900">
            <div class="hidden md:block">
                <a href="/" wire:navigate>
                    <x-application-logo class="w-4/5 h-auto fill-current text-gray-500 mx-auto" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 backdrop-blur-sm bg-blue-100/50 shadow-[0px_0px_34px_10px_rgba(0,0,0,0.5)] overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
