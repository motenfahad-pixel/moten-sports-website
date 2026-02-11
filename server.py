from http.server import HTTPServer, SimpleHTTPRequestHandler
import subprocess
import json
import os

class LogoHandler(SimpleHTTPRequestHandler):
    def do_GET(self):
        if self.path == '/load-logos':
            self.send_response(200)
            self.send_header('Content-type', 'application/json')
            self.send_header('Access-Control-Allow-Origin', '*')
            self.end_headers()
            
            # Run the Python script to get logos
            result = subprocess.run(['python', 'load-logos.py'], 
                                  capture_output=True, text=True)
            self.wfile.write(result.stdout.encode())
        else:
            # Serve normal files
            super().do_GET()

def run_server():
    port = 8000
    server_address = ('', port)
    httpd = HTTPServer(server_address, LogoHandler)
    print(f'🚀 Server running at http://localhost:{port}')
    print(f'📁 Serving from: {os.getcwd()}')
    print('🌐 Logo API: http://localhost:8000/load-logos')
    print('📄 Your site: http://localhost:8000/index.html')
    print('\nPress Ctrl+C to stop\n')
    httpd.serve_forever()

if __name__ == '__main__':
    run_server()