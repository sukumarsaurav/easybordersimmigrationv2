// Google Analytics 4 Configuration
const GA4_ID = 'G-3RP63ZP2RF';

// Initialize dataLayer if not already initialized
window.dataLayer = window.dataLayer || [];

// Initialize GA4 through GTM
function initGA4() {
    // Push GA4 configuration to dataLayer
    dataLayer.push({
        'event': 'ga4_config',
        'ga4_config': {
            'measurement_id': GA4_ID
        }
    });
}

// Enhanced measurement for important events
function pushGA4Event(eventName, eventParams = {}) {
    dataLayer.push({
        'event': eventName,
        'ga4_event': {
            ...eventParams,
            'send_to': GA4_ID
        }
    });
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initGA4();
    
    // Track page views
    pushGA4Event('page_view', {
        'page_title': document.title,
        'page_location': window.location.href,
        'page_path': window.location.pathname
    });
});

// Export functions for use in other files
window.pushGA4Event = pushGA4Event;

// Google Tag Manager Implementation
function loadGTM() {
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KSHT33RH'); // Updated GTM ID
}

// Initialize all tracking
document.addEventListener('DOMContentLoaded', function() {
    loadGTM();
}); 