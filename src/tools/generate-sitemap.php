<?php
function generateSitemap() {
    $baseUrl = 'https://easybordersimmigration.com';
    $pages = [
        ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
        ['loc' => '/about-us', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => '/services', 'priority' => '0.9', 'changefreq' => 'weekly'],
        ['loc' => '/study-visa', 'priority' => '0.9', 'changefreq' => 'weekly'],
        ['loc' => '/contact-us', 'priority' => '0.7', 'changefreq' => 'monthly'],
        // Add all your pages here
    ];

    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"/>');

    foreach ($pages as $page) {
        $url = $xml->addChild('url');
        $url->addChild('loc', $baseUrl . $page['loc']);
        $url->addChild('lastmod', date('Y-m-d'));
        $url->addChild('changefreq', $page['changefreq']);
        $url->addChild('priority', $page['priority']);
    }

    $xml->asXML('sitemap.xml');
}

generateSitemap(); 