<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	include_once("classes/authenticate.php");
	include_once("classes/curl.php");
	include_once("classes/response.php");

	include_once("classes/tasks/checkinfiles.php");
	include_once("classes/tasks/howManyCheckedOutFiles.php");


	// authenticate and create $user:
	$a = new authenticate();
	$user = $a->login("alexa", "password");

	// send JSON response to Alexa:
	$r = new response();

	// get intent
	// refernce: https://gist.github.com/solariz/a7b7b09e46303223523bba2b66b9b341
	$rawJSON = file_get_contents('php://input');
	$EchoReqObj = json_decode($rawJSON);

	$intentType = ( is_object($EchoReqObj) === false ) ? "HowManyCheckedOutFiles" : $EchoReqObj->request->intent->name;

	// intent
	switch($intentType) {
		case "CheckInFiles":
			$t = new checkInFiles($user);
			$r->returnText($t->getResponse());
			break;
		case "HowManyCheckedOutFiles":
			$t = new howManyCheckedOutFiles($user);
			$r->returnText($t->getResponse());
			//$r->returnText("HowManyCheckedOutFiles");
			break;
		default:
			$r->returnText("Sorry, I didn't understand the intent '" . $intentType ."'.");
	}


?>