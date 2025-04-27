-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 02:05 PM
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
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Database: `businessdb`
--
CREATE DATABASE IF NOT EXISTS `businessdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `businessdb`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `reg_date`) VALUES
(1, 'lahiru', '123', '2025-02-26 22:00:01'),
(2, 'buthsara', 'pineapple1', '2025-02-26 22:12:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `fashion_db`
--
CREATE DATABASE IF NOT EXISTS `fashion_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fashion_db`;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(20) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `tumb` varchar(100) NOT NULL,
  `stock` int(10) NOT NULL,
  `product_details` text NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);
--
-- Database: `myfirstdatabase`
--
CREATE DATABASE IF NOT EXISTS `myfirstdatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `myfirstdatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime(),
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment_text`, `created_at`, `users_id`) VALUES
(1, 'Krossing', 'This is a comment', '2025-02-27 08:12:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `created_at`) VALUES
(1, 'Krossing', 'dani123', 'johndoe@gmail.com', '2025-02-27 07:40:59'),
(2, 'BasselsCool', 'basse456', 'base@gmail.com', '2025-02-27 07:46:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
--
-- Database: `online_fashion_store_management_system`
--
CREATE DATABASE IF NOT EXISTS `online_fashion_store_management_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `online_fashion_store_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(15) NOT NULL,
  `Customer_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `Cart_id` int(15) NOT NULL,
  `Product_id` int(15) NOT NULL,
  `Quantity` int(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` int(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `Id` int(10) NOT NULL,
  `Order_id` int(15) DEFAULT NULL,
  `Delivery_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Id` int(15) NOT NULL,
  `Customer_id` int(15) DEFAULT NULL,
  `Message_type` varchar(9) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `Id` int(15) NOT NULL,
  `Phone_number` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Address_type` varchar(7) NOT NULL,
  `Payment_method` varchar(20) NOT NULL,
  `Ordered_date` date NOT NULL,
  `Ordered_time` time NOT NULL,
  `Payment_status` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Cart_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` double(8,2) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Image` mediumblob DEFAULT NULL,
  `Stock` int(6) DEFAULT 0,
  `Product_detail` text NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Admin_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `Id` int(15) NOT NULL,
  `Customer_Id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_product`
--

CREATE TABLE `wishlist_product` (
  `Wishlist_id` int(15) NOT NULL,
  `Product_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`Cart_id`,`Product_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Order_id` (`Order_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Cart_id` (`Cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Customer_Id` (`Customer_Id`);

--
-- Indexes for table `wishlist_product`
--
ALTER TABLE `wishlist_product`
  ADD PRIMARY KEY (`Wishlist_id`,`Product_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`Cart_id`) REFERENCES `cart` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`Order_id`) REFERENCES `order_table` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`Cart_id`) REFERENCES `cart` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `admin` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customer` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `wishlist_product`
--
ALTER TABLE `wishlist_product`
  ADD CONSTRAINT `wishlist_product_ibfk_1` FOREIGN KEY (`Wishlist_id`) REFERENCES `wishlist` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_product_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"tablemanagement\",\"table\":\"users\"},{\"db\":\"tablemanagement\",\"table\":\"tablemanager\"},{\"db\":\"tablemanagement\",\"table\":\"customermanager\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-06-13 08:57:55', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"en_GB\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `slgs`
--
CREATE DATABASE IF NOT EXISTS `slgs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `slgs`;
--
-- Database: `tablemanagement`
--
CREATE DATABASE IF NOT EXISTS `tablemanagement` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tablemanagement`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` varchar(25) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Image` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customermanager`
--

CREATE TABLE `customermanager` (
  `id` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `timeSlotNo` int(2) NOT NULL,
  `tableA` varchar(1) NOT NULL,
  `tableB` varchar(1) NOT NULL,
  `tableC` varchar(1) NOT NULL,
  `tableD` varchar(1) NOT NULL,
  `tableE` varchar(1) NOT NULL,
  `tableF` varchar(1) NOT NULL,
  `price` int(30) NOT NULL,
  `submitday` varchar(20) NOT NULL,
  `submittime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customermanager`
--

INSERT INTO `customermanager` (`id`, `username`, `contact`, `address`, `email`, `date`, `timeSlotNo`, `tableA`, `tableB`, `tableC`, `tableD`, `tableE`, `tableF`, `price`, `submitday`, `submittime`) VALUES
(1395, 'Ganga Liyanage', '0786543120', 'No,171/5,Beach rd,Panadura', 'ganga12@gmail.com', '2024-08-22', 2, '', '', 'Y', '', '', '', 1500, '2024-May-26', '03:23:25 AM'),
(1396, 'Ganga Liyanage', '0786543120', 'No,171/5,Beach rd,Panadura', 'ganga12@gmail.com', '2024-08-22', 2, '', '', '', '', '', 'Y', 1500, '2024-May-26', '03:23:25 AM'),
(1397, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 1, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1398, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 1, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1399, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 2, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1400, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 2, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1401, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 3, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1402, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 3, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1403, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 4, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1404, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 4, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1405, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 5, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1406, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 5, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1407, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 6, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1408, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 6, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1409, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 7, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1410, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 7, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1411, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 8, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1412, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 8, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1413, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 9, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1414, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 9, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1415, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 10, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1416, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 10, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1417, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 11, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1418, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 11, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1419, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 12, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1420, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-09', 12, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1421, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 1, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1422, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 1, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1423, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 2, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1424, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 2, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1425, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 3, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1426, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 3, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1427, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 4, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1428, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 4, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1429, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 5, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1430, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 5, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1431, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 6, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1432, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 6, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1433, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 7, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1434, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 7, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1435, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 8, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1436, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 8, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1437, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 9, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1438, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 9, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1439, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 10, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1440, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 10, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1441, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 11, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1442, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 11, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1443, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 12, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1444, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-10', 12, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1445, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 1, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1446, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 1, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1447, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 2, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1448, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 2, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1449, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 3, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1450, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 3, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1451, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 4, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1452, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 4, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1453, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 5, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1454, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 5, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1455, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 6, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1456, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 6, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1457, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 7, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1458, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 7, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1459, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 8, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1460, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 8, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1461, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 9, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1462, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 9, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1463, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 10, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1464, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 10, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1465, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 11, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1466, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 11, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1467, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 12, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1468, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-11', 12, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1469, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 1, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1470, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 1, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1471, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 2, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1472, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 2, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1473, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 3, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1474, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 3, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1475, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 4, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1476, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 4, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1477, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 5, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1478, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 5, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1479, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 6, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1480, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 6, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1481, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 7, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1482, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 7, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1483, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 8, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1484, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 8, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1485, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 9, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1486, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 9, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1487, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 10, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1488, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 10, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1489, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 11, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1490, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 11, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1491, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 12, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1492, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-12', 12, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1493, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 1, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1494, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 1, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1495, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 2, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1496, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 2, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1497, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 3, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1498, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 3, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1499, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 4, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1500, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 4, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1501, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 5, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1502, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 5, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1503, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 6, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1504, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 6, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1505, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 7, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1506, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 7, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1507, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 8, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1508, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 8, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1509, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 9, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1510, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 9, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1511, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 10, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1512, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 10, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1513, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 11, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1514, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 11, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1515, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 12, '', '', '', '', 'Y', '', 60000, '2024-May-26', '03:27:04 AM'),
(1516, 'Saman Perera', '0771006904', 'No.12,Udayana Rd,Colombo 07', 'saman23@gmail.com', '2024-07-13', 12, '', '', '', '', '', 'Y', 60000, '2024-May-26', '03:27:04 AM'),
(1517, 'Sarasi Disanayaka', '0712396501', 'No.12B,Flower rd,Borelesgamuva', 'sarasidisanayaka@gmail.com', '2024-06-06', 3, 'Y', '', '', '', '', '', 4200, '2024-May-26', '03:33:12 AM'),
(1518, 'Sarasi Disanayaka', '0712396501', 'No.12B,Flower rd,Borelesgamuva', 'sarasidisanayaka@gmail.com', '2024-06-06', 3, '', 'Y', '', '', '', '', 4200, '2024-May-26', '03:33:12 AM'),
(1519, 'Sarasi Disanayaka', '0712396501', 'No.12B,Flower rd,Borelesgamuva', 'sarasidisanayaka@gmail.com', '2024-06-07', 3, 'Y', '', '', '', '', '', 4200, '2024-May-26', '03:33:12 AM'),
(1520, 'Sarasi Disanayaka', '0712396501', 'No.12B,Flower rd,Borelesgamuva', 'sarasidisanayaka@gmail.com', '2024-06-07', 3, '', 'Y', '', '', '', '', 4200, '2024-May-26', '03:33:12 AM'),
(1521, 'Sarasi Disanayaka', '0712396501', 'No.12B,Flower rd,Borelesgamuva', 'sarasidisanayaka@gmail.com', '2024-06-08', 3, 'Y', '', '', '', '', '', 4200, '2024-May-26', '03:33:12 AM'),
(1522, 'Sarasi Disanayaka', '0712396501', 'No.12B,Flower rd,Borelesgamuva', 'sarasidisanayaka@gmail.com', '2024-06-08', 3, '', 'Y', '', '', '', '', 4200, '2024-May-26', '03:33:12 AM'),
(1523, 'Sarasi Disanayaka', '0712396501', 'No.12B,Flower rd,Borelesgamuva', 'sarasidisanayaka@gmail.com', '2024-06-09', 3, 'Y', '', '', '', '', '', 4200, '2024-May-26', '03:33:12 AM'),
(1524, 'Sarasi Disanayaka', '0712396501', 'No.12B,Flower rd,Borelesgamuva', 'sarasidisanayaka@gmail.com', '2024-06-09', 3, '', 'Y', '', '', '', '', 4200, '2024-May-26', '03:33:12 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tablemanager`
--

CREATE TABLE `tablemanager` (
  `vipNormalTableCount` int(3) NOT NULL,
  `vipSpecialTableCount` int(3) NOT NULL,
  `vipNormalSeatCount` int(2) NOT NULL,
  `vipSpecialSeatCount` int(2) NOT NULL,
  `vipNormalTablePrice` int(10) NOT NULL,
  `vipSpecialTablePrice` int(10) NOT NULL,
  `outdoorNormalTableCount` int(3) NOT NULL,
  `outdoorSpecialTableCount` int(3) NOT NULL,
  `outdoorNormalSeatCount` int(2) NOT NULL,
  `outdoorSpecialSeatCount` int(2) NOT NULL,
  `outdoorNormalTablePrice` int(10) NOT NULL,
  `outdoorSpecialTablePrice` int(10) NOT NULL,
  `firstFloorNormalTableCount` int(3) NOT NULL,
  `firstFloorSpecialTableCount` int(3) NOT NULL,
  `firstFloorNormalSeatCount` int(2) NOT NULL,
  `firstFloorSpecialSeatCount` int(2) NOT NULL,
  `firstFloorNormalTablePrice` int(10) NOT NULL,
  `firstFloorSpecialTablePrice` int(10) NOT NULL,
  `no` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tablemanager`
--

INSERT INTO `tablemanager` (`vipNormalTableCount`, `vipSpecialTableCount`, `vipNormalSeatCount`, `vipSpecialSeatCount`, `vipNormalTablePrice`, `vipSpecialTablePrice`, `outdoorNormalTableCount`, `outdoorSpecialTableCount`, `outdoorNormalSeatCount`, `outdoorSpecialSeatCount`, `outdoorNormalTablePrice`, `outdoorSpecialTablePrice`, `firstFloorNormalTableCount`, `firstFloorSpecialTableCount`, `firstFloorNormalSeatCount`, `firstFloorSpecialSeatCount`, `firstFloorNormalTablePrice`, `firstFloorSpecialTablePrice`, `no`) VALUES
(5, 5, 4, 6, 800, 1000, 8, 2, 3, 6, 500, 600, 16, 4, 4, 6, 450, 600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `contact`) VALUES
('Amara 12', 'tr76ty', '', '0725689765'),
('anura', '578', 'anura23@yahoo.com', '0734091200'),
('anushka', 'anu23', 'anu23@gmail.com', '0776002143'),
('chintaka12', '6782er', 'bethmal@gmail.com', '0714567909'),
('deshan34', '@deshan', '', '0702359889'),
('ganga145', 'gh5690', 'ganga12i@gmail.com', '0798349009'),
('JohnSilva', '<>/?', 'john@yahoo,com', '0782345712'),
('kamal1', 'kp12', 'kamal17@gmail.com', '0772178748'),
('kamal123', '123', 'kamal@gmail.com', '0702348746'),
('Kamal78', 'kamal', 'kamal78@gmail.com', '0754509861'),
('kusal29', 'kusal29', 'pereral78@gmail.com', '0738509254'),
('kusalkurruppu', '345#234', '', '0721006604'),
('nayana kumari56', 'njn67899', 'naykumari@gmail.com', '0712349009'),
('nethmi', '#ty*ui', '', '0768123123'),
('nishanthaPerera', '6890', 'nis23@yahoo,com', '0715518976'),
('pasan', '68904', '', '0771008748'),
('pasindu10', '7890', 'pasindurathnayaka3@yahoo.com', '0771006745'),
('priyankara', '098', '', '0723458909'),
('roshan', 'dj123', 'roshan90@yahoo.com', '0762309786'),
('saman345', 'kl098', 'saman23@gmail.com', '0771006904'),
('samantha12', '123', '', '0718138516'),
('saranga45', '6905', 'saran345@gmail.com', '0718167900'),
('sarasi', '#76weu', 'sarasidisanayaka@gmail.com', '0712396501'),
('sayuri34', '4423', 'sayuripriyangi5@gmail.com', '0759796009'),
('siripala23', '2456', 'siri23@yahoo.com', '0781000213'),
('somasiri23', 'sri%#', '', '0775623908');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `customermanager`
--
ALTER TABLE `customermanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customermanager`
--
ALTER TABLE `customermanager`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1525;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `textile`
--
CREATE DATABASE IF NOT EXISTS `textile` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `textile`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `date` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `subject`, `content`, `date`, `userid`) VALUES
(1, 'DTK holdings', '', '0000-00-00 00:00:00', 0),
(2, 'DTK Holdings', 'dff ghvvsgv', '2020-06-25 18:21:56', 0),
(3, 'pysics', 'dcnjkdn jndkxkjn', '2025-02-25 16:09:57', 0),
(4, 'n dc', 'cdc', '2025-02-25 16:11:25', 0),
(5, 'cc', 'cdcdcv', '2025-02-25 16:11:25', 0),
(6, '', 'nn', '2025-02-25 17:04:44', 0),
(7, '', 'nn', '2025-02-25 17:04:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(40) DEFAULT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'DTK', 'Academy', 'info@dtkholdings.com', 'pass'),
(2, 'Damith', 'Kalansooriya', 'damith@gmail.com', 'damithpass'),
(4, '', '=', '', ''),
(5, '', '=', '', ''),
(6, 'lahiru', 'buthsara=', 'lahiruwijesekara4@gmail.com', '8909'),
(7, 'bb', 'njjj=', 'lahirubuthsarawijesekara@gmail', 'jjjj'),
(8, 'b n', 'nn', 'nnm', 'n nn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
