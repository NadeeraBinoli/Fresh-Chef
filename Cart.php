<?php
session_start();

if (!isset($_SESSION['C_id'])) {
    header("Location: login.html");
    exit();
}

require_once 'connection.php'; // Ensure you have your database connection here

$total_price = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'menu_price')) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="icon" type="image/png" href="A_IMG/favicon.png">
    <link rel="stylesheet" href="AddToCart.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectAllCheckbox = document.getElementById('select_all');
            const productCheckboxes = document.querySelectorAll('input[name="products[]"]');
            const deliveryRadio = document.getElementById('delivery');
            const pickupRadio = document.getElementById('pickup');
            const totalPriceElement = document.getElementById('total_price');
            const shippingFeeElement = document.querySelector('.shipping-fee span');
            const shippingFee = 450;
            let total = <?php echo $total_price; ?>;

            function updateTotal() {
                let newTotal = total;
                if (deliveryRadio.checked) {
                    newTotal += shippingFee;
                }
                totalPriceElement.innerText = newTotal;
            }

            selectAllCheckbox.addEventListener('change', function() {
                productCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            document.querySelectorAll('.fa-heart').forEach(icon => {
                icon.addEventListener('click', function() {
                    this.classList.toggle('fa-regular');
                    this.classList.toggle('fa-solid');
                });
            });

            document.querySelectorAll('.fa-trash').forEach(icon => {
                icon.addEventListener('click', function() {
                    const cartItem = this.closest('.cart-item');
                    const menuId = cartItem.querySelector('input[name="products[]"]').value;

                    fetch('remove_from_cart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `menu_id=${menuId}`
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (data === 'success') {
                            cartItem.remove();
                            total -= parseInt(cartItem.querySelector('.partB p').innerText.split('Rs. ')[1]);
                            updateTotal();
                        } else {
                            console.error('Error removing item from cart:', data);
                        }
                    });
                });
            });

            document.querySelectorAll('.quantity .plus').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    if (input.value < input.max) {
                        input.value = parseInt(input.value) + 1;
                        total += parseInt(input.closest('.partB').querySelector('.partB p').innerText.split('Rs. ')[1]);
                        updateTotal();
                    }
                });
            });

            document.querySelectorAll('.quantity .minus').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.nextElementSibling;
                    if (input.value > input.min) {
                        input.value = parseInt(input.value) - 1;
                        total -= parseInt(input.closest('.partB').querySelector('.partB p').innerText.split('Rs. ')[1]);
                        updateTotal();
                    }
                });
            });

            document.querySelector('form').addEventListener('submit', function(event) {
                const allChecked = Array.from(productCheckboxes).every(checkbox => checkbox.checked);
                if (!allChecked) {
                    event.preventDefault();
                    alert('Please select all items before proceeding to checkout.');
                }
            });

            deliveryRadio.addEventListener('change', updateTotal);
            pickupRadio.addEventListener('change', updateTotal);
        });
    </script>
</head>
<body>
    <h3>Cart</h3>
    <form action="checkout.php" method="POST">
        <input type="checkbox" id="select_all">
        <label for="select_all">Select all</label>

        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <div class="cart-item">
                    <input style="margin-top: 1rem;" type="checkbox" name="products[]" value="<?php echo $item['menu_id']; ?>">
                    <label for="product_<?php echo $item['menu_id']; ?>">
                        <div class="partA">
                            <p><?php echo htmlspecialchars($item['menu_name']); ?></p>
                            <div class="i">
                                <i class="fa-regular fa-heart"></i>  <!-- This should be able to be clicked and change to solid heart-->
                                <i class="fa-solid fa-trash"></i> <!-- This should work as a button to remove item-->
                            </div>
                        </div>
                        <div class="partB">
                            <p>Price is : Rs. <?php echo htmlspecialchars($item['menu_price']); ?></p>
                            <div class="quantity"> <!-- This should also work-->
                                <button type="button" class="minus" aria-label="Decrease"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" class="input-box" value="1" min="1" max="10">
                                <button type="button" class="plus" aria-label="Increase"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </label>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
        <p style="font-weight: 700;">Order Description :</p>
        <textarea name="order_description" rows="4" cols="50" placeholder="Enter Special details that you want to send to your chef"></textarea>
        <div class="orderType">
            <p>Order Type :</p>
            <div class="pickup">
            <input type="radio" name="order_type" value="pickup" id="pickup">
            <label for="pickup">Pickup</label>
            </div>
            <div class="delivery">
            <input type="radio" name="order_type" value="delivery" id="delivery">
            <label for="delivery">Delivery</label>
            </div>
        </div>
        <p class="shipping-fee">+ Shipping Fee <span>Rs.450</span></p>
        
        <button class="subButton" type="submit">Checkout<span id="total_price"><?php echo $total_price; ?></span> LKR</button>
    </form>
</body>
</html>
