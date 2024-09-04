<?php
$servername = "localhost";  // Your database server
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "fresh_chef_caterings"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO r_user (C_name, C_address, C_email, C_P_number, C_Password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $fullname, $address, $email, $phone, $hashed_password);

// Set parameters and execute
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Check if passwords match
if ($password !== $confirm_password) {
    echo "<script>
    alert('Passwords do not match. Please try again.');
    window.history.back();
  </script>";
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT); // Encrypt the password

if ($stmt->execute()) {
    echo "<script>
    alert('Account creation successful! Redirecting to the login page...');
    window.location.href = 'login.html';
  </script>";
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
