

<?php
session_start();

if (!isset($_SESSION['C_id'])) {
    header("Location: login.html");
    exit();
}

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

$C_id = $_SESSION['C_id'];

// Prepare and execute query for customer details
$stmt = $conn->prepare("SELECT C_name, C_address, C_email, C_P_number FROM r_user WHERE C_id = ?");
$stmt->bind_param("i", $C_id);
$stmt->execute();
$stmt->bind_result($C_name, $C_address, $C_email, $C_P_number);
$stmt->fetch();
$stmt->close();

// Prepare and execute query for the most recent customer order
$order_stmt = $conn->prepare("SELECT O_id, O_stetus, O_date, order_description, price, Payment_Status FROM r_order WHERE customer_id = ? ORDER BY O_date DESC LIMIT 1");
$order_stmt->bind_param("i", $C_id);
$order_stmt->execute();
$order_stmt->bind_result($O_id, $O_stetus, $O_date, $order_description, $price, $Payment_Status);
$order_stmt->fetch();
$order_stmt->close();

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
            <h2>Hello <?php echo $C_name; ?>!</h2>
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
            <h3><?php echo $C_name; ?> <i class="fa-regular fa-bell"></i> </h3>
            <p><?php echo $C_email; ?></p>
            <p><?php echo $C_P_number; ?></p>
            <button class="mainButton" onclick="openModal()">Update Profile</button> <!-- Button to open pop-up -->
        </div>
        <div class="detailedIcon">
            <i class="fa-regular fa-heart"></i>
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </div>

    <!-- Pop-up modal for updating user details -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Update Profile</h2>
            <form action="update_profile.php" method="post">
                <input type="hidden" name="C_id" value="<?php echo $C_id; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="C_name" value="<?php echo $C_name; ?>" required>
                <label for="address">Address:</label>
                <input type="text" id="address" name="C_address" value="<?php echo $C_address; ?>" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="C_email" value="<?php echo $C_email; ?>" required>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="C_P_number" value="<?php echo $C_P_number; ?>" required>
                <button class="mainButton" type="submit">Update</button>
            </form>
        </div>
    </div>

    <section class="paymentDetails">
        <div class="secPartA">
            <h2>Payment Details</h2>
        
            <form action="" method="post">
                <label for="payType1"><i class="fa-brands fa-apple-pay"></i></label>
                <input type="radio" name="payType" id="payType1" value="applePay">
                <label for="payType2"><i class="fa-brands fa-paypal"></i></label>
                <input type="radio" name="payType" id="payType2" value="paypal">
                <label for="payType3"><i class="fa-brands fa-google-pay"></i></label>
                <input type="radio" name="payType" id="payType3" value="gPay">
                <label for="payType4"><i class="fa-regular fa-credit-card"></i></label>
                <input type="radio" name="payType" id="payType4" value="card">
                <div class="cards">
                    <div class="a">
                        <img src="customerImg/card.png" alt="">
                        <div class="cardDetails">
                            <label for="card1"><i class="fa-regular fa-credit-card"></i> *** *** *** 25</label>
                            <input type="radio" name="card" id="card1" value="card1"> <br>
                            <label for="card2"><i class="fa-regular fa-credit-card"></i> *** *** *** 56</label>
                            <input type="radio" name="card" id="card2" value="card2"> <br>
                            <label for="card3"><i class="fa-regular fa-credit-card"></i> *** *** *** 38</label>
                            <input type="radio" name="card" id="card3" value="card3">
                        </div>
                    </div>
                </div>
            </form>
            <button class="payBtn">Add new Card</button>
        </div>
        <div class="secPartB">
            <h2>Shipping Address</h2>
            <div class="divAddress">
                <div class="addressIcon">
                    <i class="fa-solid fa-house"></i>
                </div>
                <div class="addressDetails">
                    <h6>My Home</h6>
                    <p><?php echo $C_address; ?></p>
                </div>
                <input type="radio" name="address" id="address1" value="address1">
            </div>
            <div class="divAddress">
                <div class="addressIcon">
                    <i class="fa-solid fa-house"></i>
                </div>
                <div class="addressDetails">
                    <h6>My Office</h6>
                    <p>778 Locust View Drive Oakland, CA</p>
                </div>
                <input type="radio" name="address" id="address2" value="address2">
            </div>
            <button class="payBtn">Add new Address</button>
        </div>

    </section>

    <h2 class="mainH2">My Recent Order</h2>

    <div class="myOrders">
        <div class="orderCard">
            <h3 class="sideH3">You are on the Queue!</h3>
            <img src="customerImg/QR.png" alt="">
            <h3>Your No: <span>0011</span></h3>
            <h3>Please wait till your chance</h3>
            <h3>Thank You!</h3>
        </div>
        <div class="oderDetailsandHistory">
        <?php if ($O_id): ?>
            <div class="oderDetails">
                <div class="oderDetail">
                    <h3 class="sideH3">Oder History</h3>
                    <h3>Order ID: <?php echo htmlspecialchars($O_id); ?></h3>
                    <p>Order Status: <?php echo htmlspecialchars($O_stetus); ?></p>
                    <p>Order Type: Delivery</p> <!-- Assuming all orders are Delivery for now -->
                    <p>Order Date & Time: <?php echo htmlspecialchars($O_date); ?></p>
                    <p>Order Description: <?php echo htmlspecialchars($order_description); ?></p>
                    <p>Price: Rs. <?php echo htmlspecialchars($price); ?></p>
                    <p>Payment Status: <?php echo htmlspecialchars($Payment_Status); ?></p>
                </div>
                <div class="seemoreButton">
                    <a href="">See More></a>
                </div>
            </div>
        <?php else: ?>
            <p>No recent orders found.</p>
        <?php endif; ?>
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
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.313464801032!2d80.3504418!3d7.2517806!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae33c6d7b4f1131%3A0x9a46c9696fa12c31!2sFresh%20Chef%20Catering%20Service!5e0!3m2!1sen!2slk!4v1689819356647!5m2!1sen!2slk" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </footer>
    <script>
        function openModal() {
            document.getElementById("updateModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("updateModal").style.display = "none";
        }

        // Close the modal when clicking outside of the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById("updateModal")) {
                closeModal();
            }
        }
    </script>
</body>
</html>
