-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2017 at 10:28 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lantex`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(26) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(26) NOT NULL,
  `address` varchar(26) NOT NULL,
  `phone` varchar(26) NOT NULL,
  `email` varchar(26) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `EXPENSE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXPENSE_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`EXPENSE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `expenses`
--


-- --------------------------------------------------------

--
-- Table structure for table `expenses_incured`
--

CREATE TABLE IF NOT EXISTS `expenses_incured` (
  `EXPENSES_INCURED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXPENSE_ID` int(11) NOT NULL,
  `Descreption` varchar(122) NOT NULL,
  `AMOUNT_SPENT` decimal(11,2) NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`EXPENSES_INCURED_ID`),
  KEY `expenses_incured_constraint_1` (`EXPENSE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `expenses_incured`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`ITEM_ID`),
  UNIQUE KEY `ITEM_NAME` (`ITEM_NAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `items`
--


-- --------------------------------------------------------

--
-- Table structure for table `item_sellprice`
--

CREATE TABLE IF NOT EXISTS `item_sellprice` (
  `ITEM_ID` int(11) NOT NULL,
  `PRICE` decimal(11,2) NOT NULL,
  PRIMARY KEY (`ITEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_sellprice`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE IF NOT EXISTS `item_stock` (
  `ITEM_ID` int(11) NOT NULL,
  `QUANTITY` decimal(11,2) NOT NULL,
  PRIMARY KEY (`ITEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_stock`
--


-- --------------------------------------------------------

--
-- Table structure for table `payments_made`
--

CREATE TABLE IF NOT EXISTS `payments_made` (
  `PAYMENT_MADE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PURCHASE_ID` int(11) NOT NULL,
  `AMOUNT_PAID` decimal(11,2) NOT NULL,
  `DATE_OF_PAYMENT` date NOT NULL,
  PRIMARY KEY (`PAYMENT_MADE_ID`),
  KEY `payments_made_constraint_1` (`PURCHASE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `payments_made`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments_received`
--

CREATE TABLE IF NOT EXISTS `payments_received` (
  `PAYMENT_RECEIVED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SALES_ID` int(11) NOT NULL,
  `AMOUNT_PAID` decimal(11,2) NOT NULL,
  `DATE_OF_PAYMENT` date NOT NULL,
  PRIMARY KEY (`PAYMENT_RECEIVED_ID`),
  KEY `payments_recieved_constraint_1` (`SALES_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `payments_received`
--


-- --------------------------------------------------------

--
-- Table structure for table `purchased_items`
--

CREATE TABLE IF NOT EXISTS `purchased_items` (
  `PURCHASE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `SUPPLIER_ID` int(11) NOT NULL,
  `DATE_OF_PURCHASE` date NOT NULL,
  `RECEIPT_NO` varchar(122) NOT NULL,
  PRIMARY KEY (`PURCHASE_ID`),
  KEY `purchased_items_constraint_1` (`SUPPLIER_ID`),
  KEY `purchased_items_constraint_2` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `purchased_items`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchased_items_details`
--

CREATE TABLE IF NOT EXISTS `purchased_items_details` (
  `PURCHASED_ITEM_DETAILS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PURCHASE_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `PURCHASED_QUANTITY` decimal(11,2) NOT NULL,
  `BUYING_PRICE` decimal(11,2) NOT NULL,
  PRIMARY KEY (`PURCHASED_ITEM_DETAILS_ID`),
  KEY `purchased_items_details_constraint_1` (`PURCHASE_ID`),
  KEY `purchased_items_details_constraint_2` (`ITEM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `purchased_items_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `SALES_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `DATE_OF_SALE` date NOT NULL,
  PRIMARY KEY (`SALES_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `sales`
--


-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE IF NOT EXISTS `sales_details` (
  `SALE_DETAILS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SALES_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `QUANTITY_SOLD` decimal(11,2) NOT NULL,
  `SELLING_PRICE` decimal(11,2) NOT NULL,
  PRIMARY KEY (`SALE_DETAILS_ID`),
  KEY `sales_details_constraint_1` (`SALES_ID`),
  KEY `sales_details_constraint_2` (`ITEM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `sales_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(26) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(26) NOT NULL,
  `address` varchar(26) NOT NULL,
  `phone` varchar(26) NOT NULL,
  `email` varchar(26) NOT NULL,
  `position` varchar(26) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `staff`
--

-- --------------------------------------------------------

--
-- Table structure for table `stock_taking`
--

CREATE TABLE IF NOT EXISTS `stock_taking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM_ID` int(11) NOT NULL,
  `COMPUTER STOCK` decimal(11,2) NOT NULL,
  `PHYSICAL_STOCK` decimal(11,2) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `stock_taking`
--

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(26) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(26) NOT NULL,
  `phone` varchar(26) NOT NULL,
  `email` varchar(26) NOT NULL,
  `address` varchar(26) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `suppliers`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(26) NOT NULL AUTO_INCREMENT,
  `username` varchar(26) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(26) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'ceo', '55161575f3e05dfb61145c5d63d67d29', 'ceo');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses_incured`
--
ALTER TABLE `expenses_incured`
  ADD CONSTRAINT `expenses_incured_constraint_1` FOREIGN KEY (`EXPENSE_ID`) REFERENCES `expenses` (`EXPENSE_ID`);

--
-- Constraints for table `item_sellprice`
--
ALTER TABLE `item_sellprice`
  ADD CONSTRAINT `item_sellprice_constraint_1` FOREIGN KEY (`ITEM_ID`) REFERENCES `items` (`ITEM_ID`);

--
-- Constraints for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD CONSTRAINT `item_stock_constraint_1` FOREIGN KEY (`ITEM_ID`) REFERENCES `items` (`ITEM_ID`);

--
-- Constraints for table `payments_made`
--
ALTER TABLE `payments_made`
  ADD CONSTRAINT `payments_made_constraint_1` FOREIGN KEY (`PURCHASE_ID`) REFERENCES `purchased_items` (`PURCHASE_ID`);

--
-- Constraints for table `payments_received`
--
ALTER TABLE `payments_received`
  ADD CONSTRAINT `payments_recieved_constraint_1` FOREIGN KEY (`SALES_ID`) REFERENCES `sales` (`SALES_ID`);

--
-- Constraints for table `purchased_items`
--
ALTER TABLE `purchased_items`
  ADD CONSTRAINT `purchased_items_constraint_1` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `suppliers` (`supplier_id`),
  ADD CONSTRAINT `purchased_items_constraint_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`id`);

--
-- Constraints for table `purchased_items_details`
--
ALTER TABLE `purchased_items_details`
  ADD CONSTRAINT `purchased_items_details_constraint_1` FOREIGN KEY (`PURCHASE_ID`) REFERENCES `purchased_items` (`PURCHASE_ID`),
  ADD CONSTRAINT `purchased_items_details_constraint_2` FOREIGN KEY (`ITEM_ID`) REFERENCES `items` (`ITEM_ID`);

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_constraint_1` FOREIGN KEY (`SALES_ID`) REFERENCES `sales` (`SALES_ID`),
  ADD CONSTRAINT `sales_details_constraint_2` FOREIGN KEY (`ITEM_ID`) REFERENCES `items` (`ITEM_ID`);
