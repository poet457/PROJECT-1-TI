<x-guest-layout>

    <div class="text-center mb-6">

        <h1 class="text-4xl font-bold text-blue-600">
            EDUXCHANGE
        </h1>

        <p class="text-gray-500 mt-2">
            Daftar dan Temukan Tutor Terbaik
        </p>

    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>

            <x-input-label for="name" value="Nama Lengkap" />

            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>

        <div class="mt-4">

            <x-input-label for="email" value="Alamat Email" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
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

        <div class="mt-4">

            <x-input-label
                for="password_confirmation"
                value="Konfirmasi Kata Sandi"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>

        <div class="flex items-center justify-end mt-4">

            <a
                class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('login') }}"
            >
                Sudah punya akun?
            </a>

            <x-primary-button class="ms-4">
                Daftar Sekarang
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>