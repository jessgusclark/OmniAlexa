<?php

class authenticate{


	public function login($username, $password){

		$c = new curl();

		$url = "https://a.cms.omniupdate.com/authentication/login";

		$data = array(
			'skin' => 'outc17', 
			'account' => 'workshop81',
			'username' => $username,
			'password' => $password
		);

		return $c->post($url, $data);

	}


}

?>