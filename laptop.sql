-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2019 lúc 06:35 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_nhom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `name_user`, `address`, `phone`, `date`, `total`, `status`) VALUES
(1, 19, 'Trần Văn Quang', 'Công viên Nghĩa Đô', '0359316477', '2019-12-06', 1500000, 1),
(2, 20, 'Trần Quang', 'Bến xe Giáp Bát', '0354937274', '2019-12-03', 1800000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_cate` varchar(255) NOT NULL,
  `ordernum` int(11) NOT NULL,
  `show_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name_cate`, `ordernum`, `show_menu`) VALUES
(1, 'Laptop', 0, '1'),
(2, 'Phụ kiện laptop', 0, '1'),
(3, 'Điện thoại', 0, '1'),
(4, 'Gear', 0, '1'),
(5, 'Máy ảnh', 0, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_bl` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `reply_for` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `content`, `user_id`, `date_bl`, `status`, `reply_for`) VALUES
(1, 2, 'Ngon bổ rẻ', 1, '2019-10-02', '1', ''),
(2, 2, 'Ngon bổ rẻ', 2, '2019-10-03', '1', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nameproduct` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `sale_price` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `detail_specifications` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `id_cate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `nameproduct`, `price`, `sale_price`, `detail`, `detail_specifications`, `image`, `amount`, `status`, `rating`, `id_cate`) VALUES
(1, 'Samsung Galaxy Note 9', '6500000', '15', '<p><strong>Khuyến mại đặc biệt (SL có hạn)</strong></p>\r\n\r\n<p><em>Khách hàng chọn 1 trong 2 Khuyến mại sau:</em></p>\r\n\r\n<p>KM1:</p>\r\n\r\n<ul>\r\n	<li>Trả góp 0% tặng thêm PMH Phụ Kiện 100,000đ (S)</li>\r\n</ul>\r\n\r\n<p>KM2:</p>\r\n\r\n<ul>\r\n	<li>Tặng PMH Phụ Kiện 250', '', 'product07.png', 0, '1', 4, 3),
(2, 'Samsung Galaxy Note 10', '7000000', '20', '<p><strong>Khuyến mại đặc biệt (SL có hạn)</strong></p>\r\n\r\n<p><em>Khách hàng chọn 1 trong 2 Khuyến mại sau:</em></p>\r\n\r\n<p>KM1:</p>\r\n\r\n<ul>\r\n	<li>Trả góp 0% tặng thêm PMH Phụ Kiện 100,000đ (S)</li>\r\n</ul>\r\n\r\n<p>KM2:</p>\r\n\r\n<ul>\r\n	<li>Tặng PMH Phụ Kiện 250', '', 'product08.png', 0, '1', 5, 2),
(5, 'laptop Dell', '15000000', '15', '<p>2e,k[q</p>\r\n', '<p>adafadad</p>\r\n', 'product01.png', 15, '1', 0, 1),
(6, 'laptop Dell', '15000000', '15', '<p>2e,k[q</p>\r\n', '<p>adafadad</p>\r\n', 'product01.png', 15, '1', 0, 1),
(7, 'laptop Dell', '15000000', '15', '<p>2e,k[q</p>\r\n', '<p>adafadad</p>\r\n', 'product01.png', 15, '1', 0, 1),
(8, 'laptop Dell156', '15000000', '15', '<ul>\r\n	<li>CPU:</li>\r\n	<li>Intel Core M 5Y71</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>RAM:</li>\r\n	<li>8GB</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Ổ cứng:</li>\r\n	<li>SSD 256GB</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Card đồ họa:</li>\r\n	<li>Intel HD 5300</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave', '<p>Ngon - Bổ - Rẻ</p>\r\n', 'shop01.png', 15, '1', 0, 4),
(33, 'laptop Dell156', '15000000', '15', '<ul>\r\n	<li>CPU:</li>\r\n	<li>Intel Core M 5Y71</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>RAM:</li>\r\n	<li>8GB</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Ổ cứng:</li>\r\n	<li>SSD 256GB</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Card đồ họa:</li>\r\n	<li>Intel HD 5300</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave', '<p>Ngon - Bổ - Rẻ</p>\r\n', 'shop01.png', 15, '1', 0, 2),
(34, 'laptop Dell156', '15000000', '15', '<ul>\r\n	<li>CPU:</li>\r\n	<li>Intel Core M 5Y71</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>RAM:</li>\r\n	<li>8GB</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Ổ cứng:</li>\r\n	<li>SSD 256GB</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Card đồ họa:</li>\r\n	<li>Intel HD 5300</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave', '<p>Ngon - Bổ - Rẻ</p>\r\n', 'shop01.png', 15, '1', 0, 5),
(35, 'demo123', '123', '1', '<p>12345</p>\r\n', '<p>567</p>\r\n', 'product09.png', 123, '1', 0, 0),
(36, 'quang', '18000000', '10', '<p>123123</p>\r\n', '<p>321321</p>\r\n', 'product03.png', 123, '1', 0, 5),
(37, 'qe', '13', '1', '<p>132</p>\r\n', '<p>456</p>\r\n', 'hotdeal.png', 123, '1', 0, 3),
(38, 'demo1', '1111', '1', '<p>2</p>\r\n', '<p>3</p>\r\n', 'shop02.png', 4, '1', 0, 5),
(39, 'demo2', '123', '10', '<p>1</p>\r\n', '<p>12</p>\r\n', 'product02.png', 3, '1', 0, 2),
(40, 'demo3', '15000000', '10', '<p>qưe</p>\r\n', '<p>qưads</p>\r\n', 'product04.png', 23, '1', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'nember', 1),
(2, 'admin', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `detail`, `image`, `link`, `status`) VALUES
(1, 'laptop', 'hotdeal.png', '#', b'1'),
(2, 'logo', 'logo.png', '#3', b'0'),
(20, 'laptop123', 'product02.png', '#', b'1'),
(21, 'máy ảnh', 'product09.png', '#', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `address`, `phone`, `status`, `image`, `role`) VALUES
(2, 'admin', 'admin', 'Trần Văn Quang', 'admin@gmail.com', 'Hà Nội', '0359316477', 1, '72164731_515945072578665_7629967701506523136_n.jpg', 1),
(15, 'admin1', '123', 'Trần Quang', 'quang6cnd@gmail.com1313', '', '0359316477', 1, '636927403258569996_asus-tuf-fx505dy-dd.png', 1),
(18, 'demo', '1', 'Trần Văn Quang', 'quang6cnd@gmail.com1313', 'Hà Nội', '035971677', 1, '636936815845272936_asus-strix-g531gt-al030t-dd.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `discount_price` int(11) NOT NULL,
  `used_count` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
