<?php
$pageTitle = 'Marketing Pricing - HildrStudios';
$pageStyles = ['pricing-pages'];
$navSticky = true;
$footerType = 'services';

include 'includes/header.php';
include 'includes/pricing-card.php';
?>
<body>
<?php include 'includes/nav.php'; ?>

<?php renderPricingHero('Marketing', 'Strategic Brand Growth', 
    'Data-driven marketing strategies to amplify your brand and reach your target audience.', '#10b981'); ?>



<div class="pricing-grid" style="display: none;">
<?php
renderPricingCard([
    'title' => 'Starter',
    'price' => '$799',
    'unit' => '/month',
    'description' => 'Essential marketing for startups',
    'features' => [
        'Social media management (2 platforms)',
        '8 posts per month',
        'Basic analytics report',
        'Content calendar',
        'Monthly strategy call'
    ],
    'link' => 'project-inquiry.php?service=marketing&plan=starter'
]);

renderPricingCard([
    'title' => 'Growth',
    'price' => '$1,999',
    'unit' => '/month',
    'description' => 'Comprehensive marketing for scaling brands',
    'features' => [
        'Social media (4 platforms)',
        '20 posts per month',
        'Paid ad management',
        'Email marketing',
        'Detailed analytics',
        'Bi-weekly strategy calls'
    ],
    'link' => 'project-inquiry.php?service=marketing&plan=growth',
    'featured' => true
]);

renderPricingCard([
    'title' => 'Enterprise',
    'price' => 'Custom',
    'description' => 'Full-service marketing partnership',
    'features' => [
        'All platforms covered',
        'Unlimited content',
        'Influencer partnerships',
        'Brand strategy consulting',
        'Dedicated account manager',
        '24/7 support'
    ],
    'link' => 'project-inquiry.php?service=marketing&plan=enterprise',
    'buttonText' => 'Contact Us'
]);
?>
</div>

<?php include 'includes/footer.php'; ?>
<script src="js/sticky-nav.js"></script>
</body>
</html>
