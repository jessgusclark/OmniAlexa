<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	include_once("classes/authenticate.php");
	include_once("classes/curl.php");
	include_once("classes/response.php");

	include_once("classes/tasks/checkinfiles.php");


	// authenticate and create $user:
	$a = new authenticate();
	$user = $a->login("alexa", "password");


	// task:
	$t = new checkInFiles($user);

	//var_dump($t);

	// send JSON response to Alexa:
	$r = new response();
	$r->returnText($t->getResponse());	

?>