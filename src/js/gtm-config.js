// GTM Configuration
const GTM_ID = 'GTM-KSHT33RH';
const GA4_ID = 'G-3RP63ZP2RF';

// GTM Head Script
function loadGTMHead() {
    const script = document.createElement('script');
    script.textContent = `(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','${GTM_ID}');`;
    document.head.insertBefore(script, document.head.firstChild);
}

// GTM Body Script (noscript)
function loadGTMBody() {
    const noscript = document.createElement('noscript');
    const iframe = document.createElement('iframe');
    iframe.src = `https://www.googletagmanager.com/ns.html?id=${GTM_ID}`;
    iframe.height = '0';
    iframe.width = '0';
    iframe.style.display = 'none';
    iframe.style.visibility = 'hidden';
    noscript.appendChild(iframe);
    document.body.insertBefore(noscript, document.body.firstChild);
}

// Initialize GTM and GA4
document.addEventListener('DOMContentLoaded', function() {
    loadGTMHead();
    loadGTMBody();
    
    // Push initial GA4 configuration
    window.dataLayer.push({
        'ga4_config': {
            'measurement_id': GA4_ID
        }
    });
}); 