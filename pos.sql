-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 05:54 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_name` varchar(100) NOT NULL,
  `cart_description` varchar(200) NOT NULL,
  `product_price` double(20,2) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total_amount` double(20,2) NOT NULL,
  `product_media` varchar(200) NOT NULL,
  `transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cashier` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `employee_username` varchar(50) NOT NULL,
  `employee_password` varchar(200) NOT NULL,
  `employee_access` varchar(15) NOT NULL,
  `employee_media` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `logs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_username`, `employee_password`, `employee_access`, `employee_media`, `status`, `logs`) VALUES
(1, 'admin', 'admin', '$2y$10$2.nuwm/5OLXJ.zGT6ANfEOI6l1GVEz8vvuY8SwEEpkwy1fkKEwZYy', 'admin', 'upl/1550994995_upload.png', 'active', 'logout'),
(2, 'Ericson Ranolo', 'employee1', '$2y$10$/5HdUaGzoOaqACvNh5JFX.kJV5G4KJfwEJTm4jEcCnew8yqxVfzrO', 'employee', 'upl/1552534138_2019-03-09_010136.png', 'active', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_price` double(20,2) NOT NULL,
  `total_stock` int(50) NOT NULL,
  `remaining_stock` int(50) NOT NULL,
  `barcode_no` varchar(200) NOT NULL,
  `product_media` varchar(200) NOT NULL,
  `notif_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_price`, `total_stock`, `remaining_stock`, `barcode_no`, `product_media`, `notif_status`) VALUES
(1, 'Lucky Me ace', 'La paz Batchoy Original', 20.00, 20, 14, '4807770271168', 'img/upload-product.png', 1),
(2, 'Lucky Me', 'La paz Batchoy Spicy\r\n', 20.00, 12, 0, '4801770873810', 'img/upload-product.png', 1),
(3, 'Pancit Canton', 'Kalamansi', 24.00, 10, 3, '4807770273841', 'img/upload-product.png', 1),
(4, 'Nissin Cup Noodles', 'Beef', 20.00, 1, 1, '4800016552106', 'img/upload-product.png', 1),
(5, 'Nissin Cup Noodles', 'Seafood\r\n', 20.00, 4, 3, '4800016552113', 'img/upload-product.png', 1),
(6, 'Magic Creams', 'Butter|20g', 8.00, 8, 8, '4800016082610', 'img/upload-product.png', 1),
(7, 'Voice Combo', '90g', 7.00, 10, 5, '4807770121685', 'img/upload-product.png', 1),
(8, 'Fudgee Bar', 'Chocolate', 8.00, 10, 6, '4800092550904', 'img/upload-product.png', 1),
(9, 'Bingo Slugs', 'Choco', 17.00, 6, 3, '4807770101748', 'img/upload-product.png', 1),
(10, 'Monde', 'Special Mamon', 9.00, 3, 3, '4807770122415', 'img/upload-product.png', 1),
(11, 'Peanut Kisses', 'Egg', 14.00, 10, 10, '4809010998033', 'img/upload-product.png', 1),
(12, 'C2', 'Apple|500mL', 32.00, 7, 4, '4800016052132', 'img/upload-product.png', 1),
(13, 'C2', 'Apple|355mL', 23.00, 6, 0, '4800016052040', 'img/upload-product.png', 1),
(14, 'Fit n Right', 'Pineapple|180mL', 30.00, 6, 6, '4800024570017', 'img/upload-product.png', 1),
(15, 'Fit n Right', 'Four Season', 30.00, 5, 5, '4800024570024', 'img/upload-product.png', 1),
(16, 'Del Monte', 'Mango', 30.00, 4, 3, '4800024550194', 'img/upload-product.png', 1),
(17, 'Del Monte', 'Pineapple Orange', 31.00, 3, 3, '4800024550088', 'img/upload-product.png', 1),
(18, 'Del Monte', 'Pineapple HeartSmart', 33.00, 4, 4, '4800024572981', 'img/upload-product.png', 1),
(19, 'Del Monte', 'Fiber', 32.00, 1, 1, '4800024562616', 'img/upload-product.png', 1),
(20, 'Del Monte', 'Pineapple ACE', 30.00, 3, 3, '4800024562692', 'img/upload-product.png', 1),
(21, 'Del Monte', 'Orange HeartSmart', 34.00, 2, 2, '4800024574213', 'img/upload-product.png', 1),
(22, 'Minute Maid', 'Apple', 10.00, 25, 13, '4801981164851', 'img/upload-product.png', 1),
(23, 'Minute Maid', 'Orange', 10.00, 22, 14, '4801981164868', 'img/upload-product.png', 1),
(24, 'Dutch Mill', 'Mixed Fruit|180mL', 21.00, 5, 0, '8851717040030', 'img/upload-product.png', 1),
(25, 'Dutch Mill', 'Strawberry|180mL', 21.00, 5, 2, '8851717040016', 'img/upload-product.png', 1),
(26, 'Natures Spring', '500mL', 17.00, 24, 20, '4800049720114', 'img/upload-product.png', 1),
(27, 'Natures Spring', 'Water|330mL', 12.00, 26, 19, '4800049720107', 'img/upload-product.png', 1),
(28, 'Martys Crackling', 'Chicken Inasal|27g\r\n', 7.00, 7, 1, '4800194152884', 'img/upload-product.png', 1),
(29, 'Choco Topps', '20g', 8.00, 3, 1, '4800092552175', 'img/upload-product.png', 1),
(30, 'SkyFlakes Crackers', '20g', 7.00, 30, 23, '750515018402', 'img/upload-product.png', 1),
(31, 'Chippy', '27g', 7.00, 7, 6, '4800016641008', 'img/upload-product.png', 1),
(32, 'Tree Top', 'Apple', 43.00, 1, 1, '4716908628722', 'img/upload-product.png', 1),
(33, 'Schweppes Soda', 'Water', 33.00, 2, 2, '4801981110940', 'img/upload-product.png', 1),
(34, 'Dingdong', 'Sweet&Spicy|100g', 21.00, 5, 3, '4800092332630', 'img/upload-product.png', 1),
(35, 'Del Monte', 'Pineapple BoneSmart', 30.00, 3, 3, '4800024576880', 'img/upload-product.png', 1),
(36, 'Schweppes Tonic', 'Water', 30.00, 1, 0, '5645654654645', 'img/upload-product.png', 1),
(37, 'Alfonso Champorado', '200g', 35.00, 3, 2, '4809010408082', 'img/upload-product.png', 1),
(38, 'noname', 'lami', 18.00, 14, 14, '423452356', 'img/upload-product.png', 1),
(39, 'Fruit Tea', 'Apple|500mL', 32.00, 8, 8, '8996006853387', 'img/upload-product.png', 1),
(40, 'Mang Juan', 'Chicaron|26g', 7.00, 9, 3, '4800016110535', 'img/upload-product.png', 1),
(41, 'Mang Juan', 'SukatSili|90g', 20.00, 5, 5, '4800016110528', 'img/upload-product.png', 1),
(42, 'Lucky Me', 'Bulalo', 20.00, 10, 6, '4807770271175', 'img/upload-product.png', 1),
(43, 'Lucky Me', 'Extra Hot Chili|70g', 24.00, 9, 8, '4807770273858', 'img/upload-product.png', 1),
(44, 'Fruit Tea', 'Strawberry|500mL', 32.00, 2, 2, '8996006853394', 'img/upload-product.png', 1),
(45, 'Nissin', 'Butter Coconut|90g', 17.00, 3, 1, '4807770101694', 'img/upload-product.png', 1),
(46, 'Cloud 9', 'Classic|28g', 8.00, 12, 10, '4800010961447', 'img/upload-product.png', 1),
(47, 'Lemonsito Juice', 'Health Drink|330mL', 28.00, 10, 4, '2200006246497', 'img/upload-product.png', 1),
(48, 'Nestle Chuckie', 'Chocolate|250mL', 29.00, 5, 3, '4800361015400', 'img/upload-product.png', 1),
(49, 'Martys Crackling', 'Chicken Inasal|90g', 18.00, 2, 2, '4800194179836', 'img/upload-product.png', 1),
(50, 'Oishi', 'Prawn Cracker|24g', 7.00, 13, 11, '4891208040143', 'img/upload-product.png', 1),
(51, 'Mr.Chips', 'Nacho Cheese|26g', 7.00, 8, 4, '4800016652035', 'img/upload-product.png', 1),
(52, 'Skyflakes Crackers', 'Condensada|30g', 7.00, 10, 7, '75051503104', 'img/upload-product.png', 1),
(53, 'Dutch Mill', 'Mixed Berries|180mL', 21.00, 2, 2, '8853002302038', 'img/upload-product.png', 1),
(54, 'Pancit Canton', 'Extra Hot|70g', 24.00, 9, 6, '4807770273858', 'img/upload-product.png', 1),
(55, 'Ice Cream ', '0', 18.00, 38, 38, '00', 'img/upload-product.png', 1),
(56, 'Nature Spring ', 'Iced Tea|220mL', 12.00, 54, 52, '4800049720800', 'img/upload-product.png', 1),
(57, 'Chicken Joy', 'Lamian', 50.00, 2, 2, '9878912738', 'img/upload-product.png', 1),
(58, 'Chicken Joy', 'Spicy', 50.00, 12, 12, '9817283', 'img/upload-product.png', 1),
(59, 'Bag', 'Yellow', 200.00, 2, 2, '8798123', 'img/upload-product.png', 1),
(60, 'Monitor', 'Try', 1500.00, 2, 2, '987198237', 'img/upload-product.png', 1),
(61, 'Bag', 'Black', 2000.00, 5, 5, '9781623', 'img/upload-product.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_price_updates`
--

CREATE TABLE `product_price_updates` (
  `price_inventory_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `prior_price` double(20,2) NOT NULL,
  `new_price` double(20,2) NOT NULL,
  `date_updated` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_price_updates`
--

INSERT INTO `product_price_updates` (`price_inventory_id`, `product_name`, `prior_price`, `new_price`, `date_updated`, `product_id`) VALUES
(1, 'Martys Crackling', 6.00, 7.00, '03:00 pm | 2019/03/01', 28),
(2, 'Oishi', 6.00, 7.00, '03:12 pm | 2019/03/01', 50);

-- --------------------------------------------------------

--
-- Table structure for table `product_stock_inventory`
--

CREATE TABLE `product_stock_inventory` (
  `stock_inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `prior_stock` int(100) NOT NULL,
  `added_stock` int(100) NOT NULL,
  `new_stock` int(50) NOT NULL,
  `date_updated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_stock_inventory`
--

INSERT INTO `product_stock_inventory` (`stock_inventory_id`, `product_id`, `product_name`, `prior_stock`, `added_stock`, `new_stock`, `date_updated`) VALUES
(1, 3, 'Pancit Canton', 0, 10, 10, '02:53 pm | 2019/03/01'),
(2, 13, 'C2', 0, 6, 6, '02:57 pm | 2019/03/01'),
(3, 34, 'Dingdong', 2, 3, 5, '03:08 pm | 2019/03/01'),
(4, 50, 'Oishi', 6, 7, 13, '03:12 pm | 2019/03/01'),
(5, 8, 'Fudgee Bar', 0, 10, 10, '03:20 pm | 2019/03/01'),
(6, 55, 'Ice Cream ', 0, 100, 100, '05:38 pm | 2019/03/01'),
(7, 26, 'Natures Spring', 0, 24, 24, '05:35 pm | 2019/03/02'),
(8, 27, 'Natures Spring', 2, 24, 26, '05:36 pm | 2019/03/02'),
(9, 11, 'Peanut Kisses', 0, 10, 10, '11:53 am | 2019/03/04'),
(10, 1, 'Lucky Me ace', 9, 10, 19, '05:40 am | 2019/03/09'),
(11, 1, 'Lucky Me ace', 19, 1, 20, '05:41 am | 2019/03/09'),
(12, 4, 'Nissin Cup Noodles', 0, 1, 1, '12:30 pm | 2019/03/11'),
(13, 61, 'Bag', 2, 3, 5, '12:44 pm | 2019/03/11');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `purchase_name` varchar(200) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_price` double(20,2) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total_amount` double(20,2) NOT NULL,
  `product_media` varchar(200) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `invoice_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `employee_id`, `purchase_name`, `product_description`, `product_price`, `quantity`, `total_amount`, `product_media`, `cashier`, `transaction_time`, `invoice_number`) VALUES
(1, 1, 2, 'Lucky Me ace', 'La paz Batchoy Original', 20.00, 2, 40.00, 'img/upload-product.png', 'Ericson Ranolo', '2019-03-11 04:16:20', 1),
(2, 5, 2, 'Nissin Cup Noodles', 'Seafood\r\n', 20.00, 1, 20.00, 'img/upload-product.png', 'Ericson Ranolo', '2019-03-11 04:16:20', 1),
(3, 1, 2, 'Lucky Me ace', 'La paz Batchoy Original', 20.00, 1, 20.00, 'img/upload-product.png', 'Ericson Ranolo', '2019-03-11 04:17:01', 2),
(4, 8, 2, 'Fudgee Bar', 'Chocolate', 8.00, 1, 8.00, 'img/upload-product.png', 'Ericson Ranolo', '2019-03-11 04:17:01', 2),
(5, 1, 2, 'Lucky Me ace', 'La paz Batchoy Original', 20.00, 1, 20.00, 'img/upload-product.png', 'Ericson Ranolo', '2019-03-14 03:28:06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `total_amount` double(20,2) NOT NULL,
  `payment` double(20,2) NOT NULL,
  `change` double(20,2) NOT NULL,
  `cashier` varchar(200) NOT NULL,
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `total_amount`, `payment`, `change`, `cashier`, `transaction_date`) VALUES
(1, 60.00, 100.00, 40.00, 'Ericson Ranolo', '2019-03-11'),
(2, 28.00, 670.00, 642.00, 'Ericson Ranolo', '2019-03-11'),
(3, 20.00, 100.00, 80.00, 'Ericson Ranolo', '2019-03-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_price_updates`
--
ALTER TABLE `product_price_updates`
  ADD PRIMARY KEY (`price_inventory_id`);

--
-- Indexes for table `product_stock_inventory`
--
ALTER TABLE `product_stock_inventory`
  ADD PRIMARY KEY (`stock_inventory_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product_price_updates`
--
ALTER TABLE `product_price_updates`
  MODIFY `price_inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_stock_inventory`
--
ALTER TABLE `product_stock_inventory`
  MODIFY `stock_inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
