<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'pharmacy') {
    header("Location: ../index.php");
    exit();
}
echo "<h2>Welcome, Pharmacy!</h2>";
?>
