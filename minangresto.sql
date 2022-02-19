-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 07:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minangresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kd_menu` char(5) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `phone_number` varchar(17) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` char(3) NOT NULL,
  `nm_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`) VALUES
('M01', 'Makanan'),
('M02', 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `manual_payment_methods`
--

CREATE TABLE `manual_payment_methods` (
  `id` int(11) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `bank_info` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manual_payment_methods`
--

INSERT INTO `manual_payment_methods` (`id`, `type_id`, `heading`, `description`, `bank_info`, `photo`, `create_at`, `update_at`) VALUES
(1, 'custom_payment', 'Flip', 'Pembayaran gratis tanpa biaya admin keseluruh bank dalam negeri', NULL, 'image/payment/20220219052414.png', '2022-02-19 16:21:12', '2022-02-19 16:24:33'),
(2, 'cash', 'CASH', 'Pembeli langsung membayar kepada penjual', NULL, 'image/payment/20220219052423.png', '2022-02-19 16:22:26', '2022-02-19 16:24:41'),
(3, 'bank_payment_va', 'Virtual Account BNI', 'Pembayaran virtual account bank negara indonesia', NULL, 'image/payment/20220219052616.png', '2022-02-19 16:25:52', '2022-02-19 16:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kd_menu` char(5) NOT NULL,
  `nm_menu` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `photo_menu` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kd_kategori` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kd_menu`, `nm_menu`, `harga`, `photo_menu`, `deskripsi`, `kd_kategori`) VALUES
('MI001', 'Jus Pokat', 12000, 'image/menu/20220219053548.jpg', 'Jus Pokat', 'M02'),
('MI002', 'Jus Jeruk', 12000, 'image/menu/20220219053629.jpg', 'Jus Jeruk', 'M02'),
('MI003', 'Jus Anggur', 9000, 'image/menu/20220219053725.jpg', 'Jus Anggur', 'M02'),
('MI004', 'Coconut Ice Cream', 25000, 'image/menu/20220219054639.jpeg', 'Es krim yang satu ini memadukan gurih krim segar dengan gurih harum santan kelapa. Rasanya mirip es puter tetapi lebih creamy gurih. Sudah ngiler membayangkan es krim ini? Yuk Order Sekarang', 'M01'),
('MI005', 'Jus Mangga', 15000, 'image/menu/20220219054854.webp', 'Jus mangga segar', 'M02'),
('MN001', 'Paket Ayam Bakar Paha', 20000, 'image/menu/20220219052842.jpg', 'Paket Praktis dengan Paha Ayam Bakar potongan besar, dikemas dalam Box ukuran 20x20cm. ISI PAKET : Nasi, Ayam Bakar Paha, Sambal, Lalapan', 'M01'),
('MN002', 'GULAI OTAK SAPI', 30000, 'image/menu/20220219053027.jpg', 'GULAI OTAK SAPI dapat dikonsumsi untuk anak usia 9months - toddler (disesuaikan kembali ya bund untuk teksturnya)', 'M01'),
('MN003', 'Rendang Sapi Asli Padang', 95900, 'image/menu/20220219053155.jpg', 'Isi Kemasan 250gr. Rendang daging sapi terbuat dari daging sapi lokal berkualitas. 100% Halal. Tanpa MSG aman di konsumsi semua usia. Kemasan menarik dan praktis, cocok untuk dijadikan oleh-oleh.', 'M01'),
('MN004', 'ikan nila bakar saus tiram', 13500, 'image/menu/20220219053338.jpg', 'ikan nila bakar saus tiram', 'M01'),
('MN005', 'Dendeng Batokok/ Dendeng Balado', 65000, 'image/menu/20220219053449.jpg', 'Dendeng Batokok /balado atau Dendeng Lambok(Basah) khas Lapau Mak Kamek, Terbuat dari daging sapi lokal dimasak dengan menggunakan bumbu rempah melimpah dan berkualitas', 'M01'),
('MN006', 'Jengkol Balado', 25000, 'image/menu/20220219054811.jpg', 'Jengkol Balado', 'M01');

-- --------------------------------------------------------

--
-- Table structure for table `m_payment_method_type`
--

CREATE TABLE `m_payment_method_type` (
  `type_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `method_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_payment_method_type`
--

INSERT INTO `m_payment_method_type` (`type_id`, `description`, `method_name`) VALUES
('bank_payment', 'Pembayaran Manual dengan menggunakan Bank Transfer. Diverifikasi secara manual dan mungkin membutuhkan waktu beberapa waktu', 'Bank Transfer (Manual)'),
('bank_payment_va', 'Pembayaran menggunakan Virtual Account', 'Bank Transfer (Virtual Account)'),
('cash', 'Pembayaran dilakukan dengan cash', 'Pembayaran Cash'),
('check_payment', 'Pembayaran dengan cek', 'Pembayaran dengan Cek'),
('custom_payment', 'Cumtom Payment dengan tipe berbagasi macam pembayaran', 'Pembayaran Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `on_site_order`
--

CREATE TABLE `on_site_order` (
  `order_id_onsite` varchar(25) NOT NULL,
  `id_customer` varchar(15) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `number_of_people` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `manual_payment` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'UNPAID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_online` bit(1) NOT NULL DEFAULT b'0',
  `order_offline` bit(1) NOT NULL DEFAULT b'0',
  `order_id_online` varchar(25) DEFAULT NULL,
  `order_id_onsite` varchar(25) DEFAULT NULL,
  `kd_menu` char(5) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_online`
--

CREATE TABLE `order_online` (
  `order_id_online` varchar(25) NOT NULL,
  `id_customer` varchar(15) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `manual_payment` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_customer` varchar(15) NOT NULL,
  `amount` double NOT NULL,
  `order_online` bit(1) NOT NULL DEFAULT b'0',
  `order_onsite` bit(1) NOT NULL DEFAULT b'0',
  `order_id_online` varchar(25) DEFAULT NULL,
  `order_id_onsite` varchar(25) DEFAULT NULL,
  `manual_payment` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'customer',
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `authkey` varchar(50) NOT NULL DEFAULT 'M1N@G@2022',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `username`, `password`, `avatar`, `address`, `authkey`, `create_at`, `update_at`) VALUES
(1, 'staf', 'staf', 'minang', 'staf', 'staf', NULL, 'Jln Kebon Bawang XI No 12', 'ST@F@2022', '2022-02-19 16:10:37', '2022-02-19 16:11:08'),
(2, 'admin', 'faizura', 'zadri', 'faizura', 'faizura2308000', NULL, 'Jln Kebon bawang XI No 12', 'M1N@@2022', '2022-02-19 16:11:55', '2022-02-19 16:11:55'),
(3, 'customer', 'Cinta', 'Putri Angelina', 'cinta', '123456', '', 'Jln Pemuda Pramuka No 14A, Kelurahan Kebun Bawang, Jakarta Utara', 'M1N@G@2022', '2022-02-19 17:55:53', '2022-02-19 17:55:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_cart` (`kd_menu`),
  ADD KEY `fk_user_cart` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `fk_user_csutomer` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `manual_payment_methods`
--
ALTER TABLE `manual_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kd_menu`);

--
-- Indexes for table `m_payment_method_type`
--
ALTER TABLE `m_payment_method_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `on_site_order`
--
ALTER TABLE `on_site_order`
  ADD PRIMARY KEY (`order_id_onsite`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_online`
--
ALTER TABLE `order_online`
  ADD PRIMARY KEY (`order_id_online`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manual_payment_methods`
--
ALTER TABLE `manual_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_menu_cart` FOREIGN KEY (`kd_menu`) REFERENCES `menu` (`kd_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_user_csutomer` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
