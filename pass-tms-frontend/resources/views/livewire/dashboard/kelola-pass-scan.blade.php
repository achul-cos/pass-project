<div class="h-full w-full"">

    <livewire:modals.modal-berhasil />
    <livewire:dashboard.sidebar />    

    <div class="relative w-full z-0 min-h-[calc(100vh)] pt-28 flex flex-col bg-cover bg-no-repeat bg-top-right overflow-hidden transition-all duration-500 max-md:ps-0 min-md:ps-48"
         :class="sidebarOpen ? 'min-md:!ps-48 max-md:!ps-0' : 'min-md:!ps-0 max-md:!ps-0'">
        <!-- Background -->
        <div class="absolute top-26 inset-0 z-0 left-48 bg-[url(../../public/img/pattren/Square-Pattern1-Orange.png)] bg-cover bg-no-repeat opacity-15"></div>

        <!-- Sub Judul -->
        <div class="relative text-dark flex flex-col gap-y-2 p-4 ps-8 pb-8 border-b-2 border-dark shrink-0">
            <p class="text-2xl font-bold">Kelola PASS SCAN</p>
            <p class="text-sm">Memantau kinerja alat IoT secara real-time.</p>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black"><path d="M240 88C240 74.7 229.3 64 216 64C202.7 64 192 74.7 192 88L192 128C156.7 128 128 156.7 128 192L88 192C74.7 192 64 202.7 64 216C64 229.3 74.7 240 88 240L128 240L128 296L88 296C74.7 296 64 306.7 64 320C64 333.3 74.7 344 88 344L128 344L128 400L88 400C74.7 400 64 410.7 64 424C64 437.3 74.7 448 88 448L128 448C128 483.3 156.7 512 192 512L192 552C192 565.3 202.7 576 216 576C229.3 576 240 565.3 240 552L240 512L296 512L296 552C296 565.3 306.7 576 320 576C333.3 576 344 565.3 344 552L344 512L400 512L400 552C400 565.3 410.7 576 424 576C437.3 576 448 565.3 448 552L448 512C483.3 512 512 483.3 512 448L552 448C565.3 448 576 437.3 576 424C576 410.7 565.3 400 552 400L512 400L512 344L552 344C565.3 344 576 333.3 576 320C576 306.7 565.3 296 552 296L512 296L512 240L552 240C565.3 240 576 229.3 576 216C576 202.7 565.3 192 552 192L512 192C512 156.7 483.3 128 448 128L448 88C448 74.7 437.3 64 424 64C410.7 64 400 74.7 400 88L400 128L344 128L344 88C344 74.7 333.3 64 320 64C306.7 64 296 74.7 296 88L296 128L240 128L240 88zM224 192L416 192C433.7 192 448 206.3 448 224L448 416C448 433.7 433.7 448 416 448L224 448C206.3 448 192 433.7 192 416L192 224C192 206.3 206.3 192 224 192zM240 240L240 400L400 400L400 240L240 240z"/></svg>
                                </div>
                                <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                    <p class="text-xl font-bold text-white">Welcoming Gateway</p>
                                    <p class="text-base text-white">Online</p>
                                </div>
                            </div>
                            <div class="min-h-30 min-w-60 bg-orange rounded-2xl border-2 border-dark flex flex-row">
                                <div class="h-full w-15 bg-yellow rounded-s-2xl items-center justify-center flex border-e-2 border-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-8 h-8 fill-black"><path d="M240 88C240 74.7 229.3 64 216 64C202.7 64 192 74.7 192 88L192 128C156.7 128 128 156.7 128 192L88 192C74.7 192 64 202.7 64 216C64 229.3 74.7 240 88 240L128 240L128 296L88 296C74.7 296 64 306.7 64 320C64 333.3 74.7 344 88 344L128 344L128 400L88 400C74.7 400 64 410.7 64 424C64 437.3 74.7 448 88 448L128 448C128 483.3 156.7 512 192 512L192 552C192 565.3 202.7 576 216 576C229.3 576 240 565.3 240 552L240 512L296 512L296 552C296 565.3 306.7 576 320 576C333.3 576 344 565.3 344 552L344 512L400 512L400 552C400 565.3 410.7 576 424 576C437.3 576 448 565.3 448 552L448 512C483.3 512 512 483.3 512 448L552 448C565.3 448 576 437.3 576 424C576 410.7 565.3 400 552 400L512 400L512 344L552 344C565.3 344 576 333.3 576 320C576 306.7 565.3 296 552 296L512 296L512 240L552 240C565.3 240 576 229.3 576 216C576 202.7 565.3 192 552 192L512 192C512 156.7 483.3 128 448 128L448 88C448 74.7 437.3 64 424 64C410.7 64 400 74.7 400 88L400 128L344 128L344 88C344 74.7 333.3 64 320 64C306.7 64 296 74.7 296 88L296 128L240 128L240 88zM224 192L416 192C433.7 192 448 206.3 448 224L448 416C448 433.7 433.7 448 416 448L224 448C206.3 448 192 433.7 192 416L192 224C192 206.3 206.3 192 224 192zM240 240L240 400L400 400L400 240L240 240z"/></svg>                                </div>
                                <div class="flex flex-col gap-y-1 justify-center items-start p-4">
                                    <p class="text-xl font-bold text-white">Check-in Gateway</p>
                                    <p class="text-base text-white">Offline</p>
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

                <iframe 
                    src="http://10.20.30.123:8889/stream/" 
                    width="640" 
                    height="480"
                    allow="autoplay"
                    style="border:none;">
                </iframe>

                <div class="flex flex-col gap-y-4">
                    <p class="text-xl font-bold text-dark border-b-2 pe-4 pb-2">Log Aktivitas</p>
                    <div class="min-lg:grid min-lg:grid-cols-14 w-full gap-x-2 max-lg:flex max-lg:flex-row max-lg:flex-wrap max-lg:gap-y-4 max-lg:pb-4">
                        <div class="min-lg:col-span-2 flex flex-row w-auto relative items-center">
                            <input placeholder="No" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>                            
                        </div>
                        <div class="min-lg:col-span-4 flex flex-row relative items-center">
                            <input placeholder="Waktu" class=" ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>
                        <div class="min-lg:col-span-8 flex flex-row relative items-center">
                            <input placeholder="Aktivitas" class="ps-8 min-lg:w-full rounded-full items-center text-left bg-dark/40 p-2 px-4 placeholder:text-black/60 placeholder:font-italic border-2 border-dark/40" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </div>                        
                    </div>

                    <!-- Tabel Desktop -->

                    <table class="bg-yellow rounded-2xl border-2 border-dark p-4 flex flex-col gap-y-4 max-lg:hidden ">
                        <tr class="grid grid-cols-14 gap-x-2">
                            <th class="col-span-2 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">No</th>
                            <th class="col-span-4 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Waktu</th>
                            <th class="col-span-8 w-full rounded-full items-center text-center bg-orange p-2 text-white font-bold border-2 border-dark">Aktivitas</th>
                        </tr>
                        <tbody class="bg-orange flex flex-col rounded-2xl border-2 border-dark">
                            <!-- Baris 1-->
                            <tr class="grid grid-cols-14 items-center border-b-2 border-dark">
                                <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-white font-bold border-e-2 border-dark">1</td>
                                <td class="col-span-4 h-full flex justify-center items-center text-center p-2 text-white font-bold border-e-2 border-dark">10 November 2025, 10.00 WIB</td>
                                <td class="col-span-8 h-full flex justify-center items-center text-center p-2 text-white font-bold border-e-2 border-dark">Welcoming Gateway Hidup</td>   
                            </tr>
                            <!-- Baris 2-->
                            <tr class="grid grid-cols-14 items-center border-b-2 border-dark">
                                <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-white font-bold border-e-2 border-dark">2</td>
                                <td class="col-span-4 h-full flex justify-center items-center text-center p-2 text-white font-bold border-e-2 border-dark">10 November 2025, 11.00 WIB</td>
                                <td class="col-span-8 h-full flex justify-center items-center text-center p-2 text-white font-bold border-e-2 border-dark">Check-in Gateway Hidup</td>                            
                            </tr>                            
                            <!-- Baris 3-->
                            <tr class="grid grid-cols-14 items-center">
                                <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-white font-bold border-e-2 border-dark">3</td>
                                <td class="col-span-4 h-full flex justify-center items-center text-center p-2 text-white font-bold border-e-2 border-dark">10 November 2025, 21.00 WIB</td>
                                <td class="col-span-8 h-full flex justify-center items-center text-center p-2 text-white font-bold border-e-2 border-dark">Welcoming Gateway Mati</td>                              
                            </tr>
                        </tbody>
                        <!-- Tidak Ada Data -->                        
                        <tbody class="bg-orange rounded-2xl border-2 border-dark flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                            <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-white"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                            <tr><td class="text-white font-bold text-xl">Tidak Ada Data</td></tr>
                        </tbody>                         
                    </table>

                    <!-- Tabel Mobile -->

                    <table class="min-lg:hidden bg-yellow rounded-xl border-2 border-dark p-4 flex flex-col gap-y-2">
                        <!-- Baris 1 -->
                        <tbody class="bg-white rounded-2xl border-2 border-dark flex flex-row justify-between">                            
                            <tr class="flex flex-col items-start w-full">
                                <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                    <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                        No
                                    </div>
                                    <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                        1
                                    </div>
                                </td>
                                <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-dark/20">
                                    <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                        Waktu
                                    </div>
                                    <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                        10 November 2025, 10.00 WIB
                                    </div>
                                </td>
                                <td class="order-last text-start text-sm font-regular flex w-full">
                                    <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                        Aktivitas
                                    </div>
                                    <div class="items-start justify-start flex w-full py-2 px-2 font-bold">
                                        Welcoming Gateway Hidup
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <!-- Baris 2 -->
                        <tbody class="bg-white rounded-2xl border-2 border-dark flex flex-row justify-between">                            
                            <tr class="flex flex-col items-start w-full">
                                <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                    <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                        No
                                    </div>
                                    <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                        2
                                    </div>
                                </td>
                                <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-dark/20">
                                    <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                        Waktu
                                    </div>
                                    <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                        10 November 2025, 11.00 WIB
                                    </div>
                                </td>
                                <td class="order-last text-start text-sm font-regular flex w-full">
                                    <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                        Aktivitas
                                    </div>
                                    <div class="items-start justify-start flex w-full py-2 px-2 font-bold">
                                        Check-in Gateway Hidup
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <!-- Baris 3 -->
                        <tbody class="bg-white rounded-2xl border-2 border-dark flex flex-row justify-between">                            
                            <tr class="flex flex-col items-start w-full">
                                <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                    <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                        No
                                    </div>
                                    <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                        3
                                    </div>
                                </td>
                                <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-dark/20">
                                    <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                        Waktu
                                    </div>
                                    <div class="items-start justify-start flex w-full p-1.25 px-2 font-bold">
                                        10 November 2025, 22.00 WIB
                                    </div>
                                </td>
                                <td class="order-last text-start text-sm font-regular flex w-full">
                                    <div class="items-start justify-start flex w-full p-1.25 ps-2 border-e-1 border-black">
                                        Aktivitas
                                    </div>
                                    <div class="items-start justify-start flex w-full py-2 px-2 font-bold">
                                        Welcoming Gateway Mati
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <!-- Tidak Ada Data -->
                        <tbody class="bg-white rounded-2xl border-2 border-dark flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                            <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-dark"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                            <tr><td class="text-dark font-bold text-xl">Tidak Ada Data</td></tr>
                        </tbody>                                                                 
                    </table>
                </div>
            </div>
            <div class="w-8 text-dark bg-[image:repeating-linear-gradient(315deg,currentColor_0,currentColor_1px,transparent_0,transparent_4%)]"></div>
        </div>
    </div>

</div>
