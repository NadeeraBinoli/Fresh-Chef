<!DOCTYPE html>
<html>
    <head>
        <title>Fresh Chef</title>
        <link rel="icon" type="image/png" href="A_IMG/favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <style>
        <?php
        include ("A_menu.css");
        ?>
    </style>
    </head>



    <body>

    <!-- the database connection file -->
    <?php 
        include 'connection.php';
    ?>
        

            <!-- header section -->

            <header id="header">
                <div class="logo">
                    <a href="landing.html"><img src="homeIMG/Logo.png" alt="Logo" class="logo"></a>
                </div>
                <div class="navlinks">
                    <p><a href="landing.html">home</a></p>
                    <p><a href="A_menu.php">menu</a></p>
                    <p><a href="menu.html">catering</a></p>
                    <p><a href="Delivary.html">delivery</a></p>
                    <p><a href="about.html">about us</a></p>
                    <p><a href="customer_profile.php">profile</a></p>
                </div>
                <div class="login">
                    <i class="fa-solid fa-lock"></i>
                    <p><a href="login.html">Login</a></p>
                    <p>/</p>
                    <p><a href="register.html">SignUp</a></p>
                    <div class="darkMode">
                        <input type="checkbox" class="checkbox" id="checkbox">
                        <label for="checkbox" class="checkbox-label">
                          <i class="fa-solid fa-moon"></i>
                          <i class="fa-solid fa-sun"></i>
                          <span class="ball"></span>
                        </label>
                      </div>
                    <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </header>

            <!-- Image Slider -->


            <div class="slider">
                <div class="list">
                    <div class="item">
                        <img src="IMG/img2.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="IMG/img3.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="IMG/img4.png" alt="">
                    </div>
                    <div class="item">
                        <img src="IMG/img5.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="IMG/img6.jpeg" alt="">
                    </div>
                </div>
                <div class="buttons">
                    <button id="prev"><</button>
                    <button id="next">></button>
                </div>
                
            </div>
            <ul class="dots">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>



            <!-- Food categories -->

            <div class="wrapper">
                <h1>Select Catering type</h1>
                <i id="left"><</i>
                <ul class="carousel">
                  <li class="card">
                    <div class="img"><img src="IMG/img2.jpeg" alt="img" draggable="false"></div>
                    <span>turkish</span>
                  </li>
                  <li class="card">
                    <div class="img"><img src="IMG/img1.jpg" alt="img" draggable="false"></div>
                    <span>Arabic</span>
                  </li>
                  <li class="card">
                    <div class="img"><img src="IMG/img3.jpeg" alt="img" draggable="false"></div>
                    <span>chinese</span>
                  </li>
                  <li class="card">
                    <div class="img"><img src="IMG/img4.png" alt="img" draggable="false"></div>
                    <span>Indian</span>
                  </li>
                  <li class="card">
                    <div class="img"><img src="IMG/img5.jpg" alt="img" draggable="false"></div>
                    <span>Chowmein</span>
                  </li>
                  <li class="card">
                    <div class="img"><img src="IMG/img6.jpeg" alt="img" draggable="false"></div>
                    <span>steak</span>
                  </li>
                  <li class="card">
                    <div class="img"><img src="IMG/img7.png" alt="img" draggable="false"></div>
                    <span>Sri Lankan</span>
                  </li>
                  <li class="card">
                    <div class="img"><img src="IMG/img4.png" alt="img" draggable="false"></div>
                    <span>Ithalian</span>
                  </li>
                </ul>
                <i id="right" >></i>
              </div>


<!-- Menu section -->
<div class="menu_block">
    <div class="menu_section">
        <h2>Menu</h2>
    </div>

    <div class="menu_tabbar">
        <div class="menu_tabs">
            <ul>
                <li><button id="btn_1" onclick="openTop_Rated()">Top Rated</button></li>
                <li><button id="btn_2" onclick="openBreakfast()">Breakfast</button></li>
                <li><button id="btn_3" onclick="openTea_Break()">Tea Break</button></li>
                <li><button id="btn_4" onclick="openLunch()">Lunch</button></li>
                <li><button id="btn_5" onclick="openSnacks()">Snacks</button></li>
                <li><button id="btn_6" onclick="openDinner()">Dinner</button></li>
            </ul>
        </div>

        <div class="menu_filtertab">
            <div class="filter">
                <i class="fa fa-filter"></i>
                <span>Filter</span>
            </div>

            <div class="sorttab">
                <span>Sort:</span>
                <form>
                    <select me="Sort" id="sort" onchange="sortMenuItems()" >
                        <option value="All">All</option>
                        <option value="name_asc">Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                        <option value="price_asc">Price (Low to High)</option>
                        <option value="price_desc">Price (High to Low)</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <!-- Menu card section -->
    <div class="menu_card_hero_Container">
        <!-- Top Rated -->
        <div id="tab_1" class="hero_content">
            <div class="menu_card_container">
                <?php
                // Database connection
                $conn = new mysqli('localhost', 'root', '', 'fresh_chef_caterings');

                // Menu type to display (this will be different for each page)
                $menu_type = "Top Rated";

                // Get the selected sorting option
                $sort_option = isset($_GET['sort']) ? $_GET['sort'] : 'All';

                // Determine the sorting SQL based on the selected option
                switch ($sort_option) {
                    case 'name_asc':
                        $sort_sql = "ORDER BY menu_name ASC";
                        break;
                    case 'name_desc':
                        $sort_sql = "ORDER BY menu_name DESC";
                        break;
                    case 'price_asc':
                        $sort_sql = "ORDER BY menu_price ASC";
                        break;
                    case 'price_desc':
                        $sort_sql = "ORDER BY menu_price DESC";
                        break;
                    default:
                        $sort_sql = ""; // No sorting
                }

                // Query the database to fetch menu items of the specified type and apply sorting
                $query = "SELECT * FROM r_menu WHERE menu_type = '$menu_type' $sort_sql";
                $result = mysqli_query($conn, $query);

                // Check if there are any menu items
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <form action="add_to_cart.php" method="POST">
                        <div class="menu_card" data-id="<?php echo $row["menu_id"]; ?>" data-name="<?php echo $row["menu_name"]; ?>" data-price="<?php echo $row["menu_price"]; ?>">
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
                            <input type="hidden" name="menu_id" value="<?php echo $row["menu_id"]; ?>">
                            <input type="hidden" name="menu_name" value="<?php echo $row["menu_name"]; ?>">
                            <input type="hidden" name="menu_price" value="<?php echo $row["menu_price"]; ?>">
                            <button type="submit">Order Now</button>
                        </div>
                    </form>
                        <?php
                    }
                } else {
                    echo "No menu items found for $menu_type";
                }
                ?>
            </div>
        </div>


        <!-- Breakfast -->
        <div id="tab_2" class="hero_content">
            <div class="menu_card_container">
                <?php
                $menu_type = "Breakfast";
                $query = "SELECT * FROM r_menu WHERE menu_type = '$menu_type' $sort_sql";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="menu_card">
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
                            <button class="order-now">Order Now</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "No menu items found for $menu_type";
                }
                ?>
            </div>
        </div>

        <!-- Tea Break -->
        <div id="tab_3" class="hero_content">
            <div class="menu_card_container">
                <?php
                $menu_type = "Tea Break";
                $query = "SELECT * FROM r_menu WHERE menu_type = '$menu_type' $sort_sql";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="menu_card">
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
                            <button class="order-now">Order Now</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "No menu items found for $menu_type";
                }
                ?>
            </div>
        </div>

        <!-- Lunch -->
        <div id="tab_4" class="hero_content">
            <div class="menu_card_container">
                <?php
                $menu_type = "Lunch";
                $query = "SELECT * FROM r_menu WHERE menu_type = '$menu_type' $sort_sql";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="menu_card">
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
                            <button class="order-now">Order Now</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "No menu items found for $menu_type";
                }
                ?>
            </div>
        </div>

        <!-- Snacks -->
        <div id="tab_5" class="hero_content">
            <div class="menu_card_container">
                <?php
                $menu_type = "Snacks";
                $query = "SELECT * FROM r_menu WHERE menu_type = '$menu_type' $sort_sql";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="menu_card">
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
                            <button class="order-now">Order Now</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "No menu items found for $menu_type";
                }
                ?>
            </div>
        </div>

        <!-- Dinner -->
        <div id="tab_6" class="hero_content">
            <div class="menu_card_container">
                <?php
                $menu_type = "Dinner";
                $query = "SELECT * FROM r_menu WHERE menu_type = '$menu_type' $sort_sql";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="menu_card">
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
                            <button class="order-now">Order Now</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "No menu items found for $menu_type";
                }
                ?>
            </div>
        </div>
    </div>
</div>
            
            <script src="A_menu.js"></script> 
    </body>
</html>