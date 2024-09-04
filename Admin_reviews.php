<?php 
    include 'connection.php';
    include 'reviews_funtion.php';

    ?>
    






<!-- HTML Section code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin_reviews.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
                                            <button >
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
                                            <button class="active-btn">
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


            



            <!-- Compalin table -->

    <div class="divUserAccounts">

    

        <table class="table">
                <thead>
                  <tr>
                  <th>Custormer ID</th>
                  <th>Compalin ID  </th>
                  <th>Date </th>
                  <th>Email </th>
                  <th>Description </th>
                  <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php

                  $users = getAll('r_compliant');
                  if(mysqli_num_rows($users) > 0)
                  {
                    foreach($users as $userItem)
                    {
                        ?>
                        <tr>
                          <td><?= $userItem['customer_id'];?></td>
                          <td><b><?= $userItem['comp_rec_id'];?></b></td>
                          <td><?= $userItem['comp_date'];?></td>
                          <td><?= $userItem['customer_Email'];?></td>
                          <td><?= $userItem['comp_description'];?></td>
                          
                          
                          
                          <td>
                          <div class="operation">
                          <a href="reviews_delete.php?id=<?= $userItem['comp_id'];?>"
                                onclick="return confirm('Do you want to delete this Data?')">
                                <i class="material-icons" style="font-size:32px;color:red">delete</i>
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






</head>
<body>





    <script src="Admin.js"></script>
    
</body>
</html>