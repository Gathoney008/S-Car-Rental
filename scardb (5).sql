-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 08:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_EMAIL` varchar(255) NOT NULL,
  `ADMIN_PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_EMAIL`, `ADMIN_PASSWORD`) VALUES
('admin@scarrentals.com', '73acd9a5972130b75066c82595a1fae3');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BOOK_ID` int(11) NOT NULL,
  `CAR_ID` int(11) NOT NULL,
  `USER_EMAIL` varchar(255) NOT NULL,
  `BOOK_PLACE` varchar(255) NOT NULL,
  `BOOK_DATE` date NOT NULL,
  `DURATION` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(11) NOT NULL,
  `DESTINATION` varchar(255) NOT NULL,
  `RETURN_DATE` date NOT NULL,
  `PRICE` int(11) NOT NULL,
  `BOOK_STATUS` varchar(255) NOT NULL DEFAULT 'UNDER PROCESSING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BOOK_ID`, `CAR_ID`, `USER_EMAIL`, `BOOK_PLACE`, `BOOK_DATE`, `DURATION`, `PHONE_NUMBER`, `DESTINATION`, `RETURN_DATE`, `PRICE`, `BOOK_STATUS`) VALUES
(93, 41, 'bintimiss@gmail.com', 'Nairobi', '2023-04-05', 4, '0798654321', 'Kisumu', '2023-04-10', 18000, 'RETURNED'),
(94, 43, 'arnoldng@gmail.com', 'Nairobi', '2023-04-05', 3, '0722435367', 'Nyeri', '2023-04-08', 24000, 'RETURNED'),
(98, 40, 'bintimiss@gmail.com', 'Nairobi', '2023-04-08', 1, '0798654321', 'Nyahururu', '2023-04-09', 5000, 'RETURNED'),
(99, 40, 'bintimiss@gmail.com', 'Nairobi', '2023-04-08', 7, '0798654321', 'Mwea', '2023-04-15', 35000, 'APPROVED'),
(100, 39, 'martinngugi@gmail.com', 'Nairobi', '2023-04-11', 3, '0722900555', 'Kisumu', '2023-04-14', 13500, 'RETURNED'),
(101, 42, 'bintimiss@gmail.com', 'Nairobi', '2023-04-11', 2, '0798654321', 'Mwea', '2023-04-13', 10000, 'APPROVED'),
(102, 52, 'arnoldng@gmail.com', 'Nairobi', '2023-04-14', 3, '0722435367', 'Malindi', '2023-04-17', 18000, 'APPROVED'),
(103, 41, 'bintimiss@gmail.com', 'Nairobi', '2023-04-10', 2, '0798654321', 'Embu', '2023-04-12', 9000, 'APPROVED'),
(104, 39, 'arnoldng@gmail.com', 'Nairobi', '2023-04-11', 5, '0722435367', 'Kisumu', '2023-04-16', 22500, 'APPROVED'),
(105, 43, 'jmwende@gmail.com', 'Nairobi', '2023-04-11', 3, '0718171615', 'Nyahururu', '2023-04-14', 24000, 'UNDER PROCESSING'),
(106, 43, 'arnoldng@gmail.com', 'Nairobi', '2023-04-12', 2, '0722435367', 'Malindi', '2023-04-14', 16000, 'RETURNED'),
(107, 46, 'jmwende@gmail.com', 'Nairobi', '2023-04-11', 4, '718171615', 'Nyahururu', '2023-04-15', 23996, 'UNDER PROCESSING'),
(108, 55, 'bintimiss@gmail.com', 'Nairobi', '2023-04-14', 6, '798654321', 'Lamu', '2023-04-20', 48000, 'APPROVED'),
(109, 43, 'bintimiss@gmail.com', 'Nairobi', '2023-04-20', 5, '798654321', 'Lamu', '2023-04-25', 40000, 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `CAR_ID` int(11) NOT NULL,
  `CAR_BRAND` varchar(255) NOT NULL,
  `CAR_NAME` varchar(255) NOT NULL,
  `LICENSE_PLATE` varchar(7) NOT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL,
  `FUEL_TYPE` varchar(255) NOT NULL,
  `TRANSMISSION` varchar(255) NOT NULL,
  `CAPACITY` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `CAR_IMG` varchar(255) NOT NULL,
  `AVAILABLE` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `company_phone` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`CAR_ID`, `CAR_BRAND`, `CAR_NAME`, `LICENSE_PLATE`, `DESCRIPTION`, `FUEL_TYPE`, `TRANSMISSION`, `CAPACITY`, `PRICE`, `CAR_IMG`, `AVAILABLE`, `cname`, `company_phone`) VALUES
(39, 'Mazda', 'Demio', 'KBR234T', '1500cc, 2WD, Petrol, Station Wagon. Average fuel consumption in the combined cycle is from 7 to 7.9 liters per 100km', 'Petrol', 'Automatic', 4, 4500, 'IMG-642d4afb1dcfb8.24058425.jpg', 'N', 'Walter & Sons', '0722800845'),
(40, 'Nissan', 'GT-R 2020', 'KCK450K', '6-speed DCT, 3,799 cc (3.8 L) DOHC twin-turbocharged V6, Sports car/Grand tourer (S)', 'Petrol', 'Automatic', 4, 5000, 'IMG-642d4d4f6f3ee0.39935700.jpeg', 'N', 'Walter & Sons', '0722800845'),
(41, 'Toyota', 'Prius', 'KDA672P', 'Automatic Front-Wheel Drive. Power Steering, Anti Lock Braking System, Air Conditioner, Driver Airbag, Passenger Airbag, Automatic Climate Control, Fog Lights - Front, Alloy Wheels. ', 'Petrol', 'Automatic', 4, 4500, 'IMG-642d53fa664d58.85569998.jpg', 'N', 'Walter & Sons', '0722800845'),
(42, 'Peugeot', '308 5-Türer ', 'KBR592B', 'Front-wheel Drive, Hatchback, Standard Luggage Space, Engine 1.2-litre three-cylinder unit', 'Diesel', 'Manual', 4, 5000, 'IMG-642d63a3928c16.46934861.jpg', 'N', 'Westank Motors', '0722566120'),
(43, 'Mitsubishi', 'Outlander  SE SUV 2020', 'KDD788D', '2.4-liter four-cylinder engine, Four-wheel drive, Spacious cargo area, ', 'Petrol', 'Automatic', 7, 8000, 'IMG-642d6932ab9237.18324410.jpg', 'N', 'Westank Motors', '0722566120'),
(46, 'Toyota', 'Mark X', 'KCA902G', 'The MarkX model is a Sedan car manufactured by Toyota, sold new from year 2009. Engine Capacity maximum power of 318 PS (314 bhp - 234 kW). Rear-Wheel Drive, 6-speeed', 'Petrol', 'Automatic', 5, 5999, 'IMG-64337c95f36792.82188179.jpg', 'Y', 'Deluxe Motors', '0722777555'),
(47, 'Toyota', 'Crown Royal Saloon', 'KDC999R', ' spacious, comfortable, and luxurious cabin comparable to the Mercedes E-Class. 2.5L hybrid. The boot is large enough to accommodate standard family luggage, such as suitcases and groceries, but not sizable items.', 'Diesel', 'Automatic', 3, 8000, 'IMG-6433841dac6b44.29868722.jpg', 'Y', 'Deluxe Motors', '0722777555'),
(48, 'Toyota', 'Mark X', 'KCH182H', 'The MarkX model is a Sedan car manufactured by Toyota, sold new from year 2009. Engine Capacity maximum power of 318 PS (314 bhp - 234 kW). Rear-Wheel Drive, 6-speeed', 'Petrol', 'Automatic', 4, 6500, 'IMG-64338a9ddf72f9.52512777.webp', 'Y', 'Walter & Sons', '0722800845'),
(50, 'Mini', 'Cooper S 2015', 'KBZ756U', 'Engine 1998 cc. Top Speed 235 kmph. DriveTrain Front-Wheel Drive. Limitated Lugage Space. Luxury', 'Petrol', 'Automatic', 5, 8000, 'IMG-6433a6a8376f71.94810031.jpg', 'Y', 'Walter & Sons', '0722800845'),
(51, 'Toyota', 'Corolla Station Wagon', 'KDD654G', 'Engine size 1974cc. Drive system 2Wheel-Drive. Station Wagon', 'Diesel', 'Manual', 5, 5000, 'IMG-6433aca6bd9f17.21041212.jpg', 'Y', 'Bensons Rental', '0718100900'),
(52, 'Mitsubishi', 'Mirage Hatchback', 'KDE453D', 'Compact. 1000cc. Automatic. Rear-Wheel Drive. Silver', 'Petrol', 'Automatic', 5, 6000, 'IMG-6433b094167403.13128629.jpg', 'N', 'Bensons Rental', '0718100900'),
(54, 'Peugeot', '3008 SUV', 'KCT670Y', 'Lots of cabin storage. Engine  1.4L, 1500cc. 3D Connected Navigation. Panoramic Opening Glass Roof', 'Petrol', 'Automatic', 5, 10000, 'IMG-6433b7842a4167.88397288.jpg', 'Y', 'Baseline Motors', '0796755387'),
(55, 'Toyota', 'Mark X', 'KCM001N', 'The MarkX model is a Sedan car manufactured by Toyota, sold new from year 2009. Engine Capacity maximum power of 318 PS (314 bhp - 234 kW). Rear-Wheel Drive, 6-speeed', 'Petrol', 'Automatic', 5, 8000, 'IMG-64345524b98c55.00035278.jpg', 'N', 'Walter & Sons', '0722800845'),
(56, 'Mitsubishi', 'Lancer', 'KCC371B', 'Engine 1998 cc. Top Speed 235 kmph. DriveTrain Front-Wheel Drive. Limitated Lugage Space. Luxury', 'Petrol', 'Automatic', 5, 7000, 'IMG-643456a9767cc8.64888690.jfif', 'Y', 'Motomoto Kenya', '0722000700'),
(57, 'Peugeot', '3008', 'KCW768K', ' 2009,Front-engine, four-wheel-drive, SUV, 2.4-liter SOHC 16-valve 4G13 engine, ', 'Petrol', 'Automatic', 5, 8000, 'IMG-64345a937dd660.85128352.jpg', 'Y', 'Walter & Sons', '0722800845'),
(58, 'Mitsubishi', 'Lancer', 'KBM877D', 'The MarkX model is a Sedan car manufactured by Toyota, sold new from year 2009. Engine Capacity maximum power of 318 PS (314 bhp - 234 kW). Rear-Wheel Drive, 6-speeed', 'Petrol', 'Automatic', 5, 7000, 'IMG-6435001be22c53.46839766.jpg', 'Y', 'Walter & Sons', '0722800845'),
(59, 'Mazda', 'Demio', 'KDA345X', 'maximum power of 318 PS (314 bhp - 234 kW). Rear-Wheel Drive 6speed', 'Petrol', 'Automatic', 5, 5000, 'IMG-643f85e2769687.64750863.jpg', 'Y', 'Bensons Rental', NULL),
(60, 'Mazda', 'Demio', 'KDE398G', ' spacious, comfortable, and luxurious cabin comparable to the Mercedes E-Class. 2.5L hybrid. The boot is large enough to accommodate standard family luggage, such as suitcases and groceries, but not sizable items.', 'Petrol', 'Automatic', 5, 5000, 'IMG-643f8a2acc6f79.10574400.jpg', 'Y', 'Walter & Sons', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lic_num` varchar(50) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cname`, `email`, `lic_num`, `phone_number`, `password`) VALUES
('Baseline Motors', 'baselinemotors@gmail.com', '8888000045', '0796755387', 1392),
('Bensons Rental', 'bensonj@gmail.com', '0000111122', '0718100900', 703),
('Deluxe Motors', 'info@deluxecar.com', '9000800012', '0722777555', 3),
('Karl Motors', 'info@karlmotors.com', '3355664477', '0701020304', 0),
('Motomoto Kenya', 'info@motomoto.com', '9999888811', '0722000700', 4),
('Mr Vroom Motors', 'info@vroom.com', '1813556029', '0722555678', 32),
('Walter & Sons', 'info@walters.com', '0009876543', '0722800845', 0),
('Westank Motors', 'info@westankmotors.com', '0012345678', '0722566120', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAY_ID` int(11) NOT NULL,
  `BOOK_ID` int(11) NOT NULL,
  `CARD_NO` varchar(255) NOT NULL,
  `EXP_DATE` varchar(255) NOT NULL,
  `CVV` varchar(3) NOT NULL,
  `PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAY_ID`, `BOOK_ID`, `CARD_NO`, `EXP_DATE`, `CVV`, `PRICE`) VALUES
(40, 93, '1234567890123456', '09/29', '873', 18000),
(41, 94, '2345678901234567', '10/30', '456', 24000),
(43, 98, '1234567890123456', '10/29', '456', 5000),
(44, 99, '1234567890123456', '10/29', '087', 35000),
(45, 100, '0000111122223333', '18/30', '111', 13500),
(46, 101, '1234567890123456', '09/29', '129', 10000),
(47, 102, '2345678901234567', '10/30', '456', 18000),
(48, 103, '1234567890123456', '10/29', '098', 9000),
(49, 104, '9999333344445555', '09/30', '111', 22500),
(50, 105, '9000800070006000', '08/25', '333', 24000),
(51, 106, '8888999911112222', '09/26', '111', 16000),
(52, 107, '1256789098765432', '09/27', '999', 23996),
(53, 108, '123456789123456', '09/25', '0', 48000),
(54, 109, '1234567890123456', '10/29', '0', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FNAME` varchar(255) NOT NULL,
  `LNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `LIC_NUM` varchar(255) NOT NULL,
  `PHONE_NUMBER` varchar(11) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`FNAME`, `LNAME`, `EMAIL`, `LIC_NUM`, `PHONE_NUMBER`, `PASSWORD`, `GENDER`) VALUES
('Arnold', 'Nganga', 'arnoldng@gmail.com', '0045678901', '0722435367', 'a1b21c0b8e445e8860e7cb88749ae39b', 'M'),
('Binti', 'Miss', 'bintimiss@gmail.com', '0089674523', '0798654321', '582127f68b13bd797a803b9881a86885', 'F'),
('Gathoni', 'Nganga', 'gathoninganga@gmail.com', '5557770988', '0718135560', 'ffe2db2720c8b4b2e86ad77d095b7a85', 'F'),
('Hannah', 'Baker', 'hannerbaker@gmail.com', '12290089912', '712453672', '21435836ce2438e123d38e171f643ee0', 'F'),
('Janice', 'Mwende', 'jmwende@gmail.com', '1000200055', '0718171615', 'f2ded428f76a730d49ef724ff4767805', 'F'),
('Samson', 'Katana', 'katanakenya@gmail.com', '3333555581', '0795969798', '506b0475b862a5cf108229374c24207e', 'M'),
('Martin', 'Ngugi', 'martinngugi@gmail.com', '3334561234', '0722900555', '477d0ff3e407088ce796f6c8defffc73', 'M'),
('Vincent', 'Kanyora', 'vincentkanyora@gmai.com', '2023123415', '0718152856', '3b081607655378784bcaec3eaaff513c', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_EMAIL`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BOOK_ID`),
  ADD KEY `booking_ibfk_1` (`CAR_ID`),
  ADD KEY `EMAIL` (`USER_EMAIL`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`CAR_ID`),
  ADD UNIQUE KEY `LICENSE_PLATE` (`LICENSE_PLATE`),
  ADD KEY `cname` (`cname`),
  ADD KEY `cname_2` (`cname`),
  ADD KEY `company_phone` (`company_phone`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `cname` (`cname`),
  ADD KEY `phone_number` (`phone_number`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAY_ID`),
  ADD UNIQUE KEY `BOOK_ID` (`BOOK_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`EMAIL`(100));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BOOK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `CAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`CAR_ID`) REFERENCES `cars` (`CAR_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`BOOK_ID`) REFERENCES `booking` (`BOOK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
