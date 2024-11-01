
 // JavaScript для карусели
let currentSlide = 0;

function showSlides() {
    const slides = document.querySelectorAll('.review-card');
    slides.forEach((slide, index) => {
        slide.style.display = index === currentSlide ? 'block' : 'none';
    });
}

function moveSlide(n) {
    const slides = document.querySelectorAll('.review-card');
    currentSlide += n;

    if (currentSlide >= slides.length) {
        currentSlide = 0;
    } else if (currentSlide < 0) {
        currentSlide = slides.length - 1;
    }

    showSlides();
}

// Инициализация
showSlides();
 document.addEventListener('DOMContentLoaded', loadProducts);