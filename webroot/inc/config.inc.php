<?php 
	session_start();
	$TEAM_NUMBER = getenv('Number_Pizza_Team');
	$_SESSION['REMOTE_USER'] = ((isset($_SERVER['REMOTE_USER'])) ? $_SERVER['REMOTE_USER'] : 'Guest') ;
	$USER = $_SESSION['REMOTE_USER'];
	$PHP_SELF = $_SERVER['PHP_SELF'];
	$INTERNAL = ((strpos($PHP_SELF, 'internal') == false) ? false : true);


?>