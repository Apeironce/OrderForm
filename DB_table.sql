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



INSERT INTO Orders_tbl(name, email, ph_number, city, address, agreement, amount_water, tare_quantity, comment) VALUES
("Иванов А Н", "ivanovan@gmail.com", "88005553535", "Саратов", "Ул А, Д2", NULL, "33", "22", NULL),
("Красный Октябрь", "krokt@gmail.com", "88005553535", "Саратов", "Ул А, Д2", 5353533, "33", "22", NULL),
("Попов П К", "popovpk@gmail.com", "88005553535", "Саратов", "Ул А, Д2", NULL, "33", "22", "Звонок не работает"),
("Lindt", "lindt@gmail.com", "88005553535", "Саратов", "Ул А, Д2", 2423424, "33", "22", NULL),
("Морозов А Т", "morozovat@gmail.com", "88005553535", "Саратов", "Ул А, Д2", NULL, "33", "22", NULL),
("FACEIT", "faceit@gmail.com", "88005553535", "Саратов", "Ул А, Д2", 252352352, "33", "22", NULL),
("Морозова Т А", "morozovat@gmail.com", "88005553535", "Саратов", "Ул А, Д2", NULL, "33", "22", "Постучать")
