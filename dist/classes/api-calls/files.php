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

	/// Check in Single File;
	/// Takes: $user (array), $fileObject (array)
	/// Returns: Checks back in the file that is being passed.
	/// Omni Reference: http://developers.omniupdate.com/#!/Files/post_files_checkin
	public function checkInFile($user, $site, $file){

		$c = new curl();

		$url = "https://a.cms.omniupdate.com/files/checkin";

		$data = array(
			"authorization_token" => $user->gadget_token,
			"site" => $file->site,
			"path" => $file->path
		);

		return $c->post($url, $data);

	}

}


?>