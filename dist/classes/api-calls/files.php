<?php
// starts at: http://developers.omniupdate.com/#!/Files/get_files_list

class files {

	/// Get Checked Out Pages
	/// Takes: $user (array), $site (string), $all (bool)
	/// Returns: checked out pages for the specific user being passed in. unless
	///			 all is set to true.
	/// Omni Reference: http://developers.omniupdate.com/#!/Files/get_files_checkedout
	public function getCheckedOutFiles($user, $site, $all = false){
		
		$c = new curl();

		$url = "https://a.cms.omniupdate.com/files/checkedout";

		$data = array(
			"authorization_token" => $user->gadget_token,
			"site" => $site,
			"all" => $all
		);

		return $c->get($url, $data);

	}


}


?>