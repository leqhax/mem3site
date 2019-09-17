<?php

include_once ('../models/IndexModel.php');

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



	$UserCount = GetAllUsers();

	foreach ($UserCount as $key => $value) {
		if($value['subscription'] >= time()){
			$bought[] = $value;
		}
	}

	$array['all-p'] = count($UserCount);
	$array['bought-p'] = count($bought);

	$array['default-p'] = $array['all-p'] - $array['bought-p'];
	$array['default'] = ceil((100 * ($array['all-p'] - $array['bought-p'])) / $array['all-p']);
	$array['bought'] 	= ceil((100 * $array['bought-p']) / $array['all-p']);


	$Status_Cheat = GetSettingByName('cheat_status');

	$smarty->assign('Title', $site_name);
	$smarty->assign('array', $array);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('Status_Cheat', $Status_Cheat);
	$smarty->assign('status', htmlspecialchars($_GET['status']));
	$smarty->assign('UserCount', $UserCount);

	loadTemplate($smarty, 'index');
}
