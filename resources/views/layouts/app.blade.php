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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            

            <!-- Page Content -->
            <main>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-6">
                    @if (session('success'))
                        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 border border-green-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('info'))
                        <div class="mb-4 p-4 rounded-lg bg-blue-100 text-blue-800 border border-blue-300">
                            {{ session('info') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800 border border-red-300">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                {{ $slot }}
            </main>
        </div>
    </body>
</html>
