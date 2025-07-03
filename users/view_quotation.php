<?php
session_start();
include('../includes/db.php');

// Step 1: Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Step 2: Get prescription_id from URL
if (!isset($_GET['prescription_id'])) {
    echo "Prescription ID not provided.";
    exit();
}

$prescription_id = $_GET['prescription_id'];

// Step 3: Fetch quotation for the prescription
$quotation_sql = "SELECT * FROM quotations WHERE prescription_id = ?";
$stmt = $conn->prepare($quotation_sql);
$stmt->bind_param("i", $prescription_id);
$stmt->execute();
$quotation_result = $stmt->get_result();

if ($quotation_result->num_rows == 0) {
    echo "No quotation found for this prescription.";
    exit();
}

$quotation = $quotation_result->fetch_assoc();

// Step 4: Fetch all drugs in the quotation
$quotation_id = $quotation['id'];
$items_sql = "SELECT * FROM quotation_items WHERE quotation_id = ?";
$items_stmt = $conn->prepare($items_sql);
$items_stmt->bind_param("i", $quotation_id);
$items_stmt->execute();
$items_result = $items_stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Quotation</title>
    <link rel="stylesheet" href="../assets/style.css"> <!-- Optional: for styling -->
</head>
<body>
    <h2>Quotation Details</h2>
    <p><strong>Total Amount:</strong> Rs. <?= number_format($quotation['total'], 2) ?></p>
    <p><strong>Status:</strong> <?= ucfirst($quotation['status']) ?></p>

    <h3>Drug List</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Drug</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Subtotal</th>
        </tr>
        <?php while ($item = $items_result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($item['drug']) ?></td>
            <td><?= $item['quantity'] ?></td>
            <td>Rs. <?= number_format($item['unit_price'], 2) ?></td>
            <td>Rs. <?= number_format($item['quantity'] * $item['unit_price'], 2) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <?php if ($quotation['status'] == 'pending'): ?>
        <form action="../actions/respond_quotation.php" method="post">
            <input type="hidden" name="quotation_id" value="<?= $quotation_id ?>">
            <button type="submit" name="response" value="accepted">Accept</button>
            <button type="submit" name="response" value="rejected">Reject</button>
        </form>
    <?php else: ?>
        <p><strong>This quotation has been <?= $quotation['status'] ?>.</strong></p>
    <?php endif; ?>

    <br><a href="dashboard.php">⬅ Back to Dashboard</a>
</body>
</html>
