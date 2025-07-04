<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Prescription</title>
    <link rel="stylesheet" href="../assets/upload_prescription.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <h1>Medical Prescription Upload System</h1>
        <p>Simple, Secure & Fast Prescription Management</p>
    </header>

    <nav>
        <a href="../users/register.php">Register</a>
        <a href="../index.php">Login</a>
        <a href="#company">Company</a>
        <a href="#contact">Contact</a>
        <a href="../homepage.php">Home Page</a>
    </nav>
    </main>
        <form action="../actions/upload_prescription_action.php" method="POST" enctype="multipart/form-data">
            <label>Note:</label>
            <textarea name="note" required></textarea>

            <label>Delivery Address:</label>
            <input type="text" name="delivery_address" required>

            <label>Delivery Time:</label>
            <select name="delivery_time" required>
                <option value="8am - 10am">8am - 10am</option>
                <option value="10am - 12pm">10am - 12pm</option>
                <option value="12pm - 2pm">12pm - 2pm</option>
                <option value="2pm - 4pm">2pm - 4pm</option>
            </select>

            <label>Upload up to 5 images:</label>
            <input type="file" name="images[]" multiple accept="image/*" required>

            <input type="submit" value="Upload Prescription">
        </form>
        </main>
        <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>

    <footer>
        &copy; 2025 MediConnect Pvt Ltd. All rights reserved.
    </footer>

</body>
</html>
