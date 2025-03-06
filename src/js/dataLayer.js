// Initialize dataLayer
window.dataLayer = window.dataLayer || [];

// Push page-specific data
function pushPageData(pageData) {
    dataLayer.push({
        'pageType': pageData.pageType || 'other',
        'userType': pageData.userType || 'visitor',
        'pageLanguage': 'en',
        'siteName': 'Easy Borders Immigration'
    });
}

// Push event data
function pushEventData(eventName, eventData) {
    dataLayer.push({
        'event': eventName,
        ...eventData
    });
}

// Example usage for form submissions
function pushFormSubmission(formName, formData) {
    pushEventData('formSubmission', {
        'formName': formName,
        'formData': formData
    });
} 