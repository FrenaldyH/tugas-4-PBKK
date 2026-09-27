@extends('layouts.app')

@section('title', 'Profil Mahasiswa')

@section('content')
    <section class="mb-12">
        <p class="link-cta text-muted dark:text-on-dark-soft">Profil</p>
        <h1 class="mt-4 text-display-md font-bold text-ink dark:text-on-dark lg:text-display-lg">Frenaldy Bestabba Hasugian</h1>
        <p class="mt-4 text-base text-body dark:text-on-dark-soft">
            Mahasiswa Teknik Informatika &middot; Institut Teknologi Sepuluh Nopember
        </p>
    </section>

    <div class="grid gap-6 md:grid-cols-2">
        <x-info-card subtitle="Biodata" title="Data Diri">
            <dl class="divide-y divide-hairline dark:divide-surface-dark">
                @foreach ([
        'Nama' => 'Frenaldy Bestabba Hasugian',
        'NRP' => '5025241156',
        'Departemen' => 'Teknik Informatika',
        'Angkatan' => '2024',
    ] as $label => $value)
                    <div class="flex justify-between gap-4 py-2">
                        <dt class="text-muted dark:text-on-dark-soft">{{ $label }}</dt>
                        <dd class="font-bold text-ink dark:text-on-dark">{{ $value }}</dd>
                    </div>
                @endforeach
            </dl>
        </x-info-card>

        <x-info-card subtitle="Kontak" title="Hubungi Saya">
            <ul class="space-y-2">
                <li>Email: frenaldyh@gmail.com</li>
                <li>GitHub: github.com/FrenaldyH</li>
                <li>LinkedIn: linkedin.com/in/frenaldyh</li>
            </ul>
        </x-info-card>

        <x-info-card subtitle="Pendidikan" title="Riwayat Akademik">
            <p class="font-bold text-ink dark:text-on-dark">S1 Teknik Informatika, ITS</p>
            <p class="mt-1 text-sm text-muted dark:text-on-dark-soft">2024 &ndash; sekarang</p>
        </x-info-card>

        <x-info-card subtitle="Kompetensi" title="Keahlian Teknis">
            {{-- BMW filter-chip: rectangular, hairline outline, caption type --}}
            <div class="flex flex-wrap gap-2">
                @foreach (['PHP', 'Laravel', 'JavaScript', 'Tailwind CSS', 'MySQL', 'Git'] as $skill)
                    <span
                        class="border border-hairline-strong px-4 py-2 text-xs tracking-[0.5px] text-ink dark:border-on-dark-soft dark:text-on-dark">
                        {{ $skill }}
                    </span>
                @endforeach
            </div>
        </x-info-card>
    </div>
@endsection
