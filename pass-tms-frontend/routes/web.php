<?php

use App\Livewire\Login;
use App\Livewire\Loading;
use App\Livewire\Dashboard\Sidebar;
use App\Livewire\Dashboard\KelolaJadwalKeberangkatan;
use App\Livewire\Dashboard\KelolaPassScan;
use App\Livewire\Dashboard\KelolaPengguna;
use App\Livewire\Dashboard\KelolaProfil;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->name('login');

Route::get('/dashboard/sidebar', Sidebar::class)->name('dashboard.sidebar');

Route::get('/dashboard/KelolaJadwalKeberangkatan', KelolaJadwalKeberangkatan::class)->name('dashboard.KelolaJadwalKeberangkatan');
Route::get('/dashboard/KelolaPassScan', KelolaPassScan::class)->name('dashboard.KelolaPassScan');
Route::get('/dashboard/KelolaPengguna', KelolaPengguna::class)->name('dashboard.KelolaPengguna');
Route::get('/dashboard/KelolaProfil', KelolaProfil::class)->name('dashboard.KelolaProfil');

Route::get('/loading', Loading::class)->name('loading');
