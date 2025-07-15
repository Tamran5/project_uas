@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/about.js') }}"></script>
@endpush
<x-layout>
    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1 class="hero-title">
                            TEMPAT SABLON CUSTOM SATUAN<br>
                            TERBESAR DI INDONESIA.
                        </h1>
                        <p class="hero-description">
                            SiberStore merupakan the leading brands dalam industri kaos polos dan custom
                            sablon satuan dengan kualitas serta kuantitas terbesar di Indonesia.
                        </p>
                        <p class="hero-description">
                            Keresahan para pelanggan yang ingin custom sablon satuan dengan harga
                            bersahabat, menjadi tantangan bagi kami untuk mewujudkannya. Kami bekerja,
                            menyusun strategi merancang, mengembangkan, meluncurkan hingga
                            menumbuhkan SiberStore untuk menjadi jawaban dan solusi bagi keresahan tersebut.
                            SiberStore terus berusaha memberikan yang terbaik dengan beragam talenta unik
                            dalam pengembangannya.
                        </p>
                    </div>
                    <div class="hero-image">
                        <img src="https://images.pexels.com/photos/8532616/pexels-photo-8532616.jpeg?auto=compress&cs=tinysrgb&w=800"
                            alt="Custom T-Shirts Display" class="hero-img">
                    </div>
                </div>
            </div>
        </section>

        <!-- Store Section -->
        <section class="store-section">
            <div class="store-container">
                <div class="store-content">
                    <div class="store-image">
                        <img src="https://images.pexels.com/photos/1488463/pexels-photo-1488463.jpeg?auto=compress&cs=tinysrgb&w=800"
                            alt="Store Interior" class="store-img">
                    </div>
                    <div class="store-text">
                        <h2 class="store-title">
                            SiberStore Menjangkau Seluruh Indonesia
                        </h2>
                        <p class="store-description">
                            Dengan jaringan distribusi yang luas dan sistem logistik yang handal,
                            SiberStore mampu melayani pelanggan di seluruh Indonesia dengan kualitas
                            yang konsisten dan pengiriman yang cepat.
                        </p>
                        <p class="store-description">
                            Kami memiliki pusat produksi yang tersebar di berbagai kota besar untuk
                            memastikan setiap pesanan dapat diproses dengan efisien dan tepat waktu,
                            memberikan pengalaman berbelanja yang memuaskan bagi seluruh pelanggan.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <div class="container">
                <h2 class="section-title">Kenapa Pilih SiberStore?</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">⚡</div>
                        <h3>Produksi Cepat</h3>
                        <p>Layanan cetak ekspres dengan waktu penyelesaian 24 jam</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🎨</div>
                        <h3>Desain Kustom</h3>
                        <p>Desain dibuat khusus mengikuti keinginan dan kebutuhan pelanggan.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">💎</div>
                        <h3>Kualitas Premium</h3>
                        <p>HMenggunakan bahan berkualitas tinggi dan teknologi cetak terkini</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>