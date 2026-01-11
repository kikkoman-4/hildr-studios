(function() {
    'use strict';
    
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    function init() {
        initStickyNav();
        initMobileNav();
    }
    
    function initStickyNav() {
        var nav = document.querySelector('.header');
        var heroSection = document.querySelector('.hero');
        
        if (!nav) return;

        if ('IntersectionObserver' in window && heroSection) {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        nav.classList.remove('visible');
                    } else {
                        nav.classList.add('visible');
                    }
                });
            }, {
                threshold: 0,
                rootMargin: '-50px 0px 0px 0px'
            });
            observer.observe(heroSection);
        } else if (!heroSection) {
            nav.classList.add('visible');
        } else {
            nav.classList.add('visible');
            window.addEventListener('scroll', function() {
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                var heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
                if (scrollTop > heroBottom - 50) {
                    nav.classList.add('visible');
                } else {
                    nav.classList.remove('visible');
                }
            }, { passive: true });
        }
    }
    
    function initMobileNav() {
        var toggle = document.getElementById('navbarToggle');
        var navLinks = document.getElementById('navbarLinks');
        var overlay = document.getElementById('navbarOverlay');
        
        if (!toggle || !navLinks || !overlay) {
            return;
        }
        
        // Prevent duplicate initialization
        if (toggle.hasAttribute('data-nav-init')) {
            return;
        }
        toggle.setAttribute('data-nav-init', 'true');

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

        function toggleNav(e) {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            if (navLinks.classList.contains('active')) {
                closeNav();
            } else {
                openNav();
            }
        }

        // Use both click and touchend for better mobile support
        toggle.addEventListener('click', toggleNav);
        
        overlay.addEventListener('click', function(e) {
            e.preventDefault();
            closeNav();
        });

        // Close menu when clicking nav links
        var links = navLinks.querySelectorAll('a');
        for (var i = 0; i < links.length; i++) {
            links[i].addEventListener('click', function() {
                closeNav();
            });
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && navLinks.classList.contains('active')) {
                closeNav();
            }
        });

        // Close on resize to desktop
        var resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 768 && navLinks.classList.contains('active')) {
                    closeNav();
                }
            }, 100);
        });
    }
})();