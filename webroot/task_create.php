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

$sender_php_self=$sanitized['sender_php_self'];
$sender=$sanitized['sender'];
$sub=$sanitized['subject'];
$mes=$sanitized['message'];
$receiver=$sanitized['receiver'];

try {
$query = $conn->prepare("INSERT INTO `TASK` (`round`, `subject`, `message`, `sender`, `receiver`, `status`, history ) VALUES ('".$SIMULATION_ROUND."','".$sub."','".$mes."', '".$sender."', '".$receiver."', 'new', 'created at simulationtime ".$SIMULATION_TIME."');");
$query->execute();
}
catch (PDOException $e) {
  echo $e->getMessage();
}
?>