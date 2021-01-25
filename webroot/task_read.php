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
$room=$sanitized['room'];

try {
$query_task = $conn->prepare("SELECT TASK_ID, sender, subject, status, DATE_FORMAT(timestamp, '%H:%i') as time FROM `TASK` WHERE `receiver` = '".$room."' AND `status` !=  'done' AND `round` =  '".$SIMULATION_ROUND."' ORDER BY `time` DESC;");
$query_task->execute();
}
catch (PDOException $e) {
  echo $e->getMessage();
}

echo "<table id=\"task\" class=\"table table-striped table-responsive-md\">
   <thead class=\"thead-dark\">
     <tr>
       <th scope=\"col\" title=\"Sender\">Sender</th>
       <th scope=\"col\" title=\"Subject\">Subject</th>
       <th scope=\"col\" title=\"Message\">Message</th>
       <th scope=\"col\" title=\"Status\">Status</th>
       <th scope=\"col\" title=\"Time\">Time</th>
       <th scope=\"col\" title=\"Action\">Action</th>
     </tr>
   </thead>
   <tbody>";
while ($task = $query_task->fetch(PDO::FETCH_ASSOC))
            {
			echo "
				 <tr>
				   <td>".$task['sender']."</td>
				   <td>".$task['subject']."</td>
				   <td>".$task['message']."</td>
				   <td>".$task['status']."</td>
				   <td>".$task['time']."</td>
				   <td>
						<form id=\"task_update\">
						<input type=\"hidden\" name=\"task_id\" value=\"".$task['TASK_ID']."\">
						<input type=\"hidden\" name=\"action\" value=\"done\">
						<button type=\"submit\"><i class=\"fa fa-check-circle\" aria-hidden=\"true\"></i></button>
						</form>
					</td>
				</tr>";
			}
?>
   </tbody>
</table>