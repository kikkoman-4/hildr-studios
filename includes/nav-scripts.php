<?php
/**
 * Navigation scripts - mobile menu toggle
 */
?>
<script>
(function() {
    var toggle = document.getElementById('navbarToggle');
    var navLinks = document.getElementById('navbarLinks');
    var overlay = document.getElementById('navbarOverlay');
    
    if (!toggle || !navLinks || !overlay) {
        console.warn('Nav elements not found');
        return;
    }

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

    toggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if (navLinks.classList.contains('active')) {
            closeNav();
        } else {
            openNav();
        }
    });

    overlay.addEventListener('click', closeNav);
    
    navLinks.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', closeNav);
    });
})();
</script>
