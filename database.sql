-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 09:18 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- Database: `fc_multi_links`
--

-- --------------------------------------------------------

--
-- Table structure for table `artdata`
--

CREATE TABLE `artdata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artistTag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeTag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priceTag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sizeTag` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artdata`
--

INSERT INTO `artdata` (`id`, `name`, `artistTag`, `typeTag`, `priceTag`, `sizeTag`) VALUES
(1, 'San pham 1', '1', '2', '20000', '3'),
(2, 'San pham 2', '2', '2', '100000', '2'),
(3, 'San pham 3', '3', '1', '200000', '1'),
(4, 'San pham 4', '1', '3', '20000', '2'),
(5, 'San pham 5', '1', '2', '230000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `artisttag`
--

CREATE TABLE `artisttag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artisttag`
--

INSERT INTO `artisttag` (`id`, `name`) VALUES
(1, 'ricker'),
(2, 'picasso'),
(3, 'dali');

-- --------------------------------------------------------

--
-- Table structure for table `sizetag`
--

CREATE TABLE `sizetag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizetag`
--

INSERT INTO `sizetag` (`id`, `name`) VALUES
(1, 'large'),
(2, 'medium'),
(3, 'small');

-- --------------------------------------------------------

--
-- Table structure for table `typetag`
--

CREATE TABLE `typetag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `typetag`
--

INSERT INTO `typetag` (`id`, `name`) VALUES
(1, 'drawing'),
(2, 'painting'),
(3, 'skill');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artdata`
--
ALTER TABLE `artdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artisttag`
--
ALTER TABLE `artisttag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizetag`
--
ALTER TABLE `sizetag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typetag`
--
ALTER TABLE `typetag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artdata`
--
ALTER TABLE `artdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `artisttag`
--
ALTER TABLE `artisttag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sizetag`
--
ALTER TABLE `sizetag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `typetag`
--
ALTER TABLE `typetag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
