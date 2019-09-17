<?php

/**
 *
 * Основные функции
 * 
 */

/**
 * Формирование запрашиваемой страницы
 * 
 * @param string $controllerName название контроллера
 * @param string $actionName название функции обработки страницы 
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){
	
	@include_once PathPrefix . $controllerName . PathPostfix;
   
    @$function = $actionName . 'Action';
    @$function($smarty);
}


function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TemplatePostfix);
}


function d($value = null, $die = 1)
{
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';
    
    if($die) die;
}

function createSmartyRsArray($result)
{
	if (!$result) return false;

	$smartyRs = array();
	while  ($row = mysqli_fetch_assoc($result))
	{
		$smartyRs[] = $row;
	}
	return $smartyRs;
}



	
function SECURE($string){
	global $db;
	
	$string = htmlspecialchars(mysqli_escape_string($db, $string));

	return $string;
}


function TableCount ($Table = null, $sort = null){
	global $db;
	if($Table == null){return false;}

	$Table = SECURE($Table);

	if($sort['value']){
		$sort['sort'] = SECURE($sort['sort']);
		$sort['value'] = SECURE($sort['value']);
		$query = "SELECT COUNT(*) FROM $Table WHERE `{$sort['sort']}` = '{$sort['value']}'";
	}else{
		$query = "SELECT COUNT(*) FROM $Table WHERE 1";
	}

	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);

	return $row['COUNT(*)'];
}

function set_log($action, $login){
	global $db;

	$action = SECURE($action);
	$login = SECURE($login);
	$time = time();
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
		$ip = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
	}
	
	$ip = SECURE($ip);
	
	$query = "INSERT INTO `logs` (`login`, `action`, `ip` , `time`) VALUES ('{$login}' , '{$action}' , '{$ip}' , '{$time}')";

	return mysqli_query($db, $query);
}

function QUERY($query, $action = 0){
	global $db;

	$query = SECURE($query);
	$action = SECURE($action);

	$result = mysqli_query($db, $query);

	if($action != 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}
	return $result;
}