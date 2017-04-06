<?php

class checkInFiles{

	private $user;
	private $filecount;

	function __construct($u) {
		$this->user = $u;

		$files = $this->getCheckedOutFiles();

		$this->loopThroughFiles($files);

	}

	private function getCheckedOutFiles(){

		$c = new curl();

		$url = "https://a.cms.omniupdate.com/files/checkedout";

		$data = array(
			"authorization_token" => $this->user->gadget_token,
			"site" => "outc17",
			"all" => "false"
		);

		return $c->get($url, $data);

	}

	private function loopThroughFiles($files){
		$this->filecount = count($files);

		foreach ($files as $file) {
			$this->checkInFile($file->path);
		}


	}

	private function checkInFile($file){

		$c = new curl();

		$url = "https://a.cms.omniupdate.com/files/checkin";

		$data = array(
			"authorization_token" => $this->user->gadget_token,
			"site" => "outc17",
			"path" => $file
		);

		return $c->post($url, $data);

	}

	public function getResponse(){
		return "Checked in " . $this->filecount . " files.";
	}

}

?>