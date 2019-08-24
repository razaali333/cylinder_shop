-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2019 at 12:41 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhqtmg`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getALLopd_entry` ()  BEGIN

SELECT * FROM opd_entry;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_categories` ()  BEGIN

SELECT * FROM category;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_specific_opd` (`typ` VARCHAR(20))  BEGIN

SELECT * FROM opd_entry WHERE type=typ;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(3, 'Category 2');

-- --------------------------------------------------------

--
-- Table structure for table `opd_entry`
--

CREATE TABLE `opd_entry` (
  `id` int(11) NOT NULL,
  `receptNumber` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gander` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `type` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opd_entry`
--

INSERT INTO `opd_entry` (`id`, `receptNumber`, `patient_name`, `age`, `gander`, `address`, `date`, `time`, `type`, `shift`, `price`) VALUES
(17, 1, 'test', '', '', '', '0000-00-00', '00:00:00', 'fm_opd', '', ''),
(18, 2, 'this', '', 'Male', 'test', '2019-08-21', '13:08:19', 'fm_opd', 'morning', '10'),
(19, 3, 'fasdf', '', 'Male', 'sfsf', '2019-08-21', '13:08:24', 'fm_opd', 'morning', '10'),
(20, 4, 'dasfda', '', 'Male', 'sfsa', '2019-08-21', '13:08:29', 'fm_opd', 'morning', '10'),
(21, 5, 'fsf', '', 'Male', '', '2019-08-21', '13:08:33', 'fm_opd', 'morning', '10'),
(22, 6, 'dsfsad', '', 'Male', '', '2019-08-21', '13:08:37', 'fm_opd', 'morning', '10'),
(23, 7, 'dfasdf', '', 'Male', '', '2019-08-21', '13:08:40', 'fm_opd', 'morning', '10'),
(24, 8, 'safsadf', '', 'Male', '', '2019-08-21', '13:08:44', 'fm_opd', 'morning', '10'),
(25, 9, 'fdasdf', '', 'Male', '', '2019-08-21', '13:08:47', 'fm_opd', 'morning', '10'),
(28, 10, 'test', '', 'Male', 'test', '2019-08-21', '13:14:49', 'fm_opd', 'morning', '10'),
(29, 11, 'test', '', 'Male', '33', '2019-08-21', '13:17:49', 'fm_opd', 'morning', '10');

-- --------------------------------------------------------

--
-- Table structure for table `other_entry`
--

CREATE TABLE `other_entry` (
  `id` int(11) NOT NULL,
  `receptNumber` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gander` varchar(255) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `company name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `mobile no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `sub_cat_name`, `cat_id`, `price`) VALUES
(4, 'Sub Cat 1', 3, '100');

-- --------------------------------------------------------

--
-- Table structure for table `sub_departement`
--

CREATE TABLE `sub_departement` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_departement`
--

INSERT INTO `sub_departement` (`id`, `name`, `departement`, `price`) VALUES
(1, 'Sub tst', 'Laboratory', '100'),
(2, 'ECG SUB', 'ECG', '150');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `test_cat_id` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `ref_value` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `test_sub_cat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test_name`, `test_cat_id`, `unit`, `ref_value`, `result`, `test_sub_cat_id`) VALUES
(1, 'test', '1', '323', '2----5', 'positvie', '1'),
(2, 'Test 2', '1', '21', '3---15', '-ive', '2');

-- --------------------------------------------------------

--
-- Table structure for table `test_cat`
--

CREATE TABLE `test_cat` (
  `id` int(11) NOT NULL,
  `test_cat_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_entry`
--

CREATE TABLE `test_entry` (
  `receptNumber` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `gander` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_sub_category`
--

CREATE TABLE `test_sub_category` (
  `id` int(11) NOT NULL,
  `test_sub_cat_name` varchar(255) NOT NULL,
  `test_cat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'raza', '123', 'First Male OPD'),
(5, 'khan', 'khan', 'Second Male OPD'),
(6, 'female', 'female', 'First Female OPD'),
(7, 's_female', 's_female', 'Second Female OPD'),
(8, 'aged', 'aged', 'Aged OPD'),
(9, 'staff', 'staff', 'Staff OPD'),
(10, 'gyne', 'gyne', 'Gyne OPD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_entry`
--
ALTER TABLE `opd_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_entry`
--
ALTER TABLE `other_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `sub_departement`
--
ALTER TABLE `sub_departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_cat`
--
ALTER TABLE `test_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_sub_category`
--
ALTER TABLE `test_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opd_entry`
--
ALTER TABLE `opd_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `other_entry`
--
ALTER TABLE `other_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_departement`
--
ALTER TABLE `sub_departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_cat`
--
ALTER TABLE `test_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_sub_category`
--
ALTER TABLE `test_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
