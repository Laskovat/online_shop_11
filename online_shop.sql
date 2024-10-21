-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 02:37 AM
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
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `desc`, `image`) VALUES
(17, 'product 1', 55, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium, in impedit natus necessitatibus amet voluptatum. Aperiam unde et reiciendis iusto fuga. Dolorem error consectetur earum suscipit quae iure omnis doloremque!', '1729470301.jpg'),
(19, 'product 3', 150, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium, in impedit natus necessitatibus amet voluptatum. Aperiam unde et reiciendis iusto fuga. Dolorem error consectetur earum suscipit quae iure omnis doloremque!', '1729469236.jpg'),
(20, 'product 2', 125, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium, in impedit natus necessitatibus amet voluptatum. Aperiam unde et reiciendis iusto fuga. Dolorem error consectetur earum suscipit quae iure omnis doloremque!', '1729469253.jpg'),
(21, 'product 4', 190, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium, in impedit natus necessitatibus amet voluptatum. Aperiam unde et reiciendis iusto fuga. Dolorem error consectetur earum suscipit quae iure omnis doloremque!', '1729470425.jpg'),
(22, 'product 4', 70, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium, in impedit natus necessitatibus amet voluptatum. Aperiam unde et reiciendis iusto fuga. Dolorem error consectetur earum suscipit quae iure omnis doloremque!', '1729470479.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`) VALUES
(1, 'ahm', 'a@a.com', '123456', '1234', 'user'),
(2, 'alaa', 'a5@a.com', '134679', '1234', 'user'),
(3, 'mawyvufy@mailinator.com', 'pahoja@mailinator.com', '123', '+1 (128) 551-76', 'user'),
(4, 'mo', 'm@m.com', '$2y$10$3chTMk9hwN.Eo7YXUvDjBefUPIDPbrlCrf.xO/tf59IUSKMWIpf1W', '123456', 'user'),
(5, 'aa', 'aa@aa.aa', '$2y$10$dDCMpel9kGvc3GMS6XnP5eSVmLp1P53WS.NORSQe60sCessRImAhK', '22', 'user'),
(6, 'm', 'm@m.com', '$2y$10$IoFPZS8sj82w8ALOx8VgjeVUYk1Yb9k8KaWXEGRsLeNwrfDMilXwK', '55', 'user'),
(7, 'admin', 'admin@admin.admin', '$2y$10$iczk8YV76Mrbe0zF81Xp9ulI6WonAQRwTzNfqHu/92VMLiX3En6Oi', '0000', 'admin'),
(8, 'user', 'user@user.user', '$2y$10$zuSKE5yVqm5C/7ZDamDbxufZR.C5RkrNBpi0x8PYhBPXsTA6DNiae', '11111', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
