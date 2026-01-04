<div class="w-full h-full p-8 bg-white flex flex-col gap-8 pt-24">
    <h1 class="text-3xl font-bold">Selamat Datang!</h1>
    <!-- Section Tiket -->
    <section class="w-full bg-aqua p-6 rounded-xl border-3 border-black">
        <h2 class="text-2xl font-bold mb-4">Pencarian Jadwal</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 py-4">

            <div class="flex flex-col gap-4">
                <p class="text-xl font-medium mb-1">Lokasi Asal</p>
                <input 
                    wire:model.live.debounce.500ms="searchLokasiAsal"
                    type="text" 
                    class="p-2 rounded-full border-2 border-black bg-abswhite w-full px-4 outline-none"
                    placeholder="Ketik Lokasi Asal, contoh 'Batam, Telaga Punggur'"
                />
            </div>

            <div class="flex flex-col gap-4">
                <p class="text-xl font-medium mb-1">Lokasi Tujuan</p>
                <input
                    wire:model.live.debounce.500ms="searchLokasiTujuan" 
                    type="text" 
                    class="p-2 rounded-full border-2 border-black bg-abswhite w-full px-4 outline-none"
                    placeholder="Ketik Lokasi Tujuan, contoh 'Surabaya'"
                />
            </div>

            <div class="flex flex-col gap-4">
                <p class="text-xl font-medium mb-1">Waktu Keberangkatan</p>
                <div class="flex flex-col md:flex-row md:items-center gap-2">
                    <input
                        wire:model.live.debounce.500ms="searchTanggalBerangkat" 
                        type="date" 
                        class="p-2 rounded-full border-2 border-black bg-abswhite w-full px-4 outline-none"
                    />                          
                </div>
            </div>

            <div class="flex flex-col gap-4 pt-4">
                <p class="text-xl font-medium mb-1">Jenis Kendaraan</p>
                <select wire:model.live="searchJenisKendaraan" class="p-2 rounded-full border-2 border-black bg-abswhite w-full px-4 outline-none" placeholder="Mabar cuy">
                    <option selected
                    @if ($searchJenisKendaraan)
                        disabled
                    @endif
                    >Pilih Jenis Kendaraan</option>
                    <option value="mobil">Mobil</option>
                    <option value="motor">Motor</option>
                </select>
            </div>

            <div class="flex flex-col gap-4 pt-4">
                <p class="text-xl font-medium mb-1">Jumlah Penumpang</p>

                <input
                    wire:model.live="searchJumlahPenumpang" 
                    type="number" 
                    class="p-2 rounded-full border-2 border-black bg-abswhite w-full px-4 outline-none"
                    placeholder="Masukkan jumlah penumpang, contoh '2'"
                    min=0
                />
            </div>
        </div>
    </section>

    <!-- Section Jadwal -->
    <section class="w-full bg-aqua p-6 rounded-xl border-3 border-black flex flex-col gap-y-8">
        <h2 class="text-4xl font-black">Penawaran Jadwal</h2>
        @forelse ($jadwals as $i => $t)
            <div class="bg-white rounded-2xl border-2 border-black h-full w-full relative">

                @if ($t['diskon'] > 0)
                <!-- Jika Promo -->
                <img src="{{ asset('img/assets/promo-badge.png') }}" alt="" class="absolute w-36 h-auto -top-5 right-10">
                    @if ($t['statusPenjualan'] == 'hampirHabis')
                        <img src="{{ asset('img/assets/base-sale-badge.png') }}" alt="" class="absolute w-36 h-auto -top-6 right-50">
                    @elseif ($t['statusPenjualan'] == 'tersisaMobil')
                        <img src="{{ asset('img/assets/tersisa-mobil-badge.png') }}" alt="" class="absolute w-36 h-auto -top-4.5 right-50">
                    @elseif ($t['statusPenjualan'] == 'terisaMotor')
                        <img src="{{ asset('img/assets/tersisa-motor-badge.png') }}" alt="" class="absolute w-36 h-auto -top-4.5 right-50">
                    @endif
                @else
                    @if ($t['statusPenjualan'] == 'hampirHabis')
                        <img src="{{ asset('img/assets/base-sale-badge.png') }}" alt="" class="absolute w-36 h-auto -top-6 right-10">
                    @elseif ($t['statusPenjualan'] == 'tersisaMobil')
                        <img src="{{ asset('img/assets/tersisa-mobil-badge.png') }}" alt="" class="absolute w-36 h-auto -top-4.5 right-10">
                    @elseif ($t['statusPenjualan'] == 'terisaMotor')
                        <img src="{{ asset('img/assets/tersisa-motor-badge.png') }}" alt="" class="absolute w-36 h-auto -top-4.5 right-10">
                    @endif
                @endif

                <div class="overflow-clip">
                    <div class="bg-blue/50 py-4 px-8 flex flex-row gap-4 justify-between">
                        <div class="flex flex-row gap-6 items-center">
                            <img src="{{ asset('img/logo/icon-emblem-horizon-white.png') }}" class="h-8 w-auto" alt="">
                            <div class="text-abswhite font-black text-2xl">PASS</div>
                        </div>
                        <div class="text-white font-italic text-xl items-center">
                            Tiket Pelabuhan
                        </div>
                    </div>
                    <div class="flex flex-row h-full">
                        <div class="w-3/5 h-full p-4 flex flex-col gap-4 pe-8 border-dashed">
                            <div class="flex flex-row w-full gap-2">
                                <div class="flex flex-col gap-4 w-full">
                                    <p>Asal</p>
                                    <p class="text-4xl font-black">{{ $t['lokasiBerangkat'] ?? '-' }}</p>
                                </div>
                                <div class="flex flex-col gap-4 w-full">
                                    <p>Tujuan</p>
                                    <p class="text-4xl font-black">{{ $t['lokasiTiba'] ?? '-' }}</p>                             
                                </div>
                            </div>
                            <div class="flex flex-row w-full gap-2">
                                <div class="flex flex-col gap-4 w-full">
                                    <p class="pt-8">Waktu Berangkat</p>
                                    <p class="text-xl font-bold">{{ $t['waktuBerangkat'] ?? '-' }}</p>
                                </div>
                                <div class="flex flex-col gap-4 w-full">
                                    <p class="pt-8">Waktu Tiba</p>
                                    <p class="text-xl font-bold">{{ $t['waktuTiba'] ?? '-' }}</p>                                 
                                </div>                                
                            </div>
                            <div class="flex flex-row w-full gap-2">
                                <div class="flex flex-col gap-4 w-full">
                                    <p class="pt-8">Kapasitas Maksimal</p>
                                    <p class="text-xl font-bold">{{ $t['kapasitas'] ?? '-' }} Orang</p>
                                </div>
                                <div class="flex flex-col gap-4 w-full">
                                    <p class="pt-8">Sisa Kapasitas</p>
                                    <p class="text-xl font-bold">{{ $t['sisaKapasitas'] ?? '-' }} Orang</p>                                
                                </div>                                
                            </div>
                        </div>
                        <div class="w-2/5 flex flex-col min-h-full p-4 bg-dark/10 border-s-2 border-dark border-dashed">
                            <div class="flex flex-row h-full gap-2 justify-between w-full">
                                <div class="flex flex-col gap-2 items-start">
                                    @if ($searchJumlahPenumpang !== null && $searchJenisKendaraan !== null && $searchJumlahPenumpang >= 1)
                                        <p>Jenis Kendaraan</p>
                                        <p class="text-3xl font-black">
                                            @if ($searchJenisKendaraan === 'mobil')
                                                Mobil
                                            @elseif ($searchJenisKendaraan === 'motor')
                                                Motor
                                            @else
                                                -
                                            @endif
                                        </p>
                                        <p>Jumlah Penumpang</p>
                                        <p class="text-3xl font-black">
                                            {{ $searchJumlahPenumpang ?? '-' }}
                                        </p>
                                    @endif
                                </div>
                                <div class="flex flex-col gap-2 items-end">
                                    @if ($searchJumlahPenumpang !== null && $searchJenisKendaraan !== null && $searchJumlahPenumpang >= 1 && $searchJenisKendaraan !== '')
                                    <p>Harga</p>

                                    @if ($t['diskon'] == 0)
                                        <div class="flex flex-row items-end">
                                            <p>
                                                <span class="text-8xl font-black">
                                                    {{ isset($t['harga']['biayaAwal']) ? floor($t['harga']['biayaAwal'] / 1000) : '-' }}
                                                </span>
                                                <span class="text-xl">K</span>
                                            </p>
                                        </div>
                                    @elseif ($t['diskon'] > 0)
                                        <div class="flex flex-row items-end">
                                            <div class="flex flex-col items-end">
                                                <p class="text-3xl line-through">
                                                    {{ isset($t['harga']['biayaAwal']) ? floor($t['harga']['biayaAwal'] / 1000) : '-' }}
                                                </p>
                                                <p class="text-8xl font-black leading-none">
                                                    {{ isset($t['harga']['biayaAkhir']) ? floor($t['harga']['biayaAkhir'] / 1000) : '-' }}
                                                </p>
                                            </div>

                                            <p class="text-xl mb-1">K</p>
                                        </div>        
                                    @endif
                                    @else
                                        <p>Harga</p>

                                        @if ($t['diskon'] == 0)
                                            <div class="flex flex-row items-end">
                                                <p>
                                                    <span class="text-8xl font-black">
                                                        {{ isset($t['biayaPerjalanan']) ? floor($t['biayaPerjalanan'] / 1000) : '-' }}
                                                    </span>
                                                    <span class="text-xl">K</span>
                                                </p>
                                            </div>
                                        @elseif ($t['diskon'] > 0)
                                            <div class="flex flex-row items-end">
                                                <div class="flex flex-col items-end">
                                                    <p class="text-3xl line-through">
                                                        {{ isset($t['biayaPerjalanan']) ? floor($t['biayaPerjalanan'] / 1000) : '-' }}
                                                    </p>
                                                    <p class="text-8xl font-black leading-none">
                                                        {{ isset($t['biayaPerjalanan'], $t['diskon']) 
                                                            ? floor(($t['biayaPerjalanan'] - $t['diskon']) / 1000) 
                                                            : '-' 
                                                        }}
                                                    </p>
                                                </div>

                                                <p class="text-xl mb-1">K</p>
                                            </div>
                                        @endif                    
                                    @endif             
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-y-2 items-end">
                                <div wire:click="pemesananTiket({{ (int) $t['id'] }})" class="py-2 px-4 bg-orange border-2 border-black text-xl font-bold rounded-full w-fit active:scale-95 duration-50 cursor-pointer" wire:navigate="">
                                    Pesan Tiket
                                </div>
                                <p class="font-italic text-sm text-right">*Belum termaksud pajak PPN ({{ $t['pajak'] ?? '11' }}%). Serta Syarat dan Ketentuan Berlaku</p>
                            </div>                             
                        </div>                             
                    </div>
                </div>
            </div>            
        @empty
            <div class="bg-white rounded-2xl border-2 border-black min-h-96 w-full relative flex flex-col items-center justify-center py-10">
                <div class="bg-blue rounded-full p-6 mb-4">
                    <x-heroicon-o-x-mark class="w-10 h-10 text-abswhite"/>
                </div>
                <p class="text-lg font-semibold">Maaf Belum Ada Jadwal</p>                
            </div>            
        @endforelse
    </section>
</div>