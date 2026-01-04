<main x-data="{ openSidebar: true, openMenu: false, openSidebarMobile: false}" x-init="$watch('openSidebarMobile', val => document.body.classList.toggle('overflow-hidden', val))">

    <nav class="bg-white fixed top-0 z-10 border-4 border-dark w-screen h-24 max-md:hidden min-md:block">
        <div class="h-full p-4 flex flex-row justify-between items-center transition-all duration-500 ms-46" :class="openSidebar ? 'ms-46' : '!ms-0'">
            <div class="flex flex-col font-sans text-dark truncate" x-data="clock()" x-init="startClock()">
                <p class="text-2xl truncate max-w-[calc(100vw-60vw)]">Hai, <span class="font-bold">Admin Desktoppppppppppppppp</span></p>
                <p x-text="time" class="truncate max-w-[calc(100vw-60vw)]"></p>
            </div>
            <div class="flex flex-row-reverse items-center gap-4">
                <button @click="openMenu = !openMenu" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-12 h-12 fill-dark hover:fill-orange transition">
                        <path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/>
                    </svg>
                </button>
                <button @click="openSidebar = !openSidebar; window.dispatchEvent(new CustomEvent('sidebar-toggled', { detail: openSidebar }))">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" :class="sidebarOpen ? 'rotate-0' : 'rotate-90'" class="w-12 h-12 fill-dark hover:fill-orange transition-all"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 160C96 142.3 110.3 128 128 128L512 128C529.7 128 544 142.3 544 160C544 177.7 529.7 192 512 192L128 192C110.3 192 96 177.7 96 160zM96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320zM544 480C544 497.7 529.7 512 512 512L128 512C110.3 512 96 497.7 96 480C96 462.3 110.3 448 128 448L512 448C529.7 448 544 462.3 544 480z"/></svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile -->
    <nav class="bg-white fixed top-0 z-10 border-4 border-dark w-screen h-24 min-md:hidden max-md:block">
        <div class="h-full p-4 flex flex-row justify-between items-center transition-all duration-500">
            <div class="flex flex-col font-sans text-dark" x-data="clock()" x-init="startClock()">
                <p class="text-2xl truncate max-w-[calc(100vw-60vw)]">Hai, <span class="font-bold">Admin Mobileeeeeeeeeee</span></p>
                <p x-text="time" class="truncate max-w-[calc(100vw-60vw)]"></p>
            </div>
            <div class="flex flex-row-reverse items-center gap-4">

                <!-- Profil Icon -->
                <button @click="openMenu = !openMenu" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-12 h-12 fill-dark hover:fill-orange transition">
                        <path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/>
                    </svg>
                </button>

                <!-- Hamburger icon - Mobile -->
                <button @click="openSidebarMobile = !openSidebarMobile; window.dispatchEvent(new CustomEvent('sidebar-toggled', { detail: openSidebarMobile }))">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" :class="openSidebarMobile ? 'rotate-90' : 'rotate-0'" class="w-12 h-12 fill-dark hover:fill-orange transition-all"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 160C96 142.3 110.3 128 128 128L512 128C529.7 128 544 142.3 544 160C544 177.7 529.7 192 512 192L128 192C110.3 192 96 177.7 96 160zM96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320zM544 480C544 497.7 529.7 512 512 512L128 512C110.3 512 96 497.7 96 480C96 462.3 110.3 448 128 448L512 448C529.7 448 544 462.3 544 480z"/></svg>
                </button>                
            </div>
        </div>
    </nav>     

    <aside
        x-cloak
        x-show="openSidebar"
        x-transition:enter="transform transition ease-in-out duration-500"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transform transition ease-in-out duration-500"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="-translate-x-full"
        class="bg-yellow border-4 border-dark fixed top-0 left-0 h-full w-48 z-40 shadow-lg max-md:hidden">
        <div class="w-full h-full flex flex-col">
            <div class="items-center p-4 h-22.5">
                <img src="{{ asset('img\logo\icon-emblem-horizon-cream.png') }}" alt="" class="h-auto w-36 translate-y-2" data-aos="flip-left">
            </div>
            <div class="items-start flex flex-col">
                <a href="{{ route('dashboard.KelolaJadwalKeberangkatan') }}" wire:navigate wire:current="bg-orange/50" class="hover:bg-orange transition duration-100 border-dark border-t-2 border-b-2 hover:border-transparent p-4 w-full flex flex-row gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6 fill-black"><path d="M320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z"/></svg>
                    </div>
                    <div class="font-bold">
                        kelola Jadwal keberangkatan
                    </div>
                </a>
                <a href="{{ route('dashboard.KelolaPassScan') }}" wire:navigate wire:current="bg-orange/50" class="hover:bg-orange transition duration-100 border-dark border-b-2 hover:border-transparent p-4 w-full flex flex-row gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6 fill-black"><path d="M240 88C240 74.7 229.3 64 216 64C202.7 64 192 74.7 192 88L192 128C156.7 128 128 156.7 128 192L88 192C74.7 192 64 202.7 64 216C64 229.3 74.7 240 88 240L128 240L128 296L88 296C74.7 296 64 306.7 64 320C64 333.3 74.7 344 88 344L128 344L128 400L88 400C74.7 400 64 410.7 64 424C64 437.3 74.7 448 88 448L128 448C128 483.3 156.7 512 192 512L192 552C192 565.3 202.7 576 216 576C229.3 576 240 565.3 240 552L240 512L296 512L296 552C296 565.3 306.7 576 320 576C333.3 576 344 565.3 344 552L344 512L400 512L400 552C400 565.3 410.7 576 424 576C437.3 576 448 565.3 448 552L448 512C483.3 512 512 483.3 512 448L552 448C565.3 448 576 437.3 576 424C576 410.7 565.3 400 552 400L512 400L512 344L552 344C565.3 344 576 333.3 576 320C576 306.7 565.3 296 552 296L512 296L512 240L552 240C565.3 240 576 229.3 576 216C576 202.7 565.3 192 552 192L512 192C512 156.7 483.3 128 448 128L448 88C448 74.7 437.3 64 424 64C410.7 64 400 74.7 400 88L400 128L344 128L344 88C344 74.7 333.3 64 320 64C306.7 64 296 74.7 296 88L296 128L240 128L240 88zM224 192L416 192C433.7 192 448 206.3 448 224L448 416C448 433.7 433.7 448 416 448L224 448C206.3 448 192 433.7 192 416L192 224C192 206.3 206.3 192 224 192zM240 240L240 400L400 400L400 240L240 240z"/></svg>
                    </div>
                    <div class="font-bold">
                        kelola PASS SCAN
                    </div>
                </a>
                <a href="{{ route('dashboard.KelolaPengguna') }}" wire:navigate wire:current="bg-orange/50" class="hover:bg-orange transition duration-100 border-dark border-b-2 hover:border-transparent p-4 w-full flex flex-row gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6 fill-black"><path d="M320 80C377.4 80 424 126.6 424 184C424 241.4 377.4 288 320 288C262.6 288 216 241.4 216 184C216 126.6 262.6 80 320 80zM96 152C135.8 152 168 184.2 168 224C168 263.8 135.8 296 96 296C56.2 296 24 263.8 24 224C24 184.2 56.2 152 96 152zM0 480C0 409.3 57.3 352 128 352C140.8 352 153.2 353.9 164.9 357.4C132 394.2 112 442.8 112 496L112 512C112 523.4 114.4 534.2 118.7 544L32 544C14.3 544 0 529.7 0 512L0 480zM521.3 544C525.6 534.2 528 523.4 528 512L528 496C528 442.8 508 394.2 475.1 357.4C486.8 353.9 499.2 352 512 352C582.7 352 640 409.3 640 480L640 512C640 529.7 625.7 544 608 544L521.3 544zM472 224C472 184.2 504.2 152 544 152C583.8 152 616 184.2 616 224C616 263.8 583.8 296 544 296C504.2 296 472 263.8 472 224zM160 496C160 407.6 231.6 336 320 336C408.4 336 480 407.6 480 496L480 512C480 529.7 465.7 544 448 544L192 544C174.3 544 160 529.7 160 512L160 496z"/></svg>
                    </div>
                    <div class="font-bold">
                        kelola Pengguna
                    </div>
                </a>     
                <a href="{{ route('dashboard.KelolaProfil') }}" wire:navigate wire:current="bg-orange/50" class="hover:bg-orange transition duration-100 border-dark border-b-2 hover:border-transparent p-4 w-full flex flex-row gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6 fill-black"><path d="M259.1 73.5C262.1 58.7 275.2 48 290.4 48L350.2 48C365.4 48 378.5 58.7 381.5 73.5L396 143.5C410.1 149.5 423.3 157.2 435.3 166.3L503.1 143.8C517.5 139 533.3 145 540.9 158.2L570.8 210C578.4 223.2 575.7 239.8 564.3 249.9L511 297.3C511.9 304.7 512.3 312.3 512.3 320C512.3 327.7 511.8 335.3 511 342.7L564.4 390.2C575.8 400.3 578.4 417 570.9 430.1L541 481.9C533.4 495 517.6 501.1 503.2 496.3L435.4 473.8C423.3 482.9 410.1 490.5 396.1 496.6L381.7 566.5C378.6 581.4 365.5 592 350.4 592L290.6 592C275.4 592 262.3 581.3 259.3 566.5L244.9 496.6C230.8 490.6 217.7 482.9 205.6 473.8L137.5 496.3C123.1 501.1 107.3 495.1 99.7 481.9L69.8 430.1C62.2 416.9 64.9 400.3 76.3 390.2L129.7 342.7C128.8 335.3 128.4 327.7 128.4 320C128.4 312.3 128.9 304.7 129.7 297.3L76.3 249.8C64.9 239.7 62.3 223 69.8 209.9L99.7 158.1C107.3 144.9 123.1 138.9 137.5 143.7L205.3 166.2C217.4 157.1 230.6 149.5 244.6 143.4L259.1 73.5zM320.3 400C364.5 399.8 400.2 363.9 400 319.7C399.8 275.5 363.9 239.8 319.7 240C275.5 240.2 239.8 276.1 240 320.3C240.2 364.5 276.1 400.2 320.3 400z"/></svg>
                    </div>
                    <div class="font-bold">
                        kelola Profil
                    </div>
                </a>                                 
            </div>
            <div x-data="clock()" x-init="startClock()" class="flex flex-col mt-auto text-white p-4">
                <p class="text-2xl">
                    Hai, <span class="font-bold">Admin</span>
                </p>
                <p x-text="time" class="text-sm"></p>
            </div>
        </div>
    </aside>

    <!-- Mobile -->
    <aside class="bg-yellow border-4 border-dark fixed top-0 left-0 h-full w-48 z-40 shadow-xl min-md:hidden"
        x-show="openSidebarMobile"
        x-transition:enter="transform transition ease-in-out duration-500"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transform transition ease-in-out duration-500"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-cloak
        @click.outside="openSidebarMobile = false"
        x-transition:leave-end="-translate-x-full">
        <div class="w-full h-full flex flex-col">
            <div class="items-center p-4 h-22.5">
                <img src="{{ asset('img\logo\icon-emblem-horizon-cream.png') }}" alt="" class="h-auto w-36 translate-y-2" data-aos="flip-left">
            </div>
            <div class="items-start flex flex-col">
                <a href="{{ route('dashboard.KelolaJadwalKeberangkatan') }}" wire:navigate wire:current="bg-orange/50" class="hover:bg-orange transition duration-100 border-dark border-t-2 border-b-2 hover:border-transparent p-4 w-full flex flex-row gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6 fill-black"><path d="M320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z"/></svg>
                    </div>
                    <div class="font-bold">
                        kelola Jadwal keberangkatan
                    </div>
                </a>
                <a href="{{ route('dashboard.KelolaPassScan') }}" wire:navigate wire:current="bg-orange/50" class="hover:bg-orange transition duration-100 border-dark border-b-2 hover:border-transparent p-4 w-full flex flex-row gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6 fill-black"><path d="M240 88C240 74.7 229.3 64 216 64C202.7 64 192 74.7 192 88L192 128C156.7 128 128 156.7 128 192L88 192C74.7 192 64 202.7 64 216C64 229.3 74.7 240 88 240L128 240L128 296L88 296C74.7 296 64 306.7 64 320C64 333.3 74.7 344 88 344L128 344L128 400L88 400C74.7 400 64 410.7 64 424C64 437.3 74.7 448 88 448L128 448C128 483.3 156.7 512 192 512L192 552C192 565.3 202.7 576 216 576C229.3 576 240 565.3 240 552L240 512L296 512L296 552C296 565.3 306.7 576 320 576C333.3 576 344 565.3 344 552L344 512L400 512L400 552C400 565.3 410.7 576 424 576C437.3 576 448 565.3 448 552L448 512C483.3 512 512 483.3 512 448L552 448C565.3 448 576 437.3 576 424C576 410.7 565.3 400 552 400L512 400L512 344L552 344C565.3 344 576 333.3 576 320C576 306.7 565.3 296 552 296L512 296L512 240L552 240C565.3 240 576 229.3 576 216C576 202.7 565.3 192 552 192L512 192C512 156.7 483.3 128 448 128L448 88C448 74.7 437.3 64 424 64C410.7 64 400 74.7 400 88L400 128L344 128L344 88C344 74.7 333.3 64 320 64C306.7 64 296 74.7 296 88L296 128L240 128L240 88zM224 192L416 192C433.7 192 448 206.3 448 224L448 416C448 433.7 433.7 448 416 448L224 448C206.3 448 192 433.7 192 416L192 224C192 206.3 206.3 192 224 192zM240 240L240 400L400 400L400 240L240 240z"/></svg>
                    </div>
                    <div class="font-bold">
                        kelola PASS SCAN
                    </div>
                </a>
                <a href="{{ route('dashboard.KelolaPengguna') }}" wire:navigate wire:current="bg-orange/50" class="hover:bg-orange transition duration-100 border-dark border-b-2 hover:border-transparent p-4 w-full flex flex-row gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6 fill-black"><path d="M320 80C377.4 80 424 126.6 424 184C424 241.4 377.4 288 320 288C262.6 288 216 241.4 216 184C216 126.6 262.6 80 320 80zM96 152C135.8 152 168 184.2 168 224C168 263.8 135.8 296 96 296C56.2 296 24 263.8 24 224C24 184.2 56.2 152 96 152zM0 480C0 409.3 57.3 352 128 352C140.8 352 153.2 353.9 164.9 357.4C132 394.2 112 442.8 112 496L112 512C112 523.4 114.4 534.2 118.7 544L32 544C14.3 544 0 529.7 0 512L0 480zM521.3 544C525.6 534.2 528 523.4 528 512L528 496C528 442.8 508 394.2 475.1 357.4C486.8 353.9 499.2 352 512 352C582.7 352 640 409.3 640 480L640 512C640 529.7 625.7 544 608 544L521.3 544zM472 224C472 184.2 504.2 152 544 152C583.8 152 616 184.2 616 224C616 263.8 583.8 296 544 296C504.2 296 472 263.8 472 224zM160 496C160 407.6 231.6 336 320 336C408.4 336 480 407.6 480 496L480 512C480 529.7 465.7 544 448 544L192 544C174.3 544 160 529.7 160 512L160 496z"/></svg>
                    </div>
                    <div class="font-bold">
                        kelola Pengguna
                    </div>
                </a>     
                <a href="{{ route('dashboard.KelolaProfil') }}" wire:navigate wire:current="bg-orange/50" class="hover:bg-orange transition duration-100 border-dark border-b-2 hover:border-transparent p-4 w-full flex flex-row gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6 fill-black"><path d="M259.1 73.5C262.1 58.7 275.2 48 290.4 48L350.2 48C365.4 48 378.5 58.7 381.5 73.5L396 143.5C410.1 149.5 423.3 157.2 435.3 166.3L503.1 143.8C517.5 139 533.3 145 540.9 158.2L570.8 210C578.4 223.2 575.7 239.8 564.3 249.9L511 297.3C511.9 304.7 512.3 312.3 512.3 320C512.3 327.7 511.8 335.3 511 342.7L564.4 390.2C575.8 400.3 578.4 417 570.9 430.1L541 481.9C533.4 495 517.6 501.1 503.2 496.3L435.4 473.8C423.3 482.9 410.1 490.5 396.1 496.6L381.7 566.5C378.6 581.4 365.5 592 350.4 592L290.6 592C275.4 592 262.3 581.3 259.3 566.5L244.9 496.6C230.8 490.6 217.7 482.9 205.6 473.8L137.5 496.3C123.1 501.1 107.3 495.1 99.7 481.9L69.8 430.1C62.2 416.9 64.9 400.3 76.3 390.2L129.7 342.7C128.8 335.3 128.4 327.7 128.4 320C128.4 312.3 128.9 304.7 129.7 297.3L76.3 249.8C64.9 239.7 62.3 223 69.8 209.9L99.7 158.1C107.3 144.9 123.1 138.9 137.5 143.7L205.3 166.2C217.4 157.1 230.6 149.5 244.6 143.4L259.1 73.5zM320.3 400C364.5 399.8 400.2 363.9 400 319.7C399.8 275.5 363.9 239.8 319.7 240C275.5 240.2 239.8 276.1 240 320.3C240.2 364.5 276.1 400.2 320.3 400z"/></svg>
                    </div>
                    <div class="font-bold">
                        kelola Profil
                    </div>
                </a>                                 
            </div>
            <div x-data="clock()" x-init="startClock()" class="flex flex-col mt-auto text-white p-4">
                <p class="text-2xl">
                    Hai, <span class="font-bold">Admin</span>
                </p>
                <p x-text="time" class="text-sm"></p>
            </div>
        </div>
    </aside>    

    <menu
    x-show="openMenu"
    x-cloak
    @click.outside="openMenu = false"
    x-transition
    class="fixed top-28 right-4 w-48 z-40 bg-white rounded-2xl border-2 border-dark shadow-xl">        
        <div class="p-4 text-dark">
            <p class="font-bold text-2xl">
                Admin
            </p>
            <p class="text-sm">
                Petugas
            </p>
        </div>
        <a href="{{ route('dashboard.KelolaProfil') }}" wire:navigate class="group hover:bg-dark hover:text-white transition duration-100 border-y-2 border-dark font-sans text-base p-2 px-4 flex flex-row gap-2 text-dark items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-dark group-hover:fill-white"><path d="M259.1 73.5C262.1 58.7 275.2 48 290.4 48L350.2 48C365.4 48 378.5 58.7 381.5 73.5L396 143.5C410.1 149.5 423.3 157.2 435.3 166.3L503.1 143.8C517.5 139 533.3 145 540.9 158.2L570.8 210C578.4 223.2 575.7 239.8 564.3 249.9L511 297.3C511.9 304.7 512.3 312.3 512.3 320C512.3 327.7 511.8 335.3 511 342.7L564.4 390.2C575.8 400.3 578.4 417 570.9 430.1L541 481.9C533.4 495 517.6 501.1 503.2 496.3L435.4 473.8C423.3 482.9 410.1 490.5 396.1 496.6L381.7 566.5C378.6 581.4 365.5 592 350.4 592L290.6 592C275.4 592 262.3 581.3 259.3 566.5L244.9 496.6C230.8 490.6 217.7 482.9 205.6 473.8L137.5 496.3C123.1 501.1 107.3 495.1 99.7 481.9L69.8 430.1C62.2 416.9 64.9 400.3 76.3 390.2L129.7 342.7C128.8 335.3 128.4 327.7 128.4 320C128.4 312.3 128.9 304.7 129.7 297.3L76.3 249.8C64.9 239.7 62.3 223 69.8 209.9L99.7 158.1C107.3 144.9 123.1 138.9 137.5 143.7L205.3 166.2C217.4 157.1 230.6 149.5 244.6 143.4L259.1 73.5zM320.3 400C364.5 399.8 400.2 363.9 400 319.7C399.8 275.5 363.9 239.8 319.7 240C275.5 240.2 239.8 276.1 240 320.3C240.2 364.5 276.1 400.2 320.3 400z"/></svg>
            </div>
            <div>
                Kelola Profil
            </div>
        </a>
        <a href="" wire:navigate class="group hover:bg-dark hover:text-white transition duration-100 rounded-b-xl font-sans text-base p-2 px-4 flex flex-row gap-2 text-dark items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 fill-dark group-hover:fill-white"><path d="M384 128L448 128L448 544C448 561.7 462.3 576 480 576L512 576C529.7 576 544 561.7 544 544C544 526.3 529.7 512 512 512L512 128C512 92.7 483.3 64 448 64L352 64L352 64L192 64C156.7 64 128 92.7 128 128L128 512C110.3 512 96 526.3 96 544C96 561.7 110.3 576 128 576L352 576C369.7 576 384 561.7 384 544L384 128zM256 320C256 302.3 270.3 288 288 288C305.7 288 320 302.3 320 320C320 337.7 305.7 352 288 352C270.3 352 256 337.7 256 320z"/></svg>        </div>
            <div>
                Keluar
            </div>
        </a>    
    </menu>

</main>