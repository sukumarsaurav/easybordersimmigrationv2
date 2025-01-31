document.addEventListener("DOMContentLoaded", () => {
    const mobileMenuButton = document.querySelector(".mobile-menu-button");
    const sidebarMenu = document.querySelector(".sidebar-menu");
    const closeMenuButton = document.querySelector(".close-menu-button");

    mobileMenuButton.addEventListener("click", () => {
        sidebarMenu.classList.add("active");
    });

    closeMenuButton.addEventListener("click", () => {
        sidebarMenu.classList.remove("active");
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const enquiryBtn = document.querySelector('.enquiry-btn');
    const enquiryForm = document.getElementById('enquiryForm');
    const closeEnquiry = document.querySelector('.close-enquiry');

    enquiryBtn.addEventListener('click', function(e) {
        e.preventDefault();
        enquiryForm.classList.add('active');
    });

    closeEnquiry.addEventListener('click', function() {
        enquiryForm.classList.remove('active');
    });

    // Close enquiry form when clicking outside
    document.addEventListener('click', function(e) {
        if (!enquiryForm.contains(e.target) && !enquiryBtn.contains(e.target)) {
            enquiryForm.classList.remove('active');
        }
    });

    // Handle enquiry form submission
    enquiryForm.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
        alert('Thank you for your enquiry. We will get back to you soon!');
        enquiryForm.classList.remove('active');
        this.reset();
    });
}); 