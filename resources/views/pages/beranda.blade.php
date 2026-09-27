@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- Challenge 2: greet the visitor when the URL carries ?user=Andi --}}
    @if ($user)
        <x-status-banner type="success" class="mb-12">
            Selamat datang, <span class="font-bold">{{ $user }}</span>! Terima kasih sudah mampir ke portal ini.
        </x-status-banner>
    @endif

    {{-- BMW hero band: one dark navy block per page, framing the lead headline --}}
    <section class="bg-surface-dark px-8 py-section text-on-dark dark:bg-surface-dark-elevated">
        <p class="link-cta text-on-dark-soft">Secure Feedback Hub</p>
        <h1 class="mt-6 max-w-4xl text-display-md font-bold sm:text-display-lg lg:text-display-xl">
            Portal Profil Akademik
        </h1>
        <p class="mt-6 max-w-2xl text-base text-on-dark-soft">
            Mini-website akademik pribadi yang memuat profil mahasiswa, rancangan platform Agentic AI kelompok,
            serta formulir pengumpulan ide riset. Seluruh halaman diwarisi dari satu master layout Blade.
        </p>
        <a href="{{ route('ide-agent') }}"
            class="link-cta mt-10 inline-block border border-on-dark px-8 py-4 text-on-dark transition-colors hover:bg-on-dark hover:text-ink">
            Lihat Rancangan TokenPilot &rsaquo;
        </a>
    </section>

    <div class="mt-section grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <x-info-card subtitle="Halaman 1" title="Profil Mahasiswa">
            Biodata, riwayat pendidikan, dan kompetensi teknis yang disusun memakai komponen kartu reusable.
            <a href="{{ route('profil-mahasiswa') }}"
                class="link-cta mt-6 block text-ink transition-colors hover:text-primary dark:text-on-dark">
                Lihat Profil &rsaquo;
            </a>
        </x-info-card>

        <x-info-card subtitle="Halaman 2" title="TokenPilot">
            Rancangan platform Agentic AI kelompok: alur agent, tools, dan tech stack, beserta formulir pengumpulan ide.
            <a href="{{ route('ide-agent') }}"
                class="link-cta mt-6 block text-ink transition-colors hover:text-primary dark:text-on-dark">
                Lihat Rancangan &rsaquo;
            </a>
        </x-info-card>

        <x-info-card subtitle="Stack" title="Laravel 12 + Vite + Tailwind">
            Aset CSS dan font Inter dikompilasi lokal lewat Vite dan NPM, tanpa satu pun tautan CDN mentah.
        </x-info-card>
    </div>
@endsection
