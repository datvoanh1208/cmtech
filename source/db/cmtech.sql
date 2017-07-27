-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 07:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date_order` int(11) NOT NULL,
  `total` double NOT NULL,
  `status` double NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `status`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1499705343, 120000, 1, 'COD', 'ko mua', '2017-07-10 16:49:03', '2017-07-10 16:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(11) NOT NULL,
  `name_product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `name_product`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zenfone 2', 1, 1, 120000, '2017-07-10 16:49:03', '2017-07-10 16:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idSanPham` int(10) UNSIGNED NOT NULL,
  `NoiDung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `idUser`, `idSanPham`, `NoiDung`, `rate`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 'ok', '4', '2017-07-06 09:58:12', '2017-07-06 09:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Vo Anh Dat', 'nam', 'dat@gmail.com', 'ca mau', '0123112113', 'ko mua', '2017-07-10 16:49:03', '2017-07-10 16:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_07_083318_create_customer_table', 1),
(4, '2017_06_08_023235_create_bills_table', 1),
(5, '2017_06_08_023333_create_bill_detail_table', 1),
(6, '2017_06_08_023453_create_news_table', 1),
(7, '2017_06_08_023537_create_products_table', 1),
(8, '2017_06_08_023607_create_slide_table', 1),
(9, '2017_06_08_023629_create_type_products_table', 1),
(10, '2017_07_06_124928_CreateCommentTable', 1),
(11, '2014_02_09_225721_create_visitor_registry', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double NOT NULL,
  `promotion_price` double NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Zenfone 2', 1, 'Điện thoại Zenfone hãng Asus', 1990000, 0, 'zen2.png', 'cái', 1, NULL, NULL),
(2, 'Zenfone 3', 1, 'Điện thoại Zenfone hãng Asus', 6990000, 6290000, 'zen3.png', 'cái', 0, NULL, NULL),
(3, 'Zenfone 3 Max', 1, 'Điện thoại Zenfone hãng Asus', 4990000, 0, 'zen3max.png', 'cái', 0, NULL, NULL),
(4, 'Zenfone Go', 1, 'Điện thoại Zenfone hãng Asus', 3141000, 2990000, 'zengo.png', 'cái', 1, NULL, NULL),
(5, 'Zenfone Live', 1, 'Điện thoại Zenfone hãng Asus', 2990000, 0, 'zenlive.png', 'cái', 1, NULL, NULL),
(6, 'HTC Desire 10 Pro', 2, 'Điện thoại HTC', 6651000, 5990000, 'htcdesire10pro.png', 'cái', 0, NULL, NULL),
(7, 'HTC One A9S', 2, 'Điện thoại HTC', 4930500, 0, 'htconea9s.png', 'cái', 1, NULL, NULL),
(8, 'HTC One Me', 2, 'Điện thoại HTC', 5215500, 4990000, 'htconeme.png', 'cái', 0, NULL, NULL),
(9, 'HTC UPlay', 2, 'Điện thoại HTC', 8990000, 8590000, 'htcuplay.png', 'cái', 1, NULL, NULL),
(10, 'HTC Ultra Saphire', 2, 'Điện thoại HTC', 16990000, 0, 'htcuultrasapphire.png', 'cái', 1, NULL, NULL),
(11, 'Huawei GR5', 3, 'Điện thoại Huawei', 5990000, 0, 'huaweigr5.png', 'cái', 0, NULL, NULL),
(12, 'Huawei GR5 2017 Pro', 3, 'Điện thoại Huawei', 6990000, 6490000, 'huaweigr52017pro.png', 'cái', 0, NULL, NULL),
(13, 'Huawei Y5II', 3, 'Điện thoại Huawei', 2190000, 0, 'huaweiy5II.png', 'cái', 1, NULL, NULL),
(14, 'iPhone 6 Plus', 4, 'Điện thoại iPhone', 11990000, 0, 'iphone6plus.png', 'cái', 0, NULL, NULL),
(15, 'iPhone 6S Plus', 4, 'Điện thoại iPhone', 14990000, 0, 'iphone6splus.png', 'cái', 1, NULL, NULL),
(16, 'iPhone 7', 4, 'Điện thoại iPhone', 19900000, 0, 'iphone7.png', 'cái', 0, NULL, NULL),
(17, 'iPhone 7 Plus', 4, 'Điện thoại iPhone', 23990000, 22990000, 'iphone7plus.png', 'cái', 1, NULL, NULL),
(18, 'iPhone SE', 4, 'Điện thoại iPhone', 7990000, 6990000, 'iphonese.png', 'cái', 0, NULL, NULL),
(19, 'OPPO F1S', 5, 'Điện thoại OPPO', 6070500, 0, 'oppof1s.png', 'cái', 1, NULL, NULL),
(20, 'OPPO F3', 5, 'Điện thoại OPPO', 6300000, 5990000, 'oppof3.png', 'cái', 1, NULL, NULL),
(21, 'OPPO F3 Plus', 5, 'Điện thoại OPPO', 10690000, 0, 'oppof3plus.png', 'cái', 0, NULL, NULL),
(22, 'OPPO Neo 9', 5, 'Điện thoại OPPO', 3290000, 2990000, 'opponeo9.png', 'cái', 1, NULL, NULL),
(23, 'Samsung Galaxy A9 Pro', 6, 'Điện thoại Samsung', 8990000, 8590000, 'samsunggalaxya9pro.png', 'cái', 0, NULL, NULL),
(24, 'Samsung Galaxy C9 Pro', 6, 'Điện thoại Samsung', 11490000, 10990000, 'samsunggalaxyc9pro.png', 'cái', 1, NULL, NULL),
(25, 'Samsung Galaxy Note 5', 6, 'Điện thoại Samsung', 10690000, 0, 'samsunggalaxynote5.png', 'cái', 0, NULL, NULL),
(26, 'Samsung Galaxy S7 Edge', 6, 'Điện thoại Samsung', 15490000, 0, 'samsunggalaxys7egde.png', 'cái', 0, NULL, NULL),
(27, 'Samsung Galaxy S8', 6, 'Điện thoại Samsung', 18490000, 143000, 'samsunggalaxys8.png', 'cái', 1, NULL, NULL),
(28, 'Samsung Galaxy S8 Plus', 6, 'Điện thoại Samsung', 20490000, 143000, 'samsunggalaxys8plus.png', 'cái', 1, NULL, NULL),
(29, 'Sony XA1 Ultra', 7, 'Điện thoại Sony', 8990000, 103000, 'SonyXA1ultra.png', 'cái', 0, NULL, NULL),
(30, 'Sony Xperia X', 7, 'Điện thoại Sony', 7990000, 114000, 'SonyXperiaX.png', 'cái', 0, NULL, NULL),
(31, 'Sony Xpreia XZs', 7, 'Điện thoại Sony', 13990000, 0, 'SonyXperiaXZs.png', 'cái', 1, NULL, NULL),
(32, 'Sony Xperia XA Ultra', 7, 'Điện thoại Sony', 6990000, 6640500, 'XperiaXAUltra.png', 'cái', 0, NULL, NULL),
(33, 'Sony Xperia XZDual', 7, 'Điện thoại Sony', 10990000, 0, 'XperiaXZDual.png', 'cái', 1, NULL, NULL),
(34, 'Xiaomi Mi MIX', 8, 'Điện thoại Xiaomi', 12490000, 103000, 'XiaomiMiMIX.png', 'cái', 1, NULL, NULL),
(35, 'Xiaomi Redmi4A', 8, 'Điện thoại Xiaomi', 2990000, 0, 'XiaomiRedmi4a.png', 'cái', 0, NULL, NULL),
(36, 'Xiaomi Redmi4X', 8, 'Điện thoại Xiaomi', 3690000, 113000, 'XiaomiRedmi4X.png', 'cái', 1, NULL, NULL),
(37, 'Xiaomi RedmiNote4', 8, 'Điện thoại Xiaomi', 4690000, 0, 'XiaomiRedmiNote4.png', 'cái', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bìa 1', 'bia1.jpg', NULL, NULL),
(2, 'Bìa 2', 'bia2.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'ASUS', 'Điện thoại asus là điện thoại đến từ Đài Loan phong cách mạnh mẽ, giá hợp lí...', 'zen2.png', NULL, NULL),
(2, 'HTC', 'Điện thoại HTC của Đài Loan', 'htcdesire10pro.png', NULL, NULL),
(3, 'Huawei', 'Điện thoại Huawei đến từ Trung Quốc 1 trong những tập đoàn điện tử công nghệ thông tin có tiếng tăm trên thế giới', 'huaweigr5.png', NULL, NULL),
(4, 'iPhone', 'iPhone là sản phẩm di động của hãng Apple đặt tại thung lũng Silicon bang California Mỹ, được sản xuất tại TQ với giá khá mềm dành cho dân thu nhập trung bình', 'iphone6plus.png', NULL, NULL),
(5, 'OPPO', 'Điện thoại đến từ Trung Quốc thích hợp cho giới trẻ dùng để Selfie', 'oppof1s.png', NULL, NULL),
(6, 'Samsung', 'Điện thoại của hãng Samsung đến từ Hàn Quốc đối thủ cạnh tranh mạnh mẽ với Apple', 'samsunggalaxya9pro.png', NULL, NULL),
(7, 'Sony', 'Điện thoại Sony của hãng Sony từ Nhật Bản', 'SonyXA1ultra.png', NULL, NULL),
(8, 'Xiaomi', 'Điện thoại Xiaomi đến từ Trung Quốc', 'XiaomiMiMIX.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `facebook_id`, `google_id`, `github_id`, `twitter_id`, `full_name`, `email`, `level`, `password`, `phone`, `address`, `note`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', '', NULL, NULL, 'voanhdat', 'voanhdat2008@gmail.com', '1', '$2y$10$VEtMOerbI305KP8e9EUvFeakoar.LKmbAaaWPo3QMlKO70qVLByM6', '0123123123', 'houston', NULL, '4ci7JwY11i6YiefYGOXqgqTcTSYNf239GCsi3StqDNsPMIKmBEfnXUWkkJIK', NULL, NULL),
(2, '', '105454862181914861652', NULL, NULL, 'Anh Dat Vo', 'sglycafe@gmail.com', '0', '$2y$10$shg0EUmqPkpsbnbvduGoS.LLIxFJyn5YEm8UADLoRWmiqISsRJlZi', '', '', NULL, NULL, '2017-07-06 16:47:25', '2017-07-06 16:47:25'),
(3, NULL, NULL, NULL, NULL, 'vuthanh', 'vuthanh@gmail.com', '0', '$2y$10$j9OIIg9fnRiPu7BCTqoe/e8/LPRaKYIwqodgq3CjispI9lKvW92sC', '0918515412', 'ca mau', NULL, NULL, '2017-07-10 16:50:26', '2017-07-10 16:50:26'),
(4, NULL, NULL, NULL, NULL, 'vuthanhoo0', 'vuthanhoo12345@gmail.com', '1', '$2y$10$z3V5.f8wQJ..Ttmr9D96FOp34W22LAKgD2eQ4vkeFR0dWcctRGkUK', '0918552145', 'p6 tp cà mau', NULL, 'BaoDjRjqZO1QzTKV5WIvgzGY0FKYLTN2hw67PAuFR6Y7KWaXU5h7tSkFfn2p', '2017-07-11 05:14:28', '2017-07-11 05:14:28'),
(5, NULL, NULL, NULL, NULL, 'test', 'test@gmail.com', '0', '$2y$10$EXp2cWBRGDWRPX9NM4c9ZeGBydiaXfIEGUhnN7qktNW3A/t.supCy', '0123456789', 'Ca Mau', NULL, NULL, '2017-07-11 05:17:44', '2017-07-11 05:17:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_iduser_foreign` (`idUser`),
  ADD KEY `comment_idsanpham_foreign` (`idSanPham`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_idsanpham_foreign` FOREIGN KEY (`idSanPham`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
