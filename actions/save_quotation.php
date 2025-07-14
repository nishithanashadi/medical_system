<?php
session_start();
include('../includes/db.php');

// ✅ Ensure pharmacy is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'pharmacy') {
    header("Location: ../pharmacy/pharmacy_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prescription_id = $_POST['prescription_id'];
    $drugs = $_POST['drug'];
    $quantities = $_POST['quantity'];
    $unit_prices = $_POST['unit_price'];

    // Calculate total
    $total = 0;
    for ($i = 0; $i < count($drugs); $i++) {
        $total += $quantities[$i] * $unit_prices[$i];
    }

    // Insert into quotations
    $stmt = $conn->prepare("INSERT INTO quotations (prescription_id, total, status) VALUES (?, ?, 'pending')");
    $stmt->bind_param("id", $prescription_id, $total);
    $stmt->execute();
    $quotation_id = $stmt->insert_id;

    // Insert each drug
    $item_stmt = $conn->prepare("INSERT INTO quotation_items (quotation_id, drug, quantity, unit_price) VALUES (?, ?, ?, ?)");
    for ($i = 0; $i < count($drugs); $i++) {
        $item_stmt->bind_param("isid", $quotation_id, $drugs[$i], $quantities[$i], $unit_prices[$i]);
        $item_stmt->execute();
    }

    echo "<h3>✅ Quotation submitted successfully!</h3>";
    echo "<p><a href='../pharmacy/dashboard.php'>🔙 Back to Dashboard</a></p>";

} else {
    echo "Invalid request.";
}
?>
