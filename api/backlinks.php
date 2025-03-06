<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: https://easybordersimmigration.com');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: X-API-Key');

// Configuration
define('API_KEY', 'your-secure-api-key-here'); // Replace with a strong API key
define('CACHE_DURATION', 3600); // Cache duration in seconds (1 hour)
define('CACHE_FILE', __DIR__ . '/cache/backlinks_cache.json');

// Basic authentication
function authenticate() {
    $api_key = $_SERVER['HTTP_X_API_KEY'] ?? '';
    return hash_equals(API_KEY, $api_key);
}

// Cache management
function getCache() {
    if (file_exists(CACHE_FILE)) {
        $cache = json_decode(file_get_contents(CACHE_FILE), true);
        if ($cache && time() - $cache['timestamp'] < CACHE_DURATION) {
            return $cache['data'];
        }
    }
    return null;
}

function setCache($data) {
    if (!is_dir(dirname(CACHE_FILE))) {
        mkdir(dirname(CACHE_FILE), 0755, true);
    }
    file_put_contents(CACHE_FILE, json_encode([
        'timestamp' => time(),
        'data' => $data
    ]));
}

// Get backlinks data from various sources
function getBacklinksData() {
    $backlinks = [];
    
    // Moz API Integration (if you have Moz API access)
    $mozData = getMozData();
    if ($mozData) {
        $backlinks['moz'] = $mozData;
    }

    // Ahrefs API Integration (if you have Ahrefs API access)
    $ahrefsData = getAhrefsData();
    if ($ahrefsData) {
        $backlinks['ahrefs'] = $ahrefsData;
    }

    // Majestic API Integration (if you have Majestic API access)
    $majesticData = getMajesticData();
    if ($majesticData) {
        $backlinks['majestic'] = $majesticData;
    }

    return $backlinks;
}

// Example Moz API integration
function getMozData() {
    // Add your Moz API implementation here
    return [
        'domain_authority' => 35,
        'page_authority' => 40,
        'linking_domains' => 150
    ];
}

// Example Ahrefs API integration
function getAhrefsData() {
    // Add your Ahrefs API implementation here
    return [
        'domain_rating' => 45,
        'ahrefs_rank' => 500000,
        'total_backlinks' => 1500
    ];
}

// Example Majestic API integration
function getMajesticData() {
    // Add your Majestic API implementation here
    return [
        'trust_flow' => 25,
        'citation_flow' => 30,
        'referring_domains' => 200
    ];
}

// Main backlinks function
function getBacklinks() {
    if (!authenticate()) {
        http_response_code(401);
        return ['error' => 'Unauthorized access'];
    }

    // Try to get cached data first
    $cachedData = getCache();
    if ($cachedData) {
        return $cachedData;
    }

    // Get fresh data
    $backlinksData = getBacklinksData();
    
    // Prepare response
    $response = [
        'summary' => [
            'total_backlinks' => array_sum(array_column($backlinksData, 'total_backlinks')),
            'domain_authority' => $backlinksData['moz']['domain_authority'] ?? 0,
            'domain_rating' => $backlinksData['ahrefs']['domain_rating'] ?? 0,
            'referring_domains' => $backlinksData['majestic']['referring_domains'] ?? 0
        ],
        'metrics' => [
            'moz' => $backlinksData['moz'] ?? null,
            'ahrefs' => $backlinksData['ahrefs'] ?? null,
            'majestic' => $backlinksData['majestic'] ?? null
        ],
        'top_backlinks' => [
            [
                'url' => 'https://example1.com',
                'domain_authority' => 65,
                'anchor_text' => 'immigration services',
                'first_seen' => '2024-01-15'
            ],
            [
                'url' => 'https://example2.com',
                'domain_authority' => 55,
                'anchor_text' => 'study abroad consultancy',
                'first_seen' => '2024-02-01'
            ],
            [
                'url' => 'https://example3.com',
                'domain_authority' => 45,
                'anchor_text' => 'visa assistance',
                'first_seen' => '2024-02-15'
            ]
        ],
        'timestamp' => time()
    ];

    // Cache the response
    setCache($response);

    return $response;
}

// Error handling
try {
    $result = getBacklinks();
    echo json_encode($result, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal server error',
        'message' => $e->getMessage()
    ]);
} 