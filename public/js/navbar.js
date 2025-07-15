// your code goes here
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const body = document.body;
    
    // Create overlay element
    const overlay = document.createElement('div');
    overlay.className = 'mobile-menu-overlay';
    overlay.id = 'mobileMenuOverlay';
    body.appendChild(overlay);
    
    // Toggle mobile menu
    function toggleMobileMenu() {
        const isActive = mobileMenu.classList.contains('active');
        
        if (isActive) {
            // Close menu
            mobileMenu.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            overlay.classList.remove('active');
            body.classList.remove('mobile-menu-open');
        } else {
            // Open menu
            mobileMenu.classList.add('active');
            mobileMenuToggle.classList.add('active');
            overlay.classList.add('active');
            body.classList.add('mobile-menu-open');
        }
    }
    
    // Event listeners
    mobileMenuToggle.addEventListener('click', toggleMobileMenu);
    overlay.addEventListener('click', toggleMobileMenu);
    
    // Handle dropdown in mobile menu
    const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');
    
    dropdownTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            
            const dropdownContent = this.nextElementSibling;
            const isActive = dropdownContent.classList.contains('active');
            
            // Close all other dropdowns
            dropdownTriggers.forEach(otherTrigger => {
                if (otherTrigger !== this) {
                    otherTrigger.classList.remove('active');
                    otherTrigger.nextElementSibling.classList.remove('active');
                }
            });
            
            // Toggle current dropdown
            if (isActive) {
                this.classList.remove('active');
                dropdownContent.classList.remove('active');
            } else {
                this.classList.add('active');
                dropdownContent.classList.add('active');
            }
        });
    });
    
    // Close mobile menu when clicking on nav links
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link:not(.dropdown-trigger)');
    
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Close menu after a short delay to allow for navigation
            setTimeout(() => {
                toggleMobileMenu();
            }, 100);
        });
    });
    
    // Close mobile menu on window resize if it's open
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && mobileMenu.classList.contains('active')) {
            toggleMobileMenu();
        }
    });
    
    // Handle escape key to close mobile menu
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
            toggleMobileMenu();
        }
    });
    
    // Smooth scroll for anchor links
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
    
    // Add scroll effect to header
    let lastScrollTop = 0;
    const header = document.querySelector('.header');
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            // Scrolling down
            header.style.transform = 'translateY(-100%)';
        } else {
            // Scrolling up
            header.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop;
    });
});