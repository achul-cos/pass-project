<nav class="flex items-center justify-between bg-aqua px-8 py-3 border-2 border-black fixed w-full z-99">
    <a href="{{ route('app.beranda') }}" wire:navigate>
        <img src="{{ asset('img/logo/icon-emblem-horizon-cream.png') }}" alt="Logo" class="h-10">
    </a>
    <div class="flex items-center space-x-6">
        <a href="{{ route('app.beranda') }}" wire:navigate class="text-black font-medium active:scale-90">Beranda</a>
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center bg-orange hover:bg-[#E67A31] text-white font-semibold px-4 py-2 rounded-lg active:scale-90 transition duration-200">
                <x-heroicon-o-user class="w-5 h-5 mr-2"/>Akun
                <x-heroicon-o-chevron-down class="w-4 h-4 ml-1"/>
            </button>
            <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 bg-[#FFFFFF] shadow-md mt-2 rounded p-2 w-40">
                <a href="{{ route('app.profil') }}" wire:navigate class="block px-4 py-2 hover:bg-gray-100">Profil Saya</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Keluar</a>
            </div>
        </div>
    </div>
</nav>