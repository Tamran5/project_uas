function browseCategory(categoryName) {
    window.location.href = `/products?category=${encodeURIComponent(categoryName)}`;
}

document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const url = this.getAttribute('data-url');
        window.location.href = url;
    });
});
