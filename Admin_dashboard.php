<?php 
    include 'connection.php';

    ?>

    <style>
        <?php 
        
        include 'admin_dashboard.css';
        ?>
    </style>
    

<!-- HTML Section code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                                            <button class="active-btn">
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


        <!-- Dashboard filer time period section -->

        <div class="time_period-container">
            <div class="div-dashboard">
                <h1>Dashboard</h1>
                <p>Hi,Samantha. Welcome back to Fresh Chef Catering Admin! </p>
            </div>

            <div class="filter_period-container">
                <div class="div-image">
                    <img src="A_IMG/calender.png" alt="">
                </div>
                <div class="filter">
                    <span>Filter Periode</span>
                    <form action="">
                        <select name="Sort" id="sort">
                                <option value="Sort1">1 January 2024 - 31 December 2020</option>
                                <option value="Sort2">1 May 2020 - 1 June 2020</option>
                                <option value="Sort3">1 June 2020 - 1 Augest 2020</option>
                                <option value="Sort4">1 Augest 2020 - 1 Septhember 2020</option>
                        </select>
                                    
                                    
                    </form>
                </div>
            </div>
        </div>


        <!-- Operation details -->

        <div class="operation_detail_container">
            <div class="O_detail">
                <div class="O_image">
                    <img src="A_IMG/oder.png" alt="">
                </div>
                <div class="O_detail_container">
                    
                        <?Php
                                $dashboard_order_query = "SELECT * FROM r_order";
                                $dashboard_order_query_run = mysqli_query($conn, $dashboard_order_query);

                                if($order_total = mysqli_num_rows($dashboard_order_query_run))
                                {
                                    echo '<h1>'.$order_total.'</h1>';
                                }
                                else
                                {
                                    echo 'NO Data!';
                                }
                        
                        
                        ?>

                    
                    <p>Total Orders</p>
                </div>
            </div>

            <div class="O_detail">
                <div class="O_image">
                    <img src="A_IMG/deliverd.png" alt="">
                </div>
                <div class="O_detail_container">
                        <?Php
                                $Deliverd_order_query = "SELECT * FROM r_order WHERE O_stetus = 'Delivered' ";
                                $Deliverd_order_query_run = mysqli_query($conn, $Deliverd_order_query);

                                if($Deliverdorder_total = mysqli_num_rows($Deliverd_order_query_run))
                                {
                                    echo '<h1>'.$Deliverdorder_total.'</h1>';
                                }
                                else
                                {
                                    echo 'NO Data!';
                                }
                        
                        
                        ?>
                    <p>Total Deliverd</p>
                </div>
            </div>

            <div class="O_detail">
                <div class="O_image">
                    <img src="A_IMG/cancel.png" alt="">
                </div>
                <div class="O_detail_container">
                        <?Php
                                $cancel_order_query = "SELECT * FROM r_order WHERE O_stetus = 'Cancel' ";
                                $cancel_order_query_run = mysqli_query($conn, $cancel_order_query);

                                if($cancelorder_total = mysqli_num_rows($cancel_order_query_run))
                                {
                                    echo '<h1>'.$cancelorder_total.'</h1>';
                                }
                                else
                                {
                                    echo 'NO Data!';
                                }
                        
                        
                        ?>
                    <p>Total Canceled</p>
                </div>
            </div>

            <div class="O_detail">
                <div class="O_image">
                    <img src="A_IMG/revenue.png" alt="">
                </div>
                <div class="O_detail_container">
                    <h1>Rs 50,753</h1>
                    <p>Total Revenue</p>
                </div>
            </div>
        </div>

        

        <!-- custormer reviwes section -->
        <div class="custermer_review-container">
            <div class="header_container">
                <div class="herder-div">
                    <h1>Custormer Review</h1>
                    <p>Custormer Review is here</p>

                </div>
                
            </div>
            <div class="sliding-container-hero">
                <!-- sliding option -->

            <div class="wrapper">
            <div class="silder_nav_btn">
                    <div class="sliding-btn">
                    <i class="slider_btn" id="left"><</i>
                    </div>
                    <div class="sliding-btn">
                    <i class="slider_btn" id="right" >></i>
                    </div>
                </div>
                <ul class="carousel">
                  <li class="card">
                  <div class="sliding_content">
                    <div class="slider-content">
                        <h2>jone Sena</h2>
                        <label><span>2</span> days ago</label>
                        <p>the food was super tasty</p>

                    </div>
                    <div class="slider-content-IMG">
                        <img src="A_IMG/dish1.png" alt="">
                    </div>
                </div>
                  </li>
                  <li class="card">
                  <div class="sliding_content">
                    <div class="slider-content">
                        <h2>joni Sena</h2>
                        <label><span>2</span> days ago</label>
                        <p>the food was super tasty</p>

                    </div>
                    <div class="slider-content-IMG">
                        <img src="A_IMG/dish1.png" alt="">
                    </div>
                </div>
                  </li>
                  <li class="card">
                  <div class="sliding_content">
                    <div class="slider-content">
                        <h2>jonety Sena</h2>
                        <label><span>2</span> days ago</label>
                        <p>the food was super tasty</p>

                    </div>
                    <div class="slider-content-IMG">
                        <img src="A_IMG/dish1.png" alt="">
                    </div>
                </div>
                  </li>
                  <li class="card">
                  <div class="sliding_content">
                    <div class="slider-content">
                        <h2>jonulo Sena</h2>
                        <label><span>2</span> days ago</label>
                        <p>the food was super tasty</p>

                    </div>
                    <div class="slider-content-IMG">
                        <img src="A_IMG/dish1.png" alt="">
                    </div>
                </div>
                  </li>
                  
                </ul>
                
            </div>
            </div>


            
            
        </div>

        </div>
    </div>

    
    <script src="admin_dashboard.js"></script>

    
</body>
</html>