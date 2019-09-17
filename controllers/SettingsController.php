<?php

include_once ('../models/PrivilegeModel.php');


include_once ('../models/UsersModel.php');

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

	$GetAllSettings = GetAllSettings();
	$site_name = GetSettingByName('site_name');

	$smarty->assign('Title', $site_name);
	$smarty->assign('GetAllSettings', $GetAllSettings);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'settings');
}

function saveAction(){
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

	$data = $_POST;

	if($data == null)
		return header('Location: /index/?status=empty query');

	set_log("Обновил настройки сайта", $CheckUser['login']);
	saveSettings($data);

	return header('Location: ' . $_SERVER['HTTP_REFERER']);

}
