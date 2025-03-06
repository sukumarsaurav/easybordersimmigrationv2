<?php
function optimizeImage($imagePath, $alt, $lazy = true) {
    $sizes = [
        'mobile' => 480,
        'tablet' => 768,
        'desktop' => 1024
    ];

    $output = '<picture>';
    foreach ($sizes as $device => $width) {
        $optimizedPath = generateOptimizedImage($imagePath, $width);
        $output .= sprintf(
            '<source media="(max-width: %dpx)" srcset="%s">',
            $width,
            $optimizedPath
        );
    }

    $attrs = sprintf(
        'src="%s" alt="%s" %s',
        $imagePath,
        htmlspecialchars($alt),
        $lazy ? 'loading="lazy"' : ''
    );

    $output .= sprintf('<img %s></picture>', $attrs);
    return $output;
} 