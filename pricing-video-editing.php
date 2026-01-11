<?php
$pageTitle = 'Video Editing Pricing - HildrStudios';
$pageStyles = ['pricing-pages'];
$showBackLink = true;
$footerType = 'services';

include 'includes/header.php';
include 'includes/pricing-card.php';
?>
<body>
<?php include 'includes/nav.php'; ?>

<?php renderPricingHero('Video Editing', 'Professional Post-Production', 
    'Transform your raw footage into cinematic masterpieces with our expert video editing services.', '#ff6b6b'); ?>

<?php include 'includes/under-construction.php'; ?>

<div class="pricing-grid" style="display: none;">
<?php
renderPricingCard([
    'title' => 'Starter',
    'price' => '$499',
    'unit' => '/project',
    'description' => 'Perfect for content creators and short-form videos',
    'features' => [
        'Up to 3 minutes final video',
        '2 revision rounds',
        'Basic color correction',
        'Stock music included',
        '5 business day delivery'
    ],
    'link' => 'project-inquiry.php?service=video-editing&plan=starter'
]);

renderPricingCard([
    'title' => 'Professional',
    'price' => '$1,299',
    'unit' => '/project',
    'description' => 'Ideal for brands and businesses',
    'features' => [
        'Up to 10 minutes final video',
        'Unlimited revisions',
        'Advanced color grading',
        'Custom sound design',
        'Motion graphics included',
        '3 business day delivery'
    ],
    'link' => 'project-inquiry.php?service=video-editing&plan=professional',
    'featured' => true
]);

renderPricingCard([
    'title' => 'Enterprise',
    'price' => 'Custom',
    'description' => 'For large-scale productions and agencies',
    'features' => [
        'Unlimited video length',
        'Dedicated project manager',
        'Priority support 24/7',
        'Full post-production suite',
        'Source files included',
        'Rush delivery available'
    ],
    'link' => 'project-inquiry.php?service=video-editing&plan=enterprise',
    'buttonText' => 'Contact Us'
]);
?>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/nav-scripts.php'; ?>
</body>
</html>
