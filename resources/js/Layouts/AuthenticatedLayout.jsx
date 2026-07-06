import { usePage } from '@inertiajs/react';
import Navigation from './Navigation';

export default function AuthenticatedLayout({ children }) {
    const { flash } = usePage().props;

    return (
        <div className="min-h-screen bg-slate-50">
            <Navigation />
            <main>
                <div className="mx-auto max-w-7xl px-4 pt-6 sm:px-6 lg:px-8">
                    {flash?.success && (
                        <div className="mb-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                            {flash.success}
                        </div>
                    )}
                    {flash?.info && (
                        <div className="mb-4 rounded-2xl border border-sky-200 bg-sky-50 px-4 py-3 text-sm font-medium text-sky-800">
                            {flash.info}
                        </div>
                    )}
                    {flash?.error && (
                        <div className="mb-4 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-800">
                            {flash.error}
                        </div>
                    )}
                </div>
                {children}
            </main>
        </div>
    );
}
