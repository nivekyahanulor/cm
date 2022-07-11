-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 04:58 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cm_events`
--

CREATE TABLE `cm_events` (
  `event_id` int(12) NOT NULL,
  `event_name` text NOT NULL,
  `event_venue` varchar(100) NOT NULL,
  `event_date` varchar(35) NOT NULL,
  `event_time` varchar(35) NOT NULL,
  `event_type` varchar(35) NOT NULL,
  `event_package` int(5) NOT NULL,
  `notes` text NOT NULL,
  `guest` varchar(10) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `contact_number` varchar(32) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `payment_status` text NOT NULL,
  `event_status` varchar(32) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_events`
--

INSERT INTO `cm_events` (`event_id`, `event_name`, `event_venue`, `event_date`, `event_time`, `event_type`, `event_package`, `notes`, `guest`, `client_name`, `contact_number`, `payment_type`, `payment_status`, `event_status`, `date_added`) VALUES
(1, 'Sample Event11', 'Cavite', '2022-06-24', '22:05', '3', 3, '12', '120', 'asd', '11111111', 'CASH', '50% Payment', 'Pending', '2022-06-21 22:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `cm_event_equipments`
--

CREATE TABLE `cm_event_equipments` (
  `event_equipment_id` int(12) NOT NULL,
  `package_id` int(12) NOT NULL,
  `event_id` int(12) NOT NULL,
  `equipment_name` text NOT NULL,
  `qty` varchar(12) NOT NULL,
  `remarks` text NOT NULL,
  `is_use` int(1) NOT NULL,
  `is_return` int(1) NOT NULL,
  `date_returned` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cm_event_menu`
--

CREATE TABLE `cm_event_menu` (
  `event_menu_id` int(12) NOT NULL,
  `package_id` int(12) NOT NULL,
  `event_id` int(12) NOT NULL,
  `beef` varchar(50) NOT NULL,
  `pork` varchar(50) NOT NULL,
  `chicken` varchar(50) NOT NULL,
  `fish` varchar(50) NOT NULL,
  `vegetable` varchar(50) NOT NULL,
  `pasta` varchar(50) NOT NULL,
  `dessert` varchar(50) NOT NULL,
  `drinks` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cm_event_task`
--

CREATE TABLE `cm_event_task` (
  `task_id` int(12) NOT NULL,
  `event_id` int(12) NOT NULL,
  `task_name` text NOT NULL,
  `date` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `staff` varchar(32) NOT NULL,
  `task_type` varchar(32) NOT NULL,
  `status` varchar(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_event_task`
--

INSERT INTO `cm_event_task` (`task_id`, `event_id`, `task_name`, `date`, `time`, `staff`, `task_type`, `status`, `date_added`) VALUES
(1, 1, 'Digital Photography Pictorial', '', '', '', 'Pre-Event', '', '2022-06-21 14:04:46'),
(2, 1, 'Edit save the date video', '', '', '', 'Pre-Event', '', '2022-06-21 14:04:46'),
(3, 1, 'Edit audio-visual presentation', '', '', '', 'Pre-Event', '', '2022-06-21 14:04:46'),
(4, 1, 'Taste test for courses', '', '', '', 'Pre-Event', '', '2022-06-21 14:04:46'),
(5, 1, 'Gown preparation', '', '', '', 'Pre-Event', '', '2022-06-21 14:04:46'),
(6, 1, 'Event place preparation', '', '', '', 'Pre-Event', '', '2022-06-21 14:04:46'),
(7, 1, 'Invitation preparation', '', '', '', 'Pre-Event', '', '2022-06-21 14:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `cm_event_time_table`
--

CREATE TABLE `cm_event_time_table` (
  `time_table_id` int(12) NOT NULL,
  `package_id` int(12) NOT NULL,
  `event_id` int(12) NOT NULL,
  `time` varchar(35) NOT NULL,
  `task` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cm_event_type`
--

CREATE TABLE `cm_event_type` (
  `type_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_event_type`
--

INSERT INTO `cm_event_type` (`type_id`, `name`) VALUES
(1, 'Birthday'),
(2, 'Debut'),
(3, 'Wedding'),
(4, 'Baptismal');

-- --------------------------------------------------------

--
-- Table structure for table `cm_foods`
--

CREATE TABLE `cm_foods` (
  `food_id` int(12) NOT NULL,
  `name` text NOT NULL,
  `category` varchar(35) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_foods`
--

INSERT INTO `cm_foods` (`food_id`, `name`, `category`, `date_added`) VALUES
(1, 'Beef 1', 'Beef', '2022-03-23 04:47:32'),
(3, 'Pork 1', 'Pork', '2022-03-28 13:57:55'),
(4, 'Fish 1', 'Fish', '2022-03-28 13:58:04'),
(5, 'Chicken 1', 'Chicken', '2022-03-28 13:58:16'),
(6, 'Pasta 1', 'Pasta', '2022-03-28 13:58:22'),
(7, 'Dessert 1', 'Dessert', '2022-03-28 13:58:32'),
(8, 'Vegetable 1', 'Vegetable', '2022-03-28 13:58:42'),
(9, 'Drinks 1', 'Drinks', '2022-03-28 13:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `cm_foods_category`
--

CREATE TABLE `cm_foods_category` (
  `food_cat_id` int(12) NOT NULL,
  `name` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_foods_category`
--

INSERT INTO `cm_foods_category` (`food_cat_id`, `name`) VALUES
(1, 'Beef'),
(2, 'Fish'),
(3, 'Chicken'),
(4, 'Pork'),
(5, 'Pasta'),
(6, 'Dessert'),
(7, 'Vegetable'),
(8, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `cm_inventory`
--

CREATE TABLE `cm_inventory` (
  `item_id` int(12) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(32) NOT NULL,
  `category` varchar(50) NOT NULL,
  `supplier` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_inventory`
--

INSERT INTO `cm_inventory` (`item_id`, `name`, `description`, `qty`, `category`, `supplier`, `date_added`) VALUES
(2, 'Chair', 'Sample1', '108', 'Chair', '1234', '2022-03-23 12:32:15'),
(3, 'Table', 'Sample1', '200', 'Table', '1234', '2022-03-23 12:32:28'),
(4, 'Table Cloth', 'Cloth', '400', 'Cloth', 'Sample', '2022-03-24 13:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `cm_item_category`
--

CREATE TABLE `cm_item_category` (
  `item_category_id` int(12) NOT NULL,
  `name` varchar(35) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_item_category`
--

INSERT INTO `cm_item_category` (`item_category_id`, `name`, `date_added`) VALUES
(1, 'Table', '2022-03-23 07:40:11'),
(2, 'Cloth', '2022-03-23 07:40:27'),
(3, 'Artificials', '2022-03-23 07:40:33'),
(4, 'Chair', '2022-03-23 07:40:40'),
(5, 'Frames', '2022-03-23 07:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `cm_packages`
--

CREATE TABLE `cm_packages` (
  `package_id` int(12) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `package_pax` int(12) NOT NULL,
  `package_price` varchar(32) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_packages`
--

INSERT INTO `cm_packages` (`package_id`, `package_name`, `package_pax`, `package_price`, `date_added`) VALUES
(1, 'Bronze Package', 100, '100000', '2022-03-09 05:39:02'),
(3, 'Silver Package', 120, '165000', '2022-03-23 17:01:30'),
(4, 'Gold Package', 150, '240000', '2022-03-23 17:01:58'),
(5, 'Platinum Package', 175, '350000', '2022-03-23 17:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `cm_package_items`
--

CREATE TABLE `cm_package_items` (
  `package_item_id` int(12) NOT NULL,
  `item_id` int(12) NOT NULL,
  `package` int(12) NOT NULL,
  `qty` varchar(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_package_items`
--

INSERT INTO `cm_package_items` (`package_item_id`, `item_id`, `package`, `qty`, `date_added`) VALUES
(2, 2, 1, '120', '2022-03-23 13:07:51'),
(3, 3, 1, '120', '2022-03-23 13:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `cm_staff`
--

CREATE TABLE `cm_staff` (
  `staff_id` int(12) NOT NULL,
  `firstname` varchar(36) NOT NULL,
  `lastname` varchar(36) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_staff`
--

INSERT INTO `cm_staff` (`staff_id`, `firstname`, `lastname`, `contact`, `gender`, `address`, `username`, `password`, `role`, `status`, `date_added`) VALUES
(1, 'Kevin Jay Napoles', 'Roluna', '09357396286', 'Male', 'Blk 20 Lot 23 Phase 4 Pamayanang Maliksi, Brgy Pasong Kawayan II, General Trias Cavite , Philippines', 'test123', 'test123', 'Head Staff', 0, '2022-03-26 15:00:16'),
(2, 'Jeffry', 'Bordeos', '09357396286', 'Male', 'Blk 20 Lot 23 Phase 4 PBK Brgy Pasong Kawayan II\r\nddd', 'test12311', 'test12311', 'Server', 1, '2022-03-26 15:00:48'),
(3, 'Sample', 'Busboy', '11111', 'Male', 'Blk 20 Lot 23 Phase 4 Pamayanang Maliksi, Brgy Pasong Kawayan II, General Trias Cavite , Philippines', 'busboy124', 'busboy124', 'Busboy', 0, '2022-03-28 17:53:47'),
(4, 'Sample', 'Diswashers', '11111', 'Female', 'test1235678', 'diswasher123', 'diswasher123', 'Diswasher', 0, '2022-03-28 17:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `cm_staffing`
--

CREATE TABLE `cm_staffing` (
  `staffing_id` int(12) NOT NULL,
  `event_id` int(12) NOT NULL,
  `category` int(12) NOT NULL,
  `statff_name` varchar(100) NOT NULL,
  `is_present` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_staffing`
--

INSERT INTO `cm_staffing` (`staffing_id`, `event_id`, `category`, `statff_name`, `is_present`, `date_added`) VALUES
(1, 1, 1, 'Jeffry Bordeos', 1, '2022-03-28 17:41:57'),
(4, 1, 2, 'Sample Busboy', 2, '2022-03-28 17:55:15'),
(5, 1, 3, 'Sample Diswashers', 2, '2022-03-28 17:58:53'),
(6, 2, 2, 'Sample Busboy', 1, '2022-06-20 09:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `cm_staff_roles`
--

CREATE TABLE `cm_staff_roles` (
  `staff_roles_id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_staff_roles`
--

INSERT INTO `cm_staff_roles` (`staff_roles_id`, `name`, `date_added`) VALUES
(1, 'Head Staff', '2022-03-23 06:46:52'),
(2, 'Server', '2022-03-23 06:51:04'),
(3, 'Busboy', '2022-03-23 06:51:10'),
(4, 'Diswasher', '2022-03-23 06:51:16'),
(5, 'Staff Attendant', '2022-03-23 06:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `cm_task_type`
--

CREATE TABLE `cm_task_type` (
  `task_type_id` int(12) NOT NULL,
  `name` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_task_type`
--

INSERT INTO `cm_task_type` (`task_type_id`, `name`) VALUES
(1, 'Pre-Event'),
(2, 'Event'),
(3, 'Post-Event');

-- --------------------------------------------------------

--
-- Table structure for table `cm_user`
--

CREATE TABLE `cm_user` (
  `user_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_user`
--

INSERT INTO `cm_user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `date_added`) VALUES
(1, 'sample', 'sample', 'Kevin', 'Roluna', '2022-03-01 03:59:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cm_events`
--
ALTER TABLE `cm_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `cm_event_equipments`
--
ALTER TABLE `cm_event_equipments`
  ADD PRIMARY KEY (`event_equipment_id`);

--
-- Indexes for table `cm_event_menu`
--
ALTER TABLE `cm_event_menu`
  ADD PRIMARY KEY (`event_menu_id`);

--
-- Indexes for table `cm_event_task`
--
ALTER TABLE `cm_event_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `cm_event_time_table`
--
ALTER TABLE `cm_event_time_table`
  ADD PRIMARY KEY (`time_table_id`);

--
-- Indexes for table `cm_event_type`
--
ALTER TABLE `cm_event_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `cm_foods`
--
ALTER TABLE `cm_foods`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `cm_foods_category`
--
ALTER TABLE `cm_foods_category`
  ADD PRIMARY KEY (`food_cat_id`);

--
-- Indexes for table `cm_inventory`
--
ALTER TABLE `cm_inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `cm_item_category`
--
ALTER TABLE `cm_item_category`
  ADD PRIMARY KEY (`item_category_id`);

--
-- Indexes for table `cm_packages`
--
ALTER TABLE `cm_packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `cm_package_items`
--
ALTER TABLE `cm_package_items`
  ADD PRIMARY KEY (`package_item_id`);

--
-- Indexes for table `cm_staff`
--
ALTER TABLE `cm_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `cm_staffing`
--
ALTER TABLE `cm_staffing`
  ADD PRIMARY KEY (`staffing_id`);

--
-- Indexes for table `cm_staff_roles`
--
ALTER TABLE `cm_staff_roles`
  ADD PRIMARY KEY (`staff_roles_id`);

--
-- Indexes for table `cm_task_type`
--
ALTER TABLE `cm_task_type`
  ADD PRIMARY KEY (`task_type_id`);

--
-- Indexes for table `cm_user`
--
ALTER TABLE `cm_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cm_events`
--
ALTER TABLE `cm_events`
  MODIFY `event_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cm_event_equipments`
--
ALTER TABLE `cm_event_equipments`
  MODIFY `event_equipment_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cm_event_menu`
--
ALTER TABLE `cm_event_menu`
  MODIFY `event_menu_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cm_event_task`
--
ALTER TABLE `cm_event_task`
  MODIFY `task_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cm_event_time_table`
--
ALTER TABLE `cm_event_time_table`
  MODIFY `time_table_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cm_event_type`
--
ALTER TABLE `cm_event_type`
  MODIFY `type_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cm_foods`
--
ALTER TABLE `cm_foods`
  MODIFY `food_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cm_foods_category`
--
ALTER TABLE `cm_foods_category`
  MODIFY `food_cat_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cm_inventory`
--
ALTER TABLE `cm_inventory`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cm_item_category`
--
ALTER TABLE `cm_item_category`
  MODIFY `item_category_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cm_packages`
--
ALTER TABLE `cm_packages`
  MODIFY `package_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cm_package_items`
--
ALTER TABLE `cm_package_items`
  MODIFY `package_item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cm_staff`
--
ALTER TABLE `cm_staff`
  MODIFY `staff_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cm_staffing`
--
ALTER TABLE `cm_staffing`
  MODIFY `staffing_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cm_staff_roles`
--
ALTER TABLE `cm_staff_roles`
  MODIFY `staff_roles_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cm_task_type`
--
ALTER TABLE `cm_task_type`
  MODIFY `task_type_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cm_user`
--
ALTER TABLE `cm_user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
