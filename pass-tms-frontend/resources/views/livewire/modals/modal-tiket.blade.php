<div>
    @foreach ($tikets as $i => $t)
        <flux:modal name="modal-tiket-{{ $t['id'] }}" class="font-sans! min-md:min-w-[calc(100vw*0.75)] max-md:w-[calc(100vw*0.75)] !z-0 bg-white flex flex-col rounded-2xl! border-2! border-dark! p-0!">
            <div class="p-4 bg-yellow text-dark w-full items-center border-b-2 border-dark flex flex-row justify-between">
                <flux:heading class="font-bold! text-xl! font-sans! text-dark!">
                    Tiket #{{ $t['id'] }}
                </flux:heading>
            </div>

            <div class="p-8 bg-white w-full min-md:pb-12 rounded-b-2xl overflow-y-auto max-h-[calc(100vh*0.7)]">
                <div class="flex flex-col gap-8 h-full text-dark relative">

                    {{-- Stamp status --}}
                    @if ($t['status'] === 'Menunggu Verifikasi')
                        <img class="absolute z-0 top-5 right-5 w-auto h-40 opacity-50"
                                src="{{ asset('img/assets/stamp_menunggu_verifikasi.png') }}" alt="">
                    @elseif ($t['status'] === 'Terverifikasi')
                        <img class="absolute z-0 top-5 right-5 w-auto h-40 opacity-50"
                                src="{{ asset('img/assets/stamp_terverifikasi.png') }}" alt="">
                    @elseif ($t['status'] === 'Dibatalkan')
                        <img class="absolute z-0 top-5 right-5 w-auto h-40 opacity-50"
                                src="{{ asset('img/assets/stamp_dibatalkan.png') }}" alt="">
                    @endif

                    <div class="flex min-md:flex-row max-md:flex-col justify-start max-md:gap-y-8 min-md:gap-8 items-start z-10">
                        <div class="flex flex-col gap-8">
                            <div class="text-xl font-bold py-1 px-2 bg-blue text-white">
                                Kode Tiket
                            </div>

                            <div class="w-40 h-40 bg-white p-2 rounded">
                                {!! QrCode::size(145)->generate($t['kodeUnik']) !!}
                            </div>

                        </div>

                        <div class="flex flex-col gap-8 max-md:pt-4">
                            <div class="text-xl py-1 px-2 bg-orange text-white font-bold min-md:w-[calc(100vw*0.2)] max-md:min-w-[calc(100vw*0.2)]">
                                Data Pemesan Tiket
                            </div>

                            <table class="w-full h-full gap-2 flex flex-col font-bold">
                                <tr>
                                    <td class="min-w-[calc(100vw*0.2)]">Nama</td>
                                    <td class="px-2">:</td>
                                    <td class="text-black text-shadow-white text-shadow-xl">{{ $t['pemesanNama'] }}</td>
                                </tr>
                                <tr>
                                    <td class="min-w-[calc(100vw*0.2)]">Nomor Telepon</td>
                                    <td class="px-2">:</td>
                                    <td class="text-black text-shadow-white text-shadow-xl">{{ $t['pemesanTelp'] }}</td>
                                </tr>
                                <tr>
                                    <td class="min-w-[calc(100vw*0.2)]">Harga Tiket</td>
                                    <td class="px-2">:</td>
                                    <td class="text-black text-shadow-white text-shadow-xl">
                                        {{ $t['biayaTiket'] !== null ? 'Rp. ' . number_format($t['biayaTiket'], 0, ',', '.') : '-' }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    {{-- Data Perjalanan --}}
                    <div class="flex flex-col max-md:pt-8 justify-start items-start gap-y-0.5">
                        <div class="px-2 py-2 bg-orange min-md:w-[calc(100vw*0.2)] max-md:min-w-[calc(100vw*0.2)] text-white font-bold text-xl">
                            Data Perjalanan
                        </div>

                        <div class="flex flex-row flex-wrap gap-y-0.5">
                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Nama Jadwal</div>
                                <div class="bg-aqua text-black p-2">{{ $t['rute'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Tanggal Keberangkatan</div>
                                <div class="bg-aqua text-black p-2">{{ $t['tanggalKeberangkatan'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Waktu Keberangkatan</div>
                                <div class="bg-aqua text-black p-2">{{ $t['waktuKeberangkatan'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Open Gate</div>
                                <div class="bg-aqua text-black p-2">{{ $t['openGate'] }}</div>
                            </div>
                            
                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Arrival Threshold</div>
                                <div class="bg-aqua text-black p-2">{{ $t['arrivalThreshold'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Asal</div>
                                <div class="bg-aqua text-black p-2">{{ $t['asal'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Tujuan</div>
                                <div class="bg-aqua text-black p-2">{{ $t['tujuan'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Tanggal Tiba</div>
                                <div class="bg-aqua text-black p-2">{{ $t['tanggalSampai'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Waktu Tiba</div>
                                <div class="bg-aqua text-black p-2">{{ $t['waktuSampai'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Nama Kapal</div>
                                <div class="bg-aqua text-black p-2">{{ $t['namaKapal'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Jenis Kendaraan</div>
                                <div class="bg-aqua text-black p-2">{{ $t['jenisKendaraan'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Nomor Polisi</div>
                                <div class="bg-aqua text-black p-2">{{ $t['nomorKendaraan'] }}</div>
                            </div>

                            <div class="flex-col flex min-w-40 border-x-1 border-white">
                                <div class="bg-blue text-white font-bold p-2">Status Tiket</div>
                                <div class="bg-aqua text-black p-2">{{ $t['status'] ?? '-' }}</div>
                            </div>
                        </div>
                    </div>

                    {{-- Data Penumpang --}}
                    <div class="flex flex-col max-md:pt-8 justify-start items-start gap-y-0.5">
                        <div class="px-2 py-2 bg-orange min-md:w-[calc(100vw*0.2)] max-md:min-w-[calc(100vw*0.2)] text-white font-bold text-xl">
                            Data Penumpang
                        </div>

                        <table class="h-full w-full">
                            <thead class="bg-blue font-bold text-white border-b-1 border-white">
                                <tr>
                                    <th class="p-2 border-e-1 border-white">No</th>
                                    <th class="p-2 border-e-1 border-white">Nama Penumpang</th>
                                    <th class="p-2 border-e-1 border-white">Jenis Penumpang</th>
                                </tr>
                            </thead>

                            <tbody class="text-black bg-aqua">
                                @forelse ($t['penumpangList'] as $pi => $namaPenumpang)
                                    <tr class="border-b-1 border-white">
                                        <td class="p-2 border-e-1 border-white text-center">{{ $pi + 1 }}</td>
                                        <td class="p-2 border-e-1 border-white">{{ $namaPenumpang }}</td>
                                        <td class="p-2 border-e-1 border-white">-</td>
                                    </tr>
                                @empty
                                    <tr class="border-b-1 border-white">
                                        <td class="p-2 text-center" colspan="3">Tidak ada data penumpang</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- <div class="p-4 bg-white border-t-2 border-dark/50 flex flex-row flex-wrap justify-end gap-4">
                <flux:button class="active:scale-80 transition-all duration-200 p-2! px-6! border-2! border-black! bg-orange-500! text-white! font-bold! rounded-full!">
                    Verifikasi
                </flux:button>
                <flux:button class="active:scale-80 transition-all duration-200 p-2! px-6! border-2! border-black! bg-lime-700! text-white! font-bold! rounded-full!">
                    Terverifikasi
                </flux:button>
                <flux:button class="active:scale-80 transition-all duration-200 p-2! px-6! border-2! border-black! bg-red-500! text-white! font-bold! rounded-full!">
                    Batalkan
                </flux:button>
            </div>          -->
        </flux:modal>
    @endforeach
</div>