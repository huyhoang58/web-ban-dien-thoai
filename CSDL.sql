-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 06:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdl_nhom_7`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `Ma_DanhMuc` int(11) NOT NULL,
  `Ten_DanhMuc` varchar(250) NOT NULL,
  `TrangThai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`Ma_DanhMuc`, `Ten_DanhMuc`, `TrangThai`) VALUES
(1, 'Tivi', b'1'),
(2, 'Tai nghe', b'1'),
(3, 'Loa', b'1'),
(4, 'Máy ảnh', b'1'),
(5, 'Camera phụ kiện', b'1'),
(6, 'Tủ lạnh', b'1'),
(8, 'MP3, Media Players & phụ kiện', b'1'),
(9, 'Âm thanh & Video Phụ kiện', b'1'),
(10, 'Máy ảnh DSLR', b'1'),
(11, 'Nhạc cụ', b'1'),
(12, 'Gaming Consoles', b'1'),
(13, 'Tất cả thiết bị điện tử', b'1'),
(14, 'Máy điều hoà', b'1'),
(16, 'Nhà bếp', b'1'),
(17, 'Máy giặt', b'1'),
(18, 'Sưởi ấm & làm mát', b'1'),
(19, 'All Thiết bị gia đình', b'1'),
(20, 'Hệ thống giải trí gia đình', b'1'),
(21, 'Tất cả điện thoại', b'1'),
(22, 'Tất cả phụ kiện di động', b'1'),
(23, 'Ốp', b'1'),
(24, 'Bảo vệ màn hình', b'1'),
(25, 'Power Banks', b'1'),
(26, 'All Certified Refurbished', b'1'),
(27, 'Máy tính bảng', b'1'),
(28, 'Các thiết bị đeo tay', b'1'),
(29, 'Thiết bị trong nhà', b'1'),
(30, 'Máy tính xách tay', b'1'),
(31, 'Ổ đĩa & bộ nhớ', b'1'),
(32, 'Máy in & Mực in', b'1'),
(33, 'Thiết bị mạng', b'1'),
(34, 'Phụ kiện máy tính', b'1'),
(35, 'Game Zone', b'1'),
(36, 'Phần mềm', b'1'),
(37, 'Thiết bị điện tử', b'1'),
(38, 'Thiết bị gia đình', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `Ma_SanPham` int(11) NOT NULL,
  `Ma_DanhMuc` int(11) NOT NULL,
  `Ten_SanPham` varchar(250) NOT NULL,
  `AnhSP` varchar(250) NOT NULL,
  `Gia` int(11) NOT NULL,
  `MoTa` text NOT NULL,
  `TrangThai` bit(1) NOT NULL DEFAULT b'1',
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`Ma_SanPham`, `Ma_DanhMuc`, `Ten_SanPham`, `AnhSP`, `Gia`, `MoTa`, `TrangThai`, `SoLuong`) VALUES
(3, 21, 'OPPO Reno4', 'uploads/oppo reno 4.png', 347, 'svcvxc', b'1', 100),
(4, 21, 'Apple iPhone 12 Pro', 'uploads/iphone-12-pro-blue-hero.png', 949, 'new', b'1', 50),
(5, 3, 'Sony 80 cm (32 inches)', 'uploads/m4.jpg', 320, 'tv', b'1', 10),
(6, 3, 'Loa Artis', 'uploads/m5.jpg', 394, 'nnn', b'1', 30),
(7, 3, 'Loa Philips', 'uploads/m6.jpg', 249, 'cxzxz', b'1', 40),
(8, 38, 'Tủ Lạnh Neo Fresh 245L', 'uploads/m7.jpg', 230, 'adassa', b'1', 10),
(9, 38, 'Máy giặt BPL', 'uploads/m8.jpg', 180, 'sdasdas', b'1', 30),
(10, 38, 'Lò vi sóng', 'uploads/m9.jpg', 199, 'sdascca', b'1', 50),
(11, 21, 'OPPO Zero', 'uploads/mk1.jpg', 399, 'new', b'1', 101);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Ma_Login` int(11) NOT NULL,
  `us` varchar(50) NOT NULL,
  `pa` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Ma_Login`, `us`, `pa`) VALUES
(1, 'admin', '123456'),
(2, 'thang', '123456'),
(3, 'thi', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`Ma_DanhMuc`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`Ma_SanPham`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Ma_Login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `Ma_DanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `Ma_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Ma_Login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
