-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 04, 2024 lúc 08:42 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id_admin`, `fname`, `email`, `password`, `level`) VALUES
(1, 'Lê Văn Hoàng', 'admin123@gmail.com', 'hoang123', 1),
(5, 'Thuận Mạc', 'thuan@gmail.com', '1234', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `preview_text` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id_blog`, `title`, `preview_text`, `content`, `created_at`) VALUES
(1, 'Have fun, learn and shine!', '<p>Does your hyperactive kid really need a good pair of shoes?</p>\r\n', '<p>Bạn đang t&igrave;m kiếm một đ&ocirc;i gi&agrave;y vừa đẹp, vừa bền, vừa thoải m&aacute;i cho b&eacute; y&ecirc;u của bạn? Bạn muốn b&eacute; c&oacute; thể chơi đ&ugrave;a, vui chơi v&agrave; học tập m&agrave; kh&ocirc;ng lo bị đau ch&acirc;n hay trơn trượt? H&atilde;y để ch&uacute;ng t&ocirc;i giới thiệu cho bạn sản phẩm gi&agrave;y gi&agrave;nh cho trẻ em của ch&uacute;ng t&ocirc;i. Đ&acirc;y l&agrave; những đ&ocirc;i gi&agrave;y được thiết kế đặc biệt cho c&aacute;c b&eacute; từ 3 tuổi trở l&ecirc;n, với nhiều m&agrave;u sắc, họa tiết v&agrave; kiểu d&aacute;ng kh&aacute;c nhau để ph&ugrave; hợp với sở th&iacute;ch v&agrave; c&aacute; t&iacute;nh của từng b&eacute;.H&atilde;y để b&eacute; y&ecirc;u của bạn trải nghiệm những đ&ocirc;i gi&agrave;y tuyệt vời của ch&uacute;ng t&ocirc;i ngay h&ocirc;m nay.</p>\r\n', '2023-11-11 06:16:54'),
(2, 'Spider-Man: Across the Spider-Verse', '<p>Du h&agrave;nh vũ trụ Nhện</p>\r\n', '<p>Premiere: 1/6/2023 in Viet Nam.<br />\r\nTiếp nối Spider-Man: Into the Spider-Verse. Miles Morales, một Người Nhện da m&agrave;u đến từ một vũ trụ song song. Trong phần phim n&agrave;y, Miles sẽ phải đối mặt với những kẻ th&ugrave; mới đến từ c&aacute;c vũ trụ nhện kh&aacute;c nhau, cũng như học c&aacute;ch l&agrave;m quen với c&aacute;c Người Nhện kh&aacute;c c&oacute; t&iacute;nh c&aacute;ch v&agrave; năng lực kh&aacute;c biệt. Bộ phim hứa hẹn sẽ mang đến cho kh&aacute;n giả những pha h&agrave;nh động m&atilde;n nh&atilde;n, những khoảnh khắc cảm x&uacute;c v&agrave; h&agrave;i hước, cũng như những b&agrave;i học &yacute; nghĩa về t&igrave;nh bạn, gia đ&igrave;nh v&agrave; tr&aacute;ch nhiệm. Spider-Man: Across the Spider-Verse l&agrave; bộ phim kh&ocirc;ng thể bỏ lỡ d&agrave;nh cho c&aacute;c fan của Người Nhện v&agrave; si&ecirc;u anh h&ugrave;ng.</p>\r\n', '2023-11-11 06:15:36'),
(8, 'Nike-Evulution', '<p>From meager capital to billion dollar company</p>\r\n', '<p>Từ số vốn 1200 USD &iacute;t ỏi ban đầu, chỉ sau 1 năm hoạt động thương hiệu Nike đ&atilde; b&aacute;n được 1.300 đ&ocirc;i gi&agrave;y Nhật Bản v&agrave; thu về được đến hơn 8000 USD. Đến năm 1965, đ&atilde; đạt doanh số đến 20 ngh&igrave;n USD. C&oacute; thể n&oacute;i, đ&acirc;y l&agrave; một con số cực kỳ ấn tượng l&uacute;c bấy giờ.</p>\r\n', '2023-11-11 06:11:03'),
(10, 'Nike brand logo', '<p>Do you understand the meaning of this simple logo?</p>\r\n', '<p>Nike nổi tiếng với logo h&igrave;nh &ldquo;swoosh&rdquo; của bản th&acirc;n.<br />\r\nTưởng chừng như đ&acirc;y chỉ l&agrave; một sự ngẫu hứng của thương hiệu, nhưng ẩn s&acirc;u b&ecirc;n trong logo n&agrave;y l&agrave; một &yacute; nghĩa v&ocirc; c&ugrave;ng s&acirc;u sắc.Logo của Nike bắt nguồn từ một vị thần v&ocirc; c&ugrave;ng mạnh mẽ v&agrave; quyền năng của Hy Lạp. V&agrave; Swoosh ch&iacute;nh đ&ocirc;i c&aacute;nh của vị thần đ&oacute;. C&ugrave;ng với đ&ocirc;i c&aacute;nh v&agrave; &yacute; ch&iacute; của m&igrave;nh, vị thần thoại n&agrave;y đ&atilde; chinh phục được khắp năm ch&acirc;u bốn bể. Đ&acirc;y cũng ch&iacute;nh l&agrave; mục đ&iacute;ch m&agrave; thương hiệu Nike muốn hướng đến bấy l&acirc;u nay.</p>\r\n', '2023-11-11 05:58:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(10) DEFAULT NULL,
  `id_con` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_customer`, `id_sp`, `name_product`, `image`, `price`, `qty`, `size`, `id_con`) VALUES
(5, 28, 273, 'Women-sn-24', 'hinhanh-1701068043Women_Allshoe_24.webp', 2100000, 2, '38', 0),
(181, 20, 272, 'Women-sn-23', 'hinhanh-1701067958Women_Allshoe_23.webp', 3600000, 1, '44', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat`
--

CREATE TABLE `cat` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cat`
--

INSERT INTO `cat` (`id_cat`, `name_cat`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids'),
(4, 'Orther');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat_items`
--

CREATE TABLE `cat_items` (
  `id_items` int(11) NOT NULL,
  `name_item` varchar(100) NOT NULL,
  `name_cat` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cat_items`
--

INSERT INTO `cat_items` (`id_items`, `name_item`, `name_cat`, `id_parent`) VALUES
(1, 'Sneakers', 1, 0),
(2, 'Football', 1, 0),
(3, 'Basketball', 1, 0),
(4, 'Trainning', 1, 0),
(5, 'Sneakers', 2, 0),
(6, 'Football', 2, 0),
(7, 'Basketball', 2, 0),
(8, 'Training', 2, 0),
(10, 'Sneakers', 3, 0),
(11, 'Football', 3, 0),
(77, 'Orther', 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_blog` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_cmt`, `id_customer`, `comment`, `created_at`, `id_blog`, `id_sp`) VALUES
(86, 18, 'The very good product', '2023-10-25 04:33:15', 0, 100),
(91, 30, 'the best product', '2023-11-29 07:38:34', 0, 134),
(92, 30, 'I like this brand', '2023-11-30 06:50:38', 0, 134),
(98, 20, 'helllo\n', '2024-01-02 01:37:31', 0, 273),
(99, 20, '😍😍😍😍😍', '2024-01-12 03:37:35', 0, 208);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int(11) NOT NULL,
  `fulname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id_contact`, `fulname`, `email`, `content`) VALUES
(20, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'fasdasd'),
(21, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'fasdasd'),
(22, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'fasdasd'),
(30, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'Nhân viên là việc thiếu nghiêm túc'),
(31, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'HOANGLE1310 VCB'),
(32, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'Zalo : 0935182753'),
(33, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'Tôi muốn trang web có nhiều chức năng hơn nữa'),
(34, 'Triệu Tăng Phước', 'tangphuoc@gmail.com', 'Sản phẩm của thương hiệu này rất đẹp'),
(36, 'Triệu Tăng Phước', 'tangphuoc@gmail.com', 'vku'),
(37, 'Triệu Tăng Phước', 'tangphuoc@gmail.com', 'Sản phẩm rất tốt'),
(38, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'ádasd'),
(39, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'adqwewqe'),
(40, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'adqwewqe'),
(41, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'adawdasda'),
(42, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'adawdasda'),
(43, 'hoanglee', 'hoanglv.22da@vku.udn.vn', 'adadasa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id_coupon` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `id_con` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id_coupon`, `code`, `discount`, `id_con`, `expiration_date`, `status`) VALUES
(1, 'CODE123', 10, 1, '2024-12-31', 1),
(2, 'DISCOUNT50', 50, 2, '2022-10-15', 1),
(3, 'PERCENT20', 20, 1, '2023-01-15', 1),
(4, 'AMOUNT30', 30, 2, '2022-11-30', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id_customer`, `fname`, `email`, `phone_number`, `password`) VALUES
(18, 'titran', 'titran@gmail.com', '', '202cb962ac59075b964b07152d234b70'),
(19, 'Lê Anh Khoa', 'anhkhoa@gmail.com', '', '202cb962ac59075b964b07152d234b70'),
(20, 'Tang Phuoc', 'tangphuoc@gmail.com', '0779535093', '202cb962ac59075b964b07152d234b70'),
(27, 'hoanglee', 'hoanglv.22da@vku.udn.vn', '', '202cb962ac59075b964b07152d234b70'),
(28, 'nhungle', 'hong@gmail.com', '', '202cb962ac59075b964b07152d234b70'),
(29, 'duy', 'duy@gmail.com', '', '392498b2f4ff406654fe128e4df9a138'),
(30, 'Thuan', 'truongthuan@gmail', '', '202cb962ac59075b964b07152d234b70'),
(31, 'mtp', 'vanlehoang122@gmail.com', '0935182753', '202cb962ac59075b964b07152d234b70'),
(32, 'Phạm Gia Vỹ', '221124022252@due.udn.vn', '', '202cb962ac59075b964b07152d234b70'),
(33, 'Phạm Gia Vỹ', 'giavy290704@gmail.com', '', '202cb962ac59075b964b07152d234b70'),
(34, 'lukomin', 'lukomin@gmail.com', '0123456789', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_products`
--

CREATE TABLE `img_products` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `img_products`
--

INSERT INTO `img_products` (`id`, `id_sp`, `img`) VALUES
(129, 43, '16213879390.jpg'),
(130, 43, '16213879401.jpg'),
(131, 43, '16213879402.jpg'),
(237, 72, '1621822349k2.jpg'),
(238, 72, '1621822349k3.jpg'),
(239, 72, '1621822349k4.jpg'),
(240, 73, '1621822433k5.jpeg'),
(241, 73, '1621822433k6.jpeg'),
(242, 73, '1621822433k7.jpeg'),
(243, 74, '1621822519kk2.jpg'),
(244, 74, '1621822519kk3.jpg'),
(245, 74, '1621822519kk1.jpg'),
(246, 75, '1621822615k-1.jpg'),
(247, 75, '1621822615k-2.jpg'),
(248, 75, '1621822615k-3.jpg'),
(279, 86, '1621823823v19.jpeg'),
(280, 86, '1621823823v20.jpeg'),
(281, 86, '1621823823v21.jpeg'),
(282, 87, '1621823913plo1.jpg'),
(283, 87, '1621823913plo2.jpg'),
(284, 87, '1621823913plo3.jpg'),
(285, 88, '1621824019vl1.jpg'),
(286, 88, '1621824019vl2.png'),
(287, 88, '1621824019vl3.jpg'),
(288, 89, '1621824140vl6.jpg'),
(289, 89, '1621824140vl4.jpg'),
(290, 89, '1621824140vl5.jpg'),
(300, 92, '1621824510hd3.jpg'),
(301, 92, '1621824510hd1.jpg'),
(302, 92, '1621824510hd2.jpg'),
(303, 93, '1621824594h1.jpg'),
(304, 93, '1621824595h2.jpg'),
(305, 93, '1621824595h3.jpg'),
(306, 94, '1623633485img_8588_a9b44d75dda943179a14b9d3eb036838_master.jpg'),
(307, 94, '1623633485img_8599_2f1ffa6d4337434c993ba71b1f44babc_master.jpg'),
(308, 94, '1623633485z2371863611285_98755f62d0880dd70216102ef501a855_91413a47587a43b29ece59f3979b9820_master.jp'),
(482, 134, '1699066654Men_Training_18.3.png'),
(483, 134, '1699066654Men_Training_18.2.png'),
(484, 134, '1699066654Men_Training_18.1.png'),
(485, 134, '1699066654Men_Training_18.webp'),
(486, 135, '1699066711Men_Training_17.2.png'),
(487, 135, '1699066711Men_Training_17.1.png'),
(488, 135, '1699066711Men_Training_17.webp'),
(489, 136, '1699066752Men_Training_16.3.png'),
(490, 136, '1699066752Men_Training_16.2.png'),
(491, 136, '1699066752Men_Training_16.1.png'),
(492, 136, '1699066752Men_Training_16.webp'),
(493, 137, '1699066855Men_Training_15.3.png'),
(494, 137, '1699066855Men_Training_15.2.png'),
(495, 137, '1699066855Men_Training_15.1.png'),
(496, 137, '1699066855Men_Training_15.webp'),
(497, 138, '1699066891Men_Training_14.3.png'),
(498, 138, '1699066891Men_Training_14.2.png'),
(499, 138, '1699066891Men_Training_14.1.png'),
(500, 138, '1699066891Men_Training_14.webp'),
(501, 139, '1699066928Men_Training_13.3.png'),
(502, 139, '1699066928Men_Training_13.2.png'),
(503, 139, '1699066928Men_Training_13.1.png'),
(504, 139, '1699066928Men_Training_13.webp'),
(505, 140, '1699067403Men_Training_12.3.png'),
(506, 140, '1699067403Men_Training_12.2.png'),
(507, 140, '1699067403Men_Training_12.1.png'),
(508, 140, '1699067403Men_Training_12.webp'),
(509, 141, '1699067446Men_Training_11.3.png'),
(510, 141, '1699067446Men_Training_11.2.png'),
(511, 141, '1699067446Men_Training_11.1.png'),
(512, 141, '1699067446Men_Training_11.webp'),
(513, 142, '1699067478Men_Training_10.3.png'),
(514, 142, '1699067478Men_Training_10.2.png'),
(515, 142, '1699067478Men_Training_10.1.png'),
(516, 142, '1699067478Men_Training_10.webp'),
(517, 142, '1699067796'),
(518, 135, '1699067819'),
(519, 136, '1699067833'),
(520, 141, '1699067844'),
(521, 142, '1699067857'),
(522, 140, '1699067865'),
(523, 139, '1699067876'),
(524, 138, '1699067885'),
(525, 137, '1699067898'),
(526, 143, '1699083661Men_Training_9.3.png'),
(527, 143, '1699083661Men_Training_9.2.png'),
(528, 143, '1699083661Men_Training_9.1.png'),
(529, 143, '1699083661Men_Training_9.webp'),
(530, 144, '1699083710Men_Training_8.3.png'),
(531, 144, '1699083710Men_Training_8.2.png'),
(532, 144, '1699083710Men_Training_8.1.png'),
(533, 144, '1699083710Men_Training_8.webp'),
(534, 145, '1699083751Men_Training_7.3.png'),
(535, 145, '1699083751Men_Training_7.2.png'),
(536, 145, '1699083751Men_Training_7.1.png'),
(537, 145, '1699083751Men_Training_7.webp'),
(538, 146, '1699083789Men_Training_6.3.png'),
(539, 146, '1699083789Men_Training_6.2.png'),
(540, 146, '1699083789Men_Training_6.1.png'),
(541, 146, '1699083789Men_Training_6.webp'),
(542, 146, '1699083825'),
(543, 147, '1699083855Men_Training_5.3.png'),
(544, 147, '1699083855Men_Training_5.2.png'),
(545, 147, '1699083855Men_Training_5.1.png'),
(546, 147, '1699083855Men_Training_5.webp'),
(547, 148, '1699083893Men_Training_4.3.png'),
(548, 148, '1699083893Men_Training_4.2.png'),
(549, 148, '1699083893Men_Training_4.1.png'),
(550, 148, '1699083893Men_Training_4.webp'),
(551, 149, '1699083932Men_Training_3.3.png'),
(552, 149, '1699083932Men_Training_3.2.png'),
(553, 149, '1699083932Men_Training_3.1.png'),
(554, 149, '1699083932Men_Training_3.webp'),
(555, 150, '1699083969Men_Training_2.3.png'),
(556, 150, '1699083969Men_Training_2.2.png'),
(557, 150, '1699083969Men_Training_2.1.png'),
(558, 150, '1699083969Men_Training_2.webp'),
(559, 151, '1699084050Men_Training_1.3.png'),
(560, 151, '1699084050Men_Training_1.2.png'),
(561, 151, '1699084050Men_Training_1.1.png'),
(562, 151, '1699084050Men_Training_1.webp'),
(563, 152, '1699434879Men_Basketball_24.3.png'),
(564, 152, '1699434879Men_Basketball_24.2.png'),
(565, 152, '1699434879Men_Basketball_24.1.png'),
(566, 152, '1699434879Men_Basketball_24.webp'),
(567, 153, '1699435005Men_Basketball_23.3.png'),
(568, 153, '1699435005Men_Basketball_23.2.png'),
(569, 153, '1699435005Men_Basketball_23.1.png'),
(570, 153, '1699435005Men_Basketball_23.webp'),
(571, 154, '1699435119Men_Basketball_22.3.png'),
(572, 154, '1699435119Men_Basketball_22.2.png'),
(573, 154, '1699435119Men_Basketball_22.1.png'),
(574, 154, '1699435119Men_Basketball_22.webp'),
(575, 155, '1699511921Men_Basketball_21.3.png'),
(576, 155, '1699511921Men_Basketball_21.2.png'),
(577, 155, '1699511921Men_Basketball_21.1.png'),
(578, 155, '1699511921Men_Basketball_21.webp'),
(579, 156, '1699511971Men_Basketball_20.3.png'),
(580, 156, '1699511971Men_Basketball_20.2.png'),
(581, 156, '1699511971Men_Basketball_20.1.png'),
(582, 156, '1699511971Men_Basketball_20.webp'),
(583, 157, '1699512169Men_Basketball_19.3.png'),
(584, 157, '1699512169Men_Basketball_19.2.png'),
(585, 157, '1699512169Men_Basketball_19.1.png'),
(586, 157, '1699512169Men_Basketball_19.webp'),
(587, 158, '1699512235Men_Basketball_18.3.png'),
(588, 158, '1699512235Men_Basketball_18.2.png'),
(589, 158, '1699512235Men_Basketball_18.1.png'),
(590, 158, '1699512235Men_Basketball_18.webp'),
(591, 158, '1699512258'),
(592, 159, '1699512329Men_Basketball_17.3.png'),
(593, 159, '1699512329Men_Basketball_17.2.png'),
(594, 159, '1699512329Men_Basketball_17.1.png'),
(595, 159, '1699512329Men_Basketball_17.webp'),
(596, 160, '1699512720Men_Basketball_16.3.png'),
(597, 160, '1699512720Men_Basketball_16.2.png'),
(598, 160, '1699512720Men_Basketball_16.1.png'),
(599, 160, '1699512720Men_Basketball_16.webp'),
(600, 160, '1699512761'),
(601, 161, '1699512804Men_Basketball_15.3.png'),
(602, 161, '1699512804Men_Basketball_15.2.png'),
(603, 161, '1699512804Men_Basketball_15.1.png'),
(604, 161, '1699512804Men_Basketball_15.webp'),
(605, 162, '1699512858Men_Basketball_14.3.png'),
(606, 162, '1699512858Men_Basketball_14.2.png'),
(607, 162, '1699512858Men_Basketball_14.1.png'),
(608, 162, '1699512858Men_Basketball_14.webp'),
(609, 163, '1699512916Men_Basketball_13.3.png'),
(610, 163, '1699512916Men_Basketball_13.2.png'),
(611, 163, '1699512916Men_Basketball_13.1.png'),
(612, 163, '1699512916Men_Basketball_13.webp'),
(613, 164, '1699512966Men_Basketball_12.3.png'),
(614, 164, '1699512966Men_Basketball_12.2.png'),
(615, 164, '1699512966Men_Basketball_12.1.png'),
(616, 164, '1699512966Men_Basketball_12.webp'),
(617, 165, '1699513018Men_Basketball_11.3.png'),
(618, 165, '1699513018Men_Basketball_11.2.png'),
(619, 165, '1699513018Men_Basketball_11.1.png'),
(620, 165, '1699513018Men_Basketball_11.webp'),
(621, 166, '1699513071Men_Basketball_10.3.png'),
(622, 166, '1699513071Men_Basketball_10.2.png'),
(623, 166, '1699513071Men_Basketball_10.1.png'),
(624, 166, '1699513071Men_Basketball_10.webp'),
(625, 167, '1699513134Men_Basketball_9.3.png'),
(626, 167, '1699513134Men_Basketball_9.2.png'),
(627, 167, '1699513134Men_Basketball_9.1.png'),
(628, 167, '1699513134Men_Basketball_9.webp'),
(629, 168, '1699513188Men_Basketball_8.3.png'),
(630, 168, '1699513188Men_Basketball_8.2.png'),
(631, 168, '1699513188Men_Basketball_8.1.png'),
(632, 168, '1699513188Men_Basketball_8.webp'),
(633, 169, '1699513693Men_Basketball_6.3.png'),
(634, 169, '1699513693Men_Basketball_6.2.png'),
(635, 169, '1699513693Men_Basketball_6.1.png'),
(636, 169, '1699513693Men_Basketball_6.webp'),
(637, 170, '1699513747Men_Basketball_6.3.png'),
(638, 170, '1699513747Men_Basketball_6.2.png'),
(639, 170, '1699513747Men_Basketball_6.1.png'),
(640, 170, '1699513747Men_Basketball_6.webp'),
(641, 171, '1699513905Men_Basketball_5.3.png'),
(642, 171, '1699513905Men_Basketball_5.2.png'),
(643, 171, '1699513905Men_Basketball_5.1.png'),
(644, 171, '1699513905Men_Basketball_5.webp'),
(645, 172, '1699514003Men_Basketball_4.3.png'),
(646, 172, '1699514003Men_Basketball_4.2.png'),
(647, 172, '1699514003Men_Basketball_4.1.png'),
(648, 172, '1699514003Men_Basketball_4.webp'),
(649, 173, '1699514061Men_Basketball_3.3.png'),
(650, 173, '1699514061Men_Basketball_3.2.png'),
(651, 173, '1699514061Men_Basketball_3.1.png'),
(652, 173, '1699514061Men_Basketball_3.webp'),
(653, 174, '1699514135Men_Basketball_2.3.png'),
(654, 174, '1699514135Men_Basketball_2.2.png'),
(655, 174, '1699514135Men_Basketball_2.1.png'),
(656, 174, '1699514135Men_Basketball_2.webp'),
(657, 175, '1699514175Men_Basketball_1.3.png'),
(658, 175, '1699514175Men_Basketball_1.2.png'),
(659, 175, '1699514175Men_Basketball_1.1.png'),
(660, 175, '1699514175Men_Basketball_1.webp'),
(661, 176, '1699514683Men_Football_21.3.png'),
(662, 176, '1699514683Men_Football_21.2.png'),
(663, 176, '1699514683Men_Football_21.1.png'),
(664, 176, '1699514683Men_Football_21.webp'),
(665, 177, '1699514757Men_Football_20.3.png'),
(666, 177, '1699514757Men_Football_20.2.png'),
(667, 177, '1699514757Men_Football_20.1.png'),
(668, 177, '1699514757Men_Football_20.webp'),
(669, 178, '1699514906Men_Football_19.3.png'),
(670, 178, '1699514906Men_Football_19.2.png'),
(671, 178, '1699514906Men_Football_19.1.png'),
(672, 178, '1699514906Men_Football_19.jpg'),
(673, 179, '1699515377Men_Football_18.3.png'),
(674, 179, '1699515377Men_Football_18.2.png'),
(675, 179, '1699515377Men_Football_18.1.png'),
(676, 179, '1699515377Men_Football_18.webp'),
(677, 180, '1699515446Men_Football_17.3.png'),
(678, 180, '1699515446Men_Football_17.2.png'),
(679, 180, '1699515446Men_Football_17.1.png'),
(680, 180, '1699515446Men_Football_17.webp'),
(681, 181, '1699515510Men_Football_16.3.png'),
(682, 181, '1699515510Men_Football_16.2.png'),
(683, 181, '1699515510Men_Football_16.1.png'),
(684, 181, '1699515510Men_Football_16.webp'),
(685, 182, '1699515693Men_Football_15.3.png'),
(686, 182, '1699515693Men_Football_15.2.png'),
(687, 182, '1699515693Men_Football_15.1.png'),
(688, 182, '1699515693Men_Football_15.webp'),
(689, 183, '1699515756Men_Football_14.3.png'),
(690, 183, '1699515756Men_Football_14.2.png'),
(691, 183, '1699515756Men_Football_14.1.png'),
(692, 183, '1699515756Men_Football_14.webp'),
(693, 184, '1699515846Men_Football_13.3.png'),
(694, 184, '1699515846Men_Football_13.2.png'),
(695, 184, '1699515846Men_Football_13.1.png'),
(696, 184, '1699515846Men_Football_13.webp'),
(697, 185, '1699515916Men_Football_12.3.png'),
(698, 185, '1699515916Men_Football_12.2.png'),
(699, 185, '1699515916Men_Football_12.1.png'),
(700, 185, '1699515916Men_Football_12.webp'),
(701, 186, '1699515978Men_Football_11.3.png'),
(702, 186, '1699515978Men_Football_11.2.png'),
(703, 186, '1699515978Men_Football_11.1.png'),
(704, 186, '1699515978Men_Football_11.webp'),
(705, 187, '1699516037Men_Football_10.3.png'),
(706, 187, '1699516037Men_Football_10.2.png'),
(707, 187, '1699516037Men_Football_10.1.png'),
(708, 187, '1699516037Men_Football_10.webp'),
(709, 188, '1699516084Men_Football_9.3.png'),
(710, 188, '1699516084Men_Football_9.2.png'),
(711, 188, '1699516084Men_Football_9.1.png'),
(712, 188, '1699516084Men_Football_9.webp'),
(713, 189, '1699516146Men_Football_8.1.png'),
(714, 189, '1699516146Men_Football_8.2.png'),
(715, 189, '1699516146Men_Football_8.3.png'),
(716, 189, '1699516146Men_Football_8.webp'),
(717, 190, '1699516199Men_Football_7.1.png'),
(718, 190, '1699516199Men_Football_7.2.png'),
(719, 190, '1699516199Men_Football_7.3.png'),
(720, 190, '1699516199Men_Football_7.webp'),
(721, 191, '1699516262Men_Football_6.1.png'),
(722, 191, '1699516262Men_Football_6.2.png'),
(723, 191, '1699516262Men_Football_6.3.png'),
(724, 191, '1699516262Men_Football_6.webp'),
(725, 192, '1699516305Men_Football_5.1.png'),
(726, 192, '1699516305Men_Football_5.2.png'),
(727, 192, '1699516305Men_Football_5.3.png'),
(728, 192, '1699516305Men_Football_5.webp'),
(729, 193, '1699516418Men_Football_4.1.png'),
(730, 193, '1699516418Men_Football_4.2.png'),
(731, 193, '1699516418Men_Football_4.3.png'),
(732, 193, '1699516418Men_Football_4.webp'),
(733, 194, '1699516467Men_Football_3.1.png'),
(734, 194, '1699516467Men_Football_3.2.png'),
(735, 194, '1699516467Men_Football_3.3.png'),
(736, 194, '1699516467Men_Football_3.webp'),
(737, 195, '1699516506Men_Football_2.1.png'),
(738, 195, '1699516506Men_Football_2.2.png'),
(739, 195, '1699516506Men_Football_2.3.png'),
(740, 195, '1699516506Men_Football_2.webp'),
(741, 196, '1699516544Men_Football_1.1.png'),
(742, 196, '1699516544Men_Football_1.2.png'),
(743, 196, '1699516544Men_Football_1.3.png'),
(744, 196, '1699516544Men_Football_1.webp'),
(745, 197, '1699516658Men_Allshoe_29.5.png'),
(746, 197, '1699516658Men_Allshoe_29.4.png'),
(747, 197, '1699516658Men_Allshoe_29.3.png'),
(748, 197, '1699516658Men_Allshoe_29.2.png'),
(749, 197, '1699516658Men_Allshoe_29.1.png'),
(750, 198, '1699516747Men_Allshoe_28.4.png'),
(751, 198, '1699516747Men_Allshoe_28.3.png'),
(752, 198, '1699516747Men_Allshoe_28.2.png'),
(753, 198, '1699516747Men_Allshoe_28.1.png'),
(754, 199, '1699516825Men_Allshoe_27.5.png'),
(755, 199, '1699516825Men_Allshoe_27.4.png'),
(756, 199, '1699516825Men_Allshoe_27.3.png'),
(757, 199, '1699516825Men_Allshoe_27.2.png'),
(758, 199, '1699516825Men_Allshoe_27.1.png'),
(759, 200, '1699516883Men_Allshoe_26.5.png'),
(760, 200, '1699516883Men_Allshoe_26.4.png'),
(761, 200, '1699516883Men_Allshoe_26.3.png'),
(762, 200, '1699516883Men_Allshoe_26.2.png'),
(763, 200, '1699516883Men_Allshoe_26.1.png'),
(764, 201, '1699516949Men_Allshoe_25.5.png'),
(765, 201, '1699516949Men_Allshoe_25.4.png'),
(766, 201, '1699516949Men_Allshoe_25.3.png'),
(767, 201, '1699516949Men_Allshoe_25.2.png'),
(768, 201, '1699516949Men_Allshoe_25.1.png'),
(769, 202, '1699516993Men_Allshoe_24.5.png'),
(770, 202, '1699516993Men_Allshoe_24.4.png'),
(771, 202, '1699516993Men_Allshoe_24.3.png'),
(772, 202, '1699516993Men_Allshoe_24.2.png'),
(773, 202, '1699516993Men_Allshoe_24.1.png'),
(774, 203, '1699517033Men_Allshoe_23.5.png'),
(775, 203, '1699517033Men_Allshoe_23.4.png'),
(776, 203, '1699517033Men_Allshoe_23.3.png'),
(777, 203, '1699517033Men_Allshoe_23.2.png'),
(778, 203, '1699517033Men_Allshoe_23.1.png'),
(779, 204, '1699517076Men_Allshoe_22.5.png'),
(780, 204, '1699517076Men_Allshoe_22.4.png'),
(781, 204, '1699517076Men_Allshoe_22.3.png'),
(782, 204, '1699517076Men_Allshoe_22.2.png'),
(783, 204, '1699517076Men_Allshoe_22.1.png'),
(784, 205, '1699517169Men_Allshoe_21.5.png'),
(785, 205, '1699517169Men_Allshoe_21.4.png'),
(786, 205, '1699517169Men_Allshoe_21.3.png'),
(787, 205, '1699517169Men_Allshoe_21.2.png'),
(788, 205, '1699517169Men_Allshoe_21.1.png'),
(789, 206, '1699517224Men_Allshoe_20.5.png'),
(790, 206, '1699517224Men_Allshoe_20.4.png'),
(791, 206, '1699517224Men_Allshoe_20.3.png'),
(792, 206, '1699517224Men_Allshoe_20.2.png'),
(793, 206, '1699517224Men_Allshoe_20.1.png'),
(794, 207, '1699517285Men_Allshoe_19.5.png'),
(795, 207, '1699517285Men_Allshoe_19.4.png'),
(796, 207, '1699517285Men_Allshoe_19.3.png'),
(797, 207, '1699517285Men_Allshoe_19.2.png'),
(798, 207, '1699517285Men_Allshoe_19.1.png'),
(799, 208, '1699517325Men_Allshoe_18.5.png'),
(800, 208, '1699517325Men_Allshoe_18.4.png'),
(801, 208, '1699517325Men_Allshoe_18.3.png'),
(802, 208, '1699517325Men_Allshoe_18.2.png'),
(803, 208, '1699517325Men_Allshoe_18.1.png'),
(804, 209, '1699517440Men_Allshoe_17.1.png'),
(805, 209, '1699517440Men_Allshoe_17.2.png'),
(806, 209, '1699517440Men_Allshoe_17.3.png'),
(807, 209, '1699517440Men_Allshoe_17.4.png'),
(808, 209, '1699517440Men_Allshoe_17.5.png'),
(809, 210, '1699517512Men_Allshoe_16.1.png'),
(810, 210, '1699517512Men_Allshoe_16.2.png'),
(811, 210, '1699517512Men_Allshoe_16.3.png'),
(812, 210, '1699517512Men_Allshoe_16.4.png'),
(813, 210, '1699517512Men_Allshoe_16.5.png'),
(814, 211, '1699517559Men_Allshoe_15.1.png'),
(815, 211, '1699517559Men_Allshoe_15.2.png'),
(816, 211, '1699517559Men_Allshoe_15.3.png'),
(817, 211, '1699517559Men_Allshoe_15.4.png'),
(818, 211, '1699517559Men_Allshoe_15.5.png'),
(819, 212, '1699517621Men_Allshoe_14.1.png'),
(820, 212, '1699517621Men_Allshoe_14.2.png'),
(821, 212, '1699517621Men_Allshoe_14.3.png'),
(822, 212, '1699517621Men_Allshoe_14.4.png'),
(823, 212, '1699517621Men_Allshoe_14.5.png'),
(824, 213, '1699517671Men_Allshoe_13.1.png'),
(825, 213, '1699517671Men_Allshoe_13.2.png'),
(826, 213, '1699517671Men_Allshoe_13.3.png'),
(827, 213, '1699517671Men_Allshoe_13.4.png'),
(828, 213, '1699517671Men_Allshoe_13.5.png'),
(829, 214, '1699517735Men_Allshoe_12.1.png'),
(830, 214, '1699517735Men_Allshoe_12.2.png'),
(831, 214, '1699517735Men_Allshoe_12.3.png'),
(832, 214, '1699517735Men_Allshoe_12.4.png'),
(833, 214, '1699517735Men_Allshoe_12.webp'),
(834, 215, '1699517794Men_Allshoe_11.1.png'),
(835, 215, '1699517794Men_Allshoe_11.2.png'),
(836, 215, '1699517794Men_Allshoe_11.3.png'),
(837, 215, '1699517794Men_Allshoe_11.4.png'),
(838, 215, '1699517794Men_Allshoe_11.5.png'),
(839, 216, '1699517877Men_Allshoe_10.1.png'),
(840, 216, '1699517877Men_Allshoe_10.2.png'),
(841, 216, '1699517877Men_Allshoe_10.3.png'),
(842, 216, '1699517877Men_Allshoe_10.4.png'),
(843, 216, '1699517877Men_Allshoe_10.5.png'),
(844, 217, '1699517951Men_Allshoe_9.1.png'),
(845, 217, '1699517951Men_Allshoe_9.2.png'),
(846, 217, '1699517951Men_Allshoe_9.3.png'),
(847, 217, '1699517951Men_Allshoe_9.4.png'),
(848, 217, '1699517951Men_Allshoe_9.5.png'),
(849, 218, '1699517992Men_Allshoe_8.1.png'),
(850, 218, '1699517992Men_Allshoe_8.2.png'),
(851, 218, '1699517992Men_Allshoe_8.3.png'),
(852, 218, '1699517992Men_Allshoe_8.4.png'),
(853, 218, '1699517992Men_Allshoe_8.5.png'),
(854, 219, '1699518030Men_Allshoe_7.1.png'),
(855, 219, '1699518030Men_Allshoe_7.2.png'),
(856, 219, '1699518030Men_Allshoe_7.3.png'),
(857, 219, '1699518030Men_Allshoe_7.4.png'),
(858, 219, '1699518030Men_Allshoe_7.5.png'),
(859, 220, '1699518093Men_Allshoe_6.1.png'),
(860, 220, '1699518093Men_Allshoe_6.2.png'),
(861, 220, '1699518093Men_Allshoe_6.3.png'),
(862, 220, '1699518093Men_Allshoe_6.4.png'),
(863, 220, '1699518093Men_Allshoe_6.5.png'),
(864, 221, '1699518198Men_Allshoe_5.1.png'),
(865, 221, '1699518198Men_Allshoe_5.2.png'),
(866, 221, '1699518198Men_Allshoe_5.3.png'),
(867, 221, '1699518198Men_Allshoe_5.4.png'),
(868, 221, '1699518198Men_Allshoe_5.5.png'),
(869, 222, '1699518254Men_Allshoe_4.1.png'),
(870, 222, '1699518254Men_Allshoe_4.2.png'),
(871, 222, '1699518254Men_Allshoe_4.3.png'),
(872, 222, '1699518254Men_Allshoe_4.4.png'),
(873, 222, '1699518254Men_Allshoe_4.5.png'),
(874, 223, '1699518292Men_Allshoe_3.1.png'),
(875, 223, '1699518292Men_Allshoe_3.2.png'),
(876, 223, '1699518292Men_Allshoe_3.3.png'),
(877, 223, '1699518292Men_Allshoe_3.4.png'),
(878, 223, '1699518292Men_Allshoe_3.5.png'),
(879, 224, '1699518352Men_Allshoe_2.1.png'),
(880, 224, '1699518352Men_Allshoe_2.2.png'),
(881, 224, '1699518352Men_Allshoe_2.3.png'),
(882, 224, '1699518352Men_Allshoe_2.4.png'),
(883, 224, '1699518352Men_Allshoe_2.5.png'),
(884, 225, '1699518410Men_Allshoe_1.1.png'),
(885, 225, '1699518410Men_Allshoe_1.2.png'),
(886, 225, '1699518410Men_Allshoe_1.3.png'),
(887, 225, '1699518410Men_Allshoe_1.4.png'),
(888, 225, '1699518410Men_Allshoe_1.5.png'),
(889, 226, '1699518629Orther_8.3.png'),
(890, 226, '1699518629Orther_8.2.png'),
(891, 226, '1699518629Orther_8.1.png'),
(892, 226, '1699518629Orther_8.webp'),
(893, 227, '1699518666Orther_7.3.png'),
(894, 227, '1699518666Orther_7.2.png'),
(895, 227, '1699518666Orther_7.1.png'),
(896, 227, '1699518666Orther_7.webp'),
(897, 227, '1699518702'),
(898, 226, '1699518712'),
(899, 228, '1699518767Orther_6.3.png'),
(900, 228, '1699518767Orther_6.2.png'),
(901, 228, '1699518767Orther_6.1.png'),
(902, 228, '1699518767Orther_6.webp'),
(903, 229, '1699518816Orther_5.3.png'),
(904, 229, '1699518816Orther_5.2.png'),
(905, 229, '1699518816Orther_5.1.png'),
(906, 229, '1699518816Orther_5.webp'),
(907, 230, '1699518873Orther_4.3.png'),
(908, 230, '1699518873Orther_4.2.png'),
(909, 230, '1699518873Orther_4.1.png'),
(910, 230, '1699518873Orther_4.webp'),
(911, 231, '1699518926Orther_3.3.png'),
(912, 231, '1699518926Orther_3.2.png'),
(913, 231, '1699518926Orther_3.1.png'),
(914, 231, '1699518926Orther_3.webp'),
(915, 232, '1699518979Orther_2.3.png'),
(916, 232, '1699518979Orther_2.2.png'),
(917, 232, '1699518979Orther_2.1.png'),
(918, 232, '1699518979Orther_2.webp'),
(919, 233, '1699519024Orther_1.3.png'),
(920, 233, '1699519024Orther_1.2.png'),
(921, 233, '1699519024Orther_1.1.png'),
(922, 233, '1699519024Orther_1.webp'),
(923, 234, '1699519105Kids_Football_4.3.png'),
(924, 234, '1699519105Kids_Football_4.2.png'),
(925, 234, '1699519105Kids_Football_4.1.png'),
(926, 234, '1699519105Kids_Football_4.webp'),
(927, 235, '1699519160Kids_Football_3.3.png'),
(928, 235, '1699519160Kids_Football_3.2.png'),
(929, 235, '1699519160Kids_Football_3.1.png'),
(930, 235, '1699519160Kids_Football_3.webp'),
(931, 236, '1699519209Kids_Football_2.3.png'),
(932, 236, '1699519209Kids_Football_2.2.png'),
(933, 236, '1699519209Kids_Football_2.1.png'),
(934, 236, '1699519209Kids_Football_2.webp'),
(935, 237, '1699519248Kids_Football_1.3.png'),
(936, 237, '1699519248Kids_Football_1.2.png'),
(937, 237, '1699519248Kids_Football_1.1.png'),
(938, 237, '1699519248Kids_Football_1.webp'),
(939, 238, '1699519403Kids_Allshoe_26.3.png'),
(940, 238, '1699519403Kids_Allshoe_26.2.png'),
(941, 238, '1699519403Kids_Allshoe_26.1.png'),
(942, 238, '1699519403Kids_Allshoe_26.webp'),
(943, 239, '1699519489Kids_Allshoe_25.3.png'),
(944, 239, '1699519489Kids_Allshoe_25.2.png'),
(945, 239, '1699519489Kids_Allshoe_25.1.png'),
(946, 239, '1699519489Kids_Allshoe_25.webp'),
(947, 240, '1699519561Kids_Allshoe_24.2.png'),
(948, 240, '1699519561Kids_Allshoe_24.1.png'),
(949, 240, '1699519561Kids_Allshoe_24.webp'),
(950, 241, '1699519629Kids_Allshoe_23.3.png'),
(951, 241, '1699519629Kids_Allshoe_23.2.png'),
(952, 241, '1699519629Kids_Allshoe_23.1.png'),
(953, 241, '1699519629Kids_Allshoe_23.webp'),
(958, 136, '1700218654Men_Training_16.3.png'),
(959, 136, '1700218654Men_Training_16.2.png'),
(960, 136, '1700218654Men_Training_16.1.png'),
(961, 136, '1700218654Men_Training_16.webp'),
(968, 241, '1700280246Kids_Allshoe_23.3.png'),
(969, 241, '1700280246Kids_Allshoe_23.2.png'),
(970, 241, '1700280246Kids_Allshoe_23.1.png'),
(971, 241, '1700280246Kids_Allshoe_23.webp'),
(972, 240, '1700280292Kids_Allshoe_24.2.png'),
(973, 240, '1700280292Kids_Allshoe_24.1.png'),
(974, 240, '1700280292Kids_Allshoe_24.webp'),
(975, 239, '1700280319Kids_Allshoe_25.3.png'),
(976, 239, '1700280319Kids_Allshoe_25.2.png'),
(977, 239, '1700280319Kids_Allshoe_25.1.png'),
(978, 239, '1700280319Kids_Allshoe_25.webp'),
(979, 238, '1700280346Kids_Allshoe_26.3.png'),
(980, 238, '1700280346Kids_Allshoe_26.2.png'),
(981, 238, '1700280346Kids_Allshoe_26.1.png'),
(982, 238, '1700280346Kids_Allshoe_26.webp'),
(983, 241, '1700294869'),
(984, 241, '1700294885'),
(985, 225, '1700413018Men_Allshoe_1.1.png'),
(986, 225, '1700413018Men_Allshoe_1.2.png'),
(987, 225, '1700413018Men_Allshoe_1.3.png'),
(988, 225, '1700413018Men_Allshoe_1.4.png'),
(989, 225, '1700413018Men_Allshoe_1.5.png'),
(990, 224, '1700413086Men_Allshoe_2.1.png'),
(991, 224, '1700413086Men_Allshoe_2.2.png'),
(992, 224, '1700413086Men_Allshoe_2.3.png'),
(993, 224, '1700413086Men_Allshoe_2.4.png'),
(994, 224, '1700413086Men_Allshoe_2.5.png'),
(995, 216, '1700498499Men_Allshoe_10.1.png'),
(996, 216, '1700498499Men_Allshoe_10.2.png'),
(997, 216, '1700498499Men_Allshoe_10.3.png'),
(998, 216, '1700498499Men_Allshoe_10.4.png'),
(999, 216, '1700498499Men_Allshoe_10.5.png'),
(1000, 230, '1700498626Orther_4.3.png'),
(1001, 230, '1700498626Orther_4.2.png'),
(1002, 230, '1700498626Orther_4.1.png'),
(1003, 230, '1700498626Orther_4.webp'),
(1004, 229, '1700498655Orther_5.3.png'),
(1005, 229, '1700498655Orther_5.2.png'),
(1006, 229, '1700498655Orther_5.1.png'),
(1007, 229, '1700498655Orther_5.webp'),
(1008, 231, '1700498681Orther_3.3.png'),
(1009, 231, '1700498681Orther_3.2.png'),
(1010, 231, '1700498681Orther_3.1.png'),
(1011, 231, '1700498681Orther_3.webp'),
(1012, 228, '1700498717Orther_6.3.png'),
(1013, 228, '1700498717Orther_6.2.png'),
(1014, 228, '1700498717Orther_6.1.png'),
(1015, 228, '1700498717Orther_6.webp'),
(1016, 227, '1700498745Orther_7.3.png'),
(1017, 227, '1700498745Orther_7.2.png'),
(1018, 227, '1700498745Orther_7.1.png'),
(1019, 227, '1700498745Orther_7.webp'),
(1020, 232, '1700498771Orther_2.3.png'),
(1021, 232, '1700498771Orther_2.2.png'),
(1022, 232, '1700498771Orther_2.1.png'),
(1023, 232, '1700498771Orther_2.webp'),
(1024, 233, '1700498793Orther_1.3.png'),
(1025, 233, '1700498793Orther_1.2.png'),
(1026, 233, '1700498793Orther_1.1.png'),
(1027, 233, '1700498793Orther_1.webp'),
(1028, 226, '1700498842Orther_8.3.png'),
(1029, 226, '1700498842Orther_8.2.png'),
(1030, 226, '1700498842Orther_8.1.png'),
(1031, 226, '1700498842Orther_8.webp'),
(1032, 236, '1700732502'),
(1033, 236, '1700732576'),
(1034, 236, '1700732756'),
(1035, 236, '1700732839'),
(1036, 237, '1700733851'),
(1037, 237, '1700733941'),
(1038, 237, '1700733952'),
(1039, 236, '1700733969'),
(1040, 237, '1700816158Kids_Football_1.3.png'),
(1041, 237, '1700816158Kids_Football_1.2.png'),
(1042, 237, '1700816158Kids_Football_1.1.png'),
(1043, 237, '1700816158Kids_Football_1.webp'),
(1044, 236, '1700816182Kids_Football_2.3.png'),
(1045, 236, '1700816182Kids_Football_2.2.png'),
(1046, 236, '1700816182Kids_Football_2.1.png'),
(1047, 236, '1700816182Kids_Football_2.webp'),
(1048, 235, '1700816263Kids_Football_3.3.png'),
(1049, 235, '1700816263Kids_Football_3.2.png'),
(1050, 235, '1700816263Kids_Football_3.1.png'),
(1051, 235, '1700816263Kids_Football_3.webp'),
(1052, 234, '1700816339Kids_Football_4.3.png'),
(1053, 234, '1700816339Kids_Football_4.2.png'),
(1054, 234, '1700816339Kids_Football_4.1.png'),
(1055, 234, '1700816339Kids_Football_4.webp'),
(1056, 223, '1700816379Men_Allshoe_3.1.png'),
(1057, 223, '1700816379Men_Allshoe_3.2.png'),
(1058, 223, '1700816379Men_Allshoe_3.3.png'),
(1059, 223, '1700816379Men_Allshoe_3.4.png'),
(1060, 223, '1700816379Men_Allshoe_3.5.png'),
(1061, 222, '1700816409Men_Allshoe_4.1.png'),
(1062, 222, '1700816409Men_Allshoe_4.2.png'),
(1063, 222, '1700816409Men_Allshoe_4.3.png'),
(1064, 222, '1700816409Men_Allshoe_4.4.png'),
(1065, 222, '1700816409Men_Allshoe_4.5.png'),
(1066, 221, '1700816587Men_Allshoe_5.1.png'),
(1067, 221, '1700816587Men_Allshoe_5.2.png'),
(1068, 221, '1700816587Men_Allshoe_5.3.png'),
(1069, 221, '1700816587Men_Allshoe_5.4.png'),
(1070, 221, '1700816587Men_Allshoe_5.5.png'),
(1071, 220, '1700905103Men_Allshoe_6.1.png'),
(1072, 220, '1700905103Men_Allshoe_6.2.png'),
(1073, 220, '1700905103Men_Allshoe_6.3.png'),
(1074, 220, '1700905103Men_Allshoe_6.4.png'),
(1075, 220, '1700905103Men_Allshoe_6.5.png'),
(1076, 219, '1700905131Men_Allshoe_7.1.png'),
(1077, 219, '1700905131Men_Allshoe_7.2.png'),
(1078, 219, '1700905131Men_Allshoe_7.3.png'),
(1079, 219, '1700905131Men_Allshoe_7.4.png'),
(1080, 219, '1700905131Men_Allshoe_7.5.png'),
(1081, 218, '1700905170Men_Allshoe_8.1.png'),
(1082, 218, '1700905170Men_Allshoe_8.2.png'),
(1083, 218, '1700905170Men_Allshoe_8.3.png'),
(1084, 218, '1700905170Men_Allshoe_8.4.png'),
(1085, 218, '1700905170Men_Allshoe_8.5.png'),
(1086, 217, '1700905304Men_Allshoe_9.1.png'),
(1087, 217, '1700905304Men_Allshoe_9.2.png'),
(1088, 217, '1700905304Men_Allshoe_9.3.png'),
(1089, 217, '1700905304Men_Allshoe_9.4.png'),
(1090, 217, '1700905304Men_Allshoe_9.5.png'),
(1091, 215, '1700905340Men_Allshoe_11.1.png'),
(1092, 215, '1700905340Men_Allshoe_11.2.png'),
(1093, 215, '1700905340Men_Allshoe_11.3.png'),
(1094, 215, '1700905340Men_Allshoe_11.4.png'),
(1095, 215, '1700905340Men_Allshoe_11.5.png'),
(1096, 214, '1700905496Men_Allshoe_12.1.png'),
(1097, 214, '1700905496Men_Allshoe_12.2.png'),
(1098, 214, '1700905496Men_Allshoe_12.3.png'),
(1099, 214, '1700905496Men_Allshoe_12.4.png'),
(1100, 213, '1700905556Men_Allshoe_13.1.png'),
(1101, 213, '1700905556Men_Allshoe_13.2.png'),
(1102, 213, '1700905556Men_Allshoe_13.3.png'),
(1103, 213, '1700905556Men_Allshoe_13.4.png'),
(1104, 213, '1700905556Men_Allshoe_13.5.png'),
(1105, 212, '1700905586Men_Allshoe_14.1.png'),
(1106, 212, '1700905586Men_Allshoe_14.2.png'),
(1107, 212, '1700905586Men_Allshoe_14.3.png'),
(1108, 212, '1700905586Men_Allshoe_14.4.png'),
(1109, 211, '1700905772Men_Allshoe_15.1.png'),
(1110, 211, '1700905772Men_Allshoe_15.2.png'),
(1111, 211, '1700905772Men_Allshoe_15.3.png'),
(1112, 211, '1700905772Men_Allshoe_15.4.png'),
(1113, 211, '1700905772Men_Allshoe_15.5.png'),
(1114, 210, '1700905817Men_Allshoe_16.1.png'),
(1115, 210, '1700905817Men_Allshoe_16.2.png'),
(1116, 210, '1700905817Men_Allshoe_16.3.png'),
(1117, 210, '1700905817Men_Allshoe_16.4.png'),
(1118, 210, '1700905817Men_Allshoe_16.5.png'),
(1119, 209, '1700905870Men_Allshoe_17.1.png'),
(1120, 209, '1700905870Men_Allshoe_17.2.png'),
(1121, 209, '1700905870Men_Allshoe_17.3.png'),
(1122, 209, '1700905870Men_Allshoe_17.4.png'),
(1123, 209, '1700905870Men_Allshoe_17.5.png'),
(1124, 208, '1700905920Men_Allshoe_18.1.png'),
(1125, 208, '1700905920Men_Allshoe_18.2.png'),
(1126, 208, '1700905920Men_Allshoe_18.3.png'),
(1127, 208, '1700905920Men_Allshoe_18.4.png'),
(1128, 208, '1700905920Men_Allshoe_18.5.png'),
(1129, 207, '1700905955Men_Allshoe_19.1.png'),
(1130, 207, '1700905955Men_Allshoe_19.2.png'),
(1131, 207, '1700905955Men_Allshoe_19.3.png'),
(1132, 207, '1700905955Men_Allshoe_19.4.png'),
(1133, 207, '1700905955Men_Allshoe_19.5.png'),
(1134, 206, '1700906159Men_Allshoe_20.1.png'),
(1135, 206, '1700906159Men_Allshoe_20.2.png'),
(1136, 206, '1700906159Men_Allshoe_20.3.png'),
(1137, 206, '1700906159Men_Allshoe_20.4.png'),
(1138, 206, '1700906159Men_Allshoe_20.5.png'),
(1139, 205, '1700906215Men_Allshoe_21.1.png'),
(1140, 205, '1700906215Men_Allshoe_21.2.png'),
(1141, 205, '1700906215Men_Allshoe_21.3.png'),
(1142, 205, '1700906215Men_Allshoe_21.4.png'),
(1143, 205, '1700906215Men_Allshoe_21.5.png'),
(1144, 204, '1700906345Men_Allshoe_22.1.png'),
(1145, 204, '1700906345Men_Allshoe_22.2.png'),
(1146, 204, '1700906345Men_Allshoe_22.3.png'),
(1147, 204, '1700906345Men_Allshoe_22.4.png'),
(1148, 204, '1700906345Men_Allshoe_22.5.png'),
(1149, 203, '1700906384Men_Allshoe_23.1.png'),
(1150, 203, '1700906384Men_Allshoe_23.2.png'),
(1151, 203, '1700906385Men_Allshoe_23.3.png'),
(1152, 203, '1700906385Men_Allshoe_23.4.png'),
(1153, 203, '1700906385Men_Allshoe_23.5.png'),
(1154, 202, '1700906445Men_Allshoe_24.1.png'),
(1155, 202, '1700906445Men_Allshoe_24.2.png'),
(1156, 202, '1700906445Men_Allshoe_24.3.png'),
(1157, 202, '1700906445Men_Allshoe_24.4.png'),
(1158, 202, '1700906445Men_Allshoe_24.5.png'),
(1159, 201, '1700906700Men_Allshoe_25.1.png'),
(1160, 201, '1700906700Men_Allshoe_25.2.png'),
(1161, 201, '1700906700Men_Allshoe_25.3.png'),
(1162, 201, '1700906700Men_Allshoe_25.4.png'),
(1163, 201, '1700906700Men_Allshoe_25.5.png'),
(1164, 200, '1700906854Men_Allshoe_26.1.png'),
(1165, 200, '1700906854Men_Allshoe_26.2.png'),
(1166, 200, '1700906854Men_Allshoe_26.3.png'),
(1167, 200, '1700906854Men_Allshoe_26.4.png'),
(1168, 200, '1700906854Men_Allshoe_26.5.png'),
(1169, 199, '1700906895Men_Allshoe_27.1.png'),
(1170, 199, '1700906895Men_Allshoe_27.2.png'),
(1171, 199, '1700906895Men_Allshoe_27.3.png'),
(1172, 199, '1700906895Men_Allshoe_27.4.png'),
(1173, 199, '1700906895Men_Allshoe_27.5.png'),
(1174, 198, '1700906929Men_Allshoe_28.1.png'),
(1175, 198, '1700906929Men_Allshoe_28.2.png'),
(1176, 198, '1700906929Men_Allshoe_28.3.png'),
(1177, 198, '1700906929Men_Allshoe_28.4.png'),
(1178, 197, '1700906991Men_Allshoe_29.1.png'),
(1179, 197, '1700906991Men_Allshoe_29.2.png'),
(1180, 197, '1700906991Men_Allshoe_29.3.png'),
(1181, 197, '1700906991Men_Allshoe_29.4.png'),
(1182, 197, '1700906991Men_Allshoe_29.5.png'),
(1183, 134, '1700907126Men_Training_18.3.png'),
(1184, 134, '1700907126Men_Training_18.2.png'),
(1185, 134, '1700907126Men_Training_18.1.png'),
(1186, 134, '1700907126Men_Training_18.webp'),
(1187, 135, '1700907164Men_Training_17.2.png'),
(1188, 135, '1700907164Men_Training_17.1.png'),
(1189, 135, '1700907164Men_Training_17.webp'),
(1190, 136, '1700907198Men_Training_16.3.png'),
(1191, 136, '1700907198Men_Training_16.2.png'),
(1192, 136, '1700907198Men_Training_16.1.png'),
(1193, 136, '1700907198Men_Training_16.webp'),
(1194, 137, '1700907231Men_Training_15.3.png'),
(1195, 137, '1700907231Men_Training_15.2.png'),
(1196, 137, '1700907231Men_Training_15.1.png'),
(1197, 137, '1700907231Men_Training_15.webp'),
(1198, 138, '1700907256Men_Training_14.3.png'),
(1199, 138, '1700907256Men_Training_14.2.png'),
(1200, 138, '1700907256Men_Training_14.1.png'),
(1201, 138, '1700907256Men_Training_14.webp'),
(1202, 139, '1700907427Men_Training_13.3.png'),
(1203, 139, '1700907427Men_Training_13.2.png'),
(1204, 139, '1700907427Men_Training_13.1.png'),
(1205, 139, '1700907427Men_Training_13.webp'),
(1206, 140, '1700907521Men_Training_12.3.png'),
(1207, 140, '1700907521Men_Training_12.2.png'),
(1208, 140, '1700907521Men_Training_12.1.png'),
(1209, 140, '1700907521Men_Training_12.webp'),
(1210, 141, '1700907682Men_Training_11.3.png'),
(1211, 141, '1700907682Men_Training_11.2.png'),
(1212, 141, '1700907682Men_Training_11.1.png'),
(1213, 141, '1700907682Men_Training_11.webp'),
(1214, 142, '1700907712Men_Training_10.3.png'),
(1215, 142, '1700907712Men_Training_10.2.png'),
(1216, 142, '1700907712Men_Training_10.1.png'),
(1217, 142, '1700907712Men_Training_10.webp'),
(1218, 143, '1700907816Men_Training_9.3.png'),
(1219, 143, '1700907816Men_Training_9.2.png'),
(1220, 143, '1700907816Men_Training_9.1.png'),
(1221, 143, '1700907816Men_Training_9.webp'),
(1222, 144, '1700907956Men_Training_8.3.png'),
(1223, 144, '1700907956Men_Training_8.2.png'),
(1224, 144, '1700907956Men_Training_8.1.png'),
(1225, 144, '1700907956Men_Training_8.webp'),
(1226, 145, '1700908047Men_Training_7.3.png'),
(1227, 145, '1700908047Men_Training_7.2.png'),
(1228, 145, '1700908047Men_Training_7.1.png'),
(1229, 145, '1700908047Men_Training_7.webp'),
(1230, 146, '1700908080Men_Training_6.3.png'),
(1231, 146, '1700908080Men_Training_6.2.png'),
(1232, 146, '1700908080Men_Training_6.1.png'),
(1233, 146, '1700908080Men_Training_6.webp'),
(1234, 147, '1700908111Men_Training_5.3.png'),
(1235, 147, '1700908111Men_Training_5.2.png'),
(1236, 147, '1700908111Men_Training_5.1.png'),
(1237, 147, '1700908111Men_Training_5.webp'),
(1238, 148, '1700908205Men_Training_4.3.png'),
(1239, 148, '1700908205Men_Training_4.2.png'),
(1240, 148, '1700908205Men_Training_4.1.png'),
(1241, 148, '1700908205Men_Training_4.webp'),
(1242, 149, '1700908253Men_Training_3.3.png'),
(1243, 149, '1700908253Men_Training_3.2.png'),
(1244, 149, '1700908253Men_Training_3.1.png'),
(1245, 149, '1700908253Men_Training_3.webp'),
(1246, 150, '1700908285Men_Training_2.3.png'),
(1247, 150, '1700908285Men_Training_2.2.png'),
(1248, 150, '1700908285Men_Training_2.1.png'),
(1249, 150, '1700908285Men_Training_2.webp'),
(1250, 151, '1700908322Men_Training_1.3.png'),
(1251, 151, '1700908322Men_Training_1.2.png'),
(1252, 151, '1700908322Men_Training_1.1.png'),
(1253, 151, '1700908322Men_Training_1.webp'),
(1254, 152, '1700908391Men_Basketball_24.3.png'),
(1255, 152, '1700908391Men_Basketball_24.2.png'),
(1256, 152, '1700908391Men_Basketball_24.1.png'),
(1257, 152, '1700908391Men_Basketball_24.webp'),
(1258, 153, '1700908416Men_Basketball_23.3.png'),
(1259, 153, '1700908416Men_Basketball_23.2.png'),
(1260, 153, '1700908416Men_Basketball_23.1.png'),
(1261, 153, '1700908416Men_Basketball_23.webp'),
(1262, 154, '1700908478Men_Basketball_22.3.png'),
(1263, 154, '1700908478Men_Basketball_22.2.png'),
(1264, 154, '1700908479Men_Basketball_22.1.png'),
(1265, 154, '1700908479Men_Basketball_22.webp'),
(1266, 155, '1700908506Men_Basketball_21.3.png'),
(1267, 155, '1700908506Men_Basketball_21.2.png'),
(1268, 155, '1700908506Men_Basketball_21.1.png'),
(1269, 155, '1700908506Men_Basketball_21.webp'),
(1270, 156, '1700908537Men_Basketball_20.3.png'),
(1271, 156, '1700908537Men_Basketball_20.2.png'),
(1272, 156, '1700908537Men_Basketball_20.1.png'),
(1273, 156, '1700908537Men_Basketball_20.webp'),
(1274, 157, '1700908923Men_Basketball_19.3.png'),
(1275, 157, '1700908923Men_Basketball_19.2.png'),
(1276, 157, '1700908923Men_Basketball_19.1.png'),
(1277, 157, '1700908923Men_Basketball_19.webp'),
(1278, 158, '1700910955Men_Basketball_18.3.png'),
(1279, 158, '1700910955Men_Basketball_18.2.png'),
(1280, 158, '1700910955Men_Basketball_18.1.png'),
(1281, 158, '1700910955Men_Basketball_18.webp'),
(1282, 159, '1700911026Men_Basketball_17.3.png'),
(1283, 159, '1700911026Men_Basketball_17.2.png'),
(1284, 159, '1700911026Men_Basketball_17.1.png'),
(1285, 159, '1700911026Men_Basketball_17.webp'),
(1286, 160, '1700911849Men_Basketball_16.3.png'),
(1287, 160, '1700911849Men_Basketball_16.2.png'),
(1288, 160, '1700911849Men_Basketball_16.1.png'),
(1289, 160, '1700911849Men_Basketball_16.webp'),
(1290, 161, '1700911876Men_Basketball_15.3.png'),
(1291, 161, '1700911876Men_Basketball_15.2.png'),
(1292, 161, '1700911876Men_Basketball_15.1.png'),
(1293, 161, '1700911876Men_Basketball_15.webp'),
(1294, 162, '1700911977Men_Basketball_14.3.png'),
(1295, 162, '1700911977Men_Basketball_14.2.png'),
(1296, 162, '1700911977Men_Basketball_14.1.png'),
(1297, 162, '1700911977Men_Basketball_14.webp'),
(1298, 163, '1700912017Men_Basketball_13.3.png'),
(1299, 163, '1700912017Men_Basketball_13.2.png'),
(1300, 163, '1700912017Men_Basketball_13.1.png'),
(1301, 163, '1700912017Men_Basketball_13.webp'),
(1302, 164, '1700912043Men_Basketball_12.3.png'),
(1303, 164, '1700912043Men_Basketball_12.2.png'),
(1304, 164, '1700912043Men_Basketball_12.1.png'),
(1305, 164, '1700912043Men_Basketball_12.webp'),
(1306, 165, '1700912088Men_Basketball_11.3.png'),
(1307, 165, '1700912088Men_Basketball_11.2.png'),
(1308, 165, '1700912088Men_Basketball_11.1.png'),
(1309, 165, '1700912088Men_Basketball_11.webp'),
(1310, 166, '1700912139Men_Basketball_10.3.png'),
(1311, 166, '1700912139Men_Basketball_10.2.png'),
(1312, 166, '1700912139Men_Basketball_10.1.png'),
(1313, 166, '1700912139Men_Basketball_10.webp'),
(1314, 167, '1700912299Men_Basketball_9.3.png'),
(1315, 167, '1700912299Men_Basketball_9.2.png'),
(1316, 167, '1700912299Men_Basketball_9.1.png'),
(1317, 167, '1700912299Men_Basketball_9.webp'),
(1318, 168, '1700912504Men_Basketball_8.3.png'),
(1319, 168, '1700912504Men_Basketball_8.2.png'),
(1320, 168, '1700912504Men_Basketball_8.1.png'),
(1321, 168, '1700912504Men_Basketball_8.webp'),
(1322, 169, '1700912649Men_Basketball_7.3.png'),
(1323, 169, '1700912649Men_Basketball_7.2.png'),
(1324, 169, '1700912649Men_Basketball_7.1.png'),
(1325, 169, '1700912649Men_Basketball_7.webp'),
(1326, 170, '1700912743Men_Basketball_6.3.png'),
(1327, 170, '1700912743Men_Basketball_6.2.png'),
(1328, 170, '1700912743Men_Basketball_6.1.png'),
(1329, 170, '1700912743Men_Basketball_6.webp'),
(1330, 171, '1700912779Men_Basketball_5.3.png'),
(1331, 171, '1700912779Men_Basketball_5.2.png'),
(1332, 171, '1700912779Men_Basketball_5.1.png'),
(1333, 171, '1700912779Men_Basketball_5.webp'),
(1334, 172, '1700912812Men_Basketball_4.3.png'),
(1335, 172, '1700912812Men_Basketball_4.2.png'),
(1336, 172, '1700912812Men_Basketball_4.1.png'),
(1337, 172, '1700912812Men_Basketball_4.webp'),
(1338, 173, '1700912839Men_Basketball_3.3.png'),
(1339, 173, '1700912839Men_Basketball_3.2.png'),
(1340, 173, '1700912839Men_Basketball_3.1.png'),
(1341, 173, '1700912839Men_Basketball_3.webp'),
(1342, 174, '1700912865Men_Basketball_2.3.png'),
(1343, 174, '1700912865Men_Basketball_2.2.png'),
(1344, 174, '1700912865Men_Basketball_2.1.png'),
(1345, 174, '1700912865Men_Basketball_2.webp'),
(1346, 175, '1700912890Men_Basketball_1.3.png'),
(1347, 175, '1700912890Men_Basketball_1.2.png'),
(1348, 175, '1700912890Men_Basketball_1.1.png'),
(1349, 175, '1700912890Men_Basketball_1.webp'),
(1350, 196, '1700912939Men_Football_1.1.png'),
(1351, 196, '1700912939Men_Football_1.2.png'),
(1352, 196, '1700912939Men_Football_1.3.png'),
(1353, 196, '1700912939Men_Football_1.webp'),
(1354, 195, '1700913053Men_Football_2.1.png'),
(1355, 195, '1700913054Men_Football_2.2.png'),
(1356, 195, '1700913054Men_Football_2.3.png'),
(1357, 195, '1700913054Men_Football_2.webp'),
(1358, 194, '1700913079Men_Football_3.1.png'),
(1359, 194, '1700913079Men_Football_3.2.png'),
(1360, 194, '1700913079Men_Football_3.3.png'),
(1361, 194, '1700913079Men_Football_3.webp'),
(1362, 193, '1700913108Men_Football_4.1.png'),
(1363, 193, '1700913108Men_Football_4.2.png'),
(1364, 193, '1700913108Men_Football_4.3.png'),
(1365, 193, '1700913108Men_Football_4.webp'),
(1366, 192, '1700913137Men_Football_5.1.png'),
(1367, 192, '1700913137Men_Football_5.2.png'),
(1368, 192, '1700913137Men_Football_5.3.png'),
(1369, 192, '1700913137Men_Football_5.webp'),
(1370, 191, '1700913208Men_Football_6.1.png'),
(1371, 191, '1700913208Men_Football_6.2.png'),
(1372, 191, '1700913208Men_Football_6.3.png'),
(1373, 191, '1700913208Men_Football_6.webp'),
(1374, 190, '1700913234Men_Football_7.1.png'),
(1375, 190, '1700913234Men_Football_7.2.png'),
(1376, 190, '1700913234Men_Football_7.3.png'),
(1377, 190, '1700913234Men_Football_7.webp'),
(1378, 189, '1700913260Men_Football_8.1.png'),
(1379, 189, '1700913260Men_Football_8.2.png'),
(1380, 189, '1700913260Men_Football_8.3.png'),
(1381, 189, '1700913260Men_Football_8.webp'),
(1382, 188, '1700913331Men_Football_9.1.png'),
(1383, 188, '1700913331Men_Football_9.2.png'),
(1384, 188, '1700913331Men_Football_9.3.png'),
(1385, 188, '1700913331Men_Football_9.webp'),
(1386, 187, '1700913370Men_Football_10.1.png'),
(1387, 187, '1700913370Men_Football_10.2.png'),
(1388, 187, '1700913370Men_Football_10.3.png'),
(1389, 187, '1700913370Men_Football_10.webp'),
(1390, 186, '1700913441Men_Football_11.1.png'),
(1391, 186, '1700913441Men_Football_11.2.png'),
(1392, 186, '1700913441Men_Football_11.3.png'),
(1393, 186, '1700913441Men_Football_11.webp'),
(1394, 185, '1700913488Men_Football_12.1.png'),
(1395, 185, '1700913488Men_Football_12.2.png'),
(1396, 185, '1700913488Men_Football_12.3.png'),
(1397, 185, '1700913488Men_Football_12.webp'),
(1398, 184, '1700913643Men_Football_13.1.png'),
(1399, 184, '1700913643Men_Football_13.2.png'),
(1400, 184, '1700913643Men_Football_13.3.png'),
(1401, 184, '1700913643Men_Football_13.webp'),
(1402, 183, '1700913816Men_Football_14.1.png'),
(1403, 183, '1700913816Men_Football_14.2.png'),
(1404, 183, '1700913816Men_Football_14.3.png'),
(1405, 183, '1700913816Men_Football_14.webp'),
(1406, 182, '1700913857Men_Football_15.1.png'),
(1407, 182, '1700913857Men_Football_15.2.png'),
(1408, 182, '1700913857Men_Football_15.3.png'),
(1409, 182, '1700913857Men_Football_15.webp'),
(1410, 181, '1700913881Men_Football_16.1.png'),
(1411, 181, '1700913881Men_Football_16.2.png'),
(1412, 181, '1700913881Men_Football_16.3.png'),
(1413, 181, '1700913881Men_Football_16.webp'),
(1414, 180, '1700913929Men_Football_17.1.png'),
(1415, 180, '1700913929Men_Football_17.2.png'),
(1416, 180, '1700913929Men_Football_17.3.png'),
(1417, 180, '1700913929Men_Football_17.webp'),
(1418, 179, '1700913968Men_Football_18.1.png'),
(1419, 179, '1700913968Men_Football_18.2.png'),
(1420, 179, '1700913968Men_Football_18.3.png'),
(1421, 179, '1700913968Men_Football_18.webp'),
(1422, 178, '1700914004Men_Football_19.1.png'),
(1423, 178, '1700914004Men_Football_19.2.png'),
(1424, 178, '1700914004Men_Football_19.3.png'),
(1425, 178, '1700914004Men_Football_19.jpg'),
(1426, 177, '1700914035Men_Football_20.1.png'),
(1427, 177, '1700914035Men_Football_20.2.png'),
(1428, 177, '1700914035Men_Football_20.3.png'),
(1429, 177, '1700914035Men_Football_20.webp'),
(1430, 176, '1700914070Men_Football_21.1.png'),
(1431, 176, '1700914070Men_Football_21.2.png'),
(1432, 176, '1700914070Men_Football_21.3.png'),
(1433, 176, '1700914070Men_Football_21.webp'),
(1440, 225, '1701004139Men_Allshoe_1.1.png'),
(1441, 225, '1701004139Men_Allshoe_1.2.png'),
(1442, 225, '1701004139Men_Allshoe_1.3.png'),
(1443, 225, '1701004139Men_Allshoe_1.4.png'),
(1444, 225, '1701004139Men_Allshoe_1.5.png'),
(1445, 225, '1701004139Men_Allshoe_1.webp'),
(1446, 250, '1701065785Women_Allshoe_1.3.png'),
(1447, 250, '1701065785Women_Allshoe_1.2.png'),
(1448, 250, '1701065785Women_Allshoe_1.1.png'),
(1449, 250, '1701065785Women_Allshoe_1.webp'),
(1450, 250, '1701065828'),
(1451, 251, '1701065886Women_Allshoe_2.3.png'),
(1452, 251, '1701065886Women_Allshoe_2.2.png'),
(1453, 251, '1701065886Women_Allshoe_2.1.png'),
(1454, 251, '1701065886Women_Allshoe_2.webp'),
(1455, 252, '1701065956Women_Allshoe_3.3.png'),
(1456, 252, '1701065956Women_Allshoe_3.2.png'),
(1457, 252, '1701065956Women_Allshoe_3.1.png'),
(1458, 252, '1701065956Women_Allshoe_3.webp'),
(1459, 253, '1701066064Women_Allshoe_4.3.png'),
(1460, 253, '1701066064Women_Allshoe_4.2.png'),
(1461, 253, '1701066064Women_Allshoe_4.1.png'),
(1462, 253, '1701066064Women_Allshoe_4.webp'),
(1463, 254, '1701066108Women_Allshoe_5.3.png'),
(1464, 254, '1701066108Women_Allshoe_5.2.png'),
(1465, 254, '1701066108Women_Allshoe_5.1.png'),
(1466, 254, '1701066108Women_Allshoe_5.webp'),
(1467, 255, '1701066155Women_Allshoe_6.3.png'),
(1468, 255, '1701066155Women_Allshoe_6.2.png'),
(1469, 255, '1701066155Women_Allshoe_6.1.png'),
(1470, 255, '1701066155Women_Allshoe_6.webp'),
(1471, 256, '1701066242Women_Allshoe_7.3.png'),
(1472, 256, '1701066242Women_Allshoe_7.2.png'),
(1473, 256, '1701066242Women_Allshoe_7.1.png'),
(1474, 256, '1701066242Women_Allshoe_7.webp'),
(1475, 256, '1701066251'),
(1476, 257, '1701066294Women_Allshoe_8.3.png'),
(1477, 257, '1701066294Women_Allshoe_8.2.png'),
(1478, 257, '1701066294Women_Allshoe_8.1.png'),
(1479, 257, '1701066294Women_Allshoe_8.webp'),
(1480, 257, '1701066312'),
(1481, 258, '1701066475Women_Allshoe_9.3.png'),
(1482, 258, '1701066475Women_Allshoe_9.2.png'),
(1483, 258, '1701066475Women_Allshoe_9.1.png'),
(1484, 258, '1701066475Women_Allshoe_9.webp'),
(1485, 259, '1701066550Women_Allshoe_10.3.png'),
(1486, 259, '1701066550Women_Allshoe_10.2.png'),
(1487, 259, '1701066550Women_Allshoe_10.1.png'),
(1488, 259, '1701066550Women_Allshoe_10.webp'),
(1489, 260, '1701066616Women_Allshoe_11.3.png'),
(1490, 260, '1701066616Women_Allshoe_11.2.png'),
(1491, 260, '1701066616Women_Allshoe_11.1.png'),
(1492, 260, '1701066616Women_Allshoe_11.webp'),
(1493, 261, '1701066673Women_Allshoe_12.3.png'),
(1494, 261, '1701066673Women_Allshoe_12.2.png'),
(1495, 261, '1701066673Women_Allshoe_12.1.png'),
(1496, 261, '1701066673Women_Allshoe_12.webp'),
(1497, 262, '1701066915Women_Allshoe_13.3.png'),
(1498, 262, '1701066915Women_Allshoe_13.2.png'),
(1499, 262, '1701066915Women_Allshoe_13.1.png'),
(1500, 262, '1701066915Women_Allshoe_13.webp'),
(1501, 263, '1701066978Women_Allshoe_14.3.png'),
(1502, 263, '1701066978Women_Allshoe_14.2.png'),
(1503, 263, '1701066978Women_Allshoe_14.1.png'),
(1504, 263, '1701066978Women_Allshoe_14.webp'),
(1505, 264, '1701067156Women_Allshoe_15.3.png'),
(1506, 264, '1701067156Women_Allshoe_15.2.png'),
(1507, 264, '1701067156Women_Allshoe_15.1.png'),
(1508, 264, '1701067156Women_Allshoe_15.webp'),
(1509, 265, '1701067234Women_Allshoe_16.3.png'),
(1510, 265, '1701067234Women_Allshoe_16.2.png'),
(1511, 265, '1701067234Women_Allshoe_16.1.png'),
(1512, 265, '1701067234Women_Allshoe_16.webp'),
(1513, 266, '1701067288Women_Allshoe_17.3.png'),
(1514, 266, '1701067288Women_Allshoe_17.2.png'),
(1515, 266, '1701067288Women_Allshoe_17.1.png'),
(1516, 266, '1701067288Women_Allshoe_17.webp'),
(1517, 267, '1701067348Women_Allshoe_18.3.png'),
(1518, 267, '1701067348Women_Allshoe_18.2.png'),
(1519, 267, '1701067348Women_Allshoe_18.1.png'),
(1520, 267, '1701067348Women_Allshoe_18.webp'),
(1521, 268, '1701067573Women_Allshoe_19.3.png'),
(1522, 268, '1701067573Women_Allshoe_19.2.png'),
(1523, 268, '1701067573Women_Allshoe_19.1.png'),
(1524, 268, '1701067573Women_Allshoe_19.webp'),
(1525, 269, '1701067704Women_Allshoe_20.3.png'),
(1526, 269, '1701067704Women_Allshoe_20.2.png'),
(1527, 269, '1701067704Women_Allshoe_20.1.png'),
(1528, 269, '1701067704Women_Allshoe_20.jpg'),
(1529, 269, '1701067725'),
(1530, 270, '1701067762Women_Allshoe_21.3.png'),
(1531, 270, '1701067762Women_Allshoe_21.2.png'),
(1532, 270, '1701067762Women_Allshoe_21.1.png'),
(1533, 270, '1701067762Women_Allshoe_21.webp'),
(1534, 271, '1701067902Women_Allshoe_22.3.png'),
(1535, 271, '1701067902Women_Allshoe_22.2.png'),
(1536, 271, '1701067902Women_Allshoe_22.1.png'),
(1537, 271, '1701067902Women_Allshoe_22.webp'),
(1538, 271, '1701067914'),
(1539, 272, '1701067958Women_Allshoe_23.3.png'),
(1540, 272, '1701067958Women_Allshoe_23.2.png'),
(1541, 272, '1701067958Women_Allshoe_23.1.png'),
(1542, 272, '1701067958Women_Allshoe_23.webp'),
(1543, 273, '1701068043Women_Allshoe_24.3.png'),
(1544, 273, '1701068043Women_Allshoe_24.2.png'),
(1545, 273, '1701068043Women_Allshoe_24.1.png'),
(1546, 273, '1701068043Women_Allshoe_24.webp'),
(1547, 273, '1701068061'),
(1548, 274, '1701068273Women_Allshoe_25.3.png'),
(1549, 274, '1701068273Women_Allshoe_25.2.png'),
(1550, 274, '1701068273Women_Allshoe_25.1.png'),
(1551, 274, '1701068273Women_Allshoe_25.webp'),
(1552, 275, '1701068483Women_Allshoe_26.3.png'),
(1553, 275, '1701068483Women_Allshoe_26.2.png'),
(1554, 275, '1701068483Women_Allshoe_26.1.png'),
(1555, 275, '1701068483Women_Allshoe_26.webp'),
(1556, 275, '1701068510Women_Allshoe_26.3.png'),
(1557, 275, '1701068510Women_Allshoe_26.2.png'),
(1558, 275, '1701068510Women_Allshoe_26.1.png'),
(1559, 275, '1701068510Women_Allshoe_26.webp'),
(1560, 276, '1701068540Women_Allshoe_27.3.png'),
(1561, 276, '1701068540Women_Allshoe_27.2.png'),
(1562, 276, '1701068540Women_Allshoe_27.1.png'),
(1563, 276, '1701068540Women_Allshoe_27.webp'),
(1564, 231, '1701242038'),
(1565, 232, '1701242051'),
(1583, 288, '1702220257Men_Football_1.1.png'),
(1584, 288, '1702220257Men_Football_1.2.png'),
(1585, 288, '1702220257Men_Football_1.3.png'),
(1586, 288, '1702220257Men_Football_1.webp'),
(1587, 288, '1704788761'),
(1588, 276, '1704788790'),
(1591, 288, '1705047749'),
(1592, 288, '1705047760'),
(1593, 274, '1705078082'),
(1594, 273, '1705540540');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `id_customer`, `address`, `phone`, `status`, `date`, `payment`) VALUES
(96, 18, '', '', 1, '2023-11-06 10:05:07', 1),
(97, 18, '', '', 0, '2023-11-06 10:15:06', 1),
(98, 18, '', '', 0, '2023-11-06 10:41:02', 1),
(99, 20, 'an hội lỏ', '113', 0, '2023-11-19 03:06:07', 1),
(100, 20, 'an hội lỏ', '113', 0, '2023-11-19 03:28:37', 1),
(101, 27, '01 nguyễn đình hiển', '0935182753', 0, '2023-11-21 15:54:21', 1),
(102, 27, '', '', 0, '2023-11-21 16:05:04', 1),
(103, 20, 'an hội lỏ', '113', 0, '2023-11-25 13:55:39', 1),
(104, 20, 'an hội lỏ', '113', 0, '2023-11-25 14:10:45', 1),
(105, 20, 'an hội lỏ', '113', 0, '2023-11-25 14:17:53', 1),
(106, 20, 'an hội lỏ', '113', 0, '2023-11-25 14:28:05', 1),
(107, 20, 'an hội lỏ', '113', 0, '2023-11-26 04:41:11', 1),
(108, 20, 'an hội lỏ', '113', 0, '2023-11-26 04:43:45', 1),
(109, 20, 'an hội lỏ', '113', 0, '2023-11-26 04:48:51', 1),
(112, 30, '470 Trần Đại Nghĩa', '0935511357', 1, '2023-11-29 08:13:38', 1),
(113, 20, '470 Trần Đại Nghĩa', '0935511357', 1, '2023-11-29 16:22:35', 1),
(114, 20, '470 Trần Đại Nghĩa', '0935511357', 0, '2023-12-01 10:29:05', 1),
(115, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-01 10:51:58', 1),
(116, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-01 15:13:28', 1),
(117, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-01 15:31:07', 1),
(118, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-01 15:59:32', 1),
(119, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-02 10:25:40', 1),
(120, 20, 'An Hội, Hội An', '0935568975', 0, '2023-12-05 12:42:11', 1),
(121, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-05 13:56:48', 1),
(122, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-08 07:46:22', 1),
(123, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-08 07:47:05', 1),
(124, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-08 07:50:16', 1),
(125, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-08 07:50:50', 1),
(126, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-08 07:57:33', 1),
(127, 20, 'An Hội, Hội An', '0935568975', 1, '2023-12-08 09:57:57', 1),
(128, 20, '470 Trần Đại Nghĩa', '0935511357', 1, '2023-12-10 08:34:45', 1),
(129, 20, '470 Trần Đại Nghĩa', '0935511357', 1, '2023-12-10 09:12:07', 1),
(130, 20, '470 Trần Đại Nghĩa', '0935511357', 1, '2023-12-14 08:28:12', 1),
(131, 20, '470 Trần Đại Nghĩa', '0935511357', 1, '2024-01-01 14:58:53', 1),
(132, 20, '470 Trần Đại Nghĩa', '0935511357', 1, '2024-01-01 15:09:27', 1),
(133, 20, '470 Trần Đại Nghĩa', '0935511357', 1, '2024-01-02 01:04:26', 1),
(136, 20, '470 Trần Đại Nghĩa', '0935511357', 2, '2024-01-05 09:54:40', 1),
(137, 20, '470 Trần Đại Nghĩa', '0935511357', 1, '2024-01-05 15:20:37', 1),
(153, 31, '470 Trần Đại Nghĩa', '0935511357', 1, '2024-01-08 15:52:24', 1),
(154, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-08 16:17:11', 1),
(155, 20, '470 Trần Đại Nghĩa', '0935511357', 2, '2024-01-09 03:08:35', 1),
(156, 20, '470 Trần Đại Nghĩa', '0935511357', 1, '2024-01-09 04:02:13', 1),
(157, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 04:03:40', 1),
(158, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 04:15:38', 1),
(159, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 04:16:23', 1),
(160, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 04:24:34', 1),
(161, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 04:27:29', 1),
(162, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 04:30:24', 1),
(163, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 04:31:11', 1),
(164, 31, '01 nguyễn đình hiển', '0935182753', 1, '2024-01-09 04:34:58', 1),
(166, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 06:56:53', 1),
(167, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 07:01:55', 1),
(168, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 07:07:41', 1),
(169, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 07:11:40', 1),
(170, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 07:18:32', 1),
(171, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 07:22:10', 1),
(172, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 07:23:17', 1),
(173, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 07:25:30', 1),
(174, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 07:56:49', 1),
(175, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 08:01:23', 1),
(176, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 08:02:48', 1),
(177, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 08:04:05', 1),
(178, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 08:07:08', 1),
(179, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-09 08:11:42', 1),
(180, 32, '29 Lê Phụ Trần , Đà Nẵng', '0905043191', 0, '2024-01-09 08:36:24', 1),
(181, 33, '29 Lê Phụ Trần , Đà Nẵng', '0905043191', 0, '2024-01-09 08:40:42', 1),
(182, 31, '29 Lê Phụ Trần , Đà Nẵng', '0905043191', 0, '2024-01-09 08:56:44', 1),
(183, 33, '29 Lê Phụ Trần , Đà Nẵng', '0905043191', 1, '2024-01-09 08:59:13', 1),
(184, 20, '470 Trần Đại Nghĩa', '0935511357', 2, '2024-01-12 02:30:31', 1),
(185, 20, '470 Trần Đại Nghĩa', '0935511357', 2, '2024-01-12 02:32:48', 1),
(186, 20, '470 Trần Đại Nghĩa', '0935511357', 2, '2024-01-12 02:37:11', 1),
(187, 31, '01 nguyễn đình hiển', '0935182753', 0, '2024-01-12 16:14:47', 1),
(188, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-13 10:17:19', 1),
(189, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-15 01:33:47', 1),
(190, 31, '470 Trần Đại Nghĩa', '0935511357', 2, '2024-01-18 01:30:33', 1),
(191, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-23 16:15:33', 1),
(192, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-23 16:18:59', 1),
(193, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-24 10:03:23', 1),
(194, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-24 10:43:25', 1),
(195, 31, '470 Trần Đại Nghĩa', '0935511357', 2, '2024-01-24 10:46:48', 1),
(196, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-24 10:58:14', 1),
(197, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-24 11:05:56', 1),
(198, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-26 02:18:29', 1),
(199, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-26 02:45:09', 1),
(200, 31, '470 Trần Đại Nghĩa', '0935511357', 0, '2024-01-26 02:47:12', 1),
(201, 31, '01 nguyễn đình hiển', '0935182753', 0, '2024-02-22 12:20:33', 1),
(202, 31, '01 nguyễn đình hiển', '0935182753', 2, '2024-02-26 07:35:04', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id_order`, `id_sp`, `image`, `qty`, `price`, `size`) VALUES
(96, 151, NULL, 1, 4999000, NULL),
(98, 151, NULL, 1, 4999000, NULL),
(99, 241, NULL, 1, 2999000, NULL),
(100, 240, NULL, 1, 3299000, NULL),
(101, 225, NULL, 1, 5999000, NULL),
(102, 224, NULL, 1, 5500000, NULL),
(103, 235, NULL, 1, 2500000, NULL),
(103, 135, NULL, 1, 1900000, NULL),
(104, 134, NULL, 1, 2400000, NULL),
(105, 134, 'hinhanh-1700907126Men_Training_18.webp', 1, 2400000, NULL),
(106, 138, 'hinhanh-1700907256Men_Training_14.webp', 1, 3100000, NULL),
(107, 136, 'hinhanh-1700907198Men_Training_16.webp', 1, 2900000, NULL),
(107, 135, 'hinhanh-1700907164Men_Training_17.webp', 1, 1900000, NULL),
(107, 135, 'hinhanh-1700907164Men_Training_17.webp', 1, 1900000, NULL),
(108, 141, 'hinhanh-1700907682Men_Training_11.webp', 1, 4500000, NULL),
(109, 136, 'hinhanh-1700907198Men_Training_16.webp', 1, 2900000, '37'),
(112, 134, 'hinhanh-1700907126Men_Training_18.webp', 1, 2400000, '37'),
(113, 135, 'hinhanh-1700907164Men_Training_17.webp', 1, 1900000, '37'),
(114, 135, 'hinhanh-1700907164Men_Training_17.webp', 1, 1900000, '37'),
(115, 135, 'hinhanh-1700907164Men_Training_17.webp', 1, 1900000, '37'),
(116, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(117, 143, 'hinhanh-1700907816Men_Training_9.webp', 1, 4500000, '37'),
(118, 138, 'hinhanh-1700907256Men_Training_14.webp', 1, 3100000, '37'),
(119, 149, 'hinhanh-1700908253Men_Training_3.webp', 1, 2999000, '42'),
(120, 273, 'hinhanh-1701068043Women_Allshoe_24.webp', 1, 2100000, '37'),
(120, 274, 'hinhanh-1701068273Women_Allshoe_25.webp', 1, 3800000, '37'),
(121, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(121, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(121, 273, 'hinhanh-1701068043Women_Allshoe_24.webp', 1, 2100000, '37'),
(122, 259, 'hinhanh-1701066550Women_Allshoe_10.webp', 1, 4000000, '37'),
(123, 278, 'hinhanh-1701684488Men_Football_1.webp', 1, 2500000, '37'),
(124, 271, 'hinhanh-1701067901Women_Allshoe_22.webp', 1, 2300000, '37'),
(125, 270, 'hinhanh-1701067762Women_Allshoe_21.webp', 1, 3550000, '37'),
(126, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(127, 278, 'hinhanh-1701684488Men_Football_1.webp', 1, 2500000, '37'),
(127, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(128, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(129, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '42'),
(130, 227, 'hinhanh-1700498745Orther_7.webp', 1, 1500000, '42'),
(131, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 2, 3100000, '41'),
(132, 267, 'hinhanh-1701067348Women_Allshoe_18.webp', 1, 4100000, '37'),
(133, 272, 'hinhanh-1701067958Women_Allshoe_23.webp', 2, 3600000, '42'),
(136, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(137, 288, 'hinhanh-1702220257Men_Football_1.webp', 1, 2500000, '37'),
(137, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(153, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(154, 269, 'hinhanh-1701067704Women_Allshoe_20.jpg', 2, 4750000, '37'),
(154, 270, 'hinhanh-1701067762Women_Allshoe_21.webp', 1, 3550000, '37'),
(155, 273, 'hinhanh-1701068043Women_Allshoe_24.webp', 1, 2100000, '37'),
(156, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(156, 274, 'hinhanh-1701068273Women_Allshoe_25.webp', 1, 3800000, '37'),
(157, 259, 'hinhanh-1701066550Women_Allshoe_10.webp', 1, 4000000, '37'),
(157, 258, 'hinhanh-1701066475Women_Allshoe_9.webp', 2, 3700000, '46'),
(158, 267, 'hinhanh-1701067348Women_Allshoe_18.webp', 1, 4100000, '37'),
(159, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(160, 288, 'hinhanh-1702220257Men_Football_1.webp', 1, 2500000, '37'),
(161, 265, 'hinhanh-1701067234Women_Allshoe_16.webp', 1, 4300000, '37'),
(162, 264, 'hinhanh-1701067156Women_Allshoe_15.webp', 1, 4299000, '37'),
(163, 267, 'hinhanh-1701067348Women_Allshoe_18.webp', 1, 4100000, '37'),
(163, 288, 'hinhanh-1702220257Men_Football_1.webp', 1, 2500000, '37'),
(164, 272, 'hinhanh-1701067958Women_Allshoe_23.webp', 1, 3600000, '37'),
(166, 270, 'hinhanh-1701067762Women_Allshoe_21.webp', 1, 3550000, '37'),
(167, 176, 'hinhanh-1700914070Men_Football_21.webp', 1, 3550000, '37'),
(167, 153, 'hinhanh-1700908416Men_Basketball_23.webp', 1, 4299000, '37'),
(167, 146, 'hinhanh-1700908080Men_Training_6.webp', 1, 3600000, '37'),
(168, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(169, 269, 'hinhanh-1701067704Women_Allshoe_20.jpg', 1, 4750000, '37'),
(170, 264, 'hinhanh-1701067156Women_Allshoe_15.webp', 1, 4299000, '37'),
(171, 271, 'hinhanh-1701067901Women_Allshoe_22.webp', 1, 2300000, '37'),
(172, 272, 'hinhanh-1701067958Women_Allshoe_23.webp', 1, 3600000, '37'),
(173, 270, 'hinhanh-1701067762Women_Allshoe_21.webp', 1, 3550000, '37'),
(174, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(175, 271, 'hinhanh-1701067901Women_Allshoe_22.webp', 1, 2300000, '37'),
(176, 262, 'hinhanh-1701066915Women_Allshoe_13.webp', 1, 2999000, '37'),
(177, 267, 'hinhanh-1701067348Women_Allshoe_18.webp', 1, 4100000, '37'),
(178, 270, 'hinhanh-1701067762Women_Allshoe_21.webp', 1, 3550000, '37'),
(178, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(179, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(180, 288, 'hinhanh-1702220257Men_Football_1.webp', 1, 2500000, '42'),
(180, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 2, 3100000, '42'),
(181, 288, 'hinhanh-1702220257Men_Football_1.webp', 1, 2500000, '42'),
(181, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 2, 3100000, '42'),
(182, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(183, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(184, 270, 'hinhanh-1701067762Women_Allshoe_21.webp', 1, 3550000, '40'),
(184, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '42'),
(184, 269, 'hinhanh-1701067704Women_Allshoe_20.jpg', 1, 4750000, '37'),
(184, 258, 'hinhanh-1701066475Women_Allshoe_9.webp', 1, 3700000, '37'),
(185, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(186, 269, 'hinhanh-1701067704Women_Allshoe_20.jpg', 1, 4750000, '37'),
(187, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(188, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(189, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(189, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 2, 3100000, '44'),
(190, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(191, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(191, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(192, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(193, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(194, 288, 'hinhanh-1702220257Men_Football_1.webp', 1, 2500000, '37'),
(195, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 1, 4600000, '37'),
(196, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(197, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(198, 273, 'hinhanh-1701068043Women_Allshoe_24.webp', 1, 2100000, '37'),
(199, 276, 'hinhanh-1701068540Women_Allshoe_27.webp', 1, 3100000, '37'),
(200, 273, 'hinhanh-1701068043Women_Allshoe_24.webp', 1, 2100000, '37'),
(201, 275, 'hinhanh-1701068483Women_Allshoe_26.webp', 3, 4600000, '37'),
(202, 270, 'hinhanh-1701067762Women_Allshoe_21.webp', 1, 3550000, '42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_sp` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_items` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `detail` text NOT NULL,
  `hot_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_sp`, `id_cat`, `id_items`, `name_product`, `price`, `image`, `quantity`, `detail`, `hot_product`) VALUES
(134, 1, 4, 'Men-tn-18', 2400000, 'hinhanh-1700907126Men_Training_18.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(135, 1, 4, 'Men-tn-17', 1900000, 'hinhanh-1700907164Men_Training_17.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(136, 1, 4, 'Men-tn-16', 2900000, 'hinhanh-1700907198Men_Training_16.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(137, 1, 4, 'Men-tn-15', 2400000, 'hinhanh-1700907231Men_Training_15.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(138, 1, 4, 'Men-tn-14', 3100000, 'hinhanh-1700907256Men_Training_14.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(139, 1, 4, 'Men-tn-13', 2999000, 'hinhanh-1700907427Men_Training_13.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(140, 1, 4, 'Men-tn-12', 2200000, 'hinhanh-1700907521Men_Training_12.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(141, 1, 4, 'Men-tn-11', 4500000, 'hinhanh-1700907682Men_Training_11.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(142, 1, 4, 'Men-tn-10', 4100000, 'hinhanh-1700907712Men_Training_10.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(143, 1, 4, 'Men-tn-9', 4500000, 'hinhanh-1700907816Men_Training_9.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(144, 1, 4, 'Men-tn-8', 1990000, 'hinhanh-1700907956Men_Training_8.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(145, 1, 4, 'Men-tn-7', 2200000, 'hinhanh-1700908047Men_Training_7.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(146, 1, 4, 'Men-tn-6', 3600000, 'hinhanh-1700908080Men_Training_6.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(147, 1, 4, 'Men-tn-5', 2800000, 'hinhanh-1700908111Men_Training_5.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(148, 1, 4, 'Men-tn-4', 3400000, 'hinhanh-1700908205Men_Training_4.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(149, 1, 4, 'Men-tn-3', 2999000, 'hinhanh-1700908253Men_Training_3.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(150, 1, 4, 'Men-tn-2', 2400000, 'hinhanh-1700908285Men_Training_2.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(151, 1, 4, 'Men-tn-1', 4999000, 'hinhanh-1700908322Men_Training_1.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(152, 1, 3, 'Men-bk-24', 3299000, 'hinhanh-1700908391Men_Basketball_24.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(153, 1, 3, 'Men-bk-23', 4299000, 'hinhanh-1700908416Men_Basketball_23.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(154, 1, 3, 'Men-bk-22', 3400000, 'hinhanh-1700908478Men_Basketball_22.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(155, 1, 3, 'Men-bk-21', 3499000, 'hinhanh-1700908506Men_Basketball_21.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(156, 1, 3, 'Men-bk-20', 4100000, 'hinhanh-1700908537Men_Basketball_20.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(157, 1, 3, 'Men-bk-19', 3399000, 'hinhanh-1700908923Men_Basketball_19.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(158, 1, 3, 'Men-bk-18', 4290000, 'hinhanh-1700910955Men_Basketball_18.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(159, 1, 3, 'Men-bk-17', 2500000, 'hinhanh-1700911026Men_Basketball_17.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(160, 1, 3, 'Men-bk-16', 3600000, 'hinhanh-1700911849Men_Basketball_16.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(161, 1, 3, 'Men-bk-15', 2999000, 'hinhanh-1700911876Men_Basketball_15.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(162, 1, 3, 'Men-bk-14', 3750000, 'hinhanh-1700911977Men_Basketball_14.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(163, 1, 3, 'Men-bk-13', 4599000, 'hinhanh-1700912017Men_Basketball_13.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(164, 1, 3, 'Men-bk-12', 4300000, 'hinhanh-1700912043Men_Basketball_12.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(165, 1, 3, 'Men-bk-11', 4199000, 'hinhanh-1700912088Men_Basketball_11.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(166, 1, 3, 'Men-bk-10', 3799000, 'hinhanh-1700912139Men_Basketball_10.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(167, 1, 3, 'Men-bk-9', 2999000, 'hinhanh-1700912299Men_Basketball_9.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(168, 1, 3, 'Men-bk-8', 3459000, 'hinhanh-1700912504Men_Basketball_8.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(169, 1, 3, 'men-bk-7', 2899000, 'hinhanh-1700912649Men_Basketball_7.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(170, 1, 3, 'Men-bk-6', 3600000, 'hinhanh-1700912743Men_Basketball_6.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(171, 1, 3, 'Men-bk-5', 3599000, 'hinhanh-1700912779Men_Basketball_5.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(172, 1, 3, 'Men-bk-4', 4600000, 'hinhanh-1700912812Men_Basketball_4.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(173, 1, 3, 'Men-bk-3', 4200000, 'hinhanh-1700912839Men_Basketball_3.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(174, 1, 3, 'Men-bk-2', 5100000, 'hinhanh-1700912865Men_Basketball_2.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(175, 1, 3, 'Men-bk-1', 4700000, 'hinhanh-1700912890Men_Basketball_1.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(176, 1, 2, 'Men-fb-21', 3550000, 'hinhanh-1700914070Men_Football_21.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(177, 1, 2, 'Men-fb-20', 4100000, 'hinhanh-1700914035Men_Football_20.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(178, 1, 2, 'Men-fb-19', 3800000, 'hinhanh-1700914004Men_Football_19.jpg', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(179, 1, 2, 'Men-fb-18', 2500000, 'hinhanh-1700913968Men_Football_18.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(180, 1, 2, 'Men-fb-17', 3459000, 'hinhanh-1700913929Men_Football_17.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(181, 1, 2, 'Men-fb-16', 4499000, 'hinhanh-1700913881Men_Football_16.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(182, 1, 2, 'Men-fb-15', 4999000, 'hinhanh-1700913857Men_Football_15.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(183, 1, 2, 'Men-fb-14', 3999000, 'hinhanh-1700913816Men_Football_14.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(184, 1, 2, 'Men-fb-13', 4500000, 'hinhanh-1700913643Men_Football_13.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(185, 1, 2, 'Men-fb-12', 3550000, 'hinhanh-1700913488Men_Football_12.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(186, 1, 2, 'Men-fb-11', 4199000, 'hinhanh-1700913441Men_Football_11.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(187, 1, 2, 'Men-fb-10', 4000000, 'hinhanh-1700913370Men_Football_10.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(188, 1, 2, 'Men-fb-9', 4200000, 'hinhanh-1700913331Men_Football_9.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(189, 1, 2, 'Men-fb-8', 4100000, 'hinhanh-1700913260Men_Football_8.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(190, 1, 2, 'Men-fb-7', 3550000, 'hinhanh-1700913234Men_Football_7.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(191, 1, 2, 'Men-fb-6', 4200000, 'hinhanh-1700913208Men_Football_6.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(192, 1, 2, 'Men-fb-5', 4500000, 'hinhanh-1700913137Men_Football_5.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(193, 1, 2, 'Men-fb-4', 4199000, 'hinhanh-1700913108Men_Football_4.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(194, 1, 2, 'Men-fb-3', 4000000, 'hinhanh-1700913079Men_Football_3.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(195, 1, 2, 'Men-fb-2', 4500000, 'hinhanh-1700913053Men_Football_2.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(196, 1, 2, 'Men-fb-1', 4100000, 'hinhanh-1700912939Men_Football_1.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(197, 1, 1, 'Men-sn-29', 3755000, 'hinhanh-1700906991Men_Allshoe_29.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(198, 1, 1, 'Men-sn-28', 3499000, 'hinhanh-1700906929Men_Allshoe_28.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(199, 1, 1, 'Men-sn-27', 3299000, 'hinhanh-1700906895Men_Allshoe_27.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(200, 1, 1, 'Men-sn-26', 4300000, 'hinhanh-1700906854Men_Allshoe_26.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(201, 1, 1, 'Men-sn-25', 3799000, 'hinhanh-1700906700Men_Allshoe_25.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(202, 1, 1, 'Men-sn-24', 4300000, 'hinhanh-1700906445Men_Allshoe_24.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(203, 1, 1, 'Men-sn-23', 4599000, 'hinhanh-1700906384Men_Allshoe_23.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(204, 1, 1, 'Men-sn-22', 5100000, 'hinhanh-1700906345Men_Allshoe_22.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(205, 1, 1, 'Men-sn-21', 4500000, 'hinhanh-1700906215Men_Allshoe_21.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(206, 1, 1, 'Men-sn-20', 4700000, 'hinhanh-1700906159Men_Allshoe_20.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(207, 1, 1, 'Men-sn-19', 4800000, 'hinhanh-1700905955Men_Allshoe_19.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(208, 1, 1, 'Men-sn-18', 4600000, 'hinhanh-1700905920Men_Allshoe_18.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(209, 1, 1, 'Men-sn-17', 4599000, 'hinhanh-1700905870Men_Allshoe_17.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(210, 1, 1, 'Men-sn-16', 3999000, 'hinhanh-1700905817Men_Allshoe_16.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(211, 1, 1, 'Men-sn-15', 4500000, 'hinhanh-1700905772Men_Allshoe_15.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(212, 1, 1, 'Men-sn-14', 4799000, 'hinhanh-1700905586Men_Allshoe_14.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(213, 1, 1, 'Men-sn-13', 4899000, 'hinhanh-1700905556Men_Allshoe_13.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(214, 1, 1, 'Men-sn-12', 3499000, 'hinhanh-1700905496Men_Allshoe_12.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(215, 1, 1, 'Men-sn-11', 4689900, 'hinhanh-1700905340Men_Allshoe_11.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(216, 1, 1, 'Men-sn-10', 4500000, 'hinhanh-1700498499Men_Allshoe_10.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(217, 1, 1, 'Men-sn-9', 4999900, 'hinhanh-1700905304Men_Allshoe_9.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(218, 1, 1, 'Men-sn-8', 4799000, 'hinhanh-1700905170Men_Allshoe_8.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(219, 1, 1, 'Men-sn-7', 4999000, 'hinhanh-1700905131Men_Allshoe_7.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(220, 1, 1, 'Men-sn-6', 4689900, 'hinhanh-1700905103Men_Allshoe_6.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(221, 1, 1, 'Men-sn-5', 4999900, 'hinhanh-1700816587Men_Allshoe_5.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(222, 1, 1, 'Men-sn-4', 4500000, 'hinhanh-1700816409Men_Allshoe_4.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(223, 1, 1, 'Men-sn-3', 4800000, 'hinhanh-1700816379Men_Allshoe_3.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(224, 1, 1, 'Men-sn-2', 5500000, 'hinhanh-1700413086Men_Allshoe_2.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(225, 1, 1, 'Men-sn-1', 5999000, 'hinhanh-1700413018Men_Allshoe_1.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(226, 4, 77, 'Or-8', 1200000, 'hinhanh-1700498842Orther_8.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(227, 4, 77, 'Or-7', 1500000, 'hinhanh-1700498745Orther_7.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(228, 4, 77, 'Or-6', 999000, 'hinhanh-1700498717Orther_6.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(229, 4, 77, 'Or-5', 1300000, 'hinhanh-1700498655Orther_5.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(230, 4, 77, 'Or-4', 100000, 'hinhanh-1700498626Orther_4.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(231, 4, 77, 'Or-3', 100000, 'hinhanh-1700498681Orther_3.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(232, 4, 77, 'Or-2', 100000, 'hinhanh-1700498771Orther_2.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(233, 4, 77, 'Or-1', 1990000, 'hinhanh-1700498793Orther_1.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(234, 3, 11, 'Kid-fb-4', 1900000, 'hinhanh-1700816339Kids_Football_4.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(235, 3, 11, 'Kid-fb-3', 2500000, 'hinhanh-1700816263Kids_Football_3.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(236, 3, 11, 'Kid-fb-2', 2500000, 'hinhanh-1700816182Kids_Football_2.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(237, 3, 11, 'Kid-fb-1', 2999000, 'hinhanh-1700816157Kids_Football_1.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(238, 3, 10, 'Kid-sn-26', 3100000, 'hinhanh-1700280346Kids_Allshoe_26.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(239, 3, 10, 'Kid-sn-25', 3499000, 'hinhanh-1700280319Kids_Allshoe_25.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(240, 3, 10, 'Kid-sn-24', 3299000, 'hinhanh-1700280292Kids_Allshoe_24.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(241, 3, 10, 'Kid-sn-23', 2999000, 'hinhanh-1700280246Kids_Allshoe_23.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(250, 2, 5, 'Women-sn-1', 2999000, 'hinhanh-1701065785Women_Allshoe_1.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(251, 2, 5, 'Women-sn-2', 2999000, 'hinhanh-1701065886Women_Allshoe_2.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(252, 2, 5, 'Women-sn-3', 3400000, 'hinhanh-1701065956Women_Allshoe_3.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(253, 2, 5, 'Women-sn-4', 2500000, 'hinhanh-1701066064Women_Allshoe_4.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(254, 2, 5, 'Women-sn-5', 4300000, 'hinhanh-1701066108Women_Allshoe_5.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(255, 2, 5, 'Women-sn-6', 4500000, 'hinhanh-1701066155Women_Allshoe_6.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(256, 2, 5, 'Women-sn-7', 5500000, 'hinhanh-1701066242Women_Allshoe_7.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(257, 2, 5, 'Women-sn-8', 5590000, 'hinhanh-1701066294Women_Allshoe_8.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(258, 2, 5, 'Women-sn-9', 3700000, 'hinhanh-1701066475Women_Allshoe_9.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(259, 2, 5, 'Women-sn-10', 4000000, 'hinhanh-1701066550Women_Allshoe_10.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(260, 2, 5, 'Women-sn-11', 3499000, 'hinhanh-1701066616Women_Allshoe_11.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(261, 2, 5, 'Women-sn-12', 3499000, 'hinhanh-1701066673Women_Allshoe_12.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(262, 2, 5, 'Women-sn-13', 2999000, 'hinhanh-1701066915Women_Allshoe_13.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(263, 2, 5, 'Women-sn-14', 3799000, 'hinhanh-1701066978Women_Allshoe_14.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(264, 2, 5, 'Women-sn-15', 4299000, 'hinhanh-1701067156Women_Allshoe_15.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(265, 2, 5, 'Women-sn-16', 4300000, 'hinhanh-1701067234Women_Allshoe_16.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(266, 2, 5, 'Women-sn-17', 3550000, 'hinhanh-1701067288Women_Allshoe_17.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(267, 2, 5, 'Women-sn-18', 4100000, 'hinhanh-1701067348Women_Allshoe_18.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(268, 2, 5, 'Women-sn-19', 3999000, 'hinhanh-1701067573Women_Allshoe_19.webp', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(269, 2, 5, 'Women-sn-20', 4750000, 'hinhanh-1701067704Women_Allshoe_20.jpg', 200, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1);
INSERT INTO `products` (`id_sp`, `id_cat`, `id_items`, `name_product`, `price`, `image`, `quantity`, `detail`, `hot_product`) VALUES
(270, 2, 5, 'Women-sn-21', 3550000, 'hinhanh-1701067762Women_Allshoe_21.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(271, 2, 5, 'Women-sn-22', 2300000, 'hinhanh-1701067901Women_Allshoe_22.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(272, 2, 5, 'Women-sn-23', 3600000, 'hinhanh-1701067958Women_Allshoe_23.webp', 197, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 1),
(273, 2, 5, 'Women-sn-24', 2100000, 'hinhanh-1701068043Women_Allshoe_24.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 2),
(274, 2, 5, 'Women-sn-25', 3800000, 'hinhanh-1701068273Women_Allshoe_25.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 2),
(275, 2, 5, 'Women-sn-26', 4600000, 'hinhanh-1701068483Women_Allshoe_26.webp', 194, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 2),
(276, 2, 5, 'Nike Phantom GX 2 Elite LV8', 3100000, 'hinhanh-1701068540Women_Allshoe_27.webp', 193, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 2),
(288, 2, 2, 'Nike Mercurial Superfly 9', 2500000, 'hinhanh-1702220257Men_Football_1.webp', 199, '<p>Ditch the laces and get outside. These kicks feature Nike&#39;s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they&#39;re great for people with limited mobility&mdash;or anyone who wants a quicker way to get going.</p>\r\n', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id_cat`);

--
-- Chỉ mục cho bảng `cat_items`
--
ALTER TABLE `cat_items`
  ADD PRIMARY KEY (`id_items`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_cmt`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id_coupon`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Chỉ mục cho bảng `img_products`
--
ALTER TABLE `img_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_sp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT cho bảng `cat`
--
ALTER TABLE `cat`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `cat_items`
--
ALTER TABLE `cat_items`
  MODIFY `id_items` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id_coupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `img_products`
--
ALTER TABLE `img_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1595;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `products` (`id_sp`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
