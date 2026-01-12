import keyboard
import threading
import time

class ButtonManager:
    """Class untuk mengelola input tombol (Keyboard/GPIO)"""
    
    def __init__(self, callback_function):
        self.callback = callback_function
        self.is_listening = False
        
    def start_listening(self):
        """Mulai mendengarkan event tombol"""
        print(" [INFO] Menunggu trigger tombol (Tekan Ctrl+T)...")
        
        # Kita gunakan library 'keyboard' untuk mendeteksi global hotkey
        # suppress=True akan mencegah huruf 't' tertulis di terminal lain jika memungkinkan
        try:
            keyboard.add_hotkey('ctrl+t', self._on_press)
            self.is_listening = True
        except ImportError:
            print(" [WARN] Library 'keyboard' error. Pastikan install dengan 'pip install keyboard'")

    def _on_press(self):
        """Internal handler saat tombol ditekan"""
        print("\n [EVENT] Tombol Ditekan! Memproses...")
        # Panggil fungsi yang didaftarkan (callback)
        self.callback()
        # Beri jeda sedikit agar tidak spamming jika tombol tertahan
        time.sleep(0.5)

    def stop_listening(self):
        keyboard.unhook_all()
