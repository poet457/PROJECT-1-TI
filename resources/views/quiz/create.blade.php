<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Kuis: {{ $enrollment->course->nama_kursus }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('quiz.store', $enrollment) }}" method="POST" class="space-y-6">
                @csrf

                @foreach ($questions as $question)

                    <div class="bg-white rounded-xl shadow p-6">

                        <p class="font-semibold mb-4">
                            {{ $loop->iteration }}. {{ $question->pertanyaan }}
                        </p>

                        <div class="space-y-2">

                            @foreach (['a', 'b', 'c', 'd'] as $opsi)

                                <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input
                                        type="radio"
                                        name="jawaban[{{ $question->id }}]"
                                        value="{{ $opsi }}"
                                        @checked(($jawabanSebelumnya[$question->id] ?? null) === $opsi)
                                        required
                                        class="text-indigo-600"
                                    >
                                    <span>{{ strtoupper($opsi) }}. {{ $question->{"pilihan_{$opsi}"} }}</span>
                                </label>

                            @endforeach

                        </div>

                        @error("jawaban.{$question->id}")
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                @endforeach

                <div class="flex justify-end">
                    <button type="submit"
                            class="px-6 py-2 rounded-md bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
                        Selesai & Lihat Nilai
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-app-layout>
