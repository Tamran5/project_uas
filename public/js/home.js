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