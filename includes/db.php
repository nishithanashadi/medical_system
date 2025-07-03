<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "medical_system"; // or your actual database name
$port = 3307;  // <-- custom port

$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
