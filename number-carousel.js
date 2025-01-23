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
  
    // Clone phone numbers for smooth infinite scroll
    const track = document.querySelector(".carousel-track")
    if (track) {
      //Check if the element exists
      const numbers = track.innerHTML
      track.innerHTML = numbers + numbers // Duplicate content for seamless loop
    }
  })