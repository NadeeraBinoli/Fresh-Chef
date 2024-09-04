<?php
include 'connection.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM r_menu WHERE menu_rec_id = '$id'") or die('query failed');
    if(mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
}
?>
