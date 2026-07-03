<nav x-data="{ open: false }" class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 shadow-sm backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-600 text-sm font-black text-white shadow-sm shadow-indigo-200">
                        EX
                    </div>
                    <div class="leading-tight">
                        <div class="text-lg font-extrabold tracking-tight text-slate-950">EDUXCHANGE</div>
                        <div class="text-xs font-medium text-slate-500">Bimbel online luas</div>
                    </div>
                </a>

                <div class="hidden items-center gap-1 md:flex">
                    <a href="{{ route('dashboard') }}"
                       class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('courses.index') }}"
                       class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('courses.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950' }}">
                        Paket Belajar
                    </a>
                    <a href="{{ route('enrollments.index') }}"
                       class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('enrollments.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950' }}">
                        Kelas Saya
                    </a>
                </div>
            </div>

            <div class="hidden items-center gap-3 md:flex">
                <a href="{{ route('courses.index') }}" class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">
                    Lihat Paket
                </a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-2 text-left transition hover:bg-slate-50">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-950 text-sm font-bold text-white">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <div class="max-w-32 truncate text-sm font-bold text-slate-900">{{ Auth::user()->name }}</div>
                                <div class="text-xs font-medium text-slate-500">Student</div>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <button @click="open = !open" class="inline-flex items-center justify-center rounded-xl border border-slate-200 p-2 text-slate-700 md:hidden">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" x-cloak class="border-t border-slate-200 bg-white md:hidden">
        <div class="space-y-1 px-4 py-4">
            <a href="{{ route('dashboard') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Dashboard</a>
            <a href="{{ route('courses.index') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Paket Belajar</a>
            <a href="{{ route('enrollments.index') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Kelas Saya</a>
            <a href="{{ route('profile.edit') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="block w-full rounded-xl px-4 py-3 text-left text-sm font-semibold text-slate-700 hover:bg-slate-100">Logout</button>
            </form>
        </div>
    </div>
</nav>