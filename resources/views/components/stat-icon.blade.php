@props(['type' => 'kursus'])

<div {{ $attributes->merge(['class' => 'flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl']) }}>
    @switch($type)
        @case('tutor')
            {{-- tutor / pengajar --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <circle cx="10" cy="8" r="3.3" />
                <path d="M4 20c0-3.6 2.7-6 6-6s6 2.4 6 6" />
                <polyline points="16.5 12.5 18 14 21 10.5" />
            </svg>
            @break

        @case('siswa')
            {{-- siswa / grup --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <circle cx="8.5" cy="8" r="3" />
                <path d="M2.5 20c0-3.3 2.7-5.5 6-5.5s6 2.2 6 5.5" />
                <circle cx="17" cy="8.5" r="2.4" />
                <path d="M15 14.7c2.6.3 4.5 2.3 4.5 5.3" />
            </svg>
            @break

        @case('transaksi')
            {{-- transaksi / dompet --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <path d="M3 7.5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-10z" />
                <path d="M16 12.2h3.2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H16a2 2 0 0 1 0-4z" />
                <line x1="6.5" y1="10.5" x2="12" y2="10.5" />
            </svg>
            @break

        @default
            {{-- kursus / buku --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <path d="M3.5 5.5c2.5-1 5-1 7 0v13c-2-1-4.5-1-7 0v-13z" />
                <path d="M20.5 5.5c-2.5-1-5-1-7 0v13c2-1 4.5-1 7 0v-13z" />
            </svg>
    @endswitch
</div>
