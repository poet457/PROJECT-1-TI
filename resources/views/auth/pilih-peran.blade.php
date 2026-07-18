<x-guest-layout>
    <div class="mb-6">
        <p class="text-sm font-bold uppercase tracking-wide text-indigo-700">Masuk ke EDUXCHANGE</p>
        <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-950">Kamu mau masuk sebagai apa?</h1>
        <p class="mt-3 text-sm leading-6 text-slate-600">
            Pilih peran kamu dulu, nanti diarahkan ke halaman login yang sesuai.
        </p>
    </div>

    <div class="space-y-4">
        <a
            href="{{ route('login') }}"
            class="group flex items-center gap-4 rounded-2xl border border-slate-200 p-5 transition hover:border-indigo-300 hover:bg-indigo-50"
        >
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-700 transition group-hover:bg-indigo-600 group-hover:text-white">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.5 8.25 12l6.75-7.5" />
                </svg>
            </span>
            <span class="flex-1">
                <span class="block text-base font-extrabold text-slate-950">Pengguna</span>
                <span class="block text-sm text-slate-600">Masuk untuk belajar, ikuti paket, dan pantau progres kamu.</span>
            </span>
            <svg class="h-5 w-5 shrink-0 text-slate-400 transition group-hover:translate-x-1 group-hover:text-indigo-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 15 12l-6.75 7.5" />
            </svg>
        </a>

        <a
            href="{{ route('login', ['as' => 'admin']) }}"
            class="group flex items-center gap-4 rounded-2xl border border-slate-200 p-5 transition hover:border-slate-400 hover:bg-slate-50"
        >
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-700 transition group-hover:bg-slate-950 group-hover:text-white">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.96 11.96 0 0 1 3.598 6 12.06 12.06 0 0 0 12 21a12.06 12.06 0 0 0 8.402-15A11.96 11.96 0 0 1 12 2.714Z" />
                </svg>
            </span>
            <span class="flex-1">
                <span class="block text-base font-extrabold text-slate-950">Admin</span>
                <span class="block text-sm text-slate-600">Masuk untuk kelola data siswa, kursus, dan transaksi.</span>
            </span>
            <svg class="h-5 w-5 shrink-0 text-slate-400 transition group-hover:translate-x-1 group-hover:text-slate-950" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 15 12l-6.75 7.5" />
            </svg>
        </a>
    </div>

    <p class="mt-6 text-center text-sm font-medium text-slate-600">
        Belum punya akun?
        <a href="{{ route('register') }}" class="font-bold text-indigo-700 hover:text-indigo-900">Daftar sekarang</a>
    </p>
</x-guest-layout>
