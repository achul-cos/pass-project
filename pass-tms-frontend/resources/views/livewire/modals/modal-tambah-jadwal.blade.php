<flux:modal name="modal-tambah-jadwal" class="font-sans! min-md:min-w-[calc(100vw*0.75)] max-md:w-[calc(100vw*0.75)] !z-0 bg-white flex flex-col rounded-2xl! border-2! border-dark! p-0!" tabindex="-1">
    <div class="p-4 bg-yellow text-dark w-full items-center border-b-2 border-dark flex flex-row justify-between">
        <flux:heading class="font-bold! text-xl! font-sans! text-dark!">
            Tambah Jadwal Keberangkatan
        </flux:heading>
    </div>
    <form wire:submit="simpanJadwal">
        <div class="p-8 bg-white w-full min-md:pb-12 rounded-b-2xl overflow-y-auto max-h-[calc(100vh*0.7)]">
            <div class="flex max-md:flex-col min-md:flex-row gap-8 justify-between text-dark fill-dark">
                <div class="w-full flex flex-col gap-y-4">
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M224 64C241.7 64 256 78.3 256 96L256 128L384 128L384 96C384 78.3 398.3 64 416 64C433.7 64 448 78.3 448 96L448 128L480 128C515.3 128 544 156.7 544 192L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 192C96 156.7 124.7 128 160 128L192 128L192 96C192 78.3 206.3 64 224 64zM224 320C206.3 320 192 334.3 192 352L192 416C192 433.7 206.3 448 224 448L416 448C433.7 448 448 433.7 448 416L448 352C448 334.3 433.7 320 416 320L224 320z"/></svg>
                        <p class="font-bold">Nama Jadwal</p>                      
                        </div>
                        <div class="relative flex items-stretch">
                        <div class="w-6 bg-dark/50 rounded-l-full"></div>
                        <input
                            type="text"
                            class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 outline-none"
                            placeholder="Pelabuhan Telaga Punggur (Kota Batam) - Dabo Singkep"
                            wire:model="namaJadwal"
                            required
                        />
                        </div>
                    </div>                    
                    <div class="min-h-16 flex min-lg:flex-row max-lg:flex-col gap-4 justify-between">
                        <div class="w-full flex flex-col gap-2">
                            <div class="flex flex-row items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M320 64C214 64 128 148.4 128 252.6C128 371.9 248.2 514.9 298.4 569.4C310.2 582.2 329.8 582.2 341.6 569.4C391.8 514.9 512 371.9 512 252.6C512 148.4 426 64 320 64z"/></svg>                        
                                <p class="font-bold">Rute Asal</p>
                            </div>
                            <div class="relative flex items-stretch">                  
                                <div class="w-6 bg-dark/50 rounded-l-full"></div>
                                <input
                                    type="text"
                                    name="ruteAsal"
                                    list="pelabuhan-roro-asal"
                                    placeholder="Batam, Telaga Punggur"
                                    class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 pe-8 outline-none"
                                    required
                                    wire:model.live="lokasiBerangkat"
                                >
                                <datalist id="pelabuhan-roro-asal">
                                    @foreach ($this->lokasiSuggestions as $l)
                                        <option value="{{ $l['lokasi'] }}"></option>
                                    @endforeach
                                </datalist>                            
                            </div>
                            @error('lokasiBerangkat')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror                             
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <div class="flex flex-row items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
                                <p class="font-bold">Rute Tujuan</p>
                            </div>
                            <div class="relative flex items-stretch">                  
                                <div class="w-6 bg-dark/50 rounded-l-full"></div>
                                <input
                                    type="text"
                                    list="pelabuhan-roro-tujuan"
                                    class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 outline-none"
                                    placeholder="Batulicin, Batulicin"
                                    required
                                    wire:model.live="lokasiTiba"
                                />
                                <datalist id="pelabuhan-roro-tujuan">
                                    @foreach ($this->lokasiSuggestionsTiba as $l)
                                        <option value="{{ $l['lokasi'] }}"></option>
                                    @endforeach
                                </datalist>                                                                 
                            </div>
                            @error('lokasiTiba')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror                                                                               
                        </div>
                    </div>
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M272 64C245.5 64 224 85.5 224 112L224 128L208 128C163.8 128 128 163.8 128 208L128 316.8L106.4 325.4C91.6 331.3 83.9 347.8 89 362.9C99.4 394.2 115.8 422.2 136.7 446C156.8 436.8 178.4 432.1 200 432C233.1 431.8 266.3 442.2 294.4 463.4L296 464.6L296 249.6L192 291.2L192 208C192 199.2 199.2 192 208 192L432 192C440.8 192 448 199.2 448 208L448 291.2L344 249.6L344 464.6L345.6 463.4C373.1 442.7 405.5 432.2 438 432C460.3 431.9 482.6 436.5 503.3 446C524.2 422.3 540.6 394.2 551 362.9C556 347.7 548.4 331.3 533.6 325.4L512 316.8L512 208C512 163.8 476.2 128 432 128L416 128L416 112C416 85.5 394.5 64 368 64L272 64zM403.4 540.1C424.7 524 453.3 524 474.6 540.1C493.6 554.5 516.5 568.3 541.8 573.4C568.3 578.8 596.1 574.2 622.5 554.3C633.1 546.3 635.2 531.3 627.2 520.7C619.2 510.1 604.2 508 593.6 516C578.7 527.2 565 529.1 551.3 526.3C536.4 523.3 520.4 514.4 503.5 501.7C465.1 472.7 413 472.7 374.5 501.7C350.5 519.8 333.8 528 320 528C306.2 528 289.5 519.8 265.5 501.7C227.1 472.7 175 472.7 136.5 501.7C114.9 518 95.2 527.5 77.6 527.4C68 527.3 57.7 524.4 46.4 515.9C35.8 507.9 20.8 510 12.8 520.6C4.8 531.2 7 546.3 17.6 554.3C36.7 568.7 57 575.3 77.4 575.4C111.3 575.6 141.7 558 165.5 540.1C186.8 524 215.4 524 236.7 540.1C260.9 558.4 289 576 320.1 576C351.2 576 379.2 558.3 403.5 540.1z"/></svg>
                        <p class="font-bold">Nama Kapal</p>
                        </div>
                        <div class="relative flex items-stretch">
                            <div class="w-6 bg-dark/50 rounded-l-full"></div>
                            <input
                                type="text"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 outline-none"
                                placeholder="KMP Kapal Penyebrangan"
                                required
                                wire:model="namaKapal"
                            />
                        </div>                       
                    </div>
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M320 80C377.4 80 424 126.6 424 184C424 241.4 377.4 288 320 288C262.6 288 216 241.4 216 184C216 126.6 262.6 80 320 80zM96 152C135.8 152 168 184.2 168 224C168 263.8 135.8 296 96 296C56.2 296 24 263.8 24 224C24 184.2 56.2 152 96 152zM0 480C0 409.3 57.3 352 128 352C140.8 352 153.2 353.9 164.9 357.4C132 394.2 112 442.8 112 496L112 512C112 523.4 114.4 534.2 118.7 544L32 544C14.3 544 0 529.7 0 512L0 480zM521.3 544C525.6 534.2 528 523.4 528 512L528 496C528 442.8 508 394.2 475.1 357.4C486.8 353.9 499.2 352 512 352C582.7 352 640 409.3 640 480L640 512C640 529.7 625.7 544 608 544L521.3 544zM472 224C472 184.2 504.2 152 544 152C583.8 152 616 184.2 616 224C616 263.8 583.8 296 544 296C504.2 296 472 263.8 472 224zM160 496C160 407.6 231.6 336 320 336C408.4 336 480 407.6 480 496L480 512C480 529.7 465.7 544 448 544L192 544C174.3 544 160 529.7 160 512L160 496z"/></svg>
                            <p class="font-bold">Kapasitas</p>
                        </div>
                        <div class="relative flex items-stretch">
                            <div class="w-6 bg-dark/50 rounded-l-full"></div>
                            <p class="absolute top-1.5 right-8">
                                Orang
                            </p>
                            <input
                                id="jumlahPenumpang"
                                type="number"
                                wire:model.live="jumlahPenumpang"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 outline-none pe-24 focus:ring-2 focus:ring-blue-500 transition"
                                placeholder="100"
                                min="0"
                                required
                            />
                        </div>
                    </div>
                    <div class="min-h-16 w-full">
                        <p class="text-sm pb-2">
                            Perkiraan maksimal kendaraan: 
                            {{ $semuaMotor['motor'] }} <span class="font-bold">Motor</span>, 
                            {{ $semuaMotor['mobil'] }} <span class="font-bold">Mobil</span> | 
                            {{ $semuaMobil['motor'] }} <span class="font-bold">Motor</span>, 
                            {{ $semuaMobil['mobil'] }} <span class="font-bold">Mobil</span> | 
                            {{ $seimbang['motor'] }} <span class="font-bold">Motor</span>, 
                            {{ $seimbang['mobil'] }} <span class="font-bold">Mobil</span>
                        </p>
                        <p class="text-sm pb-2">
                            Note :
                            Jumlah penumpang akan mempengaruhi jumlah kendaraan yang akan bisa masuk, dengan maksimal penumpang per masing kendaraan sebagai berikut,
                        </p>
                        <p class="text-sm pb-2">
                            <span class="font-bold">Motor</span> : 2 Orang
                        </p>
                        <p class="text-sm">
                            <span class="font-bold">Mobil</span> : 6 Orang
                        </p>
                    </div>
                    <div class="min-h-16 w-full flex flex-col gap-2 pt-8">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M64 483.6L64 173.5C64 150.3 88.1 134.9 110.3 141.5C198 167.7 260 147 322.4 126.2C386.9 104.7 451.8 83.1 545.7 113.1C564.2 119 576 136.9 576 156.4L576 466.5C576 489.7 551.9 505.1 529.8 498.5C442.1 472.3 380 493 317.7 513.8C253.2 535.3 188.3 556.9 94.4 526.9C75.9 521 64.1 503.1 64.1 483.6zM400 320C400 267 364.2 224 320 224C275.8 224 240 267 240 320C240 373 275.8 416 320 416C364.2 416 400 373 400 320zM184 477.6C188.4 477.6 191.9 473.8 191.2 469.5C186.6 441.7 164.2 420 136 416.5C131.6 416 128 419.6 128 424L128 463.9C128 467.5 130.4 470.7 134 471.6C151.9 475.8 168.3 477.7 184 477.7zM502.5 426.5C507.5 427.3 512 423.5 512 418.5L512 375.9C512 371.5 508.4 367.8 504 368.4C478.8 371.5 458.1 389.3 450.8 413C449.4 417.7 453.1 422.1 458 422.2C472.2 422.6 487 423.9 502.4 426.5zM512 216L512 176.1C512 172.5 509.5 169.3 506 168.4C488.1 164.2 471.7 162.3 456 162.3C451.6 162.3 448.1 166.1 448.8 170.4C453.4 198.2 475.8 219.9 504 223.4C508.4 223.9 512 220.3 512 215.9zM189.2 226.9C190.6 222.2 186.9 217.8 182 217.7C167.8 217.3 153 216 137.6 213.4C132.6 212.6 128.1 216.4 128.1 221.4L128 264C128 268.4 131.6 272.1 136 271.5C161.2 268.4 181.9 250.6 189.2 226.9z"/></svg>
                            <p class="font-bold">Biaya Perjalanan</p>
                        </div>
                        <div class="relative flex items-stretch">                  
                            <div class="w-6 bg-dark/50 rounded-l-full relative"></div>
                            <p class="absolute top-1.5 left-8">
                                Rp.
                            </p>
                            <input
                                id="hargaInput"
                                type="text"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 ps-12 outline-none pe-24"
                                placeholder="100.000"
                                required
                                wire:model="biayaPerjalanan"
                            />
                        </div>
                    </div>                    
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M376 88C376 57.1 350.9 32 320 32C289.1 32 264 57.1 264 88C264 118.9 289.1 144 320 144C350.9 144 376 118.9 376 88zM400 300.7L446.3 363.1C456.8 377.3 476.9 380.3 491.1 369.7C505.3 359.1 508.3 339.1 497.7 324.9L427.2 229.9C402 196 362.3 176 320 176C277.7 176 238 196 212.8 229.9L142.3 324.9C131.8 339.1 134.7 359.1 148.9 369.7C163.1 380.3 183.1 377.3 193.7 363.1L240 300.7L240 576C240 593.7 254.3 608 272 608C289.7 608 304 593.7 304 576L304 416C304 407.2 311.2 400 320 400C328.8 400 336 407.2 336 416L336 576C336 593.7 350.3 608 368 608C385.7 608 400 593.7 400 576L400 300.7z"/></svg>
                            <p class="font-bold">Biaya Penumpang</p>
                        </div>
                        <div class="relative flex items-stretch">                  
                            <div class="w-6 bg-dark/50 rounded-l-full relative"></div>
                            <p class="absolute top-1.5 left-8">
                                Rp.
                            </p>
                            <p class="absolute top-1.5 right-8">
                                / Orang
                            </p>                            
                            <input
                                id="hargaInput"
                                type="text"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 ps-12 outline-none pe-24"
                                placeholder="100.000"
                                required
                                wire:model="biayaPenumpang"
                            />
                        </div>
                    </div>
                    <div class="min-h-16 flex min-lg:flex-row max-lg:flex-col gap-4 justify-between">
                        <div class="w-full flex flex-col gap-2">
                            <div class="flex flex-row items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M280 80C266.7 80 256 90.7 256 104C256 117.3 266.7 128 280 128L336.6 128L359.1 176.7L264 248C230.6 222.9 189 208 144 208L88 208C74.7 208 64 218.7 64 232C64 245.3 74.7 256 88 256L144 256C222.5 256 287.2 315.6 295.2 392L269.8 392C258.6 332.8 206.5 288 144 288C73.3 288 16 345.3 16 416C16 486.7 73.3 544 144 544C206.5 544 258.5 499.2 269.8 440L320 440C333.3 440 344 429.3 344 416L344 393.5C344 348.4 369.7 308.1 409.5 285.8L421.6 311.9C389.2 335.1 368.1 373.1 368.1 416C368.1 486.7 425.4 544 496.1 544C566.8 544 624.1 486.7 624.1 416C624.1 345.3 566.8 288 496.1 288C485.4 288 475.1 289.3 465.2 291.8L433.8 224L488 224C501.3 224 512 213.3 512 200L512 152C512 138.7 501.3 128 488 128L434.7 128C427.8 128 421 130.2 415.5 134.4L398.4 147.2L373.8 93.9C369.9 85.4 361.4 80 352 80L280 80zM445.8 364.4L474.2 426C479.8 438 494 443.3 506 437.7C518 432.1 523.3 417.9 517.7 405.9L489.2 344.3C491.4 344.1 493.6 344 495.9 344C535.7 344 567.9 376.2 567.9 416C567.9 455.8 535.7 488 495.9 488C456.1 488 423.9 455.8 423.9 416C423.9 395.8 432.2 377.5 445.7 364.4zM144 488C104.2 488 72 455.8 72 416C72 376.2 104.2 344 144 344C175.3 344 202 364 211.9 392L144 392C130.7 392 120 402.7 120 416C120 429.3 130.7 440 144 440L211.9 440C202 468 175.3 488 144 488z"/></svg>                        
                                <p class="font-bold">Motor</p>
                            </div>
                            <div class="relative flex items-stretch">                  
                            <div class="w-6 bg-dark/50 rounded-l-full"></div>
                            <p class="absolute top-1.5 left-8">
                                Rp.
                            </p>                            
                            <input
                                id="hargaInput"
                                type="text"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 ps-12 outline-none"
                                placeholder="100.000"
                                required
                                wire:model="biayaMotor"
                            /> 
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <div class="flex flex-row items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M147 170.7L117.2 256L240.1 256L240.1 160L162.2 160C155.4 160 149.3 164.3 147.1 170.7zM48.6 257.9L86.5 149.6C97.8 117.5 128.1 96 162.1 96L360 96C385.2 96 408.9 107.9 424 128L520.2 256.3C587.1 260.5 640 316.1 640 384L640 400C640 435.3 611.3 464 576 464L559.6 464C555.6 508.9 517.9 544 472 544C426.1 544 388.4 508.9 384.4 464L239.7 464C235.7 508.9 198 544 152.1 544C106.2 544 68.5 508.9 64.5 464L64.1 464C28.8 464 .1 435.3 .1 400L.1 320C.1 289.9 20.8 264.7 48.7 257.9zM440 256L372.8 166.4C369.8 162.4 365 160 360 160L288 160L288 256L440 256zM152 496C174.1 496 192 478.1 192 456C192 433.9 174.1 416 152 416C129.9 416 112 433.9 112 456C112 478.1 129.9 496 152 496zM512 456C512 433.9 494.1 416 472 416C449.9 416 432 433.9 432 456C432 478.1 449.9 496 472 496C494.1 496 512 478.1 512 456z"/></svg>                                
                                <p class="font-bold">Mobil</p>
                            </div>
                            <div class="relative flex items-stretch">                  
                            <div class="w-6 bg-dark/50 rounded-l-full"></div>
                            <p class="absolute top-1.5 left-8">
                                Rp.
                            </p>                             
                            <input
                                id="hargaInput"
                                type="text"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 ps-12 outline-none"
                                placeholder="100.000"
                                required
                                wire:model="biayaMobil"
                            />                            
                            </div>
                        </div>
                    </div>                                        
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M128 128C128 92.7 156.7 64 192 64L341.5 64C358.5 64 374.8 70.7 386.8 82.7L493.3 189.3C505.3 201.3 512 217.6 512 234.6L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 128zM336 122.5L336 216C336 229.3 346.7 240 360 240L453.5 240L336 122.5zM192 152C192 165.3 202.7 176 216 176L264 176C277.3 176 288 165.3 288 152C288 138.7 277.3 128 264 128L216 128C202.7 128 192 138.7 192 152zM192 248C192 261.3 202.7 272 216 272L264 272C277.3 272 288 261.3 288 248C288 234.7 277.3 224 264 224L216 224C202.7 224 192 234.7 192 248zM304 324L304 328C275.2 328.3 252 351.7 252 380.5C252 406.2 270.5 428.1 295.9 432.3L337.6 439.3C343.6 440.3 348 445.5 348 451.6C348 458.5 342.4 464.1 335.5 464.1L280 464C269 464 260 473 260 484C260 495 269 504 280 504L304 504L304 508C304 519 313 528 324 528C335 528 344 519 344 508L344 503.3C369 499.2 388 477.6 388 451.5C388 425.8 369.5 403.9 344.1 399.7L302.4 392.7C296.4 391.7 292 386.5 292 380.4C292 373.5 297.6 367.9 304.5 367.9L352 367.9C363 367.9 372 358.9 372 347.9C372 336.9 363 327.9 352 327.9L344 327.9L344 323.9C344 312.9 335 303.9 324 303.9C313 303.9 304 312.9 304 323.9z"/></svg>
                            <p class="font-bold">Pajak</p>
                        </div>
                        <div class="relative flex items-stretch">                  
                            <div class="w-6 bg-dark/50 rounded-l-full relative"></div>
                            <p class="absolute top-1.5 left-8">
                                %
                            </p>
                            <input
                                id="hargaInput"
                                type="number"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 ps-12 outline-none pe-24"
                                placeholder="11"
                                min="0"
                                required
                                wire:model="pajak"
                            />
                        </div>
                    </div>
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M288 192C288 139 245 96 192 96C139 96 96 139 96 192C96 245 139 288 192 288C245 288 288 245 288 192zM544 448C544 395 501 352 448 352C395 352 352 395 352 448C352 501 395 544 448 544C501 544 544 501 544 448zM534.6 150.6C547.1 138.1 547.1 117.8 534.6 105.3C522.1 92.8 501.8 92.8 489.3 105.3L105.3 489.3C92.8 501.8 92.8 522.1 105.3 534.6C117.8 547.1 138.1 547.1 150.6 534.6L534.6 150.6z"/></svg>
                            <p class="font-bold">Diskon</p>
                        </div>
                        <div class="relative flex items-stretch">                  
                            <div class="w-6 bg-dark/50 rounded-l-full relative"></div>
                            <p class="absolute top-1.5 left-8">
                                Rp.
                            </p>
                            <input
                                id="hargaInput"
                                type="text"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 ps-12 outline-none pe-24"
                                placeholder="100.000"
                                required
                                wire:model="diskon"
                            />
                        </div>
                    </div>                    
                </div>
                <div class="w-full flex flex-col gap-y-4">
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M224 64C241.7 64 256 78.3 256 96L256 128L384 128L384 96C384 78.3 398.3 64 416 64C433.7 64 448 78.3 448 96L448 128L480 128C515.3 128 544 156.7 544 192L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 192C96 156.7 124.7 128 160 128L192 128L192 96C192 78.3 206.3 64 224 64zM224 320C206.3 320 192 334.3 192 352L192 416C192 433.7 206.3 448 224 448L416 448C433.7 448 448 433.7 448 416L448 352C448 334.3 433.7 320 416 320L224 320z"/></svg>
                            <p class="font-bold">Tanggal Keberangkatan</p>
                        </div>
                        <div class="relative flex items-stretch">
                            <div class="w-6 bg-dark/50 rounded-l-full"></div>
                            <input
                                wire:model.live="tanggalBerangkat"
                                type="date"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 outline-none"
                                placeholder="MM-DD-YYYY"
                                min="{{ now()->toDateString() }}"
                                required
                            />
                        </div>
                    </div>
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z"/></svg>
                            <p class="font-bold">Jam Keberangkatan</p>
                        </div>
                        <div class="relative flex items-stretch">
                            <div class="w-6 bg-dark/50 rounded-l-full"></div>
                            <input
                                wire:model.live="jamBerangkat"
                                type="time"
                                @if ($tanggalBerangkat === now()->toDateString())
                                    min="{{ now()->addHours(3)->format('H:i') }}"
                                @endif                                
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 outline-none"
                                required
                            />
                        </div>
                    </div>
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M224 64C241.7 64 256 78.3 256 96L256 128L384 128L384 96C384 78.3 398.3 64 416 64C433.7 64 448 78.3 448 96L448 128L480 128C515.3 128 544 156.7 544 192L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 192C96 156.7 124.7 128 160 128L192 128L192 96C192 78.3 206.3 64 224 64zM224 320C206.3 320 192 334.3 192 352L192 416C192 433.7 206.3 448 224 448L416 448C433.7 448 448 433.7 448 416L448 352C448 334.3 433.7 320 416 320L224 320z"/></svg>
                            <p class="font-bold">Perkiraan Tanggal Tiba</p>
                        </div>
                        <div class="relative flex items-stretch">
                            <div class="w-6 bg-dark/50 rounded-l-full"></div>
                            <input
                                type="date"
                                wire:model="tanggalTiba"
                                min="{{ $tanggalBerangkat ?? 'now()->toDateString()' }}"
                                class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 outline-none"
                                placeholder="MM-DD-YYYY"
                                required
                            />
                        </div>
                    </div>
                    <div class="min-h-16 w-full flex flex-col gap-2">
                        <div class="flex flex-row items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6"><path d="M320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z"/></svg>
                        <p class="font-bold">Perkiraan Jam Tiba</p>
                        </div>
                        <div class="relative flex items-stretch">
                        <div class="w-6 bg-dark/50 rounded-l-full"></div>
                        <input
                            type="time"
                            @if ($tanggalBerangkat === now()->toDateString())
                                min="{{ now()->addHours(3)->format('H:i') }}"
                            @endif                             
                            class="w-full rounded-r-full bg-dark/10 border-dark/50 border-2 p-1 px-4 outline-none"
                            required
                            wire:model="jamTiba"
                        />
                        </div>
                    </div>                    
                    <div class="min-h-16 w-full">
                        <p class="text-sm pb-2">
                            <span class="font-bold">Open Gate</span> : {{ $openGateLabel ?? '-' }}
                        </p>
                        <p class="text-sm">
                            <span class="font-bold">Arrival Threshold</span> : {{ $arrivalThresholdLabel ?? '-' }}
                        </p>
                    </div>                                     
                </div>
            </div>
        </div>
        <div class="p-4 bg-white border-t-2 border-dark/50 flex flex-row justify-end gap-4">
            <flux:button
                type="submit"
                wire:target="simpanJadwal"                        
                class="active:scale-80 transition-all duration-200 p-2! px-6! border-2! border-black! bg-orange-500! text-white! font-bold! rounded-full!"
            >
                Simpan
            </flux:button>
        </div>
    </form>
</flux:modal>

@script
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hargaInput = document.getElementById('hargaInput');

            // Format number with thousand separators
            function formatNumber(value) {
                // Remove non-numeric characters
                let cleanValue = value.replace(/[^0-9]/g, '');
                // Add thousand separators
                return cleanValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            // On input, format the value
            hargaInput.addEventListener('input', function () {
                let cursorPosition = this.selectionStart;
                let originalLength = this.value.length;
                let formatted = formatNumber(this.value);

                // Update input value
                this.value = formatted;

                // Adjust cursor position to account for added/removed dots
                let newLength = this.value.length;
                let cursorOffset = newLength - originalLength;
                this.setSelectionRange(cursorPosition + cursorOffset, cursorPosition + cursorOffset);

                // Trigger Livewire update
                @this.set('harga', formatted);
            });

            // On load, format the initial value (if any)
            if (hargaInput.value) {
                hargaInput.value = formatNumber(hargaInput.value);
            }
        });        
    </script>
@endscript