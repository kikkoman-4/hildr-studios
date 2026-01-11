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
 *     'featured' => false
 * ]);
 */

function renderPricingCard($card) {
    $featured = $card['featured'] ?? false;
    $buttonText = $card['buttonText'] ?? 'Get Started';
    ?>
    <div class="pricing-card<?= $featured ? ' featured' : '' ?>">
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
