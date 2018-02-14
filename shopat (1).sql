-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2018 at 06:34 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopat`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `poduct_type` varchar(50) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `product_name`, `poduct_type`, `product_image`, `product_price`) VALUES
(1, 'All-Over Print Slim Fit Shirt', 'T-Shirts', 'ck1.jpg', '1500'),
(2, 'Printed Slim Fit Shirt', 'Shirts', 'ck2.jpg', '2000'),
(3, 'Classic Shirt with Patch Pocket', 'T-Shirts', 'puma1.jpg', '3000'),
(4, 'UNITED COLORS OF BENETTON\r\nSlim Fit Checked Shirt\r\n', 'T-Shirts', 'puma2.jpg', '3500'),
(5, 'LOCOMOTIVE\r\nPrinted Slim Fit Cotton Shirt', 'T-Shirts', 'img5.jpg', '3000'),
(6, 'Men Designer Cotton Shirt', 'Shirts', 'Men Designer Cotton Shirt.jpg', '400'),
(7, 'Formals by Koolpals-Cotton Blend Shirt Navy Blue Solid ', 'Shirts', 'Formals by Koolpals-Cotton Blend Shirt Navy Blue Solid .jpg', '589'),
(8, 'Rebozo Solid Men\'s Straight Kurta  (Black)', 'kurta', 'Rebozo Solid Men\'s Straight Kurta  (Black).jpeg', '340'),
(9, 'Peter England Solid Men\'s Straight Kurta  (Red)\r\n', 'kurta', 'Peter England Solid Men\'s Straight Kurta  (Red).jpeg\r\n', '899'),
(10, 'Peter England Striped Men\'s Straight Kurta  (Beige)\r\n', 'kurta', 'Peter England Striped Men\'s Straight Kurta  (Beige).jpeg', '899'),
(11, 'Feed Up Solid Men\'s Straight Kurta  (Dark Blue)', 'kurta', 'Feed Up Solid Men\'s Straight Kurta  (Dark Blue).jpeg', '499'),
(12, 'UZEE Solid Men\'s Straight Kurta  (White, Black)', 'kurta', 'UZEE Solid Men\'s Straight Kurta  (White, Black).jpeg', '415'),
(13, 'Katso Solid Men\'s Hooded Black T-Shirt', 'Shirts', 'Katso Solid Men\'s Hooded Black T-Shirt.jpeg', '359'),
(14, 'Maniac Full Sleeve Solid Women\'s Sweatshirt\r\n', 'wshirts', 'Maniac Full Sleeve Solid Women\'s Sweatshirt.jpeg', '1135'),
(15, '69GAL Full Sleeve Striped Women Sweatshirt', 'wshirts', '69GAL Full Sleeve Striped Women Sweatshirt.jpeg', '799'),
(16, 'Wrangler Full Sleeve Printed Women Sweatshirt', 'wshirts', 'Wrangler Full Sleeve Printed Women Sweatshirt.jpeg', '1024'),
(18, 'Kotty Full Sleeve Solid Women\'s Sweatshirt', 'wshirts', 'Kotty Full Sleeve Solid Women\'s Sweatshirt.jpeg', '1104'),
(19, 'Vvoguish Casual 3/4th Sleeve Printed Women\'s Multicolor Top', 'wts', 'Vvoguish Casual  Sleeve Printed Women\'s Multicolor Top.jpeg', '400'),
(20, 'Harpa Casual Full Sleeve Solid Women\'s Yellow Top', 'wts', 'Harpa Casual Full Sleeve Solid Women\'s Yellow Top.jpeg', '509'),
(21, 'Harpa Casual Roll-up Sleeve Floral Print Women\'s Blue Top\r\n', 'wts', 'Harpa Casual Roll-up Sleeve Floral Print Women\'s Blue Top.jpeg', '562'),
(22, 'The Dry State Solid Women Round Neck Multicolor T-Shirt', 'wts', 'The Dry State Solid Women Round Neck Multicolor T-Shirt.jpeg', '765'),
(23, 'The Style Story Solid Women\'s Straight Kurta  (Black)', 'wks', 'The Style Story Solid Women\'s Straight Kurta  (Black).jpeg', '596'),
(24, 'Style N Shades Solid Women\'s Straight Kurta  (Blue)', 'wks', 'Style N Shades Solid Women\'s Straight Kurta  (Blue).jpeg', '789'),
(25, 'Cottinfab Solid Women\'s Straight Kurta  (Maroon)', 'wks', 'Cottinfab Solid Women\'s Straight Kurta  (Maroon).jpeg', '999'),
(26, 'xs-g280xs-black-gerua-original-imaer6v8whz89yey', 'wks', 'xs-g280xs-black-gerua-original-imaer6v8whz89yey.jpeg', '799');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `email` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`email`, `user`, `phone`, `country`, `state`, `pin`, `pass`, `password`) VALUES
('maru@yahoo.com', 'Maru', 960448932, 'India', 'Orissa', '751024', 'abcd', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(50,0) NOT NULL,
  `product_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`product_id`, `product_name`, `product_price`, `product_quantity`) VALUES
('2', 'Printed Slim Fit Shirt', '2000', 1),
('6', 'Men Designer Cotton Shirt', '400', 1),
('7', 'Formals by Koolpals-Cotton Blend Shirt Navy Blue Solid ', '589', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
