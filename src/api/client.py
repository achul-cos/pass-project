import requests
from datetime import datetime
import json

class APIClient:
    """Class untuk mengelola komunikasi dengan API Laravel"""
    
    def __init__(self, base_url, timeout=10):
        self.base_url = base_url
        self.timeout = timeout
        self.session = requests.Session()
        self.session.headers.update({
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        })
    
    def validate_tiket(self, kode_unik):
        """
        Validasi tiket dengan mengirim kode unik dan waktu sekarang
        
        Args:
            kode_unik (str): Kode unik dari QR Code
            
        Returns:
            dict: Response dari API
        """
        endpoint = f"{self.base_url}/api/v1/tikets/validate/validateWithOutNomorKendaraan"
        
        # Format waktu sesuai dengan yang dibutuhkan API
        waktu_datang = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        
        payload = {
            "kodeUnik": kode_unik,
            "waktuDatang": waktu_datang
        }
        
        try:
            print(f" [API] Mengirim request ke: {endpoint}")
            print(f" [API] Payload: {json.dumps(payload, indent=2)}")
            
            response = self.session.post(
                endpoint,
                json=payload,
                timeout=self.timeout
            )
            
            # Parse response JSON
            response_data = response.json()
            
            print(f" [API] Status Code: {response.status_code}")
            
            return {
                'success': True,
                'status_code': response.status_code,
                'data': response_data
            }
            
        except requests.exceptions.Timeout:
            return {
                'success': False,
                'error': 'timeout',
                'message': 'Request timeout - Server tidak merespon'
            }
        except requests.exceptions.ConnectionError:
            return {
                'success': False,
                'error': 'connection',
                'message': 'Tidak dapat terhubung ke server API'
            }
        except requests.exceptions.RequestException as e:
            return {
                'success': False,
                'error': 'request',
                'message': f'Request error: {str(e)}'
            }
        except json.JSONDecodeError:
            return {
                'success': False,
                'error': 'parse',
                'message': 'Gagal parsing response dari server'
            }
    
    def close(self):
        """Tutup session"""
        self.session.close()
