<?php
/**
 * Pricing Card Component
 * 
 * Usage: 
 * renderPricingCard([
 *     'title' => 'Starter',
 *     'price' => '$499',
 *     'unit' => '/project',
 *     'description' => 'Perfect for...',
 *     'features' => ['Feature 1', 'Feature 2'],
 *     'link' => 'project-inquiry.php?service=video-editing&plan=starter',
 *     'buttonText' => 'Get Started',
 *     'featured' => false,
 *     'service' => 'video-editing'
 * ]);
 */

function renderPricingCard($card) {
    $featured = $card['featured'] ?? false;
    $buttonText = $card['buttonText'] ?? 'Get Started';
    $service = $card['service'] ?? '';
    
    // Auto-detect service from link if not provided
    if (empty($service) && isset($card['link'])) {
        if (strpos($card['link'], 'video-editing') !== false) $service = 'video-editing';
        elseif (strpos($card['link'], 'photo-editing') !== false) $service = 'photo-editing';
        elseif (strpos($card['link'], 'web-development') !== false) $service = 'web-development';
        elseif (strpos($card['link'], 'marketing') !== false) $service = 'marketing';
    }
    ?>
    <div class="pricing-card<?= $featured ? ' featured' : '' ?>"<?= $service ? ' data-service="' . htmlspecialchars($service) . '"' : '' ?>>
        <h3><?= htmlspecialchars($card['title']) ?></h3>
        <div class="price"><?= $card['price'] ?><?php if (isset($card['unit'])): ?><span><?= $card['unit'] ?></span><?php endif; ?></div>
        <p class="description"><?= htmlspecialchars($card['description']) ?></p>
        <ul>
            <?php foreach ($card['features'] as $feature): ?>
            <li><?= htmlspecialchars($feature) ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="<?= $card['link'] ?>" class="pricing-btn"><?= htmlspecialchars($buttonText) ?></a>
    </div>
    <?php
}

/**
 * Render pricing hero section
 */
function renderPricingHero($service, $title, $description, $color) {
    ?>
    <section class="pricing-hero" style="--service-color: <?= $color ?>;">
        <div class="service-badge"><?= htmlspecialchars($service) ?></div>
        <h1><?= htmlspecialchars($title) ?></h1>
        <p><?= htmlspecialchars($description) ?></p>
    </section>
    <?php
}
?>
