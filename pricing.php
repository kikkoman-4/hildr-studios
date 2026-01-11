<?php
$pageTitle = 'Pricing - HildrStudios';
$pageStyles = ['pricing-pages'];
$showBackLink = true;
$footerType = 'services';

$inlineStyles = '
.services-overview { max-width: 1200px; margin: 0 auto; padding: 4rem 2rem; }
.services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; }
.service-overview-card { background: linear-gradient(145deg, #1a1a1a 0%, #0d0d0d 100%); border: 2px solid rgba(255, 255, 255, 0.1); border-radius: 16px; padding: 2.5rem; text-align: center; transition: transform 0.3s ease, border-color 0.3s ease; text-decoration: none; color: white; display: block; }
.service-overview-card:hover { transform: translateY(-10px); border-color: var(--card-color); }
.service-icon { width: 80px; height: 80px; border-radius: 50%; background: var(--card-color); margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem; }
.service-overview-card h3 { font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; }
.service-overview-card p { color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; margin-bottom: 1.5rem; line-height: 1.6; }
.service-overview-card .starting-price { font-size: 0.85rem; color: rgba(255, 255, 255, 0.5); }
.service-overview-card .starting-price strong { color: var(--card-color); font-size: 1.1rem; }
.view-pricing { display: inline-block; margin-top: 1rem; padding: 0.75rem 1.5rem; background: var(--card-color); color: white; border-radius: 8px; font-weight: 600; font-size: 0.9rem; transition: opacity 0.3s ease; }
.service-overview-card:hover .view-pricing { opacity: 0.9; }
';

include 'includes/header.php';
?>
<body>
<?php include 'includes/nav.php'; ?>

<section class="pricing-hero">
    <h1>Our Services & Pricing</h1>
    <p>Choose the service that fits your needs. Transparent pricing, exceptional quality.</p>
</section>

<div class="services-overview">
    <div class="services-grid">
        <?php
        $services = [
            ['href' => 'pricing-video-editing.php', 'color' => '#ff6b6b', 'icon' => '🎬', 'title' => 'Video Editing', 'desc' => 'Professional post-production services including color grading, sound design, and motion graphics.', 'price' => '$499', 'unit' => '/project'],
            ['href' => 'pricing-photo-editing.php', 'color' => '#4ecdc4', 'icon' => '📸', 'title' => 'Photo Editing', 'desc' => 'Stunning visual enhancement with professional retouching, color correction, and creative editing.', 'price' => '$15', 'unit' => '/image'],
            ['href' => 'pricing-web-development.php', 'color' => '#3b82f6', 'icon' => '💻', 'title' => 'Web Development', 'desc' => 'Custom websites and web applications built with cutting-edge technology and stunning design.', 'price' => '$999', 'unit' => '/project'],
            ['href' => 'pricing-marketing.php', 'color' => '#10b981', 'icon' => '📈', 'title' => 'Marketing', 'desc' => 'Data-driven marketing strategies to amplify your brand and reach your target audience.', 'price' => '$799', 'unit' => '/month']
        ];
        
        foreach ($services as $s): ?>
        <a href="<?= $s['href'] ?>" class="service-overview-card" style="--card-color: <?= $s['color'] ?>;">
            <div class="service-icon"><?= $s['icon'] ?></div>
            <h3><?= $s['title'] ?></h3>
            <p><?= $s['desc'] ?></p>
            <div class="starting-price">Starting at <strong><?= $s['price'] ?></strong><?= $s['unit'] ?></div>
            <span class="view-pricing">View Plans →</span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/nav-scripts.php'; ?>
</body>
</html>
