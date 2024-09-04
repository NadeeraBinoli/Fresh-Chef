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

// Prepare and execute query for rider details
$stmt = $conn->prepare("SELECT r_name, r_email, r_phone_no FROM r_rider WHERE rider_id = 1");
$stmt->execute();
$stmt->bind_result($r_name, $r_email, $r_phone_no);
$stmt->fetch();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Chef</title>
    <link rel="icon" type="image/png" href="A_IMG/favicon.png">
    <link rel="stylesheet" href="customer_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <header id="header">
        <div class="logo">
            <a href="landing.html"><img src="homeIMG/Logo.png" alt="Logo" class="logo"></a>
        </div>
        <div class="navlinks">
            <p><a href="landing.html">home</a></p>
            <p><a href="A_menu.php">menu</a></p>
            <p><a href="menu.html">catering</a></p>
            <p><a href="Delivary.html">delivery</a></p>
            <p><a href="about.html">about us</a></p>
            <p><a href="customer_profile.php">profile</a></p>
        </div>
        <div class="login">
            <i class="fa-solid fa-lock"></i>
            <p><a href="login.html">Login</a></p>
            <p>/</p>
            <p><a href="register.html">SignUp</a></p>
            <div class="darkMode">
                <input type="checkbox" class="checkbox" id="checkbox">
                <label for="checkbox" class="checkbox-label">
                  <i class="fa-solid fa-moon"></i>
                  <i class="fa-solid fa-sun"></i>
                  <span class="ball"></span>
                </label>
              </div>
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </header>

    <div class="customerProfile">
        <div class="headingsProfile">
            <h2>Hello <?php echo htmlspecialchars($r_name); ?>!</h2>
            <h1>Good Morning</h1>
        </div>
        <div class="buttonsIcon">
            <i class="bi bi-person-circle" onclick="openModal()"></i> <!-- This icon opens the pop-up -->
            <button onclick="window.location.href='logout.php'">Log Out</button>
        </div>
    </div>

    <div class="customerDetails">
        <div class="customerImg">
            <img src="aboutIMG/shopOwner.png" alt="">
        </div>
        <div class="detailedCus">
            <h3><?php echo htmlspecialchars($r_name); ?> <i class="fa-regular fa-bell"></i> </h3>
            <p><?php echo htmlspecialchars($r_email); ?></p>
            <p><?php echo htmlspecialchars($r_phone_no); ?></p>
            <button class="mainButton" onclick="openModal()">Update Profile</button> <!-- Button to open pop-up -->
        </div>
        <div class="vehicle_details">
            <h4 style="color: #fe724c;">Vehicle Details</h4>
            <p><span style="font-weight:600;" >Reg No: </span>SG XXX 0000</p>
            <p> <span style="font-weight:600;">Vehicle Type: </span> Motorbike</p>
        </div>
    </div>

    <!-- Pop-up modal for updating user details -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Update Profile</h2>
            <form action="update_profile.php" method="post">
                <input type="hidden" name="rider_id" value="<?php echo htmlspecialchars($rider_id); ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="r_name" value="<?php echo htmlspecialchars($r_name); ?>" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="r_email" value="<?php echo htmlspecialchars($r_email); ?>" required>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="r_phone_no" value="<?php echo htmlspecialchars($r_phone_no); ?>" required>
                <button class="mainButton" type="submit">Update</button>
            </form>
        </div>
    </div>

    <h2 class="mainH2">My Orders</h2>

    <div class="myOrders">
        <div class="orderCard">
            <h3 class="sideH3">Order Ready to deliver!</h3>
            <h3>Time Countdown</h3>
            <h3><span>00:00:00</span></h3>
            <h3>Please complete order after deliver!</h3>
            <button class="mainButton" type="submit">Update</button>
        </div>
        <div class="oderDetailsandHistory">
            <div class="oderDetails">
                <div class="oderDetail">
                    <h3 class="sideH3">Oder Details</h3>
                    <p>Order ID: <span>00008756</span></p>
                    <p>Order Status: <span>Payment Pending</span></p>
                    <p>Order Type: <span>Delivery</span></p>
                    <p>Order Date & Time: <span>21/4/2024 10:25</span></p>
                </div>
                <div class="seemoreButton">
                    <a href="">See More></a>
                </div>
            </div>
            <div class="oderHistory">
                <h3 class="sideH3">Oder History</h3>
                <div class="histry">
                    <p>000097655T</p>
                    <p>01/04/2024  06:27:21</p>
                </div>
                <div class="histry">
                    <p>000097655T</p>
                    <p>01/04/2024  06:27:21</p>
                </div>
                <div class="histry">
                    <p>000097655T</p>
                    <p>01/04/2024  06:27:21</p>
                </div>
                <div class="histry">
                    <p>000097655T</p>
                    <p>01/04/2024  06:27:21</p>
                </div>
                <a href="">See All></a>
            </div>
        </div>
    </div>

    <h2 class="mainH2">Order Tracking</h2>

    <div class="trackOrders">
        <div class="riderContact">
            <h3 class="sideH3">Contact Rider</h3>
            <div class="riderContactDetails">
                <div class="deliveryRider">
                    <p>Rider ID: <span>000097655T</span></p>
                    <p>Rider Name: <span>Saman</span></p>
                    <img src="image/MessageIcon.png" alt="">
                    <p><span>Text with your rider Easily</span></p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <p>4.9</p>
                    </div>
                </div>
                <div class="Map">
                    <img src="D_IMG/O_img2.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <h2 class="mainH2"> Help &amp; Support</h2>

    <div class="help">
        <div>
            <img src="image/Headphones icon.png" alt="">
            <h3>Help Center</h3>
        </div>
        <div>
            <img src="image/Vector.png" alt="">
            <h3>FAQ</h3>
        </div>
        <div>
            <img src="image/Global icon.png" alt="">
            <h3>Web</h3>
        </div>
        <div>
            <img src="image/WhatApp.png" alt="">
            <h3>Whatsapp</h3>
        </div>
    </div>

    <footer>
        <div class="main" id="footer">
            <div class="address">
                <img src="homeIMG/Logo.png" alt="logo">
                <p>No 12, MainStreet, <br>
                Kagalle (71000), <br>
                Sri Lanka</p>
            </div>
            <div class="links">
                <div class="navlinks">
                    <p><a href="landing.html">home</a></p>
                    <p><a href="A_menu.php">menu</a></p>
                    <p><a href="menu.html">catering</a></p>
                    <p><a href="Delivary.html">delivery</a></p>
                    <p><a href="about.html">about us</a></p>
                    <p><a href="customer_profile.php">profile</a></p>
                </div>
                <div class="sociallinks">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                </div>
                <div class="coppyRights">
                    <p>Policy privacy &nbsp; &nbsp; &nbsp; Copyright 2024. All rights reserved for Fresh Chef Catering</p>
                </div>
            </div>
            <div class="contact">
                <div class="contactp">
                    <div class="divp">
                        <p>Contact : </p>
                    </div>
                    <div class="Pnum">
                        <p>+(94) 35 2229 540</p>
                        <p>+(94) 76 2070 480</p>
                    </div>
                </div>
                <div class="email">
                    <p>hello@freshchef.com</p>
                </div>
                <div class="form">
                    <form action="" method="post">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" placeholder="Enter Your email">
                        <button type="submit"><img src="homeIMG/submit.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function openModal() {
            document.getElementById('updateModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('updateModal').style.display = 'none';
        }

        // Close the modal when clicking outside of it
        window.onclick = function(event) {
            var modal = document.getElementById('updateModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
