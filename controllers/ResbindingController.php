<?php

include_once ('../models/LogModel.php');

include_once ('../models/UsersModel.php');
include_once ('../models/PrivilegeModel.php');

include_once ('../models/SettingsModel.php');
include_once ('../models/TicketModel.php');

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

	$sort['sort'] = 'status';
	$sort['value'] = $_GET['sort'] ? $_GET['sort'] : null;


	$TableCount = TableCount('tickets', $sort);


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

	switch ($sort['value']) {
		case null:$srt = 'Все';break;
		case 'decline':	$srt = 'Отклонённые';break;
		case 'active':	$srt = 'Текущее';break;
		case 'accept':	$srt = 'Принятые';break;

		default:$srt = 'Выбрать';break;
	}

	$link = "/resbinding/?sort=" . $sort['value'];

	$GetAllTickets = GetAllTickets($Page, $MaxCount, $sort);

	$smarty->assign('Title', $site_name);
	$smarty->assign('GetAllTickets', $GetAllTickets);
	$smarty->assign('Back', $Back);
	$smarty->assign('CurrentPage', $CurrentPage);
	$smarty->assign('MaxList', $MaxList);
	$smarty->assign('Next', $Next);
	$smarty->assign('link', $link);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	$smarty->assign('sort', $srt);

	loadTemplate($smarty, 'reset-binding');
}


function acceptAction(){

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

	$id = $_GET['id'];
	$login = $_GET['login'];
	if(!$id)
		return header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=Пустое значение');

	set_log("Принял тикет [" . $id . "]", $CheckUser['login']);
	acceptTicket($id, $login , $CheckUser['login']);

	return header('Location: ' . $_SERVER['HTTP_REFERER']);
}
function declineAction(){

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


	$id = $_GET['id'];
	if(!$id)
		return header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=Пустое значение');

	set_log("Отклонил тикет [" . $id . "]", $CheckUser['login']);
	declineTicket($id, $CheckUser['login']);

	return header('Location: ' . $_SERVER['HTTP_REFERER']);

}
function deleteAction(){

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

		
	$id = $_GET['id'];
	if(!$id)
		return header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=Пустое значение');

	set_log("Удалил тикет [" . $id . "]", $CheckUser['login']);
	deleteTicket($id);

	return header('Location: ' . $_SERVER['HTTP_REFERER']);

}
?>
