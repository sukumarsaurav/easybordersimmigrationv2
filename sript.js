document.addEventListener("DOMContentLoaded", () => {
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector(".mobile-menu-button")
    const navMenu = document.querySelector("nav ul")
  
    mobileMenuButton.addEventListener("click", () => {
      navMenu.classList.toggle("show")
    })
  
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault()
        document.querySelector(this.getAttribute("href")).scrollIntoView({
          behavior: "smooth",
        })
      })
    })
  
    // Sticky header
    const header = document.querySelector("header")
    const headerOffset = header.offsetTop
  
    window.addEventListener("scroll", () => {
      if (window.pageYOffset > headerOffset) {
        header.classList.add("sticky")
      } else {
        header.classList.remove("sticky")
      }
    })
  
    // Testimonial slider
    const testimonialSlider = document.querySelector(".testimonial-slider")
    let isDown = false
    let startX
    let scrollLeft
  
    testimonialSlider.addEventListener("mousedown", (e) => {
      isDown = true
      startX = e.pageX - testimonialSlider.offsetLeft
      scrollLeft = testimonialSlider.scrollLeft
    })
  
    testimonialSlider.addEventListener("mouseleave", () => {
      isDown = false
    })
  
    testimonialSlider.addEventListener("mouseup", () => {
      isDown = false
    })
  
    testimonialSlider.addEventListener("mousemove", (e) => {
      if (!isDown) return
      e.preventDefault()
      const x = e.pageX - testimonialSlider.offsetLeft
      const walk = (x - startX) * 2
      testimonialSlider.scrollLeft = scrollLeft - walk
    })
  
    // Form submission (you can add your own logic here)
    const contactForm = document.querySelector(".contact-form")
    contactForm.addEventListener("submit", (e) => {
      e.preventDefault()
      // Add your form submission logic here
      alert("Form submitted successfully!")
      contactForm.reset()
    })
  
    // Animate elements on scroll
    const animateOnScroll = () => {
      const elements = document.querySelectorAll(".test-card, .service-card, .testimonial")
      elements.forEach((element) => {
        const elementTop = element.getBoundingClientRect().top
        const elementBottom = element.getBoundingClientRect().bottom
        if (elementTop < window.innerHeight && elementBottom > 0) {
          element.classList.add("animate")
        }
      })
    }
  
    window.addEventListener("scroll", animateOnScroll)
    animateOnScroll() // Run once on load
  })
  // Add this to your existing script.js file
document.addEventListener("DOMContentLoaded", () => {
  const tabButtons = document.querySelectorAll(".tab-btn")
  const tabPanes = document.querySelectorAll(".tab-pane")

  function switchTab(tabId) {
    // Remove active class from all buttons and panes
    tabButtons.forEach((btn) => btn.classList.remove("active"))
    tabPanes.forEach((pane) => pane.classList.remove("active"))

    // Add active class to selected button and pane
    const selectedButton = document.querySelector(`[data-tab="${tabId}"]`)
    const selectedPane = document.getElementById(tabId)

    if (selectedButton && selectedPane) {
      selectedButton.classList.add("active")
      selectedPane.classList.add("active")
    }
  }

  // Add click event listeners to tab buttons
  tabButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const tabId = button.getAttribute("data-tab")
      switchTab(tabId)
    })
  })
})
  
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