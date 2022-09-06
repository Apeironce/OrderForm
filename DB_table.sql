CREATE DATABASE MyBD;

CREATE TABLE `Orders_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ph_number` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `agreement` varchar(100),
  `amount_water` varchar(20) NOT NULL,
  `tare_quantity` varchar(20) NOT NULL,
  `comment` varchar(300)
) ENGINE=InnoDB;
