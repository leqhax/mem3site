<?php

include_once ('../models/UsersModel.php');
include_once ('../models/ProfileModel.php');

include_once ('../models/PrivilegeModel.php');
include_once ('../models/SettingsModel.php');


/* 				CHECK USER PRIVILEGE AND AUTHORIZATION 			*/
/*--------------------------------------------------------------*/
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /index/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=BANNED');

	if($GetPrivilege['flags']['access_adminpanel'] != 1)
		return header('Location: /index/?status=Нет доступа');

	if($GetPrivilege['flags']['access_user'] != 1)
		return header('Location: /admin/?status=Нет доступа');
/* !-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!- 	*/



function testAction($smarty){
	print_r (var_dump(RefTop()));
}

function indexAction($smarty){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /index/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=BANNED');

	if($GetPrivilege['flags']['access_adminpanel'] != 1)
		return header('Location: /index/?status=Нет доступа');

	if($GetPrivilege['flags']['access_user'] != 1)
		return header('Location: /admin/?status=Нет доступа');

	$site_name = GetSettingByName('site_name');

	$TableCount = TableCount('Users');
	$MaxCount = GetSettingByName('list_ul');
	$Page = $_GET['page'] ? $_GET['page'] : 0;

	$MaxList = floor($TableCount / $MaxCount);

	$Back = $Page - 1;
	$Next = $Page + 1;
	$CurrentPage = $Page;

	if($Page >= $MaxList){
		$Page = $MaxList * $MaxCount;
		$Next = $MaxList;
		$CurrentPage = $MaxList;
	}
	if($Page <= 0){
		$Page = 0;
		$Back = 0;
		$CurrentPage = 0;
	}
	if($Page > 0 && $Page < $MaxList){
		$CurrentPage = $Page;
		$Page = $Page * $MaxCount;
	}


	$GetAllUsers = GetAllYoutubers($Page, $MaxCount, $sort);
	for($i = 0;$i < count($GetAllUsers);$i++){
		$GetAllUsers[$i]['childs'] = GetAllChilds($GetAllUsers[$i]['login']);
		$GetAllUsers[$i]['ref_count'] = count($GetAllUsers[$i]['childs']);
	}
	

	$smarty->assign('Title', $site_name);
	$smarty->assign('GetAllUsers', $GetAllUsers);
	$smarty->assign('Back', $Back);
	$smarty->assign('CurrentPage', $CurrentPage);
	$smarty->assign('MaxList', $MaxList);
	$smarty->assign('Next', $Next);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));


	loadTemplate($smarty, 'referal');
}

function profileAction($smarty){


/* 				CHECK USER PRIVILEGE AND AUTHORIZATION 			*/
/*--------------------------------------------------------------*/
$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
if(!$CheckUser)
	return header('Location: /authorization/?status=ошибка авторизации');

$GetPrivilege = GetPrivilege($CheckUser['class']);
if(!$GetPrivilege)
	return header('Location: /index/?status=Ошибка привилегии');

if($GetPrivilege['flags']['access_site'] != 1)
	return header('Location: /index/?status=BANNED');

if($GetPrivilege['flags']['access_adminpanel'] != 1)
	return header('Location: /index/?status=Нет доступа');

if($GetPrivilege['flags']['access_user'] != 1)
	return header('Location: /admin/?status=Нет доступа');

/* !-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!- 	*/

	$Check = GiveInfo($_GET['id']);
	if($Check == false){
		return header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=Профиль не найден');
	}
	$id = $_GET['id'] ? $_GET['id'] : header('Location: /error?error=Profile-error');

	$User = GetUser($id);
	$User['childs'] = GetAllChilds($User['login']);
	$User['ref_count'] = count($User['childs']);
	$Tree = buildTree($User['login']);
	
	set_log("Открыл профиль пользователя [" . $User['login'] . "]", $CheckUser['login']);

	$site_name = GetSettingByName('site_name');

	$GetNamePrivilege = CGetAllPrivilege();

	$smarty->assign('Tree',$Tree);
	$smarty->assign('Title', $site_name);
	$smarty->assign('User', $User);
	$smarty->assign('GetNamePrivilege', $GetNamePrivilege);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'referer-profile');
}

function saveAction(){

/* 				CHECK USER PRIVILEGE AND AUTHORIZATION 			*/
/*--------------------------------------------------------------*/
$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
if(!$CheckUser)
	return header('Location: /authorization/?status=ошибка авторизации');

$GetPrivilege = GetPrivilege($CheckUser['class']);
if(!$GetPrivilege)
	return header('Location: /index/?status=Ошибка привилегии');

if($GetPrivilege['flags']['access_site'] != 1)
	return header('Location: /index/?status=BANNED');

if($GetPrivilege['flags']['access_adminpanel'] != 1)
	return header('Location: /index/?status=Нет доступа');

if($GetPrivilege['flags']['access_user'] != 1)
	return header('Location: /referers/?status=Нет доступа');

	if($GetPrivilege['flags']['edit_user'] != 1)
		return header('Location: /referers/?status=Нет доступа');
/* !-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!- 	*/


	if(!$_POST['id']){
		header('Location: /error/?error=save-error');
		exit();
	}

	$Check = GiveInfo($_POST['id']);

	foreach ($_POST as $key => $value) {
		$massive[$key] = $value;
	}
	set_log("Сохранил профиль [" . $Check['login'] . "]", $CheckUser['login']);

	saveUser($massive);

	header('Location: /referers/');
}


function searchAction($smarty){

/* 				CHECK USER PRIVILEGE AND AUTHORIZATION 			*/
/*--------------------------------------------------------------*/
$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
if(!$CheckUser)
	return header('Location: /authorization/?status=ошибка авторизации');

$GetPrivilege = GetPrivilege($CheckUser['class']);
if(!$GetPrivilege)
	return header('Location: /index/?status=Ошибка привилегии');

if($GetPrivilege['flags']['access_site'] != 1)
	return header('Location: /index/?status=BANNED');

if($GetPrivilege['flags']['access_adminpanel'] != 1)
	return header('Location: /index/?status=Нет доступа');

if($GetPrivilege['flags']['access_user'] != 1)
	return header('Location: /admin/?status=Нет доступа');

/* !-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!- 	*/

	$Check = GiveInfo($_POST['user']);

	if($GetPrivilege['flags']['edit_admin'] != 1){
		if($CheckUser['login'] == $Check['login']){
			return header('Location: /users/?status=нельзя себя редачить, хуйло ты ебаное');
		}
	}

	$id = $_POST['user'] ? $_POST['user'] : header('Location: /error?error=Profile-error');

	$User = GetUser($id);
	$User['subscription'] = date( 'd.m.Y H:i:s' ,$User['subscription']);
	$User['date_register'] = date( 'd.m.Y H:i:s' ,$User['date_register']);

	set_log("Открыл профиль [" . $User['login'] . "]", $CheckUser['login']);

	$site_name = GetSettingByName('site_name');

	$GetNamePrivilege = CGetAllPrivilege();

	$smarty->assign('Title', $site_name);
	$smarty->assign('User', $User);
	$smarty->assign('GetNamePrivilege', $GetNamePrivilege);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'referer-profile');
}

