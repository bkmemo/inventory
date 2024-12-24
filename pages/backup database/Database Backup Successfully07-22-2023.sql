DROP TABLE IF EXISTS brands;

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(225) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO brands VALUES("1","Samsung");
INSERT INTO brands VALUES("2","Techno");
INSERT INTO brands VALUES("3","Sony");
INSERT INTO brands VALUES("4","Huawei");
INSERT INTO brands VALUES("5","Iphone");
INSERT INTO brands VALUES("6","Itel");
INSERT INTO brands VALUES("7","xiaomi");
INSERT INTO brands VALUES("8","Motorola");
INSERT INTO brands VALUES("9","oneplus");
INSERT INTO brands VALUES("10","oppo");
INSERT INTO brands VALUES("11","vivo");
INSERT INTO brands VALUES("12","Sharp");
INSERT INTO brands VALUES("13","APPLE");
INSERT INTO brands VALUES("14","LG");
INSERT INTO brands VALUES("15","hisense");
INSERT INTO brands VALUES("16","Others");
INSERT INTO brands VALUES("17","Nokia");
INSERT INTO brands VALUES("18","google pixel");
INSERT INTO brands VALUES("19","Otherswf");


DROP TABLE IF EXISTS category;

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO category VALUES("1","Mobile Phones","Phones");
INSERT INTO category VALUES("2","Phone Accessories","Accessories");
INSERT INTO category VALUES("3","Tabs","Tablates");
INSERT INTO category VALUES("4","Jbl","Jbl");


DROP TABLE IF EXISTS customer;

CREATE TABLE `customer` (
  `customer_id` int(26) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(26) NOT NULL,
  `address` varchar(26) NOT NULL,
  `phone` varchar(26) NOT NULL,
  `email` varchar(26) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO customer VALUES("1","Cash Customers","Kampala","0771000000","info@mobileshop.ug");
INSERT INTO customer VALUES("2","JBK","E-tower Kampala Uganda","07898898","n@f.com");


DROP TABLE IF EXISTS expenses;

CREATE TABLE `expenses` (
  `EXPENSE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXPENSE_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`EXPENSE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



DROP TABLE IF EXISTS expenses_incured;

CREATE TABLE `expenses_incured` (
  `EXPENSES_INCURED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXPENSE_ID` int(11) NOT NULL,
  `EXPENSE_NAME` varchar(225) NOT NULL,
  `Descreption` varchar(122) NOT NULL,
  `AMOUNT_SPENT` decimal(11,2) NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`EXPENSES_INCURED_ID`),
  KEY `Cons1` (`EXPENSE_ID`),
  CONSTRAINT `Cons1` FOREIGN KEY (`EXPENSE_ID`) REFERENCES `expenses` (`EXPENSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



DROP TABLE IF EXISTS income;

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL AUTO_INCREMENT,
  `income_name` varchar(50) NOT NULL,
  `amount_earned` int(11) NOT NULL,
  `description` varchar(566) NOT NULL,
  `income_date` date NOT NULL,
  PRIMARY KEY (`income_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



DROP TABLE IF EXISTS item_sellprice;

CREATE TABLE `item_sellprice` (
  `ITEM_ID` int(11) NOT NULL,
  `PRICE` decimal(11,2) NOT NULL,
  `BUY_PRICE` int(11) NOT NULL,
  PRIMARY KEY (`ITEM_ID`),
  CONSTRAINT `item_sellprice_constraint_1` FOREIGN KEY (`ITEM_ID`) REFERENCES `items` (`ITEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO item_sellprice VALUES("1","550000.00","0");
INSERT INTO item_sellprice VALUES("2","780000.00","0");
INSERT INTO item_sellprice VALUES("3","690000.00","0");
INSERT INTO item_sellprice VALUES("4","550000.00","0");
INSERT INTO item_sellprice VALUES("5","390000.00","0");
INSERT INTO item_sellprice VALUES("6","850000.00","0");
INSERT INTO item_sellprice VALUES("7","480000.00","0");
INSERT INTO item_sellprice VALUES("8","890000.00","0");
INSERT INTO item_sellprice VALUES("9","1050000.00","0");
INSERT INTO item_sellprice VALUES("10","1650000.00","0");
INSERT INTO item_sellprice VALUES("11","650000.00","0");
INSERT INTO item_sellprice VALUES("12","850000.00","0");
INSERT INTO item_sellprice VALUES("13","1050000.00","0");
INSERT INTO item_sellprice VALUES("14","940000.00","0");
INSERT INTO item_sellprice VALUES("15","480000.00","0");
INSERT INTO item_sellprice VALUES("16","470000.00","0");
INSERT INTO item_sellprice VALUES("17","1200000.00","0");
INSERT INTO item_sellprice VALUES("18","1100000.00","0");
INSERT INTO item_sellprice VALUES("19","1250000.00","0");
INSERT INTO item_sellprice VALUES("20","1980000.00","0");
INSERT INTO item_sellprice VALUES("21","2750000.00","0");
INSERT INTO item_sellprice VALUES("22","690000.00","0");
INSERT INTO item_sellprice VALUES("23","1100000.00","0");
INSERT INTO item_sellprice VALUES("24","1750000.00","0");
INSERT INTO item_sellprice VALUES("25","950000.00","0");
INSERT INTO item_sellprice VALUES("26","1350000.00","0");
INSERT INTO item_sellprice VALUES("27","1250000.00","0");
INSERT INTO item_sellprice VALUES("28","3000000.00","0");
INSERT INTO item_sellprice VALUES("29","1450000.00","0");
INSERT INTO item_sellprice VALUES("30","1650000.00","0");
INSERT INTO item_sellprice VALUES("31","890000.00","0");
INSERT INTO item_sellprice VALUES("32","1000000.00","0");
INSERT INTO item_sellprice VALUES("33","2410000.00","0");
INSERT INTO item_sellprice VALUES("34","2550000.00","0");
INSERT INTO item_sellprice VALUES("35","1350000.00","0");
INSERT INTO item_sellprice VALUES("36","1270000.00","0");
INSERT INTO item_sellprice VALUES("37","1200000.00","0");
INSERT INTO item_sellprice VALUES("38","890000.00","0");
INSERT INTO item_sellprice VALUES("39","1050000.00","0");
INSERT INTO item_sellprice VALUES("40","780000.00","0");
INSERT INTO item_sellprice VALUES("41","930000.00","0");
INSERT INTO item_sellprice VALUES("42","1550000.00","0");
INSERT INTO item_sellprice VALUES("43","1500000.00","0");
INSERT INTO item_sellprice VALUES("44","2250000.00","0");
INSERT INTO item_sellprice VALUES("45","1990000.00","0");
INSERT INTO item_sellprice VALUES("46","1790000.00","0");
INSERT INTO item_sellprice VALUES("47","1850000.00","0");
INSERT INTO item_sellprice VALUES("48","490000.00","0");
INSERT INTO item_sellprice VALUES("49","580000.00","0");
INSERT INTO item_sellprice VALUES("50","1250000.00","0");
INSERT INTO item_sellprice VALUES("51","400000.00","0");
INSERT INTO item_sellprice VALUES("52","450000.00","0");
INSERT INTO item_sellprice VALUES("53","580000.00","0");
INSERT INTO item_sellprice VALUES("54","850000.00","0");
INSERT INTO item_sellprice VALUES("55","450000.00","0");
INSERT INTO item_sellprice VALUES("56","370000.00","0");
INSERT INTO item_sellprice VALUES("57","370000.00","0");
INSERT INTO item_sellprice VALUES("58","300000.00","0");
INSERT INTO item_sellprice VALUES("59","490000.00","0");
INSERT INTO item_sellprice VALUES("60","470000.00","0");
INSERT INTO item_sellprice VALUES("61","640000.00","0");
INSERT INTO item_sellprice VALUES("62","550000.00","0");
INSERT INTO item_sellprice VALUES("63","1490000.00","0");
INSERT INTO item_sellprice VALUES("64","350000.00","0");
INSERT INTO item_sellprice VALUES("65","550000.00","0");
INSERT INTO item_sellprice VALUES("66","950000.00","0");
INSERT INTO item_sellprice VALUES("67","550000.00","0");
INSERT INTO item_sellprice VALUES("68","300000.00","0");
INSERT INTO item_sellprice VALUES("69","300000.00","0");
INSERT INTO item_sellprice VALUES("70","250000.00","0");
INSERT INTO item_sellprice VALUES("71","1590000.00","0");
INSERT INTO item_sellprice VALUES("72","410000.00","0");
INSERT INTO item_sellprice VALUES("73","300000.00","0");
INSERT INTO item_sellprice VALUES("74","850000.00","0");
INSERT INTO item_sellprice VALUES("75","580000.00","0");
INSERT INTO item_sellprice VALUES("76","580000.00","0");
INSERT INTO item_sellprice VALUES("77","450000.00","0");
INSERT INTO item_sellprice VALUES("78","650000.00","0");
INSERT INTO item_sellprice VALUES("79","450000.00","0");
INSERT INTO item_sellprice VALUES("80","450000.00","0");
INSERT INTO item_sellprice VALUES("81","250000.00","0");
INSERT INTO item_sellprice VALUES("82","250000.00","0");
INSERT INTO item_sellprice VALUES("83","390000.00","0");
INSERT INTO item_sellprice VALUES("84","1990000.00","0");
INSERT INTO item_sellprice VALUES("85","450000.00","0");
INSERT INTO item_sellprice VALUES("86","470000.00","0");
INSERT INTO item_sellprice VALUES("87","650000.00","0");
INSERT INTO item_sellprice VALUES("88","1450000.00","0");
INSERT INTO item_sellprice VALUES("89","950000.00","0");
INSERT INTO item_sellprice VALUES("90","2550000.00","0");
INSERT INTO item_sellprice VALUES("91","1850000.00","0");
INSERT INTO item_sellprice VALUES("92","2570000.00","0");
INSERT INTO item_sellprice VALUES("93","3750000.00","0");
INSERT INTO item_sellprice VALUES("94","2940000.00","0");
INSERT INTO item_sellprice VALUES("95","1100000.00","0");
INSERT INTO item_sellprice VALUES("96","2120000.00","0");
INSERT INTO item_sellprice VALUES("97","4980000.00","0");
INSERT INTO item_sellprice VALUES("98","1140000.00","0");
INSERT INTO item_sellprice VALUES("99","450000.00","0");
INSERT INTO item_sellprice VALUES("100","1100000.00","0");
INSERT INTO item_sellprice VALUES("101","650000.00","0");
INSERT INTO item_sellprice VALUES("102","1250000.00","0");
INSERT INTO item_sellprice VALUES("103","1150000.00","0");
INSERT INTO item_sellprice VALUES("104","1270000.00","0");
INSERT INTO item_sellprice VALUES("105","830000.00","0");
INSERT INTO item_sellprice VALUES("106","770000.00","0");
INSERT INTO item_sellprice VALUES("107","1550000.00","0");
INSERT INTO item_sellprice VALUES("108","420000.00","0");
INSERT INTO item_sellprice VALUES("109","590000.00","0");
INSERT INTO item_sellprice VALUES("110","930000.00","0");
INSERT INTO item_sellprice VALUES("111","790000.00","0");
INSERT INTO item_sellprice VALUES("112","520000.00","0");
INSERT INTO item_sellprice VALUES("113","790000.00","0");
INSERT INTO item_sellprice VALUES("114","930000.00","0");
INSERT INTO item_sellprice VALUES("115","950000.00","0");
INSERT INTO item_sellprice VALUES("116","4500000.00","0");
INSERT INTO item_sellprice VALUES("117","4200000.00","0");
INSERT INTO item_sellprice VALUES("118","2410000.00","0");
INSERT INTO item_sellprice VALUES("119","830000.00","0");
INSERT INTO item_sellprice VALUES("120","830000.00","0");
INSERT INTO item_sellprice VALUES("121","750000.00","0");
INSERT INTO item_sellprice VALUES("122","650000.00","0");
INSERT INTO item_sellprice VALUES("123","700000.00","0");
INSERT INTO item_sellprice VALUES("124","1590000.00","0");
INSERT INTO item_sellprice VALUES("125","550000.00","0");
INSERT INTO item_sellprice VALUES("126","580000.00","0");
INSERT INTO item_sellprice VALUES("127","550000.00","0");
INSERT INTO item_sellprice VALUES("128","580000.00","0");
INSERT INTO item_sellprice VALUES("129","1300000.00","0");
INSERT INTO item_sellprice VALUES("130","600000.00","0");
INSERT INTO item_sellprice VALUES("131","4450000.00","0");
INSERT INTO item_sellprice VALUES("132","4250000.00","0");
INSERT INTO item_sellprice VALUES("133","1900000.00","0");
INSERT INTO item_sellprice VALUES("134","1600000.00","0");
INSERT INTO item_sellprice VALUES("135","3420000.00","0");
INSERT INTO item_sellprice VALUES("136","3000000.00","0");
INSERT INTO item_sellprice VALUES("137","2.00","0");
INSERT INTO item_sellprice VALUES("138","2250000.00","0");
INSERT INTO item_sellprice VALUES("139","600000.00","0");
INSERT INTO item_sellprice VALUES("140","780.00","0");
INSERT INTO item_sellprice VALUES("141","730.00","0");
INSERT INTO item_sellprice VALUES("142","470.00","0");
INSERT INTO item_sellprice VALUES("143","1.00","0");
INSERT INTO item_sellprice VALUES("144","1.00","0");
INSERT INTO item_sellprice VALUES("145","830000.00","0");
INSERT INTO item_sellprice VALUES("146","360000.00","0");
INSERT INTO item_sellprice VALUES("147","550000.00","0");
INSERT INTO item_sellprice VALUES("148","1400000.00","0");
INSERT INTO item_sellprice VALUES("149","1600000.00","0");
INSERT INTO item_sellprice VALUES("150","6000000.00","0");
INSERT INTO item_sellprice VALUES("151","4.00","0");
INSERT INTO item_sellprice VALUES("152","4.00","0");
INSERT INTO item_sellprice VALUES("153","4.00","0");
INSERT INTO item_sellprice VALUES("154","3.00","0");
INSERT INTO item_sellprice VALUES("155","3.00","0");
INSERT INTO item_sellprice VALUES("156","3.00","0");
INSERT INTO item_sellprice VALUES("157","3150000.00","0");
INSERT INTO item_sellprice VALUES("158","330000.00","0");
INSERT INTO item_sellprice VALUES("159","490000.00","0");
INSERT INTO item_sellprice VALUES("160","650000.00","0");
INSERT INTO item_sellprice VALUES("161","420000.00","0");
INSERT INTO item_sellprice VALUES("162","1290000.00","0");
INSERT INTO item_sellprice VALUES("163","1400000.00","0");
INSERT INTO item_sellprice VALUES("164","1790000.00","0");
INSERT INTO item_sellprice VALUES("165","3980000.00","0");
INSERT INTO item_sellprice VALUES("166","2070000.00","0");
INSERT INTO item_sellprice VALUES("167","4600000.00","0");
INSERT INTO item_sellprice VALUES("168","3580000.00","0");
INSERT INTO item_sellprice VALUES("169","1490000.00","0");
INSERT INTO item_sellprice VALUES("170","1650000.00","0");
INSERT INTO item_sellprice VALUES("171","1590000.00","0");
INSERT INTO item_sellprice VALUES("172","1650000.00","0");
INSERT INTO item_sellprice VALUES("173","2250000.00","0");
INSERT INTO item_sellprice VALUES("174","250000.00","0");
INSERT INTO item_sellprice VALUES("175","250000.00","0");
INSERT INTO item_sellprice VALUES("176","2150000.00","0");


DROP TABLE IF EXISTS item_stock;

CREATE TABLE `item_stock` (
  `ITEM_ID` int(11) NOT NULL,
  `QUANTITY` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO item_stock VALUES("1","13.00");
INSERT INTO item_stock VALUES("2","7.00");
INSERT INTO item_stock VALUES("3","0.00");
INSERT INTO item_stock VALUES("4","4.00");
INSERT INTO item_stock VALUES("5","15.00");
INSERT INTO item_stock VALUES("6","0.00");
INSERT INTO item_stock VALUES("7","10.00");
INSERT INTO item_stock VALUES("8","3.00");
INSERT INTO item_stock VALUES("9","10.00");
INSERT INTO item_stock VALUES("10","0.00");
INSERT INTO item_stock VALUES("11","3.00");
INSERT INTO item_stock VALUES("12","7.00");
INSERT INTO item_stock VALUES("13","9.00");
INSERT INTO item_stock VALUES("14","0.00");
INSERT INTO item_stock VALUES("15","5.00");
INSERT INTO item_stock VALUES("16","4.00");
INSERT INTO item_stock VALUES("17","0.00");
INSERT INTO item_stock VALUES("18","0.00");
INSERT INTO item_stock VALUES("19","0.00");
INSERT INTO item_stock VALUES("20","0.00");
INSERT INTO item_stock VALUES("21","3.00");
INSERT INTO item_stock VALUES("22","9.00");
INSERT INTO item_stock VALUES("23","7.00");
INSERT INTO item_stock VALUES("24","0.00");
INSERT INTO item_stock VALUES("25","7.00");
INSERT INTO item_stock VALUES("26","6.00");
INSERT INTO item_stock VALUES("27","6.00");
INSERT INTO item_stock VALUES("28","0.00");
INSERT INTO item_stock VALUES("29","0.00");
INSERT INTO item_stock VALUES("30","2.00");
INSERT INTO item_stock VALUES("31","0.00");
INSERT INTO item_stock VALUES("32","0.00");
INSERT INTO item_stock VALUES("33","0.00");
INSERT INTO item_stock VALUES("34","4.00");
INSERT INTO item_stock VALUES("35","0.00");
INSERT INTO item_stock VALUES("36","0.00");
INSERT INTO item_stock VALUES("37","0.00");
INSERT INTO item_stock VALUES("38","0.00");
INSERT INTO item_stock VALUES("39","0.00");
INSERT INTO item_stock VALUES("40","0.00");
INSERT INTO item_stock VALUES("41","0.00");
INSERT INTO item_stock VALUES("42","1.00");
INSERT INTO item_stock VALUES("43","0.00");
INSERT INTO item_stock VALUES("44","3.00");
INSERT INTO item_stock VALUES("45","0.00");
INSERT INTO item_stock VALUES("46","0.00");
INSERT INTO item_stock VALUES("47","1.00");
INSERT INTO item_stock VALUES("48","5.00");
INSERT INTO item_stock VALUES("49","5.00");
INSERT INTO item_stock VALUES("50","0.00");
INSERT INTO item_stock VALUES("51","4.00");
INSERT INTO item_stock VALUES("52","6.00");
INSERT INTO item_stock VALUES("53","0.00");
INSERT INTO item_stock VALUES("54","0.00");
INSERT INTO item_stock VALUES("55","0.00");
INSERT INTO item_stock VALUES("56","0.00");
INSERT INTO item_stock VALUES("57","9.00");
INSERT INTO item_stock VALUES("58","0.00");
INSERT INTO item_stock VALUES("59","0.00");
INSERT INTO item_stock VALUES("60","0.00");
INSERT INTO item_stock VALUES("61","1.00");
INSERT INTO item_stock VALUES("62","0.00");
INSERT INTO item_stock VALUES("63","0.00");
INSERT INTO item_stock VALUES("64","0.00");
INSERT INTO item_stock VALUES("65","0.00");
INSERT INTO item_stock VALUES("66","0.00");
INSERT INTO item_stock VALUES("67","0.00");
INSERT INTO item_stock VALUES("68","15.00");
INSERT INTO item_stock VALUES("69","0.00");
INSERT INTO item_stock VALUES("70","0.00");
INSERT INTO item_stock VALUES("71","0.00");
INSERT INTO item_stock VALUES("72","1.00");
INSERT INTO item_stock VALUES("73","0.00");
INSERT INTO item_stock VALUES("74","0.00");
INSERT INTO item_stock VALUES("75","0.00");
INSERT INTO item_stock VALUES("76","0.00");
INSERT INTO item_stock VALUES("77","0.00");
INSERT INTO item_stock VALUES("78","0.00");
INSERT INTO item_stock VALUES("79","0.00");
INSERT INTO item_stock VALUES("80","0.00");
INSERT INTO item_stock VALUES("81","0.00");
INSERT INTO item_stock VALUES("82","0.00");
INSERT INTO item_stock VALUES("83","2.00");
INSERT INTO item_stock VALUES("84","0.00");
INSERT INTO item_stock VALUES("85","0.00");
INSERT INTO item_stock VALUES("86","0.00");
INSERT INTO item_stock VALUES("87","2.00");
INSERT INTO item_stock VALUES("88","0.00");
INSERT INTO item_stock VALUES("89","2.00");
INSERT INTO item_stock VALUES("90","2.00");
INSERT INTO item_stock VALUES("91","0.00");
INSERT INTO item_stock VALUES("92","2.00");
INSERT INTO item_stock VALUES("93","0.00");
INSERT INTO item_stock VALUES("94","1.00");
INSERT INTO item_stock VALUES("95","0.00");
INSERT INTO item_stock VALUES("96","0.00");
INSERT INTO item_stock VALUES("97","3.00");
INSERT INTO item_stock VALUES("98","0.00");
INSERT INTO item_stock VALUES("99","0.00");
INSERT INTO item_stock VALUES("100","0.00");
INSERT INTO item_stock VALUES("101","0.00");
INSERT INTO item_stock VALUES("102","0.00");
INSERT INTO item_stock VALUES("103","0.00");
INSERT INTO item_stock VALUES("104","0.00");
INSERT INTO item_stock VALUES("105","0.00");
INSERT INTO item_stock VALUES("106","2.00");
INSERT INTO item_stock VALUES("107","0.00");
INSERT INTO item_stock VALUES("108","0.00");
INSERT INTO item_stock VALUES("109","0.00");
INSERT INTO item_stock VALUES("110","0.00");
INSERT INTO item_stock VALUES("111","0.00");
INSERT INTO item_stock VALUES("112","0.00");
INSERT INTO item_stock VALUES("113","0.00");
INSERT INTO item_stock VALUES("114","5.00");
INSERT INTO item_stock VALUES("115","0.00");
INSERT INTO item_stock VALUES("116","1.00");
INSERT INTO item_stock VALUES("117","1.00");
INSERT INTO item_stock VALUES("118","0.00");
INSERT INTO item_stock VALUES("119","0.00");
INSERT INTO item_stock VALUES("120","3.00");
INSERT INTO item_stock VALUES("121","3.00");
INSERT INTO item_stock VALUES("122","0.00");
INSERT INTO item_stock VALUES("123","0.00");
INSERT INTO item_stock VALUES("124","0.00");
INSERT INTO item_stock VALUES("125","0.00");
INSERT INTO item_stock VALUES("126","0.00");
INSERT INTO item_stock VALUES("127","0.00");
INSERT INTO item_stock VALUES("128","0.00");
INSERT INTO item_stock VALUES("129","2.00");
INSERT INTO item_stock VALUES("130","0.00");
INSERT INTO item_stock VALUES("131","0.00");
INSERT INTO item_stock VALUES("132","0.00");
INSERT INTO item_stock VALUES("133","0.00");
INSERT INTO item_stock VALUES("134","1.00");
INSERT INTO item_stock VALUES("135","0.00");
INSERT INTO item_stock VALUES("136","0.00");
INSERT INTO item_stock VALUES("137","1.00");
INSERT INTO item_stock VALUES("138","0.00");
INSERT INTO item_stock VALUES("139","0.00");
INSERT INTO item_stock VALUES("140","3.00");
INSERT INTO item_stock VALUES("141","5.00");
INSERT INTO item_stock VALUES("142","0.00");
INSERT INTO item_stock VALUES("143","5.00");
INSERT INTO item_stock VALUES("144","0.00");
INSERT INTO item_stock VALUES("145","0.00");
INSERT INTO item_stock VALUES("146","3.00");
INSERT INTO item_stock VALUES("147","0.00");
INSERT INTO item_stock VALUES("148","0.00");
INSERT INTO item_stock VALUES("149","0.00");
INSERT INTO item_stock VALUES("150","1.00");
INSERT INTO item_stock VALUES("151","1.00");
INSERT INTO item_stock VALUES("152","1.00");
INSERT INTO item_stock VALUES("153","4.00");
INSERT INTO item_stock VALUES("154","0.00");
INSERT INTO item_stock VALUES("155","2.00");
INSERT INTO item_stock VALUES("156","0.00");
INSERT INTO item_stock VALUES("157","1.00");
INSERT INTO item_stock VALUES("158","15.00");
INSERT INTO item_stock VALUES("159","2.00");
INSERT INTO item_stock VALUES("160","0.00");
INSERT INTO item_stock VALUES("161","0.00");
INSERT INTO item_stock VALUES("162","2.00");
INSERT INTO item_stock VALUES("163","1.00");
INSERT INTO item_stock VALUES("164","1.00");
INSERT INTO item_stock VALUES("165","2.00");
INSERT INTO item_stock VALUES("166","2.00");
INSERT INTO item_stock VALUES("167","1.00");
INSERT INTO item_stock VALUES("168","2.00");
INSERT INTO item_stock VALUES("169","2.00");
INSERT INTO item_stock VALUES("170","2.00");
INSERT INTO item_stock VALUES("171","2.00");
INSERT INTO item_stock VALUES("172","0.00");
INSERT INTO item_stock VALUES("173","0.00");
INSERT INTO item_stock VALUES("174","10.00");
INSERT INTO item_stock VALUES("175","10.00");
INSERT INTO item_stock VALUES("176","1.00");


DROP TABLE IF EXISTS items;

CREATE TABLE `items` (
  `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `ITEM_NAME` varchar(500) NOT NULL,
  PRIMARY KEY (`ITEM_ID`),
  KEY `Cons` (`brand_id`),
  CONSTRAINT `Cons` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO items VALUES("1","1","Samsung s9 plus");
INSERT INTO items VALUES("2","1","Samsung s10 plus");
INSERT INTO items VALUES("3","1","samsung note 9");
INSERT INTO items VALUES("4","1","Samsung note 8");
INSERT INTO items VALUES("5","1","Samsung s8");
INSERT INTO items VALUES("6","1","Samsung Note 10");
INSERT INTO items VALUES("7","1","Samsung s10e");
INSERT INTO items VALUES("8","1","Samsung s20");
INSERT INTO items VALUES("9","1","Samsung Note 10 plus");
INSERT INTO items VALUES("10","1","Samsung s22");
INSERT INTO items VALUES("11","1","Google Pixel 4A 5G");
INSERT INTO items VALUES("12","1","Google Pixel 5");
INSERT INTO items VALUES("13","1","Google Pixel 6");
INSERT INTO items VALUES("14","1","Samsung Tab A8 ");
INSERT INTO items VALUES("15","1","Samsung S8 plus");
INSERT INTO items VALUES("16","1","Samsung S9");
INSERT INTO items VALUES("17","1","Samsung s20 ultra");
INSERT INTO items VALUES("18","1","Samsung NOTE 20");
INSERT INTO items VALUES("19","1","Samsung s21 plus");
INSERT INTO items VALUES("20","1","Samsung s22 plus");
INSERT INTO items VALUES("21","1","Samsung s22 ultra 128");
INSERT INTO items VALUES("22","1","Samsung S10");
INSERT INTO items VALUES("23","1","Samsung s21 ");
INSERT INTO items VALUES("24","1","Samsung s21 ultra");
INSERT INTO items VALUES("25","1","Samsung s20 plus");
INSERT INTO items VALUES("26","1","Iphone 11 128gb");
INSERT INTO items VALUES("27","1","Iphone 11 64gb");
INSERT INTO items VALUES("28","1","Iphone 13pro 128gb");
INSERT INTO items VALUES("29","1","Iphone 11 pro 64gb");
INSERT INTO items VALUES("30","1","Iphone 11 pro 256gb");
INSERT INTO items VALUES("31","1","Iphone xr 64gb");
INSERT INTO items VALUES("32","1","Iphone xr 128");
INSERT INTO items VALUES("33","1","Iphone 12 promax 128gb");
INSERT INTO items VALUES("34","1","Iphone 12 promax 256");
INSERT INTO items VALUES("35","1","Iphone xsmax 512gb");
INSERT INTO items VALUES("36","1","Iphone xsmax 256gb");
INSERT INTO items VALUES("37","1","Iphone xsmax 64gb");
INSERT INTO items VALUES("38","1","Iphone xs 64");
INSERT INTO items VALUES("39","1","Iphone xs 256");
INSERT INTO items VALUES("40","1","Iphone x64");
INSERT INTO items VALUES("41","1","Iphone x256");
INSERT INTO items VALUES("42","1","Iphone 12 128gb");
INSERT INTO items VALUES("43","1","Iphone 12 64gb");
INSERT INTO items VALUES("44","1","Iphone 12 pro 256");
INSERT INTO items VALUES("45","1","Iphone 12 pro 128");
INSERT INTO items VALUES("46","1","Iphone 11 promax 64");
INSERT INTO items VALUES("47","1","Iphone 11 promax 256gb");
INSERT INTO items VALUES("48","1","Iphone 7plus 32");
INSERT INTO items VALUES("49","1","Iphone 7plus 128gb");
INSERT INTO items VALUES("50","1","Iphone 12 mini 64gb");
INSERT INTO items VALUES("51","1","Iphone 7 32gb");
INSERT INTO items VALUES("52","1","Iphone 7 128gb");
INSERT INTO items VALUES("53","1","Iphone se 64gb");
INSERT INTO items VALUES("54","1","Iphone 8 plus 64gb");
INSERT INTO items VALUES("55","1","Sonny Experia 10a");
INSERT INTO items VALUES("56","1","Samsung A20");
INSERT INTO items VALUES("57","1","Sonny Experia xz3");
INSERT INTO items VALUES("58","1","Sonny Experia xz2 ");
INSERT INTO items VALUES("59","1","Nokia x100");
INSERT INTO items VALUES("60","1","Nokia x400");
INSERT INTO items VALUES("61","1","Oneplus N20");
INSERT INTO items VALUES("62","1","Oneplus N10");
INSERT INTO items VALUES("63","1","Oneplus 7pro");
INSERT INTO items VALUES("64","1","Hauwei p20 lite");
INSERT INTO items VALUES("65","1","Hauwei p20 PRO");
INSERT INTO items VALUES("66","1","Samsung A53");
INSERT INTO items VALUES("67","1","LG velvet v60");
INSERT INTO items VALUES("68","1","Oppo R9 plus");
INSERT INTO items VALUES("69","1","Oppo F9");
INSERT INTO items VALUES("70","1","VIVO x7");
INSERT INTO items VALUES("71","1","Samsung flip z 3");
INSERT INTO items VALUES("72","1","Samsung A21s");
INSERT INTO items VALUES("73","1","Samsung j7");
INSERT INTO items VALUES("74","1","Vivo V8");
INSERT INTO items VALUES("75","1","Samsung A32");
INSERT INTO items VALUES("76","1","Samsung m13");
INSERT INTO items VALUES("77","1","Redmi Note 9");
INSERT INTO items VALUES("78","1","Samsung A71");
INSERT INTO items VALUES("79","1","Redmi 10A");
INSERT INTO items VALUES("80","1","Motolola");
INSERT INTO items VALUES("81","1","verizone LG");
INSERT INTO items VALUES("82","1","LG Q7");
INSERT INTO items VALUES("83","1","Samsung A12");
INSERT INTO items VALUES("84","1","Samsung Fold 2");
INSERT INTO items VALUES("85","1","Google Pixel 3xl");
INSERT INTO items VALUES("86","1","Google Pixel 3AXL");
INSERT INTO items VALUES("87","1","Google Pixel 4");
INSERT INTO items VALUES("88","1","Google Pixel 6pro");
INSERT INTO items VALUES("89","1","Google Pixel 6A ");
INSERT INTO items VALUES("90","1","Google Pixel 7pro");
INSERT INTO items VALUES("91","1","Google Pixel 7");
INSERT INTO items VALUES("92","1","Samsung S23 new");
INSERT INTO items VALUES("93","1","Samsung S23 ultra ");
INSERT INTO items VALUES("94","1","Samsung S23 plus");
INSERT INTO items VALUES("95","1","Samsung m53");
INSERT INTO items VALUES("96","1","Google Pixel 7New");
INSERT INTO items VALUES("97","1","Iphone 14 promax 256 new");
INSERT INTO items VALUES("98","1","Samsung A33");
INSERT INTO items VALUES("99","1","Redmi 9A");
INSERT INTO items VALUES("100","1","Redmi Note 11 pro plus");
INSERT INTO items VALUES("101","1","Samsung F13");
INSERT INTO items VALUES("102","1","Samsung A54");
INSERT INTO items VALUES("103","1","Samsung A34");
INSERT INTO items VALUES("104","1","Samsung A53 New");
INSERT INTO items VALUES("105","1","Samsung A24");
INSERT INTO items VALUES("106","1","Samsung A13");
INSERT INTO items VALUES("107","1","Samsung A73");
INSERT INTO items VALUES("108","1","Samsung AO3 Core");
INSERT INTO items VALUES("109","1","Samsung A04s");
INSERT INTO items VALUES("110","1","Samsung M32");
INSERT INTO items VALUES("111","1","Samsung A23");
INSERT INTO items VALUES("112","1","Samsung Tab A7");
INSERT INTO items VALUES("113","1","iphonne x 64");
INSERT INTO items VALUES("114","1","iphone x 256");
INSERT INTO items VALUES("115","1","pixel 6a");
INSERT INTO items VALUES("116","1","s23 ultra 512gb");
INSERT INTO items VALUES("117","1","s23 ultra 256gb");
INSERT INTO items VALUES("118","1","Flip Z4");
INSERT INTO items VALUES("119","1","Samsung m33 128");
INSERT INTO items VALUES("120","1","A24 128/6gb");
INSERT INTO items VALUES("121","1","A24 4/128");
INSERT INTO items VALUES("122","1","A14 64gb");
INSERT INTO items VALUES("123","1","A14 128gb");
INSERT INTO items VALUES("124","1","Samsung Note 20 ultra");
INSERT INTO items VALUES("125","1","Huawei P30");
INSERT INTO items VALUES("126","1","Iphone 8");
INSERT INTO items VALUES("127","1","Iphone 8 64g");
INSERT INTO items VALUES("128","1","1phone 8 256");
INSERT INTO items VALUES("129","1","Samsung Tab S6 lite 64 gb");
INSERT INTO items VALUES("130","1","Samsung Tab A7 lite 32gb");
INSERT INTO items VALUES("131","1","fold 4 512gb");
INSERT INTO items VALUES("132","1","fold 4 256gb");
INSERT INTO items VALUES("133","1","iphone 12 64gb");
INSERT INTO items VALUES("134","1","iphone 12128gb");
INSERT INTO items VALUES("135","1","iphone 14 256gb");
INSERT INTO items VALUES("136","1","iphone 14 128gb");
INSERT INTO items VALUES("137","5","iphone 12 pro 128gb");
INSERT INTO items VALUES("138","1","iphone 12 pro 256gb");
INSERT INTO items VALUES("139","1","samsung a04 64gb");
INSERT INTO items VALUES("140","1","samsung a23 128gb");
INSERT INTO items VALUES("141","1","samsung a23 64gb ");
INSERT INTO items VALUES("142","1","samsung a04 32gb");
INSERT INTO items VALUES("143","1","samsung a54 8/256");
INSERT INTO items VALUES("144","1","samsung a54 8/128");
INSERT INTO items VALUES("145","1","samsung m33 6/128gb");
INSERT INTO items VALUES("146","18","pixel 3");
INSERT INTO items VALUES("147","18","pixel 4a");
INSERT INTO items VALUES("148","18","pixel 6 pro");
INSERT INTO items VALUES("149","1","oppo reno 8t 5g");
INSERT INTO items VALUES("150","5","iphone 14 pro max 1tb");
INSERT INTO items VALUES("151","5","iphone 14 pro max 128gb");
INSERT INTO items VALUES("152","5","iphone 14 pro 128gb");
INSERT INTO items VALUES("153","5","iphone 14 pro 256gb");
INSERT INTO items VALUES("154","5","iphone 13 pro 128gb");
INSERT INTO items VALUES("155","5","iphobe 13 pro 256gb");
INSERT INTO items VALUES("156","5","iphone 13 pro  max 256gb");
INSERT INTO items VALUES("157","1","S22 ULTRA 256");
INSERT INTO items VALUES("158","8","MOTO G PURE");
INSERT INTO items VALUES("159","9","NORD 200");
INSERT INTO items VALUES("160","9","NORD 20");
INSERT INTO items VALUES("161","1","galaxy a30s");
INSERT INTO items VALUES("162","1","galaxy A53 8/128GB");
INSERT INTO items VALUES("163","1","A53 8/256GB");
INSERT INTO items VALUES("164","1","A73 8/256GB");
INSERT INTO items VALUES("165","1","tab s8 ultra 12/256gb");
INSERT INTO items VALUES("166","13","iphone 13 mini");
INSERT INTO items VALUES("167","13","14 pro max 256gb");
INSERT INTO items VALUES("168","13","13 pro max 256gb");
INSERT INTO items VALUES("169","1","note 20 ultra 128gb");
INSERT INTO items VALUES("170","9","oneplus 10T");
INSERT INTO items VALUES("171","9","oneplus 11R");
INSERT INTO items VALUES("172","9","note 20 ultra 256gb");
INSERT INTO items VALUES("173","1","pixel 7 pro");
INSERT INTO items VALUES("174","3","xz1");
INSERT INTO items VALUES("175","10","oppo f5");
INSERT INTO items VALUES("176","9","ONEPLUS 10 PRO");


DROP TABLE IF EXISTS payments_made;

CREATE TABLE `payments_made` (
  `PAYMENT_MADE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PURCHASE_ID` int(11) NOT NULL,
  `AMOUNT_PAID` decimal(11,2) NOT NULL,
  `DATE_OF_PAYMENT` date NOT NULL,
  PRIMARY KEY (`PAYMENT_MADE_ID`),
  KEY `Cons2` (`PURCHASE_ID`),
  CONSTRAINT `Cons2` FOREIGN KEY (`PURCHASE_ID`) REFERENCES `purchased_items` (`PURCHASE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO payments_made VALUES("1","1","950000.00","2023-07-12");
INSERT INTO payments_made VALUES("2","2","95000.00","2023-07-12");
INSERT INTO payments_made VALUES("3","3","4750000.00","2023-07-13");
INSERT INTO payments_made VALUES("4","4","4750000.00","2023-07-13");
INSERT INTO payments_made VALUES("5","5","4250000.00","2023-07-13");
INSERT INTO payments_made VALUES("8","10","4750000.00","2023-07-13");
INSERT INTO payments_made VALUES("9","8","4250000.00","2023-07-13");
INSERT INTO payments_made VALUES("10","9","4250000.00","2023-07-13");
INSERT INTO payments_made VALUES("11","11","7160000.00","2023-07-15");
INSERT INTO payments_made VALUES("12","18","1800000.00","2023-07-15");
INSERT INTO payments_made VALUES("13","20","1600000.00","2023-07-15");
INSERT INTO payments_made VALUES("14","23","1300000.00","2023-07-15");


DROP TABLE IF EXISTS payments_received;

CREATE TABLE `payments_received` (
  `PAYMENT_RECEIVED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SALES_ID` int(11) NOT NULL,
  `AMOUNT_PAID` decimal(11,2) NOT NULL,
  `DATE_OF_PAYMENT` date NOT NULL,
  PRIMARY KEY (`PAYMENT_RECEIVED_ID`),
  KEY `SALES_ID` (`SALES_ID`),
  CONSTRAINT `payments_received_ibfk_1` FOREIGN KEY (`SALES_ID`) REFERENCES `sales` (`SALES_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO payments_received VALUES("1","1","780000.00","2023-07-21");


DROP TABLE IF EXISTS phones;

CREATE TABLE `phones` (
  `phone_id` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM_ID` int(10) NOT NULL,
  `serial_number` varchar(225) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `customer_name` varchar(225) DEFAULT NULL,
  `customer_phone` varchar(225) DEFAULT NULL,
  `phone_status` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`phone_id`),
  UNIQUE KEY `serial_number_2` (`serial_number`),
  KEY `serial_number` (`serial_number`),
  KEY `Cons5` (`ITEM_ID`),
  KEY `supplier_id` (`supplier_id`),
  CONSTRAINT `Cons5` FOREIGN KEY (`ITEM_ID`) REFERENCES `items` (`ITEM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `phones_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=354 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO phones VALUES("1","89","355578436657064","1","2023-07-12","","","OnSale");
INSERT INTO phones VALUES("2","89","352061653681466","1","2023-07-12","","","OnSale");
INSERT INTO phones VALUES("3","151","357853685921430","8","2023-07-13","","","OnSale");
INSERT INTO phones VALUES("4","97","350270056128734","8","2023-07-13","","","OnSale");
INSERT INTO phones VALUES("5","97","359687309670975","8","2023-07-13","","","OnSale");
INSERT INTO phones VALUES("6","152","352129789830040","8","2023-07-13","","","OnSale");
INSERT INTO phones VALUES("7","153","357316491198858","8","2023-07-13","","","OnSale");
INSERT INTO phones VALUES("8","153","351131121543084","8","2023-07-13","","","OnSale");
INSERT INTO phones VALUES("9","97","350270058172805","8","2023-07-13","","","OnSale");
INSERT INTO phones VALUES("10","153","343434334424422","8","2023-07-13","","","OnSale");
INSERT INTO phones VALUES("11","153","767676776677677","8","2023-07-13","","","OnSale");
INSERT INTO phones VALUES("12","155","352668918401934","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("13","155","352668915913834","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("14","134","35304311740548","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("15","42","35746352684728","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("16","26","350559891406952","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("17","27","35655310682879","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("18","26","356866114524188","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("19","13","357403135259104","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("20","34","359237639904502","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("21","117","35385880688447","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("25","21","","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("26","21","353074280990175","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("27","21","351672493272281","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("28","21","353074280708049","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("30","116","354814720424643","8","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("65","83","352945787616234","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("66","83","352221269399057","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("67","106","357040734174571","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("68","106","359944697116529","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("69","159","868082050663144","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("70","159","868082051021300","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("71","61","868957060382381","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("72","5","355986082529380","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("73","5","355982081619652","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("74","5","355986085611847","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("75","5","357722080455825","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("76","5","357722082499565","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("77","5","355982085244036","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("78","5","359758080148364","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("79","5","355987085033925","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("80","5","357724081773594","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("81","5","358330080149064","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("82","5","359623086211352","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("83","5","357723080816446","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("84","5","357723082043726","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("85","5","357721081178865","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("86","5","357722083536605","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("87","158","357902512968195","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("88","158","352304806133146","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("89","158","352304809004047","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("90","158","357902512903390","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("91","158","357902510600824","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("92","158","357902513210639","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("93","158","352304805006202","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("94","158","357902512199940","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("95","158","352304806014411","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("96","158","357902510983634","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("97","158","357902512591682","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("98","158","357902511126829","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("99","158","352304806490116","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("100","158","357902513152666","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("101","158","357902511020469","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("102","7","354425100159046","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("103","7","354425102063949","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("104","7","354425100998971","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("105","7","354566100236167","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("106","7","354775105135833","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("107","7","354425100477760","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("108","7","354425100443838","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("109","7","352810101710263","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("110","7","354425101778331","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("111","7","354425100373308","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("112","72","351064753786707","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("113","129","354905110822139","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("114","129","354905110774769","2","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("115","146","3582750951","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("116","146","35827509162690950831","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("117","146","99001200695924","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("118","11","358118100463668148","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("119","11","358116100989740","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("120","11","358116101945626","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("121","12","355841113294662","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("122","12","352493111134582","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("123","12","352493114242044","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("124","12","352493111389467","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("125","12","352493110770881","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("126","12","352493113895461","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("127","12","355841110386560","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("128","13","3566276768505","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("129","13","357723164535383","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("130","13","35142059290920","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("131","13","359668271514060","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("132","13","351420592807445","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("133","13","351420591410589","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("134","13","351420594279080","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("135","13","351420592968195","2","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("136","157","350319813356854","1","2023-07-15","","","OnSale");
INSERT INTO phones VALUES("137","143","356080122405113","1","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("138","143","356080122405071","1","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("139","143","356080122400916","1","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("140","143","356080122401674","1","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("141","143","356080122404991","1","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("142","162","350331809335347","1","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("143","162","350331801163614","1","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("144","163","355382704490880","1","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("145","164","350837422336314","1","2023-07-17","","","OnSale");
INSERT INTO phones VALUES("146","140","359863178551196","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("147","140","359863178545149","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("148","140","359863178425516","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("149","141","350867775859463","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("150","141","350867775857509","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("151","141","350867775858259","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("152","141","350867775909631","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("153","141","350867775858572","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("154","121","354916441047007","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("155","121","355506800142447","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("156","121","354916441084919","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("157","120","350532450301898","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("158","120","350532450304355","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("159","120","350532450298326","1","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("160","92","351824510543216","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("161","94","352496801587019","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("162","165","358957691037898","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("163","165","358957691038383","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("164","137","35696113278728","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("165","166","35759049247171","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("166","166","35167139379455","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("167","167","359056814544879","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("168","168","352114958092036","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("169","168","352206203034084","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("170","150","353843247538396","8","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("171","9","359271100251754","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("172","9","359271100538747","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("173","9","379761101326456","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("174","9","359761101887887","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("175","9","359761102351255","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("176","9","359619101026809","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("177","9","359761101377699","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("178","9","359761100525413","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("179","9","359271101684763","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("180","9","359761101823460","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("181","4","358505080356062","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("182","4","351823090839226","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("183","4","358505083632576","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("184","4","351824092398443","9","2023-07-18","","","OnSale");
INSERT INTO phones VALUES("185","15","355980084863699","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("186","15","355980081839684","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("187","15","357756081414985","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("188","15","352805091346300","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("189","15","354003081287324","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("190","22","357295101055734","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("191","22","354602105123900","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("192","22","354602105057264","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("193","22","352335100757263","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("194","22","352335100903164","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("195","22","352734110198197","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("196","22","352338105791717","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("197","22","352334105020074","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("198","22","35234407727051","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("199","2","354418101192710","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("200","2","354418102099351","9","2023-07-19","samuel katamba","0703789082","Sold");
INSERT INTO phones VALUES("201","2","354418101315691","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("202","2","357331100208345","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("203","2","352695107457989","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("204","2","352688109248902","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("205","2","252689105683241","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("206","2","354417101585386","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("207","23","358822630603574","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("208","23","354702922023992","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("209","23","350166281018007","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("210","23","353325703447858","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("211","23","359506141647456","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("212","23","350336266148935","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("213","23","359506140983308","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("214","1","353322092332577","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("215","1","353321090843924","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("216","1","354649090192440","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("217","1","357393100276417","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("218","1","353322092227009","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("219","1","353322090519498","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("220","1","353322091580978","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("221","1","353321091232622","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("222","1","357633090681203","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("223","1","354824090972592","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("224","1","354644091734696","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("225","1","353302092118986","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("226","1","354644090811800","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("227","16","35330909093095832","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("228","16","354825092260696","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("229","16","356915093120557","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("230","16","356916091369287","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("231","8","352620112137319","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("232","8","356420110621430","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("233","8","352620117113430","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("234","25","354268113098474","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("235","25","354266114867509","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("236","25","352563112466231","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("237","25","351835111266502","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("238","25","352620112438626","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("239","25","354268113021641","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("240","25","352563112260931","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("241","87","356731102202942","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("242","87","356731103018206","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("243","52","353822081795197","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("244","52","355853080317848","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("245","52","353835083754913","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("246","52","353847083771738","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("247","52","355853083611486","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("248","52","355335088505798","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("249","51","355330085620278","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("250","51","354916093564168","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("251","51","355338082157863","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("252","51","359459081070067","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("253","48","353816082712466","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("254","48","359219070731792","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("255","48","355355082873810","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("256","48","353814085170402","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("257","48","359153070216969","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("258","49","355836082942416","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("259","49","353818089044943","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("260","49","356695086366207","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("261","49","355834084026841","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("262","49","359172075293021","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("263","114","354850098940851","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("264","114","356720081728894","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("265","114","354843098832848","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("266","114","354852093731418","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("267","114","356720089417649","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("268","26","353982104916855","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("269","26","352924115856242","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("270","26","352915114736567","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("271","26","353986104860096","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("272","47","353905103697986","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("273","27","356867112774841","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("274","27","353247109236877","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("275","27","356801111216793","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("276","27","356057369576061","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("277","27","353969106607814","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("278","30","353232106854905","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("279","30","353248101724605","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("280","44","356740914100376","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("281","44","354957731481654","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("282","44","358522143629450","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("283","34","353167663429561","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("284","34","356713117232593","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("285","34","356712113130975","8","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("286","169","353819350805046","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("287","169","353819354280899","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("288","171","865780064881692","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("289","170","865745069477952","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("290","90","352419781867649/20","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("291","90","352419785262391/19","9","2023-07-19","","","OnSale");
INSERT INTO phones VALUES("292","57","356528095849287","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("293","57","356528095049045","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("294","57","3566528095849097","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("295","57","356528095738514","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("296","57","356528095842399","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("297","57","356528095313987","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("298","57","356528095392387","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("299","57","356528095273306","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("300","57","356528095780250","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("301","174","358353082188104","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("302","174","358353080457683","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("303","174","358353082174047","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("304","174","358353082274029","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("305","174","358353082187213","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("306","174","358353081320559","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("307","174","358353081960404","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("308","174","358353082168247","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("309","174","358353082379992","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("310","174","358353081853013","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("311","175","868046036845778","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("312","175","86471037518870","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("313","175","868896037009539","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("314","175","868054033212059","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("315","175","868054037230818","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("316","175","867472038321298","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("317","175","868046039776558","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("318","175","868046033556139","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("319","175","867472032348776","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("320","175","867471032851912","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("335","68","861602032906431","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("336","68","862603035219995","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("337","68","862603039090699","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("338","68","861730036473478","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("339","68","860750039013734","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("340","68","861259031511256","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("341","68","862022030207212","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("342","68","862467035687431","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("343","68","862732039042010","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("344","68","861730039785290","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("345","68","861602032484959","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("346","68","862603039346679","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("347","68","860750034244458","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("348","68","862812035980635","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("349","68","8693100227999658","4","2023-07-20","","","OnSale");
INSERT INTO phones VALUES("350","92","358709980826089","8","2023-07-21","","","OnSale");
INSERT INTO phones VALUES("351","171","368170061815397","8","2023-07-21","","","OnSale");
INSERT INTO phones VALUES("352","170","868436062456436","8","2023-07-21","","","OnSale");
INSERT INTO phones VALUES("353","176","866019069455510","8","2023-07-21","","","OnSale");


DROP TABLE IF EXISTS profile;

CREATE TABLE `profile` (
  `profile_id` int(10) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(225) NOT NULL,
  `business_slogan` varchar(225) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `website_link` varchar(225) NOT NULL,
  `tin_number` varchar(225) NOT NULL,
  `company_logo` varchar(225) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO profile VALUES("1","Mobile Shop Uganda","Available 24/7 online","City Plaza opposite City Square","+256709744874","info@mobileshop.ug","https://www.mobileshop.ug/","22323322","../images/1.JPG");


DROP TABLE IF EXISTS purchased_items;

CREATE TABLE `purchased_items` (
  `PURCHASE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `SUPPLIER_ID` int(11) NOT NULL,
  `DATE_OF_PURCHASE` date NOT NULL,
  `RECEIPT_NO` varchar(122) NOT NULL,
  PRIMARY KEY (`PURCHASE_ID`),
  KEY `Cons6` (`SUPPLIER_ID`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `Cons6` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchased_items_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO purchased_items VALUES("1","1","1","2023-07-12","");
INSERT INTO purchased_items VALUES("2","1","1","2023-07-12","");
INSERT INTO purchased_items VALUES("3","1","8","2023-07-13","");
INSERT INTO purchased_items VALUES("4","1","8","2023-07-13","");
INSERT INTO purchased_items VALUES("5","1","8","2023-07-13","");
INSERT INTO purchased_items VALUES("6","1","8","2023-07-13","");
INSERT INTO purchased_items VALUES("7","1","8","2023-07-13","");
INSERT INTO purchased_items VALUES("8","1","8","2023-07-13","");
INSERT INTO purchased_items VALUES("9","1","8","2023-07-13","");
INSERT INTO purchased_items VALUES("10","1","8","2023-07-13","");
INSERT INTO purchased_items VALUES("11","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("12","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("13","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("14","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("15","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("16","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("17","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("18","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("19","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("20","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("21","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("22","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("23","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("24","1","8","2023-07-15","1528");
INSERT INTO purchased_items VALUES("25","1","8","2023-07-15","1528");
INSERT INTO purchased_items VALUES("26","1","8","2023-07-15","1528");
INSERT INTO purchased_items VALUES("27","1","8","2023-07-15","1528");
INSERT INTO purchased_items VALUES("28","1","8","2023-07-15","1528");
INSERT INTO purchased_items VALUES("29","1","8","2023-07-15","1528");
INSERT INTO purchased_items VALUES("30","1","1","2023-07-15","1528");
INSERT INTO purchased_items VALUES("31","1","8","2023-07-15","");
INSERT INTO purchased_items VALUES("32","1","8","2023-07-15","1528");
INSERT INTO purchased_items VALUES("33","1","2","2023-07-15","4185");
INSERT INTO purchased_items VALUES("34","1","2","2023-07-15","4185");
INSERT INTO purchased_items VALUES("35","1","2","2023-07-15","4185");
INSERT INTO purchased_items VALUES("36","1","2","2023-07-15","4185");
INSERT INTO purchased_items VALUES("37","1","2","2023-07-15","4185");
INSERT INTO purchased_items VALUES("38","1","2","2023-07-15","4185");
INSERT INTO purchased_items VALUES("39","1","2","2023-07-15","4185");
INSERT INTO purchased_items VALUES("40","1","2","2023-07-15","4185");
INSERT INTO purchased_items VALUES("41","1","2","2023-07-15","4185");
INSERT INTO purchased_items VALUES("42","1","2","2023-07-17","4185");
INSERT INTO purchased_items VALUES("43","1","2","2023-07-17","4185");
INSERT INTO purchased_items VALUES("44","1","2","2023-07-17","4185");
INSERT INTO purchased_items VALUES("45","1","2","2023-07-17","4185");
INSERT INTO purchased_items VALUES("46","5","1","2023-07-17","1528");
INSERT INTO purchased_items VALUES("47","5","1","2023-07-17","");
INSERT INTO purchased_items VALUES("48","1","1","2023-07-17","");
INSERT INTO purchased_items VALUES("49","1","1","2023-07-17","");
INSERT INTO purchased_items VALUES("50","1","1","2023-07-17","");
INSERT INTO purchased_items VALUES("51","1","1","2023-07-18","");
INSERT INTO purchased_items VALUES("52","1","1","2023-07-18","");
INSERT INTO purchased_items VALUES("53","1","1","2023-07-18","");
INSERT INTO purchased_items VALUES("54","1","1","2023-07-18","");
INSERT INTO purchased_items VALUES("55","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("56","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("57","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("58","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("59","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("60","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("61","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("62","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("63","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("64","1","8","2023-07-18","");
INSERT INTO purchased_items VALUES("65","5","9","2023-07-18","5482");
INSERT INTO purchased_items VALUES("66","1","9","2023-07-18","5482");
INSERT INTO purchased_items VALUES("67","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("68","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("69","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("70","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("71","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("72","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("73","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("74","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("75","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("76","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("77","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("78","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("79","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("80","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("81","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("82","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("83","1","8","2023-07-19","");
INSERT INTO purchased_items VALUES("84","1","8","2023-07-19","");
INSERT INTO purchased_items VALUES("85","1","8","2023-07-19","");
INSERT INTO purchased_items VALUES("86","1","8","2023-07-19","");
INSERT INTO purchased_items VALUES("87","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("88","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("89","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("90","1","9","2023-07-19","5482");
INSERT INTO purchased_items VALUES("91","1","4","2023-07-20","");
INSERT INTO purchased_items VALUES("92","1","4","2023-07-20","");
INSERT INTO purchased_items VALUES("93","1","4","2023-07-20","");
INSERT INTO purchased_items VALUES("94","1","4","2023-07-20","");
INSERT INTO purchased_items VALUES("95","1","8","2023-07-21","");
INSERT INTO purchased_items VALUES("96","1","8","2023-07-21","");
INSERT INTO purchased_items VALUES("97","1","8","2023-07-21","");
INSERT INTO purchased_items VALUES("98","1","8","2023-07-21","");


DROP TABLE IF EXISTS purchased_items_details;

CREATE TABLE `purchased_items_details` (
  `PURCHASED_ITEM_DETAILS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PURCHASE_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `PURCHASED_QUANTITY` decimal(11,2) NOT NULL,
  `BUYING_PRICE` decimal(11,2) NOT NULL,
  PRIMARY KEY (`PURCHASED_ITEM_DETAILS_ID`),
  KEY `PURCHASE_ID` (`PURCHASE_ID`),
  KEY `ITEM_ID` (`ITEM_ID`),
  CONSTRAINT `purchased_items_details_ibfk_1` FOREIGN KEY (`PURCHASE_ID`) REFERENCES `purchased_items` (`PURCHASE_ID`),
  CONSTRAINT `purchased_items_details_ibfk_2` FOREIGN KEY (`ITEM_ID`) REFERENCES `items` (`ITEM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO purchased_items_details VALUES("1","1","89","1.00","950000.00");
INSERT INTO purchased_items_details VALUES("2","2","89","1.00","950000.00");
INSERT INTO purchased_items_details VALUES("3","3","151","1.00","4750000.00");
INSERT INTO purchased_items_details VALUES("4","4","97","2.00","4750000.00");
INSERT INTO purchased_items_details VALUES("5","5","152","1.00","4250000.00");
INSERT INTO purchased_items_details VALUES("6","6","153","0.00","0.00");
INSERT INTO purchased_items_details VALUES("7","7","153","0.00","0.00");
INSERT INTO purchased_items_details VALUES("8","8","153","1.00","4250000.00");
INSERT INTO purchased_items_details VALUES("9","9","153","1.00","4250000.00");
INSERT INTO purchased_items_details VALUES("10","10","97","1.00","4750000.00");
INSERT INTO purchased_items_details VALUES("11","11","155","2.00","3580000.00");
INSERT INTO purchased_items_details VALUES("12","18","134","1.00","1800000.00");
INSERT INTO purchased_items_details VALUES("13","20","42","1.00","1600000.00");
INSERT INTO purchased_items_details VALUES("14","23","26","1.00","1300000.00");
INSERT INTO purchased_items_details VALUES("15","24","27","1.00","0.00");
INSERT INTO purchased_items_details VALUES("16","25","26","1.00","0.00");
INSERT INTO purchased_items_details VALUES("17","26","13","1.00","0.00");
INSERT INTO purchased_items_details VALUES("18","27","34","1.00","0.00");
INSERT INTO purchased_items_details VALUES("19","28","117","1.00","0.00");
INSERT INTO purchased_items_details VALUES("20","29","21","3.00","0.00");
INSERT INTO purchased_items_details VALUES("21","30","157","1.00","3150000.00");
INSERT INTO purchased_items_details VALUES("22","31","157","0.00","0.00");
INSERT INTO purchased_items_details VALUES("23","32","116","1.00","0.00");
INSERT INTO purchased_items_details VALUES("24","33","13","8.00","1000000.00");
INSERT INTO purchased_items_details VALUES("25","34","12","7.00","650000.00");
INSERT INTO purchased_items_details VALUES("26","35","11","3.00","599000.00");
INSERT INTO purchased_items_details VALUES("27","36","146","3.00","360000.00");
INSERT INTO purchased_items_details VALUES("28","37","83","2.00","410000.00");
INSERT INTO purchased_items_details VALUES("29","38","106","2.00","490000.00");
INSERT INTO purchased_items_details VALUES("30","39","159","2.00","490000.00");
INSERT INTO purchased_items_details VALUES("31","40","61","1.00","650000.00");
INSERT INTO purchased_items_details VALUES("32","41","5","15.00","390000.00");
INSERT INTO purchased_items_details VALUES("33","42","158","15.00","330000.00");
INSERT INTO purchased_items_details VALUES("34","43","7","10.00","390000.00");
INSERT INTO purchased_items_details VALUES("35","44","72","1.00","418000.00");
INSERT INTO purchased_items_details VALUES("36","45","129","2.00","1140000.00");
INSERT INTO purchased_items_details VALUES("37","46","129","0.00","1140000.00");
INSERT INTO purchased_items_details VALUES("38","47","143","5.00","1380000.00");
INSERT INTO purchased_items_details VALUES("39","48","162","2.00","1290000.00");
INSERT INTO purchased_items_details VALUES("40","49","163","1.00","1400000.00");
INSERT INTO purchased_items_details VALUES("41","50","164","1.00","1790000.00");
INSERT INTO purchased_items_details VALUES("42","51","140","3.00","760000.00");
INSERT INTO purchased_items_details VALUES("43","52","141","5.00","730000.00");
INSERT INTO purchased_items_details VALUES("44","53","121","3.00","780000.00");
INSERT INTO purchased_items_details VALUES("45","54","120","3.00","830000.00");
INSERT INTO purchased_items_details VALUES("46","55","92","1.00","2390000.00");
INSERT INTO purchased_items_details VALUES("47","56","94","1.00","2940000.00");
INSERT INTO purchased_items_details VALUES("48","57","165","2.00","3980000.00");
INSERT INTO purchased_items_details VALUES("49","58","137","1.00","2300000.00");
INSERT INTO purchased_items_details VALUES("50","59","166","2.00","2070000.00");
INSERT INTO purchased_items_details VALUES("51","62","167","1.00","4600000.00");
INSERT INTO purchased_items_details VALUES("52","63","168","2.00","3580000.00");
INSERT INTO purchased_items_details VALUES("53","64","150","1.00","5990000.00");
INSERT INTO purchased_items_details VALUES("54","65","9","10.00","1000000.00");
INSERT INTO purchased_items_details VALUES("55","66","4","4.00","550000.00");
INSERT INTO purchased_items_details VALUES("56","67","15","5.00","460000.00");
INSERT INTO purchased_items_details VALUES("57","68","22","9.00","650000.00");
INSERT INTO purchased_items_details VALUES("58","69","2","8.00","785000.00");
INSERT INTO purchased_items_details VALUES("59","70","23","7.00","950000.00");
INSERT INTO purchased_items_details VALUES("60","71","1","13.00","550000.00");
INSERT INTO purchased_items_details VALUES("61","72","16","4.00","450000.00");
INSERT INTO purchased_items_details VALUES("62","73","8","3.00","890000.00");
INSERT INTO purchased_items_details VALUES("63","74","25","7.00","950000.00");
INSERT INTO purchased_items_details VALUES("64","75","87","2.00","550000.00");
INSERT INTO purchased_items_details VALUES("65","76","52","6.00","440000.00");
INSERT INTO purchased_items_details VALUES("66","77","51","4.00","370000.00");
INSERT INTO purchased_items_details VALUES("67","78","48","5.00","450000.00");
INSERT INTO purchased_items_details VALUES("68","79","49","5.00","550000.00");
INSERT INTO purchased_items_details VALUES("69","80","114","5.00","890000.00");
INSERT INTO purchased_items_details VALUES("70","81","26","4.00","1290000.00");
INSERT INTO purchased_items_details VALUES("71","82","47","1.00","1850000.00");
INSERT INTO purchased_items_details VALUES("72","83","27","5.00","1180000.00");
INSERT INTO purchased_items_details VALUES("73","84","30","2.00","1550000.00");
INSERT INTO purchased_items_details VALUES("74","85","44","3.00","2150000.00");
INSERT INTO purchased_items_details VALUES("75","86","34","3.00","2560000.00");
INSERT INTO purchased_items_details VALUES("76","87","169","2.00","1490000.00");
INSERT INTO purchased_items_details VALUES("77","88","171","1.00","1590000.00");
INSERT INTO purchased_items_details VALUES("78","89","170","1.00","1650000.00");
INSERT INTO purchased_items_details VALUES("79","90","90","2.00","2250000.00");
INSERT INTO purchased_items_details VALUES("80","91","57","9.00","350000.00");
INSERT INTO purchased_items_details VALUES("81","92","174","10.00","250000.00");
INSERT INTO purchased_items_details VALUES("82","93","175","10.00","250000.00");
INSERT INTO purchased_items_details VALUES("83","94","68","15.00","280000.00");
INSERT INTO purchased_items_details VALUES("84","95","92","1.00","2390000.00");
INSERT INTO purchased_items_details VALUES("85","96","171","1.00","2000000.00");
INSERT INTO purchased_items_details VALUES("86","97","170","1.00","2550000.00");
INSERT INTO purchased_items_details VALUES("87","98","176","1.00","2150000.00");


DROP TABLE IF EXISTS purchased_items_details_phones;

CREATE TABLE `purchased_items_details_phones` (
  `purchased_items_details_phones_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchased_items_details_id` int(11) NOT NULL,
  `phone_id` int(11) NOT NULL,
  PRIMARY KEY (`purchased_items_details_phones_id`),
  KEY `purchased_items_details_id` (`purchased_items_details_id`),
  KEY `phone_id` (`phone_id`),
  CONSTRAINT `purchased_items_details_phones_ibfk_1` FOREIGN KEY (`purchased_items_details_id`) REFERENCES `purchased_items_details` (`PURCHASED_ITEM_DETAILS_ID`),
  CONSTRAINT `purchased_items_details_phones_ibfk_2` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`phone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=354 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO purchased_items_details_phones VALUES("1","1","1");
INSERT INTO purchased_items_details_phones VALUES("2","2","2");
INSERT INTO purchased_items_details_phones VALUES("3","3","3");
INSERT INTO purchased_items_details_phones VALUES("4","4","4");
INSERT INTO purchased_items_details_phones VALUES("5","4","5");
INSERT INTO purchased_items_details_phones VALUES("6","5","6");
INSERT INTO purchased_items_details_phones VALUES("7","6","7");
INSERT INTO purchased_items_details_phones VALUES("8","6","8");
INSERT INTO purchased_items_details_phones VALUES("9","10","9");
INSERT INTO purchased_items_details_phones VALUES("10","8","10");
INSERT INTO purchased_items_details_phones VALUES("11","9","11");
INSERT INTO purchased_items_details_phones VALUES("12","11","12");
INSERT INTO purchased_items_details_phones VALUES("13","11","13");
INSERT INTO purchased_items_details_phones VALUES("14","12","14");
INSERT INTO purchased_items_details_phones VALUES("15","13","15");
INSERT INTO purchased_items_details_phones VALUES("16","14","16");
INSERT INTO purchased_items_details_phones VALUES("17","15","17");
INSERT INTO purchased_items_details_phones VALUES("18","16","18");
INSERT INTO purchased_items_details_phones VALUES("19","17","19");
INSERT INTO purchased_items_details_phones VALUES("20","18","20");
INSERT INTO purchased_items_details_phones VALUES("21","19","21");
INSERT INTO purchased_items_details_phones VALUES("25","20","25");
INSERT INTO purchased_items_details_phones VALUES("26","20","26");
INSERT INTO purchased_items_details_phones VALUES("27","20","27");
INSERT INTO purchased_items_details_phones VALUES("28","20","28");
INSERT INTO purchased_items_details_phones VALUES("30","23","30");
INSERT INTO purchased_items_details_phones VALUES("65","28","65");
INSERT INTO purchased_items_details_phones VALUES("66","28","66");
INSERT INTO purchased_items_details_phones VALUES("67","29","67");
INSERT INTO purchased_items_details_phones VALUES("68","29","68");
INSERT INTO purchased_items_details_phones VALUES("69","30","69");
INSERT INTO purchased_items_details_phones VALUES("70","30","70");
INSERT INTO purchased_items_details_phones VALUES("71","31","71");
INSERT INTO purchased_items_details_phones VALUES("72","32","72");
INSERT INTO purchased_items_details_phones VALUES("73","32","73");
INSERT INTO purchased_items_details_phones VALUES("74","32","74");
INSERT INTO purchased_items_details_phones VALUES("75","32","75");
INSERT INTO purchased_items_details_phones VALUES("76","32","76");
INSERT INTO purchased_items_details_phones VALUES("77","32","77");
INSERT INTO purchased_items_details_phones VALUES("78","32","78");
INSERT INTO purchased_items_details_phones VALUES("79","32","79");
INSERT INTO purchased_items_details_phones VALUES("80","32","80");
INSERT INTO purchased_items_details_phones VALUES("81","32","81");
INSERT INTO purchased_items_details_phones VALUES("82","32","82");
INSERT INTO purchased_items_details_phones VALUES("83","32","83");
INSERT INTO purchased_items_details_phones VALUES("84","32","84");
INSERT INTO purchased_items_details_phones VALUES("85","32","85");
INSERT INTO purchased_items_details_phones VALUES("86","32","86");
INSERT INTO purchased_items_details_phones VALUES("87","33","87");
INSERT INTO purchased_items_details_phones VALUES("88","33","88");
INSERT INTO purchased_items_details_phones VALUES("89","33","89");
INSERT INTO purchased_items_details_phones VALUES("90","33","90");
INSERT INTO purchased_items_details_phones VALUES("91","33","91");
INSERT INTO purchased_items_details_phones VALUES("92","33","92");
INSERT INTO purchased_items_details_phones VALUES("93","33","93");
INSERT INTO purchased_items_details_phones VALUES("94","33","94");
INSERT INTO purchased_items_details_phones VALUES("95","33","95");
INSERT INTO purchased_items_details_phones VALUES("96","33","96");
INSERT INTO purchased_items_details_phones VALUES("97","33","97");
INSERT INTO purchased_items_details_phones VALUES("98","33","98");
INSERT INTO purchased_items_details_phones VALUES("99","33","99");
INSERT INTO purchased_items_details_phones VALUES("100","33","100");
INSERT INTO purchased_items_details_phones VALUES("101","33","101");
INSERT INTO purchased_items_details_phones VALUES("102","34","102");
INSERT INTO purchased_items_details_phones VALUES("103","34","103");
INSERT INTO purchased_items_details_phones VALUES("104","34","104");
INSERT INTO purchased_items_details_phones VALUES("105","34","105");
INSERT INTO purchased_items_details_phones VALUES("106","34","106");
INSERT INTO purchased_items_details_phones VALUES("107","34","107");
INSERT INTO purchased_items_details_phones VALUES("108","34","108");
INSERT INTO purchased_items_details_phones VALUES("109","34","109");
INSERT INTO purchased_items_details_phones VALUES("110","34","110");
INSERT INTO purchased_items_details_phones VALUES("111","34","111");
INSERT INTO purchased_items_details_phones VALUES("112","35","112");
INSERT INTO purchased_items_details_phones VALUES("113","36","113");
INSERT INTO purchased_items_details_phones VALUES("114","36","114");
INSERT INTO purchased_items_details_phones VALUES("115","27","115");
INSERT INTO purchased_items_details_phones VALUES("116","27","116");
INSERT INTO purchased_items_details_phones VALUES("117","27","117");
INSERT INTO purchased_items_details_phones VALUES("118","26","118");
INSERT INTO purchased_items_details_phones VALUES("119","26","119");
INSERT INTO purchased_items_details_phones VALUES("120","26","120");
INSERT INTO purchased_items_details_phones VALUES("121","25","121");
INSERT INTO purchased_items_details_phones VALUES("122","25","122");
INSERT INTO purchased_items_details_phones VALUES("123","25","123");
INSERT INTO purchased_items_details_phones VALUES("124","25","124");
INSERT INTO purchased_items_details_phones VALUES("125","25","125");
INSERT INTO purchased_items_details_phones VALUES("126","25","126");
INSERT INTO purchased_items_details_phones VALUES("127","25","127");
INSERT INTO purchased_items_details_phones VALUES("128","24","128");
INSERT INTO purchased_items_details_phones VALUES("129","24","129");
INSERT INTO purchased_items_details_phones VALUES("130","24","130");
INSERT INTO purchased_items_details_phones VALUES("131","24","131");
INSERT INTO purchased_items_details_phones VALUES("132","24","132");
INSERT INTO purchased_items_details_phones VALUES("133","24","133");
INSERT INTO purchased_items_details_phones VALUES("134","24","134");
INSERT INTO purchased_items_details_phones VALUES("135","24","135");
INSERT INTO purchased_items_details_phones VALUES("136","21","136");
INSERT INTO purchased_items_details_phones VALUES("137","38","137");
INSERT INTO purchased_items_details_phones VALUES("138","38","138");
INSERT INTO purchased_items_details_phones VALUES("139","38","139");
INSERT INTO purchased_items_details_phones VALUES("140","38","140");
INSERT INTO purchased_items_details_phones VALUES("141","38","141");
INSERT INTO purchased_items_details_phones VALUES("142","39","142");
INSERT INTO purchased_items_details_phones VALUES("143","39","143");
INSERT INTO purchased_items_details_phones VALUES("144","40","144");
INSERT INTO purchased_items_details_phones VALUES("145","41","145");
INSERT INTO purchased_items_details_phones VALUES("146","42","146");
INSERT INTO purchased_items_details_phones VALUES("147","42","147");
INSERT INTO purchased_items_details_phones VALUES("148","42","148");
INSERT INTO purchased_items_details_phones VALUES("149","43","149");
INSERT INTO purchased_items_details_phones VALUES("150","43","150");
INSERT INTO purchased_items_details_phones VALUES("151","43","151");
INSERT INTO purchased_items_details_phones VALUES("152","43","152");
INSERT INTO purchased_items_details_phones VALUES("153","43","153");
INSERT INTO purchased_items_details_phones VALUES("154","44","154");
INSERT INTO purchased_items_details_phones VALUES("155","44","155");
INSERT INTO purchased_items_details_phones VALUES("156","44","156");
INSERT INTO purchased_items_details_phones VALUES("157","45","157");
INSERT INTO purchased_items_details_phones VALUES("158","45","158");
INSERT INTO purchased_items_details_phones VALUES("159","45","159");
INSERT INTO purchased_items_details_phones VALUES("160","46","160");
INSERT INTO purchased_items_details_phones VALUES("161","47","161");
INSERT INTO purchased_items_details_phones VALUES("162","48","162");
INSERT INTO purchased_items_details_phones VALUES("163","48","163");
INSERT INTO purchased_items_details_phones VALUES("164","49","164");
INSERT INTO purchased_items_details_phones VALUES("165","50","165");
INSERT INTO purchased_items_details_phones VALUES("166","50","166");
INSERT INTO purchased_items_details_phones VALUES("167","51","167");
INSERT INTO purchased_items_details_phones VALUES("168","52","168");
INSERT INTO purchased_items_details_phones VALUES("169","52","169");
INSERT INTO purchased_items_details_phones VALUES("170","53","170");
INSERT INTO purchased_items_details_phones VALUES("171","54","171");
INSERT INTO purchased_items_details_phones VALUES("172","54","172");
INSERT INTO purchased_items_details_phones VALUES("173","54","173");
INSERT INTO purchased_items_details_phones VALUES("174","54","174");
INSERT INTO purchased_items_details_phones VALUES("175","54","175");
INSERT INTO purchased_items_details_phones VALUES("176","54","176");
INSERT INTO purchased_items_details_phones VALUES("177","54","177");
INSERT INTO purchased_items_details_phones VALUES("178","54","178");
INSERT INTO purchased_items_details_phones VALUES("179","54","179");
INSERT INTO purchased_items_details_phones VALUES("180","54","180");
INSERT INTO purchased_items_details_phones VALUES("181","55","181");
INSERT INTO purchased_items_details_phones VALUES("182","55","182");
INSERT INTO purchased_items_details_phones VALUES("183","55","183");
INSERT INTO purchased_items_details_phones VALUES("184","55","184");
INSERT INTO purchased_items_details_phones VALUES("185","56","185");
INSERT INTO purchased_items_details_phones VALUES("186","56","186");
INSERT INTO purchased_items_details_phones VALUES("187","56","187");
INSERT INTO purchased_items_details_phones VALUES("188","56","188");
INSERT INTO purchased_items_details_phones VALUES("189","56","189");
INSERT INTO purchased_items_details_phones VALUES("190","57","190");
INSERT INTO purchased_items_details_phones VALUES("191","57","191");
INSERT INTO purchased_items_details_phones VALUES("192","57","192");
INSERT INTO purchased_items_details_phones VALUES("193","57","193");
INSERT INTO purchased_items_details_phones VALUES("194","57","194");
INSERT INTO purchased_items_details_phones VALUES("195","57","195");
INSERT INTO purchased_items_details_phones VALUES("196","57","196");
INSERT INTO purchased_items_details_phones VALUES("197","57","197");
INSERT INTO purchased_items_details_phones VALUES("198","57","198");
INSERT INTO purchased_items_details_phones VALUES("199","58","199");
INSERT INTO purchased_items_details_phones VALUES("200","58","200");
INSERT INTO purchased_items_details_phones VALUES("201","58","201");
INSERT INTO purchased_items_details_phones VALUES("202","58","202");
INSERT INTO purchased_items_details_phones VALUES("203","58","203");
INSERT INTO purchased_items_details_phones VALUES("204","58","204");
INSERT INTO purchased_items_details_phones VALUES("205","58","205");
INSERT INTO purchased_items_details_phones VALUES("206","58","206");
INSERT INTO purchased_items_details_phones VALUES("207","59","207");
INSERT INTO purchased_items_details_phones VALUES("208","59","208");
INSERT INTO purchased_items_details_phones VALUES("209","59","209");
INSERT INTO purchased_items_details_phones VALUES("210","59","210");
INSERT INTO purchased_items_details_phones VALUES("211","59","211");
INSERT INTO purchased_items_details_phones VALUES("212","59","212");
INSERT INTO purchased_items_details_phones VALUES("213","59","213");
INSERT INTO purchased_items_details_phones VALUES("214","60","214");
INSERT INTO purchased_items_details_phones VALUES("215","60","215");
INSERT INTO purchased_items_details_phones VALUES("216","60","216");
INSERT INTO purchased_items_details_phones VALUES("217","60","217");
INSERT INTO purchased_items_details_phones VALUES("218","60","218");
INSERT INTO purchased_items_details_phones VALUES("219","60","219");
INSERT INTO purchased_items_details_phones VALUES("220","60","220");
INSERT INTO purchased_items_details_phones VALUES("221","60","221");
INSERT INTO purchased_items_details_phones VALUES("222","60","222");
INSERT INTO purchased_items_details_phones VALUES("223","60","223");
INSERT INTO purchased_items_details_phones VALUES("224","60","224");
INSERT INTO purchased_items_details_phones VALUES("225","60","225");
INSERT INTO purchased_items_details_phones VALUES("226","60","226");
INSERT INTO purchased_items_details_phones VALUES("227","61","227");
INSERT INTO purchased_items_details_phones VALUES("228","61","228");
INSERT INTO purchased_items_details_phones VALUES("229","61","229");
INSERT INTO purchased_items_details_phones VALUES("230","61","230");
INSERT INTO purchased_items_details_phones VALUES("231","62","231");
INSERT INTO purchased_items_details_phones VALUES("232","62","232");
INSERT INTO purchased_items_details_phones VALUES("233","62","233");
INSERT INTO purchased_items_details_phones VALUES("234","63","234");
INSERT INTO purchased_items_details_phones VALUES("235","63","235");
INSERT INTO purchased_items_details_phones VALUES("236","63","236");
INSERT INTO purchased_items_details_phones VALUES("237","63","237");
INSERT INTO purchased_items_details_phones VALUES("238","63","238");
INSERT INTO purchased_items_details_phones VALUES("239","63","239");
INSERT INTO purchased_items_details_phones VALUES("240","63","240");
INSERT INTO purchased_items_details_phones VALUES("241","64","241");
INSERT INTO purchased_items_details_phones VALUES("242","64","242");
INSERT INTO purchased_items_details_phones VALUES("243","65","243");
INSERT INTO purchased_items_details_phones VALUES("244","65","244");
INSERT INTO purchased_items_details_phones VALUES("245","65","245");
INSERT INTO purchased_items_details_phones VALUES("246","65","246");
INSERT INTO purchased_items_details_phones VALUES("247","65","247");
INSERT INTO purchased_items_details_phones VALUES("248","65","248");
INSERT INTO purchased_items_details_phones VALUES("249","66","249");
INSERT INTO purchased_items_details_phones VALUES("250","66","250");
INSERT INTO purchased_items_details_phones VALUES("251","66","251");
INSERT INTO purchased_items_details_phones VALUES("252","66","252");
INSERT INTO purchased_items_details_phones VALUES("253","67","253");
INSERT INTO purchased_items_details_phones VALUES("254","67","254");
INSERT INTO purchased_items_details_phones VALUES("255","67","255");
INSERT INTO purchased_items_details_phones VALUES("256","67","256");
INSERT INTO purchased_items_details_phones VALUES("257","67","257");
INSERT INTO purchased_items_details_phones VALUES("258","68","258");
INSERT INTO purchased_items_details_phones VALUES("259","68","259");
INSERT INTO purchased_items_details_phones VALUES("260","68","260");
INSERT INTO purchased_items_details_phones VALUES("261","68","261");
INSERT INTO purchased_items_details_phones VALUES("262","68","262");
INSERT INTO purchased_items_details_phones VALUES("263","69","263");
INSERT INTO purchased_items_details_phones VALUES("264","69","264");
INSERT INTO purchased_items_details_phones VALUES("265","69","265");
INSERT INTO purchased_items_details_phones VALUES("266","69","266");
INSERT INTO purchased_items_details_phones VALUES("267","69","267");
INSERT INTO purchased_items_details_phones VALUES("268","70","268");
INSERT INTO purchased_items_details_phones VALUES("269","70","269");
INSERT INTO purchased_items_details_phones VALUES("270","70","270");
INSERT INTO purchased_items_details_phones VALUES("271","70","271");
INSERT INTO purchased_items_details_phones VALUES("272","71","272");
INSERT INTO purchased_items_details_phones VALUES("273","72","273");
INSERT INTO purchased_items_details_phones VALUES("274","72","274");
INSERT INTO purchased_items_details_phones VALUES("275","72","275");
INSERT INTO purchased_items_details_phones VALUES("276","72","276");
INSERT INTO purchased_items_details_phones VALUES("277","72","277");
INSERT INTO purchased_items_details_phones VALUES("278","73","278");
INSERT INTO purchased_items_details_phones VALUES("279","73","279");
INSERT INTO purchased_items_details_phones VALUES("280","74","280");
INSERT INTO purchased_items_details_phones VALUES("281","74","281");
INSERT INTO purchased_items_details_phones VALUES("282","74","282");
INSERT INTO purchased_items_details_phones VALUES("283","75","283");
INSERT INTO purchased_items_details_phones VALUES("284","75","284");
INSERT INTO purchased_items_details_phones VALUES("285","75","285");
INSERT INTO purchased_items_details_phones VALUES("286","76","286");
INSERT INTO purchased_items_details_phones VALUES("287","76","287");
INSERT INTO purchased_items_details_phones VALUES("288","77","288");
INSERT INTO purchased_items_details_phones VALUES("289","78","289");
INSERT INTO purchased_items_details_phones VALUES("290","79","290");
INSERT INTO purchased_items_details_phones VALUES("291","79","291");
INSERT INTO purchased_items_details_phones VALUES("292","80","292");
INSERT INTO purchased_items_details_phones VALUES("293","80","293");
INSERT INTO purchased_items_details_phones VALUES("294","80","294");
INSERT INTO purchased_items_details_phones VALUES("295","80","295");
INSERT INTO purchased_items_details_phones VALUES("296","80","296");
INSERT INTO purchased_items_details_phones VALUES("297","80","297");
INSERT INTO purchased_items_details_phones VALUES("298","80","298");
INSERT INTO purchased_items_details_phones VALUES("299","80","299");
INSERT INTO purchased_items_details_phones VALUES("300","80","300");
INSERT INTO purchased_items_details_phones VALUES("301","81","301");
INSERT INTO purchased_items_details_phones VALUES("302","81","302");
INSERT INTO purchased_items_details_phones VALUES("303","81","303");
INSERT INTO purchased_items_details_phones VALUES("304","81","304");
INSERT INTO purchased_items_details_phones VALUES("305","81","305");
INSERT INTO purchased_items_details_phones VALUES("306","81","306");
INSERT INTO purchased_items_details_phones VALUES("307","81","307");
INSERT INTO purchased_items_details_phones VALUES("308","81","308");
INSERT INTO purchased_items_details_phones VALUES("309","81","309");
INSERT INTO purchased_items_details_phones VALUES("310","81","310");
INSERT INTO purchased_items_details_phones VALUES("311","82","311");
INSERT INTO purchased_items_details_phones VALUES("312","82","312");
INSERT INTO purchased_items_details_phones VALUES("313","82","313");
INSERT INTO purchased_items_details_phones VALUES("314","82","314");
INSERT INTO purchased_items_details_phones VALUES("315","82","315");
INSERT INTO purchased_items_details_phones VALUES("316","82","316");
INSERT INTO purchased_items_details_phones VALUES("317","82","317");
INSERT INTO purchased_items_details_phones VALUES("318","82","318");
INSERT INTO purchased_items_details_phones VALUES("319","82","319");
INSERT INTO purchased_items_details_phones VALUES("320","82","320");
INSERT INTO purchased_items_details_phones VALUES("335","83","335");
INSERT INTO purchased_items_details_phones VALUES("336","83","336");
INSERT INTO purchased_items_details_phones VALUES("337","83","337");
INSERT INTO purchased_items_details_phones VALUES("338","83","338");
INSERT INTO purchased_items_details_phones VALUES("339","83","339");
INSERT INTO purchased_items_details_phones VALUES("340","83","340");
INSERT INTO purchased_items_details_phones VALUES("341","83","341");
INSERT INTO purchased_items_details_phones VALUES("342","83","342");
INSERT INTO purchased_items_details_phones VALUES("343","83","343");
INSERT INTO purchased_items_details_phones VALUES("344","83","344");
INSERT INTO purchased_items_details_phones VALUES("345","83","345");
INSERT INTO purchased_items_details_phones VALUES("346","83","346");
INSERT INTO purchased_items_details_phones VALUES("347","83","347");
INSERT INTO purchased_items_details_phones VALUES("348","83","348");
INSERT INTO purchased_items_details_phones VALUES("349","83","349");
INSERT INTO purchased_items_details_phones VALUES("350","84","350");
INSERT INTO purchased_items_details_phones VALUES("351","85","351");
INSERT INTO purchased_items_details_phones VALUES("352","86","352");
INSERT INTO purchased_items_details_phones VALUES("353","87","353");


DROP TABLE IF EXISTS purchases_returns;

CREATE TABLE `purchases_returns` (
  `purchases_returns_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) NOT NULL,
  `date_returned` date NOT NULL,
  `ITEM_ID` int(10) NOT NULL,
  `quantity` int(14) NOT NULL,
  `amount` int(14) NOT NULL,
  PRIMARY KEY (`purchases_returns_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS sales;

CREATE TABLE `sales` (
  `SALES_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `DATE_OF_SALE` date NOT NULL,
  PRIMARY KEY (`SALES_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `CUSTOMER_ID` (`CUSTOMER_ID`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`id`),
  CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO sales VALUES("1","1","1","2023-07-21");


DROP TABLE IF EXISTS sales_details;

CREATE TABLE `sales_details` (
  `SALE_DETAILS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SALES_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `QUANTITY_SOLD` decimal(11,2) NOT NULL,
  `SELLING_PRICE` decimal(11,2) NOT NULL,
  PRIMARY KEY (`SALE_DETAILS_ID`),
  KEY `SALES_ID` (`SALES_ID`),
  KEY `ITEM_ID` (`ITEM_ID`),
  CONSTRAINT `sales_details_ibfk_1` FOREIGN KEY (`SALES_ID`) REFERENCES `sales` (`SALES_ID`),
  CONSTRAINT `sales_details_ibfk_2` FOREIGN KEY (`ITEM_ID`) REFERENCES `items` (`ITEM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO sales_details VALUES("1","1","2","1.00","780000.00");


DROP TABLE IF EXISTS sales_returns;

CREATE TABLE `sales_returns` (
  `sales_returns_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `date_returned` date NOT NULL,
  `ITEM_ID` int(10) NOT NULL,
  `quantity` int(14) NOT NULL,
  `amount` int(14) NOT NULL,
  PRIMARY KEY (`sales_returns_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS salesdetails_phones;

CREATE TABLE `salesdetails_phones` (
  `salesdetails_phones_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_details_id` int(11) NOT NULL,
  `phone_id` int(11) NOT NULL,
  PRIMARY KEY (`salesdetails_phones_id`),
  KEY `sales_details_id` (`sales_details_id`),
  KEY `phone_id` (`phone_id`),
  CONSTRAINT `salesdetails_phones_ibfk_1` FOREIGN KEY (`sales_details_id`) REFERENCES `sales_details` (`SALE_DETAILS_ID`),
  CONSTRAINT `salesdetails_phones_ibfk_2` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`phone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO salesdetails_phones VALUES("1","1","200");


DROP TABLE IF EXISTS stock_taking;

CREATE TABLE `stock_taking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM_ID` int(11) NOT NULL,
  `COMPUTER STOCK` decimal(11,2) NOT NULL,
  `PHYSICAL_STOCK` decimal(11,2) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO stock_taking VALUES("1","153","2.00","4.00","2023-07-13 18:41:21");


DROP TABLE IF EXISTS stock_transfer;

CREATE TABLE `stock_transfer` (
  `stock_transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) NOT NULL,
  `store_from_id` int(11) NOT NULL,
  `store_to_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`stock_transfer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS suppliers;

CREATE TABLE `suppliers` (
  `supplier_id` int(26) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(26) NOT NULL,
  `phone` varchar(26) NOT NULL,
  `email` varchar(26) NOT NULL,
  `address` varchar(26) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO suppliers VALUES("1","NAAEM MOBILE","0771000000","info@mobileshop.ug","DXB");
INSERT INTO suppliers VALUES("2","FNZ","0709744874","info@mobileshop.ug","Dubai");
INSERT INTO suppliers VALUES("3","SH Mobiles","0709744874","n@f.com","DXB");
INSERT INTO suppliers VALUES("4","SADAM MOBILE","0709744874","hamza@company.com","DXB");
INSERT INTO suppliers VALUES("5","Shakeel Ahmed","0709744874","n@f.com","DXB");
INSERT INTO suppliers VALUES("6","RAYA CELLULAR","0709744874","info@mobileshop.ug","DXB");
INSERT INTO suppliers VALUES("7","TOPUP & RETURN","0709744874","info@mobileshop.ug","MOBILESHOP");
INSERT INTO suppliers VALUES("8","MASOUD","0709744874","info@mobileshop.ug","DUBAI");
INSERT INTO suppliers VALUES("9","BASE WIRELESS","0709744874","info@mobileshop.ug","UAE");


DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `id` int(26) NOT NULL AUTO_INCREMENT,
  `username` varchar(26) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type` varchar(26) DEFAULT NULL,
  `staff_name` varchar(225) NOT NULL,
  `position` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO user VALUES("1","admin","21232f297a57a5a743894a0e4a801fc3","admin","Memo Bako","Manager 2","Kampala","+25678787878","gf@gmail.com");
INSERT INTO user VALUES("2","mula","8a5feffca358f60191e0a95e317cf181","Man","Abby Baby","Accountant","Kampala","07898898","m@gmail.com");
INSERT INTO user VALUES("3","sam","332532dcfaa1cbf61e2a266bd723612c","Man","Abby1","Manager 5","Kampala","07898898","admin@eaccount.xyz");
INSERT INTO user VALUES("4","mulawwww","cc2bd8f09bb88b5dd20f9b432631b8ca","User","Musoke Denis","Manager Operations","E-tower Kampala Uganda","07898898","admin@eaccount.xyz");
INSERT INTO user VALUES("5","","d41d8cd98f00b204e9800998ecf8427e","User","","","","","");


DROP TABLE IF EXISTS visitor_activity_logs;

CREATE TABLE `visitor_activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip_address` varchar(50) NOT NULL,
  `role` varchar(225) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `referrer_url` varchar(255) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=843 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO visitor_activity_logs VALUES("1","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-11 04:43:46");
INSERT INTO visitor_activity_logs VALUES("2","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:43:52");
INSERT INTO visitor_activity_logs VALUES("3","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-11 04:43:55");
INSERT INTO visitor_activity_logs VALUES("4","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/make_payment.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-11 04:44:12");
INSERT INTO visitor_activity_logs VALUES("5","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/make_payment.php","2023-07-11 04:44:16");
INSERT INTO visitor_activity_logs VALUES("6","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-11 04:44:59");
INSERT INTO visitor_activity_logs VALUES("7","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:45:01");
INSERT INTO visitor_activity_logs VALUES("8","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:46:55");
INSERT INTO visitor_activity_logs VALUES("9","197.239.13.28","","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","/","2023-07-11 04:47:24");
INSERT INTO visitor_activity_logs VALUES("10","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:49:35");
INSERT INTO visitor_activity_logs VALUES("11","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:49:38");
INSERT INTO visitor_activity_logs VALUES("12","197.239.5.31","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:50:08");
INSERT INTO visitor_activity_logs VALUES("13","197.239.15.28","","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:50:30");
INSERT INTO visitor_activity_logs VALUES("14","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-11 04:50:47");
INSERT INTO visitor_activity_logs VALUES("15","197.239.15.28","","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","/","2023-07-11 04:51:01");
INSERT INTO visitor_activity_logs VALUES("16","197.239.5.31","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:51:23");
INSERT INTO visitor_activity_logs VALUES("17","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:52:27");
INSERT INTO visitor_activity_logs VALUES("18","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:52:34");
INSERT INTO visitor_activity_logs VALUES("19","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-11 04:52:37");
INSERT INTO visitor_activity_logs VALUES("20","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-11 04:53:15");
INSERT INTO visitor_activity_logs VALUES("21","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:53:38");
INSERT INTO visitor_activity_logs VALUES("22","197.239.13.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-11 04:53:49");
INSERT INTO visitor_activity_logs VALUES("23","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-11 04:54:00");
INSERT INTO visitor_activity_logs VALUES("24","197.239.15.28","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-11 04:56:57");
INSERT INTO visitor_activity_logs VALUES("25","197.239.15.28","","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0","https://phones.mtlictsolutions.com/pages/index.php","/","2023-07-11 04:59:39");
INSERT INTO visitor_activity_logs VALUES("26","102.85.147.217","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-11 08:01:48");
INSERT INTO visitor_activity_logs VALUES("27","102.85.147.217","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-11 08:02:05");
INSERT INTO visitor_activity_logs VALUES("28","102.85.147.217","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-11 08:02:09");
INSERT INTO visitor_activity_logs VALUES("29","51.89.149.56","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-11 11:26:35");
INSERT INTO visitor_activity_logs VALUES("30","51.89.149.56","","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-11 12:44:35");
INSERT INTO visitor_activity_logs VALUES("31","102.85.201.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-11 19:14:03");
INSERT INTO visitor_activity_logs VALUES("32","102.85.201.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-11 19:14:16");
INSERT INTO visitor_activity_logs VALUES("33","197.239.13.173","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-12 06:08:32");
INSERT INTO visitor_activity_logs VALUES("34","197.239.15.173","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-12 06:09:03");
INSERT INTO visitor_activity_logs VALUES("35","197.239.15.173","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-12 06:09:05");
INSERT INTO visitor_activity_logs VALUES("36","197.239.15.173","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-12 06:13:30");
INSERT INTO visitor_activity_logs VALUES("37","197.239.15.173","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-12 06:14:32");
INSERT INTO visitor_activity_logs VALUES("38","197.239.15.173","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-12 06:16:06");
INSERT INTO visitor_activity_logs VALUES("39","135.125.232.248","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-12 10:34:03");
INSERT INTO visitor_activity_logs VALUES("40","135.125.232.248","","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-12 11:55:19");
INSERT INTO visitor_activity_logs VALUES("41","41.75.170.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-12 16:05:31");
INSERT INTO visitor_activity_logs VALUES("42","41.210.145.101","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php?msg=Wrong%20Username%20or%20Password","2023-07-12 18:21:53");
INSERT INTO visitor_activity_logs VALUES("43","41.210.145.101","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-12 18:22:10");
INSERT INTO visitor_activity_logs VALUES("44","41.210.145.101","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-12 18:22:14");
INSERT INTO visitor_activity_logs VALUES("45","41.210.145.101","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-12 18:26:09");
INSERT INTO visitor_activity_logs VALUES("46","41.210.145.101","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-12 18:26:10");
INSERT INTO visitor_activity_logs VALUES("47","41.210.145.101","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-12 18:41:07");
INSERT INTO visitor_activity_logs VALUES("48","41.210.145.101","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-12 18:41:07");
INSERT INTO visitor_activity_logs VALUES("49","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-12 22:51:57");
INSERT INTO visitor_activity_logs VALUES("50","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-12 22:53:25");
INSERT INTO visitor_activity_logs VALUES("51","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-12 22:53:40");
INSERT INTO visitor_activity_logs VALUES("52","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-12 22:53:41");
INSERT INTO visitor_activity_logs VALUES("53","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-12 22:53:44");
INSERT INTO visitor_activity_logs VALUES("54","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_invoice.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-12 22:53:53");
INSERT INTO visitor_activity_logs VALUES("55","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-12 22:53:58");
INSERT INTO visitor_activity_logs VALUES("56","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-12 22:54:24");
INSERT INTO visitor_activity_logs VALUES("57","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-12 22:54:26");
INSERT INTO visitor_activity_logs VALUES("58","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-12 22:54:28");
INSERT INTO visitor_activity_logs VALUES("59","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-12 22:54:35");
INSERT INTO visitor_activity_logs VALUES("60","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-12 22:54:37");
INSERT INTO visitor_activity_logs VALUES("61","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_item.php","2023-07-12 22:55:12");
INSERT INTO visitor_activity_logs VALUES("62","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-12 22:55:34");
INSERT INTO visitor_activity_logs VALUES("63","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-12 22:55:59");
INSERT INTO visitor_activity_logs VALUES("64","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_sales.php","https://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-12 22:56:01");
INSERT INTO visitor_activity_logs VALUES("65","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/customer_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-12 22:56:07");
INSERT INTO visitor_activity_logs VALUES("66","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_sales.php","https://phones.mtlictsolutions.com/pages/customer_transaction_history.php","2023-07-12 22:56:09");
INSERT INTO visitor_activity_logs VALUES("67","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-12 22:56:12");
INSERT INTO visitor_activity_logs VALUES("68","102.85.218.153","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-12 22:59:19");
INSERT INTO visitor_activity_logs VALUES("69","197.239.13.238","","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","/","2023-07-13 04:50:46");
INSERT INTO visitor_activity_logs VALUES("70","197.239.13.238","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-13 04:50:53");
INSERT INTO visitor_activity_logs VALUES("71","197.239.13.238","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/view_item_details.php?phone_id=1phone_id=1","http://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-13 04:51:40");
INSERT INTO visitor_activity_logs VALUES("72","197.239.13.238","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 08:21:37");
INSERT INTO visitor_activity_logs VALUES("73","197.239.13.238","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-13 08:21:46");
INSERT INTO visitor_activity_logs VALUES("74","197.239.13.238","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-13 08:23:02");
INSERT INTO visitor_activity_logs VALUES("75","197.239.13.238","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 08:29:38");
INSERT INTO visitor_activity_logs VALUES("76","197.239.13.238","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/reports.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 08:29:51");
INSERT INTO visitor_activity_logs VALUES("77","197.239.13.238","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/reports.php","https://phones.mtlictsolutions.com/pages/reports.php","2023-07-13 08:29:58");
INSERT INTO visitor_activity_logs VALUES("78","197.239.15.238","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/reports.php","2023-07-13 08:30:51");
INSERT INTO visitor_activity_logs VALUES("79","197.239.13.238","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-13 08:31:01");
INSERT INTO visitor_activity_logs VALUES("80","197.239.7.239","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-13 08:31:14");
INSERT INTO visitor_activity_logs VALUES("81","197.239.13.238","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 08:32:49");
INSERT INTO visitor_activity_logs VALUES("82","197.239.13.238","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 08:39:02");
INSERT INTO visitor_activity_logs VALUES("83","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-13 12:46:43");
INSERT INTO visitor_activity_logs VALUES("84","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-13 12:47:39");
INSERT INTO visitor_activity_logs VALUES("85","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 12:47:42");
INSERT INTO visitor_activity_logs VALUES("86","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 12:49:43");
INSERT INTO visitor_activity_logs VALUES("87","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_supplier.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 12:50:42");
INSERT INTO visitor_activity_logs VALUES("88","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_supplier.php","http://phones.mtlictsolutions.com/pages/add_supplier.php","2023-07-13 12:51:38");
INSERT INTO visitor_activity_logs VALUES("89","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_supplier.php","2023-07-13 12:52:03");
INSERT INTO visitor_activity_logs VALUES("90","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 12:52:18");
INSERT INTO visitor_activity_logs VALUES("91","41.210.155.126","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-13 12:55:15");
INSERT INTO visitor_activity_logs VALUES("92","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-13 12:55:44");
INSERT INTO visitor_activity_logs VALUES("93","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 12:55:53");
INSERT INTO visitor_activity_logs VALUES("94","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 12:56:53");
INSERT INTO visitor_activity_logs VALUES("95","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 12:56:54");
INSERT INTO visitor_activity_logs VALUES("96","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 12:59:28");
INSERT INTO visitor_activity_logs VALUES("97","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 12:59:28");
INSERT INTO visitor_activity_logs VALUES("98","41.210.155.126","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-13 13:00:34");
INSERT INTO visitor_activity_logs VALUES("99","41.210.155.126","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-13 13:01:00");
INSERT INTO visitor_activity_logs VALUES("100","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-13 13:01:09");
INSERT INTO visitor_activity_logs VALUES("101","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 13:01:16");
INSERT INTO visitor_activity_logs VALUES("102","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:04:01");
INSERT INTO visitor_activity_logs VALUES("103","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:04:02");
INSERT INTO visitor_activity_logs VALUES("104","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:17:32");
INSERT INTO visitor_activity_logs VALUES("105","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:19:23");
INSERT INTO visitor_activity_logs VALUES("106","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:19:27");
INSERT INTO visitor_activity_logs VALUES("107","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:21:34");
INSERT INTO visitor_activity_logs VALUES("108","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:21:35");
INSERT INTO visitor_activity_logs VALUES("109","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:22:30");
INSERT INTO visitor_activity_logs VALUES("110","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:22:31");
INSERT INTO visitor_activity_logs VALUES("111","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:23:56");
INSERT INTO visitor_activity_logs VALUES("112","41.210.155.126","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:23:57");
INSERT INTO visitor_activity_logs VALUES("113","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-13 13:34:13");
INSERT INTO visitor_activity_logs VALUES("114","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/select_customer.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-13 13:34:42");
INSERT INTO visitor_activity_logs VALUES("115","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/add_sales.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-13 13:34:46");
INSERT INTO visitor_activity_logs VALUES("116","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/customer_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-13 13:34:49");
INSERT INTO visitor_activity_logs VALUES("117","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/add_sales.php","http://phones.mtlictsolutions.com/pages/customer_transaction_history.php","2023-07-13 13:34:52");
INSERT INTO visitor_activity_logs VALUES("118","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-13 13:35:40");
INSERT INTO visitor_activity_logs VALUES("119","41.210.155.126","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-13 13:36:17");
INSERT INTO visitor_activity_logs VALUES("120","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-13 13:36:19");
INSERT INTO visitor_activity_logs VALUES("121","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 13:36:22");
INSERT INTO visitor_activity_logs VALUES("122","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:36:25");
INSERT INTO visitor_activity_logs VALUES("123","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 13:36:49");
INSERT INTO visitor_activity_logs VALUES("124","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-13 13:36:56");
INSERT INTO visitor_activity_logs VALUES("125","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 13:37:10");
INSERT INTO visitor_activity_logs VALUES("126","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 13:37:15");
INSERT INTO visitor_activity_logs VALUES("127","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:37:19");
INSERT INTO visitor_activity_logs VALUES("128","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 13:37:38");
INSERT INTO visitor_activity_logs VALUES("129","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 13:37:45");
INSERT INTO visitor_activity_logs VALUES("130","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/make_payment.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:37:48");
INSERT INTO visitor_activity_logs VALUES("131","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_information.php","http://phones.mtlictsolutions.com/pages/make_payment.php","2023-07-13 13:37:50");
INSERT INTO visitor_activity_logs VALUES("132","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/supplier_information.php","2023-07-13 13:37:52");
INSERT INTO visitor_activity_logs VALUES("133","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 13:37:59");
INSERT INTO visitor_activity_logs VALUES("134","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 13:38:07");
INSERT INTO visitor_activity_logs VALUES("135","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:38:09");
INSERT INTO visitor_activity_logs VALUES("136","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 13:38:13");
INSERT INTO visitor_activity_logs VALUES("137","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-13 13:38:39");
INSERT INTO visitor_activity_logs VALUES("138","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/purchase_report.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-13 13:38:47");
INSERT INTO visitor_activity_logs VALUES("139","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-13 13:40:59");
INSERT INTO visitor_activity_logs VALUES("140","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 13:41:02");
INSERT INTO visitor_activity_logs VALUES("141","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 13:41:22");
INSERT INTO visitor_activity_logs VALUES("142","41.75.170.250","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/purchase_report.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 13:42:11");
INSERT INTO visitor_activity_logs VALUES("143","197.239.15.230","","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/purchase_report.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 17:25:01");
INSERT INTO visitor_activity_logs VALUES("144","88.208.225.247","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-13 17:46:38");
INSERT INTO visitor_activity_logs VALUES("145","88.208.225.247","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/purchase_report.php","http://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-13 17:47:43");
INSERT INTO visitor_activity_logs VALUES("146","88.208.225.247","admin","Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/purchase_report.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-13 17:51:47");
INSERT INTO visitor_activity_logs VALUES("147","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-13 18:08:13");
INSERT INTO visitor_activity_logs VALUES("148","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 18:08:33");
INSERT INTO visitor_activity_logs VALUES("149","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 18:09:12");
INSERT INTO visitor_activity_logs VALUES("150","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 18:09:22");
INSERT INTO visitor_activity_logs VALUES("151","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 18:09:24");
INSERT INTO visitor_activity_logs VALUES("152","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 18:09:27");
INSERT INTO visitor_activity_logs VALUES("153","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 18:09:39");
INSERT INTO visitor_activity_logs VALUES("154","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-13 18:10:07");
INSERT INTO visitor_activity_logs VALUES("155","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-13 18:10:31");
INSERT INTO visitor_activity_logs VALUES("156","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 18:11:45");
INSERT INTO visitor_activity_logs VALUES("157","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 18:12:46");
INSERT INTO visitor_activity_logs VALUES("158","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 18:12:57");
INSERT INTO visitor_activity_logs VALUES("159","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/save_edit_purchases.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-13 18:14:18");
INSERT INTO visitor_activity_logs VALUES("160","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=8purchase_id=8","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-13 18:14:18");
INSERT INTO visitor_activity_logs VALUES("161","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=8","2023-07-13 18:14:24");
INSERT INTO visitor_activity_logs VALUES("162","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 18:14:34");
INSERT INTO visitor_activity_logs VALUES("163","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/save_edit_purchases.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-13 18:15:32");
INSERT INTO visitor_activity_logs VALUES("164","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=9purchase_id=9","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-13 18:15:32");
INSERT INTO visitor_activity_logs VALUES("165","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=9","2023-07-13 18:15:43");
INSERT INTO visitor_activity_logs VALUES("166","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_invoice.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 18:16:15");
INSERT INTO visitor_activity_logs VALUES("167","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=9","2023-07-13 18:16:30");
INSERT INTO visitor_activity_logs VALUES("168","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 18:16:41");
INSERT INTO visitor_activity_logs VALUES("169","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-13 18:17:46");
INSERT INTO visitor_activity_logs VALUES("170","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 18:21:27");
INSERT INTO visitor_activity_logs VALUES("171","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 18:22:03");
INSERT INTO visitor_activity_logs VALUES("172","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-13 18:22:36");
INSERT INTO visitor_activity_logs VALUES("173","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_sales.php","https://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-13 18:22:40");
INSERT INTO visitor_activity_logs VALUES("174","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/customer_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-13 18:22:43");
INSERT INTO visitor_activity_logs VALUES("175","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/customer_transaction_history.php","2023-07-13 18:22:46");
INSERT INTO visitor_activity_logs VALUES("176","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 18:27:40");
INSERT INTO visitor_activity_logs VALUES("177","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-13 18:28:07");
INSERT INTO visitor_activity_logs VALUES("178","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-13 18:28:18");
INSERT INTO visitor_activity_logs VALUES("179","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/reports.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 18:28:38");
INSERT INTO visitor_activity_logs VALUES("180","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/reports.php","https://phones.mtlictsolutions.com/pages/reports.php","2023-07-13 18:28:55");
INSERT INTO visitor_activity_logs VALUES("181","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/reports.php","2023-07-13 18:30:33");
INSERT INTO visitor_activity_logs VALUES("182","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 18:30:51");
INSERT INTO visitor_activity_logs VALUES("183","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-13 18:34:52");
INSERT INTO visitor_activity_logs VALUES("184","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-13 18:38:54");
INSERT INTO visitor_activity_logs VALUES("185","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/stock_taking.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-13 18:41:11");
INSERT INTO visitor_activity_logs VALUES("186","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/save_stock_taking.php","https://phones.mtlictsolutions.com/pages/stock_taking.php","2023-07-13 18:41:21");
INSERT INTO visitor_activity_logs VALUES("187","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-13 18:41:26");
INSERT INTO visitor_activity_logs VALUES("188","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_income.php","https://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-13 18:42:55");
INSERT INTO visitor_activity_logs VALUES("189","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/add_item.php","2023-07-13 18:43:06");
INSERT INTO visitor_activity_logs VALUES("190","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-13 18:43:11");
INSERT INTO visitor_activity_logs VALUES("191","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-13 18:43:15");
INSERT INTO visitor_activity_logs VALUES("192","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-13 18:43:34");
INSERT INTO visitor_activity_logs VALUES("193","102.85.177.13","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-13 18:44:43");
INSERT INTO visitor_activity_logs VALUES("194","197.239.12.104","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-14 07:46:52");
INSERT INTO visitor_activity_logs VALUES("195","197.239.12.104","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-14 07:47:19");
INSERT INTO visitor_activity_logs VALUES("196","197.239.6.105","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-14 08:08:41");
INSERT INTO visitor_activity_logs VALUES("197","197.239.14.104","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-14 08:27:35");
INSERT INTO visitor_activity_logs VALUES("198","197.239.12.104","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-14 08:27:40");
INSERT INTO visitor_activity_logs VALUES("199","197.239.12.104","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-14 08:27:48");
INSERT INTO visitor_activity_logs VALUES("200","197.239.12.104","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-14 08:28:08");
INSERT INTO visitor_activity_logs VALUES("201","197.239.14.154","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-14 09:10:02");
INSERT INTO visitor_activity_logs VALUES("202","197.239.14.154","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-14 10:51:29");
INSERT INTO visitor_activity_logs VALUES("203","88.202.177.63","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-14 15:05:00");
INSERT INTO visitor_activity_logs VALUES("204","88.202.177.63","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-14 15:06:22");
INSERT INTO visitor_activity_logs VALUES("205","88.202.177.63","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-14 15:16:43");
INSERT INTO visitor_activity_logs VALUES("206","197.239.6.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-15 06:27:23");
INSERT INTO visitor_activity_logs VALUES("207","102.85.218.111","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-15 11:30:27");
INSERT INTO visitor_activity_logs VALUES("208","102.85.218.111","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-15 11:31:49");
INSERT INTO visitor_activity_logs VALUES("209","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-15 11:53:10");
INSERT INTO visitor_activity_logs VALUES("210","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 11:53:15");
INSERT INTO visitor_activity_logs VALUES("211","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 12:21:08");
INSERT INTO visitor_activity_logs VALUES("212","41.210.141.168","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-15 12:23:06");
INSERT INTO visitor_activity_logs VALUES("213","41.210.141.168","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-15 12:24:02");
INSERT INTO visitor_activity_logs VALUES("214","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-15 12:26:31");
INSERT INTO visitor_activity_logs VALUES("215","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 12:28:16");
INSERT INTO visitor_activity_logs VALUES("216","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:28:35");
INSERT INTO visitor_activity_logs VALUES("217","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 12:29:23");
INSERT INTO visitor_activity_logs VALUES("218","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 12:29:26");
INSERT INTO visitor_activity_logs VALUES("219","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:29:30");
INSERT INTO visitor_activity_logs VALUES("220","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 12:29:37");
INSERT INTO visitor_activity_logs VALUES("221","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:31:07");
INSERT INTO visitor_activity_logs VALUES("222","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:31:07");
INSERT INTO visitor_activity_logs VALUES("223","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:39:41");
INSERT INTO visitor_activity_logs VALUES("224","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:40:05");
INSERT INTO visitor_activity_logs VALUES("225","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:44:27");
INSERT INTO visitor_activity_logs VALUES("226","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:44:32");
INSERT INTO visitor_activity_logs VALUES("227","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:44:35");
INSERT INTO visitor_activity_logs VALUES("228","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:44:40");
INSERT INTO visitor_activity_logs VALUES("229","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 12:44:45");
INSERT INTO visitor_activity_logs VALUES("230","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 12:49:59");
INSERT INTO visitor_activity_logs VALUES("231","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-15 13:51:42");
INSERT INTO visitor_activity_logs VALUES("232","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 13:51:51");
INSERT INTO visitor_activity_logs VALUES("233","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 13:52:02");
INSERT INTO visitor_activity_logs VALUES("234","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 13:53:07");
INSERT INTO visitor_activity_logs VALUES("235","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 13:53:34");
INSERT INTO visitor_activity_logs VALUES("236","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-15 13:53:46");
INSERT INTO visitor_activity_logs VALUES("237","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 13:53:49");
INSERT INTO visitor_activity_logs VALUES("238","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 13:53:55");
INSERT INTO visitor_activity_logs VALUES("239","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 13:53:55");
INSERT INTO visitor_activity_logs VALUES("240","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 13:55:26");
INSERT INTO visitor_activity_logs VALUES("241","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 13:55:27");
INSERT INTO visitor_activity_logs VALUES("242","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 13:57:12");
INSERT INTO visitor_activity_logs VALUES("243","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-15 13:57:40");
INSERT INTO visitor_activity_logs VALUES("244","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 13:57:43");
INSERT INTO visitor_activity_logs VALUES("245","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 13:57:44");
INSERT INTO visitor_activity_logs VALUES("246","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 13:57:49");
INSERT INTO visitor_activity_logs VALUES("247","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 13:59:47");
INSERT INTO visitor_activity_logs VALUES("248","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 13:59:48");
INSERT INTO visitor_activity_logs VALUES("249","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 14:02:04");
INSERT INTO visitor_activity_logs VALUES("250","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 14:02:08");
INSERT INTO visitor_activity_logs VALUES("251","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 14:02:40");
INSERT INTO visitor_activity_logs VALUES("252","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 14:02:44");
INSERT INTO visitor_activity_logs VALUES("253","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 14:02:49");
INSERT INTO visitor_activity_logs VALUES("254","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-15 14:03:10");
INSERT INTO visitor_activity_logs VALUES("255","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 14:03:22");
INSERT INTO visitor_activity_logs VALUES("256","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 14:03:49");
INSERT INTO visitor_activity_logs VALUES("257","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 14:04:25");
INSERT INTO visitor_activity_logs VALUES("258","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 14:07:25");
INSERT INTO visitor_activity_logs VALUES("259","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 14:07:25");
INSERT INTO visitor_activity_logs VALUES("260","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-15 15:37:15");
INSERT INTO visitor_activity_logs VALUES("261","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-15 15:37:26");
INSERT INTO visitor_activity_logs VALUES("262","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-15 15:38:10");
INSERT INTO visitor_activity_logs VALUES("263","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 15:38:12");
INSERT INTO visitor_activity_logs VALUES("264","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 15:38:16");
INSERT INTO visitor_activity_logs VALUES("265","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 15:38:22");
INSERT INTO visitor_activity_logs VALUES("266","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 15:38:25");
INSERT INTO visitor_activity_logs VALUES("267","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 15:38:31");
INSERT INTO visitor_activity_logs VALUES("268","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 15:38:34");
INSERT INTO visitor_activity_logs VALUES("269","154.231.172.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 15:39:46");
INSERT INTO visitor_activity_logs VALUES("270","104.28.227.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-15 16:07:03");
INSERT INTO visitor_activity_logs VALUES("271","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php?msg=Wrong%20Username%20or%20Password","2023-07-15 16:08:04");
INSERT INTO visitor_activity_logs VALUES("272","104.28.227.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 16:08:54");
INSERT INTO visitor_activity_logs VALUES("273","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-15 16:09:06");
INSERT INTO visitor_activity_logs VALUES("274","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:10:26");
INSERT INTO visitor_activity_logs VALUES("275","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:11:52");
INSERT INTO visitor_activity_logs VALUES("276","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:12:05");
INSERT INTO visitor_activity_logs VALUES("277","104.28.227.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:23:15");
INSERT INTO visitor_activity_logs VALUES("278","104.28.227.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:23:16");
INSERT INTO visitor_activity_logs VALUES("279","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:23:41");
INSERT INTO visitor_activity_logs VALUES("280","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:23:42");
INSERT INTO visitor_activity_logs VALUES("281","104.28.227.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:23:58");
INSERT INTO visitor_activity_logs VALUES("282","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:26:38");
INSERT INTO visitor_activity_logs VALUES("283","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:26:39");
INSERT INTO visitor_activity_logs VALUES("284","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:28:23");
INSERT INTO visitor_activity_logs VALUES("285","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:28:23");
INSERT INTO visitor_activity_logs VALUES("286","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:31:31");
INSERT INTO visitor_activity_logs VALUES("287","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:31:31");
INSERT INTO visitor_activity_logs VALUES("288","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:33:02");
INSERT INTO visitor_activity_logs VALUES("289","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:33:03");
INSERT INTO visitor_activity_logs VALUES("290","104.28.227.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:33:53");
INSERT INTO visitor_activity_logs VALUES("291","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=21item_id=21","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-15 16:34:44");
INSERT INTO visitor_activity_logs VALUES("292","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=21item_id=21","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=21","2023-07-15 16:34:52");
INSERT INTO visitor_activity_logs VALUES("293","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_item.php","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=21","2023-07-15 16:35:32");
INSERT INTO visitor_activity_logs VALUES("294","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_item.php","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=21","2023-07-15 16:35:36");
INSERT INTO visitor_activity_logs VALUES("295","41.210.141.168","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_edit_item.php","2023-07-15 16:36:38");
INSERT INTO visitor_activity_logs VALUES("296","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-15 16:36:44");
INSERT INTO visitor_activity_logs VALUES("297","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:36:57");
INSERT INTO visitor_activity_logs VALUES("298","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:38:51");
INSERT INTO visitor_activity_logs VALUES("299","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:38:51");
INSERT INTO visitor_activity_logs VALUES("300","104.28.227.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:38:59");
INSERT INTO visitor_activity_logs VALUES("301","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=21item_id=21","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-15 16:39:52");
INSERT INTO visitor_activity_logs VALUES("302","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=21","2023-07-15 16:40:27");
INSERT INTO visitor_activity_logs VALUES("303","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:40:36");
INSERT INTO visitor_activity_logs VALUES("304","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:40:42");
INSERT INTO visitor_activity_logs VALUES("305","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 16:40:52");
INSERT INTO visitor_activity_logs VALUES("306","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 16:41:42");
INSERT INTO visitor_activity_logs VALUES("307","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=29purchase_id=29","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 16:41:42");
INSERT INTO visitor_activity_logs VALUES("308","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=29","2023-07-15 16:41:56");
INSERT INTO visitor_activity_logs VALUES("309","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 16:42:16");
INSERT INTO visitor_activity_logs VALUES("310","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 16:42:24");
INSERT INTO visitor_activity_logs VALUES("311","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:42:27");
INSERT INTO visitor_activity_logs VALUES("312","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:43:48");
INSERT INTO visitor_activity_logs VALUES("313","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:43:48");
INSERT INTO visitor_activity_logs VALUES("314","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:44:11");
INSERT INTO visitor_activity_logs VALUES("315","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 16:44:30");
INSERT INTO visitor_activity_logs VALUES("316","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:44:38");
INSERT INTO visitor_activity_logs VALUES("317","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 16:44:44");
INSERT INTO visitor_activity_logs VALUES("318","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 16:46:22");
INSERT INTO visitor_activity_logs VALUES("319","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:46:35");
INSERT INTO visitor_activity_logs VALUES("320","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:48:09");
INSERT INTO visitor_activity_logs VALUES("321","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:48:09");
INSERT INTO visitor_activity_logs VALUES("322","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:48:30");
INSERT INTO visitor_activity_logs VALUES("323","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:48:38");
INSERT INTO visitor_activity_logs VALUES("324","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:52:22");
INSERT INTO visitor_activity_logs VALUES("325","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:52:22");
INSERT INTO visitor_activity_logs VALUES("326","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 16:57:07");
INSERT INTO visitor_activity_logs VALUES("327","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 16:58:05");
INSERT INTO visitor_activity_logs VALUES("328","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:05:14");
INSERT INTO visitor_activity_logs VALUES("329","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:05:15");
INSERT INTO visitor_activity_logs VALUES("330","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:20:55");
INSERT INTO visitor_activity_logs VALUES("331","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:20:55");
INSERT INTO visitor_activity_logs VALUES("332","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:26:14");
INSERT INTO visitor_activity_logs VALUES("333","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:26:15");
INSERT INTO visitor_activity_logs VALUES("334","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:26:22");
INSERT INTO visitor_activity_logs VALUES("335","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 17:26:23");
INSERT INTO visitor_activity_logs VALUES("336","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 17:26:26");
INSERT INTO visitor_activity_logs VALUES("337","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:26:30");
INSERT INTO visitor_activity_logs VALUES("338","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 17:26:39");
INSERT INTO visitor_activity_logs VALUES("339","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/delete_edited_purchase.php?purchase_details_id=21purchase_details_id=21","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 17:26:45");
INSERT INTO visitor_activity_logs VALUES("340","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/delete_edited_purchase.php?purchase_details_id=21purchase_details_id=21","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 17:26:49");
INSERT INTO visitor_activity_logs VALUES("341","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/delete_edited_purchase.php?purchase_details_id=21purchase_details_id=21","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 17:27:12");
INSERT INTO visitor_activity_logs VALUES("342","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-15 17:27:25");
INSERT INTO visitor_activity_logs VALUES("343","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-15 17:27:39");
INSERT INTO visitor_activity_logs VALUES("344","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 17:27:41");
INSERT INTO visitor_activity_logs VALUES("345","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:37:02");
INSERT INTO visitor_activity_logs VALUES("346","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 17:37:08");
INSERT INTO visitor_activity_logs VALUES("347","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:37:14");
INSERT INTO visitor_activity_logs VALUES("348","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 17:37:36");
INSERT INTO visitor_activity_logs VALUES("349","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:38:07");
INSERT INTO visitor_activity_logs VALUES("350","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 17:38:11");
INSERT INTO visitor_activity_logs VALUES("351","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 17:38:18");
INSERT INTO visitor_activity_logs VALUES("352","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:38:23");
INSERT INTO visitor_activity_logs VALUES("353","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 17:38:28");
INSERT INTO visitor_activity_logs VALUES("354","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 17:42:17");
INSERT INTO visitor_activity_logs VALUES("355","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=33purchase_id=33","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 17:42:17");
INSERT INTO visitor_activity_logs VALUES("356","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=33","2023-07-15 17:42:24");
INSERT INTO visitor_activity_logs VALUES("357","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=33purchase_id=33","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=33","2023-07-15 17:42:24");
INSERT INTO visitor_activity_logs VALUES("358","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=33","2023-07-15 17:42:31");
INSERT INTO visitor_activity_logs VALUES("359","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 17:42:44");
INSERT INTO visitor_activity_logs VALUES("360","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 17:42:51");
INSERT INTO visitor_activity_logs VALUES("361","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:42:56");
INSERT INTO visitor_activity_logs VALUES("362","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 17:44:33");
INSERT INTO visitor_activity_logs VALUES("363","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:48:16");
INSERT INTO visitor_activity_logs VALUES("364","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:48:17");
INSERT INTO visitor_activity_logs VALUES("365","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:54:56");
INSERT INTO visitor_activity_logs VALUES("366","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:54:57");
INSERT INTO visitor_activity_logs VALUES("367","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:55:03");
INSERT INTO visitor_activity_logs VALUES("368","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:56:22");
INSERT INTO visitor_activity_logs VALUES("369","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:56:24");
INSERT INTO visitor_activity_logs VALUES("370","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:56:34");
INSERT INTO visitor_activity_logs VALUES("371","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 17:56:55");
INSERT INTO visitor_activity_logs VALUES("372","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:58:23");
INSERT INTO visitor_activity_logs VALUES("373","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 17:58:23");
INSERT INTO visitor_activity_logs VALUES("374","41.210.141.168","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-15 18:14:28");
INSERT INTO visitor_activity_logs VALUES("375","41.210.141.168","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-15 18:16:39");
INSERT INTO visitor_activity_logs VALUES("376","41.210.141.168","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-15 18:17:07");
INSERT INTO visitor_activity_logs VALUES("377","41.210.141.168","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-15 18:17:22");
INSERT INTO visitor_activity_logs VALUES("378","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-15 18:17:29");
INSERT INTO visitor_activity_logs VALUES("379","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 18:17:35");
INSERT INTO visitor_activity_logs VALUES("380","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-15 18:17:52");
INSERT INTO visitor_activity_logs VALUES("381","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 18:18:01");
INSERT INTO visitor_activity_logs VALUES("382","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 18:20:02");
INSERT INTO visitor_activity_logs VALUES("383","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 18:20:02");
INSERT INTO visitor_activity_logs VALUES("384","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 18:20:50");
INSERT INTO visitor_activity_logs VALUES("385","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 18:21:03");
INSERT INTO visitor_activity_logs VALUES("386","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 18:21:56");
INSERT INTO visitor_activity_logs VALUES("387","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 18:21:57");
INSERT INTO visitor_activity_logs VALUES("388","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 18:33:41");
INSERT INTO visitor_activity_logs VALUES("389","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 18:33:42");
INSERT INTO visitor_activity_logs VALUES("390","41.210.141.168","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 18:34:22");
INSERT INTO visitor_activity_logs VALUES("391","104.28.195.114","","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 20:50:40");
INSERT INTO visitor_activity_logs VALUES("392","104.28.195.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-15 20:50:57");
INSERT INTO visitor_activity_logs VALUES("393","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-15 22:08:25");
INSERT INTO visitor_activity_logs VALUES("394","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-15 22:08:32");
INSERT INTO visitor_activity_logs VALUES("395","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 22:08:35");
INSERT INTO visitor_activity_logs VALUES("396","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 22:08:38");
INSERT INTO visitor_activity_logs VALUES("397","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 22:08:49");
INSERT INTO visitor_activity_logs VALUES("398","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 22:08:52");
INSERT INTO visitor_activity_logs VALUES("399","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-15 22:09:09");
INSERT INTO visitor_activity_logs VALUES("400","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-15 22:10:12");
INSERT INTO visitor_activity_logs VALUES("401","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 22:10:14");
INSERT INTO visitor_activity_logs VALUES("402","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 22:10:19");
INSERT INTO visitor_activity_logs VALUES("403","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-15 22:10:25");
INSERT INTO visitor_activity_logs VALUES("404","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 22:10:28");
INSERT INTO visitor_activity_logs VALUES("405","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 22:10:32");
INSERT INTO visitor_activity_logs VALUES("406","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 22:10:50");
INSERT INTO visitor_activity_logs VALUES("407","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 22:11:01");
INSERT INTO visitor_activity_logs VALUES("408","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-15 22:12:32");
INSERT INTO visitor_activity_logs VALUES("409","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 22:12:43");
INSERT INTO visitor_activity_logs VALUES("410","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 22:12:55");
INSERT INTO visitor_activity_logs VALUES("411","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 22:13:03");
INSERT INTO visitor_activity_logs VALUES("412","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 22:13:26");
INSERT INTO visitor_activity_logs VALUES("413","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 22:13:35");
INSERT INTO visitor_activity_logs VALUES("414","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-15 22:13:48");
INSERT INTO visitor_activity_logs VALUES("415","172.104.217.212","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-15 22:18:48");
INSERT INTO visitor_activity_logs VALUES("416","197.239.13.216","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-16 06:54:49");
INSERT INTO visitor_activity_logs VALUES("417","197.239.13.216","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-16 06:55:00");
INSERT INTO visitor_activity_logs VALUES("418","197.239.13.216","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-16 06:55:02");
INSERT INTO visitor_activity_logs VALUES("419","197.239.13.216","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_customer.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-16 06:55:16");
INSERT INTO visitor_activity_logs VALUES("420","197.239.13.216","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/stock_take_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-16 06:55:18");
INSERT INTO visitor_activity_logs VALUES("421","135.125.232.248","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-16 12:27:47");
INSERT INTO visitor_activity_logs VALUES("422","135.125.232.248","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-16 12:27:48");
INSERT INTO visitor_activity_logs VALUES("423","197.239.13.236","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-16 23:41:53");
INSERT INTO visitor_activity_logs VALUES("424","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-17 11:06:19");
INSERT INTO visitor_activity_logs VALUES("425","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-17 11:06:36");
INSERT INTO visitor_activity_logs VALUES("426","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 11:06:43");
INSERT INTO visitor_activity_logs VALUES("427","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:21:51");
INSERT INTO visitor_activity_logs VALUES("428","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:21:51");
INSERT INTO visitor_activity_logs VALUES("429","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:22:14");
INSERT INTO visitor_activity_logs VALUES("430","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 11:22:49");
INSERT INTO visitor_activity_logs VALUES("431","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:36:57");
INSERT INTO visitor_activity_logs VALUES("432","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:36:57");
INSERT INTO visitor_activity_logs VALUES("433","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:37:00");
INSERT INTO visitor_activity_logs VALUES("434","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 11:37:15");
INSERT INTO visitor_activity_logs VALUES("435","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:40:32");
INSERT INTO visitor_activity_logs VALUES("436","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:40:33");
INSERT INTO visitor_activity_logs VALUES("437","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:44:22");
INSERT INTO visitor_activity_logs VALUES("438","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:44:23");
INSERT INTO visitor_activity_logs VALUES("439","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:45:10");
INSERT INTO visitor_activity_logs VALUES("440","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 11:45:15");
INSERT INTO visitor_activity_logs VALUES("441","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 11:46:02");
INSERT INTO visitor_activity_logs VALUES("442","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 11:46:24");
INSERT INTO visitor_activity_logs VALUES("443","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=36purchase_id=36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 11:46:24");
INSERT INTO visitor_activity_logs VALUES("444","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=36","2023-07-17 11:46:38");
INSERT INTO visitor_activity_logs VALUES("445","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 11:46:56");
INSERT INTO visitor_activity_logs VALUES("446","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 11:48:10");
INSERT INTO visitor_activity_logs VALUES("447","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=35purchase_id=35","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 11:48:10");
INSERT INTO visitor_activity_logs VALUES("448","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=35","2023-07-17 11:48:15");
INSERT INTO visitor_activity_logs VALUES("449","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 11:48:53");
INSERT INTO visitor_activity_logs VALUES("450","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 11:54:09");
INSERT INTO visitor_activity_logs VALUES("451","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=34purchase_id=34","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 11:54:10");
INSERT INTO visitor_activity_logs VALUES("452","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=34","2023-07-17 11:54:29");
INSERT INTO visitor_activity_logs VALUES("453","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 11:54:43");
INSERT INTO visitor_activity_logs VALUES("454","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 11:54:57");
INSERT INTO visitor_activity_logs VALUES("455","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=33purchase_id=33","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 11:54:58");
INSERT INTO visitor_activity_logs VALUES("456","197.239.7.245","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-17 12:22:17");
INSERT INTO visitor_activity_logs VALUES("457","197.239.13.244","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-17 12:22:35");
INSERT INTO visitor_activity_logs VALUES("458","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=33","2023-07-17 12:53:59");
INSERT INTO visitor_activity_logs VALUES("459","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_customer.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 12:56:32");
INSERT INTO visitor_activity_logs VALUES("460","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_customer.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 12:56:38");
INSERT INTO visitor_activity_logs VALUES("461","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 12:56:42");
INSERT INTO visitor_activity_logs VALUES("462","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_customer.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 12:56:54");
INSERT INTO visitor_activity_logs VALUES("463","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-17 12:57:27");
INSERT INTO visitor_activity_logs VALUES("464","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-17 12:57:52");
INSERT INTO visitor_activity_logs VALUES("465","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 12:57:59");
INSERT INTO visitor_activity_logs VALUES("466","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_profile.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 12:58:31");
INSERT INTO visitor_activity_logs VALUES("467","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_customer.php","http://phones.mtlictsolutions.com/pages/edit_profile.php","2023-07-17 12:59:03");
INSERT INTO visitor_activity_logs VALUES("468","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_sales.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 12:59:10");
INSERT INTO visitor_activity_logs VALUES("469","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/customer_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-17 12:59:28");
INSERT INTO visitor_activity_logs VALUES("470","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/customer_transaction_history.php","2023-07-17 13:02:03");
INSERT INTO visitor_activity_logs VALUES("471","102.85.163.54","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-17 13:02:21");
INSERT INTO visitor_activity_logs VALUES("472","102.85.163.54","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-17 13:03:55");
INSERT INTO visitor_activity_logs VALUES("473","197.239.12.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-17 15:38:29");
INSERT INTO visitor_activity_logs VALUES("474","197.239.12.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-17 15:38:35");
INSERT INTO visitor_activity_logs VALUES("475","197.239.6.199","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-17 15:39:01");
INSERT INTO visitor_activity_logs VALUES("476","197.239.12.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-17 15:39:08");
INSERT INTO visitor_activity_logs VALUES("477","197.239.12.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 15:39:10");
INSERT INTO visitor_activity_logs VALUES("478","197.239.12.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/reports.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 15:39:22");
INSERT INTO visitor_activity_logs VALUES("479","197.239.12.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/reports.php","https://phones.mtlictsolutions.com/pages/reports.php","2023-07-17 15:39:25");
INSERT INTO visitor_activity_logs VALUES("480","197.239.12.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/reports.php","https://phones.mtlictsolutions.com/pages/reports.php","2023-07-17 15:39:35");
INSERT INTO visitor_activity_logs VALUES("481","197.239.12.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/reports.php","2023-07-17 15:39:38");
INSERT INTO visitor_activity_logs VALUES("482","197.239.12.198","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-17 15:39:46");
INSERT INTO visitor_activity_logs VALUES("483","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-17 16:48:31");
INSERT INTO visitor_activity_logs VALUES("484","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-17 16:48:37");
INSERT INTO visitor_activity_logs VALUES("485","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-17 16:48:51");
INSERT INTO visitor_activity_logs VALUES("486","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 16:48:53");
INSERT INTO visitor_activity_logs VALUES("487","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 16:48:57");
INSERT INTO visitor_activity_logs VALUES("488","197.239.13.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 16:49:14");
INSERT INTO visitor_activity_logs VALUES("489","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/make_payment.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 16:49:21");
INSERT INTO visitor_activity_logs VALUES("490","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/make_payment.php","2023-07-17 16:49:24");
INSERT INTO visitor_activity_logs VALUES("491","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 16:49:30");
INSERT INTO visitor_activity_logs VALUES("492","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 16:49:34");
INSERT INTO visitor_activity_logs VALUES("493","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 16:49:36");
INSERT INTO visitor_activity_logs VALUES("494","197.239.15.2","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_purchase.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 16:49:41");
INSERT INTO visitor_activity_logs VALUES("495","197.239.5.5","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 16:50:01");
INSERT INTO visitor_activity_logs VALUES("496","197.239.5.5","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 16:50:04");
INSERT INTO visitor_activity_logs VALUES("497","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 17:21:39");
INSERT INTO visitor_activity_logs VALUES("498","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 17:22:56");
INSERT INTO visitor_activity_logs VALUES("499","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 17:22:56");
INSERT INTO visitor_activity_logs VALUES("500","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 17:22:59");
INSERT INTO visitor_activity_logs VALUES("501","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 17:23:17");
INSERT INTO visitor_activity_logs VALUES("502","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 17:25:07");
INSERT INTO visitor_activity_logs VALUES("503","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=30purchase_id=30","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 17:25:07");
INSERT INTO visitor_activity_logs VALUES("504","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=30","2023-07-17 17:25:25");
INSERT INTO visitor_activity_logs VALUES("505","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=30purchase_id=30","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-17 17:25:32");
INSERT INTO visitor_activity_logs VALUES("506","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=30","2023-07-17 17:25:46");
INSERT INTO visitor_activity_logs VALUES("507","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-17 17:25:59");
INSERT INTO visitor_activity_logs VALUES("508","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_customer.php","http://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-17 17:26:20");
INSERT INTO visitor_activity_logs VALUES("509","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 17:26:24");
INSERT INTO visitor_activity_logs VALUES("510","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 17:26:48");
INSERT INTO visitor_activity_logs VALUES("511","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:13:17");
INSERT INTO visitor_activity_logs VALUES("512","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:13:18");
INSERT INTO visitor_activity_logs VALUES("513","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:13:40");
INSERT INTO visitor_activity_logs VALUES("514","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 18:13:49");
INSERT INTO visitor_activity_logs VALUES("515","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 18:13:55");
INSERT INTO visitor_activity_logs VALUES("516","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_customer.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:14:03");
INSERT INTO visitor_activity_logs VALUES("517","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 18:14:07");
INSERT INTO visitor_activity_logs VALUES("518","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 18:14:08");
INSERT INTO visitor_activity_logs VALUES("519","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 18:14:09");
INSERT INTO visitor_activity_logs VALUES("520","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 18:14:10");
INSERT INTO visitor_activity_logs VALUES("521","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_customer.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:14:13");
INSERT INTO visitor_activity_logs VALUES("522","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-17 18:14:16");
INSERT INTO visitor_activity_logs VALUES("523","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-17 18:14:23");
INSERT INTO visitor_activity_logs VALUES("524","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-17 18:14:30");
INSERT INTO visitor_activity_logs VALUES("525","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 18:14:33");
INSERT INTO visitor_activity_logs VALUES("526","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:14:37");
INSERT INTO visitor_activity_logs VALUES("527","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 18:15:04");
INSERT INTO visitor_activity_logs VALUES("528","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-17 18:16:51");
INSERT INTO visitor_activity_logs VALUES("529","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-17 18:17:22");
INSERT INTO visitor_activity_logs VALUES("530","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-17 18:17:29");
INSERT INTO visitor_activity_logs VALUES("531","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 18:17:47");
INSERT INTO visitor_activity_logs VALUES("532","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:17:57");
INSERT INTO visitor_activity_logs VALUES("533","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:20:18");
INSERT INTO visitor_activity_logs VALUES("534","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:20:18");
INSERT INTO visitor_activity_logs VALUES("535","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:21:14");
INSERT INTO visitor_activity_logs VALUES("536","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:21:14");
INSERT INTO visitor_activity_logs VALUES("537","41.210.141.95","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-17 18:22:06");
INSERT INTO visitor_activity_logs VALUES("538","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-17 18:22:11");
INSERT INTO visitor_activity_logs VALUES("539","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-17 18:22:14");
INSERT INTO visitor_activity_logs VALUES("540","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:23:41");
INSERT INTO visitor_activity_logs VALUES("541","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-17 18:23:49");
INSERT INTO visitor_activity_logs VALUES("542","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:24:53");
INSERT INTO visitor_activity_logs VALUES("543","41.210.141.95","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-17 18:24:54");
INSERT INTO visitor_activity_logs VALUES("544","104.28.227.116","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-18 05:45:40");
INSERT INTO visitor_activity_logs VALUES("545","102.85.135.234","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-18 15:01:05");
INSERT INTO visitor_activity_logs VALUES("546","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-18 15:10:37");
INSERT INTO visitor_activity_logs VALUES("547","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-18 15:12:09");
INSERT INTO visitor_activity_logs VALUES("548","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 15:13:05");
INSERT INTO visitor_activity_logs VALUES("549","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:13:08");
INSERT INTO visitor_activity_logs VALUES("550","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 15:13:14");
INSERT INTO visitor_activity_logs VALUES("551","102.85.135.234","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-18 15:21:09");
INSERT INTO visitor_activity_logs VALUES("552","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:28:13");
INSERT INTO visitor_activity_logs VALUES("553","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:28:14");
INSERT INTO visitor_activity_logs VALUES("554","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:34:34");
INSERT INTO visitor_activity_logs VALUES("555","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:34:34");
INSERT INTO visitor_activity_logs VALUES("556","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:38:18");
INSERT INTO visitor_activity_logs VALUES("557","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:38:19");
INSERT INTO visitor_activity_logs VALUES("558","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:43:00");
INSERT INTO visitor_activity_logs VALUES("559","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:43:00");
INSERT INTO visitor_activity_logs VALUES("560","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 15:43:35");
INSERT INTO visitor_activity_logs VALUES("561","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 15:43:48");
INSERT INTO visitor_activity_logs VALUES("562","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:01:05");
INSERT INTO visitor_activity_logs VALUES("563","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:01:06");
INSERT INTO visitor_activity_logs VALUES("564","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:02:10");
INSERT INTO visitor_activity_logs VALUES("565","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:02:11");
INSERT INTO visitor_activity_logs VALUES("566","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-18 16:03:13");
INSERT INTO visitor_activity_logs VALUES("567","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-18 16:03:55");
INSERT INTO visitor_activity_logs VALUES("568","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-18 16:03:58");
INSERT INTO visitor_activity_logs VALUES("569","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:04:09");
INSERT INTO visitor_activity_logs VALUES("570","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:04:13");
INSERT INTO visitor_activity_logs VALUES("571","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:04:16");
INSERT INTO visitor_activity_logs VALUES("572","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:04:17");
INSERT INTO visitor_activity_logs VALUES("573","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 16:04:37");
INSERT INTO visitor_activity_logs VALUES("574","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:06:11");
INSERT INTO visitor_activity_logs VALUES("575","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:06:12");
INSERT INTO visitor_activity_logs VALUES("576","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:08:05");
INSERT INTO visitor_activity_logs VALUES("577","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:08:05");
INSERT INTO visitor_activity_logs VALUES("578","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:15:31");
INSERT INTO visitor_activity_logs VALUES("579","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:15:31");
INSERT INTO visitor_activity_logs VALUES("580","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:18:58");
INSERT INTO visitor_activity_logs VALUES("581","41.75.170.80","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-18 16:22:51");
INSERT INTO visitor_activity_logs VALUES("582","41.75.170.80","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-18 16:23:39");
INSERT INTO visitor_activity_logs VALUES("583","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:26:47");
INSERT INTO visitor_activity_logs VALUES("584","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:26:51");
INSERT INTO visitor_activity_logs VALUES("585","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:26:53");
INSERT INTO visitor_activity_logs VALUES("586","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 16:27:16");
INSERT INTO visitor_activity_logs VALUES("587","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-18 16:27:27");
INSERT INTO visitor_activity_logs VALUES("588","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 16:27:42");
INSERT INTO visitor_activity_logs VALUES("589","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-18 16:28:07");
INSERT INTO visitor_activity_logs VALUES("590","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 16:28:11");
INSERT INTO visitor_activity_logs VALUES("591","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-18 16:35:55");
INSERT INTO visitor_activity_logs VALUES("592","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-18 16:36:04");
INSERT INTO visitor_activity_logs VALUES("593","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 16:36:19");
INSERT INTO visitor_activity_logs VALUES("594","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-18 16:36:39");
INSERT INTO visitor_activity_logs VALUES("595","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:36:49");
INSERT INTO visitor_activity_logs VALUES("596","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:36:53");
INSERT INTO visitor_activity_logs VALUES("597","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/purchase_invoice.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 16:37:24");
INSERT INTO visitor_activity_logs VALUES("598","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-18 16:38:18");
INSERT INTO visitor_activity_logs VALUES("599","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-18 16:38:21");
INSERT INTO visitor_activity_logs VALUES("600","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:38:32");
INSERT INTO visitor_activity_logs VALUES("601","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:41:25");
INSERT INTO visitor_activity_logs VALUES("602","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-18 16:41:38");
INSERT INTO visitor_activity_logs VALUES("603","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:41:46");
INSERT INTO visitor_activity_logs VALUES("604","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:41:51");
INSERT INTO visitor_activity_logs VALUES("605","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 16:42:38");
INSERT INTO visitor_activity_logs VALUES("606","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=156item_id=156","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-18 16:43:48");
INSERT INTO visitor_activity_logs VALUES("607","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=156item_id=156","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=156","2023-07-18 16:44:16");
INSERT INTO visitor_activity_logs VALUES("608","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/edit_item.php?item_id=156","2023-07-18 16:45:26");
INSERT INTO visitor_activity_logs VALUES("609","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:46:05");
INSERT INTO visitor_activity_logs VALUES("610","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-18 16:47:05");
INSERT INTO visitor_activity_logs VALUES("611","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-18 16:47:09");
INSERT INTO visitor_activity_logs VALUES("612","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:47:10");
INSERT INTO visitor_activity_logs VALUES("613","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-18 16:47:12");
INSERT INTO visitor_activity_logs VALUES("614","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:47:28");
INSERT INTO visitor_activity_logs VALUES("615","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:48:20");
INSERT INTO visitor_activity_logs VALUES("616","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:48:20");
INSERT INTO visitor_activity_logs VALUES("617","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:48:26");
INSERT INTO visitor_activity_logs VALUES("618","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 16:48:49");
INSERT INTO visitor_activity_logs VALUES("619","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-18 16:49:37");
INSERT INTO visitor_activity_logs VALUES("620","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-18 16:49:40");
INSERT INTO visitor_activity_logs VALUES("621","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:49:48");
INSERT INTO visitor_activity_logs VALUES("622","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:50:49");
INSERT INTO visitor_activity_logs VALUES("623","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:50:49");
INSERT INTO visitor_activity_logs VALUES("624","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:50:53");
INSERT INTO visitor_activity_logs VALUES("625","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 16:51:08");
INSERT INTO visitor_activity_logs VALUES("626","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:51:23");
INSERT INTO visitor_activity_logs VALUES("627","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:56:05");
INSERT INTO visitor_activity_logs VALUES("628","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:56:05");
INSERT INTO visitor_activity_logs VALUES("629","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 16:56:22");
INSERT INTO visitor_activity_logs VALUES("630","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 16:57:53");
INSERT INTO visitor_activity_logs VALUES("631","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-18 16:58:13");
INSERT INTO visitor_activity_logs VALUES("632","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_supplier.php","http://phones.mtlictsolutions.com/pages/add_supplier.php","2023-07-18 16:59:52");
INSERT INTO visitor_activity_logs VALUES("633","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_supplier.php","2023-07-18 16:59:56");
INSERT INTO visitor_activity_logs VALUES("634","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 17:00:13");
INSERT INTO visitor_activity_logs VALUES("635","104.28.195.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-18 18:00:49");
INSERT INTO visitor_activity_logs VALUES("636","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 18:08:14");
INSERT INTO visitor_activity_logs VALUES("637","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 18:08:15");
INSERT INTO visitor_activity_logs VALUES("638","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 18:08:26");
INSERT INTO visitor_activity_logs VALUES("639","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 18:08:29");
INSERT INTO visitor_activity_logs VALUES("640","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 18:08:31");
INSERT INTO visitor_activity_logs VALUES("641","41.210.155.115","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 18:08:34");
INSERT INTO visitor_activity_logs VALUES("642","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-18 18:08:40");
INSERT INTO visitor_activity_logs VALUES("643","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-18 18:08:47");
INSERT INTO visitor_activity_logs VALUES("644","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-18 18:08:55");
INSERT INTO visitor_activity_logs VALUES("645","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 18:09:01");
INSERT INTO visitor_activity_logs VALUES("646","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-18 18:09:10");
INSERT INTO visitor_activity_logs VALUES("647","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 18:14:22");
INSERT INTO visitor_activity_logs VALUES("648","41.210.155.115","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-18 18:14:22");
INSERT INTO visitor_activity_logs VALUES("649","104.28.195.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-18 18:47:49");
INSERT INTO visitor_activity_logs VALUES("650","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-19 09:56:42");
INSERT INTO visitor_activity_logs VALUES("651","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-19 10:01:26");
INSERT INTO visitor_activity_logs VALUES("652","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-19 10:05:16");
INSERT INTO visitor_activity_logs VALUES("653","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:10:03");
INSERT INTO visitor_activity_logs VALUES("654","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:10:03");
INSERT INTO visitor_activity_logs VALUES("655","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:17:41");
INSERT INTO visitor_activity_logs VALUES("656","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:17:42");
INSERT INTO visitor_activity_logs VALUES("657","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:27:52");
INSERT INTO visitor_activity_logs VALUES("658","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:27:52");
INSERT INTO visitor_activity_logs VALUES("659","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:33:19");
INSERT INTO visitor_activity_logs VALUES("660","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:33:19");
INSERT INTO visitor_activity_logs VALUES("661","41.210.147.192","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-19 10:40:17");
INSERT INTO visitor_activity_logs VALUES("662","41.210.147.192","admin","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-19 10:40:17");
INSERT INTO visitor_activity_logs VALUES("663","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:44:56");
INSERT INTO visitor_activity_logs VALUES("664","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:44:56");
INSERT INTO visitor_activity_logs VALUES("665","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:57:01");
INSERT INTO visitor_activity_logs VALUES("666","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 10:57:01");
INSERT INTO visitor_activity_logs VALUES("667","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 11:02:26");
INSERT INTO visitor_activity_logs VALUES("668","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 11:02:27");
INSERT INTO visitor_activity_logs VALUES("669","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 11:07:31");
INSERT INTO visitor_activity_logs VALUES("670","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 11:07:32");
INSERT INTO visitor_activity_logs VALUES("671","145.239.197.22","","Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-19 11:29:46");
INSERT INTO visitor_activity_logs VALUES("672","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-19 11:32:36");
INSERT INTO visitor_activity_logs VALUES("673","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-19 11:46:52");
INSERT INTO visitor_activity_logs VALUES("674","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-19 11:47:06");
INSERT INTO visitor_activity_logs VALUES("675","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 11:51:16");
INSERT INTO visitor_activity_logs VALUES("676","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 11:51:16");
INSERT INTO visitor_activity_logs VALUES("677","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 11:59:31");
INSERT INTO visitor_activity_logs VALUES("678","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 11:59:31");
INSERT INTO visitor_activity_logs VALUES("679","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:02:04");
INSERT INTO visitor_activity_logs VALUES("680","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:02:04");
INSERT INTO visitor_activity_logs VALUES("681","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:16:56");
INSERT INTO visitor_activity_logs VALUES("682","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:16:56");
INSERT INTO visitor_activity_logs VALUES("683","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:20:56");
INSERT INTO visitor_activity_logs VALUES("684","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:20:57");
INSERT INTO visitor_activity_logs VALUES("685","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:25:52");
INSERT INTO visitor_activity_logs VALUES("686","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:25:53");
INSERT INTO visitor_activity_logs VALUES("687","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:29:39");
INSERT INTO visitor_activity_logs VALUES("688","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:29:40");
INSERT INTO visitor_activity_logs VALUES("689","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:30:34");
INSERT INTO visitor_activity_logs VALUES("690","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:30:35");
INSERT INTO visitor_activity_logs VALUES("691","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:30:48");
INSERT INTO visitor_activity_logs VALUES("692","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-19 12:30:56");
INSERT INTO visitor_activity_logs VALUES("693","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:34:56");
INSERT INTO visitor_activity_logs VALUES("694","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:34:56");
INSERT INTO visitor_activity_logs VALUES("695","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:37:57");
INSERT INTO visitor_activity_logs VALUES("696","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:37:58");
INSERT INTO visitor_activity_logs VALUES("697","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:42:59");
INSERT INTO visitor_activity_logs VALUES("698","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:43:00");
INSERT INTO visitor_activity_logs VALUES("699","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:48:14");
INSERT INTO visitor_activity_logs VALUES("700","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:48:15");
INSERT INTO visitor_activity_logs VALUES("701","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:48:43");
INSERT INTO visitor_activity_logs VALUES("702","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-19 12:49:05");
INSERT INTO visitor_activity_logs VALUES("703","41.210.155.219","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-19 12:52:19");
INSERT INTO visitor_activity_logs VALUES("704","41.210.155.219","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-19 12:53:08");
INSERT INTO visitor_activity_logs VALUES("705","41.210.155.219","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-19 12:54:22");
INSERT INTO visitor_activity_logs VALUES("706","41.210.155.219","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-19 12:55:23");
INSERT INTO visitor_activity_logs VALUES("707","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-19 12:55:28");
INSERT INTO visitor_activity_logs VALUES("708","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-19 12:55:50");
INSERT INTO visitor_activity_logs VALUES("709","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:57:40");
INSERT INTO visitor_activity_logs VALUES("710","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:57:41");
INSERT INTO visitor_activity_logs VALUES("711","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:58:52");
INSERT INTO visitor_activity_logs VALUES("712","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:58:52");
INSERT INTO visitor_activity_logs VALUES("713","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:59:50");
INSERT INTO visitor_activity_logs VALUES("714","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 12:59:50");
INSERT INTO visitor_activity_logs VALUES("715","41.210.155.219","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-19 13:00:26");
INSERT INTO visitor_activity_logs VALUES("716","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-19 13:00:29");
INSERT INTO visitor_activity_logs VALUES("717","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-19 13:00:37");
INSERT INTO visitor_activity_logs VALUES("718","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 13:04:51");
INSERT INTO visitor_activity_logs VALUES("719","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 13:04:52");
INSERT INTO visitor_activity_logs VALUES("720","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 13:05:09");
INSERT INTO visitor_activity_logs VALUES("721","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 13:05:12");
INSERT INTO visitor_activity_logs VALUES("722","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-19 13:08:58");
INSERT INTO visitor_activity_logs VALUES("723","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-19 13:09:12");
INSERT INTO visitor_activity_logs VALUES("724","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 13:09:18");
INSERT INTO visitor_activity_logs VALUES("725","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-19 13:10:34");
INSERT INTO visitor_activity_logs VALUES("726","41.210.147.192","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-19 13:59:00");
INSERT INTO visitor_activity_logs VALUES("727","41.210.147.192","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/profit_loss_report.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-19 14:02:54");
INSERT INTO visitor_activity_logs VALUES("728","41.210.147.192","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/profit_loss_report.php","https://phones.mtlictsolutions.com/pages/profit_loss_report.php","2023-07-19 14:03:02");
INSERT INTO visitor_activity_logs VALUES("729","41.210.147.192","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/profit_loss_report.php","https://phones.mtlictsolutions.com/pages/profit_loss_report.php","2023-07-19 14:03:44");
INSERT INTO visitor_activity_logs VALUES("730","41.210.147.192","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/profit_loss_report.php","2023-07-19 14:05:24");
INSERT INTO visitor_activity_logs VALUES("731","41.210.147.192","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/purchase_report.php","https://phones.mtlictsolutions.com/pages/purchase_report.php","2023-07-19 14:05:35");
INSERT INTO visitor_activity_logs VALUES("732","41.210.155.219","","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_sales.php","/","2023-07-19 18:16:40");
INSERT INTO visitor_activity_logs VALUES("733","41.210.155.219","","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-19 18:16:47");
INSERT INTO visitor_activity_logs VALUES("734","41.210.155.219","admin","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-19 18:16:53");
INSERT INTO visitor_activity_logs VALUES("735","41.210.155.219","admin","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_sales.php","/","2023-07-19 18:22:25");
INSERT INTO visitor_activity_logs VALUES("736","41.210.155.219","admin","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-19 18:23:49");
INSERT INTO visitor_activity_logs VALUES("737","41.210.155.219","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","/","2023-07-19 18:33:03");
INSERT INTO visitor_activity_logs VALUES("738","41.210.155.219","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-19 18:33:09");
INSERT INTO visitor_activity_logs VALUES("739","41.210.155.219","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-19 18:33:16");
INSERT INTO visitor_activity_logs VALUES("740","18.223.203.37","","Mozilla/5.0 (Macintosh; Intel Mac OS X 11_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","/","2023-07-19 20:47:29");
INSERT INTO visitor_activity_logs VALUES("741","102.85.147.73","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-20 04:32:24");
INSERT INTO visitor_activity_logs VALUES("742","102.85.147.73","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-20 04:32:51");
INSERT INTO visitor_activity_logs VALUES("743","41.75.182.207","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-20 04:56:25");
INSERT INTO visitor_activity_logs VALUES("744","41.75.182.207","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-20 05:01:15");
INSERT INTO visitor_activity_logs VALUES("745","41.75.182.207","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-20 05:04:16");
INSERT INTO visitor_activity_logs VALUES("746","41.75.182.207","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-20 05:04:19");
INSERT INTO visitor_activity_logs VALUES("747","41.75.182.207","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 05:04:21");
INSERT INTO visitor_activity_logs VALUES("748","197.239.5.47","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-20 05:09:15");
INSERT INTO visitor_activity_logs VALUES("749","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-20 17:03:30");
INSERT INTO visitor_activity_logs VALUES("750","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-20 17:03:55");
INSERT INTO visitor_activity_logs VALUES("751","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-20 17:04:18");
INSERT INTO visitor_activity_logs VALUES("752","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:14:12");
INSERT INTO visitor_activity_logs VALUES("753","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:14:13");
INSERT INTO visitor_activity_logs VALUES("754","41.210.155.98","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-20 17:14:57");
INSERT INTO visitor_activity_logs VALUES("755","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-20 17:15:00");
INSERT INTO visitor_activity_logs VALUES("756","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-20 17:15:06");
INSERT INTO visitor_activity_logs VALUES("757","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:23:41");
INSERT INTO visitor_activity_logs VALUES("758","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:23:41");
INSERT INTO visitor_activity_logs VALUES("759","41.210.155.98","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-20 17:24:42");
INSERT INTO visitor_activity_logs VALUES("760","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-20 17:24:49");
INSERT INTO visitor_activity_logs VALUES("761","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-20 17:24:55");
INSERT INTO visitor_activity_logs VALUES("762","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:33:59");
INSERT INTO visitor_activity_logs VALUES("763","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:34:00");
INSERT INTO visitor_activity_logs VALUES("764","41.75.171.123","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-20 17:41:53");
INSERT INTO visitor_activity_logs VALUES("765","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:41:59");
INSERT INTO visitor_activity_logs VALUES("766","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:41:59");
INSERT INTO visitor_activity_logs VALUES("767","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:42:26");
INSERT INTO visitor_activity_logs VALUES("768","41.210.155.98","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-20 17:42:34");
INSERT INTO visitor_activity_logs VALUES("769","104.28.227.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-21 06:27:19");
INSERT INTO visitor_activity_logs VALUES("770","104.28.227.114","admin","Mozilla/5.0 (iPhone; CPU iPhone OS 16_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Mobile/15E148 Safari/604.1","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-21 06:27:21");
INSERT INTO visitor_activity_logs VALUES("771","197.239.9.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-21 07:51:19");
INSERT INTO visitor_activity_logs VALUES("772","197.239.9.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-21 07:54:52");
INSERT INTO visitor_activity_logs VALUES("773","197.239.9.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_stock.php","https://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-21 07:54:55");
INSERT INTO visitor_activity_logs VALUES("774","197.239.9.71","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 07:54:58");
INSERT INTO visitor_activity_logs VALUES("775","197.239.13.75","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_staff.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-21 08:08:06");
INSERT INTO visitor_activity_logs VALUES("776","197.239.13.75","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-21 08:16:31");
INSERT INTO visitor_activity_logs VALUES("777","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-21 15:44:59");
INSERT INTO visitor_activity_logs VALUES("778","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/index.php","2023-07-21 15:45:11");
INSERT INTO visitor_activity_logs VALUES("779","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-21 15:45:24");
INSERT INTO visitor_activity_logs VALUES("780","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:45:28");
INSERT INTO visitor_activity_logs VALUES("781","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-21 15:45:58");
INSERT INTO visitor_activity_logs VALUES("782","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_edit_purchases.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-21 15:47:01");
INSERT INTO visitor_activity_logs VALUES("783","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=94purchase_id=94","http://phones.mtlictsolutions.com/pages/edit_purchase.php","2023-07-21 15:47:02");
INSERT INTO visitor_activity_logs VALUES("784","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/edit_purchase.php?purchase_id=94","2023-07-21 15:47:10");
INSERT INTO visitor_activity_logs VALUES("785","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-21 15:47:21");
INSERT INTO visitor_activity_logs VALUES("786","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-21 15:47:33");
INSERT INTO visitor_activity_logs VALUES("787","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:48:05");
INSERT INTO visitor_activity_logs VALUES("788","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","2023-07-21 15:49:30");
INSERT INTO visitor_activity_logs VALUES("789","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:50:47");
INSERT INTO visitor_activity_logs VALUES("790","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:50:47");
INSERT INTO visitor_activity_logs VALUES("791","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:52:52");
INSERT INTO visitor_activity_logs VALUES("792","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:52:53");
INSERT INTO visitor_activity_logs VALUES("793","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:54:28");
INSERT INTO visitor_activity_logs VALUES("794","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:54:28");
INSERT INTO visitor_activity_logs VALUES("795","41.210.154.90","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_add_item.php","http://phones.mtlictsolutions.com/pages/add_item.php","2023-07-21 15:56:23");
INSERT INTO visitor_activity_logs VALUES("796","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/select_supplier.php","http://phones.mtlictsolutions.com/pages/save_add_item.php","2023-07-21 15:56:27");
INSERT INTO visitor_activity_logs VALUES("797","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/select_supplier.php","2023-07-21 15:56:44");
INSERT INTO visitor_activity_logs VALUES("798","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/save_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:58:02");
INSERT INTO visitor_activity_logs VALUES("799","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/add_stock.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:58:03");
INSERT INTO visitor_activity_logs VALUES("800","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36","http://phones.mtlictsolutions.com/pages/supplier_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_stock.php","2023-07-21 15:58:06");
INSERT INTO visitor_activity_logs VALUES("801","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/index.php","http://phones.mtlictsolutions.com/pages/login.php","2023-07-21 17:36:49");
INSERT INTO visitor_activity_logs VALUES("802","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/edit_phone.php?phone_id=200phone_id=200","http://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-21 17:38:56");
INSERT INTO visitor_activity_logs VALUES("803","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/edit_phone.php?phone_id=200phone_id=200","http://phones.mtlictsolutions.com/pages/edit_phone.php?phone_id=200","2023-07-21 17:39:28");
INSERT INTO visitor_activity_logs VALUES("804","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/view_item_details.php?phone_id=200phone_id=200","http://phones.mtlictsolutions.com/pages/edit_phone.php?phone_id=200","2023-07-21 17:39:46");
INSERT INTO visitor_activity_logs VALUES("805","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/edit_phone.php?phone_id=200phone_id=200","http://phones.mtlictsolutions.com/pages/edit_phone.php?phone_id=200","2023-07-21 17:40:18");
INSERT INTO visitor_activity_logs VALUES("806","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/select_customer.php","http://phones.mtlictsolutions.com/pages/edit_phone.php?phone_id=200","2023-07-21 17:40:42");
INSERT INTO visitor_activity_logs VALUES("807","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_sales.php","http://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-21 17:40:55");
INSERT INTO visitor_activity_logs VALUES("808","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/save_sales.php","http://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-21 17:44:22");
INSERT INTO visitor_activity_logs VALUES("809","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/add_sales.php","http://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-21 17:44:22");
INSERT INTO visitor_activity_logs VALUES("810","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/customer_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-21 17:44:33");
INSERT INTO visitor_activity_logs VALUES("811","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/customer_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-21 17:45:16");
INSERT INTO visitor_activity_logs VALUES("812","41.210.154.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82","http://phones.mtlictsolutions.com/pages/customer_transaction_history.php","http://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-21 17:45:45");
INSERT INTO visitor_activity_logs VALUES("813","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-21 21:09:49");
INSERT INTO visitor_activity_logs VALUES("814","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-21 21:11:10");
INSERT INTO visitor_activity_logs VALUES("815","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-21 21:11:31");
INSERT INTO visitor_activity_logs VALUES("816","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/edit_profile.php","https://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-21 21:11:37");
INSERT INTO visitor_activity_logs VALUES("817","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/edit_profile.php","2023-07-21 21:11:44");
INSERT INTO visitor_activity_logs VALUES("818","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/edit_profile.php","2023-07-21 21:11:58");
INSERT INTO visitor_activity_logs VALUES("819","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/add_sales.php","https://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-21 21:12:01");
INSERT INTO visitor_activity_logs VALUES("820","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/customer_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-21 21:12:05");
INSERT INTO visitor_activity_logs VALUES("821","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/customer_transaction_history.php","https://phones.mtlictsolutions.com/pages/add_sales.php","2023-07-21 21:13:52");
INSERT INTO visitor_activity_logs VALUES("822","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_customer.php","https://phones.mtlictsolutions.com/pages/edit_profile.php","2023-07-21 21:13:59");
INSERT INTO visitor_activity_logs VALUES("823","197.239.6.176","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/select_customer.php","2023-07-21 21:14:01");
INSERT INTO visitor_activity_logs VALUES("824","197.239.10.39","","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-21 23:50:11");
INSERT INTO visitor_activity_logs VALUES("825","197.239.10.39","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php?msg=Please%20login%20to%20access%20admin%20area%20!","2023-07-21 23:50:24");
INSERT INTO visitor_activity_logs VALUES("826","197.239.10.39","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/select_supplier.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-21 23:50:33");
INSERT INTO visitor_activity_logs VALUES("827","197.239.10.39","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/view_item_details.php?phone_id=200phone_id=200","https://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-21 23:52:40");
INSERT INTO visitor_activity_logs VALUES("828","102.85.178.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/view_item_details.php?phone_id=200phone_id=200","https://phones.mtlictsolutions.com/pages/add_new_phone.php","2023-07-21 23:54:18");
INSERT INTO visitor_activity_logs VALUES("829","102.85.178.90","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/view_item_details.php?phone_id=200","2023-07-21 23:55:53");
INSERT INTO visitor_activity_logs VALUES("830","102.85.200.162","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/login.php","2023-07-22 09:43:38");
INSERT INTO visitor_activity_logs VALUES("831","102.85.200.162","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:44:00");
INSERT INTO visitor_activity_logs VALUES("832","102.85.200.162","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:44:53");
INSERT INTO visitor_activity_logs VALUES("833","102.85.200.162","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:46:41");
INSERT INTO visitor_activity_logs VALUES("834","102.85.231.117","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:49:08");
INSERT INTO visitor_activity_logs VALUES("835","102.85.231.117","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:49:21");
INSERT INTO visitor_activity_logs VALUES("836","102.85.231.117","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:49:59");
INSERT INTO visitor_activity_logs VALUES("837","102.85.231.117","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:50:35");
INSERT INTO visitor_activity_logs VALUES("838","102.85.231.117","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:52:10");
INSERT INTO visitor_activity_logs VALUES("839","102.85.231.117","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:53:20");
INSERT INTO visitor_activity_logs VALUES("840","102.85.231.117","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:53:56");
INSERT INTO visitor_activity_logs VALUES("841","102.85.231.117","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:54:20");
INSERT INTO visitor_activity_logs VALUES("842","102.85.231.117","admin","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","https://phones.mtlictsolutions.com/pages/index.php","https://phones.mtlictsolutions.com/pages/index.php","2023-07-22 09:55:05");


