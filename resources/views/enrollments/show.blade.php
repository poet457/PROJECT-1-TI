<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $enrollment->course->nama_kursus }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Info Kursus -->
            <div class="bg-white rounded-xl shadow p-6">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                    <div>
                        <p class="text-sm text-gray-500">Tutor Pengajar</p>
                        <p class="text-lg font-semibold">
                            {{ $enrollment->course->tutor->user->name ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Kategori</p>
                        <p class="text-lg font-semibold">
                            {{ $enrollment->course->kategori }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Sisa Waktu Belajar</p>
                        <p class="text-lg font-semibold">
                            @if ($enrollment->sudah_selesai)
                                Periode belajar selesai
                            @else
                                {{ $enrollment->sisa_hari }} hari lagi
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Nilai Kuis</p>
                        <p class="text-lg font-semibold">
                            {{ $enrollment->sudah_mengerjakan_kuis ? $enrollment->score : 'Belum dikerjakan' }}
                        </p>
                    </div>

                </div>

                @if ($enrollment->course->deskripsi)
                    <p class="text-gray-600 mt-4">
                        {{ $enrollment->course->deskripsi }}
                    </p>
                @endif

                <!-- Progress masa belajar 30 hari -->
                @php
                    $totalHari = $enrollment->started_at->diffInDays($enrollment->ends_at) ?: 30;
                    $hariBerjalan = min($totalHari, $enrollment->started_at->diffInDays(now()));
                    $persenWaktu = (int) round(($hariBerjalan / $totalHari) * 100);
                @endphp

                <div class="mt-6">
                    <div class="flex justify-between text-xs text-gray-500 mb-1">
                        <span>Mulai {{ $enrollment->started_at->translatedFormat('d M Y') }}</span>
                        <span>Berakhir {{ $enrollment->ends_at->translatedFormat('d M Y') }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: {{ $persenWaktu }}%"></div>
                    </div>
                </div>

            </div>

            <!-- Aksi: Kuis & Sertifikat -->
            <div class="bg-white rounded-xl shadow p-6 flex flex-col sm:flex-row gap-4 sm:items-center sm:justify-between">

                <div>
                    <h3 class="font-bold text-lg">Kuis Kursus</h3>
                    <p class="text-sm text-gray-500">
                        {{ $enrollment->course->questions->count() }} soal pilihan ganda.
                    </p>
                </div>

                <div class="flex gap-3">
                    @if ($enrollment->course->questions->isNotEmpty())
                        <a href="{{ route('quiz.create', $enrollment) }}"
                           class="px-4 py-2 rounded-md bg-indigo-600 text-white text-sm hover:bg-indigo-700">
                            {{ $enrollment->sudah_mengerjakan_kuis ? 'Kerjakan Ulang Kuis' : 'Kerjakan Kuis' }}
                        </a>
                    @endif

                    @if ($enrollment->bisa_unduh_sertifikat)
                        <a href="{{ route('certificate.download', $enrollment) }}"
                           class="px-4 py-2 rounded-md bg-green-600 text-white text-sm hover:bg-green-700">
                            Unduh Sertifikat
                        </a>
                    @else
                        <span class="px-4 py-2 rounded-md bg-gray-200 text-gray-500 text-sm cursor-not-allowed"
                              title="Sertifikat tersedia setelah 30 hari dan kuis dikerjakan">
                            Sertifikat Belum Tersedia
                        </span>
                    @endif
                </div>

            </div>

            <!-- Materi Pembelajaran -->
            <div class="bg-white rounded-xl shadow p-6">

                <h3 class="font-bold text-lg mb-4">Materi Pembelajaran</h3>

                <div class="space-y-3">

                    @forelse ($enrollment->course->materials as $material)

                        <details class="border rounded-lg p-4">
                            <summary class="font-semibold cursor-pointer">
                                {{ $loop->iteration }}. {{ $material->judul }}
                            </summary>
                            <div class="mt-3 text-gray-600 whitespace-pre-line">
                                {{ $material->konten }}
                            </div>
                        </details>

                    @empty

                        <p class="text-gray-500">Belum ada materi untuk kursus ini.</p>

                    @endforelse

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
