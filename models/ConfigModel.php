<?php

	function saveMyConfig($name, $massive, $id){
		global $db;

		$name = SECURE($name);
		$id = SECURE($id);

		$config = "";

		foreach ($massive as $key => $value) {
			$key = $key;
			$value = $value;

			$config .= $key . '=' . $value . "\n";
		}

		$config = SECURE($config);

		$query = "";

		return;
	}

	function createConfig($array, $id){
		global $db;

		$name 		= SECURE($array['name']);
		$private 	= SECURE($array['private']);
		$config 	= SelectConfig($array['config']);
		$config 	= $config['0']['config'];
		$id 		= SECURE($id);

		$time = time();

		$query = "INSERT INTO `configs`(`name`, `login`, `config`, `private`, `date`) VALUES ( '{$name}' , '{$id}' , '{$config}' , '{$private}' , '{$time}' )";
		return mysqli_query($db, $query);
	}

	function addConfig($name){
		
	}

	function removeConfig($name){
		
	}

	function GetConfig($id){
		global $db;

		$id = SECURE($id);

		$query = "SELECT * FROM `configs` WHERE `login` = '{$id}'";

		$result = mysqli_query($db, $query);

		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}

	function SelectConfig($id){
		global $db;

		$id = SECURE($id);

		$query = "SELECT * FROM `configs` WHERE `id` = '{$id}'";

		$result = mysqli_query($db, $query);

		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}


	function GetDefaultConfigs(){
		global $db;

		$query = "SELECT * FROM `configs` WHERE `login` = ''";
		
		$result = mysqli_query($db, $query);

		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}

	function GetAllConfigs($CurrentPage = 0, $MaxCount, $sort){
		global $db;

		$MaxCount = SECURE($MaxCount);
		$CurrentPage = SECURE($CurrentPage);

		$query = "SELECT * FROM `configs` WHERE `private` = '0' ORDER BY `date` DESC LIMIT {$CurrentPage}, {$MaxCount}";

		if($sort['value'] != null){
			$sort['sort'] = SECURE($sort['sort']);
			$sort['value'] = SECURE($sort['value']);
			$query = "SELECT * FROM `configs` WHERE `{$sort['sort']}` = '{$sort['value']}' ORDER BY `date` DESC LIMIT {$CurrentPage}, {$MaxCount}";
			
		}else{
			$query = "SELECT * FROM `configs` WHERE `private` = '0' ORDER BY `date` DESC LIMIT {$CurrentPage}, {$MaxCount}";
		}
		
		$result = mysqli_query($db, $query);

		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}

?>