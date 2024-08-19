-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 07:28 AM
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
-- Database: `savoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` int(10) NOT NULL,
  `A_name` varchar(40) NOT NULL,
  `A_unaame` varchar(40) NOT NULL,
  `A_password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `A_name`, `A_unaame`, `A_password`) VALUES
(1, 'Atheef', 'atheef@123', '$2y$10$twPE1y6QHW8mIcqi4hcnyeYWCSPouvd7J7381ycPPjB9YhFFyTV.K'),
(5, 'Atheef', 'atheef123', '$2y$10$4hQc06tvyz2Drs8cu2i.DewV1luujgaBe0O76R/3hGEBkneDKTLiS'),
(6, 'atheef', 'atheef@2003', '$2y$10$N4e7QOVc3ucuoo95awVUIe87ctZ.Ic/CvIKDJJpZSGl9u4dp0Z1Oa'),
(7, 'atheef', 'atheef@123', '$2y$10$zOF05etbir7.docJJdb5h.hycaIe3VOqj4LIxvo/VwsZ1QUnQ9A6G'),
(8, 'abdullah', 'ab2003', '$2y$10$y0htviC.v.B7E7.TfKutNusjZGssqvdeCE.9esU65LnBiT6V.V4Tq');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(10) NOT NULL,
  `feedback` varchar(50) NOT NULL,
  `f_uid` int(10) NOT NULL,
  `f_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `feedback`, `f_uid`, `f_date`) VALUES
(1, 'my name is atheef', 6, '2024-06-23'),
(2, 'my name is atheef', 6, '2024-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `movie_show`
--

CREATE TABLE `movie_show` (
  `M_ID` int(11) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `mactor` varchar(50) NOT NULL,
  `mactress` varchar(50) NOT NULL,
  `mdirector` varchar(50) NOT NULL,
  `mproducer` varchar(50) NOT NULL,
  `tprice` int(10) NOT NULL,
  `language` varchar(10) NOT NULL,
  `mgenere` varchar(15) NOT NULL,
  `thumbnail` longblob NOT NULL,
  `trailer` varchar(500) NOT NULL,
  `reldate` date NOT NULL,
  `duration` varchar(15) NOT NULL,
  `synopsis` varchar(600) NOT NULL,
  `ua` varchar(10) NOT NULL,
  `expired` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movie_show`
--

INSERT INTO `movie_show` (`M_ID`, `movie_name`, `mactor`, `mactress`, `mdirector`, `mproducer`, `tprice`, `language`, `mgenere`, `thumbnail`, `trailer`, `reldate`, `duration`, `synopsis`, `ua`, `expired`) VALUES
(15, 'Garudan', 'Prabas', 'disha patani', 'nag ashwin', 'c, aswin', 800, 'Tamil', 'Action', 0x6d61726920322e6a7067, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/B2yC1jpAYvQ?si=Qbune7Su_1s9yWFG\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2024-05-31', '2hr 15min', 'In Kombai, Theni district in southern Tamil Nadu, Karunakaran and Aadhithya become friends over a shared trauma and look out for each other as they wield powerful authority over the townâ€™s temple and the happenings of the surroundings.', 'A', 1),
(16, 'A QUite PLace : Day One', 'Prabas', 'disha patani', 'nag ashwin', 'c, aswin', 800, 'Tamil', 'Sci-Fy', 0x474e4a652d484b574541415374444e2e6a7067, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gjx-iHGXk9Q?si=3BCL_5hU8ho2r0Uq\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>\r\n', '2024-05-27', '2hr 15min', 'In Kombai, Theni district in southern Tamil Nadu, Karunakaran and Aadhithya become friends over a shared trauma and look out for each other as they wield powerful authority over the townâ€™s temple and the happenings of the surroundings.', 'A', 0),
(20, 'KALKI AD 2829', 'Prabas', 'disha patani', 'nag ashwin', 'c, aswin', 800, 'Tamil', 'Sci-Fy', 0x6b616c6b692e6a7067, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/KVDV9ocP45M?si=DuI2Wd_nmYutSmV5\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2024-06-27', '2hr 15min', 'In Kombai, Theni district in southern Tamil Nadu, Karunakaran and Aadhithya become friends over a shared trauma and look out for each other as they wield powerful authority over the townâ€™s temple and the happenings of the surroundings.', 'A', 0),
(25, 'Indian 2', 'kamal', 'priya', 'shankar', 'subaskaran', 1200, 'Tamil', 'Action', 0x696e646961322e6a7067, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/kqGj31bQQQ0?si=qBWKpV4Ab2RGt7RV\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2024-06-26', '3hr', 'Senapathy, an ex-freedom fighter turned vigilante who fights against corruption. Senapathy returns to the country to aid a young man who has been exposing corrupt politicians in the country through videos on the internet.', 'U', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `O_ID` int(10) NOT NULL,
  `C_ID` int(10) NOT NULL,
  `TimeID` int(10) NOT NULL,
  `T_count` int(10) NOT NULL,
  `Total_price` int(10) NOT NULL,
  `B_date` date NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`O_ID`, `C_ID`, `TimeID`, `T_count`, `Total_price`, `B_date`, `status`) VALUES
(17, 5, 181, 5, 4000, '2024-06-13', 1),
(18, 6, 181, 5, 4000, '2024-06-17', 0),
(19, 6, 181, 3, 2400, '2024-06-18', 0),
(20, 6, 181, 2, 1600, '2024-06-23', 0),
(21, 6, 181, 1, 800, '2024-06-24', 0),
(22, 6, 180, 10, 8000, '2024-06-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `parking_booking`
--

CREATE TABLE `parking_booking` (
  `P_ID` int(10) NOT NULL,
  `parking` varchar(20) NOT NULL,
  `p_UID` int(10) NOT NULL,
  `p_date` date NOT NULL,
  `p_time` time(6) NOT NULL,
  `p_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `parking_booking`
--

INSERT INTO `parking_booking` (`P_ID`, `parking`, `p_UID`, `p_date`, `p_time`, `p_price`) VALUES
(1, 'C5', 6, '2024-06-19', '17:16:00.000000', 300);

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `S_ID` int(10) NOT NULL,
  `Scrn_name` varchar(10) NOT NULL,
  `S_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`S_ID`, `Scrn_name`, `S_description`) VALUES
(1, 'Screen 1', 'This is the 1st screen for the savoy 3d'),
(2, 'Screen 2', 'this 2nd screen its 3d screen'),
(3, 'Screen 3', 'tgis is the screen 3 for this theatre , its about 2d screen');

-- --------------------------------------------------------

--
-- Table structure for table `show_date`
--

CREATE TABLE `show_date` (
  `date_id` int(11) NOT NULL,
  `date1` date NOT NULL,
  `mid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `show_date`
--

INSERT INTO `show_date` (`date_id`, `date1`, `mid`) VALUES
(24, '2024-06-06', 15),
(25, '2024-06-12', 15),
(26, '2024-06-28', 16),
(34, '2024-06-27', 20),
(35, '2024-06-28', 20),
(45, '2024-06-26', 25),
(46, '2024-06-27', 25);

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `time_id` int(11) NOT NULL,
  `stime` time(6) NOT NULL,
  `did` int(11) NOT NULL,
  `scrn_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`time_id`, `stime`, `did`, `scrn_ID`) VALUES
(172, '00:31:00.000000', 24, 1),
(173, '00:29:00.000000', 24, 1),
(174, '00:28:00.000000', 24, 1),
(175, '00:30:00.000000', 24, 1),
(176, '00:31:00.000000', 25, 3),
(177, '00:29:00.000000', 25, 1),
(178, '00:28:00.000000', 25, 1),
(179, '00:30:00.000000', 25, 1),
(180, '10:08:00.000000', 26, 1),
(181, '13:08:00.000000', 26, 1),
(182, '17:10:00.000000', 26, 1),
(235, '09:41:00.000000', 45, 1),
(236, '09:50:00.000000', 46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `st_ID` int(10) NOT NULL,
  `st_name` varchar(20) NOT NULL,
  `st_uname` varchar(20) NOT NULL,
  `st_password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`st_ID`, `st_name`, `st_uname`, `st_password`) VALUES
(3, 'Atheef', 'atheef123', '$2y$10$KO/Vjqx7VFKnHsNhzUL4T.Go2qr9ydVKETz/hOJFQk3UpouSXuXVe'),
(4, 'Atheef', 'atheef123', '$2y$10$X/mjNSyIuniwGsDCIIf.9exdk7avXt2hEyVwC58TBVSdve1p8jihG'),
(5, 'rabiah', 'rabi1998', '$2y$10$D7/4G8fhsTnbGgbaoAcKR.RYW3HyV5GjjBl/2xnsMaOojgNU81DXW');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `T_ID` int(10) NOT NULL,
  `OID` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `Seat_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`T_ID`, `OID`, `price`, `Seat_ID`) VALUES
(15, 17, 800, 50),
(16, 17, 800, 51),
(17, 17, 800, 52),
(18, 17, 800, 53),
(19, 17, 800, 54),
(20, 18, 800, 46),
(21, 18, 800, 42),
(22, 18, 800, 38),
(23, 18, 800, 44),
(24, 18, 800, 48),
(25, 19, 800, 43),
(26, 19, 800, 39),
(27, 19, 800, 49),
(28, 20, 800, 56),
(29, 20, 800, 57),
(30, 21, 800, 58),
(31, 22, 800, 1),
(32, 22, 800, 2),
(33, 22, 800, 3),
(34, 22, 800, 4),
(35, 22, 800, 5),
(36, 22, 800, 6),
(37, 22, 800, 7),
(38, 22, 800, 8),
(39, 22, 800, 9),
(40, 22, 800, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `U_ID` int(10) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `u_email` varchar(40) NOT NULL,
  `u_phone` int(15) NOT NULL,
  `u_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`U_ID`, `uname`, `u_email`, `u_phone`, `u_password`) VALUES
(5, 'Atheef', 'mbaasatheef@gmail.com', 787987255, '8a8bb7cd343aa2ad99b7d762030857a2'),
(6, 'atheef', 'mbaasatheef@gmail.com', 755624023, '$2y$10$fWImxo3E4ZvoXoOPF4DjCeDPDfZ9zfXLgLnzbdUdBcvy/ZNlwEW4u'),
(7, 'rabiah', 'rabiah@gmail.com', 755624023, '$2y$10$Q9YT7Tey6njymKV19OLiCOzMdlk111uXoSG3loQxAtM41pQ5JPQkG'),
(8, 'atheef', 'mbaasatheef@gmail', 123, '$2y$10$3qatL.YVV.t6ALbHW9tyQudgwT0Dcj5.nc9343Az4Gb9nHnqH0RHG'),
(9, 'Atheef', 'mba@gmail.com', 755624023, '$2y$10$IiaettF/eu/rWqym64nV/uo0Pm7xzRgeYfPMLqMCR1K/ffWgKpK1W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `movie_show`
--
ALTER TABLE `movie_show`
  ADD PRIMARY KEY (`M_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`O_ID`),
  ADD KEY `C_ID` (`C_ID`),
  ADD KEY `TimeID` (`TimeID`);

--
-- Indexes for table `parking_booking`
--
ALTER TABLE `parking_booking`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `show_date`
--
ALTER TABLE `show_date`
  ADD PRIMARY KEY (`date_id`),
  ADD KEY `show_date_ibfk_1` (`mid`);

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`time_id`),
  ADD KEY `scrn_ID` (`scrn_ID`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`st_ID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`T_ID`),
  ADD KEY `OID` (`OID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movie_show`
--
ALTER TABLE `movie_show`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `O_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `parking_booking`
--
ALTER TABLE `parking_booking`
  MODIFY `P_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `S_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `show_date`
--
ALTER TABLE `show_date`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `st_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `T_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `U_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `user_account` (`U_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`TimeID`) REFERENCES `show_time` (`time_id`);

--
-- Constraints for table `show_date`
--
ALTER TABLE `show_date`
  ADD CONSTRAINT `show_date_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `movie_show` (`M_ID`);

--
-- Constraints for table `show_time`
--
ALTER TABLE `show_time`
  ADD CONSTRAINT `show_time_ibfk_1` FOREIGN KEY (`scrn_ID`) REFERENCES `screen` (`S_ID`),
  ADD CONSTRAINT `show_time_ibfk_2` FOREIGN KEY (`did`) REFERENCES `show_date` (`date_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`OID`) REFERENCES `orders` (`O_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
