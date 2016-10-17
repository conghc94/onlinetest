-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 07:28 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracnghiemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `magv` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã giáo viên = tên đăng nhập',
  `matkhau` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mật khẩu đăng nhập',
  `hoten` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Họ và tên',
  `khoa` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Khoa đang công tác',
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`magv`, `matkhau`, `hoten`, `khoa`, `email`) VALUES
('110011', 'fd783153e8e0dd0834691d5c2476cc1d', 'Ngô Bảo Châu', 'Tiếng Anh', 'nbchau@gmail.com'),
('110012', 'eb063e03776293455541f1553c7f7c1e', 'Lê Thị Hương', 'Toán', 'lthuong@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE `cauhoi` (
  `macauhoi` int(11) NOT NULL,
  `madethi` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cauhoi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cautraloi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dapan` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`macauhoi`, `madethi`, `cauhoi`, `cautraloi`, `dapan`) VALUES
(1, 'AVA01', 'I ............Louisiana state University.', 'A. am attending&B. attend&C. was attending&D. attended', 'A'),
(2, 'AVA01', 'He has been selling motorcycles.................', 'A. ten years ago &B. since ten years&C. for ten years ago&D. for ten years', 'B'),
(3, 'AVA01', 'Columbus............America more then 400 years ago.', 'A. discovered&B. has discovered&C. had discovered&D. he has gone', 'A'),
(4, 'AVA01', 'He fell down when he ............towards the church.', 'A. run&B. runs&C. was running&D. had run', 'C'),
(5, 'AVA01', 'We ............there when our father died.', 'A. still lived&B. lived still&C. was still living&D. were still living', 'D'),
(6, 'AVA01', 'They ............pingpong when their father comes back home.', 'A. will play&B. will be playing&C. play&D. would play', 'B'),
(7, 'AVA01', 'By Christmas, I.............for you for 6 months.', 'A. Shall have been working&B. shall work&C. have been working&D. shall be working', 'A'),
(8, 'AVA01', 'I............in the room now.', 'A. am being&B. was being&C. have been being&D. am', 'D'),
(9, 'AVA01', 'I.............to New york three times this year.', 'A. have been&B. was&C. were&D. had been', 'A'),
(10, 'AVA01', 'I will come and see you before I.............for America.', 'A. leave&B. will leave&C. have left&D. shall leave', 'A'),
(13, 'AV02', 'Laanf 2', 'Làn 2', 'c'),
(28, 'DL2016', '﻿Đâu là thủ đô của Việt Nam \r\n', 'Hà Nội\r\n&Huế\r\n&Đà Nẵng\r\n&TP. HCM\r\n', 'A\r\n'),
(29, 'DL2016', '1+1=?\r\n', '1\r\n&2\r\n&3\r\n&4\r\n', 'B\r\n'),
(30, 'DL2016', 'Chỉ số của mảng bắt đầu từ số mấy\r\n', '-1\r\n&0\r\n&1\r\n&0 hoặc 1\r\n', 'B'),
(34, 'TN01', '﻿Đâu là thủ đô của Việt Nam', 'Hà Nội\r\n&Huế\r\n&Đà Nẵng\r\n&TP. HCM', 'A'),
(35, 'TN01', '2+2=?', '1\r\n&2\r\n&3\r\n&4', 'B'),
(36, 'TN01', 'Chỉ số của mảng bắt đầu từ số mấy', '-1\r\n&0\r\n&1\r\n&0 hoặc 1', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `dethi`
--

CREATE TABLE `dethi` (
  `magv` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT 'Mã số của GV sở hữu đề',
  `madethi` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã đề thi',
  `hocphan` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Học phần',
  `socauhoi` int(11) NOT NULL COMMENT 'Tổng số câu hỏi trong đề',
  `thoigian` int(11) NOT NULL COMMENT 'Thời gian làm bài (phút)',
  `mota` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mô tả chi tiết đề'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dethi`
--

INSERT INTO `dethi` (`magv`, `madethi`, `hocphan`, `socauhoi`, `thoigian`, `mota`) VALUES
('110011', 'AVA01', 'Anh Văn A', 10, 10, 'Đề kiểm tra anh văn 10 phút. Tháng 5/2016'),
('110011', 'DL2016', 'Địa Lý', 3, 10, 'Đề HK 2 - 2016'),
('110012', 'TN01', 'Thử nghiệm', 3, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `ketquathi`
--

CREATE TABLE `ketquathi` (
  `id` int(11) NOT NULL COMMENT 'mã số của kết quả thi',
  `masv` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã số sinh viên',
  `hoten` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Họ tên SV',
  `lophp` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Lớp học phần',
  `madethi` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mã đề thi',
  `ngaythi` datetime DEFAULT NULL COMMENT 'Ngày - giờ làm bài thi',
  `ketqua` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'kết quả: Tổng số câu đúng/Tổng số câu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ketquathi`
--

INSERT INTO `ketquathi` (`id`, `masv`, `hoten`, `lophp`, `madethi`, `ngaythi`, `ketqua`) VALUES
(1, '100001', 'Trần Đại Sơn', '11C2', 'AVA01', '2016-05-05 13:00:24', '7/10'),
(2, '100002', 'Hoàng Chí Công', '10A', 'AVA01', '2016-05-05 13:01:04', '8/10'),
(3, '100003', 'Nguyễn Phương Thảo', '10A', 'AVA01', '2016-05-05 13:02:05', '9/10'),
(4, '101111', 'Nguyễn Văn Bốn', '12', 'TSL01', '2016-05-01 07:04:38', '5/5'),
(5, '102120249', 'Trần Đại Sơn', '12.Nh11', 'TH02', '2016-05-11 07:28:18', '0/3'),
(6, '102120249', 'Trần Đại Sơn', '12.Nh11', 'DLTH', '2016-05-11 07:50:09', '0/3'),
(7, '102120249', 'Trần Đại Sơn', '12.Nh11', 'AVA01', '2016-05-11 07:55:09', '3/10'),
(8, '102120249', 'Sơn Trần', '100', 'T2-2011', '2016-05-12 11:09:45', '1/3'),
(9, '102120222', 'Baaa', 'H222', 'T2-2011', '2016-05-12 11:10:38', '1/3'),
(10, '123', '2423', '11', 'T2-2011', '2016-05-12 11:19:50', '0/3'),
(11, '1236', '1234567', '13245', 'T2-2011', '2016-05-12 11:20:11', '0/3'),
(12, '11201201', '2382', '238234', 'T2-2011', '2016-05-12 11:21:26', '0/3'),
(13, '11231231', '1123123', 'anbc', 'T2-2011', '2016-05-12 11:22:07', '1/3'),
(14, '111111', '222222', 'kkkk', 'T2-2011', '2016-05-12 11:23:39', '1/3'),
(16, '12345', '1232456', '21345465', 'T2-2011', '2016-05-12 11:24:46', '0/3'),
(17, '1100111111', 'thử thử', 't01', 'TN01', '2016-05-12 11:37:11', '3/3'),
(18, '1236', 'qqq', 'q', 'T2-2011', '2016-05-12 11:38:45', '0/3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`magv`);

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`macauhoi`);

--
-- Indexes for table `dethi`
--
ALTER TABLE `dethi`
  ADD PRIMARY KEY (`madethi`);

--
-- Indexes for table `ketquathi`
--
ALTER TABLE `ketquathi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `macauhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `ketquathi`
--
ALTER TABLE `ketquathi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã số của kết quả thi', AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
