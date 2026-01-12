from .camera_manager import CameraManager

class VideoStream:
    """Class untuk mengelola streaming video dalam format MJPEG"""
    
    def __init__(self, config):
        self.config = config
        self.camera_manager = CameraManager(
            camera_index=config.CAMERA_INDEX,
            width=config.FRAME_WIDTH,
            height=config.FRAME_HEIGHT
        )
    
    def start(self):
        """Memulai video stream"""
        try:
            return self.camera_manager.initialize()
        except Exception as e:
            print(f"Error starting video stream: {e}")
            return False
    
    def generate_frames(self):
        """Generator untuk streaming MJPEG frames"""
        while self.camera_manager.is_running:
            frame = self.camera_manager.get_frame()
            if frame is not None:
                jpeg_bytes = self.camera_manager.encode_jpeg(
                    frame, 
                    self.config.JPEG_QUALITY
                )
                
                if jpeg_bytes:
                    # Format MJPEG stream
                    yield (b'--frame\r\n'
                           b'Content-Type: image/jpeg\r\n\r\n' + 
                           jpeg_bytes + b'\r\n')
    
    def get_snapshot(self):
        """Mendapatkan single frame sebagai JPEG"""
        frame = self.camera_manager.get_frame()
        if frame is not None:
            return self.camera_manager.encode_jpeg(
                frame, 
                self.config.JPEG_QUALITY
            )
        return None
    
    def get_current_frame(self):
        """Mendapatkan frame terakhir untuk keperluan processing lain"""
        # Kita ambil langsung dari camera_manager yang sudah thread-safe
        return self.camera_manager.get_frame()    
    
    def stop(self):
        """Menghentikan video stream"""
        self.camera_manager.release()
