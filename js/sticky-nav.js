var nav = document.querySelector('.header');
var heroSection = document.querySelector('.hero');

// Use Intersection Observer to show/hide navbar based on hero visibility
if ('IntersectionObserver' in window && heroSection) {
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                // Hero is visible - hide navbar
                nav.classList.remove('visible');
            } else {
                // Hero is not visible (scrolled past) - show navbar
                nav.classList.add('visible');
            }
        });
    }, {
        threshold: 0,
        rootMargin: '-50px 0px 0px 0px'
    });

    observer.observe(heroSection);
} else if (!heroSection) {
    // No hero section (other pages) - always show navbar
    nav.classList.add('visible');
}

// Mobile Navigation Toggle
(function() {
    var toggle = document.getElementById('navbarToggle');
    var navLinks = document.getElementById('navbarLinks');
    var overlay = document.getElementById('navbarOverlay');
    
    if (!toggle || !navLinks || !overlay) return;

    function openNav() {
        toggle.classList.add('active');
        toggle.setAttribute('aria-expanded', 'true');
        navLinks.classList.add('active');
        overlay.classList.add('active');
        document.body.classList.add('nav-open');
    }

    function closeNav() {
        toggle.classList.remove('active');
        toggle.setAttribute('aria-expanded', 'false');
        navLinks.classList.remove('active');
        overlay.classList.remove('active');
        document.body.classList.remove('nav-open');
    }

    toggle.addEventListener('click', function() {
        if (navLinks.classList.contains('active')) {
            closeNav();
        } else {
            openNav();
        }
    });

    overlay.addEventListener('click', closeNav);

    // Close menu when clicking a nav link
    navLinks.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', closeNav);
    });

    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && navLinks.classList.contains('active')) {
            closeNav();
        }
    });

    // Close menu on resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && navLinks.classList.contains('active')) {
            closeNav();
        }
    });
})();