<?php
session_start();
include('../includes/db.php');

// 1. Get logged in user ID (assuming you saved it during login)
$user_id = $_SESSION['user_id'];

// 2. Get form values
$note = $_POST['note'];
$delivery_address = $_POST['delivery_address'];
$delivery_time = $_POST['delivery_time'];

// 3. Insert into prescriptions table
$sql = "INSERT INTO prescriptions (user_id, note, delivery_address, delivery_time) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $user_id, $note, $delivery_address, $delivery_time);
$stmt->execute();

// 4. Get last inserted prescription ID
$prescription_id = $stmt->insert_id;

// 5. Handle image uploads
$total_files = count($_FILES['images']['name']);

for ($i = 0; $i < $total_files; $i++) {
    $image_name = $_FILES['images']['name'][$i];
    $tmp_name = $_FILES['images']['tmp_name'][$i];

    // Save to uploads/ folder
    $target_path = "../uploads/" . basename($image_name);
    move_uploaded_file($tmp_name, $target_path);

    // Save image path in DB
    $sql_img = "INSERT INTO prescription_images (prescription_id, image_path) VALUES (?, ?)";
    $stmt_img = $conn->prepare($sql_img);
    $stmt_img->bind_param("is", $prescription_id, $image_name);
    $stmt_img->execute();
}

echo "Prescription uploaded successfully! <a href='../users/dashboard.php'>Go to Dashboard</a>";
$conn->close();
?>
