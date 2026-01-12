import sys
import os
import time
import threading

# Tambahkan parent directory ke Python path
sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))

from config.settings import Config
from camera.video_stream import VideoStream
from server.stream_server import StreamServer
from tombol.button_manager import ButtonManager
from features.qr_scanner import QRScanner
from api.client import APIClient
from api.response_handler import ResponseHandler

class IoTApplication:
    """Main application class untuk IoT Streaming"""
    
    def __init__(self):
        self.config = Config()
        self.video_stream = VideoStream(self.config)
        self.server = StreamServer(self.config, self.video_stream)
        
        # Inisialisasi fitur baru
        self.qr_scanner = QRScanner()

        # Inisialisasi API Client & Response Handler
        self.api_client = APIClient(
            base_url=self.config.API_BASE_URL,
            timeout=self.config.API_TIMEOUT
        )
        self.response_handler = ResponseHandler()        
        
        # Inisialisasi tombol dengan callback function 'handle_button_press'
        self.button_manager = ButtonManager(self.handle_button_press)
    
    def handle_button_press(self):
        """Callback yang dijalankan saat Ctrl+T ditekan"""
        print("\n" + "🔄" * 30)
        print(" [EVENT] Tombol ditekan - Memulai proses validasi...")
        print("🔄" * 30 + "\n")
        
        # 1. Ambil frame saat ini
        frame = self.video_stream.get_current_frame()
        
        if frame is None:
            print(" [ERROR] Gagal mengambil frame kamera!")
            return
            
        # 2. Proses scan QR
        print(" [PROCESS] Scanning QR Code...")
        success, result = self.qr_scanner.scan(frame)
        
        if not success or not result:
            print("\n" + "=" * 60)
            print("❌ SCAN GAGAL")
            print("=" * 60)
            print("📋 Message: Tidak ada QR Code terdeteksi di frame")
            print("💡 Tips: Pastikan QR Code terlihat jelas di kamera")
            print("=" * 60 + "\n")
            return

        # 3. Tampilkan hasil
        if success and result:
            print(f"\n{'='*40}")
            print(f" HASIL SCAN QR CODE: {result}")
            print(f"{'='*40}\n")
        else:
            print(" [INFO] Tidak ada QR Code terdeteksi.")

        # 4. Kirim ke API untuk validasi
        print(f" [VALIDATE] Memvalidasi tiket ke server...")
        api_response = self.api_client.validate_tiket(result)
        
        # 5. Handle dan tampilkan response
        self.response_handler.handle_response(api_response)            

    def run(self):
        """Menjalankan aplikasi IoT"""
        print("=" * 60)
        print("🎫 IoT Webcam Streaming & Tiket Validator")
        print("=" * 60)
        print(f"📡 API Server : {self.config.API_BASE_URL}")
        print(f"🎥 Camera     : Index {self.config.CAMERA_INDEX}")
        print(f"🌐 Web Server : http://{self.config.HOST}:{self.config.PORT}")
        print("=" * 60 + "\n")
        
        # Start video streaming
        if not self.video_stream.start():
            print("ERROR: Gagal memulai video stream!")
            return
        
        print("✓ Video stream berhasil dimulai")
        
        # Start Button Listener (Keyboard)
        self.button_manager.start_listening()
        
        # Start HTTP server
        # Server run forever, jadi ini memblokir code di bawahnya
        # Tombol berjalan di background thread via library 'keyboard'
        try:
            self.server.start()
        except KeyboardInterrupt:
            print("\n\n🛑 Menghentikan aplikasi...")
            self.button_manager.stop_listening()
            self.video_stream.stop()
            self.api_client.close()
            print("✓ Aplikasi dihentikan dengan aman\n")
            
if __name__ == '__main__':
    app = IoTApplication()
    app.run()
