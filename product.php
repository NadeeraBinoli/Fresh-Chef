<?php 
    include 'connection.php';

    ?>


    

<!-- PHP Section code -->


<?php



// Adding products to the database

if (isset($_POST['add_product'])) {
    $product_name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['price']);
    $product_type = mysqli_real_escape_string($conn, $_POST['type']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name']; 
    $image_folder = 'IMG/'.$image;
    
    $select_product_name = mysqli_query($conn,"SELECT menu_name FROM r_menu WHERE menu_name = '$product_name'")
    or die ('query failed');
    
    if(mysqli_num_rows($select_product_name)>0){
        echo "<script type='text/javascript'>alert('Product name already exist');</script>";
    }else{
        $insert_product = mysqli_query($conn, "INSERT INTO r_menu (menu_name,menu_price,menu_type,menu_img)
        VALUES ('$product_name','$product_price','$product_type','$image')") or die('query failed');
        if ($insert_product) {
            if ($image_size >2000000) {
    
                echo "<script type='text/javascript'>alert('image size is too large');</script>";
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);
                
                echo "<script type='text/javascript'>alert('product added successfully');</script>";
            }
        }
    }
}


// Delete product from database

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $select_delete_image = mysqli_query($conn, "SELECT menu_img FROM r_menu WHERE menu_rec_id = '$delete_id'") or die ("query failed");
    $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
    unlink('IMG/'.$fetch_delete_image['menu_img']);

    mysqli_query($conn, "DELETE FROM r_menu WHERE menu_rec_id = '$delete_id'") or die ('query failed');

    header('location:product.php');
}


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

<!-- HTML Section code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- js -->
   

    <title>Admin Product Dashboard</title>
    <style>
    <?php
    include 'product.css';
    
    ?>
</style>
</head>
<body>

    <div class="product_page_container">
        <div class="product_tab_container">
            <a href="landing.html"><img src="homeIMG/Logo.png" alt="Logo" class="logo"></a>
                <h4>Morden Admin Dashboard</h4>

                    <div class="admin_tabs">
                        
                        
                                <ul>
                                    <li>
                                        <a href="Admin_dashboard.php">
                                            <button >
                                                <div class="div-tab">
                                                    <div class="div-tabIMG"><img src="A_IMG/chat.png" alt=""></div>
                                                    <div class="div-tabText">Dashboard</div>
                                                </div>
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Admin_order.php">
                                            <button >
                                                <div class="div-tab">
                                                    <div class="div-tabIMG"><img src="A_IMG/orderlist.png" alt=""></div>
                                                    <div class="div-tabText">Order List</div>
                                                </div>
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Admin_User.php">
                                            <button >
                                                <div class="div-tab">
                                                    <div class="div-tabIMG"><img src="A_IMG/custormer_L.png" alt=""></div>
                                                    <div class="div-tabText">User</div>
                                                </div>
                                                
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Admin_Analytics.php">
                                            <button>
                                                <div class="div-tab">
                                                    <div class="div-tabIMG"><img src="A_IMG/analitics.png" alt=""></div>
                                                    <div class="div-tabText">Analytics</div>
                                                </div>
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product.php">
                                            <button class="active-btn">
                                                <div class="div-tab">
                                                    <div class="div-tabIMG"><img src="A_IMG/foods.png" alt=""></div>
                                                    <div class="div-tabText">Products</div>
                                                </div>
                                                
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Admin_Chat.php">
                                            <button >
                                                <div class="div-tab">
                                                    <div class="div-tabIMG"><img src="A_IMG/chat.png" alt=""></div>
                                                    <div class="div-tabText">Chat</div>
                                                </div>
                                                
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Admin_reviews.php">
                                            <button >
                                                <div class="div-tab">
                                                    <div class="div-tabIMG"><img src="A_IMG/reviews.png" alt=""></div>
                                                    <div class="div-tabText">Reviews</div>
                                                </div>
                                                
                                            </button>
                                        </a>
                                    </li>

                                </ul>
                            

                        
                    </div>

                    <div class="Green-div">
                        <div class="green-div-content">
                            <p>Please, organize your menues through button bellow!</p>
                            <a href="product.php"><button>+ Add Menus</button></a>
                        </div>
                        <div class="green-div-img">
                            <img src="A_IMG/cooke.png" alt="">
                        </div>
                    </div>

                    <div class="div-copyright">
                        <h5>FreshChef Admin Dashboard</h5>
                        <p>@ 2020 ALL Rights Reserved</p>
                    </div>

        </div>
        <div class="product_content_container">

        <div class="search-tabs-container">
                <div class="search-bar">
                    <form action="/action_page.php">
                        <input type="text" placeholder="Search here" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="search-tabs-icons">
                    <div class="icon-noti-value">
                        <img src="A_IMG/noti.png" alt="">
                    </div>

                    <div class="icon-noti-value">
                        <img src="A_IMG/mesg.png" alt="">
                    </div>

                    <div class="icon-noti-value">
                        <img src="A_IMG/gift.png" alt="">
                    </div>

                    <div class="icon-noti-value">
                        <img src="A_IMG/seti.png" alt="">
                    </div>
                </div>

                <div class="vertical-divbar">

                </div>

                <div class="user-indicator">
                    <p>Hello,<span>Samantha</span></p>
                    <div class="image-div">
                        <img src="A_IMG/user1.png" alt="">
                    </div>
                </div>

        </div>

            
            
            

    <div class="show_products">

            <div class="ProductAddingCon">
                <h1>Product Preview</h1>

                    <div class="AddProductdiv">
                    
                    <div class="addBTN">
                        <button id="openPopupBtn">
                            <i class="fa fa-plus-square" style="font-size:20px; color:#fff"></i> Add Product</button>

                            <div id="popup" class="popup">
                                <div class="popup-content">
                                <span class="close-btn" id="closePopupBtn">&times;</span>
                                    <div class="add_product_form_container">

                                            <h1>Add Product Here..! </h1>

                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="input_field">
                                                <label for="">Product Name</label>
                                                <input type="text" name="name" required>
                                            </div>

                                            <div class="input_field">
                                                <label for="">Product Price</label>
                                                <input type="text" name="price" required>
                                            </div>

                                            <div class="input_field">
                                                <label for="">Product type</label>
                                                    <select id="sort" name="type" required>
                                                        <option  value="Top Rated">Top Rated</option>
                                                        <option  value="Breakfast">Breakfast</option>
                                                        <option  value="Lunch">Lunch</option>
                                                        <option  value="Dinner">Dinner</option>
                                                        <option  value="Snacks">Snacks</option>
                                                        <option  value="Tea Break">Tea Break</option>
                                                    </select>
                                            </div>

                                            <div class="input_fields">
                                                <label for="">Product Image</label>
                                                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp"required>
                                            </div>
                                            <div class="add_btn-div">
                                            <button type="submit" name="add_product"  class="add_btn"><i class="fa-regular fa-square-plus"></i> Add Product</button>
                                            </div>
                                            

                                            

                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        

        <div class="box_container">

            <?php 
                $select_products = mysqli_query($conn, "SELECT * FROM r_menu") or die("query failed");
                if(mysqli_num_rows($select_products)>0) {
                    while($fetch_products = mysqli_fetch_assoc($select_products)){


                    
            ?>



            <div class="box">
                <img src="IMG/<?php echo $fetch_products['menu_img']; ?>">
                <h4><?php echo $fetch_products['menu_name']; ?></h4>
                <p>price : Rs: <?php echo $fetch_products['menu_price']; ?></p>
                <span>Type: <?php echo $fetch_products['menu_type']; ?></span>
            

                <div class="admin_O_btn">
                    <!-- Edit Product -->
                    <button class="O_btn" >
                        <a href="product.php?edit=<?php echo $fetch_products['menu_rec_id']?>" ><i class="fa-solid fa-pen-to-square"></i></a>
                    </button>
                    <!-- delete product -->
                    <button class="O_btn">
                        <a href="product.php?delete=<?php echo $fetch_products['menu_rec_id']?>" 
                        onclick="return confirm('Want to delete this product!');"><i class="fa-solid fa-trash"></i></a> 
                    </button>
                    
                </div>
                

            </div>

            <?php 
                        }
            
                }else{
                    echo '
                    <div class="empty">
                        <p>No products added yet!</p>
                    </div>
                    
                    ';
                }
            
            ?>

            
        </div>
    </div>

    <!-- update prdocut details in database -->

    <div class="update_prodcut_box">
            <div id="updateProductPopup" class="popup">
            <div class="popup-content">
                <span class="close-btn" id="closeUpdatePopupBtn">&times;</span>
                <div class="add_product_form_container">
                    <h1>Update Product Here..! </h1>
                    <form id="updateProductForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="input_field">
                            <label for="update_name">Product Name:</label>
                            <input type="text" name="update_name" id="update_name" required>
                        </div>
                        <div class="input_field">
                            <label for="update_price">Product Price:</label>
                            <input type="text" name="update_price" id="update_price" required>
                        </div>
                        <div class="input_field">
                            <label for="update_type">Product type:</label>
                            <select id="update_type" name="update_type" required>
                                <option value="Top Rated">Top Rated</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                                <option value="Snacks">Snacks</option>
                                <option value="Tea Break">Tea Break</option>
                            </select>
                        </div>
                        <div class="input_fields">
                            <label for="update_image">Product Image:</label>
                            <input type="file" name="update_image" id="update_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                        </div>
                        <div class="add_btn-div">
                            <button type="submit" name="update_product" class="add_btn">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    

            </div>

        </div>
    </div>

    <script src="Admin_Products.js"></script>
    
</body>
</html>