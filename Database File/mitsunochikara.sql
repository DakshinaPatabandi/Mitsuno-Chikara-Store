-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 27, 2024 at 09:07 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitsunochikara`
--

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

DROP TABLE IF EXISTS `cakes`;
CREATE TABLE IF NOT EXISTS `cakes` (
  `cake_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `shape` varchar(50) DEFAULT NULL,
  `fillings` varchar(255) DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `icing` varchar(255) DEFAULT NULL,
  `toppings` varchar(255) DEFAULT NULL,
  `more_options` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` varchar(50) DEFAULT 'Pending',
  PRIMARY KEY (`cake_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`cake_id`, `user_name`, `user_email`, `number`, `theme`, `size`, `shape`, `fillings`, `colors`, `icing`, `toppings`, `more_options`, `created_at`, `payment_status`) VALUES
(50, 'Rashmika chamod', 'rashmikachamod456@gmail.com', 761258645, 'wedding', '2.5kg', 'Staircase', 'Buttercream', 'yellow', 'Royal Icing', 'Edible Flowers', 'It should be in 2 layers. Fresh flowers should add to the top layer', '2024-03-27 08:36:14', 'completed'),
(38, 'Kavisha Hansanee', 'hansikaveesha627@gmail.com', 785689251, 'Wedding Cake', '4kg', 'Round', 'Custard', 'white', 'Butter Cream', 'Coconut Enveloping', 'It should be in 2 layers. Fresh flowers should add to top layer.', '2024-03-26 07:43:31', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=267 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(247, 'CUST000032', 'PROD000003', 1),
(256, 'CUST000037', 'PROD000016', 3),
(255, 'CUST000037', 'PROD000019', 1),
(254, 'CUST000037', 'PROD000021', 5),
(266, 'CUST000040', 'PROD000019', 1),
(265, 'CUST000040', 'PROD000021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

DROP TABLE IF EXISTS `customer_address`;
CREATE TABLE IF NOT EXISTS `customer_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `apartment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`id`, `user_id`, `street_address`, `apartment`, `city`, `state`, `postal_code`) VALUES
(14, 'CUST000006', 'Suhada Mw', '01', 'Panadura', 'Wekada', '12500'),
(2, 'CUST000004', 'Soloman rd', '66', 'Panadura', 'Wekada', '12500'),
(16, 'CUST000032', 'Soloman Rd', '01', 'Panadura', 'Wekada', '12500'),
(17, 'CUST000005', 'Soloman Rd', '66', 'Panadura', 'Wekada', '12500'),
(18, 'CUST000033', 'Soloman Rd', '43', 'Panadura', 'Wekada', '12500'),
(19, 'CUST000037', 'Vaidya Road', '74/6', 'Moratuwa', 'Egodauyana', '250'),
(20, 'CUST000040', 'Vaidya Road', '74/6', 'Moratuwa', 'Egodauyana', '250');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `Emp_id`, `name`, `number`, `email`, `position`, `salary`) VALUES
(2, 'EMP000001', 'migara', 1234, 'migara@gmail.com', 'cashier', 25000),
(3, 'EMP000003', 'malitha', 71845, 'malithasupun@gmail.com', 'Cashier', 88686);

--
-- Triggers `employees`
--
DROP TRIGGER IF EXISTS `employees_before_insert`;
DELIMITER $$
CREATE TRIGGER `employees_before_insert` BEFORE INSERT ON `employees` FOR EACH ROW BEGIN
    DECLARE next_id INT UNSIGNED;
    DECLARE new_code VARCHAR(20);
    
    -- get the next auto_increment value
    SELECT AUTO_INCREMENT INTO next_id
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'employees';
    
    -- generate a unique code value
    SET new_code = '';
    REPEAT
        SET new_code = CONCAT('EMP', LPAD(next_id, 6, '0'));
        SET next_id = next_id + 1;
    UNTIL NOT EXISTS (SELECT id FROM employees WHERE  emp_id = new_code) END REPEAT;
    
    -- set the code value in the new row
    SET NEW.emp_id = new_code;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(500) NOT NULL,
  `total_price` int(11) NOT NULL,
  `placed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` varchar(255) NOT NULL,
  `qr_status` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`, `qr_status`) VALUES
(135, 'ORDR000120', 'CUST000034', 'rithik', 1234567, 'rithikzoysa@gmail.com', 'cash on delivery', ', 56, fd, 5gf, 454', 'Conditioner (3700 x 2)', 7400, '2023-06-09 08:15:42', 'completed', 'sent'),
(136, 'ORDR000136', 'CUST000033', 'Migara Kavishan', 123445, 'migarakavishan43@gmail.com', 'cash on delivery', '43, Soloman Rd, Panadura, Wekada, 12500', 'Blood Pressure (40000 x 1)', 40000, '2024-03-06 09:29:14', 'pending', 'sent'),
(134, 'ORDR000119', 'CUST000034', 'rithik', 1234567, 'rithikzoysa@gmail.com', 'cash on delivery', '01,, pnadura, wekada, 12500', 'Shampoo (1200 x 2), Blood Pressure (40000 x 1)', 42400, '2023-06-09 08:08:43', 'pending', 'sent'),
(137, 'ORDR000137', 'CUST000036', 'kavihsa', 2341546, 'hansikaveesha627@gmail.com', 'cash on delivery', 'vaidya mawatha, moratuwa, egodauyana, 204', 'Vanila Cup Cake (400 x 1)', 400, '2024-03-07 04:26:45', 'pending', 'sent'),
(141, 'ORDR000141', 'CUST000040', 'Kavisha Hansanee', 785689251, 'hansikaveesha627@gmail.com', 'cash on delivery', '74/6, Vaidya Road, Moratuwa, Egodauyana, 250', 'Orange Cake (5000 x 1), Birthday Cake (8000 x 1), strawberry cake (8000 x 1)', 21000, '2024-03-24 08:45:36', 'pending', 'sent');

--
-- Triggers `orders`
--
DROP TRIGGER IF EXISTS `orders_before_insert`;
DELIMITER $$
CREATE TRIGGER `orders_before_insert` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
    DECLARE next_id INT UNSIGNED;
    DECLARE new_code VARCHAR(20);
    
    -- get the next auto_increment value
    SELECT AUTO_INCREMENT INTO next_id
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'orders';
    
    -- generate a unique code value
    SET new_code = '';
    REPEAT
        SET new_code = CONCAT('ORDR', LPAD(next_id, 6, '0'));
        SET next_id = next_id + 1;
    UNTIL NOT EXISTS (SELECT id FROM orders WHERE  order_id = new_code) END REPEAT;
    
    -- set the code value in the new row
    SET NEW.order_id = new_code;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` varchar(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `name`, `price`, `image`) VALUES
(25, 'PROD000020', 'strawberry cake', 8000, 'landing_img.jpg'),
(26, 'PROD000021', 'Vanila Cup Cake', 400, 'cup.jpg'),
(24, 'PROD000019', 'Birthday Cake', 8000, 'delicious-cake-candles-arrangement.jpg'),
(23, 'PROD000018', 'Orange Cake', 5000, 'Orange-Cake-Recipe-From-Scratch.jpg'),
(21, 'PROD000016', 'Cup Cakes', 600, 'download.jpg'),
(19, 'PROD000014', 'Chocolate Cake', 4000, 'birth.jpg'),
(29, 'PROD000029', '3 Layer Wedding Cake', 25000, 'wedding.jpg');

--
-- Triggers `products`
--
DROP TRIGGER IF EXISTS `products_before_insert`;
DELIMITER $$
CREATE TRIGGER `products_before_insert` BEFORE INSERT ON `products` FOR EACH ROW BEGIN
    DECLARE next_id INT UNSIGNED;
    DECLARE new_code VARCHAR(20);
    
    -- get the next auto_increment value
    SELECT AUTO_INCREMENT INTO next_id
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'products';
    
    -- generate a unique code value
    SET new_code = '';
    REPEAT
        SET new_code = CONCAT('PROD', LPAD(next_id, 6, '0'));
        SET next_id = next_id + 1;
    UNTIL NOT EXISTS (SELECT id FROM products WHERE  product_id = new_code) END REPEAT;
    
    -- set the code value in the new row
    SET NEW.product_id = new_code;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_id`, `name`, `email`, `phone`) VALUES
(2, 'SUPP000001', 'hhjfhh', 'cxczczc@mail.com', 1234567809),
(6, 'SUPP000006', 'fernando', 'fernando@gmail.com', 12145323);

--
-- Triggers `suppliers`
--
DROP TRIGGER IF EXISTS `suppliers_before_insert`;
DELIMITER $$
CREATE TRIGGER `suppliers_before_insert` BEFORE INSERT ON `suppliers` FOR EACH ROW BEGIN
    DECLARE next_id INT UNSIGNED;
    DECLARE new_code VARCHAR(20);
    
    -- get the next auto_increment value
    SELECT AUTO_INCREMENT INTO next_id
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'suppliers';
    
    -- generate a unique code value
    SET new_code = '';
    REPEAT
        SET new_code = CONCAT('SUPP', LPAD(next_id, 6, '0'));
        SET next_id = next_id + 1;
    UNTIL NOT EXISTS (SELECT id FROM suppliers WHERE  supplier_id = new_code) END REPEAT;
    
    -- set the code value in the new row
    SET NEW.supplier_id = new_code;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `name`, `number`, `password`) VALUES
(40, 'CUST000040', 'hansikaveesha627@gmail.com', 'Kavisha Hansanee', 785689256, '$2y$10$SYK5.FgD1mzlwKa8J0qXMeH62v3bbqT1w2oeJY2POJ4H9E7FFhe6C'),
(38, 'CUST000036', 'rashmikachamod456@gmail.com', 'Rashmika chamod', 761258645, '$2y$10$RKWkJ8pQH2U/8sPXtiGR6uzX2P5Exg7kvUOdfD1kPMCtHVd4DTYAy');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `mytable_before_insert`;
DELIMITER $$
CREATE TRIGGER `mytable_before_insert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE next_id INT UNSIGNED;
    DECLARE new_code VARCHAR(20);
    
    -- get the next auto_increment value
    SELECT AUTO_INCREMENT INTO next_id
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'users';
    
    -- generate a unique code value
    SET new_code = '';
    REPEAT
        SET new_code = CONCAT('CUST', LPAD(next_id, 6, '0'));
        SET next_id = next_id + 1;
    UNTIL NOT EXISTS (SELECT id FROM users WHERE user_id = new_code) END REPEAT;
    
    -- set the code value in the new row
    SET NEW.user_id = new_code;
END
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
