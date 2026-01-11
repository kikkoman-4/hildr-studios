<?php
$pageTitle = 'HildrStudios';
$pageStyles = ['splide'];
// Only preload critical above-the-fold assets
$preloadAssets = [
    ['href' => 'Assets/hero-bg.png'],
    ['href' => 'Assets/logo-title.png']
];
$inlineStyles = '
.preloader { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #0a0a0a; display: flex; flex-direction: column; justify-content: center; align-items: center; z-index: 99999; transition: opacity 0.5s ease, visibility 0.5s ease; }
.preloader.loaded { opacity: 0; visibility: hidden; pointer-events: none; }
.preloader-logo { width: 150px; margin-bottom: 30px; opacity: 0.9; }
.preloader-bar { width: 200px; height: 3px; background: rgba(255, 255, 255, 0.1); border-radius: 3px; overflow: hidden; }
.preloader-progress { height: 100%; width: 0%; background: linear-gradient(90deg, #a855f7, #3b82f6); border-radius: 3px; transition: width 0.3s ease; }
.preloader-text { margin-top: 15px; color: rgba(255, 255, 255, 0.5); font-size: 12px; font-family: system-ui, -apple-system, sans-serif; letter-spacing: 2px; text-transform: uppercase; }
body.loading { overflow: hidden; }
';
$footerType = 'full';

include 'includes/header.php';
?>
<body class="loading">
    <div class="preloader" id="preloader">
        <img src="Assets/logo-title.png" alt="HildrStudios" class="preloader-logo">
        <div class="preloader-bar">
            <div class="preloader-progress" id="preloaderProgress"></div>
        </div>
        <p class="preloader-text">Loading</p>
    </div>

    <section class="hero">
        <div id="hero-carousel" class="splide hero-carousel">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="hero-slide hero-slide--video">
                            <video class="hero-media-bg" autoplay muted loop playsinline preload="metadata">
                                <source src="Assets/HildrAppleStyleAd-1080p-wMusic.webm" type="video/webm">
                            </video>
                            <video class="hero-media hero-media-main" autoplay muted loop playsinline preload="metadata" poster="Assets/hero-bg.png">
                                <source src="Assets/HildrAppleStyleAd-1080p-wMusic.webm" type="video/webm">
                            </video>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="hero-slide hero-slide--image">
                            <img class="hero-media" src="Assets/hero-bg.png" alt="Product Showcase 1" fetchpriority="high">
                            <div class="hero-overlay"></div>
                            <?php include 'includes/film-tape.php'; ?>
                            <div class="hero-slide-content">
                                <h1>VICTORY<br>IN EVERY FRAME</h1>
                                <p>Professional Video Editing Services</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="hero-slide hero-slide--image hero-slide--polaroids">
                            <img class="hero-media" src="Assets/hero-bg.png" alt="Product Showcase 2" loading="lazy">
                            <div class="hero-overlay"></div>
                            <div class="polaroid-container">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                <div class="polaroid polaroid-<?= $i ?>">
                                    <div class="polaroid-inner">
                                        <div class="polaroid-image"></div>
                                        <div class="polaroid-caption"></div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            </div>
                            <div class="hero-slide-content">
                                <h1>CREATIVE<br>EXCELLENCE</h1>
                                <p>Bringing Your Vision to Life</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="hero-slide hero-slide--image">
                            <img class="hero-media" src="Assets/hero-bg.png" alt="Product Showcase 3" loading="lazy">
                            <div class="hero-overlay"></div>
                            <div class="hero-slide-content">
                                <h1>ELEVATE<br>YOUR BRAND</h1>
                                <p>Stand Out From The Crowd</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="hero-pagination"></div>
        </div>
        <header class="hero-header fade-in fade-in-1">
            <img src="Assets/logo-title.png" alt="HildrStudios">
        </header>
    </section>

    <a href="#collaborators" class="hero-get-started" id="heroGetStarted" onclick="event.preventDefault(); document.getElementById('collaborators').scrollIntoView({behavior: 'smooth'}); history.replaceState(null, null, '/');">
        <span>Get Started</span>
    </a>

    <section id="collaborators" class="collaborators">
        <p class="collab-title">COLLABORATED WITH</p>
        <div id="collab-splide" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    $collabs = [
                        ['brand' => 'slack', 'src' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/slack/slack-original.svg', 'alt' => 'Slack'],
                        ['brand' => 'nike', 'src' => 'https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg', 'alt' => 'Nike'],
                        ['brand' => 'google', 'src' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg', 'alt' => 'Google'],
                        ['brand' => 'apple', 'src' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apple/apple-original.svg', 'alt' => 'Apple'],
                        ['brand' => 'aws', 'src' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original-wordmark.svg', 'alt' => 'Amazon']
                    ];
                    foreach ($collabs as $c): ?>
                    <li class="splide__slide" data-brand="<?= $c['brand'] ?>"><img src="<?= $c['src'] ?>" alt="<?= $c['alt'] ?>" loading="lazy" decoding="async" width="100" height="28"></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <nav class="header">
        <div class="navbar-container">
            <a href="#" class="navbar-brand">
                <img src="Assets/HildrStudios_Logo_W.png" alt="HildrStudios">
            </a>
            <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle navigation" aria-expanded="false">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
            <ul class="navbar-links" id="navbarLinks">
                <li><a href="/">Home</a></li>
                <li><a href="#services" class="smooth-scroll">Services</a></li>
                <li><a href="#portfolio" class="smooth-scroll">Projects</a></li>
                <li><a href="/pricing">Pricing</a></li>
            </ul>
        </div>
        <div class="navbar-overlay" id="navbarOverlay"></div>
    </nav>

    <section class="info">
        <div class="info-container">
            <div class="info-title">
                <span class="welcome">Welcome to</span>
                <h2>HildrStudios</h2>
            </div>
            <div class="info-description">
                <p><strong>HildrStudios</strong> is a creative editing studio that works with creators and brands to craft high-impact, visually compelling content. We specialize in video editing and post-production that elevates storytelling and strengthens digital presence. By combining clean aesthetics with strategic intent, we help our partners stand out and connect with their audience across platforms.</p>
            </div>
        </div>
    </section>

    <section class="services" id="services">
        <h3 class="services-title">Our Services</h3>
        <div id="services-splide" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    $services = [
                        ['href' => '/pricing-video-editing', 'color' => '#ff6b6b', 'title' => 'Video Editing', 'desc' => 'Professional post-production'],
                        ['href' => '/pricing-photo-editing', 'color' => '#4ecdc4', 'title' => 'Photo Editing', 'desc' => 'Stunning visual enhancement'],
                        ['href' => '/pricing-web-development', 'color' => '#3b82f6', 'title' => 'Web Development', 'desc' => 'Modern web solutions'],
                        ['href' => '/pricing-marketing', 'color' => '#10b981', 'title' => 'Marketing', 'desc' => 'Strategic brand growth']
                    ];
                    foreach ($services as $s): ?>
                    <li class="splide__slide">
                        <a href="<?= $s['href'] ?>" class="service-card-link">
                            <div class="service-card" style="--card-color: <?= $s['color'] ?>;">
                                <div class="card-content">
                                    <h4><?= $s['title'] ?></h4>
                                    <p><?= $s['desc'] ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="portfolio" id="portfolio">
        <h3 class="portfolio-title">Our Work</h3>
        <div class="portfolio-grid">
            <?php for ($i = 1; $i <= 6; $i++): ?>
            <div class="portfolio-item" data-project="<?= $i ?>">
                <div class="portfolio-thumb">
                    <div class="portfolio-overlay">
                        <span class="portfolio-icon"><?= $i % 2 === 1 ? '▶' : '◻' ?></span>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </section>

    <?php include 'includes/portfolio-modal.php'; ?>
    <?php include 'includes/footer.php'; ?>

    <script src="js/sticky-nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js" defer></script>
    <?php include 'includes/index-scripts.php'; ?>
</body>
</html>
