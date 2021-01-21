<?php 
	session_start();
	$TEAM_NUMBER = getenv('Number_Pizza_Team');
	$_SESSION['REMOTE_USER'] = ((isset($_SERVER['REMOTE_USER'])) ? $_SERVER['REMOTE_USER'] : 'Guest') ;
	$USER = $_SESSION['REMOTE_USER'];
	$PHP_SELF = $_SERVER['PHP_SELF'];
	$INTERNAL = ((strpos($PHP_SELF, 'internal') == false) ? false : true);
  
   $TEAM_NUMBER_BUTTON =
			"<div class=\"btn team".$TEAM_NUMBER." btn-lg\">TEAM: ".$TEAM_NUMBER." Round: ". $SIMULATION_ROUND. " User: ".$USER."</div>";
   $SIMULATION_TIME_START_BUTTON =
			"<div class=\"btn\" btn-lg\">Sim Start: ".date("H:m:s",$SIMULATION_TIME_START)."</div>";
   $TEMPERATURE = mt_rand(22,34);
   $TEMPERATURE_DECIMAL = str_pad(mt_rand(0,99),2,'0');
   $HUMIDITY =  mt_rand(68,99);
   $HUMIDITY_DECIMAL = str_pad(mt_rand(0,99),2,'0');

?>