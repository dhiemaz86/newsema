-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 04:35 AM
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
  `phone_client` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cera_delivery`
--

CREATE TABLE `cera_delivery` (
  `id_po` int(4) NOT NULL,
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
  `product_pc_id` int(4) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_status` varchar(20) DEFAULT NULL,
  `product_type` varchar(20) DEFAULT NULL,
  `product_parent_id` int(4) DEFAULT NULL,
  `product_code` varchar(20) DEFAULT NULL,
  `product_size` varchar(20) DEFAULT NULL,
  `product_desc` text,
  `product_img` varchar(50) DEFAULT NULL,
  `product_price` int(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cera_product`
--

INSERT INTO `cera_product` (`id_product`, `product_pc_id`, `product_name`, `product_status`, `product_type`, `product_parent_id`, `product_code`, `product_size`, `product_desc`, `product_img`, `product_price`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '2017-08-08 16:15:15', '2017-08-08 16:15:15');

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

-- --------------------------------------------------------

--
-- Table structure for table `cera_product_price`
--

CREATE TABLE `cera_product_price` (
  `pp_id` int(4) NOT NULL,
  `pp_product_id` int(11) NOT NULL,
  `pp_qty` int(10) NOT NULL,
  `pp_price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cera_sales`
--

CREATE TABLE `cera_sales` (
  `sales_id` int(4) NOT NULL,
  `sales_id_status` int(11) DEFAULT NULL,
  `sales_quotation_no` int(11) DEFAULT NULL,
  `sales_invoice_no` int(11) DEFAULT NULL,
  `sales_id_user` int(11) DEFAULT NULL,
  `sales_id_client` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_tgl_po` datetime NOT NULL,
  `sales_tgl_deadline` datetime DEFAULT NULL,
  `sales_tgl_dp` datetime DEFAULT NULL,
  `sales_tgl_acc` datetime DEFAULT NULL,
  `sales_id_delivery` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `cera_sales_status`
--

CREATE TABLE `cera_sales_status` (
  `ss_id` int(4) NOT NULL,
  `ss_status_code` varchar(50) NOT NULL,
  `ss_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cera_user`
--

CREATE TABLE `cera_user` (
  `id_user` int(4) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `username_user` int(11) NOT NULL,
  `pass_user` varchar(50) NOT NULL,
  `position_user` varchar(20) NOT NULL,
  `phone_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id_po`);

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
  MODIFY `id_client` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_delivery`
--
ALTER TABLE `cera_delivery`
  MODIFY `id_po` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_extras`
--
ALTER TABLE `cera_extras`
  MODIFY `extras_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_product`
--
ALTER TABLE `cera_product`
  MODIFY `id_product` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cera_production`
--
ALTER TABLE `cera_production`
  MODIFY `id_production` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_product_category`
--
ALTER TABLE `cera_product_category`
  MODIFY `pc_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_product_price`
--
ALTER TABLE `cera_product_price`
  MODIFY `pp_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_sales`
--
ALTER TABLE `cera_sales`
  MODIFY `sales_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_sales_item`
--
ALTER TABLE `cera_sales_item`
  MODIFY `si_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_sales_status`
--
ALTER TABLE `cera_sales_status`
  MODIFY `ss_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cera_user`
--
ALTER TABLE `cera_user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
