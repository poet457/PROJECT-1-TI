import { Link } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const formatRupiah = (value) => `Rp ${Number(value || 0).toLocaleString('id-ID')}`;

export default function PaymentSuccess({ transaction }) {
    return (
        <AuthenticatedLayout>
            <div className="py-8">
                <div className="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
                    <div className="rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-sm">
                        <div className="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-50">
                            <svg className="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2.5}>
                                <path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>

                        <h1 className="mt-6 text-2xl font-extrabold tracking-tight text-slate-950">Pembayaran Berhasil</h1>
                        <p className="mt-2 text-slate-600">
                            Paket &ldquo;{transaction.course.nama_kursus}&rdquo; sudah aktif dan siap dipelajari.
                        </p>

                        <div className="mt-8 space-y-3 rounded-2xl border border-slate-100 bg-slate-50 p-5 text-left">
                            <div className="flex items-center justify-between gap-4">
                                <span className="text-sm font-semibold text-slate-500">No. Transaksi</span>
                                <span className="text-sm font-bold text-slate-900">#{String(transaction.id).padStart(6, '0')}</span>
                            </div>
                            <div className="flex items-center justify-between gap-4">
                                <span className="text-sm font-semibold text-slate-500">Tanggal</span>
                                <span className="text-sm font-bold text-slate-900">{transaction.created_at}</span>
                            </div>
                            <div className="flex items-center justify-between gap-4">
                                <span className="text-sm font-semibold text-slate-500">Tutor</span>
                                <span className="text-sm font-bold text-slate-900">{transaction.course.tutor?.name || 'Tutor EDUXCHANGE'}</span>
                            </div>
                            <div className="flex items-center justify-between gap-4">
                                <span className="text-sm font-semibold text-slate-500">Metode Pembayaran</span>
                                <span className="text-sm font-bold text-slate-900">{transaction.metode_pembayaran}</span>
                            </div>
                            <div className="flex items-center justify-between gap-4">
                                <span className="text-sm font-semibold text-slate-500">Aktif Sampai</span>
                                <span className="text-sm font-bold text-slate-900">{transaction.ends_at}</span>
                            </div>
                            <div className="flex items-center justify-between gap-4 border-t border-slate-200 pt-3">
                                <span className="text-sm font-bold text-slate-500">Total Dibayar</span>
                                <span className="text-lg font-extrabold text-slate-950">{formatRupiah(transaction.course.harga)}</span>
                            </div>
                        </div>

                        <div className="mt-8 flex flex-col gap-3 sm:flex-row">
                            {transaction.enrollment_id ? (
                                <Link
                                    href={route('enrollments.show', transaction.enrollment_id)}
                                    className="inline-flex flex-1 items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700"
                                >
                                    Mulai Belajar
                                </Link>
                            ) : (
                                <Link
                                    href={route('enrollments.index')}
                                    className="inline-flex flex-1 items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700"
                                >
                                    Buka Kelas Saya
                                </Link>
                            )}
                            <Link
                                href={route('courses.index')}
                                className="inline-flex flex-1 items-center justify-center rounded-2xl border border-slate-200 px-5 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-50"
                            >
                                Lihat Paket Lain
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
