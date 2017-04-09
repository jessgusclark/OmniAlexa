<?php

class checkInFiles{

	private $filecount;

	function __construct($user) {
		// include API calls:
		include_once("classes/api-calls/files.php");

		// create api object and get data:
		$apiFiles = new files();
		$files = $apiFiles->getCheckedOutFiles($user, "outc17");
		$this->filecount = count($files);

		// loop through files and check them back in: 
		foreach ($files as $file) {
			$files = $apiFiles->checkInFile($user, 'outc17', $file);
		}

	}

	public function getResponse(){
		return "Checked in " . $this->filecount . " files.";
	}

}

?>