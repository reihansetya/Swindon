import "./bootstrap";
import AOS from "aos";
import "aos/dist/aos.css";

// Initialize AOS
document.addEventListener("DOMContentLoaded", () => {
    AOS.init({
        duration: 1000,
        easing: "ease-out-cubic",
        once: true,
        offset: 100,
        delay: 100,
    });
});

// Parallax effect for hero section
window.addEventListener("scroll", () => {
    const scrolled = window.pageYOffset;
    const parallaxElements = document.querySelectorAll(".parallax-bg");

    parallaxElements.forEach((element) => {
        const speed = element.dataset.speed || 0.5;
        element.style.transform = `translateY(${scrolled * speed}px)`;
    });
});

const tes = [
    {
        id: 1,
        name: "test",
    },
];
