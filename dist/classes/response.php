<?php

class response{

	function returnText($text){

		echo '{
		    "version": "1.0",
		    "response": {
		        "outputSpeech": {
		            "type": "PlainText",
		            "id": null,
		            "text": "' . $text . '"
		        },
		        "reprompt": null,
		        "shouldEndSession": true
		    },
		    "sessionAttributes": null
		}';
	}


}



?>