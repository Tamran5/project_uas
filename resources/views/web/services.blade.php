@push('styles')
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/services.js') }}"></script>
@endpush
<x-layout>
    <!-- Main Content -->
    <main class="main-content">
        <!-- Services Hero Section -->
        <section class="services-hero">
            <div class="container">
                <h1 class="services-title">Layanan Kami</h1>
                <p class="services-subtitle">Solusi percetakan profesional dengan kualitas luar biasa dan perhatian
                    terhadap setiap detail.
                </p>
            </div>
        </section>

        <!-- Services Grid -->
        <section class="services-section">
            <div class="container">
                <div class="services-grid">
                    <!-- Screen Printing Service -->
                    <div class="service-card">
                        <div class="service-content">
                            <h3 class="service-name">Screen Printing</h3>
                            <p class="service-description">
                                Layanan sablon kami menawarkan hasil cetak yang cerah dan tahan lama, sempurna untuk
                                pesanan dalam jumlah besar. Dengan menggunakan tinta berkualitas tinggi dan teknik
                                presisi, kami memastikan reproduksi warna yang konsisten dan daya tahan pada setiap
                                pakaian. Cocok untuk seragam perusahaan, merchandise acara, dan barang promosi dengan
                                desain yang berani dan menarik perhatian.

                            </p>
                        </div>
                    </div>

                    <!-- Digital Printing Service -->
                    <div class="service-card main-service">
                        <div class="service-content-main">
                            <h2 class="main-service-title">DIGITAL<br>PRINTING</h2>
                            <p class="main-service-description">
                                Teknologi cetak digital canggih untuk desain fotorealistik dan karya seni yang kompleks.
                                Sangat cocok untuk cetakan dalam jumlah kecil hingga menengah dengan pilihan warna tak
                                terbatas dan reproduksi detail yang rumit.

                            </p>
                        </div>
                    </div>

                    <!-- Printing Techniques -->
                    <div class="service-card techniques-card">
                        <div class="techniques-content">
                            <h3 class="techniques-title">Teknik yang Tersedia</h3>
                            <div class="technique-list">
                                <div class="technique-item">
                                    <span class="technique-name">RUBBER</span>
                                    <p class="technique-desc">Flexible, durable finish</p>
                                </div>
                                <div class="technique-item">
                                    <span class="technique-name">SUPERWHITE</span>
                                    <p class="technique-desc">Bright white base for dark fabrics</p>
                                </div>
                                <div class="technique-item">
                                    <span class="technique-name">DISCHARGE</span>
                                    <p class="technique-desc">Soft, breathable prints</p>
                                </div>
                                <div class="technique-item">
                                    <span class="technique-name">PLASTISOL</span>
                                    <p class="technique-desc">Vibrant, opaque coverage</p>
                                </div>
                                <div class="technique-item">
                                    <span class="technique-name">FOAM</span>
                                    <p class="technique-desc">Raised, textured effect</p>
                                </div>
                                <div class="technique-item">
                                    <span class="technique-name">GLOW IN THE DARK</span>
                                    <p class="technique-desc">Luminescent specialty ink</p>
                                </div>
                                <div class="technique-item">
                                    <span class="technique-name">REFLECTIVE</span>
                                    <p class="technique-desc">High-visibility safety prints</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Embroidery Service -->
                    <div class="service-card">
                        <div class="service-content">
                            <h3 class="service-name">Embroidery</h3>
                            <p class="service-description">
                                Layanan bordir premium menggunakan mesin komputerisasi canggih untuk jahitan yang
                                presisi.
                                Sangat cocok untuk logo perusahaan, monogram, dan desain detail yang memerlukan hasil
                                akhir profesional dan elegan.
                                Bordir kami menambahkan tekstur dan dimensi sekaligus menjaga daya tahan meski dicuci
                                berkali-kali.
                            </p>
                        </div>
                    </div>

                    <!-- Heat Transfer Service -->
                    <div class="service-card">
                        <div class="service-content">
                            <h3 class="service-name">Heat Transfer</h3>
                            <p class="service-description">
                                Cetak transfer panas yang cepat dan efisien, ideal untuk barang personalisasi dan
                                pesanan kecil.
                                Dengan menggunakan vinyl dan bahan transfer berkualitas tinggi, kami menciptakan desain
                                yang tajam dan bersih dengan daya rekat yang sangat baik.
                                Sangat cocok untuk nama, nomor, dan grafik sederhana dengan waktu pengerjaan yang cepat.
                            </p>
                        </div>
                    </div>

                    <!-- Custom Design Service -->
                    <div class="service-card">
                        <div class="service-content">
                            <h3 class="service-name">Custom Design</h3>
                            <p class="service-description">
                                Layanan desain profesional untuk mewujudkan visi kreatif Anda. Desainer berpengalaman
                                kami bekerja sama dengan Anda untuk menciptakan karya seni, logo, dan grafik unik yang
                                dioptimalkan untuk cetak.
                                Mulai dari konsep hingga selesai, kami memastikan desain Anda menonjol dan mewakili
                                merek Anda dengan sempurna.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Service Process -->
        <section class="process-section">
            <div class="container">
                <h2 class="process-title">Proses Kami</h2>
                <div class="process-grid">
                    <div class="process-step">
                        <div class="step-number">01</div>
                        <h3>Konsultasi</h3>
                        <p>Kami membahas kebutuhan, jadwal, dan preferensi desain Anda untuk memahami visi Anda secara
                            menyeluruh..</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">02</div>
                        <h3>Desain & Persetujuan</h3>
                        <p>Tim kami membuat atau menyempurnakan desain Anda, serta menyediakan sampel dan mockup untuk
                            persetujuan Anda sebelum produksi.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">03</div>
                        <h3>Produksi</h3>
                        <p>Dengan menggunakan peralatan canggih dan bahan premium, kami memproduksi pesanan Anda dengan
                            perhatian penuh terhadap setiap detail.
                        </p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">04</div>
                        <h3>Pemeriksaan Kualitas</h3>
                        <p>Setiap produk menjalani pemeriksaan kualitas yang menyeluruh untuk memastikan memenuhi
                            standar tinggi kami sebelum pengiriman.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>