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

$task_id=$sanitized['task_id'];
$action=$sanitized['action'];

try {
$query = $conn->prepare("UPDATE `TASK` SET `status` = '".$action."' WHERE `TASK_ID` = ".$task_id.";");
$query->execute();
}
catch (PDOException $e) {
  echo $e->getMessage();
}
?>