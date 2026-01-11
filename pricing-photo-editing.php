<?php
$pageTitle = 'Photo Editing Pricing - HildrStudios';
$pageStyles = ['pricing-pages'];
$showBackLink = true;
$footerType = 'services';

include 'includes/header.php';
include 'includes/pricing-card.php';
?>
<body>
<?php include 'includes/nav.php'; ?>

<?php renderPricingHero('Photo Editing', 'Stunning Visual Enhancement', 
    'Elevate your images with professional retouching, color grading, and creative editing.', '#4ecdc4'); ?>

<?php include 'includes/under-construction.php'; ?>

<div class="pricing-grid" style="display: none;">
<?php
renderPricingCard([
    'title' => 'Basic',
    'price' => '$15',
    'unit' => '/image',
    'description' => 'Essential edits for quick turnaround',
    'features' => [
        'Color correction',
        'Exposure adjustment',
        'Basic retouching',
        'Cropping & straightening',
        '48-hour delivery'
    ],
    'link' => 'project-inquiry.php?service=photo-editing&plan=basic'
]);

renderPricingCard([
    'title' => 'Professional',
    'price' => '$45',
    'unit' => '/image',
    'description' => 'Complete editing for stunning results',
    'features' => [
        'Advanced color grading',
        'Skin retouching & smoothing',
        'Background removal/replacement',
        'Object removal',
        '2 revision rounds',
        '24-hour delivery'
    ],
    'link' => 'project-inquiry.php?service=photo-editing&plan=professional',
    'featured' => true
]);

renderPricingCard([
    'title' => 'Premium',
    'price' => '$99',
    'unit' => '/image',
    'description' => 'High-end retouching for commercial use',
    'features' => [
        'Magazine-quality retouching',
        'Composite & manipulation',
        'Creative effects & styling',
        'Unlimited revisions',
        'Source files (PSD)',
        'Priority delivery'
    ],
    'link' => 'project-inquiry.php?service=photo-editing&plan=premium'
]);
?>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/nav-scripts.php'; ?>
</body>
</html>
