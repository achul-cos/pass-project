<?php

use App\Livewire\Login;
use App\Livewire\Daftar;
use App\Livewire\ETiket;
use App\Livewire\Loading;
use App\Livewire\Profil;
use App\Livewire\Beranda;
use App\Livewire\RincianTiket;
use App\Livewire\RincianPemesanan;
use Illuminate\Support\Facades\Route;

Route::get('/', Beranda::class)->name('app.beranda');
Route::get('/login', Login::class)->name('login');
Route::get('/daftar', Daftar::class)->name('daftar');
Route::get('/loading', Loading::class)->name('loading');
Route::get('/rinciantiket', RincianTiket::class)->name('app.rincian-tiket');
Route::get('/etiket/{id}', ETiket::class)->name('app.etiket.id');
Route::get('/profil', Profil::class)->name('app.profil');
Route::get('/rincianpemesanan/{id}', RincianPemesanan::class)->name('app.rincian-pemesanan');
