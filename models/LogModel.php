<?php
	
	function GetAllLogs($CurrentPage = 0, $MaxCount){
		global $db;

		$MaxCount = SECURE($MaxCount);
		$CurrentPage = SECURE($CurrentPage);

		$query = "SELECT * FROM `logs` WHERE 1 ORDER BY `id` DESC LIMIT {$CurrentPage}, {$MaxCount}";
		$result = mysqli_query($db, $query);

		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}	
	function GetLogs($CurrentPage = 0, $MaxCount, $login){
		global $db;

		$MaxCount = SECURE($MaxCount);
		$CurrentPage = SECURE($CurrentPage);
		$login = SECURE($login);

		$query = "SELECT * FROM `logs` WHERE `login` = '{$login}' or `id` = '{$id}' ORDER BY `id` DESC LIMIT {$CurrentPage}, {$MaxCount}";
		$result = mysqli_query($db, $query);

		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}

	function profile($login){
		global $db;

		$login = SECURE($login);

		$query = "SELECT COUNT(*) FROM `logs` WHERE `login` = '{$login}'";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);

		return $row['COUNT(*)'];
	}


	function deleteLog($id){
		global $db;

		$id = SECURE($id);

		$query = "DELETE FROM `logs` WHERE `id` = '{$id}' LIMIT 1";

		return mysqli_query($db, $query);

	}

	function deleteLogByLogin($login){
		global $db;

		$login = SECURE($login);

		$query = "DELETE FROM `logs` WHERE `login` = '{$login}'";

		return mysqli_query($db, $query);
	}

?>