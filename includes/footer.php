<?php
/**
 * Footer component
 * 
 * Variables:
 * $footerType - 'full' (with company links) or 'services' (services focused)
 */

$footerType = $footerType ?? 'full';
?>

<footer>
    <div class="footer-container">
        <div class="footer-brand">
            <img src="Assets/logo-title.png" alt="HildrStudios">
            <p>Precision in Every Cut.<br>Victory in Every Frame.</p>
        </div>
        <div class="footer-links">
            <?php if ($footerType === 'full'): ?>
            <div class="footer-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="index.php#services" class="smooth-scroll">Services</a></li>
                    <li><a href="index.php#portfolio" class="smooth-scroll">Projects</a></li>
                    <li><a href="pricing.php">Pricing</a></li>
                </ul>
            </div>
            <?php else: ?>
            <div class="footer-column">
                <h4>Services</h4>
                <ul>
                    <li><a href="pricing-video-editing.php">Video Editing</a></li>
                    <li><a href="pricing-photo-editing.php">Photo Editing</a></li>
                    <li><a href="pricing-web-development.php">Web Development</a></li>
                    <li><a href="pricing-marketing.php">Marketing</a></li>
                </ul>
            </div>
            <?php endif; ?>
            <div class="footer-column">
                <h4>Legal</h4>
                <ul>
                    <li><a href="legal.php#terms">Terms & Conditions</a></li>
                    <li><a href="legal.php#privacy">Privacy Policy</a></li>
                    <li><a href="legal.php#cookies">Cookie Policy</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Connect</h4>
                <ul>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">YouTube</a></li>
                    <li><a href="#">LinkedIn</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <hr>
        <p>&copy; <?= date('Y') ?> HildrStudios. All rights reserved.</p>
    </div>
</footer>
