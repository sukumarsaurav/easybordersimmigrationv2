<?php
function generateMetaTags($pageData) {
    $defaults = [
        'title' => 'Easy Borders Immigration - Professional Immigration & Education Services',
        'description' => 'Expert immigration and education consultancy services. Specializing in study visas, PR applications, and test preparation.',
        'keywords' => 'immigration services, study abroad, visa assistance, education consultancy, IELTS preparation',
        'image' => 'https://easybordersimmigration.com/src/images/logo.jpeg',
        'type' => 'website'
    ];

    $data = array_merge($defaults, $pageData);

    return [
        'title' => $data['title'] . ' | Easy Borders Immigration',
        'meta_description' => $data['description'],
        'meta_keywords' => $data['keywords'],
        'og_title' => $data['title'],
        'og_description' => $data['description'],
        'og_image' => $data['image'],
        'og_type' => $data['type'],
        'canonical' => $data['canonical'] ?? getCurrentURL()
    ];
}

function getCurrentURL() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function generateSchemaMarkup($type, $data) {
    switch($type) {
        case 'article':
            return generateArticleSchema($data);
        case 'service':
            return generateServiceSchema($data);
        // Add more schema types as needed
    }
} 