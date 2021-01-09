<?php
$servername = "RPPS_mariadb10";
$username = "root";
$dbpassword = getenv('Passwd_Pizza_Team_DB');
$dbname = "RPPS";
$sanitized = array_map('strtolower', $_POST);
$sanitized = str_replace(';', 'CHAR NOT ALLOWED', $sanitized);
$sanitized = str_replace('<', 'CHAR NOT ALLOWED', $sanitized);
$sanitized = str_replace('>', 'CHAR NOT ALLOWED', $sanitized);
$sanitized = str_replace('#', 'CHAR NOT ALLOWED', $sanitized);
$sanitized = str_replace('%', 'CHAR NOT ALLOWED', $sanitized);
$sanitized = str_replace('\'', 'CHAR NOT ALLOWED', $sanitized);
$sanitized = str_replace('@', 'CHAR NOT ALLOWED', $sanitized);
$sanitized = str_replace('*', 'CHAR NOT ALLOWED', $sanitized);
$sanitized = str_replace('delete', 'NICE TRY', $sanitized);
$sanitized = str_replace('drop', 'NICE TRY', $sanitized);
$sanitized = str_replace('select', 'NICE TRY', $sanitized);
$sanitized = str_replace('create', 'NICE TRY', $sanitized);
$sanitized = str_replace('insert', 'NICE TRY', $sanitized);
$sanitized = array_map ( 'htmlspecialchars' , $sanitized );

// Create connection
$dsn = 'mysql:dbname='.$dbname.';host='.$servername.';port=3306;charset=utf8';
$conn = new PDO($dsn, $username, $dbpassword);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

try {
$query = $conn->prepare("
CREATE DATABASE IF NOT EXISTS RPPS;
USE RPPS;
CREATE TABLE IF NOT EXISTS `RPPS`.`TASK` ( 
  `TASK_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `round` INT NOT NULL ,
  `subject` VARCHAR(255) NOT NULL ,
  `message` TEXT NOT NULL ,
  `sender` ENUM('service','kitchen','driver') NOT NULL ,
  `receiver` ENUM('service','kitchen','driver') NOT NULL , `status` ENUM('new','progress','waiting','done') NOT NULL , `timestamp` TIMESTAMP  NOT NULL DEFAULT NOW() , `history` TEXT NOT NULL, PRIMARY KEY (`TASK_ID`)) ENGINE = InnoDB AUTO_INCREMENT=9365463;
CREATE TABLE IF NOT EXISTS `RPPS`.`ORDER_TEMPLATE` (
  `ORDER_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer` VARCHAR(255) NOT NULL ,
  `adress` TEXT NOT NULL ,
  `order` TEXT NOT NULL ,
  `area` TINYINT(1) ,
  `price` DECIMAL(13,2) NOT NULL ,
  `weight` INT NOT NULL ,
  PRIMARY KEY (`ORDER_ID`)) ENGINE = InnoDB AUTO_INCREMENT=601;
CREATE TABLE IF NOT EXISTS `RPPS`.`CUSTOMER` (
`CUSTOMER_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
 `name` VARCHAR(255) NOT NULL ,
 `adress` TEXT NOT NULL ,
 `order` TEXT NOT NULL ,
 `wine` TINYINT(1) ,
 PRIMARY KEY (`CUSTOMER_ID`)) ENGINE = InnoDB AUTO_INCREMENT=765;
CREATE TABLE IF NOT EXISTS `RPPS`.`MENU` (
`MENU_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
 `type` ENUM('Pizza','Pasta','Basic','Extra') NOT NULL ,
 `name` VARCHAR(255) NOT NULL ,
 `ingredients` TEXT NOT NULL ,
  `price` DECIMAL(13,2) NOT NULL ,
  `weight` INT NOT NULL ,
 PRIMARY KEY (`MENU_ID`)) ENGINE = InnoDB AUTO_INCREMENT=6730;
INSERT IGNORE INTO `CUSTOMER` (`CUSTOMER_ID`, `name`, `adress`, `order`, `wine`) VALUES
(765, 'Isabella', 'via di Sopra via Milano', '2 X Pizza Margherita & Pasta Aglio & Olio', 1),
(766, 'Marco', 'via di Cantieri via Venecia', '2 X Pasta Pesto & 1 X Pasta Aglio & Olio', 0),
(767, 'Matteo', 'via dei Giubbonari Mercato  Generale', '1 X Pizza Margherita With Extra Pepperoni 2 X Pizza Regina With Extra Pepperoni 1 X Pizza Mista And 1 X Pasta Tonno', 1),
(768, 'Sabrina', 'via Tonezza via Venecia', '1 X Pizza Margherita With Extra Basil 1 X Pizza Regina With Extra Garlic 1 X Pizza Diavolo With Extra Basil And 1 X Pasta Funghi', 0),
(769, 'Alessio', 'via di Sopra via del Babuino', '3 X Pizza Hawaii', 0),
(770, 'Bianca', 'via Romeo via Milano', '1 X Pizza Diavolo With Extra Basil And 1 X Pasta Tonno 2 X Pasta Funghi', 1),
(771, 'Juana', 'via Romeo via dei Cestari', '1 X Pasta Aglio & Olio And 2 X Pasta Pesto With 1 X Extra Basil', 0),
(772, 'Nino', 'via del Babuino via Tonezza', '1 X Pizza Pizza Prosciutto With Extra Peperoni 1 X Pizza Regina With Extra Basil And 1 X Pasta Pesto', 2),
(773, 'Ottavio', 'via Alberta via Sistina', '1 X Pizza Salami With Extra Pepperoni And 2 X Pasta Pesto', 1);

INSERT IGNORE INTO `MENU` (`MENU_ID`, `type`, `name`, `ingredients`, `price`, `weight`) VALUES
(6730, 'Pizza', ' Margerita', 'Dough Tomatoes Mozzarella  Basil ', '5.99', 380),
(6731, 'Pizza', ' Proscuitto', 'Dough Tomatoes Mozzarella  Cooked Ham ', '7.99', 415),
(6732, 'Pizza', ' Salami', 'Dough Tomatoes Mozzarella  Salami', '7.99', 425),
(6733, 'Pizza', ' Funghi', 'Dough Tomatoes Mozzarella  Mushrooms ', '7.99', 435),
(6734, 'Pizza', ' Papa', 'Dough Tomatoes Mozzarella Tuna Onions  Garlic', '12.99', 453),
(6735, 'Pizza', ' Diavolo', 'Dough Tomatoes Mozzarella Salami Peppers  Hot Peppers', '12.99', 460),
(6736, 'Pizza', ' Regina', 'Dough Tomatoes Mozzarella Cooked Ham  Mushrooms', '9.99', 480),
(6737, 'Pizza', ' Mista', 'Dough Tomatoes Mozzarella Salami Cooked Ham  Mushrooms ', '10.99', 535),
(6738, 'Pizza', ' Hawaii', 'Dough Tomatoes Mozzarella Cooked Ham  Pineapple', '10.99', 443),
(6739, 'Pizza', ' Tonno', 'Dough Tomatoes Mozzarella Tuna  Onions ', '10.99', 431),
(6740, 'Pizza', ' Grandiosa', 'Dough Tomatoes Mozzarella Cooked Ham Salami Mushrooms Peppers Artichokes  Onions ', '15.99', 617),
(6741, 'Pizza', ' Pesto', 'Dough Tomatoes Mozzarella Pesto', '6.99', 377),
(6742, 'Pasta', 'Aglio & Olio', 'Pasta Basil  Garlic', '7.40', 232),
(6743, 'Pasta', 'Tonno ', 'Pasta Tuna  Onions', '11.40', 261),
(6744, 'Pasta', 'Funghi', 'Pasta Mushrooms  Basil', '7.70', 275),
(6745, 'Pasta', 'Pesto ', 'Pasta  Pesto', '7.10', 217),
(6746, 'Basic', 'Dough', '', '0', 250),
(6747, 'Basic', 'Pasta', '', '0', 200),
(6748, 'Extra', 'Tomatoes', '', '1.20', 70),
(6749, 'Extra', 'Mozzarella', '', '2.20', 50),
(6750, 'Extra', 'Basil', '', '.90', 10),
(6751, 'Extra', 'Cooked Ham', '', '2.20', 45),
(6752, 'Extra', 'Salami', '', '2.10', 55),
(6753, 'Extra', 'Mushrooms', '', '1.40', 65),
(6754, 'Extra', 'Peppers ', '', '1.60', 25),
(6755, 'Extra', 'Hot Peppers', '', '1.50', 10),
(6756, 'Extra', 'Artichokes', '', '1.90', 30),
(6757, 'Extra', 'Onions', '', '1.10', 27),
(6758, 'Extra', 'Pineapple', '', '1.80', 28),
(6759, 'Extra', 'Tuna', '', '2.70', 34),
(6760, 'Extra', 'Pesto', '', '2.60', 17),
(6761, 'Extra', 'Garlic', '', '1.10', 22);

INSERT IGNORE INTO `ORDER_TEMPLATE` (`ORDER_ID`, `customer`, `adress`, `order`, `area`, `price`, `weight`) VALUES
(601, 'Andrea', 'via dei Giubbonari Ecke via dei Cestari ', '1 x Pizza Grandiosa with extra Ananas ', 1, '0.00', 0),
(602, 'Isabella', '', 'the usual ', 0, '0.00', 0),
(603, 'Fausto', 'via del Boschetto Ecke via di Sotto ', '2 x Pizza Salami, 1 x Pizza Funghi and 1 x Pasta Tonno ', 1, '0.00', 0),
(604, 'Gabriella', 'via di Campo Marzio Ecke via di Cantieri ', '1 x Pizza Funghi with extra Mozarella ', 1, '0.00', 0),
(605, 'Marco', '', 'like always', 1, '0.00', 0),
(606, 'Oriella', 'via dei Delfini Ecke via Milano ', '1 x Pasta Funghi & 2 x Pasta Tonno ', 1, '0.00', 0),
(607, 'Paolo', 'Piazza Verdi Ecke via del la statione ', 'Pasta Pesto, Pasta Tonno & Pasta Aglio & Olio', 1, '0.00', 0),
(608, 'Raffaello', 'via dei Giubbonari Ecke via del la statione ', '2 x Pizza Hawaii, 1 x Pizza Regina and 1 x Pasta Tonno', 0, '0.00', 0),
(609, 'Toni', 'via dei Delfini Ecke via Roma ', '2 x Pizza Salami, 1 x Pizza Funghi and 1 x Pasta Tonno ', 1, '0.00', 0),
(610, 'Claudio', 'via Marmorata Ecke via Tonezza', '1 x Pizza Mista with extra Mozarella ', 1, '0.00', 0),
(611, 'Matteo', '', 'the same again ', 1, '0.00', 0),
(612, 'Gina', 'via del Babuino Ecke via di Cantieri', '2 x Pizza Papa with extra Garlic ', 1, '0.00', 0),
(613, 'Gianni', 'via dei Cestari Ecke via Venecia ', '1 x Pasta Tonno & 2 x Pasta Pesto', 1, '0.00', 0),
(614, 'Emilio', 'via di Sotto Ecke via Milano ', '4 x Pizza Grandiosa davon 2 with extra Garlic ', 1, '0.00', 0),
(615, 'Alessandra', 'via Giulia Ecke via Giove ', '1 x Pizza Regina with extra Garlic and 1 x Pasta Aglio & Olio ', 1, '0.00', 0),
(616, 'Juana', '', 'like last time ', 1, '0.00', 0),
(617, 'Nino', '', 'you know what i want!', 1, '0.00', 0),
(618, 'Ottavio', 'via Alberta Ecke via Sistina ', '2 x Pizza Salami with extra Peperoni and 2 x Pasta Pesto ', 1, '0.00', 0),
(619, 'Dino', 'via Marmorata Ecke via Roma ', '2 x Pizza Funghi & Pizza Grandiosa aber vegetarisch !! (nicht vegan) ', 1, '0.00', 0),
(620, 'Gino', 'Piazza Dante Ecke via Bella Elena ', '2 x Pizza Tonno with extra Garlic ', 1, '0.00', 0);

  
  
  ");
$query->execute();
}
catch (PDOException $e) {
  $error=$e->getMessage();
}
?>