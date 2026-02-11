<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set JSON header
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Path to logos folder
$logoDir = __DIR__ . '/assets/images/client-logos/';

// Debug: Check current directory
error_log("Current directory: " . __DIR__);
error_log("Logo directory: " . $logoDir);

// Check if directory exists
if (!is_dir($logoDir)) {
    echo json_encode([
        'success' => false,
        'error' => 'Logo directory not found',
        'path' => $logoDir,
        'debug' => [
            'directory_exists' => is_dir($logoDir) ? 'yes' : 'no',
            'current_dir' => __DIR__,
            'files_in_current_dir' => scandir(__DIR__)
        ]
    ]);
    exit;
}

// Get all files from directory
$files = scandir($logoDir);
if ($files === false) {
    echo json_encode(['success' => false, 'error' => 'Failed to scan directory']);
    exit;
}

// Filter image files
$logos = [];
$allowedExtensions = ['png', 'jpg', 'jpeg', 'webp', 'gif'];
$darkKeywords = ['monkey', 'sindbad', 'lums', 'cedar', 'proball', 'dark', 'black'];

foreach ($files as $file) {
    // Skip hidden files and directories
    if ($file[0] === '.') continue;
    if (is_dir($logoDir . $file)) continue;
    
    // Check if it's an image file
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (!in_array($extension, $allowedExtensions)) continue;
    
    // Create alt text from filename
    $nameWithoutExt = pathinfo($file, PATHINFO_FILENAME);
    $altText = ucwords(str_replace(['-', '_'], ' ', $nameWithoutExt));
    
    // Check if logo should be dark
    $lowercaseFile = strtolower($file);
    $isDark = false;
    foreach ($darkKeywords as $keyword) {
        if (strpos($lowercaseFile, $keyword) !== false) {
            $isDark = true;
            break;
        }
    }
    
    $logos[] = [
        'filename' => $file,
        'alt' => $altText,
        'dark' => $isDark,
        'path' => 'assets/images/client-logos/' . $file
    ];
}

// Sort alphabetically
usort($logos, function($a, $b) {
    return strcmp($a['filename'], $b['filename']);
});

// Return success with logos
echo json_encode([
    'success' => true,
    'count' => count($logos),
    'logos' => $logos,
    'debug' => [
        'total_files_in_dir' => count($files),
        'logo_files_found' => count($logos),
        'timestamp' => date('Y-m-d H:i:s')
    ]
], JSON_PRETTY_PRINT);
?>