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
            <!-- Instagram Feed Section -->
            <div class="footer-column footer-instagram">
                <h4>Follow Us <a href="https://www.instagram.com/hildrstudios/" target="_blank" rel="noopener">@hildrstudios</a></h4>
                <div class="instagram-feed">
                    <!-- 
                    OPTION 1: Third-party widget (recommended)
                    Sign up at elfsight.com, snapwidget.com, or curator.io
                    Connect your Instagram account and paste the embed code here.
                    Example: <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                            <div class="elfsight-app-YOUR-APP-ID"></div>
                    
                    OPTION 2: Instagram Basic Display API
                    Requires Meta developer app setup and token management.
                    See: https://developers.facebook.com/docs/instagram-basic-display-api
                    -->
                    <div class="instagram-placeholder">
                        <p>📸 Check out our latest work on Instagram!</p>
                        <a href="https://www.instagram.com/hildrstudios/" target="_blank" rel="noopener" class="instagram-cta">View Feed</a>
                    </div>
                </div>
            </div>
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
                    <li><a href="https://www.instagram.com/hildrstudios/">Instagram</a></li>
                    <li><a href="https://www.facebook.com/HildrStudios">Facebook</a></li>
                    <li><a href="#">YouTube</a></li>
                    <li><a href="#">LinkedIn</a></li>
                    <!-- <li><a href="#">Twitter</a></li> -->
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <hr>
        <p>&copy; <?= date('Y') ?> HildrStudios. All rights reserved.</p>
    </div>
</footer>
