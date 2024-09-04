<?php
session_start();

if (!isset($_SESSION['C_id']) || !isset($_SESSION['total_price'])) {
    echo "No order to process or not logged in.";
    exit();
}

$user_id = $_SESSION['C_id'];
$total_price = $_SESSION['total_price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="payment.css">
    <!-- Include any other necessary stylesheets or scripts -->
    <script>
        function toggleCardDetails(paymentType) {
            const cardDetails = document.getElementById('card-details');
            const payButton = document.getElementById('pay-button');

            if (paymentType === 'Cash') {
                cardDetails.style.display = 'none';
                payButton.innerText = 'Pay Later';
            } else {
                cardDetails.style.display = 'block';
                payButton.innerText = 'Pay Now';
            }
        }
    </script>
</head>
<body>
    <h1>Payment Page</h1>
    <p>Total Amount: <?php echo $total_price; ?></p>
    <form action="process_payment.php" method="post">
        <!-- Hidden field to pass total price -->
        <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">

        <!-- Payment Type -->
        <div class="form-group">
            <label for="payment_type">Payment Type</label>
            <div>
                <input type="radio" id="card" name="payment_type" value="Card" onclick="toggleCardDetails('Card')" required>
                <label for="card">Card</label>
            </div>
            <div>
                <input type="radio" id="cash" name="payment_type" value="Cash" onclick="toggleCardDetails('Cash')" required>
                <label for="cash">Cash</label>
            </div>
        </div>

        <!-- Card Details -->
        <div id="card-details">
            <div class="form-group">
                <label for="cardholder_name">Cardholder Name</label>
                <input type="text" id="cardholder_name" name="cardholder_name">
            </div>

            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number">
            </div>

            <div class="form-group">
                <label for="exp_date">Expiration Date</label>
                <input type="text" id="exp_date" name="exp_date" placeholder="MM/YY">
            </div>

            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv">
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" id="pay-button">Pay Now</button>
    </form>
</body>
</html>
