import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

// ============================================================
// Scroll Reveal Animation
// ============================================================
function initScrollReveal() {
    const reveals = document.querySelectorAll(".reveal");

    if (!reveals.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("revealed");
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: "0px 0px -50px 0px",
        },
    );

    reveals.forEach((el) => observer.observe(el));
}

// ============================================================
// Smooth Scroll for anchor links
// ============================================================
function initSmoothScroll() {
    document.querySelectorAll('a[href*="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");
            const hashIndex = href.indexOf("#");
            if (hashIndex === -1) return;

            const hash = href.substring(hashIndex);
            const target = document.querySelector(hash);

            if (target) {
                e.preventDefault();
                const navHeight =
                    document.querySelector("#navbar")?.offsetHeight || 80;
                const top =
                    target.getBoundingClientRect().top +
                    window.scrollY -
                    navHeight;
                window.scrollTo({ top, behavior: "smooth" });
            }
        });
    });
}

// ============================================================
// Initialize on DOM ready
// ============================================================
document.addEventListener("DOMContentLoaded", () => {
    initScrollReveal();
    initSmoothScroll();
});
