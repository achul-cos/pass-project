<main class="h-full w-full">

    <livewire:navbar/>

    <div class="px-10 py-3 pt-18 bg-[#B8E5EA]">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-md">Asal → Tujuan</h2>
                <p>Hari, d m y</p>
                <p>Jenis Kendaraan, ~ Penumpang</p>
            </div>
            <button href="{{ route('beranda') }}" wire:navigate class="bg-yellow hover:bg-[#FFA000] text-white font-semibold px-4 py-2 rounded-lg active:scale-90 transition duration-200">Ubah Jadwal</button>
        </div>
    </div>

    <div class="w-full h-full p-8 flex flex-col gap-8">

        <!-- Rincian Jadwal -->
        <section class="w-full bg-aqua p-6 rounded-xl border-2 border-black">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-lg">Tiket Tersedia (~)</p>
                    <h3 class="font-bold text-xl mt-1">Asal → Tujuan</h3>
                    <div class="mt-3">
                        <p class="text-lg">Jadwal Masuk Pelabuhan</p>
                        <p class="font-bold text-xl">Hari, d m y, 00:00 - 00:00 WIB</p>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button href="{{ route('rincian-pemesanan') }}" wire:navigate class="bg-yellow hover:bg-[#FFA000] text-white font-semibold px-8 py-2 rounded-lg mt-3 active:scale-90 transition duration-200">Beli Tiket</button>
                </div>
            </div>
        </section>

        <!-- Kebijakan -->
        <div class="space-y-2">
            <h3 class="font-bold text-xl">Kebijakan</h3>
            <ol class="list-decimal pl-8">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
            </ol>
        </div>
    </div>

</main>