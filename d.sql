-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 06:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Ray-Ban'),
(2, 'Police'),
(3, 'Oakley'),
(4, 'Persol'),
(5, 'Other Brands');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'MALE - SUNGLASSES'),
(2, 'FEMALE-SUNGLASSES'),
(3, 'LENS');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(400) NOT NULL,
  `product_keywords` varchar(400) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(300) NOT NULL,
  `product_image2` varchar(300) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_price`, `date`, `status`) VALUES
(1, 'Black glass', 'black glass for men', 'black glass for men', 1, 1, 'b1.jpg', 'b1.jpg', '3648', '2022-08-08 15:57:43', 'true'),
(2, 'blue glasses', 'Blue glasses for women', 'Blue glasses for women', 2, 3, 'g6.jpg', 'g6.jpg', '7483', '2022-08-08 15:58:42', 'true'),
(3, 'yellow frame', ' yellow frame glass for men', ' yellow frame glass for men', 1, 4, 'b2.jpg', 'b2.jpg', '9839', '2022-08-08 15:59:04', 'true'),
(4, 'stylish brown glass', 'stylish brown glass for men', 'stylish brown glass for men', 1, 3, 'b3.jpg', 'b3.jpg', '9383', '2022-08-08 15:59:33', 'true'),
(5, 'Pink glass ', ' Pink glass for women', ' Pink glass for women', 2, 5, 'g7.jpg', 'g7.jpg', '8473', '2022-08-08 15:59:56', 'true'),
(6, 'Blue stylish glass', 'Blue stylish glass for men', '	\r\nBlue stylish glass for men', 1, 3, 'b4.jpg', 'b4.jpg', '9493', '2022-08-08 16:00:19', 'true'),
(7, 'stylish pink glass ', 'stylish pink  glass  for women', '	\nBlue stylish glass for men', 2, 4, 'g9.jpg', 'g9.jpg', '47345', '2022-08-08 16:01:06', 'true'),
(8, 'blue lens glass', 'blue lens glass for man', 'blue lens glass for man', 1, 1, 'b10.jpg', 'b10.jpg', '63733', '2022-08-08 16:01:21', 'true'),
(9, 'shining glass', 'shining glass for men', 'shining glass for men', 1, 3, 'b11.jpg', 'b11.jpg', '6283', '2022-08-08 16:01:37', 'true'),
(10, 'black silver glass', 'black silver glass for women', 'black silver glass for women', 2, 2, 'g8.jpg', 'g8.jpg', '73634', '2022-08-08 16:01:48', 'true'),
(11, 'golden frame glass', 'golden frame glass for men', 'golden frame glass for men', 1, 3, 'b12.jpg', 'b12.jpg', '738303', '2022-08-08 16:02:15', 'true'),
(12, 'flexible black glass ', 'flexible black glass  for men', 'flexible black glass  for men', 1, 5, 'b5.jpg', 'b5.jpg', '5647', '2022-08-08 16:02:38', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
