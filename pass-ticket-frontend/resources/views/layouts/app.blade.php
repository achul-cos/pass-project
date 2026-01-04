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
    </head>
    <body class="antialiased bg-white text-black min-h-screen" x-data="{ sidebarOpen: true }" x-init="window.addEventListener('sidebar-toggled', e => sidebarOpen = e.detail)">
        <div class="w-full h-full">
        @if (request()->routeIs('app.*'))
            <livewire:navbar :key="'navbar'" />

            @if (request()->routeIs('app.rincian-pemesanan'))
                <livewire:modal.modal-daftar/>
            @endif
        @endif        
            {{ $slot }}
        </div>
        @vite('resources/js/app.js')
        @fluxScripts
    </body>
</html>