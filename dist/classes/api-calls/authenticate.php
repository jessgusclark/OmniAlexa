<?php

class authenticate{

	/// Log User in
	/// Takes: skin (string), account (string), username (string), password (string)
	/// Returns: Logs user in and returns array for the user.
	/// Omni Reference: http://developers.omniupdate.com/#!/Authentication/post_authentication_logins
	public function login($skin, $account, $username, $password){

		$c = new curl();

		$url = "https://a.cms.omniupdate.com/authentication/login";

		$data = array(
			'skin' => $skin, 
			'account' => $account,
			'username' => $username,
			'password' => $password
		);

		return $c->post($url, $data);

	}


}

?>