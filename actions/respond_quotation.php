<?php
session_start();
include('../includes/db.php');

// Step 1: Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Step 2: Validate POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quotation_id']) && isset($_POST['response'])) {
    $quotation_id = $_POST['quotation_id'];
    $response = $_POST['response'];

    // Only allow accepted or rejected
    if ($response !== 'accepted' && $response !== 'rejected') {
        echo "Invalid response.";
        exit();
    }

    // Step 3: Update quotation status
    $update_sql = "UPDATE quotations SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $response, $quotation_id);

    if ($stmt->execute()) {
        echo "Quotation has been " . $response . " successfully.<br>";
        echo "<a href='../users/dashboard.php'>Return to Dashboard</a>";
    } else {
        echo "Error updating quotation: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
