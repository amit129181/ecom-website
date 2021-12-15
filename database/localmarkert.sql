-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2021 at 05:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localmarkert`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `card_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `feedback` varchar(400) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(2) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Product_Description` varchar(255) NOT NULL,
  `Rating` int(3) DEFAULT NULL,
  `Product_image` varchar(20) NOT NULL,
  `Product_price` float NOT NULL,
  `Product_quantity` int(2) NOT NULL,
  `Rated_by` int(5) DEFAULT NULL,
  `shop` int(100) NOT NULL,
  `trader_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_name`, `Product_Description`, `Rating`, `Product_image`, `Product_price`, `Product_quantity`, `Rated_by`, `shop`, `trader_id`) VALUES
(202, 'Tomato', 'Fresh tomato in best rate, no any preservative added', 4, 'tomato.jpg', 4, 20, 1, 4, 3),
(203, 'Salmon Fish', 'Fresh Salmon Fish from koshi', 3, 'salmon_fish.png', 12, 13, 1, 2, 1),
(204, 'Pumpkin', 'Fresh pumpkin from Nepal', 4, 'pumpkin.jpg', 5, 220, 1, 4, 3),
(205, 'Cucumber', 'Very fresh cucumber', 4, 'cucumber.jpg', 6, 50, 1, 4, 3),
(213, 'Cauliflower', 'Fresh cauliflower ', 3, 'cauliflower.jpg', 4, 110, 1, 4, 3),
(214, 'Ladyfinger', 'Fresh ladyfinger from  Nepal', 3, 'ladyfinger.jpg', 4, 105, 1, 4, 3),
(215, 'Goat Meat', 'Goat meat from Nepal', 2, 'goat-meat.jpg', 18, 112, 1, 1, 2),
(217, 'Potato', 'Fresh potato from Nepal', 3, 'potato.jpg', 2, 120, 2, 4, 3),
(220, 'Apple', 'Fresh apple from humla', 3, 'apple.jpg', 5, 20, 1, 4, 3),
(222, 'Bream fish', 'Fresh bream fish from koshi', 3, 'bream-fish.png', 10, 110, 1, 2, 1),
(223, 'Onion', 'Onion exported from Nepal', 4, 'onion.png', 4, 105, 3, 4, 3),
(231, 'Buffalo meat', 'Fresh Buffalo Meat ', 4, 'buffalo.jpg', 12, 120, 1, 1, 2),
(235, 'Ostrich Meat', 'Fresh ostrich meat', 1, 'ostrich_meat.png', 18, 90, 1, 1, 2),
(236, 'Chicken', 'Fresh chicken meat', 3, 'chicken.jpg', 7, 110, 1, 1, 2),
(237, 'Catfish', 'Fresh catfish from koshi', 3, 'catfish.png', 12, 110, 1, 2, 1),
(238, 'Crayfish', 'Fresh crayfish from koshi', 4, 'crayfish.png', 12, 110, 1, 2, 1),
(239, 'Herring', 'Fresh crayfish from koshi', 5, 'herring.png', 10, 110, 1, 2, 1),
(240, 'Salad', 'Fresh salad', 3, 'salad.png', 4, 105, 1, 5, 5),
(241, 'Sandwich', 'Fresh sandwich', 4, 'sandwich.jpg', 4, 105, 1, 5, 5),
(242, 'Sausage', 'Fresh sausage', 4, 'sausage.jpg', 5, 125, 1, 5, 5),
(243, 'Cheese', 'Fresh cheese', 4, 'cheese.jpg', 2, 40, 1, 5, 5),
(244, 'Roll', 'Roll made by us', 4, 'roll.jpg', 2, 90, 1, 3, 4),
(245, 'Croissant', 'Croissant ', 3, 'croissant.jpg', 3, 95, 1, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_offer`
--

CREATE TABLE `product_offer` (
  `product_offer_id` int(10) NOT NULL,
  `offer_amount` int(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `trader_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_offer`
--

INSERT INTO `product_offer` (`product_offer_id`, `offer_amount`, `product_id`, `trader_id`) VALUES
(1, 1, 202, 3),
(2, 2, 204, 3),
(3, 2, 203, 1),
(5, 2, 205, 3),
(6, 1, 213, 3),
(15, 2, 231, 2),
(19, 4, 215, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(20) NOT NULL,
  `shope_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `shope_name`) VALUES
(1, 'Butcher'),
(2, 'Fishmongers'),
(3, 'Bakery'),
(4, 'Greengrocery'),
(5, 'Delicatessen');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `phone_no` int(50) NOT NULL,
  `passwords` varchar(100) NOT NULL,
  `conf_password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `statuss` varchar(100) NOT NULL,
  `imagee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`customer_id`, `customer_name`, `customer_email`, `customer_address`, `phone_no`, `passwords`, `conf_password`, `token`, `statuss`, `imagee`) VALUES
(7, 'Anupam', 'anupam.siwakoti@gmail.com', 'Jhapa,Nepal', 21474836, '$2y$10$3U.7fg9oIRwXBhA51iWI.OKBnbJ61WjPkfIh9gf4jxveLOYHY4p.a', '$2y$10$3U.7fg9oIRwXBhA51iWI.OKBnbJ61WjPkfIh9gf4jxveLOYHY4p.a', '99d219bae3724dd692f1e75b553593', 'active', 'images/pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trader`
--

CREATE TABLE `trader` (
  `trader_id` int(10) NOT NULL,
  `trader_name` varchar(100) NOT NULL,
  `shop` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` int(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `trader_description` varchar(400) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trader`
--

INSERT INTO `trader` (`trader_id`, `trader_name`, `shop`, `email`, `phone_no`, `password`, `trader_description`, `image`) VALUES
(1, 'Anupam Siwakoti', 2, 'anupam.siwakoti@gmail.com', 343432, 'anupam', 'I sell fish', ''),
(2, 'Amit Yadav', 1, 'amit254742@gmail.com', 35363, 'amit2588', 'I sell fresh meat', 'pro.jpg'),
(3, 'Prasant Sapkota', 4, 'prashant2@gmail.com', 33344, 'prasant', 'I sell fresh vegetables', 'img'),
(4, 'Krishna', 3, 'krishna@gmail.com', 33344, 'Krishna12@', 'Sell fresh bakery product', ''),
(5, 'Laxman', 5, 'laxman@gmail.com', 33221, 'laxman@12', 'sell delicatessen', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `feedback_customer` (`customer_id`),
  ADD KEY `feedback_product` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `product_shop` (`shop`),
  ADD KEY `product_trader` (`trader_id`);

--
-- Indexes for table `product_offer`
--
ALTER TABLE `product_offer`
  ADD PRIMARY KEY (`product_offer_id`),
  ADD KEY `product_offer_product` (`product_id`),
  ADD KEY `product_offer_trader` (`trader_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `trader`
--
ALTER TABLE `trader`
  ADD PRIMARY KEY (`trader_id`),
  ADD KEY `trader_shop` (`shop`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `product_offer`
--
ALTER TABLE `product_offer`
  MODIFY `product_offer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trader`
--
ALTER TABLE `trader`
  MODIFY `trader_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_customer` FOREIGN KEY (`customer_id`) REFERENCES `signup` (`customer_id`),
  ADD CONSTRAINT `feedback_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_shop` FOREIGN KEY (`shop`) REFERENCES `shop` (`shop_id`),
  ADD CONSTRAINT `product_trader` FOREIGN KEY (`trader_id`) REFERENCES `trader` (`trader_id`);

--
-- Constraints for table `product_offer`
--
ALTER TABLE `product_offer`
  ADD CONSTRAINT `product_offer_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_ID`),
  ADD CONSTRAINT `product_offer_trader` FOREIGN KEY (`trader_id`) REFERENCES `trader` (`trader_id`);

--
-- Constraints for table `trader`
--
ALTER TABLE `trader`
  ADD CONSTRAINT `trader_shop` FOREIGN KEY (`shop`) REFERENCES `shop` (`shop_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
