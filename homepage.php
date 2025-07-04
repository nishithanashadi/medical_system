<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Medical Prescription System - Home</title>
    <link rel="stylesheet" href="assets/home.css" />
</head>
<body>
    <header class="site-header">
        <div class="header-text">
        <h1>Medical Prescription Upload System</h1>
        <p>Simple, Ssecure & Fast Prescription Management</p>
         </div>
        <img src="assets/logo.jpg" alt="Logo" class="logo-img">
    </header>

    <nav>
        <a href="users/register.php">Register</a>
        <a href="index.php">Login</a>
        <a href="#company">Company</a>
        <a href="#contact">Contact</a>
        <a href="homepage.php">Home Page</a>

    </nav>

    <!-- Blurred Image with Welcome Text -->
    <section id="image-section">
        <div class="background-image"></div>
        <div id="welcome-text">
            <h2>Welcome to Our Platform</h2>
            <p>This system allows users to upload prescriptions and pharmacies to respond with quotations.<br>
            It's a fast and convenient way to get your medical needs handled online.</p>
        </div>
    </section>

    <!-- Services Section (optional, you can remove if not needed) -->
    <section id="services">
        <div class="services-header">
            <div class="services-subtitle">OUR SERVICES</div>
            <h2>What We Offer</h2>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">💊</div>
                <h3>Prescription Upload</h3>
                <p>Upload your prescriptions securely and easily through our platform.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">🏥</div>
                <h3>Pharmacy Quotations</h3>
                <p>Receive quotations from registered pharmacies based on your prescriptions.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">📦</div>
                <h3>Quick Response</h3>
                <p>Fast feedback and affordable options for your medical needs.</p>
            </div>
        </div>
    </section>

    <!-- Company Info and Contact -->
    <section id="info-section">
        <div class="info-box">
            <h2>About Our Company</h2>
            <p>We aim to simplify the way users interact with pharmacies using digital technology.</p>
            <p>Our platform ensures a safe, secure, and fast prescription handling experience.</p>
        </div>
        <div class="info-box">
            <h2> Contact Us</h2>
            <p>📧 Email: support@mediprescription.com</p>
            <p>☎  Phone: +94 77 123 4567</p>
            <p>📍  Location: Colombo, Sri Lanka</p>
        </div>
    </section>

    <footer>
        &copy; <?= date("Y") ?> Medical Prescription Upload System. All rights reserved.
    </footer>
</body>
</html>
