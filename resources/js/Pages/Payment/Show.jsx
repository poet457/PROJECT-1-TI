import { Link, useForm } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const formatRupiah = (value) => `Rp ${Number(value || 0).toLocaleString('id-ID')}`;

const METODE_INFO = {
    transfer_bank: {
        title: 'Transfer Bank',
        desc: 'BCA, BNI, BRI, Mandiri — konfirmasi otomatis.',
    },
    qris: {
        title: 'QRIS',
        desc: 'Scan & bayar dari aplikasi e-wallet atau m-banking apa saja.',
    },
    e_wallet: {
        title: 'E-Wallet',
        desc: 'GoPay, OVO, DANA, ShopeePay.',
    },
};

export default function PaymentShow({ course, paymentMethods }) {
    const { data, setData, post, processing, errors } = useForm({
        metode_pembayaran: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('payment.process', course.id));
    };

    return (
        <AuthenticatedLayout>
            <div className="py-8">
                <div className="mx-auto max-w-5xl space-y-6 px-4 sm:px-6 lg:px-8">
                    <div>
                        <Link href={route('courses.index')} className="text-sm font-bold text-indigo-700 hover:text-indigo-900">
                            &larr; Kembali ke Paket Belajar
                        </Link>
                        <h1 className="mt-3 text-3xl font-extrabold tracking-tight text-slate-950">Pembayaran</h1>
                        <p className="mt-2 text-slate-600">Selesaikan pembayaran untuk mengaktifkan akses paket selama 30 hari.</p>
                    </div>

                    <div className="grid gap-6 lg:grid-cols-[1fr_1.2fr] lg:items-start">
                        <div className="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                            <p className="text-sm font-bold uppercase tracking-wide text-indigo-700">Ringkasan Paket</p>
                            <span className="mt-3 inline-flex rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700">
                                {course.kategori || 'Paket Belajar'}
                            </span>
                            <h2 className="mt-4 text-2xl font-extrabold text-slate-950">{course.nama_kursus}</h2>
                            <p className="mt-3 text-sm leading-6 text-slate-600">
                                {course.deskripsi || 'Paket belajar terstruktur bersama tutor EDUXCHANGE.'}
                            </p>

                            <div className="mt-6 space-y-3 border-t border-slate-100 pt-5">
                                <div className="flex items-center justify-between gap-4">
                                    <span className="text-sm font-semibold text-slate-500">Tutor</span>
                                    <span className="text-right text-sm font-bold text-slate-900">{course.tutor?.name || 'Tutor EDUXCHANGE'}</span>
                                </div>
                                <div className="flex items-center justify-between gap-4">
                                    <span className="text-sm font-semibold text-slate-500">Masa akses</span>
                                    <span className="text-sm font-bold text-slate-900">30 hari</span>
                                </div>
                            </div>

                            <div className="mt-6 flex items-center justify-between border-t border-slate-100 pt-5">
                                <span className="text-sm font-bold text-slate-500">Total Bayar</span>
                                <span className="text-2xl font-extrabold text-slate-950">{formatRupiah(course.harga)}</span>
                            </div>
                        </div>

                        <form onSubmit={submit} className="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                            <p className="text-sm font-bold uppercase tracking-wide text-indigo-700">Pilih Metode Pembayaran</p>

                            <div className="mt-4 space-y-3">
                                {paymentMethods.map((method) => {
                                    const info = METODE_INFO[method.value] || { title: method.label, desc: '' };
                                    const isSelected = data.metode_pembayaran === method.value;

                                    return (
                                        <label
                                            key={method.value}
                                            className={`flex cursor-pointer items-start gap-4 rounded-2xl border p-4 transition ${
                                                isSelected
                                                    ? 'border-indigo-600 bg-indigo-50/60 ring-1 ring-indigo-600'
                                                    : 'border-slate-200 hover:border-indigo-200'
                                            }`}
                                        >
                                            <input
                                                type="radio"
                                                name="metode_pembayaran"
                                                value={method.value}
                                                checked={isSelected}
                                                onChange={() => setData('metode_pembayaran', method.value)}
                                                className="mt-1 h-4 w-4 border-slate-300 text-indigo-600 focus:ring-indigo-600"
                                            />
                                            <span>
                                                <span className="block text-sm font-bold text-slate-950">{info.title}</span>
                                                <span className="mt-1 block text-xs font-medium text-slate-500">{info.desc}</span>
                                            </span>
                                        </label>
                                    );
                                })}
                            </div>

                            {errors.metode_pembayaran && (
                                <p className="mt-3 text-sm font-semibold text-rose-600">{errors.metode_pembayaran}</p>
                            )}

                            <div className="mt-6 rounded-2xl bg-slate-50 p-4 text-xs leading-5 text-slate-500">
                                Simulasi pembayaran — belum terhubung ke payment gateway sungguhan. Setelah dikonfirmasi, paket langsung aktif dan masuk ke Kelas Saya.
                            </div>

                            <button
                                type="submit"
                                disabled={processing || !data.metode_pembayaran}
                                className="mt-6 inline-flex w-full items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700 disabled:cursor-not-allowed disabled:opacity-50"
                            >
                                {processing ? 'Memproses pembayaran...' : `Bayar ${formatRupiah(course.harga)}`}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
