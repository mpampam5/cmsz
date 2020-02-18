-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 06:31 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsz`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `config_system`
--

CREATE TABLE `config_system` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `config_system`
--

INSERT INTO `config_system` (`id`, `name`, `slug`, `value`, `status`) VALUES
(1, 'title', 'title', 'cms gue', '0'),
(2, 'telepon', 'telepon', '085288882994', '0'),
(3, 'email', 'email', 'mpampam5@mail.com', '0'),
(4, 'domain', 'domain', 'www.tester.com', '0'),
(5, 'alamat', 'alamat', 'jl. muhajirin raya', '0'),
(51, 'email_smtp', 'email_smtp', 'mpampam5@gmail.com', '0'),
(52, 'host_smtp', 'host_smtp', 'ssl://niagahoster.com', '0'),
(53, 'port_smtp', 'port_smtp', '465', '0'),
(54, 'password_smtp', 'password_smtp', 'A1kA1DfFtZ0EimcxcDlhVj9VA1G8Idd7l5Iktqj2jxhDW6+v08X5BTguLYpiYu305oU2POZY1AGwL/1BEnOa5g==', '0'),
(55, 'status_smtp', 'status_smtp', NULL, '0'),
(99, 'maintenance', 'maintenance', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_delete` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`, `slug`, `created`, `modified`, `is_delete`) VALUES
(1, 'xadmin', 'xadmin', '2020-02-14 00:03:45', NULL, '0'),
(2, 'superadmin', 'superadmin', '2020-02-14 00:00:08', '0000-00-00 00:00:00', '0'),
(3, 'admin', 'admin', '2020-02-14 00:00:41', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rule_level`
--

CREATE TABLE `rule_level` (
  `id_rule_level` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `main_menu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `is_active` enum('0','1') DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_delete` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `token`, `is_active`, `created`, `modified`, `is_delete`) VALUES
(1, 'superadmin', 'superadmin@mail.com', '123456', '123456', '1', '2020-02-14 00:01:19', NULL, '0'),
(2, 'Admin Web', 'admin@mail.com', '32132', '321321', '1', '2020-02-16 05:29:03', NULL, '0'),
(3, 'sdsa', NULL, '111111', 'mpampam20200216180835', '1', '2020-02-16 18:08:35', NULL, '0'),
(4, '321321', 'asdww@mail.com', '123456', 'mpampam20200216181143', '1', '2020-02-16 18:11:43', NULL, '0'),
(5, 'Contoh', 'asd@mail.com', 'aaaaaa', 'mpampam20200216182347', '1', '2020-02-16 18:23:47', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `id_user`, `id_level`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 3),
(5, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Indexes for table `config_system`
--
ALTER TABLE `config_system`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`) USING BTREE;

--
-- Indexes for table `rule_level`
--
ALTER TABLE `rule_level`
  ADD PRIMARY KEY (`id_rule_level`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rule_level`
--
ALTER TABLE `rule_level`
  MODIFY `id_rule_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
