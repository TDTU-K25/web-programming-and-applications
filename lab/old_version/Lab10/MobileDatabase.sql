-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 07:27 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MobileDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `MaGioHang` int(11) NOT NULL,
  `MaDT` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`MaGioHang`, `MaDT`, `SoLuong`) VALUES
(7, 13, 3),
(8, 9, 2),
(8, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucphukien`
--

CREATE TABLE `danhmucphukien` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `danhmucphukien`
--

INSERT INTO `danhmucphukien` (`MaDM`, `TenDM`) VALUES
(1, 'Phụ kiện iPad'),
(2, 'Phụ kiện iPhone'),
(3, 'Máy nghe nhạc'),
(4, 'Sạc - Pin'),
(5, 'Tai nghe'),
(6, 'Thẻ nhớ'),
(7, 'Thiết bị kết nối');

-- --------------------------------------------------------

--
-- Table structure for table `dienthoai`
--

CREATE TABLE `dienthoai` (
  `MaDT` int(11) NOT NULL,
  `TenDT` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `GiaSP` double DEFAULT NULL,
  `TinhTrang` tinyint(4) DEFAULT NULL,
  `MaHangSX` int(11) DEFAULT NULL,
  `MaHDH` int(11) DEFAULT NULL,
  `SoNguoiXem` int(11) DEFAULT NULL,
  `dai` double DEFAULT NULL,
  `rong` double DEFAULT NULL,
  `cao` double DEFAULT NULL,
  `canNang` double DEFAULT NULL,
  `mau` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `OriginalPicture` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `dienthoai`
--

INSERT INTO `dienthoai` (`MaDT`, `TenDT`, `GiaSP`, `TinhTrang`, `MaHangSX`, `MaHDH`, `SoNguoiXem`, `dai`, `rong`, `cao`, `canNang`, `mau`, `OriginalPicture`) VALUES
(9, 'Apple iPhone 5S', 14890, 0, 1, 2, 123, 12, 12, 12, 12, 'Đen', 'Content/Images/Phones/iPhone5.jpg'),
(11, 'iPhone 3GS 8GB', 7900, 1, 1, 2, 13, 11, 11, 11, 11, 'Đen', 'Content/Images/Phones/iphone3gs.png'),
(13, 'The new iPad 3G', 12000, 0, 1, 2, 532, 15, 15, 15, 15, 'Đen', 'Content/Images/Phones/thenwipad.jpg'),
(15, 'iPad Mini 16 GB', 12500, 1, 1, 2, 342, 11, 11, 11, 11, 'Trắng', 'Content/Images/Phones/ipad_mini_white.png'),
(16, 'iPhone 4S 32 GB', 11532, 1, 1, 2, 24, 5, 5, 2, 5, 'Trắng', 'Content/Images/Phones/iphone 4s.png'),
(17, 'iPad 4 3G Wifi', 15678, 0, 1, 2, 123, 5, 5, 2, 5, 'Đen', 'Content/Images/Phones/ipad4.png'),
(18, 'Galaxy Note N7000', 8590, 1, 2, 1, 12, 6, 6, 6, 6, 'Đen', 'Content/Images/Phones/note1.jpg'),
(19, 'Galaxy S3 - I9300', 78965, 0, 2, 1, 324, 8, 8, 8, 8, 'Trắng', 'Content/Images/Phones/s3.jpg'),
(20, 'Galaxy Note 8.0', 12500, 1, 2, 1, 212, 4, 4, 4, 4, 'Trắng', 'Content/Images/Phones/galaxy-note-8.jpg'),
(21, 'Nokia Lumia 720', 7500, 0, 3, 4, 211, 5, 5, 5, 5, 'Trắng', 'Content/Images/Phones/nokia_lumia_720.png'),
(22, 'Nokia Lumia 920', 6500, 0, 3, 4, 222, 6, 6, 6, 6, 'Đen', 'Content/Images/Phones/lumia920.jpg'),
(23, 'Nokia 109', 1500, 0, 3, 3, 13, 6, 6, 6, 6, 'Đen', 'Content/Images/Phones/nokia_109.png'),
(24, 'Nokia Lumia 820', 4500, 1, 3, 4, 123, 6, 6, 6, 6, 'Đen', 'Content/Images/Phones/Nokia-Lu820.jpg'),
(25, 'HTC One - FPT', 15290, 1, 4, 1, 797, 5, 5, 5, 8, 'Đen', 'Content/Images/Phones/htc_one_fpt.png'),
(26, 'HTC One X Plus', 10690, 0, 4, 1, 212, 6, 7, 8, 4, 'Đen', 'Content/Images/Phones/htc_onex_plus.png'),
(27, 'Nokia Lumia 620', 4630, 1, 3, 4, 112, 6, 3, 6, 3, 'Đen', 'Content/Images/Phones/lumia_620.png'),
(28, 'Sony Xperia ZL - Full HD', 12490, 0, 5, 1, 232, 6, 23, 5, 5, 'Đen', 'Content/Images/Phones/Sony_Xperia_LZ.jpg'),
(29, 'Galaxy S4 I9500', 14890, 1, 2, 1, 112, 3, 3, 6, 3, 'Đen', 'Content/Images/Phones/Galaxy_S4_I9500.jpg'),
(30, 'Xperia Acro S', 6390, 0, 5, 1, 431, 6, 4, 3, 6, 'Đen', 'Content/Images/Phones/xperia_v.jpg'),
(31, 'Lenovo S880', 3990, 1, 6, 1, 212, 6, 3, 6, 7, 'Đen', 'Content/Images/Phones/Lenovo-A800.png'),
(34, 'Google Nexus 4 - 8GB', 8290, 1, 7, 1, 794, 6, 3, 2, 2, 'Đen', 'Content/Images/Phones/google_nexus-4.jpg'),
(35, 'Optimus G - E975', 11250, 0, 7, 1, 546, 5, 23, 21, 43, 'Trắng', 'Content/Images/Phones/gl_optimus.jpg'),
(36, 'Optimus 4X HD - P880', 9040, 1, 7, 1, 332, 32, 12, 53, 21, 'Đen', 'Content/Images/Phones/optimus_hd_4x.png'),
(37, 'HTC Butterfly - FPT', 13990, 0, 4, 1, 657, 212, 31, 23, 325, 'Đen', 'Content/Images/Phones/htc_butterfly.png'),
(38, 'Galaxy Grand Duos - I9082', 7550, 1, 2, 1, 674, 21, 31, 21, 41, 'Trắng', 'Content/Images/Phones/galaxy-Grand-Duos-I9082.png'),
(39, 'Galaxy Tab 2 7.0', 6990, 1, 2, 1, 241, 421, 2121, 41, 23, 'Đen', 'Content/Images/Phones/galaxyTab2.png'),
(43, 'Nokia C3-01 Gold Edition', 5450, 1, 3, 5, 321, 32, 213, 21, 122, 'Vàng', 'Content/Images/Phones/nokia_c.jpg'),
(44, 'Mix Walkman WT13i', 1500, 0, 5, 3, 124, 21, 21, 21, 21, 'Đen', 'Content/Images/Phones/sony_mix_1.jpg'),
(45, 'Lenovo S720 - FPT', 4720, 1, 6, 1, 212, 21, 23, 123, 21, 'Hồng', 'Content/Images/Phones/lenovo_s720_1.png'),
(46, 'Lenovo S890 5 inch', 5660, 1, 6, 1, 212, 2144, 35, 980, 56, 'Xanh dương', 'Content/Images/Phones/lenovo_s890.png'),
(47, 'QSmart Miracle Pad', 3590, 1, 8, 1, 122, 242, 2141, 14, 31, 'Trằng xám', 'Content/Images/Phones/aaa1.jpg'),
(48, 'Q-Smart S2', 1490, 1, 8, 1, 214, 41, 213, 21, 65, 'Đen', 'Content/Images/Phones/aaa3.png');

-- --------------------------------------------------------

--
-- Table structure for table `dienthoainoibat`
--

CREATE TABLE `dienthoainoibat` (
  `madt` int(11) NOT NULL,
  `BigImage` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `dienthoainoibat`
--

INSERT INTO `dienthoainoibat` (`madt`, `BigImage`) VALUES
(9, 'Content/Images/Phones/iPhone5.jpg'),
(18, 'Content/Images/Phones/note1.jpg'),
(29, 'Content/Images/Phones/famous_1.jpg'),
(30, 'Content/Images/Phones/famous_2.jpg'),
(31, 'Content/Images/Phones/famous_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `dienthoaituongthich`
--

CREATE TABLE `dienthoaituongthich` (
  `MaDT` int(11) NOT NULL,
  `MaPK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `dienthoaituongthich`
--

INSERT INTO `dienthoaituongthich` (`MaDT`, `MaPK`) VALUES
(9, 1),
(9, 10),
(9, 12),
(9, 24),
(11, 1),
(11, 10),
(11, 14),
(11, 20),
(13, 2),
(13, 16),
(13, 20),
(13, 22),
(15, 3),
(15, 10),
(15, 12),
(15, 22),
(16, 1),
(16, 3),
(16, 14),
(16, 24),
(17, 2),
(17, 3),
(17, 10),
(17, 20),
(18, 2),
(18, 12),
(18, 14),
(18, 16),
(18, 22),
(19, 1),
(19, 2),
(19, 3),
(19, 16),
(20, 1),
(20, 16),
(20, 22),
(20, 24),
(21, 1),
(21, 10),
(21, 12),
(21, 16),
(22, 2),
(22, 3),
(22, 14),
(22, 16),
(23, 1),
(23, 3),
(23, 16),
(23, 22),
(24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGiohang` int(11) NOT NULL,
  `NgayLap` datetime DEFAULT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `soSanPham` int(11) DEFAULT NULL,
  `tongTien` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`MaGiohang`, `NgayLap`, `username`, `soSanPham`, `tongTien`) VALUES
(7, '2013-04-03 00:00:00', 'admin', 3, 36000),
(8, '2020-02-01 00:00:00', 'admin', 3, 42280);

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `id` int(11) NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `data` longtext CHARACTER SET utf8 COLLATE utf8_vietnamese_ci,
  `phoneID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`id`, `title`, `data`, `phoneID`) VALUES
(1, 'Hướng dẫn sữ dụng iPad 4 3G Wifi', NULL, 17),
(2, 'Hướng dẫn sữ dụng iPhone 4S 32 GB', NULL, 16),
(3, 'Hướng dẫn sữ dụng iPhone 4S 32 GB', NULL, 15),
(4, 'Hướng dẫn sữ dụng The new iPad 3G', NULL, 13),
(5, 'Hướng dẫn Sử dụng Samsung Galaxy S', NULL, 11),
(6, 'Hướng dẫn Sử dụng Nokia 5310 XpressMusic', NULL, 9),
(7, 'Hướng dẫn đặt hàng trực tuyến', NULL, 29);

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHangSX` int(11) NOT NULL,
  `TenHangSX` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSX`, `TenHangSX`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Nokia'),
(4, 'HTC'),
(5, 'Sony'),
(6, 'Lenovo'),
(7, 'LG'),
(8, 'QMobile');

-- --------------------------------------------------------

--
-- Table structure for table `hedieuhanh`
--

CREATE TABLE `hedieuhanh` (
  `MaHDH` int(11) NOT NULL,
  `TenHDH` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hedieuhanh`
--

INSERT INTO `hedieuhanh` (`MaHDH`, `TenHDH`) VALUES
(1, 'Android'),
(2, 'IOS'),
(3, 'Symbian'),
(4, 'Windows Phone'),
(5, 'Hệ điều hành khác');

-- --------------------------------------------------------

--
-- Table structure for table `hinhdt`
--

CREATE TABLE `hinhdt` (
  `MaHinh` int(11) NOT NULL,
  `MaDT` int(11) NOT NULL,
  `PictureURL` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hinhdt`
--

INSERT INTO `hinhdt` (`MaHinh`, `MaDT`, `PictureURL`) VALUES
(1, 18, 'Content/Images/Phones/Details/htcxx01.jpg'),
(2, 18, 'Content/Images/Phones/Details/htcxx02.jpg'),
(3, 18, 'Content/Images/Phones/Details/htcxx03.jpg'),
(4, 18, 'Content/Images/Phones/Details/htcxx04.jpg'),
(5, 25, 'Content/Images/Phones/Details/htc_one_fpt_1.png'),
(7, 25, 'Content/Images/Phones/Details/htc_one_fpt_3.png'),
(8, 25, 'Content/Images/Phones/Details/htc_one_fpt_4.png'),
(9, 25, 'Content/Images/Phones/Details/htc_one_fpt_5.png'),
(10, 25, 'Content/Images/Phones/Details/htc_one_fpt_6.png'),
(11, 26, 'Content/Images/Phones/Details/htc_onex_plus_1.jpg'),
(12, 26, 'Content/Images/Phones/Details/htc_onex_plus_2.jpg'),
(13, 26, 'Content/Images/Phones/Details/htc_onex_plus_3.jpg'),
(14, 26, 'Content/Images/Phones/Details/htc_onex_plus_4.jpg'),
(16, 27, 'Content/Images/Phones/Details/lumia_620_1.jpg'),
(17, 27, 'Content/Images/Phones/Details/lumia_620_2.jpg'),
(18, 27, 'Content/Images/Phones/Details/lumia_620_3.jpg'),
(19, 28, 'Content/Images/Phones/Details/Sony_Xperia_LZ1.jpg'),
(20, 29, 'Content/Images/Phones/Details/Galaxy_S4_I9500_1.jpg'),
(21, 29, 'Content/Images/Phones/Details/Galaxy_S4_I9500_2.jpg'),
(22, 29, 'Content/Images/Phones/Details/Galaxy_S4_I9500_3.jpg'),
(23, 29, 'Content/Images/Phones/Details/Galaxy_S4_I9500_4.jpg'),
(24, 30, 'Content/Images/Phones/Details/xperia_v_1.jpg'),
(25, 31, 'Content/Images/Phones/Details/Lenovo-A800_1.png'),
(26, 34, 'Content/Images/Phones/Details/google_nexus-4_big.jpg'),
(27, 35, 'Content/Images/Phones/Details/gl_optimus_big_1.jpg'),
(28, 35, 'Content/Images/Phones/Details/gl_optimus_big_2.jpg'),
(29, 35, 'Content/Images/Phones/Details/gl_optimus_big_3.jpg'),
(30, 36, 'Content/Images/Phones/Details/optimus_hd_4x_big_1.png'),
(31, 36, 'Content/Images/Phones/Details/optimus_hd_4x_big_2.jpg'),
(33, 36, 'Content/Images/Phones/Details/optimus_hd_4x_big_3.jpg'),
(34, 37, 'Content/Images/Phones/Details/htc_butterfly_big.png'),
(35, 17, 'Content/Images/Phones/Details/ipad_4_big.png'),
(36, 16, 'Content/Images/Phones/Details/iPhone_4s_big_1.png'),
(40, 15, 'Content/Images/Phones/Details/ipad_mini_big.jpg'),
(41, 13, 'Content/Images/Phones/Details/the_new_ipad_1.jpg'),
(43, 11, 'Content/Images/Phones/Details/iPhone_3gs_big.jpg'),
(44, 9, 'Content/Images/Phones/Details/iphone_5_big_1.jpg'),
(45, 9, 'Content/Images/Phones/Details/iphone_5_big_3.jpg'),
(46, 20, 'Content/Images/Phones/Details/samsung-galaxy-note-8_2.jpg'),
(47, 19, 'Content/Images/Phones/Details/samsung-galaxy-s3_1.jpg'),
(49, 24, 'Content/Images/Phones/Details/Nokia-Lumia-820-11.jpg'),
(50, 23, 'Content/Images/Phones/Details/nokia_109.png'),
(51, 22, 'Content/Images/Phones/Details/lumia_920.jpg'),
(52, 21, 'Content/Images/Phones/Details/nokia_lumia_720.png'),
(53, 38, 'Content/Images/Phones/Details/galaxy-Grand-Duos-I9082big.png'),
(54, 39, 'Content/Images/Phones/Details/galaxyTab2_big1.png'),
(55, 39, 'Content/Images/Phones/Details/galaxyTab2_big2.jpg'),
(59, 43, 'Content/Images/Phones/Details/nokia_c_big_1.jpg'),
(60, 43, 'Content/Images/Phones/Details/nokia_c_big_2.jpg'),
(61, 44, 'Content/Images/Phones/Details/sony_mix_1_big1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hinhphukien`
--

CREATE TABLE `hinhphukien` (
  `MaHinh` int(11) NOT NULL,
  `MaPK` int(11) NOT NULL,
  `PictureURL` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hinhphukien`
--

INSERT INTO `hinhphukien` (`MaHinh`, `MaPK`, `PictureURL`) VALUES
(1, 3, 'Content/Images/accessories/ipod_gen2_1.jpg'),
(2, 3, 'Content/Images/accessories/ipod_gen2_2.jpg'),
(3, 3, 'Content/Images/accessories/ipod_gen2_3.jpg'),
(4, 3, 'Content/Images/accessories/ipod_gen2_4.jpg'),
(5, 3, 'Content/Images/accessories/ipod_gen2_5.jpg'),
(6, 10, 'Content/Images/accessories/bigbao1.png'),
(7, 12, 'Content/Images/accessories/sacpin11.jpg'),
(8, 14, 'Content/Images/accessories/sacpin21.jpg'),
(9, 16, 'Content/Images/accessories/201107181013364360_HPM-85_1.jpg'),
(11, 16, 'Content/Images/accessories/201107181013366390_HPM-85_2.jpg'),
(12, 16, 'Content/Images/accessories/201107181013364360_HPM-85_3.jpg'),
(13, 16, 'Content/Images/accessories/201107181013364360_HPM-85_4.jpg'),
(14, 16, 'Content/Images/accessories/201107181013364360_HPM-85_5.jpg'),
(20, 20, 'Content/Images/accessories/201107171544415064_bh_290_1.png'),
(21, 20, 'Content/Images/accessories/201107171544415064_bh_290_2.jpg'),
(22, 20, 'Content/Images/accessories/201107171544415064_bh_290_3.png'),
(23, 22, 'Content/Images/accessories/the11.jpg'),
(24, 24, 'Content/Images/accessories/the21.jpg'),
(25, 26, 'Content/Images/accessories/aaa41.png'),
(26, 27, 'Content/Images/accessories/aaa51.png'),
(27, 30, 'Content/Images/accessories/a61.jpg'),
(28, 31, 'Content/Images/accessories/a71.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotrobanhang`
--

CREATE TABLE `hotrobanhang` (
  `YahooID` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hotrobanhang`
--

INSERT INTO `hotrobanhang` (`YahooID`, `Fullname`) VALUES
('nphminh', 'Hoàng Minh'),
('nvtuong', 'Đại Tướng'),
('pvtuan', 'Phạm Văn Tuấn'),
('vhphi', 'Hồng Phi');

-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoai`, `TenLoai`) VALUES
(1, 'Thành viên'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `headline` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `subTitle` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `picture` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `data` longtext CHARACTER SET utf8 COLLATE utf8_vietnamese_ci,
  `phoneID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `headline`, `updateTime`, `subTitle`, `picture`, `data`, `phoneID`) VALUES
(1, 'Xả hàng giá sốc và quà tặng mùa hè.', '2012-06-26 00:00:00', 'Hoanghamobile xin gửi đến quý khách hàng chương trình giảm giá đối với hàng tồn kho tại siêu thị 382 Nguyễn Văn Cừ như sau:', 'Content/Images/News/xa-hang-gia-soc-va-qua-tang-mua-he-148.jpg', NULL, 17),
(2, 'Nhanh tay trúng quà tặng khi đặt mua Samsung Galaxy Tab 10.1', '2012-05-15 00:00:00', 'Chiếc máy tính bảng siêu mỏng của Samsung mang tên Galaxy Tab 10.1 sẽ chính thức bán tại Việt Nam trong thời gian sắp tới.', 'Content/Images/News/nhanh-tay-trung-qua-tang-khi-dat-mua-samsung-galaxy-tab-101-62.jpg', NULL, 17),
(3, 'Thông báo lịch nghỉ Tết Nguyên đán năm 2013', '2013-02-05 00:00:00', 'Năm 2012 sắp đi qua,Hoanghamobile luôn luôn ghi nhớ sự ủng hộ, tin tưởng của khách và sự nỗ lực,tận tình của toàn thể nhân viên trong suốt thời gian qua.', 'Content/Images/News/thong-bao-lich-nghi-tet-nguyen-dan-nam-2013-162.png', NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `phukien`
--

CREATE TABLE `phukien` (
  `MaPK` int(11) NOT NULL,
  `TenPhuKien` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MauSac` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Gia` double DEFAULT NULL,
  `ThongTin` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MaHangSX` int(11) DEFAULT NULL,
  `OriginalPicture` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `TinhTrang` tinyint(4) DEFAULT NULL,
  `MaLoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `phukien`
--

INSERT INTO `phukien` (`MaPK`, `TenPhuKien`, `MauSac`, `Gia`, `ThongTin`, `MaHangSX`, `OriginalPicture`, `TinhTrang`, `MaLoai`) VALUES
(1, 'Bao da iPad Belk', 'Đen', 220, 'con trong kho', 1, 'Content/Images/accessories/image1.png', 1, 1),
(2, 'Bao da điện thoại', 'Trắng', 120, 'con trong kho', 3, 'Content/Images/accessories/image2.png', 0, 2),
(3, 'iPod Shuffle gen 4 2G', 'Nhiều loại màu', 750, 'Kiểu dáng vuông vắn, nghe nhạc lên đến 20 giờ.\\nHỗ trợ nhiều loại định dạng âm thanh khác nhau', 3, 'Content/Images/accessories/ipod_gen2.jpg', 1, 3),
(10, 'PPSL-14', 'Đen', 90, 'Phụ kiện tương thích với các dòng máy cùng kích thước', 8, 'Content/Images/accessories/bao_iphone.png', 0, 2),
(12, 'Bộ Pin + Sạc cốc', 'Trắng', 450, 'Bộ Pin + Sạc cốc chính hãng của Samsung Galaxy SII', 2, 'Content/Images/accessories/sacpin1.jpg', 1, 4),
(14, 'BST 40', 'Đen', 120, 'Dành cho Sony Ericsson BST 40', 5, 'Content/Images/accessories/sacpin2.jpg', 0, 4),
(16, 'Tai nghe SE HPM 85', 'Đen', 115, 'Thời gian bảo hành', 8, 'Content/Images/accessories/tai1.jpg', 1, 5),
(20, 'Tai nghe BH 209', 'Đen', 350, 'Sử dụng bluetooh, lượng pin lên đến 6 giờ', 4, 'Content/Images/accessories/tai2.jpg', 0, 5),
(22, 'TranFlash 8GB', 'Đen', 125, 'Tốc độ đọc dữ liệu', 2, 'Content/Images/accessories/the1.png', 0, 6),
(24, 'M2 1GB', 'Đen', 110, 'Tốc độ đọc dữ liệu 5MB/s', 7, 'Content/Images/accessories/the2.jpg', 1, 6),
(26, 'Bao da smartcover Ipad', 'Nhiều loại màu', 400, 'Chất liệu : Da cao cấp', 1, 'Content/Images/accessories/aaa4.png', 1, 1),
(27, 'Bao da Silicon', 'Nhiều loại màu', 40, 'Bao silicon trong suốt có hoa văn giành cho iphone 4 và 4S', 4, 'Content/Images/accessories/aaa5.png', 0, 2),
(30, 'Cáp LG', 'Đen', 60, 'Chuẩn kết nối với máy tính USB 2.0', 6, 'Content/Images/accessories/a7.jpg', 1, 7),
(31, 'Đầu Đọc Apacer all in 1', 'Đen', 120, 'Chuẩn kết nối với máy tính USB 2.0', 3, 'Content/Images/accessories/a6.jpg', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `MaSo` int(11) NOT NULL,
  `picture` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tenQuangCao` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `maDT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`MaSo`, `picture`, `tenQuangCao`, `maDT`) VALUES
(1, 'Content/Images/slide/slide1.jpg', 'HTC one', 25),
(3, 'Content/Images/slide/slide3.jpg', 'Samsung Galaxy S3', 26),
(4, 'Content/Images/slide/slide4.png', 'Samsung Galaxy S3', 27),
(9, 'Content/Images/slide/slide5.jpg', 'Samsung Galaxy S3', 28);

-- --------------------------------------------------------

--
-- Table structure for table `sysdiagrams`
--

CREATE TABLE `sysdiagrams` (
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `principal_id` int(11) DEFAULT NULL,
  `diagram_id` int(11) DEFAULT NULL,
  `version` int(11) DEFAULT NULL,
  `definition` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fullname` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phoneNumber` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ghiChu` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MaLoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `password`, `email`, `fullname`, `phoneNumber`, `ghiChu`, `MaLoai`) VALUES
('admin', '$2y$10$eQufjb39sKVd3/c474hR/.Jf4Z7WcD1fzpOJK1JgRffrslWT648ZO\r\n', 'admin@hoangha.com', 'Quản trị viên', '123123123', 'password_hash(\'123456\', PASSWORD_BCRYPT)', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`MaGioHang`,`MaDT`);

--
-- Indexes for table `danhmucphukien`
--
ALTER TABLE `danhmucphukien`
  ADD PRIMARY KEY (`MaDM`);

--
-- Indexes for table `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD PRIMARY KEY (`MaDT`);

--
-- Indexes for table `dienthoainoibat`
--
ALTER TABLE `dienthoainoibat`
  ADD PRIMARY KEY (`madt`);

--
-- Indexes for table `dienthoaituongthich`
--
ALTER TABLE `dienthoaituongthich`
  ADD PRIMARY KEY (`MaDT`,`MaPK`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGiohang`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHangSX`);

--
-- Indexes for table `hedieuhanh`
--
ALTER TABLE `hedieuhanh`
  ADD PRIMARY KEY (`MaHDH`);

--
-- Indexes for table `hinhdt`
--
ALTER TABLE `hinhdt`
  ADD PRIMARY KEY (`MaHinh`,`MaDT`);

--
-- Indexes for table `hinhphukien`
--
ALTER TABLE `hinhphukien`
  ADD PRIMARY KEY (`MaHinh`,`MaPK`);

--
-- Indexes for table `hotrobanhang`
--
ALTER TABLE `hotrobanhang`
  ADD PRIMARY KEY (`YahooID`);

--
-- Indexes for table `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phukien`
--
ALTER TABLE `phukien`
  ADD PRIMARY KEY (`MaPK`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`MaSo`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
