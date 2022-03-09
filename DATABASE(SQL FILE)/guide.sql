-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 07:45 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'sadi', 'sadi@gmail.com', 'sadi1234');

-- --------------------------------------------------------

--
-- Table structure for table `movie_and_tv`
--

CREATE TABLE `movie_and_tv` (
  `program_id` int(100) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `details` varchar(250) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `show_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_and_tv`
--

INSERT INTO `movie_and_tv` (`program_id`, `program_name`, `source`, `details`, `duration`, `schedule`, `genre`, `show_image`) VALUES
(42, 'Outside the Wire', 'Netflix', 'In the near future, a drone pilot sent into a war zone finds himself paired up with a top-secret android officer...', '1hr55m', 'Anytime', 'Action', 'program-613b06ffe5acc8.23733938.jpg'),
(44, 'Shadow and Bone', 'Netflix', 'Sinister forces plot against a young soldier after she reveals a magical power that may unite her world..', '1 season', 'Anytime', 'fantasy', 'program-613b0839673820.57479789.jpg'),
(45, 'The Matrix Resurrections', 'HBOmax', 'The Matrix Resurrections is an upcoming American science fiction action film produced, co-written..', '2hr30m', 'Anytime', 'scifi', 'program-613b14cd5f3637.39154813.jpg'),
(46, 'Castlevania', 'Netflix', 'Inspired by the popular video game series, this anime series is a dark medieval fantasy..', '4 seasons', 'Anytime', 'Anime', 'program-613b48ae81ce36.85360292.jpg'),
(47, 'Im standing on a millionlives', 'Netflix', 'Three students are transported to a magical world..', '2 seasons', 'Anytime', 'Anime', 'program-613b49337582f2.48820400.jpg'),
(48, 'My hero academia', 'Netflix', 'My Hero Academia is a Japanese superhero manga series written and illustrated by K?hei Horikoshi. The story follows Izuk', '5 seasons', 'Anytime', 'anime', 'program-613b8c4dd1a172.68613505.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `myprograms`
--

CREATE TABLE `myprograms` (
  `myprogram_id` int(100) NOT NULL,
  `myprogram_name` varchar(100) NOT NULL,
  `mysource` varchar(100) NOT NULL,
  `mygenre` varchar(100) NOT NULL,
  `myduration` varchar(100) NOT NULL,
  `mydetails` varchar(250) NOT NULL,
  `myschedule` varchar(100) NOT NULL,
  `myshow_image` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `program_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myprograms`
--

INSERT INTO `myprograms` (`myprogram_id`, `myprogram_name`, `mysource`, `mygenre`, `myduration`, `mydetails`, `myschedule`, `myshow_image`, `rating`, `program_id`, `user_id`) VALUES
(42, 'Avengers Endgame', 'disneyplus', 'Action', '3hr12m', 'After Thanos, an intergalactic warlord, disintegrates half of the universe...', 'Anytime', 'program-613ad9374148a1.64346625.jpg', 5, 40, 1),
(43, 'Avengers Endgame', 'disneyplus', 'Action', '3hr12m', 'After Thanos, an intergalactic warlord, disintegrates half of the universe...', 'Anytime', 'program-613ad9374148a1.64346625.jpg', 5, 40, 14),
(44, 'Avengers Endgame', 'disneyplus', 'Action', '3hr12m', 'After Thanos, an intergalactic warlord, disintegrates half of the universe...', 'Anytime', 'program-613ad9374148a1.64346625.jpg', 0, 40, 15),
(45, 'The Tomorrow War', 'Amazon prime', 'scifi', '2hr20m', 'The world is stunned when a group of time travellers arrive from the year 2051 to deliver an urgent...', 'Anytime', 'program-613b06a96610a9.57662053.jpg', 3, 41, 15),
(46, 'Outside the Wire', 'Netflix', 'Action', '1hr55m', 'In the near future, a drone pilot sent into a war zone finds himself paired up with a top-secret android officer...', 'Anytime', 'program-613b06ffe5acc8.23733938.jpg', 0, 42, 15),
(47, 'Vincenzo', 'Netflix', 'crime', '1 season', 'During a visit to his motherland, a Korean-Italian mafia lawyer gives a...', 'Anytime', 'program-613b076253af34.01046347.jpg', 0, 43, 15),
(48, 'Shadow and Bone', 'Netflix', 'fantasy', '1 season', 'Sinister forces plot against a young soldier after she reveals a magical power that may unite her world..', 'Anytime', 'program-613b0839673820.57479789.jpg', 0, 44, 15),
(49, 'The Tomorrow War', 'Amazon prime', 'scifi', '2hr20m', 'The world is stunned when a group of time travellers arrive from the year 2051 to deliver an urgent...', 'Anytime', 'program-613b06a96610a9.57662053.jpg', 4, 41, 1),
(51, 'Vincenzo', 'Netflix', 'crime', '1 season', 'During a visit to his motherland, a Korean-Italian mafia lawyer gives a...', 'Anytime', 'program-613b076253af34.01046347.jpg', 0, 43, 1),
(52, 'Shadow and Bone', 'Netflix', 'fantasy', '1 season', 'Sinister forces plot against a young soldier after she reveals a magical power that may unite her world..', 'Anytime', 'program-613b0839673820.57479789.jpg', 0, 44, 1),
(53, 'The Matrix Resurrections', 'HBOmax', 'scifi', '2hr30m', 'The Matrix Resurrections is an upcoming American science fiction action film produced, co-written..', 'Anytime', 'program-613b14cd5f3637.39154813.jpg', 0, 45, 1),
(54, 'The Matrix Resurrections', 'HBOmax', 'scifi', '2hr30m', 'The Matrix Resurrections is an upcoming American science fiction action film produced, co-written..', 'Anytime', 'program-613b14cd5f3637.39154813.jpg', 0, 45, 14),
(55, 'Outside the Wire', 'Netflix', 'Action', '1hr55m', 'In the near future, a drone pilot sent into a war zone finds himself paired up with a top-secret android officer...', 'Anytime', 'program-613b06ffe5acc8.23733938.jpg', 0, 42, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `email`, `mobile`, `picture`) VALUES
(1, 'Israk Sadi', 'hello12345', 'israksadi28@gmail.com', '01732576837', 'picture-613a566f90dc85.53009404.jpg'),
(14, 'will smith', '123abc456', 'will@gmail.com', '01528874922', 'picture-613af705250214.26432345.jpg'),
(15, 'van helsing', 'van123456', 'van@gmail.com', '01789568422', 'picture-613b0897cac787.79065001.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_and_tv`
--
ALTER TABLE `movie_and_tv`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `myprograms`
--
ALTER TABLE `myprograms`
  ADD PRIMARY KEY (`myprogram_id`),
  ADD KEY `movie_and_tv` (`program_id`),
  ADD KEY `users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movie_and_tv`
--
ALTER TABLE `movie_and_tv`
  MODIFY `program_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `myprograms`
--
ALTER TABLE `myprograms`
  MODIFY `myprogram_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
