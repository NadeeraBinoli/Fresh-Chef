<?php
session_start();

if (!isset($_SESSION['C_id'])) {
    header("Location: login.html");
    exit();
}

// Database connection parameters
$servername = "localhost"; // Your database server
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "fresh_chef_caterings"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $C_id = $_POST['C_id'];
    $C_name = $_POST['C_name'];
    $C_address = $_POST['C_address'];
    $C_email = $_POST['C_email'];
    $C_P_number = $_POST['C_P_number'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE r_user SET C_name = ?, C_address = ?, C_email = ?, C_P_number = ? WHERE C_id = ?");
    $stmt->bind_param("ssssi", $C_name, $C_address, $C_email, $C_P_number, $C_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Profile updated successfully!'); window.location.href='customer_profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile: " . $stmt->error . "'); window.location.href='customer_profile.php';</script>";
    }

    // Close statement and connection
    $stmt->close();
}
$conn->close();
?>
