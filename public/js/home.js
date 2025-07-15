function filterByCategory(categoryName) {
    const baseUrl = '/products';
    const url = categoryName ? `${baseUrl}?category=${encodeURIComponent(categoryName)}` : baseUrl;
    window.location.href = url;
}

function browseCategory(categoryName) {
    window.location.href = `/products?category=${encodeURIComponent(categoryName)}`;
}

// Event listener untuk tombol
document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const url = this.getAttribute('data-url');
        window.location.href = url;
    });
});


let currentSlide = 0;
const slides = document.querySelectorAll('.hero-bg-image');
const indicators = document.querySelectorAll('.indicator');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
        if (indicators[i]) {
            indicators[i].classList.toggle('active', i === index);
        }
    });
    currentSlide = index;
}

function nextSlide() {
    const next = (currentSlide + 1) % slides.length;
    showSlide(next);
}

function previousSlide() {
    const prev = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(prev);
}

function goToSlide(index) {
    showSlide(index);
}

// Optional: Auto Slide
setInterval(nextSlide, 5000); // Ganti slide setiap 5 detik

// Inisialisasi
showSlide(0);