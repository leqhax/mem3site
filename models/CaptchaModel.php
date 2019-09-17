<?php


	function Captcha($captcha, $key){
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		
		$data = array(
			'secret' => $key,
			'response' => $captcha
		);
	
		$options = array(
			'http' => array (
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);
	
		$context  = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captcha_success = json_decode($verify);
		if ($captcha_success->success == false) {
			return false;
		}
		return true;
	}


?>