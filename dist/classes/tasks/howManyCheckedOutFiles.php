<?php

class howManyCheckedOutFiles{

	private $user;
	private $filecount;

	function __construct($u) {
		$this->user = $u;

		$files = $this->getCheckedOutFiles();

		$this->filecount = count($files);

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

	public function getResponse(){
		return "You have " . $this->filecount . " files checked out.";
	}

}

?>