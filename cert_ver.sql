-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2018 at 04:04 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cert_ver`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `StuName` varchar(255) NOT NULL,
  `StuRegNum` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Picture` blob,
  `VeriNum` varchar(255) NOT NULL,
  `InstituteID` varchar(255) NOT NULL,
  `SerialNo` varchar(255) NOT NULL,
  `RegNum` varchar(255) NOT NULL,
  `Programme` varchar(255) NOT NULL,
  `Institution` varchar(255) NOT NULL,
  `YearOfGrad` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `StuName`, `StuRegNum`, `Gender`, `Picture`, `VeriNum`, `InstituteID`, `SerialNo`, `RegNum`, `Programme`, `Institution`, `YearOfGrad`, `Class`) VALUES
(14, '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'ljl', 'jlj', 'Male', '', 'jlj', 'ljl', 'jlj', 'lj', 'Bsc Computer Information System', 'Esm University', '2018', 'Secondclass Lower'),
(19, 'klklk', 'lk', 'Male', '', 'kl', 'klkl', 'kl', 'klkl', 'Bsc Computer Information System', 'Esm University', '2018', 'Secondclass Lower');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Institution_name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `P_number` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Institution_name`, `Address`, `Number`, `Firstname`, `Lastname`, `P_number`, `Email`, `Username`, `Password`) VALUES
(1, 'ESM UNIVERSITY', 'Apres CEG. Anavie (Ecole), Off Hounssa Carefour, Anavie District, Port-Novo, Benin Republic.', '6674883939', 'Ogungbemi', 'Enitan', '08061243705', 'ogungbemi.enitan@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'weewew', 'wwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwwwww', 'eeeewewew', 'ewewewwe', 'wddwdwdw', 'ogungbemi.enitan@gmail.com', 'enny', '12345'),
(3, 'ESM UNIVERSITY', 'Porto novo ceg anavie benin republic', '08059395501', 'chinwendu', 'samuel', '69960159', 'chinwendusam442@gmail.com', 'chinwendu442', 'chinwendu442'),
(4, 'qddddd', 'efwwwwwwwwwwwwwwwwwwwwww', 'wdwwdwwd', 'wwwddw', 'wwwww', '02003939393', 'ogungbemi.enitan@gmail.com', 'dance', 'you');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
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
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
