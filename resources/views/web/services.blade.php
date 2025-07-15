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
                <h1 class="services-title">Our Services</h1>
                <p class="services-subtitle">Professional printing solutions with exceptional quality and attention to
                    detail</p>
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
                                Our screen printing service offers vibrant, long-lasting prints perfect for bulk orders.
                                Using high-quality inks and precision techniques, we ensure consistent color
                                reproduction
                                and durability across all garments. Ideal for corporate uniforms, event merchandise,
                                and promotional items with bold, eye-catching designs.
                            </p>
                        </div>
                    </div>

                    <!-- Digital Printing Service -->
                    <div class="service-card main-service">
                        <div class="service-content-main">
                            <h2 class="main-service-title">DIGITAL<br>PRINTING</h2>
                            <p class="main-service-description">
                                State-of-the-art digital printing technology for photorealistic designs and complex
                                artwork.
                                Perfect for small to medium runs with unlimited color options and intricate detail
                                reproduction.
                            </p>
                        </div>
                    </div>

                    <!-- Printing Techniques -->
                    <div class="service-card techniques-card">
                        <div class="techniques-content">
                            <h3 class="techniques-title">Available Techniques</h3>
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
                                Premium embroidery services using advanced computerized machines for precise stitching.
                                Perfect for corporate logos, monograms, and detailed designs that require a
                                professional,
                                elegant finish. Our embroidery adds texture and dimension while maintaining durability
                                through countless washes.
                            </p>
                        </div>
                    </div>

                    <!-- Heat Transfer Service -->
                    <div class="service-card">
                        <div class="service-content">
                            <h3 class="service-name">Heat Transfer</h3>
                            <p class="service-description">
                                Quick and efficient heat transfer printing ideal for personalized items and small
                                orders.
                                Using high-quality vinyl and transfer materials, we create crisp, clean designs with
                                excellent adhesion. Perfect for names, numbers, and simple graphics with fast turnaround
                                times.
                            </p>
                        </div>
                    </div>

                    <!-- Custom Design Service -->
                    <div class="service-card">
                        <div class="service-content">
                            <h3 class="service-name">Custom Design</h3>
                            <p class="service-description">
                                Professional design services to bring your creative vision to life. Our experienced
                                designers work closely with you to create unique artwork, logos, and graphics optimized
                                for printing. From concept to completion, we ensure your design stands out and
                                represents your brand perfectly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Service Process -->
        <section class="process-section">
            <div class="container">
                <h2 class="process-title">Our Process</h2>
                <div class="process-grid">
                    <div class="process-step">
                        <div class="step-number">01</div>
                        <h3>Consultation</h3>
                        <p>We discuss your requirements, timeline, and design preferences to understand your vision
                            completely.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">02</div>
                        <h3>Design & Approval</h3>
                        <p>Our team creates or refines your design, providing samples and mockups for your approval
                            before production.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">03</div>
                        <h3>Production</h3>
                        <p>Using state-of-the-art equipment and premium materials, we carefully produce your order with
                            attention to detail.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">04</div>
                        <h3>Quality Check</h3>
                        <p>Every item undergoes thorough quality inspection to ensure it meets our high standards before
                            delivery.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>