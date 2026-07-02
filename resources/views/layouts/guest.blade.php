<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EDUXCHANGE</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen flex">

        <!-- KIRI -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-indigo-700 via-blue-600 to-cyan-500 items-center justify-center">

            <div class="text-center px-12">

                <h1 class="text-5xl font-bold text-white mb-6">
                    EDUXCHANGE
                </h1>

                <p class="text-xl text-blue-100 leading-relaxed">
                    Platform pembelajaran modern untuk mengembangkan keterampilan,
                    memperluas wawasan, dan mencapai masa depan yang lebih cerah.
                </p>

                <div class="mt-10 text-white">

                    <div class="text-4xl font-bold">
                        🚀
                    </div>

                    <p class="mt-3 text-lg">
                        Belajar Tanpa Batas
                    </p>

                </div>

            </div>

        </div>

        <!-- KANAN -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-50">

            <div class="w-full max-w-md">

                <div class="text-center mb-8">

                    <a href="/">
                        <h2 class="text-4xl font-bold text-indigo-700">
                            EDUXCHANGE
                        </h2>
                    </a>

                    <p class="text-gray-500 mt-2">
                        Selamat datang kembali
                    </p>

                </div>

                <div class="bg-white shadow-2xl rounded-3xl p-8">

                    {{ $slot }}

                </div>

            </div>

        </div>

    </div>

</body>
</html>