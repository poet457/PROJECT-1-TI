<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
            <section class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
                <div class="grid gap-8 lg:grid-cols-[1fr_0.7fr] lg:items-end">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-wide text-indigo-700">Paket belajar</p>
                        <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-slate-950">Pilih paket bimbel 30 hari.</h1>
                        <p class="mt-4 max-w-2xl text-slate-600">
                            Temukan paket akademik, digital skill, bahasa, karier, dan persiapan ujian. Setelah berlangganan, paket langsung masuk ke Kelas Saya.
                        </p>
                    </div>
                    <div class="rounded-3xl bg-indigo-50 p-5">
                        <p class="text-sm font-bold text-indigo-700">Model akses</p>
                        <p class="mt-2 text-3xl font-extrabold text-slate-950">30 hari</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Akses materi, kuis, dan sertifikat sesuai progres belajar.</p>
                    </div>
                </div>
            </section>

            <section class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($courses as $course)
                    @php($isEnrolled = in_array($course->id, $enrolledCourseIds))

                    <article class="flex flex-col rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200">
                        <div class="flex items-start justify-between gap-4">
                            <div class="h-12 w-12 rounded-2xl bg-indigo-50"></div>
                            <span class="rounded-full px-3 py-1 text-xs font-bold {{ $isEnrolled ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                                {{ $isEnrolled ? 'Aktif' : 'Belum Berlangganan' }}
                            </span>
                        </div>

                        <div class="mt-6 flex-1">
                            <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700">{{ $course->kategori ?? 'Paket Belajar' }}</span>
                            <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-slate-950">{{ $course->nama_kursus }}</h2>
                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                {{ \Illuminate\Support\Str::limit($course->deskripsi ?? 'Paket belajar terstruktur bersama tutor EDUXCHANGE.', 115) }}
                            </p>
                        </div>

                        <div class="mt-6 space-y-3 border-t border-slate-100 pt-5">
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-sm font-semibold text-slate-500">Tutor</span>
                                <span class="text-right text-sm font-bold text-slate-900">{{ $course->tutor->user->name ?? 'Tutor EDUXCHANGE' }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-sm font-semibold text-slate-500">Durasi akses</span>
                                <span class="text-sm font-bold text-slate-900">30 hari</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-sm font-semibold text-slate-500">Harga</span>
                                <span class="text-lg font-extrabold text-slate-950">Rp {{ number_format($course->harga, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            @if ($isEnrolled)
                                <a href="{{ route('enrollments.index') }}" class="inline-flex w-full items-center justify-center rounded-2xl bg-emerald-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-emerald-700">
                                    Lanjutkan Belajar
                                </a>
                            @else
                                <form action="{{ route('courses.enroll', $course) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="inline-flex w-full items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700">
                                        Berlangganan Paket
                                    </button>
                                </form>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-white p-12 text-center">
                        <h3 class="text-2xl font-extrabold text-slate-950">Belum ada paket belajar</h3>
                        <p class="mt-3 text-slate-600">Saat ini belum ada kursus yang tersedia.</p>
                    </div>
                @endforelse
            </section>
        </div>
    </div>
</x-app-layout>

