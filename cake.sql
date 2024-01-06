-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 12:06 AM
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
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `weight` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `name`, `price`, `image`, `weight`) VALUES
(5, 'Double Barrel Butter Cream Cake', 5000, 'b-cake01.jpg', 2),
(6, 'Normal Fondant Cake ', 3000, 'b-cake02.jpg', 2),
(7, 'Broken Fondant Cake', 6000, 'b-cake03.jpg', 3),
(8, 'Fondant Cake with Edible Flowers ', 5000, 'b-cake04.jpg', 2),
(9, 'Double Barrel Sprinkle Drip Cake', 6000, 'b-cake06.jpg', 3),
(10, 'White Drip Shaded Cake with Candies ', 8000, 'b-cake08.jpg', 3),
(11, 'Two Tier Normal Fondant Cake ', 6000, 'b-cake09.jpg', 3),
(12, 'Dump Truck Chocolate Cake ', 6000, 'b-cake11.jpg', 2),
(13, 'Shaded Drip Cake with Model', 8000, 'b-cake12.jpg', 2),
(14, 'Double Barrel Cake with Pearls ', 8000, 'b-cake13.jpg', 3),
(15, 'Pale Drip white Smooth Cake', 7000, 'b-cake15.jpg', 2),
(16, 'Cool Night Sky-blue cake', 6000, 'b-cake16.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `weight` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`, `weight`) VALUES
(10, 3, 'Two Tier Printed Fondant Cake', 6000, 1, 'w-cake09.jpg', 3),
(13, 3, 'Double Barrel Butter Cream Cake', 500000, 1, 'b-cake01.jpg', 2),
(14, 3, 'Peanut Butter rosting Cupcake ', 20000, 1, 'c-cake06.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cup`
--

CREATE TABLE `cup` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cup`
--

INSERT INTO `cup` (`id`, `name`, `price`, `image`) VALUES
(6, 'Peanut Butter rosting Cupcake ', 200, 'c-cake06.jpg'),
(7, 'Choci-Cheese Cupcake ', 250, 'c-cake04.jpg'),
(8, 'Chofee Burst Cupcake ', 300, 'c-cake02.jpg'),
(9, 'White Choc Wasabi Cupcakes ', 250, 'c-cake07.jpg'),
(10, 'Dark Chocolate Cupcake', 300, 'c-cake11.jpg'),
(11, 'Berries And Cream Cupcake', 350, 'c-cake12.jpg'),
(13, 'Chai Latte Cupcakes ', 200, 'c-cake16.jpg'),
(14, 'Frosting Cupcake ', 250, 'c-cake01.jpg'),
(15, 'Litle Miss Cupcake ', 200, 'c-cake03.jpg'),
(16, 'Malteser Cupcakes ', 250, 'c-cake05.jpg'),
(17, 'Moscato Cupcake ', 200, 'c-cake08.jpg'),
(18, 'Pink Velvet Cupcake ', 150, 'c-cake10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(11) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 3, 'Yusra', 'yus@gmail.com', '1234567765', 'hi'),
(3, 11, 'thilini', 'thilini@gmail.com', '0754899865', 'good service');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(4, 9, 'john', '0145236956', 'john@gmail.com', 'credit card', 'no, 123, garden road, kandy,  kandy 874', ', Three Tier Butter Cream Cake  (1) , Chofee Burst Cupcake  (10) ', 13000, '08-Sep-2022', 'pending'),
(5, 10, 'kamala', '0775648956', 'kamala@gmail.com', 'cash on delivery', 'No, 67/8, yatawatta, matale,  matale 355', ', Double Barrel Cake with Pearls  (1) , Peanut Butter rosting Cupcake  (1) , Frosting Cupcake  (5) , Moscato Cupcake  (4) ', 10250, '08-Sep-2022', ''),
(7, 11, 'thilini', '0772544189', 'thilini@gmail.com', 'cash on delivery', 'flat no. 22, marudhana, colombo,  colombo 2567', ', Tour Tier Fondant Pearl Cake (1) , Chofee Burst Cupcake  (10) ', 28000, '08-Sep-2022', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'admin'),
(2, 'Yusra', 'yus@gmail.com', '555', 'user'),
(9, 'john', 'john@gmail.com', '656', 'user'),
(10, 'kamala', 'kamala@gmail.com', '144', 'user'),
(11, 'thilini', 'thilini@gmail.com', '223', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `weight` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`id`, `name`, `price`, `image`, `weight`) VALUES
(9, 'Two Tier Printed Fondant Cake', 9000, 'w-cake09.jpg', 3),
(10, 'Two Tier Shaded Butter Cream Cake', 15000, 'w-cake11.jpg', 3),
(12, 'Three Tier Butter Cream Cake ', 10000, 'w-cake10.jpg', 5),
(13, 'Three Tier Semi Naked Vanilla Cake ', 10000, 'w-cake01.jpg', 6),
(14, 'Two Tier Pearl Cake with Flowers ', 8000, 'w-cake02.jpg', 5),
(15, 'Three Tier Slightly Shaded Cake', 10000, 'w-cake03.jpg', 6),
(17, 'Three Tier Chocolate Cake with Fruits ', 15000, 'w-cake05.jpg', 5),
(18, 'Four Tier Butter Cream Cake ', 15000, 'w-cake06.jpg', 6),
(19, 'Three Tier Normal Fondant Cake ', 18000, 'w-cake08.jpg', 5),
(20, 'Tour Tier Fondant Pearl Cake', 25000, 'w-cake12.jpg', 8),
(21, 'Four Tier Fondant Pleet Cake ', 20000, 'w-cake07.jpg', 7),
(22, 'Two Fier Smooth Cake ', 16000, 'w-cake04.jpg', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cup`
--
ALTER TABLE `cup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cup`
--
ALTER TABLE `cup`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
