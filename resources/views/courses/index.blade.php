<x-app-layout>

    <div class="bg-slate-50 min-h-screen py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- HEADER -->
            <div class="mb-8">

                <h1 class="text-4xl font-bold text-slate-800">
                    📚 Jelajahi Kursus
                </h1>

                <p class="text-slate-500 mt-2">
                    Temukan kursus terbaik untuk meningkatkan kemampuan dan kariermu.
                </p>

            </div>

            <!-- HERO -->
            <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-500 rounded-3xl p-8 mb-10 text-white shadow-xl">

                <h2 class="text-3xl font-bold mb-2">
                    Belajar Tanpa Batas 🚀
                </h2>

                <p class="text-blue-100">
                    Akses berbagai kursus pilihan dari tutor terbaik di EDUXCHANGE.
                </p>

            </div>

            <!-- COURSE GRID -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($courses as $course)

                <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-slate-100">

                    <!-- COVER -->
                    <div class="h-48 bg-gradient-to-br from-indigo-600 via-blue-500 to-cyan-400 flex items-center justify-center">

                        <div class="text-center px-4">

                            <div class="text-5xl mb-3">
                                🎓
                            </div>

                            <h3 class="text-white font-bold text-xl">
                                {{ $course->nama_kursus }}
                            </h3>

                        </div>

                    </div>

                    <!-- CONTENT -->
                    <div class="p-6">

                        <div class="flex justify-between items-center mb-4">

                            <span class="bg-indigo-100 text-indigo-700 text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $course->kategori }}
                            </span>

                            <span class="text-yellow-500 text-sm">
                                ⭐ 4.9
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mb-4">

                            Tutor:

                            <span class="font-semibold text-slate-700">
                                {{ $course->tutor->user->name ?? '-' }}
                            </span>

                        </p>

                        <div class="flex items-center justify-between mb-6">

                            <div>

                                <p class="text-xs text-slate-400">
                                    Harga Kursus
                                </p>

                                <h4 class="text-2xl font-bold text-indigo-600">
                                    Rp {{ number_format($course->harga,0,',','.') }}
                                </h4>

                            </div>

                            <div class="text-3xl">
                                📖
                            </div>

                        </div>

                        @if (in_array($course->id, $enrolledCourseIds))

                            <a href="{{ route('enrollments.index') }}"
                               class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl transition">

                                Lanjutkan Belajar →

                            </a>

                        @else

                            <form action="{{ route('courses.enroll', $course) }}" method="POST">
                                @csrf

                                <button
                                    type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl transition">

                                    Berlangganan Kursus

                                </button>

                            </form>

                        @endif

                    </div>

                </div>

                @empty

                <div class="col-span-full">

                    <div class="bg-white rounded-3xl p-12 text-center shadow-sm">

                        <div class="text-6xl mb-4">
                            📚
                        </div>

                        <h3 class="text-2xl font-bold text-slate-700 mb-2">
                            Belum Ada Kursus
                        </h3>

                        <p class="text-slate-500">
                            Saat ini belum ada kursus yang tersedia.
                        </p>

                    </div>

                </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>