-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2026 at 03:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faimly_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `seen` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `daraz_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `daraz_link`) VALUES
(1, 'lcd', 'Electronics', 'https://www.daraz.pk/products/4k-i943067362-s4002558951.html?c=&channelLpJumpArgs=&clickTrackInfo=query%253Anetflix%252Baccount%252Bsubscription%253Bnid%253A943067362%253Bsrc%253ALazadaMainSrp%253Brn%253A0388728d15471de0850afafe7f93250e%253Bregion%253Apk%253Bsku%253A943067362_PK%253Bprice%253A500%253Bclient%253Adesktop%253Bsupplier_id%253A6005039025783%253Bbiz_source%253Ahttps%253A%252F%252Fwww.daraz.pk%252F%253Bslot%253A11%253Butlog_bucket_id%253A470687%253Basc_category_id%253A5906%253Bitem_id%253A943067362%253Bsku_id%253A4002558951%253Bshop_id%253A1023403%253BtemplateInfo%253A&freeshipping=0&fs_ab=1&fuse_fs=&lang=en&location=Punjab&price=5E%202&priceCompare=skuId%3A4002558951%3Bsource%3Alazada-search-voucher%3Bsn%3A0388728d15471de0850afafe7f93250e%3BoriginPrice%3A50000%3BdisplayPrice%3A50000%3BsinglePromotionId%3A-1%3BsingleToolCode%3AmockedSalePrice%3BvoucherPricePlugin%3A0%3Btimestamp%3A1769609139458&ratingscore=&request_id=0388728d15471de0850afafe7f93250e&review=&sale=0&search=1&source=search&spm=a2a0e.searchlist.list.11&stock=1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `jazzcash` varchar(20) DEFAULT NULL,
  `easypaisa` varchar(20) DEFAULT NULL,
  `reset_code` varchar(6) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user',
  `banned` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `cnic`, `jazzcash`, `easypaisa`, `reset_code`, `reset_expires`, `role`, `banned`) VALUES
(1, '', '', '$2y$10$G/CNyFu6affMcmIJSpAyF.bWDF3xo4zrJKo/D75BPV72UutFrJ/A6', '', '', '', NULL, NULL, 'user', 0),
(2, 'ayansana', 'ayansana819@gmail.com', '$2y$10$RK074PbJeBVq9qbENweyX./C/P.GCAjEyV/LD0CfCBUB4p1lUyw/y', '6535687', '03007203947', '03436849509', '771214', '2026-01-26 17:49:53', 'user', 1),
(3, 'affan', 'affansana01@gmail.com', '$2y$10$VDuVp4.i1TQgni6maOUCmu5kaPAPGVsZR4mp6O2L/bvRtHJcr1pje', '6535687', '03007203947', '03436849509', '5656', '2026-01-28 21:36:51', 'admin', 0),
(7, 'Affansana', 'affansana77@gmail.com', '$2y$10$xJdasff6fq7xZNLluuvJJOeGZVGEhRI4OUes0tfajvywF/zEMF6YW', '098098', '003436849509', '03436849509', '587028', '2026-01-27 15:07:57', 'user', 0),
(8, 'Kamran ', 'kamranbrother@gmail.com', '$2y$10$VkYXswtEv6GhxOJ9MVJyTeTnaLryfmYZPcRrkVLgkcpAgrlduCYsy', '331006574894', '03007203947', '12457', '3434', '2026-01-28 21:36:51', 'user', 0),
(9, 'Black 444', 'tahagill02@gmail.com', '$2y$10$wiRtvMYRd58Go2OUUywiWOf8ney9ijDNyELYi2Xic6tkX9D7ugQkK', '09809845', '003436849509', '03436849509', NULL, NULL, 'user', 0),
(10, 'admin', 'admin@gmail.com', '$2y$10$P1eHDv6sXh18krwWV18tqOJbOXLQ/Cj60sIqg34fBIR2iLqJKxsjG', NULL, NULL, NULL, NULL, NULL, 'admin', 0),
(11, 'Private ', 'threebrothersfsd@gmail.com', '$2y$10$9erdJJDIueL5JVOnKNiy7uNrdyjZEEkkv/cpoBmNuylWfStXhZBea', '545645522', 'Zdfghcgg', 'Fgfffffd', NULL, NULL, 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `youtube_link`) VALUES
(1, 'world most powerful person king jon un', 'https://youtu.be/5vJ_9s1tLGg?si=MO23R3cvzlSHOG6h'),
(2, 'Financial tips for family', 'https://www.youtube.com/embed/tgbNymZ7vqY'),
(3, 'Health awareness video', 'https://www.youtube.com/embed/dQw4w9WgXcQ');

-- --------------------------------------------------------

--
-- Table structure for table `video_history`
--

CREATE TABLE `video_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_name` varchar(255) DEFAULT NULL,
  `watched_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_history`
--
ALTER TABLE `video_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video_history`
--
ALTER TABLE `video_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
