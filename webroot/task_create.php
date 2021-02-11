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

$sender=$sanitized['sender'];
$receiver=$sanitized['receiver'];
$sub=$sanitized['subject'];
$sub .="-".$sanitized['subject1'];
$sub .="-".$sanitized['subject2'];
$mes=$sanitized['message'];
$mes .= "<br>".$sanitized['message1'];
$mes .= "<br>".$sanitized['message2'];
$mes .= "<br>".$sanitized['message3'];
$mes .= "<br>".$sanitized['message4'];
$mes .= "<br>".$sanitized['message5'];

try {
$query = $conn->prepare("INSERT INTO `TASK` (`round`, `subject`, `message`, `sender`, `receiver`, `status`, history ) VALUES ('".$SIMULATION_ROUND."','".$sub."','".$mes."', '".$sender."', '".$receiver."', 'new', 'created at simulationtime ".$SIMULATION_TIME."');");
$query->execute();
}
catch (PDOException $e) {
  echo $e->getMessage();
}
?>