<?php 
#require_once __DIR__ . '/mainpage_inc//config.db.inc.php';
#require_once __DIR__ . '/mainpage_inc//config.inc.php';
#require_once __DIR__ . '/mainpage_inc//config.simstart.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	require_once __DIR__ . '/../inc/htmlhead.inc.php';
	?>
</head>
<body>
<?php 
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://dashboard.pizza.pub.lab.nm.ifi.lmu.de/API/v1/records/ORDER_REPORT_ALL_TEAMS',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>

</body>
<head>
	<?php 
	require_once __DIR__ . '/../inc/script.inc.php';
	?>
</html>

