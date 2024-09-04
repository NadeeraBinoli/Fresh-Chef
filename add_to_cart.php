<?php
session_start();

// Get item details from the form
$menu_id = $_POST['menu_id'];
$menu_name = $_POST['menu_name'];
$menu_price = $_POST['menu_price'];

// Create an array for the item
$item = array(
    'menu_id' => $menu_id,
    'menu_name' => $menu_name,
    'menu_price' => $menu_price
);

// Check if cart session exists, if not, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add item to the cart session
$_SESSION['cart'][] = $item;

// Redirect to cart page
header("Location: cart.php");
exit();
?>
