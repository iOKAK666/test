-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2025 at 05:04 PM
-- Server version: 10.4.34-MariaDB-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xdnvstor_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `bnum` varchar(50) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `fname`, `lname`, `bnum`, `tname`, `created_at`, `updated_at`) VALUES
(1, '#', '#', '#', 'ธนาคารกสิกร', '2023-02-11 07:48:46', '2024-12-30 08:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `boxlog`
--

CREATE TABLE `boxlog` (
  `id` int(11) NOT NULL,
  `date` datetime(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `prize_name` varchar(255) NOT NULL,
  `uid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `box_product`
--

CREATE TABLE `box_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `price_web` int(11) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `img` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `percent` int(3) NOT NULL DEFAULT 100,
  `salt_prize` varchar(255) NOT NULL DEFAULT 'ไม่ได้รับรางวัล',
  `c_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `box_product`
--

INSERT INTO `box_product` (`id`, `name`, `price`, `price_web`, `des`, `img`, `type`, `percent`, `salt_prize`, `c_type`) VALUES
(1, 'Product Test 1', 11, 0, 'Product Test 1', 'https://img5.pic.in.th/file/secure-sv1/150x150.png', 1, 100, 'ไม่ได้รับรางวัล', 'Category Test 1'),
(2, 'Product Test 2', 22, 0, 'Product Test 2', 'https://img5.pic.in.th/file/secure-sv1/150x150.png', 0, 100, 'ไม่ได้รับรางวัล', 'Category Test 2');

-- --------------------------------------------------------

--
-- Table structure for table `box_stock`
--

CREATE TABLE `box_stock` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` int(3) NOT NULL,
  `p_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `byshop`
--

CREATE TABLE `byshop` (
  `status` varchar(255) NOT NULL,
  `apikey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `byshop`
--

INSERT INTO `byshop` (`status`, `apikey`) VALUES
('on', '#');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `link`) VALUES
(1, 'https://img5.pic.in.th/file/secure-sv1/1320x40041709f342a62c09a.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `des`, `img`) VALUES
(1, 'Category Test 1', 'Category Test 1', 'https://img5.pic.in.th/file/secure-sv1/1320x40041709f342a62c09a.png'),
(2, 'Category Test 2', 'Category Test 2', 'https://img5.pic.in.th/file/secure-sv1/1320x40041709f342a62c09a.png');

-- --------------------------------------------------------

--
-- Table structure for table `crecom`
--

CREATE TABLE `crecom` (
  `recom_1` int(11) NOT NULL DEFAULT 0,
  `recom_2` int(11) NOT NULL DEFAULT 0,
  `recom_3` int(11) NOT NULL DEFAULT 0,
  `recom_4` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crecom`
--

INSERT INTO `crecom` (`recom_1`, `recom_2`, `recom_3`, `recom_4`) VALUES
(0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `date` datetime(2) NOT NULL,
  `des` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`id`, `date`, `des`) VALUES
(1, '2027-07-08 19:42:51.00', 'หมดอายุวันที่ 2024-07-08 19:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `kbank_trans`
--

CREATE TABLE `kbank_trans` (
  `id` int(11) NOT NULL,
  `qr` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kbank_trans`
--

INSERT INTO `kbank_trans` (`id`, `qr`, `ref`, `sender`, `created_at`, `updated_at`) VALUES
(7, '004100060000010103004022001405190636BTF060015102TH9104DD4A', '01402590636BTF06001', NULL, '2024-01-25 19:09:39', '2024-01-25 12:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `products_app`
--

CREATE TABLE `products_app` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_web` decimal(10,2) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `product_info` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `onoroff` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_app`
--

INSERT INTO `products_app` (`id`, `product_id`, `name`, `price`, `price_web`, `img`, `product_info`, `stock`, `status`, `onoroff`, `created_at`) VALUES
(1, '1', 'Netflix 4K /30วัน (จอส่วนตัว)', 97.00, 90.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับอุปกรณ์ <i>(Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">รายเดือน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(2, '2', 'Netflix 4K /7วัน (จอส่วนตัว)', 39.00, 29.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับอุปกรณ์ <i>(Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">7วัน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 22, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(3, '3', 'Netflix 4K /30วัน (จอแชร์)', 69.00, 69.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับอุปกรณ์ <i>(Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">รายเดือน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 25, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(4, '4', 'Netflix 4K /7วัน (จอแชร์)', 15.00, 15.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับอุปกรณ์ <i>(Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">7วัน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(5, '5', 'Disney+ /30วัน (จอส่วนตัว) (ทุกอุปกรณ์)', 79.00, 79.00, 'https://img_app.byshop.me/api/img/app/Disney.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ Disney+ แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน <span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD 4K</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6> <h6>▶️ จะได้รับเป็น Phone/OTP เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6> <h6>▶️ Disney แพ็กเกจ <span class=\"badge bg-warning\">รายเดือน</span></h6>    <li>website <a href=\"https://www.hotstar.com/th\" target=\"_blank\">https://www.hotstar.com/th</a></li>  ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(6, '6', 'Youtube Premium/30วัน (เมลร้าน)', 15.00, 10.00, 'https://img_app.byshop.me/api/img/app/yt.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ รับชม Youtube แบบไม่มีโฆษณาคั่น</h6>  <h6>▶️ ฟังเพลง Youtube Music แบบปิดหน้าจอได้</h6>  <h6>▶️ ดาวน์โหลดเพลงหรือบันทึกวิดีโอเล่นแบบออฟไลน์</h6>  <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>   <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ Youtube Premiumแพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://www.youtube.com/\" target=\"_blank\">https://www.youtube.com/</a></li> ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(7, '7', 'Youtube Premium/30วัน (เมลตัวเอง)', 15.00, 10.00, 'https://img_app.byshop.me/api/img/app/yt.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ รับชม Youtube แบบไม่มีโฆษณาคั่น</h6>  <h6>▶️ ฟังเพลง Youtube Music แบบปิดหน้าจอได้</h6>  <h6>▶️ ดาวน์โหลดเพลงหรือบันทึกวิดีโอเล่นแบบออฟไลน์</h6>  <h6>▶️ จะได้รับเป็น <span class=\"text-light badge bg-dark\">ลิ้งคำเชิญ <img width=\"25px;\" class=\"img-fluid\" src=\"https://byshop.me/buy/img/yt.png\">family</span> เข้าใช้งานได้ทันที</h6>   <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ Youtube Premiumแพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://www.youtube.com/\" target=\"_blank\">https://www.youtube.com/</a></li> ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(8, '8', 'Youtube Premium/1ปี (เมลตัวเอง)', 490.00, 450.00, 'https://img_app.byshop.me/api/img/app/yt.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ รับชม Youtube แบบไม่มีโฆษณาคั่น</h6>  <h6>▶️ ฟังเพลง Youtube Music แบบปิดหน้าจอได้</h6>  <h6>▶️ ดาวน์โหลดเพลงหรือบันทึกวิดีโอเล่นแบบออฟไลน์</h6>  <h6>▶️ จะได้รับเป็น <span class=\"text-light badge bg-dark\">ลิ้งคำเชิญ <img width=\"25px;\" class=\"img-fluid\" src=\"https://byshop.me/buy/img/yt.png\">family</span> เข้าใช้งานได้ทันที</h6>   <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ Youtube Premiumแพ็กเกจ  <span class=\"badge bg-warning\">รายปี</span></h6>  <li>website <a href=\"https://www.youtube.com/\" target=\"_blank\">https://www.youtube.com/</a></li> ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(9, '9', 'MONOMAX/30วัน (จอส่วนตัว)', 35.00, 35.00, 'https://img_app.byshop.me/api/img/app/monomax.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ MONOMAX แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน <span class=\"text-light badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i><h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ MONOMAX แพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://www.monomax.me/\" target=\"_blank\">https://www.monomax.me/</a></li> ', 17, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(10, '10', 'MONOMAX/30วัน (จอแชร์)', 25.00, 25.00, 'https://img_app.byshop.me/api/img/app/monomax.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ MONOMAX แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน <span class=\"text-light badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i><h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ MONOMAX แพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://www.monomax.me/\" target=\"_blank\">https://www.monomax.me/</a></li> ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(11, '11', 'HBO GO/30วัน', 79.00, 45.00, 'https://img_app.byshop.me/api/img/app/hbo.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ HBO GO แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน <span class=\"text-light badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i> <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ HBO GO แพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://www.hbogo.co.th/\" target=\"_blank\">https://www.hbogo.co.th/</a></li> ', 28, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(12, '12', 'VIU Premium/30วัน', 15.00, 15.00, 'https://img_app.byshop.me/api/img/app/viu.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ VIU แอปดูหนัง/ซีรีย์ <span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6> <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i>  <h6>▶️ รับชม VIU Premium แบบไม่มีโฆษณาคั่น</h6>  <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ VIU Premiumแพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://www.viu.com/\" target=\"_blank\">https://www.viu.com/</a></li> ', 2, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(13, '13', 'iQIYI GOLD /30วัน', 22.00, 22.00, 'https://img_app.byshop.me/api/img/app/iq.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ iQIYI แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน <span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i> <h6>▶️ รับชม iqiyi VIP แบบไม่มีโฆษณาคั่น</h6>  <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ iQIYI VIP แพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://www.iq.com/\" target=\"_blank\">https://www.iq.com/</a></li> ', 33, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(14, '14', 'WeTV VIP /30วัน', 20.00, 20.00, 'https://img_app.byshop.me/api/img/app/wetv.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ WeTV แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน <span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i> <h6>▶️ รับชม WeTV VIP แบบไม่มีโฆษณาคั่น</h6>  <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ WeTV VIP แพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://wetv.vip/\" target=\"_blank\">https://wetv.vip/</a></li> ', 44, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(15, '15', 'Amazon Prime Video/30วัน', 45.00, 45.00, 'https://img_app.byshop.me/api/img/app/pv.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ Amazon Prime Video แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน <span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i> <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ Amazon Prime Video แพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://www.primevideo.com/\" target=\"_blank\">https://www.primevideo.com/</a></li> ', 20, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(17, '17', 'Spotify Premium/30วัน(เมลร้าน)', 10.00, 10.00, 'https://img_app.byshop.me/api/img/app/sf.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ Spotify แอปฟังเพลงออนไลน์ รวมเพลงทุกประเทศ</h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> ระดับพรีเมียม</span></h6> <h6>▶️ ฟังเพลงขนาดปิดหน้าจอไม่มีโฆษณากวนใจ</h6>  <h6>▶️ โหลดเพลงไว้ฟังขนาดออฟไลน์ได้</h6>  <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6> <h6>▶️ Spotify แพ็กเกจ <span class=\"badge bg-warning\">รายเดือน</span></h6>    <li>website <a href=\"https://open.spotify.com/\" target=\"_blank\">https://open.spotify.com/</a></li> ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(18, '18', 'TrueID+ /30วัน', 25.00, 25.00, 'https://img_app.byshop.me/api/img/app/trueid+.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ TrueID แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน/TVออนไลน์<span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i> <h6>▶️ รับชม TrueID+ แบบไม่มีโฆษณาคั่น</h6>  <h6>▶️ จะได้รับเป็น Phone/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ TrueID แพ็กเกจ  <span class=\"badge bg-warning\">TrueID+ รายเดือน</span></h6>  <li>website <a href=\"https://www.trueid.net/watch/th-th/trueidplus\" target=\"_blank\">https://www.trueid.net/watch/th-th/trueidplus</a></li> ', 31, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(19, '19', 'AIS Play /30วัน', 10.00, 10.00, 'https://img_app.byshop.me/api/img/app/ais.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ AIS Play แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน/TVออนไลน์<span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i> <h6>▶️ จะได้รับเป็น Phone/OTP เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ AIS Play แพ็กเกจ  <span class=\"badge bg-warning\">family รายเดือน</span></h6>  <li>website <a href=\"https://aisplay.ais.co.th/\" target=\"_blank\">https://aisplay.ais.co.th/</a></li> ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(20, '20', 'Bilibili /30วัน', 25.00, 25.00, 'https://img_app.byshop.me/api/img/app/bb.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ Bilibili แอปดูการ์ตูนอนิเมะ<span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i> <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ Bilibili แพ็กเกจ  <span class=\"badge bg-warning\">Premium รายเดือน</span></h6>  <li>website <a href=\"https://www.bilibili.tv/th\" target=\"_blank\">https://www.bilibili.tv/th</a></li> ', 1, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(21, '21', 'Netflix 4K /1วัน (จอส่วนตัว)', 7.00, 7.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับอุปกรณ์ <i>(Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">1วัน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(22, '22', 'Netflix 4K /1วัน (จอแชร์)', 5.00, 5.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับอุปกรณ์ <i>(Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">1วัน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(23, '23', 'Netflix 4K /30วัน (TV) (จอส่วนตัว)', 159.00, 159.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">รายเดือน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(24, '24', 'YOUKU VIP /30วัน', 29.00, 29.00, 'https://img_app.byshop.me/api/img/app/&n.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ YOUKU แอปดูหนัง/ซีรีย์ <span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6> <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i>  <h6>▶️ รับชม YOUKU Premium แบบไม่มีโฆษณาคั่น</h6>  <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ YOUKU Premiumแพ็กเกจ  <span class=\"badge bg-warning\">รายเดือน</span></h6>  <li>website <a href=\"https://youku.tv/\" target=\"_blank\">https://youku.tv/</a></li> ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(25, '25', 'BeinSports /30วัน', 59.00, 49.00, 'https://img_app.byshop.me/api/img/app/bs.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ beinsports แอปดูกีฬา LIVE สด - ย้อนหลัง<span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i> <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ beinsports แพ็กเกจ  <span class=\"badge bg-warning\">Premium รายเดือน</span></h6>  <li>website <a href=\"https://connect-th.beinsports.com/th\" target=\"_blank\">https://connect-th.beinsports.com/th</a></li> ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(26, '26', 'CH3 Plus /30วัน', 39.00, 39.00, 'https://img_app.byshop.me/api/img/app/ch3.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ CH3 Plus แอปดูภาพยนตร์ / ซีรีส์ / ละคร การ์ตูน / ข่าวสด ย้อนหลัง <span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">Full HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i> <h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>  <h6>▶️ CH3 Plus แพ็กเกจ  <span class=\"badge bg-warning\">Premium รายเดือน</span></h6>  <li>website <a href=\"https://ch3plus.com/\" target=\"_blank\">https://ch3plus.com/</a></li> ', 2, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(27, '27', 'Disney+ /30วัน (จอส่วนตัว) (มือถือ)', 69.00, 69.00, 'https://img_app.byshop.me/api/img/app/Disney.png', '<h3><u>รายละเอียด</u></h3>  <h6>▶️ Disney+ แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน <span class=\"badge bg-dark\"></h6>  <h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> <h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">HD</span></h6>  <h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6> <h6>▶️ จะได้รับเป็น Phone/OTP เข้าใช้งานได้ทันที</h6>  <h6>▶️ รองรับอุปกรณ์ <i>(มือถือ)</i></h6> <h6>▶️ Disney แพ็กเกจ <span class=\"badge bg-warning\">รายเดือน</span></h6>    <li>website <a href=\"https://www.hotstar.com/th\" target=\"_blank\">https://www.hotstar.com/th</a></li>  ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(28, '28', 'Netflix 4K /60วัน (TV) (จอส่วนตัว)', 419.00, 299.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">2เดือน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 11, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(29, '29', 'Netflix 4K /60วัน (จอส่วนตัว)', 319.00, 180.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับอุปกรณ์ <i>(Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">2เดือน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 7, 'พร้อมจำหน่าย', 'on', '2024-02-27 18:54:38'),
(30, '30', 'Netflix 4K /60วัน (จอแชร์)', 138.00, 138.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับอุปกรณ์ <i>(Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">2เดือน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(31, '31', 'Netflix 4K /7วัน (TV) (จอส่วนตัว)', 49.00, 39.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">7วัน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(32, '32', 'Netflix 4K /1วัน (TV) (จอส่วนตัว)', 13.00, 13.00, 'https://img_app.byshop.me/api/img/app/netflix.png', '<h3><u>รายละเอียด</u></h3> \r\n<h6>▶️ Netflix แอปดูหนังภาพยนตร์/ซีรีย์/การ์ตูน </h6> \r\n<h6>▶️ Soundเสียง <span class=\"text-light badge bg-dark\"><i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> พากย์ไทย/ซับไทย</span></h6> \r\n<h6>▶️ ความชัดระดับ <span class=\"text-light badge bg-dark\">UltraHD 4K</span></h6> \r\n<h6>▶️ สามารถรับชมจำนวน 1จอ <i class=\"fa fa-desktop\" aria-hidden=\"true\"></i></h6>\r\n<h6>▶️ แอคเคาท์ไทยแท้100%</b></h6>\r\n<h6>▶️ จะได้รับเป็น Email/Password เข้าใช้งานได้ทันที</h6> \r\n<h6>▶️ รองรับทุกอุปกรณ์ <i>(TV,Com, Ipad ,มือถือ)</i></h6>\r\n<h6>▶️ Netflixแพ็กเกจ UltraHD 4K <span class=\"badge bg-warning\">1วัน</span></h6>  \r\n<li>website <a href=\"https://www.netflix.com/\" target=\"_blank\">https://www.netflix.com/</a></li>  ', 0, 'สินค้าหมด', 'on', '2024-02-27 18:54:38'),
(100, '100', 'TEST API', 0.00, 10.00, 'https://img_app.byshop.me/buy/img/img_app/te.png', 'ทดสอบ API', 99999, 'พร้อมจำหน่าย', 'off', '2024-02-27 18:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `recom`
--

CREATE TABLE `recom` (
  `recom_1` int(11) NOT NULL DEFAULT 0,
  `recom_2` int(11) NOT NULL DEFAULT 0,
  `recom_3` int(11) NOT NULL DEFAULT 0,
  `recom_4` int(11) NOT NULL DEFAULT 0,
  `recom_5` int(11) NOT NULL DEFAULT 0,
  `recom_6` int(11) NOT NULL DEFAULT 0,
  `recom_7` int(11) NOT NULL DEFAULT 0,
  `recom_8` int(11) NOT NULL DEFAULT 0,
  `recom_9` int(11) NOT NULL DEFAULT 0,
  `recom_10` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recom`
--

INSERT INTO `recom` (`recom_1`, `recom_2`, `recom_3`, `recom_4`, `recom_5`, `recom_6`, `recom_7`, `recom_8`, `recom_9`, `recom_10`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `redeem`
--

CREATE TABLE `redeem` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `max_count` int(11) NOT NULL,
  `prize` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redeem_his`
--

CREATE TABLE `redeem_his` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` datetime(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_cate`
--

CREATE TABLE `service_cate` (
  `s_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `img` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_order`
--

CREATE TABLE `service_order` (
  `id` int(11) NOT NULL,
  `cosid` varchar(255) NOT NULL,
  `prod` varchar(255) NOT NULL,
  `user` mediumtext NOT NULL,
  `pass` mediumtext NOT NULL,
  `idps_des` mediumtext NOT NULL,
  `count` mediumtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `del` varchar(255) NOT NULL,
  `date` datetime(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_prod`
--

CREATE TABLE `service_prod` (
  `id` int(11) NOT NULL,
  `cate` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_setting`
--

CREATE TABLE `service_setting` (
  `status` varchar(255) NOT NULL,
  `mes` varchar(255) NOT NULL,
  `img` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_setting`
--

INSERT INTO `service_setting` (`status`, `mes`, `img`) VALUES
('off', 'บริการไอดีพาส', 'https://media.discordapp.net/attachments/1178225356499603486/1178225396043493486/p1.png?ex=65755ee8&is=6562e9e8&hm=01646f86d75e073e2fd77ba68b0c1244abbd2ebc12dade23cb8dafcb9a0b9bbe&=&format=webp&width=1800&height=375');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `wallet` varchar(255) NOT NULL,
  `fee` enum('on','off') NOT NULL DEFAULT 'off',
  `bg2` varchar(255) NOT NULL,
  `bg3` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ann` varchar(255) NOT NULL,
  `main_color` varchar(255) NOT NULL,
  `sec_color` varchar(255) NOT NULL,
  `font_color` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `contact2` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `date` datetime(2) NOT NULL,
  `apikey_ssmth` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `webhook_dc` varchar(255) NOT NULL,
  `widget_discord` varchar(255) NOT NULL,
  `discord` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `posterimg1` varchar(255) NOT NULL,
  `posterink1` varchar(255) NOT NULL,
  `posterimg2` varchar(100) NOT NULL,
  `posterink2` varchar(255) NOT NULL,
  `posterimg3` varchar(255) NOT NULL,
  `posterink3` varchar(255) NOT NULL,
  `posterimg4` varchar(255) NOT NULL,
  `posterink4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`wallet`, `fee`, `bg2`, `bg3`, `name`, `ann`, `main_color`, `sec_color`, `font_color`, `contact`, `contact2`, `des`, `date`, `apikey_ssmth`, `logo`, `webhook_dc`, `widget_discord`, `discord`, `facebook`, `posterimg1`, `posterink1`, `posterimg2`, `posterink2`, `posterimg3`, `posterink3`, `posterimg4`, `posterink4`) VALUES
('#', 'off', 'https://img.freepik.com/free-photo/anime-landscape-person-traveling_23-2151038201.jpg?t=st=1709513710~exp=1709517310~hmac=72fa73997e2e71d10f23bea331023a1d8305a09b077a69307c35c0a596e02a1c&w=2000', 'undefined', 'Demo', 'Demo บริการ,ปั้มโซเซียล,ขายแอพพรี,และยังรับเติมเกม ราคาถูกอีกด้วย!!', '#70c8ff', '#4dbbff', '#56b8f5', '', '', 'Demo บริการ,ปั้มโซเซียล,ขายแอพพรี,และยังรับเติมเกม ราคาถูกอีกด้วย!!', '2022-12-25 12:30:39.00', '#', '#', '#', 'undefined', '#', '#', 'https://img2.pic.in.th/pic/128x62.png', '?page=shop', 'https://img2.pic.in.th/pic/128x62.png', '?page=random_wheel', 'https://img2.pic.in.th/pic/128x62.png', '?page=service', 'https://img2.pic.in.th/pic/128x62.png', '?page=angpao');

-- --------------------------------------------------------

--
-- Table structure for table `static`
--

CREATE TABLE `static` (
  `s_count` int(11) NOT NULL DEFAULT 2575,
  `b_count` int(11) NOT NULL DEFAULT 3525,
  `m_count` int(11) NOT NULL DEFAULT 5468,
  `c_count` int(11) NOT NULL DEFAULT 5599,
  `last_change` datetime(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `static`
--

INSERT INTO `static` (`s_count`, `b_count`, `m_count`, `c_count`, `last_change`) VALUES
(0, 0, 0, 0, '2024-06-16 00:34:45.00');

-- --------------------------------------------------------

--
-- Table structure for table `stock_wheel`
--

CREATE TABLE `stock_wheel` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_setting`
--

CREATE TABLE `theme_setting` (
  `icon` varchar(255) NOT NULL,
  `ui` varchar(255) NOT NULL,
  `uic` varchar(255) NOT NULL,
  `anim` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `st` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme_setting`
--

INSERT INTO `theme_setting` (`icon`, `ui`, `uic`, `anim`, `theme`, `st`) VALUES
('light', 'light', '#313335', 'zin', 'custom', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `topup_his`
--

CREATE TABLE `topup_his` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `amount` int(20) NOT NULL,
  `date` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `point` decimal(10,2) DEFAULT 0.00,
  `total` decimal(10,2) DEFAULT 0.00,
  `pin` varchar(6) NOT NULL,
  `rank` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`, `point`, `total`, `pin`, `rank`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2024-12-30', 0.00, 0.00, '0', 1),
(2, '1', 'c4ca4238a0b923820dcc509a6f75849b', '2025-01-03', 0.00, 0.00, '0', 0),
(3, '12', 'c4ca4238a0b923820dcc509a6f75849b', '2025-01-03', 0.00, 0.00, '0', 1),
(4, 'Nattapon ', 'ba0bbe7ddc09d9916d786adcf4564738', '2025-01-03', 0.00, 0.00, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wheel`
--

CREATE TABLE `wheel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wheel_item`
--

CREATE TABLE `wheel_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `percent` int(3) NOT NULL DEFAULT 100,
  `w_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boxlog`
--
ALTER TABLE `boxlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `box_product`
--
ALTER TABLE `box_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `box_stock`
--
ALTER TABLE `box_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kbank_trans`
--
ALTER TABLE `kbank_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_app`
--
ALTER TABLE `products_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeem`
--
ALTER TABLE `redeem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeem_his`
--
ALTER TABLE `redeem_his`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_cate`
--
ALTER TABLE `service_cate`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `service_order`
--
ALTER TABLE `service_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_prod`
--
ALTER TABLE `service_prod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_wheel`
--
ALTER TABLE `stock_wheel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup_his`
--
ALTER TABLE `topup_his`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wheel`
--
ALTER TABLE `wheel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wheel_item`
--
ALTER TABLE `wheel_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boxlog`
--
ALTER TABLE `boxlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `box_product`
--
ALTER TABLE `box_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `box_stock`
--
ALTER TABLE `box_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kbank_trans`
--
ALTER TABLE `kbank_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products_app`
--
ALTER TABLE `products_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `redeem`
--
ALTER TABLE `redeem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `redeem_his`
--
ALTER TABLE `redeem_his`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_cate`
--
ALTER TABLE `service_cate`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_order`
--
ALTER TABLE `service_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_prod`
--
ALTER TABLE `service_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_wheel`
--
ALTER TABLE `stock_wheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topup_his`
--
ALTER TABLE `topup_his`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wheel`
--
ALTER TABLE `wheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wheel_item`
--
ALTER TABLE `wheel_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
