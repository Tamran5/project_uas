<!-- Header -->
<header class="header">
    <nav class="nav">
        <div class="logo">
            <a href="/">
                <span class="logo-icon">S</span>
                <span class="logo-text">SiberStore</span>
            </a>
        </div>

        <ul class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link">Beranda</a>
            <li class="nav-item dropdown">
                <a href="{{ url('/products') }}" class="nav-link">Products</a>
                <div class="dropdown-menu">
                    <div class="dropdown-section">
                        <h4>T-Shirts</h4>
                        <a href="/products?category=T-Shirts" class="dropdown-link">T-Shirts</a>
                        <a href="/products?category=Polo Shirts" class="dropdown-link">Polo Shirts</a>
                        <a href="/products?category=Long Sleeve" class="dropdown-link">Long Sleeve</a>
                        <a href="/products?category=Tank Tops" class="dropdown-link">Tank Tops</a>
                    </div>
                    <div class="dropdown-section">
                        <h4>Hoodies & Jackets</h4>
                        <a href="/products?category=" class="dropdown-link">Hoodies</a>
                        <a href="/products?category=Zip Hoodies" class="dropdown-link">Zip Hoodies</a>
                        <a href="/products?category=Jackets" class="dropdown-link">Jackets</a>
                        <a href="/products?category=Varsity Jackets" class="dropdown-link">Varsity Jackets</a>
                    </div>
                </div>
            </li>
            <a href="{{ url('/services') }}" class="nav-link">Services</a>
            <a href="{{ url('/about') }}" class="nav-link">About</a>
            <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
        </ul>

        <div class="nav-actions">
            <div class="mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
</header>