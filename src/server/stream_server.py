from http.server import BaseHTTPRequestHandler, ThreadingHTTPServer
import json

class StreamHandler(BaseHTTPRequestHandler):
    """HTTP Request Handler untuk streaming"""
    
    video_stream = None  # Class variable untuk share video stream
    
    def log_message(self, format, *args):
        """Custom logging"""
        print(f"[{self.address_string()}] {format % args}")
    
    def do_GET(self):
        """Handle GET requests"""
        
        # Endpoint untuk MJPEG stream
        if self.path == '/stream':
            self._handle_stream()
        
        # Endpoint untuk snapshot (single frame)
        elif self.path == '/snapshot':
            self._handle_snapshot()
        
        # Endpoint untuk health check
        elif self.path == '/health':
            self._handle_health()
        
        # Endpoint info
        elif self.path == '/':
            self._handle_info()
        
        else:
            self._handle_not_found()
    
    def _handle_stream(self):
        """Handle streaming endpoint"""
        try:
            self.send_response(200)
            self.send_header('Content-type', 
                           'multipart/x-mixed-replace; boundary=frame')
            self.send_header('Access-Control-Allow-Origin', '*')
            self.end_headers()
            
            # Stream frames
            for frame in self.video_stream.generate_frames():
                self.wfile.write(frame)
                
        except Exception as e:
            print(f"Error in stream: {e}")
    
    def _handle_snapshot(self):
        """Handle snapshot endpoint"""
        try:
            jpeg_bytes = self.video_stream.get_snapshot()
            
            if jpeg_bytes:
                self.send_response(200)
                self.send_header('Content-type', 'image/jpeg')
                self.send_header('Access-Control-Allow-Origin', '*')
                self.end_headers()
                self.wfile.write(jpeg_bytes)
            else:
                self._send_json_response(500, {'error': 'Failed to capture frame'})
                
        except Exception as e:
            self._send_json_response(500, {'error': str(e)})
    
    def _handle_health(self):
        """Handle health check endpoint"""
        status = {
            'status': 'running',
            'camera': 'active' if self.video_stream.camera_manager.is_running else 'inactive'
        }
        self._send_json_response(200, status)
    
    def _handle_info(self):
        """Handle info endpoint"""
        info = {
            'service': 'IoT Webcam Streaming Server',
            'version': '1.0',
            'endpoints': {
                '/stream': 'MJPEG video stream',
                '/snapshot': 'Single frame snapshot (JPEG)',
                '/health': 'Health check'
            }
        }
        self._send_json_response(200, info)
    
    def _handle_not_found(self):
        """Handle 404"""
        self._send_json_response(404, {'error': 'Endpoint not found'})
    
    def _send_json_response(self, status_code, data):
        """Helper untuk mengirim JSON response"""
        self.send_response(status_code)
        self.send_header('Content-type', 'application/json')
        self.send_header('Access-Control-Allow-Origin', '*')
        self.end_headers()
        self.wfile.write(json.dumps(data).encode())


class StreamServer:
    """Class untuk mengelola HTTP streaming server"""
    
    def __init__(self, config, video_stream):
        self.config = config
        self.video_stream = video_stream
        
        # Set video stream ke handler class
        StreamHandler.video_stream = video_stream
        
        # Create threaded HTTP server
        self.server = ThreadingHTTPServer(
            (config.HOST, config.PORT), 
            StreamHandler
        )
    
    def start(self):
        """Menjalankan server"""
        print(f"Server berjalan di http://{self.config.HOST}:{self.config.PORT}")
        print(f"Stream endpoint: http://localhost:{self.config.PORT}/stream")
        print(f"Snapshot endpoint: http://localhost:{self.config.PORT}/snapshot")
        print("Tekan Ctrl+C untuk menghentikan server\n")
        
        try:
            self.server.serve_forever()
        except KeyboardInterrupt:
            print("\nMenghentikan server...")
            self.stop()
    
    def stop(self):
        """Menghentikan server"""
        self.server.shutdown()
        self.video_stream.stop()
