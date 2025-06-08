document.getElementById("year").textContent = new Date().getFullYear();
// Mobile menu toggle
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

menuToggle.addEventListener("click", () => {
    navLinks.classList.toggle("active");

    // Change icon based on menu state
    if (navLinks.classList.contains("active")) {
        menuToggle.innerHTML = '<i class="fa-solid fa-xmark"></i>';
    }
    else {
        menuToggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
    }
});

// Close mobile menu when clicking on a link
const navLinksArray = navLinks.querySelectorAll("a");
navLinksArray.forEach((link) => {
    link.addEventListener("click", () => {
        navLinks.classList.remove("active");
        menuToggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
    });
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();

        const targetId = this.getAttribute("href");
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
            const navbarHeight = document.querySelector(".navbar").offsetHeight;
            const targetPosition =
                targetElement.getBoundingClientRect().top +
                window.pageYOffset -
                navbarHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: "smooth",
            });
        }
    });
});

// Tab functionality for design showcase
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            tabButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const targetTab = button.dataset.tab;

            tabContents.forEach(content => content.classList.remove('active'));

            const activeContent = document.getElementById(targetTab);
            if (activeContent) {
                activeContent.classList.add('active');
            }
        });
    });
});

// Form submission
const contactForm = document.getElementById("contactForm");

if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // Get form values
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const message = document.getElementById("message").value;

        // In a real implementation, you would send this data to a server
        console.log("Form submitted:", { name, email, message });

        // Show success message (in a real implementation)
        alert("Thank you for your message! We will get back to you soon.");

        // Reset form
        contactForm.reset();
    });
}

// Add scroll event for navbar styling (optional enhancement)
window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 50) {
        navbar.style.boxShadow = "0 4px 20px rgba(0, 0, 0, 0.1)";
        navbar.style.height = "70px";
    }
    else {
        navbar.style.boxShadow = "0 2px 10px rgba(0, 0, 0, 0.1)";
        navbar.style.height = "80px";
    }
});