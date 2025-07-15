@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
<x-layout>
    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="hero-background">
            <img src="https://images.pexels.com/photos/1040945/pexels-photo-1040945.jpeg?auto=compress&cs=tinysrgb&w=1600"
                class="hero-bg-image" alt="Slide 1">
            <img src="https://images.pexels.com/photos/5480696/pexels-photo-5480696.jpeg" class="hero-bg-image"
                alt="Slide 2">
            <img src="https://images.pexels.com/photos/996329/pexels-photo-996329.jpeg?auto=compress&cs=tinysrgb&w=1600"
                class="hero-bg-image" alt="Slide 3">
            <div class="hero-overlay"></div>
        </div>

        <button class="nav-arrow nav-prev" onclick="previousSlide()" aria-label="Previous slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>

        <button class="nav-arrow nav-next" onclick="nextSlide()" aria-label="Next slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>

        <div class="container">
            <div class="hero-content">
                <div class="hero-left">
                    <div class="hero-badge">
                        <span class="badge-icon">✨</span>
                        <span>Premium Quality Printing</span>
                    </div>

                    <h1 class="hero-title">
                        <span class="title-line">Sablon Custom Premium</span>
                        <span class="title-line hero-subtitle">Koleksi Baru yang Lebih Keren!</span>
                    </h1>

                    <p class="hero-description">
                        Temukan berbagai solusi cetak custom terbaru kami dengan bahan berkualitas tinggi dan teknologi
                        tercanggih — siap wujudkan semua ide kreatifmu!
                    </p>

                    <div class="hero-actions">
                        <button class="cta-button primary" onclick="window.location.href='{{ url('/products') }}'">
                            <span>Lihat Produk</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">50K+</span>
                            <span class="stat-label">Pelanggan Puas</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">10+</span>
                            <span class="stat-label">Tahun Pengalaman</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">99%</span>
                            <span class="stat-label">Jaminan Kualitas</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="slide-indicators">
                <button class="indicator active" onclick="goToSlide(0)" aria-label="Go to slide 1"></button>
                <button class="indicator" onclick="goToSlide(1)" aria-label="Go to slide 2"></button>
                <button class="indicator" onclick="goToSlide(2)" aria-label="Go to slide 3"></button>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Jelajahi Kategori Produk Sablon</h2>
                <p class="section-subtitle">Jelajahi berbagai kategori produk sablon kustom kami</p>
            </div>

            <div class="categories-grid">
                @foreach($categories->take(3) as $category)
                    <div class="category-card" onclick="browseCategory('{{ $category['name'] }}')">
                        <div class="category-image">
                            <img src="{{ asset('storage/' . $category['image']) }}" alt="{{ $category['name'] }}">
                        </div>
                        <div class="category-content">
                            <h3 class="category-title">{{ $category['name'] }}</h3>
                            <p class="category-description">{{ $category['description'] }}</p>
                            <span class="category-count">See More</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Jelajahi Produk Sablon</h2>
                <p class="section-subtitle">Jelajahi berbagai produk sablon kustom kami</p>
            </div>
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card" data-product="{{ $product->slug }}">
                        <div class="product-image">
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" width="300">
                        </div>

                        <div class="product-content">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <p class="product-description">{{ $product->description }}</p>

                            <div class="product-price">
                                <span class="current-price">Rp.{{ number_format($product->price, 2) }}</span>
                            </div>
                            <button class="add-to-cart-btn" data-url="{{ route('detailproducts', $product->name) }}">
                                See Detail
                            </button>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Layanan Kami</h2>
                <p class="section-subtitle">Solusi pencetakan profesional untuk semua kebutuhan Anda.</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="service-title">Desain Kustom</h3>
                    <p class="service-description">Layanan desain grafis profesional untuk mewujudkan ide Anda menjadi
                        desain yang unik, menarik, dan sesuai kebutuhan.</p>
                    <ul class="service-features">
                        <li>Pembuatan Logo Profesional</li>
                        <li>Pembangunan Identitas Merek</li>
                        <li>Ilustrasi dan Grafis Sesuai Permintaan</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2" stroke="currentColor"
                                stroke-width="2" />
                            <line x1="8" y1="21" x2="16" y2="21" stroke="currentColor" stroke-width="2" />
                            <line x1="12" y1="17" x2="12" y2="21" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>
                    <h3 class="service-title">Digital Printing</h3>
                    <p class="service-description">Layanan cetak digital berkualitas tinggi dengan warna tajam dan
                        detail presisi untuk memenuhi semua kebutuhan cetak Anda.</p>
                    <ul class="service-features">
                        <li>Kualitas Resolusi Tinggi</li>
                        <li>Proses Cepat dan Tepat Waktu</li>
                        <li>Akurasi Warna yang Konsisten</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M9 11H15M9 15H15M17 21L12 16L7 21V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V21Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="service-title">Sablon DTG (Direct to Garment)</h3>
                    <p class="service-description">Cetak langsung di atas kain menggunakan printer khusus, seperti
                        mencetak di kertas.</p>
                    <ul class="service-features">
                        <li>Cocok untuk desain full color</li>
                        <li>Ideal untuk pemesanan satuan</li>
                        <li>Hasil lembut</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Apa Kata Pelanggan Kami</h2>
                <p class="section-subtitle">Umpan balik nyata dari pelanggan yang puas</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-rating">★★★★★</div>
                        <p class="testimonial-text">"Pelayanannya cepat tanggap dan hasil sablonnya rapi banget! Desain
                            yang saya kirim diikuti dengan sangat baik. Saya juga suka dengan kualitas bahan kaosnya."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="{{ asset('images/wil.jpg') }}" alt="Sarah Johnson">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Embut Sanchez</h4>
                            <p class="author-title">Small Business Owner</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-rating">★★★★★</div>
                        <p class="testimonial-text">"Senang banget bisa pesan di sini. Komunikasinya jelas, hasil
                            cetaknya detail, dan ukuran pas sesuai permintaan. Pokoknya pelayanan dan kualitasnya
                            juara!"</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=100"
                                alt="Michael Chen">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Michael Chen</h4>
                            <p class="author-title">Event Organizer</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-rating">★★★★★</div>
                        <p class="testimonial-text">"Baru pertama kali order dan langsung puas! Warna kaos sesuai
                            ekspektasi, desainnya tidak pecah, dan waktu produksinya juga cepat. Terima kasih banyak,
                            recommended!"</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg?auto=compress&cs=tinysrgb&w=100"
                                alt="Emily Rodriguez">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Asepin Rodriguez</h4>
                            <p class="author-title">Marketing Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>