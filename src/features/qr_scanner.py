import cv2

class QRScanner:
    """Class untuk menangani deteksi dan decoding QR Code"""
    
    def __init__(self):
        # Inisialisasi detektor QR Code bawaan OpenCV
        self.detector = cv2.QRCodeDetector()
    
    def scan(self, frame):
        """
        Scan frame untuk mencari QR Code
        Returns: (success, decoded_text)
        """
        if frame is None:
            return False, "Empty Frame"
            
        try:
            # Detect and Decode
            retval, decoded_info, points, straight_qrcode = self.detector.detectAndDecodeMulti(frame)
            
            if retval:
                # Mengembalikan text hasil scan pertama yang ditemukan
                return True, decoded_info[0]
            
            return False, None
            
        except Exception as e:
            return False, str(e)
