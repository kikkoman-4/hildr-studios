<?php
/**
 * Navigation component
 * 
 * Variables:
 * $navSticky - Whether nav should be sticky (default: false)
 * $showBackLink - Show back to home link (default: false)
 */

$navSticky = $navSticky ?? false;
$showBackLink = $showBackLink ?? false;
?>

<?php if ($showBackLink): ?>
<a href="index.php" class="back-link">← Back to Home</a>
<?php endif; ?>

<nav class="header<?= $navSticky ? ' sticky' : '' ?>">
    <div class="navbar-container">
        <a href="index.php" class="navbar-brand">
            <img src="Assets/HildrStudios_Logo_W.png" alt="HildrStudios">
        </a>
        <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle navigation" aria-expanded="false">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
        <ul class="navbar-links" id="navbarLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#services" class="smooth-scroll">Services</a></li>
            <li><a href="index.php#portfolio" class="smooth-scroll">Projects</a></li>
            <li><a href="pricing.php">Pricing</a></li>
        </ul>
    </div>
    <div class="navbar-overlay" id="navbarOverlay"></div>
</nav>
