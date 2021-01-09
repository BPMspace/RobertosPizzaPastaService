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
USE RPPS;
CREATE TABLE IF NOT EXISTS `RPPS`.`TASK` ( 
  `ID_TASK` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `round` INT NOT NULL ,
  `subject` VARCHAR(255) NOT NULL ,
  `message` TEXT NOT NULL ,
  `sender` ENUM('service','kitchen','driver') NOT NULL ,
  `receiver` ENUM('service','kitchen','driver') NOT NULL , `status` ENUM('new','progress','waiting','done') NOT NULL , `timestamp` TIMESTAMP  NOT NULL DEFAULT NOW() , `history` TEXT NOT NULL, PRIMARY KEY (`ID_TASK`)) ENGINE = InnoDB AUTO_INCREMENT=9365463;
CREATE TABLE IF NOT EXISTS `RPPS`.`ORDER_TEMPLATE` (
  `ORDER_TASK` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer` VARCHAR(255) NOT NULL ,
  `adress` TEXT NOT NULL ,
  `order` TEXT NOT NULL ,
  `area` TINYINT(1) ,
  `price` DECIMAL(13,2) NOT NULL ,
  `weight` INT NOT NULL ,
  PRIMARY KEY (`ORDER_TASK`)) ENGINE = InnoDB AUTO_INCREMENT=712;");
$query->execute();
}
catch (PDOException $e) {
  $error=$e->getMessage();
}
?>