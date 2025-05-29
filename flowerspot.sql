-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 04:01 PM
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
-- Database: `flowerspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `date`) VALUES
(10, 29, 5, '2025-05-20'),
(11, 29, 5, '2025-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `flower_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `user_name`, `flower_id`, `date`) VALUES
(3, 'good flowers', 'Nagaraj N P', 26, '2025-05-18'),
(4, 'good flowers', 'Nagaraj N P', 28, '2025-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `flowers`
--

CREATE TABLE `flowers` (
  `flower_id` int(11) NOT NULL,
  `flower_name` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flowers`
--

INSERT INTO `flowers` (`flower_id`, `flower_name`, `price`, `description`, `image`, `type`) VALUES
(26, 'Rainbow Floral Garland', '100', 'A vibrant rainbow-themed garland perfect for festive decor.', './public/dec1.jpg', 'Decoration'),
(27, 'Pastel Flower Curtain', '120', 'Soft pastel curtain ideal for weddings and celebrations.', './public/dec2 .jpg', 'Decoration'),
(28, 'Vibrant Wedding Backdrop', '150', 'Bright and colorful floral backdrop for weddings.', './public/dec3.jpg', 'Decoration'),
(29, 'Ornate Floral Pedestals', '200', 'Decorative flower pedestals to elevate your event.', './public/dec4.jpg', 'Decoration'),
(30, 'Elegant Wall Hanging', '180', 'Graceful wall decor with floral accents.', './public/dec5.jpg', 'Decoration'),
(31, 'Marigold Wall Decor', '130', 'Traditional marigold setup for festivals and pujas.', './public/dec6.jpg', 'Decoration'),
(32, 'Classic Floral Archway', '250', 'A timeless archway adorned with flowers.', './public/dec7.jpg', 'Decoration'),
(33, 'Green Leaf Garland', '100', 'Natural-looking green leaf garland for eco-style themes.', './public/dec8.jpg', 'Decoration'),
(34, 'Multicolor Festive Garland', '90', 'Lively multicolor garland suited for all events.', './public/dec9.jpg', 'Decoration'),
(35, 'Red and White Floral Combo', '110', 'Classic red and white floral set for elegant decor.', './public/dec10.jpg', 'Decoration'),
(36, 'Charming Red Rose Bundle', '250', 'A romantic bundle of rich red roses.', './public/f4.jpg', 'Gift'),
(37, 'Lush Red Rose Arrangement', '650', 'Premium red roses beautifully arranged.', './public/f5.jpg', 'Gift'),
(38, 'Vibrant Red Rose Collection', '350', 'A bold selection of fresh red roses.', './public/f6.jpg', 'Gift'),
(39, 'Majestic Red and Blue Rose Combo', '50', 'A unique blend of red and blue roses.', './public/f7.jpg', 'Gift'),
(40, 'Radiant Red and White Rose Ensemble', '650', 'A radiant ensemble of red and white roses.', './public/f8.jpg', 'Gift'),
(41, 'Blooming Mixed Flower Bouquet', '150', 'A cheerful bouquet of assorted flowers.', './public/f9.jpg', 'Gift'),
(42, 'Graceful Pink and White Roses', '110', 'Delicate mix of pink and white roses.', './public/f10.jpg', 'Gift'),
(43, 'Stunning Red and White Rose Spray', '250', 'A dramatic spray of red and white roses.', './public/f11.jpg', 'Gift'),
(44, 'Colorful Mixed Rose Display', '350', 'A vibrant display of multi-hued roses.', './public/f13.jpg', 'Gift'),
(45, 'Alluring Red Rose Arrangement', '150', 'An elegant setup of alluring red roses.', './public/f14.jpg', 'Gift'),
(46, 'Classic White and Red Rose Mix', '300', 'Timeless white and red rose bouquet.', './public/f15.jpg', 'Gift'),
(47, 'Golden Yellow Rose Bouquet', '300', 'A bright and sunny bouquet of yellow roses.', './public/f16.jpg', 'Gift'),
(48, 'Rich Red Rose Hand-tied', '30', 'A simple yet elegant hand-tied red rose bunch.', './public/f17.jpg', 'Gift'),
(49, 'Delicate White Rose Assembly', '310', 'A peaceful arrangement of white roses.', './public/f20.jpg', 'Decoration'),
(50, 'Sunflower Delight Bouquet', '200', 'A cheerful bouquet filled with sunflowers.', './public/f21.jpg', 'Gift'),
(53, 'rose', '40', ' a nice rose', 'public/274026497_980009219312462_7996817221330397859_n_980009232645794.jpg', 'gift');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `flower_id` int(11) NOT NULL,
  `price` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_method`, `order_date`, `flower_id`, `price`) VALUES
(3, 1, 'Haladakatta', 'Siddapura', '581335', 'cod', '2025-05-20', 30, '₹180'),
(4, 5, 'Haladakatta', 'Siddapura', '581335', 'cod', '2025-05-20', 28, '₹150');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `address`, `city`, `pincode`, `reg_date`, `email`) VALUES
(1, 'Nagaraj N P', '$2y$10$Z2L5c/nxBx6PQYilGSddK./Aq2T5YTlymdmSm2Uum3P3DGnFQPKo.', 'Haladakatta', 'Siddapura', '581335', '2025-05-18', 'nagarajpattegar2004@gmail.com'),
(3, '', '$2y$10$cxM.TBOTmxpSHgBT1.2enuMcK0CJ/OOGLIxzJP2ocg7vCQUH2fVOS', '', '', '', '2025-05-18', 'adminflowerspot@gmail.com'),
(4, 'Anuj', '$2y$10$Kfzbpb3oqtXnFaSiFBdT0eNKaDuW.GmuK7tbqG1ar6utD4b/n7Y6y', 'sagara', 'sagara', '12345', '2025-05-20', 'anuj@gmail'),
(5, 'Nagaraj N P', '$2y$10$2by.SfQBsxgpU4UXvZHUGu1KyK6mqf7S8xqL99xXccQyI0jKBLkYO', 'Haladakatta', 'Siddapura', '581335', '2025-05-20', 'nagarajnp2004@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `flowers`
--
ALTER TABLE `flowers`
  ADD PRIMARY KEY (`flower_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flowers`
--
ALTER TABLE `flowers`
  MODIFY `flower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
