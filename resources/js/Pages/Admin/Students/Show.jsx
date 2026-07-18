import { Link } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function AdminStudentShow({ student, summary, enrollments = [] }) {
    const summaryCards = [
        ['Total kelas', summary.total_enrollments],
        ['Kelas aktif', summary.active_enrollments],
        ['Rata-rata nilai', `${summary.average_score}%`],
        ['Sertifikat tersedia', summary.certificates_available],
    ];

    return (
        <AuthenticatedLayout>
            <div className="py-8">
                <div className="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
                    <section className="rounded-[2rem] bg-slate-950 p-8 text-white shadow-xl shadow-slate-200">
                        <Link href={route('admin.students.index')} className="text-sm font-bold text-indigo-200 hover:text-white">
                            Kembali ke daftar siswa
                        </Link>
                        <h1 className="mt-4 text-4xl font-extrabold tracking-tight">{student.name}</h1>
                        <p className="mt-3 text-slate-300">{student.email}</p>
                    </section>

                    <section className="grid gap-4 md:grid-cols-4">
                        {summaryCards.map(([label, value]) => (
                            <div key={label} className="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                                <p className="text-sm font-bold text-slate-500">{label}</p>
                                <p className="mt-2 text-2xl font-extrabold text-slate-950">{value}</p>
                            </div>
                        ))}
                    </section>

                    <section className="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div className="mb-6">
                            <p className="text-sm font-bold uppercase tracking-wide text-indigo-700">Progress belajar</p>
                            <h2 className="mt-2 text-2xl font-extrabold text-slate-950">Enrollment siswa</h2>
                        </div>

                        <div className="space-y-4">
                            {enrollments.length > 0 ? (
                                enrollments.map((enrollment) => (
                                    <article key={enrollment.id} className="rounded-3xl border border-slate-200 p-5">
                                        <div className="flex flex-col justify-between gap-4 md:flex-row md:items-start">
                                            <div>
                                                <div className="flex flex-wrap items-center gap-2">
                                                    <span className={`rounded-full px-3 py-1 text-xs font-bold ${enrollment.status === 'active' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600'}`}>
                                                        {enrollment.status === 'active' ? 'Aktif' : 'Selesai'}
                                                    </span>
                                                    <span className="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700">
                                                        {enrollment.course.kategori || 'Paket Belajar'}
                                                    </span>
                                                </div>
                                                <h3 className="mt-3 text-xl font-extrabold text-slate-950">{enrollment.course.nama_kursus}</h3>
                                                <p className="mt-1 text-sm font-medium text-slate-500">Tutor: {enrollment.course.tutor || 'Tutor EDUXCHANGE'}</p>
                                                <p className="mt-2 text-sm text-slate-600">
                                                    {enrollment.started_at} - {enrollment.ends_at}
                                                </p>
                                            </div>

                                            <div className="grid grid-cols-2 gap-3 text-center sm:grid-cols-4">
                                                <div className="rounded-2xl bg-slate-50 px-4 py-3">
                                                    <p className="text-lg font-extrabold text-slate-950">{enrollment.status === 'active' ? `${enrollment.sisa_hari} hari` : '0 hari'}</p>
                                                    <p className="text-xs font-bold text-slate-500">Sisa</p>
                                                </div>
                                                <div className="rounded-2xl bg-slate-50 px-4 py-3">
                                                    <p className="text-lg font-extrabold text-slate-950">{enrollment.score ?? 'Belum'}</p>
                                                    <p className="text-xs font-bold text-slate-500">Nilai</p>
                                                </div>
                                                <div className="rounded-2xl bg-slate-50 px-4 py-3">
                                                    <p className="text-lg font-extrabold text-slate-950">{enrollment.answered_count}</p>
                                                    <p className="text-xs font-bold text-slate-500">Jawaban</p>
                                                </div>
                                                <div className="rounded-2xl bg-slate-50 px-4 py-3">
                                                    <p className="text-lg font-extrabold text-slate-950">{enrollment.certificate_available ? 'Ya' : 'Belum'}</p>
                                                    <p className="text-xs font-bold text-slate-500">Sertifikat</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                ))
                            ) : (
                                <div className="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center">
                                    <h3 className="font-extrabold text-slate-950">Belum ada enrollment</h3>
                                    <p className="mt-2 text-sm text-slate-600">Siswa ini belum membeli paket belajar.</p>
                                </div>
                            )}
                        </div>
                    </section>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
