<?php

include_once ('../models/UsersModel.php');
include_once ('../models/ProfileModel.php');

include_once ('../models/PrivilegeModel.php');
include_once ('../models/SettingsModel.php');

include_once ('../models/ConfigModel.php');

include_once ('../models/DownloadModel.php');

include_once ('../models/Require.php');


/* 				CHECK USER PRIVILEGE AND AUTHORIZATION 			*/
/*--------------------------------------------------------------*/
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /admin/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

/* !-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!- 	*/


function indexAction($smarty){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /admin/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

	$site_name = GetSettingByName('site_name');

	$Status_Cheat = GetSettingByName('cheat_status');


	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	$GetPrivilege = GetPrivilege($CheckUser['class']);
	$CheckUser['access_admin'] = $GetPrivilege['flags']['access_adminpanel'];
	$CurrentTime = time();

	// Привелегия 
	$GetTicketInfo = GetTicketInfo($CheckUser['login']);
	switch ($GetPrivilege['name']) {
		case 'user':
			$privel = 'Пользователь';
			break;
		case 'admin':
			$privel = 'Администратор';
			break;
		case 'Moderator':
			$privel = 'Модератор';
			break;
		case 'banned':
			$privel = 'Заблокированый';
			break;
		default:
			$privel = 'Пользователь';
			break;
	}
	if ($CheckUser['freez_status'] == 1) 
		$smarty->assign('timePodpis', second_v_date($CheckUser['subscription'], $CheckUser['freez_start']));
	$top = RefTop();
	$smarty->assign('Title', $site_name);
	$smarty->assign('Top', $top);
	$smarty->assign('RefCount',CountRefs($CheckUser['login']));
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('privel', $privel);
	$smarty->assign('LastTicket', $GetTicketInfo);
	$smarty->assign('CurrentTime', $CurrentTime);
	$smarty->assign('Status_Cheat', $Status_Cheat); 
	$smarty->assign('status', htmlspecialchars($_GET['status']));
	$smarty->assign('captcha_sitekey', RECAPTCHA_1);

	loadTemplate($smarty, 'profile');
}

function reset_passwordAction($smarty){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=Ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /admin/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

	$site_name = GetSettingByName('site_name');

	$CheckUser['access_admin'] = $GetPrivilege['flags']['access_adminpanel'];

	$smarty->assign('pageTitle', $site_name);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'profile-reset-password');
}
function reset_bindingAction($smarty){

	$site_name = GetSettingByName('site_name');
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=Ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /admin/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');
	$CheckUser['access_admin'] = $GetPrivilege['flags']['access_adminpanel'];


	$TicketInfo = GetTicketInfo($CheckUser['login']);

	$status_code = $_GET['status_code'] ?  $_GET['status_code'] : null;


	$smarty->assign('Title', $site_name);
	$smarty->assign('status_code', $status_code);
	$smarty->assign('Me', $CheckUser);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	$smarty->assign('TicketInfo', $TicketInfo);

	loadTemplate($smarty, 'profile-reset-binding');
}

function res_passAction(){

	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return returnMessage(0, 'Ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return returnMessage(0, 'Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return returnMessage(0, 'Аккаунт забанен');

	$old_password 	= md5($_POST['old_password']);
	$new_password 	= md5($_POST['new_password']);
	$new_password2 	= md5($_POST['new_password2']);

	$recaptcha = $_POST['g_recaptcha'];

	if (!settings::Captcha($recaptcha, RECAPTCHA_2))
		return returnMessage(0, 'Капча не заполнена!');

	if($new_password != $new_password2)
		return returnMessage(0, 'Новые пароли различаются');

	if(strlen($new_password) < 5)
		return returnMessage(0, 'Минимальная длина пароля [5]!');

	if(strlen($new_password) >= 50)
		return returnMessage(0, 'Максимальная длина пароля [50]!');

	if($CheckUser['password'] != $old_password)
		return returnMessage(0, 'Введите корректный старый пароль');

	if($CheckUser['password'] == $new_password)
		return returnMessage(0, 'Старый и новый пароль не должны совпадать!');

	set_log("Сбросил пароль" , $CheckUser['login']);

	resetPassword($CheckUser['login'] , $new_password);

	return returnMessage(1, 'Пароль успешно сброшен!');
}
function res_bindingAction(){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=Ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /admin/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

	$GetTicketInfo = GetTicketInfo($CheckUser['login']);

	if(!$CheckUser['binding'])
		return returnMessage(0, 'Идентификатор устройства пуст!');
		//return header('Location: /profile/reset_binding/?status_code=empty binding');

	if($GetTicketInfo != false && $GetTicketInfo['status'] == 'active')
		return returnMessage(0, 'Ваш тикет уже отправлен!');
		//return header('Location: /profile/reset_binding/?status_code=error submit');

	set_log("Создал запрос на сброс привязки" , $CheckUser['login']);
	resetBinding($CheckUser['login'],$_POST['message']);

	return returnMessage(1, 'Тикет на сброс привязки отправлен!');//header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function downloadAction(){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=Ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /admin/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

	if($CheckUser['subscription'] <= time()){
		return header('Location: /profile/');
	}

	//if (ini_get('zlib.output_compression'))
    //        ini_set('zlib.output_compression', 'Off');
	
	return header('Location: https://drive.google.com/file/d/1H_A5h2C9KaAaT7l2AVShRa90jtUMYJmw/view?usp=sharing');
	$directory = '../builds/MEMPHIS.exe';
	//$fp = fopen($derictory, "r");
	if (file_exists($directory)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="Loader.exe"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($directory));
    readfile($directory);
    exit;
	}

}

function freezonAction(){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if($CheckUser == false){
		$result['status'] = 0;
		$result['message'] = 'Авторизуйтесь!';
		return print_r(json_encode($result));
	}

	if($CheckUser['freez_status'] != 0){
		$result['status'] = 0;
		$result['message'] = 'Заморозка включена!';
		return print_r(json_encode($result));
	}
	if($CheckUser['subscription'] < time()){
		$result['status'] = 0;
		$result['message'] = 'Ваша подписка истекла ';
		return print_r(json_encode($result));
	}

	$freez = GetSettingByName('freez_delay') != 0 ? GetSettingByName('freez_delay') : 1;

	if($CheckUser['freez_start'] != null){
		if($CheckUser['freez_start'] < time()){
			$test = time() - $CheckUser['freez_start'];
			$freez_delay = $freez * 60 * 60 * 24;
			if($test < $freez_delay){
				$result['status'] = 0;
				$result['message'] = 'Замораживать можно только 1 раз в ' . $freez . ' дней';
				return print_r(json_encode($result));
			}
		}

	}

	if($CheckUser['freez_status'] != 0){
		$result['status'] = 0;
		$result['message'] = 'Заморозка уже включена!';
		return print_r(json_encode($result));
	}

	FreezOn($CheckUser['login']);

	$result['status'] = 1;
	$result['message'] = 'Подписка заморожена.';
	return print_r(json_encode($result));

}

function freezoffAction(){
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if($CheckUser == false){
		$result['status'] = 0;
		$result['message'] = 'Авторизуйтесь!';
		return print_r(json_encode($result));
	}

	if($CheckUser['freez_status'] != 1){
		$result['status'] = 0;
		$result['message'] = 'Заморозка уже выключена!';
		return print_r(json_encode($result));
	}

	if($CheckUser['freez_start'] > time()){
		$result['status'] = 0;
		$result['message'] = 'УХ, уже так быстро?';
		return print_r(json_encode($result));
	}

	$math = time() - $CheckUser['freez_start'];
	$AddTime = $CheckUser['subscription'] + $math;

	FreezOff($CheckUser['login']);
	FreezAddTime($CheckUser['login'], $AddTime);
	
	$result['status'] = 1;
	$result['message'] = 'Подписка разморожена.';
	return print_r(json_encode($result));
}

function returnMessage($type, $message)
{
	exit(json_encode(
		[
			'status' => $type,
			'message' => $message
		], JSON_UNESCAPED_UNICODE
	));
}

function second_v_date($sekund1, $sekund2)
{
	return round(($sekund1 - $sekund2) / 86400);
}


?>
