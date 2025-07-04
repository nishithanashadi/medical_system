<?php
session_start();
include('../includes/db.php');

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
    <link rel="stylesheet" href="../assets/Prescriptionsdashboard.css?v=<?php echo time(); ?>">

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
        <div class="dashboard-header">
            <h2>Welcome, User!</h2>
            <h3>Your Prescriptions</h3>
            <div class="action-buttons">
                <a href="../homepage.php" class="logout-btn">Logout</a>
                <a href="upload_prescription.php" class="add-btn">+ Add New Prescription</a>
            </div>
        </div>
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
    </main>
    <footer>
            &copy; 2025 MediConnect Pvt Ltd. All rights reserved.
    </footer>
</body>
</html>
