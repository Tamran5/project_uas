function filterByCategory(categoryName) {
    const categoryTitle = document.getElementById('categoryName');
    const itemCount = document.getElementById('itemCount');
    const productGrid = document.getElementById('productGrid');

    fetch(`/products?category=${encodeURIComponent(categoryName)}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
        .then(response => response.json())
        .then(data => {
            categoryTitle.textContent = data.category_name;
            itemCount.textContent = `(${data.count} Items)`;

            productGrid.innerHTML = '';

            if (data.products.length > 0) {
                data.products.forEach(product => {
                    productGrid.innerHTML += `
    <a href="/product/${encodeURIComponent(product.name)}" class="product-item">
        <div class="product-image">
            <img src="${product.image}" class="card-img-top" alt="${product.name}">
            <div class="product-overlay">
                <button class="quick-view">Quick View</button>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
        <div class="product-details">
            <h3>${product.name}</h3>
            <p class="product-code">${product.sku ?? '-'}</p>
            <p class="price">Rp ${formatPrice(product.price)}</p>
        </div>
    </a>
`;
                });
            } else {
                productGrid.innerHTML = `<p>Tidak ada produk ditemukan.</p>`;
            }
        })
        .catch(error => {
            console.error('Error fetching products:', error);
        });
}

function formatPrice(value) {
    return new Intl.NumberFormat('id-ID').format(value);
}
