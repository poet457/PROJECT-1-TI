<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
            <section class="grid gap-6 lg:grid-cols-[1.15fr_0.85fr]">
                <div class="rounded-[2rem] bg-slate-950 p-8 text-white shadow-xl shadow-slate-200">
                    <p class="text-sm font-bold uppercase tracking-wide text-indigo-200">Dashboard student</p>
                    <h1 class="mt-3 text-4xl font-extrabold tracking-tight">
                        Halo, {{ Auth::user()->name }}. Lanjutkan progres belajarmu.
                    </h1>
                    <p class="mt-4 max-w-2xl text-slate-300">
                        Pantau paket aktif, progress belajar, dan rekomendasi paket yang bisa kamu ambil selama 30 hari akses.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('courses.index') }}" class="inline-flex items-center justify-center rounded-2xl bg-white px-5 py-3 text-sm font-bold text-slate-950 transition hover:bg-indigo-50">
                            Jelajahi Paket
                        </a>
                        <a href="{{ route('enrollments.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/20 px-5 py-3 text-sm font-bold text-white transition hover:bg-white/10">
                            Buka Kelas Saya
                        </a>
                    </div>
                </div>

                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-bold text-slate-500">Status paket</p>
                            <h2 class="mt-1 text-2xl font-extrabold text-slate-950">Akses belajar 30 hari</h2>
                        </div>
                        <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-bold text-amber-700">Siap dipakai</span>
                    </div>

                    <div class="mt-6 rounded-3xl bg-indigo-50 p-5">
                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-sm font-bold text-indigo-700">Progress umum</p>
                                <p class="mt-2 text-5xl font-extrabold text-slate-950">75%</p>
                            </div>
                            <p class="pb-2 text-sm font-semibold text-slate-500">Materi, kuis, sertifikat</p>
                        </div>
                        <div class="mt-5 h-3 rounded-full bg-white">
                            <div class="h-3 w-3/4 rounded-full bg-indigo-600"></div>
                        </div>
                    </div>

                    <div class="mt-5 grid grid-cols-3 gap-3 text-center">
                        <div class="rounded-2xl border border-slate-200 p-3">
                            <div class="text-lg font-extrabold text-slate-950">1</div>
                            <div class="text-xs font-semibold text-slate-500">Materi</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 p-3">
                            <div class="text-lg font-extrabold text-slate-950">2</div>
                            <div class="text-xs font-semibold text-slate-500">Kuis</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 p-3">
                            <div class="text-lg font-extrabold text-slate-950">3</div>
                            <div class="text-xs font-semibold text-slate-500">Sertifikat</div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['Total Kursus', $stats['kursus'], 'bg-indigo-50 text-indigo-700'],
                    ['Total Tutor', $stats['tutor'], 'bg-sky-50 text-sky-700'],
                    ['Total Siswa', $stats['siswa'], 'bg-emerald-50 text-emerald-700'],
                    ['Total Transaksi', $stats['transaksi'], 'bg-amber-50 text-amber-700'],
                ] as $stat)
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-bold text-slate-500">{{ $stat[0] }}</p>
                            <span class="h-10 w-10 rounded-2xl {{ $stat[2] }}"></span>
                        </div>
                        <p class="mt-5 text-4xl font-extrabold tracking-tight text-slate-950">{{ $stat[1] }}</p>
                        <p class="mt-2 text-sm font-medium text-slate-500">Data real dari sistem EDUXCHANGE.</p>
                    </div>
                @endforeach
            </section>

            <section class="grid gap-6 lg:grid-cols-[0.9fr_1.1fr]">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold uppercase tracking-wide text-indigo-700">Admin concept</p>
                            <h2 class="mt-2 text-2xl font-extrabold text-slate-950">Monitoring student</h2>
                        </div>
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">UI siap</span>
                    </div>
                    <p class="mt-4 text-sm leading-6 text-slate-600">
                        Saat role admin dibuat, area ini bisa berkembang menjadi overview progress student, paket aktif, dan paket expired.
                    </p>
                    <div class="mt-6 space-y-3">
                        @foreach ([['Student aktif', '82%'], ['Paket aktif', '64%'], ['Rata-rata progress', '71%']] as $row)
                            <div>
                                <div class="mb-2 flex justify-between text-sm font-bold text-slate-700">
                                    <span>{{ $row[0] }}</span>
                                    <span>{{ $row[1] }}</span>
                                </div>
                                <div class="h-2 rounded-full bg-slate-100">
                                    <div class="h-2 rounded-full bg-indigo-600" style="width: {{ $row[1] }}"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                        <div>
                            <p class="text-sm font-bold uppercase tracking-wide text-indigo-700">Paket populer</p>
                            <h2 class="mt-2 text-2xl font-extrabold text-slate-950">Rekomendasi belajar</h2>
                        </div>
                        <a href="{{ route('courses.index') }}" class="text-sm font-bold text-indigo-700 hover:text-indigo-900">Lihat semua</a>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        @forelse ($popularCourses as $course)
                            <article class="rounded-3xl border border-slate-200 p-5 transition hover:border-indigo-200 hover:bg-indigo-50/40">
                                <div class="flex items-start justify-between gap-3">
                                    <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700">{{ $course->kategori ?? 'Paket Belajar' }}</span>
                                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">30 hari</span>
                                </div>
                                <h3 class="mt-4 text-lg font-extrabold text-slate-950">{{ $course->nama_kursus }}</h3>
                                <p class="mt-2 text-sm font-medium text-slate-500">Tutor: {{ $course->tutor->user->name ?? 'Tutor EDUXCHANGE' }}</p>
                                <div class="mt-5 flex items-end justify-between">
                                    <p class="text-xl font-extrabold text-slate-950">Rp {{ number_format($course->harga, 0, ',', '.') }}</p>
                                    <p class="text-xs font-bold text-slate-500">{{ $course->transactions_count }} transaksi</p>
                                </div>
                            </article>
                        @empty
                            <div class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center md:col-span-2">
                                <h3 class="font-extrabold text-slate-950">Belum ada paket populer</h3>
                                <p class="mt-2 text-sm text-slate-600">Data transaksi belum tersedia.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
