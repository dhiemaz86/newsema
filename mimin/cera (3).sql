-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 04:59 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cera`
--

-- --------------------------------------------------------

--
-- Table structure for table `cera_client`
--

CREATE TABLE `cera_client` (
  `id_client` int(4) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `address_client` text NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `phone_client` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cera_client`
--

INSERT INTO `cera_client` (`id_client`, `client_name`, `address_client`, `email_client`, `phone_client`) VALUES
(1, 'Aswindita', 'PErumahan Citra Ringin Mas A41 Purwomartani Kalasan Sleman Yogyakarta 55571', 'windasdewi@gmail.com', '1234567890'),
(2, 'Winda', 'Purwo', 'lalala@mail.com', '0819282934921'),
(3, 'Sekar', 'Sleman', 'windasekard@yahoo.com', '0928293492');

-- --------------------------------------------------------

--
-- Table structure for table `cera_delivery`
--

CREATE TABLE `cera_delivery` (
  `delivery_id` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `acc_date` date NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `packing` varchar(20) NOT NULL,
  `cargo_name` varchar(50) NOT NULL,
  `phone_cargo` varchar(20) NOT NULL,
  `koli_qty` int(10) NOT NULL,
  `price_cargo` int(20) NOT NULL,
  `shipping_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cera_extras`
--

CREATE TABLE `cera_extras` (
  `extras_id` int(4) NOT NULL,
  `extras_id_sales` int(4) NOT NULL,
  `extras_name` varchar(100) NOT NULL,
  `extras_operator` varchar(10) NOT NULL,
  `extras_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cera_product`
--

CREATE TABLE `cera_product` (
  `id_product` int(4) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_status` varchar(20) DEFAULT NULL,
  `product_type` varchar(20) DEFAULT NULL,
  `product_parent_id` int(4) DEFAULT NULL,
  `product_code` varchar(20) DEFAULT NULL,
  `product_size` varchar(20) DEFAULT NULL,
  `product_desc` text,
  `product_img` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_pc_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cera_product`
--

INSERT INTO `cera_product` (`id_product`, `product_name`, `product_status`, `product_type`, `product_parent_id`, `product_code`, `product_size`, `product_desc`, `product_img`, `created_at`, `updated_at`, `product_pc_id`) VALUES
(1, 'Tumbler', 'active', 'parent', 0, 'satu', '', '', 'DFD level 0 cera.jpg', '2017-08-14 22:42:14', '2017-08-14 22:42:14', 1),
(7, 'Tumbler Fresco', 'active', 'child', 1, 'TB001', NULL, 'llalala', 'DFD level 0 cera.png', '2017-08-17 13:16:00', '2017-08-17 13:16:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cera_production`
--

CREATE TABLE `cera_production` (
  `id_production` int(4) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `email_prod` varchar(50) NOT NULL,
  `username_prod` varchar(50) NOT NULL,
  `pass_prod` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cera_product_category`
--

CREATE TABLE `cera_product_category` (
  `pc_id` int(4) NOT NULL,
  `pc_name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cera_product_category`
--

INSERT INTO `cera_product_category` (`pc_id`, `pc_name`, `created_at`, `updated_at`) VALUES
(1, 'Cetak', '2017-08-10 07:56:37', '0000-00-00 00:00:00'),
(2, 'Merchandise', '2017-08-10 07:56:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cera_product_price`
--

CREATE TABLE `cera_product_price` (
  `pp_id` int(4) NOT NULL,
  `pp_product_id` int(4) NOT NULL,
  `pp_qty` int(10) NOT NULL,
  `pp_price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cera_product_price`
--

INSERT INTO `cera_product_price` (`pp_id`, `pp_product_id`, `pp_qty`, `pp_price`) VALUES
(1, 2, 200, 200000),
(3, 7, 500, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `cera_sales`
--

CREATE TABLE `cera_sales` (
  `sales_id` int(4) NOT NULL,
  `sales_id_status` int(4) DEFAULT NULL,
  `sales_quotation_no` varchar(255) DEFAULT NULL,
  `sales_invoice_no` varchar(20) DEFAULT NULL,
  `sales_kwitansi_no` varchar(50) DEFAULT NULL,
  `sales_id_user` int(4) DEFAULT NULL,
  `sales_id_client` int(4) DEFAULT NULL,
  `sales_nama_client` varchar(100) DEFAULT NULL,
  `sales_alamat_client` text,
  `sales_email_client` varchar(50) DEFAULT NULL,
  `sales_telp_client` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_tgl_po` datetime DEFAULT NULL,
  `sales_tgl_deadline` datetime DEFAULT NULL,
  `sales_tgl_dp` datetime DEFAULT NULL,
  `sales_tgl_acc` datetime DEFAULT NULL,
  `sales_tgl_bayar` datetime DEFAULT NULL,
  `sales_id_delivery` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cera_sales`
--

INSERT INTO `cera_sales` (`sales_id`, `sales_id_status`, `sales_quotation_no`, `sales_invoice_no`, `sales_kwitansi_no`, `sales_id_user`, `sales_id_client`, `sales_nama_client`, `sales_alamat_client`, `sales_email_client`, `sales_telp_client`, `created_at`, `updated_at`, `sales_tgl_po`, `sales_tgl_deadline`, `sales_tgl_dp`, `sales_tgl_acc`, `sales_tgl_bayar`, `sales_id_delivery`) VALUES
(1, 1, 'Q-2017-08-20', NULL, NULL, NULL, NULL, 'Winda', 'Kalasan', 'windasdewi@gmail.com', '081928293492', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Q-2017-08-21', NULL, NULL, NULL, NULL, 'Sekar', 'Yogyakarta', 'windasekard@yahoo.com', '0839283918298', '2017-08-21 14:35:48', '2017-08-21 14:35:48', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Q-2017-08-21', NULL, NULL, NULL, NULL, 'lalalal', 'lallaal', 'lalla', '8562581111', '2017-08-21 15:49:30', '2017-08-21 15:49:30', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cera_sales_item`
--

CREATE TABLE `cera_sales_item` (
  `si_id` int(4) NOT NULL,
  `si_sales_id` int(4) NOT NULL,
  `si_product_id` int(4) NOT NULL,
  `si_item_name` varchar(100) NOT NULL,
  `si_item_price` int(20) NOT NULL,
  `si_item_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cera_sales_item`
--

INSERT INTO `cera_sales_item` (`si_id`, `si_sales_id`, `si_product_id`, `si_item_name`, `si_item_price`, `si_item_qty`) VALUES
(3, 1, 7, '', 0, 500),
(4, 1, 7, '', 0, 600),
(5, 2, 7, '', 70000, 600),
(6, 3, 7, '', 0, 500);

-- --------------------------------------------------------

--
-- Table structure for table `cera_sales_status`
--

CREATE TABLE `cera_sales_status` (
  `ss_id` int(4) NOT NULL,
  `ss_status_code` varchar(50) NOT NULL,
  `ss_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cera_sales_status`
--

INSERT INTO `cera_sales_status` (`ss_id`, `ss_status_code`, `ss_status_name`) VALUES
(1, 'Quotation', 'Quotation'),
(2, 'PO', 'Purchase Order'),
(3, 'Inv', 'Invoice'),
(4, 'Kw', 'Kwitansi');

-- --------------------------------------------------------

--
-- Table structure for table `cera_user`
--

CREATE TABLE `cera_user` (
  `id_user` int(4) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `username_user` varchar(20) NOT NULL,
  `pass_user` varchar(50) NOT NULL,
  `position_user` varchar(20) NOT NULL,
  `phone_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cera_user`
--

INSERT INTO `cera_user` (`id_user`, `nama_user`, `email_user`, `username_user`, `pass_user`, `position_user`, `phone_user`) VALUES
(1, 'Winda', 'windasdewi@gmail.com', 'admin', '123', 'admin', '1234567890'),
(2, 'Dimas', 'Dimas@gmail.com', 'dimas', '123', 'marketing', '0848934893');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cera_client`
--
ALTER TABLE `cera_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `cera_delivery`
--
ALTER TABLE `cera_delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `cera_extras`
--
ALTER TABLE `cera_extras`
  ADD PRIMARY KEY (`extras_id`);

--
-- Indexes for table `cera_product`
--
ALTER TABLE `cera_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `cera_production`
--
ALTER TABLE `cera_production`
  ADD PRIMARY KEY (`id_production`);

--
-- Indexes for table `cera_product_category`
--
ALTER TABLE `cera_product_category`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `cera_product_price`
--
ALTER TABLE `cera_product_price`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `cera_sales`
--
ALTER TABLE `cera_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `cera_sales_item`
--
ALTER TABLE `cera_sales_item`
  ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `cera_sales_status`
--
ALTER TABLE `cera_sales_status`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `cera_user`
--
ALTER TABLE `cera_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cera_client`
--
ALTER TABLE `cera_client`
  MODIFY `id_client` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cera_delivery`
--
ALTER TABLE `cera_delivery`
  MODIFY `delivery_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_extras`
--
ALTER TABLE `cera_extras`
  MODIFY `extras_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_product`
--
ALTER TABLE `cera_product`
  MODIFY `id_product` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cera_production`
--
ALTER TABLE `cera_production`
  MODIFY `id_production` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_product_category`
--
ALTER TABLE `cera_product_category`
  MODIFY `pc_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cera_product_price`
--
ALTER TABLE `cera_product_price`
  MODIFY `pp_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cera_sales`
--
ALTER TABLE `cera_sales`
  MODIFY `sales_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cera_sales_item`
--
ALTER TABLE `cera_sales_item`
  MODIFY `si_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cera_sales_status`
--
ALTER TABLE `cera_sales_status`
  MODIFY `ss_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cera_user`
--
ALTER TABLE `cera_user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
