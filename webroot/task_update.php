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
$task_id=htmlspecialchars($_GET["task_id"]);
$action=$sanitized['action'];
$action="done";

try {
$query = $conn->prepare("UPDATE `TASK` SET `status` = '".$action."' WHERE `TASK_ID` = ".$task_id.";");
$query->execute();
}



catch (PDOException $e) {
  echo $e->getMessage();
  die;
}
echo "Il compito è stato impostato allo stato \"fatto\" In questa versione devi chiudere la scheda manualmente. ci scusiamo per il tuo inconveniente. La vecchia scheda è ancora aperta <br><br>Task was set to status \"done\" In this version you have to close tab manually. We apologize for your inconvenience. Old tab is still open"
?>