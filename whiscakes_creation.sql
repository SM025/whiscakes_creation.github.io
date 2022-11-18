-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 11:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whiscakes_creation`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday_cakes`
--

CREATE TABLE `birthday_cakes` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birthday_cakes`
--

INSERT INTO `birthday_cakes` (`item_id`, `item_name`, `item_price`, `item_image`) VALUES
(1, 'Cake #1', 300, 'images/bday1.jpg'),
(2, 'Cake #2', 400, 'images/bday2.jpg'),
(3, 'Cake #3', 400, 'images/bday3.jpg'),
(4, 'Cake #4', 300, 'images/bday4.jpg'),
(5, 'Cake #5', 400, 'images/bday5.jpg'),
(6, 'Cake #6', 400, 'images/bday6.jpg'),
(7, 'Cake #7', 300, 'images/bday7.jpg'),
(8, 'Cake #8', 400, 'images/bday8.jpg'),
(9, 'Cake #9', 400, 'images/bday9.jpg'),
(10, 'Cake #10', 300, 'images/bday10.jpg'),
(11, 'Cake #11', 400, 'images/bday11.jpg'),
(12, 'Cake #12', 400, 'images/bday12.jpg'),
(13, 'Cake #13', 300, 'images/bday13.jpg'),
(14, 'Cake #14', 400, 'images/bday14.jpg'),
(15, 'Cake #15', 400, 'images/bday15.jpg'),
(16, 'Cake #16', 300, 'images/bday16.jpg'),
(17, 'Cake #17', 400, 'images/bday17.jpg'),
(18, 'Cake #18', 400, 'images/bday18.jpg'),
(19, 'Cake #19', 300, 'images/bday19.jpg'),
(20, 'Cake #20', 400, 'images/bday20.jpg'),
(22, 'Cake #22', 400, 'images/bdaycake22.jpg'),
(23, 'Cake #23', 300, 'images/bdaycake23.jpg'),
(25, 'Cake #25', 400, 'images/bdaycake25.jpg'),
(26, 'Cake #26', 400, 'images/bdaycake26.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bnp_tb`
--

CREATE TABLE `bnp_tb` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bnp_tb`
--

INSERT INTO `bnp_tb` (`item_id`, `item_name`, `item_price`, `item_image`) VALUES
(1, 'Banana Bread', 400, 'images/bananabread2.jpg'),
(2, 'Egg Pie', 400, 'images/eggpie1.jpg'),
(3, 'Choco Egg Pie', 300, 'images/eggpie2.jpg'),
(4, 'Banoffee Pie', 400, 'images/banoffeepie.jpg'),
(5, 'Strawberry Pie', 300, 'images/berrypie1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cake`
--

CREATE TABLE `cake` (
  `part_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`part_id`, `name`, `price`) VALUES
(0, 'none', 0),
(1, '6x4', 200),
(2, '8x4', 400),
(3, '10x4', 600),
(4, 'Sponge Cake', 75),
(5, 'Moist Cake', 175),
(6, 'Fondant Covered Sponge Cake', 200),
(7, 'Fondant Covered Moist Cake', 350),
(8, 'Chocolate', 75),
(9, 'Vanilla', 20),
(10, 'Red Velvet', 50),
(11, 'Mocha', 75),
(12, 'Coffee', 50),
(13, 'Whipped Cream', 75),
(14, 'Chocolate Whipped Cream', 150),
(15, 'Buttercream', 200),
(16, 'Dulce De Leche', 200),
(17, 'Vanilla Custard', 150),
(18, 'Ganache', 200);

-- --------------------------------------------------------

--
-- Table structure for table `cart_tb`
--

CREATE TABLE `cart_tb` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_db` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cnm_cakes`
--

CREATE TABLE `cnm_cakes` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cnm_cakes`
--

INSERT INTO `cnm_cakes` (`item_id`, `item_name`, `item_price`, `item_image`) VALUES
(1, 'Christening Cake', 400, 'images/christening1.jpg'),
(2, 'Minimalist Cake #1', 400, 'images/minimalist1.jpg'),
(3, 'Minimalist Cake #2', 300, 'images/minimalist2.jpg'),
(4, 'Minimalist Cake #3', 400, 'images/minimalist3.jpg'),
(5, 'Minimalist Cake #4', 300, 'images/minimalist4.jpg'),
(6, 'Minimalist Cake #5', 300, 'images/minimalist5.jpg'),
(7, 'Minimalist Cake #6', 300, 'images/minimalist7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `completed_tb`
--

CREATE TABLE `completed_tb` (
  `completed_id` int(11) NOT NULL,
  `cart_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `custom_cakes`
--

CREATE TABLE `custom_cakes` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event` varchar(50) DEFAULT NULL,
  `shape` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `cake_base` varchar(50) DEFAULT NULL,
  `cake_base_flavor` varchar(50) DEFAULT NULL,
  `regular_filling` varchar(50) DEFAULT NULL,
  `premium_filling` varchar(50) DEFAULT NULL,
  `item_price` float NOT NULL,
  `item_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hidden_reseller`
--

CREATE TABLE `hidden_reseller` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `cupcakes` int(11) NOT NULL,
  `cupcake_description` varchar(500) NOT NULL,
  `cookie_bars` int(11) NOT NULL,
  `bento_cake` int(11) NOT NULL,
  `egg_pie` int(11) NOT NULL,
  `chocolate_egg_pie` int(11) NOT NULL,
  `strawberry_pie` int(11) NOT NULL,
  `cake_pops` int(11) NOT NULL,
  `brownie_bites` int(11) NOT NULL,
  `cookies` int(11) NOT NULL,
  `marshmallows` int(11) NOT NULL,
  `down_payment` float NOT NULL,
  `total` int(11) NOT NULL,
  `cart_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hidden_tb`
--

CREATE TABLE `hidden_tb` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_db` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `cart_number` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message_tb`
--

CREATE TABLE `message_tb` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `time_sent` varchar(10) NOT NULL,
  `date_sent` varchar(30) NOT NULL,
  `message_content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ongoing_tb`
--

CREATE TABLE `ongoing_tb` (
  `ongoing_id` int(11) NOT NULL,
  `cart_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_reseller`
--

CREATE TABLE `order_reseller` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `cupcakes` int(11) NOT NULL,
  `cupcake_description` varchar(500) NOT NULL,
  `cookie_bars` int(11) NOT NULL,
  `bento_cake` int(11) NOT NULL,
  `egg_pie` int(11) NOT NULL,
  `chocolate_egg_pie` int(11) NOT NULL,
  `strawberry_pie` int(11) NOT NULL,
  `cake_pops` int(11) NOT NULL,
  `brownie_bites` int(11) NOT NULL,
  `cookies` int(11) NOT NULL,
  `marshmallows` int(11) NOT NULL,
  `num` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `discount` float NOT NULL,
  `down_payment` float NOT NULL,
  `total` int(11) NOT NULL,
  `cart_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_db` varchar(50) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `cart_number` int(11) NOT NULL,
  `num` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `discount` float NOT NULL,
  `down_payment` float NOT NULL,
  `total` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_tb`
--

CREATE TABLE `payment_tb` (
  `payment_id` int(11) NOT NULL,
  `cart_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reseller_application`
--

CREATE TABLE `reseller_application` (
  `app_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reseller_approval`
--

CREATE TABLE `reseller_approval` (
  `app_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sweets_tb`
--

CREATE TABLE `sweets_tb` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sweets_tb`
--

INSERT INTO `sweets_tb` (`item_id`, `item_name`, `item_price`, `item_image`) VALUES
(1, 'Cupcake #1', 400, 'images/cupcake1.jpg'),
(2, 'Cupcake #2', 300, 'images/cupcake4.jpg'),
(3, 'Cupcake #3', 400, 'images/cupcake5.jpg'),
(4, 'Cupcake #4', 300, 'images/cupcake6.jpg'),
(5, 'Cupcake #5', 300, 'images/cupcake7.jpg'),
(6, 'Cake Pops', 300, 'images/cakepops1.jpg'),
(7, 'Brownies', 300, 'images/brownies.jpg'),
(8, 'Brookies', 300, 'images/brookies.jpg'),
(9, 'Cookie Bars', 300, 'images/cookiebars.jpg'),
(10, 'Mini Cake', 300, 'images/minicake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_feedbacks`
--

CREATE TABLE `users_feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_feedback` varchar(10000) NOT NULL,
  `user_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `order_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `user_status`, `order_number`) VALUES
(0, 'Whiscakes', 'Creation', 'whiscakes.creation@gmail.com', 'duf9ip', 'admin', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers_tb`
--

CREATE TABLE `vouchers_tb` (
  `voucher_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vouchers_tb`
--

INSERT INTO `vouchers_tb` (`voucher_id`, `code`, `discount`) VALUES
(1, '3H8j2i', 0.01),
(2, 'jo7L80', 0.02),
(3, 'S79PDw', 0.03);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday_cakes`
--
ALTER TABLE `birthday_cakes`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `bnp_tb`
--
ALTER TABLE `bnp_tb`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `cart_tb`
--
ALTER TABLE `cart_tb`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cnm_cakes`
--
ALTER TABLE `cnm_cakes`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `completed_tb`
--
ALTER TABLE `completed_tb`
  ADD PRIMARY KEY (`completed_id`);

--
-- Indexes for table `custom_cakes`
--
ALTER TABLE `custom_cakes`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `hidden_reseller`
--
ALTER TABLE `hidden_reseller`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `hidden_tb`
--
ALTER TABLE `hidden_tb`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `message_tb`
--
ALTER TABLE `message_tb`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `ongoing_tb`
--
ALTER TABLE `ongoing_tb`
  ADD PRIMARY KEY (`ongoing_id`);

--
-- Indexes for table `order_reseller`
--
ALTER TABLE `order_reseller`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment_tb`
--
ALTER TABLE `payment_tb`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reseller_application`
--
ALTER TABLE `reseller_application`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `reseller_approval`
--
ALTER TABLE `reseller_approval`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `sweets_tb`
--
ALTER TABLE `sweets_tb`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users_feedbacks`
--
ALTER TABLE `users_feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vouchers_tb`
--
ALTER TABLE `vouchers_tb`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake`
--
ALTER TABLE `cake`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart_tb`
--
ALTER TABLE `cart_tb`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `completed_tb`
--
ALTER TABLE `completed_tb`
  MODIFY `completed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `custom_cakes`
--
ALTER TABLE `custom_cakes`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `hidden_reseller`
--
ALTER TABLE `hidden_reseller`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hidden_tb`
--
ALTER TABLE `hidden_tb`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `message_tb`
--
ALTER TABLE `message_tb`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `ongoing_tb`
--
ALTER TABLE `ongoing_tb`
  MODIFY `ongoing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_reseller`
--
ALTER TABLE `order_reseller`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_tb`
--
ALTER TABLE `order_tb`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `payment_tb`
--
ALTER TABLE `payment_tb`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `reseller_application`
--
ALTER TABLE `reseller_application`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reseller_approval`
--
ALTER TABLE `reseller_approval`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_feedbacks`
--
ALTER TABLE `users_feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `vouchers_tb`
--
ALTER TABLE `vouchers_tb`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
