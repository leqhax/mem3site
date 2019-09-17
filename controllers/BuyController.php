<?php

include_once ('../models/UsersModel.php');

include_once ('../models/PrivilegeModel.php');
include_once ('../models/SettingsModel.php');


function IndexAction($smarty){
/* 				CHECK USER PRIVILEGE AND AUTHORIZATION 			*/
/*--------------------------------------------------------------*/
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(!$CheckUser)
		return header('Location: /authorization/?status=Ошибка авторизации');

	$GetPrivilege = GetPrivilege($CheckUser['class']);
	if(!$GetPrivilege)
		return header('Location: /admin/?status=Ошибка привилегии');

	if($GetPrivilege['flags']['access_site'] != 1)
		return header('Location: /index/?status=Забанен');

/* !-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!-!- 	*/

	$days = SECURE($_GET['id']);

	switch ($days) {
		case 7:$price = 70;break;
		case 14:$price = 99;break;
		case 30:$price = 149;break;
		case 60:$price = 249;break;
		case 90:$price = 349;break;
		case 180:$price = 649;break;
		case 360:$price = 1199;break;
		case 9999:$price = 1299;break;

		default:
			return header('Location: /buy/index/30/' . '?status=Не изменяйте значения самостоятельно.');
			break;
	}



	$site_name = GetSettingByName('site_name');
	$merchant = GetSettingByName('merchant_id');
	$secret = GetSettingByName('merchant_secret');

	$data = array(
		'shopid' => $merchant,
		'payno' => time(),
		'amount' => $price,
		'description' => $site_name,
		'uv_login' => $CheckUser['login'],
		'uv_days' => $days
	);

	ksort($data , SORT_STRING);

	$sign = hash('sha256',implode(':',$data).':'.$secret);




	$smarty->assign('Title', $site_name);
	$smarty->assign('Me', $CheckUser);

	$smarty->assign('data', $data);
	$smarty->assign('sign', $sign);

	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'buy');

}

function notificationAction(){

	$merchant = GetSettingByName('merchant_id');
	$secret = GetSettingByName('merchant_secret');

	$days = $_POST['uv_days'] ? $_POST['uv_days'] : exit();

	switch ($days) {
		case 7:$price = 70;break;
		case 14:$price = 99;break;
		case 30:$price = 149;break;
		case 60:$price = 249;break;
		case 90:$price = 349;break;
		case 180:$price = 649;break;
		case 360:$price = 1199;break;
		case 9999:$price = 1299;break

		default:
			return file_put_contents('error.txt', "ERROR [0]" . ' - ' . date('d.m.Y H:i:s') . "\n" , FILE_APPEND);
			break;
	}


	if(intval($_POST["amount"]) != $price)
		return file_put_contents('error.txt', "ERROR [1]" . ' - ' . date('d.m.Y H:i:s') . "\n" , FILE_APPEND);


	$sign = $_POST['sign'];

	unset($_POST['sign']);

	ksort($_POST , SORT_STRING);

	$signi = hash('sha256' , implode(':' , $_POST) . ':' . $secret);

	if($signi !== $sign)
		return file_put_contents('error.txt', "ERROR [2]" . ' - ' . date('d.m.Y H:i:s') . "\n" , FILE_APPEND);

	$login 	= $_POST['uv_login'];
	$days 	= $_POST['uv_days'];

	$User = GiveInfo($login);

	if($User == false)
		return file_put_contents('error.txt', "ERROR [3]" . ' - ' . date('d.m.Y H:i:s') . "\n" , FILE_APPEND);

	$days = $days * (60 * 60 * 24);

	AddNewUser($User['login'], $days);

	return file_put_contents('success.txt', $User['login'] . ' - ' . date('d.m.Y H:i:s') , FILE_APPEND);
}
