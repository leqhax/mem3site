<?php

include_once ('../models/IndexModel.php');

include_once ('../models/UsersModel.php');
include_once ('../models/PrivilegeModel.php');
include_once ('../models/SettingsModel.php');

function indexAction($smarty){

	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);


	$smarty->assign('User', $CheckUser);
	$smarty->assign('captcha_sitekey', RECAPTCHA_1);

	loadTemplate($smarty, 'agreements');
}
