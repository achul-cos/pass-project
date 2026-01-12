class Config:
    """Configuration class untuk aplikasi IoT"""
    HOST = '0.0.0.0'  # Bisa diakses dari luar
    PORT = 8080
    CAMERA_INDEX = 0
    FRAME_WIDTH = 640
    FRAME_HEIGHT = 480
    JPEG_QUALITY = 80

    # API Configuration
    API_BASE_URL = 'http://127.0.0.1:8001'
    API_VALIDATE_ENDPOINT = '/api/v1/tikets/validate/validateWithOutNomorKendaraan'
    API_TIMEOUT = 10    