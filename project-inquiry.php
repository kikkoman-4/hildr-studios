<?php
$pageTitle = 'Project Inquiry - HildrStudios';
$pageStyles = ['pricing-pages'];
$navSticky = true;
$footerType = 'services';

include 'includes/header.php';

// Service data for form
$serviceNames = [
    'video-editing' => 'Video Editing',
    'photo-editing' => 'Photo Editing',
    'web-development' => 'Web Development',
    'marketing' => 'Marketing'
];

$selectedService = isset($_GET['service']) ? htmlspecialchars($_GET['service']) : '';
$selectedPlan = isset($_GET['plan']) ? htmlspecialchars($_GET['plan']) : '';
?>
<body>
<?php include 'includes/nav.php'; ?>

<section class="inquiry-hero">
    <h1>Start Your Project</h1>
    <p>Tell us about your vision and we'll bring it to life</p>
</section>

<div class="inquiry-container">
    <form class="inquiry-form" id="inquiryForm">
        <?php if ($selectedService): ?>
        <div class="selected-info" id="selectedInfo">
            <p>Selected Service: <strong id="selectedService"><?= $serviceNames[$selectedService] ?? $selectedService ?></strong></p>
            <p>Selected Plan: <strong id="selectedPlan"><?= ucwords(str_replace('-', ' ', $selectedPlan)) ?: 'Not specified' ?></strong></p>
        </div>
        <?php endif; ?>

        <div class="form-row">
            <div class="form-group">
                <label for="firstName">First Name *</label>
                <input type="text" id="firstName" name="firstName" required placeholder="John">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name *</label>
                <input type="text" id="lastName" name="lastName" required placeholder="Doe">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" required placeholder="john@example.com">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="+1 (555) 123-4567">
        </div>

        <div class="form-group">
            <label for="company">Company / Brand Name</label>
            <input type="text" id="company" name="company" placeholder="Your Company">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="service">Service Type *</label>
                <select id="service" name="service" required>
                    <option value="">Select a service</option>
                    <?php foreach ($serviceNames as $value => $label): ?>
                    <option value="<?= $value ?>"<?= $selectedService === $value ? ' selected' : '' ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="budget">Estimated Budget</label>
                <select id="budget" name="budget">
                    <option value="">Select budget range</option>
                    <option value="under-500">Under $500</option>
                    <option value="500-1000">$500 - $1,000</option>
                    <option value="1000-3000">$1,000 - $3,000</option>
                    <option value="3000-5000">$3,000 - $5,000</option>
                    <option value="5000-10000">$5,000 - $10,000</option>
                    <option value="over-10000">Over $10,000</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="timeline">Project Timeline</label>
            <select id="timeline" name="timeline">
                <option value="">Select timeline</option>
                <option value="asap">ASAP / Rush</option>
                <option value="1-week">Within 1 week</option>
                <option value="2-weeks">Within 2 weeks</option>
                <option value="1-month">Within 1 month</option>
                <option value="flexible">Flexible</option>
            </select>
        </div>

        <div class="form-group">
            <label for="projectDetails">Project Details *</label>
            <textarea id="projectDetails" name="projectDetails" required 
                placeholder="Please describe your project in detail. Include information about:
• What you're looking to create
• Your target audience
• Any specific requirements or preferences
• Reference examples (if any)
• Deliverable formats needed"></textarea>
        </div>

        <div class="form-group">
            <label for="referenceLinks">Reference Links (optional)</label>
            <textarea id="referenceLinks" name="referenceLinks" style="min-height: 80px;"
                placeholder="Share any links to examples, inspiration, or existing content"></textarea>
        </div>

        <button type="submit" class="submit-btn" id="submitBtn">Submit Inquiry</button>
        <div class="form-message" id="formMessage"></div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<script>
// Initialize EmailJS - Replace with your actual public key
emailjs.init({ publicKey: "YOUR_PUBLIC_KEY" });

const serviceLabels = {
    'video-editing': '[VIDEO EDITING]',
    'photo-editing': '[PHOTO EDITING]',
    'web-development': '[WEB DEVELOPMENT]',
    'marketing': '[MARKETING]'
};

const serviceNames = <?= json_encode($serviceNames) ?>;

document.getElementById('inquiryForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submitBtn');
    const formMessage = document.getElementById('formMessage');
    
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
    formMessage.style.display = 'none';

    const service = document.getElementById('service').value;
    
    const templateParams = {
        subject_label: serviceLabels[service] || '[INQUIRY]',
        service_type: serviceNames[service] || service,
        selected_plan: '<?= $selectedPlan ?>' || 'Not specified',
        first_name: document.getElementById('firstName').value,
        last_name: document.getElementById('lastName').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value || 'Not provided',
        company: document.getElementById('company').value || 'Not provided',
        budget: document.getElementById('budget').value || 'Not specified',
        timeline: document.getElementById('timeline').value || 'Not specified',
        project_details: document.getElementById('projectDetails').value,
        reference_links: document.getElementById('referenceLinks').value || 'None provided'
    };

    try {
        await emailjs.send('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', templateParams);
        formMessage.className = 'form-message success';
        formMessage.textContent = 'Thank you! Your inquiry has been submitted successfully. We\'ll get back to you within 24-48 hours.';
        formMessage.style.display = 'block';
        this.reset();
    } catch (error) {
        console.error('EmailJS Error:', error);
        formMessage.className = 'form-message error';
        formMessage.textContent = 'Oops! Something went wrong. Please try again or contact us directly at contact@hildrstudios.com';
        formMessage.style.display = 'block';
    }

    submitBtn.disabled = false;
    submitBtn.textContent = 'Submit Inquiry';
});
</script>
<script src="js/sticky-nav.js"></script>
</body>
</html>
