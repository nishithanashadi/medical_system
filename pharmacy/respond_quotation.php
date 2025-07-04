<?php
session_start();
include('../includes/db.php');

// ✅ Only allow logged-in pharmacies
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'pharmacy') {
    header("Location: ../pharmacy/pharmacy_login.php");
    exit();
}

// ✅ Get prescription_id from URL
if (!isset($_GET['prescription_id'])) {
    echo "Prescription ID is missing.";
    exit();
}

$prescription_id = $_GET['prescription_id'];

// ✅ Check if quotation already exists
$check = $conn->prepare("SELECT * FROM quotations WHERE prescription_id = ?");
$check->bind_param("i", $prescription_id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "Quotation already submitted.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Respond with Quotation</title>
    <link rel="stylesheet" href="../assets/quotation-style.css">
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
    <div class="background"></div>

<div class="quotation-container">
    <h2>Submit Quotation for Prescription #<?= htmlspecialchars($prescription_id) ?></h2>

    <form action="../actions/save_quotation.php" method="post">
        <input type="hidden" name="prescription_id" value="<?= $prescription_id ?>">

        <div id="drugs-container">
            <div class="drug-row">
                <input type="text" name="drug[]" placeholder="Drug Name" required>
                <input type="number" name="quantity[]" placeholder="Quantity" required min="1">
                <input type="number" step="0.01" name="unit_price[]" placeholder="Unit Price" required min="0">
            </div>
        </div>

        <button type="button" onclick="addDrug()">+ Add More</button>
        <br>
        <input type="submit" value="Submit Quotation">
    </form>

    <a href="dashboard.php">⬅ Back to Dashboard</a>
</div>

<script>
function addDrug() {
    const container = document.getElementById('drugs-container');
    const row = document.createElement('div');
    row.className = 'drug-row';
    row.innerHTML = `
        <input type="text" name="drug[]" placeholder="Drug Name" required>
        <input type="number" name="quantity[]" placeholder="Quantity" required min="1">
        <input type="number" step="0.01" name="unit_price[]" placeholder="Unit Price" required min="0">
    `;
    container.appendChild(row);
}
</script>
</main>
<footer>
     &copy; 2025 MediConnect Pvt Ltd. All rights reserved.
</footer>
</body>
</html>
