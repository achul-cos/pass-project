<div class="h-full w-full">

    <div class="relative w-full z-0 min-h-[calc(100vh)] pt-28 flex flex-col bg-cover bg-no-repeat bg-top-right overflow-hidden transition-all duration-500 max-md:ps-0 min-md:ps-48"
         :class="sidebarOpen ? 'min-md:!ps-48 max-md:!ps-0' : 'min-md:!ps-0 max-md:!ps-0'">
        <!-- Background -->
        <div class="absolute top-26 inset-0 z-0 left-48 bg-[url(../../public/img/pattren/Square-Pattern1-Orange.png)] bg-cover bg-no-repeat opacity-15"></div>

        <!-- Sub Judul -->
        <div class="relative text-dark flex flex-col gap-y-2 p-4 ps-8 pb-8 border-b-2 border-dark shrink-0">
            <p class="text-2xl font-bold">Kelola Pengguna</p>
            <p class="text-sm">Melakukan verifikasi pembelian tiket penumpang.</p>
        </div>

        <!-- Konten Utama -->
        <div class="flex flex-row justify-between w-full flex-1 border-b-2 z-10 border-dark">
            <div class="w-8 text-dark bg-[image:repeating-linear-gradient(315deg,currentColor_0,currentColor_1px,transparent_0,transparent_4%)]"></div>
            <div class="w-full border-x-2 border-dark p-4 px-8 flex flex-col gap-y-8">  
                <div class="flex flex-row justify-between max-md:flex-wrap max-md:gap-y-8 gap-x-4">
                    <div class="w-full flex flex-col gap-y-4">
                        <p class="text-xl font-bold text-dark border-b-2 pe-4 pb-2">Informasi Kilat</p>

                        <div class="flex flex-row flex-wrap gap-4 transition-all">
                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                                <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black">
                                    <path d="M320 80C377.4 80 424 126.6 424 184C424 241.4 377.4 288 320 288C262.6 288 216 241.4 216 184C216 126.6 262.6 80 320 80zM96 152C135.8 152 168 184.2 168 224C168 263.8 135.8 296 96 296C56.2 296 24 263.8 24 224C24 184.2 56.2 152 96 152zM0 480C0 409.3 57.3 352 128 352C140.8 352 153.2 353.9 164.9 357.4C132 394.2 112 442.8 112 496L112 512C112 523.4 114.4 534.2 118.7 544L32 544C14.3 544 0 529.7 0 512L0 480zM521.3 544C525.6 534.2 528 523.4 528 512L528 496C528 442.8 508 394.2 475.1 357.4C486.8 353.9 499.2 352 512 352C582.7 352 640 409.3 640 480L640 512C640 529.7 625.7 544 608 544L521.3 544zM472 224C472 184.2 504.2 152 544 152C583.8 152 616 184.2 616 224C616 263.8 583.8 296 544 296C504.2 296 472 263.8 472 224zM160 496C160 407.6 231.6 336 320 336C408.4 336 480 407.6 480 496L480 512C480 529.7 465.7 544 448 544L192 544C174.3 544 160 529.7 160 512L160 496z"/>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                    <p class="text-xl font-bold text-white">Total Pengguna</p>
                                    <p class="text-base text-white">{{ $jumlahPengguna ?: '-' }} Pengguna</p>
                                </div>
                            </div>

                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                            <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black">
                                <path d="M96 128C60.7 128 32 156.7 32 192L32 256C32 264.8 39.4 271.7 47.7 274.6C66.5 281.1 80 299 80 320C80 341 66.5 358.9 47.7 365.4C39.4 368.3 32 375.2 32 384L32 448C32 483.3 60.7 512 96 512L544 512C579.3 512 608 483.3 608 448L608 384C608 375.2 600.6 368.3 592.3 365.4C573.5 358.9 560 341 560 320C560 299 573.5 281.1 592.3 274.6C600.6 271.7 608 264.8 608 256L608 192C608 156.7 579.3 128 544 128L96 128zM448 400L448 240L192 240L192 400L448 400zM144 224C144 206.3 158.3 192 176 192L464 192C481.7 192 496 206.3 496 224L496 416C496 433.7 481.7 448 464 448L176 448C158.3 448 144 433.7 144 416L144 224z"/>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                <p class="text-xl font-bold text-white">Pembelian Tiket</p>
                                <p class="text-base text-white">{{ $jumlahTiket ?: '-' }} Tiket</p>
                            </div>
                            </div>

                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                            <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black">
                                <path d="M320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z"/>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                <p class="text-xl font-bold text-white">Menunggu Verifikasi</p>
                                <p class="text-base text-white">{{ $menungguVerifikasi ?: '-' }} Tiket</p>
                            </div>
                            </div>

                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                            <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black">
                                <path d="M128 64C92.7 64 64 92.7 64 128L64 512C64 547.3 92.7 576 128 576L308 576C285.3 544.5 272 505.8 272 464C272 363.4 349.4 280.8 448 272.7L448 234.6C448 217.6 441.3 201.3 429.3 189.3L322.7 82.7C310.7 70.7 294.5 64 277.5 64L128 64zM389.5 240L296 240C282.7 240 272 229.3 272 216L272 122.5L389.5 240zM608 464C608 384.5 543.5 320 464 320C384.5 320 320 384.5 320 464C320 543.5 384.5 608 464 608C543.5 608 608 543.5 608 464zM521.4 403.1C528.5 408.3 530.1 418.3 524.9 425.4L460.9 513.4C458.1 517.2 453.9 519.6 449.2 519.9C444.5 520.2 439.9 518.6 436.6 515.3L396.6 475.3C390.4 469.1 390.4 458.9 396.6 452.7C402.8 446.5 413 446.5 419.2 452.7L446 479.5L499 406.6C504.2 399.5 514.2 397.9 521.4 403.1z"/>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                <p class="text-xl font-bold text-white">Terverifikasi</p>
                                <p class="text-base text-white">{{ $terverifikasi ?: '-' }} Tiket</p>
                            </div>
                            </div>

                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                            <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black">
                                <path d="M431.2 476.5L163.5 208.8C141.1 240.2 128 278.6 128 320C128 426 214 512 320 512C361.5 512 399.9 498.9 431.2 476.5zM476.5 431.2C498.9 399.8 512 361.4 512 320C512 214 426 128 320 128C278.5 128 240.1 141.1 208.8 163.5L476.5 431.2zM64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320z"/>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                <p class="text-xl font-bold text-white">Dibatalkan/Kadaluarsa</p>
                                <p class="text-base text-white">{{ $dibatalkanKadaluarsa ?: '-' }} Tiket</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-y-4">
                        <p class="text-xl font-bold text-dark border-b-2 pe-4 pb-2">Aksi Cepat</p>
                        <div class="flex flex-row flex-wrap gap-4">
                            <div class="flex flex-col items-center justify-center gap-4 p-8 w-full min-h-30 bg-dark/20 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-dark"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                                <div class="text-dark font-bold text-xl">Tidak Ada Aksi</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-y-4">
                    <p class="text-xl font-bold text-dark border-b-2 pe-4 pb-2">Pembelian Tiket</p>
                    <p class="text-sm">
                        Menampilkan {{ $totalKueri ?? '-' }} Data
                    </p>                    
                    <div class="min-lg:grid min-lg:grid-cols-14 w-full gap-x-2 max-lg:flex max-lg:flex-row max-lg:flex-wrap max-lg:gap-y-4 max-lg:pb-4">
                        <div class="min-lg:col-span-1 flex flex-row w-auto relative items-center">
                            <input wire:model.live.debounce.500ms="filterNo" placeholder="No" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>                            
                        </div>
                        <div class="min-lg:col-span-3 flex flex-row relative items-center">
                            <input wire:model.live.debounce.500ms="filterNamaPengguna" placeholder="Nama Pengguna" class=" ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>
                        <div class="min-lg:col-span-4 flex flex-row relative items-center">
                            <input wire:model.live.debounce.500ms="filterRutePerjalanan" placeholder="Rute Perjalanan" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>
                        <div class="min-lg:col-span-2 flex flex-row relative items-center">
                            <input wire:model.live.debounce.500ms="filterWaktu" placeholder="Waktu" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>
                        <div class="min-lg:col-span-2 flex flex-row relative items-center">
                            <input wire:model.live.debounce.500ms="filterJenisKendaraan" placeholder="Jenis Kendaraan" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>
                        <div class="min-lg:col-span-2 flex flex-row relative items-center">
                            <input  wire:model.live.debounce.500ms="filterStatus" placeholder="Status" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>                        
                    </div>

                    <!-- Tabel Desktop -->

                    <table class="bg-yellow rounded-2xl border-2 border-dark p-4 flex flex-col gap-y-4 max-lg:hidden ">   
                        <thead>                     
                            <tr class="grid grid-cols-14 gap-x-2">
                                <th class="col-span-1 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">No</th>
                                <th class="col-span-3 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Nama</th>
                                <th class="col-span-3 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Rute</th>
                                <th class="col-span-3 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Waktu</th>
                                <th class="col-span-2 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Status</th>
                                <th class="col-span-2 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Detail</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white flex flex-col rounded-2xl border-2 border-dark">
                            @forelse ($tikets as $i => $t)
                                <tr wire:key="desktop-tiket-row-{{ $t['id'] }}"
                                    @class([
                                        'grid grid-cols-14 items-center border-dark',
                                        'border-b-2' => ! $loop->last, 
                                    ])>

                                    <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        {{ $t['id'] ?? '-' }}
                                    </td>

                                    <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        {{ $t['penumpang']['nama'] ?? '-' }}
                                    </td>

                                    <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        {{ ($t['jadwal']['lokasiBerangkat'] ?? '-') . ' - ' . ($t['jadwal']['lokasiTiba'] ?? '-') }}
                                    </td>

                                    <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        {{ $t['jadwal']['waktuBerangkat'] ?? '-' }}
                                    </td>

                                    <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        <select
                                            wire:model.change="statusByTiket.{{ $t['id'] }}"
                                            @class([
                                                    'rounded-full! text-black! border-2! border-dark! p-1 py-2 text-sm text-center',
                                                    'bg-red-300!'   => ($statusByTiket[$t['id']] ?? null) === 'dibatalkan',
                                                    'bg-blue-300!'  => ($statusByTiket[$t['id']] ?? null) === 'menunggu_verifikasi',
                                                    'bg-green-300!' => ($statusByTiket[$t['id']] ?? null) === 'terverifikasi',
                                                    'bg-white!'     => ! in_array(($statusByTiket[$t['id']] ?? null), ['dibatalkan','menunggu_verifikasi','terverifikasi'], true),
                                                ]) 
                                        >
                                        <option value="menunggu_verifikasi" @selected(($statusByTiket[$t['id']] ?? null) === 'menunggu_verifikasi')>Menunggu Verifikasi</option>
                                        <option value="terverifikasi" @selected(($statusByTiket[$t['id']] ?? null) === 'terverifikasi')>Terverifikasi</option>
                                        <option value="dibatalkan" @selected(($statusByTiket[$t['id']] ?? null) === 'dibatalkan')>Dibatalkan</option>
                                        </select>                                        
                                    </td>

                                    <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-dark font-bold cursor-pointer">
                                        <flux:modal.trigger name="modal-tiket-{{ $t['id'] }}">
                                            <flux:button class="bg-transparent! border-none! text-dark! shadow-none! text-xl!">•••</flux:button>
                                        </flux:modal.trigger>
                                    </td>
                                </tr>
                            @empty
                                {{-- Tidak Ada Data (desktop) --}}
                                    <tr class="flex flex-col min-w-full gap-y-4 min-h-60 items-center justify-center">
                                        <td>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-dark"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg>
                                        </td>
                                        <td class="text-black font-bold text-xl">Tidak Ada Data</td>
                                    </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Tabel Mobile -->

                    <table class="min-lg:hidden bg-yellow rounded-xl border-2 border-dark p-4 flex flex-col gap-y-2">
                        @forelse ($tikets as $i => $t)
                            <tbody class="bg-white rounded-2xl border-2 border-dark flex flex-row justify-between" wire:key="mobile-tiket-row-{{ $t['id'] }}">                            
                                <tr class="flex flex-col items-start w-full">
                                    <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            No
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            {{ $t['id'] ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-dark/20">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Nama
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            {{ $t['penumpang']['nama'] ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Rute
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            {{ ($t['jadwal']['lokasiBerangkat'] ?? '-') . ' - ' . ($t['jadwal']['lokasiTiba'] ?? '-') }}
                                        </div>
                                    </td>
                                    <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-dark/20">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Nama Kapal
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            {{ $t['jadwal']['namaKapal'] ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Jadwal Keberangkatan
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            {{ $t['jadwal']['waktuBerangkat'] ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-dark/20">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Status
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            <div
                                                @class([
                                                    'rounded-full! text-black! border-1! border-black! px-2 py-1 text-center',
                                                    'bg-red-300!'   => ($statusByTiket[$t['id']] ?? null) === 'dibatalkan',
                                                    'bg-blue-300!'  => ($statusByTiket[$t['id']] ?? null) === 'menunggu_verifikasi',
                                                    'bg-green-300!' => ($statusByTiket[$t['id']] ?? null) === 'terverifikasi',
                                                    'bg-white!'     => ! in_array(($statusByTiket[$t['id']] ?? null), ['dibatalkan','menunggu_verifikasi','terverifikasi'], true),
                                                ])                                        
                                            >
                                                {{ match($t['status'] ?? null) {
                                                    'dibatalkan' => 'Dibatalkan',
                                                    'menunggu_verifikasi' => 'Menunggu Verifikasi',
                                                    'terverifikasi' => 'Terverifikasi',
                                                    default => '-',
                                                } }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="order-last text-start text-sm font-regular flex w-full">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Detail
                                        </div>
                                        <flux:modal.trigger name="modal-tiket-{{ $t['id'] }}" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                            <flux:button class="flex! py-1! bg-orange! text-white! rounded-full! px-2! border-1! border-dark! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                        </flux:modal.trigger>
                                    </td>
                                </tr>
                            </tbody>                         
                        @empty
                            <!-- Tidak Ada Data -->
                            <tbody class="bg-white rounded-2xl border-2 border-dark flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                                <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-dark"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                                <tr><td class="text-dark font-bold text-xl">Tidak Ada Data</td></tr>
                            </tbody>                         
                        @endforelse                                                               
                    </table>
                </div>
            </div>
            <div class="w-8 text-dark bg-[image:repeating-linear-gradient(315deg,currentColor_0,currentColor_1px,transparent_0,transparent_4%)]"></div>
        </div>
    </div>

</div>