<?php
	
	function createPrivilege($name , $array){
		global $db;

		$name = SECURE($name);

		foreach ($array as $key => $value) {

			$massive .= "[";
			$massive .= $key;
			$massive .= "]";
			$massive .= $value;
			$massive .= "[/";
			$massive .= $key;
			$massive .= "]";

		}

		$massive = SECURE($massive);
		
		$query = "INSERT INTO `privilege`(`name`, `flags`) VALUES ('{$name}' , '{$massive}')";

		return mysqli_query($db, $query);
	}	
	function savePrivilege($id, $name , $array){
		global $db;

		$id = SECURE($id);
		$name = SECURE($name);

		foreach ($array as $key => $value) {

			$massive .= "[";
			$massive .= $key;
			$massive .= "]";
			$massive .= $value;
			$massive .= "[/";
			$massive .= $key;
			$massive .= "]";

		}

		$massive = SECURE($massive);
		
		$query = "UPDATE `privilege` SET `name`= '{$name}',`flags`= '{$massive}' WHERE `id` = '{$id}' LIMIT 1";

		return mysqli_query($db, $query);
	}

	function GetParameters($string){
		preg_match_all('/\[(?<tag>\w+)\](?<value>.*?)\[\/\1\]/iu', $string, $matches);

		$string = array_combine($matches['tag'], $matches['value']);

		return $string;
	}

	function GetPrivilege($privilege){
		global $db;

		$privilege = SECURE($privilege);

		$query = "SELECT * FROM `privilege` WHERE `name` = '{$privilege}' or `id` = '{$privilege}' LIMIT 1";

		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);

		$row['flags'] = GetParameters($row['flags']);

		return $row;
	}

	function GetAllPrivilege($CurrentPage = 0, $MaxCount){
		global $db;

		$MaxCount = SECURE($MaxCount);
		$CurrentPage = SECURE($CurrentPage);

		$query = "SELECT * FROM `privilege` WHERE 1 ORDER BY `id` DESC LIMIT {$CurrentPage}, {$MaxCount}";

		$result = mysqli_query($db, $query);
		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}
	function CGetAllPrivilege(){
		global $db;

		$MaxCount = SECURE($MaxCount);
		$CurrentPage = SECURE($CurrentPage);

		$query = "SELECT * FROM `privilege` WHERE 1";

		$result = mysqli_query($db, $query);
		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}

	function deletePrivilege($id){
		global $db;

		$id = SECURE($id);

		$query = "DELETE FROM `privilege` WHERE `id` = '{$id}' LIMIT 1";
		
		return mysqli_query($db, $query);
	}

?>