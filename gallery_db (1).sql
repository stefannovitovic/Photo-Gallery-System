-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2019 at 04:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Nature'),
(2, 'Cars'),
(3, 'Arhitecture'),
(4, 'Wallpapers'),
(5, 'Animals'),
(15, 'Bussines & Work'),
(16, 'Film');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `insert_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_comments_photos1_idx` (`photo_id_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_id` int(11) NOT NULL,
  `category_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photos_users_idx` (`users_id`),
  KEY `fk_photos_categories_idx` (`category_id_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`, `time`, `users_id`, `category_id_fk`) VALUES
(57, 'Bussines No.10', '', '', 'freestocks-org-40k6ZqbsXuo-unsplash.jpg', '', 'image/jpeg', 3296273, '2019-07-06 09:16:48', 87, 15),
(58, 'Mountains', '', '', 'mountains.jpg', '', 'image/jpeg', 352387, '2019-07-06 09:25:32', 87, 1),
(59, 'Car ', '', '', '_large_image_1.jpg', '', 'image/jpeg', 479843, '2019-07-06 09:26:51', 87, 2),
(62, 'Car No.3', '', '', 'images_2.jpg', '', 'image/jpeg', 18578, '2019-07-06 09:28:23', 87, 2),
(61, 'Car No.3', '', '', 'images-6 copy.jpg', '', 'image/jpeg', 21886, '2019-07-06 09:27:54', 87, 1),
(63, 'Bussines No.2', '', '', 'image-1 copy.jpg', '', 'image/jpeg', 328747, '2019-07-06 09:28:44', 87, 15),
(64, 'Car No.4', '', '', 'images-26 copy.jpg', '', 'image/jpeg', 21802, '2019-07-06 09:29:22', 87, 2),
(65, 'Car No.5', '', '', 'images-28 copy.jpg', '', 'image/jpeg', 17662, '2019-07-06 09:30:00', 87, 2),
(66, 'Car No.6', '', '', 'images-50.jpg', '', 'image/jpeg', 21652, '2019-07-06 09:30:24', 87, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(92, 'test_user', '$2y$10$rDFo.DLMk5qXvd9I9rLtWOFYGaCEjzE2COpfu3sjI7zqj/EwnzZeC', 'test', 'user', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
