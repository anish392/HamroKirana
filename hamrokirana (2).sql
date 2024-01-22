-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 06:42 PM
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
-- Database: `hamrokirana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$7EP4ceLtXxzcWAeeov2/0eV.OKDNKcS04MKFFaED8Yst9kHiRqSSG'),
(2, 'hello', 'hello@gmail.com', '$2y$10$3.ivQn0p1CoeQAVNzniWN.cXcXt7RCyuH0aJdNjODApUBAov5uoY2');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'Hulas'),
(3, 'Britannia'),
(4, 'DDC'),
(5, 'Coca-Cola'),
(6, 'Lays'),
(7, 'Other Brands');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Hygienic'),
(3, 'Fresh Produce'),
(4, 'Pantry-Staples'),
(5, 'Snacks'),
(6, 'Frozen Foods'),
(7, 'Bakery'),
(8, 'Dairy and Egg'),
(9, 'Soft drinks'),
(11, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_id`)),
  `quantity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quantity`)),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status` varchar(100) NOT NULL,
  `clicks` int(255) NOT NULL,
  `views` int(255) NOT NULL,
  `search_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_price`, `date`, `status`, `clicks`, `views`, `search_count`) VALUES
(1, 'Hulas jira masino rice (chamal) ', 'Hulas jira masino rice (chamal) is a popular brand rice chamal which is very tasty ', 'Hulas jira masino rice (chamal) is a popular brand rice chamal which is very tasty ', 4, 2, 'cham.jpg', 'cham.jpg', '1200', '2023-09-28 15:47:44', 'true', 75, 13, 13),
(2, 'Hulas wheat (gau ko pitho) ', 'Hulas wheat (gau ko pitho) is a good quality wheat', 'Hulas wheat (gau ko pitho) is a good quality wheat', 4, 2, 'R.jpeg', 'R.jpeg', '195', '2023-09-28 15:47:44', 'true', 106, 3, 3),
(3, 'Hulas Beaten rice (chuira) ', 'Hulas Beaten rice (chuira) is a good quality chuira (beaten rice)', 'Hulas Beaten rice (chuira) is a good quality chuira (beaten rice)', 4, 2, 'R (1).jpeg', 'R (1).jpeg', '85', '2023-09-28 13:53:19', 'true', 112, 98, 98),
(4, 'Lays Potato chip ', 'Lays Potato chip is a tasty snack ', 'Lays Potato chip is a tasty snack ', 5, 6, 'nms.jpeg', 'nms.jpeg', '50 ', '2023-09-28 15:47:37', 'true', 78, 9, 9),
(5, 'lays 5 in one combo', 'lays 5 in one combo contains Brazilian picanha, Chinese szechuan chicken, Greek tzatziki, India tikka masala and 1 potato chip', 'lays 5 in one combo contains Brazilian picanha, Chinese szechuan chicken, Greek tzatziki, India tikka masala and 1 potato chip', 5, 6, 'fkk.jpg', 'nms.jpeg', '320', '2023-09-28 15:47:37', 'true', 0, 21, 21),
(6, 'Tissuse', 'High quality tissue', 'High quality tissue', 2, 7, 'ts.jpg', 'ts.jpg', '200', '2023-09-27 03:10:42', 'true', 0, 3, 3),
(7, 'CocaCola products combo', 'CocaCola products combo contains high quality drinks', 'CocaCola products combo contains high quality drinks', 9, 5, 'saj.jpeg', 'saj.jpeg', '1000', '2023-09-28 13:53:19', 'true', 0, 8, 8),
(8, '1 kg onion ', 'Fresh onion directly from the farm  ', 'Fresh onion directly from the farm  ', 3, 7, 'fjsks.jpeg', 'fjsks.jpeg', '60', '2023-09-28 13:53:19', 'true', 0, 3, 3),
(9, 'Diaper', ' high quality long lasting diappers', ' high quality long lasting diappers', 2, 7, 'dia.png', 'dia.png', '300', '2023-09-28 13:53:19', 'true', 0, 5, 5),
(10, 'Frozen ', 'Ready in minutes Frozen chicken roaster cock meat', 'Frozen chicken roaster cock meat', 6, 7, 'chicken.jpeg', 'chicken.jpeg', '380', '2023-09-28 13:53:19', 'true', 2, 3, 3),
(11, 'Frozen vegetables ', 'Frozen vegetables contains ladyfingers carrot bean ', 'Frozen vegetables contains ladyfingers carrot bean ', 6, 7, 'frveg.png', 'frveg.png', '200', '2023-09-28 13:53:19', 'true', 1, 8, 8),
(12, 'Britannia biscuits 3 in 1 combo', 'Britannia biscuits sugar free biscuits', 'Britannia biscuits sugar free biscuits', 5, 3, 'brbis.jpeg', 'brbis.jpeg', '700', '2023-09-28 13:53:19', 'true', 0, 16, 16),
(13, 'Current (5 in one combo)', 'One of the most spicy noodles current noodle', 'One of the most spicy noodles  current noodle', 4, 7, 'cu.png', 'cu.png', '245', '2023-09-28 15:47:44', 'true', 0, 3, 3),
(14, 'DDC yogurt (Dahi) 1kg', 'DDC yogurt (Dahi)', 'DDC yogurt (Dahi)', 8, 4, 'ddc.png', 'ddc.png', '180', '2023-09-28 13:53:19', 'true', 0, 7, 7),
(15, 'Chocolate chips cookies', 'Chocolate chips cookies very very tasty ', 'Chocolate chips cookies very very tasty ', 7, 7, 'cookies.jpeg', 'cookies.jpeg', '200', '2023-09-28 13:53:19', 'true', 0, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `username` longtext NOT NULL,
  `product_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_id`)),
  `quantity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quantity`)),
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `username` longtext NOT NULL,
  `product_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_id`)),
  `quantity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quantity`)),
  `Total_products` int(255) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
