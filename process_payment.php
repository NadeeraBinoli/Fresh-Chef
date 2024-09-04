<?php
session_start();
require_once 'connection.php'; // Ensure you have your database connection here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['C_id']) && isset($_POST['payment_type']) && isset($_SESSION['order_ids']) && count($_SESSION['order_ids']) > 0) {
        $total_price = $_POST['total_price'];
        $user_id = $_SESSION['C_id'];
        $pay_date = date("Y-m-d H:i:s");
        $payment_type = $_POST['payment_type'];
        $cashier_id = 1; // Replace with the actual cashier ID if available
        $rider_id = 1; // Replace with the actual rider ID if available

        $order_ids = $_SESSION['order_ids'];

        if ($payment_type === 'Cash') {
            // Update specific orders' payment status to 'Did not pay'
            $payment_status = "Did not pay";
            foreach ($order_ids as $order_id) {
                $sql = "UPDATE r_order SET Payment_Status = ? WHERE O_id = ? AND customer_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $payment_status, $order_id, $user_id);

                if (!$stmt->execute()) {
                    echo "Error updating payment status for order ID $order_id: " . $stmt->error;
                }
            }
            echo "<script>
            alert('Order placed successfully. You chose to pay later with cash. Redirecting to your Profile...');
            window.location.href = 'customer_profile.php';
          </script>";
        } else {
            // Process card payment using the payment gateway API (e.g., Stripe, PayPal, etc.)
            // For the sake of example, let's assume the payment is successful
            $payment_success = true;
            if ($payment_success) {
                // Update specific orders' payment status to 'Paid'
                $payment_status = "Paid";
                foreach ($order_ids as $order_id) {
                    $sql = "UPDATE r_order SET Payment_Status = ? WHERE O_id = ? AND customer_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $payment_status, $order_id, $user_id);

                    if (!$stmt->execute()) {
                        echo "Error updating payment status for order ID $order_id: " . $stmt->error;
                    }

                    // Insert the payment details into r_payment table
                    $sql_payment = "INSERT INTO r_payment (pay_rec_id, Order_id, pay_date, pay_type, pay_amount, cashier_id, customer_id, rider_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt_payment = $conn->prepare($sql_payment);
                    $stmt_payment->bind_param("ssssssss", $user_id, $order_id, $pay_date, $payment_type, $total_price, $cashier_id, $user_id, $rider_id);

                    if (!$stmt_payment->execute()) {
                        echo "Error inserting payment details for order ID $order_id: " . $stmt_payment->error;
                    }
                }
                echo "<script>
                alert('Payment successful! Your order(s) are confirmed. Redirecting to your Profile...');
                window.location.href = 'customer_profile.php';
              </script>";
            } else {
                echo "Payment failed. Please try again.";
            }
        }

        // Clear the order_ids session after processing payment
        unset($_SESSION['order_ids']);
    } else {
        echo "No items in the cart or not logged in.";
    }
} else {
    echo "Invalid request method.";
}
?>
