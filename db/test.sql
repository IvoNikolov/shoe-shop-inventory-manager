-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 юли 2019 в 20:32
-- Версия на сървъра: 5.7.17-log
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Структура на таблица `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_index` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `brand_index`, `origin`, `date_added`, `date_modified`) VALUES
(1, 'NIKE', 'NIKEVT', 'Vietnam', '2019-04-30 13:57:48', '2019-04-30 13:57:48'),
(2, 'Adidas', 'ADDGER', 'Germany', '2019-04-30 14:06:40', '2019-04-30 14:10:25'),
(3, 'NIKE US', 'NIKEUS', 'Canada & USA', '2019-05-05 14:04:45', '2019-05-05 14:05:29');

-- --------------------------------------------------------

--
-- Структура на таблица `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `data_log` varchar(255) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `log`
--

INSERT INTO `log` (`id`, `data_log`, `date_added`, `user_id`) VALUES
(1, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(2, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(3, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(4, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(5, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(6, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(7, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(8, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(9, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(10, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(11, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(12, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(13, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(14, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(15, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(16, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(17, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(18, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(19, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(20, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(21, 'edit_shop', '2019-07-09 15:33:18', 'Ivan'),
(22, 'add_merchandise', '2019-07-10 16:07:14', 'Ivan');

-- --------------------------------------------------------

--
-- Структура на таблица `merchandise`
--

CREATE TABLE `merchandise` (
  `id` int(255) NOT NULL,
  `shoe_index` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `size` int(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `merchandise`
--

INSERT INTO `merchandise` (`id`, `shoe_index`, `brand`, `type`, `sex`, `size`, `color`, `price`, `date_added`, `date_modified`) VALUES
(2, 'Tr323', '1', 'Casual', 'Female', 42, 'blue', '22', '2019-04-21 16:39:23', '0000-00-00 00:00:00'),
(3, 'LC3232', '1', 'Casual', 'Male', 34, 'red', '23', '2019-04-21 16:33:08', '2019-04-21 15:59:37'),
(4, '3000', '2', 'Sport', 'Male', 34, 'red', '23', '2019-04-21 16:33:47', '2019-04-20 15:18:22'),
(5, '3000', '3', 'Casual', 'Male', 34, 'red', '23', '2019-04-21 16:45:11', '2019-04-20 15:19:42'),
(6, '3000', '1', 'Casual', 'Male', 34, 'blue', '23', '2019-04-21 16:43:41', '2019-04-20 17:40:11'),
(7, 'INDEX1', '1', 'Casual', 'female', 34, 'red', '48.30', '2019-04-23 17:42:26', '2019-04-23 17:42:26'),
(8, 'Test2', '2', 'Casual', 'male', 34, 'red', '22', '2019-04-23 19:39:23', '2019-04-23 19:39:23'),
(9, 'LC3232', '3', 'Sport', 'male', 35, 'red', '50.00', '2019-07-03 16:39:45', '2019-07-03 16:39:45'),
(10, '3000', '1', 'Casual', 'male', 39, 'blue', '50.00', '2019-07-10 16:07:14', '2019-07-10 16:07:14');

-- --------------------------------------------------------

--
-- Структура на таблица `origin`
--

CREATE TABLE `origin` (
  `id` int(11) NOT NULL,
  `origin_country` varchar(255) DEFAULT NULL,
  `origin_city` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `origin`
--

INSERT INTO `origin` (`id`, `origin_country`, `origin_city`, `phone_number`, `date_added`, `date_modified`) VALUES
(1, 'Germany', 'Berlin', '+49213123', '2019-05-05 15:10:09', '2019-05-05 15:10:09'),
(2, 'Vietname', 'Ho Chi Minh', '+8412321', '2019-05-05 15:11:42', '2019-05-05 15:11:42'),
(3, 'Canada', 'Ontario', '+17373222', '2019-05-05 15:12:12', '2019-05-05 15:12:12');

-- --------------------------------------------------------

--
-- Структура на таблица `shipment`
--

CREATE TABLE `shipment` (
  `id` int(255) NOT NULL,
  `shipment_number` int(255) NOT NULL,
  `shipment_origin` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_street` varchar(255) DEFAULT NULL,
  `shop_city` varchar(255) DEFAULT NULL,
  `shop_country` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `shop_street`, `shop_city`, `shop_country`, `employees`, `date_added`, `date_modified`) VALUES
(1, 'Shoe Shop Sofia', 'Kiril Mladenov 5', 'Varna', 'Bulgaria', 1, '2019-07-07 08:30:22', '2019-07-09 15:33:18'),
(2, 'Shoe Shop Jimbo', 'Stefan Popov 3', 'Sofia', 'Bulgaria', 5, '2019-07-09 15:27:32', '2019-07-09 15:27:32');

-- --------------------------------------------------------

--
-- Структура на таблица `test_table`
--

CREATE TABLE `test_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `test_table`
--

INSERT INTO `test_table` (`id`, `name`, `family_name`, `password`) VALUES
(12, 'Johny', 'Smith', 121213),
(14, 'Cat', 'Dog', 909090),
(15, 'Das', 'Smith', 434343),
(17, 'Sam', 'neo', 111112),
(19, 'Tim', 'Neves', 121212),
(20, 'Иво', 'Nikolov', 1231231),
(21, 'James', 'Steveson', 6839254),
(22, 'Xixixi', 'Mass', 453512),
(23, 'Donna', 'Smitg', 121212),
(24, 'Tomas', 'Shushs', 123344),
(25, 'Damina', 'Nikolova', 1231231);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `user_id` varchar(65) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `role` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `email`, `first_name`, `last_name`, `role`) VALUES
(1, 'Ivo', 'asdass', 'bites_ivo@abv.bg', 'Ivo', 'Nikolov', 2),
(2, 'Ivo', '372a4c5d764d2bb399d91a9cbf6fbae0', 'bites_ivo@abv.bg', 'Ivo', 'Nikolov', 3),
(3, 'Nike', '96e79218965eb72c92a549dd5a330112', 'nike@abv.bg', 'Nike', 'Nike', 4),
(4, 'Ivan', '96e79218965eb72c92a549dd5a330112', 'ivan.nik@abv.bg', 'Ivan', 'Nikolov', 1),
(5, 'Tim89', '96e79218965eb72c92a549dd5a330112', 'timmy89@timmy.com', 'Timothy', 'Samsung', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Sales Associate'),
(3, 'Cashier'),
(4, 'Customer Service Representative'),
(5, 'Buyer'),
(6, 'Store Manager'),
(7, 'Assistant Store Manager'),
(8, 'Inventory Control Specialist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origin`
--
ALTER TABLE `origin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_table`
--
ALTER TABLE `test_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `origin`
--
ALTER TABLE `origin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_table`
--
ALTER TABLE `test_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
