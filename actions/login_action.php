<?php
session_start();
include('../includes/db.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_type'] = $user['user_type'];

        if ($user['user_type'] === 'user') {
            header("Location: ../users/dashboard.php");
        } else {
            header("Location: ../pharmacy/dashboard.php");
        }
        exit();
    } else {
        echo "❌ Invalid password.";
    }
} else {
    echo "❌ Email not found.";
}

$conn->close();
?>
