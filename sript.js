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
  
  