<nav x-data="{ open: false }" class="bg-white border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- KIRI -->
            <div class="flex items-center">

                <!-- LOGO EDUXCHANGE -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-indigo-600 to-cyan-500 flex items-center justify-center text-white font-bold text-lg">
                        🎓
                    </div>

                    <div>

                        <div class="font-extrabold text-xl text-slate-800">
                            EDUXCHANGE
                        </div>

                        <div class="text-xs text-slate-500">
                            Belajar Tanpa Batas
                        </div>

                    </div>

                </a>

                <!-- MENU -->
                <div class="hidden sm:flex ml-10 space-x-2">

                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 rounded-xl text-sm font-semibold transition
                       {{ request()->routeIs('dashboard')
                           ? 'bg-indigo-100 text-indigo-700'
                           : 'text-slate-600 hover:bg-slate-100' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('courses.index') }}"
                       class="px-4 py-2 rounded-xl text-sm font-semibold transition
                       {{ request()->routeIs('courses.*')
                           ? 'bg-indigo-100 text-indigo-700'
                           : 'text-slate-600 hover:bg-slate-100' }}">
                        Kursus
                    </a>

                    <a href="{{ route('enrollments.index') }}"
                       class="px-4 py-2 rounded-xl text-sm font-semibold transition
                       {{ request()->routeIs('enrollments.*')
                           ? 'bg-indigo-100 text-indigo-700'
                           : 'text-slate-600 hover:bg-slate-100' }}">
                        Kelas Saya
                    </a>

                </div>

            </div>

            <!-- KANAN -->
            <div class="hidden sm:flex items-center">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-100 transition">

                            <div class="w-9 h-9 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">

                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                            </div>

                            <div class="text-left">

                                <div class="font-semibold text-slate-800">
                                    {{ Auth::user()->name }}
                                </div>

                                <div class="text-xs text-slate-500">
                                    Student
                                </div>

                            </div>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            👤 Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                                🚪 Logout

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- MOBILE BUTTON -->
            <div class="flex items-center sm:hidden">

                <button
                    @click="open = !open"
                    class="p-2 rounded-lg hover:bg-slate-100">

                    <svg class="h-6 w-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- MOBILE MENU -->
    <div x-show="open" class="sm:hidden border-t bg-white">

        <div class="p-4 space-y-2">

            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-100">
                Dashboard
            </a>

            <a href="{{ route('courses.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-100">
                Kursus
            </a>

            <a href="{{ route('enrollments.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-100">
                Kelas Saya
            </a>

            <hr>

            <a href="{{ route('profile.edit') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-100">
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    class="w-full text-left px-4 py-2 rounded-lg hover:bg-slate-100">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>