<?php
session_start();

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
$stmt = $conn->prepare("SELECT C_id, C_Password FROM r_user WHERE C_email = ?");
$stmt->bind_param("s", $email);

// Set parameters and execute
$email = $_POST['email'];
$password = $_POST['password'];

$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($C_id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['C_id'] = $C_id;
        $_SESSION['user_name'] = $user['C_name'];
        echo "<script>
        alert('Login successful! Redirecting to the Home page...');
        window.location.href = 'landing.html';
      </script>";
        exit();
    } else {
        echo "Invalid email or password.";
    }
} else {
    // Check if the email and password match the cashier credentials
    $cashier_email = 'cashier1@gmail.com';
    $cashier_password = '1111';

    if ($email == $cashier_email && $password == $cashier_password) {
        // Query the cashier table to validate credentials
        $cashier_stmt = $conn->prepare("SELECT cashier_id, cashier_username FROM cashier WHERE cashier_email = ? AND cashier_password = ?");
        $cashier_stmt->bind_param("ss", $email, $password);
        
        $cashier_stmt->execute();
        $cashier_stmt->store_result();
        
        if ($cashier_stmt->num_rows > 0) {
            $cashier_stmt->bind_result($cashier_id, $cashier_username);
            $cashier_stmt->fetch();

            $_SESSION['cashier_id'] = $cashier_id;
            $_SESSION['cashier_name'] = $cashier_username;
            echo "<script>
            alert('Login successful! Redirecting to the Restaurant page...');
            window.location.href = 'resturent_profile_dash.php';
          </script>";
            exit();
        } else {
            echo "Invalid cashier email or password.";
        }

        $cashier_stmt->close();
    } else {
        // Check if the email and password match the manager credentials
        $manager_email = 'manager1@gmail.com';
        $manager_password = '1111';

        if ($email == $manager_email && $password == $manager_password) {
            // Query the manager table to validate credentials
            $manager_stmt = $conn->prepare("SELECT manager_id, M_username FROM manager WHERE Manager_email = ? AND M_password = ?");
            $manager_stmt->bind_param("ss", $email, $password);
            
            $manager_stmt->execute();
            $manager_stmt->store_result();
            
            if ($manager_stmt->num_rows > 0) {
                $manager_stmt->bind_result($manager_id, $manager_username);
                $manager_stmt->fetch();

                $_SESSION['manager_id'] = $manager_id;
                $_SESSION['manager_name'] = $manager_username;
                echo "<script>
                alert('Login successful! Redirecting to the Admin page...');
                window.location.href = 'Admin_dashboard.php';
              </script>";
                exit();
            } else {
                echo "Invalid manager email or password.";
            }

            $manager_stmt->close();
        } else {
            // Check if the email and password match the rider credentials
            $rider_email = 'Rider1@gmail.com';
            $rider_password = '1111';

            if ($email == $rider_email && $password == $rider_password) {
                // Query the rider table to validate credentials
                $rider_stmt = $conn->prepare("SELECT r_email FROM r_rider WHERE r_email = ? AND rider_password = ?");
                $rider_stmt->bind_param("ss", $email, $password);
                
                $rider_stmt->execute();
                $rider_stmt->store_result();
                
                if ($rider_stmt->num_rows > 0) {
                    $rider_stmt->bind_result($r_email);
                    $rider_stmt->fetch();

                    $_SESSION['rider_email'] = $r_email;
                    echo "<script>
                    alert('Login successful! Redirecting to the Rider page...');
                    window.location.href = 'Delivery_Rider_profile.php';
                  </script>";
                    exit();
                } else {
                    echo "Invalid rider email or password.";
                }

                $rider_stmt->close();
            } else {
                echo "Invalid email or password.";
            }
        }
    }
}

$stmt->close();
$conn->close();
?>
