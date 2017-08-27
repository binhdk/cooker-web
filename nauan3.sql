-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 03:40 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nauan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin'),
(2, 'nguyenA@gmail.com', 'nguyen'),
(3, 'tranBgmail.com', 'tran'),
(4, 'phamC@gmail.com', 'pham');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_chitiet` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_monan` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_chitiet`, `id_donhang`, `id_monan`, `soluong`) VALUES
(2, 15, 1, 1),
(3, 15, 2, 1),
(6, 17, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_loai` int(11) NOT NULL,
  `tenloai` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_loai`, `tenloai`) VALUES
(1, 'Món ăn sáng'),
(2, 'Món ăn trưa'),
(3, 'Món ăn tối');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `ngaydat` datetime NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `chitiet` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `id_user`, `diachi`, `dienthoai`, `ngaydat`, `trangthai`, `chitiet`) VALUES
(10, 1, '1', 1, '0000-00-00 00:00:00', 1, ''),
(15, 20, '11', 111, '2017-05-11 00:00:00', 0, ''),
(17, 20, '11', 111, '2017-05-11 01:05:18', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `id_monan` int(50) NOT NULL,
  `tenmonan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_loai` int(11) NOT NULL,
  `thanhphan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`id_monan`, `tenmonan`, `id_loai`, `thanhphan`, `gia`, `hinhanh`, `mota`) VALUES
(1, 'thịt heo khổ qua', 1, 'thịt heo,khổ qua', 30000, 'oqua.jpg', 'very good!'),
(2, 'thịt heo kho mắm ruốt', 2, 'thịt heo,mắm ruốt', 45000, 'mamruot.jpg', 'thơm nứt mũi'),
(3, 'thịt heo kho tau', 3, 'thịt heo,trứng vịt,dừa khô', 30000, 'khotau.jpg', 'yummy'),
(4, 'thịt heo ram', 1, 'thịt heo ba chỉ', 15000, 'thung.jpg', 'delicious'),
(6, 'cá nục ram me', 1, 'cá nục,me tươi', 50000, 'ramme.jpg', 'very good!'),
(7, 'Hủ tiếu nam vang', 2, 'xương heo,thịt heo,rau...', 50000, 'namvang.jpg', 'thơm ngon bổ!'),
(8, 'bún riêu', 3, 'cua,thịt heo bằm', 60000, 'bunrieu.jpg', 'ngon ngon!'),
(9, 'bò kho', 1, 'bò tươi,cà rốt', 40000, 'bokho.jpg', 'bổ rẻ'),
(10, 'mì quảng', 1, 'sợi mì,chả lụa,thịt heo sườn', 25000, 'miquang.jpg', ''),
(11, 'bánh mì ốp la', 2, 'trứng gà,bánh mì', 20000, 'opla.jpg', ''),
(12, 'cơm chiên dương châu', 1, 'cơm nóng để nguội,cà rốt,khoai,nấm...', 35000, 'duongchau.jpg', 'thơm ngon'),
(13, 'xôi gắc gà chiên', 2, 'gạo nếp,trái gấc,gà...', 15000, 'xoigac.jpg', ''),
(15, 'bún cá rô', 3, 'bún,cá rô', 45000, 'caro.jpg', ''),
(16, 'bún thịt nướng', 2, 'bún,thịt heo', 22000, 'thitnuong.jpg', 'ngon'),
(17, 'gà kho sả', 2, 'gà,xả', 55000, 'gakho.jpg', 'thơm ngon'),
(18, 'gà nấu củ', 2, 'gà,các loại rau củ quả...', 60000, 'naucu.jpg', ''),
(19, 'gà chiên mắm', 2, 'gà...', 35000, 'chiemmam.jpg', ''),
(20, 'gà xé trộn gỏi', 1, 'gà,rau răm,thơm...', 50000, 'xegoi.jpg', ''),
(21, 'gà quay', 2, 'gà...', 190000, 'quay.jpg', 'nhức mũi\r\n'),
(22, 'cá lóc kho tộ', 2, 'cá lóc,gừng', 45000, 'khoto''.jpg', ''),
(23, 'cá lóc nướng', 2, 'cá lóc...', 25000, 'nuong.jpg', 'thơm'),
(24, 'cá bống kho tộ', 2, 'cá bống,sả...', 55000, 'bong.jpg', ''),
(25, 'cá lóc um chuối', 3, 'cá lóc,bắp chuối', 60000, 'chuoi.jpg', ''),
(26, 'cá lóc sốt me', 3, 'cá lóc,me tươi', 70000, 'sotme.jpg', ''),
(32, 'lẫu bò', 3, 'bò...', 200000, 'laubo.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tenkhachhang` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `sothanhvien` int(10) NOT NULL,
  `sothich` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `tenkhachhang`, `password`, `diachi`, `dienthoai`, `sothanhvien`, `sothich`) VALUES
(1, 'duc@duc.com', 'Bui Hoang Duc', 'duc', 'q12', 456468, 6, 'eo biet'),
(20, 'binh@gmail.com', 'Nguyễn Văn Bình', '123', '11', 111, 1, '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_chitiet`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_loai`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`id_monan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id_chitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `id_monan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
