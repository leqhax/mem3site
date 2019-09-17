<?php

function GetAllUsers($CurrentPage = 0, $MaxCount = false){
	global $db;

	$MaxCount = SECURE($MaxCount);
	$CurrentPage = SECURE($CurrentPage);

	
	if($MaxCount != false){
		$query = "SELECT * FROM `Users` WHERE 1 ORDER BY `id` DESC LIMIT {$CurrentPage}, {$MaxCount}";
	}else{$query = "SELECT * FROM `Users` WHERE 1";}
	
	$result = mysqli_query($db, $query);

	while ($row = mysqli_fetch_assoc($result)) {
		$array[] = $row;
	}
	return $array;
}

function GetAllYoutubers($CurrentPage = 0, $MaxCount = false){
	global $db;

	$MaxCount = SECURE($MaxCount);
	$CurrentPage = SECURE($CurrentPage);

	
	if($MaxCount != false){
		$query = "SELECT * FROM `Users` WHERE `class` = 'yt' ORDER BY `id` DESC LIMIT {$CurrentPage}, {$MaxCount}";
	}else{$query = "SELECT * FROM `Users` WHERE `class` = 'yt'";}
	
	$result = mysqli_query($db, $query);

	while ($row = mysqli_fetch_assoc($result)) {
		$array[] = $row;
	}
	return $array;
}

function GetAllChilds($login){
	global $db;

	$login = SECURE($login);
	$query = "SELECT * FROM `Users` WHERE `referer` = '{$login}'";
	
	$result = mysqli_query($db, $query);
	$array = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$array[] = $row;
	}
	return $array;
}

function deleteUser($id){
	global $db;

	$id = SECURE($id);

	$query = "DELETE FROM `Users` WHERE `id` = '{$id}' LIMIT 1";

	

	return mysqli_query($db, $query);
}

function buildTree($login){
	$childs = GetAllChilds($login);
	$result = array( 'text' => array('name' => $login), 'children' => array());
	for($i = 0; $i < count($childs);$i++)
		$result['children'][] = buildTree($childs[$i]['login']);
	return $result;
}


function saveUser($massive){
	
	global $db;

	$id = SECURE($massive['id']);
	$ref_discount = SECURE($massive['ref_discount']);
	$salary = SECURE($massive['salary']);
	$balance = SECURE($massive['balance']);
	$login = SECURE($massive['login']);
	$email = SECURE($massive['email']);
	$password = md5(SECURE($massive['password']));
	$binding = SECURE($massive['binding']);
	$subscription = strtotime(SECURE($massive['subscription']));
	$class = SECURE($massive['class']);
	$date_register = strtotime(SECURE($massive['date_register']));

	if($massive['password']){
		$query = "UPDATE `Users` SET 
		`login`= '{$login}',
		`email`= '{$email}',
		`password`= '{$password}',
		`binding`= '{$binding}',
		`subscription`= '{$subscription}',
		`class`= '{$class}',
		`date_register`= '{$date_register}' 
		WHERE `id` = '{$id}' ";
	} else if($ref_discount){
		$query = "UPDATE `Users` SET `class`= '{$class}', `ref_discount` = '{$ref_discount}', `salary` = '{$salary}', `balance` = '{$balance}' WHERE `id` = '{$id}' ";
	}else{
		$query = "UPDATE `Users` SET 
		`login`= '{$login}',
		`email`= '{$email}',
		`binding`= '{$binding}',
		`subscription`= '{$subscription}',
		`class`= '{$class}',
		`ref_discount` = '{$ref_discount}',
		`date_register`= '{$date_register}' 
		WHERE `id` = '{$id}' ";
	}

	return mysqli_query($db, $query);
}


function CheckUser($login, $password){
	global $db;

	$login = SECURE($login);
	$password = md5(SECURE($password));

	$query = "SELECT * FROM `Users` WHERE (`email` = '{$login}' or `login` = '{$login}') and `password` = '{$password}' LIMIT 1";

	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);

	if($row != null){return $row;}
	if($row == null){return false;}
	
}

function CheckUserByLogHWID($login,$binding){
	global $db;

	$login = SECURE($login);
	$password = md5(SECURE($password));

	$query = "SELECT * FROM `Users` WHERE (`email` = '{$login}' or `login` = '{$login}') LIMIT 1";

	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	if($row == null){return false;}
	if($row['binding'] == null) return $row;
	if($row['binding'] == $binding) return $row;
	return false;
		//if($row != null){return $row;}
	
}

function GiveInfo($id){
	global $db;

	$id = SECURE($id);

	$query = "SELECT * FROM `Users` WHERE `id` = '{$id}' or `login` = '{$id}' or `email` = '{$id}' LIMIT 1";

	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);

	if($row != null){return $row;}
	if($row == null){return false;}
}

function CountRefs($login){
	global $db;
	$login = SECURE($login);
	$query = "SELECT COUNT(`referer`), `referer` FROM `Users` WHERE `referer` = '{$login}' and `class` = 'user' GROUP BY `referer`";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);

	if($row != null){return $row['COUNT(`referer`)'];}
	if($row == null){return false;}
}

function RefTop(){
	global $db;
	$query = "SELECT COUNT(`referer`), `referer` FROM `Users` WHERE `class` = 'user' GROUP BY `referer` ORDER BY COUNT(`referer`) DESC";
	$result = mysqli_query($db, $query);

	while ($row = mysqli_fetch_assoc($result)) {
		$array[] = $row;
	}
	foreach($array as $key => $value){
		if($value["referer"] == "" || $value["referer"] == NULL){
			unset($array[$key]);
			continue;
		}
		$info = GiveInfo($value["referer"]);
		if(!$info){
			unset($array[$key]);
			continue;
		}
		if($info['class'] != 'user'){
			//print_r($info);
			unset($array[$key]);
			continue;
		}
	}
	return $array;
}

function setclassUser($id){
	global $db;

	$id = SECURE($id);
	$action = GiveInfo($id);

	if($action['class'] == "banned"){
		$query = "UPDATE `Users` SET `class`= 'user' WHERE `id` = '{$id}' or `login` = '{$id}' LIMIT 1";
	}else{
		$query = "UPDATE `Users` SET `class`= 'banned' WHERE `id` = '{$id}' or `login` = '{$id}' LIMIT 1";
	}


	return mysqli_query($db, $query);
}


function register($login, $email, $password){
	global $db;

	$login = SECURE($login);
	$email = SECURE($email);
	$password = md5(SECURE($password));
	$date_register = time() - 10;
	$subscription = time() - 10;

	$query = "INSERT INTO `Users`(`login`, `email`, `password`, `subscription`, `date_register`) 
	VALUES ('{$login}' , '{$email}' , '{$password}' , '{$subscription}' , '{$date_register}')";

	return mysqli_query($db, $query);
}

function resetPassword($login, $password){
	global $db;

	$login = SECURE($login);
	$password = SECURE($password);

	$query = "UPDATE `Users` SET `password`= '{$password}' WHERE `login` = '{$login}' LIMIT 1";

	return mysqli_query($db, $query);
}

function LeftTimeCalc($time){

	$time = $time - time();

	if(/*$time >= 31104000 && */$time >= 2592000){
		$time = $time / 60 / 60 / 24 / 30 / 12;
		$time = intval($time);
		$res  = $time . 'г';
		return $res;
	}
	if($time >= 2592000 && $time >= 86400){
		$time = $time / 60 / 60 / 24 / 30;
		$time = intval($time);
		$res  = $time . 'мес';
		return $res;
	}
	if($time >= 86400){
		$time = $time / 60 / 60 / 24;
		$time = intval($time);
		$res  = $time . 'д';
		return $res;
	}
	if($time <= 86400 && $time >= 3600){
		$time = $time / 60 / 60;
		$time = intval($time);
		$res  = $time . 'ч';
		return $res;
	}
	if($time <= 3600 && $time >= 60){
		$time = $time / 60;
		$time = intval($time);
		$res  = $time . 'мин';
		return $res;
	}
	if($time <= 60 && $time >= 0){
		$time = $time;
		$time = intval($time);
		$res  = $time . 'cек';
		return $res;
	}
}

function AddNewUser($login, $time){
	global $db;

	$login = SECURE($login);
	$time = SECURE($time);

	$info = GiveInfo($login);
	$CurrentTime = time();

	if($info['subscription'] >= time()){
		$AddTime = $info['subscription'] + $time;
	}else{
		$AddTime = $CurrentTime + $time;
	}

	$query = "UPDATE `Users` SET `subscription` = '{$AddTime}' WHERE `login` = '{$login}' LIMIT 1";

	return mysqli_query($db, $query);
}

function AddAllTime($array, $time){
	global $db;

	$time = SECURE($time);
	$time = $time * (60 * 60 * 24);

	foreach ($array as $key => $value) {
		
		$id = SECURE($value['id']);
		$subscription = SECURE($value['subscription']);
		$subscription = $subscription + $time;

		$query = "UPDATE `Users` SET `subscription` = '{$subscription}' WHERE `id` = '{$id}'";

		mysqli_query($db, $query);
	}

	return 0;
}


function FreezOn($login){
	global $db;

	$login = SECURE($login);
	$CurrentTime = time();

	$query = "UPDATE `Users` SET `freez_start` = '{$CurrentTime}', `freez_status` = '1' WHERE `login` = '{$login}' LIMIT 1";

	return mysqli_query($db, $query);
}

function FreezOff($login){
	global $db;

	$login = SECURE($login);
	$CurrentTime = time();

	$query = "UPDATE `Users` SET `freez_status` = '0' WHERE `login` = '{$login}' LIMIT 1";

	return mysqli_query($db, $query);
}

function FreezAddTime($login, $time){
	global $db;

	$login = SECURE($login);
	$time = SECURE($time);

	$query = "UPDATE `Users` SET `subscription` = '{$time}' WHERE `login` = '{$login}' LIMIT 1";

	return mysqli_query($db, $query);
}

?>
