const organizationSchema = {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Easy Borders Immigration",
    "url": "https://easybordersimmigration.com",
    "logo": "https://easybordersimmigration.com/src/images/logo.jpeg",
    "description": "Professional education consultancy and immigration services",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "WZ-406 Janak park near Sanatan Dharm Mandir",
        "addressLocality": "Hari Nagar",
        "addressRegion": "New Delhi",
        "postalCode": "110064",
        "addressCountry": "IN"
    },
    "contactPoint": [
        {
            "@type": "ContactPoint",
            "telephone": "+91-8586878899",
            "contactType": "customer service",
            "areaServed": ["IN", "US", "CA", "AU", "UK"],
            "availableLanguage": ["English", "Hindi"]
        }
    ],
    "sameAs": [
        "https://www.facebook.com/easybordersimmigration",
        "https://www.instagram.com/easybordersimmigration",
        "https://www.linkedin.com/company/easybordersimmigration"
    ],
    "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
            "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
        ],
        "opens": "09:00",
        "closes": "18:00"
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "250"
    }
};

// Add breadcrumb schema dynamically
function addBreadcrumbSchema() {
    const breadcrumbs = document.querySelector('.breadcrumb');
    if (!breadcrumbs) return;

    const items = Array.from(breadcrumbs.querySelectorAll('li')).map((item, index) => ({
        "@type": "ListItem",
        "position": index + 1,
        "name": item.textContent.trim(),
        "item": item.querySelector('a')?.href || window.location.href
    }));

    const breadcrumbSchema = {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": items
    };

    const script = document.createElement('script');
    script.type = 'application/ld+json';
    script.text = JSON.stringify(breadcrumbSchema);
    document.head.appendChild(script);
}

document.addEventListener('DOMContentLoaded', function() {
    // Add organization schema
    const orgScript = document.createElement('script');
    orgScript.type = 'application/ld+json';
    orgScript.text = JSON.stringify(organizationSchema);
    document.head.appendChild(orgScript);

    // Add breadcrumb schema
    addBreadcrumbSchema();
}); 