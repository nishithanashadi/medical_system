<?php
session_start();
include('../includes/db.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ? AND user_type = 'pharmacy'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_type'] = 'pharmacy';
        header("Location: ../pharmacy/dashboard.php");
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Pharmacy account not found.";
}
?>
