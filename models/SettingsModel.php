<?php
	
	function GetSettingByName($name){
		global $db;

		$name = SECURE($name);

		$query = "SELECT `value` FROM `settings` WHERE `name` = '{$name}' LIMIT 1";

		$result = mysqli_query($db, $query);
		
		$row = mysqli_fetch_assoc($result);

		if($row == null)
			return false;

		return $row['value'];
	}

	function GetAllSettings(){
		global $db;

		$query = "SELECT * FROM `settings` WHERE 1";

		$result = mysqli_query($db, $query);
		
		while($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;
	}

	function saveSettings($data){
		global $db;

		foreach ($data as $key => $value) {
			$key = SECURE($key);
			$value = SECURE($value);

			$query = "UPDATE `settings` SET `value` = '{$value}' WHERE `name` = '{$key}' ";
			mysqli_query($db, $query);
		}
		return;
	}
?>