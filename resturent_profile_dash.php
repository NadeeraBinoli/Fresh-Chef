<?php
// db_connect.php - Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$dbname = "fresh_chef_caterings";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details (example with user ID 6)
$user_id = 6;
$sql_user = "SELECT * FROM r_user WHERE C_id = $user_id";
$result_user = $conn->query($sql_user);
$user = $result_user->fetch_assoc();

// Fetch orders
$sql_orders = "SELECT * FROM r_order";
$result_orders = $conn->query($sql_orders);
$orders = [];
while ($row = $result_orders->fetch_assoc()) {
    $orders[] = $row;
}

// Fetch menu items
$sql_menu = "SELECT * FROM r_menu";
$result_menu = $conn->query($sql_menu);
$menu_items = [];
while ($row = $result_menu->fetch_assoc()) {
    $menu_items[] = $row;
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Chef</title>
    <link rel="icon" type="image/png" href="A_IMG/favicon.png">
    <link rel="stylesheet" href="resturent_profile_dash.css">
	<link rel="stylesheet" href="headrfoote.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<header1 id="header">
        <div class="logo">
        <a href="landing.html"><img src="homeIMG/Logo.png" alt="Logo" class="logo"></a>
        </div>
        <div class="navlinks">
        <p><a href="landing.html">home</a></p>
            <p><a href="A_menu.php">menu</a></p>
            <p><a href="menu.html">catering</a></p>
            <p><a href="Delivary.html">delivery</a></p>
            <p><a href="about.html">about us</a></p>
            <p><a href="">profile</a></p>
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
    </header1>

    <header>
        <h2>Hello Kegalle!</h2>
        <h1>Good Morning</h1>
        <button onclick="window.location.href='logout.php'" id="logout">Log Out</button>
    </header>
    <div class="profile-pic">
        <img src="dash.poto/profile-icon.png" alt="Store Icon">
    </div>
    <section class="profile">
        <div class="profile-info">
            <h2>Fresh Chef - Kegalle <img src="dash.poto/bell-icon.png" class="bell-icon"></h2>
            <p>Email: <?php echo $user['C_email']; ?></p>
            <p>Phone: <?php echo $user['C_P_number']; ?></p>
            <button id="update-profile">Update Profile</button>
        </div>
        <div class="branch-details">
            <h2>Branch Details</h2>
            <p>Branch ID: BR 0000</p>
            <p>Location: Kegalle</p>
            <button id="main-branch">Main Branch</button>
        </div>
    </section>

    <h4>Dashboard</h4><br>
    <div class="stats">
        <div class="stat">
            <img src="dash.poto/orders-icon.png" alt="Total Orders Icon" class="stat-icon">
            <h3><?php echo count($orders); ?></h3>
            <p>Total Orders</p>
        </div>
        <div class="stat">
            <img src="dash.poto/delivered-icon.png" alt="Total Delivered Icon" class="stat-icon">
            <h3>357</h3>
            <p>Total Delivered</p>
        </div>
        <div class="stat">
            <img src="dash.poto/cancelled-icon.png" alt="Total Cancelled Icon" class="stat-icon">
            <h3>25</h3>
            <p>Total Cancelled</p>
        </div>
        <div class="stat">
            <img src="dash.poto/revenue-icon.png" alt="Total Revenue Icon" class="stat-icon">
            <h3>$128</h3>
            <p>Total Revenue</p>
        </div>
    </div>

    <div class="pie-chart-container">
        <h2>Analyze</h2>
        <div class="pie-chart">
            <div class="chart total-order">
                <canvas id="totalOrderChart"></canvas>
                <h1 class="chart-value">81%</h1>
                <p>Total Order</p>
            </div>
            <div class="chart customer-growth">
                <canvas id="customerGrowthChart"></canvas>
                <h1 class="chart-value">22%</h1>
                <p>Customer Growth</p>
            </div>
            <div class="chart total-revenue">
                <canvas id="totalRevenueChart"></canvas>
                <h1 class="chart-value">62%</h1>
                <p>Total Revenue</p>
            </div>
        </div>
        <div class="show-value">
            <input type="checkbox" id="showValueCheckbox">
            <label for="showValueCheckbox">Show Value</label>
            <button>...</button>
        </div>
     </div>
     <div class="chart-container">
        <h1>Total Revenue</h1>
        <canvas id="revenueChart"></canvas>
    </div>
    <div class="chart-order">
        <div class="header">
            <h2>Chart Order</h2>
            <button id="saveReport" class="save-report-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2a5.979 5.979 0 0 1 5.93 5H20v9h-2V9h-1.75a5.979 5.979 0 0 1-3.244-2H15V5H9v2H8.064A5.979 5.979 0 0 1 12 2zm0 2a3.979 3.979 0 0 0-3.667 2.399l2.39 2.39A3.979 3.979 0 0 0 12 6zm3.293 3.293l2.363 2.363L18 11h-4v4h1.586l2.11 2.11A5.979 5.979 0 0 1 12 20a5.979 5.979 0 0 1-5.93-5H4v-9h2v7H6.5A5.979 5.979 0 0 1 12 16a5.979 5.979 0 0 1 3.293-.707zM9 5.414L7.293 7.121 5.828 5.656A5.979 5.979 0 0 1 12 4zM12 18a3.979 3.979 0 0 0 2.4-3.667l-2.39-2.39A3.979 3.979 0 0 0 12 18zm3.667-3.293A3.979 3.979 0 0 0 20 12a5.979 5.979 0 0 1-2.4 2.4l-2.363-2.363L16 14h-4v-4h1.586l-2.11-2.11a5.979 5.979 0 0 1 6.191 2.404z"/></svg>
                Save Report
            </button>
        </div>
        <canvas id="orderChart"></canvas>
    </div>

    <div class="customer-map">
        <div class="header">
            <h2>Customer Map</h2>
            <div class="controls">
                <select id="timeRange" class="dropdown">
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
                <button class="options-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                </button>
            </div>
        </div>
        <canvas id="customerChart"></canvas>
    </div>
<br><br>
<br><br>
    <div class="customer-review-container">
        <h1>Customer Review</h1>
        <div class="buttons">
            <button class="accept">Accept</button>
            <button class="reject">Reject</button>
        </div>
        <div class="reviews">
            <div class="review-card">
                <div class="review-header">
                    <img src="dash.poto/chirantha.png" alt="Chirantha">
                    <div>
                        <h2>Chirantha</h2>
                        <p>2 days ago</p>
                    </div>
                </div>
                <p>Lorem ipsum is simply <br>dummy text of the <br>printing and <br>typesetting industry. <br>Lorem ipsum has been <br>the industry's standard dummy text</p>
                <div class="review-footer">
                    <img src="IMG/dish3.png" alt="Food">
                    <div class="rating">
                        <span>4.5</span>
                        <span>★★★★★</span>
                    </div>
                </div>
            </div>
            <div class="review-card">
                <div class="review-header">
                    <img src="dash.poto/sofia.png" alt="Sofia">
                    <div>
                        <h2>Sofia</h2>
                        <p>2 days ago</p>
                    </div>
                </div>
                <p>Lorem ipsum is simply <br>dummy text of the <br>printing and <br>typesetting industry. <br>Lorem ipsum has been <br>the industry's standard dummy text</p>
                <div class="review-footer">
                    <img src="IMG/dish2.png" alt="Food">
                    <div class="rating">
                        <span>4.0</span>
                        <span>★★★★☆</span>
                    </div>
                </div>
            </div>
            <div class="review-card">
                <div class="review-header">
                    <img src="dash.poto/saman.png" alt="Saman">
                    <div>
                        <h2>Saman</h2>
                        <p>2 days ago</p>
                    </div>
                </div>
                <p>Lorem ipsum is simply <br>dummy text of the <br>printing and <br>typesetting industry. <br>Lorem ipsum has been <br>the industry's standard dummy text</p>
                <div class="review-footer">
                    <img src="IMG/dish8.png" alt="Food">
                    <div class="rating">
                        <span>4.5</span>
                        <span>★★★★★</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation">
            <button class="nav-button prev">&lt;</button>
            <button class="nav-button next">&gt;</button>
        </div>
        <button class="see-all">See all &gt;</button>
    </div>

    <div class="order-management-container">
        <h1>Order Management</h1>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date / Time</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    <th>Amount(Rs)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['Order_rec_id']; ?></td>
                    <td><?php echo $order['O_date']; ?></td>
                    <td><?php echo $order['customer_id']; ?></td>
                    <td>Lorem ipsum dolor sit</td>
                    <td><?php echo $order['price']; ?></td>
                    <td><span  class="status <?php echo strtolower($order['O_stetus']); ?>"><?php echo $order['O_stetus']; ?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <button class="prev">&lt;</button>
            <button class="page active">1</button>
            <button class="page">2</button>
            <button class="page">3</button>
            <button class="page">4</button>
            <button class="page">5</button>
            <button class="next">&gt;</button>
        </div>
    </div>

    <div class="menu-container">
        <h1>Menu Management</h1>
        <div class="menu-items">
            <?php foreach ($menu_items as $menu_item): ?>
            <div class="menu-item">
                <img src="IMG/<?php echo $menu_item['menu_img']; ?>" alt="Food Image">
                <h2><?php echo $menu_item['menu_name']; ?></h2>
                <p><?php echo $menu_item['menu_price']; ?> LKR</p>
                <button class="edit-btn" onclick="editMenuItem('<?php echo $menu_item['menu_id']; ?>')">Edit</button>
            </div>
            <?php endforeach; ?>
            <div class="add-menu">
                <p>Please, organize your menus through button below!</p>
                <img src="A_IMG/cooke.png" alt="Cook Image">
                <button class="add-menu-btn" onclick="addMenu()">+ Add Menus</button>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <h1>Deliver Management</h1>
            <table>
                <thead>
                    <tr>
                        <th>Rider ID</th>
                        <th>Rider Name</th>
                        <th>License No</th>
                        <th>Location</th>
                        <th>Attendance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="riderTable">
                    <!-- Rows will be inserted here by JavaScript -->
                </tbody>
            </table>
            <div class="pagination">
                <button class="page-link" id="prev">&lt;</button>
                <div class="page-numbers">
                    <button class="page-link active" data-page="1">1</button>
                    <button class="page-link" data-page="2">2</button>
                    <button class="page-link" data-page="3">3</button>
                    <button class="page-link" data-page="4">4</button>
                    <button class="page-link" data-page="5">5</button>
                </div>
                <button class="page-link" id="next">&gt;</button>
            </div>
        </div>
    </section>

    <div class="help-container">
        <h1>Help & Support</h1>
        <div class="help-item">
        <img src="image/Headphones icon.png" alt="">
            <p>Help Center</p>
        </div>
        <div class="help-item">
        <img src="image/Vector.png" alt="">
            <p>FAQ</p>
        </div>
        <div class="help-item">
        <img src="image/Global icon.png" alt="">
            <p>Web</p>
        </div>
        <div class="help-item">
        <img src="image/WhatApp.png" alt="">
            <p>Whatsapp</p>
        </div>
    </div>

    <script>
        document.getElementById('logout').addEventListener('click', function() {
            alert('Logged out!');
        });

        document.getElementById('update-profile').addEventListener('click', function() {
            alert('Update Profile Clicked!');
        });

        document.getElementById('main-branch').addEventListener('click', function() {
            alert('Main Branch Clicked!');
        });

        const orderData = {
            labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            datasets: [{
                label: 'Orders',
                data: [12, 19, 3, 5, 2, 3, 7],
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
            }]
        };

        const revenueData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: '2022',
                data: [30, 50, 40, 60, 70, 80, 90, 100, 110, 120, 130, 140],
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
            }, {
                label: '2023',
                data: [40, 60, 50, 70, 80, 90, 100, 110, 120, 130, 140, 150],
                borderColor: 'rgba(255, 206, 86, 1)',
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
            }, {
                label: '2024',
                data: [50, 70, 60, 80, 90, 100, 110, 120, 130, 140, 150, 160],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
            }]
        };

        const customerMapData = {
            labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            datasets: [{
                label: 'Weekly',
                data: [10, 20, 30, 40, 50, 60, 70],
                borderColor: 'rgba(153, 102, 255, 1)',
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
            }]
        };

        window.onload = function() {
            const ctx1 = document.getElementById('orderChart').getContext('2d');
            const chartOrder = new Chart(ctx1, {
                type: 'line',
                data: orderData,
                options: {
                    responsive: true,
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });

            const ctx2 = document.getElementById('revenueChart').getContext('2d');
            const totalRevenue = new Chart(ctx2, {
                type: 'line',
                data: revenueData,
                options: {
                    responsive: true,
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });

            const ctx3 = document.getElementById('customerChart').getContext('2d');
            const customerMap = new Chart(ctx3, {
                type: 'bar',
                data: customerMapData,
                options: {
                    responsive: true,
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });
        };

        document.addEventListener('DOMContentLoaded', function() {
            const totalOrderCtx = document.getElementById('totalOrderChart').getContext('2d');
            const customerGrowthCtx = document.getElementById('customerGrowthChart').getContext('2d');
            const totalRevenueCtx = document.getElementById('totalRevenueChart').getContext('2d');

            const showValueCheckbox = document.getElementById('showValueCheckbox');

            function createChart(ctx, data, backgroundColor) {
                return new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: [data, 100 - data],
                            backgroundColor: backgroundColor,
                            borderWidth: 0
                        }]
                    },
                    options: {
                        cutout: '70%',
                        plugins: {
                            tooltip: { enabled: false },
                            legend: { display: false }
                        }
                    }
                });
            }

            const totalOrderChart = createChart(totalOrderCtx, 81, ['#FF6384', '#FFCDD2']);
            const customerGrowthChart = createChart(customerGrowthCtx, 22, ['#4CAF50', '#C8E6C9']);
            const totalRevenueChart = createChart(totalRevenueCtx, 62, ['#36A2EB', '#BBDEFB']);

            showValueCheckbox.addEventListener('change', function() {
                const chartValues = document.querySelectorAll('.chart-value');
                if (showValueCheckbox.checked) {
                    chartValues.forEach(function(value) {
                        value.style.display = 'block';
                    });
                } else {
                    chartValues.forEach(function(value) {
                        value.style.display = 'none';
                    });
                }
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: '2022',
                            data: [15000, 20000, 25000, 22000, 27000, 38753, 35000, 31000, 37000, 34000, 36000, 38000],
                            borderColor: 'blue',
                            fill: false,
                            tension: 0.4
                        },
                        {
                            label: '2023',
                            data: [12000, 18000, 24000, 21000, 26000, 28000, 33000, 29000, 31500, 12657, 25000, 27000],
                            borderColor: 'red',
                            fill: false,
                            tension: 0.4
                        },
                        {
                            label: '2024',
                            data: [17000, 21000, 23000, 25000, 29000, 32000, 34000, 33000, 35000, 36000, 38000, 40000],
                            borderColor: 'yellow',
                            fill: false,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value + 'k';
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += '$' + context.raw + ',00';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('orderChart').getContext('2d');
            const orderChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                    datasets: [{
                        label: 'Orders',
                        data: [100, 200, 150, 300, 250, 350, 400],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                title: function(context) {
                                    return `Apr 30th, 2024`;
                                },
                                label: function(context) {
                                    return `${context.raw} Order`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            });

            document.getElementById('saveReport').addEventListener('click', () => {
                const link = document.createElement('a');
                link.href = orderChart.toBase64Image();
                link.download = 'order-chart-report.png';
                link.click();
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('customerChart').getContext('2d');
            const customerChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Sun', 'Sun', 'Sun', 'Sun', 'Sun', 'Sun', 'Sun'],
                    datasets: [{
                        label: 'Customers',
                        data: [60, 80, 40, 70, 60, 30, 70],
                        backgroundColor: ['#FF6B6B', '#FFC75F', '#FF6B6B', '#FFC75F', '#FF6B6B', '#FFC75F', '#FF6B6B'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 20
                            }
                        }
                    }
                }
            });

            document.getElementById('timeRange').addEventListener('change', (e) => {
                const timeRange = e.target.value;
                if (timeRange === 'weekly') {
                    customerChart.data.labels = ['Sun', 'Sun', 'Sun', 'Sun', 'Sun', 'Sun', 'Sun'];
                    customerChart.data.datasets[0].data = [60, 80, 40, 70, 60, 30, 70];
                } else if (timeRange === 'monthly') {
                    customerChart.data.labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
                    customerChart.data.datasets[0].data = [200, 300, 250, 400];
                } else if (timeRange === 'yearly') {
                    customerChart.data.labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    customerChart.data.datasets[0].data = [800, 900, 700, 850, 900, 750, 800, 850, 900, 950, 1000, 1100];
                }
                customerChart.update();
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const prevButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');

            prevButton.addEventListener('click', () => {
                // Implement previous button functionality here
            });

            nextButton.addEventListener('click', () => {
                // Implement next button functionality here
            });
        });

        function editMenuItem(itemId) {
            console.log("Editing item:", itemId);
            // Add your backend integration code here
        }

        function addMenu() {
            console.log("Adding new menu");
            // Add your backend integration code here
        }

        const helpItems = document.querySelectorAll('.help-item');

        helpItems.forEach(item => {
            item.addEventListener('click', () => {
                console.log('Help item clicked:', item.textContent);
            });
        });

        const riders = [
            { id: '000097655T', name: 'Lorem ipsum dolor sit', license: 'XXXXXXX', location: 'Lorem ipsum dolor sit', attendance: 'Offline' },
            { id: '000097655T', name: 'Lorem ipsum dolor sit', license: 'XXXXXXX', location: 'Lorem ipsum dolor sit', attendance: 'Online' },
            { id: '000097655T', name: 'Lorem ipsum dolor sit', license: 'XXXXXXX', location: 'Lorem ipsum dolor sit', attendance: 'Offline' },
            { id: '000097655T', name: 'Lorem ipsum dolor sit', license: 'XXXXXXX', location: 'Lorem ipsum dolor sit', attendance: 'Online' },
            { id: '000097655T', name: 'Lorem ipsum dolor sit', license: 'XXXXXXX', location: 'Lorem ipsum dolor sit', attendance: 'Online' },
            { id: '000097655T', name: 'Lorem ipsum dolor sit', license: 'XXXXXXX', location: 'Lorem ipsum dolor sit', attendance: 'Online' },
            { id: '000097655T', name: 'Lorem ipsum dolor sit', license: 'XXXXXXX', location: 'Lorem ipsum dolor sit', attendance: 'Offline' },
            { id: '000097655T', name: 'Lorem ipsum dolor sit', license: 'XXXXXXX', location: 'Lorem ipsum dolor sit', attendance: 'Offline' },
        ];

        const rowsPerPage = 5;
        let currentPage = 1;

        function displayTable(page) {
            const start = (page - 1) * rowsPerPage;
            const end = page * rowsPerPage;
            const tableBody = document.getElementById('riderTable');
            tableBody.innerHTML = '';

            for (let i = start; i < end && i < riders.length; i++) {
                const row = `<tr>
                                <td>${riders[i].id}</td>
                                <td>${riders[i].name}</td>
                                <td>${riders[i].license}</td>
                                <td>${riders[i].location}</td>
                                <td><span class="attendance ${riders[i].attendance.toLowerCase()}">${riders[i].attendance}</span></td>
                                <td>...</td>
                            </tr>`;
                tableBody.innerHTML += row;
            }
        }

        function setActivePage(page) {
            const pages = document.querySelectorAll('.page-link');
            pages.forEach(p => p.classList.remove('active'));
            document.querySelector(`.page-link[data-page="${page}"]`).classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', () => {
            displayTable(currentPage);

            document.querySelectorAll('.page-link').forEach(button => {
                button.addEventListener('click', (event) => {
                    currentPage = parseInt(event.target.getAttribute('data-page'));
                    displayTable(currentPage);
                    setActivePage(currentPage);
                });
            });

            document.getElementById('prev').addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    displayTable(currentPage);
                    setActivePage(currentPage);
                }
            });

            document.getElementById('next').addEventListener('click', () => {
                if (currentPage < Math.ceil(riders.length / rowsPerPage)) {
                    currentPage++;
                    displayTable(currentPage);
                    setActivePage(currentPage);
                }
            });
        });
    </script>
</body>

 <footer>
        <div class="main" id="footer">
            <div class="address">
                <img src="homeIMG/Logo.png" alt="logo">
                <p>No 12, MainStreet, <br>
                Kagalle (71000), <br>
                Sri Lanka</p>
            </div>
            <div class="links">
                <div class="navlinks">
                    <p><a href="landing.html">home</a></p>
                    <p><a href="A_menu.html">menu</a></p>
                    <p><a href="menu.html">catering</a></p>
                    <p><a href="Delivary.html">delivery</a></p>
                    <p><a href="about.html">about us</a></p>
                    <p><a href="">profile</a></p>
                </div>
                <div class="sociallinks">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                </div>
                <div class="coppyRights">
                    <p>Policy privacy &nbsp; &nbsp; &nbsp; Copyright 2024. All rights reserved for Fresh Chef Catering</p>
                </div>
            </div>
            <div class="contact">
                <div class="contactp">
                    <div class="divp">
                        <p>Contact : </p>
                    </div>
                    <div class="Pnum">
                        <p>+(94) 35 2229 540</p>
                        <p>+(94) 76 2070 480</p>
                    </div>
                </div>
                <div class="email">
                    <p>hello@freshchef.com</p>
                </div>
                <div class="form">
                    <form action="" method="post">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" placeholder="Enter Your email">
                        <button type="submit"><img src="homeIMG/submit.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    <!-- java script -->
    <script>
	// dark mode button js

const checkbox = document.getElementById("checkbox")
checkbox.addEventListener("change", () => {
  document.body.classList.toggle("darkBody");
  document.getElementById("header").classList.toggle("darkHeader");
  const anchorElements = document.getElementsByTagName("a");
  for (let i = 0; i < anchorElements.length; i++) {
    anchorElements[i].classList.toggle("darkAnchor");
  }
  document.getElementById("footer").classList.toggle("darkHeader");
  document.getElementById("leadershipSection").classList.toggle("darkLeadership");
  document.getElementById("owner").classList.toggle("darkLeader");
  document.getElementById("darkmode").classList.toggle("darkVisionMission");
  document.getElementById("contactUs").classList.toggle("darkContact");
})

	</script>
</html>