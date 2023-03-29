-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2023 at 12:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2_asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `status`) VALUES
(1, 'Quần áo ', '', NULL, 1),
(2, 'Giày dép', '', NULL, 1),
(5, 'Mũ', '', NULL, 1),
(6, 'Phụ kiện', '', NULL, 1),
(7, 'Balo, túi xách', '', NULL, 1),
(8, 'java', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_product`, `comment`, `date`, `status`) VALUES
(1, 1, 6, 'tuấn đại caaaaaaaaaaa', '22:05:07 16/02/2023', 1),
(2, 1, 6, 'tuấn đại caaaaaaaaaaa', '22:06:08 16/02/2023', 1),
(3, 1, 6, 'mmmmm', '22:07:37 16/02/2023', 1),
(4, 2, 6, 'tuut', '22:32:24 16/02/2023', 0),
(5, 2, 6, 'hahaha', '22:57:02 16/02/2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `price` int NOT NULL,
  `sale` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `quantity` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `cate_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `image`, `price`, `sale`, `description`, `quantity`, `status`, `cate_id`, `created_at`, `update_at`) VALUES
(6, 'áo phông trắnghah', 'clothes9.jpg', 500000, 12, 'c', 2, 1, 1, NULL, NULL),
(7, 'Áo vest', 'clothes16.jpg', 10000000, 500000, 'Áo vest cao cấp', 12, 1, 1, NULL, NULL),
(9, 'Áo khoác 7', 'clothes10.jpg', 120000, 11, ',,mn', 11, 1, 1, NULL, NULL),
(10, 'Áo khoác nâu cao cấp', 'clothes2.jpg', 1500000, 0, 'Ấm', 5, 1, 1, NULL, NULL),
(11, 'Quần bò ống rộng', 'clothes11.jpg', 250000, 0, 'Chất liệu cotton', 12, 1, 1, NULL, NULL),
(12, 'Áo bò', 'clothes5.jpg', 250000, 50000, 'Nhập khẩu', 20, 1, 1, NULL, NULL),
(13, 'Tai nghe', 'product-5.jpg', 100000, 1000, 'Áo sơ mi kẻ sọc', 12, 0, 6, NULL, NULL),
(14, 'Giày nike trắng cổ ngắn', 'shoes9.jpg', 1200000, 199000, 'Giày siêu nhẹ', 10, 1, 2, NULL, NULL),
(15, 'Giày nike trắng sữa af1', 'shoes1.jpg', 123456, 2121, 'haha ko có mô tả', 2, 1, 2, NULL, NULL),
(16, 'áo phông trắng', 'shoes10.jpg', 500000, 120, 'sds', 2, 1, 1, NULL, NULL),
(17, 'mũ lưỡi trai xám', 'hat10.jpg', 150000, 0, 'đẹp', 12, 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`, `status`) VALUES
(1, 'nguyenvantuan18112003dt@gmail.com', 'Tuấn đại ca', '123', 1, 1),
(2, 'ngu@gmail.com', 'tuannguyen', '1234', 0, 1),
(3, 'tuannvph24354@fpt.edu.vn', 'tuannv', 'Tuan1811', 0, 1),
(4, 'tronghoang@gmail.com', 'admin', 'tuan99', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
