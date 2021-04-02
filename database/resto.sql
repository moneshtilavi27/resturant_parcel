-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 07:21 AM
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
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `advancesal`
--

CREATE TABLE `advancesal` (
  `empatid` int(100) NOT NULL,
  `empno` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `advance` int(100) NOT NULL,
  `date` date NOT NULL,
  `flag` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attidabs`
--

CREATE TABLE `attidabs` (
  `attidabs` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attidprs`
--

CREATE TABLE `attidprs` (
  `attidprs` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cid` int(11) NOT NULL,
  `cname` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `custome_ad`
--

CREATE TABLE `custome_ad` (
  `ad_id` bigint(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `post` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `empattid`
--

CREATE TABLE `empattid` (
  `empatid` int(100) NOT NULL,
  `empno` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `attendence` varchar(100) NOT NULL,
  `timing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empreg`
--

CREATE TABLE `empreg` (
  `empid` int(11) NOT NULL,
  `empname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `path1` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `type` text NOT NULL,
  `uname` text DEFAULT NULL,
  `pass` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `slno` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `id` int(11) NOT NULL,
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `slno` int(11) NOT NULL,
  `item_cat` varchar(200) NOT NULL,
  `itmnam` varchar(40) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `mtype` varchar(40) NOT NULL,
  `prc` varchar(40) NOT NULL,
  `prc2` varchar(40) NOT NULL,
  `shnam` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item-categories`
--

CREATE TABLE `item-categories` (
  `cat_id` bigint(50) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `itemmaster`
--

CREATE TABLE `itemmaster` (
  `cid` int(11) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `itemname` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_2`
--

CREATE TABLE `item_2` (
  `slno` int(10) UNSIGNED NOT NULL,
  `itmnam` varchar(40) NOT NULL,
  `qty` double NOT NULL,
  `prc` double NOT NULL,
  `shnam` varchar(24) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `slno` int(10) UNSIGNED NOT NULL,
  `uname` varchar(18) NOT NULL,
  `pass` varchar(18) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`slno`, `uname`, `pass`, `user`) VALUES
(1, 'admin', 'pass', 'Admin'),
(2, 'manager', 'pass', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `slno` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `itmno` int(10) UNSIGNED NOT NULL,
  `itmnam` varchar(26) NOT NULL,
  `shnam` varchar(16) NOT NULL,
  `prc` double NOT NULL,
  `qty` double NOT NULL,
  `tot` double NOT NULL,
  `tabno` varchar(10) NOT NULL,
  `tabsec` varchar(10) NOT NULL,
  `billno` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL,
  `capname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paysal`
--

CREATE TABLE `paysal` (
  `empatid` int(100) NOT NULL,
  `empno` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `advance` int(100) NOT NULL,
  `overtime` int(100) NOT NULL,
  `deduction` int(100) NOT NULL,
  `totalsal` int(100) NOT NULL,
  `takesal` int(100) NOT NULL,
  `balance` int(100) NOT NULL,
  `date` date NOT NULL,
  `flag` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `slno` int(11) NOT NULL,
  `cid` int(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `item` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `total` int(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `readymadeitem`
--

CREATE TABLE `readymadeitem` (
  `slno` int(10) UNSIGNED NOT NULL,
  `itmnam` varchar(40) NOT NULL,
  `qty` double NOT NULL,
  `prc` double NOT NULL,
  `shnam` varchar(24) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sid` int(11) NOT NULL,
  `empid` int(100) NOT NULL,
  `empname` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `salary` int(100) NOT NULL,
  `advance` int(100) NOT NULL,
  `overtime` int(100) NOT NULL,
  `deduction` int(100) NOT NULL,
  `balance` int(100) NOT NULL,
  `takehome` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_charge`
--

CREATE TABLE `service_charge` (
  `id` int(11) NOT NULL,
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` bigint(50) NOT NULL,
  `number` bigint(50) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stockded`
--

CREATE TABLE `stockded` (
  `slno` int(11) NOT NULL,
  `cid` int(100) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `total` int(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockrem`
--

CREATE TABLE `stockrem` (
  `slno` int(11) NOT NULL,
  `cid` int(100) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `total` int(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_room`
--

CREATE TABLE `store_room` (
  `store_id` int(11) NOT NULL,
  `item_name` varchar(60) NOT NULL,
  `item_unit` varchar(30) NOT NULL,
  `item_qty` varchar(20) NOT NULL,
  `item_rate` varchar(30) NOT NULL,
  `item_pur_date` varchar(30) NOT NULL,
  `item_total` varchar(30) NOT NULL,
  `mqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_room_finish`
--

CREATE TABLE `store_room_finish` (
  `fid` int(11) NOT NULL,
  `item_id` varchar(20) NOT NULL,
  `item_name_finish` varchar(40) NOT NULL,
  `f_item_unit` varchar(40) NOT NULL,
  `f_item_rem_qty` varchar(40) NOT NULL,
  `f_item_finish_qty` varchar(40) NOT NULL,
  `given_date` varchar(30) NOT NULL,
  `type` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabledata`
--

CREATE TABLE `tabledata` (
  `slno` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `itmno` int(10) UNSIGNED NOT NULL,
  `itmnam` varchar(26) NOT NULL,
  `shnam` varchar(16) NOT NULL,
  `prc` double NOT NULL,
  `qty` double NOT NULL,
  `tot` double NOT NULL,
  `tabno` varchar(20) NOT NULL,
  `tabsec` varchar(10) NOT NULL,
  `billno` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabletot`
--

CREATE TABLE `tabletot` (
  `slno` int(10) UNSIGNED NOT NULL,
  `gndtot` double NOT NULL,
  `gst` double NOT NULL,
  `gstamt` double NOT NULL,
  `nettot` double NOT NULL,
  `date` date NOT NULL,
  `paymentmode` varchar(100) NOT NULL,
  `capnam` varchar(36) NOT NULL,
  `discount` double NOT NULL,
  `mobno` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temtable`
--

CREATE TABLE `temtable` (
  `slno` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `itmno` int(10) UNSIGNED NOT NULL,
  `itmnam` varchar(26) NOT NULL,
  `shnam` varchar(16) NOT NULL,
  `prc` double NOT NULL,
  `qty` double NOT NULL,
  `tot` double NOT NULL,
  `tabno` varchar(10) NOT NULL,
  `tabsec` varchar(10) NOT NULL,
  `billno` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL,
  `capname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advancesal`
--
ALTER TABLE `advancesal`
  ADD PRIMARY KEY (`empatid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `custome_ad`
--
ALTER TABLE `custome_ad`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `empattid`
--
ALTER TABLE `empattid`
  ADD PRIMARY KEY (`empatid`);

--
-- Indexes for table `empreg`
--
ALTER TABLE `empreg`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `item-categories`
--
ALTER TABLE `item-categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `itemmaster`
--
ALTER TABLE `itemmaster`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `item_2`
--
ALTER TABLE `item_2`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `paysal`
--
ALTER TABLE `paysal`
  ADD PRIMARY KEY (`empatid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `readymadeitem`
--
ALTER TABLE `readymadeitem`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `service_charge`
--
ALTER TABLE `service_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `stockded`
--
ALTER TABLE `stockded`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `stockrem`
--
ALTER TABLE `stockrem`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `store_room`
--
ALTER TABLE `store_room`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `store_room_finish`
--
ALTER TABLE `store_room_finish`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `tabledata`
--
ALTER TABLE `tabledata`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `tabletot`
--
ALTER TABLE `tabletot`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `temtable`
--
ALTER TABLE `temtable`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advancesal`
--
ALTER TABLE `advancesal`
  MODIFY `empatid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custome_ad`
--
ALTER TABLE `custome_ad`
  MODIFY `ad_id` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empattid`
--
ALTER TABLE `empattid`
  MODIFY `empatid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empreg`
--
ALTER TABLE `empreg`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item-categories`
--
ALTER TABLE `item-categories`
  MODIFY `cat_id` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemmaster`
--
ALTER TABLE `itemmaster`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_2`
--
ALTER TABLE `item_2`
  MODIFY `slno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `slno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `slno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paysal`
--
ALTER TABLE `paysal`
  MODIFY `empatid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `readymadeitem`
--
ALTER TABLE `readymadeitem`
  MODIFY `slno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_charge`
--
ALTER TABLE `service_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stockded`
--
ALTER TABLE `stockded`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stockrem`
--
ALTER TABLE `stockrem`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_room`
--
ALTER TABLE `store_room`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_room_finish`
--
ALTER TABLE `store_room_finish`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabledata`
--
ALTER TABLE `tabledata`
  MODIFY `slno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabletot`
--
ALTER TABLE `tabletot`
  MODIFY `slno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temtable`
--
ALTER TABLE `temtable`
  MODIFY `slno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
