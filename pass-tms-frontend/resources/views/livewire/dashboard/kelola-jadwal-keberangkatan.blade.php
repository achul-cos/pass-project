<div class="h-full w-full">  
    
    <div class="relative w-full z-0 min-h-[calc(100vh)] pt-28 flex flex-col bg-cover bg-no-repeat bg-top-right overflow-hidden transition-all duration-500 max-md:ps-0 min-md:ps-48"
         :class="sidebarOpen ? 'min-md:!ps-48 max-md:!ps-0' : 'min-md:!ps-0 max-md:!ps-0'">
        <!-- Background -->
        <div class="absolute top-26 inset-0 z-0 left-48 bg-[url(../../public/img/pattren/Square-Pattern1-Orange.png)] bg-cover bg-no-repeat opacity-15"></div>

        <!-- Sub Judul -->
        <div class="relative text-dark flex flex-col gap-y-2 p-4 ps-8 pb-8 border-b-2 border-dark shrink-0">
            <p class="text-2xl font-bold">Kelola Jadwal Keberangkatan</p>
            <p class="text-sm">Menambahkan jadwal keberangkatan yang baru, mengubah dan memantau status jadwal.</p>
        </div>

        <!-- Konten Utama -->
        <div class="flex flex-row justify-between w-full flex-1 border-b-2 z-10 border-dark">
            <div class="w-8 text-dark bg-[image:repeating-linear-gradient(315deg,currentColor_0,currentColor_1px,transparent_0,transparent_4%)]"></div>
            <div class="w-full border-x-2 border-dark p-4 px-8 flex flex-col gap-y-8">              
                <div class="flex flex-row justify-between max-md:flex-wrap max-md:gap-y-8 gap-x-4">
                    <div class="w-full flex flex-col gap-y-4">
                        <p class="text-xl font-bold text-dark border-b-2  pe-4 pb-2">Informasi Kilat</p>
                        <div class="flex flex-row flex-wrap gap-4 transition-all">
                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                                <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black"><path d="M272 64C245.5 64 224 85.5 224 112L224 128L208 128C163.8 128 128 163.8 128 208L128 316.8L106.4 325.4C91.6 331.3 83.9 347.8 89 362.9C99.4 394.2 115.8 422.2 136.7 446C156.8 436.8 178.4 432.1 200 432C233.1 431.8 266.3 442.2 294.4 463.4L296 464.6L296 249.6L192 291.2L192 208C192 199.2 199.2 192 208 192L432 192C440.8 192 448 199.2 448 208L448 291.2L344 249.6L344 464.6L345.6 463.4C373.1 442.7 405.5 432.2 438 432C460.3 431.9 482.6 436.5 503.3 446C524.2 422.3 540.6 394.2 551 362.9C556 347.7 548.4 331.3 533.6 325.4L512 316.8L512 208C512 163.8 476.2 128 432 128L416 128L416 112C416 85.5 394.5 64 368 64L272 64zM403.4 540.1C424.7 524 453.3 524 474.6 540.1C493.6 554.5 516.5 568.3 541.8 573.4C568.3 578.8 596.1 574.2 622.5 554.3C633.1 546.3 635.2 531.3 627.2 520.7C619.2 510.1 604.2 508 593.6 516C578.7 527.2 565 529.1 551.3 526.3C536.4 523.3 520.4 514.4 503.5 501.7C465.1 472.7 413 472.7 374.5 501.7C350.5 519.8 333.8 528 320 528C306.2 528 289.5 519.8 265.5 501.7C227.1 472.7 175 472.7 136.5 501.7C114.9 518 95.2 527.5 77.6 527.4C68 527.3 57.7 524.4 46.4 515.9C35.8 507.9 20.8 510 12.8 520.6C4.8 531.2 7 546.3 17.6 554.3C36.7 568.7 57 575.3 77.4 575.4C111.3 575.6 141.7 558 165.5 540.1C186.8 524 215.4 524 236.7 540.1C260.9 558.4 289 576 320.1 576C351.2 576 379.2 558.3 403.5 540.1z"/></svg>
                                </div>
                                <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                    <p class="text-xl font-bold text-white">Jadwal Hari ini</p>
                                    <p class="text-base text-white">5 Jadwal</p>
                                </div>
                            </div>
                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                                <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black"><path d="M320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z"/></svg>                                
                                </div>
                                <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                    <p class="text-xl font-bold text-white">Menunggu</p>
                                    <p class="text-base text-white">5 Jadwal</p>
                                </div>
                            </div>
                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                                <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black"><path d="M409 337C418.4 327.6 418.4 312.4 409 303.1L265 159C258.1 152.1 247.8 150.1 238.8 153.8C229.8 157.5 224 166.3 224 176L224 256L112 256C85.5 256 64 277.5 64 304L64 336C64 362.5 85.5 384 112 384L224 384L224 464C224 473.7 229.8 482.5 238.8 486.2C247.8 489.9 258.1 487.9 265 481L409 337zM416 480C398.3 480 384 494.3 384 512C384 529.7 398.3 544 416 544L480 544C533 544 576 501 576 448L576 192C576 139 533 96 480 96L416 96C398.3 96 384 110.3 384 128C384 145.7 398.3 160 416 160L480 160C497.7 160 512 174.3 512 192L512 448C512 465.7 497.7 480 480 480L416 480z"/></svg>                                </div>
                                <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                    <p class="text-xl font-bold text-white">Open Gate</p>
                                    <p class="text-base text-white">5 Jadwal</p>
                                </div>
                            </div>
                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                                <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black"><path d="M431.2 476.5L163.5 208.8C141.1 240.2 128 278.6 128 320C128 426 214 512 320 512C361.5 512 399.9 498.9 431.2 476.5zM476.5 431.2C498.9 399.8 512 361.4 512 320C512 214 426 128 320 128C278.5 128 240.1 141.1 208.8 163.5L476.5 431.2zM64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320z"/></svg>                                </div>
                                <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                    <p class="text-xl font-bold text-white">Arrival Threshold</p>
                                    <p class="text-base text-white">5 Jadwal</p>
                                </div>
                            </div>
                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                                <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black"><path d="M320 160C320 177.7 305.7 192 288 192C270.3 192 256 177.7 256 160C256 142.3 270.3 128 288 128C305.7 128 320 142.3 320 160zM288 64C235 64 192 107 192 160C192 201.8 218.7 237.4 256 250.5L256 508.4C193.1 494.1 145.8 438.7 144.1 371.9L160.2 386C170.2 394.7 185.3 393.7 194.1 383.7C202.9 373.7 201.8 358.6 191.8 349.8L127.8 293.8C118.8 285.9 105.2 285.9 96.2 293.8L32.2 349.8C22.2 358.5 21.2 373.7 29.9 383.7C38.6 393.7 53.8 394.7 63.8 386L80 371.9C82.1 485 174.4 576 288 576C304.6 576 320.7 574.1 336.2 570.4C315.9 539.9 304 503.4 304 464C304 436.7 309.7 410.7 320 387.1L320 250.5C357.3 237.3 384 201.8 384 160C384 107 341 64 288 64zM640 464C640 384.5 575.5 320 496 320C416.5 320 352 384.5 352 464C352 543.5 416.5 608 496 608C575.5 608 640 543.5 640 464zM553.4 403.1C560.5 408.3 562.1 418.3 556.9 425.4L492.9 513.4C490.1 517.2 485.9 519.6 481.2 519.9C476.5 520.2 471.9 518.6 468.6 515.3L428.6 475.3C422.4 469.1 422.4 458.9 428.6 452.7C434.8 446.5 445 446.5 451.2 452.7L478 479.5L531 406.6C536.2 399.5 546.2 397.9 553.4 403.1z"/></svg>                                </div>
                                <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                    <p class="text-xl font-bold text-white">Berangkat/Selesai</p>
                                    <p class="text-base text-white">5 Jadwal</p>
                                </div>
                            </div>                                                                                                                               
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-y-4">
                        <p class="text-xl font-bold text-dark border-b-2 pe-4 pb-2">Aksi Cepat</p>
                        <div class="flex flex-row flex-wrap gap-4">
                            <flux:modal.trigger name="modal-tambah-jadwal" class="flex items-center">
                                <flux:button class="absolute! flex items-center justify-center w-16 h-16 rounded-full! bg-yellow hover:bg-orange! border-2 border-dark! z-20 ring-4 ring-white hover:scale-110 active:scale-95 transition-all duration-200 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-12 h-12 fill-black"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM296 408L296 344L232 344C218.7 344 208 333.3 208 320C208 306.7 218.7 296 232 296L296 296L296 232C296 218.7 306.7 208 320 208C333.3 208 344 218.7 344 232L344 296L408 296C421.3 296 432 306.7 432 320C432 333.3 421.3 344 408 344L344 344L344 408C344 421.3 333.3 432 320 432C306.7 432 296 421.3 296 408z"/></svg>
                                </flux:button>
                                <div class="min-w-48 h-30 flex justify-center items-start ps-12 p-4 flex-col bg-orange rounded-2xl border-2 border-dark ms-8 z-10">
                                    <p class="text-xl font-bold text-white">Tambah</p>
                                    <p class="text-sm text-white">Menambahkan jadwal keberangkatan baru</p>                        
                                </div>
                            </flux:modal.trigger>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-y-4">
                    <p class="text-xl font-bold text-dark border-b-2 pe-4 pb-2">Jadwal Keberangkatan</p>
                    <div class="min-lg:grid min-lg:grid-cols-14 w-full gap-x-2 max-lg:flex max-lg:flex-row max-lg:flex-wrap max-lg:gap-y-4 max-lg:pb-4">
                        <div class="min-lg:col-span-1 flex flex-row w-auto relative items-center">
                            <input wire:model.live.debounce.500ms="filterNo" placeholder="No" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>                            
                        </div>
                        <div class="min-lg:col-span-3 flex flex-row relative items-center">
                            <input wire:model.live.debounce.500ms="filterNamaJadwal" placeholder="Nama Jadwal" class=" ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>
                        <div class="min-lg:col-span-3 flex flex-row relative items-center">
                            <input wire:model.live.debounce.500ms="filterRute" placeholder="Rute Perjalanan" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>
                        <div class="min-lg:col-span-2 flex flex-row relative items-center">
                            <input wire:model.live.debounce.500ms="filterNamaKapal" placeholder="Nama Kapal" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>
                        <div class="min-lg:col-span-3 flex flex-row relative items-center">
                            <input wire:model.live.debounce.500ms="filterJadwalBerangkat" placeholder="Jadwal Keberangkatan" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>
                        <div class="min-lg:col-span-2 flex flex-row relative items-center">
                            <input wire:model.live.debounce.500ms="filterStatus" placeholder="Status" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>                        
                    </div>

                    <!-- Tabel Desktop -->

                    <table class="bg-yellow rounded-2xl border-2 border-dark p-4 flex flex-col gap-y-4 max-lg:hidden ">
                        <tr class="grid grid-cols-14 gap-x-2">
                            <th class="col-span-1 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">No</th>
                            <th class="col-span-3 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Nama Jadwal</th>
                            <th class="col-span-3 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Rute</th>
                            <th class="col-span-3 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Keberangkatan</th>
                            <th class="col-span-2 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Status</th>
                            <th class="col-span-2 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Detail</th>
                        </tr>
                        
                        <tbody class="bg-white flex flex-col rounded-2xl border-2 border-dark">
                            @forelse ($jadwals as $i => $t)
                                <tr wire:key="desktop-tiket-row-{{ $t['id'] }}"
                                    @class([
                                        'grid grid-cols-14 items-center border-dark',
                                        'border-b-2' => ! $loop->last, 
                                    ])>

                                    <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        {{ $t['id'] ?? '-' }}
                                    </td>

                                    <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        {{ $t['namaJadwal'] ?? '-' }}
                                    </td>

                                    <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        {{ ($t['lokasiBerangkat'] ?? '-') . ' - ' . ($t['lokasiTiba'] ?? '-') }}
                                    </td>

                                    <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        {{ $t['waktuBerangkat'] ?? '-' }}
                                    </td>

                                    <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-dark">
                                        <div
                                            @class([
                                                'rounded-full! text-black! border-2! border-dark! p-2 text-center text-base',
                                                'bg-yellow-300!' => ($t['status'] ?? null) === 'selesai', 
                                                'bg-red-300!'   => ($t['status'] ?? null) === 'arrival_threshold',
                                                'bg-blue-300!'  => ($t['status'] ?? null) === 'menunggu',
                                                'bg-green-300!' => ($t['status'] ?? null) === 'open_gate',

                                                'bg-white!' => ! in_array(
                                                    $t['status'] ?? null,
                                                    ['selesai', 'arrival_threshold', 'menunggu', 'open_gate'],
                                                    true
                                                ),
                                            ])
                                        >
                                            {{ match ($t['status'] ?? null) {
                                                'menunggu'            => 'Menunggu',
                                                'open_gate'           => 'Open Gate',
                                                'arrival_threshold'   => 'Arrival Threshold',
                                                'selesai'             => 'Selesai',
                                                default               => '-',
                                            } }}
                                        </div>
                                    </td>

                                    <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-dark font-bold cursor-pointer">
                                        <flux:modal.trigger name="modal-edit-jadwal-{{ $t['id'] }}">
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
                        @forelse ($jadwals as $i => $t)
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
                                            Nama Jadwal
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            {{ $t['namaJadwal'] ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Rute Perjalanan
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            {{ ($t['lokasiBerangkat'] ?? '-') . ' - ' . ($t['lokasiTiba'] ?? '-') }}
                                        </div>
                                    </td>
                                    <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-dark/20">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Nama Kapal
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            {{ $t['namaKapal'] ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Jadwal Keberangkatan
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            {{ $t['waktuBerangkat'] ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-dark/20">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Status
                                        </div>
                                        <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                            <div
                                                @class([
                                                    'rounded-full! text-black! border-2! border-dark! p-2 text-center text-base',
                                                    'bg-yellow-300!' => ($t['status'] ?? null) === 'selesai', 
                                                    'bg-red-300!'   => ($t['status'] ?? null) === 'arrival_threshold',
                                                    'bg-blue-300!'  => ($t['status'] ?? null) === 'menunggu',
                                                    'bg-green-300!' => ($t['status'] ?? null) === 'open_gate',

                                                    'bg-white!' => ! in_array(
                                                        $t['status'] ?? null,
                                                        ['selesai', 'arrival_threshold', 'menunggu', 'open_gate'],
                                                        true
                                                    ),
                                                ])
                                            >
                                                {{ match ($t['status'] ?? null) {
                                                    'menunggu'            => 'Menunggu',
                                                    'open_gate'           => 'Open Gate',
                                                    'arrival_threshold'   => 'Arrival Threshold',
                                                    'selesai'             => 'Selesai',
                                                    default               => '-',
                                                } }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="order-last text-start text-sm font-regular flex w-full">
                                        <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                            Detail
                                        </div>
                                        <flux:modal.trigger name="modal-edit-jadwal-{{ $t['id'] }}" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
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