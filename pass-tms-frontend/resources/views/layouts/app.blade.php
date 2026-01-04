<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset(config('app.favicon')) }}" sizes="32x32" type="image/png">
        <link rel="icon" href="{{ asset(config('app.favicon')) }}" sizes="16x16" type="image/png">
        <link rel="apple-touch-icon" href="{{ asset(config('app.favicon')) }}">
        <title>{{ $title ?? config('app.name') }}</title>
        @vite('resources/css/app.css')
        @fluxAppearance
        @livewireStyles
    </head>
    <body class="antialiased bg-white text-black min-h-screen" x-data="{ sidebarOpen: true }" x-init="window.addEventListener('sidebar-toggled', e => sidebarOpen = e.detail)">

        <div class="w-full h-full">             
            @if (Request::is('dashboard*'))
                <livewire:modals.modal-berhasil />
                <livewire:modals.modal-gagal />
                <livewire:modals.modal-info />             
                <livewire:dashboard.sidebar :key="'sidebar'" />
                @if (Route::is('dashboard.KelolaPengguna'))
                    <livewire:modals.modal-tiket :key="'modal-tiket'" />
                @endif
                @if (Route::is('dashboard.KelolaJadwalKeberangkatan'))
                    <livewire:modals.modal-tiket :key="'modal-tiket'" />
                    <livewire:modals.modal-tambah-jadwal :key="'tambahJadwal'"/>
                    <livewire:modals.modal-detail-jadwal :key="'detailJadwal'"/>
                @endif          
            @endif

            {{ $slot }}
        </div>

        @vite('resources/js/app.js')
        @fluxScripts
        @livewireScripts
    </body>
</html>
