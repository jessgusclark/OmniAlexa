<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	include_once("classes/constants.php");

	include_once("classes/api-calls/authenticate.php");
	include_once("classes/curl.php");
	include_once("classes/response.php");


	// authenticate with values from constatns.php. Returns an array $user with user's info:
	$a = new authenticate();
	$user = $a->login(SKIN, ACCOUNT, USERNAME, PASSWORD);

	// send JSON response to Alexa:
	$r = new response();

	// get intent
	// refernce: https://gist.github.com/solariz/a7b7b09e46303223523bba2b66b9b341
	$rawJSON = file_get_contents('php://input');
	$EchoReqObj = json_decode($rawJSON);

	// if intent is not set. i.e. you go to the page via http
	$intent = ( is_object($EchoReqObj) === false ) ? "checkInFiles" : $EchoReqObj->request->intent->name;

	// include task class:
	include_once("classes/tasks/" . $intent . ".php");

	// call class based on intent:
	$task = new $intent($user);

	// return JSON:
	$r->returnText($task->getResponse());

?>