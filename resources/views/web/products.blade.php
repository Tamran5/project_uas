@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
@endpush
<x-layout>
    <div class="container-barang">
        <!-- Hero Banner -->
        <section class="hero-banner">
            <div class="hero-content">
                <div class="product-showcase">
                    <div class="product-card">
                        <img src="https://images.pexels.com/photos/8532616/pexels-photo-8532616.jpeg?auto=compress&cs=tinysrgb&w=300&h=400&fit=crop"
                            alt="Premium Cotton T-Shirt">
                        <div class="product-info">
                            <h3>7200</h3>
                            <p>PREMIUM COTTON</p>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="https://images.pexels.com/photos/8532617/pexels-photo-8532617.jpeg?auto=compress&cs=tinysrgb&w=300&h=400&fit=crop"
                            alt="Fashion Cotton Raglan">
                        <div class="product-info">
                            <h3>7260</h3>
                            <p>FASHION COTTON<br>RAGLAN</p>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="https://images.pexels.com/photos/8532618/pexels-photo-8532618.jpeg?auto=compress&cs=tinysrgb&w=300&h=400&fit=crop"
                            alt="Long Sleeve">
                        <div class="product-info">
                            <h3>7280</h3>
                            <p>LONG SLEEVE</p>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="https://images.pexels.com/photos/8532619/pexels-photo-8532619.jpeg?auto=compress&cs=tinysrgb&w=300&h=400&fit=crop"
                            alt="Soft Tee">
                        <div class="product-info">
                            <h3>3600</h3>
                            <p>SOFT TEE</p>
                        </div>
                    </div>
                </div>

                <div class="brand-section">
                    <div class="brand-logo">
                        <h2>NEW STATES<br>APPAREL</h2>
                    </div>
                    <div class="brand-message">
                        <h1>WEAR YOUR</h1>
                        <div class="highlight-text">BASIC</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Filter Section -->
<section class="filter-section">
    <div class="filter-container">
        <div class="filter-dropdown">
            <select id="productFilter" onchange="filterByCategory(this.value)">
                <option value="">All Products</option>
                @foreach($categories as $category)
                    <option value="{{ $category['name'] }}" 
                        {{ request('category') && strtolower(request('category')) === strtolower($category['name']) ? 'selected' : '' }}>
                        {{ $category['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</section>



        <!-- Product Grid -->
        <section class="product-section">
            <div class="section-header">
                <h2>
                    <span id="categoryName">{{ $selectedCategory ? $selectedCategory->name : 'All Products' }}</span>
                    <span class="item-count" id="itemCount">({{ $products->count() }} Items)</span>
                </h2>

            </div>


            <div class="product-grid" id="productGrid">
                @foreach ($products as $product)
                    <a href="{{ route('detailproducts', $product->name) }}" class="product-item">
                        <div class="product-image">
                            <img src="{{ asset('storage/' . $product->image_url) }}" class="card-img-top"
                                alt="{{ $product->name }}">
                        </div>
                        <div class="product-details">
                            <h3>{{ $product->name }}</h3>
                            <p class="product-code">{{ $product->sku ?? '-' }}</p>
                            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>