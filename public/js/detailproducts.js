// Global variables
let cart = [];
let selectedColor = 'black';
let selectedSize = 'M';
let quantity = 1;
let isWishlisted = false;

// Product data
const productData = {
    id: 7200,
    name: 'New States Apparel Premium Cotton T-shirt 7200',
    basePrice: 45000,
    customDesignFee: 5000,
    images: [
        'https://images.pexels.com/photos/8532616/pexels-photo-8532616.jpeg?auto=compress&cs=tinysrgb&w=800',
        'https://images.pexels.com/photos/5709661/pexels-photo-5709661.jpeg?auto=compress&cs=tinysrgb&w=800',
        'https://images.pexels.com/photos/7679720/pexels-photo-7679720.jpeg?auto=compress&cs=tinysrgb&w=800',
        'https://images.pexels.com/photos/5710080/pexels-photo-5710080.jpeg?auto=compress&cs=tinysrgb&w=800'
    ]
};

// DOM Elements
const mainProductImage = document.getElementById('mainProductImage');
const thumbnails = document.querySelectorAll('.thumbnail');
const colorOptions = document.querySelectorAll('.color-option');
const sizeOptions = document.querySelectorAll('.size-option');
const quantityInput = document.getElementById('quantity');
const decreaseQtyBtn = document.getElementById('decreaseQty');
const increaseQtyBtn = document.getElementById('increaseQty');
const addToCartBtn = document.getElementById('addToCartBtn');
const buyNowBtn = document.getElementById('buyNowBtn');
const wishlistBtn = document.getElementById('wishlistBtn');
const cartBtn = document.getElementById('cartBtn');
const cartSidebar = document.getElementById('cartSidebar');
const cartOverlay = document.getElementById('cartOverlay');
const cartClose = document.getElementById('cartClose');
const cartContent = document.getElementById('cartContent');
const cartCount = document.getElementById('cartCount');
const cartTotal = document.getElementById('cartTotal');
const cartFooter = document.getElementById('cartFooter');
const notification = document.getElementById('notification');
const notificationText = document.getElementById('notificationText');
const priceDetailBtn = document.getElementById('priceDetailBtn');
const sizeGuideBtn = document.getElementById('sizeGuideBtn');
const priceDetailModal = document.getElementById('priceDetailModal');
const sizeGuideModal = document.getElementById('sizeGuideModal');
const mobileMenuToggle = document.getElementById('mobileMenuToggle');

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    setupEventListeners();
    updateCartDisplay();
    setupImageGallery();
    setupColorSelection();
    setupSizeSelection();
    setupQuantityControls();
    setupModals();
    setupMobileMenu();
}

function setupEventListeners() {
    // Thumbnail image clicks
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const imageUrl = this.dataset.image;
            changeMainImage(imageUrl);
            updateActiveThumbnail(this);
        });
    });

    // Color selection
    colorOptions.forEach(option => {
        option.addEventListener('click', function() {
            selectColor(this);
        });
    });

    // Size selection
    sizeOptions.forEach(option => {
        option.addEventListener('click', function() {
            selectSize(this);
        });
    });

    // Quantity controls
    decreaseQtyBtn.addEventListener('click', decreaseQuantity);
    increaseQtyBtn.addEventListener('click', increaseQuantity);
    quantityInput.addEventListener('change', updateQuantity);

    // Purchase buttons
    addToCartBtn.addEventListener('click', addToCart);
    buyNowBtn.addEventListener('click', buyNow);
    wishlistBtn.addEventListener('click', toggleWishlist);

    // Cart functionality
    cartBtn.addEventListener('click', openCart);
    cartClose.addEventListener('click', closeCart);
    cartOverlay.addEventListener('click', closeCart);

    // Modal buttons
    priceDetailBtn.addEventListener('click', () => openModal(priceDetailModal));
    sizeGuideBtn.addEventListener('click', () => openModal(sizeGuideModal));

    // Mobile menu
    mobileMenuToggle.addEventListener('click', toggleMobileMenu);

    // Search functionality
    const searchInput = document.querySelector('.search-input');
    searchInput.addEventListener('input', handleSearch);

    // Keyboard shortcuts
    document.addEventListener('keydown', handleKeyboardShortcuts);
}

// Image Gallery Functions
function setupImageGallery() {
    // Set first thumbnail as active
    if (thumbnails.length > 0) {
        thumbnails[0].classList.add('active');
    }
}

function changeMainImage(imageUrl) {
    mainProductImage.style.opacity = '0';
    setTimeout(() => {
        mainProductImage.src = imageUrl;
        mainProductImage.style.opacity = '1';
    }, 150);
}

function updateActiveThumbnail(activeThumbnail) {
    thumbnails.forEach(thumb => thumb.classList.remove('active'));
    activeThumbnail.classList.add('active');
}

// Color Selection Functions
function setupColorSelection() {
    // Set first color as active
    if (colorOptions.length > 0) {
        colorOptions[0].classList.add('active');
        selectedColor = colorOptions[0].dataset.color;
    }
}

function selectColor(colorElement) {
    colorOptions.forEach(option => option.classList.remove('active'));
    colorElement.classList.add('active');
    selectedColor = colorElement.dataset.color;
    
    showNotification(`Selected color: ${colorElement.title || selectedColor}`);
}

// Size Selection Functions
function setupSizeSelection() {
    // Find and set M as active by default
    sizeOptions.forEach(option => {
        if (option.dataset.size === 'M') {
            option.classList.add('active');
            selectedSize = 'M';
        }
    });
}

function selectSize(sizeElement) {
    sizeOptions.forEach(option => option.classList.remove('active'));
    sizeElement.classList.add('active');
    selectedSize = sizeElement.dataset.size;
    
    showNotification(`Selected size: ${selectedSize}`);
}

// Quantity Control Functions
function setupQuantityControls() {
    quantityInput.value = quantity;
}

function decreaseQuantity() {
    if (quantity > 1) {
        quantity--;
        quantityInput.value = quantity;
    }
}

function increaseQuantity() {
    if (quantity < 100) {
        quantity++;
        quantityInput.value = quantity;
    }
}

function updateQuantity() {
    const newQuantity = parseInt(quantityInput.value);
    if (newQuantity >= 1 && newQuantity <= 100) {
        quantity = newQuantity;
    } else {
        quantityInput.value = quantity;
    }
}

// Purchase Functions
function addToCart() {
    const product = {
        id: productData.id,
        name: productData.name,
        price: productData.basePrice + productData.customDesignFee,
        color: selectedColor,
        size: selectedSize,
        quantity: quantity,
        image: mainProductImage.src
    };

    const existingItem = cart.find(item => 
        item.id === product.id && 
        item.color === product.color && 
        item.size === product.size
    );

    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({
            ...product,
            cartId: Date.now()
        });
    }

    updateCartDisplay();
    showNotification(`Added ${quantity} item(s) to cart!`);
    
    // Animate add to cart button
    addToCartBtn.style.transform = 'scale(0.95)';
    setTimeout(() => {
        addToCartBtn.style.transform = 'scale(1)';
    }, 150);
}

function buyNow() {
    addToCart();
    openCart();
    showNotification('Proceeding to checkout...');
}

function toggleWishlist() {
    isWishlisted = !isWishlisted;
    wishlistBtn.classList.toggle('active', isWishlisted);
    
    if (isWishlisted) {
        showNotification('Added to wishlist!');
    } else {
        showNotification('Removed from wishlist');
    }
}

// Cart Functions
function updateCartDisplay() {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    
    cartCount.textContent = totalItems;
    cartTotal.textContent = formatPrice(totalPrice);
    
    if (totalItems === 0) {
        cartContent.innerHTML = `
            <div class="empty-cart">
                <p>Your cart is empty</p>
                <p class="empty-cart-sub">Add some products to get started!</p>
            </div>
        `;
        cartFooter.style.display = 'none';
    } else {
        cartContent.innerHTML = cart.map(item => `
            <div class="cart-item">
                <div class="cart-item-image">
                    <img src="${item.image}" alt="${item.name}">
                </div>
                <div class="cart-item-details">
                    <div class="cart-item-title">${item.name}</div>
                    <div class="cart-item-options">
                        <span>Color: ${item.color}</span> | 
                        <span>Size: ${item.size}</span>
                    </div>
                    <div class="cart-item-price">Rp ${formatPrice(item.price)}</div>
                    <div class="cart-item-controls">
                        <button class="qty-btn" onclick="updateCartQuantity(${item.cartId}, -1)">-</button>
                        <span class="qty-display">${item.quantity}</span>
                        <button class="qty-btn" onclick="updateCartQuantity(${item.cartId}, 1)">+</button>
                        <button class="remove-btn" onclick="removeFromCart(${item.cartId})">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <line x1="18" y1="6" x2="6" y2="18" stroke="currentColor" stroke-width="2"/>
                                <line x1="6" y1="6" x2="18" y2="18" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
        cartFooter.style.display = 'block';
    }
}

function updateCartQuantity(cartId, change) {
    const item = cart.find(item => item.cartId === cartId);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            removeFromCart(cartId);
        } else {
            updateCartDisplay();
        }
    }
}

function removeFromCart(cartId) {
    cart = cart.filter(item => item.cartId !== cartId);
    updateCartDisplay();
    showNotification('Item removed from cart');
}

function openCart() {
    cartSidebar.classList.add('open');
    cartOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeCart() {
    cartSidebar.classList.remove('open');
    cartOverlay.classList.remove('active');
    document.body.style.overflow = '';
}

// Modal Functions
function setupModals() {
    // Close modal when clicking outside
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this);
            }
        });
    });

    // Close modal buttons
    document.querySelectorAll('.modal-close').forEach(closeBtn => {
        closeBtn.addEventListener('click', function() {
            const modal = this.closest('.modal');
            closeModal(modal);
        });
    });
}

function openModal(modal) {
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal(modal) {
    modal.classList.remove('active');
    document.body.style.overflow = '';
}

// Mobile Menu Functions
function setupMobileMenu() {
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.header')) {
            closeMobileMenu();
        }
    });
}

function toggleMobileMenu() {
    mobileMenuToggle.classList.toggle('active');
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('mobile-open');
}

function closeMobileMenu() {
    mobileMenuToggle.classList.remove('active');
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.remove('mobile-open');
}

// Search Functions
function handleSearch(e) {
    const query = e.target.value.toLowerCase();
    
    if (query.length > 2) {
        console.log('Searching for:', query);
        // In a real app, this would filter products or make an API call
    }
}

// Notification Functions
function showNotification(message) {
    notificationText.textContent = message;
    notification.classList.add('show');
    
    setTimeout(() => {
        notification.classList.remove('show');
    }, 3000);
}

// Keyboard Shortcuts
function handleKeyboardShortcuts(e) {
    // Escape key closes modals and cart
    if (e.key === 'Escape') {
        closeCart();
        document.querySelectorAll('.modal.active').forEach(modal => {
            closeModal(modal);
        });
        closeMobileMenu();
    }
    
    // Ctrl/Cmd + K opens search
    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
        e.preventDefault();
        document.querySelector('.search-input').focus();
    }
}

// Utility Functions
function formatPrice(price) {
    return new Intl.NumberFormat('id-ID').format(price);
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Image zoom functionality
function setupImageZoom() {
    const mainImage = document.querySelector('.main-image');
    const zoomOverlay = document.getElementById('zoomOverlay');
    
    mainImage.addEventListener('mousemove', function(e) {
        const rect = this.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        
        const img = this.querySelector('img');
        img.style.transformOrigin = `${x}% ${y}%`;
        img.style.transform = 'scale(1.5)';
    });
    
    mainImage.addEventListener('mouseleave', function() {
        const img = this.querySelector('img');
        img.style.transform = 'scale(1.05)';
        img.style.transformOrigin = 'center';
    });
}

// Initialize image zoom
setupImageZoom();

// Initialize carousel
initializeCarousel();

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Carousel functionality
function initializeCarousel() {
    const track = document.getElementById('carouselTrack');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    const dotsContainer = document.getElementById('carouselDots');
    
    if (!track || !prevBtn || !nextBtn) return;
    
    const cards = track.querySelectorAll('.product-card');
    const cardWidth = 280 + 24; // card width + gap
    const visibleCards = getVisibleCards();
    const maxSlides = Math.max(0, cards.length - visibleCards);
    
    let currentSlide = 0;
    let isAnimating = false;
    
    // Create dots
    createDots();
    
    // Update carousel state
    updateCarousel();
    
    // Event listeners
    prevBtn.addEventListener('click', () => {
        if (!isAnimating && currentSlide > 0) {
            currentSlide--;
            updateCarousel();
        }
    });
    
    nextBtn.addEventListener('click', () => {
        if (!isAnimating && currentSlide < maxSlides) {
            currentSlide++;
            updateCarousel();
        }
    });
    
    // Touch/swipe support
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    
    track.addEventListener('touchstart', handleTouchStart, { passive: true });
    track.addEventListener('touchmove', handleTouchMove, { passive: true });
    track.addEventListener('touchend', handleTouchEnd);
    
    track.addEventListener('mousedown', handleMouseDown);
    track.addEventListener('mousemove', handleMouseMove);
    track.addEventListener('mouseup', handleMouseUp);
    track.addEventListener('mouseleave', handleMouseUp);
    
    // Auto-play functionality
    let autoPlayInterval;
    
    function startAutoPlay() {
        autoPlayInterval = setInterval(() => {
            if (currentSlide < maxSlides) {
                currentSlide++;
            } else {
                currentSlide = 0;
            }
            updateCarousel();
        }, 4000);
    }
    
    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }
    
    // Start auto-play
    startAutoPlay();
    
    // Pause on hover
    track.addEventListener('mouseenter', stopAutoPlay);
    track.addEventListener('mouseleave', startAutoPlay);
    
    function getVisibleCards() {
        const containerWidth = track.parentElement.offsetWidth;
        return Math.floor(containerWidth / cardWidth);
    }
    
    function createDots() {
        dotsContainer.innerHTML = '';
        for (let i = 0; i <= maxSlides; i++) {
            const dot = document.createElement('button');
            dot.className = 'carousel-dot';
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
                if (!isAnimating) {
                    currentSlide = i;
                    updateCarousel();
                }
            });
            dotsContainer.appendChild(dot);
        }
    }
    
    function updateCarousel() {
        isAnimating = true;
        
        // Update transform
        const translateX = -currentSlide * cardWidth;
        track.style.transform = `translateX(${translateX}px)`;
        
        // Update buttons
        prevBtn.disabled = currentSlide === 0;
        nextBtn.disabled = currentSlide === maxSlides;
        
        // Update dots
        document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
        
        // Reset animation flag
        setTimeout(() => {
            isAnimating = false;
        }, 500);
    }
    
    function handleTouchStart(e) {
        startX = e.touches[0].clientX;
        isDragging = true;
        stopAutoPlay();
    }
    
    function handleTouchMove(e) {
        if (!isDragging) return;
        currentX = e.touches[0].clientX;
    }
    
    function handleTouchEnd() {
        if (!isDragging) return;
        isDragging = false;
        
        const diffX = startX - currentX;
        const threshold = 50;
        
        if (Math.abs(diffX) > threshold) {
            if (diffX > 0 && currentSlide < maxSlides) {
                currentSlide++;
                updateCarousel();
            } else if (diffX < 0 && currentSlide > 0) {
                currentSlide--;
                updateCarousel();
            }
        }
        
        startAutoPlay();
    }
    
    function handleMouseDown(e) {
        startX = e.clientX;
        isDragging = true;
        stopAutoPlay();
        track.style.cursor = 'grabbing';
    }
    
    function handleMouseMove(e) {
        if (!isDragging) return;
        currentX = e.clientX;
    }
    
    function handleMouseUp() {
        if (!isDragging) return;
        isDragging = false;
        track.style.cursor = 'grab';
        
        const diffX = startX - currentX;
        const threshold = 50;
        
        if (Math.abs(diffX) > threshold) {
            if (diffX > 0 && currentSlide < maxSlides) {
                currentSlide++;
                updateCarousel();
            } else if (diffX < 0 && currentSlide > 0) {
                currentSlide--;
                updateCarousel();
            }
        }
        
        startAutoPlay();
    }
    
    // Handle window resize
    window.addEventListener('resize', debounce(() => {
        const newVisibleCards = getVisibleCards();
        const newMaxSlides = Math.max(0, cards.length - newVisibleCards);
        
        if (currentSlide > newMaxSlides) {
            currentSlide = newMaxSlides;
        }
        
        createDots();
        updateCarousel();
    }, 250));
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.target.closest('.related-products')) {
            if (e.key === 'ArrowLeft' && currentSlide > 0) {
                currentSlide--;
                updateCarousel();
            } else if (e.key === 'ArrowRight' && currentSlide < maxSlides) {
                currentSlide++;
                updateCarousel();
            }
        }
    });
}

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe elements for animations
document.querySelectorAll('.product-card, .feature-item').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// Performance optimizations
const debouncedSearch = debounce(handleSearch, 300);
document.querySelector('.search-input').removeEventListener('input', handleSearch);
document.querySelector('.search-input').addEventListener('input', debouncedSearch);

// Error handling
window.addEventListener('error', function(e) {
    console.error('Application error:', e.error);
    showNotification('An error occurred. Please try again.');
});

// Console welcome message
console.log(`
🎨 PrintCraft Product Detail Page
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Product: ${productData.name}
Price: Rp ${formatPrice(productData.basePrice + productData.customDesignFee)}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
`);

// Add CSS for cart item styles
const additionalCSS = `
.cart-item {
    display: flex;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid var(--neutral-200);
}

.cart-item-image {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-lg);
    overflow: hidden;
    flex-shrink: 0;
}

.cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cart-item-details {
    flex: 1;
}

.cart-item-title {
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: var(--black);
    margin-bottom: var(--space-1);
}

.cart-item-options {
    font-size: var(--font-size-xs);
    color: var(--neutral-600);
    margin-bottom: var(--space-2);
}

.cart-item-price {
    color: var(--neutral-600);
    font-size: var(--font-size-sm);
    margin-bottom: var(--space-2);
}

.cart-item-controls {
    display: flex;
    align-items: center;
    gap: var(--space-2);
}

.qty-btn {
    background: var(--neutral-200);
    border: none;
    width: 24px;
    height: 24px;
    border-radius: var(--radius-sm);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--font-size-sm);
    transition: all var(--transition-base);
}

.qty-btn:hover {
    background: var(--neutral-300);
}

.qty-display {
    min-width: 24px;
    text-align: center;
    font-size: var(--font-size-sm);
    font-weight: 600;
}

.remove-btn {
    background: none;
    border: none;
    color: var(--neutral-500);
    cursor: pointer;
    padding: var(--space-1);
    margin-left: auto;
    transition: all var(--transition-base);
}

.remove-btn:hover {
    color: var(--neutral-800);
}
`;

// Inject additional CSS
const style = document.createElement('style');
style.textContent = additionalCSS;
document.head.appendChild(style);