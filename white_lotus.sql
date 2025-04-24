-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Apr 24, 2025 at 09:23 AM
-- Server version: 9.3.0
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `white_lotus`
--

-- --------------------------------------------------------

--
-- Table structure for table `camere`
--

CREATE TABLE `camere` (
  `id` int NOT NULL,
  `nume` varchar(100) NOT NULL,
  `descriere` text NOT NULL,
  `pret_noapte` decimal(10,2) NOT NULL,
  `total` int NOT NULL,
  `ocupate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `camere`
--

INSERT INTO `camere` (`id`, `nume`, `descriere`, `pret_noapte`, `total`, `ocupate`) VALUES
(1, 'Accessible Deluxe Ocean-View Room', 'King bed with customizable Four Seasons mattress, One crib and one sofabed (on request)\r\n600 sq.ft. (56 m²), plus lanai\r\n3 adults, or 2 adults and 2 children', 749.99, 50, 0),
(2, 'Accessible Deluxe Garden-View Room', 'King bed or two queen beds with customizable Four Seasons mattresses, King-bedded room: One crib and one sofabed (on request) | Queen-bedded room: One crib (on request)\r\n600 sq.ft. (56 m²), plus lanai\r\nKing bed: 3 adults, or 2 adults and 2 children, Two queen beds: 4 adults, or 2 adults and 2 children', 699.99, 35, 0),
(3, 'Ocean-View Prime Executive Accessible Suite', 'King bed with customizable Four Seasons mattress, One crib (by request) and one sofabed (included)\r\nApproximately 840 sq.ft. (78 m²), plus lanai\r\n3 adults, or 2 adults and 2 children', 849.99, 20, 0),
(4, 'Ocean-View Prime Suite', 'One bedroom: king bed with customizable Four Seasons mattress | Two bedroom: king bed and two queens with customizable Four Seasons mattresses, One rollaway, one crib (on request) and one sofabed (included)\r\n1,400 sq.ft. (130 m²), plus lanai\r\nOne bedroom: 4 adults, or 2 adults and 3 children | Two bedroom: 6 adults, or 4 adults and 5 children', 1499.99, 12, 0),
(5, 'Garden-View Suite', 'King bed with customizable Four Seasons mattress, One rollaway, one crib (on request) and one sofabed (included)\r\n1,100 sq.ft. (102 m²)\r\n4 adults, or 2 adults and 3 children', 1249.99, 13, 0),
(6, 'Ocean-View Room', '\r\nKing bed or two queen beds with customizable Four Seasons mattresses, King-bedded room: One crib (on request) and one sofabed (included) | Queen-bedded room: One crib (on request)\r\n600 sq.ft. (56 m²), plus lanai\r\nKing bed: 3 adults, or 2 adults and 2 children, Two queen beds: 4 adults, or 2 adults and 2 children', 789.99, 55, 0),
(7, 'Mountain-Side Room', 'King bed or two queen beds with customizable Four Seasons mattresses, King-bedded room: One crib (on request) and one sofabed (included), Queen-bedded room: One crib (on request)\r\n600 sq.ft. (56 m²), plus lanai\r\nKing bed: 3 adults, or 2 adults and 2 children, Two queen beds: 4 adults, or 2 adults and 2 children', 689.99, 35, 0),
(8, '\"Maile\" Presidential Three-Bedroom Suite', 'Two king beds and two queen beds, One full size sofabed; one rollaway and one crib on request\r\n4,000 sq.ft (372 m²), plus a lanai fronting the entire north wing\r\n6 adults, or 6 adults and 5 children', 2499.99, 7, 0),
(9, '\"Lokelani\" Presidential Three-Bedroom Suite', 'King bed in two bedrooms and two queen beds in one bedroom with customizable Four Seasons mattresses\r\nTotal of 7,200 sq.ft. (669 m²), including 4,500 sq.ft. (418 m²) indoors and 2,700 sq.ft. (251 m²) of furnished outdoor living, plus a 1,900-sq.ft. (176-m²) private garden\r\n8 adults, or 6 adults and 6 children', 2899.99, 5, 0),
(10, 'Oceanfront Prime Suite', '\r\nKing bed with customizable Four Seasons mattress, One rollaway, one crib (on request) and one sofabed (included)\r\n1,400 sq.ft. (130 m²), plus lanai\r\n4 adults, or 2 adults and 3 children', 999.99, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rezervari`
--

CREATE TABLE `rezervari` (
  `id` int NOT NULL,
  `nume` varchar(100) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `metoda_plata` varchar(50) NOT NULL,
  `detalii_plata` text,
  `camera_id` int NOT NULL,
  `data_rezervare` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camere`
--
ALTER TABLE `camere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervari`
--
ALTER TABLE `rezervari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camere`
--
ALTER TABLE `camere`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rezervari`
--
ALTER TABLE `rezervari`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
