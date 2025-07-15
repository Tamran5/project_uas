@push('styles')
    <link rel="stylesheet" href="{{ asset('css/detailproducts.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/detailproducts.js') }}"></script>
@endpush

<x-layout>
    <!-- Product Detail Section -->
    <main class="product-detail">
        <div class="container">
            <div class="product-layout">
                <!-- Product Image -->
                <div class="product-image">
                    <div class="main-image">
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}">
                        <div class="image-zoom-overlay"></div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="product-info">
                    <div class="product-header">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <div class="product-price">
                            <span class="current-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="product-description">
                        <h3>Description</h3>
                        <p class="description-text">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Size Selection -->
                    <div class="size-selection">
                        <h3>Select size</h3>
                        <div class="size-grid">
                            <button class="size-option" data-size="XS">XS</button>
                            <button class="size-option" data-size="S">S</button>
                            <button class="size-option active" data-size="M">M</button>
                            <button class="size-option" data-size="L">L</button>
                            <button class="size-option" data-size="XL">XL</button>
                            <button class="size-option" data-size="XXL">XXL</button>
                            <button class="size-option" data-size="XXXL">XXXL</button>
                        </div>
                    </div>


                    <!-- Product Features -->
                    <div class="product-features">
                        <div class="feature-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                    stroke="currentColor" stroke-width="2" />
                                <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" />
                            </svg>
                            <div class="feature-content">
                                <h4>Quality Guarantee</h4>
                                <p>Premium materials and professional printing</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 16V8C21 6.89543 20.1046 6 19 6H5C3.89543 6 3 6.89543 3 8V16C3 17.1046 3.89543 18 5 18H19C20.1046 18 21 17.1046 21 16Z"
                                    stroke="currentColor" stroke-width="2" />
                                <path d="M7 10H17M7 14H13" stroke="currentColor" stroke-width="2" />
                            </svg>
                            <div class="feature-content">
                                <h4>Fast Shipping</h4>
                                <p>2-3 business days delivery</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"
                                    stroke="currentColor" stroke-width="2" />
                                <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" />
                            </svg>
                            <div class="feature-content">
                                <h4>Easy Returns</h4>
                                <p>30-day return policy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Related Products -->
    <section class="related-products">
        <div class="container">
            <h2 class="section-title">Related Products</h2>

            <div class="carousel-container">
                <button class="carousel-btn carousel-prev" id="carouselPrev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>

                <div class="carousel-wrapper">
                    <div class="carousel-track" id="carouselTrack">
                        @foreach ($relatedProducts as $item)
                            <div class="product-card">
                                <div class="product-image-card">
                                    <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}">
                                    <div class="product-badge">Related</div>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title-card">{{ $item->name }}</h3>
                                    <div class="product-price-card">
                                        <span class="current-price">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                    </div>
                                    <a href="{{ route('detailproducts', urlencode($item->name)) }}" class="view-link">Lihat
                                        Produk</a>
                                    <a href="{{ route('detailproducts', urlencode($item->name)) }}" class="view-link">Lihat
                                        Produk</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="carousel-btn carousel-next" id="carouselNext">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </section>
</x-layout>