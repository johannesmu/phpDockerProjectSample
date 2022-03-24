-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 24, 2022 at 10:42 PM
-- Server version: 8.0.26
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `first`, `last`, `email`) VALUES
(1, 'Blake', 'Snyder', 'b_snyder@hotmail.com'),
(2, 'Francesco', 'Marciuliano', 'fmarciuliano@gmail.com'),
(3, 'Martin', 'Grondin', 'm_grondin@outlook.com'),
(4, 'Lilian ', 'Jackson Braun', 'lljb@gmail.com'),
(5, 'Galia', 'Bernstein', 'gbernstein@gmail.com'),
(6, 'Marijn', 'Haverbeke', 'mhaverbeke@gmail.com'),
(7, 'David', 'Flanagan', 'dflanagan@outlook.com'),
(8, 'Fran', 'Bailey', 'franbailey@hotmail.com'),
(9, 'Christian', 'Rätsch', 'c_ratsch@gmail.com'),
(10, 'John Robin', 'Baker', 'jrbaker@outlook.com'),
(11, 'David Gordon', 'Wilson', 'dg_wilson@gmail.com'),
(12, 'Jim', 'Papadopoulos', 'j_papadopoulos@rocketmail.com'),
(13, 'Frank Rowland', 'Whitt', 'fwhitt@hotmail.com'),
(14, 'Ming-Yi', 'Wu', 'my_wu@gmail.com'),
(15, 'John', 'Montroll', 'jmontroll@outlook.com'),
(16, 'Deb Fitzpatrick', 'Deb Fitzpatrick', 'fitzpatrick_deb@gmail.com'),
(17, 'Stephanie', 'Campisi', 's_campisi@protonmail.com'),
(18, 'Ronald J.', 'Roberts', 'rj_roberts@gmail.com'),
(19, 'Tom', 'Wolfe', 'twolfe@gmail.com'),
(20, 'Jess', 'Black', 'jblack@gmail.com'),
(21, 'Justine ', 'Solomons-Moat', 'jsolomons-moat@gmail.com'),
(22, 'Takashi', 'Hiraide', 't_hiraide@gmail.com'),
(23, 'Andy', 'Raithby', 'araithby@outlook.com'),
(24, 'Pat', 'Doyle', 'p_doyle@gmail.com'),
(25, 'Herwig', 'Baldauf', 'hbaldauf@gmail.com'),
(26, 'John', 'Byl', 'jbyl@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int NOT NULL,
  `book_title` varchar(128) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `isbn13` varchar(13) NOT NULL,
  `isbn10` varchar(10) NOT NULL,
  `year` int NOT NULL,
  `pages` int NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `tagline`, `isbn13`, `isbn10`, `year`, `pages`, `created`, `updated`) VALUES
(2, 'Save the Cat!', 'The Last Book on Screenwriting You\'ll Ever Need', '9781615931712', '1615931716', 2005, 195, NULL, NULL),
(3, 'I Could Pee on This', 'And Other Poems by Cats', '9781452121864', '1452121869', 2012, 112, NULL, NULL),
(4, 'LOLcat Bible', 'In Teh Beginnin Ceiling Cat Maded Teh Skiez An Da Urfs N Stuffs', '9781569757345', '1569757348', 2010, 176, NULL, NULL),
(5, 'The Cat Who Said Cheese', NULL, '9780515120271', '515120278', 1997, 272, NULL, NULL),
(6, 'I Am a Cat', NULL, '9781683351801', '1683351800', 2018, 32, NULL, NULL),
(7, 'Eloquent JavaScript', 'A Modern Introduction to Programming', '9781593279509', '1593279507', 2018, 450, NULL, NULL),
(8, 'JavaScript The Definitive Guide', NULL, '9780596101992', '596101996', 2006, 994, NULL, NULL),
(9, 'The Healing Power of Plants', 'The Hero House Plants that Love You Back', '9781473567283', '1473567289', 2019, 192, NULL, NULL),
(10, 'The Encyclopedia of Psychoactive Plants', 'Ethnopharmacology and Its Applications', '9780892819782', '892819782', 2005, 942, NULL, NULL),
(11, 'Bicycling science', NULL, '9780262731546', '262731541', 2004, 477, NULL, NULL),
(12, 'The Stolen Bicycle', NULL, '9781925498554', '1925498557', 2017, 416, NULL, NULL),
(13, 'Origami Dinosaurs for Beginners', NULL, '9780486498195', '486498190', 2013, 48, NULL, NULL),
(14, '90 Packets of Instant Noodles', NULL, '9781921361999', '1921361999', 2010, 307, NULL, NULL),
(15, 'The Ugly Dumpling', NULL, '9781938063695', '1938063694', 2016, 32, NULL, NULL),
(16, 'Fish Pathology', NULL, '9781118222966', '1118222962', 2012, 592, NULL, NULL),
(17, 'The Right Stuff', NULL, '9781448181971', '1448181976', 2018, 448, NULL, NULL),
(18, 'Kitty Is Not a Cat: Lights Out', NULL, '9780734419750', '734419759', 2020, 60, NULL, NULL),
(19, 'Behind Every Great Woman is a Great Cat', NULL, '9781912785063', '1912785064', 2019, 96, NULL, NULL),
(20, 'The Guest Cat', NULL, '9780811221511', '811221512', 2014, 144, NULL, NULL),
(21, 'Chicken and Noodle Games', '141 Fun Activities with Innovative Equipment', '9780736063920', '736063927', 2007, 244, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_id` int NOT NULL,
  `author_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(10, 10),
(11, 11),
(11, 12),
(11, 13),
(12, 14),
(13, 15),
(14, 16),
(15, 17),
(16, 18),
(17, 19),
(18, 20),
(19, 21),
(20, 22),
(21, 26),
(21, 25),
(21, 24),
(21, 23);

-- --------------------------------------------------------

--
-- Table structure for table `book_image`
--

CREATE TABLE `book_image` (
  `book_id` int NOT NULL,
  `image_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book_image`
--

INSERT INTO `book_image` (`book_id`, `image_id`) VALUES
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(11, 10),
(12, 11),
(13, 12),
(14, 13),
(15, 14),
(16, 15),
(17, 16),
(19, 18),
(20, 19),
(21, 20),
(18, 17);

-- --------------------------------------------------------

--
-- Table structure for table `book_publisher`
--

CREATE TABLE `book_publisher` (
  `book_id` int NOT NULL,
  `publisher_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book_publisher`
--

INSERT INTO `book_publisher` (`book_id`, `publisher_id`) VALUES
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(11, 10),
(12, 11),
(13, 12),
(14, 13),
(15, 14),
(16, 15),
(17, 16),
(18, 17),
(19, 18),
(20, 19),
(21, 20);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `file_name`, `created`, `modified`) VALUES
(1, 'book2.jpeg', '2022-02-24 10:59:52', '2022-02-24 10:58:10'),
(2, 'book_3.jpeg', '2022-02-24 10:59:52', '2022-02-24 10:58:10'),
(3, 'book_4.jpeg', '2022-02-24 10:59:52', '2022-02-24 10:58:10'),
(4, 'book_5.jpeg', '2022-02-24 10:59:52', '2022-02-24 10:58:10'),
(5, 'book_6.jpeg', '2022-02-24 10:59:52', '2022-02-24 10:58:10'),
(6, 'book_7.jpeg', '2022-02-24 11:01:44', '2022-02-24 11:00:23'),
(7, 'book_8.jpeg', '2022-02-24 11:01:44', '2022-02-24 11:00:23'),
(8, 'book_9.jpeg', '2022-02-24 11:01:44', '2022-02-24 11:00:23'),
(9, 'book_10.jpeg', '2022-02-24 11:01:44', '2022-02-24 11:00:23'),
(10, 'book_11.jpeg', '2022-02-24 11:01:44', '2022-02-24 11:00:23'),
(11, 'book_12.jpeg', '2022-02-24 11:03:22', '2022-02-24 11:02:44'),
(12, 'book_13.jpeg', '2022-02-24 11:03:22', '2022-02-24 11:02:44'),
(13, 'book_14.jpeg', '2022-02-24 11:03:22', '2022-02-24 11:02:44'),
(14, 'book_15.jpeg', '2022-02-24 11:03:22', '2022-02-24 11:02:44'),
(15, 'book_16.jpeg', '2022-02-24 11:03:22', '2022-02-24 11:02:44'),
(16, 'book_17.jpeg', '2022-02-24 11:04:11', '2022-02-24 11:03:30'),
(17, 'book_18.jpeg', '2022-02-24 11:04:11', '2022-02-24 11:03:30'),
(18, 'book_19.jpeg', '2022-02-24 11:04:11', '2022-02-24 11:03:30'),
(19, 'book_20.jpeg', '2022-02-24 11:04:11', '2022-02-24 11:03:30'),
(20, 'book_21.jpg', '2022-02-24 11:04:11', '2022-02-24 11:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `name`) VALUES
(1, 'Michael Wiese Productions'),
(2, 'Chronicle Books LLC'),
(3, 'Ulysses Press'),
(4, 'Jove Books'),
(5, 'ABRAMS'),
(6, 'No Starch Press'),
(7, 'O\'Reilly Media, Incorporated'),
(8, 'Ebury Publishing'),
(9, 'Inner Traditions/Bear'),
(10, 'MIT Press'),
(11, 'Text Publishing Company'),
(12, 'Dover Publications'),
(13, 'Fremantle Press'),
(14, 'Mighty Media Kids'),
(15, 'Wiley'),
(16, 'Random House'),
(17, 'Hachette Australia'),
(18, 'Michael O\'Mara'),
(19, 'New Directions'),
(20, 'Human Kinetics');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `book_id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn13` (`isbn13`),
  ADD UNIQUE KEY `isbn10` (`isbn10`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD KEY `book_author_book_id` (`book_id`),
  ADD KEY `book_author_author_id` (`author_id`);

--
-- Indexes for table `book_image`
--
ALTER TABLE `book_image`
  ADD KEY `book_image_book_id` (`book_id`),
  ADD KEY `book_image_image_id` (`image_id`);

--
-- Indexes for table `book_publisher`
--
ALTER TABLE `book_publisher`
  ADD KEY `book_publisher_book_id` (`book_id`),
  ADD KEY `book_publisher_publisher_id` (`publisher_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_id` (`book_id`,`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `book_author_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `book_image`
--
ALTER TABLE `book_image`
  ADD CONSTRAINT `book_image_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `book_image_image_id` FOREIGN KEY (`image_id`) REFERENCES `image` (`image_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `book_publisher`
--
ALTER TABLE `book_publisher`
  ADD CONSTRAINT `book_publisher_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `book_publisher_publisher_id` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
