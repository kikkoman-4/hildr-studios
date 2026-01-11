<?php
$pageTitle = 'Video Editing Pricing - HildrStudios';
$pageStyles = ['pricing-pages'];
$navSticky = true;
$footerType = 'services';

include 'includes/header.php';
include 'includes/pricing-card.php';
?>
<body>
<?php include 'includes/nav.php'; ?>

<?php renderPricingHero('Video Editing', 'Professional Post-Production', 
    'Transform your raw footage into cinematic masterpieces with our expert video editing services.', '#ff6b6b'); ?>



<div class="pricing-grid">
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
    'link' => 'project-inquiry?service=video-editing&plan=starter'
]);

renderPricingCard([
    'title' => 'Professional',
    'price' => '$899',
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
    'link' => 'project-inquiry?service=video-editing&plan=professional',
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
    'link' => 'project-inquiry?service=video-editing&plan=enterprise',
    'buttonText' => 'Contact Us'
]);
?>
</div>

<?php include 'includes/footer.php'; ?>
<script src="js/sticky-nav.js"></script>
</body>
</html>
