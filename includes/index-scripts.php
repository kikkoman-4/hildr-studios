<?php
/**
 * Index page specific scripts - preloader, carousels, portfolio modal
 */
?>
<script>
(function() {
    var preloader = document.getElementById('preloader');
    var progressBar = document.getElementById('preloaderProgress');
    var assets = {
        images: ['Assets/hero-bg.png', 'Assets/logo-title.png', 'Assets/HildrStudios_Logo_W.png'],
        videos: ['Assets/HildrAppleStyleAd-1080p-wMusic.webm'],
        external: [
            'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/slack/slack-original.svg',
            'https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg',
            'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg',
            'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apple/apple-original.svg',
            'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original-wordmark.svg'
        ]
    };
    var total = assets.images.length + assets.videos.length + assets.external.length;
    var loaded = 0;
    var finished = false;

    function update() {
        loaded++;
        progressBar.style.width = Math.round((loaded / total) * 100) + '%';
        if (loaded >= total) setTimeout(finish, 300);
    }

    function finish() {
        if (finished) return;
        finished = true;
        preloader.classList.add('loaded');
        document.body.classList.remove('loading');
        initCarousels();
    }

    function loadImg(src) {
        var img = new Image();
        img.onload = img.onerror = update;
        img.src = src;
    }

    function loadVideo(src) {
        var video = document.createElement('video');
        video.preload = 'auto';
        video.oncanplaythrough = video.onerror = update;
        setTimeout(update, 8000);
        video.src = src;
        video.load();
    }

    assets.images.forEach(loadImg);
    assets.external.forEach(loadImg);
    assets.videos.forEach(loadVideo);
    setTimeout(finish, 15000);
})();

function initCarousels() {
    new Splide('#collab-splide', {
        type: 'loop',
        drag: 'free',
        perPage: 5,
        gap: '2.5rem',
        pagination: false,
        arrows: false,
        autoScroll: { speed: 0.2, pauseOnHover: true, pauseOnFocus: false },
        breakpoints: {
            768: { perPage: 4, gap: '1.25rem' },
            480: { perPage: 3, gap: '0.75rem' }
        }
    }).mount(window.splide.Extensions);

    new Splide('#services-splide', {
        type: 'loop',
        drag: 'free',
        focus: 'center',
        perPage: 5,
        gap: '16px',
        pagination: false,
        arrows: false,
        autoScroll: { speed: 0.2, pauseOnHover: false, pauseOnFocus: true },
        breakpoints: {
            1400: { perPage: 4, gap: '14px' },
            1024: { perPage: 3, gap: '12px' },
            768: { perPage: 2, gap: '10px' },
            480: { perPage: 2, gap: '8px' }
        }
    }).mount(window.splide.Extensions);

    var hero = new Splide('#hero-carousel', {
        type: 'loop',
        direction: 'ttb',
        height: '100vh',
        perPage: 1,
        perMove: 1,
        autoplay: true,
        interval: 6000,
        speed: 1000,
        easing: 'cubic-bezier(0.25, 1, 0.5, 1)',
        pagination: true,
        arrows: false,
        pauseOnHover: false,
        pauseOnFocus: false,
        wheel: true,
        wheelSleep: 500,
        drag: true
    });

    hero.on('pagination:mounted', function(data) {
        data.list.classList.add('hero-pagination-list');
        data.items.forEach(function(item) {
            item.button.classList.add('hero-pagination-dot');
        });
    });

    hero.on('active', function(slide) {
        slide.slide.querySelectorAll('video').forEach(function(v) {
            v.currentTime = 0;
            v.play();
        });
    });

    hero.on('inactive', function(slide) {
        slide.slide.querySelectorAll('video').forEach(function(v) { v.pause(); });
    });

    hero.mount();

    // Get Started Button visibility
    var btn = document.getElementById('heroGetStarted');
    var heroSection = document.querySelector('.hero');
    
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                btn.classList.toggle('hidden', !entry.isIntersecting);
            });
        }, { threshold: 0.1 });
        observer.observe(heroSection);
    } else {
        btn.classList.remove('hidden');
    }

    // Smooth scroll
    document.querySelectorAll('.smooth-scroll').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    // Portfolio Modal
    initPortfolioModal();
}

function initPortfolioModal() {
    var modal = document.getElementById('postModal');
    var closeBtn = document.getElementById('postClose');
    var portfolioItems = document.querySelectorAll('.portfolio-item');
    
    var projects = [
        { title: 'Nike Campaign 2025', desc: 'A dynamic brand campaign showcasing athletic excellence through cinematic storytelling.', creator: 'Alex Chen', role: 'Lead Editor', date: 'December 2025' },
        { title: 'Apple Product Launch', desc: 'Sleek product reveal video with minimalist aesthetics and precise timing.', creator: 'Sarah Kim', role: 'Motion Designer', date: 'November 2025' },
        { title: 'Spotify Wrapped', desc: 'Vibrant year-end recap with bold colors and energetic transitions.', creator: 'Marcus Johnson', role: 'Colorist', date: 'October 2025' },
        { title: 'Google I/O Visuals', desc: 'Tech conference visuals featuring clean animations and modern design.', creator: 'Emma Davis', role: 'Sound Designer', date: 'September 2025' },
        { title: 'Tesla Cybertruck', desc: 'Futuristic automotive showcase with dramatic lighting and effects.', creator: 'James Wilson', role: 'VFX Artist', date: 'August 2025' },
        { title: 'Netflix Documentary', desc: 'Compelling documentary editing with emotional pacing and storytelling.', creator: 'Lisa Park', role: 'Senior Editor', date: 'July 2025' }
    ];

    portfolioItems.forEach(function(item) {
        item.addEventListener('click', function() {
            var idx = parseInt(this.dataset.project) - 1;
            var project = projects[idx];
            if (project) {
                modal.querySelector('.post-title').textContent = project.title;
                modal.querySelector('.post-description').textContent = project.desc;
                modal.querySelector('.credit-member').textContent = project.creator;
                modal.querySelector('.credit-role').textContent = project.role;
                modal.querySelector('.post-date').textContent = project.date;
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        });
    });

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
<?php include 'includes/nav-scripts.php'; ?>
