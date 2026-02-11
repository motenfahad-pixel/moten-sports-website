<?php
header('Content-Type: application/json');

$projectsDir = 'assets/images/projects/';
$projects = [];

// Check if directory exists
if (!is_dir($projectsDir)) {
    echo json_encode([
        'success' => false,
        'error' => 'Projects directory not found.',
        'projects' => []
    ]);
    exit;
}

// Get all image files
$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
$files = scandir($projectsDir);

foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;
    
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($ext, $allowedExtensions)) {
        $filename = pathinfo($file, PATHINFO_FILENAME);
        
        // Clean up filename for title (remove numbers, parentheses)
        $cleanTitle = preg_replace('/\s*\(\d+\)\s*|\d+|-|_/', ' ', $filename);
        $cleanTitle = ucwords(trim($cleanTitle));
        
        // Auto-detect project type from filename
        $lowerFile = strtolower($filename);
        $type = 'Sports Facility';
        if (strpos($lowerFile, 'padel') !== false) $type = 'Padel Court';
        if (strpos($lowerFile, 'futsal') !== false || strpos($lowerFile, 'football') !== false) $type = 'Futsal Court';
        if (strpos($lowerFile, 'basketball') !== false) $type = 'Basketball Court';
        if (strpos($lowerFile, 'pickleball') !== false || strpos($lowerFile, 'pb') !== false) $type = 'Pickleball Court';
        if (strpos($lowerFile, 'cricket') !== false) $type = 'Cricket Facility';
        if (strpos($lowerFile, 'play') !== false || strpos($lowerFile, 'kids') !== false) $type = 'Playground';
        
        // Auto-detect location from filename
        $location = 'Multiple Locations';
        if (strpos($lowerFile, 'karachi') !== false) $location = 'Karachi';
        if (strpos($lowerFile, 'lahore') !== false) $location = 'Lahore';
        if (strpos($lowerFile, 'islamabad') !== false) $location = 'Islamabad';
        if (strpos($lowerFile, 'faisalabad') !== false) $location = 'Faisalabad';
        if (strpos($lowerFile, 'multan') !== false) $location = 'Multan';
        
        $project = [
            'image' => $projectsDir . $file,
            'title' => $cleanTitle ?: 'Sports Construction Project',
            'location' => $location,
            'type' => $type,
            'filename' => $filename
        ];
        
        $projects[] = $project;
    }
}

// Check if we want all projects or just 3 for homepage
$getAll = isset($_GET['all']) && $_GET['all'] === 'true';
if (!$getAll && count($projects) > 3) {
    $projects = array_slice($projects, 0, 3);
}

// If no images found, use fallback
if (empty($projects)) {
    $projects = [
        [
            'image' => 'assets/images/projects/propadel.webp',
            'title' => 'Premium Padel Court',
            'location' => 'Karachi',
            'type' => 'Padel Court'
        ],
        [
            'image' => 'assets/images/projects/sitara villas 2.jpg',
            'title' => 'Sports Complex',
            'location' => 'Lahore',
            'type' => 'Multi-Sport'
        ],
        [
            'image' => 'assets/images/projects/alpha.jpg',
            'title' => 'Alpha Sports Facility',
            'location' => 'Islamabad',
            'type' => 'Sports Facility'
        ]
    ];
}

echo json_encode([
    'success' => true,
    'count' => count($projects),
    'projects' => $projects
]);
?>