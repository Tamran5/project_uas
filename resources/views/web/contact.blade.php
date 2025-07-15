@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endpush
<x-layout>
    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1 class="hero-title">Hubungi kami</h1>
                        <p class="hero-subtitle">Layanan cetak kustom premium dengan kualitas luar biasa dan pengiriman
                            cepat di Indonesia.</p>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('images/wil.jpg') }}" alt="Contact us" class="contact-image">
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Information -->
        <section class="contact-section">
            <div class="container">
                <div class="contact-content">
                    <div class="contact-info">
                        <h2 class="contact-title">SiberStore</h2>

                        <div class="info-grid">
                            <div class="info-item">
                                <h3>Kontak</h3>
                                <div class="info-details">
                                    <p class="phone">+6282155123456</p>
                                    <p class="email">siberstore@gmail.com</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <h3>Alamat</h3>
                                <div class="info-details">
                                    <p>Jl. Printing Street No. 123 - 125</p>
                                    <p>Tegal Selatan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="social-section">
                        <h2 class="social-title">Kami hadir di Media Sosial</h2>
                        <div class="social-links-grid">
                            <a href="https://www.tiktok.com/@realmadrid" class="social-item" target="_blank">
                                <svg class="social-icon" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M6 2L3 6V20C3 21.11 3.89 22 5 22H19C20.11 22 21 21.11 21 20V6L18 2H6ZM12 17.5L6.5 12L7.91 10.59L12 14.67L16.09 10.59L17.5 12L12 17.5Z"
                                        fill="currentColor" />
                                </svg>
                                <span>Tiktok</span>
                            </a>
                            <a href="https://www.youtube.com/realmadrid" class="social-item" target="_blank">
                                <svg class="social-icon" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M10 15L15.19 12L10 9V15ZM21.56 7.17C21.69 7.64 21.78 8.27 21.84 9.07C21.91 9.87 21.94 10.56 21.94 11.16L22 12C22 14.19 21.84 15.8 21.56 16.83C21.31 17.73 20.73 18.31 19.83 18.56C19.36 18.69 18.5 18.78 17.18 18.84C15.88 18.91 14.69 18.94 13.59 18.94L12 19C7.81 19 5.2 18.84 4.17 18.56C3.27 18.31 2.69 17.73 2.44 16.83C2.31 16.36 2.22 15.73 2.16 14.93C2.09 14.13 2.06 13.44 2.06 12.84L2 12C2 9.81 2.16 8.2 2.44 7.17C2.69 6.27 3.27 5.69 4.17 5.44C4.64 5.31 5.5 5.22 6.82 5.16C8.12 5.09 9.31 5.06 10.41 5.06L12 5C16.19 5 18.8 5.16 19.83 5.44C20.73 5.69 21.31 6.27 21.56 7.17Z"
                                        fill="currentColor" />
                                </svg>
                                <span>Youtube</span>
                            </a>
                            <a href="https://www.instagram.com/realmadrid/" class="social-item" target="_blank">
                                <svg class="social-icon" viewBox="0 0 24 24" fill="none">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke="currentColor"
                                        stroke-width="2" />
                                    <path
                                        d="M16 11.37C16.1234 12.2022 15.9813 13.0522 15.5938 13.799C15.2063 14.5458 14.5931 15.1514 13.8416 15.5297C13.0901 15.9079 12.2384 16.0396 11.4078 15.9059C10.5771 15.7723 9.80976 15.3801 9.21484 14.7852C8.61992 14.1902 8.22773 13.4229 8.09407 12.5922C7.9604 11.7615 8.09207 10.9099 8.47033 10.1584C8.84859 9.40685 9.45418 8.79374 10.201 8.40624C10.9478 8.01874 11.7978 7.87658 12.63 8C13.4789 8.12588 14.2649 8.52146 14.8717 9.1283C15.4785 9.73515 15.8741 10.5211 16 11.37Z"
                                        stroke="currentColor" stroke-width="2" />
                                    <path d="M17.5 6.5H17.51" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>Instagram</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>