<?php 
   $SIMULATION_ROUND = 3;
   date_default_timezone_set("Europe/Berlin");
   $DIFF_BETWEEN_ORDERS =10000; // miliseconds > 30 sekunden = 30000
   $SIMULATION_TIME_START = mktime(16,30, 00, 1, 23, 2021);
   $SIMULATION_TIME_END = $SIMULATION_TIME_START+1200; //20 MIN = 1200 seconds
   $SIM_STARTED = ($SIMULATION_TIME_START < strtotime('now')) ? "STARTED" : "NOT STARTED";
   $SIM_FINISHED = ($SIMULATION_TIME_END < strtotime('now')) ? "FINISHED" : "NOT FINISHED";
   $SIM_STATUS = "NOT STARTED";
   $SIM_STATUS_CLASS = "btn-outline-secondary";
   IF (($SIM_STARTED == "STARTED") AND ($SIM_FINISHED == "NOT FINISHED")) {
	   $SIM_STATUS = "IN PROGRESS";
	   $SIM_STATUS_CLASS = "btn-outline-success";
   }
   
   IF ($SIM_FINISHED == "FINISHED")  {
	   $SIM_STATUS = "FINISHED";
	   $SIM_STATUS_CLASS = "btn-outline-danger";
   }

   # Set temeparature when not
   if(empty(getenv("TEMPERATURE"))) putenv("TEMPERATURE=29");
   $TEMPERATURE = getenv("TEMPERATURE");
   if(empty(getenv("HUMIDITY"))) putenv("HUMIDITY=73");
   $HUMIDITY = getenv("HUMIDITY");
   $TEMPERATURE_DECIMAL = str_pad(mt_rand(0,99),2,'0');
   $HUMIDITY_DECIMAL = str_pad(mt_rand(0,99),2,'0');
   
   # CREATE BUTTONS for HTML Header
   $TEAM_NUMBER_BUTTON =
			"<span class=\"btn one_line team".$TEAM_NUMBER." btn-lg\">TEAM: ".$TEAM_NUMBER." Round: ". $SIMULATION_ROUND. " User: ".$USER."</span>";

?>
