<x-guest-layout>
    <div class="mb-6">
        <p class="text-sm font-bold uppercase tracking-wide text-indigo-700">Login student</p>
        <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-950">Masuk ke Dashboard Belajar</h1>
        <p class="mt-3 text-sm leading-6 text-slate-600">
            Lanjutkan paket aktif, lihat progres, dan akses materi yang sudah kamu ikuti.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="font-bold text-slate-700" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div x-data="{ showPassword: false }">
            <x-input-label for="password" :value="__('Password')" class="font-bold text-slate-700" />
            <div class="relative mt-2">
                <x-text-input
                    id="password"
                    class="block w-full pr-12"
                    type="password"
                    x-bind:type="showPassword ? 'text' : 'password'"
                    name="password"
                    required
                    autocomplete="current-password" />

                <button
                    type="button"
                    class="absolute inset-y-0 right-0 flex w-12 items-center justify-center rounded-r-xl text-slate-500 transition hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    x-on:click="showPassword = !showPassword"
                    x-bind:aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'">
                    <svg x-show="!showPassword" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12 18 18.75 12 18.75 2.25 12 2.25 12Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <svg x-show="showPassword" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.58 10.58A2 2 0 0 0 12 14a2 2 0 0 0 1.42-.58" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.88 5.45A8.3 8.3 0 0 1 12 5.25c6 0 9.75 6.75 9.75 6.75a17.1 17.1 0 0 1-3.16 3.94" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.53 6.53C3.8 8.38 2.25 12 2.25 12s3.75 6.75 9.75 6.75c1.4 0 2.68-.32 3.82-.84" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between gap-3">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm font-medium text-slate-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-bold text-indigo-700 hover:text-indigo-900" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <x-primary-button class="w-full">
            Masuk
        </x-primary-button>

        <p class="text-center text-sm font-medium text-slate-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-bold text-indigo-700 hover:text-indigo-900">Daftar sekarang</a>
        </p>
    </form>
</x-guest-layout>
