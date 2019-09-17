<?php

	function GetUser($id){
		global $db;

		$id = SECURE($id);

		$query = "SELECT * FROM `Users` WHERE `id` = '{$id}' or `login` = '{$id}' or `email` = '{$id}' LIMIT 1";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);

		if($row == null)
			return false;

		return $row;
	}

	function GetTicketInfo($id){
		global $db;

		$id = SECURE($id);

		$query = "SELECT * FROM `tickets` WHERE `id` = '{$id}' or `login` = '{$id}' LIMIT 1";

		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);

		if($row == null)
			return false;

		return $row;
	}

	function resetBinding($login,$message){
		global $db;

		$login = SECURE($login);
		$message = SECURE($message);
		$time = time();
		$query = "SELECT * FROM `tickets` WHERE `id` = '{$login}' or `login` = '{$login}' LIMIT 1";

		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);

		if($row){
			$query = "DELETE FROM `tickets` WHERE `id` = '{$login}' or `login` = '{$login}'";
			$result = mysqli_query($db, $query);
		}
		$query = "INSERT INTO `tickets`( `login`, `message`, `date`) VALUES ('{$login}' ,'{$message}','{$time}')";
		return mysqli_query($db, $query);
	}
?>