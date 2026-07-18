import { useState } from 'react';
import { Link, usePage, router } from '@inertiajs/react';
import Dropdown from '@/Components/Dropdown';
import DropdownLink from '@/Components/DropdownLink';

export default function Navigation() {
    const { auth } = usePage().props;
    const [open, setOpen] = useState(false);
    const isAdmin = auth.user.role === 'admin';
    const homeRoute = isAdmin ? 'admin.dashboard' : 'dashboard';

    const isActive = (pattern) => route().current(pattern);

    const handleLogout = (e) => {
        e.preventDefault();
        router.post(route('logout'));
    };

    return (
        <nav className="sticky top-0 z-40 border-b border-slate-200 bg-white/95 shadow-sm backdrop-blur">
            <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div className="flex h-16 items-center justify-between">
                    <div className="flex items-center gap-8">
                        <Link href={route(homeRoute)} className="flex items-center gap-3">
                            <img
                                src="/images/eduxchange-logo.png"
                                alt="Logo EDUXCHANGE"
                                className="h-10 w-10 rounded-2xl object-cover shadow-sm shadow-indigo-200"
                            />
                            <div className="leading-tight">
                                <div className="text-lg font-extrabold tracking-tight text-slate-950">EDUXCHANGE</div>
                                <div className="text-xs font-medium text-slate-500">Bimbel online luas</div>
                            </div>
                        </Link>

                        <div className="hidden items-center gap-1 md:flex">
                            <Link
                                href={route(homeRoute)}
                                className={`rounded-xl px-4 py-2 text-sm font-semibold transition ${
                                    isActive(isAdmin ? 'admin.dashboard' : 'dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950'
                                }`}
                            >
                                Dashboard
                            </Link>
                            {!isAdmin && (
                                <>
                                    <Link
                                        href={route('courses.index')}
                                        className={`rounded-xl px-4 py-2 text-sm font-semibold transition ${
                                            isActive('courses.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950'
                                        }`}
                                    >
                                        Paket Belajar
                                    </Link>
                                    <Link
                                        href={route('enrollments.index')}
                                        className={`rounded-xl px-4 py-2 text-sm font-semibold transition ${
                                            isActive('enrollments.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950'
                                        }`}
                                    >
                                        Kelas Saya
                                    </Link>
                                </>
                            )}
                            {isAdmin && (
                                <>
                                    <Link
                                        href={route('admin.students.index')}
                                        className={`rounded-xl px-4 py-2 text-sm font-semibold transition ${
                                            isActive('admin.students.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950'
                                        }`}
                                    >
                                        Siswa
                                    </Link>
                                    <Link
                                        href={route('admin.courses.index')}
                                        className={`rounded-xl px-4 py-2 text-sm font-semibold transition ${
                                            isActive('admin.courses.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950'
                                        }`}
                                    >
                                        Kursus
                                    </Link>
                                </>
                            )}
                        </div>
                    </div>

                    <div className="hidden items-center gap-3 md:flex">
                        {!isAdmin && (
                            <Link
                                href={route('courses.index')}
                                className="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700"
                            >
                                Lihat Paket
                            </Link>
                        )}

                        <Dropdown
                            align="right"
                            trigger={
                                <button className="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-2 text-left transition hover:bg-slate-50">
                                    <div className="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-950 text-sm font-bold text-white">
                                        {auth.user.name.charAt(0).toUpperCase()}
                                    </div>
                                    <div className="min-w-0">
                                        <div className="max-w-32 truncate text-sm font-bold text-slate-900">{auth.user.name}</div>
                                        <div className="text-xs font-medium text-slate-500">{isAdmin ? 'Admin' : 'Student'}</div>
                                    </div>
                                </button>
                            }
                        >
                            <DropdownLink href={route('profile.edit')}>Profile</DropdownLink>
                            <DropdownLink as="button" onClick={handleLogout}>
                                Logout
                            </DropdownLink>
                        </Dropdown>
                    </div>

                    <button onClick={() => setOpen(!open)} className="inline-flex items-center justify-center rounded-xl border border-slate-200 p-2 text-slate-700 md:hidden">
                        <svg className="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M4 7h16M4 12h16M4 17h16" />
                        </svg>
                    </button>
                </div>
            </div>

            {open && (
                <div className="border-t border-slate-200 bg-white md:hidden">
                    <div className="space-y-1 px-4 py-4">
                        <Link href={route(homeRoute)} className="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Dashboard</Link>
                        {!isAdmin && (
                            <>
                                <Link href={route('courses.index')} className="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Paket Belajar</Link>
                                <Link href={route('enrollments.index')} className="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Kelas Saya</Link>
                            </>
                        )}
                        {isAdmin && (
                            <>
                                <Link href={route('admin.students.index')} className="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Siswa</Link>
                                <Link href={route('admin.courses.index')} className="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Kursus</Link>
                            </>
                        )}
                        <Link href={route('profile.edit')} className="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Profile</Link>
                        <button onClick={handleLogout} className="block w-full rounded-xl px-4 py-3 text-left text-sm font-semibold text-slate-700 hover:bg-slate-100">
                            Logout
                        </button>
                    </div>
                </div>
            )}
        </nav>
    );
}
