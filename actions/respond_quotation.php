<?php
session_start();
include('../includes/db.php');

// ✅ Step 1: Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// ✅ Step 2: Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $quotation_id = $_POST['quotation_id'] ?? null;
    $response = $_POST['response'] ?? null;

    // ✅ Validate input
    if (!$quotation_id || !in_array($response, ['accepted', 'rejected'])) {
        echo "<p>⚠️ Invalid response. <a href='../users/dashboard.php'>Go back</a></p>";
        exit();
    }

    // ✅ Step 3: Update the quotation status
    $sql = "UPDATE quotations SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "❌ Database error: " . $conn->error;
        exit();
    }

    $stmt->bind_param("si", $response, $quotation_id);

    if ($stmt->execute()) {
        echo "<h3>✅ Quotation has been <strong>" . htmlspecialchars($response) . "</strong> successfully.</h3>";
        echo "<p><a href='../users/dashboard.php'>🔙 Return to Dashboard</a></p>";
    } else {
        echo "❌ Error updating quotation: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<p>⚠️ Invalid request method.</p>";
}

$conn->close();
?>
