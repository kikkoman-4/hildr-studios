<?php
$pageTitle = 'Legal - HildrStudios';
$pageStyles = ['legal-pages'];
$navSticky = true;
$footerType = 'full';

include 'includes/header.php';
?>
<body>
<?php include 'includes/nav.php'; ?>

<section class="legal-hero">
    <h1>Legal Information</h1>
    <p>Last updated: <?= date('F Y') ?></p>
</section>

<nav class="legal-nav">
    <div class="legal-nav-container">
        <a href="#terms" class="active">Terms & Conditions</a>
        <a href="#privacy">Privacy Policy</a>
        <a href="#cookies">Cookie Policy</a>
    </div>
</nav>

<div class="legal-container">
    <!-- Terms & Conditions -->
    <section id="terms" class="legal-section">
        <h2>Terms & Conditions</h2>
        
        <h3>1. Agreement to Terms</h3>
        <p>By accessing and using HildrStudios' services, you agree to be bound by these Terms and Conditions. If you disagree with any part of these terms, you may not access our services.</p>

        <h3>2. Services</h3>
        <p>HildrStudios provides creative editing services including but not limited to:</p>
        <ul>
            <li>Video editing and post-production</li>
            <li>Photo editing and retouching</li>
            <li>Web development and design</li>
            <li>Marketing and brand strategy</li>
        </ul>

        <h3>3. Project Agreements</h3>
        <p>All projects are subject to a separate project agreement that outlines specific deliverables, timelines, and payment terms. The project agreement, along with these Terms, constitutes the entire agreement between you and HildrStudios.</p>

        <div class="legal-card">
            <h4>Payment Terms</h4>
            <p>Unless otherwise specified in your project agreement, a 50% deposit is required before work begins. The remaining balance is due upon project completion and before final deliverables are released.</p>
        </div>

        <h3>4. Intellectual Property</h3>
        <p>Upon full payment, clients receive full rights to the final deliverables. HildrStudios retains the right to display completed work in our portfolio unless otherwise agreed in writing.</p>

        <h3>5. Revisions</h3>
        <p>Each project includes a specified number of revision rounds as outlined in your project agreement. Additional revisions beyond the agreed scope may incur extra charges.</p>

        <h3>6. Cancellation</h3>
        <p>If you wish to cancel a project after work has begun, the deposit is non-refundable. Any additional work completed beyond the deposit amount will be billed accordingly.</p>

        <h3>7. Limitation of Liability</h3>
        <p>HildrStudios shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of our services.</p>
    </section>

    <!-- Privacy Policy -->
    <section id="privacy" class="legal-section">
        <h2>Privacy Policy</h2>

        <h3>1. Information We Collect</h3>
        <p>We collect information you provide directly to us, including:</p>
        <ul>
            <li>Name and contact information</li>
            <li>Project details and requirements</li>
            <li>Payment information</li>
            <li>Communications with our team</li>
        </ul>

        <h3>2. How We Use Your Information</h3>
        <p>We use the information we collect to:</p>
        <ul>
            <li>Provide, maintain, and improve our services</li>
            <li>Process transactions and send related information</li>
            <li>Communicate with you about projects, updates, and promotions</li>
            <li>Respond to your comments, questions, and requests</li>
        </ul>

        <h3>3. Information Sharing</h3>
        <p>We do not sell, trade, or otherwise transfer your personal information to third parties. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, as long as those parties agree to keep this information confidential.</p>

        <h3>4. Data Security</h3>
        <p>We implement appropriate security measures to protect your personal information. However, no method of transmission over the Internet or electronic storage is 100% secure.</p>

        <div class="legal-card">
            <h4>Your Rights</h4>
            <p>You have the right to access, correct, or delete your personal information. Contact us to exercise these rights or if you have any questions about how we handle your data.</p>
        </div>

        <h3>5. Data Retention</h3>
        <p>We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required by law.</p>
    </section>

    <!-- Cookie Policy -->
    <section id="cookies" class="legal-section">
        <h2>Cookie Policy</h2>

        <h3>1. What Are Cookies</h3>
        <p>Cookies are small text files that are stored on your device when you visit our website. They help us provide you with a better experience by remembering your preferences and understanding how you use our site.</p>

        <h3>2. Types of Cookies We Use</h3>
        
        <div class="legal-card">
            <h4>Essential Cookies</h4>
            <p>These cookies are necessary for the website to function properly. They enable basic functions like page navigation and access to secure areas of the website.</p>
        </div>

        <div class="legal-card">
            <h4>Analytics Cookies</h4>
            <p>We use analytics cookies to understand how visitors interact with our website. This helps us improve our site and services.</p>
        </div>

        <div class="legal-card">
            <h4>Preference Cookies</h4>
            <p>These cookies remember your preferences and settings to provide a more personalized experience on future visits.</p>
        </div>

        <h3>3. Managing Cookies</h3>
        <p>Most web browsers allow you to control cookies through their settings. You can set your browser to refuse cookies or delete certain cookies. However, if you disable cookies, some features of our website may not function properly.</p>

        <h3>4. Third-Party Cookies</h3>
        <p>Some cookies on our site are set by third-party services that appear on our pages. We do not control these cookies and recommend reviewing the privacy policies of these third parties.</p>
    </section>

    <div class="contact-info">
        <h4>Questions About Our Policies?</h4>
        <p>If you have any questions about our Terms, Privacy Policy, or Cookie Policy, please contact us:</p>
        <p><strong>Email:</strong> legal@hildrstudios.com</p>
        <p><strong>Location:</strong> Los Angeles, CA</p>
    </div>
</div>

<a href="index.php" class="back-link">← Back to Home</a>

<?php include 'includes/footer.php'; ?>

<script>
// Legal nav active state
(function() {
    var sections = document.querySelectorAll('.legal-section');
    var navLinks = document.querySelectorAll('.legal-nav a');

    function updateActiveNav() {
        var scrollPos = window.scrollY + 150;
        sections.forEach(function(section) {
            var top = section.offsetTop;
            var bottom = top + section.offsetHeight;
            var id = section.getAttribute('id');
            if (scrollPos >= top && scrollPos < bottom) {
                navLinks.forEach(function(link) {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + id) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', updateActiveNav);
    
    navLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    });
})();
</script>
<?php include 'includes/nav-scripts.php'; ?>
</body>
</html>
