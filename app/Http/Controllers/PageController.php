<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Single controller for every public page of the portal.
 */
class PageController extends Controller
{
    // Home page. Shows a welcome banner when the URL carries ?user=<name>.
    public function beranda(Request $request): View
    {
        return view('pages.beranda', [
            'user' => $request->query('user'),
        ]);
    }

    // Static profile page, no request data needed.
    public function profilMahasiswa(): View
    {
        return view('pages.profil-mahasiswa');
    }

    // Research idea page. The ?mode=dark theme flag is shared by AppServiceProvider.
    public function ideAgent(): View
    {
        return view('pages.ide-agent');
    }

    // Handles the idea form. back() keeps the ?mode=dark query string after redirect.
    public function submitIde(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'ide' => ['required', 'string', 'min:10', 'max:500'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'ide.required' => 'Ide riset wajib diisi.',
            'ide.min' => 'Ide riset minimal 10 karakter.',
            'ide.max' => 'Ide riset maksimal 500 karakter.',
        ]);

        // ponytail: session flash only, swap for a model + migration when the database week starts.
        return back()->with('status', "Terima kasih {$validated['nama']}, ide Anda sudah kami terima!");
    }
}
