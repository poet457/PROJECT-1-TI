@props(['kategori' => null])

@php
    $key = strtolower(trim($kategori ?? ''));

    $theme = 'akademik';

    if (str_contains($key, 'program') || str_contains($key, 'coding') || str_contains($key, 'web') || str_contains($key, 'react') || str_contains($key, 'laravel')) {
        $theme = 'programming';
    } elseif (str_contains($key, 'design') || str_contains($key, 'desain') || str_contains($key, 'ui') || str_contains($key, 'ux')) {
        $theme = 'design';
    } elseif (str_contains($key, 'data')) {
        $theme = 'data';
    } elseif (str_contains($key, 'marketing') || str_contains($key, 'pemasaran')) {
        $theme = 'marketing';
    } elseif (str_contains($key, 'bahasa') || str_contains($key, 'language') || str_contains($key, 'english') || str_contains($key, 'inggris')) {
        $theme = 'bahasa';
    } elseif (str_contains($key, 'digital') || str_contains($key, 'skill') || str_contains($key, 'tools')) {
        $theme = 'digital';
    } elseif (str_contains($key, 'karier') || str_contains($key, 'karir') || str_contains($key, 'career')) {
        $theme = 'karier';
    } elseif (str_contains($key, 'ujian') || str_contains($key, 'exam') || str_contains($key, 'test')) {
        $theme = 'ujian';
    }

    $colors = [
        'akademik'    => 'bg-indigo-50 text-indigo-600',
        'programming' => 'bg-violet-50 text-violet-600',
        'design'      => 'bg-fuchsia-50 text-fuchsia-600',
        'data'        => 'bg-emerald-50 text-emerald-600',
        'marketing'   => 'bg-orange-50 text-orange-600',
        'bahasa'      => 'bg-sky-50 text-sky-600',
        'digital'     => 'bg-cyan-50 text-cyan-600',
        'karier'      => 'bg-rose-50 text-rose-600',
        'ujian'       => 'bg-amber-50 text-amber-600',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'flex shrink-0 items-center justify-center rounded-2xl ' . $colors[$theme]]) }}>
    @switch($theme)
        @case('programming')
            {{-- kode / programming --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <polyline points="9 8 5 12 9 16" />
                <polyline points="15 8 19 12 15 16" />
                <line x1="13" y1="6" x2="11" y2="18" />
            </svg>
            @break

        @case('design')
            {{-- pena / desain --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <path d="M4 20l4.5-1.2L18 9.3a1.8 1.8 0 0 0 0-2.6l-.7-.7a1.8 1.8 0 0 0-2.6 0L5.2 15.5 4 20z" />
                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
            </svg>
            @break

        @case('data')
            {{-- grafik / data --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <line x1="5" y1="21" x2="5" y2="12" />
                <line x1="12" y1="21" x2="12" y2="7" />
                <line x1="19" y1="21" x2="19" y2="15" />
                <line x1="3" y1="21" x2="21" y2="21" />
            </svg>
            @break

        @case('marketing')
            {{-- toa / marketing --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <path d="M3 10v4a1 1 0 0 0 1 1h2l4 4V5L6 9H4a1 1 0 0 0-1 1z" />
                <path d="M14 8.5a4 4 0 0 1 0 7" />
                <path d="M17.5 6a8 8 0 0 1 0 12" />
            </svg>
            @break

        @case('bahasa')
            {{-- globe / bahasa --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <circle cx="12" cy="12" r="8.5" />
                <line x1="3.5" y1="12" x2="20.5" y2="12" />
                <path d="M12 3.5c2.3 2.3 3.5 5.3 3.5 8.5s-1.2 6.2-3.5 8.5c-2.3-2.3-3.5-5.3-3.5-8.5S9.7 5.8 12 3.5z" />
            </svg>
            @break

        @case('digital')
            {{-- chip / skill digital --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <rect x="7" y="7" width="10" height="10" rx="1.5" />
                <line x1="12" y1="2" x2="12" y2="5" />
                <line x1="12" y1="19" x2="12" y2="22" />
                <line x1="2" y1="12" x2="5" y2="12" />
                <line x1="19" y1="12" x2="22" y2="12" />
                <line x1="4.8" y1="4.8" x2="6.7" y2="6.7" />
                <line x1="17.3" y1="17.3" x2="19.2" y2="19.2" />
                <line x1="4.8" y1="19.2" x2="6.7" y2="17.3" />
                <line x1="17.3" y1="6.7" x2="19.2" y2="4.8" />
            </svg>
            @break

        @case('karier')
            {{-- koper / karier --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <rect x="3" y="7.5" width="18" height="12" rx="1.8" />
                <path d="M8.5 7.5V6a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v1.5" />
                <line x1="3" y1="12.5" x2="21" y2="12.5" />
            </svg>
            @break

        @case('ujian')
            {{-- clipboard / ujian --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <rect x="5" y="4" width="14" height="17" rx="1.8" />
                <path d="M9 3.5h6a1 1 0 0 1 1 1V6H8V4.5a1 1 0 0 1 1-1z" />
                <polyline points="8.5 13 10.5 15 15.5 10" />
            </svg>
            @break

        @default
            {{-- topi wisuda / akademik --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <path d="M2 9.5L12 5l10 4.5-10 4.5L2 9.5z" />
                <path d="M6.5 11.7v4.3c0 1.4 2.5 2.5 5.5 2.5s5.5-1.1 5.5-2.5v-4.3" />
                <path d="M20.5 9.5v5" />
            </svg>
    @endswitch
</div>
