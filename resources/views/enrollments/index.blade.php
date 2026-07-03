<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
            <section class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-wide text-indigo-700">Kelas Saya</p>
                        <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-slate-950">Paket yang sedang kamu ikuti.</h1>
                        <p class="mt-4 max-w-2xl text-slate-600">
                            Pantau sisa masa akses 30 hari, progress belajar, nilai kuis, dan sertifikat dari semua paket aktif kamu.
                        </p>
                    </div>
                    <a href="{{ route('courses.index') }}" class="inline-flex items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700">
                        Tambah Paket
                    </a>
                </div>
            </section>

            <section class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($enrollments as $enrollment)
                    @php
                        $progress = $enrollment->sudah_selesai ? 100 : max(12, min(100, (int) round(100 - (($enrollment->sisa_hari / 30) * 100))));
                    @endphp

                    <article class="flex flex-col rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200">
                        <div class="flex items-start justify-between gap-4">
                            <span class="rounded-full px-3 py-1 text-xs font-bold {{ $enrollment->sudah_selesai ? 'bg-slate-100 text-slate-600' : 'bg-emerald-50 text-emerald-700' }}">
                                {{ $enrollment->sudah_selesai ? 'Selesai' : 'Aktif' }}
                            </span>
                            <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700">30 hari</span>
                        </div>

                        <div class="mt-5 flex-1">
                            <h2 class="text-2xl font-extrabold tracking-tight text-slate-950">{{ $enrollment->course->nama_kursus }}</h2>
                            <p class="mt-2 text-sm font-medium text-slate-500">Tutor: {{ $enrollment->course->tutor->user->name ?? 'Tutor EDUXCHANGE' }}</p>
                        </div>

                        <div class="mt-6 rounded-3xl bg-slate-50 p-5">
                            <div class="flex items-end justify-between">
                                <div>
                                    <p class="text-sm font-bold text-slate-500">Sisa akses</p>
                                    <p class="mt-1 text-3xl font-extrabold text-slate-950">
                                        {{ $enrollment->sudah_selesai ? 'Expired' : $enrollment->sisa_hari.' hari' }}
                                    </p>
                                </div>
                                <p class="text-right text-xs font-bold text-slate-500">
                                    {{ $enrollment->sudah_selesai ? 'Berakhir '.$enrollment->ends_at->translatedFormat('d M Y') : 'Aktif sampai '.$enrollment->ends_at->translatedFormat('d M Y') }}
                                </p>
                            </div>
                            <div class="mt-4 h-2.5 rounded-full bg-white">
                                <div class="h-2.5 rounded-full bg-indigo-600" style="width: {{ $progress }}%"></div>
                            </div>
                            <div class="mt-2 flex justify-between text-xs font-bold text-slate-500">
                                <span>Progress waktu</span>
                                <span>{{ $progress }}%</span>
                            </div>
                        </div>

                        <div class="mt-5 grid grid-cols-2 gap-3">
                            <div class="rounded-2xl border border-slate-200 p-4">
                                <p class="text-xs font-bold uppercase tracking-wide text-slate-400">Nilai kuis</p>
                                <p class="mt-2 text-lg font-extrabold text-slate-950">{{ $enrollment->sudah_mengerjakan_kuis ? $enrollment->score : 'Belum' }}</p>
                            </div>
                            <div class="rounded-2xl border border-slate-200 p-4">
                                <p class="text-xs font-bold uppercase tracking-wide text-slate-400">Sertifikat</p>
                                <p class="mt-2 text-lg font-extrabold text-slate-950">{{ $enrollment->bisa_unduh_sertifikat ? 'Tersedia' : 'Belum' }}</p>
                            </div>
                        </div>

                        <a href="{{ route('enrollments.show', $enrollment) }}" class="mt-6 inline-flex w-full items-center justify-center rounded-2xl bg-slate-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700">
                            Buka Kelas
                        </a>
                    </article>
                @empty
                    <div class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-white p-12 text-center">
                        <h3 class="text-2xl font-extrabold text-slate-950">Kamu belum punya paket aktif</h3>
                        <p class="mt-3 text-slate-600">Pilih paket belajar 30 hari untuk mulai mengakses materi dan progress dashboard.</p>
                        <a href="{{ route('courses.index') }}" class="mt-6 inline-flex items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700">
                            Jelajahi Paket
                        </a>
                    </div>
                @endforelse
            </section>
        </div>
    </div>
</x-app-layout>
