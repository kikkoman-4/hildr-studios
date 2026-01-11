<?php
/**
 * Index page specific scripts - preloader, carousels, portfolio modal
 */
?>
<script>
(function() {
    'use strict';
    var preloader = document.getElementById('preloader');
    var progressBar = document.getElementById('preloaderProgress');
    var isMobile = window.innerWidth <= 768;
    
    // Reduced asset list for faster loading - skip video preload on mobile
    var assets = {
        images: ['Assets/hero-bg.png', 'Assets/logo-title.png', 'Assets/HildrStudios_Logo_W.png'],
        videos: isMobile ? [] : ['Assets/HildrAppleStyleAd-1080p-wMusic.webm'],
        external: isMobile ? [] : [
            'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/slack/slack-original.svg',
            'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg'
        ]
    };
    var total = assets.images.length + assets.videos.length + assets.external.length;
    var loaded = 0;
    var finished = false;
    
    // Faster timeout on mobile
    var maxWait = isMobile ? 5000 : 15000;

    function update() {
        loaded++;
        if (progressBar) {
            progressBar.style.width = Math.round((loaded / total) * 100) + '%';
        }
        if (loaded >= total) setTimeout(finish, isMobile ? 100 : 300);
    }

    function finish() {
        if (finished) return;
        finished = true;
        if (preloader) preloader.classList.add('loaded');
        document.body.classList.remove('loading');
        // Delay carousel init slightly for smoother transition
        setTimeout(initCarousels, 50);
    }

    function loadImg(src) {
        var img = new Image();
        img.onload = img.onerror = update;
        img.src = src;
    }

    function loadVideo(src) {
        var video = document.createElement('video');
        video.preload = 'metadata';
        video.onloadedmetadata = video.onerror = update;
        setTimeout(update, 5000); // Shorter timeout for video
        video.src = src;
    }

    var i;
    for (i = 0; i < assets.images.length; i++) loadImg(assets.images[i]);
    for (i = 0; i < assets.external.length; i++) loadImg(assets.external[i]);
    for (i = 0; i < assets.videos.length; i++) loadVideo(assets.videos[i]);
    
    // Faster fallback timeout
    setTimeout(finish, maxWait);
})();

function initCarousels() {
    'use strict';
    if (typeof Splide === 'undefined') {
        console.warn('Splide not loaded');
        return;
    }
    
    var isMobile = window.innerWidth <= 768;

    new Splide('#collab-splide', {
        type: 'loop',
        drag: 'free',
        perPage: isMobile ? 3 : 5,
        gap: isMobile ? '1rem' : '2.5rem',
        pagination: false,
        arrows: false,
        autoScroll: { 
            speed: isMobile ? 0.3 : 0.2, 
            pauseOnHover: !isMobile, 
            pauseOnFocus: false 
        },
        breakpoints: {
            768: { perPage: 4, gap: '1.25rem' },
            480: { perPage: 3, gap: '0.75rem' }
        }
    }).mount(window.splide ? window.splide.Extensions : {});

    new Splide('#services-splide', {
        type: 'loop',
        drag: 'free',
        focus: 'center',
        perPage: isMobile ? 2 : 5,
        gap: isMobile ? '10px' : '16px',
        pagination: false,
        arrows: false,
        autoScroll: { 
            speed: isMobile ? 0.3 : 0.2, 
            pauseOnHover: false, 
            pauseOnFocus: true 
        },
        breakpoints: {
            1400: { perPage: 4, gap: '14px' },
            1024: { perPage: 3, gap: '12px' },
            768: { perPage: 2, gap: '10px' },
            480: { perPage: 2, gap: '8px' }
        }
    }).mount(window.splide ? window.splide.Extensions : {});

    var hero = new Splide('#hero-carousel', {
        type: 'loop',
        direction: 'ttb',
        height: '100vh',
        perPage: 1,
        perMove: 1,
        autoplay: true,
        interval: isMobile ? 8000 : 6000, // Slower on mobile for less distraction
        speed: isMobile ? 600 : 1000,
        easing: 'cubic-bezier(0.25, 1, 0.5, 1)',
        pagination: true,
        arrows: false,
        pauseOnHover: false,
        pauseOnFocus: false,
        wheel: !isMobile, // Disable wheel on mobile
        wheelSleep: 500,
        drag: true
    });

    hero.on('pagination:mounted', function(data) {
        data.list.classList.add('hero-pagination-list');
        var items = data.items;
        for (var i = 0; i < items.length; i++) {
            items[i].button.classList.add('hero-pagination-dot');
        }
    });

    hero.on('active', function(slide) {
        var videos = slide.slide.querySelectorAll('video');
        for (var i = 0; i < videos.length; i++) {
            videos[i].currentTime = 0;
            videos[i].play().catch(function() {}); // Catch autoplay errors silently
        }
    });

    hero.on('inactive', function(slide) {
        var videos = slide.slide.querySelectorAll('video');
        for (var i = 0; i < videos.length; i++) {
            videos[i].pause();
        }
    });

    hero.mount();

    // Get Started Button visibility
    var btn = document.getElementById('heroGetStarted');
    var heroSection = document.querySelector('.hero');
    
    if ('IntersectionObserver' in window && btn && heroSection) {
        var observer = new IntersectionObserver(function(entries) {
            for (var i = 0; i < entries.length; i++) {
                btn.classList.toggle('hidden', !entries[i].isIntersecting);
            }
        }, { threshold: 0.1 });
        observer.observe(heroSection);
    } else if (btn) {
        btn.classList.remove('hidden');
    }

    // Smooth scroll with fallback
    var smoothLinks = document.querySelectorAll('.smooth-scroll');
    for (var i = 0; i < smoothLinks.length; i++) {
        smoothLinks[i].addEventListener('click', function(e) {
            e.preventDefault();
            var target = document.querySelector(this.getAttribute('href'));
            if (target) {
                if ('scrollBehavior' in document.documentElement.style) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    var targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
                    window.scrollTo(0, targetPosition);
                }
            }
        });
    }

    // Portfolio Modal
    initPortfolioModal();
}

function initPortfolioModal() {
    'use strict';
    var modal = document.getElementById('postModal');
    var closeBtn = document.getElementById('postClose');
    var portfolioItems = document.querySelectorAll('.portfolio-item');
    
    if (!modal || !closeBtn) return;
    
    var projects = [
        { title: 'Project Title', desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', creator: 'Creator Name', role: 'Role Title', date: 'Month Year' },
        { title: 'Project Title', desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', creator: 'Creator Name', role: 'Role Title', date: 'Month Year' },
        { title: 'Project Title', desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', creator: 'Creator Name', role: 'Role Title', date: 'Month Year' },
        { title: 'Project Title', desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', creator: 'Creator Name', role: 'Role Title', date: 'Month Year' },
        { title: 'Project Title', desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', creator: 'Creator Name', role: 'Role Title', date: 'Month Year' },
        { title: 'Project Title', desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', creator: 'Creator Name', role: 'Role Title', date: 'Month Year' }
    ];

    for (var i = 0; i < portfolioItems.length; i++) {
        portfolioItems[i].addEventListener('click', function() {
            var idx = parseInt(this.getAttribute('data-project'), 10) - 1;
            var project = projects[idx];
            if (project) {
                var titleEl = modal.querySelector('.post-title');
                var descEl = modal.querySelector('.post-description');
                var memberEl = modal.querySelector('.credit-member');
                var roleEl = modal.querySelector('.credit-role');
                var dateEl = modal.querySelector('.post-date');
                
                if (titleEl) titleEl.textContent = project.title;
                if (descEl) descEl.textContent = project.desc;
                if (memberEl) memberEl.textContent = project.creator;
                if (roleEl) roleEl.textContent = project.role;
                if (dateEl) dateEl.textContent = project.date;
                
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        });
    }

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
        if (e.target === modal) closeModal();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });
}
</script>
