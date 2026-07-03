<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
            @php
                $totalHari = $enrollment->started_at->diffInDays($enrollment->ends_at) ?: 30;
                $hariBerjalan = min($totalHari, $enrollment->started_at->diffInDays(now()));
                $persenWaktu = (int) round(($hariBerjalan / $totalHari) * 100);
            @endphp

            <section class="rounded-[2rem] bg-slate-950 p-8 text-white shadow-xl shadow-slate-200">
                <div class="grid gap-8 lg:grid-cols-[1fr_0.7fr] lg:items-end">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-wide text-indigo-200">Detail kelas</p>
                        <h1 class="mt-3 text-4xl font-extrabold tracking-tight">{{ $enrollment->course->nama_kursus }}</h1>
                        <p class="mt-4 max-w-2xl text-slate-300">
                            {{ $enrollment->course->deskripsi ?? 'Lanjutkan materi, kerjakan kuis, dan pantau masa akses paket belajar kamu.' }}
                        </p>
                    </div>
                    <div class="rounded-3xl bg-white/10 p-5 ring-1 ring-white/10">
                        <p class="text-sm font-bold text-indigo-100">Sisa waktu belajar</p>
                        <p class="mt-2 text-4xl font-extrabold">{{ $enrollment->sudah_selesai ? 'Expired' : $enrollment->sisa_hari.' hari' }}</p>
                        <div class="mt-5 h-2.5 rounded-full bg-white/20">
                            <div class="h-2.5 rounded-full bg-white" style="width: {{ $persenWaktu }}%"></div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="grid gap-4 md:grid-cols-4">
                @foreach ([
                    ['Tutor Pengajar', $enrollment->course->tutor->user->name ?? 'Tutor EDUXCHANGE'],
                    ['Kategori', $enrollment->course->kategori ?? 'Paket Belajar'],
                    ['Nilai Kuis', $enrollment->sudah_mengerjakan_kuis ? $enrollment->score : 'Belum dikerjakan'],
                    ['Sertifikat', $enrollment->bisa_unduh_sertifikat ? 'Tersedia' : 'Belum tersedia'],
                ] as $item)
                    <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-sm font-bold text-slate-500">{{ $item[0] }}</p>
                        <p class="mt-2 text-xl font-extrabold text-slate-950">{{ $item[1] }}</p>
                    </div>
                @endforeach
            </section>

            <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-wide text-indigo-700">Kuis dan sertifikat</p>
                        <h2 class="mt-2 text-2xl font-extrabold text-slate-950">Checkpoint penyelesaian kelas</h2>
                        <p class="mt-2 text-sm text-slate-600">{{ $enrollment->course->questions->count() }} soal tersedia untuk mengukur pemahaman kamu.</p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        @if ($enrollment->course->questions->isNotEmpty())
                            <a href="{{ route('quiz.create', $enrollment) }}" class="inline-flex items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700">
                                {{ $enrollment->sudah_mengerjakan_kuis ? 'Kerjakan Ulang Kuis' : 'Kerjakan Kuis' }}
                            </a>
                        @endif

                        @if ($enrollment->bisa_unduh_sertifikat)
                            <a href="{{ route('certificate.download', $enrollment) }}" class="inline-flex items-center justify-center rounded-2xl bg-emerald-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-emerald-700">
                                Unduh Sertifikat
                            </a>
                        @else
                            <span class="inline-flex items-center justify-center rounded-2xl bg-slate-100 px-5 py-3 text-sm font-bold text-slate-500">
                                Sertifikat Belum Tersedia
                            </span>
                        @endif
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="mb-6 flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-wide text-indigo-700">Materi pembelajaran</p>
                        <h2 class="mt-2 text-2xl font-extrabold text-slate-950">Daftar materi</h2>
                    </div>
                    <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700">{{ $enrollment->course->materials->count() }} materi</span>
                </div>

                <div class="space-y-3">
                    @forelse ($enrollment->course->materials as $material)
                        <details class="group rounded-2xl border border-slate-200 p-5 open:bg-slate-50">
                            <summary class="cursor-pointer list-none font-extrabold text-slate-950">
                                {{ $loop->iteration }}. {{ $material->judul }}
                            </summary>
                            <div class="mt-4 whitespace-pre-line text-sm leading-7 text-slate-600">
                                {{ $material->konten }}
                            </div>
                        </details>
                    @empty
                        <div class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center">
                            <h3 class="font-extrabold text-slate-950">Belum ada materi</h3>
                            <p class="mt-2 text-sm text-slate-600">Materi untuk paket ini akan tampil di sini.</p>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
