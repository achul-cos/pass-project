import cv2
import threading

class CameraManager:
    """Class untuk mengelola operasi kamera dengan thread-safe"""
    
    def __init__(self, camera_index=0, width=640, height=480):
        self.camera_index = camera_index
        self.width = width
        self.height = height
        self.camera = None
        self.is_running = False
        self.lock = threading.Lock()
        self.current_frame = None
        
    def initialize(self):
        """Inisialisasi kamera"""
        self.camera = cv2.VideoCapture(self.camera_index)
        if not self.camera.isOpened():
            raise Exception("Tidak dapat membuka kamera")
        
        self.camera.set(cv2.CAP_PROP_FRAME_WIDTH, self.width)
        self.camera.set(cv2.CAP_PROP_FRAME_HEIGHT, self.height)
        self.is_running = True
        
        # Start background thread untuk capture frames
        self.capture_thread = threading.Thread(target=self._capture_loop)
        self.capture_thread.daemon = True
        self.capture_thread.start()
        
        return True
    
    def _capture_loop(self):
        """Background thread untuk continuous capture"""
        while self.is_running:
            ret, frame = self.camera.read()
            if ret:
                with self.lock:
                    self.current_frame = frame
    
    def get_frame(self):
        """Mendapatkan frame terbaru"""
        with self.lock:
            if self.current_frame is None:
                return None
            return self.current_frame.copy()
    
    def encode_jpeg(self, frame, quality=80):
        """Encode frame ke JPEG"""
        if frame is None:
            return None
        
        encode_param = [int(cv2.IMWRITE_JPEG_QUALITY), quality]
        ret, buffer = cv2.imencode('.jpg', frame, encode_param)
        
        if not ret:
            return None
        
        return buffer.tobytes()
    
    def release(self):
        """Release resources kamera"""
        self.is_running = False
        if self.capture_thread:
            self.capture_thread.join(timeout=2)
        if self.camera:
            self.camera.release()
