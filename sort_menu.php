<?php
include 'connection.php';

// Get the sort parameter
$sort = $_GET['sort'];

// Default SQL query
$sql = "SELECT * FROM r_menu";

// Modify SQL query based on sort parameter
switch($sort) {
    case 'name_asc':
        $sql .= " ORDER BY menu_name ASC";
        break;
    case 'name_desc':
        $sql .= " ORDER BY menu_name DESC";
        break;
    case 'price_asc':
        $sql .= " ORDER BY menu_price ASC";
        break;
    case 'price_desc':
        $sql .= " ORDER BY menu_price DESC";
        break;
    default:
        // No sort or 'All' selected, no need to modify the query
        break;
}

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any menu items
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="menu_card" data-id="1" data-name="menu_name" data-price="menu_price">
            <img src="IMG/<?php echo $row["menu_img"]; ?>" alt="Menu Image">
            <div class="card_content">
                <div class="Card_content_top">
                    <p><?php echo $row["menu_name"]; ?></p>
                    <img src="IMG/Picture1.png" alt="">
                    <span>46</span>
                </div>
                <div class="Card_content_down">
                    <span><?php echo $row["menu_price"]; ?></span>
                    <img src="IMG/Picture2.png" alt="">
                </div>
            </div>
            <button>Order Now</button>
        </div>
        <?php
    }
} else {
    echo "No menu items found";
}
?>
