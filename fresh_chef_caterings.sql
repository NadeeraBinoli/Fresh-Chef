-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 12:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fresh_chef_caterings`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` int(11) NOT NULL,
  `cashier_username` varchar(50) DEFAULT NULL,
  `cashier_password` varchar(50) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `cashier_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `cashier_username`, `cashier_password`, `order_id`, `cashier_email`) VALUES
(1, 'cashier1', '1111', 4, 'cashier1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `f_catering_food`
--

CREATE TABLE `f_catering_food` (
  `cetaring_f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `f_catering_food`
--

INSERT INTO `f_catering_food` (`cetaring_f_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `f_complaint`
--

CREATE TABLE `f_complaint` (
  `comp_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `f_complaint`
--

INSERT INTO `f_complaint` (`comp_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `f_menu`
--

CREATE TABLE `f_menu` (
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `f_menu`
--

INSERT INTO `f_menu` (`menu_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47);

-- --------------------------------------------------------

--
-- Table structure for table `f_order`
--

CREATE TABLE `f_order` (
  `O_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `f_order`
--

INSERT INTO `f_order` (`O_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16);

-- --------------------------------------------------------

--
-- Table structure for table `f_payment`
--

CREATE TABLE `f_payment` (
  `pay_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `f_payment`
--

INSERT INTO `f_payment` (`pay_id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `f_rider`
--

CREATE TABLE `f_rider` (
  `rider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `f_rider`
--

INSERT INTO `f_rider` (`rider_id`) VALUES
(1),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `f_user`
--

CREATE TABLE `f_user` (
  `C_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `f_user`
--

INSERT INTO `f_user` (`C_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `M_username` varchar(11) DEFAULT NULL,
  `M_password` varchar(8) DEFAULT NULL,
  `M_phone_no` int(10) DEFAULT NULL,
  `complain_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `Manager_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `M_username`, `M_password`, `M_phone_no`, `complain_id`, `menu_id`, `Manager_email`) VALUES
(1, 'manager1', '1111', 725698965, 5, 29, 'manager1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `r_catering_food`
--

CREATE TABLE `r_catering_food` (
  `cetaring_f_id` int(5) NOT NULL,
  `cetaring_rec_id` varchar(200) DEFAULT NULL,
  `cetaring_f_name` varchar(200) DEFAULT NULL,
  `cetaring_f_img` varchar(255) NOT NULL,
  `cetaring_f_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Triggers `r_catering_food`
--
DELIMITER $$
CREATE TRIGGER `get_cetaring_id` BEFORE INSERT ON `r_catering_food` FOR EACH ROW BEGIN
	INSERT INTO f_catering_food values (NULL);
    SET NEW.cetaring_rec_id = CONCAT("FOD_" , LPAD(LAST_INSERT_ID(), 5,"0"));
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_compliant`
--

CREATE TABLE `r_compliant` (
  `comp_id` int(5) NOT NULL,
  `comp_rec_id` varchar(200) DEFAULT NULL,
  `comp_date` date DEFAULT NULL,
  `customer_Email` varchar(50) NOT NULL,
  `comp_description` varchar(250) NOT NULL,
  `customer_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `r_compliant`
--

INSERT INTO `r_compliant` (`comp_id`, `comp_rec_id`, `comp_date`, `customer_Email`, `comp_description`, `customer_id`) VALUES
(5, 'COM_00005', '2024-02-02', '', 'food was salty', 6);

--
-- Triggers `r_compliant`
--
DELIMITER $$
CREATE TRIGGER `get_comp_id` BEFORE INSERT ON `r_compliant` FOR EACH ROW BEGIN
	INSERT INTO f_complaint values (NULL);
    SET NEW.comp_rec_id = CONCAT("COM_" , LPAD(LAST_INSERT_ID(), 5,"0"));
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_menu`
--

CREATE TABLE `r_menu` (
  `menu_id` int(5) NOT NULL,
  `menu_rec_id` varchar(200) DEFAULT NULL,
  `menu_name` varchar(250) DEFAULT NULL,
  `menu_img` varchar(255) NOT NULL,
  `menu_price` int(11) DEFAULT NULL,
  `menu_rating` int(10) DEFAULT NULL,
  `menu_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `r_menu`
--

INSERT INTO `r_menu` (`menu_id`, `menu_rec_id`, `menu_name`, `menu_img`, `menu_price`, `menu_rating`, `menu_type`) VALUES
(28, 'MEN_00028', 'fried rice', 'dish5.png', 2500, 5, 'Top Rated'),
(29, 'MEN_00029', 'mix noodel', 'dish9.png', 3000, 4, 'breakfast'),
(32, 'MEN_00032', 'mix fried rice', 'dish6.png', 3000, 5, 'Dinner'),
(33, 'MEN_00033', 'vegetable salad', 'dish3.png', 1000, 4, 'Dinner'),
(34, 'MEN_00034', 'mongolian rice', 'Picture3.png', 2500, 0, 'Top Rated'),
(35, 'MEN_00035', 'Cheesy pasta', 'dish 1.png', 1500, NULL, 'Lunch'),
(37, 'MEN_00037', 'samarasinghe', 'Picture7.png', 1500, NULL, 'Breakfast'),
(38, 'MEN_00038', 'thanduri satck', 'Picture6.png', 4500, NULL, 'Top Rated'),
(39, 'MEN_00039', 'chees burger', 'img4.png', 1500, NULL, 'Breakfast'),
(40, 'MEN_00040', 'noodel bowl', 'Picture3.png', 2500, NULL, 'Dinner'),
(41, 'MEN_00041', 'sea food noodle', 'Picture3.png', 3000, NULL, 'Lunch'),
(42, 'MEN_00042', 'sea food salad', 'dish6.png', 2500, NULL, 'Dinner'),
(43, 'MEN_00043', 'garlic bread', 'dish8.png', 1500, NULL, 'Snacks'),
(44, 'MEN_00044', 'Avocado pudin', 'Picture7.png', 800, NULL, 'Snacks'),
(45, 'MEN_00045', 'beef burger', 'dish8.png', 1500, NULL, 'Top Rated'),
(46, 'MEN_00046', 'fried rice(large)', 'dish6.png', 3500, NULL, 'Dinner');

--
-- Triggers `r_menu`
--
DELIMITER $$
CREATE TRIGGER `get_menu_id` BEFORE INSERT ON `r_menu` FOR EACH ROW BEGIN
	INSERT INTO f_menu values (NULL);
    SET NEW.menu_rec_id = CONCAT("MEN_" , LPAD(LAST_INSERT_ID(), 5,"0"));
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_order`
--

CREATE TABLE `r_order` (
  `O_id` int(5) NOT NULL,
  `Order_rec_id` varchar(200) DEFAULT NULL,
  `O_date` date DEFAULT NULL,
  `O_stetus` varchar(100) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `order_description` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `Payment_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `r_order`
--

INSERT INTO `r_order` (`O_id`, `Order_rec_id`, `O_date`, `O_stetus`, `customer_id`, `menu_id`, `order_description`, `price`, `Payment_Status`) VALUES
(4, 'ORD_00003', '2024-02-02', 'Delivered', 7, 29, 'dont add too much saulty', 0, ''),
(5, 'ORD_00004', '2024-02-02', 'Food Preparation', 7, 34, 'fooods', 0, ''),
(6, 'ORD_00005', '2024-02-02', 'Parcel Preparation', 6, 41, 'Don\'t put too much sault...', 0, ''),
(8, 'ORD_00007', '2024-02-02', 'Delivered', 8, 41, 'MSG is ellagic to me', 0, ''),
(9, 'ORD_00008', '2024-02-02', 'Cancel', 6, 32, 'Do not add MSG', 0, ''),
(10, 'ORD_00009', '2024-02-02', 'Delivered', 8, 29, 'nncjncj', 2500, ''),
(11, 'ORD_00010', '2024-09-03', 'Food Preparation', 12, 38, 'hi', 8000, ''),
(12, 'ORD_00011', '2024-07-29', 'Pending', 13, 34, 'eeeeee', 2500, 'Did not pay'),
(13, 'ORD_00012', '2024-07-29', 'Pending', 13, 34, 'eeeeee', 2500, 'Did not pay'),
(14, 'ORD_00013', '2024-07-29', 'Pending', 13, 34, 'sss', 2500, 'Paid'),
(15, 'ORD_00014', '2024-07-30', 'Pending', 13, 28, 'ffffffff', 2500, 'Did not pay'),
(16, 'ORD_00015', '2024-07-30', 'Pending', 13, 34, '', 2500, 'Did not pay'),
(17, 'ORD_00016', '2024-07-30', 'Pending', 13, 28, '', 2500, 'Paid');

--
-- Triggers `r_order`
--
DELIMITER $$
CREATE TRIGGER `get_O_ID` BEFORE INSERT ON `r_order` FOR EACH ROW BEGIN
	INSERT INTO f_order values (NULL);
    SET NEW.Order_rec_id = CONCAT("ORD_" , LPAD(LAST_INSERT_ID(), 5,"0"));
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_payment`
--

CREATE TABLE `r_payment` (
  `pay_id` int(5) NOT NULL,
  `pay_rec_id` varchar(200) DEFAULT NULL,
  `Order_id` int(255) NOT NULL,
  `pay_date` date DEFAULT NULL,
  `pay_type` varchar(100) DEFAULT NULL,
  `pay_amount` int(11) DEFAULT NULL,
  `cashier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `r_payment`
--

INSERT INTO `r_payment` (`pay_id`, `pay_rec_id`, `Order_id`, `pay_date`, `pay_type`, `pay_amount`, `cashier_id`, `customer_id`, `rider_id`) VALUES
(2, 'PAY_00002', 14, '2024-07-29', 'Card', 2950, 1, 13, 1),
(3, 'PAY_00003', 17, '2024-07-30', 'Card', 2500, 1, 13, 1);

--
-- Triggers `r_payment`
--
DELIMITER $$
CREATE TRIGGER `get_pay_id` BEFORE INSERT ON `r_payment` FOR EACH ROW BEGIN
	INSERT INTO f_payment values (NULL);
    SET NEW.pay_rec_id = CONCAT("PAY_" , LPAD(LAST_INSERT_ID(), 5,"0"));
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_rider`
--

CREATE TABLE `r_rider` (
  `rider_id` int(5) NOT NULL,
  `rider_rec_id` varchar(200) DEFAULT NULL,
  `r_name` varchar(200) NOT NULL,
  `r_phone_no` int(10) NOT NULL,
  `r_email` varchar(100) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `rider_password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `r_rider`
--

INSERT INTO `r_rider` (`rider_id`, `rider_rec_id`, `r_name`, `r_phone_no`, `r_email`, `customer_id`, `rider_password`) VALUES
(1, 'RID_00004', 'rider1', 786596965, 'rider1@gmail.com', 11, 1111);

--
-- Triggers `r_rider`
--
DELIMITER $$
CREATE TRIGGER `get_R_id` BEFORE INSERT ON `r_rider` FOR EACH ROW BEGIN
	INSERT INTO f_rider values (NULL);
    SET NEW.rider_rec_id = CONCAT("RID_" , LPAD(LAST_INSERT_ID(), 5,"0"));
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_user`
--

CREATE TABLE `r_user` (
  `C_id` int(5) NOT NULL,
  `c_rec_id` varchar(50) NOT NULL,
  `C_name` varchar(200) DEFAULT NULL,
  `C_address` varchar(200) DEFAULT NULL,
  `C_email` varchar(100) DEFAULT NULL,
  `C_P_number` int(10) DEFAULT NULL,
  `C_Password` text NOT NULL,
  `Cus_add_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `r_user`
--

INSERT INTO `r_user` (`C_id`, `c_rec_id`, `C_name`, `C_address`, `C_email`, `C_P_number`, `C_Password`, `Cus_add_date`) VALUES
(6, 'CUS_00007', 'Roshan kavindu Samarasinghe', 'No: 109 gonahena waboda', 'kavindusamarasinghe1@gmail.com', 76457526, '$2y$10$UUn5cjugyAp/0FCTygC3bueOex52kXrCPydP4j0dUJ7', NULL),
(7, 'CUS_00008', 'nimal rajapaksha', 'no 102 colombo', 'nimal123@gmail.com', 764557526, '12345678', NULL),
(8, 'CUS_00009', 'binoli manike', 'no: 145 colombo kasbava', 'binoli123@gmil.com', 721234567, '$2y$10$fPUKctjSM3TtD02Omg2L1.9LXFViuCB0x8387VQN6wj', NULL),
(9, 'CUS_00010', 'Nithya Gimhani', 'colombo 2', 'nithya123@gmail.com', 112971699, '', NULL),
(11, 'CUS_00012', 'Nithya Gimhani', 'colombo 2', 'nithya123@gmail.com', 112971699, '', NULL),
(12, 'CUS_00013', 'Thusitha perera', 'colombo 4', 'thusitha234@gmail.com', 112765555, '', NULL),
(13, 'CUS_00014', 'user1', '102/K, kajala,kiuyhe.', 'user1@gmail.com', 705698965, '$2y$10$AF.uHdiRY.rm7Fm27GlKYeDzmOzuVUXWzVcr/E5CiiBM5wb0LXFmS', NULL);

--
-- Triggers `r_user`
--
DELIMITER $$
CREATE TRIGGER `getID` BEFORE INSERT ON `r_user` FOR EACH ROW BEGIN
	INSERT INTO f_user values (NULL);
    SET NEW.c_rec_id = CONCAT("CUS_" , LPAD(LAST_INSERT_ID(), 5,"0"));
    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`),
  ADD KEY `order_fk1` (`order_id`);

--
-- Indexes for table `f_catering_food`
--
ALTER TABLE `f_catering_food`
  ADD PRIMARY KEY (`cetaring_f_id`);

--
-- Indexes for table `f_complaint`
--
ALTER TABLE `f_complaint`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `f_menu`
--
ALTER TABLE `f_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `f_order`
--
ALTER TABLE `f_order`
  ADD PRIMARY KEY (`O_id`);

--
-- Indexes for table `f_payment`
--
ALTER TABLE `f_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `f_rider`
--
ALTER TABLE `f_rider`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `f_user`
--
ALTER TABLE `f_user`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`),
  ADD KEY `compliant_fk` (`complain_id`),
  ADD KEY `menu_fk1` (`menu_id`);

--
-- Indexes for table `r_catering_food`
--
ALTER TABLE `r_catering_food`
  ADD PRIMARY KEY (`cetaring_f_id`);

--
-- Indexes for table `r_compliant`
--
ALTER TABLE `r_compliant`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `customer_fk1` (`customer_id`);

--
-- Indexes for table `r_menu`
--
ALTER TABLE `r_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `r_order`
--
ALTER TABLE `r_order`
  ADD PRIMARY KEY (`O_id`),
  ADD KEY `customer_fk2` (`customer_id`),
  ADD KEY `menu_fk` (`menu_id`);

--
-- Indexes for table `r_payment`
--
ALTER TABLE `r_payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `cashier_fk` (`cashier_id`),
  ADD KEY `customer_fk` (`customer_id`),
  ADD KEY `rider_fk` (`rider_id`),
  ADD KEY `Order_fk` (`Order_id`);

--
-- Indexes for table `r_rider`
--
ALTER TABLE `r_rider`
  ADD PRIMARY KEY (`rider_id`),
  ADD KEY `customer_fk3` (`customer_id`);

--
-- Indexes for table `r_user`
--
ALTER TABLE `r_user`
  ADD PRIMARY KEY (`C_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `f_catering_food`
--
ALTER TABLE `f_catering_food`
  MODIFY `cetaring_f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `f_complaint`
--
ALTER TABLE `f_complaint`
  MODIFY `comp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `f_menu`
--
ALTER TABLE `f_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `f_order`
--
ALTER TABLE `f_order`
  MODIFY `O_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `f_payment`
--
ALTER TABLE `f_payment`
  MODIFY `pay_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `f_rider`
--
ALTER TABLE `f_rider`
  MODIFY `rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `f_user`
--
ALTER TABLE `f_user`
  MODIFY `C_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `r_catering_food`
--
ALTER TABLE `r_catering_food`
  MODIFY `cetaring_f_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_compliant`
--
ALTER TABLE `r_compliant`
  MODIFY `comp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `r_menu`
--
ALTER TABLE `r_menu`
  MODIFY `menu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `r_order`
--
ALTER TABLE `r_order`
  MODIFY `O_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `r_payment`
--
ALTER TABLE `r_payment`
  MODIFY `pay_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_rider`
--
ALTER TABLE `r_rider`
  MODIFY `rider_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_user`
--
ALTER TABLE `r_user`
  MODIFY `C_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashier`
--
ALTER TABLE `cashier`
  ADD CONSTRAINT `order_fk1` FOREIGN KEY (`order_id`) REFERENCES `r_order` (`O_id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `compliant_fk` FOREIGN KEY (`complain_id`) REFERENCES `r_compliant` (`comp_id`),
  ADD CONSTRAINT `menu_fk1` FOREIGN KEY (`menu_id`) REFERENCES `r_menu` (`menu_id`);

--
-- Constraints for table `r_compliant`
--
ALTER TABLE `r_compliant`
  ADD CONSTRAINT `customer_fk1` FOREIGN KEY (`customer_id`) REFERENCES `r_user` (`C_id`);

--
-- Constraints for table `r_order`
--
ALTER TABLE `r_order`
  ADD CONSTRAINT `customer_fk2` FOREIGN KEY (`customer_id`) REFERENCES `r_user` (`C_id`),
  ADD CONSTRAINT `menu_fk` FOREIGN KEY (`menu_id`) REFERENCES `r_menu` (`menu_id`);

--
-- Constraints for table `r_payment`
--
ALTER TABLE `r_payment`
  ADD CONSTRAINT `Order_fk` FOREIGN KEY (`Order_id`) REFERENCES `r_order` (`O_id`),
  ADD CONSTRAINT `cashier_fk` FOREIGN KEY (`cashier_id`) REFERENCES `cashier` (`cashier_id`),
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `r_user` (`C_id`),
  ADD CONSTRAINT `rider_fk` FOREIGN KEY (`rider_id`) REFERENCES `r_rider` (`rider_id`);

--
-- Constraints for table `r_rider`
--
ALTER TABLE `r_rider`
  ADD CONSTRAINT `customer_fk3` FOREIGN KEY (`customer_id`) REFERENCES `r_user` (`C_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
