<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['menu_id'])) {
    $menu_id = $_POST['menu_id'];

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['menu_id'] == $menu_id) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the array
                echo 'success';
                exit();
            }
        }
    }

    echo 'item_not_found';
} else {
    echo 'invalid_request';
}
?>
