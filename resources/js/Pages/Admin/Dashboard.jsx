import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const formatRupiah = (value) => `Rp ${Number(value || 0).toLocaleString('id-ID')}`;

export default function AdminDashboard({ stats, recentTransactions = [] }) {
    const statCards = [
        ['Total Siswa', stats.students, 'bg-emerald-50 text-emerald-700'],
        ['Total Kursus', stats.courses, 'bg-indigo-50 text-indigo-700'],
        ['Enrollment Aktif', stats.active_enrollments, 'bg-sky-50 text-sky-700'],
        ['Enrollment Expired', stats.expired_enrollments, 'bg-amber-50 text-amber-700'],
        ['Transaksi Sukses', stats.successful_transactions, 'bg-violet-50 text-violet-700'],
        ['Estimasi Revenue', formatRupiah(stats.revenue), 'bg-rose-50 text-rose-700'],
    ];

    return (
        <AuthenticatedLayout>
            <div className="py-8">
                <div className="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
                    <section className="rounded-[2rem] bg-slate-950 p-8 text-white shadow-xl shadow-slate-200">
                        <p className="text-sm font-bold uppercase tracking-wide text-indigo-200">Dashboard admin</p>
                        <h1 className="mt-3 text-4xl font-extrabold tracking-tight">Monitoring EduXchange.</h1>
                        <p className="mt-4 max-w-2xl text-slate-300">
                            Pantau siswa, kursus, enrollment aktif/expired, transaksi, dan revenue dari paket belajar.
                        </p>
                    </section>

                    <section className="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                        {statCards.map(([label, value, color]) => (
                            <div key={label} className="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                                <div className="flex items-center justify-between">
                                    <p className="text-sm font-bold text-slate-500">{label}</p>
                                    <span className={`h-10 w-10 rounded-2xl ${color}`}></span>
                                </div>
                                <p className="mt-5 text-3xl font-extrabold tracking-tight text-slate-950">{value}</p>
                            </div>
                        ))}
                    </section>

                    <section className="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div className="mb-6">
                            <p className="text-sm font-bold uppercase tracking-wide text-indigo-700">Transaksi terbaru</p>
                            <h2 className="mt-2 text-2xl font-extrabold text-slate-950">Pembelian paket sukses</h2>
                        </div>

                        <div className="overflow-hidden rounded-2xl border border-slate-200">
                            {recentTransactions.length > 0 ? (
                                <div className="divide-y divide-slate-200">
                                    {recentTransactions.map((transaction) => (
                                        <div key={transaction.id} className="grid gap-3 p-4 sm:grid-cols-[1fr_1fr_auto] sm:items-center">
                                            <div>
                                                <p className="font-extrabold text-slate-950">{transaction.student}</p>
                                                <p className="text-sm font-medium text-slate-500">{transaction.created_at}</p>
                                            </div>
                                            <p className="text-sm font-semibold text-slate-700">{transaction.course}</p>
                                            <p className="font-extrabold text-slate-950">{formatRupiah(transaction.amount)}</p>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <div className="p-8 text-center">
                                    <h3 className="font-extrabold text-slate-950">Belum ada transaksi sukses</h3>
                                    <p className="mt-2 text-sm text-slate-600">Data transaksi akan tampil di sini.</p>
                                </div>
                            )}
                        </div>
                    </section>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
