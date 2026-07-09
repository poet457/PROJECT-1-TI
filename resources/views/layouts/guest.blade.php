<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EDUXCHANGE</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="font-sans antialiased text-slate-900">
    <main class="min-h-screen bg-slate-50">
        <div class="grid min-h-screen lg:grid-cols-[1.05fr_0.95fr]">
            <section class="hidden bg-slate-950 px-10 py-12 text-white lg:flex lg:flex-col lg:justify-between">
                <a href="/" class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white text-sm font-black text-indigo-700">EX</div>
                    <div>
                        <div class="text-xl font-extrabold tracking-tight">EDUXCHANGE</div>
                        <div class="text-sm text-slate-300">Bimbel online luas</div>
                    </div>
                </a>

                <div class="max-w-xl">
                    <p class="mb-4 inline-flex rounded-full border border-white/10 bg-white/10 px-4 py-2 text-sm font-semibold text-indigo-100">
                        30 hari akses belajar terstruktur
                    </p>
                    <h1 class="text-5xl font-extrabold leading-tight tracking-tight">
                        Satu platform untuk sekolah, skill, karier, dan persiapan masa depan.
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-slate-300">
                        Masuk untuk mengelola paket belajar, melihat progres, mengerjakan kuis, dan melanjutkan kelas yang sedang aktif.
                    </p>
                </div>

                <div class="grid grid-cols-3 gap-3 text-sm">
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                        <div class="text-2xl font-extrabold">30</div>
                        <div class="text-slate-300">Hari akses</div>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                        <div class="text-2xl font-extrabold">5+</div>
                        <div class="text-slate-300">Kategori</div>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                        <div class="text-2xl font-extrabold">1</div>
                        <div class="text-slate-300">Dashboard</div>
                    </div>
                </div>
            </section>

            <section class="flex items-center justify-center px-4 py-10 sm:px-6 lg:px-10">
                <div class="w-full max-w-md">
                    <div class="mb-8 text-center">
                        <a href="/" class="inline-flex items-center justify-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-sm font-black text-white">EX</div>
                            <span class="text-2xl font-extrabold tracking-tight text-slate-950">EDUXCHANGE</span>
                        </a>
                        <p class="mt-3 text-sm font-medium text-slate-500">Akses dashboard belajar pribadi kamu.</p>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/60 sm:p-8">
                        {{ $slot }}
                    </div>

                    <p class="mt-6 px-4 text-center text-xs font-medium leading-6 text-slate-500">
                        © Copyright 2026, Eduxchange. All Rights Reserved
                    </p>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
