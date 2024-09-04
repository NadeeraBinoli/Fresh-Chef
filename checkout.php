<?php
session_start();
require_once 'connection.php'; // Ensure you have your database connection here

// Check if the user is logged in
if (!isset($_SESSION['C_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        $user_id = $_SESSION['C_id'];
        $order_type = $_POST['order_type'];
        $order_date = date("Y-m-d H:i:s");
        $status = "Pending";
        $total_price = 0; // Initialize total price
        $order_description = $_POST['order_description']; // Get order description

        foreach ($_SESSION['cart'] as $item) {
            $menu_id = $item['menu_id'];
            $order_description = $_POST['order_description'];
            $price = $item['menu_price'];
            $total_price += $price; // Accumulate total price

            // Insert each item as a separate order
            $sql = "INSERT INTO r_order (Order_rec_id, O_date, O_stetus, customer_id, menu_id, order_description, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $user_id, $order_date, $status, $user_id, $menu_id, $order_description, $price);

            if ($stmt->execute()) {
                // Store the inserted order ID
                $order_ids[] = $stmt->insert_id;
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Clear the cart session after successful order
        unset($_SESSION['cart']);

        // Add shipping fee if order type is delivery
        if ($order_type == 'delivery') {
            $total_price += 450; // Add shipping fee
        }

        // Set the total price and order IDs in session for payment processing
        $_SESSION['total_price'] = $total_price;
        $_SESSION['order_ids'] = $order_ids;

        // Redirect to the payment page
        header("Location: payment.php");
        exit();
    } else {
        echo "No items in the cart.";
    }
} else {
    echo "Invalid request method.";
}
?>
