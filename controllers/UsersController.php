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


	$GetAllUsers = GetAllUsers($Page, $MaxCount, $sort);


	$smarty->assign('Title', $site_name);
	$smarty->assign('GetAllUsers', $GetAllUsers);
	$smarty->assign('Back', $Back);
	$smarty->assign('CurrentPage', $CurrentPage);
	$smarty->assign('MaxList', $MaxList);
	$smarty->assign('Next', $Next);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));


	loadTemplate($smarty, 'users');
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


	$id = $_GET['id'] ? $_GET['id'] : 0;


	$Check = GiveInfo($id);

	if($GetPrivilege['flags']['edit_admin'] == 1){
		if($CheckUser['login'] == $Check['login']){
			return header('Location: /users/?status=нельзя себя удалить, хуйло ты ебаное');
		}
	}

	set_log("Удалил пользователя [" . $Check['login'] . "]", $CheckUser['login']);

	if($id)
		deleteUser($id);

	return header('Location: ' . $_SERVER['HTTP_REFERER']);
}


function profileAction($smarty){


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

	$Check = GiveInfo($_GET['login-id']);

	if($Check == false){
		return header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=Профиль не найден');
	}

	if($GetPrivilege['flags']['edit_admin'] != 1){
		if($CheckUser['login'] == $Check['login']){
			return header('Location: /users/?status=нельзя себя редачить, хуйло ты ебаное');
		}
	}

	$id = $_GET['login-id'] ? $_GET['login-id'] : header('Location: /error?error=Profile-error');

	$User = GetUser($id);
	$User['subscription'] = date( 'd.m.Y H:i:s' ,$User['subscription']);
	$User['date_register'] = date( 'd.m.Y H:i:s' ,$User['date_register']);

	set_log("Открыл профиль пользователя [" . $User['login'] . "]", $CheckUser['login']);

	$site_name = GetSettingByName('site_name');

	$GetNamePrivilege = CGetAllPrivilege();

	$smarty->assign('Title', $site_name);
	$smarty->assign('User', $User);
	$smarty->assign('GetNamePrivilege', $GetNamePrivilege);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'user-profile');
}


function addAction($smarty){
	$site_name = GetSettingByName('site_name');

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

	$smarty->assign('Title', $site_name);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'user-add');
}

function addnewuserAction(){


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
	$Login = $_POST['login'] ? $_POST['login'] : 0;

	if(GiveInfo($Login) == false){
		return header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=Профиль не найден');
	}

	$Seconds = $_POST['seconds'] ? $_POST['seconds'] : 0;
	$Minuts = $_POST['minuts'] ? ($_POST['minuts'] * 60) : 0;
	$Hours = $_POST['hours'] ? ($_POST['hours'] * 60 * 60) : 0;
	$Days = $_POST['days'] ? ($_POST['days'] * 60 * 60 * 24) : 0;
	$Weeks = $_POST['weeks'] ? ($_POST['weeks'] * 60 * 60 * 24 * 7) : 0;
	$Months = $_POST['months'] ? ($_POST['months'] * 60 * 60 * 24 * 30) : 0;
	$Years = $_POST['years'] ? ($_POST['years'] * 60 * 60 * 24 * 30 * 12) : 0;

	$result = $Seconds + $Minuts + $Hours + $Days + $Weeks + $Months + $Years;

	if($result <= 0){
		return header('Location: ' . $_SERVER['HTTP_REFERER'] . "?status=пустой запрос");
	}

	set_log("Добавлена подписка, логин [" . $Login . "] , кол-во времени [" . $result . "]", $CheckUser['login']);

	AddNewUser($Login, $result);

	return header('Location: /users/');
}

function saveAction(){

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


	if(!$_POST['id']){
		header('Location: /error/?error=save-error');
		exit();
	}

	$Check = GiveInfo($_POST['id']);

	if($GetPrivilege['flags']['edit_admin'] != 1){
		if($CheckUser['login'] == $Check['login']){
			return header('Location: /users/?status=нельзя себя редачить, хуйло ты ебаное');
		}
	}

	foreach ($_POST as $key => $value) {
	    if($key == 'class' && ($GetPrivilege['flags']['edit_admin'] != 1 && (GetPrivilege($value)['id'] >= $GetPrivilege['id'] || GetPrivilege($Check['class'])['id'] >= $GetPrivilege['id'])))
            return header('Location: /index/?status=Нельзя редачить привелегии, хуйло ты ебаное!');
		$massive[$key] = $value;
	}
	set_log("Сохранил профиль [" . $Check['login'] . "]", $CheckUser['login']);

	saveUser($massive);

	header('Location: /users/');
}


function searchAction($smarty){

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

	loadTemplate($smarty, 'user-profile');
}

function setclassAction(){//BANNED

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



	$id = $_GET['id'] ? $_GET['id'] : header('Location: ' . $_SERVER['HTTP_REFERER']);

	$Check = GiveInfo($id);
    if($GetPrivilege['flags']['edit_admin'] != 1 && $id < $Getprivilege['id'])
        return header('Location: /index/?status=Нельзя редачить привелегии, хуйло ты ебаное!');

	if($CheckUser['login'] == $Check['login'])
	{
		if($GetPrivilege['flags']['edit_admin'] == 1){
				setclassUser($id);
		}else{return header('Location: /admin/?status=нельзя себя редачить, хуйло ты ебаное');}
	}else{
		setclassUser($id);
	}
	set_log("Забанил [" . $Check['login'] . "]", $CheckUser['login']);

	return header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function AddAllTimeAction(){

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

	$time = $_POST['addtime'];

	if($time == null)
		return header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=пустое время');

	$GetAllUsers = GetAllUsers();

	foreach ($GetAllUsers as $key => $value) {
		if($value['subscription'] >= time()){
			$array[] = $value;
		}
	}

	set_log("Добавил всем [" . ($time) . "] д", $CheckUser['login']);

	AddAllTime($array, $time);

	return header('Location: ' . $_SERVER['HTTP_REFERER']);
}
