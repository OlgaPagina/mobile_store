-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 03:18 AM
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
-- Database: `mobile_hour`
--

-- --------------------------------------------------------

--
-- Table structure for table `changelog`
--

CREATE TABLE `changelog` (
  `changelog_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_last_modified` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `changelog`
--

INSERT INTO `changelog` (`changelog_id`, `date_created`, `date_last_modified`, `user_id`, `product_id`) VALUES
(1, '2024-01-15', '2024-02-10', 1, 1),
(2, '2024-01-10', '2024-02-12', 2, 2),
(3, '2024-01-11', '2024-02-10', 2, 1),
(4, '2024-01-24', '2024-02-14', 3, 3),
(5, '2024-01-09', '2024-02-14', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `cust_phone` varchar(45) NOT NULL,
  `cust_address` varchar(45) NOT NULL,
  `postcode` int(11) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `cust_phone`, `cust_address`, `postcode`, `city`, `state`) VALUES
(1, 'Kris', 'Torn', '0410123654', '12 qwertyuyui', 4500, 'Brisbane', 'QLD'),
(2, 'Julia', 'Morton', '0470523369', '12 poiuuyu', 4500, 'Brisbane', 'QLD'),
(3, 'Anna', 'Front', '0475369852', '43 fdghxvnm', 3000, 'Melbourne', 'VIC'),
(4, 'Andrew', 'Madison', '0406369852', '35 rihgrejihgrehif', 3000, 'Melbourne', 'VIC'),
(5, 'Paul', 'Stock', '0410123665', '85 ghfghhtrhtrhtrh', 2000, 'Sydney', 'NSW'),
(6, 'Kate', 'Polson', '0410256963', '45 fgbfghtrhtrhtrbdfbfd', 2000, 'Sydney', 'NSW');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `feature_id` int(11) NOT NULL,
  `weight` varchar(45) NOT NULL,
  `dimensions` varchar(45) NOT NULL,
  `OS` varchar(45) NOT NULL,
  `screensize` varchar(45) NOT NULL,
  `resolution` varchar(45) NOT NULL,
  `CPU` varchar(45) NOT NULL,
  `RAM` varchar(45) NOT NULL,
  `storage` varchar(45) NOT NULL,
  `battery` varchar(45) NOT NULL,
  `rear_camera` varchar(45) NOT NULL,
  `front_camera` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`feature_id`, `weight`, `dimensions`, `OS`, `screensize`, `resolution`, `CPU`, `RAM`, `storage`, `battery`, `rear_camera`, `front_camera`) VALUES
(1, '180', '160.8 x 78.1 x 7.8 mm', 'iOS', '6.1 inches', '1170 x 2532', '5', '6 gb', '128 gb', '3.279 mAh', '8 mp', '12 mp'),
(2, '182', '161.5 x 75.2 x 7.9 mm', 'Android', '6.2 inches', '1165 x 2530', '4', '6 gb', '128 gb', '3.128 mAh', '9 mp', '12 mp');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_number` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_delivery_date` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_number`, `order_date`, `order_delivery_date`, `customer_id`) VALUES
(1, '2024-02-18', '2024-02-20', 2),
(2, '2024-02-18', '2024-02-21', 3),
(3, '2024-02-19', '2024-02-22', 2),
(4, '2024-02-19', '2024-02-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detais_idl` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_sold` decimal(10,2) NOT NULL,
  `order_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detais_idl`, `product_id`, `quantity`, `price_sold`, `order_number`) VALUES
(1, 1, 1, 1500.00, 1),
(2, 3, 2, 1000.00, 2),
(3, 2, 3, 1300.00, 3),
(4, 1, 2, 1500.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_model` varchar(45) NOT NULL,
  `manufacturer` varchar(45) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_on_hand` varchar(45) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_model`, `manufacturer`, `price`, `stock_on_hand`, `feature_id`) VALUES
(1, 'Iphone', '1', 'Apple', 1500.00, '50', 1),
(2, 'Samsung', '1', 'Samsung', 1300.00, '30', 2),
(3, 'Huawei', '1', 'Huawei', 1000.00, '20', 6),
(4, 'Iphone', '2', 'Apple', 1700.00, '45', 8),
(5, 'Samsung', '2', 'Samsung', 1400.00, '25', 4),
(6, 'Huawei', '2', 'Huawei', 1100.00, '15', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `user_role` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `user_role`, `username`, `user_password`) VALUES
(1, 'Olga', 'Pagina', 'manager', 'OP', '123456'),
(2, 'Maria', 'Piters', 'manager', 'MP', '123456'),
(3, 'Scott', 'Topmson', 'administrator', 'ST', '123456'),
(4, 'Oliver', 'Twist', 'administrator', 'OT', '123456'),
(5, 'Anna', 'Front', 'customer', 'AF', '123456'),
(6, 'Andrew', 'Madison', 'customer', 'AM', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `changelog`
--
ALTER TABLE `changelog`
  ADD PRIMARY KEY (`changelog_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detais_idl`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `changelog`
--
ALTER TABLE `changelog`
  MODIFY `changelog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detais_idl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
