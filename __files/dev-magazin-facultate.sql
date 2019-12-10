-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2019 at 03:24 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev-magazin-facultate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '095b2626c9b6bad0eb89019ea6091bd9');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `strada` varchar(100) DEFAULT NULL,
  `oras` varchar(50) DEFAULT NULL,
  `judet` varchar(50) DEFAULT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `username`, `password`, `email`, `strada`, `oras`, `judet`, `nume`, `prenume`) VALUES
(2, 'user1', '$2y$10$MBHQC5/Z2SX4Qw.vJE1IV.aRA.yXSMHlJ97378uVfKUSjQN.NJ6Ea', 'test@gmail.com', NULL, NULL, NULL, 'nume1', 'prenume1');

-- --------------------------------------------------------

--
-- Table structure for table `comanda`
--

DROP TABLE IF EXISTS `comanda`;
CREATE TABLE `comanda` (
  `id` int(11) NOT NULL,
  `produs_id` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `data_creare` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cos`
--

DROP TABLE IF EXISTS `cos`;
CREATE TABLE `cos` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `produs_id` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`) VALUES
(1, 'amin.jpg'),
(2, 'amin.jpg'),
(3, '71349630_515409575693731_4509628399949447168_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produs`
--

DROP TABLE IF EXISTS `produs`;
CREATE TABLE `produs` (
  `id` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `pret` int(11) NOT NULL,
  `imagine` varchar(500) NOT NULL,
  `short_description` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `stoc` int(11) NOT NULL,
  `pret_oferta` int(11) NOT NULL,
  `recomandat` varchar(50) NOT NULL,
  `categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produs`
--

INSERT INTO `produs` (`id`, `nume`, `pret`, `imagine`, `short_description`, `description`, `stoc`, `pret_oferta`, `recomandat`, `categorie`) VALUES
(13, 'Bugs Bunny', 80, '71349630_515409575693731_4509628399949447168_o.jpg', 'Bugs Bunny', 'Bugs Bunny Despre Bere', 5, 80, 'da', 'Bugs Bunny');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `produs_id` (`produs_id`);

--
-- Indexes for table `cos`
--
ALTER TABLE `cos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `produs_id` (`produs_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produs`
--
ALTER TABLE `produs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cos`
--
ALTER TABLE `cos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produs`
--
ALTER TABLE `produs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `comanda_ibfk_2` FOREIGN KEY (`produs_id`) REFERENCES `produs` (`id`);

--
-- Constraints for table `cos`
--
ALTER TABLE `cos`
  ADD CONSTRAINT `cos_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `cos_ibfk_2` FOREIGN KEY (`produs_id`) REFERENCES `produs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
