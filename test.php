<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Example</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <button id="openPopupBtn">Open Popup</button>

    <?php 
    include 'connection.php';

    ?>

    <?php
    // update product from database

if (isset($_POST['update_product'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_type = $_POST['update_type'];
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'IMG/' .$update_image;

    $update_query = mysqli_query($conn, "UPDATE r_menu SET menu_rec_id ='$update_id', menu_name ='$update_name',menu_price ='$update_price',
    menu_type = '$update_type',menu_img = '$update_image' WHERE menu_rec_id = '$update_id'") or die ('query failed');

    if($update_query){
        move_uploaded_file($update_image_tmp_name,$update_image_folder);
        echo "<script type='text/javascript'>alert('product Edited successfully');</script>";
        header('location:product.php');
        
    }
}
    
    
    ?>



    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn" id="closePopupBtn">&times;</span>
            <!-- update prdocut details in database -->

    <div class="update_prodcut_box">
        <div class="update_container">
            <?php
                if (isset($_GET['edit'])) {
                    $edit_id = $_GET['edit'];
                    $edit_query = mysqli_query($conn, "SELECT * FROM r_menu WHERE menu_rec_id = '$edit_id'") or die('query failed');
                    if (mysqli_num_rows($edit_query)>0) {
                        while($fetch_edit = mysqli_fetch_assoc($edit_query)){ 
                
               
            ?>
            <div class="U_from_container" id="show-content">
                <form method="POST" enctype="multipart/form-data">
                        <img src="IMG/<?php echo $fetch_edit['menu_img']; ?>" >
                        <div class="input_container">
                            <div class="input_feild">
                            <input type="hidden" name="update_id" value="<?php echo $fetch_edit['menu_rec_id']; ?>">
                            </div>
                            <div class="input_feild">
                            <input type="text" name="update_name" value="<?php echo $fetch_edit['menu_name'];?>">
                            </div>
                            <div class="input_feild">
                            <input type="text" name="update_price" value="<?php echo $fetch_edit['menu_price'];?>">
                            </div>
                            <div class="input_feild">
                                        <select id="sort" name="update_type" value="<?php echo $fetch_edit['menu_type'];?>">
                                            <option value="Top Rated">Top Rated</option>
                                            <option value="Breakfast">Breakfast</option>
                                            <option value="Lunch">Lunch</option>
                                            <option value="Dinner">Dinner</option>
                                            <option value="Snacks">Snacks</option>
                                            <option value="Tea Break">Tea Break</option>
                                        </select>
                                    
                                    
                                
                            </div>
                            
                            <div class="input_imageHolder">
                            <input type="file" name="update_image" accept="IMG/jpg, IMG/jpeg, IMG/png, IMG/webp">
                            </div>
                            
                            <div class="U_btn">
                            <input type="submit" name="update_product" value="update" class="edit">
                            <input type="reset" name="" value="Cancel" class="O_btn" id="close_form">
                            </div>
                        </div>

                        
                </form>
            </div>

            <?php
                    }
                 }
                 echo "<script>document.querySelector('.update_container').style.display='block'</script>";
                }
            
            ?>
        </div>
    </div>
        </div>
    </div>

    <script src="uptest.js"></script>
</body>
</html>


