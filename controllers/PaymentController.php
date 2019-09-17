<?php
include_once ('../models/IndexModel.php');

include_once ('../models/UsersModel.php');
include_once ('../models/PrivilegeModel.php');
include_once ('../models/SettingsModel.php');

include_once ('../models/Require.php');
include_once ('../models/DataBase.php');
include_once ('../models/PaymentModel.php');

$smarty->setTemplateDir(TemplatePrefix . 'payment/');

function indexAction($smarty){
	$FK = new FreeKassa;
	$prices = $FK->prices();
	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if(isset($CheckUser['referer'])){
		$Referer = GiveInfo($CheckUser['referer']);
	}else if(isset($_COOKIE['referal'])){
		$Referer = GiveInfo($_COOKIE['referal']);
	}
	$smarty->assign('Referer', $Referer);
	$smarty->assign('User', $CheckUser);
	$smarty->assign('prices', $prices);
	//$smarty->assign('captcha_sitekey', RECAPTCHA_1);
	loadTemplate($smarty, 'index');
}
function payAction(){
	$array = array_flip(array(1 => 7, 199 => 30, 349 => 60, 549 => 90, 859 => 180, 1399 => 360, 1999 => 9999));
	$FK = new FreeKassa;
	$FK->getURL();

}
function notificationAction(){

	$FK = new FreeKassa;
	$FK->payment();
}
function paymentStatus() { return [false,false]; }
