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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>

        <?php
        include 'admin_order.css';
        
        ?>
    </style>
        <title>Fresh Chef</title>
        <link rel="icon" type="image/png" href="A_IMG/favicon.png">
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
                                            <button class="active-btn">
                                                <div class="div-tab">
                                                    <div class="div-tabIMG"><img src="A_IMG/orderlist.png" alt=""></div>
                                                    <div class="div-tabText">Order List</div>
                                                </div>
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Admin_user.php">
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


            
            <div class="Order_container">
                <div class="orderHeader">
                    <h2>Recent Orders</h2>
                    <div class="O_H_Action">
                        <button><i class="fa fa-plus-square" style="font-size:20px; color:#fff"></i>Add Order</button>
                    </div>
                </div>
                    

        <div class="box">
    <?php 
                                
        $select_message = mysqli_query($conn,'SELECT * FROM r_order ORDER BY O_id DESC LIMIT 4') or die ('query failed');
                                
            if (mysqli_num_rows($select_message) > 0) {
                while ($fetch_message = mysqli_fetch_assoc($select_message)) {

                                    
    ?>
        <div class="userReviewContainer">
            <div class="user_review">

                    <div class="U_R_Card">
                        <div class="U_R_ID">
                            <p>User ID: <span><?php echo $fetch_message['customer_id'];?></span></p>
                        </div>
                        <div class="U_R_O_ID">
                            <P><span> <?php echo $fetch_message['Order_rec_id'];?></span></P>
                        </div>
                    </div>
            
                <div class="O_D_div">
                <p><?php echo $fetch_message['O_date'];?></p>
                </div>
            
            
                <p>Menu: <span><?php echo $fetch_message['menu_id'];?></span></p>
                <p>Order Description:<label> <br><?php echo $fetch_message['order_description'];?></label></p>


            </div>

        
 
            <div class="O_A_bar">
                
                <div class="O_Action">
                <a href="User_delete.php?id=<?= $userItem['C_id'];?>"
                onclick="return confirm('Do you want to delete this Data?')">
                <button><i class="material-icons" style="font-size:32px;color:red">delete</i></button>

                </a>
                
               

                <a href="User_edit.php?id=<?= $userItem['C_id'];?>" >
                <button><i class="fa fa-edit" style="font-size:30px;color:#000000"></i></button>
                            </a>
                        
                        
                </div>

                <div class="O_status">
                    <span><?php echo $fetch_message['O_stetus'];?></span>
                </div>
                
            </div>

            </div>

        


        <?php
             }
                                        

            }else {
                    echo '
                            <div class="empty">
                                    <p>No Orders added yet!</p>
                           </div>';
                                    }
                             
        ?>   
        
        </div>
    </div>

    <h2>Order list Details</h2>

    <div class="divUserAccounts">

    

        <table class="table">
                <thead>
                  <tr>
                  <th>Custormer ID </th>
                  <th>Oder ID </th>
                  <th>Menu item </th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Description </th>
                  <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php

                  $users = getAll('r_order');
                  if(mysqli_num_rows($users) > 0)
                  {
                    foreach($users as $userItem)
                    {
                        ?>
                        <tr>
                          <td><b><?= $userItem['customer_id'];?></b></td>
                          <td><b><?= $userItem['Order_rec_id'];?></b></td>
                          <td><?= $userItem['menu_id'];?></td>
                          <td><?= $userItem['O_date'];?></td>
                          <td><?= $userItem['O_stetus'];?></td>
                          <td><?= $userItem['order_description'];?></td>
                          
                          
                          <td>
                          <div class="operation">
                          <a href="Order_delete.php?id=<?= $userItem['O_id'];?>"
                                onclick="return confirm('Do you want to delete this Data?')">
                                <i class="material-icons" style="font-size:32px;color:red">delete</i>
                            </a>


                          <a href="Order_edit.php?id=<?= $userItem['O_id'];?>" >
                            <i class="fa fa-edit" style="font-size:30px;color:#000000"></i>
                            </a>
                          </div>
                          </td>
                  

                      </tr>
                        <?php
                    }
                  }
                  else
                  {
                    ?>
                    <tr>
                        <td colspan="6">No Record Found!</td>
                    </tr>
                    <?php

                  }
                  ?>
  
                </tbody>

        </table>


                 



        </div>
        

        </div>

        
    </div>
    

            

        </div>
    </div>

    <script src="Admin.js"></script>
    
</body>
</html>