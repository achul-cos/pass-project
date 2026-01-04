<div class="w-full h-full flex flex-col pt-24 p-8 gap-8">
    @foreach ($jadwals as $i => $t)
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
                            <p class="font-italic text-sm text-right">*Belum termaksud pajak PPN ({{ $t['pajak'] ?? '11' }}%). Serta Syarat dan Ketentuan Berlaku</p>
                        </div>                             
                    </div>                             
                </div>
            </div>
        </div> 
    @endforeach           
    <div class="flex min-md:flex-row max-md:flex-col w-full h-full gap-8">            
        <div class="flex flex-col gap-4 w-full h-full">         
            <p class="text-2xl max-md:text-lg font-bold text-black">Detail Pesanan</p>
            <div class="bg-aqua border-2 border-black rounded-2xl">
                <div class="text-2xl max-md:text-lg text-black p-4 border-b-2 border-black">Informasi Pemesan</div>
                <div class="p-4 flex flex-col gap-2 pb-8">
                    <div class="flex flex-col gap-y-4 border-b-2 border-black/50 py-2 pb-4 w-full">
                        <p class="text-lg text-black">Verifikasi Data</p>
                        <input type="text" class="p-2 bg-abswhite rounded border border-black w-full" placeholder="Nomor Telepon atau Email anda">
                        <input type="text" class="p-2 bg-abswhite rounded border border-black w-full" placeholder="Kata Sandi anda">
                        <div class="flex justify-between items-center">
                            <flux:modal.trigger name="modal-daftar">
                                <flux:button class="underline bg-transparent! shadow-none! border-0! p-0! font-italic text-black opacity-50 cursor-pointer transform-transition duration-100 hover:no-underline! hover:opacity-100">Tidak Memiliki Akun? Daftar Sekarang</flux:button>
                            </flux:modal.trigger>
                            <button class="bg-blue px-4 py-2 rounded-full w-fit text-white font-bold border-black/50 border-2 transition-transform active:scale-90 duration-100">
                                Verifikasi
                            </button>
                        </div>                      
                    </div>
                    <div class="flex flex-col gap-y-4 py-2 pb-4 w-full">
                        <p class="text-lg text-black font-bold">Identitas Pemesan</p>
                        <p>Nama Pemesan : {{ $namaPemesan ?? '-' }}</p>
                        <p>Nomor Telepon : {{ $nomorTelepon ?? '-' }}</p>
                    </div>

                </div>
            </div>

            <p class="text-2xl max-md:text-lg font-bold text-black">Detail Kendaraan</p>
            <div class="bg-aqua border-2 border-black rounded-2xl">
                <div class="text-2xl max-md:text-lg text-black p-4 border-b-2 border-black">Kendaraan Penumpang</div>
                <div class="p-4 flex flex-col gap-2 pb-8">
                    <p class="text-lg text-black">Jenis Kendaraan</p>
                    <select wire:model.live="selectJenisKendaraan" class="p-2 bg-abswhite rounded border border-black">
                        <option selected
                        @if ($selectJenisKendaraan)
                            disabled
                        @endif
                        >Pilih Jenis Kendaraan</option>
                        <option value="mobil">Mobil</option>
                        <option value="motor">Motor</option>
                    </select>
                    <p class="text-lg text-black">Nomor Kendaraan</p>
                    <input wire:model.live="selectNomorKendaraan" type="text" class="p-2 bg-abswhite rounded border border-black" placeholder="BPXXXXAA">
                </div>
            </div>   

            <p class="text-2xl max-md:text-lg font-bold text-black">Detail Penumpang</p>
            @for ($i = 0; $i < $jumlahPenumpang; $i++)
                <div wire:key="penumpang-wrapper-{{ $jenisKendaraan }}" class="bg-aqua border-2 border-black rounded-2xl">
                    <div class="text-2xl max-md:text-lg text-black p-4 border-b-2 border-black">Identitas Penumpang {{ $i + 1 }}</div>
                    <div class="p-4 flex flex-col gap-2 pb-8">
                        <p class="text-lg text-black">Nama Penumpang</p>
                        <input type="text" wire:model.live="selectPenumpang.{{ $i }}" class="p-2 bg-abswhite rounded border border-black" placeholder="Nama Penumpang">
                    </div>
                </div>
            @endfor

            <button 
                type="button"
                wire:click="tambahPenumpang"
                @if($jumlahPenumpang >= $jumlahMaksimalPenumpang)
                    disabled
                @endif
                class="flex items-center justify-center gap-4 bg-yellow hover:bg-[#FFA000] text-white rounded-lg px-6 py-3 font-bold active:scale-97 transition duration-200 disabled:bg-gray-400 disabled:cursor-not-allowed disabled:active:scale-100"
            >Tambah Penumpang</button>

            <p class="text-sm">
                Note :
                Berdasarkan kebijakan pelabuhan, batas maksimal penumpang pada kendaraan motor yaitu 2 orang, dan pada kendaraan mobil yaitu 6 orang.
            </p>        
        </div>
        <div class="w-full h-full flex flex-col gap-4">
            <p class="text-2xl max-md:text-lg font-bold text-black">Detail Harga</p>
            @foreach ($jadwals as $i => $t)
                <div class="bg-aqua border-2 border-black rounded-2xl">
                    <div class="text-2xl max-md:text-lg text-black p-4 border-b-2 border-black">Detail Biaya</div>
                    <div class="p-4 flex flex-col pb-8">
                        <p class="py-2 text-lg text-black w-full border-b-2 border-black/50">Rute Perjalanan</p>
                        <div class="flex flex-row gap-2 text-lg pt-4">
                            <p class="font-bold">{{ $t['lokasiBerangkat'] ?? '-' }}</p>
                            <p>-></p>
                            <p class="font-bold">{{ $t['lokasiTiba'] ?? '-' }}</p>
                        </div>
                        <p class="text-sm pb-2 font-italic">Biaya Perjalanan : Rp. {{ $t['biayaPerjalanan'] ?? '-' }} / Perjalanan </p>
                        <p class="py-2 pt-4 text-lg text-black full border-b-2 border-black/50">Jadwal Keberangakatan</p>
                        <div class="flex flex-row gap-2 text-base pt-4">
                            <p class="font-bold">Open Gate</p>
                            <p>=></p>
                            <p class="">{{ $t['batas']['openGateMulai'] ?? '-' }}</p>
                        </div>
                        <div class="flex flex-row gap-2 text-base">
                            <p class="font-bold">Batas Keterlambatan</p>
                            <p>=></p>
                            <p class="">{{ $t['batas']['arrivalThresholdMulai'] ?? '-' }}</p>
                        </div>
                        <div class="flex flex-row gap-2 text-base">
                            <p class="font-bold">Keberangkatan</p>
                            <p>=></p>
                            <p class="">{{ $t['waktuBerangkat'] ?? '-' }}</p>
                        </div>
                        <p class="py-2 pt-4 text-lg text-black full border-b-2 border-black/50">Jenis Kendaraan</p>
                        <div class="flex flex-row gap-2 text-lg pt-4">
                            <p class="font-bold">Jenis Kendaraan</p>
                            <p>:</p>
                            <p class="font-bold">{{ $selectJenisKendaraan ? ucfirst($selectJenisKendaraan) : '-' }}</p>
                        </div>                        
                        <p class="text-sm pb-2 font-italic">
                            @if ($selectJenisKendaraan === 'motor')
                                Biaya Kendaraan : Rp. {{ $t['biayaMotor'] ?? '-' }} (motor)
                            @elseif ($selectJenisKendaraan === 'mobil')
                                Biaya Kendaraan : Rp. {{ $t['biayaMobil'] ?? '-' }} (mobil)
                            @else
                                Biaya Kendaraan : Rp. {{ $t['biayaMotor'] ?? '-' }} (motor), Rp. {{ $t['biayaMobil'] ?? '-' }} (mobil) 
                            @endif
                        </p>
                        <p class="py-2 pt-4 text-lg text-black full border-b-2 border-black/50">Jumlah Penumpang</p>
                        <div class="flex flex-row gap-2 text-lg pt-4">
                            <p class="font-bold">Jumlah Penumpang</p>
                            <p>:</p>
                            <p class="font-bold">
                                @if($selectJenisKendaraan)
                                    {{ $jumlahPenumpang ?? '-' }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>                        
                        <p class="text-sm pb-2 font-italic">Biaya Penumpang : Rp. {{ $t['biayaPenumpang'] ?? '-' }} / orang </p>
                    </div>
                    <div class="text-2xl max-md:text-lg text-black p-4 border-y-2 border-black">Total Biaya</div>
                    <div class="p-4 flex flex-col py-8">
                        <div class="flex flex-col gap-2 pb-8 border-b-2 border-black/50 border-dashed">
                            <div class="flex justify-between w-full text-sm">
                                <span>Biaya Perjalanan</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>+ Rp. {{ $t['biayaPerjalanan'] ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between w-full text-sm">
                                <span>Biaya Kendaraan</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>
                                    @if ($selectJenisKendaraan === 'motor')
                                        + Rp. {{ $t['biayaMotor'] ?? '-' }}
                                    @elseif ($selectJenisKendaraan === 'mobil')
                                        + Rp. {{ $t['biayaMobil'] ?? '-' }}
                                    @else
                                        + Rp. 0
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between w-full text-sm">
                                <span>Biaya Penumpang</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>
                                    @if($selectJenisKendaraan)
                                        + Rp. {{ $t['biayaPenumpang'] * $jumlahPenumpang ?? '-' }}
                                    @else
                                        + Rp. 0
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 py-8 border-b-2 border-black/50 border-dashed">
                            <div class="flex justify-between w-full text-sm">
                                <span>Biaya kotor</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>
                                    @if($selectJenisKendaraan)
                                        @if ($selectJenisKendaraan === 'motor')
                                            Rp. {{ $t['biayaPerjalanan'] + $t['biayaMotor'] + ($t['biayaPenumpang'] * $jumlahPenumpang) }}
                                        @elseif ($selectJenisKendaraan === 'mobil')
                                            Rp. {{ $t['biayaPerjalanan'] + $t['biayaMobil'] + ($t['biayaPenumpang'] * $jumlahPenumpang) }}
                                        @endif
                                    @else
                                        Rp. {{ $t['biayaPerjalanan'] }}
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between w-full text-sm">
                                <span>Pajak PPN ({{ $t['pajak'] ?? '11' }}%)</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>
                                    @if($selectJenisKendaraan)
                                        @if ($selectJenisKendaraan === 'motor')
                                            + Rp. {{ intval(($t['biayaPerjalanan'] + $t['biayaMotor'] + ($t['biayaPenumpang'] * $jumlahPenumpang)) * $t['pajak'] / 100) }}
                                        @elseif ($selectJenisKendaraan === 'mobil')
                                            + Rp. {{ intval(($t['biayaPerjalanan'] + $t['biayaMobil'] + ($t['biayaPenumpang'] * $jumlahPenumpang)) * $t['pajak'] / 100) }}
                                        @endif
                                    @else
                                        + Rp. {{ intval($t['biayaPerjalanan'] * $t['pajak'] / 100) }}
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between w-full text-sm">
                                <span>Promo / Diskon</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>- Rp. {{ $t['diskon'] ?? '0' }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 pt-8 pb-4 text-lg font-bold">
                            <div class="flex justify-between w-full">
                                <span>Total Biaya</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>
                                    @if($selectJenisKendaraan)
                                        Rp. {{ $t['harga']['biayaAkhir'] }}
                                    @else
                                        Rp. {{ intval(($t['biayaPerjalanan']) + ($t['biayaPerjalanan'] * $t['pajak'] / 100) - $t['diskon']) }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>                    
                </div>
            @endforeach
        </div>            
    </div>
    <div class="flex flex-row gap-2 relative justify-start">
        <input type="checkbox" id="persetujuan" name="persetujuan" value="1" class="bg-white absolute top-1" required>
        <p class="text-sm ms-5">Dengan ini saya menyetujui seluruh syarat dan ketentuan, serta kebijakan dari pelabuhan berdasarkan regulasi yang telah ditetapkan negara. Jika suatu hari saya kedapatan melanggar, saya menerima seluruh kosenkuensi termaksud jalur hukum dan pembatalan layanan pelabuhan secara sepihak.</p>
    </div>         
    <button wire:navigate class="p-4 text-xl w-60 rounded-full bg-orange border-dark text-white font-bold active:scale-90 duration-100 transition-all border-2 mx-auto">
        Pesan
    </button>
</div>