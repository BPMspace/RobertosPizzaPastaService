<?php 
require_once __DIR__ . '/inc/config.simstart.inc.php';
echo '<span class= "btn btn-lg '.$SIM_STATUS_CLASS.'">Start/Finish: '.date("H:i:s",$SIMULATION_TIME_START).'/'.date("H:i:s",$SIMULATION_TIME_END).' - '.$SIM_STATUS.'</span>';
?>