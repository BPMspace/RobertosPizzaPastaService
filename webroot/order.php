<?php
require_once __DIR__ . '/inc/config.simstart.inc.php';
require_once __DIR__ . '/inc/config.inc.php';
require_once __DIR__ . '/inc/config.db.inc.php';

/* set new TEMPERATURE/HUMIDITY for this order
$HUMIDITY = $HUMIDITY+mt_rand(-3,+3);
$TEMPERATURE = $TEMPERATURE+mt_rand(-2,+3);
putenv("TEMPERATURE=");
putenv("HUMIDITY="$HUMIDITY); 
*/

IF ($SIM_STATUS == "NOT STARTED") {
	header("Content-type: image/png");
	echo file_get_contents('images/aperto.png') ;
	die();
}

IF ($SIM_STATUS == "FINISHED") {
	header("Content-type: image/png");
	echo file_get_contents('images/chiuso.png') ;
	die();
}

// Create connection
$dsn = 'mysql:dbname='.$dbname.';host='.$servername.';port=3306;charset=utf8';
$conn = new PDO($dsn, $username, $dbpassword);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$select= "SELECT *, rand() as rnd FROM `ORDER_TEMPLATE` where ORDER_TEMP_ID NOT IN (SELECT `ORDER_TEMP_ID` FROM `ORDER` where `round` = ".$SIMULATION_ROUND.") order by rnd limit 1 ";

try {
$query = $conn->prepare($select);
$query->execute();
}
catch (PDOException $e) {
  $error=$e->getMessage();
}

$count = $query->rowCount();

// cut at space https://stackoverflow.com/questions/38536953/with-php-substr-how-can-i-find-the-previous-whitespace-instead-of-the-following

while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			header("Content-type: image/png"); 
			$str1= "Name: ".$result['customer']; 
			$str2= "Adress: ".$result['adress']; 
			$str3= "Order: ".substr($result['order'], 0, 30); 
			$str4= "       ".substr($result['order'], 30, 60); ; 
			$str5= "       ".substr($result['order'], 60, 90); ; 
			$rand= rand(1924,934465); 
			$image= imagecreate(700,525); 
			$background = imagecolorallocate($image,50,50,50); 
			$color_white= imagecolorallocate($image,255,255,255); 
			$color_red= imagecolorallocate($image,254,0,0); 
			imagefill($image,0,0,$background); 
			imagestring($image,5,100,25,$str1,$color_white); 
			imagestring($image,5,100,45,$str2,$color_white); 
			imagestring($image,5,100,65,$str3,$color_white); 
			imagestring($image,5,100,85,$str4,$color_white); 
			imagestring($image,5,100,105,$str5,$color_white); 
			imagestring($image,1,90,200,$rand ,$color_red);
			imagepng($image);

			try {
				$query2 = $conn->prepare("INSERT INTO `ORDER` (`ORDER_TEMP_ID`, `round`, `timestamp_in`) VALUES ('".$result['ORDER_TEMP_ID']."',".$SIMULATION_ROUND.", current_timestamp());");
				$query2->execute();
				}
				catch (PDOException $e) {
				  $error=$e->getMessage();
				}
	}
if ($count == 0) {
	header("Content-type: image/png");
	echo file_get_contents('images/chiuso.png') ;
	die();
}
?>



