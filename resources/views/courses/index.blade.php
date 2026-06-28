<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Daftar Kursus EDUXCHANGE
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-2xl font-bold mb-4">
                    Daftar Kursus
                </h3>

                <table class="table-auto w-full border">

                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3">Nama Kursus</th>
                            <th class="p-3">Kategori</th>
                            <th class="p-3">Tutor</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($courses as $course)

                        <tr>
                            <td class="border p-3">
                                {{ $course->nama_kursus }}
                            </td>

                            <td class="border p-3">
                                {{ $course->kategori }}
                            </td>

                            <td class="border p-3">
                                {{ $course->tutor->user->name ?? '-' }}
                            </td>

                            <td class="border p-3">
                                Rp {{ number_format($course->harga, 0, ',', '.') }}
                            </td>

                            <td class="border p-3 text-center">
                                @if (in_array($course->id, $enrolledCourseIds))

                                    <a href="{{ route('enrollments.index') }}"
                                       class="inline-block px-3 py-1.5 rounded-md bg-green-600 text-white text-sm hover:bg-green-700">
                                        Lanjutkan Belajar
                                    </a>

                                @else

                                    <form action="{{ route('courses.enroll', $course) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="px-3 py-1.5 rounded-md bg-indigo-600 text-white text-sm hover:bg-indigo-700">
                                            Daftar Kursus
                                        </button>
                                    </form>

                                @endif
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="5" class="text-center p-4">
                                Belum ada kursus
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>