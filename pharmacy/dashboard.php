<?php
session_start();
include('../includes/db.php');

// ✅ Only allow pharmacy users
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'pharmacy') {
    header("Location: ../pharmacy/pharmacy_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmacy Dashboard</title>
    <link rel="stylesheet" href="../assets/pharmacy-style.css">
</head>
<body>
    
<header class="site-header">
        <div class="header-text">
        <h1>Medical Prescription Upload System</h1>
        <p>Simple, Ssecure & Fast Prescription Management</p>
         </div>
        <img src="../assets/logo.jpg" alt="Logo" class="logo-img">
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
    <div class="container">
        <header>
            <h1>Pharmacy Dashboard</h1>
            <a href="../homepage.php" class="logout-btn">Logout</a>
        </header>

        <section>
            <h2>All Prescriptions</h2>

            <?php
            $sql = "SELECT * FROM prescriptions ORDER BY created_at DESC";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<div class='prescription-box'>";
                echo "<div class='info'>";
                echo "<p><strong>Note:</strong> " . htmlspecialchars($row['note']) . "</p>";
                echo "<p><strong>Delivery Address:</strong> " . htmlspecialchars($row['delivery_address']) . "</p>";
                echo "<p><strong>Delivery Time:</strong> " . htmlspecialchars($row['delivery_time']) . "</p>";
                echo "<p><strong>Uploaded On:</strong> " . $row['created_at'] . "</p>";
                echo "</div>";

                // ✅ Show images
                $pres_id = $row['id'];
                $img_sql = "SELECT * FROM prescription_images WHERE prescription_id = ?";
                $img_stmt = $conn->prepare($img_sql);
                $img_stmt->bind_param("i", $pres_id);
                $img_stmt->execute();
                $img_res = $img_stmt->get_result();

                echo "<div class='image-container'>";
                while ($img = $img_res->fetch_assoc()) {
                    echo "<img src='../uploads/" . $img['image_path'] . "' alt='Prescription Image'>";
                }
                echo "</div>";

                // ✅ Quotation Status
                $quo_sql = "SELECT * FROM quotations WHERE prescription_id = ?";
                $quo_stmt = $conn->prepare($quo_sql);
                $quo_stmt->bind_param("i", $pres_id);
                $quo_stmt->execute();
                $quo_res = $quo_stmt->get_result();

                echo "<div class='quote'>";
                if ($quo = $quo_res->fetch_assoc()) {
                    echo "<p><strong>Quotation Status:</strong> <span class='status {$quo['status']}'>{$quo['status']}</span></p>";
                    echo "<p><strong>Total:</strong> Rs. " . number_format($quo['total'], 2) . "</p>";
                } else {
                    echo "<a href='respond_quotation.php?prescription_id=" . $pres_id . "' class='quote-btn'>Respond with Quotation</a>";
                }
                echo "</div>";

                echo "</div>";
            }

            $conn->close();
            ?>
        </section>
    </div>
    </main>
<footer>
     &copy; 2025 MediConnect Pvt Ltd. All rights reserved.
</footer>
</body>
</html>
