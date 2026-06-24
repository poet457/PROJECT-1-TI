<x-guest-layout>

    <div class="text-center mb-6">

        <h1 class="text-4xl font-bold text-blue-600">
            EDUXCHANGE
        </h1>

        <p class="text-gray-500 mt-2">
            Marketplace Tutor & Kursus Online
        </p>

    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Alamat Email" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">

            <x-input-label for="password" value="Kata Sandi" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        <div class="block mt-4">

            <label for="remember_me" class="inline-flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm"
                    name="remember">

                <span class="ms-2 text-sm text-gray-600">
                    Ingat Saya
                </span>

            </label>

        </div>

        <div class="flex items-center justify-end mt-4">

            @if (Route::has('password.request'))
                <a
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                    href="{{ route('password.request') }}"
                >
                    Lupa Password?
                </a>
            @endif

            <x-primary-button class="ms-3">
                Masuk ke EDUXCHANGE
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>