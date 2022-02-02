<?php
$servername = "RPPS_mariadb10";
$username = "root";
$dbpassword = getenv('Passwd_Pizza_Team_DB');
$Number_Pizza_Team = getenv('Number_Pizza_Team');
$Number_Pizza_Team = str_pad($Number_Pizza_Team, 4, '0', STR_PAD_LEFT);
$dbname = "RPPS".$Number_Pizza_Team;
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
CREATE DATABASE IF NOT EXISTS ".$dbname.";
USE ".$dbname.";
CREATE TABLE IF NOT EXISTS `".$dbname."`.`TASK` ( 
  `TASK_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `round` INT NOT NULL ,
  `subject` VARCHAR(255) NOT NULL ,
  `message` TEXT NOT NULL ,
  `sender` ENUM('service','kitchen','delivery') NOT NULL ,
  `receiver` ENUM('service','kitchen','delivery') NOT NULL ,
  `status` ENUM('new','progress','waiting','done') NOT NULL ,
  `timestamp` TIMESTAMP  NOT NULL DEFAULT NOW() ,
  `history` TEXT NOT NULL, PRIMARY KEY (`TASK_ID`)) ENGINE = InnoDB AUTO_INCREMENT=9365463;

CREATE TABLE IF NOT EXISTS `".$dbname."`.`ORDER_TEMPLATE` (
  `ORDER_TEMP_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer` VARCHAR(255) NOT NULL ,
  `adress` TEXT NOT NULL ,
  `order` TEXT NOT NULL ,
  `hidden` TINYINT(1) ,
  `area` TINYINT(1) ,
  `price` DECIMAL(13,2) NOT NULL ,
  `weight` INT NOT NULL ,
  PRIMARY KEY (`ORDER_TEMP_ID`)) ENGINE = InnoDB AUTO_INCREMENT=601;
  
CREATE TABLE IF NOT EXISTS `".$dbname."`.`ORDER` (
  `ORDER_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ORDER_TEMP_ID` INT UNSIGNED NOT NULL,
  `round` INT,
  `timestamp_in` TIMESTAMP  NOT NULL DEFAULT NOW() ,
  `timestamp_out` TIMESTAMP ,
  `wine` TINYINT(1) ,
  `area` TINYINT(1) ,
  `price` DECIMAL(13,2) ,
  `weight` INT ,
  PRIMARY KEY (`ORDER_ID`)) ENGINE = InnoDB AUTO_INCREMENT=2653;
  
CREATE TABLE IF NOT EXISTS `".$dbname."`.`MENU` (
`MENU_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
 `type` ENUM('Pizza','Pasta','Basic','Extra') NOT NULL ,
 `name` VARCHAR(255) NOT NULL ,
 `ingredients` TEXT NOT NULL ,
 `price` DECIMAL(13,2) NOT NULL ,
 `weight` INT NOT NULL ,
 `img` VARCHAR(255) NOT NULL ,
 PRIMARY KEY (`MENU_ID`)) ENGINE = InnoDB AUTO_INCREMENT=6730;

INSERT IGNORE INTO `MENU` (`MENU_ID`, `type`, `name`, `ingredients`, `price`, `weight`, `img`) VALUES
(6730, 'Pizza', ' Margerita -1', 'Dough Tomatoes Mozzarella  Basil ', '5.99', 380, '/images/pizza-1.jpg'),
(6731, 'Pizza', ' Proscuitto -2', 'Dough Tomatoes Mozzarella  Cooked Ham ', '7.99', 415, '/images/pizza-2.jpg'),
(6732, 'Pizza', ' Salami -3 ', 'Dough Tomatoes Mozzarella  Salami', '7.99', 425, '/images/pizza-3.jpg'),
(6733, 'Pizza', ' Funghi -4 ', 'Dough Tomatoes Mozzarella  Mushrooms ', '7.99', 435, '/images/pizza-4.jpg'),
(6734, 'Pizza', ' Papa -5', 'Dough Tomatoes Mozzarella Tuna Onions  Garlic', '12.99', 453, '/images/pizza-5.jpg'),
(6735, 'Pizza', ' Diavolo -6', 'Dough Tomatoes Mozzarella Salami Peppers  Hot Peppers', '12.99', 460, '/images/pizza-6.jpg'),
(6736, 'Pizza', ' Regina -7', 'Dough Tomatoes Mozzarella Cooked Ham  Mushrooms', '9.99', 480, '/images/pizza-7.jpg'),
(6737, 'Pizza', ' Mista -8', 'Dough Tomatoes Mozzarella Salami Cooked Ham  Mushrooms ', '10.99', 535, '/images/pizza-8.jpg'),
(6738, 'Pizza', ' Hawaii -9', 'Dough Tomatoes Mozzarella Cooked Ham  Pineapple', '10.99', 443, '/images/pizza-2.jpg'),
(6739, 'Pizza', ' Tonno -10', 'Dough Tomatoes Mozzarella Tuna  Onions ', '10.99', 431, '/images/pizza-3.jpg'),
(6740, 'Pizza', ' Grandiosa -11', 'Dough Tomatoes Mozzarella Cooked Ham Salami Mushrooms Peppers Artichokes  Onions ', '15.99', 617, '/images/pizza-4.jpg'),
(6741, 'Pizza', ' Pesto -12', 'Dough Tomatoes Mozzarella Pesto', '6.99', 377, '/images/pizza-1.jpg'),
(6742, 'Pasta', 'Aglio & Olio - 13', 'Pasta Basil  Garlic', '7.40', 232, '/images/pasta-3.jpg'),
(6743, 'Pasta', 'Tonno -14', 'Pasta Tuna  Onions', '11.40', 261, '/images/pasta-2.jpg'),
(6744, 'Pasta', 'Funghi -15', 'Pasta Mushrooms  Basil', '7.70', 275, '/images/pasta-1.jpg'),
(6745, 'Pasta', 'Pesto -16', 'Pasta  Pesto', '7.10', 217, '/images/pasta-4.jpg'),
(6746, 'Basic', 'Dough', '', '0', 250, '/images/teig.jpg'),
(6747, 'Basic', 'Pasta', '', '0', 200, '/images/pasta.jpg'),
(6748, 'Extra', 'Tomatoes', '', '1.20', 70, '/images/tomaten.jpg'),
(6749, 'Extra', 'Mozzarella', '', '2.20', 50, '/images/mozarella.jpg'),
(6750, 'Extra', 'Basil', '', '.90', 10, '/images/basilikum.jpg'),
(6751, 'Extra', 'Cooked Ham', '', '2.20', 45, '/images/schinken.jpg'),
(6752, 'Extra', 'Salami', '', '2.10', 55, '/images/salami.jpg'),
(6753, 'Extra', 'Mushrooms', '', '1.40', 65, '/images/champignons.jpg'),
(6754, 'Extra', 'Peppers ', '', '1.60', 25, '/images/paprika.jpg'),
(6755, 'Extra', 'Hot Peppers', '', '1.50', 10, '/images/peperoni.jpg'),
(6756, 'Extra', 'Artichokes', '', '1.90', 30, '/images/artischocken.jpg'),
(6757, 'Extra', 'Onions', '', '1.10', 27, '/images/zwiebel.jpg'),
(6758, 'Extra', 'Pineapple', '', '1.80', 28, '/images/ananas.jpg'),
(6759, 'Extra', 'Tuna', '', '2.70', 34, '/images/thunfisch.jpg'),
(6760, 'Extra', 'Pesto', '', '2.60', 17, '/images/pesto.jpg'),
(6761, 'Extra', 'Garlic', '', '1.10', 22, '/images/knoblauch.jpg');

INSERT IGNORE INTO `ORDER_TEMPLATE` (`ORDER_TEMP_ID`, `customer`, `adress`, `order`, `hidden`, `area`, `price`, `weight`) VALUES
(601, 'Andrea', 'via dei Giubbonari/via dei Cestari ', '1 x Pizza Grandiosa with extra Ananas ',0, 1, '17.79', 645),
(602, 'Isabella', 'via di Sopra/via Milano', '2 X Pizza Margherita & Pasta Aglio & Olio',1, 1, '19.38', 962),
(603, 'Fausto', 'via del Boschetto/via di Sotto ', '2 x Pizza Salami, 1 x Pizza Funghi and 1 x Pasta Tonno ',0, 1, '35.37', 1546),
(604, 'Gabriella', 'via di Campo Marzio/via di Cantieri ', '1 x Pizza Funghi with extra Mozarella ',0, 1, '10.19', 485),
(605, 'Marco', 'via di Cantieri/via Venecia', '2 X Pasta Pesto & 1 X Pasta Aglio & Olio',1, 1, '21.60', 666),
(606, 'Oriella', 'via dei Delfini/via Milano ', '1 x Pasta Funghi & 2 x Pasta Tonno ',0, 1, '30.50', 797),
(607, 'Paolo', 'Piazza Verdi/via Marmorata', 'Pasta Pesto, Pasta Tonno & Pasta Aglio & Olio',0, 0, '0.00', 0),
(608, 'Raffaello', 'via dei Giubbonari/via del la statione ', '2 x Pizza Hawaii, 1 x Pizza Regina and 1 x Pasta Tonno',0, 1, '43.37', 1627),
(609, 'Toni', 'via dei Delfini/via Roma ', '2 x Pizza Salami, 1 x Pizza Funghi and 1 x Pasta Tonno ',0, 1, '35.37', 1546),
(610, 'Claudio', 'via Marmorata/via Tonezza', '1 x Pizza Mista with extra Mozarella ',0, 0, '0.00', 0),
(611, 'Matteo', 'via dei Giubbonari/Mercato  Generale', '1 X Pizza Margherita With Extra Pepperoni 2 X Pizza Regina With Extra Pepperoni 1 X Pizza Mista And 1 X Pasta Tonno',1, 1, '52.86', 2156),
(612, 'Gina', 'via del Babuino/via di Cantieri', '2 x Pizza Papa with extra Garlic ',0, 1, '28.18', 950),
(613, 'Gianni', 'via dei Cestari/via Venecia ', '1 x Pasta Tonno & 2 x Pasta Pesto',0, 1, '25.19', 865),
(614, 'Emilio', 'via di Sotto/via Milano ', '4 x Pizza Grandiosa 2 with extra Garlic ',0, 1, '66.16', 2512),
(615, 'Alessandra', 'via Giulia/via Giove ', '1 x Pizza Regina with extra Garlic and 1 x Pasta Aglio & Olio ',0, 0, '0.00', 0),
(616, 'Juana', 'via Romeo/via dei Cestari', '1 X Pasta Aglio & Olio And 2 X Pasta Pesto With 1 X Extra Basil',1, 1, '22.50', 676),
(617, 'Nino', 'via del Babuino/via Tonezza', '1 X Pizza Prosciutto With Extra Peperoni 1 X Pizza Regina With Extra Basil And 1 X Pasta Pesto',1, 1, '27.48', 1132),
(618, 'Ottavio', 'via Alberta/via Sistina ', '2 x Pizza Salami with extra Peperoni and 2 x Pasta Pesto ',0, 1, '33.18', 1304),
(619, 'Dino', 'via Marmorata/via Roma ', '2 x Pizza Funghi & Pizza Grandiosa aber vegetarisch !! (nicht vegan) ',0, 0, '0.00', 0),
(620, 'Gino', 'Piazza Dante/via Bella Elena ', '2 x Pizza Tonno with extra Garlic ',0, 0, '0.00', 0);

CREATE VIEW IF NOT EXISTS  PizzaReportSimple AS select `".$dbname."`.`ORDER`.`ORDER_ID` AS `ORDER_ID`,`".$dbname."`.`ORDER`.`round` AS `round`,`".$dbname."`.`ORDER`.`timestamp_in` AS `timestamp_in`,`".$dbname."`.`ORDER`.`timestamp_out` AS `timestamp_out`,timestampdiff(MINUTE,`".$dbname."`.`ORDER`.`timestamp_in`,`".$dbname."`.`ORDER`.`timestamp_out`) AS `DeliveryTime`,timestampdiff(MINUTE,`".$dbname."`.`ORDER`.`timestamp_in`,`".$dbname."`.`ORDER`.`timestamp_out`) > 5 AS `AddWine` from `".$dbname."`.`ORDER`;

CREATE VIEW IF NOT EXISTS PizzaReportDetail AS select `".$dbname."`.`ORDER`.`ORDER_ID` AS `ORDER_ID`,`".$dbname."`.`ORDER`.`round` AS `round`,`".$dbname."`.`ORDER`.`timestamp_in` AS `timestamp_in`,`".$dbname."`.`ORDER`.`timestamp_out` AS `timestamp_out`,timestampdiff(MINUTE,`".$dbname."`.`ORDER`.`timestamp_in`,`".$dbname."`.`ORDER`.`timestamp_out`) AS `DeliveryTime`,timestampdiff(MINUTE,`".$dbname."`.`ORDER`.`timestamp_in`,`".$dbname."`.`ORDER`.`timestamp_out`) > 5 AS `AddWine`,`".$dbname."`.`ORDER_TEMPLATE`.`weight` - `".$dbname."`.`ORDER`.`weight` AS `DIFFWEIGHT`,`".$dbname."`.`ORDER_TEMPLATE`.`price` - `".$dbname."`.`ORDER`.`price` AS `DIFFPRICE`,`".$dbname."`.`ORDER_TEMPLATE`.`area` - `".$dbname."`.`ORDER`.`area` AS `DIFFAREA` from (`".$dbname."`.`ORDER` join `".$dbname."`.`ORDER_TEMPLATE` on(`".$dbname."`.`ORDER`.`ORDER_TEMP_ID` = `".$dbname."`.`ORDER_TEMPLATE`.`ORDER_TEMP_ID`));
  
  
  ");
$query->execute();
}
catch (PDOException $e) {
  $error=$e->getMessage();
}
?>