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
    'description' => 'Best suited for brands that require quick results.',
    'features' => [
        '20  stills',
        '2 outputs per day',
        '3 active requests'
    ],
    'link' => 'project-inquiry?service=video-editing&plan=starter'
]);

renderPricingCard([
    'title' => 'Professional',
    'price' => '$899',
    'unit' => '/project',
    'description' => 'Perfect mix of stills and video for your brand.',
    'features' => [
        '25 ~ 30 content',
        '2 ~ 3 output per day',
        '5 active requests',
        'Stills and short form videos'
    ],
    'link' => 'project-inquiry?service=video-editing&plan=professional',
    'featured' => true
]);

renderPricingCard([
    'title' => 'Enterprise',
    'price' => 'Custom',
    'description' => 'For all of your production needs.',
    'features' => [
        'Stills',
        'Shortform video',
        'Longform video',
        'Customized Graphics',
        'Product Shoots',
        'Priority support 24/7',
        'Rush output available'
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
