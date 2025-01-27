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