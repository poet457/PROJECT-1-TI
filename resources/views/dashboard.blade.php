<x-app-layout>

    <div class="bg-slate-50 min-h-screen py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- HERO -->
            <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-500 rounded-3xl shadow-xl p-8 mb-8 text-white">

                <h1 class="text-4xl font-bold mb-3">
                    🎓 Selamat Datang di EDUXCHANGE
                </h1>

                <p class="text-lg text-blue-100">
                    Temukan kursus terbaik, pelajari keterampilan baru, dan bangun karier impianmu.
                </p>

            </div>

            <!-- STATISTIK -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 hover:shadow-lg transition">

                    <div class="flex justify-between items-center">

                        <div>
                            <p class="text-slate-500 text-sm">
                                Total Kursus
                            </p>

                            <h3 class="text-4xl font-bold text-slate-800 mt-2">
                                {{ $stats['kursus'] }}
                            </h3>
                        </div>

                        <div class="text-5xl">
                            📚
                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 hover:shadow-lg transition">

                    <div class="flex justify-between items-center">

                        <div>
                            <p class="text-slate-500 text-sm">
                                Total Tutor
                            </p>

                            <h3 class="text-4xl font-bold text-slate-800 mt-2">
                                {{ $stats['tutor'] }}
                            </h3>
                        </div>

                        <div class="text-5xl">
                            👨‍🏫
                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 hover:shadow-lg transition">

                    <div class="flex justify-between items-center">

                        <div>
                            <p class="text-slate-500 text-sm">
                                Total Siswa
                            </p>

                            <h3 class="text-4xl font-bold text-slate-800 mt-2">
                                {{ $stats['siswa'] }}
                            </h3>
                        </div>

                        <div class="text-5xl">
                            🎓
                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 hover:shadow-lg transition">

                    <div class="flex justify-between items-center">

                        <div>
                            <p class="text-slate-500 text-sm">
                                Total Transaksi
                            </p>

                            <h3 class="text-4xl font-bold text-slate-800 mt-2">
                                {{ $stats['transaksi'] }}
                            </h3>
                        </div>

                        <div class="text-5xl">
                            💳
                        </div>

                    </div>

                </div>

            </div>

            <!-- PROGRESS -->
            <div class="bg-white rounded-3xl shadow-sm p-8 mb-8">

                <div class="flex justify-between items-center mb-4">

                    <h3 class="text-xl font-bold text-slate-800">
                        Progress Belajar
                    </h3>

                    <span class="font-bold text-indigo-600">
                        75%
                    </span>

                </div>

                <div class="w-full bg-slate-200 rounded-full h-4">

                    <div
                        class="bg-gradient-to-r from-indigo-600 to-cyan-500 h-4 rounded-full"
                        style="width:75%">
                    </div>

                </div>

                <p class="text-sm text-slate-500 mt-3">
                    Kamu sudah menyelesaikan sebagian besar perjalanan belajarmu. Tetap semangat belajar!
                </p>

            </div>

            <!-- KURSUS POPULER -->
            <div class="bg-white rounded-3xl shadow-sm p-8">

                <div class="flex items-center justify-between mb-8">

                    <h3 class="text-2xl font-bold text-slate-800">
                        🔥 Kursus Populer
                    </h3>

                    <a href="{{ route('courses.index') }}"
                       class="text-indigo-600 font-semibold hover:text-indigo-800">
                        Lihat Semua →
                    </a>

                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @forelse ($popularCourses as $course)

                    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden hover:shadow-xl transition">

                        <!-- COVER -->
                        <div class="h-36 bg-gradient-to-br from-indigo-600 via-blue-500 to-cyan-400 flex items-center justify-center">

                            <div class="text-center px-4">

                                <div class="text-5xl mb-2">
                                    🎓
                                </div>

                                <h4 class="text-white font-bold text-lg">
                                    {{ $course->nama_kursus }}
                                </h4>

                            </div>

                        </div>

                        <!-- CONTENT -->
                        <div class="p-5">

                            <div class="flex justify-between items-center mb-3">

                                <span class="bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full">

                                    {{ $course->kategori ?? 'Kursus' }}

                                </span>

                                <span class="text-yellow-500 text-sm">
                                    ⭐ Populer
                                </span>

                            </div>

                            <p class="text-sm text-slate-500 mb-3">

                                Tutor:
                                <span class="font-semibold text-slate-700">
                                    {{ $course->tutor->user->name ?? '-' }}
                                </span>

                            </p>

                            <p class="text-sm text-slate-600 mb-4">

                                @switch($course->kategori)

                                    @case('UI/UX')
                                        Pelajari prinsip UI/UX modern, wireframing, prototyping, dan user experience.
                                        @break

                                    @case('Programming')
                                        Bangun aplikasi web modern dengan teknologi yang digunakan industri saat ini.
                                        @break

                                    @case('Marketing')
                                        Kuasai strategi pemasaran digital dan tingkatkan kemampuan promosi bisnis.
                                        @break

                                    @default
                                        Tingkatkan keterampilanmu melalui materi yang terstruktur dan mudah dipahami.

                                @endswitch

                            </p>

                            <div class="flex justify-between items-end">

                                <div>

                                    <p class="text-xs text-slate-400">
                                        Harga
                                    </p>

                                    <h4 class="text-xl font-bold text-indigo-600">
                                        Rp {{ number_format($course->harga, 0, ',', '.') }}
                                    </h4>

                                </div>

                                <div class="text-sm text-slate-500">
                                    {{ $course->transactions_count }} transaksi
                                </div>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="col-span-full text-center py-12">

                        <div class="text-6xl mb-3">
                            📚
                        </div>

                        <h3 class="text-xl font-bold text-slate-700">
                            Belum Ada Kursus Populer
                        </h3>

                        <p class="text-slate-500 mt-2">
                            Data transaksi belum tersedia.
                        </p>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</x-app-layout>