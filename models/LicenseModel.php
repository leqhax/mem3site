<?php
	
	function TOKEN($login, $password, $binding, $token){

		if(!$login && !$password)
			return false;

		if(!$binding && !$token && !$version)
			return false;

		$unix = date('d.m.Y H:i');

		$data[0] = md5($login);
		$data[1] = md5($password);
		$data[2] = md5($binding);
		$check = $data[0] . $data[1] . $data[2];

		$check = md5($check);

		if($token == $check)
			return $check;

		return false;
	}

	function EnterBinding($login, $binding){
		global $db;

		$login = SECURE($login);
		$binding = SECURE($binding);

		$query = "UPDATE `Users` SET `binding` = '{$binding}' WHERE `login` = '{$login}' LIMIT 1";

		return mysqli_query($db, $query);
	}

?>