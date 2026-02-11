import os
import json
import sys
import mimetypes

def get_logos():
    logo_dir = os.path.join(os.path.dirname(__file__), 'assets', 'images', 'client-logos')
    logos = []
    
    if not os.path.exists(logo_dir):
        return {"error": f"Directory not found: {logo_dir}"}
    
    dark_keywords = ['monkey', 'sindbad', 'lums', 'cedar', 'proball']
    
    for filename in os.listdir(logo_dir):
        if filename.startswith('.'):
            continue
            
        filepath = os.path.join(logo_dir, filename)
        if os.path.isfile(filepath):
            # Check if it's an image
            mime_type, _ = mimetypes.guess_type(filepath)
            if mime_type and mime_type.startswith('image/'):
                alt = os.path.splitext(filename)[0].replace('-', ' ').replace('_', ' ').title()
                is_dark = any(keyword in filename.lower() for keyword in dark_keywords)
                
                logos.append({
                    'filename': filename,
                    'alt': alt,
                    'dark': is_dark
                })
    
    return {'success': True, 'count': len(logos), 'logos': logos}

if __name__ == '__main__':
    result = get_logos()
    print('Content-Type: application/json\n')
    print(json.dumps(result, indent=2))