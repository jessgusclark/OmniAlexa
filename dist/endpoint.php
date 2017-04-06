<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	include_once("classes/authenticate.php");
	include_once("classes/curl.php");
	include_once("classes/response.php");

	include_once("classes/tasks/checkinfiles.php");


	// authenticate and create $user:
	$a = new authenticate();
	$user = $a->login("alexa", "alexa");


	// send JSON response to Alexa:
	$r = new response();

	// get intent
	// refernce: https://gist.github.com/solariz/a7b7b09e46303223523bba2b66b9b341
	$rawJSON = file_get_contents('php://input');
	$EchoReqObj = json_decode($rawJSON);

	$intentType;
	if (is_object($EchoReqObj) === false){
		$intentType = "CheckInFiles";
	}else{
		$intentType = $EchoReqObj->request->intent->name;
	}

	// intent
	if ($intentType="CheckInFiles"){
		$t = new checkInFiles($user);
		$r->returnText($t->getResponse());
	}else{
		$r->returnText("Sorry, I didn't understand the intent ''.");
	}
	//var_dump($t);


	//var_dump($_REQUEST);

	//$rawJSON = file_get_contents('php://input');
	//$EchoReqObj = json_decode($rawJSON);

	//$r->returnText( $_SERVER['REQUEST_METHOD'] );	// returns POST
	//$r->returnText( $_SERVER['REQUEST_URI'] );		// returns "/hack/endpoint.php"
	//$r->returnText($intentType);

	//);	

?>