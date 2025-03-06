document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.querySelector('form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            pushFormSubmission('contact', {
                formType: 'contact',
                formLocation: window.location.pathname
            });
        });
    }
}); 