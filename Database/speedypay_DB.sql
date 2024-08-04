-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 09:48 PM
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
-- Database: `speedypay`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccounts`
--

CREATE TABLE `adminaccounts` (
  `usernameadmin` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwordadmin` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminaccounts`
--

INSERT INTO `adminaccounts` (`usernameadmin`, `email`, `passwordadmin`, `age`, `phone_number`) VALUES
('ADMIN', 'admin.admins@gmail.com', '00000aaa000aaa', 35, '0112384393');

-- --------------------------------------------------------

--
-- Table structure for table `userbankaccounts`
--

CREATE TABLE `userbankaccounts` (
  `IPA` int(11) DEFAULT NULL,
  `BankAccountType` varchar(255) DEFAULT NULL,
  `BankAccountNumber` varchar(255) DEFAULT NULL,
  `BankBalance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userbankaccounts`
--

INSERT INTO `userbankaccounts` (`IPA`, `BankAccountType`, `BankAccountNumber`, `BankBalance`) VALUES
(411, 'visa', '43432521', 160),
(411, 'ahly', '262164731', 650),
(438, 'Bank Ahly', '122231231', 968),
(438, 'Bank Alex', '111111111', 701);

-- --------------------------------------------------------

--
-- Table structure for table `usercards`
--

CREATE TABLE `usercards` (
  `IPA` int(11) DEFAULT NULL,
  `CardType` varchar(100) DEFAULT NULL,
  `CardNumber` varchar(20) DEFAULT NULL,
  `CardPassword` varchar(255) DEFAULT NULL,
  `CVV` int(11) DEFAULT NULL,
  `CardBalance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercards`
--

INSERT INTO `usercards` (`IPA`, `CardType`, `CardNumber`, `CardPassword`, `CVV`, `CardBalance`) VALUES
(411, 'paypal', '3445434', '4534522', 4332, 498),
(411, 'paypal', '130342230', '43rje23', 231, 770),
(438, 'paypal', '54363423', '4gr642f', 1123, 216),
(438, 'paypal', '6767555', 'gfd455', 1111, 435),
(999, 'paypal', '324324324', 'fd8fd9d', 1020, 457),
(999, 'credit card', '453453', '5435', 4567, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `userfeedback`
--

CREATE TABLE `userfeedback` (
  `IPA` int(11) DEFAULT NULL,
  `feedbacks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userfeedback`
--

INSERT INTO `userfeedback` (`IPA`, `feedbacks`) VALUES
(438, 'your system is suck '),
(411, 'goooooooooooooood'),
(411, 'i love this site');

-- --------------------------------------------------------

--
-- Table structure for table `userhistory`
--

CREATE TABLE `userhistory` (
  `IPA` int(11) DEFAULT NULL,
  `Histories` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userhistory`
--

INSERT INTO `userhistory` (`IPA`, `Histories`) VALUES
(411, 'i love that'),
(411, 'oh its good'),
(411, 'you have sent an issue'),
(411, 'you have sent 71 to user with IPA 438'),
(411, 'you have sent 71$ to user with IPA 438'),
(411, 'you have sent 250$ to user with IPA 438'),
(411, 'you have sent 12$ to user with IPA 438 from your wallet'),
(411, 'you have sent request to user with IPA 438'),
(411, 'you have sent request to user with IPA 438 to give you 500$'),
(411, 'you have charged your digital wallet with 30$ using your bank account'),
(411, 'you have charged your digital wallet with 30$ using your bank account'),
(411, 'you have sent request to user with IPA 438 to give you 500$'),
(438, 'you have added a new Prepaid Card'),
(438, 'you have added a new Prepaid Card'),
(411, 'you have sent an issue'),
(411, 'you have sent an issue'),
(999, 'you have added a new Prepaid Card'),
(438, 'you have charged your digital wallet with 100$ using your prepaid card'),
(438, 'you have charged your digital wallet with 43$ using your prepaid card'),
(438, 'you have charged your digital wallet with 34$ using your prepaid card'),
(438, 'you have charged your digital wallet with 111$ using your prepaid card'),
(438, 'you have charged your digital wallet with 122$ using your prepaid card'),
(438, 'you have charged your digital wallet with 123$ using your prepaid card'),
(438, 'you have charged your digital wallet with 21$ using your prepaid card'),
(438, 'you have charged your digital wallet with 32$ using your prepaid card'),
(438, 'you have charged your digital wallet with 50$ using your bank account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have charged your digital wallet with 43$ using your prepaid card'),
(438, 'you have charged your digital wallet with 21$ using your bank account'),
(438, 'you have Deleted a Prepaid Card'),
(438, 'you have charged your digital wallet with 100$ using your prepaid card'),
(438, 'you have Deleted a Prepaid Card'),
(438, 'you have Deleted a Prepaid Card'),
(438, 'you have Deleted a Prepaid Card'),
(438, 'you have Deleted a Prepaid Card'),
(438, 'you have Deleted a Prepaid Card'),
(438, 'you have Deleted a Prepaid Card'),
(438, 'you have Deleted a Prepaid Card'),
(438, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have sent 11$ to user with IPA 330 from your wallet'),
(438, 'you have sent 11$ to user with IPA 330 from your wallet'),
(438, 'you have sent 11$ to user with IPA 990 from your wallet'),
(438, 'you have sent 11$ to user with IPA 990 from your wallet'),
(438, 'you have sent 11$ to user with IPA 411 from your wallet'),
(438, 'you have sent 11$ to user with IPA 411 from your wallet'),
(438, 'you have sent 11$ to user with IPA 889 from your wallet'),
(438, 'you have sent 11$ to user with IPA 889 from your wallet'),
(438, 'you have sent 11$ to user with IPA 330 from your wallet'),
(438, 'you have sent 11$ to user with IPA 330 from your wallet'),
(438, 'you have sent 11$ to user with IPA 990 from your wallet'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have Deleted a Bank Account'),
(118, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have charged your digital wallet with 200$ using your prepaid card'),
(438, 'you have charged your digital wallet with 200$ using your prepaid card'),
(438, 'you have charged your digital wallet with 200$ using your prepaid card'),
(438, 'you have charged your digital wallet with 10$ using your prepaid card'),
(438, 'you have charged your digital wallet with 10$ using your prepaid card'),
(438, 'you have sent an issue'),
(438, 'you have sent 12$ to user with IPA 411 from your wallet'),
(438, 'you have sent request to user with IPA 411 to give you 23$'),
(438, 'you have sent 22$ to user with IPA 411 from your wallet'),
(438, 'you have sent request to user with IPA 345 to give you 44$'),
(438, 'you have sent 7$ to user with IPA 439 from your wallet'),
(438, 'you have sent 44$ to user with IPA 411 from your wallet'),
(438, 'you have sent request to user with IPA 990 to give you 80$'),
(438, 'you have sent 33$ to user with IPA 411 from your wallet'),
(438, 'you have sent request to user with IPA 999 to give you 8$'),
(438, 'you have sent 4$ to user with IPA 411 from your wallet'),
(999, 'you have sent request to user with IPA 411 to give you 700$'),
(999, 'you have charged your digital wallet with 500$ using your prepaid card'),
(999, 'you have sent 200$ to user with IPA 411 from your wallet'),
(999, 'you have sent an issue'),
(999, 'you have charged your digital wallet with 43$ using your prepaid card'),
(999, 'you have sent 100$ to user with IPA 438 from your wallet'),
(999, 'you have sent 8$ to user with IPA 438 from your wallet'),
(999, 'you have Deleted a Prepaid Card'),
(999, 'you have added a new Prepaid Card'),
(999, 'you have Deleted a Prepaid Card'),
(999, 'you have added a new Prepaid Card'),
(999, 'you have Deleted a Prepaid Card'),
(999, 'you have added a new Prepaid Card'),
(438, 'you have sent an issue'),
(438, 'you have added a new Bank Account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have added a new Bank Account'),
(438, 'you have added a new Bank Account'),
(438, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have sent an issue'),
(438, 'you have charged your digital wallet with 32$ using your bank account'),
(438, 'you have charged your digital wallet with 299$ using your bank account'),
(438, 'you have Deleted a Bank Account'),
(438, 'you have sent request to user with IPA 411 to give you 70$'),
(411, 'you have sent 70$ to user with IPA 438 from your wallet');

-- --------------------------------------------------------

--
-- Table structure for table `userissues`
--

CREATE TABLE `userissues` (
  `IPA` int(11) DEFAULT NULL,
  `issue` text DEFAULT NULL,
  `respond` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IPA` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `userpassword` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `digital_wallet_balance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IPA`, `username`, `email`, `userpassword`, `age`, `phone_number`, `digital_wallet_balance`) VALUES
(118, 'jan', 'jan@gmail.com', '243432222', 29, '5465464454', 0),
(180, 'noor', 'noor@yahoo.com', '3534gf5', 20, '0133423423', 0),
(229, 'yousef', 'yousef@gmail.com', '424fdfd', 20, '023143242', 0),
(345, 'osama ahmed fawzey', 'osama.jack@gmail.com', '1220301', 20, '01022393', NULL),
(411, 'dani', 'dani@gmail.com', '3213311', 22, '011430231', 625),
(438, 'OSAMA', 'osama@siiii.com', '0299201fd', 20, '01023970609', 16400),
(439, 'ali', 'fsdgrfgdfgfd', '3213311', 12, '21312312', 7),
(889, 'adam', 'adam@gmail.com', '3333445555', 15, '0231243423', 22),
(998, 'hatem', 'raiden@yahoo.com', '77777777', 100, '02312324234', 0),
(999, 'Sonic', 'sonic@gmail.com', '100xspeed', 25, '01334324', 235);

-- --------------------------------------------------------

--
-- Table structure for table `usersrequest`
--

CREATE TABLE `usersrequest` (
  `IPAsender` int(11) DEFAULT NULL,
  `IPAreceiver` int(11) DEFAULT NULL,
  `money` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersrequest`
--

INSERT INTO `usersrequest` (`IPAsender`, `IPAreceiver`, `money`) VALUES
(438, 345, 44),
(999, 411, 700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userbankaccounts`
--
ALTER TABLE `userbankaccounts`
  ADD KEY `IPA` (`IPA`);

--
-- Indexes for table `usercards`
--
ALTER TABLE `usercards`
  ADD KEY `IPA` (`IPA`);

--
-- Indexes for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD KEY `IPA` (`IPA`);

--
-- Indexes for table `userhistory`
--
ALTER TABLE `userhistory`
  ADD KEY `IPA` (`IPA`);

--
-- Indexes for table `userissues`
--
ALTER TABLE `userissues`
  ADD KEY `IPA` (`IPA`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IPA`);

--
-- Indexes for table `usersrequest`
--
ALTER TABLE `usersrequest`
  ADD KEY `IPAsender` (`IPAsender`),
  ADD KEY `IPAreceiver` (`IPAreceiver`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IPA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userbankaccounts`
--
ALTER TABLE `userbankaccounts`
  ADD CONSTRAINT `userbankaccounts_ibfk_1` FOREIGN KEY (`IPA`) REFERENCES `users` (`IPA`) ON DELETE CASCADE;

--
-- Constraints for table `usercards`
--
ALTER TABLE `usercards`
  ADD CONSTRAINT `usercards_ibfk_1` FOREIGN KEY (`IPA`) REFERENCES `users` (`IPA`) ON DELETE CASCADE;

--
-- Constraints for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD CONSTRAINT `userfeedback_ibfk_1` FOREIGN KEY (`IPA`) REFERENCES `users` (`IPA`) ON DELETE CASCADE;

--
-- Constraints for table `userhistory`
--
ALTER TABLE `userhistory`
  ADD CONSTRAINT `userhistory_ibfk_1` FOREIGN KEY (`IPA`) REFERENCES `users` (`IPA`) ON DELETE CASCADE;

--
-- Constraints for table `userissues`
--
ALTER TABLE `userissues`
  ADD CONSTRAINT `userissues_ibfk_1` FOREIGN KEY (`IPA`) REFERENCES `users` (`IPA`) ON DELETE CASCADE;

--
-- Constraints for table `usersrequest`
--
ALTER TABLE `usersrequest`
  ADD CONSTRAINT `usersrequest_ibfk_1` FOREIGN KEY (`IPAsender`) REFERENCES `users` (`IPA`) ON DELETE CASCADE,
  ADD CONSTRAINT `usersrequest_ibfk_2` FOREIGN KEY (`IPAreceiver`) REFERENCES `users` (`IPA`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
