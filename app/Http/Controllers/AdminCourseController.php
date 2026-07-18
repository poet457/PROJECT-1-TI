<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tutor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminCourseController extends Controller
{
    /**
     * Daftar seluruh paket kursus untuk dikelola admin.
     */
    public function index(Request $request): Response
    {
        $search = $request->string('search')->toString();

        $courses = Course::with('tutor.user')
            ->withCount(['enrollments', 'materials', 'questions'])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('nama_kursus', 'like', "%{$search}%")
                        ->orWhere('kategori', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get()
            ->map(fn (Course $course) => [
                'id' => $course->id,
                'nama_kursus' => $course->nama_kursus,
                'kategori' => $course->kategori,
                'harga' => $course->harga,
                'tutor' => $course->tutor?->user?->name ?? 'Tutor EDUXCHANGE',
                'enrollments_count' => $course->enrollments_count,
                'materials_count' => $course->materials_count,
                'questions_count' => $course->questions_count,
            ]);

        return Inertia::render('Admin/Courses/Index', [
            'courses' => $courses,
            'filters' => [
                'search' => $search,
            ],
        ]);
    }

    /**
     * Form tambah paket kursus baru.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Courses/Create', [
            'tutors' => $this->tutorOptions(),
            'categories' => $this->categoryOptions(),
        ]);
    }

    /**
     * Simpan paket kursus baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Paket kursus berhasil ditambahkan.');
    }

    /**
     * Form edit paket kursus.
     */
    public function edit(Course $course): Response
    {
        return Inertia::render('Admin/Courses/Edit', [
            'course' => [
                'id' => $course->id,
                'tutor_id' => $course->tutor_id,
                'nama_kursus' => $course->nama_kursus,
                'kategori' => $course->kategori,
                'harga' => $course->harga,
                'deskripsi' => $course->deskripsi,
            ],
            'tutors' => $this->tutorOptions(),
            'categories' => $this->categoryOptions(),
        ]);
    }

    /**
     * Update paket kursus.
     */
    public function update(Request $request, Course $course): RedirectResponse
    {
        $data = $this->validated($request);

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Paket kursus berhasil diperbarui.');
    }

    /**
     * Hapus paket kursus. Materi, soal, enrollment, dan transaksi terkait
     * ikut terhapus otomatis (cascade) sesuai relasi di database.
     */
    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Paket kursus berhasil dihapus.');
    }

    /**
     * Validasi input form tambah/edit kursus.
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'tutor_id' => ['required', 'exists:tutors,id'],
            'nama_kursus' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
        ]);
    }

    /**
     * Opsi tutor untuk dropdown form (dipakai di Create & Edit).
     */
    private function tutorOptions()
    {
        return Tutor::with('user')
            ->get()
            ->map(fn (Tutor $tutor) => [
                'id' => $tutor->id,
                'name' => $tutor->user?->name ?? 'Tutor EDUXCHANGE',
            ])
            ->values();
    }

    /**
     * Kategori yang sudah ada, dipakai sebagai saran cepat di form
     * supaya penamaan kategori tetap konsisten dengan halaman student.
     */
    private function categoryOptions()
    {
        return Course::query()
            ->select('kategori')
            ->distinct()
            ->orderBy('kategori')
            ->pluck('kategori');
    }
}
