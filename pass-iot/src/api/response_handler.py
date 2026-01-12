from datetime import datetime

class ResponseHandler:
    """Class untuk menangani dan memformat response API"""
    
    def __init__(self):
        # Custom messages untuk setiap error code
        self.error_messages = {
            'noValid': {
                'title': '❌ TIKET TIDAK VALID',
                'color': 'RED',
                'action': 'REJECT'
            },
            'jadwalMenunggu': {
                'title': '⏰ BELUM WAKTUNYA',
                'color': 'YELLOW',
                'action': 'WAIT'
            },
            'jadwalTutup': {
                'title': '🔒 JADWAL SUDAH DITUTUP',
                'color': 'RED',
                'action': 'REJECT'
            },
            'systemError': {
                'title': '⚠️ SYSTEM ERROR',
                'color': 'RED',
                'action': 'ERROR'
            }
        }
    
    def handle_response(self, api_response):
        """
        Menangani response dari API dan menampilkannya di terminal
        
        Args:
            api_response (dict): Response dari APIClient
        """
        # Handle error koneksi
        if not api_response.get('success'):
            self._print_connection_error(api_response)
            return
        
        data = api_response.get('data', {})
        status = data.get('status')
        
        if status == 'success':
            self._print_success_response(data)
        elif status == 'error':
            self._print_error_response(data)
        else:
            self._print_unknown_response(data)
    
    def _print_success_response(self, data):
        """Print response sukses dengan format yang rapi"""
        print("\n" + "=" * 60)
        print("✅ VALIDASI BERHASIL - SILAHKAN MASUK")
        print("=" * 60)
        print(f"📋 Message    : {data.get('message', '-')}")
        print(f"⏱️  Selisih    : {data.get('selisihWaktu', 0):.2f} jam")
        
        tiket_data = data.get('data', {})
        if tiket_data:
            print(f"🎫 ID Tiket   : {tiket_data.get('idTiket', '-')}")
            print(f"🔑 Check-In   : {tiket_data.get('checkInCode', '-')}")
        
        request_data = data.get('request', {})
        if request_data:
            print(f"\n📥 Request:")
            print(f"   - Kode Unik : {request_data.get('kodeUnik', '-')}")
            print(f"   - Waktu     : {request_data.get('waktuDatang', '-')}")
        
        print("=" * 60)
        print("🚪 AKSI: BUKA GERBANG (OPEN GATE)")
        print("=" * 60 + "\n")
    
    def _print_error_response(self, data):
        """Print response error dengan custom format berdasarkan errorCode"""
        error_code = data.get('errorCode', 'unknown')
        message = data.get('message', 'Unknown error')
        
        # Ambil custom config untuk error code ini
        error_config = self.error_messages.get(
            error_code, 
            {
                'title': '❓ ERROR TIDAK DIKENAL',
                'color': 'RED',
                'action': 'UNKNOWN'
            }
        )
        
        print("\n" + "=" * 60)
        print(error_config['title'])
        print("=" * 60)
        print(f"📋 Message    : {message}")
        print(f"🔖 Error Code : {error_code}")
        
        # Tampilkan selisih waktu jika ada
        if 'selisihWaktu' in data:
            print(f"⏱️  Selisih    : {data.get('selisihWaktu', 0):.2f} jam")
        
        # Tampilkan request data
        request_data = data.get('request', {})
        if request_data:
            print(f"\n📥 Request:")
            print(f"   - Kode Unik : {request_data.get('kodeUnik', '-')}")
            print(f"   - Waktu     : {request_data.get('waktuDatang', '-')}")
        
        print("=" * 60)
        print(f"🚫 AKSI: {error_config['action']}")
        print("=" * 60 + "\n")
        
        # Custom action berdasarkan error code
        self._execute_error_action(error_code, error_config)
    
    def _execute_error_action(self, error_code, config):
        """
        Method untuk eksekusi aksi tambahan berdasarkan error code
        Nanti bisa ditambahkan kontrol LED, Buzzer, dll
        """
        action = config['action']
        
        if action == 'REJECT':
            # Nanti bisa tambahkan: LED merah menyala, buzzer bunyi
            print(" [ACTION] 🔴 LED Merah - Buzzer 3x")
        elif action == 'WAIT':
            # Nanti bisa tambahkan: LED kuning menyala
            print(" [ACTION] 🟡 LED Kuning - Bunyi 1x")
        elif action == 'ERROR':
            # Nanti bisa tambahkan: LED berkedip
            print(" [ACTION] ⚠️  LED Berkedip")
    
    def _print_connection_error(self, api_response):
        """Print error koneksi"""
        print("\n" + "=" * 60)
        print("⚠️ ERROR KONEKSI API")
        print("=" * 60)
        print(f"📋 Error : {api_response.get('error', 'unknown')}")
        print(f"💬 Message: {api_response.get('message', '-')}")
        print("=" * 60)
        print("🚫 AKSI: TIDAK DAPAT MEMVALIDASI")
        print("=" * 60 + "\n")
    
    def _print_unknown_response(self, data):
        """Print response yang tidak dikenali"""
        print("\n" + "=" * 60)
        print("❓ RESPONSE TIDAK DIKENAL")
        print("=" * 60)
        print(f"Data: {data}")
        print("=" * 60 + "\n")
    
    def customize_error_message(self, error_code, title, color, action):
        """
        Method untuk customize pesan error dari luar class
        
        Args:
            error_code (str): Kode error (noValid, jadwalMenunggu, dll)
            title (str): Judul yang akan ditampilkan
            color (str): Warna (untuk LED nanti)
            action (str): Aksi yang akan diambil
        """
        self.error_messages[error_code] = {
            'title': title,
            'color': color,
            'action': action
        }
        print(f" [CONFIG] Custom message untuk '{error_code}' berhasil diset")
