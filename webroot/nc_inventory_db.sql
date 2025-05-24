-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 04:05 PM
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
-- Database: `nc_inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created`, `modified`) VALUES
(1, 'CIT', '2025-05-21 12:44:21', '2025-05-21 12:44:21'),
(2, 'HM', '2025-05-21 16:43:15', '2025-05-21 16:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `code` text NOT NULL,
  `quantity` text NOT NULL,
  `purchase_date` date NOT NULL,
  `count` text NOT NULL,
  `is_active` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20250519035540, 'CreateUsersTable', '2025-05-21 02:43:49', '2025-05-21 02:43:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position_name` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `created`, `modified`) VALUES
(1, 'ADMINISTRATOR', '2025-05-21 12:44:39', '2025-05-21 12:44:39'),
(2, 'EMPLOYEE', '2025-05-21 16:44:01', '2025-05-21 16:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `repair_forms`
--

CREATE TABLE `repair_forms` (
  `id` int(11) NOT NULL,
  `control_no` text NOT NULL,
  `service_form_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `user_dept` int(11) NOT NULL,
  `findings` text NOT NULL,
  `recommendation` text NOT NULL,
  `action_taken` text NOT NULL,
  `requested_by` int(11) NOT NULL,
  `inspected_by` int(11) NOT NULL,
  `is_active` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repair_forms`
--

INSERT INTO `repair_forms` (`id`, `control_no`, `service_form_id`, `item_id`, `description`, `user_dept`, `findings`, `recommendation`, `action_taken`, `requested_by`, `inspected_by`, `is_active`, `status_id`, `created`, `modified`) VALUES
(1, 'Nam asperiores dolor', 10, NULL, 'Cum alias aperiam en', 1, 'Sint dolore ea et ex', 'Dolorem consequat I', 'Sed expedita magna l', 2, 4, 'Occaecat quia volupt', 3, '2025-05-24 12:55:58', '2025-05-24 12:55:58'),
(2, 'Illo commodi officia', 11, NULL, 'Ea tenetur id nulla ', 2, 'Ipsa nihil assumend', 'Anim voluptatem sit', 'Eos sed fuga Aperia', 2, 4, 'Quidem atque sint of', 2, '2025-05-24 13:01:59', '2025-05-24 13:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `service_forms`
--

CREATE TABLE `service_forms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_pos` int(11) NOT NULL,
  `user_dept` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_endorsed` int(11) DEFAULT NULL,
  `user_enpos` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `is_active` text NOT NULL,
  `user_actioned` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_forms`
--

INSERT INTO `service_forms` (`id`, `user_id`, `user_pos`, `user_dept`, `photo`, `description`, `user_endorsed`, `user_enpos`, `status_id`, `is_active`, `user_actioned`, `created`, `modified`) VALUES
(10, 2, 2, 2, '494682880_2795281137527095_740147094275395666_n.jpg', 'Having issues with this bruh', 3, 1, 3, '1', 4, '2025-05-24 01:47:15', '2025-05-24 02:40:04'),
(11, 2, 2, 2, 'cake-logo.png', 'nagloloko', 3, 1, 3, '1', 4, '2025-05-24 12:18:57', '2025-05-24 12:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created`, `modified`) VALUES
(1, 'PENDING', '2025-05-21 12:45:11', '2025-05-21 12:45:11'),
(2, 'APPROVED', '2025-05-23 03:13:47', '2025-05-23 03:13:47'),
(3, 'PROCESSING\r\n', '2025-05-24 03:53:32', '2025-05-24 03:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `is_active` text NOT NULL,
  `is_admin` text NOT NULL,
  `is_staff` text NOT NULL,
  `is_employee` text NOT NULL,
  `is_tech` text NOT NULL,
  `is_teacher` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `is_active`, `is_admin`, `is_staff`, `is_employee`, `is_tech`, `is_teacher`, `department_id`, `position_id`, `created`, `modified`) VALUES
(1, 'nikki', 'bueno', 'pesca', 'admin@nikks.com', '$2y$10$1uVip1038ctDMWnkV6zxXeTfLUsS62t836c76Z./B6qC2XhTjA65S', '1', '1', '0', '0', '', '0', 1, 1, '2025-05-21 10:45:54', '2025-05-21 10:45:54'),
(2, 'jezzer', 'leonin', 'sanchez', 'employee@jezz.com', '$2y$10$ZIKUq7mldPHl/1gieglyFOyfkrYwIj6IAj4U6YUVwxFAqkpAg6pr6', '1', '0', '0', '1', '', '0', 2, 2, '2025-05-21 14:44:52', '2025-05-21 14:45:37'),
(3, 'kenneth', 'b', 'jaque', 'staff@kenneth.com', '$2y$10$.6JW2dNlqtHCVOE0uodi8.UBu4A8/3f6.w8sxlAM3kybd7yrH0bsG', '1', '0', '1', '0', '', '0', 1, 1, '2025-05-21 18:01:35', '2025-05-21 18:01:35'),
(4, 'don', 'b', 'salvador', 'tech@don.com', '$2y$10$7rk7t0Yw4sbyuVrY185EKunKstBjh/2yWZHPRVGkK0M6T7GNZtOSq', '1', '0', '0', '0', '1', '0', 1, 1, '2025-05-22 14:02:42', '2025-05-22 14:02:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_forms`
--
ALTER TABLE `repair_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `requested_by` (`requested_by`),
  ADD KEY `inspected_by` (`inspected_by`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `repair_forms_ibfk_2` (`user_dept`);

--
-- Indexes for table `service_forms`
--
ALTER TABLE `service_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_pos` (`user_pos`),
  ADD KEY `user_dept` (`user_dept`),
  ADD KEY `user_endorsed` (`user_endorsed`),
  ADD KEY `user_enpos` (`user_enpos`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `service_forms_ibfk_7` (`user_actioned`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `position_id` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repair_forms`
--
ALTER TABLE `repair_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_forms`
--
ALTER TABLE `service_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repair_forms`
--
ALTER TABLE `repair_forms`
  ADD CONSTRAINT `repair_forms_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repair_forms_ibfk_2` FOREIGN KEY (`user_dept`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repair_forms_ibfk_3` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repair_forms_ibfk_4` FOREIGN KEY (`inspected_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repair_forms_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_forms`
--
ALTER TABLE `service_forms`
  ADD CONSTRAINT `service_forms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_forms_ibfk_2` FOREIGN KEY (`user_pos`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_forms_ibfk_3` FOREIGN KEY (`user_dept`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_forms_ibfk_4` FOREIGN KEY (`user_endorsed`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_forms_ibfk_5` FOREIGN KEY (`user_enpos`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_forms_ibfk_6` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_forms_ibfk_7` FOREIGN KEY (`user_actioned`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
