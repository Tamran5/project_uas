// // PRINTCO Enhanced JavaScript - Black & White Theme
// // Modern, modular, and performance-optimized

// class PrintcoApp {
//     constructor() {
//         this.state = {
//             currentSlide: 0,
//             cartCount: 0,
//             timerMinutes: 194,
//             timerSeconds: 4,
//             isLoading: false,
//             searchSuggestions: [
//                 'Custom T-Shirts',
//                 'Business Cards',
//                 'Hoodies',
//                 'Mugs',
//                 'Banners',
//                 'Stickers',
//                 'Canvas Prints',
//                 'Phone Cases'
//             ]
//         };

//         this.heroImages = [
//             {
//                 url: 'https://images.pexels.com/photos/5480696/pexels-photo-5480696.jpeg?auto=compress&cs=tinysrgb&w=1600',
//                 alt: 'Premium Custom Printing Services'
//             },
//             {
//                 url: 'https://images.pexels.com/photos/8532616/pexels-photo-8532616.jpeg?auto=compress&cs=tinysrgb&w=1600',
//                 alt: 'Professional Design Solutions'
//             },
//             {
//                 url: 'https://images.pexels.com/photos/5709661/pexels-photo-5709661.jpeg?auto=compress&cs=tinysrgb&w=1600',
//                 alt: 'Quality Materials and Craftsmanship'
//             }
//         ];

//         this.init();
//     }

//     init() {
//         this.bindEvents();
//         this.initializeSlideshow();
//         this.initializeTimer();
//         this.initializeSearch();
//         this.updateCartDisplay();
//         this.setupScrollEffects();
//         this.setupIntersectionObserver();

//         // Initialize after DOM is ready
//         if (document.readyState === 'loading') {
//             document.addEventListener('DOMContentLoaded', () => this.onDOMReady());
//         } else {
//             this.onDOMReady();
//         }
//     }

//     onDOMReady() {
//         this.showNotification('Welcome to PRINTCO! 🎉', 'success');
//         this.animateElements();
//     }

//     bindEvents() {
//         // Search events
//         const searchInput = document.getElementById('searchInput');
//         const searchBtn = document.getElementById('searchBtn');

//         if (searchInput) {
//             searchInput.addEventListener('input', (e) => this.handleSearchInput(e));
//             searchInput.addEventListener('keypress', (e) => {
//                 if (e.key === 'Enter') this.performSearch(e.target.value);
//             });
//             searchInput.addEventListener('focus', () => this.showSearchSuggestions());
//             searchInput.addEventListener('blur', () => this.hideSearchSuggestions());
//         }

//         if (searchBtn) {
//             searchBtn.addEventListener('click', () => {
//                 this.performSearch(searchInput?.value || '');
//             });
//         }

//         // Navigation events
//         document.querySelectorAll('.nav-link').forEach(link => {
//             link.addEventListener('click', (e) => this.handleNavigation(e));
//         });

//         // Cart events
//         const cartBtn = document.getElementById('cartBtn');
//         if (cartBtn) {
//             cartBtn.addEventListener('click', () => this.openCart());
//         }

//         // Mobile menu toggle
//         const mobileMenuToggle = document.getElementById('mobileMenuToggle');
//         if (mobileMenuToggle) {
//             mobileMenuToggle.addEventListener('click', () => this.toggleMobileMenu());
//         }

//         // Keyboard events
//         document.addEventListener('keydown', (e) => this.handleKeyboardNavigation(e));

//         // Touch events for mobile swipe
//         this.setupTouchEvents();

//         // Window events
//         window.addEventListener('scroll', this.throttle(() => this.handleScroll(), 16));
//         window.addEventListener('resize', this.debounce(() => this.handleResize(), 250));
//     }

//     // Slideshow functionality
//     initializeSlideshow() {
//         this.updateSlideIndicators();

//         // Auto-slide with pause on hover
//         this.slideInterval = setInterval(() => {
//             if (!this.isHovered) {
//                 this.nextSlide();
//             }
//         }, 6000);

//         // Pause on hover
//         const hero = document.getElementById('hero');
//         if (hero) {
//             hero.addEventListener('mouseenter', () => {
//                 this.isHovered = true;
//             });
//             hero.addEventListener('mouseleave', () => {
//                 this.isHovered = false;
//             });
//         }
//     }

//     nextSlide() {
//         this.state.currentSlide = (this.state.currentSlide + 1) % this.heroImages.length;
//         this.updateHeroImage();
//         this.updateSlideIndicators();
//     }

//     previousSlide() {
//         this.state.currentSlide = (this.state.currentSlide - 1 + this.heroImages.length) % this.heroImages.length;
//         this.updateHeroImage();
//         this.updateSlideIndicators();
//     }

//     goToSlide(index) {
//         if (index >= 0 && index < this.heroImages.length) {
//             this.state.currentSlide = index;
//             this.updateHeroImage();
//             this.updateSlideIndicators();
//         }
//     }

//     updateHeroImage() {
//         const heroImage = document.getElementById('heroBgImage');
//         if (!heroImage) return;

//         const currentImage = this.heroImages[this.state.currentSlide];

//         // Preload next image
//         const nextIndex = (this.state.currentSlide + 1) % this.heroImages.length;
//         const nextImage = new Image();
//         nextImage.src = this.heroImages[nextIndex].url;

//         // Smooth transition
//         heroImage.style.opacity = '0';
//         heroImage.style.transform = 'scale(1.1)';

//         setTimeout(() => {
//             heroImage.src = currentImage.url;
//             heroImage.alt = currentImage.alt;

//             heroImage.style.opacity = '1';
//             heroImage.style.transform = 'scale(1.05)';
//         }, 400);
//     }

//     updateSlideIndicators() {
//         const indicators = document.querySelectorAll('.indicator');
//         indicators.forEach((indicator, index) => {
//             if (index === this.state.currentSlide) {
//                 indicator.classList.add('active');
//                 indicator.setAttribute('aria-label', `Current slide ${index + 1}`);
//             } else {
//                 indicator.classList.remove('active');
//                 indicator.setAttribute('aria-label', `Go to slide ${index + 1}`);
//             }
//         });
//     }

//     // Timer functionality
//     initializeTimer() {
//         this.updateTimerDisplay();

//         this.timerInterval = setInterval(() => {
//             if (this.state.timerSeconds > 0) {
//                 this.state.timerSeconds--;
//             } else if (this.state.timerMinutes > 0) {
//                 this.state.timerMinutes--;
//                 this.state.timerSeconds = 59;
//             } else {
//                 // Timer expired - reset and show notification
//                 this.state.timerMinutes = 194;
//                 this.state.timerSeconds = 4;
//                 this.showNotification('Special offer renewed! ⏰', 'info');
//             }
//             this.updateTimerDisplay();
//         }, 1000);
//     }

//     updateTimerDisplay() {
//         const minutesElement = document.getElementById('minutes');
//         const secondsElement = document.getElementById('seconds');

//         if (minutesElement && secondsElement) {
//             minutesElement.textContent = this.state.timerMinutes.toString().padStart(3, '0');
//             secondsElement.textContent = this.state.timerSeconds.toString().padStart(2, '0');
//         }
//     }

//     // Search functionality
//     initializeSearch() {
//         // Setup search suggestions container
//         const searchContainer = document.querySelector('.search-container');
//         if (searchContainer && !document.getElementById('searchSuggestions')) {
//             const suggestionsDiv = document.createElement('div');
//             suggestionsDiv.id = 'searchSuggestions';
//             suggestionsDiv.className = 'search-suggestions';
//             searchContainer.appendChild(suggestionsDiv);
//         }
//     }

//     handleSearchInput(e) {
//         const query = e.target.value.toLowerCase();
//         if (query.length > 0) {
//             this.showFilteredSuggestions(query);
//         } else {
//             this.hideSearchSuggestions();
//         }
//     }

//     showFilteredSuggestions(query) {
//         const filtered = this.state.searchSuggestions.filter(suggestion =>
//             suggestion.toLowerCase().includes(query)
//         );

//         const suggestionsContainer = document.getElementById('searchSuggestions');
//         if (suggestionsContainer && filtered.length > 0) {
//             suggestionsContainer.innerHTML = filtered
//                 .slice(0, 5)
//                 .map(suggestion => `
//                     <div class="suggestion-item" onclick="printcoApp.selectSuggestion('${suggestion}')">
//                         ${this.highlightQuery(suggestion, query)}
//                     </div>
//                 `).join('');

//             suggestionsContainer.style.display = 'block';
//         }
//     }

//     showSearchSuggestions() {
//         const suggestionsContainer = document.getElementById('searchSuggestions');
//         const searchInput = document.getElementById('searchInput');

//         if (suggestionsContainer && searchInput && searchInput.value.length === 0) {
//             suggestionsContainer.innerHTML = this.state.searchSuggestions
//                 .slice(0, 5)
//                 .map(suggestion => `
//                     <div class="suggestion-item" onclick="printcoApp.selectSuggestion('${suggestion}')">
//                         ${suggestion}
//                     </div>
//                 `).join('');

//             suggestionsContainer.style.display = 'block';
//         }
//     }

//     hideSearchSuggestions() {
//         setTimeout(() => {
//             const suggestionsContainer = document.getElementById('searchSuggestions');
//             if (suggestionsContainer) {
//                 suggestionsContainer.style.display = 'none';
//             }
//         }, 150);
//     }

//     selectSuggestion(suggestion) {
//         const searchInput = document.getElementById('searchInput');
//         if (searchInput) {
//             searchInput.value = suggestion;
//             this.performSearch(suggestion);
//         }
//         this.hideSearchSuggestions();
//     }

//     highlightQuery(text, query) {
//         const regex = new RegExp(`(${query})`, 'gi');
//         return text.replace(regex, '<strong>$1</strong>');
//     }

//     performSearch(query) {
//         if (!query.trim()) {
//             this.showNotification('Please enter a search term', 'warning');
//             return;
//         }

//         this.showLoading(true);

//         // Animate search button
//         const searchBtn = document.getElementById('searchBtn');
//         if (searchBtn) {
//             searchBtn.style.transform = 'rotate(360deg)';
//             setTimeout(() => {
//                 searchBtn.style.transform = 'rotate(0deg)';
//             }, 500);
//         }

//         this.showNotification(`Searching for "${query}"...`, 'info');

//         // Simulate API call
//         setTimeout(() => {
//             this.showLoading(false);
//             this.showNotification(`Found products for "${query}"`, 'success');

//             // Add to search history
//             this.addToSearchHistory(query);
//         }, 1500);
//     }

//     addToSearchHistory(query) {
//         const history = JSON.parse(localStorage.getItem('searchHistory') || '[]');
//         if (!history.includes(query)) {
//             history.unshift(query);
//             if (history.length > 10) history.pop();
//             localStorage.setItem('searchHistory', JSON.stringify(history));
//         }
//     }

//     // Navigation functionality
//     handleNavigation(e) {
//         e.preventDefault();

//         const link = e.currentTarget;
//         const category = link.dataset.category;

//         // Remove active class from all links
//         document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));

//         // Add active class to clicked link
//         link.classList.add('active');

//         // Animate navigation
//         this.animateNavigation(link);

//         this.showNotification(`Browsing ${category.toUpperCase()} category...`, 'info');

//         // Simulate navigation
//         setTimeout(() => {
//             console.log(`Navigating to ${category} category`);
//         }, 800);
//     }

//     animateNavigation(link) {
//         link.style.transform = 'scale(0.95)';
//         link.style.opacity = '0.7';

//         setTimeout(() => {
//             link.style.transform = 'scale(1)';
//             link.style.opacity = '1';
//         }, 150);
//     }

//     // Cart functionality
//     updateCartDisplay() {
//         const cartCountElement = document.getElementById('cartCount');
//         if (cartCountElement) {
//             cartCountElement.textContent = this.state.cartCount;

//             if (this.state.cartCount > 0) {
//                 cartCountElement.classList.add('show');
//             } else {
//                 cartCountElement.classList.remove('show');
//             }
//         }
//     }

//     addToCart(productName = 'Product') {
//         this.state.cartCount++;
//         this.updateCartDisplay();

//         // Animate cart button
//         const cartBtn = document.getElementById('cartBtn');
//         if (cartBtn) {
//             cartBtn.style.transform = 'scale(1.2)';
//             cartBtn.style.color = 'var(--neutral-700)';

//             setTimeout(() => {
//                 cartBtn.style.transform = 'scale(1)';
//                 cartBtn.style.color = '';
//             }, 300);
//         }

//         this.showNotification(`${productName} added to cart! 🛍️`, 'success');

//         // Save to localStorage
//         localStorage.setItem('cartCount', this.state.cartCount.toString());
//     }

//     openCart() {
//         if (this.state.cartCount > 0) {
//             this.showNotification('Opening shopping cart...', 'info');
//             console.log('Opening cart with', this.state.cartCount, 'items');
//         } else {
//             this.showNotification('Your cart is empty', 'warning');
//         }
//     }

//     // Mobile menu functionality
//     toggleMobileMenu() {
//         const navMenu = document.getElementById('navMenu');
//         const mobileMenuToggle = document.getElementById('mobileMenuToggle');

//         if (navMenu && mobileMenuToggle) {
//             const isOpen = navMenu.classList.contains('mobile-open');

//             if (isOpen) {
//                 navMenu.classList.remove('mobile-open');
//                 mobileMenuToggle.classList.remove('active');
//             } else {
//                 navMenu.classList.add('mobile-open');
//                 mobileMenuToggle.classList.add('active');
//             }
//         }
//     }

//     // Main action functions
//     viewCollections() {
//         const button = document.querySelector('.cta-button.primary');
//         if (!button) return;

//         const originalHTML = button.innerHTML;

//         // Button animation
//         button.style.transform = 'scale(0.95)';
//         button.innerHTML = '<span>Loading...</span>';
//         button.style.opacity = '0.8';

//         this.showLoading(true);

//         setTimeout(() => {
//             button.style.transform = 'scale(1)';
//             button.innerHTML = originalHTML;
//             button.style.opacity = '1';
//             this.showLoading(false);
//             this.showNotification('Welcome to our new collections! ✨', 'success');
//         }, 1500);
//     }

//     openCustomDesign() {
//         this.showNotification('Opening custom design studio...', 'info');
//         setTimeout(() => {
//             this.showNotification('Custom design studio loaded! 🎨', 'success');
//         }, 1000);
//     }

//     shopNow() {
//         this.showLoading(true);
//         setTimeout(() => {
//             this.showLoading(false);
//             this.showNotification('Shop opened! Happy shopping! 🛒', 'success');
//         }, 1000);
//     }

//     openAdminPanel() {
//         this.showNotification('Redirecting to admin panel...', 'info');
//         setTimeout(() => {
//             window.open('#admin', '_blank');
//         }, 500);
//     }

//     openVisualSearch() {
//         this.showNotification('Visual search coming soon! 📷', 'info');
//     }

//     openCompare() {
//         this.showNotification('Product comparison opened! ⚖️', 'info');
//     }

//     openAccount() {
//         this.showNotification('Account page opened! 👤', 'info');
//     }

//     // Keyboard navigation
//     handleKeyboardNavigation(e) {
//         switch (e.key) {
//             case 'Escape':
//                 this.hideAllNotifications();
//                 this.hideSearchSuggestions();
//                 break;
//             case 'ArrowLeft':
//                 if (e.target === document.body) {
//                     this.previousSlide();
//                 }
//                 break;
//             case 'ArrowRight':
//                 if (e.target === document.body) {
//                     this.nextSlide();
//                 }
//                 break;
//             case ' ':
//                 if (e.target === document.body) {
//                     e.preventDefault();
//                     this.viewCollections();
//                 }
//                 break;
//             case '/':
//                 if (e.target === document.body) {
//                     e.preventDefault();
//                     document.getElementById('searchInput')?.focus();
//                 }
//                 break;
//         }
//     }

//     // Touch events for mobile swipe
//     setupTouchEvents() {
//         let touchStartX = 0;
//         let touchEndX = 0;

//         const hero = document.getElementById('hero');
//         if (!hero) return;

//         hero.addEventListener('touchstart', (e) => {
//             touchStartX = e.changedTouches[0].screenX;
//         });

//         hero.addEventListener('touchend', (e) => {
//             touchEndX = e.changedTouches[0].screenX;
//             this.handleSwipe();
//         });

//         const handleSwipe = () => {
//             const swipeThreshold = 50;
//             const diff = touchStartX - touchEndX;

//             if (Math.abs(diff) > swipeThreshold) {
//                 if (diff > 0) {
//                     this.nextSlide();
//                 } else {
//                     this.previousSlide();
//                 }
//             }
//         };

//         this.handleSwipe = handleSwipe;
//     }

//     // Scroll effects
//     setupScrollEffects() {
//         const header = document.getElementById('header');
//         if (!header) return;

//         let lastScrollY = window.scrollY;

//         this.handleScroll = () => {
//             const currentScrollY = window.scrollY;

//             if (currentScrollY > 100) {
//                 header.classList.add('scrolled');
//             } else {
//                 header.classList.remove('scrolled');
//             }

//             // Parallax effect
//             const heroImage = document.getElementById('heroBgImage');
//             if (heroImage && currentScrollY < window.innerHeight) {
//                 const parallaxSpeed = 0.5;
//                 heroImage.style.transform = `translateY(${currentScrollY * parallaxSpeed}px) scale(1.1)`;
//             }

//             lastScrollY = currentScrollY;
//         };
//     }

//     // Intersection Observer for animations
//     setupIntersectionObserver() {
//         const observer = new IntersectionObserver(
//             (entries) => {
//                 entries.forEach(entry => {
//                     if (entry.isIntersecting) {
//                         entry.target.classList.add('animate-in');
//                     }
//                 });
//             },
//             { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
//         );

//         // Observe elements for animation
//         document.querySelectorAll('.hero-stats, .promo-banner').forEach(el => {
//             observer.observe(el);
//         });
//     }

//     // Animate elements on load
//     animateElements() {
//         const heroLeft = document.querySelector('.hero-left');
//         if (heroLeft) {
//             heroLeft.style.animation = 'slideInUp 1s ease-out';
//         }
//     }

//     // Loading state
//     showLoading(show) {
//         this.state.isLoading = show;
//         const loadingOverlay = document.getElementById('loadingOverlay');
//         if (loadingOverlay) {
//             if (show) {
//                 loadingOverlay.classList.add('show');
//             } else {
//                 loadingOverlay.classList.remove('show');
//             }
//         }
//     }

//     // Notification system
//     showNotification(message, type = 'info') {
//         const notification = this.createNotificationElement(message, type);
//         const container = this.getNotificationContainer();

//         container.appendChild(notification);

//         // Animate in
//         requestAnimationFrame(() => {
//             notification.classList.add('show');
//         });

//         // Auto remove
//         setTimeout(() => {
//             this.removeNotification(notification);
//         }, 4000);
//     }

//     createNotificationElement(message, type) {
//         const notification = document.createElement('div');
//         notification.className = `notification ${type}`;

//         const icons = {
//             info: 'ℹ️',
//             success: '✅',
//             warning: '⚠️',
//             error: '❌'
//         };

//         notification.innerHTML = `
//             <div class="notification-icon">${icons[type] || icons.info}</div>
//             <div class="notification-content">
//                 <div class="notification-message">${message}</div>
//             </div>
//             <button class="notification-close" onclick="printcoApp.removeNotification(this.parentElement)">
//                 ×
//             </button>
//         `;

//         return notification;
//     }

//     getNotificationContainer() {
//         let container = document.getElementById('notificationContainer');
//         if (!container) {
//             container = document.createElement('div');
//             container.id = 'notificationContainer';
//             container.className = 'notification-container';
//             document.body.appendChild(container);
//         }
//         return container;
//     }

//     removeNotification(notification) {
//         if (notification && notification.parentNode) {
//             notification.classList.remove('show');
//             setTimeout(() => {
//                 if (notification.parentNode) {
//                     notification.parentNode.removeChild(notification);
//                 }
//             }, 300);
//         }
//     }

//     hideAllNotifications() {
//         const notifications = document.querySelectorAll('.notification');
//         notifications.forEach(notification => {
//             this.removeNotification(notification);
//         });
//     }

//     // Window resize handler
//     handleResize() {
//         // Responsive adjustments
//         const isMobile = window.innerWidth < 768;
//         const navMenu = document.getElementById('navMenu');

//         if (navMenu && !isMobile) {
//             navMenu.classList.remove('mobile-open');
//             const mobileMenuToggle = document.getElementById('mobileMenuToggle');
//             if (mobileMenuToggle) {
//                 mobileMenuToggle.classList.remove('active');
//             }
//         }
//     }

//     // Utility functions
//     throttle(func, limit) {
//         let inThrottle;
//         return function() {
//             const args = arguments;
//             const context = this;
//             if (!inThrottle) {
//                 func.apply(context, args);
//                 inThrottle = true;
//                 setTimeout(() => inThrottle = false, limit);
//             }
//         };
//     }

//     debounce(func, wait, immediate) {
//         let timeout;
//         return function() {
//             const context = this;
//             const args = arguments;
//             const later = function() {
//                 timeout = null;
//                 if (!immediate) func.apply(context, args);
//             };
//             const callNow = immediate && !timeout;
//             clearTimeout(timeout);
//             timeout = setTimeout(later, wait);
//             if (callNow) func.apply(context, args);
//         };
//     }

//     // Cleanup
//     destroy() {
//         if (this.slideInterval) {
//             clearInterval(this.slideInterval);
//         }
//         if (this.timerInterval) {
//             clearInterval(this.timerInterval);
//         }
//     }
// }

// // Global functions for onclick handlers
// function nextSlide() {
//     printcoApp.nextSlide();
// }

// function previousSlide() {
//     printcoApp.previousSlide();
// }

// function goToSlide(index) {
//     printcoApp.goToSlide(index);
// }

// function viewCollections() {
//     printcoApp.viewCollections();
// }

// function openCustomDesign() {
//     printcoApp.openCustomDesign();
// }

// function shopNow() {
//     printcoApp.shopNow();
// }

// function openAdminPanel() {
//     printcoApp.openAdminPanel();
// }

// function openVisualSearch() {
//     printcoApp.openVisualSearch();
// }

// function openCompare() {
//     printcoApp.openCompare();
// }

// function openAccount() {
//     printcoApp.openAccount();
// }

// function scrollProducts(direction) {
//     printcoApp.scrollProducts(direction);
// }

// function quickView(productName) {
//     printcoApp.quickView(productName);
// }

// function viewAllProducts() {
//     printcoApp.viewAllProducts();
// }

// // Initialize the application
// const printcoApp = new PrintcoApp();

// // Performance monitoring
// if ('web-vitals' in window) {
//     import('https://unpkg.com/web-vitals@3/dist/web-vitals.js').then(({ getCLS, getFID, getFCP, getLCP, getTTFB }) => {
//         getCLS(console.log);
//         getFID(console.log);
//         getFCP(console.log);
//         getLCP(console.log);
//         getTTFB(console.log);
//     });
// }

// // Service Worker registration for PWA capabilities
// if ('serviceWorker' in navigator) {
//     window.addEventListener('load', () => {
//         navigator.serviceWorker.register('/sw.js')
//             .then(registration => {
//                 console.log('SW registered: ', registration);
//             })
//             .catch(registrationError => {
//                 console.log('SW registration failed: ', registrationError);
//             });
//     });
// }


function browseCategory(categoryName) {
    window.location.href = `/products?category=${encodeURIComponent(categoryName)}`;
}

