<?php
require_once __DIR__ . '/inc/config.simstart.inc.php';
require_once __DIR__ . '/inc/config.inc.php';
require_once __DIR__ . '/inc/config.db.inc.php';

// Create connection
$dsn = 'mysql:dbname='.$dbname.';host='.$servername.';port=3306;charset=utf8';
$conn = new PDO($dsn, $username, $dbpassword);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$order_id=$sanitized['order_id'];
$price=$sanitized['price'];
$weight=$sanitized['weight'];
$wine = (isset($sanitized['wine'])?1:0);
$area = (isset($sanitized['area'])?1:0);

try {
//$query = $conn->prepare("UPDATE `ORDER` SET `timestamp_out` = NOW(), `wine` = '".$wine."', `area` = '".$area."', `price` = '".$price."', `weight` = '".$weight."' WHERE `ORDER_ID` = '".$order_id."';");
$query = $conn->prepare("UPDATE `ORDER` SET `timestamp_out` = NOW() , `price` = REPLACE('".$price."',',','.') , `weight` = '".$weight."', `wine` = '".$wine."', `area` = '".$area."' WHERE `ORDER`.`ORDER_ID` = '".$order_id."';");
$query->execute();
}
catch (PDOException $e) {
  echo $e->getMessage();
}

?>