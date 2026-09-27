@extends('layouts.app')

@section('title', 'Ide Riset: TokenPilot')

@section('content')
    {{-- BMW hero band: the single dark block that frames this page's lead --}}
    <section class="bg-surface-dark px-8 py-section text-on-dark dark:bg-surface-dark-elevated">
        <p class="link-cta text-on-dark-soft">Ide Riset Kelompok</p>
        <h1 class="mt-6 text-display-md font-bold sm:text-display-lg lg:text-display-xl">TokenPilot</h1>
        <p class="mt-6 max-w-3xl text-base text-on-dark-soft">
            Mengatur informasi agar AI coding bisa bekerja lebih terarah. TokenPilot adalah website untuk memberikan
            tugas coding; di belakangnya ada agent yang memilih informasi dari project, mengirim tugas ke coding AI,
            lalu memantau dan memeriksa hasilnya.
        </p>
    </section>

    @if (session('status'))
        <x-status-banner type="success" class="mt-section">{{ session('status') }}</x-status-banner>
    @endif

    @if ($errors->any())
        <x-status-banner type="error" class="mt-section">
            <ul class="list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-status-banner>
    @endif

    <section class="mt-section">
        <h2 class="text-display-sm font-bold text-ink dark:text-on-dark">Masalah &amp; Pembagian Tugas AI</h2>
        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <x-info-card subtitle="Masalah" title="Konteks yang tidak terkendali">
                Informasi yang diberikan ke AI coding bisa terlalu luas, berulang, atau justru kurang, sehingga AI
                membaca banyak file dan mencoba berkali-kali. Prompt pendek belum tentu berarti seluruh pekerjaan
                lebih hemat.
            </x-info-card>

            <x-info-card subtitle="Peran 1" title="Local LLM">
                AI yang berjalan di komputer sendiri. Memilih langkah kecil tentang informasi apa yang perlu
                digunakan, dengan pilihan tindakan yang sengaja dibatasi.
            </x-info-card>

            <x-info-card subtitle="Peran 2" title="Codex / Claude">
                Coding AI yang menganalisis masalah sulit dan benar-benar mengubah kode. Versi awal cukup satu
                provider.
            </x-info-card>

            <x-info-card subtitle="Peran 3" title="Program TokenPilot">
                Menjalankan pencarian dan test, menghitung penggunaan token, serta menegakkan batas percobaan dan
                timeout.
            </x-info-card>

            <x-info-card subtitle="Target" title="Efisiensi yang diuji">
                Penggunaan token lebih efisien dengan hasil tugas yang tetap benar. Penghematan harus diuji lewat
                perbandingan, bukan dijanjikan sejak awal.
            </x-info-card>

            <x-info-card subtitle="Batas" title="Keputusan tetap dijaga program">
                Test dijalankan oleh program; keberhasilan tidak boleh hanya berdasarkan ucapan AI. Kredensial coding
                AI tetap berada di perangkat lokal.
            </x-info-card>
        </div>
    </section>

    <section class="mt-section">
        <h2 class="text-display-sm font-bold text-ink dark:text-on-dark">Di mana sisi agentic-nya?</h2>
        <p class="mt-4 max-w-3xl text-base text-body dark:text-on-dark-soft">
            Agent memilih langkah berdasarkan kondisi yang baru ditemukan &mdash; urutannya tidak wajib sama pada
            setiap tugas.
        </p>

        <div class="mt-8 overflow-x-auto border border-hairline dark:border-surface-dark-elevated">
            <table class="w-full text-left text-base">
                <thead class="bg-surface-soft text-ink dark:bg-surface-dark-elevated dark:text-on-dark">
                    <tr>
                        <th class="px-6 py-4 font-bold">Kondisi</th>
                        <th class="px-6 py-4 font-bold">Pilihan tindakan agent</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-hairline text-body dark:divide-surface-dark-elevated dark:text-on-dark-soft">
                    @foreach ([
        'Ada catatan yang mungkin berguna' => 'Periksa catatan lama sebelum mencari ulang.',
        'Informasi belum cukup' => 'Cari file atau potongan kode tambahan.',
        'Informasi awal cukup' => 'Jalankan coding AI.',
        'Hasil belum memenuhi kebutuhan' => 'Tambah informasi dan coba lagi jika diizinkan.',
        'Hasil sudah diperiksa atau proses terhambat' => 'Akhiri pekerjaan dengan status dan penjelasan.',
    ] as $kondisi => $tindakan)
                        <tr>
                            <td class="px-6 py-4 font-bold text-ink dark:text-on-dark">{{ $kondisi }}</td>
                            <td class="px-6 py-4">{{ $tindakan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="mt-section">
        <h2 class="text-display-sm font-bold text-ink dark:text-on-dark">Tools yang Dipanggil Agent</h2>
        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <x-info-card subtitle="Mencari" title="search_context">
                Menemukan kandidat file yang mungkin relevan beserta alasan kecocokannya &mdash; belum berarti seluruh
                file dikirim ke AI.
            </x-info-card>

            <x-info-card subtitle="Membaca" title="read_context">
                Membaca potongan kode terpilih, mencatat sidik jari file, dan memperkirakan ukuran token.
            </x-info-card>

            <x-info-card subtitle="Mengingat" title="find_memory & validate_memory">
                Mencari catatan pekerjaan lama, lalu memastikan catatan itu masih cocok dengan kondisi file saat ini.
            </x-info-card>

            <x-info-card subtitle="Menyiapkan" title="compile_prompt & recommend_model">
                Menyusun instruksi dari informasi terpilih, lalu menyarankan model dan effort beserta alasannya.
            </x-info-card>

            <x-info-card subtitle="Menjalankan" title="run_coding_task & validate_result">
                Menjalankan coding AI di tempat kerja terpisah, lalu mengumpulkan bukti lewat test dan build.
            </x-info-card>

            <x-info-card subtitle="Melaporkan" title="get_usage & compare_runs">
                Meringkas token seluruh percobaan termasuk retry, dan membandingkan hasil dengan pengerjaan tanpa
                TokenPilot.
            </x-info-card>
        </div>
    </section>

    <section class="mt-section">
        <h2 class="text-display-sm font-bold text-ink dark:text-on-dark">Tech Stack</h2>
        <div class="mt-8 flex flex-wrap gap-2">
            @foreach (['Laravel + Blade/Livewire', 'PostgreSQL', 'Python', 'Ollama + Local LLM', 'Codex CLI', 'Python MCP SDK', 'Git'] as $tech)
                <span
                    class="border border-hairline-strong px-4 py-2 text-xs tracking-[0.5px] text-ink dark:border-on-dark-soft dark:text-on-dark">
                    {{ $tech }}
                </span>
            @endforeach
        </div>
    </section>

    <section class="mt-section">
        <h2 class="text-display-sm font-bold text-ink dark:text-on-dark">Kirim Ide Anda</h2>
        <p class="mt-4 text-base text-body dark:text-on-dark-soft">
            Punya usulan fitur atau tool tambahan untuk TokenPilot? Tuliskan di bawah ini.
        </p>

        <form method="POST" action="{{ route('ide-agent.submit') }}"
            class="mt-8 max-w-2xl space-y-6 border border-hairline bg-canvas p-8 dark:border-surface-dark-elevated dark:bg-surface-dark-elevated">
            @csrf

            <div>
                <label for="nama" class="link-cta block text-muted dark:text-on-dark-soft">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                    class="mt-3 h-12 w-full border border-hairline bg-canvas px-4 text-base text-ink focus:border-ink focus:outline-none dark:border-on-dark-soft dark:bg-surface-dark dark:text-on-dark dark:focus:border-on-dark">
            </div>

            <div>
                <label for="ide" class="link-cta block text-muted dark:text-on-dark-soft">Ide Riset</label>
                <textarea id="ide" name="ide" rows="4" required
                    class="mt-3 w-full border border-hairline bg-canvas p-4 text-base text-ink focus:border-ink focus:outline-none dark:border-on-dark-soft dark:bg-surface-dark dark:text-on-dark dark:focus:border-on-dark">{{ old('ide') }}</textarea>
                <p class="mt-2 text-xs tracking-[0.5px] text-muted dark:text-on-dark-soft">Minimal 10 karakter.</p>
            </div>

            <button type="submit" class="btn-primary transition-colors hover:bg-primary-active">
                Kirim Ide
            </button>
        </form>
    </section>
@endsection
