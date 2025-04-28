// Wait until the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    const navButtons = document.querySelectorAll(".navbar button");
    const sections = document.querySelectorAll(".section");
  
    navButtons.forEach((button, index) => {
      button.addEventListener("click", () => {
        // Remove active class from all buttons
        navButtons.forEach(btn => btn.classList.remove("active"));
  
        // Hide all sections
        sections.forEach(section => section.classList.remove("active"));
  
        // Add active class to clicked button
        button.classList.add("active");
  
        // Show the corresponding section
        sections[index].classList.add("active");
      });
    });
  
    // Optional: Show the first section by default on load
    if (navButtons.length && sections.length) {
      navButtons[0].classList.add("active");
      sections[0].classList.add("active");
    }
  });
  