<?php
include('../includes/db.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$address = $_POST['address'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$user_type = $_POST['user_type'];

$sql = "INSERT INTO users (name, email, password, address, contact, dob, user_type) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $name, $email, $password, $address, $contact, $dob, $user_type);

if ($stmt->execute()) {
    echo "Registration successful. <a href='../index.php'>Login here</a>";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
