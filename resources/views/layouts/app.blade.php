<!DOCTYPE html>
{{-- $darkMode is shared by AppServiceProvider, read from the ?mode= query parameter --}}
<html lang="id" class="{{ $darkMode ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') &mdash; {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col bg-canvas text-body antialiased dark:bg-surface-dark dark:text-on-dark-soft">

    {{-- Static navbar: white 64px bar, the only copy of navigation markup in the project --}}
    <header class="border-b border-hairline bg-canvas dark:border-surface-dark-elevated dark:bg-surface-dark-elevated">
        <nav class="mx-auto flex max-w-[1440px] flex-wrap items-center justify-between gap-4 px-6 py-4 lg:h-16 lg:py-0">
            <a href="{{ route('beranda') }}" class="text-lg font-bold text-ink dark:text-on-dark">
                {{ config('app.name') }}
            </a>

            <div class="flex flex-wrap items-center gap-6">
                {{-- Looping the link list keeps the active-state logic written once --}}
                @foreach (['beranda' => 'Beranda', 'profil-mahasiswa' => 'Profil', 'ide-agent' => 'Ide Riset'] as $routeName => $label)
                    <a href="{{ route($routeName) }}"
                        class="text-sm tracking-[0.3px] transition-colors {{ request()->routeIs($routeName) ? 'font-bold text-primary' : 'text-ink hover:text-primary dark:text-on-dark-soft dark:hover:text-on-dark' }}">
                        {{ $label }}
                    </a>
                @endforeach

                {{-- Theme toggle: fullUrlWithQuery keeps the current page and its other params --}}
                <a href="{{ request()->fullUrlWithQuery(['mode' => $darkMode ? 'light' : 'dark']) }}"
                    title="{{ $darkMode ? 'Aktifkan mode terang' : 'Aktifkan mode gelap' }}"
                    class="link-cta border border-hairline-strong px-4 py-3 text-ink transition-colors hover:border-ink dark:border-on-dark-soft dark:text-on-dark dark:hover:border-on-dark">
                    {{ $darkMode ? 'Mode Terang' : 'Mode Gelap' }}
                </a>
            </div>
        </nav>
    </header>

    {{-- Content container: each child page fills this section only --}}
    <main class="mx-auto w-full max-w-[1440px] flex-1 px-6 py-section">
        @yield('content')
    </main>

    <footer class="border-t border-hairline bg-surface-soft py-16 dark:border-surface-dark-elevated dark:bg-surface-dark-elevated">
        <div class="mx-auto max-w-[1440px] px-6 text-center">
            <p class="font-bold text-ink dark:text-on-dark">Institut Teknologi Sepuluh Nopember</p>
            <p class="mt-2 text-sm text-muted dark:text-on-dark-soft">
                Pemrograman Berbasis Kerangka Kerja &middot; &copy; {{ date('Y') }}
            </p>
        </div>
    </footer>

</body>

</html>
