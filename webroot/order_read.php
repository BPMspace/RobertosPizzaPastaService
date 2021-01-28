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

try {
$query_order = $conn->prepare("SELECT ORDER_ID, customer FROM `ORDER_TEMPLATE` INNER JOIN `ORDER` ON `ORDER_TEMPLATE`.`ORDER_TEMP_ID`=`ORDER`.`ORDER_TEMP_ID` WHERE timestamp_out = \"0000-00-00 00:00:00\" AND `ORDER`.`round` = ".$SIMULATION_ROUND.";");
$query_order->execute();
}
catch (PDOException $e) {
  echo $e->getMessage();
}

//$orders = $query_order->fetchAll();
//print_r($orders);
//exit;
echo "<table id=\"order\" class=\"table table-striped table-responsive-md\">
   <thead class=\"thead-dark\">
     <tr>
       <th scope=\"col\" title=\"Order ID\">Order ID</th>
       <th scope=\"col\" title=\"CustomerName\">CustomerName</th>
     </tr>
   </thead>
   <tbody>";
while ($order= $query_order->fetch(PDO::FETCH_ASSOC))
            {
			echo "
				 <tr>
				   <td>".$order['ORDER_ID']."</td>
				   <td>".$order['customer']."</td>
				</tr>";
			}
?>
   </tbody>
</table>


