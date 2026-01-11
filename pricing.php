<?php
$pageTitle = 'Pricing - HildrStudios';
$pageStyles = ['pricing-pages'];
$navSticky = true;
$footerType = 'services';

$inlineStyles = '
.services-overview { max-width: 1200px; margin: 0 auto; padding: 4rem 2rem; }
.services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; }
.service-overview-card { background: linear-gradient(145deg, #1a1a1a 0%, #0d0d0d 100%); border: 2px solid rgba(255, 255, 255, 0.1); border-radius: 16px; padding: 2.5rem; text-align: center; -webkit-transition: -webkit-transform 0.4s ease, border-color 0.4s ease, -webkit-box-shadow 0.4s ease; transition: transform 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease; text-decoration: none; color: white; display: block; position: relative; }
.service-overview-card:hover { -webkit-transform: translateY(-10px) scale(1.02); transform: translateY(-10px) scale(1.02); border-color: var(--card-color); -webkit-box-shadow: 0 0 20px var(--card-color), 0 0 40px color-mix(in srgb, var(--card-color) 50%, transparent), 0 0 60px color-mix(in srgb, var(--card-color) 25%, transparent), 0 20px 40px rgba(0, 0, 0, 0.4); box-shadow: 0 0 20px var(--card-color), 0 0 40px color-mix(in srgb, var(--card-color) 50%, transparent), 0 0 60px color-mix(in srgb, var(--card-color) 25%, transparent), 0 20px 40px rgba(0, 0, 0, 0.4); }
.service-icon { width: 80px; height: 80px; border-radius: 50%; background: var(--card-color); margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem; -webkit-transition: -webkit-box-shadow 0.4s ease; transition: box-shadow 0.4s ease; }
.service-overview-card:hover .service-icon { -webkit-box-shadow: 0 0 20px var(--card-color), 0 0 40px color-mix(in srgb, var(--card-color) 50%, transparent); box-shadow: 0 0 20px var(--card-color), 0 0 40px color-mix(in srgb, var(--card-color) 50%, transparent); }
.service-overview-card h3 { font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; -webkit-transition: text-shadow 0.4s ease; transition: text-shadow 0.4s ease; }
.service-overview-card:hover h3 { text-shadow: 0 0 10px var(--card-color); }
.service-overview-card p { color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; margin-bottom: 1.5rem; line-height: 1.6; }
.service-overview-card .starting-price { font-size: 0.85rem; color: rgba(255, 255, 255, 0.5); }
.service-overview-card .starting-price strong { color: var(--card-color); font-size: 1.1rem; -webkit-transition: text-shadow 0.4s ease; transition: text-shadow 0.4s ease; }
.service-overview-card:hover .starting-price strong { text-shadow: 0 0 10px var(--card-color); }
.view-pricing { display: inline-block; margin-top: 1rem; padding: 0.75rem 1.5rem; background: var(--card-color); color: white; border-radius: 8px; font-weight: 600; font-size: 0.9rem; -webkit-transition: opacity 0.3s ease, -webkit-box-shadow 0.4s ease; transition: opacity 0.3s ease, box-shadow 0.4s ease; }
.service-overview-card:hover .view-pricing { opacity: 0.9; -webkit-box-shadow: 0 0 15px var(--card-color); box-shadow: 0 0 15px var(--card-color); }
';

include 'includes/header.php';
?>
<body>
<?php include 'includes/nav.php'; ?>

<section class="pricing-hero">
    <h1>Our Services & Pricing</h1>
    <p>Choose the service that fits your needs. Transparent pricing, exceptional quality.</p>
</section>

<section class="services-overview">
    <div class="services-grid">
        <a href="/pricing-video-editing" class="service-overview-card" style="--card-color: #ff6b6b;">
            <div class="service-icon">🎬</div>
            <h3>Video Editing</h3>
            <p>Transform your raw footage into cinematic masterpieces with professional post-production.</p>
            <div class="starting-price">Starting at <strong>$499</strong>/project</div>
            <span class="view-pricing">View Plans</span>
        </a>
        
        <a href="/pricing-photo-editing" class="service-overview-card" style="--card-color: #4ecdc4;">
            <div class="service-icon">📸</div>
            <h3>Photo Editing</h3>
            <p>Elevate your images with professional retouching, color grading, and creative editing.</p>
            <div class="starting-price">Starting at <strong>$15</strong>/image</div>
            <span class="view-pricing">View Plans</span>
        </a>
        
        <a href="/pricing-web-development" class="service-overview-card" style="--card-color: #3b82f6;">
            <div class="service-icon">💻</div>
            <h3>Web Development</h3>
            <p>Custom websites and web applications built with cutting-edge technology.</p>
            <div class="starting-price">Starting at <strong>$999</strong>/project</div>
            <span class="view-pricing">View Plans</span>
        </a>
        
        <a href="/pricing-marketing" class="service-overview-card" style="--card-color: #10b981;">
            <div class="service-icon">📈</div>
            <h3>Marketing</h3>
            <p>Data-driven marketing strategies to amplify your brand and reach your audience.</p>
            <div class="starting-price">Starting at <strong>$799</strong>/month</div>
            <span class="view-pricing">View Plans</span>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="js/sticky-nav.js"></script>
</body>
</html>
