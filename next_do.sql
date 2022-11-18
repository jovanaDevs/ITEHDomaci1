-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 04:02 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `next_do`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `priority` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `priority`) VALUES
(1, 'high'),
(2, 'normal'),
(3, 'low');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `taskID` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text DEFAULT NULL,
  `createDate` date NOT NULL,
  `done` tinyint(1) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskID`, `title`, `description`, `createDate`, `done`, `categoryID`, `userID`) VALUES
(2, 'Kupi novi mis', 'Idi do Gigatrona i  kupi novi beyicni mis', '2022-11-12', 0, 2, 1),
(3, 'Uradi domaci iz iteha', 'Zavrsi ajax i php', '2022-11-12', 0, 1, 1),
(62, 'Popravi sat ', 'Crni sat koji je u polici treba da se popravi', '2022-11-18', 0, 3, 1),
(63, 'Popravi zub', 'Kod zubara u poliklinici', '2022-11-18', 0, 1, 1),
(64, 'Pozovi frizera', 'Zakazi sisanje', '2022-11-18', 0, 3, 1),
(65, 'Sredi kucu', 'Usisaj i oribaj podove', '2022-11-18', 0, 2, 1),
(66, 'Kupi poklon Ani', 'Ili haljinu ili plavi rokovnik', '2022-11-18', 0, 2, 1),
(67, 'Napravi plan ucenja', 'Za spremanje kolokvijumske nedelje', '2022-11-18', 0, 1, 1),
(68, 'Operi tepihe', 'Odnesi ih u perionicu', '2022-11-18', 0, 2, 2),
(69, 'Kupi novi frizider', 'Stari nije dobar', '2022-11-18', 0, 1, 2),
(70, 'Napravi raspored ucenja', 'Napravi raspored za radnu nedelju', '2022-11-18', 0, 1, 2),
(71, 'Idi u pet shop', 'Kupi za macku hranu i ogrlicu', '2022-11-18', 0, 3, 2),
(72, 'Kupi fotelju', 'U ikei treba da ima', '2022-11-18', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`) VALUES
(1, 'jovana22', 'jovana123'),
(2, 'mirko33', 'mirko123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskID`),
  ADD KEY `UserFK` (`userID`),
  ADD KEY `CategoryFK` (`categoryID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `CategoryFK` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `UserFK` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
