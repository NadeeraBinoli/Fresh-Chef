<?php 
    include 'connection.php';
    include 'funtion.php';
    

    ?>
    

<!-- PHP Section code -->




<!-- HTML Section code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <style>

        <?php
        include 'Admin_user.css';
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
        <div class="userAcccontainer">
            <h2>User Account</h2>

            <div class="O_H_Action">
                <button id="openPopup">
                    <i class="fa fa-plus-square" style="font-size:20px; color:#fff"></i>
                    Add User</button>


                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Collect input data
                            $name = $_POST['C_name'];
                            $address = $_POST['C_address'];
                            $email = $_POST['C_email'];
                            $phone_number = $_POST['C_P_number'];


                            // Example: Insert data into the database
                            $sql = "INSERT INTO r_user (C_name, C_address, C_email, C_P_number)
                            VALUES ('$name', '$address', '$email', '$phone_number')";

                            if ($conn->query($sql) === TRUE) {
                                echo "<script>alert('New record created successfully');</script>";
                            } else {
                                echo "<script>alert('Error!');</script>" . $sql . "<br>" . $conn->error;
                            }

                            

                            
                        }
                        ?>



                    <div id="popup" class="popup">
                        <div class="popup-content">
                            <span id="closePopup" class="close">&times;</span>
                            <h2>Popup Window</h2>
                            <div class="U-popup">
                                <form action="" method="post">
                                    <label for="C_name">Name:</label>
                                    <input type="text" id="C_name" name="C_name" required><br><br>
                                    
                                    <label for="C_address">Address:</label>
                                    <input type="text" id="C_address" name="C_address" required><br><br>
                                    
                                    <label for="C_email">Email:</label>
                                    <input type="email" id="C_email" name="C_email" required><br><br>
                                    
                                    <label for="C_P_number">Phone Number:</label>
                                    <input type="text" id="C_P_number" name="C_P_number" required><br><br>
                                    
                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        

    <div class="divUserAccounts">

    

        <table class="table">
                <thead>
                  <tr>
                  <th>Custormer ID </th>
                  <th>Custormer Name </th>
                  <th>Custormer Address </th>
                  <th>Custormer Email </th>
                  <th>Custormer Phone </th>
                  <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php

                  $users = getAll('r_user');
                  if(mysqli_num_rows($users) > 0)
                  {
                    foreach($users as $userItem)
                    {
                        ?>
                        <tr>
                          <td><b><?= $userItem['c_rec_id'];?></b></td>
                          <td><?= $userItem['C_name'];?></td>
                          <td><?= $userItem['C_address'];?></td>
                          <td><?= $userItem['C_email'];?></td>
                          <td><?= $userItem['C_P_number'];?></td>
                          
                          
                          <td>
                          <div class="operation">
                          <a href="User_delete.php?id=<?= $userItem['C_id'];?>"
                                onclick="return confirm('Do you want to delete this Data?')">
                                <i class="material-icons" style="font-size:32px;color:red">delete</i>
                            </a>


                          <a href="User_edit.php?id=<?= $userItem['C_id'];?>" >
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


    


    <script src="Admin_user.js"></script>
    
</body>
</html>