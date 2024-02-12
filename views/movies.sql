-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 10:51 AM
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
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_movies`
--

CREATE TABLE `booked_movies` (
  `movie_id` varchar(50) NOT NULL,
  `seats` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_movies`
--

INSERT INTO `booked_movies` (`movie_id`, `seats`) VALUES
('PRWdKK', 'seat94,seat95,seat94,seat95,seat28,seat29,seat89,seat100,seat95,seat96,seat2,seat3,seat1,seat2,seat100,seat97,seat98,seat51,seat52,seat4,seat48'),
('6UhE0i', 'seat1,seat2,seat1,seat2'),
('TuqXPS', 'seat24,seat35,seat24,seat35,seat64,seat65,seat12,seat13,seat1,seat2');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `name` varchar(50) NOT NULL,
  `seats` varchar(255) NOT NULL,
  `theatre` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `movie_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`name`, `seats`, `theatre`, `phone`, `movie_id`) VALUES
('richard', 'seat94,seat95', 'ff', '0728674821', 'PRWdKK'),
('richard', 'seat94,seat95', 'ff', '0728674821', 'PRWdKK'),
('richard', 'seat28,seat29', 'ff', '0728674821', 'PRWdKK'),
('Flight', 'seat1,seat2', 'ff', '0728674821', '6UhE0i'),
('hell', 'seat89,seat100', 'ff', '0728674821', 'PRWdKK'),
('richard', 'seat24,seat35', 'ff', '0728674821', 'TuqXPS'),
('richard', 'seat24,seat35', 'ff', '0728674821', 'TuqXPS'),
('richard', 'seat95,seat96', 'ff', '0728674821', 'PRWdKK'),
('richard', 'seat64,seat65', 'ff', '0728674821', 'TuqXPS'),
('richard', 'seat12,seat13', 'ff', '0728674821', 'TuqXPS'),
('hell', 'seat2,seat3', 'ff', '0728674821', 'PRWdKK'),
('richard', 'seat1,seat2,seat100', 'ff', '0728674821', 'PRWdKK'),
('richard', 'seat1,seat2', 'ff', '0728674821', 'TuqXPS'),
('richard', 'seat1,seat2', 'ff', '0728674821', '6UhE0i'),
('hell', 'seat97,seat98', 'ff', '0728674821', 'PRWdKK'),
('richard', 'seat51,seat52', 'ff', '0728674821', 'PRWdKK'),
('richard', 'seat4,seat48', 'ff', '0728674821', 'PRWdKK');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie` varchar(50) NOT NULL,
  `movie_description` text NOT NULL,
  `length_hours` int(30) NOT NULL,
  `length_minutes` int(30) NOT NULL,
  `charge` int(50) NOT NULL,
  `rating` int(30) NOT NULL,
  `actor` varchar(30) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `theatre` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `movie_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie`, `movie_description`, `length_hours`, `length_minutes`, `charge`, `rating`, `actor`, `cover`, `theatre`, `date`, `time`, `movie_id`) VALUES
('mmmmmmm', 'rjyfddddddddddddddddd', 0, 20, 500, 7, 'chan', '55.jpg', 'ff', '2024-02-23', '20:36:00.000000', '6UhE0i'),
('big bang', 'Astronaut John Crichton, on an experimental space mission, is accidentally hurled across the universe into the midst of an intergalactic conflict. Trapped among alien creatures wielding deadly technology and hunted by a merciless military race, Crichton is on an epic odyssey', 2, 20, 500, 5, 'jack', 'ab4defa79b.jpg', 'ff', '2024-02-28', '23:22:00.000000', 'PRWdKK'),
('gth', 'ggggggggggggggggggggggfd', 4, 40, 599, 9, 'chan', '1f4136dc83.jpg', 'ff', '2024-02-14', '20:40:00.000000', 'TuqXPS');

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE `theatres` (
  `theatre_name` varchar(50) NOT NULL,
  `county` varchar(30) NOT NULL,
  `town` varchar(30) NOT NULL,
  `streat` varchar(30) NOT NULL,
  `seats` int(30) NOT NULL,
  `display` varchar(50) NOT NULL,
  `theatre_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theatres`
--

INSERT INTO `theatres` (`theatre_name`, `county`, `town`, `streat`, `seats`, `display`, `theatre_id`) VALUES
('ff', 'makueni', 'fffffff', 'tttttt', 100, '739ff1518a.jpg', '0g7QTV'),
('cccc', 'tttt', 'ffffff', 'tttttt', 52, '64aadb1160.jpg', 'DRvUem');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `passwords` varchar(100) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `secondname` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `town` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `theatre` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `profiles` varchar(50) DEFAULT NULL,
  `user_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `passwords`, `roles`, `firstname`, `secondname`, `address`, `town`, `street`, `theatre`, `phone`, `profiles`, `user_id`) VALUES
('dd@gmail.com', '$2y$10$Ln/wUzOn4MvuOCjUPzMVnOXHRBVZmYyQpHkIB2Y8pRfQ/NkcPAC8O', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3zZG95'),
('dra@gmail.com', '$2y$10$W/c.aZ5sPqTO3jeiwhDvWudD6f5CvYxbzfmoZK6jCKQUOfsPvcOpe', 'customer', 'Mark', 'hh', 'Nairobi5901', 'tttttt', 'yuh', NULL, '0728674821', '9e5f0a56dd.jpg', 'gYKKhF'),
('gtre@gmail.com', '$2y$10$1CKLiqx87CNmsABnZk6Ei.korEl3oFpflEWfq6fnyUrp76WaJ25Gm', 'Employee', 'richie', NULL, NULL, NULL, NULL, 'ff', '0728674821', NULL, 'qBRvua'),
('bb@gmail.com', '$2y$10$Bj/On/q/OS3W305ix6N4P.XLTXhg80Qx6MHqFkNT8hcYydhaNasnW', 'Employee', 'bb', NULL, NULL, NULL, NULL, 'ff', '0728674821', NULL, 'Sht85l'),
('gtd@gmail.com', '$2y$10$SvJax.qntopcs6rMsYkKA.IVi5LzZRyP7mxbztN7fx0EO/OpIewO.', 'Employee', 'Richard', NULL, NULL, NULL, NULL, 'ff', '0728674821', NULL, 'tdBJVa'),
('hgfcdzxgh@gmail.com', '$2y$10$LTGzPXB.LJC17w2p2ORq5esZ/rMMaX3iRugcUkGsS64eOJrc2D4ha', 'Employee', 'gtjhggfd', NULL, NULL, NULL, NULL, 'ff', '0728674821', NULL, 'tYQz5w'),
('ggg@gmail.com', '$2y$10$mdcXAizch6MUGDGMEIaoGOrWCUzePfz0rReF7xxE8jqZtMWxUX7ti', 'customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WPBq6X'),
('faith@gmail.com', '$2y$10$8WTJoJ0SHACH6O6knjV/w.abKGTb2iRScM/l1IVmUaE.v443nJ992', 'admin', 'Richard', 'hhhh', 'Nairobi,', 'tgggggg', 'gt', 'ff', '0728674821', NULL, 'xFizVo'),
('dsa@gmail.com', '$2y$10$DEJNvJgj1xzV9LZO39Ldwu8u3BMX0VdT3EQPzMR5PEzga1TbRGqsu', 'customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yIRov0'),
('bgt@gmail.com', '$2y$10$/IX8W.UqYIjxP91m8Cf/bOUYFa54Y.Sj3fwLLaErgoqo/FLvAF9eO', 'Employee', 'ffee', NULL, NULL, NULL, NULL, 'ff', '0728674821', NULL, 'zsGJLh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD KEY `fk_movie_id` (`movie_id`);
ALTER TABLE `booked_movies`
 ADD KEY `fk_movie_id` (`movie_id`);
 

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);
  ADD KEY `fk_theatre` (`theatre`);

--
-- Indexes for table `theatres`
--
ALTER TABLE `theatres`
  ADD PRIMARY KEY (`theatre_name`),
  ADD UNIQUE KEY `theatre_id` (`theatre_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `movies`
ADD CONSTRAINT `fk_theatre` FOREIGN KEY (`theatre`) REFERENCES `theatres` (`theatre_name`);



ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);

ALTER TABLE `booked_movies`
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
