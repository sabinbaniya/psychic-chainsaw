-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2022 at 07:53 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reservation_id` double NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `no_of_adults` int NOT NULL,
  `no_of_children` int NOT NULL,
  `no_of_rooms` int NOT NULL,
  `payment_option` varchar(100) NOT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `payment_status` varchar(100) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=280 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `reservation_id`, `name`, `email`, `mobile`, `check_in_date`, `check_out_date`, `no_of_adults`, `no_of_children`, `no_of_rooms`, `payment_option`, `booking_status`, `payment_status`, `room_type`, `timestamps`) VALUES
(33, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 13:19:34'),
(35, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 09:07:04'),
(36, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 10:09:42'),
(37, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 10:15:06'),
(40, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(41, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(42, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(43, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(46, 211619268219999, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(47, 1.4566003303939876e20, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(48, 275683530448999, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(49, 406708330567000, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(50, 2.2951311697097654e17, 'Sabin', 'baniya.sabinn@gmail.com', '2134324324123', '2022-07-31', '2022-07-12', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-10 21:05:25'),
(52, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(53, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(54, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(55, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(58, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(59, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(60, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(61, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(64, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(65, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(66, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(67, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(70, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(71, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(72, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(73, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(76, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(77, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(78, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(79, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(82, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(83, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(84, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(85, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(88, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(89, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(90, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(91, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(94, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(95, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(96, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(97, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(100, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(101, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(102, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(103, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(106, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(107, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(108, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(109, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(112, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(113, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(114, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(115, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(118, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(119, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(120, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(121, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(124, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(125, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(126, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(127, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(130, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(131, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(132, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(133, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(136, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(137, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(138, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(139, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(142, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(143, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(144, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(145, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(148, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(149, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(150, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(151, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(154, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(155, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(156, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(157, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(160, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(161, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(162, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(163, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(166, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(167, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(168, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(169, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(172, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(173, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(174, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(175, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(178, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(179, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(180, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(181, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(184, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(185, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(186, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(187, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(190, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(191, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(192, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(193, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(196, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(197, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(198, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(199, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(202, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(203, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(204, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(205, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(208, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(209, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(210, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(211, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(214, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(215, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(216, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(217, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(220, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(221, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(222, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(223, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(226, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(227, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(228, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(229, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(232, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(233, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(234, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(235, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(238, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(239, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(240, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(241, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(244, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(245, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(246, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(247, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(250, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(251, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(252, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(253, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(256, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(257, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(258, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(259, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(262, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(263, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(264, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(265, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(268, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(269, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(270, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(271, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06'),
(274, 211619268219, 'Sabin', 'sadb@san.com', '21301293012', '2022-07-14', '2022-07-09', 1, 0, 1, 'offline', 'pending', 'pending', 'single', '2022-07-08 07:34:34'),
(275, 1456600330393, 'sabin', 'baniya.sabinn@gmail.com', '9806542271', '2022-07-09', '2022-07-10', 1, 0, 1, 'offline', 'verified', 'pending', 'single', '2022-07-09 03:22:04'),
(276, 275683530448, 'sabin', 'dummymail@tutanota.de', '98123120321', '2022-07-09', '2022-07-09', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:24:42'),
(277, 406708330567, 'Sabin', 'baniya.sabinn@gmail.com', '3424234', '2022-07-09', '2022-07-10', 1, 0, 1, 'esewa', 'pending', 'pending', 'single', '2022-07-09 04:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_submissions`
--

DROP TABLE IF EXISTS `contact_form_submissions`;
CREATE TABLE IF NOT EXISTS `contact_form_submissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_form_submissions`
--

INSERT INTO `contact_form_submissions` (`id`, `name`, `mobile`, `subject`, `message`, `email`, `createdat`) VALUES
(5, 'Sabin ', '21312312', 'basdad', 'asdasd', 'baniya.sabinn@gmail.com', '2022-07-15 07:25:28'),
(9, 'sabin', '2131231', 'SDASDAS', 'SDSADA', 'asdas@cmom.com', '2022-07-15 07:40:17'),
(8, 'dsbi', '23212321', 'asdas', 'sadsadas', 'sad@dsa.com', '2022-07-15 07:38:35'),
(10, 'sabin', '2131231', 'SDASDAS', 'SDSADA', 'asdas@cmom.com', '2022-07-15 07:41:03'),
(11, 'Sabin', '213141', 'sadasdsads', 'asdasdas', 'baa@d.com', '2022-07-15 07:41:44'),
(12, 'sabin', '9576423', 'asdsa', 'asdasdas', 'asa@dca.com', '2022-07-15 07:43:23'),
(13, 'sabin', '9576423', 'asdsa', 'asdasdas', 'asa@dca.com', '2022-07-15 07:44:32'),
(14, 'Sabin Baniya', '9806542271', 'test email', 'test message', 'baniya.sabinn@gmail.com', '2022-07-15 07:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `timestamps`, `role`) VALUES
(14, 'destination', 'admin@destination', '$2y$10$BmHO1egPqEpMOkYW9jC3BuZHmNOPnj0N0CNjyQRfW3ufLRH6DPZ3.', '2022-07-08 13:09:23', 'admin'),
(15, 'destination', 'admin@destination', '$2y$10$kpE2ZpPEHc4FRW9aNBAH7e9AsCBDBCUeg1920k9LIA63FP4wf0.q.', '2022-07-08 13:10:25', 'admin'),
(18, 'sushant', 'sushant', '$2y$10$RhqQavX76AJpzGZ3qPbLsutn7.CQwl5mYejDk0Fhw6ZNydWQhuUs.', '2022-07-08 13:37:46', 'manager');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
