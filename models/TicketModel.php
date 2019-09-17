<?php
	
	function GetAllTickets($CurrentPage = 0, $MaxCount, $sort = null){
		global $db;

		$MaxCount = SECURE($MaxCount);
		$CurrentPage = SECURE($CurrentPage);
		if($sort['value'] != null){
			$sort['sort'] = SECURE($sort['sort']);
			$sort['value'] = SECURE($sort['value']);
			$query = "SELECT * FROM `tickets` WHERE `{$sort['sort']}` = '{$sort['value']}' ORDER BY `id` DESC LIMIT {$CurrentPage}, {$MaxCount}";
			
		}else{
			$query = "SELECT * FROM `tickets` WHERE 1 ORDER BY `id` DESC LIMIT {$CurrentPage}, {$MaxCount}";
		}

		$result = mysqli_query($db, $query);

		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}


	function acceptTicket($id, $login ,$accepted){
		global $db;
		
		$id = SECURE($id);
		$login = SECURE($login);
		$accepted = SECURE($accepted);

		$query = "UPDATE `tickets` SET `status`= 'accept' , `accepted` = '{$accepted}' WHERE `id` = '{$id}'";
		mysqli_query($db, $query);


		$query = "UPDATE `Users` SET `binding` = NULL WHERE `login` = '{$login}' LIMIT 1";

		return mysqli_query($db, $query);
	}

	function declineTicket($id, $login){
		global $db;
		
		$id = SECURE($id);
		$login = SECURE($login);

		$query = "UPDATE `tickets` SET `status`= 'decline' ,`accepted` = '{$login}' WHERE `id` = '{$id}'";

		return mysqli_query($db, $query);
	}

	function deleteTicket($id){
		global $db;
	
		$id = SECURE($id);

		$query = "DELETE FROM `tickets` WHERE `id` = '{$id}'";

		return mysqli_query($db, $query);
	}

?>