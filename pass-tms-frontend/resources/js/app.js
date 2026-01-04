import './bootstrap';

import AOS from 'aos';
import 'aos/dist/aos.css';

import '../../node_modules/flatpickr/dist/flatpickr.js';

AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 500, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: true, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});

function clock() {
    return {
        time: '',
        startClock() {
            const update = () => {
                const now = new Date();
                const formatted = now.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    timeZone: 'Asia/Jakarta'
                });
                const date = now.toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });
                this.time = `${date}, ${formatted} WIB`;
            };
            update();
            setInterval(update, 1000);
        }
    };
}

// Jika kamu ingin pastikan Alpine bisa pakai fungsi ini:
window.clock = clock;

document.addEventListener('DOMContentLoaded', formatHargaInput);
document.addEventListener('livewire:navigated', formatHargaInput);
document.addEventListener('livewire:load', formatHargaInput);

function formatHargaInput() {
    const inputs = document.querySelectorAll('#hargaInput, .harga-input');

    inputs.forEach(input => {
        input.addEventListener('input', function () {
            let value = this.value.replace(/[^\d]/g, '');
            this.value = value ? new Intl.NumberFormat('id-ID').format(value) : '';
        });
    });
}