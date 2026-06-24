<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Dashboard EDUXCHANGE
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="bg-blue-500 text-white p-6 rounded-xl shadow">
                    <h3 class="text-lg font-bold">Kursus</h3>
                    <p class="text-3xl mt-2">{{ $stats['kursus'] }}</p>
                </div>

                <div class="bg-green-500 text-white p-6 rounded-xl shadow">
                    <h3 class="text-lg font-bold">Tutor</h3>
                    <p class="text-3xl mt-2">{{ $stats['tutor'] }}</p>
                </div>

                <div class="bg-purple-500 text-white p-6 rounded-xl shadow">
                    <h3 class="text-lg font-bold">Siswa</h3>
                    <p class="text-3xl mt-2">{{ $stats['siswa'] }}</p>
                </div>

                <div class="bg-orange-500 text-white p-6 rounded-xl shadow">
                    <h3 class="text-lg font-bold">Transaksi</h3>
                    <p class="text-3xl mt-2">{{ $stats['transaksi'] }}</p>
                </div>

            </div>

            <div class="mt-8 bg-white p-6 rounded-xl shadow">

                <h3 class="text-xl font-bold mb-4">
                    Kursus Populer
                </h3>

                <ul class="space-y-3">

                    @forelse ($popularCourses as $course)

                        <li class="flex justify-between border-b last:border-b-0 pb-2">
                            <span>
                                📚 {{ $course->nama_kursus }}
                                <span class="text-sm text-gray-500">
                                    — {{ $course->tutor->user->name ?? 'Tutor belum diketahui' }}
                                </span>
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ $course->transactions_count }} transaksi
                            </span>
                        </li>

                    @empty

                        <li class="text-gray-500">
                            Belum ada kursus yang tersedia.
                        </li>

                    @endforelse

                </ul>

            </div>

        </div>
    </div>

</x-app-layout>
