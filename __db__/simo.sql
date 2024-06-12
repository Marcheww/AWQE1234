-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 12.Jún 2024, 09:02
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `simo`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(8, 'Apple'),
(9, 'Samsung');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `in_stock` tinyint(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `brand`, `manufacturer`, `price`, `weight`, `stock_quantity`, `in_stock`, `image`) VALUES
(30, 'Apple Iphone 12', 8, 'a', 'a', 577.00, 180.00, 2, NULL, 'uploads/apple-iphone-12.jpg'),
(32, 'Apple Iphone 13', 8, 'Apple', 'Apple', 589.00, 180.00, 5, NULL, 'uploads/apple-iphone-13.jpg'),
(33, 'Apple Iphone 13 pro', 8, 'Apple', 'Apple', 842.00, 180.00, 1, NULL, 'uploads/iphone 13 pro.webp'),
(34, 'Apple Iphone 14', 8, 'Apple', 'Apple', 719.00, 180.00, 1, NULL, 'uploads/iphone 14.webp'),
(35, 'Apple Iphone 14 pro', 8, 'Apple', 'Apple', 989.00, 180.00, 4, NULL, 'uploads/iphone 14 pro.webp'),
(36, 'Apple Iphone 15', 8, 'Apple', 'Apple', 777.00, 180.00, 2, NULL, 'uploads/16 pto.webp'),
(37, 'Apple Iphone 15 pro', 8, 'Apple', 'Apple', 1077.00, 180.00, 6, NULL, 'uploads/15 pro.webp'),
(40, 'Samsung Galaxy S22 5G 128 GB, čierny', 9, 'Samsung', 'Samsung', 520.00, 167.00, 3, NULL, 'uploads/samsung S22.webp'),
(41, 'Samsung Galaxy S24 8 GB/256 GB čierny', 9, 'Samsung', 'Samsung', 959.00, 167.00, 1, NULL, 'uploads/Samsung S24.webp'),
(42, 'Samsung Galaxy S23 5G 256 GB čierna', 9, 'Samsung', 'Samsung', 859.00, 167.00, 9, NULL, 'uploads/Samsung S23.webp'),
(43, 'Samsung Galaxy S24 Ultra 12 GB/512 GB čierny titán', 9, 'Samsung', 'Samsung', 1569.00, 167.00, 4, NULL, 'uploads/Sam s24 ultra.webp'),
(44, 'Samsung Galaxy S24+ 12 GB/512 GB čierny', 9, 'Samsung', 'Samsung', 1269.00, 167.00, 1, NULL, 'uploads/Sam s24+.webp'),
(45, 'Samsung Galaxy A54 5G 8 GB/256 GB grafitová', 9, 'Samsung', 'Samsung', 358.00, 167.00, 7, NULL, 'uploads/sam 5G.webp'),
(46, 'Samsung Galaxy A54 5G 8 GB/256 GB grafitová', 9, 'Samsung', 'Samsung', 358.00, 167.00, 7, NULL, 'uploads/sam 5G.webp');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'ferko', 'heslo', 'ferko@gmail.com');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
