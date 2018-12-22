-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 09:06 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_music`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_video`
--

CREATE TABLE `cat_video` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_video`
--

INSERT INTO `cat_video` (`id`, `name`) VALUES
(1, 'rock'),
(2, 'rap'),
(3, 'pop');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `singer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `song_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `title`, `image`, `singer`, `song_link`, `view`) VALUES
(36, 'Sister', 'THE GLASS CHILD .jpg', 'The Glass Child', 'The_Glass_Child_-_Sister.mp3', 4),
(34, 'Night Owl', 'Broke_For_Free_-_2013011621055318.jpg', 'Broke For Free', 'Broke_For_Free_-_01_-_Night_Owl.mp3', 17),
(37, 'The Promise', 'WordSmith.jpg', 'WordSmith', 'Wordsmith_-_The_Promise.mp3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `password`, `gender`, `level`) VALUES
(3, 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'male', 1),
(7, 'toan0612', 's3652979@rmit.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'male', 2),
(8, 'nguyen hoang phuong vi', 'vivi001@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'female', 2),
(9, 'tu tu tu ', '123455@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', 2),
(10, '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(255) NOT NULL DEFAULT '0',
  `singer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_cat_video` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `image`, `video_link`, `view`, `singer`, `id_cat_video`) VALUES
(23, 'River Flow in You', 'sungha_jung-002.jpg', '', 2, 'Sungha Jung', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_video`
--
ALTER TABLE `cat_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_video`
--
ALTER TABLE `cat_video`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
