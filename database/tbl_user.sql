-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2021 at 02:14 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_logins` int(11) DEFAULT '0',
  `failed_login` int(11) DEFAULT '0',
  `locked` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_logins`, `failed_login`, `locked`) VALUES
(32, 'Gavin', 'gavinbro', '$2y$10$unt8X3Z4XbA1IUrMitQ3XehoXSdfgBPAP1mdPQnvAqtL7MvjByyBq', 'gavinbro97@live.ca', '2021-02-15 23:40:44', '::1', 2, 0, 0),
(33, 'Gavin', 'hats', '$2y$10$ydc4nImS4EuORe.duGG57OquY.ZL0n9dIW.2VXbQ0DqJV33ysGecu', 'gavinbrown025@gmail.com', '2021-02-15 23:58:23', 'no', 0, 0, 0),
(34, 'bruh', 'bruh', '$2y$10$SwBFXhKVvYPc2qYgvoxiIOQtXjslDqymYEIHsPdj5aLcWl3yrA9LG', 'gavinbro97@live.ca', '2021-02-16 00:18:49', '::1', 1, 0, 0),
(35, 'fat', 'fat', '$2y$10$dytoBM1b3/iKhD2qWiacPu2sONx44.Hsq1ID4AJXP/dPbf2FGU5mu', 'gavinbro97@live.ca', '2021-02-16 00:20:04', 'no', 0, 0, 0),
(36, 'wer', 'wer', '$2y$10$WhvfyYoYcs1q15dtnoBdmumdOYOhzgEuJ9U68rx7V34ZnyYjlOzNK', 'gavinbro97@live.ca', '2021-02-16 00:43:09', '::1', 1, 0, 0),
(37, 'g', 'g', '$2y$10$vI.k3AQ79WVVZ7JO..2mSu7D9Ze4Z5irFoA5aUy1LN0t11DAZRJJS', 'gavinbro97@live.ca', '2021-02-17 02:11:41', '::1', 1, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
