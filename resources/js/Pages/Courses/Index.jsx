import { Link, router } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const formatRupiah = (value) => `Rp ${Number(value || 0).toLocaleString('id-ID')}`;

const limitText = (text, maxLength = 115) => {
    const fallback = 'Paket belajar terstruktur bersama tutor EDUXCHANGE.';
    const value = text || fallback;

    return value.length > maxLength ? `${value.slice(0, maxLength).trim()}...` : value;
};

export default function CoursesIndex({ courses = [], enrolledCourseIds = [] }) {
    const handleEnroll = (courseId) => {
        router.post(route('courses.enroll', courseId), {}, {
            preserveScroll: true,
        });
    };

    return (
        <AuthenticatedLayout>
            <div className="py-8">
                <div className="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
                    <section className="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
                        <div className="grid gap-8 lg:grid-cols-[1fr_0.7fr] lg:items-end">
                            <div>
                                <p className="text-sm font-bold uppercase tracking-wide text-indigo-700">Paket belajar</p>
                                <h1 className="mt-3 text-4xl font-extrabold tracking-tight text-slate-950">Pilih paket bimbel 30 hari.</h1>
                                <p className="mt-4 max-w-2xl text-slate-600">
                                    Temukan paket akademik, digital skill, bahasa, karier, dan persiapan ujian. Setelah berlangganan, paket langsung masuk ke Kelas Saya.
                                </p>
                            </div>

                            <div className="rounded-3xl bg-indigo-50 p-5">
                                <p className="text-sm font-bold text-indigo-700">Model akses</p>
                                <p className="mt-2 text-3xl font-extrabold text-slate-950">30 hari</p>
                                <p className="mt-2 text-sm leading-6 text-slate-600">Akses materi, kuis, dan sertifikat sesuai progres belajar.</p>
                            </div>
                        </div>
                    </section>

                    <section className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        {courses.length > 0 ? (
                            courses.map((course) => {
                                const isEnrolled = enrolledCourseIds.includes(course.id);

                                return (
                                    <article
                                        key={course.id}
                                        className="flex flex-col rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200"
                                    >
                                        <div className="flex items-start justify-between gap-4">
                                            <div className="h-12 w-12 rounded-2xl bg-indigo-50"></div>
                                            <span className={`rounded-full px-3 py-1 text-xs font-bold ${isEnrolled ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600'}`}>
                                                {isEnrolled ? 'Aktif' : 'Belum Berlangganan'}
                                            </span>
                                        </div>

                                        <div className="mt-6 flex-1">
                                            <span className="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700">
                                                {course.kategori || 'Paket Belajar'}
                                            </span>
                                            <h2 className="mt-4 text-2xl font-extrabold tracking-tight text-slate-950">{course.nama_kursus}</h2>
                                            <p className="mt-3 text-sm leading-6 text-slate-600">{limitText(course.deskripsi)}</p>
                                        </div>

                                        <div className="mt-6 space-y-3 border-t border-slate-100 pt-5">
                                            <div className="flex items-center justify-between gap-4">
                                                <span className="text-sm font-semibold text-slate-500">Tutor</span>
                                                <span className="text-right text-sm font-bold text-slate-900">{course.tutor?.name || 'Tutor EDUXCHANGE'}</span>
                                            </div>
                                            <div className="flex items-center justify-between gap-4">
                                                <span className="text-sm font-semibold text-slate-500">Durasi akses</span>
                                                <span className="text-sm font-bold text-slate-900">30 hari</span>
                                            </div>
                                            <div className="flex items-center justify-between gap-4">
                                                <span className="text-sm font-semibold text-slate-500">Harga</span>
                                                <span className="text-lg font-extrabold text-slate-950">{formatRupiah(course.harga)}</span>
                                            </div>
                                        </div>

                                        <div className="mt-6">
                                            {isEnrolled ? (
                                                <Link
                                                    href={route('enrollments.index')}
                                                    className="inline-flex w-full items-center justify-center rounded-2xl bg-emerald-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-emerald-700"
                                                >
                                                    Lanjutkan Belajar
                                                </Link>
                                            ) : (
                                                <button
                                                    type="button"
                                                    onClick={() => handleEnroll(course.id)}
                                                    className="inline-flex w-full items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700"
                                                >
                                                    Berlangganan Paket
                                                </button>
                                            )}
                                        </div>
                                    </article>
                                );
                            })
                        ) : (
                            <div className="col-span-full rounded-3xl border border-dashed border-slate-300 bg-white p-12 text-center">
                                <h3 className="text-2xl font-extrabold text-slate-950">Belum ada paket belajar</h3>
                                <p className="mt-3 text-slate-600">Saat ini belum ada kursus yang tersedia.</p>
                            </div>
                        )}
                    </section>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
