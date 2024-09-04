<?php 
    include 'connection.php';
    include 'Order_function.php';

    ?>
    






<!-- HTML Section code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        <?php
        include 'Admin_user.css';
        ?>
    </style>
    <title>Document</title>
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
                                        <a href="Admin_user.php">
                                            <button class="active-btn">
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
                                            <button>
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
                                        <a href="reviews.php">
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


        <div class="edit_user_detail">

                
        

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Edit User Detail
                                <a href="Admin_order.php" class="btn btn-danger float-end">back</a>
                                </h2>
                            </div>

                            <div class="card-body">

                            <?= alterMessage();?>
                                <form action="Order_code.php" method="POST">

                                <?php

                                    $paramResult = checkParamId('id');
                                    if(!is_numeric($paramResult)){
                                        echo '<h5'.$paramResult.'</h5>';
                                        return false;
                                    }

                                    $user = getById('r_order',checkParamId('id'));
                                    if($user['status'] == 200)
                                    {
                                        ?>
                                    <input type="hidden" name="userId" value="<?= $user['data']['O_id'];?>" required >

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">Menu Item</label>
                                                <input type="text" name="MenuItem" value="<?= $user['data']['menu_id'];?>" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">Date</label>
                                                <input type="text" name="Date" value="<?= $user['data']['O_date'];?>" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">Status
                                                        <select class="form-select" id="sort" name="Ostatus" value="<?= $user['data']['O_stetus'];?>" required class="form-control">
                                                            <option  value="Food Preparation">Food Preparation</option>
                                                            <option  value="Parcel Preparation">Parcel Preparation</option>
                                                            <option  value="Pickup Confirmation">Pickup Confirmation</option>
                                                            <option  value="Delivered">Delivered</option>
                                                            <option  value="Cancel">Cancel</option>
                                                            
                                                        </select>
                                                </label>
                                                        
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">Description</label>
                                                <input type="text" name="Description" value="<?= $user['data']['order_description'];?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 text-end">
                                                <br/>
                                                <button type="submit" name="UpdateOrder" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>


                                        
                                        
                                        
                                    </div>
                                        <?php

                                    }
                                    else
                                    {
                                       echo '<h5>'.$user['message'].'</h5>';
                                    }
                                ?>


                                    
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                </div>