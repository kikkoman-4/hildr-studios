<?php
/**
 * Navigation scripts - mobile menu toggle
 * Include at the end of pages that use the nav
 */
?>
<script>
(function() {
    var toggle = document.getElementById('navbarToggle');
    var navLinks = document.getElementById('navbarLinks');
    var overlay = document.getElementById('navbarOverlay');
    
    if (!toggle || !navLinks || !overlay) return;

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
            toggle.classList.add('active');
            toggle.setAttribute('aria-expanded', 'true');
            navLinks.classList.add('active');
            overlay.classList.add('active');
            document.body.classList.add('nav-open');
        }
    });

    overlay.addEventListener('click', closeNav);
    navLinks.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', closeNav);
    });

    // Smooth scroll for navigation links
    document.querySelectorAll('.smooth-scroll').forEach(function(link) {
        link.addEventListener('click', function(e) {
            var targetId = this.getAttribute('href');
            if (targetId.indexOf('#') !== -1 && !targetId.startsWith('index.php')) {
                e.preventDefault();
                var target = document.querySelector(targetId.split('#')[1] ? '#' + targetId.split('#')[1] : targetId);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });
})();
</script>
