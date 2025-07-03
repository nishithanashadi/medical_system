<?php
session_start();
include('../includes/db.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css"> <!-- Optional -->
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .prescription-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 10px;
            background: #f9f9f9;
        }
        img {
            max-width: 100px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <h2>Welcome, User!</h2>
    <a href="../logout.php">Logout</a>

    <h3>Your Prescriptions</h3>

    <?php
    $sql = "SELECT * FROM prescriptions WHERE user_id = ? ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='prescription-box'>";
        echo "<p><strong>Note:</strong> " . htmlspecialchars($row['note']) . "</p>";
        echo "<p><strong>Delivery Address:</strong> " . htmlspecialchars($row['delivery_address']) . "</p>";
        echo "<p><strong>Delivery Time:</strong> " . htmlspecialchars($row['delivery_time']) . "</p>";
        echo "<p><strong>Uploaded On:</strong> " . $row['created_at'] . "</p>";

        // Show images
        $pres_id = $row['id'];
        $img_sql = "SELECT * FROM prescription_images WHERE prescription_id = ?";
        $img_stmt = $conn->prepare($img_sql);
        $img_stmt->bind_param("i", $pres_id);
        $img_stmt->execute();
        $img_res = $img_stmt->get_result();

        echo "<p><strong>Images:</strong><br>";
        while ($img = $img_res->fetch_assoc()) {
            echo "<img src='../uploads/" . $img['image_path'] . "' alt='Prescription Image'>";
        }
        echo "</p>";

        // Show quotation if available
        $quo_sql = "SELECT * FROM quotations WHERE prescription_id = ?";
        $quo_stmt = $conn->prepare($quo_sql);
        $quo_stmt->bind_param("i", $pres_id);
        $quo_stmt->execute();
        $quo_res = $quo_stmt->get_result();

        if ($quo = $quo_res->fetch_assoc()) {
            echo "<p><strong>Quotation Status:</strong> " . $quo['status'] . "</p>";
            echo "<p><strong>Total:</strong> Rs. " . $quo['total'] . "</p>";
            echo "<a href='view_quotation.php?id=" . $quo['id'] . "'>View Quotation</a>";
        } else {
            echo "<p><em>No quotation available yet.</em></p>";
        }

        echo "</div>";
    }

    $conn->close();
    ?>

</body>
</html>
