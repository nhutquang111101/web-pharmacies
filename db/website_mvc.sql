-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 01:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_action`
--

CREATE TABLE `audit_action` (
  `id_audit` int(11) NOT NULL,
  `nameAu` varchar(250) NOT NULL,
  `dateAu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit_action`
--

INSERT INTO `audit_action` (`id_audit`, `nameAu`, `dateAu`) VALUES
(1, 'Đăng Nhập', '28-03-2023 19:48:03'),
(2, 'Đăng Nhập', '29-03-2023 08:18:28'),
(3, 'Đăng Nhập', '29-03-2023 08:18:48'),
(4, 'Đăng Nhập', '29-03-2023 08:19:04'),
(5, 'Đăng Nhập', '29-03-2023 08:19:22'),
(6, 'Đăng Nhập', '29-03-2023 08:21:30'),
(7, 'Thêm slider', '29-03-2023 08:22:06'),
(8, 'Thêm Sản Phẩm', '29-03-2023 08:28:24'),
(9, 'Thêm Sản Phẩm', '29-03-2023 08:28:54'),
(10, 'Xóa Danh Mục', '29-03-2023 08:29:05'),
(11, 'Thêm Danh Mục', '29-03-2023 10:05:22'),
(12, 'Đăng Nhập', '29-03-2023 10:19:15'),
(13, 'Thêm Bình Luận ', '29-03-2023 10:19:28'),
(14, 'Thêm Bình Luận ', '29-03-2023 10:41:35'),
(15, 'Thêm Bình Luận ', '29-03-2023 10:42:03'),
(16, 'Thêm Bình Luận ', '29-03-2023 10:49:05'),
(17, 'Thêm Bình Luận ', '29-03-2023 10:49:13'),
(18, 'Thêm Bình Luận ', '29-03-2023 10:51:06'),
(19, 'Thêm Bình Luận ', '29-03-2023 10:52:12'),
(20, 'Thêm Bình Luận ', '29-03-2023 10:53:44'),
(21, 'Thêm Bình Luận ', '29-03-2023 10:54:45'),
(22, 'Xóa Bình Luận', '29-03-2023 11:05:15'),
(23, 'Xóa Bình Luận', '29-03-2023 11:05:17'),
(24, 'Xóa Bình Luận', '29-03-2023 11:05:19'),
(25, 'Xóa Bình Luận', '29-03-2023 11:05:20'),
(26, 'Xóa Bình Luận', '29-03-2023 11:05:22'),
(27, 'Xóa Bình Luận', '29-03-2023 11:05:23'),
(28, 'Xóa Bình Luận', '29-03-2023 11:05:25'),
(29, 'Xóa Bình Luận', '29-03-2023 11:05:27'),
(30, 'Xóa Bình Luận', '29-03-2023 11:05:28'),
(31, 'Xóa Bình Luận', '29-03-2023 11:05:30'),
(32, 'Xóa Bình Luận', '29-03-2023 11:05:31'),
(33, 'Thêm Bình Luận ', '29-03-2023 11:05:53'),
(34, 'Thêm Bình Luận ', '29-03-2023 11:07:00'),
(35, 'Thêm Bình Luận ', '29-03-2023 11:13:56'),
(36, 'Thêm Bình Luận ', '29-03-2023 11:13:59'),
(37, 'Thêm Bình Luận ', '29-03-2023 11:14:03'),
(38, 'Thêm Bình Luận ', '29-03-2023 11:14:07'),
(39, 'Thêm Bình Luận ', '29-03-2023 11:14:30'),
(40, 'Thêm Bình Luận ', '29-03-2023 11:18:32'),
(41, 'Đăng Nhập', '01-04-2023 10:25:35'),
(42, 'Đăng Nhập', '01-04-2023 10:25:41'),
(43, 'Đăng Nhập', '01-04-2023 10:25:54'),
(44, 'Đăng Nhập', '01-04-2023 10:26:11'),
(45, 'Đăng Nhập', '01-04-2023 10:26:57'),
(46, 'Đăng Nhập', '02-04-2023 08:09:27'),
(47, 'Đăng Nhập', '02-04-2023 08:09:32'),
(48, 'Đăng Nhập', '02-04-2023 08:10:42'),
(49, 'Đăng Nhập', '05-04-2023 09:16:52'),
(50, 'Đăng Nhập', '05-04-2023 09:17:00'),
(51, 'Đăng Nhập', '05-04-2023 09:20:57'),
(52, 'Đăng Nhập', '05-04-2023 09:24:18'),
(53, 'Đăng Nhập', '05-04-2023 09:24:24'),
(54, 'Đăng Nhập', '05-04-2023 09:26:02'),
(55, 'Đăng Nhập', '05-04-2023 09:26:06'),
(56, 'Đăng Nhập', '05-04-2023 09:31:00'),
(57, 'Đăng Nhập', '05-04-2023 09:31:04'),
(58, 'Đăng Nhập', '05-04-2023 09:31:14'),
(59, 'Đăng Nhập', '05-04-2023 09:31:43'),
(60, 'Đăng Nhập', '05-04-2023 10:13:16'),
(61, 'Đăng Nhập', '05-04-2023 10:13:43'),
(62, 'Đăng Nhập', '05-04-2023 10:43:34'),
(63, 'Đăng Nhập', '05-04-2023 11:47:24'),
(64, 'Đăng Nhập', '05-04-2023 11:47:33'),
(65, 'Đăng Nhập', '05-04-2023 11:53:34'),
(66, 'Đăng Nhập', '05-04-2023 11:58:04'),
(67, 'Đăng Nhập', '05-04-2023 12:03:53'),
(68, 'Đăng Nhập', '05-04-2023 12:06:28'),
(69, 'Đăng Nhập', '05-04-2023 12:08:57'),
(70, 'Đăng Nhập', '05-04-2023 12:12:17'),
(71, 'Đăng Nhập', '05-04-2023 12:13:17'),
(72, 'Đăng Nhập', '05-04-2023 12:13:45'),
(73, 'Đăng Nhập', '05-04-2023 12:15:16'),
(74, 'Đăng Nhập', '05-04-2023 12:17:25'),
(75, 'Đăng Nhập', '05-04-2023 12:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'quang', 'adminquang', 'quang@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) UNSIGNED NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Dell'),
(2, 'Samsung'),
(6, 'Apple'),
(7, 'Dellple'),
(9, 'ConCung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `sId` text NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(12, 2, '3a8gvshrhmukfa0mquuek2s1vt', 'san pham loi 1', '120', 3, '01371f3971.jpg'),
(81, 10, 'b2nb59abalpsu5fka4f79cpnj0', 'san pham n ', '10000', 1, '3542ca9286.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Dell'),
(2, 'Desktop'),
(4, 'Đồ chơi'),
(9, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id_comment` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `productId` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id_comment`, `customerName`, `content`, `productId`, `blog_id`, `status`) VALUES
(11, 'Huỳnh Nhựt quang', 'ccccc', 11, 0, 1),
(12, 'Huỳnh Nhựt quang', 'ád', 11, 0, 1),
(13, 'Huỳnh Nhựt quang', 'áddd', 11, 0, 1),
(14, 'Huỳnh Nhựt quang', 'ádasd', 11, 0, 1),
(15, 'Huỳnh Nhựt quang', 'ccccccccccccccccccccc', 11, 0, 1),
(16, 'Huỳnh Nhựt quang', 'ffffffffffff', 11, 0, 1),
(17, 'Huỳnh Nhựt quang', 'ffffffffffff', 11, 0, 1),
(18, 'Huỳnh Nhựt quang', 'aaa', 25, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id_compare` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `fullname`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(2, 'Huỳnh Nhựt quang', '3272 Hoàng Lam', 'Bến Tre ', 'AF', '70002', '1234562222', 'admin', 'c4ca4238a0b923820dcc509a6f75849b'),
(3, 'admin1', '1', '1', 'AF', '2', '2', 'admin1', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, 'Kien Le', 'Huynh Tan Phat Quan 7', 'can tho', 'null', '111111', '0914241864', 'kien', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_momo`
--

CREATE TABLE `tbl_momo` (
  `id_momo` int(11) NOT NULL,
  `partner_code` varchar(200) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `order_info` varchar(200) NOT NULL,
  `order_type` varchar(200) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `pay_type` varchar(200) NOT NULL,
  `code_cart` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `date_order`, `status`) VALUES
(43, 11, 'Hủ tiêus', 3, 1, '120000000', '26c7a05dca.jpg', '2023-04-02 06:09:37', 0),
(44, 25, 'Thuoc So lai', 3, 1, '300000', 'efe9a5d756.png', '2023-04-05 07:31:09', 0),
(45, 25, 'Thuoc So lai', 2, 1, '300000', 'efe9a5d756.png', '2023-04-05 08:13:57', 0),
(46, 3, 'quat may 1', 3, 1, '90000', 'bd761f7205.jpg', '2023-04-05 09:53:39', 0),
(47, 10, 'san pham n ', 3, 1, '10000', '3542ca9286.png', '2023-04-05 10:09:04', 0),
(48, 10, 'san pham n ', 3, 1, '10000', '3542ca9286.png', '2023-04-05 10:23:50', 0),
(49, 8, 'aaaaccccccc', 3, 1, '23000', '8a062664db.jpg', '2023-04-05 10:26:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) UNSIGNED NOT NULL,
  `brandId` int(11) UNSIGNED NOT NULL,
  `product_desc` text NOT NULL,
  `types` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `catId`, `brandId`, `product_desc`, `types`, `price`, `image_product`) VALUES
(2, 'san pham loi 1', 4, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', '120000', '01371f3971.jpg'),
(3, 'quat may 1', 1, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', '90000', 'bd761f7205.jpg'),
(4, 'quat may', 2, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', '12000', 'eaa763dbc9.jpg'),
(5, 'San pham 12', 1, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '0', '32000', '26b4ed9b52.png'),
(6, 'san pahm test 2', 4, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '0', '33000', '8a062664db.jpg'),
(7, 'aaaaa', 1, 1, 'aa', '1', '400000', '8a062664db.jpg'),
(8, 'aaaaccccccc', 2, 7, 'mo ta', '1', '23000', '8a062664db.jpg'),
(10, 'san pham n ', 4, 1, '<p>ffffff</p>', '0', '10000', '3542ca9286.png'),
(11, 'Hủ tiêus', 2, 6, '<p>Game Vui&nbsp;</p>', '1', '120000000', '26c7a05dca.jpg'),
(12, 'Bún bò', 4, 2, '<p>&aacute;dfbgfvdcsdvf</p>', '0', '20000', '941e0e064b.png'),
(13, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', '82f1f3b7ca.png'),
(14, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', '8031746bb2.png'),
(15, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', '3f4309f5f9.png'),
(16, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', '21bbbfb1c2.png'),
(17, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', '04444599df.png'),
(18, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', '0c9bacaba8.png'),
(19, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', '181c2bc096.png'),
(20, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', 'd09c394a34.png'),
(21, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', '7720b11295.png'),
(22, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', 'fa3c84bd64.png'),
(23, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', 'b9c0715ada.png'),
(24, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', 'b023b443b5.png'),
(25, 'Thuoc So lai', 2, 2, '<p>Dya la thuoc&nbsp;</p>', '1', '300000', 'efe9a5d756.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `slider_image` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(1, 'Slider 1', '7300dfce15.jpg', 1),
(3, 'slider 3', '15c57fcaf9.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id_wishlist`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(3, 4, 4, 'quat may', '12000', 'eaa763dbc9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_action`
--
ALTER TABLE `audit_action`
  ADD PRIMARY KEY (`id_audit`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id_compare`),
  ADD KEY `customer_id` (`customer_id`,`productId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_momo`
--
ALTER TABLE `tbl_momo`
  ADD PRIMARY KEY (`id_momo`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `productId` (`productId`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `catId` (`catId`,`brandId`),
  ADD KEY `brandId` (`brandId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `customer_id` (`customer_id`,`productId`),
  ADD KEY `productId` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_action`
--
ALTER TABLE `audit_action`
  MODIFY `id_audit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id_compare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_momo`
--
ALTER TABLE `tbl_momo`
  MODIFY `id_momo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD CONSTRAINT `tbl_compare_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_compare_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `tbl_brand` (`brandId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
