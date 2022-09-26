<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <x-notify.handle-notify />

        <div class="min-h-screen bg-gray-100" x-data="{ openMobile: false }">
            @include('layouts.navigation')

            <div class="min-h-full">
                <div class="lg:pl-64 flex flex-col flex-1">
                    <x-profile-section />
                    <main class="flex-1 pb-8">
                        @if (!empty($header))
                            <!-- Page header -->
                            <div class="bg-white shadow">
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                    <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                                        {{ $header }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
