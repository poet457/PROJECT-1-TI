import { Link, router, useForm } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function AdminStudentsIndex({ students = [], filters = {}, categories = [] }) {
    const { data, setData } = useForm({
        search: filters.search || '',
        status: filters.status || '',
        kategori: filters.kategori || '',
    });

    const applyFilters = (event) => {
        event.preventDefault();
        router.get(route('admin.students.index'), data, {
            preserveState: true,
            preserveScroll: true,
        });
    };

    const resetFilters = () => {
        router.get(route('admin.students.index'));
    };

    return (
        <AuthenticatedLayout>
            <div className="py-8">
                <div className="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
                    <section className="rounded-[2rem] bg-slate-950 p-8 text-white shadow-xl shadow-slate-200">
                        <p className="text-sm font-bold uppercase tracking-wide text-indigo-200">Data siswa</p>
                        <h1 className="mt-3 text-4xl font-extrabold tracking-tight">Monitoring progress siswa.</h1>
                        <p className="mt-4 max-w-2xl text-slate-300">
                            Cari siswa, filter berdasarkan kategori course, dan cek status enrollment aktif atau expired.
                        </p>
                    </section>

                    <form onSubmit={applyFilters} className="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                        <div className="grid gap-3 lg:grid-cols-[1fr_220px_220px_auto_auto]">
                            <input
                                value={data.search}
                                onChange={(event) => setData('search', event.target.value)}
                                placeholder="Cari nama atau email"
                                className="rounded-2xl border-slate-200 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                            />
                            <select
                                value={data.status}
                                onChange={(event) => setData('status', event.target.value)}
                                className="rounded-2xl border-slate-200 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="">Semua status</option>
                                <option value="active">Aktif</option>
                                <option value="expired">Expired</option>
                            </select>
                            <select
                                value={data.kategori}
                                onChange={(event) => setData('kategori', event.target.value)}
                                className="rounded-2xl border-slate-200 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="">Semua kategori</option>
                                {categories.map((category) => (
                                    <option key={category} value={category}>{category}</option>
                                ))}
                            </select>
                            <button type="submit" className="rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700">
                                Filter
                            </button>
                            <button type="button" onClick={resetFilters} className="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-50">
                                Reset
                            </button>
                        </div>
                    </form>

                    <section className="rounded-3xl border border-slate-200 bg-white shadow-sm">
                        {students.length > 0 ? (
                            <div className="divide-y divide-slate-200">
                                {students.map((student) => (
                                    <div key={student.id} className="grid gap-4 p-5 md:grid-cols-[1fr_auto_auto] md:items-center">
                                        <div>
                                            <p className="text-lg font-extrabold text-slate-950">{student.name}</p>
                                            <p className="text-sm font-medium text-slate-500">{student.email}</p>
                                        </div>
                                        <div className="grid grid-cols-2 gap-3 text-center">
                                            <div className="rounded-2xl bg-slate-50 px-4 py-3">
                                                <p className="text-lg font-extrabold text-slate-950">{student.enrollments_count}</p>
                                                <p className="text-xs font-bold text-slate-500">Total kelas</p>
                                            </div>
                                            <div className="rounded-2xl bg-emerald-50 px-4 py-3">
                                                <p className="text-lg font-extrabold text-emerald-700">{student.active_enrollments_count}</p>
                                                <p className="text-xs font-bold text-emerald-700">Aktif</p>
                                            </div>
                                        </div>
                                        <Link
                                            href={route('admin.students.show', student.id)}
                                            className="inline-flex items-center justify-center rounded-2xl bg-slate-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700"
                                        >
                                            Detail
                                        </Link>
                                    </div>
                                ))}
                            </div>
                        ) : (
                            <div className="p-12 text-center">
                                <h3 className="text-xl font-extrabold text-slate-950">Siswa tidak ditemukan</h3>
                                <p className="mt-2 text-sm text-slate-600">Coba ubah filter atau kata pencarian.</p>
                            </div>
                        )}
                    </section>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
