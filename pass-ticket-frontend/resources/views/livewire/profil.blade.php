<div class="w-full h-full flex flex-col gap-12 pt-24 p-8">

    <!-- Profil Saya -->

    <div class="text-3xl text-black font-bold text-center w-full">
        PROFIL SAYA
    </div>

    <div class="flex min-md:flex-row max-md:flex-col gap-4 h-full">
        <div class="min-h-full min-md:w-1/4 max-md:w-full bg-aqua rounded-2xl border-2 border-black items-center justify-center flex flex-col gap-4 p-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-32 h-32 fill-black"><path d="M463 448.2C440.9 409.8 399.4 384 352 384L288 384C240.6 384 199.1 409.8 177 448.2C212.2 487.4 263.2 512 320 512C376.8 512 427.8 487.3 463 448.2zM64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320zM320 336C359.8 336 392 303.8 392 264C392 224.2 359.8 192 320 192C280.2 192 248 224.2 248 264C248 303.8 280.2 336 320 336z"/></svg>
        </div>
        <div class="min-h-full w-full bg-aqua rounded-2xl border-2 border-black p-8 flex flex-col gap-4">
            <div class="text-xl font-bold">Nama Lengkap</div>
            <input type="text" name="namaPengguna" id="namaPengguna" class="w-full rounded p-2 text-lg bg-abswhite border border-black px-4" placeholder="Nama Lengkap" />
            <div class="min-md:flex-row max-md:flex-col flex gap-4 w-full">
                <div class="w-full flex flex-col gap-4">
                    <div class="text-xl font-bold">Nomor Telepon</div>
                    <input type="number" name="nomorTelepon" id="nomorTelepon" class="w-full rounded p-2 text-lg bg-abswhite border border-black px-4" placeholder="Nomor Telepon" />
                </div>
                <div class="w-full flex flex-col gap-4">
                    <div class="text-xl font-bold">Email</div>
                    <input type="email" name="email" id="email" class="w-full rounded p-2 text-lg bg-abswhite border border-black px-4" placeholder="Email" />
                </div>
            </div>
            <div class="min-md:flex-row max-md:flex-col flex gap-4 w-full">
                <div class="w-full flex flex-col gap-4">
                    <div class="text-xl font-bold">Tanggal Lahir</div>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" class="w-full rounded p-2 text-lg bg-abswhite border border-black px-4 text-black" placeholder="Nomor Telepon" />
                </div>
                <div class="w-full flex flex-col gap-4">
                    <div class="text-xl font-bold">Jenis Kelamin</div>
                    <select name="email" id="email" class="w-full rounded p-2 text-lg bg-abswhite border border-black px-4">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
            </div>   
            <div class="w-full flex flex-row items-end justify-end pt-4">
                <div class="p-2 px-4 bg-yellow hover:bg-[#FFA000] text-white font-bold text-xl border border-black rounded-2xl cursor-pointer active:scale-90 transition duration-200">
                    Ubah Profil
                </div>
            </div>             
        </div>            
    </div>

    <!-- Ticket Saya -->

    <div class="text-3xl text-black font-bold text-center w-full">
        TIKET SAYA
    </div>

    <div class="flex flex-col gap-8 p-8 bg-aqua rounded-2xl border-2 border-black h-full w-full">
        <div class="min-md:flex-row max-md:flex-col flex min-md:gap-2 max-md:gap-0 justify-between min-md:w-full h-full px-4 min-md:border-b-2 border-black max-md:border-2 max-md:rounded-lg font-bold min-md:text-lg max-md:p-0 max-md:text-xs">

            <div class="flex-row flex w-full h-full max-md:border-b-2 border-black items-stretch">
                <div class="flex-1 text-center p-2 hover:bg-orange/20 cursor-pointer transition-discrete px-4 min-md:rounded-t-lg max-md:border-e-2 max-md:border-black transition-all duration-100 {{ $ticketSayaTab == 'menungguVerifikasi' ? 'bg-orange text-white! hover:bg-orange!' : '' }}" wire:click="setTicketSayaTab('menungguVerifikasi')">
                    Menunggu Verifikasi
                </div>

                <div class="flex-1 text-center p-2 hover:bg-orange/20 cursor-pointer transition-discrete px-4 min-md:rounded-t-lg transition-all duration-100 {{ $ticketSayaTab == 'terverifikasi' ? 'bg-orange text-white! hover:bg-orange!' : '' }}" wire:click="setTicketSayaTab('terverifikasi')">
                    Terverifikasi
                </div>
            </div>

            <div class="flex flex-row w-full h-full items-stretch">
                <div class="flex-1 text-center p-2 hover:bg-orange/20 cursor-pointer transition-discrete px-4 min-md:rounded-t-lg max-md:border-e-2 max-md:border-black transition-all duration-100 {{ $ticketSayaTab == 'dibatalkan' ? 'bg-orange text-white! hover:bg-orange!' : '' }}" wire:click="setTicketSayaTab('dibatalkan')">
                    Dibatalkan
                </div>

                <div class="flex-1 text-center p-2 hover:bg-orange/20 cursor-pointer transition-discrete px-4 min-md:rounded-t-lg transition-all duration-100 {{ $ticketSayaTab == 'selesai' ? 'bg-orange text-white! hover:bg-orange!' : '' }}" wire:click="setTicketSayaTab('selesai')">
                    Selesai / Kadaluarsa
                </div>
            </div>


        </div>

        <div class="flex flex-col gap-8 items-center justify-center min-h-80">
            @if($ticketSayaTab == 'menungguVerifikasi')
                <div class="min-lg:grid min-lg:grid-cols-14 w-full gap-x-2 max-lg:flex max-lg:flex-row max-lg:flex-wrap max-lg:gap-y-4">
                    <div class="min-lg:col-span-1 flex flex-row relative items-center w-full">
                        <input placeholder="No" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>                            
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Nama Jadwal" class=" ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Rute Perjalanan" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-2 flex flex-row relative items-center w-full">
                        <input placeholder="Nama Kapal" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Jadwal Keberangkatan" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-2 flex flex-row relative items-center w-full">
                        <input placeholder="harga" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>                        
                </div>

                <!-- Tabel Desktop -->

                <table class="bg-blue/50 rounded-2xl border-2 border-black p-4 w-full flex flex-col gap-y-4 max-lg:hidden ">
                    <tr class="grid grid-cols-14 gap-x-2">
                        <th class="col-span-1 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">No</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Nama Jadwal</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Rute</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Keberangkatan</th>
                        <th class="col-span-2 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Harga</th>
                        <th class="col-span-2 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Detail</th>
                    </tr>
                    <tbody class="bg-aqua flex flex-col rounded-2xl border-2 border-black">
                        <!-- Baris 1-->
                        <tr class="grid grid-cols-14 items-center border-b-2 border-black">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">1</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Menunggu</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>
                            </td>     
                        </tr>
                        <!-- Baris 2-->
                        <tr class="grid grid-cols-14 items-center border-b-2 border-black">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">2</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Open Gate</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>
                            </td>                                
                        </tr>                            
                        <!-- Baris 3-->
                        <tr class="grid grid-cols-14 items-center">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">3</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Arrival Threshold</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>                                    
                            </td>                                
                        </tr>
                    </tbody>
                    <!-- Tidak Ada Data -->                        
                    <tbody class="bg-aqua rounded-2xl border-2 border-black flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                        <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-white"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                        <tr><td class="text-white font-bold text-xl">Tidak Ada Tiket Menunggu Terverifikasi</td></tr>
                    </tbody>                  
                </table>

                <!-- Tabel Mobile -->

                <table class="min-lg:hidden w-full bg-blue/50 rounded-xl border-2 border-black p-4 flex flex-col gap-y-2">
                    <!-- Baris 1 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    1
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Baris 2 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    2
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Baris 3 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    3
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Tidak Ada Data -->
                    <tbody class="bg-aqua rounded-2xl border-2 border-black flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                        <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-white"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                        <tr><td class="text-white font-bold text-xl">Tidak Ada Tiket Menunggu Terverifikasi</td></tr>
                    </tbody>                                                                 
                </table>
            @endif

            @if($ticketSayaTab == 'terverifikasi')
                <div class="min-lg:grid min-lg:grid-cols-14 w-full gap-x-2 max-lg:flex max-lg:flex-row max-lg:flex-wrap max-lg:gap-y-4">
                    <div class="min-lg:col-span-1 flex flex-row relative items-center w-full">
                        <input placeholder="No" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>                            
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Nama Jadwal" class=" ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Rute Perjalanan" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-2 flex flex-row relative items-center w-full">
                        <input placeholder="Nama Kapal" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Jadwal Keberangkatan" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-2 flex flex-row relative items-center w-full">
                        <input placeholder="harga" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>                        
                </div>

                <!-- Tabel Desktop -->

                <table class="bg-blue/50 rounded-2xl border-2 border-black w-full p-4 flex flex-col gap-y-4 max-lg:hidden ">
                    <tr class="grid grid-cols-14 gap-x-2">
                        <th class="col-span-1 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">No</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Nama Jadwal</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Rute</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Keberangkatan</th>
                        <th class="col-span-2 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Harga</th>
                        <th class="col-span-2 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Detail</th>
                    </tr>
                    <tbody class="bg-aqua flex flex-col rounded-2xl border-2 border-black">
                        <!-- Baris 1-->
                        <tr class="grid grid-cols-14 items-center border-b-2 border-black">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">1</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Menunggu</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>
                            </td>     
                        </tr>
                        <!-- Baris 2-->
                        <tr class="grid grid-cols-14 items-center border-b-2 border-black">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">2</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Open Gate</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>
                            </td>                                
                        </tr>                            
                        <!-- Baris 3-->
                        <tr class="grid grid-cols-14 items-center">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">3</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Arrival Threshold</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>                                    
                            </td>                                
                        </tr>
                    </tbody>
                    <!-- Tidak Ada Data -->                        
                    <tbody class="bg-aqua rounded-2xl border-2 border-black flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                        <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-white"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                        <tr><td class="text-white font-bold text-xl">Tidak Ada Tiket Terverifikasi</td></tr>
                    </tbody>                  
                </table>

                <!-- Tabel Mobile -->

                <table class="min-lg:hidden w-full bg-blue/50 rounded-xl border-2 border-black p-4 flex flex-col gap-y-2">
                    <!-- Baris 1 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    1
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Baris 2 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    2
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Baris 3 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    3
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Tidak Ada Data -->
                    <tbody class="bg-aqua rounded-2xl border-2 border-black flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                        <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-white"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                        <tr><td class="text-white font-bold text-xl">Tidak Ada Tiket Terverifikasi</td></tr>
                    </tbody>                                                                 
                </table>
            @endif

            @if($ticketSayaTab == 'dibatalkan')
                <div class="min-lg:grid min-lg:grid-cols-14 w-full gap-x-2 max-lg:flex max-lg:flex-row max-lg:flex-wrap max-lg:gap-y-4">
                    <div class="min-lg:col-span-1 flex flex-row relative items-center w-full">
                        <input placeholder="No" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>                            
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Nama Jadwal" class=" ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Rute Perjalanan" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-2 flex flex-row relative items-center w-full">
                        <input placeholder="Nama Kapal" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Jadwal Keberangkatan" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-2 flex flex-row relative items-center w-full">
                        <input placeholder="harga" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>                        
                </div>

                <!-- Tabel Desktop -->

                <table class="bg-blue/50 rounded-2xl border-2 w-full border-black p-4 flex flex-col gap-y-4 max-lg:hidden ">
                    <tr class="grid grid-cols-14 gap-x-2">
                        <th class="col-span-1 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">No</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Nama Jadwal</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Rute</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Keberangkatan</th>
                        <th class="col-span-2 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Harga</th>
                        <th class="col-span-2 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Detail</th>
                    </tr>
                    <tbody class="bg-aqua flex flex-col rounded-2xl border-2 border-black">
                        <!-- Baris 1-->
                        <tr class="grid grid-cols-14 items-center border-b-2 border-black">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">1</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Menunggu</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>
                            </td>     
                        </tr>
                        <!-- Baris 2-->
                        <tr class="grid grid-cols-14 items-center border-b-2 border-black">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">2</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Open Gate</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>
                            </td>                                
                        </tr>                            
                        <!-- Baris 3-->
                        <tr class="grid grid-cols-14 items-center">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">3</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Arrival Threshold</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>                                    
                            </td>                                
                        </tr>
                    </tbody>
                    <!-- Tidak Ada Data -->                        
                    <tbody class="bg-aqua rounded-2xl border-2 border-black flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                        <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-white"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                        <tr><td class="text-white font-bold text-xl">Tidak Ada Tiket Dibatalkan</td></tr>
                    </tbody>                  
                </table>

                <!-- Tabel Mobile -->

                <table class="min-lg:hidden w-full bg-blue/50 rounded-xl border-2 border-black p-4 flex flex-col gap-y-2">
                    <!-- Baris 1 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    1
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Baris 2 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    2
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Baris 3 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    3
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Tidak Ada Data -->
                    <tbody class="bg-aqua rounded-2xl border-2 border-black flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                        <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-white"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                        <tr><td class="text-white font-bold text-xl">Tidak Ada Tiket Dibatalkan</td></tr>
                    </tbody>                                                                 
                </table>
            @endif

            @if($ticketSayaTab == 'selesai')
                <div class="min-lg:grid min-lg:grid-cols-14 w-full gap-x-2 max-lg:flex max-lg:flex-row max-lg:flex-wrap max-lg:gap-y-4">
                    <div class="min-lg:col-span-1 flex flex-row relative items-center w-full">
                        <input placeholder="No" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>                            
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Nama Jadwal" class=" ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Rute Perjalanan" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-2 flex flex-row relative items-center w-full">
                        <input placeholder="Nama Kapal" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-3 flex flex-row relative items-center w-full">
                        <input placeholder="Jadwal Keberangkatan" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>
                    <div class="min-lg:col-span-2 flex flex-row relative items-center w-full">
                        <input placeholder="harga" class="ps-8 w-full rounded-full items-center text-left bg-blue/40 outline-none p-2 px-4 placeholder:text-white/80 text-white placeholder:font-italic border-2 border-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-black/40 absolute left-2"><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                    </div>                        
                </div>

                <!-- Tabel Desktop -->

                <table class="bg-blue/50 rounded-2xl border-2 w-full border-black p-4 flex flex-col gap-y-4 max-lg:hidden ">
                    <tr class="grid grid-cols-14 gap-x-2">
                        <th class="col-span-1 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">No</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Nama Jadwal</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Rute</th>
                        <th class="col-span-3 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Keberangkatan</th>
                        <th class="col-span-2 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Harga</th>
                        <th class="col-span-2 w-full rounded-full items-center text-center bg-aqua p-2 text-black font-bold border-2 border-black">Detail</th>
                    </tr>
                    <tbody class="bg-aqua flex flex-col rounded-2xl border-2 border-black">
                        <!-- Baris 1-->
                        <tr class="grid grid-cols-14 items-center border-b-2 border-black">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">1</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Menunggu</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>
                            </td>     
                        </tr>
                        <!-- Baris 2-->
                        <tr class="grid grid-cols-14 items-center border-b-2 border-black">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">2</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Open Gate</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>
                            </td>                                
                        </tr>                            
                        <!-- Baris 3-->
                        <tr class="grid grid-cols-14 items-center">
                            <td class="col-span-1 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">3</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">0112AB - Batam->Bintan</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Telaga Punggur - Bandar Bentan Telani</td>
                            <td class="col-span-3 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">20 Oktober 2023, 08:00 WIB</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold border-e-2 border-black">Arrival Threshold</td>
                            <td class="col-span-2 h-full flex justify-center items-center text-center p-2 text-black font-bold cursor-pointer">
                                <flux:modal.trigger name="modal-edit-jadwal">
                                    <flux:button class="bg-transparent! border-none! text-black! shadow-none! text-xl!">•••</flux:button>
                                </flux:modal.trigger>                                    
                            </td>                                
                        </tr>
                    </tbody>
                    <!-- Tidak Ada Data -->                        
                    <tbody class="bg-aqua rounded-2xl border-2 border-black flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                        <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-white"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                        <tr><td class="text-white font-bold text-xl">Tidak Ada Tiket Selesai/Kadaluarsa</td></tr>
                    </tbody>                  
                </table>

                <!-- Tabel Mobile -->

                <table class="min-lg:hidden w-full bg-blue/50 rounded-xl border-2 border-black p-4 flex flex-col gap-y-2">
                    <!-- Baris 1 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    1
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Baris 2 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    2
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Baris 3 -->
                    <tbody class="bg-white rounded-2xl border-2 border-black flex flex-row justify-between">                            
                        <tr class="flex flex-col items-start w-full">
                            <td class="order-first text-start text-sm font-regular border-b-1 border-black flex flex-row justify-between w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    No
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    3
                                </div>
                            </td>
                            <td class="order-1 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Batam - Bintan Ferry
                                </div>
                            </td>
                            <td class="order-2 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Rute Perjalanan
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Telaga Punggur - Bandar Bentan Telani
                                </div>
                            </td>
                            <td class="order-3 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Nama Kapal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    KMP Serumpun Sebalai
                                </div>
                            </td>
                            <td class="order-4 text-start text-sm font-regular border-b-1 border-black flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Jadwal
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    20 Oktober 2023, 08:00 WIB
                                </div>
                            </td>
                            <td class="order-5 text-start text-sm font-regular border-b-1 border-black flex w-full bg-blue/10">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Harga
                                </div>
                                <div class="items-start justify-start flex w-full p-2 px-2 font-bold">
                                    Rp. 100.000
                                </div>
                            </td>
                            <td class="order-last text-start text-sm font-regular flex w-full">
                                <div class="items-start justify-start flex w-full p-2 ps-2 border-e-1 border-black">
                                    Detail
                                </div>
                                <flux:modal.trigger name="modal-edit-jadwal" class="items-start! justify-start! flex! w-full! py-2! px-2! font-bold!">
                                    <flux:button class="flex! py-1! bg-aqua! text-black! rounded-full! px-2! border-1! border-black! active:scale-90! transition-all! duration-50! font-bold!">Detail</flux:button>
                                </flux:modal.trigger>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Tidak Ada Data -->
                    <tbody class="bg-aqua rounded-2xl border-2 border-black flex flex-col min-w-full min-h-60 gap-y-4 items-center justify-center">
                        <tr><td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-24 h-24 fill-white"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM231 231C240.4 221.6 255.6 221.6 264.9 231L319.9 286L374.9 231C384.3 221.6 399.5 221.6 408.8 231C418.1 240.4 418.2 255.6 408.8 264.9L353.8 319.9L408.8 374.9C418.2 384.3 418.2 399.5 408.8 408.8C399.4 418.1 384.2 418.2 374.9 408.8L319.9 353.8L264.9 408.8C255.5 418.2 240.3 418.2 231 408.8C221.7 399.4 221.6 384.2 231 374.9L286 319.9L231 264.9C221.6 255.5 221.6 240.3 231 231z"/></svg></td></tr>
                        <tr><td class="text-white font-bold text-xl">Tidak Ada Tiket Selesai/Kadaluarsa</td></tr>
                    </tbody>                                                                 
                </table>
            @endif
        </div>
    </div>
</div>