<?php

class howManyCheckedOutFiles{

	private $filecount;

	function __construct($user) {
		// include API calls:
		include_once("classes/api-calls/files.php");

		// create api object and get data:
		$apiFiles = new files();
		$files = $apiFiles->getCheckedOutFiles($user, "outc17");

		// assign any local variables needed for getResponse:
		$this->filecount = count($files);

	}

	// Required for Output back to Alexa
	public function getResponse(){
		return "You have " . $this->filecount . " files checked out.";
	}

}

?>