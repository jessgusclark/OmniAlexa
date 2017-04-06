<?php

class curl {
	
	function post($url, $data){
		$url = sprintf("%s?%s", $url, http_build_query($data));
		//echo "calling (POST): " . $url . "<br/>";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data );


		curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	    $json = curl_exec($curl);
	    $a = json_decode($json);
	    curl_close($curl);

	    //echo "response: ";
	    //var_dump($a);
	    //echo "<hr/>";

	    return $a;
	}

	function get($url, $data){

		$url = sprintf("%s?%s", $url, http_build_query($data));
		//echo "calling (GET): " . $url . "<br/>";

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	    $json = curl_exec($curl);
	    $a = json_decode($json);
	    curl_close($curl);

	    //echo "response: ";
	    //var_dump($a);
	    //echo "<hr/>";

	    return $a;

	}

}
?>