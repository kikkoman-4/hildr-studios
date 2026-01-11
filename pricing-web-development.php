<?php
$pageTitle = 'Web Development Pricing - HildrStudios';
$pageStyles = ['pricing-pages'];
$showBackLink = true;
$footerType = 'services';

include 'includes/header.php';
include 'includes/pricing-card.php';
?>
<body>
<?php include 'includes/nav.php'; ?>

<?php renderPricingHero('Web Development', 'Modern Web Solutions', 
    'Custom websites and web applications built with cutting-edge technology and stunning design.', '#3b82f6'); ?>

<?php include 'includes/under-construction.php'; ?>

<div class="pricing-grid" style="display: none;">
<?php
renderPricingCard([
    'title' => 'Landing Page',
    'price' => '$999',
    'unit' => '/project',
    'description' => 'Single page website for campaigns',
    'features' => [
        'Responsive design',
        'Up to 5 sections',
        'Contact form integration',
        'Basic SEO setup',
        '1 week delivery'
    ],
    'link' => 'project-inquiry.php?service=web-development&plan=landing-page'
]);

renderPricingCard([
    'title' => 'Business Website',
    'price' => '$3,499',
    'unit' => '/project',
    'description' => 'Complete website for growing businesses',
    'features' => [
        'Up to 10 pages',
        'Custom design',
        'CMS integration',
        'Advanced SEO',
        'Analytics setup',
        '2-3 weeks delivery'
    ],
    'link' => 'project-inquiry.php?service=web-development&plan=business',
    'featured' => true
]);

renderPricingCard([
    'title' => 'Custom Application',
    'price' => 'Custom',
    'description' => 'Full-stack web applications',
    'features' => [
        'Custom functionality',
        'Database integration',
        'User authentication',
        'API development',
        'Ongoing support',
        'Dedicated team'
    ],
    'link' => 'project-inquiry.php?service=web-development&plan=custom',
    'buttonText' => 'Contact Us'
]);
?>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/nav-scripts.php'; ?>
</body>
</html>
