<?php

include_once ('../models/PrivilegeModel.php');


include_once ('../models/UsersModel.php');
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
		return header('Location: /index/?status=Забанен');

	if($GetPrivilege['flags']['access_privilege'] != 1)
		return header('Location: /admin/?status=Нет доступа');
/* !-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!- 	*/


function indexAction($smarty){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /index/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

	if($GetPrivilege['flags']['access_privilege'] != 1)
		return header('Location: /admin/?status=Нет доступа');

	$site_name = GetSettingByName('site_name');

	$TableCount = TableCount('Privilege');
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


	$GetAllPrivilege = GetAllPrivilege($Page, $MaxCount);

	$smarty->assign('Title', $site_name);
	$smarty->assign('GetAllPrivilege', $GetAllPrivilege);
	$smarty->assign('Back', $Back);
	$smarty->assign('CurrentPage', $CurrentPage);
	$smarty->assign('MaxList', $MaxList);
	$smarty->assign('Next', $Next);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'privilege');
}


function createAction($smarty){

	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /index/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

	if($GetPrivilege['flags']['access_privilege'] != 1)
		return header('Location: /admin/?status=Нет доступа');

	$site_name = GetSettingByName('site_name');




	$name = $_POST['name'] ? $_POST['name'] : 0;

	$array['inject'] = $_POST['inject'] ? 1 : 0;
	$array['access_site'] = $_POST['access_site'] ? 1 : 0;
	$array['access_user'] = $_POST['access_user'] ? 1 : 0;
	$array['access_privilege'] = $_POST['access_privilege'] ? 1 : 0;
	$array['access_adminpanel'] = $_POST['access_adminpanel'] ? 1 : 0;
	$array['access_settings'] = $_POST['access_settings'] ? 1 : 0;
	$array['access_log'] = $_POST['access_log'] ? 1 : 0;
	$array['submission_sub'] = $_POST['submission_sub'] ? 1 : 0;
	$array['edit_user'] = $_POST['edit_user'] ? 1 : 0;
	$array['delete_user'] = $_POST['delete_user'] ? 1 : 0;
	$array['access_resbind'] = $_POST['access_resbind'] ? 1 : 0;
	$array['edit_admin'] = $_POST['edit_admin'] ? 1 : 0;
	if(isset($_POST['name'])){
		if($name == null){
			return header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=Введите имя');
		}else{
			set_log("Создал привилегию [" . $name . "]", $CheckUser['login']);
			createPrivilege($name , $array);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}



	$smarty->assign('Title', $site_name);
	$smarty->assign('pageTitle', $site_name);
	$smarty->assign('status_code', $status_code);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'privilege-create');
}


function deleteAction($smarty){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /index/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

	if($GetPrivilege['flags']['access_privilege'] != 1)
		return header('Location: /admin/?status=Нет доступа');


	$id = $_GET['privilege-id'] ? $_GET['privilege-id'] : header('Location: /error?error=privilege-delete');

	set_log("Удалил привилегию [" . $id . "]", $CheckUser['login']);

	deletePrivilege($id);

	return header('Location: ' . $_SERVER['HTTP_REFERER']);
}


function infoAction($smarty){

	$site_name = GetSettingByName('site_name');

	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /index/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

	if($GetPrivilege['flags']['access_privilege'] != 1)
		return header('Location: /admin/?status=Нет доступа');


	$id = $_GET['privilege-id'] ? $_GET['privilege-id'] : header('Location: /error?error=privilege-info');

	set_log("Открыл привилегию [" . $id . "]", $CheckUser['login']);

	$GetPrivilege = GetPrivilege($id);

	$smarty->assign('Title', $site_name);
	$smarty->assign('GetPrivilege', $GetPrivilege);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'privilege-info');
}
function saveAction(){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /index/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

	if($GetPrivilege['flags']['access_privilege'] != 1)
		return header('Location: /admin/?status=Нет доступа');

		
	$id = $_POST['id'] ? $_POST['id'] : 0;
	$name = $_POST['name'] ? $_POST['name'] : 0;

	$array['inject'] = $_POST['inject'] ? 1 : 0;
	$array['access_site'] = $_POST['access_site'] ? 1 : 0;
	$array['access_user'] = $_POST['access_user'] ? 1 : 0;
	$array['access_privilege'] = $_POST['access_privilege'] ? 1 : 0;
	$array['access_adminpanel'] = $_POST['access_adminpanel'] ? 1 : 0;
	$array['access_settings'] = $_POST['access_settings'] ? 1 : 0;
	$array['access_log'] = $_POST['access_log'] ? 1 : 0;
	$array['submission_sub'] = $_POST['submission_sub'] ? 1 : 0;
	$array['edit_user'] = $_POST['edit_user'] ? 1 : 0;
	$array['delete_user'] = $_POST['delete_user'] ? 1 : 0;
	$array['access_resbind'] = $_POST['access_resbind'] ? 1 : 0;
	$array['edit_admin'] = $_POST['edit_admin'] ? 1 : 0;

	if(isset($_POST['id'])){
		if($id == null){
			return header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=Введите имя');
		}else{
			set_log("Сохранил привилегию [" . $id . "]", $CheckUser['login']);
			savePrivilege($id, $name , $array);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
