-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 08:30 AM
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
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `status`, `note`, `created_at`, `updated_at`) VALUES
(13, 12, 1498366090, 120000, 'COD', 1, 'đéo thích mua, đặt vậy', '2017-06-24 21:47:56', '2017-06-24 21:47:56'),
(15, 15, 1498399142, 386000, 'ATM', 0, 'abc', '2017-06-25 13:59:02', '2017-06-25 13:59:02'),
(16, 18, 1498399217, 300000, 'COD', 0, 'acc', '2017-06-25 14:00:17', '2017-06-25 14:00:17'),
(18, 20, 1498399295, 244000, 'COD', 0, 'acc', '2017-06-25 14:01:35', '2017-06-25 14:01:35'),
(20, 22, 1498399338, 110000, 'COD', 0, 'aaa', '2017-06-25 14:02:18', '2017-06-25 14:02:18'),
(21, 23, 1498492178, 575000, 'COD', 1, 'abc', '2017-06-26 15:49:38', '2017-06-26 15:49:38'),
(22, 24, 1498492215, 123000, 'COD', 1, '123', '2017-06-26 15:50:15', '2017-06-26 15:50:15'),
(23, 25, 1498493227, 651000, 'COD', 1, '123', '2017-06-26 16:07:07', '2017-06-26 16:07:07'),
(25, 27, 1498495342, 1128000, 'COD', 1, '123123', '2017-06-26 16:42:22', '2017-06-26 16:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(11) NOT NULL,
  `name_product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(17, 16, 'Zenfone Go', 4, 1, 180000, '2017-06-25 14:00:17', '2017-06-25 14:00:17'),
(22, 18, 'HTC One Me', 8, 1, 134000, '2017-06-25 14:01:35', '2017-06-25 14:01:35'),
(25, 20, 'Zenfone 3 Max', 3, 1, 110000, '2017-06-25 14:02:18', '2017-06-25 14:02:18'),
(28, 21, 'Huawei Y5II', 13, 1, 199000, '2017-06-26 15:49:38', '2017-06-26 15:49:38'),
(30, 22, 'Zenfone Live', 5, 1, 13000, '2017-06-26 15:50:15', '2017-06-26 15:50:15'),
(33, 23, 'Xiaomi Mi MIX', 34, 1, 103000, '2017-06-26 16:07:08', '2017-06-26 16:07:08'),
(45, 25, 'HTC UPlay', 9, 1, 195000, '2017-06-26 16:42:22', '2017-06-26 16:42:22'),
(46, 25, 'HTC Ultra Saphire', 10, 1, 136000, '2017-06-26 16:42:22', '2017-06-26 16:42:22'),
(47, 25, 'Huawei Y5II', 13, 1, 199000, '2017-06-26 16:42:22', '2017-06-26 16:42:22'),
(48, 25, 'iPhone 6S Plus', 15, 1, 134000, '2017-06-26 16:42:22', '2017-06-26 16:42:22'),
(49, 25, 'iPhone 7 Plus', 17, 1, 138000, '2017-06-26 16:42:22', '2017-06-26 16:42:22');

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
(13, 'Vo Anh Dat', 'nam', 'voanhdat2008@gmail.com', 'Ca Mau', '01235154194', 'abc', '2017-06-25 13:56:59', '2017-06-25 13:56:59'),
(16, 'the anh', 'nam', 'datvoanh95@gmail.com', 'BLieu', '01235154194', 'avv', '2017-06-25 13:59:14', '2017-06-25 13:59:14'),
(18, 'the anh', 'nữ', 'voanhdat@gmail.com', 'Ca Mau', '0123123123', 'acc', '2017-06-25 14:00:17', '2017-06-25 14:00:17'),
(20, 'the anh day', 'nam', 'Voanhdat_a7@yahoo.com', 'BLieu', '01235154194', 'acc', '2017-06-25 14:01:35', '2017-06-25 14:01:35'),
(22, 'nguyen van teo ne', 'nam', 'voanhdat2008@gmail.com', 'Ca Mau', '01235154194', 'aaa', '2017-06-25 14:02:18', '2017-06-25 14:02:18'),
(23, 'nguyen van cu teo', 'nam', 'Voanhdat_a7@yahoo.com', 'Ca Mau p8', '0123456789', 'abc', '2017-06-26 15:49:38', '2017-06-26 15:49:38'),
(24, 'nguyen van cu ti', 'nam', 'voanhdat2008@gmail.com', 'Ca Mau', '01235154194', '123', '2017-06-26 15:50:15', '2017-06-26 15:50:15'),
(25, 'nguyen van cu teo a', 'nam', 'voanhdat2008@gmail.com', 'Ca Mau', '01235154194', '123', '2017-06-26 16:07:07', '2017-06-26 16:07:07'),
(27, 'nguyen van b', 'nam', 'voanhdat2008@gmail.com', 'Ca Mau', '01235154194', '123123', '2017-06-26 16:42:22', '2017-06-26 16:42:22');

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
(46, '2014_10_12_000000_create_users_table', 1),
(47, '2014_10_12_100000_create_password_resets_table', 1),
(48, '2017_06_07_083318_create_customer_table', 1),
(49, '2017_06_08_023235_create_bills_table', 1),
(50, '2017_06_08_023333_create_bill_detail_table', 1),
(51, '2017_06_08_023453_create_news_table', 1),
(52, '2017_06_08_023537_create_products_table', 1),
(53, '2017_06_08_023607_create_slide_table', 1),
(54, '2017_06_08_023629_create_type_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Zenfone 2', 1, 'Điện thoại Zenfone hãng Asus', 150000, 120000, 'zen2.png', 'cái', 1, NULL, NULL),
(2, 'Zenfone 3', 1, 'Điện thoại Zenfone hãng Asus', 160000, 0, 'zen3.png', 'cái', 0, NULL, NULL),
(3, 'Zenfone 3 Max', 1, 'Điện thoại Zenfone hãng Asus', 170000, 110000, 'zen3max.png', 'cái', 0, NULL, NULL),
(4, 'Zenfone Go', 1, 'Điện thoại Zenfone hãng Asus', 180000, 0, 'zengo.png', 'cái', 1, NULL, NULL),
(5, 'Zenfone Live', 1, 'Điện thoại Zenfone hãng Asus', 19000, 13000, 'zenlive.png', 'cái', 1, NULL, NULL),
(6, 'HTC Desire 10 Pro', 2, 'Điện thoại HTC', 192000, 0, 'htcdesire10pro.png', 'cái', 0, NULL, NULL),
(7, 'HTC One A9S', 2, 'Điện thoại HTC', 193000, 0, 'htconea9s.png', 'cái', 1, NULL, NULL),
(8, 'HTC One Me', 2, 'Điện thoại HTC', 194000, 134000, 'htconeme.png', 'cái', 0, NULL, NULL),
(9, 'HTC UPlay', 2, 'Điện thoại HTC', 195000, 0, 'htcuplay.png', 'cái', 1, NULL, NULL),
(10, 'HTC Ultra Saphire', 2, 'Điện thoại HTC', 196000, 136000, 'htcuultrasapphire.png', 'cái', 1, NULL, NULL),
(11, 'Huawei GR5', 3, 'Điện thoại Huawei', 197000, 0, 'huaweigr5.png', 'cái', 0, NULL, NULL),
(12, 'Huawei GR5 2017 Pro', 3, 'Điện thoại Huawei', 197000, 134000, 'huaweigr52017pro.png', 'cái', 0, NULL, NULL),
(13, 'Huawei Y5II', 3, 'Điện thoại Huawei', 199000, 0, 'huaweiy5II.png', 'cái', 1, NULL, NULL),
(14, 'iPhone 6 Plus', 4, 'Điện thoại iPhone', 191000, 0, 'iphone6plus.png', 'cái', 0, NULL, NULL),
(15, 'iPhone 6S Plus', 4, 'Điện thoại iPhone', 190000, 134000, 'iphone6splus.png', 'cái', 1, NULL, NULL),
(16, 'iPhone 7', 4, 'Điện thoại iPhone', 195000, 0, 'iphone7.png', 'cái', 0, NULL, NULL),
(17, 'iPhone 7 Plus', 4, 'Điện thoại iPhone', 197000, 138000, 'iphone7plus.png', 'cái', 1, NULL, NULL),
(18, 'iPhone SE', 4, 'Điện thoại iPhone', 199000, 0, 'iphonese.png', 'cái', 0, NULL, NULL),
(19, 'OPPO F1S', 5, 'Điện thoại OPPO', 191000, 131000, 'oppof1s.png', 'cái', 1, NULL, NULL),
(20, 'OPPO F3', 5, 'Điện thoại OPPO', 192000, 132000, 'oppof3.png', 'cái', 1, NULL, NULL),
(21, 'OPPO F3 Plus', 5, 'Điện thoại OPPO', 193000, 133000, 'oppof3plus.png', 'cái', 0, NULL, NULL),
(22, 'OPPO Neo 9', 5, 'Điện thoại OPPO', 194900, 0, 'opponeo9.png', 'cái', 1, NULL, NULL),
(23, 'Samsung Galaxy A9 Pro', 6, 'Điện thoại Samsung', 160000, 143000, 'samsunggalaxya9pro.png', 'cái', 0, NULL, NULL),
(24, 'Samsung Galaxy C9 Pro', 6, 'Điện thoại Samsung', 174000, 143000, 'samsunggalaxyc9pro.png', 'cái', 1, NULL, NULL),
(25, 'Samsung Galaxy Note 5', 6, 'Điện thoại Samsung', 144000, 0, 'samsunggalaxynote5.png', 'cái', 0, NULL, NULL),
(26, 'Samsung Galaxy S7 Edge', 6, 'Điện thoại Samsung', 194000, 0, 'samsunggalaxys7egde.png', 'cái', 0, NULL, NULL),
(27, 'Samsung Galaxy S8', 6, 'Điện thoại Samsung', 154000, 143000, 'samsunggalaxys8.png', 'cái', 1, NULL, NULL),
(28, 'Samsung Galaxy S8 Plus', 6, 'Điện thoại Samsung', 184000, 143000, 'samsunggalaxys8plus.png', 'cái', 1, NULL, NULL),
(29, 'Sony XA1 Ultra', 7, 'Điện thoại Sony', 111000, 103000, 'SonyXA1ultra.png', 'cái', 0, NULL, NULL),
(30, 'Sony Xperia X', 7, 'Điện thoại Sony', 120000, 114000, 'SonyXperiaX.png', 'cái', 0, NULL, NULL),
(31, 'Sony Xpreia XZs', 7, 'Điện thoại Sony', 144000, 0, 'SonyXperiaXZs.png', 'cái', 1, NULL, NULL),
(32, 'Sony Xperia XA Ultra', 7, 'Điện thoại Sony', 120000, 111000, 'XperiaXAUltra.png', 'cái', 0, NULL, NULL),
(33, 'Sony Xperia XZDual', 7, 'Điện thoại Sony', 120000, 0, 'XperiaXZDual.png', 'cái', 1, NULL, NULL),
(34, 'Xiaomi Mi MIX', 8, 'Điện thoại Xiaomi', 139000, 103000, 'XiaomiMiMIX.png', 'cái', 1, NULL, NULL),
(35, 'Xiaomi Redmi4A', 8, 'Điện thoại Xiaomi', 130000, 0, 'XiaomiRedmi4a.png', 'cái', 0, NULL, NULL),
(36, 'Xiaomi Redmi4X', 8, 'Điện thoại Xiaomi', 129000, 113000, 'XiaomiRedmi4X.png', 'cái', 1, NULL, NULL),
(37, 'Xiaomi RedmiNote4', 8, 'Điện thoại Xiaomi', 129000, 0, 'XiaomiRedmiNote4.png', 'cái', 1, NULL, NULL);

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
(2, 'Bìa 2', 'bia2.jpg', NULL, NULL),
(3, 'Bìa 3', 'bia3.jpg', NULL, NULL),
(4, 'Bìa 4', 'bia4.jpg', NULL, NULL);

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
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `level`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Vo Anh Dat', 'voanhdat2008@gmail.com', '1', '$2y$10$VEtMOerbI305KP8e9EUvFeakoar.LKmbAaaWPo3QMlKO70qVLByM6', '01235154194', 'Ca Mau', 'nymSgJs8evbz9C5aeHnVHPJhhjnpgtxp86Ei59oEqmchFCrMSmOwMsG4McgH', '2017-06-24 09:34:24', '2017-06-24 09:34:24');

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
-- Indexes for table `news`
--
ALTER TABLE `news`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
