<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Kelas Saya
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($enrollments as $enrollment)

                    <div class="bg-white rounded-xl shadow p-6 flex flex-col justify-between">

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-semibold px-2 py-1 rounded-full
                                    {{ $enrollment->sudah_selesai ? 'bg-gray-200 text-gray-700' : 'bg-green-100 text-green-700' }}">
                                    {{ $enrollment->sudah_selesai ? 'Selesai' : 'Sedang Berjalan' }}
                                </span>

                                <span class="text-xs text-gray-500">
                                    {{ $enrollment->sudah_selesai ? 'Berakhir '.$enrollment->ends_at->translatedFormat('d M Y') : $enrollment->sisa_hari.' hari lagi' }}
                                </span>
                            </div>

                            <h3 class="text-lg font-bold mb-1">
                                {{ $enrollment->course->nama_kursus }}
                            </h3>

                            <p class="text-sm text-gray-500 mb-3">
                                Tutor: {{ $enrollment->course->tutor->user->name ?? '-' }}
                            </p>

                            <p class="text-sm text-gray-600">
                                Nilai kuis:
                                <span class="font-semibold">
                                    {{ $enrollment->sudah_mengerjakan_kuis ? $enrollment->score : 'Belum dikerjakan' }}
                                </span>
                            </p>
                        </div>

                        <a href="{{ route('enrollments.show', $enrollment) }}"
                           class="mt-4 inline-block text-center px-4 py-2 rounded-md bg-indigo-600 text-white text-sm hover:bg-indigo-700">
                            Buka Kelas
                        </a>

                    </div>

                @empty

                    <div class="col-span-full bg-white rounded-xl shadow p-8 text-center text-gray-500">
                        Kamu belum mengikuti kursus apapun.
                        <a href="{{ route('courses.index') }}" class="text-indigo-600 font-semibold">Jelajahi kursus</a>
                        sekarang.
                    </div>

                @endforelse

            </div>

        </div>
    </div>

</x-app-layout>
