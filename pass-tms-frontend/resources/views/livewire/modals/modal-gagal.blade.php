<flux:modal name="modal-gagal" class="font-sans! min-w-[calc(100vw*0.3)] !z-0 overflow-hidden bg-white flex flex-col rounded-2xl! border-2! border-dark! p-0!" tabindex="-1">
    <div class="p-4 bg-yellow text-dark w-full items-center border-b-2 border-dark flex flex-row justify-between">
        <flux:heading class="font-bold! text-xl! font-sans! text-dark!">
            {{ $title ?? 'Gagal'}}
        </flux:heading>
    </div>
    <div class="p-8 bg-white w-full min-md:pb-12 rounded-b-2xl items-center justify-center flex flex-col gap-4">
        <div class="w-50 h-50">
            <video class="w-full h-full" autoplay loop muted
                onloadeddata="this.playbackRate=0.3">
                <source src="{{ asset('img/gif/gagal.webm') }}" type="video/webm">
            </video>
        </div>
        <div class="w-full h-full flex flex-col gap-2 items-center">
            <p class="text-xl font-bold text-dark text-center">{{ $message ?? 'Maaf, proses yang anda jalankan gagal.' }}</p></p>
            <p class="text-sm text-black/25">Silahkan tutup Pop-up ini.</p>
        </div>
    </div>
</flux:modal>