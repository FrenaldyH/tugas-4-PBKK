<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Every page route points at the same controller, as required by the assignment.
Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil-mahasiswa', [PageController::class, 'profilMahasiswa'])->name('profil-mahasiswa');
Route::get('/ide-agent', [PageController::class, 'ideAgent'])->name('ide-agent');
Route::post('/ide-agent', [PageController::class, 'submitIde'])->name('ide-agent.submit');
