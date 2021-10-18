-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 12:13 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tandaiphat`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` int(11) NOT NULL,
  `mts` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `asset_name` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `price_start` int(11) NOT NULL,
  `start_time_reg` datetime NOT NULL,
  `end_time_reg` datetime NOT NULL,
  `fee` int(11) NOT NULL,
  `price_step` int(11) NOT NULL,
  `max_step` int(6) NOT NULL,
  `deposit` int(11) NOT NULL,
  `method` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `place_asset` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `view_time` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `start_time_bid` datetime NOT NULL,
  `end_time_bid` datetime NOT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`documents`)),
  `img_title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `img_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`img_detail`)),
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `bidder` int(11) NOT NULL,
  `current_price` int(11) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auction_categories`
--

CREATE TABLE `auction_categories` (
  `id_cate` int(11) NOT NULL,
  `name_cate` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `img_cate` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auction_categories`
--

INSERT INTO `auction_categories` (`id_cate`, `name_cate`, `img_cate`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Bất động sản', 'bat_dong_san.jpg', 'Bất-động-sản', '2021-07-09 09:26:19', '2021-07-13 04:06:31'),
(2, 'Hàng hiệu xa xỉ', 'hang_hieu.jpg', 'Hàng-hiệu-xa-xỉ', '2021-07-13 04:05:05', NULL),
(3, 'Sưu tầm - nghệ thuật', 'nghe_thuat.jpg', 'Sưu-tầm-nghệ-thuật', '2021-07-13 04:05:05', NULL),
(4, 'Tài sản công', 'tai_san_cong.jpg', 'Tài-sản-công', '2021-07-13 04:07:39', NULL),
(5, 'Xe cộ', 'xe_co.jpg', 'Xe-cộ', '2021-07-13 04:07:39', NULL),
(6, 'Tài sản khác', 'TaiSanKhac.jpg', 'Tài-sản-khác', '2021-07-13 04:08:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auction_history`
--

CREATE TABLE `auction_history` (
  `id` int(11) NOT NULL,
  `id_auction` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auction_members`
--

CREATE TABLE `auction_members` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `is_vertified` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(8) NOT NULL,
  `bank_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `bank_name`) VALUES
(1000001, 'SGB_Ngân hàng TMCP Sài Gòn Công Thương'),
(1000002, 'WOO_Ngân hàng Wooribank'),
(1000004, 'AGRIBANK_Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam'),
(1000005, 'DONGABANK_Ngân hàng TMCP Đông Á'),
(1000006, 'TCB_Ngân hàng TMCP Kỹ Thương Việt Nam'),
(1000007, 'GPB_Ngân hàng TM TNHH MTV Dầu Khí Toàn Cầu'),
(1000008, 'BAB_Ngân hàng TMCP Bắc Á'),
(1000009, 'PVCOMBANK_Ngân hàng TMCP Đại Chúng Việt Nam'),
(1000010, 'OJB_Ngân hàng TMCP Đại Dương'),
(1000011, 'ACB_Ngân hàng TMCP Á Châu'),
(1000012, 'BIDV_Ngân hàng TMCP Đầu tư và Phát triển Việt Nam'),
(1000013, 'NCB_Ngân hàng TMCP Quốc Dân'),
(1000014, 'VRB_Ngân hàng Liên doanh Việt Nga'),
(1000015, 'MB_Ngân hàng TMCP Quân Đội'),
(1000016, 'TPB_Ngân hàng TMCP Tiên Phong'),
(1000017, 'SHBVN_Ngân hàng TNHH MTV ShinHan Việt Nam'),
(1000018, 'ABB_Ngân hàng TMCP An Bình'),
(1000019, 'MSB_Ngân hàng TMCP Hàng Hải'),
(1000020, 'VAB_Ngân hàng TMCP Việt Á'),
(1000021, 'NAMABANK_Ngân hàng TMCP Nam Á'),
(1000022, 'SCB_Ngân hàng TMCP Sài Gòn'),
(1000023, 'PGB_Ngân hàng TMCP Xăng Dầu Petrolimex'),
(1000024, 'EIB_Ngân hàng TMCP Xuất Nhập Khẩu Việt Nam'),
(1000025, 'VPB_Ngân hàng TMCP Việt Nam Thịnh Vượng'),
(1000026, 'VIETBANK_Ngân hàng TMCP Thương Tín'),
(1000027, 'IVB_Ngân hàng TNHH Indovia'),
(1000028, 'VCB_Ngân hàng TMCP Ngoại Thương Việt Nam'),
(1000029, 'HDB_Ngân hàng TMCP Phát triển Thành Phố Hồ Chí Minh'),
(1000030, 'BVB_Ngân hàng TMCP Bảo Việt'),
(1000031, 'PBVN_Ngân hàng TBHH MTV Public Việt Nam'),
(1000032, 'SEAB_Ngân hàng TMCP Đông Nam Á'),
(1000033, 'VIB_Ngân hàng TMCP Quốc tế Việt Nam'),
(1000034, 'HLB_Ngân hàng TNHH MTV Hongleong Việt Nam'),
(1000035, 'SHB_Ngân hàng TMCP Sài Gòn'),
(1000036, 'OCB_Ngân hàng TMCP Phương Đông'),
(1000037, 'LPB_Ngân hàng TMCP Bưu Điện Liên Việt'),
(1000038, 'KLB_Ngân hàng TMCP Kiên Long'),
(1000039, 'VCCB_Ngân hàng TMCP Bản Việt'),
(1000040, 'IBK_Ngân hàng IBK chi nhánh Hà Nội'),
(1000041, 'STB_Ngân hàng TMCP Sài Gòn Thương Tín'),
(1000042, 'VIETINBANK_Ngân hàng TMCP Công thương Việt Nam'),
(1000043, 'Kho bạc nhà nước Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE `bidders` (
  `id` int(11) NOT NULL,
  `id_bidder` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `birth` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cmnd` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_range` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_range` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_before` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_after` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(8) DEFAULT NULL,
  `bank_branch` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_owner_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `represent_position` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ward` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_code` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_range_tax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_range_tax` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org_address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificate` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(1) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `is_vertified` int(1) NOT NULL DEFAULT 0,
  `forgot_password` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bidders`
--

INSERT INTO `bidders` (`id`, `id_bidder`, `firstname`, `middlename`, `lastname`, `fullname`, `phone`, `email`, `birth`, `address`, `gender`, `cmnd`, `date_range`, `place_range`, `img_before`, `img_after`, `bank_number`, `bank_id`, `bank_branch`, `bank_owner_name`, `represent_position`, `province`, `district`, `ward`, `org_name`, `tax_code`, `date_range_tax`, `address_range_tax`, `org_address`, `certificate`, `type`, `role`, `password`, `status`, `is_vertified`, `forgot_password`, `created_at`, `updated_at`) VALUES
(1, 'ACT162573', 'Phạm', 'Văn', 'Dương', 'Phạm Văn Dương', '0904654926', 'phamduong27info@gmail.com', '11/07/2021', 'Ngõ 54, đường Lê Quang Đạo', 'Nam', '0272622222', '2021-07-10', 'Hà Nội', '1625731922_8335086_e2b78b0ce959413df916a7885036301f.jpg', '1625731922_4039386_679cb0de6f282d3cbb6c8db606d1df9c.jpg', '082226262222', 1000017, 'Mễ trì Hạ', 'Phạm Văn Dương', NULL, 'Hà Nội', 'Thanh xuân', 'Nhân chính', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '$2y$10$7vQOGyzJabKV17GypMAyiuIPFBcXT0qLJmZOyzjtXdPgVjzxgJ1ju', 1, 0, NULL, '2021-07-08 08:12:02', '2021-07-09 15:30:25'),
(2, 'ACT16257322829085048', 'Lê', 'Văn', 'Thành', 'Lê Văn Thành', '0904654926', 'phamduong47info@gmail.com', '16/07/2021', 'Ngõ 54, đường Lê Quang Đạo', 'Nam', '0272622222', '11/07/2021', 'Hà Nội', '1625732282_3889007_2094dbd22d47897f3aab8482566ebf9b.jpg', '1625732282_4668995_6ad0370f5d4a0f1a096841bbb510dbc8.jpg', '13232242424', 1000016, 'Mễ trì Hạ', 'Phạm Văn Dương', NULL, 'Hà Nội', 'Thanh xuân', 'Nhân chính', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '$2y$10$7vQOGyzJabKV17GypMAyiuIPFBcXT0qLJmZOyzjtXdPgVjzxgJ1ju', 1, 0, NULL, '2021-07-08 08:18:02', '2021-07-09 15:30:25'),
(3, 'ACT16257355656826645', 'Lê', 'Văn', 'Nam', 'Lê Văn Nam', '0904654926', 'nam8722@gmail.com', '04/07/2021', 'Ngõ 54, đường Lê Quang Đạo', 'Nam', '0272622222', '07/07/2021', 'Hà Nội', '1625735565_2470924_fa72b7bb22af56c9b2205efc3226e523.jpg', '1625735565_4531976_b7c3fd9edf83b860105b72fab65f2f17.jpg', '133113424224', 1000018, 'Mễ trì Hạ', 'Phạm Văn Dương', NULL, 'Hà Nội', 'Thanh xuân', 'Nhân chính', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '$2y$10$7vQOGyzJabKV17GypMAyiuIPFBcXT0qLJmZOyzjtXdPgVjzxgJ1ju', 1, 0, NULL, '2021-07-08 09:12:45', '2021-07-09 15:30:25'),
(4, 'ACT16257361609167', 'Phạm', 'Văn', 'Dương', 'Phạm Văn Dương', '0904654926', 'phamduong99info@gmail.com', '16/07/2021', 'Ngõ 54, đường Lê Quang Đạo', 'Nam', '0272622222', '15/07/2021', 'Hà Nội', '1625736160_5198400.jpg', '1625736160_7851033.jpg', '123133244242', 1000016, 'Mễ trì Hạ', 'Phạm Văn Dương', NULL, 'Hà Nội', 'Thanh xuân', 'Nhân chính', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '$2y$10$mYEy1NBRQH54BTPBPPOOv.CytVFWMrOGRk6bqk2pVGcUEkkbnD8Aq', 1, 0, NULL, '2021-07-08 09:22:40', '2021-07-09 15:55:29'),
(5, 'ACT16257362971880', 'Phạm', 'Văn', 'Hà', 'Phạm Văn Hà', '0904654926', 'phamduong9073info@gmail.com', '17/07/2021', 'Ngõ 54, đường Lê Quang Đạo', 'Nam', '0272622222', '16/07/2021', 'Hà Nội', '1625736297_7478594.jpg', '1625736297_6532683.jpg', '7654322222', 1000016, 'Mễ trì Hạ', 'Phạm Văn Dương', NULL, 'Hà Nội', 'Thanh xuân', 'Nhân chính', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '$2y$10$7vQOGyzJabKV17GypMAyiuIPFBcXT0qLJmZOyzjtXdPgVjzxgJ1ju', 1, 1, NULL, '2021-07-08 09:24:57', '2021-07-09 15:30:25'),
(6, 'ACT16257397157576', 'Phạm', 'Văn', 'Dương', 'Phạm Văn Dương', '0904654926', 'phamduosssng97info@gmail.com', '17/07/2021', 'Ngõ 54, đường Lê Quang Đạo', 'Nam', '0272622222', '11/07/2021', 'Hà Nội', '1625739715_7502171.png', '1625739715_4216264.png', '131311141414', 1000015, 'Mễ trì Hạ', 'Phạm Văn Dương', NULL, 'Hà Nội', 'Thanh xuân', 'Nhân chính', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '$2y$10$7vQOGyzJabKV17GypMAyiuIPFBcXT0qLJmZOyzjtXdPgVjzxgJ1ju', 1, 0, NULL, '2021-07-08 10:21:55', '2021-07-09 15:30:25'),
(8, 'ACT16258210067433', 'Nguyễn', 'Nghĩa', 'Thành', 'Nguyễn Nghĩa Thành', '0904654926', 'nghiathanh2016@gmail.com', '07/07/2021', '136 hồ tùng mậu', 'Nam', '133234335355', '21/07/2021', 'Nghệ An', '1625821006_4353313.png', '1625821006_5796982.png', '027262626262', 1000015, 'mễ trì', 'nam phạm', 'giám đốc', 'Hà Nội', 'thanh xuân', 'nhân chính', 'unity', '13312414411', '09/07/2021', 'unity', 'unity', '1625821006_3883118.pdf', 2, 1, '$2y$10$7vQOGyzJabKV17GypMAyiuIPFBcXT0qLJmZOyzjtXdPgVjzxgJ1ju', 1, 1, NULL, '2021-07-09 08:56:46', '2021-07-09 15:30:25'),
(12, 'ACT16258218087384', 'Nguyễn', 'Nghĩa', 'Thành', 'Nguyễn Nghĩa Thành', '0904654926', 'phamduong97info@gmail.com', '07/07/2021', '136 hồ tùng mậu', 'Nam', '133234335355', '21/07/2021', 'Nghệ An', '1625821808_9420729.png', '1625821808_4893973.png', '027262626262', 1000015, 'mễ trì', 'nam phạm', 'giám đốc', 'Hà Nội', 'thanh xuân', 'nhân chính', 'unity', '13312414411', '09/07/2021', 'unity', 'unity', '1625821808_6589189.pdf', 2, 1, '$2y$10$7vQOGyzJabKV17GypMAyiuIPFBcXT0qLJmZOyzjtXdPgVjzxgJ1ju', 1, 1, NULL, '2021-07-09 09:10:09', '2021-07-09 15:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `highlight` int(1) NOT NULL,
  `views` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `summary`, `content`, `images`, `highlight`, `views`, `id_type`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trải nghiệm một ngày tại thung lũng Silicon', 'trai-nghiem-1-ngay-tai-thung-lung-silicon-9282722.html', 'Hẳn nhiều người đã từng mơ về một cuộc sống tại thung lũng công nghệ Silicon. Nhưng bạn đã bao giờ hình dung ra cuộc sống của bạn sẽ diễn ra thế nào tại đó? Sunil Rajaraman, Nhà sáng lập Scripted.com, CEO The Bold Italic sẽ cho bạn biết 1 ngày ở đây trôi qua như thế nào.', 'Trải nghiệm một ng&#224;y tại thung lũng Silicon\r\nThung lũng Silicon\r\nBạn tỉnh giấc vào lúc 6:30 sáng sau một đêm phải cần đến thuốc ngủ mới có thể chợp mắt. Hôm nay là thứ Sáu. Đêm qua tại khách sạn The Rosewood trôi đi khá mệt mỏi – bạn phải thanh toán tại Madera và xem xét những tin đồn ở thung lũng Silicon này có bao nhiêu phần trăm sự thật.\r\n\r\nBạn cảm thấy thất vọng, nhưng ít nhất bạn đã nhìn thấy những chuyên viên từ những công ty đầu tư hàng đầu ở quán bar. Họ có để ý đến bạn không? Bạn có giao tiếp bằng ánh mắt với họ chứ? Bạn phải ghi nhớ trong đầu rằng họ không phải là những ngôi sao thực sự - họ chỉ nối tiếng trong vòng bán kính 15 dặm với đám đông say mê trang blog công nghệ Techcrunch mà thôi.\r\n\r\nNgười giúp việc không biết tiếng Anh của bạn ra hiệu rằng đã 7:30 rồi. Bạn phải trả bà ấy 24 USD/giờ và nhờ bà ấy trông chừng con của bạn. Bạn nghĩ rằng bây giờ mọi việc sẽ ổn thôi – khi nào con bạn đủ lớn, nó sẽ đến một trường công ở quận Palo Alto.\r\n\r\nBạn hứa rằng sẽ ở bên con vào cuối tuần và dành nhiều thời gian gần gũi với con trong khi đang lướt vội những tiêu đề mới nhất trên Flipboard. Bạn biết rằng nó không thể trở thành một Mark Zukerberg thứ 2, nhưng bạn vẫn gửi con bạn đến một trường dạy nhạc dù nó mới chỉ 3 tuổi. Bạn thề rằng cậu bé là một thiên tài bởi lẽ nó có thể nói vài từ 4 âm tiết và còn vỗ tay chính xác theo nhịp bài hát “Call me Maybe”.\r\n\r\nCon của bạn là độc nhất vô nhị. Cậu bé được ban cho những gì tuyệt vời nhất và bạn chắc chắn rằng rồi con mình sẽ đạt được tất cả mọi thành tựu. Đến cuối cùng, cả hai mẹ con đều là những mẫu hình thông minh và thành đạt.\r\n\r\n\r\nCal Academy of Sciences\r\nCal Academy of Sciences\r\n\r\nBạn hỏi người giúp việc rằng liệu bà ấy có thể trông con cho bạn vào cuối tuần này không. Bạn ước ao sao Cal Academy of Sciences không bán cho bạn giấy phép hàng năm vào 11 tháng trước. Bạn tính toán rằng có thể đến đó vào mỗi cuối tuần, nhưng cuối cùng bạn lại chỉ đến được 1 lần.\r\n\r\nWifi kết nối đến máy pha cà phê giúp bạn tải xuống một công thức hoàn hảo để pha một tách Blue Bottle, và bạn chẳng cần phải làm gì cả. Chiếc máy hút bụi Roomba chạy đều đều trên sàn nhà trong khi bạn vẫn tiếp tục đọc tin tức trên smartphone. Bạn thấy một vài bài báo về Trump và sự điên rồ của ông ta – thứ phần nào làm bạn thấy thoải mái.\r\n\r\nBạn quyết định chia sẻ một bài báo về Brexit từ The Atlantic, thứ sẽ thu hút lượt xem từ những người bạn của bạn về nguyên do cuộc khủng hoảng xảy ra. Bài báo dài đến 1000 từ - bạn chỉ đọc một nửa, nhưng cũng thấy khá hay rồi. Nó sẽ gây nên những cuộc tranh luận mà bạn đã muốn tạo ra từ 2 tháng trước. Liệu bài đăng trên Facebook này sẽ khiến những người bạn của bạn hành động? Bạn nhận ra tất cả bọn họ đều đồng ý với quan điểm chính trị xã hội của bạn.\r\n\r\n15 phút sau mới chỉ có 3 lượt thích, có lẽ bạn sẽ gặp may mắn hơn vào lần sau. Thuật toán của bảng tin Facebook quả là thảm họa, lẽ ra bạn nên sử dụng máy tính chứ không phải điện thoại để chia sẻ bài báo, và cần phải chọn một thời điểm tối ưu hơn nữa.\r\n\r\nNhưng ngay sau đó bạn nhận ra một người bạn khác đã chia sẻ bài báo đó trước đó rồi. Bạn cảm thấy bản thân thật ngu ngốc.\r\n\r\n\r\nVăn phòng Youtube ở San Bruno\r\nVăn phòng Youtube ở San Bruno\r\n\r\nChồng bạn vội vã chuẩn bị đi làm – gia đình bạn có 2 nguồn thu nhập và bạn là 1 trong số đó. Bạn tính toán rằng chỉ với khoản tiết kiệm trong 3 năm, bạn có thể chi trả cho 2 phòng ngủ ở San Bruno. Nhưng nếu thời tiết thảm họa liên tiếp 340 ngày trong năm thì sao? Ít nhất thì bạn cũng sở hữu một căn nhà ở vùng Vịnh. San Bruno chính là chân trời mà bạn hướng đến, với một văn phòng của Youtube tại đó.\r\n\r\nViệc đi lại hàng ngày của bạn khá khó khăn, nhưng ít nhất bạn vẫn có cơ hội sử dụng Podcast để có những cuộc trò chuyện thú vị với mọi người. Bạn có nên nghe “Serial Season 2” không nhỉ? Hay là lắng nghe chương trình Startup cũng khá hấp dẫn? Có rất nhiều lựa chọn, nhưng thời gian lại quá eo hẹp. Thay vào đó, bạn quyết định thử một list nhạc mới trên Spotify, gồm những bài nhạc jazz của Ấn Độ. Việc này khá tuyệt, nó khiến bạn cảm thấy mình “ngấm” được một nền văn hóa mới.\r\n\r\nBạn đỗ xe tại một nơi khá xa xỉ. Bởi lẽ đậu xe tại gara chỉ tiết kiệm được 10 USD mà bạn còn phải dành rất nhiều thời gian để đi bộ. Thêm vào đó, hôm nay bạn đi gặp gỡ một số người bạn vào bữa tối và bạn còn ở đầu kia của thị trấn. Bạn không thể quyết định nên sử dụng dịch vụ của Uber hay Lyft để di chuyển từ văn phòng của bạn. Bạn phải quyết định, quyết định và quyết định.\r\n\r\nBạn là giám đốc phát triển doanh nghiệp tại công ty startup của mình. Bạn thậm chí còn không chắc mọi chuyện đang diễn biến thế nào, nhưng công ty có vẻ đang đi đúng hướng. Gần đây, công ty bạn đã tăng trưởng lợi nhuận và được đề cập đến trên Techcrunch. Bạn sở hữu quyền mua với số lượng 5.000 cổ phiếu. Bạn cũng không rõ nó nghĩa là gì, nhưng chắc hẳn mọi chuyện đang khá ổn. Nếu bạn rời đi, có lẽ tiền sẽ được gộp vào khoản trả sau của bạn.\r\n\r\nMột ngày của bạn bắt đầu tại Salesforce. Bạn phải gửi email đến hàng tá người. Bạn phải suy tính về ý tưởng kinh doanh để có thể hạ gục Salesforce và Facebook cùng lúc. Nhưng bạn cần một đồng sáng lập về kỹ thuật. Cuối cùng thì bạn sẽ làm được thôi – bạn là người thông minh và có những tài năng thiên phú mà. Tất cả bạn bè của bạn cũng góp ý về cách bạn bắt đầu sự nghiệp riêng vào tương lai.\r\n\r\nVị CEO 27 tuổi của bạn triệu tập một cuộc họp các thành viên đặc biệt và nói về văn hóa doanh nghiệp. Anh ta muốn mọi doanh nghiệp trên thế giới chuyển sang sử dụng sản phẩm của mình. Trong khi anh ta thậm chí còn chưa làm việc cho bất kỳ một công ty nào khác.\r\n\r\nĐội ngũ bán hàng trước đó đã ầm ĩ cả đêm qua. Họ không đạt được chỉ tiêu doanh số, nhưng đó cũng không phải là lỗi của họ, đó là sai lầm của việc thực thi cả một hợp đồng lớn. Bộ phận marketing còn không gửi cho họ đầy đủ chỉ dẫn để đạt chỉ tiêu. Có lẽ chúng ta lại phải đợi đến quý sau. Bạn trao đổi qua email với người bạn học cùng đại học của mình về việc Kevin Durant quá sai lầm khi gia nhập the Warriors. Bạn nhận thấy rằng sử dụng email khá ổn. Trong một phút giây, bạn cảm thấy thật chán nản. Kỳ thực tập mùa hè của bạn là phải cố gắng tính toán chiến lược của Snapchat.\r\n\r\n\r\nPhilz Coffee\r\nPhilz Coffee\r\n\r\nGiờ là khoảng thời gian mà một tách café buổi chiều có thể giúp bạn vượt qua ngày hôm nay. Bạn đi tới Philz với một vài đồng nghiệp, đặt một chiếc donut chay và nói rõ với người pha chế cho bạn thêm 3 gói Splenda. Anh ấy chỉ còn 1 gói và bạn vẫn cố giữ sự tử tế của mình. Cuối cùng bạn bỏ qua và nhận thấy “bong bóng giận dữ” đang lớn dần bên trong.\r\n\r\nBạn phải quyết định nơi dùng bữa tối. Bạn vào Yelp tìm kiếm một địa điểm trong bán kính 1 dặm và được đánh giá ít nhất 3,5 sao, nhưng thực sự bạn đang muốn tìm một nhà hàng 4 sao và bỏ qua luôn số tiền. Bạn bè bạn sẽ nghĩ gì về bạn nếu bạn chọn một nơi rẻ mạt chứ? Nhưng bạn không muốn đến nhà hàng sang trọng nữa vì nó quá đắt đỏ. Bạn có khẩu vị tốt mà, mọi chuyện sẽ thoải mái thôi.\r\n\r\nBạn chợt nhận ra mình và chồng còn đặt bàn ở nhà hàng French Laundry và nó sẽ diễn ra vào cuối tuần này. Ứng dụng trên lịch của bạn đã nhắc bạn về điều đó. Bạn đã chờ nó hàng tháng rồi. Bạn không thể chờ đợi để đăng những bức ảnh đẹp nhất lên Instagram về bữa ăn này.\r\n\r\nHastag #San Francisco đang là xu hướng trên Twitter. Bạn nhận ra cộng đồng báo chỉ Sanfrancisco đang tức giận về điều gì đó – họ đang nổi điên về việc những người vô gia cư bị đối xử tồi tệ. Các phóng viên chia sẻ những bức ảnh và video của một người vô gia cư hoàn toàn bị lãng quên trên đường phố.\r\n\r\nĐến lúc cần phải truy cập Facebook. Bạn bè của bạn đều đang làm mọi thứ “rất tốt”. Bạn âm thầm ghen tỵ với người bạn mới mua được căn nhà ở Noe. Bạn suy tính về sự giàu có họ có được sau khi rời khỏi LinkedIn. Dù chỉ là nhân viên xếp hạng 500 thôi nhưng họ phải làm việc xuất sắc lắm. Tính toán một lúc trong đầu, biết đâu bạn cũng có thể trở nên như vậy trong công ty startup của mình. Đó chỉ là vấn đề thời gian mà thôi.\r\n\r\nLướt Facebook thêm chút nữa, bạn thấy một người bạn của mình xếp thứ 5 về lương thưởng ở một công ty vừa mới được bán cho Twitter. Họ chắc phải kiếm được nhiều lắm. Bạn ấn “thích” bài đăng đó, nhưng trong lòng vô cùng ghen tỵ. Đứa con của một người bạn khác có vẻ còn xuất sắc hơn con của mình bởi lẽ họ vừa chia sẻ một bức ảnh chơi đàn piano trên Vine. Đáng lẽ bạn cần phải là một bậc phụ huynh tốt hơn mới phải.\r\n\r\nRồi bạn lên Redfin để xem giá nhà đất.\r\n\r\nBạn chợt mơ mộng một ngày có cơ hội để làm việc tại Google trước khi IPO, và ước gì bạn có thể gia nhập Facebook ngay sau khi IPO, tưởng tượng mà xem, giá cổ phiếu của họ đã tăng gấp 3 lần chỉ sau một khoảng thời gian ngắn. Đó có phải là những “cú nổ lớn” bạn cần đến không?\r\n\r\nCEO của bạn hốt hoảng đến tìm bạn và yêu cầu có một phân tích nhanh cho các thành viên HĐQT. Họ đang bay từ Mexico sang và vô cùng lo lắng về các chỉ số và chiến lược. Chiếc ghế CEO đang lung lay dữ dội.\r\n\r\nBạn nhanh chóng hoàn thành phần việc khó khăn cũng như bản phân tích, giúp anh ta có thể trấn tĩnh lại và khen ngợi rằng bạn quả là một “Excel Ninja”. Bản phân tích khiến bạn nhận ra công ty tốt hơn hết nên tiết kiệm chi phí thuê văn phòng, cả bức tường bằng đá và những chiếc Segway. Bạn cũng nhận thấy CEO của bạn chẳng hiểu gì về công ty này cả.\r\n\r\nBạn lướt Redfin một lần nữa. Bạn không muốn sống ở Austin, một vài nơi khác yên bình hơn như Fremont, Morgan Hill hay Milpitas thì sao nhỉ? Những nơi đó sẽ giúp bạn giải quyết vấn đề đi lại và cả chi phí nữa.\r\n\r\nNếu bạn đến muốn chuyển đến Austin, bạn có thể xây một ngôi nhà với phong cách “tối giản hóa” mà bạn vẫn mơ ước. Bạn vào trang web Bluhome – những thiết kế ở đây đều là “gu” của bạn. Việc bạn làm chỉ là tiết kiệm tiền thôi. Bạn vào luôn cả Pinterest và Houzz để tìm kiếm các ý tưởng để thiết kế nội thất. Có lẽ bạn sẽ cần đến những dịch vụ theo nhu cầu.\r\n\r\nĐến lúc bạn phải ăn tối rồi. Bạn dùng bữa cùng hai vị giám đốc và phó giám đốc, họ có vẻ khá tán thưởng khẩu vị của bạn. Quả là quyết định đúng đắn khi sử dụng Yelp.\r\n\r\nTrở về nhà, bạn xem qua ứng dụng “7 phút tập luyện” một chút. Đây là thời gian các nhà khoa học chứng minh rằng có hiệu quả hơn nhiều so với 1 giờ luyện tập. Bạn cảm thấy khá ổn khi tập xong những bài tập này.\r\n\r\nBật ngẫu nhiên các bản nhạc để chuẩn bị đi ngủ, bạn cảm thấy thực sự đã trải qua một ngày mệt mỏi. Bạn kiểm tra email, Twitter, Facebook và Snapchat lần cuối trước khi lên giường. Bạn không nghĩ mình có đủ thời gian để kiểm tra LinkedIn nữa và pin điện thoại của bạn cũng đang không ổn lắm. Có khi nào bạn nên lập ra một công ty để đánh bại LinkedIn không nhỉ? Nó có thể kiếm ra đống tiền ấy chứ.\r\n\r\nSuy nghĩ cuối cùng trước khi ngủ của bạn là liệu có nên chuyển sang dùng hệ điều hành Android. Bạn đang sử dụng iPhone nhưng bạn cảm thấy khá mất kiên nhẫn. Nhưng sau đó nhận ra mình đã đầu tư quá nhiều vào Apple, bạn gạt đi suy nghĩ đó.\r\n\r\n\r\nNơi học thiền định tại Vipassana\r\nNơi học thiền định tại Vipassana\r\n\r\nBạn tranh thủ dùng Safari để xem khóa học thiền của Vipassana. Bạn nghe nói 10 ngày ở Soquel có thể là chiếc vé đến một thế giới mới, nhưng bạn cũng nhận ra rằng điều này là không thể. Bạn tải xuống một ứng dụng về thiền rồi tắt điện thoại. Bạn chẳng có thời gian mà suy xét nữa.\r\n\r\nBạn nhanh chóng quay lại ngôi nhà của mình trong đêm trước. Bình minh đang hé rạng với một cảnh sắc tuyệt đẹp. Bạn nhận ra bạn đang sống ở một thiên đường.\r\n\r\n', 'news1.jpeg', 1, 78, 3, 1, 1, '2020-04-21 08:21:12', '2021-07-01 08:58:14'),
(2, 'Làm thế nào để sinh viên IT vừa ra trường đã có 2 năm kinh nghiệm', 'lam-the-na0-de-sinh-vien-IT-vua-ra-truong-1027262.html', 'Không ít các bạn sinh viên IT ra trường, với bằng khá, giỏi lại nhận được cái lắc đầu của rất nhiều công ty IT, trong khi đó, nhiều bạn khác không quá nổi bật trong trường lớp lại được nhận vào các công ty công nghệ hàng đầu. Tại sao lại có sự khác biệt đó? Làm cách nào để sinh viên IT vừa ra trường, nhưng lại có 2 năm kinh nghiệm trong ngành? Đọc ngay blog dưới đây và trả lời câu hỏi trên nhé.', 'Trong khi bạn đang lo lắng đến tương lai thất nghiệp khi ra trường vì không có kinh nghiệm thì rất nhiều bạn sinh viên vừa vào chuyên ngành đã nhận được rất nhiều lời mời cộng tác từ các ông lớn công nghệ với mức lương hấp dẫn. Dạo quanh các trang thông tin tuyển dụng, có thể thấy rằng hầu hết mọi doanh nghiệp khi tuyển nhân sự đều đưa kinh nghiệm lên làm yêu cầu tiên quyết. Nhưng sinh viên mới ra trường, doanh nghiệp không nhận thì lấy kinh nghiệm ở đâu? Đây chỉ là một câu chuyện nói về sự đổ lỗi. Là cho sinh viên thụ động hay do nhà tuyển dụng không tạo cơ hội? Thật ra, không nhất thiết phải đi làm chính thức thì mới có kinh nghiệm. Với đặc thù có thể vừa học vừa làm của ngành công nghệ, sinh viên hoàn toàn có thể chủ động tạo kinh nghiệm cho mình ngay từ những ngày vừa bước vào đại học.\r\n\r\n1. Làm việc tự do\r\nĐối với nhiều doanh nghiệp họ cho rằng mỗi trải nghiệm đều mang lại những kỹ năng. Với những kiến thức đã học được và đam mê sẵn có bạn hoàn toàn có thể chủ động nắm bắt kinh nghiệm thông qua việc làm một freelancer.\r\n\r\nFreelancer là người làm việc tự do với các công việc như lập trình máy tính, thiết kế web, thiết kế đồ họa, phát triển website, biên dịch…Viết code dạo hay cài win dạo cũng là khái niệm quen thuộc với nhiều sinh viên công nghệ. Những công việc này không đòi hỏi quá nhiều kinh nghiệm hay kỹ năng chuyên môn, đồng thời các bạn cũng có thể chủ động về thời gian và kiếm được thêm thu nhập đáng kể.\r\n\r\nNếu bạn là người có đam mê về công nghệ và  đã học qua một số ngôn ngữ lập trình, cho dù đó là ngôn ngữ phát triển phần mềm hoặc phát triển web thì bạn có thể nhanh chóng trở nên quen thuộc với Java/XML, C#, hoặc Objective-C để làm các ứng dụng Android, Windows Phone, iPhone thì việc còn lại chỉ là tìm kiếm khách hàng và rao bán sản phẩm. Khách hàng của bạn có thể là những người quen, hoặc bất cứ ai…Và các bạn có thể dễ dàng tìm thấy họ qua các trang web dành do freelancer như freelancer vlance, Vietnamworks…\r\n\r\n2\r\n\r\n2. Trở thành fresher – thực tập sinh\r\nHiện nay rất nhiều công ty IT hàng đầu Việt Nam đang tập trung khai thác nhân lực từ các fresher. Đây chính là cơ hội để các bạn có thể tiếp xúc với những ông lớn của ngành công nghệ như IMB, Intel, FPT Software, Microsoft, Nexttech…\r\n\r\nfresher\r\n\r\nMột mẫu tin tìm kiếm fresher tại topITworks với rất nhiều vị trí khác nhau, từ các tập đoàn công nghệ hàng đầu dành riêng cho các bạn sinh viên đam mê lập trình. Click vào đây để tìm kiếm 1 công việc dành riêng cho fresher.\r\n\r\nNếu chưa có kinh nghiệm bạn hoàn toàn có thể ứng tuyển vào vị trí thực tập sinh. Đối với vị trí thực tập sinh các công ty thường chỉ xét khả năng suy nghĩ logic, khả năng lập trình, tiềm năng lập trình của bạn. Một số công ty còn có chương trình đào tạo riêng cho thực tập sinh nên đây cũng là cơ hội để các bạn vừa học vừa kiếm thêm thu nhập.\r\n\r\n\r\n4\r\n\r\nCác bạn còn nhớ 6 chàng trai Việt dắt tay nhau đến Google năm 2015 chứ? Thời điểm đó, tất cả họ đều vẫn đang là sinh viên và chưa hoàn thành chương trình học. Riêng Nguyễn Hải Khánh đã được Google tuyển dụng sẵn cho năm 2017 với mức lương 6 chữ số\r\n\r\nLợi thế của sinh viên công nghệ là mỗi môn học đều có ứng dụng cụ thể rõ ràng và có thể sử dụng ngay vào thực tế. Và công việc của một thực tập sinh thường chỉ là tìm hiểu project hiện tại, code các module nhỏ, đơn giản, fix bugs, có thể có sự trợ giúp/review của senior…Cho nên các bạn không phải quá lo lắng về trình độ chuyên môn. Mặt khác, ở giai đoạn này các bạn còn có thể tranh thủ học code, học cách thức làm việc, học hỏi kinh nghiệm của senior đi trước.\r\n\r\nĐây là cách để sinh viên IT mới ra trường có những trải nghiệm cọ xát thực tế nhất, bên cạnh đó còn giúp sinh viên mở rộng các mối quan hệ và cơ hội hợp tác mới. Nếu thực tập tốt bạn cũng có thể được cân nhắc trở thành nhân viên chính thức, nếu không, vài nhận xét tích cực từ đơn vị thực tập cũng sẽ trở thành điểm cộng trong CV của bạn.\r\n\r\n3. Săn thành tích và kinh nghiệm từ các cuộc thi và mở rông các mối quan hệ.\r\nNếu bạn là dân công nghệ đừng bỏ qua các cuộc thi như S.M.A.C challenge hay Microsoft imagine cup, Hackathon...hay các Event công nghệ lớn, tìm kiếm cho mình kinh nghiệm trong ngành lập trình.\r\n\r\n6\r\n\r\nTech Expo là một trong những ngày hội công nghệ và việc làm ngành IT lớn nhất năm sắp diễn ra, nhớ theo dõi topITworks để không bỏ lỡ cơ hội này nhé.\r\n\r\nĐây không chỉ là nơi để các bạn khám phá - thể hiện tài năng sáng tạo của bản thân mà còn là môi trường để các bạn có thể giao lưu học hỏi kinh nghiệm từ nhiều tài năng khác. Trong khi kiến thức giáo dục tại trường đã trở nên lỗi thời thì các sân chơi công nghệ cũng là nơi để các bạn cập nhật những kiến thức mới tối ưu. Đừng ngần ngại bổ sung những thành tích từ các cuộc thi vào CV của bạn bởi vì đây chính là thước đo quan trọng để nhà tuyển dụng đánh giá năng lực khi bạn chưa từng đi làm.\r\n\r\nNếu bạn đã biết lập trình Web-application, C#, MVC, có kiến thức về jQuery, Javascript, HTML, CSS,hay hiểu biết Nodejs, Angular, Reactjs.. đủ để đáp ứng nhu cầu nhà tuyển dụng nhưng lại không có kinh nghiệm thực tế do chưa từng đi làm. Hãy xây dựng mối quan hệ với những người có thể đảm bảo năng lực của bạn trước nhà tuyển dụng.  Mối quan hệ có thể bắt đầu từ các giáo sư, người hướng dẫn trong trường. Các buổi hội thảo, tọa đàm từ doanh nghiệp cũng là nơi để bạn có thể gặp gỡ và trao đổi với các chuyên gia đầu ngành. Đừng ngại thể hiện bản thân, hãy để họ được thấy năng lực, khả năng học hỏi và niềm say mê của bạn đối với công việc. Bởi vì rất có thể sau này họ chính là sẽ là người quyết định mức lương của bạn.\r\n\r\nNăng lực làm việc không phải là điều duy nhất mà nhà tuyển dụng quan tâm ở ứng viên. Tính cách, sự đam mê cũng là một trong những yếu tố khiến họ có quyết định hợp tác với bạn hay không.\r\n\r\n4. Tạo website cá nhân\r\nBạn có thể lợi dụng sự phát triển của internet để tăng cơ hội tiếp cận với nhà tuyển dụng. Một số người sử dụng website cá nhân kiêm luôn chức năng blog, một số khác sử dụng như một CV, một trang web giới thiệu bản thân online.dg\r\n\r\nTạo những website cá nhân riêng thật chuyên nghiệp và đậm thương hiệu cá nhân như thế này (nguồn: http://www.adhamdannaway.com/ và https://kristihines.com/) để giới thiệu bản thân và tăng cơ hội tiếp cận nhà tuyển dụng.\r\n\r\nĐối với một lập trình viên, phát triển thương hiệu cá nhân online là một cách làm rất tốt để bạn có thể tiếp cận các nhà tuyển dụng. Đồng thời việc đó cũng giúp tạo ra cơ hội để bạn làm quen, giao lưu với các lập trình viên khác. Profile cá nhân trên Facebook, Google+ hay  Twitter chắc chắn không thể tạo ra sự chuyên nghiệp bằng một website cá nhân mang tên bạn. Đối với một lập trình viên, có một profile đẹp online lại càng cần thiết. Website cá nhân cũng là cơ sở để nhà tuyển dụng đánh giá năng lực, khả năng sáng tạo, kiến thức và các mối quan tâm của bạn để lựa chọn hợp tác. Một ngày nào đó, nhà tuyển dụng có thể ghé qua website của bạn và tìm thấy các kĩ năng họ cần, họ sẽ chủ động liên lạc với bạn. Hoặc trường hợp khác, các lập trình viên cùng chí hướng với bạn ghé qua, bạn có thể tìm được một cơ hội hợp tác, hay ít nhất là một cơ hội giao lưu.\r\n\r\n5. Khởi nghiệp\r\nHẳn các bạn đã quen với khái niệm startup – khởi nghiệp, tôi chỉ xin nhắc lại ‘khởi nghiệp là một tổ chức được thiết kế nhằm cung cấp sản phẩm và dịch vụ trong những điều kiện không chắc chắn nhất’.\r\n\r\nNếu bạn đã học qua một số ngôn ngữ lập trình và cách thức phát triển web, cộng thêm một ít sáng tạo là có thể cho ra đời ra đời những sản phẩm công nghệ số. Ở thị trường Việt Nam, để bắt đầu các bạn có thể dễ dàng bán được game và phần mềm trên các chợ ứng dụng dưới danh nghĩa một đơn vị cung cấp dịch vụ.\r\n\r\n11\r\n\r\nFacebook với Mark Zurkerberg\r\n\r\n12\r\n\r\nhay Cốc Cốc...đã từng là giấc mơ triệu đô của nhiều startup công nghệ trẻ.\r\n\r\nTuy nhiên đừng gò mình trong suy nghĩ khởi nghiệp chỉ là dành cho những con người mang máu lãnh đạo, phải thật tài năng và dày dặn kinh nghiệm. Startup không nhất định phải thành công, phát triển nếu như bạn chỉ cần học hỏi kinh nghiệm. Thất bại cũng mang lại cho bạn những bài học quý giá va đó cũng là những gì nhà tuyển dụng cần ở bạn.\r\n\r\n \r\n7. Đầu tư thời gian và chất xám làm hồ sơ năng lực\r\nĐối với một số ngành đặc thù, có thể làm ra sản phẩm cụ thể như lập trình viên, designer, photographer… Các ứng viên có thể tự đầu tư làm cho mình một hồ sơ năng lực (hay còn gọi là porfolio) để gửi kèm cùng CV. Hồ sơ năng lực sẽ là nơi tập trung các sản phẩm mà bạn đã từng thực hiện (hay hợp tác thực hiện) để nhà tuyển dụng có thể hình dung năng lực của bạn một cách rõ ràng nhất.\r\n\r\nNếu còn đi học bạn có thể xin tham gia nghiên cứu cùng các giáo sư và người hướng dẫn… Lợi thế của sinh viên công nghệ là có thể kiếm thu nhập ngay từ khi còn ngồi trên ghế nhà trường với những kiến thức đã học được. Viết code dạo, cài win dạo, nhận các dự án freelance như thiết kế web, fixbugs…Nếu có sản phẩm hãy tập hợp chúng lại để tạo thành một hồ sơ năng lực.\r\n\r\nĐó có thể là những sản phẩm thành công hoặc thất bại, quan trọng là bạn đã học được những gì trong quá trình thực hiện những sản phẩm đó. Hãy chỉ cho nhà tuyển dụng thấy những gì bạn đã học được.\r\n\r\nLời kết\r\nCho nên không thể đổ lỗi cho doanh nghiệp khi họ yêu cầu kinh nghiệm ở một sinh viên vừa ra trường. Bởi vì những gì mà họ muốn ở bạn – người họ sẽ bỏ tiền ra thuê đó là năng lực và lòng đam mê, kinh nghiệm trong CV thực chất chỉ là những dòng chữ đảm bảo cho năng lực của những người hoàn toàn mới. Giá trị cốt lõi của một người đi làm đó vẫn là năng lực và đam mê, nếu chưa có kinh nghiệm hãy cho họ thấy tất cả những gì bạn có.\r\n\r\n Theo Phương Mai           \r\n\r\nDù bạn là Fresher hay một lập trình viên đã dày dặn kinh nghiệm, tại topITworks vẫn luôn có các jobs phù hợp cho riêng ban. Tìm cho mình một công việc phù hợp ngay nào.', 'news2.jpg', 1, 199, 3, 1, 1, '2020-04-21 08:46:55', '2021-07-01 08:58:21'),
(3, '5 Cách Để Ghi Nhớ Những Gì Bạn Đã Đọc Được', '5-cach-ghi-nho-nhung-gi-ban-da-hoc-duoc-1022.html', 'Đã từng có một khoảng thời gian, mình đọc sách mà chỉ chú trọng tới số lượng, tới cái hình thức, cái vẻ hào nhoáng bên ngoài. Giai đoạn đó mình đọc rất qua loa, cốt để đọc xong một quyển sách, rồi khoe với thiên hạ, năm nay ta đã đọc 50, 70 quyển, cảm thấy sung sướng cái tôi vô cùng.', '<p>Đ&atilde; từng c&oacute; một khoảng thời gian, m&igrave;nh <a href=\"https://kynang.me/ky-nang-song/doc-sach-nhanh-giup-cai-thien-ket-qua-hoc-tap-dang-kinh-ngac.html\">đọc s&aacute;ch</a> m&agrave; chỉ ch&uacute; trọng tới số lượng, tới c&aacute;i h&igrave;nh thức, c&aacute;i vẻ h&agrave;o nho&aacute;ng b&ecirc;n ngo&agrave;i. Giai đoạn đ&oacute; m&igrave;nh đọc rất qua loa, cốt để đọc xong một quyển s&aacute;ch, rồi khoe với thi&ecirc;n hạ, năm nay ta đ&atilde; đọc 50, 70 quyển, cảm thấy sung sướng <a href=\"https://kynang.me/ky-nang-song/ung-xu-voi-cai-toi-ca-nhan-ben-trong-ban.html\">c&aacute;i t&ocirc;i</a> v&ocirc; c&ugrave;ng.</p>\r\n\r\n<p>V&agrave; kết quả l&agrave; đọc xong m&agrave; chẳng đọng lại c&aacute;i g&igrave; trong đầu m&igrave;nh cả, c&oacute; chăng l&agrave; những chi tiết mơ hồ, những nh&acirc;n vật m&agrave; m&igrave;nh kh&ocirc;ng nhớ nổi c&aacute;i t&ecirc;n, hay những lời khuy&ecirc;n m&agrave; khi gấp s&aacute;ch lại th&igrave; cũng th&agrave;nh gi&oacute; thổi m&acirc;y bay.</p>\r\n\r\n<p>M&igrave;nh bắt đầu thấy kh&ocirc;ng ổn, v&agrave; nếu cứ tiếp tục như thế n&agrave;y, th&igrave; m&igrave;nh đang đọc s&aacute;ch v&igrave; c&aacute;i bản ng&atilde; chứ kh&ocirc;ng v&igrave; c&aacute;i sự học, kiến thức v&agrave; những gi&aacute; trị v&ocirc; gi&aacute; m&agrave; s&aacute;ch mang lại. V&agrave; m&igrave;nh bắt đầu thay đổi mọi thứ.</p>\r\n\r\n<p>Muốn ghi nhớ những g&igrave; bạn đ&atilde; đọc, th&igrave; n&oacute; c&ograve;n t&ugrave;y theo thể loại s&aacute;ch cụ thể sẽ c&oacute; những c&aacute;ch thức kh&aacute;c nhau. Trong b&agrave;i viết n&agrave;y m&igrave;nh sẽ chỉ ra những phương ph&aacute;p chung c&oacute; thể &aacute;p dụng được với đa số c&aacute;c loại s&aacute;ch tr&ecirc;n thị trường hiện nay.</p>\r\n\r\n<p><img alt=\"5 Cách Để Ghi Nhớ Những Gì Bạn Đã Đọc Được Trong Sách\" src=\"https://i1.wp.com/kynang.me/wp-content/uploads/2018/11/5-cach-ghi-nho-nhung-gi-doc-duoc.png?zoom=1.25&amp;resize=560%2C315&amp;ssl=1\" style=\"height:315px; width:560px\" /></p>\r\n\r\n<h2>#1. Phải c&oacute; c&aacute;i nh&igrave;n tổng quan về s&aacute;ch</h2>\r\n\r\n<p>Mỗi quyển s&aacute;ch đều c&oacute; mục lục, n&ecirc;n trước khi đọc c&aacute;c bạn h&atilde;y xem kỹ phần mục lục trước để xem c&aacute;i sườn quyển s&aacute;ch như thế n&agrave;o. Xem xong rồi, c&aacute;c bạn h&atilde;y đọc lần 1 to&agrave;n bộ quyển s&aacute;ch. Trong lần đọc n&agrave;y h&atilde;y đọc lướt th&ocirc;i, để nắm c&aacute;i đại &yacute;, kh&ocirc;ng ch&uacute; trọng phải hiểu từng chi tiết, nội dung.</p>\r\n\r\n<h2>#2. Note &ndash; Ghi ch&eacute;p</h2>\r\n\r\n<p>Trong khi đọc c&aacute;c bạn nhớ note lại những chi tiết quan trọng để lần đọc tới sẽ nghi&ecirc;n cứu kỹ hơn. Việc note sẽ t&ugrave;y v&agrave;o mỗi người, đối với m&igrave;nh th&igrave; m&igrave;nh thường d&ugrave;ng b&uacute;t dạ quang để t&ocirc; m&agrave;u những d&ograve;ng quan trọng v&agrave; lần sau sẽ ch&uacute; &yacute; những d&ograve;ng n&agrave;y nhiều hơn.</p>\r\n\r\n<h2>#3. Đọc chi tiết</h2>\r\n\r\n<p>Tới lần đọc thứ 2, sau khi đ&atilde; c&oacute; đại &yacute;, bắt đầu đọc kĩ những phần m&agrave; bạn thấy quan trọng, cứ đọc tới, đọc lui, <a href=\"https://kynang.me/ky-nang-song/tu-duy-phan-bien-ky-nang-can-co-doi-voi-hoc-sinh-sinh-vien.html\">phản biện</a> lại t&aacute;c giả, đặt c&acirc;u hỏi tại sao n&oacute; thế n&agrave;y, tại sao n&oacute; thế kia, tại sao l&agrave; người n&agrave;y m&agrave; kh&ocirc;ng phải người kia, tại sao, tại sao v&agrave; tại sao?</p>\r\n\r\n<p>Việc đặt c&acirc;u hỏi l&agrave; rất quan trọng, thứ nhất n&oacute; sẽ k&iacute;ch th&iacute;ch t&iacute;nh t&ograve; m&ograve;, &oacute;c s&aacute;ng tạo cũng như l&agrave;m cho tr&iacute; tưởng tượng của bạn bay xa, m&agrave; một khi đ&atilde; t&ograve; m&ograve; th&igrave; sẽ muốn t&igrave;m hiểu tới c&ugrave;ng, thứ hai nếu bạn chưa t&igrave;m ra được c&acirc;u trả lời, bạn sẽ thấy ấm ức v&agrave; điều đ&oacute; c&oacute; thể gi&uacute;p bạn ghi nhớ tốt hơn.</p>\r\n\r\n<h2>#4. Đọc lại định kỳ</h2>\r\n\r\n<p>C&aacute;c bạn sau khi đ&atilde; trải qua 2 lần đọc n&agrave;y, th&igrave; m&igrave;nh nghĩ chỉ nhớ được khoảng tối đa 30 &ndash; 50% nội dung th&ocirc;i, để c&oacute; thể biến c&aacute;i kiến thức của t&aacute;c giả th&agrave;nh của m&igrave;nh, c&aacute;c bạn phải đọc đi đọc lại định kỳ mỗi th&aacute;ng 1 lần trong 1 năm đối với những quyển s&aacute;ch n&agrave;o m&agrave; bạn thật sự t&acirc;m đắc v&agrave; muốn thẩm thấu hết những g&igrave; m&agrave; t&aacute;c giả muốn truyền đạt.</p>\r\n\r\n<h2>#5. &Aacute;p dụng những g&igrave; đ&atilde; đọc được</h2>\r\n\r\n<p>Đ&acirc;y l&agrave; bước quan trọng nhất v&agrave; cũng l&agrave; kh&oacute; nhất. C&oacute; một nghi&ecirc;n cứu khoa học đ&atilde; chỉ ra, khi bạn tiếp thu một lượng kiến thức mới, nếu bạn vận dụng n&oacute; v&agrave; dạy n&oacute; cho người kh&aacute;c, th&igrave; bạn sẽ ghi nhớ được tới 90% lượng kiến thức mới đ&oacute; sau 2 tuần.</p>\r\n\r\n<p>Vậy &aacute;p dụng n&oacute; như thế n&agrave;o?</p>\r\n\r\n<p>M&igrave;nh lấy v&iacute; dụ như việc bạn học <a href=\"https://kynang.me/0nal\" target=\"_blank\"><strong>từ vựng tiếng anh</strong></a>, bạn phải đưa những từ vựng đ&oacute; v&agrave;o trong những c&acirc;u giao tiếp hằng ng&agrave;y, hoặc khi đi tr&ecirc;n đường bạn bắt gặp những thứ li&ecirc;n quan tới từ vựng bạn đ&atilde; học, th&igrave; bạn đọc thoại nội t&acirc;m để mi&ecirc;u tả h&igrave;nh d&aacute;ng, m&agrave;u sắc, k&iacute;ch thước hay bất cứ c&aacute;i g&igrave; li&ecirc;n quan tới n&oacute;, c&oacute; như thế bạn mới c&oacute; thể nhớ thật l&acirc;u những từ đ&oacute;, tức l&agrave; l&agrave;m sao m&agrave; đưa những từ vựng đ&oacute; v&agrave;o cuộc sống thường nhật của bạn l&agrave; được.</p>\r\n\r\n<p>Hay một v&iacute; dụ kh&aacute;c, trong quyển <strong><a href=\"https://kynang.me/sach/dac-nhan-tam\" target=\"_blank\">Đắc Nh&acirc;n T&acirc;m</a></strong> c&oacute; một phần n&oacute;i về c&aacute;ch tạo ấn tượng tốt với người lạ trong lần gặp đầu ti&ecirc;n, đ&oacute; l&agrave; h&atilde;y mỉm cười. &Aacute;p dụng liền đi, nếu bạn thấy một người lạ n&agrave;o chủ động nh&igrave;n m&igrave;nh, hoặc cảm thấy c&oacute; thiện cảm với họ, th&igrave; h&atilde;y đ&aacute;p trả họ bằng một nụ cười ch&acirc;n th&agrave;nh, đ&oacute; l&agrave; bạn đ&atilde; &aacute;p dụng những kiến thức m&agrave; bạn học được v&agrave;o thực tế cuộc sống rồi đấy. H&atilde;y ki&ecirc;n tr&igrave; mỉm cười với người lạ, 1 người 1 ng&agrave;y cũng được, quan trọng l&agrave; phải duy tr&igrave; mỗi ng&agrave;y, th&igrave; tự khắc n&oacute; sẽ l&agrave; của bạn m&agrave; th&ocirc;i.</p>\r\n\r\n<p>Tới bước n&agrave;y, bạn đ&atilde; c&oacute; thể ghi nhớ khoảng 80% lượng kiến thức trong s&aacute;ch rồi, v&agrave; con số n&agrave;y sẽ giảm theo thời gian nếu bạn kh&ocirc;ng duy tr&igrave; đều đặn định kỳ, n&ecirc;n nhớ đọc lại <a href=\"https://kynang.me/ky-nang-song/quyen-sach-thay-doi-cuoc-doi-toi.html\">quyển s&aacute;ch t&acirc;m đắc</a> mỗi th&aacute;ng một lần nh&eacute;!</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những chia sẻ kinh nghiệm c&aacute; nh&acirc;n của m&igrave;nh, mong c&aacute;c bạn g&oacute;p &yacute; th&ecirc;m. C&ograve;n bạn th&igrave; sao, l&agrave;m sao c&oacute; thể ghi nhớ được những g&igrave; bạn đ&atilde; đọc? C&ugrave;ng thảo luận n&agrave;o !!!</p>\r\n\r\n<p><em>Nguồn: Nguyễn Duy Cần</em></p>\r\n\r\n<p>Thực tế cho thấy ai trong số ch&uacute;ng ta cũng c&oacute; nhu cầu cần học tập th&ecirc;m để ph&aacute;t triển bản th&acirc;n, ph&aacute;t triển tri thức v&agrave; tr&iacute; tuệ. Nhưng từ trước đến giờ, ch&uacute;ng ta chưa hề được nh&agrave; trường dạy một phương ph&aacute;p ghi nhớ, ghi ch&uacute; hay nắm bắt th&ocirc;ng tin n&agrave;o thật sự hiệu quả.&nbsp;Điều đ&oacute; l&agrave;m việc học của bạn trở n&ecirc;n nh&agrave;m ch&aacute;n đến tột độ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kh&oacute;a học &ldquo;<a href=\"https://kynang.me/khoa-hoc/ghi-nho-sieu-toc\" target=\"_blank\">Ghi Nhớ Si&ecirc;u Tốc</a>&rdquo; sẽ tiết lộ cho bạn những b&iacute; quyết ghi nhớ v&ocirc; c&ugrave;ng dễ d&agrave;ng. Tập trung dạy bạn những c&aacute;ch học ti&ecirc;n tiến nhất m&agrave; c&aacute;c chuy&ecirc;n gia ghi nhớ h&agrave;ng đầu tr&ecirc;n thế giới đ&atilde; sử dụng như Tony Buzan, Eran Katz, Adam Khoo&hellip; <a href=\"https://kynang.me/khoa-hoc/ghi-nho-sieu-toc\" target=\"_blank\"><strong>T&Igrave;M HIỂU NGAY</strong></a>&nbsp;</p>\r\n\r\n<p><strong>Đọc th&ecirc;m:</strong></p>\r\n\r\n<ul>\r\n	<li><a href=\"https://kynang.me/ky-nang-song/dinh-nghia-ve-thanh-cong-jim-john.html\">Định Nghĩa Về Th&agrave;nh C&ocirc;ng, Thất Bại V&agrave; Về Cuộc Sống Của Jim John</a></li>\r\n	<li><a href=\"https://kynang.me/ky-nang-song/quyen-sach-thay-doi-cuoc-doi-toi.html\">Quyển S&aacute;ch Đ&atilde; Gi&uacute;p T&ocirc;i Thay Đổi Cuộc Đời</a></li>\r\n	<li><a href=\"https://kynang.me/sach-hay/sach-ky-nang/doi-ngan-dung-ngu-dai-review.html\">Đời Ngắn Đừng Ngủ D&agrave;i &ndash; Robin Sharma</a></li>\r\n</ul>\r\n\r\n<p><a href=\"https://kynang.me/ky-nang-song/doc-sach-nhanh-giup-cai-thien-ket-qua-hoc-tap-dang-kinh-ngac.html\"><img alt=\"Đọc sách nhanh giúp cải thiện kết quả học tập một cách đáng kinh ngạc\" src=\"https://i1.wp.com/kynang.me/wp-content/uploads/2017/05/doc-sach-nhanh-giup-cai-thien-ket-qua-hoc-tap-dang-kinh-ngac.jpg?zoom=1.25&amp;fit=600%2C400&amp;ssl=1&amp;resize=224%2C128\" style=\"height:128px; width:224px\" /></a></p>\r\n\r\n<p><a href=\"https://kynang.me/ky-nang-song/doc-sach-nhanh-giup-cai-thien-ket-qua-hoc-tap-dang-kinh-ngac.html\">Đọc s&aacute;ch nhanh gi&uacute;p cải thiện kết quả học tập một c&aacute;ch đ&aacute;ng kinh ngạc</a></p>\r\n\r\n<p>Bạn kh&ocirc;ng đọc s&aacute;ch đồng nghĩa với việc bạn đ&atilde; thua người kh&aacute;c một bước lớn khi học tập cũng như l&agrave;m việc sau n&agrave;y. Vậy l&agrave;m sao để đọc s&aacute;ch đ&uacute;ng c&aacute;ch v&agrave; c&aacute;ch đọc như thế n&agrave;o để đạt hiệu quả cao nhất ...</p>\r\n\r\n<p><a href=\"https://kynang.me/ky-nang-song/10-thoi-quen-giup-hoc-tap-nhanh-gap-doi.html\"><img alt=\"10 Thói Quen Giúp Bạn Học Tập Mọi Thứ Nhanh Gấp Đôi\" src=\"https://i1.wp.com/kynang.me/wp-content/uploads/2018/10/hoc-nhanh-gap-doi.jpg?zoom=1.25&amp;fit=560%2C315&amp;ssl=1&amp;resize=224%2C128\" style=\"height:128px; width:224px\" /></a></p>\r\n\r\n<p><a href=\"https://kynang.me/ky-nang-song/10-thoi-quen-giup-hoc-tap-nhanh-gap-doi.html\">10 Th&oacute;i Quen Gi&uacute;p Bạn Học Tập Mọi Thứ Nhanh Gấp Đ&ocirc;i</a></p>\r\n\r\n<p>Dạy lại người kh&aacute;c những g&igrave; bạn đang học, n&atilde;o bạn c&oacute; khả năng lưu giữ lại tới 90% những g&igrave; bạn vừa tiếp thu, đặc biệt l&agrave; ngay sau khi tự học ...</p>\r\n\r\n<p><a href=\"https://kynang.me/ky-nang-song/10-thoi-quen-giup-ban-thong-minh.html\"><img alt=\"10 Thói Quen Giúp Bạn Trở Nên Thông Minh Hơn Mỗi Ngày\" src=\"https://i0.wp.com/kynang.me/wp-content/uploads/2017/07/thoi-quen-thong-minh.png?zoom=1.25&amp;fit=560%2C315&amp;ssl=1&amp;resize=224%2C128\" style=\"height:128px; width:224px\" /></a></p>\r\n\r\n<p><a href=\"https://kynang.me/ky-nang-song/10-thoi-quen-giup-ban-thong-minh.html\">10 Th&oacute;i Quen Gi&uacute;p Bạn Trở N&ecirc;n Th&ocirc;ng Minh Hơn Mỗi Ng&agrave;y</a></p>\r\n\r\n<p>Giải lao bằng c&aacute;ch online kh&ocirc;ng phải l&agrave; check mạng x&atilde; hội thường xuy&ecirc;n hay đăng tải v&agrave;i bức ảnh con vật dễ thương. Rất nhiều trang web cung cấp đầy đủ t&agrave;i liệu học tập tuyệt vời.</p>', 'news3.png', 0, 4, 3, 1, 1, '2020-04-21 08:56:05', '2021-07-01 08:58:55'),
(4, '30 câu nói hay về cuộc sống độc thân mang lại cho bạn sự tự tin bất diệt', '30-cau-hoi-hay-ve-cuoc-song-doc-than-2927262.html', '(Lichngaytot.com) Những câu nói hay về cuộc sống độc thân là những lời đúc kết của những người đã từng trải qua cảm giác đơn độc này và họ cảm thấy khá thoải mái với những cảm xúc này vì họ biết đó là yếu tố cần thiết để hình thành nên con người hiện tại.', '<p>&nbsp;<br />\r\nNhững ai đang chưa t&igrave;m thấy mảnh gh&eacute;p c&ograve;n lại của cuộc đời m&igrave;nh sẽ t&igrave;m được sự đồng cảm khi đọc&nbsp;c&acirc;u n&oacute;i hay về cuộc sống độc th&acirc;n sau đ&acirc;y:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. Đừng để x&atilde; hội đ&aacute;nh lừa bạn rằng cuộc đời sẽ chẳng ra sao nếu kh&ocirc;ng c&oacute; người y&ecirc;u. Đức Đạt Lai Lạt Ma đ&atilde; sống một m&igrave;nh trong suốt 80 năm v&agrave; ng&agrave;i l&agrave; một trong những người hạnh ph&uacute;c nhất thế giới. Đừng t&igrave;m kiếm hạnh ph&uacute;c từ b&ecirc;n ngo&agrave;i nữa, h&atilde;y bắt đầu t&igrave;m n&oacute; trong ch&iacute;nh bản th&acirc;n m&igrave;nh. (Miya Yamanouchi, Embrace Your Sexual Self: A Practical Guide for Women)<br />\r\n<br />\r\n2. Ở đ&acirc;u đ&oacute; c&oacute; người đang mơ về nụ cười của bạn, ở đ&acirc;u đ&oacute; c&oacute; người cảm thấy sự c&oacute; mặt của bạn l&agrave; đ&aacute;ng gi&aacute;, v&igrave; vậy khi bạn đang c&ocirc; đơn, buồn rầu v&agrave; ủ rũ, h&atilde;y nhớ rằng c&oacute; ai đ&oacute;, ở đ&acirc;u đ&oacute; đang nghĩ về bạn.</p>\r\n\r\n<p><br />\r\n(Somewhere there&rsquo;s someone who dreams of your smile, somewhere there&rsquo;s someone who finds your presence worthwhile, so when you are lonely, sad and blue, remember there is someone, somewhere thinking of you.)</p>\r\n\r\n<p>3. H&atilde;y suy nghĩ như một nữ ho&agrave;ng. Một nữ ho&agrave;ng kh&ocirc;ng sợ thất bại. V&igrave; thất bại l&agrave; nấc thang bước đến th&agrave;nh c&ocirc;ng. (Oprah Winfrey)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4. Niềm hạnh ph&uacute;c to lớn nhất của mọi cuộc đời l&agrave; sự c&ocirc; độc bận rộn.&nbsp;</p>\r\n\r\n<p>(The happiest of all lives is a busy solitude.)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>5. H&atilde;y l&agrave; bạn với ch&iacute;nh m&igrave;nh, rồi người kh&aacute;c sẽ đến. (Be a friend to thyself, and others will be so too.)</p>\r\n\r\n<p>Thomas Fuller</p>\r\n\r\n<p><br />\r\n6. Độc th&acirc;n kh&ocirc;ng c&oacute; nghĩa l&agrave; bạn bị bỏ rơi, m&agrave; l&agrave; một sự lựa chọn. Đ&oacute; l&agrave; lựa chọn để bạn kh&ocirc;ng c&ograve;n phải dựa v&agrave;o t&igrave;nh trạng mối quan hệ để định nghĩa bản th&acirc;n. Đ&oacute; l&agrave; khi bạn được biết đến bởi ch&iacute;nh những gi&aacute; trị do bạn tạo ra. (Mandy Hale)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>7. Bạn kh&ocirc;ng nhất thiết phải c&oacute; người y&ecirc;u th&igrave; mới được hạnh ph&uacute;c.&nbsp;(Phyllis Reynolds Naylor, Alice Alone) Xem th&ecirc;m:&nbsp;<a href=\"https://lichngaytot.com/blog-cuoc-song/cau-noi-hay-ve-su-thay-doi-trong-tinh-yeu-700-198497.html\">C&acirc;u n&oacute;i hay về sự thay đổi trong t&igrave;nh y&ecirc;u để bạn c&oacute; thể đăng status sống &quot;ảo&quot;</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>8. Khi bạn cảm thấy buồn v&agrave; c&ocirc; đơn v&igrave; đang sống đời độc th&acirc;n, h&atilde;y nhắc m&igrave;nh nhớ rằng c&oacute; rất nhiều người bị mắc kẹt trong những mối quan hệ tồi tệ v&agrave; chỉ mơ được tự do như bạn ngay lập tức.&nbsp;(Pamela Cummins, Psychic Wisdom on Love and Relationships)&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>9. T&ocirc;i chưa bao giờ t&igrave;m thấy người bạn đồng h&agrave;nh n&agrave;o tốt hơn sự c&ocirc; độc.</p>\r\n\r\n<p><br />\r\n(I never found a companion that was so companionable as solitude.)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>10. Kh&ocirc;ng g&igrave; l&agrave;m ch&uacute;ng ta c&ocirc; đơn hơn những b&iacute; mật của m&igrave;nh. (Nothing makes us so lonely as our secrets).<br />\r\nPaul Tournier</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>11. Sự ngh&egrave;o kh&oacute; khốn c&ugrave;ng nhất l&agrave; nỗi c&ocirc; đơn v&agrave; cảm gi&aacute;c kh&ocirc;ng được y&ecirc;u thương.</p>\r\n\r\n<p>(The most terrible poverty is loneliness and the feeling of being unloved). Mẹ Teresa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:100%\"><img alt=\"cau noi hay ve cuoc song doc than\" src=\"https://cms.lichngaytot.com/medias/original/2019/7/23/30-cau-noi-hay-ve-cuoc-song-doc-than.jpeg\" style=\"width:100%\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td><em>C&acirc;u n&oacute;i hay về cuộc sống độc th&acirc;n mang lại sự thấu cảm cho những ai đang đơn độc</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>12. Vấn đề kh&ocirc;ng thực sự l&agrave; c&ocirc; độc, m&agrave; l&agrave; c&ocirc; đơn. Bạn c&oacute; nghĩ tới cảm gi&aacute;c c&ocirc; đơn giữa đ&aacute;m đ&ocirc;ng l&agrave; như thế n&agrave;o?</p>\r\n\r\n<p>(The trouble is not really in being alone, it&rsquo;s being lonely. One can be lonely in the midst of a crowd, don&rsquo;t you think?)</p>\r\n\r\n<p>Christine Feehan</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>13. Ở một m&igrave;nh kh&ocirc;ng c&ocirc; đơn, nhớ ai đ&oacute; mới c&ocirc; đơn.</p>\r\n\r\n<p>T&ocirc;i độc th&acirc;n &ndash; Tưởng Thần Đ&ocirc;ng</p>\r\n\r\n<p>14. Con người ngay từ khi sinh ra đ&atilde; c&ocirc; độc. Chết đi cũng trong c&ocirc; độc. D&ugrave; c&oacute; cố lẩn tr&aacute;nh nỗi c&ocirc; đơn, n&oacute; vẫn hiện diện trong cuộc sống hằng ng&agrave;y. (Ta balo tr&ecirc;n đất &Aacute; &ndash; Rosie Nguyễn)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>15. Sự c&ocirc; đơn l&agrave; con đường m&agrave; số phận thử d&ugrave;ng để dẫn dắt con người tới với ch&iacute;nh m&igrave;nh.</p>\r\n\r\n<p>(Loneliness is the way by which destiny endeavors to lead man to himself).</p>\r\n\r\n<p>Hermann Hesse</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>16. Sự lẻ loi của nỗi c&ocirc; đơn thật kinh khủng. T&ocirc;i c&oacute; s&aacute;ng suốt kh&ocirc;ng? C&oacute; lẽ l&agrave; kh&ocirc;ng, nhưng dường như mọi chuyện kh&aacute;c đều kh&ocirc;ng thể.</p>\r\n\r\n<p>(The desolation of loneliness is terrible. Was I wise? Perhaps not, but it seemed as though anything else was impossible).</p>\r\n\r\n<p>Ramsay MacDonald</p>\r\n\r\n<p>17. C&oacute; nỗi c&ocirc; đơn tr&ecirc;n thế gian n&agrave;y m&atilde;nh liệt tới mức bạn c&oacute; thể thấy n&oacute; trong những chuyển động chậm chạp của kim đồng hồ.</p>\r\n\r\n<p>(There is a loneliness in this world so great that you can see it in the slow movement of the hands of a clock.)</p>\r\n\r\n<p>Charles Bukowski</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>18. Cảm gi&aacute;c l&agrave; một thứ rất huyền diệu, c&oacute; những niềm vui th&igrave; cần người kh&aacute;c chia sẻ niềm vui sẽ tăng gấp bội, nhưng c&oacute; những sự c&ocirc; đơn cần một m&igrave;nh mới c&oacute; thể thấu hiểu. (Hoa nở giữa th&aacute;ng năm c&ocirc; đơn &ndash; S&ecirc;nh Ly)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>19. Sự c&ocirc; đơn kh&ocirc;ng l&agrave;m t&ocirc;i lo lắng; cuộc đời đ&atilde; đủ kh&oacute; khăn khi đối ph&oacute; với bản th&acirc;n v&agrave; những th&oacute;i quen của bản th&acirc;n.</p>\r\n\r\n<p>(Loneliness does not worry me; life is difficult enough, putting up with yourself and with your own habits).</p>\r\n\r\n<p>Jorge Luis Borges&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:100%\"><img alt=\"cau noi hay ve nguoi doc than\" src=\"https://cms.lichngaytot.com/medias/original/2019/7/26/cau-noi-hay-ve-nguoi-doc-than.jpeg\" style=\"width:100%\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>20. Tất cả ch&uacute;ng ta đều l&agrave;m được nhiều điều c&ugrave;ng nhau, nhưng ch&uacute;ng ta đều chết trong c&ocirc; độc.</p>\r\n\r\n<p>(We are all so much together, but we are all dying of loneliness.) Albert Schweitzer</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>21. C&ocirc; đơn qu&aacute; l&acirc;u, con người sẽ sinh ra t&acirc;m l&yacute; kỳ lạ, lu&ocirc;n lu&ocirc;n sinh ra cảm gi&aacute;c th&acirc;n thiết với người tỏ ra lo lắng cho m&igrave;nh.</p>\r\n\r\n<p>Sắc m&agrave;u ấm. (Phong Tử Tam Tam)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>22. Nếu một người phụ nữ chưa từng d&aacute;m sống hết m&igrave;nh, l&agrave;m sao người đ&oacute; lại c&oacute; thể biết m&igrave;nh đi được tới đ&acirc;u. Nếu c&ocirc; ấy chưa hề th&aacute;o bỏ gi&agrave;y cao g&oacute;t, l&agrave;m sao người đ&oacute; biết được m&igrave;nh đi bộ bao xa hay chạy nhanh như thế n&agrave;o? ((Germaine Greer)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>23. Điều người phụ nữ cần học đ&oacute; l&agrave; chẳng ai mang đến cho bạn sức mạnh. Bạn phải tự gi&agrave;nh lấy n&oacute;. (Roseanne Cherrie Barr)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>24. Nỗi c&ocirc; đơn xuất hiện từ sự xa l&aacute;nh cuộc sống. Đ&oacute; l&agrave; nỗi c&ocirc; đơn từ c&aacute;i t&ocirc;i thực sự của bạn.</p>\r\n\r\n<p>(Loneliness is caused by an alienation from life. It is a loneliness from your real self.)</p>\r\n\r\n<p>Maxwell Maltz&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>25. C&ocirc; độc th&igrave; đ&aacute;ng sợ đấy, nhưng kh&ocirc;ng đ&aacute;ng sợ bằng việc cảm thấy c&ocirc; đơn trong một mối quan hệ.</p>\r\n\r\n<p>(Being alone is scary, but not as scary as feeling alone in a relationship.)</p>\r\n\r\n<p>Amelia Earhart</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>26. Người c&ocirc; đơn qu&aacute; l&acirc;u sẽ kh&ocirc;ng c&oacute; th&oacute;i quen y&ecirc;u v&agrave; được y&ecirc;u.</p>\r\n\r\n<p>(Hoa nở giữa th&aacute;ng năm c&ocirc; đơn &ndash; S&ecirc;nh Ly)&nbsp;</p>\r\n\r\n<p><br />\r\n27. Đ&ocirc;i khi bạn dựng l&ecirc;n những bức tường kh&ocirc;ng phải để ngăn người kh&aacute;c ở b&ecirc;n ngo&agrave;i, m&agrave; để xem ai đủ quan t&acirc;m ph&aacute; vỡ ch&uacute;ng.</p>\r\n\r\n<p>(Sometimes you put walls up not to keep people out, but to see who cares enough to break them down.)</p>\r\n\r\n<p>Khuyết danh</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>28. T&ocirc;i sống với sự c&ocirc; đơn đau đớn trong tuổi trẻ nhưng lại ngọt ng&agrave;o trong những năm th&aacute;ng trưởng th&agrave;nh.</p>\r\n\r\n<p>(I live in that solitude which is painful in youth, but delicious in the years of maturity.)</p>\r\n\r\n<p>Albert Einstein</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>29.Sau tất cả những kiếm t&igrave;m, điều duy nhất ta t&igrave;m thấy c&oacute; thể khiến sự trống rỗng trở n&ecirc;n chịu đựng nổi ch&iacute;nh l&agrave; c&oacute; nhau.</p>\r\n\r\n<p>&ndash; In all our searching, the only thing we&rsquo;ve found that makes the emptiness bearable is each other.</p>\r\n\r\n<p>Carl Sagan</p>\r\n\r\n<p>30.Sự c&ocirc; đơn thật sự kh&ocirc;ng nhất thiết chỉ tồn tại khi bạn ở một m&igrave;nh.</p>\r\n\r\n<p>(Real loneliness is not necessarily limited to when you are alone).</p>\r\n\r\n<p>Charles Bukowski<br />\r\n<br />\r\n<em><strong>Kate Nguyễn </strong></em>(Tổng hợp)</p>\r\n\r\n<p><a href=\"/blog-cuoc-song/cau-noi-hay-ve-giup-do-nguoi-khac-700-197861.html\">50 c&acirc;u n&oacute;i hay nhất về gi&uacute;p đỡ người kh&aacute;c</a></p>\r\n\r\n<p><a href=\"/blog-cuoc-song/nhung-cau-noi-hay-ve-thanh-cong-700-198375.html\">55 c&acirc;u n&oacute;i hay về th&agrave;nh c&ocirc;ng hay nhất ai đọc cũng m&ecirc;</a></p>\r\n\r\n<p><a href=\"/blog-cuoc-song/nhung-cau-noi-hay-nhat-ve-su-thay-doi-700-198475.html\">Những c&acirc;u n&oacute;i hay nhất về sự thay đổi gi&uacute;p bạn h&agrave;n gắn vết thương l&ograve;ng</a></p>', '1587961698_5442107_06beaa14ecb425fca6640265a587495d.jpeg', 1, 14, 3, 1, 1, '2020-04-21 09:22:50', '2021-07-01 08:59:26');
INSERT INTO `blog` (`id`, `title`, `slug`, `summary`, `content`, `images`, `highlight`, `views`, `id_type`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Tìm hiểu về các thuật toán cơ bản trong lập trình (Phần 1)', 'tim-hieu-ve-cac-thuat-toan-co-ban-28222.html', 'Chào các bạn, trong bài viết này, mình sẽ cùng cac bạn đi tìm hiểu về các thuật toán cơ bản trong lập trình. Bắt đầu thôi!', '<div class=\"entry-content\"><p>Chào các bạn, trong bài viết này, mình sẽ cùng cac bạn đi tìm hiểu về các thuật toán cơ bản trong lập trình. Bắt đầu thôi!</p><div class=\"meta-related\"><div class=\"rpbt_shortcode\"><ul><li> <a href=\"https://codegym.vn/blog/2020/04/23/ap-dung-abstract-class-implicit-casting-ep-kieu-ngam-dinh-de-toi-uu-hoa-cac-bai-toan/\">Áp dụng abstract class &amp;  implicit casting (ép kiểu ngầm định) để tối ưu hóa các bài toán</a></li><li> <a href=\"https://codegym.vn/blog/2020/04/23/dive-in-linux-phan-2-cac-ban-phan-phoi/\">Dive in Linux – Phần 2: Các bản phân phối</a></li><li> <a href=\"https://codegym.vn/blog/2020/04/23/thuc-hanh-xem-log-cua-ung-dung-web/\">[Thực hành] Xem log của ứng dụng web</a></li><li> <a href=\"https://codegym.vn/blog/2020/04/23/thuc-hanh-chuc-nang-dang-nhap-codegym-vn/\">[Thực hành] Chức năng đăng nhập- Codegym.vn</a></li><li> <a href=\"https://codegym.vn/blog/2020/04/23/thuc-hanh-hien-thi-danh-sach-khach-hang/\">[Thực hành] Hiển thị danh sách khách hàng</a></li></ul></div></div><div id=\"toc_container\" class=\"no_bullets\"><p class=\"toc_title\">Nội dung <span class=\"toc_toggle\">[<a href=\"#\">ẩn</a>]</span></p><ul class=\"toc_list\"><li><a href=\"#Khai_niem_ve_thuat_toan\">Khái niệm về thuật toán</a></li><li><a href=\"#Tinh_chat_cua_thuat_toan\">Tính chất của thuật toán</a></li><li><a href=\"#Phan_tich_thoi_gian_chay_cua_cac_thuat_toan_co_ban_trong_lap_trinh\">Phân tích thời gian chạy của các thuật toán cơ bản trong lập trình</a><ul><li><a href=\"#Bai_viet_lien_quan\">Bài viết liên quan</a></li></ul></li></ul></div><h2><span id=\"Khai_niem_ve_thuat_toan\"><strong>Khái niệm về thuật toán</strong></span></h2><p>Thuật toán, còn gọi là giải thuật, là một <a href=\"https://vi.wikipedia.org/wiki/T%E1%BA%ADp_h%E1%BB%A3p#L%E1%BB%B1c_l%C6%B0%E1%BB%A3ng_c%E1%BB%A7a_t%E1%BA%ADp_h%E1%BB%A3p_-_H%E1%BB%AFu_h%E1%BA%A1n_v%C3%A0_v%C3%B4_h%E1%BA%A1n\">tập hợp hữu hạn</a> hay một dãy các quy tắc chặt chẽ của các chỉ thị, phương cách hay 1 trình tự các thao tác trên một đối tượng cụ thể được xác định và định nghĩa rõ ràng cho việc hoàn tất một số sự việc từ một trạng thái ban đầu cho trước; khi các chỉ thị này được áp dụng triệt để thì sẽ dẫn đến kết quả sau cùng như đã dự đoán trước.</p><h2><span id=\"Tinh_chat_cua_thuat_toan\"><strong>Tính chất của thuật toán</strong></span></h2><ul><li>Tính chính xác: để đảm bảo kết quả tính toán hay các thao tác mà máy tính thực hiện được là chính xác.</li><li>Tính rõ ràng: Thuật toán phải được thể hiện bằng các câu lệnh minh bạch; các câu lệnh được sắp xếp theo thứ tự nhất định.</li><li>Tính khách quan: Một thuật toán dù được viết bởi nhiều người trên nhiều máy tính vẫn phải cho kết quả như nhau.</li><li>Tính phổ dụng: Thuật toán không chỉ áp dụng cho một bài toán nhất định mà có thể áp dụng cho một lớp các bài toán có đầu vào tương tự nhau.</li><li>Tính kết thúc: Thuật toán phải gồm một số hữu hạn các bước tính toán.</li></ul><h2><span id=\"Phan_tich_thoi_gian_chay_cua_cac_thuat_toan_co_ban_trong_lap_trinh\"><strong>Phân tích thời gian chạy của các thuật toán cơ bản trong lập trình</strong></span></h2><p>Một trong những khía cạnh quan trọng nhất của thuật toán là nó nhanh như thế nào. Thường thì rất dễ dàng đưa ra một thuật toán để giải quyết vấn đề, nhưng nếu thuật toán quá chậm, thì cũng vô ích về tính hữu dụng.</p><p>Nếu tính tốc độ của thuật toán theo thời gian thực mà chúng ta đang cảm nhận. Thì tốc độ này còn bị phụ thuộc vào nơi mà thuật toán đó chạy (trên máy tính xịn, máy tính dởm) và những chi tiết khác cho việc triển khai nó (đầu vào ít hay nhiều sai sót) – Cho nên, chúng ta thường nói về thời gian chạy liên quan đến kích thước của đầu vào.</p><p><strong>Ví dụ:</strong> Có một thuật toán, đầu vào bao gồm N số nguyên, thuật toán sẽ có thời gian chạy tỉ lệ với một hàm số của N, ví dụ N 2, khi đó thời gian chạy được gọi là tỉ lệ với N 2, được biểu thị là O (N 2 ). Điều này tức là nếu bạn dùng Java để triển khai thuật toán nói trên ở máy tính với đầu vào có kích thước N, sẽ mất C * N 2 giây, trong đó C là một hằng số không thay đổi và không liên quan gì tới N.</p><p>Tuy nhiên, thời gian thực hiện thuật toán có thể thay đổi do các yếu tố khác với kích thước của đầu vào N. Ví dụ như thuật toán sắp xếp, nếu N số nguyên đầu vào đã có xu hướng được sắp xếp trước, thì thời gian sắp xếp sẽ nhanh hơn nhiều so với việc N số đầu vào lúc đầu là ngẫu nhiên. Vì thế, chúng ta sẽ thường nghe rằng có “Thời gian chạy trường hợp xấu nhất” và “Thời gian chạy trường hợp trung bình”.</p><p>Thời gian chạy trường hợp xấu nhất là trong mọi trường hợp, N số đầu vào dường như đã ngấm ngầm được chỉ định để thuật toán không có bước nào được nghỉ ngơi. Còn Thời gian chạy trường hợp trung bình là thời gian trung bình đo được trong tất cả các đầu vào có thể. Quá trình xác định thời gian chạy trường hợp xấu nhất và trường hợp trung bình cho một thuật toán nào đó đôi khi cũng gặp khó khăn, vì thường không thể chạy thuật toán trên tất cả các đầu vào có thể hoặc không nghĩ ra được những đầu vào chống lại sự nghỉ ngơi của thuật toán. Khi gặp khó khăn trong việc này, hãy tìm kiếm tài liệu online để ước tính các giá trị đó cho thuật toán của bạn.</p><p>Đối với một máy tính hạng thường, Thời gian hoàn thành gần đúng cho các thuật toán với N = 100 như sau:</p><p><noscript><img class=\"aligncenter wp-image-23992\" src=\"https://codegym.vn/wp-content/uploads/2020/04/tim-hieu-ve-cac-thuat-toan-co-ban-trong-lap-trinh-6.png\" alt=\"các thuật toán cơ bản trong lập trình\" width=\"700\" height=\"513\" srcset=\"https://codegym.vn/wp-content/uploads/2020/04/tim-hieu-ve-cac-thuat-toan-co-ban-trong-lap-trinh-6.png 700w, https://codegym.vn/wp-content/uploads/2020/04/tim-hieu-ve-cac-thuat-toan-co-ban-trong-lap-trinh-6-480x352.png 480w\" sizes=\"(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 700px, 100vw\" /></noscript><img class=\"lazyload aligncenter wp-image-23992\" src=\"data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20700%20513%22%3E%3C/svg%3E\" data-src=\"https://codegym.vn/wp-content/uploads/2020/04/tim-hieu-ve-cac-thuat-toan-co-ban-trong-lap-trinh-6.png\" alt=\"các thuật toán cơ bản trong lập trình\" width=\"700\" height=\"513\" data-srcset=\"https://codegym.vn/wp-content/uploads/2020/04/tim-hieu-ve-cac-thuat-toan-co-ban-trong-lap-trinh-6.png 700w, https://codegym.vn/wp-content/uploads/2020/04/tim-hieu-ve-cac-thuat-toan-co-ban-trong-lap-trinh-6-480x352.png 480w\" data-sizes=\"(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 700px, 100vw\"></p><p>Cám ơn các bạn đã đọc, hẹn gặp lại các bạn ở phần 2 của chủ đề với phần thuật toán sắp xếp nhé.</p><p style=\"text-align: right\"><em>Author: Trương Tấn Hải</em></p><div class=\"wp_rp_wrap  wp_rp_vertical_m\" id=\"wp_rp_first\"><div class=\"wp_rp_content\"><h3 class=\"related_post_title\"><span id=\"Bai_viet_lien_quan\">Bài viết liên quan</span></h3><ul class=\"related_post wp_rp\"><li data-position=\"0\" data-poid=\"in-23399\" data-post-type=\"none\"><a href=\"https://codegym.vn/blog/2020/04/15/thuc-hanh-dao-nguoc-cac-phan-tu-trong-mang/\" class=\"wp_rp_thumbnail\"><noscript><img src=\"https://codegym.vn/wp-content/uploads/2020/04/thuc-hanh-dao-nguoc-cac-phan-tu-trong-mang-2-150x150.png\" alt=\"[Thực hành] Đảo ngược các phần tử trong mảng\" width=\"150\" height=\"150\" /></noscript><img class=\"lazyload\" src=\"data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20150%20150%22%3E%3C/svg%3E\" data-src=\"https://codegym.vn/wp-content/uploads/2020/04/thuc-hanh-dao-nguoc-cac-phan-tu-trong-mang-2-150x150.png\" alt=\"[Thực hành] Đảo ngược các phần tử trong mảng\" width=\"150\" height=\"150\"></a><a href=\"https://codegym.vn/blog/2020/04/15/thuc-hanh-dao-nguoc-cac-phan-tu-trong-mang/\" class=\"wp_rp_title\">[Thực hành] Đảo ngược các phần tử trong mảng</a></li><li data-position=\"1\" data-poid=\"in-8697\" data-post-type=\"none\"><a href=\"https://codegym.vn/blog/2019/01/18/hoc-lap-trinh-php-can-ban-phan-11/\" class=\"wp_rp_thumbnail\"><noscript><img src=\"https://codegym.vn/wp-content/uploads/2019/01/hoc-lap-trinh-php-can-ban-phan-11-1-150x150.jpg\" alt=\"Học lập trình PHP căn bản phần 11\" width=\"150\" height=\"150\" /></noscript><img class=\"lazyload\" src=\"data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20150%20150%22%3E%3C/svg%3E\" data-src=\"https://codegym.vn/wp-content/uploads/2019/01/hoc-lap-trinh-php-can-ban-phan-11-1-150x150.jpg\" alt=\"Học lập trình PHP căn bản phần 11\" width=\"150\" height=\"150\"></a><a href=\"https://codegym.vn/blog/2019/01/18/hoc-lap-trinh-php-can-ban-phan-11/\" class=\"wp_rp_title\">Học lập trình PHP căn bản phần 11</a></li><li data-position=\"2\" data-poid=\"in-4290\" data-post-type=\"none\"><a href=\"https://codegym.vn/blog/2018/05/06/hoc-lap-trinh-can-bao-nhieu-thoi-gian/\" class=\"wp_rp_thumbnail\"><noscript><img src=\"https://codegym.vn/wp-content/uploads/2018/07/Time-clock-150x150.jpg\" alt=\"Học lập trình cần bao nhiêu thời gian?\" width=\"150\" height=\"150\" /></noscript><img class=\"lazyload\" src=\"data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20150%20150%22%3E%3C/svg%3E\" data-src=\"https://codegym.vn/wp-content/uploads/2018/07/Time-clock-150x150.jpg\" alt=\"Học lập trình cần bao nhiêu thời gian?\" width=\"150\" height=\"150\"></a><a href=\"https://codegym.vn/blog/2018/05/06/hoc-lap-trinh-can-bao-nhieu-thoi-gian/\" class=\"wp_rp_title\">Học lập trình cần bao nhiêu thời gian?</a></li><li data-position=\"3\" data-poid=\"in-23435\" data-post-type=\"none\"><a href=\"https://codegym.vn/blog/2020/04/15/trinh-tao-he-quan-tri-cua-laravel/\" class=\"wp_rp_thumbnail\"><noscript><img src=\"https://codegym.vn/wp-content/uploads/2020/04/trinh-tao-he-quan-tri-cua-laravel-5-150x150.jpg\" alt=\"Trình tạo hệ quản trị của Laravel\" width=\"150\" height=\"150\" /></noscript><img class=\"lazyload\" src=\"data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20150%20150%22%3E%3C/svg%3E\" data-src=\"https://codegym.vn/wp-content/uploads/2020/04/trinh-tao-he-quan-tri-cua-laravel-5-150x150.jpg\" alt=\"Trình tạo hệ quản trị của Laravel\" width=\"150\" height=\"150\"></a><a href=\"https://codegym.vn/blog/2020/04/15/trinh-tao-he-quan-tri-cua-laravel/\" class=\"wp_rp_title\">Trình tạo hệ quản trị của Laravel</a></li><li data-position=\"4\" data-poid=\"in-18313\" data-post-type=\"none\"><a href=\"https://codegym.vn/blog/2019/10/18/hoc-cong-nghe-thong-tin-hoc-nhung-gi-ban-da-biet/\" class=\"wp_rp_thumbnail\"><noscript><img src=\"https://codegym.vn/wp-content/uploads/2019/10/hoc-cong-nghe-thong-tin-hoc-nhung-gi-ban-da-biet-3-150x150.jpg\" alt=\"Học công nghệ thông tin học những gì? Bạn đã biết?\" width=\"150\" height=\"150\" /></noscript><img class=\"lazyload\" src=\"data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20150%20150%22%3E%3C/svg%3E\" data-src=\"https://codegym.vn/wp-content/uploads/2019/10/hoc-cong-nghe-thong-tin-hoc-nhung-gi-ban-da-biet-3-150x150.jpg\" alt=\"Học công nghệ thông tin học những gì? Bạn đã biết?\" width=\"150\" height=\"150\"></a><a href=\"https://codegym.vn/blog/2019/10/18/hoc-cong-nghe-thong-tin-hoc-nhung-gi-ban-da-biet/\" class=\"wp_rp_title\">Học công nghệ thông tin học những gì? Bạn đã biết?</a></li><li data-position=\"5\" data-poid=\"in-23460\" data-post-type=\"none\"><a href=\"https://codegym.vn/blog/2020/04/16/thuc-hanh-tim-gia-tri-lon-nhat-trong-mang/\" class=\"wp_rp_thumbnail\"><noscript><img src=\"https://codegym.vn/wp-content/uploads/2020/04/thuc-hanh-tim-gia-tri-lon-nhat-trong-mang-4-150x150.png\" alt=\"[Thực hành] Tìm giá trị lớn nhất trong mảng\" width=\"150\" height=\"150\" /></noscript><img class=\"lazyload\" src=\"data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20150%20150%22%3E%3C/svg%3E\" data-src=\"https://codegym.vn/wp-content/uploads/2020/04/thuc-hanh-tim-gia-tri-lon-nhat-trong-mang-4-150x150.png\" alt=\"[Thực hành] Tìm giá trị lớn nhất trong mảng\" width=\"150\" height=\"150\"></a><a href=\"https://codegym.vn/blog/2020/04/16/thuc-hanh-tim-gia-tri-lon-nhat-trong-mang/\" class=\"wp_rp_title\">[Thực hành] Tìm giá trị lớn nhất trong mảng</a></li></ul></div></div></div>', 'news5.jpg', 1, 3, 3, 1, 1, '2020-04-23 16:00:07', '2021-07-01 08:59:50'),
(6, 'Tản mạn 10 năm Google và những đổi thay đáng nhớ', 'Tản-mạn-10 năm-Google-và-những-đổi-thay-đáng-nhớ-102822.html', 'Nhân dịp kỷ niệm 10 năm Google IPO, hãy cùng nhìn lại những đóng góp của Google cho 1 thế giới thay đổi từng ngày quanh ta.', '<p>C&aacute;ch đ&acirc;y hơn 1 tuần l&agrave; cột mốc đ&aacute;nh dấu 10 năm&nbsp;<a href=\"https://genk.vn/google.htm\" target=\"_blank\">Google</a>&nbsp;ph&aacute;t h&agrave;nh cổ phiếu đại ch&uacute;ng lần đầu (IPO - 19/08/2004 - 19/08/2014 theo giờ Mỹ). Sinh ra trong bong b&oacute;ng dotcom, trưởng th&agrave;nh c&ugrave;ng với sự ph&aacute;t triển của Internet, Google dần trở th&agrave;nh một thế lực định h&igrave;nh cuộc sống c&ocirc;ng nghệ của ch&uacute;ng ta. Kỷ niệm 10 năm IPO, một dấu mốc quan trọng trong sự ph&aacute;t triển của g&atilde; khổng lồ t&igrave;m kiếm, h&atilde;y c&ugrave;ng hồi tưởng&nbsp;những đ&oacute;ng g&oacute;p quan trọng nhất của Google đối với nh&acirc;n loại n&oacute;i chung v&agrave; người d&ugrave;ng Việt Nam n&oacute;i ri&ecirc;ng.</p>\r\n\r\n<p><strong>1. Google Search: Cứu tinh của Internet</strong></p>\r\n\r\n<p>Năm 1999 l&agrave; năm đầu ti&ecirc;n t&ocirc;i biết thế n&agrave;o l&agrave; Internet. Ng&agrave;y ấy vật bất ly th&acirc;n mỗi khi ra cafe internet của t&ocirc;i l&agrave; 1 cuốn sổ tay ghi ch&eacute;p địa chỉ web. Mục giới thiệu địa chỉ web hay tr&ecirc;n b&aacute;o ch&iacute; c&ocirc;ng nghệ hồi ấy l&agrave; mục t&ocirc;i thường xuy&ecirc;n cập nhật nhất. Với 1 người c&ograve;n rất bỡ ngỡ với Internet, việc t&igrave;m đ&uacute;ng thứ m&igrave;nh cần giữa 1 biển th&ocirc;ng tin m&ecirc;nh m&ocirc;ng quả thực qu&aacute; kh&oacute; khăn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Tản mạn 10 năm Google và những đổi thay đáng nhớ\" src=\"https://genk.mediacdn.vn/2014/yahoo-1408503871236.jpg\" /></p>\r\n\r\n<p>C&aacute;c danh bạ web kiểu n&agrave;y l&agrave; &quot;kim chỉ nam&quot; của Internet những năm 90.</p>\r\n\r\n<p>C&oacute; lần muốn t&igrave;m 1 b&agrave;i viết hướng dẫn về Autocad, t&ocirc;i phải lần m&ograve; tr&ecirc;n Yahoo! Directory, t&igrave;m v&agrave;o mục Architecture sau đ&oacute; l&ecirc; la khắp c&aacute;c site được lập chỉ mục để t&igrave;m thứ m&igrave;nh cần, to&aacute;t mồ h&ocirc;i h&agrave;ng tiếng vẫn kh&ocirc;ng t&igrave;m được thứ m&igrave;nh cần.</p>\r\n\r\n<p>L&uacute;c ấy, mạng Internet với t&ocirc;i hầu như chỉ l&agrave; chat chit tr&ecirc;n Yahoo! Messenger v&agrave; 1 v&agrave;i diễn đ&agrave;n Việt Nam thuở sơ khai như VNN, TTVN... Quyển danh bạ web của t&ocirc;i cứ mỗi ng&agrave;y 1 chi ch&iacute;t th&ecirc;m đến nỗi dần dần t&igrave;m kiếm trong bản th&acirc;n quyển sổ đ&oacute; đ&atilde; l&agrave; 1 cực h&igrave;nh. Internet trở th&agrave;nh 1 thế giới xa lạ, b&iacute; ẩn v&agrave; th&ugrave; địch, nhất l&agrave; khi m&ograve; mẫm tr&ecirc;n mạng qu&aacute; l&acirc;u mấy lần khiến t&ocirc;i m&eacute;o mặt v&igrave; ho&aacute; đơn điện thoại.</p>\r\n\r\n<p>Mấy năm sau biết tới Yahoo! Search nhưng c&ocirc;ng cuộc t&igrave;m kiếm th&ocirc;ng tin tr&ecirc;n mạng của t&ocirc;i vẫn kh&ocirc;ng khả quan hơn v&igrave; kết quả t&igrave;m kiếm của Yahoo! Search l&uacute;c đ&oacute; thường tr&agrave;n ngập c&aacute;c li&ecirc;n kết r&aacute;c, quảng c&aacute;o với những kết quả hữu &iacute;ch thường ch&igrave;m ở tận đ&acirc;u. B&ecirc;n cạnh đ&oacute; kh&ocirc;ng hỗ trợ tiếng Việt n&ecirc;n Yahoo! Search ho&agrave;n to&agrave;n v&ocirc; dụng ở Việt Nam.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Google Search không chỉ cung cấp 1 nền tảng cho người dùng Internet định hướng trong biển thông tin mà còn giúp người kiến tạo nội dung nhận được tưởng thưởng cho công sức của mình.\" src=\"https://genk.mediacdn.vn/2014/google-search-1408503978533.jpg\" /></p>\r\n\r\n<p>Google Search kh&ocirc;ng chỉ cung cấp 1 nền tảng cho người d&ugrave;ng Internet định hướng trong biển th&ocirc;ng tin m&agrave; c&ograve;n gi&uacute;p người kiến tạo nội dung nhận được tưởng thưởng cho c&ocirc;ng sức của m&igrave;nh.</p>\r\n\r\n<p>Năm 2004 l&agrave; lần đầu ti&ecirc;n t&ocirc;i d&ugrave;ng thử Google Search sau khi c&ocirc;ng cụ n&agrave;y được &quot;Việt Nam ho&aacute;&quot;. Đến tận giờ t&ocirc;i vẫn nhớ cảm gi&aacute;c phấn kh&iacute;ch khi nh&igrave;n thấy c&aacute;c kết quả t&igrave;m kiếm &quot;g&atilde;i đ&uacute;ng chỗ ngứa&quot; trải ra ngay trước mắt. Sự ra đời của Google Search c&oacute; lẽ cũng giống như việc ph&aacute;t minh ra la b&agrave;n với người đi biển, n&oacute; thay đổi căn bản c&aacute;ch sử dụng Internet của con người, từ chỗ l&agrave; 1 c&ocirc;ng cụ th&ocirc;ng tin li&ecirc;n lạc, Internet trở th&agrave;nh 1 cuốn b&aacute;ch khoa to&agrave;n thư c&oacute; thể truy cập chỉ trong t&iacute;ch tắc. Kỷ nguy&ecirc;n hậu-PC đặt Google Search v&agrave;o t&uacute;i quần của từng người d&ugrave;ng th&ocirc;ng qua smartphone l&agrave;m thế giới đ&atilde; phẳng c&agrave;ng trở n&ecirc;n phẳng hơn.</p>\r\n\r\n<p>Trước Google Search, c&aacute;ch l&agrave;m nội dung của người d&ugrave;ng Internet Việt c&ograve;n kh&aacute; sơ khai. Chủ yếu l&agrave; t&igrave;m đủ mọi c&aacute;ch để l&ecirc;n c&aacute;c trang chỉ mục web lớn như Yahoo!, MSN... Google Search với thuật to&aacute;n xếp hạng kết quả t&igrave;m kiếm si&ecirc;u hạng khiến cả những website kh&ocirc;ng mấy t&ecirc;n tuổi cũng c&oacute; thể dễ d&agrave;ng l&ecirc;n đầu danh s&aacute;ch kết quả chỉ cần họ c&oacute; nội dung thực sự tốt. Ch&iacute;nh điều n&agrave;y đ&atilde; th&uacute;c đẩy người l&agrave;m nội dung đầu tư hơn gi&uacute;p Internet Việt Nam ph&aacute;t triển c&oacute; chiều s&acirc;u v&agrave; mang diện mạo như ng&agrave;y h&ocirc;m nay.</p>\r\n\r\n<p><strong>2. Android v&agrave; cuộc c&aacute;ch mạng phổ cập smartphone</strong></p>\r\n\r\n<p>Năm 2004 cũng l&agrave; lần đầu ti&ecirc;n t&ocirc;i d&ugrave;ng smartphone, hoặc n&oacute;i đ&uacute;ng hơn, l&agrave; tiền th&acirc;n của smartphone: chiếc HP iPAQ 5555 (V&acirc;ng, c&oacute; chữ i ở đầu nhưng l&agrave; kh&ocirc;ng phải đồ của Apple!). L&uacute;c ấy chiếc PDA to đ&ugrave;ng, nặng chịch, bị r&ograve; điện ở vỏ nh&ocirc;m v&agrave; c&oacute; m&agrave;n h&igrave;nh cảm ứng điện trở &quot;phập phồng&quot;, kh&ocirc;ng gọi được điện thoại b&aacute;n với gi&aacute; 6 triệu. 6 triệu đồng l&uacute;c đ&oacute; bằng 2 th&aacute;ng lương của 1 kỹ sư loại cứng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Trong suốt nhiều năm trời, smartphone luôn là sân chơi xa xỉ chỉ dành cho người dùng với hầu bao dư dả.\" src=\"https://genk.mediacdn.vn/2014/download-1-1408504087119.jpeg\" /></p>\r\n\r\n<p>Trong suốt nhiều năm trời, smartphone lu&ocirc;n l&agrave; s&acirc;n chơi xa xỉ chỉ d&agrave;nh cho người d&ugrave;ng với hầu bao dư dả.</p>\r\n\r\n<p>6 năm sau smartphone vẫn l&agrave; thứ xa xỉ phẩm, những thiết bị &quot;b&egrave;o&quot; nhất cũng được b&aacute;n với gi&aacute; 3-4 triệu đồng m&agrave; c&oacute; chất lượng ở mức hết sức xo&agrave;ng xĩnh. Nếu muốn c&oacute; 1 chiếc smartphone d&ugrave;ng được, người d&ugrave;ng buộc phải m&oacute;c t&uacute;i hơn chục triệu đồng, trong 6 năm trời cuộc chạy đua smartphone d&ugrave; rất quyết liệt với sự c&oacute; mặt của iPhone vẫn bỏ qu&ecirc;n ph&acirc;n kh&uacute;c gi&aacute; rẻ. Tua nhanh th&ecirc;m 3 năm nữa, hiện tại chỉ với&nbsp;<a href=\"https://genk.vn/di-dong/mua-khai-truong-lua-chon-smartphone-tam-gia-8-trieu-dong-cho-hoc-sinh-sinh-vien-20140812221754429.chn\" target=\"_blank\">dưới 3 triệu đồng ch&uacute;ng ta ho&agrave;n to&agrave;n c&oacute; thể t&igrave;m mua được 1 model kh&ocirc;ng đến nỗi n&agrave;o</a>. Chịu chi th&ecirc;m 1 ch&uacute;t với 5-7 triệu v&agrave; chấp nhận d&ugrave;ng đồ của c&aacute;c h&atilde;ng SX Trung Quốc ch&uacute;ng ta đ&atilde; c&oacute; trong tay 1 cỗ m&aacute;y đủ sức s&aacute;nh ngang với c&aacute;c sản phẩm tr&ecirc;n chục triệu. Trong 3 năm, người ta l&agrave;m được điều m&agrave; trước đ&oacute; mất 6 năm cũng kh&ocirc;ng c&oacute; ch&uacute;t tiến triển n&agrave;o: phổ cập smartphone cho cả người ti&ecirc;u d&ugrave;ng b&igrave;nh d&acirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Tản mạn 10 năm Google và những đổi thay đáng nhớ\" src=\"https://genk.mediacdn.vn/2014/images-2-1408504166300.jpeg\" /></p>\r\n\r\n<p>Một phần lớn c&ocirc;ng trạng của cuộc c&aacute;ch mạng gi&aacute; rẻ phải t&iacute;nh cho Android. Trước khi Android ra mắt, 1 h&atilde;ng sản xuất c&oacute; 2 lựa chọn: Mua HĐH của b&ecirc;n thứ 3 như c&aacute;ch m&agrave; HTC, Samsung từng l&agrave;m với Windows Mobile v&agrave; chịu những đ&ograve;i hỏi rất ngặt ngh&egrave;o từ ph&iacute;a cung cấp phần mềm. C&aacute;c h&atilde;ng cung cấp HĐH lớn như Microsoft, li&ecirc;n minh Symbian thường &quot;chọn bạn m&agrave; chơi&quot;, chỉ l&agrave;m việc với c&aacute;c h&atilde;ng sản xuất c&oacute; t&ecirc;n tuổi v&agrave; phớt lờ tất cả c&aacute;c xưởng sản xuất nhỏ lẻ, giới hạn s&acirc;n chơi trong 1 số &iacute;t c&aacute;c &ocirc;ng lớn.</p>\r\n\r\n<p>Lựa chọn thứ 2 l&agrave; tự đứng ra x&acirc;y dựng 1 HĐH của bản th&acirc;n m&igrave;nh. Để c&oacute; được 1 HĐH đủ sức hấp dẫn người d&ugrave;ng đ&ograve;i hỏi tiềm lực t&agrave;i ch&iacute;nh, kỹ thuật khổng lồ. H&atilde;y nh&igrave;n c&aacute;ch cả những &ocirc;ng lớn như&nbsp;<a href=\"https://genk.vn/dien-thoai/ai-da-giet-symbian-20110404083232684.chn\" target=\"_blank\">Nokia cũng ngậm ng&ugrave;i khai tử Symbian</a>&nbsp;rồi MeeGo, HP đi&ecirc;u đứng với WebOS, Samsung lặng lẽ ch&ocirc;n cất Bada v&agrave; ngay cả 1 &ocirc;ng lớn gi&agrave; dặn kinh nghiệm như Microsoft cũng chật vật với Windows Phone đủ hiểu việc tạo ra 1 HĐH đủ sức cạnh tranh tr&ecirc;n thị trường kh&oacute; khăn, tốn k&eacute;m như thế n&agrave;o.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Không có Android, những sản phẩm như thế này sẽ không \" src=\"https://genk.mediacdn.vn/2014/05-1407608483967-1408504209446.jpg\" /></p>\r\n\r\n<p>Kh&ocirc;ng c&oacute; Android, những sản phẩm như thế n&agrave;y sẽ kh&ocirc;ng thể ra đời.</p>\r\n\r\n<p>Nếu kh&ocirc;ng c&oacute; Android v&agrave; sự đ&agrave;i thọ của Google về mặt phần mềm, c&oacute; lẽ cuộc c&aacute;ch mạng phổ cập smartphone gi&aacute; rẻ sẽ kh&ocirc;ng b&ugrave;ng nổ. Thiếu Android c&oacute; thể c&aacute;c h&atilde;ng sản xuất Trung Quốc, lực lượng ch&iacute;nh g&oacute;p vai tr&ograve; k&eacute;o tụt mặt bằng gi&aacute; smartphone tr&ecirc;n to&agrave;n cầu,&nbsp;<a href=\"https://genk.vn/dien-thoai/vi-sao-smartphone-trung-quoc-gia-re-giat-minh-2011103109147902.chn\" target=\"_blank\">sẽ kh&ocirc;ng bao giờ sản xuất được 1 chiếc smartphone tử tế.</a></p>\r\n\r\n<p><strong>3. Gmail v&agrave; email nhanh hơn, dễ hơn, tiện lợi hơn</strong></p>\r\n\r\n<p>5 năm đầu sử dụng Internet, t&ocirc;i gắn b&oacute; với dịch vụ email duy nhất l&agrave; Yahoo! Mail, chủ yếu do t&ocirc;i cũng d&ugrave;ng Yahoo! Messenger. Cuối 2004, chật vật lắm t&ocirc;i mới t&igrave;m được 1 c&aacute;i Invitation để đăng k&yacute; Gmail. Thời gian đầu Google bắt phải c&oacute; thư mời của người đang sử dụng gmail th&igrave; mới tạo được t&agrave;i khoản Gmail, số lượng thư mời 1 người được gửi cũng rất giới hạn v&igrave; thế Gmail invitation trở th&agrave;nh &quot;h&agrave;ng hot&quot; được săn l&ugrave;ng quyết liệt tr&ecirc;n mạng.</p>\r\n\r\n<p>&nbsp;</p>', '1587720378_6067608_3cb83f18e6be8d9f7e611a4bc05d0628.jpg', 1, 2, 3, 1, 1, '2020-04-24 02:26:18', '2021-07-01 09:00:43'),
(7, 'Apple sẽ ra mắt cả AirPods 3, AirPods Pro 2 và AirPods X', 'apple-se-ra-mat-ca-3-airpods3-2626262.html', 'AirPods X sẽ là một chiếc tai nghe không dây hoàn toàn mới của Apple.', '<p>Sau khi th&agrave;nh c&ocirc;ng với những chiếc tai nghe AirPods v&agrave; chứng minh rằng true wireless sẽ l&agrave; xu hướng của tương lai, Apple sẽ tiếp tục n&acirc;ng cấp v&agrave; mở rộng d&ograve;ng phụ kiện n&agrave;y trong năm tới. Theo b&aacute;o c&aacute;o mới nhất của chuy&ecirc;n gia Ming-Chi Kuo, Apple c&oacute; thể sẽ ra mắt cả AirPods 3, AirPods Pro 2 v&agrave; AirPods X trong năm 2021.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://genk.mediacdn.vn/139269124445442048/2020/4/24/photo-1-15877135831861458714951.jpg\" target=\"_blank\"><img alt=\"Apple sẽ ra mắt cả AirPods 3, AirPods Pro 2 và AirPods X - Ảnh 1.\" src=\"https://genk.mediacdn.vn/thumb_w/660/139269124445442048/2020/4/24/photo-1-15877135831861458714951.jpg\" /></a></p>\r\n\r\n<p><strong>AirPods 3</strong></p>\r\n\r\n<p>B&aacute;o c&aacute;o của &ocirc;ng Ming-Chi Kuo cho biết rằng Apple sẽ khởi động năm 2021 với chiếc tai nghe AirPods thế hệ thứ 3. AirPods 3 sẽ giữ nguy&ecirc;n thiết kế giống như tai nghe AirPods trước đ&oacute;, với một số n&acirc;ng cấp như chip xử l&yacute; &acirc;m thanh mới.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://genk.mediacdn.vn/139269124445442048/2020/4/24/photo-1-15877136048142117880899.jpg\" target=\"_blank\"><img alt=\"Apple sẽ ra mắt cả AirPods 3, AirPods Pro 2 và AirPods X - Ảnh 2.\" src=\"https://genk.mediacdn.vn/thumb_w/660/139269124445442048/2020/4/24/photo-1-15877136048142117880899.jpg\" /></a></p>\r\n\r\n<p>AirPods 3 sẽ đ&oacute;ng vai tr&ograve; như một m&oacute;n phụ kiện phổ th&ocirc;ng, d&agrave;nh cho những người d&ugrave;ng kh&ocirc;ng cần qu&aacute; quan t&acirc;m đến t&iacute;nh năng loại bỏ tiếng ồn. Mức gi&aacute; của AirPods 3 cũng sẽ kh&ocirc;ng qu&aacute; cao.&nbsp;</p>\r\n\r\n<p><strong>AirPods Pro 2</strong></p>\r\n\r\n<p>Th&aacute;ng 10 năm ngo&aacute;i, Apple ra mắt AirPods Pro với thiết kế ho&agrave;n to&agrave;n mới dạng in-ear v&agrave; c&oacute; khả năng chống ồn, những t&iacute;nh năng kh&ocirc;ng được thấy tr&ecirc;n những chiếc tai nghe AirPods trước đ&oacute;. Sắp tới đ&acirc;y, Apple sẽ n&acirc;ng cấp AirPods Pro bằng c&aacute;ch cho ra mắt AirPods Pro 2.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://genk.mediacdn.vn/139269124445442048/2020/4/24/photo-1-1587713614769363381253.jpg\" target=\"_blank\"><img alt=\"Apple sẽ ra mắt cả AirPods 3, AirPods Pro 2 và AirPods X - Ảnh 3.\" src=\"https://genk.mediacdn.vn/thumb_w/660/139269124445442048/2020/4/24/photo-1-1587713614769363381253.jpg\" /></a></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/hodi/blog/public/upload/images/images/hero-lg-1650x665.png\" style=\"height:317px; width:799px\" /></p>\r\n\r\n<p>B&aacute;o c&aacute;o của &ocirc;ng Ming-Chi Kuo cho biết AirPods Pro 2 sẽ được ra mắt v&agrave;o khoảng th&aacute;ng 10 năm 2021. Chiếc tai nghe n&agrave;y vẫn sẽ giữ thiết kế in-ear v&agrave; cũng sẽ được n&acirc;ng cấp chip xử l&yacute; &acirc;m thanh. AirPods Pro 2 sẽ d&agrave;nh cho những người d&ugrave;ng quan t&acirc;m tới t&iacute;nh năng chống ồn.&nbsp;</p>\r\n\r\n<p><strong>AirPods X&nbsp;</strong></p>\r\n\r\n<p>Đ&acirc;y l&agrave; một chiếc AirPods ho&agrave;n to&agrave;n mới. M&agrave; theo một v&agrave;i nguồn tin r&ograve; rỉ, AirPods X sẽ l&agrave; một chiếc tai nghe kh&ocirc;ng d&acirc;y thể thao, c&oacute; thiết kế giống với Beat X. Về cơ bản, đ&acirc;y sẽ l&agrave; một chiếc tai nghe c&oacute; vẻ ngo&agrave;i giống Beat X v&agrave; b&ecirc;n trong giống AirPods Pro.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://genk.mediacdn.vn/139269124445442048/2020/4/24/photo-2-1587713606489124233078.jpg\" target=\"_blank\"><img alt=\"Apple sẽ ra mắt cả AirPods 3, AirPods Pro 2 và AirPods X - Ảnh 4.\" src=\"https://genk.mediacdn.vn/139269124445442048/2020/4/24/photo-2-1587713606489124233078.jpg\" /></a></p>\r\n\r\n<p>Điều đ&oacute; c&oacute; nghĩa l&agrave; AirPods X kh&ocirc;ng phải dạng tai nghe true wireless, thay v&agrave;o đ&oacute; vẫn c&oacute; d&acirc;y nối giữa hai b&ecirc;n tai nghe, v&agrave; c&oacute; t&iacute;nh năng chống ồn của AirPods Pro.&nbsp;</p>\r\n\r\n<p>B&aacute;o c&aacute;o của &ocirc;ng Ming-Chi Kuo nhận định rằng chiếc tai nghe n&agrave;y sẽ c&oacute; gi&aacute; trong khoảng 200 USD, v&agrave; sẽ được ra mắt v&agrave;o khoảng th&aacute;ng 9 th&aacute;ng 10 năm 2021.</p>\r\n\r\n<p>Ngo&agrave;i ra c&ograve;n c&oacute; một b&aacute;o c&aacute;o kh&aacute;c tiết lộ rằng Apple đang ph&aacute;t triển một chiếc tai nghe over-ear c&oacute; chất lượng cao, sử dụng trong studio với những c&ocirc;ng việc chuy&ecirc;n nghiệp. Tuy nhi&ecirc;n chưa c&oacute; nhiều th&ocirc;ng tin về chiếc tai nghe over-ear n&agrave;y của Apple.&nbsp;</p>', '1587720727_4501304_9a52fe7764c686c8d4b6034a29f21924.jpg', 1, 7, 3, 1, 1, '2020-04-24 02:32:07', '2021-07-01 09:01:13'),
(8, 'Giám đốc cấp cao người Việt đầu tiên của Lazada tách ra lập startup hỗ trợ TMĐT, gọi vốn thành công 8 triệu USD giữa bão Covid', 'Giám-đốc-cấp-cao-người-Việt-đầu-tiên-của-Lazada-2283.html ', 'OnPoint - đơn vị cung cấp dịch vụ hỗ trợ phát triển TMĐT, vừa gọi vốn thành công 8 triệu USD series A từ quỹ đầu tư Kiwoom và DAIWA-SSIAM Vietnam Growth Fund II LP. Đồng sáng lập kiêm CEO OnPoint là ông Trần Vũ Quang - Giám đốc thương mại (CCO) người Việt đầu tiên tại Lazada, người đã xóa bỏ rào cản \"chỉ người nước ngoài mới có thể nắm giữ những vị trí chủ chốt tại doanh nghiệp này\".', '<p>OnPoint, nh&agrave; cung cấp dịch vụ hỗ trợ ph&aacute;t triển&nbsp;<a href=\"https://cafebiz.vn/thuong-mai-dien-tu.html\" target=\"_blank\">thương mại điện tử</a>&nbsp;(E-commerce Enabler) h&agrave;ng đầu Việt Nam vừa gọi vốn th&agrave;nh c&ocirc;ng số tiền l&ecirc;n đến 8 triệu USD tại v&ograve;ng Series A. Chủ tr&igrave; v&ograve;ng gọi vốn series A l&agrave; quỹ đầu tư Kiwoom v&agrave; DAIWA-SSIAM Vietnam Growth Fund II LP.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; một trong những v&ograve;ng gọi vốn Series A lớn nhất tại Việt Nam trong thời gian gần đ&acirc;y, trong bối cảnh c&aacute;c hoạt động kinh tế tr&ecirc;n to&agrave;n cầu đang bị ảnh hưởng nặng nề bởi dịch bệnh&nbsp;<a href=\"https://cafebiz.vn/covid-19.html\" target=\"_blank\">COVID-19</a>.</p>\r\n\r\n<p>Khoản t&agrave;i trợ mới n&agrave;y đ&atilde; n&acirc;ng tổng số vốn OnPoint huy động th&agrave;nh c&ocirc;ng l&ecirc;n 8 con số, hỗ trợ v&agrave; th&uacute;c đẩy c&ocirc;ng ty đầu tư ph&aacute;t triển c&aacute;c c&ocirc;ng nghệ mang t&iacute;nh chiến lược, tuyển dụng th&ecirc;m nh&acirc;n t&agrave;i, v&agrave; ph&aacute;t triển năng lực ph&acirc;n t&iacute;ch dữ liệu nhằm cung cấp dịch vụ tốt hơn cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&quot;Ch&uacute;ng t&ocirc;i kỳ vọng OnPoint trở th&agrave;nh nh&agrave; cung cấp dịch vụ hỗ trợ thương mại điện tử số 1 tại Đ&ocirc;ng Nam &Aacute;&quot; - CEO OnPoint Trần Vũ Quang</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Được th&agrave;nh lập v&agrave;o th&aacute;ng 12 năm 2017, OnPoint hiện l&agrave; đơn vị dẫn đầu thị trường tại Việt Nam trong lĩnh vực cung cấp dịch vụ hỗ trợ ph&aacute;t triển thương mại điện tử (TMĐT). C&ocirc;ng ty cung cấp giải ph&aacute;p dịch vụ trọn g&oacute;i (one-stop solution) cho ph&eacute;p c&aacute;c thương hiệu đẩy mạnh sự hiện diện tr&ecirc;n c&aacute;c nền tảng TMĐT, mạng x&atilde; hội hoặc th&ocirc;ng qua trang web b&aacute;n h&agrave;ng ri&ecirc;ng của c&aacute;c thương hiệu đ&oacute;, từ đ&oacute; tăng nhanh doanh số b&aacute;n h&agrave;ng trực tuyến.</p>\r\n\r\n<p><em>&quot;Ch&uacute;ng t&ocirc;i nhận ra rằng bối cảnh thương mại điện tử ở Việt Nam đang ph&aacute;t triển cực kỳ nhanh v&agrave; mạnh mỗi ng&agrave;y. Do đ&oacute;, ch&uacute;ng t&ocirc;i hiểu sứ mệnh của m&igrave;nh ch&iacute;nh l&agrave; th&uacute;c đẩy c&aacute;c thương hiệu ti&ecirc;u d&ugrave;ng ph&aacute;t triển, kh&ocirc;ng chỉ dừng ở việc điều hướng m&agrave; c&ograve;n x&uacute;c tiến ph&aacute;t triển lớn mạnh trong hệ sinh th&aacute;i đầy biến động n&agrave;y. Ch&uacute;ng t&ocirc;i thấy m&igrave;nh kh&ocirc;ng chỉ l&agrave; một nh&aacute;nh mở rộng trong việc tạo ra nhu cầu v&agrave; đ&aacute;p ứng nhu cầu trực tuyến, m&agrave; c&ograve;n l&agrave; đối t&aacute;c chiến lược cho c&aacute;c thương hiệu gi&uacute;p tạo thuận lợi cho nhiều tương t&aacute;c của họ với cư d&acirc;n mạng</em>&quot;, &ocirc;ng Trần Vũ Quang, Nh&agrave; s&aacute;ng lập v&agrave; Tổng Gi&aacute;m đốc OnPoint cho biết.</p>\r\n\r\n<p>&quot;<em>Ch&uacute;ng t&ocirc;i kỳ vọng OnPoint trở th&agrave;nh nh&agrave; cung cấp dịch vụ hỗ trợ thương mại điện tử số 1 tại Đ&ocirc;ng Nam &Aacute;, cung cấp c&aacute;c giải ph&aacute;p vượt trội gi&uacute;p c&aacute;c thương hiệu nắm bắt cơ hội tăng trưởng đ&uacute;ng l&uacute;c, theo c&aacute;ch bền vững hơn&quot;</em>, &ocirc;ng Quang ph&aacute;t biểu th&ecirc;m.</p>\r\n\r\n<p>Đứng sau th&agrave;nh c&ocirc;ng của OnPoint ch&iacute;nh l&agrave; đội ngũ c&aacute;c nh&agrave; s&aacute;ng lập v&agrave; quản l&yacute; xuất sắc, c&ugrave;ng với sự kết hợp độc đ&aacute;o giữa kinh nghiệm ở mảng b&aacute;n lẻ, thương mại điện tử, quản l&yacute; thương hiệu v&agrave; tư vấn quản trị. Hai nh&agrave; đồng s&aacute;ng lập Trần Vũ Quang v&agrave; L&ecirc; Xu&acirc;n Long, đều đ&atilde; từng đảm nhiệm vị tr&iacute; Gi&aacute;m đốc điều h&agrave;nh cấp cao tại Lazada v&agrave; từng l&agrave;m việc tại h&atilde;ng tư vấn McKinsey.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Giám đốc cấp cao người Việt đầu tiên của Lazada tách ra lập startup hỗ trợ TMĐT, gọi vốn thành công 8 triệu USD giữa bão Covid - Ảnh 2.\" src=\"https://cafebiz.cafebizcdn.vn/thumb_w/640/162123310254002176/2020/4/24/-15877176296951359645610.jpg\" /></p>\r\n\r\n<p>&Ocirc;ng Quang từng l&agrave; người Việt đầu ti&ecirc;n giữ cương vị Gi&aacute;m đốc thương mại (CCO) tại Lazada, người đ&atilde; x&oacute;a bỏ r&agrave;o cản &quot;chỉ người nước ngo&agrave;i mới c&oacute; thể nắm giữ những vị tr&iacute; chủ chốt tại &lsquo;&ocirc;ng lớn&rsquo; n&agrave;y&quot;.</p>\r\n\r\n<p>Đồng h&agrave;nh c&ugrave;ng họ trong Hội đồng quản trị l&agrave; những l&atilde;nh đạo với h&agrave;ng chục năm kinh nghiệm quản l&yacute; cấp cao tại c&aacute;c tập đo&agrave;n lớn của thế giới trong mảng h&agrave;ng ti&ecirc;u d&ugrave;ng nhanh. C&aacute;c th&agrave;nh vi&ecirc;n của Ban Gi&aacute;m đốc đều c&oacute; kinh nghiệm đảm tr&aacute;ch những vị tr&iacute; quan trọng tại c&aacute;c s&agrave;n thương mại điện tử lớn như Lazada, Shopee, Tiki v&agrave; Lotte.</p>\r\n\r\n<p>KPMG Việt Nam l&agrave; đơn vị tư vấn cho thương vụ n&agrave;y, trong đ&oacute; nh&oacute;m tư vấn bao gồm &ocirc;ng Đinh Thế Anh v&agrave; &ocirc;ng Nguyễn Hữu To&agrave;n, cố vấn b&ecirc;n b&aacute;n. Đảm nhận vị tr&iacute; tư vấn ph&aacute;p l&yacute; ch&iacute;nh l&agrave; hai c&ocirc;ng ty lớn Allen &amp; Gledhill v&agrave; Allens.</p>\r\n\r\n<p>Năm 2019, OnPoint đ&atilde; cung cấp dịch vụ cho hơn 50 thương hiệu. C&ugrave;ng với mục ti&ecirc;u th&uacute;c đẩy tăng trưởng doanh thu v&agrave;o năm 2020, OnPoint dự kiến sẽ mở rộng danh mục kh&aacute;ch h&agrave;ng l&ecirc;n đến hơn 100 thương hiệu.</p>\r\n\r\n<p>Theo b&aacute;o c&aacute;o E-conomy SEA 2019 của Google, Temasek Holdings v&agrave; Bain, Việt Nam hiện l&agrave; một trong hai quốc gia ở Đ&ocirc;ng Nam &Aacute; c&ugrave;ng với Indonesia, c&oacute; nền kinh tế internet tăng trưởng hơn 40% một năm.</p>\r\n\r\n<p><a href=\"https://cafebiz.vn/su-kien/439-giam-dau-kinh-te.chn\" target=\"_blank\"><img alt=\"Giám đốc cấp cao người Việt đầu tiên của Lazada tách ra lập startup hỗ trợ TMĐT, gọi vốn thành công 8 triệu USD giữa bão Covid - Ảnh 3.\" src=\"https://cafebiz.cafebizcdn.vn/162123310254002176/2020/4/1/banner-1585729005289715925400.jpg\" /></a></p>', '1587722776_3642764_d27b115de43310095a6b959fb37c3140.jpg', 1, 8, 3, 1, 1, '2020-04-24 03:06:16', '2021-07-01 09:02:11'),
(9, 'Kế hoạch ‘không tưởng’ của Bill Gates: Sản xuất vắc-xin phòng Covid-19 cho toàn bộ 7 tỷ người trên Trái Đất!', 'ke-hoach-khong-tuong-cua-bill-gates-2733.html', 'Nếu vắc-xin phòng Covid-19 ra lò từ 12-18 tháng tới, đây sẽ là loại vắc-xin được phát triển nhanh nhất trong lịch sử loài người.', '<p>Ng&agrave;y 15/4 vừa qua, quỹ Bill &amp; Melinda Gates đ&atilde; k&ecirc;u gọi hợp t&aacute;c to&agrave;n cầu để sẵn s&agrave;ng c&oacute; vắc-xin Covid-19 cho hơn 7 tỷ người &ndash; d&acirc;n số to&agrave;n thế giới đồng thời tuy&ecirc;n bố chi th&ecirc;m 150 triệu USD cho việc nghi&ecirc;n cứu c&aacute;c phương ph&aacute;p điều trị, qua đ&oacute;, n&acirc;ng tổng số tiền m&agrave; tổ chức từ thiện n&agrave;y cam kết để hỗ trợ c&ocirc;ng t&aacute;c ph&ograve;ng chống đại dịch l&ecirc;n 250 triệu USD. B&ecirc;n cạnh đ&oacute;, tỷ ph&uacute; Bill Gates c&ograve;n cam kết đầu tư h&agrave;ng tỷ USD để x&acirc;y dựng 7 nh&agrave; m&aacute;y để t&igrave;m ra vắc-xin ph&ograve;ng bệnh sớm nhất c&oacute; thể.</p>\r\n\r\n<p>Mark Suzman, gi&aacute;m đốc điều h&agrave;nh của tổ chức cho biết d&ugrave; c&oacute; thể mất tới 18 th&aacute;ng để ph&aacute;t triển v&agrave; thử nghiệm đầy đủ vắc-xin Covid-19 an to&agrave;n, c&aacute;c nh&agrave; chức tr&aacute;ch v&agrave; doanh nghiệp to&agrave;n cầu cần bắt đầu kế hoạch sản xuất ngay từ b&acirc;y giờ.</p>\r\n\r\n<p>&Ocirc;ng chia sẻ: &quot;Việc sản xuất h&agrave;ng trăm triệu liều vắc-xin l&agrave; rất b&igrave;nh thường. Khi phải đối ph&oacute; với mầm bệnh mới như Covid-19 v&agrave; t&igrave;m ra loại vắc-xin hiệu quả, ch&uacute;ng ta sẽ cần h&agrave;ng tỷ liều như vậy. C&oacute; hơn 7 tỷ người tr&ecirc;n Tr&aacute;i Đất v&agrave; ai cũng cần được ti&ecirc;m vắc-xin Covid-19. Tuy nhi&ecirc;n năng lực sản xuất hiện tại chưa thể đ&aacute;p ứng nhu cầu đ&oacute;&quot;.</p>\r\n\r\n<p>Ngo&agrave;i ra, Suzman đ&atilde; c&ocirc;ng bố khoản hỗ trợ mới trị gi&aacute; 150 triệu USD của tổ chức, phần lớn l&agrave; để ph&aacute;t triển c&aacute;c x&eacute;t nghiệm chẩn đo&aacute;n Covid-19, phương ph&aacute;p điều trị v&agrave; điều chế vắc-xin. Một phần trong số tiền n&agrave;y được sử dụng để trợ gi&uacute;p c&aacute;c quốc gia c&oacute; thu nhập thấp ở Nam &Aacute; v&agrave; ch&acirc;u Phi &ndash; những nơi đang rất thiếu thốn trang thiết bị v&agrave; hạ tầng y tế để chống lại dịch Covid-19.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, trọng t&acirc;m ch&iacute;nh của quỹ Bill &amp; Melinda Gates vẫn l&agrave; chuẩn bị cho sự ra đời của loại vắc-xin c&oacute; thể ngăn chặn virus corona một c&aacute;ch hiệu quả. Theo Suzman, khoảng 100 loại vắc-xin tiềm năng đang được ph&aacute;t triển v&agrave; thử nghiệm bởi c&aacute;c nh&agrave; khoa học tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p>D&ugrave; vậy, c&oacute; một thực tế l&agrave; một số loại c&oacute; thể tiềm năng trong những thử nghiệm nhỏ ban đầu nhưng hầu hết lại thất bại trong thử nghiệm lớn hơn.</p>\r\n\r\n<p>Suzman n&oacute;i: &quot;Khi vắc-xin được ph&aacute;t triển th&agrave;nh c&ocirc;ng, n&oacute; phải c&oacute; sẵn cho hơn 7 tỷ người. Cần phải kiểm tra nếu c&oacute; t&aacute;c dụng phụ kh&ocirc;ng mong muốn với nhiều nh&oacute;m đối tượng bao gồm cả phụ nữ mang thai, người gi&agrave; v&agrave; trẻ nhỏ&quot;.</p>\r\n\r\n<p>Nhưng ngay cả khi những thử nghiệm đ&oacute; diễn ra, &ocirc;ng n&oacute;i rằng vẫn cần c&oacute; một nh&oacute;m c&aacute;c chuy&ecirc;n gia, quốc gia v&agrave; c&ocirc;ng ty quốc tế biết về loại vắc-xin hứa hẹn th&agrave;nh c&ocirc;ng cao nhất v&agrave; chuẩn bị để sản xuất ch&uacute;ng từ trước.</p>\r\n\r\n<p>Theo &ocirc;ng, Trung Quốc, Mỹ v&agrave; WHO cần tham gia t&iacute;ch cực v&agrave;o nỗ lực chung n&agrave;y. Về việc Mỹ gần đ&acirc;y tuy&ecirc;n bố cắt viện trợ cho WHO, Suzman b&agrave;y tỏ quan điểm: &quot;R&otilde; r&agrave;ng đối với ch&uacute;ng t&ocirc;i, WHO l&agrave; một đối t&aacute;c đ&aacute;ng tin cậy&quot;. Được biết, quỹ Bill &amp; Melinda Gates l&agrave; nguồn t&agrave;i trợ lớn thứ hai của WHO sau Mỹ.</p>\r\n\r\n<p>C&ugrave;ng ng&agrave;y 15/4, một ủy vi&ecirc;n Ủy ban ch&acirc;u &Acirc;u đ&atilde; đề nghị tổ chức một cuộc hội nghị diễn ra v&agrave;o ng&agrave;y 4/5 tới để k&ecirc;u gọi t&agrave;i trợ cho việc tạo ra v&agrave; triển khai vắc-xin to&agrave;n cầu.</p>\r\n\r\n<p>Suzman cho biết quỹ của tỷ ph&uacute; Bill Gates c&oacute; l&yacute; do để tin rằng một hoặc nhiều loại vắc-xin hiệu quả c&oacute; thể &quot;ra l&ograve;&quot; trong v&ograve;ng 12 th&aacute;ng đến 18 th&aacute;ng tới. Nếu điều đ&oacute; xảy ra, đ&acirc;y sẽ l&agrave; loại vắc-xin được ph&aacute;t triển nhanh nhất trong lịch sử lo&agrave;i người.</p>\r\n\r\n<p>Theo vị gi&aacute;m đốc, việc sản xuất tr&ecirc;n quy m&ocirc; to&agrave;n cầu sẽ ti&ecirc;u tốn v&agrave;i tỷ USD. Mỗi loại vắc-xin được ph&ecirc; duyệt cuối c&ugrave;ng sẽ đ&ograve;i hỏi quy tr&igrave;nh sản xuất ri&ecirc;ng v&agrave; nếu kh&ocirc;ng bắt đầu chuẩn bị từ trước, ch&uacute;ng ta sẽ mất rất nhiều thời gian.</p>', '1587723528_4105243_ad0debf1f53a1c3a14d30b7235573f30.jpg', 1, 5, 3, 1, 1, '2020-04-24 03:18:48', '2021-07-01 09:02:43'),
(10, 'Việt Nam chủ động tham gia hợp tác vì quyền con người', 'viet-nam-chu-dong-tham-gia-hop-tac-162622.html', 'Kỷ niệm 70 năm Ngày Nhân quyền thế giới, Việt Nam chủ động tham gia hợp tác vì quyền con người', '<p>Với chủ trương &quot;sẵn s&agrave;ng l&agrave; bạn, l&agrave; đối t&aacute;c tin cậy của c&aacute;c nước trong cộng đồng quốc tế, phấn đấu v&igrave; h&ograve;a b&igrave;nh, độc lập, hợp t&aacute;c v&agrave; ph&aacute;t triển&rdquo;, Việt Nam đ&atilde; tăng cường đối thoại, mở rộng giao lưu v&agrave; hợp t&aacute;c quốc tế, tr&ecirc;n cơ sở b&igrave;nh đẳng, x&acirc;y dựng, t&ocirc;n trọng v&agrave; hiểu biết lẫn nhau.&nbsp;Tr&ecirc;n tinh thần đ&oacute;, Việt Nam đ&atilde; chủ động tham gia v&agrave;o nhiều lĩnh vực hợp t&aacute;c, trong đ&oacute; c&oacute; hợp t&aacute;c về quyền con người, tr&ecirc;n c&aacute;c diễn đ&agrave;n đa phương cũng như trong khu&ocirc;n khổ quan hệ song phương, khẳng định cam kết, quyết t&acirc;m v&agrave; tr&aacute;ch nhiệm của Việt Nam trong việc bảo đảm thực thi quyền con người.</p>\r\n\r\n<p>Thực hiện tốt nghĩa vụ quốc tế</p>\r\n\r\n<p>Theo B&aacute;o c&aacute;o quốc gia của Việt Nam về việc thực hiện quyền con người theo cơ chế kiểm điểm định kỳ phổ cập (UPR) của Hội đồng Nh&acirc;n quyền Li&ecirc;n hợp quốc m&agrave; Việt Nam l&agrave; th&agrave;nh vi&ecirc;n, Việt Nam đ&atilde; nộp v&agrave; tr&igrave;nh b&agrave;y một số B&aacute;o c&aacute;o quốc gia về thực hiện c&aacute;c C&ocirc;ng ước: X&oacute;a bỏ mọi h&igrave;nh thức Ph&acirc;n biệt chủng tộc (ICERD) giai đoạn 2000-2009; Quyền của Trẻ em (CRC) giai đoạn 2008-2011; X&oacute;a bỏ c&aacute;c h&igrave;nh thức ph&acirc;n biệt đối xử với phụ nữ (CEDAW)&hellip;</p>\r\n\r\n<p>Việt Nam đang t&iacute;ch cực triển khai x&acirc;y dựng B&aacute;o c&aacute;o quốc gia thực thi C&ocirc;ng ước quốc tế về c&aacute;c Quyền d&acirc;n sự, ch&iacute;nh trị (ICCPR). Về cơ bản, Việt Nam ho&agrave;n th&agrave;nh tốt nghĩa vụ b&aacute;o c&aacute;o đối với c&aacute;c c&ocirc;ng ước m&agrave; Việt Nam l&agrave; th&agrave;nh vi&ecirc;n.</p>\r\n\r\n<p>Trong lộ tr&igrave;nh thực thi c&aacute;c c&ocirc;ng ước quốc tế về nh&acirc;n quyền, Việt Nam đ&atilde; tiến h&agrave;nh r&agrave; so&aacute;t c&aacute;c quy định của luật ph&aacute;p quốc gia về c&aacute;c quyền d&acirc;n sự, ch&iacute;nh trị. Kết quả r&agrave; so&aacute;t được tiến h&agrave;nh ở khoảng 80% c&aacute;c cơ quan Trung ương v&agrave; địa phương cho thấy: c&aacute;c quyền d&acirc;n sự, ch&iacute;nh trị được n&ecirc;u trong c&aacute;c c&ocirc;ng ước quốc tế m&agrave; Việt Nam l&agrave; th&agrave;nh vi&ecirc;n đ&atilde; được thể hiện xuy&ecirc;n suốt, thống nhất trong Hiến ph&aacute;p v&agrave; được thể hiện tại nhiều văn bản luật quan trọng.</p>\r\n\r\n<p>Nguy&ecirc;n tắc b&igrave;nh đẳng, kh&ocirc;ng ph&acirc;n biệt đối xử l&agrave; nền tảng xuy&ecirc;n suốt c&aacute;c văn bản ph&aacute;p luật Việt Nam, tạo tiền đề cho việc đảm bảo v&agrave; ph&aacute;t huy c&aacute;c quyền của người d&acirc;n tr&ecirc;n từng lĩnh vực cụ thể. Thời gian tới, Việt Nam tiếp tục r&agrave; so&aacute;t c&aacute;c quy định của ph&aacute;p luật quốc gia về c&aacute;c quyền kinh tế, văn h&oacute;a, x&atilde; hội v&agrave; quyền của c&aacute;c nh&oacute;m dễ bị tổn thương.</p>\r\n\r\n<p>Gần đ&acirc;y, trả lời phỏng vấn của ph&oacute;ng vi&ecirc;n TTXVN, b&agrave; Pratibha Mehta, Điều phối vi&ecirc;n Li&ecirc;n hợp quốc tại Việt Nam cho biết: Trong những năm vừa qua, Ch&iacute;nh phủ Việt Nam đ&atilde; tăng cường tham gia v&agrave;o c&aacute;c cơ chế nh&acirc;n quyền quốc tế, c&aacute;c cơ chế n&agrave;y nhằm gi&aacute;m s&aacute;t c&aacute;c trường hợp li&ecirc;n quan đến nh&acirc;n quyền tr&ecirc;n khắp thế giới, bao gồm cả sự ph&ugrave; hợp của c&aacute;c Ch&iacute;nh phủ với c&aacute;c hiệp ước cốt l&otilde;i về nh&acirc;n quyền.&nbsp;</p>\r\n\r\n<p>Việt Nam đ&atilde; được chấp nhận bởi 93 trong tổng số 123 khuyến nghị được thực hiện bởi c&aacute;c nước kh&aacute;c về việc cải thiện t&igrave;nh trạng nh&acirc;n quyền. Việt Nam đ&atilde; kh&ocirc;ng ngừng cải thiện hệ thống ph&aacute;p luật v&agrave; tư ph&aacute;p, x&acirc;y dựng một nh&agrave; nước ph&aacute;p quyền, tăng cường c&aacute;c thể chế quốc gia bảo vệ quyền con người; ngo&agrave;i ra c&ograve;n c&oacute; một số diễn biến t&iacute;ch cực gần đ&acirc;y như chủ động tham khảo &yacute; kiến về dự thảo luật với c&aacute;c b&ecirc;n li&ecirc;n quan...</p>\r\n\r\n<p>Việt Nam cũng đ&atilde; t&iacute;ch cực đối thoại, hợp t&aacute;c với c&aacute;c cơ chế của Li&ecirc;n hợp quốc về nh&acirc;n quyền, thực hiện c&aacute;c khuyến nghị theo cơ chế kiểm điểm định kỳ phổ cập. Thời gian qua, Việt Nam đ&atilde; đ&oacute;n một số b&aacute;o c&aacute;o vi&ecirc;n đặc biệt của Hội đồng Nh&acirc;n quyền (về c&aacute;c vấn đề người thiểu số, đ&oacute;i ngh&egrave;o c&ugrave;ng cực v&agrave; nh&acirc;n quyền, t&aacute;c động của nợ nước ngo&agrave;i đối với nh&acirc;n quyền...) đến t&igrave;m hiểu t&igrave;nh h&igrave;nh thực tế tại c&aacute;c địa phương.&nbsp;</p>\r\n\r\n<p>Qua khảo s&aacute;t thực tế, c&aacute;c b&aacute;o c&aacute;o vi&ecirc;n đặc biệt đều đ&aacute;nh gi&aacute; cao tinh thần hợp t&aacute;c, quyết t&acirc;m ch&iacute;nh trị, c&aacute;c ch&iacute;nh s&aacute;ch v&agrave; biện ph&aacute;p m&agrave; Việt Nam thực hiện, đồng thời chỉ ra c&aacute;c th&aacute;ch thức Việt Nam cần giải quyết nhằm đảm bảo tốt hơn c&aacute;c quyền con người.</p>', '1588135264_1437699_930536a15987024cb5dbeb60b07c1468.jpg', 1, 2, 3, 1, 1, '2020-04-28 21:41:04', '2021-07-01 09:03:06');
INSERT INTO `blog` (`id`, `title`, `slug`, `summary`, `content`, `images`, `highlight`, `views`, `id_type`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Ra mắt toà S4.01 - ‘tâm điểm ánh sáng’ của Vinhomes Smart City', 'Ra-mắt-toà-S4.01-tam-diem-cua-vinhome-smart-city-2262.html ', 'Ngày 29/4/2020 Vinhomes ra mắt tòa S4.01 thuộc phân khu Sapphire Parkville- Vinhomes Smart City. Được ví như tâm điểm ánh sáng của phân khu xanh Sapphire Parkville, tòa tháp S4.01 “chiếm trọn spotlight” với tầm nhìn khoáng đạt, vị trí đắc địa.', '<p>To&agrave; căn hộ S4.01 nổi bật nhờ sở hữu vị tr&iacute; trung t&acirc;m của ph&acirc;n khu Sapphire Parkville - t&acirc;m điểm xanh của to&agrave;n dự &aacute;n Vinhomes Smart City. Từ ban c&ocirc;ng căn hộ S4.01, cư d&acirc;n vừa c&oacute; thể bao qu&aacute;t c&ocirc;ng vi&ecirc;n nội khu lại vừa c&oacute; thể ph&oacute;ng tầm nh&igrave;n ra c&ocirc;ng vi&ecirc;n trung t&acirc;m Central Park. Vị tr&iacute; n&agrave;y cũng gi&uacute;p kết nối trực tiếp ra tuyến đường huyết mạch L&ecirc; Trọng Tấn th&ocirc;ng qua cầu &Aacute;nh s&aacute;ng rực rỡ sắc m&agrave;u.&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><a href=\"https://vnn-imgs-f.vgcloud.vn/2020/04/29/09/1-1.jpg\"><img alt=\"Ra mắt toà S4.01 - ‘tâm điểm ánh sáng’ của Vinhomes Smart City\" src=\"https://vnn-imgs-f.vgcloud.vn/2020/04/29/09/1-1.jpg\" /></a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;S4.01 sở hữu vị đắc địa bậc nhất giữa trung t&acirc;m dự &aacute;n Vinhomes Smart City</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>To&agrave; căn hộ S4.01 mang đến cho kh&aacute;ch h&agrave;ng đa dạng lựa chọn với 6 loại căn hộ: Studio, 1 ph&ograve;ng ngủ (PN), 1PN+1, 2PN, 2PN+1 v&agrave; 3PN c&oacute; diện t&iacute;ch tim tường từ 28 m2 đến 103 m2.</p>\r\n\r\n<p>C&aacute;c căn hộ studio 1 ph&ograve;ng ngủ c&oacute; gi&aacute; chỉ từ 998 triệu đồng - ph&ugrave; hợp với kh&aacute;ch h&agrave;ng trẻ độc th&acirc;n hoặc c&aacute;c cặp vợ chồng trẻ. Chỉ cần 10% gi&aacute; trị, tương đương với 99 triệu đồng, cơ hội sở hữu căn hộ đ&atilde; nằm trọn trong tầm tay kh&aacute;ch h&agrave;ng. Nằm ở t&acirc;m điểm ph&iacute;a T&acirc;y Thủ đ&ocirc;, khu vực Mỹ Đ&igrave;nh - Thăng Long, nơi quy tụ nhiều trụ sở cơ quan ban ng&agrave;nh, doanh nghiệp lớn, căn hộ studio cũng l&agrave; lựa chọn l&yacute; tưởng d&agrave;nh cho kh&aacute;ch h&agrave;ng c&oacute; nhu cầu đầu tư cho thu&ecirc;.</p>\r\n\r\n<p>Với c&aacute;c gia đ&igrave;nh trẻ, t&ograve;a S4.01 cung cấp căn hộ 2 ph&ograve;ng ngủ hay căn 2PN+1 với kh&ocirc;ng gian mở, c&oacute; thể biến th&agrave;nh &ldquo;ph&ograve;ng ngủ mini&rdquo; cho kh&aacute;ch đến nh&agrave; với số tiền từ 180 triệu đồng. Những chi tiết nhỏ như bồn rửa mặt t&aacute;ch biệt với nh&agrave; tắm cũng được đưa v&agrave;o thiết kế gi&uacute;p tối ưu ho&aacute; c&ocirc;ng năng sử dụng căn hộ.</p>\r\n\r\n<p>Loại căn 3 ph&ograve;ng ngủ d&agrave;nh gia đ&igrave;nh 2-3 thế hệ, với số tiền từ 269 triệu đồng. Sở hữu căn hộ n&agrave;y, mỗi th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh sẽ c&oacute; kh&ocirc;ng gian ri&ecirc;ng tư cũng như được tận hưởng kh&ocirc;ng gian tho&aacute;ng của cả ng&ocirc;i nh&agrave;.</p>\r\n\r\n<p>S4.01 nằm ngay s&aacute;t Vinschool - trường phổ th&ocirc;ng li&ecirc;n cấp h&agrave;ng đầu tại Việt Nam. Tại Vinschool, học sinh được trang bị đầy đủ ki&ecirc;́n thức v&agrave; kỹ năng s&ocirc;́ng, khả năng tư duy, l&atilde;nh đạo đ&ecirc;̉ trở th&agrave;nh c&ocirc;ng d&acirc;n to&agrave;n c&acirc;̀u ưu t&uacute;. Chọn an cư tại S4.01, phụ huynh sẽ c&oacute; được m&ocirc;i trường học l&yacute; tưởng cho con trẻ, vừa đảm bảo an to&agrave;n vừa thuận tiện đi học mỗi ng&agrave;y.</p>\r\n\r\n<p>Đặc biệt, S4.01 sở hữu tầm nh&igrave;n hướng ra c&ocirc;ng vi&ecirc;n nội khu mang phong c&aacute;ch resort với hồ bơi xanh m&aacute;t, thảm cỏ picnic, vườn thiền thư th&aacute;i, vườn nhiệt đới xanh m&aacute;t, s&acirc;n chơi trẻ em li&ecirc;n ho&agrave;n đa sắc m&agrave;u, s&acirc;n tập tennis, b&oacute;ng rổ, b&oacute;ng chuyền&hellip;gi&uacute;p cư d&acirc;n lu&ocirc;n tận hưởng v&agrave; gắn kết giữa miền xanh kho&aacute;ng đạt.&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><a href=\"https://vnn-imgs-f.vgcloud.vn/2020/04/29/09/2-1.jpg\"><img alt=\"Ra mắt toà S4.01 - ‘tâm điểm ánh sáng’ của Vinhomes Smart City\" src=\"https://vnn-imgs-f.vgcloud.vn/2020/04/29/09/2-1.jpg\" /></a></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Những c&ocirc;ng vi&ecirc;n xanh xung quanh gi&uacute;p cư d&acirc;n tận hưởng v&agrave; gắn kết giữa miền xanh kho&aacute;ng đạt&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Nằm trong l&ograve;ng th&agrave;nh phố tiện &iacute;ch đẳng cấp quốc tế Vinhomes Smart City, S4.01 thừa hưởng đầy đủ c&aacute;c tiện &iacute;ch: khu thương mại Vincom Mega Mall, bệnh viện đa khoa quốc tế Vinmec, bộ ba c&ocirc;ng vi&ecirc;n li&ecirc;n ho&agrave;n, đảm bảo trải nghiệm sống trọn vẹn nhất cho c&aacute;c cư d&acirc;n.</p>\r\n\r\n<p>Hiện tại, kh&aacute;ch h&agrave;ng được chủ đầu tư hỗ trợ vay l&ecirc;n đến 70% gi&aacute; trị căn hộ với thời gian vay kỷ lục l&ecirc;n tới 35 năm, được &acirc;n hạn nợ gốc tới khi nhận được nh&agrave;. Ch&iacute;nh s&aacute;ch&nbsp;ưu việt n&agrave;y gi&uacute;p kh&aacute;ch h&agrave;ng an cư m&agrave; kh&ocirc;ng cần lo lắng về t&agrave;i ch&iacute;nh.</p>\r\n\r\n<p>Từ 3/4/2020, chủ đầu tư đưa ra chương tr&igrave;nh ưu đ&atilde;i đặc biệt &quot;Vinhomes si&ecirc;u khuyến m&atilde;i&quot; gi&uacute;p hiện thực ho&aacute; giấc mơ sở hữu nh&agrave; Vinhomes v&agrave; xe VinFast. Kh&aacute;ch h&agrave;ng khi mua nh&agrave; Vinhomes sẽ được nhận voucher mua xe &ocirc; t&ocirc; VinFast l&ecirc;n đến 200 triệu đồng c&ugrave;ng ch&iacute;nh s&aacute;ch hỗ trợ vay mua nh&agrave; 35 năm &amp; &ocirc; t&ocirc; VinFast 15 năm, kh&ocirc;ng cần trả vốn v&agrave; l&atilde;i l&ecirc;n đến 36 th&aacute;ng với chương tr&igrave;nh hỗ trợ t&agrave;i ch&iacute;nh vay mua nh&agrave; l&atilde;i suất 0% v&agrave; &acirc;n hạn vốn gốc.</p>\r\n\r\n<p>S4.01 l&agrave; to&agrave; đầu ti&ecirc;n v&agrave; duy nhất được b&agrave;n giao th&ocirc; một số căn hộ cho những kh&aacute;ch h&agrave;ng s&aacute;ng tạo, muốn tự tay thiết kế kh&ocirc;ng gian sống, dự kiến b&agrave;n giao v&agrave;o qu&yacute; III/2021.</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Chương tr&igrave;nh bốc thăm may mắn &ldquo;Căn nh&agrave; hạnh ph&uacute;c&rdquo; từ Vinhomes Online</p>\r\n\r\n			<p>Từ&nbsp;09/04 đến 30/06,&nbsp;kh&aacute;ch h&agrave;ng đặt mua th&agrave;nh c&ocirc;ng BĐS tr&ecirc;n&nbsp;Vinhomes Online tại https://online.vinhomes.vn&nbsp;c&oacute; cơ hội tham gia chương tr&igrave;nh bốc thăm may mắn &ldquo;Căn nh&agrave; hạnh ph&uacute;c&quot; với 6 lần bốc thăm. Tổng gi&aacute; trị giải thưởng l&ecirc;n tới&nbsp;6 tỷ đồng.</p>\r\n\r\n			<p>Người tr&uacute;ng thưởng vẫn tiếp tục được quyền bốc thăm. Đợt bốc thăm đầu ti&ecirc;n dự kiến diễn ra v&agrave;o 06/05/2020 với 02 giải &ldquo;Căn nh&agrave; hạnh ph&uacute;c&rdquo; trị gi&aacute; 1 tỷ đồng/giải.</p>\r\n\r\n			<p>Vinhomes Smart City c&oacute; quy m&ocirc; 280ha, toạ lạc tại t&acirc;m điểm ph&iacute;a T&acirc;y Thủ đ&ocirc; tại giao lộ 2 trục đường L&ecirc; Trọng Tấn v&agrave; Đại lộ Thăng Long, c&aacute;ch Trung t&acirc;m Hội nghị Quốc gia 7 ph&uacute;t di chuyển.</p>\r\n\r\n			<p>Mọi th&ocirc;ng tin chi tiết, xin vui l&ograve;ng li&ecirc;n hệ:</p>\r\n\r\n			<p>Website: https://smartcity.vinhomes.vn/sapphire-parkville/</p>\r\n\r\n			<p>Fanpage: https://www.facebook.com/vinhomes.smartcity.official/</p>\r\n\r\n			<p>Hotline: 19001018</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '1588135426_9901984_cfa734bf36126a82be42b269671f696c.jpg', 0, 13, 3, 1, 1, '2020-04-28 21:43:46', '2021-07-01 09:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `id_user`, `id_blog`, `content`, `updated_at`, `created_at`) VALUES
(1, 9, 2, 'Hay lắm a', '2020-04-22 08:47:02', '2020-04-22 08:47:02'),
(2, 12, 2, 'Good đấy', '2020-04-22 08:47:02', '2020-04-22 08:47:02'),
(3, 10, 2, 'Được lắm anh', '2020-04-23 05:13:09', '2020-04-23 05:12:06'),
(4, 8, 1, 'Đù hay nha', '2020-04-23 00:42:16', '2020-04-23 00:42:16'),
(5, 8, 1, 'Thế mà cũng nói đc', '2020-04-23 00:42:34', '2020-04-23 00:42:34'),
(6, 8, 2, 'hay quá ạ', '2020-04-23 00:47:47', '2020-04-23 00:47:47'),
(7, 8, 2, 'Thế chịu rồi', '2020-04-23 00:48:34', '2020-04-23 00:48:34'),
(8, 17, 2, 'Hay nhỉ', '2020-04-23 02:06:36', '2020-04-23 02:06:36'),
(12, 8, 2, 'tốt quá a', '2020-04-23 02:39:15', '2020-04-23 02:39:15'),
(13, 8, 2, 'vui quá', '2020-04-23 02:40:25', '2020-04-23 02:40:25'),
(14, 8, 2, 'wow amzing', '2020-04-23 02:41:41', '2020-04-23 02:41:41'),
(15, 8, 2, 'hahahaha', '2020-04-23 02:42:32', '2020-04-23 02:42:32'),
(16, 8, 1, 'tuyệt vời', '2020-04-23 02:47:41', '2020-04-23 02:47:41'),
(17, 8, 1, 'tuyệt vời', '2020-04-23 02:48:59', '2020-04-23 02:48:59'),
(18, 8, 1, 'á đù', '2020-04-23 02:49:54', '2020-04-23 02:49:54'),
(19, 9, 4, 'hay đấy', '2020-04-23 02:52:01', '2020-04-23 02:52:01'),
(20, 9, 4, 'tuyệt cmn vời', '2020-04-23 02:52:25', '2020-04-23 02:52:25'),
(21, 9, 4, 'kjdskjsdbkjsdbj', '2020-04-23 02:52:49', '2020-04-23 02:52:49'),
(22, 8, 5, 'Rất bổ ích cho các bạn tham khảo', '2020-04-24 00:39:56', '2020-04-24 00:39:56'),
(23, 8, 8, 'hay quá a ơi vler thế', '2020-04-24 03:08:14', '2020-04-24 03:08:14'),
(24, 8, 8, 'vl quá', '2020-04-24 03:08:34', '2020-04-24 03:08:34'),
(25, 8, 9, 'hay lắm', '2020-04-24 03:19:20', '2020-04-24 03:19:20'),
(26, 8, 9, 'e nứng', '2020-04-24 03:19:30', '2020-04-24 03:19:30'),
(27, 8, 9, 'kasjkbadskjaskjkjds', '2020-04-24 03:19:36', '2020-04-24 03:19:36'),
(28, 8, 9, 'qwdefrthyui', '2020-04-24 04:17:34', '2020-04-24 04:17:34'),
(29, 8, 9, 'SADFGHJ', '2020-04-24 04:17:45', '2020-04-24 04:17:45'),
(30, 8, 2, 'Hay á', '2020-05-03 19:27:30', '2020-05-03 19:27:30'),
(31, 8, 2, 'Hay á', '2020-05-03 19:27:48', '2020-05-03 19:27:48'),
(32, 8, 3, 'Hay', '2020-05-03 19:28:09', '2020-05-03 19:28:09'),
(33, 8, 3, 'hay', '2020-05-03 19:28:33', '2020-05-03 19:28:33'),
(34, 8, 1, 'hay quá', '2020-05-03 19:30:32', '2020-05-03 19:30:32'),
(35, 8, 11, 'hay', '2020-05-03 19:40:24', '2020-05-03 19:40:24'),
(36, 8, 8, 'hay', '2020-09-21 21:37:20', '2020-09-21 21:37:20'),
(37, 8, 7, 'yes', '2021-02-28 20:10:13', '2021-02-28 20:10:13'),
(38, 8, 1, 'jdjhdsjhdahjad', '2021-06-21 22:59:28', '2021-06-21 22:59:28'),
(39, 8, 1, 'đbd fbsdbsdbsdbds', '2021-06-21 23:00:07', '2021-06-21 23:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_feedback`
--

CREATE TABLE `blog_feedback` (
  `id` int(11) NOT NULL,
  `answered_by` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `reply` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_feedback`
--

INSERT INTO `blog_feedback` (`id`, `answered_by`, `name`, `phone`, `email`, `message`, `reply`, `created_at`, `updated_at`) VALUES
(1, 8, 'Pham Duong', '0904654926', 'phamduong97info@gmail.com', 'Liên hệ tới mình nhé bạn', NULL, '2020-04-27 21:16:32', '2020-04-27 21:16:32'),
(2, 8, 'Phạm Văn Dương', '0904654926', 'trump8976@gmail.com', 'Liên hệ mình bạn nhé', NULL, '2020-04-27 21:20:26', '2020-04-27 21:20:26'),
(3, 8, 'Lê Hà Nam', '0904654926', 'admin@gmail.com', 'Vui lòng feedbakc mình qua email này nhé', NULL, '2020-04-27 21:21:01', '2020-04-27 21:21:01'),
(4, 9, 'Pham Duong', '0904654926', 'phamduong97info@gmail.com', 'jghghg', NULL, '2020-05-04 00:04:10', '2020-05-04 07:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `blog_reply_comments`
--

CREATE TABLE `blog_reply_comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_reply_comments`
--

INSERT INTO `blog_reply_comments` (`id`, `id_user`, `id_comment`, `comment`, `updated_at`, `created_at`) VALUES
(1, 8, 1, 'vler', '2020-04-22 10:28:36', '2020-04-22 10:28:36'),
(2, 11, 1, 'Yêu quá', '2020-04-23 02:57:37', '2020-04-23 02:57:37'),
(3, 8, 2, 'Vâng a', '2020-04-23 01:30:40', '2020-04-23 01:30:40'),
(4, 8, 1, 'Đm hậu', '2020-04-23 01:31:09', '2020-04-23 01:31:09'),
(5, 17, 6, 'Yêu anh lắm ạ', '2020-04-23 01:33:41', '2020-04-23 01:33:41'),
(6, 8, 14, 'đff', '2020-05-03 20:11:12', '2020-05-03 20:11:12'),
(7, 8, 14, 'Tốt quá', '2020-05-03 20:24:30', '2020-05-03 20:24:30'),
(8, 8, 14, 'hay quá', '2020-05-03 20:25:25', '2020-05-03 20:25:25'),
(9, 8, 14, 'yep', '2020-05-03 20:26:17', '2020-05-03 20:26:17'),
(10, 8, 14, 'gắt', '2020-05-03 20:27:30', '2020-05-03 20:27:30'),
(11, 8, 12, 'ừ e', '2020-05-03 20:31:49', '2020-05-03 20:31:49'),
(12, 8, 2, 'yes', '2020-05-03 20:33:04', '2020-05-03 20:33:04'),
(13, 8, 1, 'thanks', '2020-05-03 20:34:40', '2020-05-03 20:34:40'),
(14, 8, 24, 'fgj', '2020-09-21 21:36:56', '2020-09-21 21:36:56'),
(15, 8, 23, 'hay', '2020-09-21 21:37:04', '2020-09-21 21:37:04'),
(16, 8, 37, 'ok', '2021-02-28 20:10:27', '2021-02-28 20:10:27'),
(17, 8, 4, 'hdgdsgdgdgd', '2021-06-21 22:59:47', '2021-06-21 22:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `blog_settings`
--

CREATE TABLE `blog_settings` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `menu_color` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body_color` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_color` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_settings`
--

INSERT INTO `blog_settings` (`id`, `id_user`, `menu_color`, `body_color`, `footer_color`, `facebook`, `google`, `instagram`, `twitter`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 8, '#262626', '#FDFDFD', '#262626', 'https://www.facebook.com', 'https://www.google.com', NULL, 'https://www.twitter.com', 'https://www.youtube.com', '2020-04-28 01:41:07', '2020-04-28 03:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `blog_types`
--

CREATE TABLE `blog_types` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_types`
--

INSERT INTO `blog_types` (`id`, `name`, `slug`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Thông báo đấu giá', 'Thông-báo-đấu-giá', 1, '2021-07-07 08:15:33', '2020-04-21 04:50:12'),
(2, 'Kết quả đấu giá', 'Kết-quả-đấu-giá', 1, '2021-07-07 08:15:46', '2020-04-21 04:50:12'),
(3, 'Tin khác', 'Tin-khác', 1, '2021-07-07 08:15:51', '2020-04-21 07:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `img_detail` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_demo` text COLLATE utf8_unicode_ci NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `slug`, `description`, `content`, `images`, `img_detail`, `link_demo`, `id_type`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Workstay - website đặt phòng trực tuyến', 'workstay-website-dat-phong-truc-tuyen-24242313', 'Website được xây dựng với mục đích đặt phòng online bất cứ nơi đâu kết hợp với dịch vụ co-working space', '<p><strong>GIỚI THIỆU</strong></p>\r\n\r\n<h4>&nbsp;</h4>\r\n\r\n<p>Ch&agrave;o mừng bạn đến với hệ thống Luxstay (từ đ&acirc;y được gọi bằng &quot;Trang Web&quot;, &ldquo;Website&rdquo;). Mục đ&iacute;ch ch&iacute;nh v&agrave; duy nhất của website n&agrave;y l&agrave; cung cấp s&agrave;n giao dịch thương mại điện tử trực tuyến nhằm cung cấp th&ocirc;ng tin của chỗ ở cho dịch vụ cho thu&ecirc; lưu tr&uacute; du lịch ngắn hạn cho những người đang t&igrave;m kiếm để thu&ecirc; những nơi như vậy (gọi chung l&agrave; &quot;Dịch vụ&quot;). C&aacute;c cụm từ &quot;ch&uacute;ng t&ocirc;i&quot;, &quot;của ch&uacute;ng t&ocirc;i,&quot; v&agrave; &quot;Luxstay&quot; được sử dụng dưới đ&acirc;y sẽ được sử dụng đại diện cho Luxstay Inc, trong khi thuật ngữ &quot;bạn&quot; đề cập đến những kh&aacute;ch h&agrave;ng đang truy cập, đ&atilde; truy cập v&agrave; sử dụng th&ocirc;ng tin từ Website.</p>\r\n\r\n<p>C&aacute;c tổ chức, hay c&aacute; nh&acirc;n đ&atilde;, đang v&agrave; sẽ tham gia giao dịch tr&ecirc;n s&agrave;n giao dịch thương mại điện tử Luxstay, sẽ sẵn s&agrave;ng tham gia giao dịch với một th&aacute;i độ t&ocirc;n trọng quyền v&agrave; lợi &iacute;ch của nhau, một c&aacute;ch hợp ph&aacute;p nhờ c&oacute; c&aacute;c hợp đồng v&agrave; kh&ocirc;ng tr&aacute;i với c&aacute;c quy định của ph&aacute;p luật.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i cung cấp th&ocirc;ng tin trong c&aacute;c b&agrave;i đăng tr&ecirc;n Website với mục đ&iacute;ch hỗ trợ kết nối thực hiện mong muốn thu&ecirc; chỗ ở của Kh&aacute;ch H&agrave;ng v&agrave; Chủ Nh&agrave;.</p>\r\n\r\n<p>C&aacute;c th&ocirc;ng tin đ&atilde; được đăng tr&ecirc;n Luxstay.com cần phải được tu&acirc;n thủ theo tất cả c&aacute;c luật &aacute;p dụng (nếu c&oacute;), kh&ocirc;ng đăng những th&ocirc;ng tin hoặc sản phẩm bị cấm bởi ph&aacute;p luật.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i cũng hoạt động như một k&ecirc;nh giao tiếp giữa Chủ Nh&agrave; v&agrave; Kh&aacute;ch h&agrave;ng để c&oacute; thể giải quyết bất kỳ tranh chấp n&agrave;o giữa hai b&ecirc;n.</p>\r\n\r\n<p>Việc sử dụng Website v&agrave; dịch vụ tr&ecirc;n đ&oacute; cần phải được thực hiện một c&aacute;ch c&ocirc;ng khai v&agrave; minh bạch để đảm bảo quyền lợi v&agrave; sự an to&agrave;n của c&aacute;c b&ecirc;n.</p>\r\n\r\n<p>C&aacute;c b&ecirc;n chịu tr&aacute;ch nhiệm cho tất cả c&aacute;c chi ph&iacute; li&ecirc;n quan với việc sử dụng Website hoặc Dịch vụ (nếu c&oacute;).</p>\r\n\r\n<p><br />\r\n<strong>TỪ KH&Oacute;A CH&Iacute;</strong><strong>NH</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Người d&ugrave;ng - những người truy cập v&agrave;o trang Luxstay.com v&agrave;/hoặc ứng dụng di động tương ứng (nếu c&oacute;).</p>\r\n\r\n<p>Th&agrave;nh Vi&ecirc;n - người d&ugrave;ng đ&atilde; đăng k&yacute; t&agrave;i khoản c&aacute; nh&acirc;n tr&ecirc;n trang web.</p>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng - những th&agrave;nh vi&ecirc;n đ&atilde; sử dụng/hoặc c&oacute; &yacute; định sử dụng dịch vụ.</p>\r\n\r\n<p>Chỗ ở - C&aacute;c ng&ocirc;i nh&agrave;, chỗ ở (tất cả c&aacute;c loại bất động sản n&oacute;i chung) đ&atilde; k&yacute; chấp thuận điều khoản v&agrave; điều kiện của Luxstay v&agrave; đồng &yacute; cung cấp th&ocirc;ng tin cho ch&uacute;ng t&ocirc;i để đăng tin tr&ecirc;n trang Luxstay.com.</p>\r\n\r\n<p><br />\r\n<strong>QUY TR&Igrave;NH GIAO DỊCH</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Website được thiết kế để hỗ trợ một c&aacute;ch đầy đủ, tốt nhất cho người sử dụng, c&aacute;c th&agrave;nh vi&ecirc;n v&agrave; kh&aacute;ch h&agrave;ng tr&ecirc;n cả nước. Qu&aacute; tr&igrave;nh đăng k&yacute; t&agrave;i khoản:</p>\r\n\r\n<p>Mục &quot;Đăng k&yacute;&quot; c&oacute; thể được t&igrave;m thấy ở g&oacute;c tr&ecirc;n b&ecirc;n phải của trang web, sau khi bấm chuột v&agrave;o đ&oacute;, người sử dụng c&oacute; thể t&igrave;m thấy một số c&aacute;c c&aacute;ch kh&aacute;c nhau để c&oacute; thể đăng k&yacute; l&agrave;m th&agrave;nh vi&ecirc;n:</p>\r\n\r\n<p>Bằng c&aacute;ch nhập địa chỉ email c&aacute; nh&acirc;n, điền v&agrave;o mục &quot;mật khẩu&quot;, sau đ&oacute; x&aacute;c nhận mật khẩu một lần nữa, qu&aacute; tr&igrave;nh đăng k&yacute; đ&atilde; ho&agrave;n tất.</p>\r\n\r\n<p>Người d&ugrave;ng cũng c&oacute; thể sử dụng t&agrave;i khoản c&aacute; nh&acirc;n Facebook hoặc Google để đăng k&yacute; một t&agrave;i khoản Luxstay mới.</p>\r\n\r\n<p><br />\r\n<strong>QUY TR&Igrave;NH ĐĂNG TIN CHO TH&Agrave;NH VI&Ecirc;N</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&agrave;nh vi&ecirc;n kh&ocirc;ng được ph&eacute;p đăng b&agrave;i trực tiếp l&ecirc;n trang web, thay v&agrave;o đ&oacute;, nếu bạn muốn đăng b&agrave;i hoặc hợp t&aacute;c cho thu&ecirc; chỗ ở của bạn, bạn sẽ phải li&ecirc;n hệ với bộ phận chăm s&oacute;c kh&aacute;ch h&agrave;ng của ch&uacute;ng t&ocirc;i. Sau đ&oacute;, ch&uacute;ng t&ocirc;i sẽ đăng th&ocirc;ng tin về chỗ ở của bạn tr&ecirc;n trang web để những người sử dụng v&agrave; th&agrave;nh vi&ecirc;n kh&aacute;c c&oacute; cơ hội biết đến v&agrave; đặt thu&ecirc; chỗ của bạn.</p>\r\n\r\n<p><br />\r\n<strong>QUY TR&Igrave;NH D&Agrave;NH CHO KH&Aacute;CH H&Agrave;NG</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Khi c&aacute;c th&agrave;nh vi&ecirc;n, người sử dụng v&agrave; kh&aacute;ch h&agrave;ng muốn thu&ecirc; bất kỳ một chỗ ở n&agrave;o đ&oacute; được đăng tr&ecirc;n trang web, c&oacute; một v&agrave;i lưu &yacute; bạn cần phải l&agrave;m theo như sau:</p>\r\n\r\n<p>T&igrave;m kiếm những chỗ ở ph&ugrave; hợp nhất được đăng tr&ecirc;n trang web sau đ&oacute; cẩn thận đưa ra quyết định cuối c&ugrave;ng.</p>\r\n\r\n<p>Sau khi t&igrave;m thấy một nơi th&iacute;ch hợp, bạn c&oacute; thể đặt ph&ograve;ng trực tiếp tr&ecirc;n Luxstay.com hoặc gọi điện cho bộ phận chăm s&oacute;c kh&aacute;ch h&agrave;ng để đặt qua điện thoại. Th&ocirc;ng tin được ghi ở tr&ecirc;n Website.</p>\r\n\r\n<p>Sau khi ho&agrave;n tất qu&aacute; tr&igrave;nh đặt ph&ograve;ng, bạn sẽ phải ho&agrave;n th&agrave;nh thủ tục thanh to&aacute;n trong v&ograve;ng 24 giờ kể từ thời điểm bạn nhận được email x&aacute;c nhận đặt ph&ograve;ng của Luxstay.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i y&ecirc;u cầu tất cả c&aacute;c đối t&aacute;c của ch&uacute;ng t&ocirc;i, c&aacute;c chủ sở hữu chỗ ở, cung cấp th&ocirc;ng tin một c&aacute;ch đầy đủ, ch&iacute;nh x&aacute;c, chi tiết v&agrave; trung thực về chỗ ở của m&igrave;nh.</p>\r\n\r\n<p>Tất cả c&aacute;c h&agrave;nh vi lừa đảo, gian lận, lừa đảo trong qu&aacute; tr&igrave;nh giao dịch sẽ bị l&ecirc;n &aacute;n v&agrave; phải chịu ho&agrave;n to&agrave;n tr&aacute;ch nhiệm theo ph&aacute;p luật.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Luxstay cung cấp c&aacute;c h&igrave;nh thức thanh to&aacute;n trực tuyến như sau:</p>\r\n\r\n<p>Thanh to&aacute;n trực tuyến qua ATM trong nước v&agrave; quốc tế.</p>\r\n\r\n<p>Chuyển khoản qua t&agrave;i khoản ng&acirc;n h&agrave;ng.</p>\r\n\r\n<p>Luxstay sẽ đảm bảo:</p>\r\n\r\n<p>Th&ocirc;ng tin về gi&aacute; cả do Chủ Nh&agrave; đặt ra l&agrave; to&agrave;n vẹn, kh&ocirc;ng bị chỉnh sửa bởi Luxstay khi chưa được Chủ Nh&agrave; đồng &yacute; hợp l&yacute; nhất v&agrave; dịch vụ tốt nhất.</p>\r\n\r\n<p>Th&ocirc;ng tin về chất lượng v&agrave; ti&ecirc;u chuẩn của chỗ ở đ&uacute;ng với m&ocirc; tả tại thời điểm Chủ Nh&agrave; đăng b&agrave;i tr&ecirc;n Website.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong trường hợp kh&aacute;ch h&agrave;ng của Luxstay kh&ocirc;ng thể sử dụng được dịch vụ, ch&uacute;ng t&ocirc;i sẽ th&ocirc;ng tin lại với Chủ Nh&agrave; để:</p>\r\n\r\n<p>N&acirc;ng cấp c&aacute;c chỗ ở v&agrave; cung cấp dịch vụ tốt hơn.</p>\r\n\r\n<p>Cung cấp g&oacute;i dịch vụ miễn ph&iacute; kh&aacute;c (nếu c&oacute; thể).</p>\r\n\r\n<p>Gợi &yacute; c&aacute;c địa điểm thay thế m&agrave; ở đ&oacute; chất lượng chỗ ở v&agrave; dịch vụ ngang bằng c&oacute; khi tốt hơn (nếu c&oacute; thể).</p>\r\n\r\n<p>Trong trường hợp xấu nhất, ch&uacute;ng t&ocirc;i sẽ xem x&eacute;t để y&ecirc;u cầu Chủ Nh&agrave; ho&agrave;n trả tiền cho qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p><br />\r\n<strong>GIẢI QUYẾT TRANH CHẤP</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Theo quy định tại Mục III - Quy chế hoạt động S&agrave;n giao dịch TMĐT Luxstay.</p>\r\n\r\n<p><br />\r\n<strong>QUY TR&Igrave;NH THANH TO&Aacute;N</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Theo quy định tại Mục IV - Quy chế hoạt động S&agrave;n giao dịch TMĐT Luxstay.</p>\r\n\r\n<p><br />\r\n<strong>BẢO ĐẢM AN TO&Agrave;N GIAO DỊCH</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Để thực hiện c&aacute;c giao dịch th&agrave;nh c&ocirc;ng, hạn chế tối đa c&aacute;c rủi ro c&oacute; thể ph&aacute;t sinh, người sử dụng, c&aacute;c th&agrave;nh vi&ecirc;n v&agrave; kh&aacute;ch h&agrave;ng của Luxstay cần phải tu&acirc;n thủ c&aacute;c cam kết sau đ&acirc;y:</p>\r\n\r\n<p>Th&agrave;nh vi&ecirc;n kh&ocirc;ng n&ecirc;n cung cấp th&ocirc;ng tin chi tiết về c&aacute;c khoản thanh to&aacute;n cho bất kỳ ai bằng e-mail, ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu tr&aacute;ch nhiệm cho bất kỳ tổn thất n&agrave;o g&acirc;y ra bởi c&aacute;c th&agrave;nh vi&ecirc;n như một kết quả của sự trao đổi th&ocirc;ng tin qua internet hoặc e-mail.</p>\r\n\r\n<p>Cơ chế ch&uacute;ng t&ocirc;i sử dụng để đảm bảo c&aacute;c giao dịch như sau:</p>\r\n\r\n<p>Quản l&yacute; th&agrave;nh vi&ecirc;n: th&agrave;nh vi&ecirc;n của Luxstay.com phải cung cấp đầy đủ c&aacute;c th&ocirc;ng tin c&oacute; li&ecirc;n quan v&agrave; chịu tr&aacute;ch nhiệm về t&iacute;nh x&aacute;c thực của những th&ocirc;ng tin n&agrave;y. Ch&uacute;ng t&ocirc;i sẽ ghi lại tất cả c&aacute;c th&ocirc;ng tin c&aacute; nh&acirc;n v&agrave; t&igrave;nh trạng ph&aacute;p l&yacute; của bạn cho mục đ&iacute;ch quản l&yacute;. Ch&uacute;ng t&ocirc;i sẽ cập nhật th&ocirc;ng tin thường xuy&ecirc;n đồng thời tạo ra những đ&aacute;nh gi&aacute; dựa tr&ecirc;n c&aacute;c th&ocirc;ng tin n&agrave;y.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i cũng đ&aacute;nh gi&aacute; chủ nh&agrave; qua những lần nhận x&eacute;t, phản hồi v&agrave; &yacute; kiến của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i sẽ nỗ lực hết sức để giải quyết bất kỳ khiếu nại v&agrave; tranh chấp c&oacute; thể ph&aacute;t sinh. Quyền lợi của bạn sẽ được bảo vệ bởi ch&uacute;ng t&ocirc;i hoặc sự can thiệp của c&aacute;c cơ quan ch&iacute;nh quyền địa phương.</p>\r\n\r\n<p><br />\r\n<strong>BẢO VỆ TH&Ocirc;NG TIN KH&Aacute;CH H&Agrave;NG</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1.</strong>&nbsp;Mục đ&iacute;ch ch&iacute;nh của việc thu thập th&ocirc;ng tin kh&aacute;ch h&agrave;ng v&agrave; phạm vi thực hiện</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i thu thập th&ocirc;ng tin của bạn với mục đ&iacute;ch duy nhất l&agrave; để quản l&yacute; t&agrave;i khoản của bạn, đăng k&yacute; t&agrave;i khoản, quản l&yacute; th&agrave;nh vi&ecirc;n, li&ecirc;n lạc khi c&oacute; tranh chấp xảy ra, cung cấp cho c&aacute;c đối t&aacute;c của ch&uacute;ng t&ocirc;i th&ocirc;ng tin của bạn nếu cần thiết. Ch&uacute;ng t&ocirc;i cam kết kh&ocirc;ng b&aacute;n, chia sẻ hoặc trao đổi th&ocirc;ng tin c&aacute; nh&acirc;n của bạn.</p>\r\n\r\n<p>C&aacute;c loại th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i thu thập l&agrave;: t&ecirc;n, địa chỉ, số điện thoại, email.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2.</strong>&nbsp;Việc sử dụng th&ocirc;ng tin của th&agrave;nh vi&ecirc;n</p>\r\n\r\n<p>C&aacute;c th&ocirc;ng tin của c&aacute;c th&agrave;nh vi&ecirc;n Luxstay sẽ được sử dụng v&agrave; chỉ được sử dụng cho mục đ&iacute;ch kiểm so&aacute;t, quản l&yacute; hoạt động của c&aacute;c th&agrave;nh vi&ecirc;n v&agrave; tạo thuận lợi cho việc thực hiện giao dịch.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3.</strong>&nbsp;Thời gian hết hạn của việc lưu trữ th&ocirc;ng tin</p>\r\n\r\n<p>th&ocirc;ng tin của c&aacute;c th&agrave;nh vi&ecirc;n sẽ được lưu trữ từ 02 cho đến 10 năm. Ngoại trừ những trường hợp th&agrave;nh vi&ecirc;n x&oacute;a bỏ t&agrave;i khoản hoặc th&ocirc;ng tin c&aacute; nh&acirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>4.</strong>&nbsp;Chỉnh sửa th&ocirc;ng tin c&aacute; nh&acirc;n</p>\r\n\r\n<p>Th&agrave;nh vi&ecirc;n v&agrave; kh&aacute;ch h&agrave;ng c&oacute; thể chỉnh sửa th&ocirc;ng tin c&aacute; nh&acirc;n của m&igrave;nh trong mục t&agrave;i khoản ở tr&ecirc;n trang web. Đối với th&agrave;nh vi&ecirc;n l&agrave; chủ nh&agrave;, bạn kh&ocirc;ng thể chỉnh sửa th&ocirc;ng tin chỗ ở đ&atilde; được đăng tr&ecirc;n Website của bạn. Nếu bạn muốn thay đổi bất cứ điều g&igrave; li&ecirc;n quan đến b&agrave;i viết, bạn cần li&ecirc;n hệ với bộ phận dịch vụ kh&aacute;ch h&agrave;ng của Luxstay để được thay đổi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>5.</strong>&nbsp;Cam kết bảo mật th&ocirc;ng tin kh&aacute;ch h&agrave;ng</p>\r\n\r\n<ul>\r\n	<li>Ch&uacute;ng t&ocirc;i cam kết th&ocirc;ng tin của bạn sẽ được bảo mật tuyệt đối, theo ch&iacute;nh s&aacute;ch bảo mật th&ocirc;ng tin của Luxstay. Việc thu thập v&agrave; sử dụng th&ocirc;ng tin cho mỗi th&agrave;nh vi&ecirc;n chỉ được thực hiện khi c&oacute; sự đồng &yacute; của c&aacute;c th&agrave;nh vi&ecirc;n đ&oacute;, trừ trường hợp bị quy định bởi ph&aacute;p luật. Th&agrave;nh vi&ecirc;n c&oacute; quyền kiểm tra, cập nhật, điều chỉnh hoặc hủy bỏ th&ocirc;ng tin c&aacute; nh&acirc;n của m&igrave;nh theo đ&uacute;ng quy tr&igrave;nh của ch&uacute;ng t&ocirc;i. Ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn cho bất kỳ b&ecirc;n thứ ba n&agrave;o hoặc sử dụng th&ocirc;ng tin đ&oacute; b&ecirc;n ngo&agrave;i trang web, ngoại trừ những trường hợp sau đ&acirc;y:</li>\r\n	<li>Việc cung cấp th&ocirc;ng tin c&aacute; nh&acirc;n cho c&aacute;c b&ecirc;n thứ ba c&oacute; sự đồng &yacute; của th&agrave;nh vi&ecirc;n.</li>\r\n	<li>B&ecirc;n thứ ba l&agrave; những b&ecirc;n được thu&ecirc; bởi Luxstay để quản l&yacute; m&aacute;y chủ, ph&aacute;t triển website v&agrave; hỗ trợ qu&aacute; tr&igrave;nh thanh to&aacute;n. Trong trường hợp n&agrave;y, hợp đồng giữa Luxstay v&agrave; c&aacute;c b&ecirc;n thứ ba đ&oacute; phải x&aacute;c định r&otilde; tr&aacute;ch nhiệm của mỗi b&ecirc;n trong việc bảo vệ th&ocirc;ng tin người d&ugrave;ng, kh&ocirc;ng chia sẻ th&ocirc;ng tin đ&oacute; với bất cứ ai v&agrave; chỉ b&ecirc;n thứ ba sử dụng th&ocirc;ng tin của c&aacute;c th&agrave;nh vi&ecirc;n để thực hiện nhiệm vụ của m&igrave;nh. Nếu hệ thống của ch&uacute;ng t&ocirc;i xảy ra lỗi v&agrave; l&agrave;m mất th&ocirc;ng tin c&aacute; nh&acirc;n của c&aacute;c th&agrave;nh vi&ecirc;n, ch&uacute;ng t&ocirc;i sẽ triển khai sửa chữa v&agrave; c&aacute;c b&ecirc;n thứ ba của ch&uacute;ng t&ocirc;i sẽ th&ocirc;ng b&aacute;o cho c&aacute;c cơ quan ch&iacute;nh phủ c&oacute; thẩm quyền trong v&ograve;ng 24 giờ sau khi vấn đề được ph&aacute;t hiện ra. Theo y&ecirc;u cầu của c&aacute;c cơ quan ch&iacute;nh phủ hợp ph&aacute;p, tất cả c&aacute;c h&agrave;nh vi cố &yacute; tiết lộ th&ocirc;ng tin kh&aacute;ch h&agrave;ng hoặc l&agrave;m sai th&ocirc;ng tin kh&aacute;ch h&agrave;ng đều đ&aacute;ng bị khiển tr&aacute;ch v&agrave; xử l&yacute;. Nếu bạn c&oacute; bất kỳ khiếu nại g&igrave; về vấn đề những th&ocirc;ng tin của m&igrave;nh được sử dụng kh&ocirc;ng đ&uacute;ng v&agrave; ch&iacute;nh x&aacute;c, ch&uacute;ng t&ocirc;i sẽ c&oacute; cơ chế x&aacute;c minh nhất định v&agrave; xử l&yacute; ph&ugrave; hợp, hoặc nếu cần thiết, ch&uacute;ng t&ocirc;i sẽ y&ecirc;u cầu sự can thiệp của ch&iacute;nh phủ.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>QUẢN L&Yacute; TH&Ocirc;NG TIN KH&Ocirc;NG PH&Ugrave; HỢP</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. Quy định của th&agrave;nh vi&ecirc;n</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i c&oacute; tr&aacute;ch nhiệm bảo vệ v&agrave; duy tr&igrave; tất cả c&aacute;c hoạt động của c&aacute;c t&agrave;i khoản th&agrave;nh vi&ecirc;n. Bạn hiểu v&agrave; đồng &yacute; sẽ kịp thời th&ocirc;ng b&aacute;o tất cả những h&agrave;nh vi tr&aacute;i ph&eacute;p, vi phạm an ninh, lưu trữ mật khẩu v&agrave; t&ecirc;n đăng k&yacute; của một b&ecirc;n thứ ba v&agrave; bất kỳ h&agrave;nh vi kh&ocirc;ng ph&ugrave; hợp, để ch&uacute;ng t&ocirc;i c&oacute; thể xử l&yacute; một c&aacute;ch nhanh nhất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>C&aacute;c h&agrave;nh vi bị nghi&ecirc;m cấm:</li>\r\n	<li>Th&ocirc;ng tin được gửi nhằm g&acirc;y kh&oacute; chịu cho cộng đồng th&agrave;nh vi&ecirc;n trực tuyến, chẳng hạn như nội dung ph&acirc;n biệt chủng tộc, m&ecirc; t&iacute;n dị đoan, hận th&ugrave; hoặc x&uacute;c phạm đến bất kỳ c&aacute; nh&acirc;n hoặc nh&oacute;m.</li>\r\n	<li>Tham gia v&agrave;o c&aacute;c h&agrave;nh động hoặc đưa c&aacute;c th&ocirc;ng tin c&oacute; thể g&acirc;y hại cho c&aacute;c c&aacute; nh&acirc;n v&agrave; tổ chức kh&aacute;c.</li>\r\n	<li>Tham gia v&agrave;o c&aacute;c hoạt động hoặc ph&aacute;t t&aacute;n c&aacute;c th&ocirc;ng tin mang t&iacute;nh chất quấy rối người kh&aacute;c.</li>\r\n	<li>Tham gia v&agrave;o c&aacute;c hoạt động li&ecirc;n quan đến việc tuy&ecirc;n truyền &quot;thư r&aacute;c&quot; hoặc gửi một số lượng lớn e-mail hoặc &quot;spam&quot; cho c&aacute;c th&agrave;nh vi&ecirc;n v&agrave; những người d&ugrave;ng kh&aacute;c.</li>\r\n	<li>Tham gia v&agrave;o c&aacute;c hoạt động, gửi th&ocirc;ng tin hoặc truyền b&aacute; tin tức về gian lận, sai sự thật, g&acirc;y hiểu lầm, hoặc tuy&ecirc;n truyền, tổ chức c&aacute;c hoạt động c&oacute; nội dung xấu, đe dọa, khi&ecirc;u d&acirc;m, n&oacute;i xấu hoặc &aacute;p dụng chỉ tr&iacute;ch c&aacute;c th&agrave;nh vi&ecirc;n kh&aacute;c.</li>\r\n	<li>Gửi th&ocirc;ng tin được ph&acirc;n loại l&agrave; ảnh khi&ecirc;u d&acirc;m.</li>\r\n	<li>Gửi th&ocirc;ng tin để cung cấp t&agrave;i liệu v&agrave; c&aacute;c h&agrave;nh vi bất hợp ph&aacute;p kh&aacute;c như mua b&aacute;n h&agrave;ng ho&aacute; v&agrave; cung cấp dịch vụ bị cấm, x&acirc;m phạm sự ri&ecirc;ng tư của người kh&aacute;c hoặc cung cấp v&agrave; ph&acirc;n phối c&aacute;c loại virus m&aacute;y t&iacute;nh.</li>\r\n	<li>Tham gia v&agrave;o c&aacute;c hoạt động hoặc gửi th&ocirc;ng tin tiết lộ mật khẩu hoặc th&ocirc;ng tin c&aacute; nh&acirc;n cho c&aacute;c mục đ&iacute;ch m&agrave; kh&ocirc;ng c&oacute; lợi cho người kh&aacute;c.</li>\r\n	<li>Tham gia v&agrave;o c&aacute;c hoạt động thương mại, kinh doanh m&agrave; kh&ocirc;ng cần sự đồng &yacute; của Luxstay, chẳng hạn như c&aacute;c cuộc thi, r&uacute;t thăm tr&uacute;ng thưởng, trao đổi, quảng c&aacute;o, kinh doanh đa cấp.</li>\r\n	<li>Sử dụng c&aacute;c h&igrave;nh thức tr&ecirc;n trang web mẫu v&agrave; số điện thoại miễn ph&iacute; cho quảng c&aacute;o v&agrave; quảng b&aacute; sản phẩm v&agrave; c&aacute;c dịch vụ kh&aacute;c nhằm mục đ&iacute;ch.</li>\r\n	<li>Sử dụng c&ocirc;ng nghệ hoặc thủ c&ocirc;ng thu thập v&agrave; ghi th&ocirc;ng tin cho thấy tr&ecirc;n c&aacute;c trang web cho bất kỳ mục đ&iacute;ch m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p của Luxstay.</li>\r\n	<li>Sử dụng bất kỳ thiết bị hoặc phần mềm g&acirc;y hại hoặc cố &yacute; vi phạm hoạt động Luxstay.</li>\r\n</ul>\r\n\r\n<p>2. Danh s&aacute;ch th&ocirc;ng tin hạn chế để gửi b&agrave;i</p>\r\n\r\n<ul>\r\n	<li>Ch&uacute;ng t&ocirc;i chỉ gửi th&ocirc;ng tin li&ecirc;n quan đến nh&agrave; ở cho thu&ecirc;, c&aacute;c chương tr&igrave;nh khuyến m&atilde;i của ch&uacute;ng t&ocirc;i, v&agrave; chắc chắn kh&ocirc;ng gửi th&ocirc;ng tin về h&agrave;ng h&oacute;a v&agrave; dịch vụ kh&aacute;c nằm b&ecirc;n ngo&agrave;i phạm vi v&agrave; bộ quy tắc ứng xử của ch&uacute;ng ta. Đặc biệt l&agrave; đối với h&agrave;ng h&oacute;a v&agrave; dịch vụ bị hạn chế bởi ch&iacute;nh phủ, chẳng hạn như:</li>\r\n	<li>S&uacute;ng săn, s&uacute;ng săn bắn đạn dược, vũ kh&iacute; thể thao, c&ocirc;ng cụ hỗ trợ li&ecirc;n quan;</li>\r\n	<li>Thuốc l&aacute; điếu, x&igrave; g&agrave; v&agrave; c&aacute;c dạng thuốc l&aacute; th&agrave;nh;</li>\r\n	<li>Bất kỳ loại rượu vang hoặc rượu động vật qu&yacute; hiếm v&agrave; thực vật, bao gồm cả vật sống v&agrave; c&aacute;c bộ phận của họ đ&atilde; được xử l&yacute;;</li>\r\n	<li>V&agrave; tất cả c&aacute;c h&agrave;ng h&oacute;a v&agrave; dịch vụ đ&atilde; được cấm v&agrave; hạn chế.</li>\r\n</ul>\r\n\r\n<p>3. Xem x&eacute;t v&agrave; x&aacute;c định th&ocirc;ng tin</p>\r\n\r\n<p>Trước khi đăng bất kỳ một b&agrave;i n&agrave;o đ&oacute;, ch&uacute;ng t&ocirc;i sẽ kiểm tra v&agrave; x&aacute;c nhận c&aacute;c th&ocirc;ng tin trước khi đăng n&oacute; tr&ecirc;n Website.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&ocirc;ng tin của mỗi b&agrave;i viết sẽ được kiểm duyệt bởi đội ngũ nh&acirc;n vi&ecirc;n c&oacute; tr&igrave;nh độ được đ&agrave;o tạo kĩ c&agrave;ng, ch&uacute;ng t&ocirc;i c&oacute; chuy&ecirc;n m&ocirc;n, nắm vững c&aacute;c quy định của ph&aacute;p luật hiện h&agrave;nh về quản l&yacute; nội dung Website. Nh&oacute;m ch&uacute;ng t&ocirc;i sẽ kịp thời ph&aacute;t hiện v&agrave; loại bỏ c&aacute;c nội dung vi phạm h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p><br />\r\n<strong>THANH TO&Aacute;N<br />\r\nI- H&Igrave;NH THỨC THANH TO&Aacute;N</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanh to&aacute;n trả trước bằng một trong c&aacute;c h&igrave;nh thức sau:</p>\r\n\r\n<p>(i) M&atilde; giảm gi&aacute; (Gift Code);</p>\r\n\r\n<p>(ii) V&iacute; luxstay</p>\r\n\r\n<p>(iii) Thẻ ATM trong nước (Thẻ ghi nợ/thanh to&aacute;n/trả trước nội địa);</p>\r\n\r\n<p>(iv) Thẻ thanh to&aacute;n quốc tế, thẻ t&iacute;n dụng. (Visa, Master, JCB, Amex)</p>\r\n\r\n<p>(v) Tiền mặt nộp v&agrave;o t&agrave;i khoản nộp v&agrave;o t&agrave;i khoản ng&acirc;n h&agrave;ng của C&ocirc;ng ty</p>\r\n\r\n<p><br />\r\n<strong>II- DANH S&Aacute;CH THẺ ĐƯỢC CHẤP NHẬN THANH TO&Aacute;N TRỰC TUYẾN</strong><br />\r\n<br />\r\n<strong>I. Thẻ quốc tế:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. Visa</p>\r\n\r\n<p>2. Master</p>\r\n\r\n<p>3. JCB</p>\r\n\r\n<p>4. American Express</p>\r\n\r\n<p><br />\r\n<strong>II. Thẻ nội địa:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. Ng&acirc;n h&agrave;ng TMCP Ngoại Thương Việt Nam (Vietcombank)</p>\r\n\r\n<p>2. Ng&acirc;n h&agrave;ng TMCP Kỹ Thương Việt Nam (Techcombank)</p>\r\n\r\n<p>3. Ng&acirc;n h&agrave;ng TMCP Quốc Tế (VIB)</p>\r\n\r\n<p>4. Ng&acirc;n h&agrave;ng TMCP Xuất Nhập Khẩu Việt Nam (EIB)</p>\r\n\r\n<p>5. Ng&acirc;n h&agrave;ng TMCP Qu&acirc;n Đội (MBank)</p>\r\n\r\n<p>6. Ng&acirc;n h&agrave;ng TMCP Ph&aacute;t Triển TP. Hồ Ch&iacute; Minh (HDBank)</p>\r\n\r\n<p>7. Ng&acirc;n h&agrave;ng TMCP &Aacute; Ch&acirc;u (ACB)</p>\r\n\r\n<p>8. Ng&acirc;n h&agrave;ng TMCP S&agrave;i G&ograve;n Thương T&iacute;n (Sacombank)</p>\r\n\r\n<p>9. Ng&acirc;n h&agrave;ng TMCP Quốc D&acirc;n (NCB)</p>\r\n\r\n<p>10. Ng&acirc;n h&agrave;ng TMCP H&agrave;ng Hải (MSB)</p>\r\n\r\n<p>11. Ng&acirc;n h&agrave;ng TMCP Việt &Aacute; (VAB)</p>\r\n\r\n<p>12. Ng&acirc;n h&agrave;ng TMCP Việt Nam Thịnh Vượng (VPB)</p>\r\n\r\n<p>13. Ng&acirc;n h&agrave;ng TMCP Dầu kh&iacute; to&agrave;n cầu (GPB)</p>\r\n\r\n<p>14. Ng&acirc;n h&agrave;ng TMCP Phương Đ&ocirc;ng (OCB)</p>\r\n\r\n<p>15. Ng&acirc;n h&agrave;ng TMCP Đại Dương (Oceanbank)</p>\r\n\r\n<p>16. Ng&acirc;n h&agrave;ng TMCP Bắc &Aacute; (BAB)</p>\r\n\r\n<p>17. Ng&acirc;n h&agrave;ng TMCP An B&igrave;nh (ABB)</p>\r\n\r\n<p>18. Ng&acirc;n h&agrave;ng TMCP Ti&ecirc;n Phong (TPB)</p>\r\n\r\n<p>19. Ng&acirc;n h&agrave;ng TMCP Bưu Điện Li&ecirc;n Việt (LPB)</p>\r\n\r\n<p>20. Ng&acirc;n h&agrave;ng TMCP S&agrave;i G&ograve;n H&agrave; Nội (SHB)</p>\r\n\r\n<p>21. Ng&acirc;n h&agrave;ng TMCP Bảo Việt (BVB)</p>\r\n\r\n<p>22. Ng&acirc;n h&agrave;ng TMCP C&ocirc;ng Thương Việt Nam (Vietinbank)</p>\r\n\r\n<p>23. Ng&acirc;n h&agrave;ng N&ocirc;ng Nghiệp v&agrave; Ph&aacute;t Triển N&ocirc;ng th&ocirc;n Việt Nam (VARB)</p>\r\n\r\n<p>24. Ng&acirc;n h&agrave;ng TMCP Đầu Tư v&agrave; Ph&aacute;t triển Việt Nam (BIDV)</p>\r\n\r\n<p>25. Ng&acirc;n h&agrave;ng TMCP Đ&ocirc;ng Nam &Aacute; (SeABank)</p>\r\n\r\n<p>26. Ng&acirc;n h&agrave;ng TMCP S&agrave;i G&ograve;n (SCB)</p>\r\n\r\n<p>27. Ng&acirc;n h&agrave;ng TMCP Đ&ocirc;ng &Aacute; (DongA Bank)</p>\r\n\r\n<p>28. Ng&acirc;n h&agrave;ng TMCP Ki&ecirc;n Long (Kienlongbank)</p>\r\n\r\n<p>29. Ng&acirc;n h&agrave;ng TMCP Nam &Aacute; (NamABank)</p>\r\n\r\n<p>30. Ng&acirc;n h&agrave;ng TMCP Đại Ch&uacute;ng (PVcombank)</p>\r\n\r\n<p>31. Ng&acirc;n h&agrave;ng TMCP Li&ecirc;n doanh Việt Nga (VRB)</p>\r\n\r\n<p>32. Ng&acirc;n h&agrave;ng TMCP Xăng dầu Petrolimex (PG Bank)</p>\r\n\r\n<p>33. Ng&acirc;n h&agrave;ng TNHH MTV Public Vietnam</p>\r\n\r\n<p>34. Ng&acirc;n h&agrave;ng TMCP S&agrave;i G&ograve;n C&ocirc;ng Thương (Saigonbank)</p>\r\n\r\n<p>&nbsp;</p>', 'Yzio_workstay3.png', '5OF6_workstay.png,j7US_workstay2.png,Yzio_workstay3.png', 'https://workstay.vn', 4, 1, 1, '2020-05-13 02:35:59', '2020-05-13 03:35:48'),
(2, 'Phần mềm thi trực tuyến tìm hiểu pháp luật phòng chống tham nhũng', 'phan-mem-thi-truc-tuyen-tim-hieu-phap-luat-phong-chong-tham-nhung-948291', 'Phần mềm thi trực tuyến được xây dựng triển khai cho học sinh thành phố Hà Nội tìm hiểu về phòng chống tham nhũng', '<p>Phần mềm thi trực tuyến được x&acirc;y dựng triển khai cho học sinh th&agrave;nh phố H&agrave; Nội t&igrave;m hiểu về ph&ograve;ng chống tham nhũng</p>', 'BO35_Screenshot_1.png', '08vu_Screenshot_1.png,YLAg_Screenshot_2.png,TSBp_Screenshot_3.png', 'http://thitructuyen.htnsoft.com/', 1, 1, 1, '2020-05-13 03:44:55', '2020-05-13 03:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Giáo dục', 'giao-duc', 1),
(2, 'Mạng xã hội', 'mang-xa-hoi', 1),
(4, 'Booking', 'booking', 1),
(6, 'Công thông tin điện tử', 'cong-thong-tin-dien-tu', 1),
(8, 'Quản lý thuế', 'quan-ly-thue', 1),
(11, 'Du lịch', 'du-lich', 1),
(12, 'Phần mềm', 'phan-mem', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(2) NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `phone`, `address`, `facebook`, `youtube`, `instagram`, `twitter`, `email`, `map`) VALUES
(1, '0986 533 386', 'Tầng 2, tòa C2, Vinaconex1, số 289A, Khuất Duy Tiến, Trung Hòa, Cầu Giấy, Hà Nội', 'https://www.facebook.com', 'https://www.youtube.com', 'https://www.instagram.com', 'https://www.twitter.com', 'htnsoftvietnam@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7212996036656!2d105.79081251501236!3d21.003806086011895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acaf9b434deb%3A0x9f146b741b804a00!2zMjg5YiBLaHXhuqV0IER1eSBUaeG6v24sIFRydW5nIEhvw6AsIFRoYW5oIFh1w6JuLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1586770258374!5m2!1svi!2s\" width=\"100%\" height=\"363\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `image` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tt` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `title`, `link`, `tt`) VALUES
(1, 'banner1.jpg', 'Ảnh silde 1', '', 1),
(2, 'banner2.png', 'Ảnh silde 2', NULL, 0),
(3, '1584187552_3951601_9517dd39fc5c6db50d75f90c56b05eda.jpg', 'Ảnh slide 3', NULL, 0),
(4, '1584187605_6262687_c65438f9a118f7551ac6eca377f75eca.jpg', 'Ảnh slide 4', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `birth` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cmnd` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_range` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_range` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_before` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_after` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(8) DEFAULT NULL,
  `bank_branch` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_owner_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `represent_position` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ward` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_code` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_range_tax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_range_tax` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org_address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificate` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `stt` int(1) NOT NULL DEFAULT 0,
  `is_vertified` int(1) NOT NULL DEFAULT 0,
  `forgot_password` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_user`, `firstname`, `middlename`, `lastname`, `fullname`, `phone`, `email`, `birth`, `address`, `gender`, `cmnd`, `date_range`, `place_range`, `img_before`, `img_after`, `bank_number`, `bank_id`, `bank_branch`, `bank_owner_name`, `represent_position`, `province`, `district`, `ward`, `org_name`, `tax_code`, `date_range_tax`, `address_range_tax`, `org_address`, `certificate`, `type`, `role`, `password`, `stt`, `is_vertified`, `forgot_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ACT162573', 'Phạm', 'Văn', 'Dương', 'Phạm Văn Dương', '0904654926', 'phamduong97info@gmail.com', '11/07/2021', '', '', '', '', '', '', '', '', 0, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '$2y$10$7vQOGyzJabKV17GypMAyiuIPFBcXT0qLJmZOyzjtXdPgVjzxgJ1ju', 1, 1, NULL, '5jCYTZAFKnBSmvEVo4mPEhe9cx8YzdROW0REQ6LhObpSJWZnpQfBGBirEgQq', '2021-07-08 08:12:02', '2021-07-13 04:17:22'),
(13, 'ACT162608333495', NULL, NULL, NULL, 'Lý Văn Nam', '0904654926', 'lynam99@gmail.com', '16/07/2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '$2y$10$vBxXoUSNrufXh7xJCGdv3elL52GbPKgE9I./S2wvSHkjuzESLUGTi', 1, 1, NULL, NULL, '2021-07-12 02:48:55', '2021-07-12 02:48:55'),
(14, 'ACT162608545954', 'Pham', 'Văn', 'Nam', 'Pham Văn Nam', '0904654922', 'nghiathanh2016@gmail.com', '16/07/2021', 'Ha noi', 'Nam', '0272622222', '07/07/2021', 'Hà Nội', '1626085459_15.jpg', '1626085459_37.jpg', '11332424224', 1000016, 'Mễ trì Hạ', 'Pham Duong', NULL, 'Ha Noi', 'Thanh xuân', 'Nhân chính', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '$2y$10$5RwX6u9OTyo1c7k80E9qe.uxw6fDN97Ps8C0Rmb/wm8w7pHk/l.2y', 1, 1, NULL, NULL, '2021-07-12 03:24:19', '2021-07-12 20:01:28'),
(15, 'ACT162614983296', NULL, NULL, NULL, 'Đấu giá viên 1', '0926225222', 'daugiavien1@gmail.com', '02/07/2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '$2y$10$/eLBHq1DJI4N.PzCRrMshuD8hT10vekTwB7/1QezReyEDZnV44Api', 1, 1, NULL, NULL, '2021-07-12 21:17:12', '2021-07-12 21:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `users_old`
--

CREATE TABLE `users_old` (
  `id` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `idcode` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `birth` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL,
  `stt` int(1) NOT NULL,
  `remember_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_old`
--

INSERT INTO `users_old` (`id`, `name`, `idcode`, `birth`, `email`, `phone`, `password`, `role`, `stt`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'Phạm Văn dương', 'AC307333', '01/01/1970', 'phamduong97info@gmail.com', NULL, '$2y$10$7vQOGyzJabKV17GypMAyiuIPFBcXT0qLJmZOyzjtXdPgVjzxgJ1ju', 1, 1, 'LAisOCYmlOZVNDlM6xZzHXsPcpkF8QocHcJmEFXAw6MlFVtEH5Ardeqe4QPA', '2021-07-09 16:53:57', '2020-05-13 09:31:28'),
(3, 'Lý Văn Nam', 'AC483636', '01/01/1970', 'lynam@gmail.com', NULL, '$2y$10$nxiBheSJ0WG29PnNFpMRjOJdM8Bz3R5DOyAhpHs30D3RCQy8gITlW', 2, 1, NULL, '2021-07-09 16:46:37', '2020-05-13 09:31:59'),
(4, 'Phạm Thu Hà', 'AC203363', '21/04/1994', 'phamthuha@gmail.com', '0904654922', '$2y$10$xeqqfYxPJ7c/.MZ9.o6sTOpVeYLEN7RJVILZWTz0AELr9iUc6gOVS', 2, 1, NULL, '2021-07-09 16:47:32', '2020-05-13 09:28:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mts` (`mts`);

--
-- Indexes for table `auction_categories`
--
ALTER TABLE `auction_categories`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `auction_history`
--
ALTER TABLE `auction_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auction_members`
--
ALTER TABLE `auction_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `bidders`
--
ALTER TABLE `bidders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_bidder` (`id_bidder`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_feedback`
--
ALTER TABLE `blog_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_reply_comments`
--
ALTER TABLE `blog_reply_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_settings`
--
ALTER TABLE `blog_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_types`
--
ALTER TABLE `blog_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_bidder` (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_old`
--
ALTER TABLE `users_old`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idocde` (`idcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auction_categories`
--
ALTER TABLE `auction_categories`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auction_history`
--
ALTER TABLE `auction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auction_members`
--
ALTER TABLE `auction_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bidders`
--
ALTER TABLE `bidders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `blog_feedback`
--
ALTER TABLE `blog_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_reply_comments`
--
ALTER TABLE `blog_reply_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog_settings`
--
ALTER TABLE `blog_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_types`
--
ALTER TABLE `blog_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_old`
--
ALTER TABLE `users_old`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;