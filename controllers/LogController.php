<?php

include_once ('../models/LogModel.php');

include_once ('../models/UsersModel.php');
include_once ('../models/PrivilegeModel.php');

include_once ('../models/SettingsModel.php');

/* 				CHECK USER PRIVILEGE AND AUTHORIZATION 			*/
/*--------------------------------------------------------------*/
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
    if(!$CheckUser)
        return header('Location: /authorization/?status=ошибка авторизации');

    if($CheckUser['login'] == 'spjkee1488' OR $CheckUser['login'] == 'milky'){}
    else{
        $GetPrivilege = GetPrivilege($CheckUser['class']);
        if(!$GetPrivilege)
            return header('Location: /index/?status=Ошибка привилегии');


        if($GetPrivilege['flags']['access_site'] != 1)
            return header('Location: /index/?status=Забанен');

        if($GetPrivilege['flags']['access_adminpanel'] != 1)
            return header('Location: /index/?status=Нет доступа.');
    }
/* !-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!- 	*/


function indexAction($smarty){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
    if(!$CheckUser)
        return header('Location: /authorization/?status=ошибка авторизации');

    if($CheckUser['login'] == 'spjkee1488' OR $CheckUser['login'] == 'milky'){}
    else{
        $GetPrivilege = GetPrivilege($CheckUser['class']);
        if(!$GetPrivilege)
            return header('Location: /index/?status=Ошибка привилегии');


        if($GetPrivilege['flags']['access_site'] != 1)
            return header('Location: /index/?status=Забанен');

        if($GetPrivilege['flags']['access_adminpanel'] != 1)
            return header('Location: /index/?status=Нет доступа.');
    }

	$site_name = GetSettingByName('site_name');

	$TableCount = TableCount('logs');
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


	$GetAllLogs = GetAllLogs($Page, $MaxCount);

	$smarty->assign('Title', $site_name);
	$smarty->assign('GetAllLogs', $GetAllLogs);
	$smarty->assign('Back', $Back);
	$smarty->assign('CurrentPage', $CurrentPage);
	$smarty->assign('MaxList', $MaxList);
	$smarty->assign('Next', $Next);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));


	loadTemplate($smarty, 'logs');
}


function deleteAction(){


/* 				CHECK USER PRIVILEGE AND AUTHORIZATION 			*/
/*--------------------------------------------------------------*/
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
    if(!$CheckUser)
        return header('Location: /authorization/?status=ошибка авторизации');

    if($CheckUser['login'] == 'spjkee1488' OR $CheckUser['login'] == 'milky'){}
    else{
        $GetPrivilege = GetPrivilege($CheckUser['class']);
        if(!$GetPrivilege)
            return header('Location: /index/?status=Ошибка привилегии');


        if($GetPrivilege['flags']['access_site'] != 1)
            return header('Location: /index/?status=Забанен');

        if($GetPrivilege['flags']['access_adminpanel'] != 1)
            return header('Location: /index/?status=Нет доступа.');
    }

	//if($GetPrivilege['flags']['delete_user'] != 1)
		//return header('Location: /error/?error=privilege accesss denied');
/* !-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!- 	*/


	$id = $_GET['id'] ? $_GET['id'] : 0;

	if($id)
		deleteLog($id);

	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function profileAction($smarty){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
    if(!$CheckUser)
        return header('Location: /authorization/?status=ошибка авторизации');

    if($CheckUser['login'] == 'spjkee1488' OR $CheckUser['login'] == 'milky'){}
    else{
        $GetPrivilege = GetPrivilege($CheckUser['class']);
        if(!$GetPrivilege)
            return header('Location: /index/?status=Ошибка привилегии');


        if($GetPrivilege['flags']['access_site'] != 1)
            return header('Location: /index/?status=Забанен');

        if($GetPrivilege['flags']['access_adminpanel'] != 1)
            return header('Location: /index/?status=Нет доступа.');
    }

	$site_name = GetSettingByName('site_name');

	$login = $_GET['login'] ? $_GET['login'] : header('Location: ' . $_SERVER['HTTP_REFERER']);

	$TableCount = profile($login);

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

	$GetLogs = GetLogs($Page, $MaxCount, $login);

	$smarty->assign('Title', $site_name);
	$smarty->assign('GetLogs', $GetLogs);
	$smarty->assign('Back', $Back);
	$smarty->assign('CurrentPage', $CurrentPage);
	$smarty->assign('MaxList', $MaxList);
	$smarty->assign('Next', $Next);
	$smarty->assign('login', $login);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'logs-profile');
}

function deletelogbyloginAction(){

	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
    if(!$CheckUser)
        return header('Location: /authorization/?status=ошибка авторизации');

    if($CheckUser['login'] == 'spjkee1488' OR $CheckUser['login'] == 'milky'){}
    else{
        $GetPrivilege = GetPrivilege($CheckUser['class']);
        if(!$GetPrivilege)
            return header('Location: /index/?status=Ошибка привилегии');


        if($GetPrivilege['flags']['access_site'] != 1)
            return header('Location: /index/?status=Забанен');

        if($GetPrivilege['flags']['access_adminpanel'] != 1)
            return header('Location: /index/?status=Нет доступа.');
    }
	$login = $_POST['login'] ? $_POST['login'] : header('Location: ' . $_SERVER['HTTP_REFERER']);

	if($login){
		deleteLogByLogin($login);
	}

	return header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>
