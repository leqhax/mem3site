<?php

include_once ('../models/IndexModel.php');

include_once ('../models/UsersModel.php');
include_once ('../models/PrivilegeModel.php');
include_once ('../models/SettingsModel.php');

include_once ('../models/CaptchaModel.php');

//header("Content-Type: application/json");

	$CheckUser = CheckUser($_COOKIE['login'], $_COOKIE['password']);
	if($CheckUser != false)
		return header('Location: /profile/');

function indexAction($smarty){
	$site_name = GetSettingByName('site_name');
	$site_key = GetSettingByName('site_key');

	$smarty->assign('Title', $site_name);
	$smarty->assign('site_key', $site_key);
	$smarty->assign('UserCount', $UserCount);
	$smarty->assign('status', htmlspecialchars($_GET['status']));

	loadTemplate($smarty, 'authorization');


}

function authAction(){

	$login = $_POST['login'];
	$password = $_POST['password'];

	if(Captcha($_POST['g-recaptcha-response'], GetSettingByName('secret_key')) == false){
		return header('Location: /authorization/?status=Ошибка ввода капчи');
	}

	if(!$login || !$password){
		return header('Location: /authorization/?status=заполните все поля');
	}

	if(!preg_match('/^[A-z0-9@.-_\/|)(!%]{5,50}$/', $login)){
		return header('Location: /authorization/?status=Запрещённые символы');
	}

	if($login && $password){
		$CheckUser = CheckUser($login, $password);
	}

	if(!$CheckUser){
		return header('Location: /authorization/?status=неправильные данные');
	}

	set_log("Авторизовался", $CheckUser['login']);

	setcookie('login', $login, time() + 60 * 60 * 24 * 1488, "/");
	setcookie('password', $password, time() + 60 * 60 * 24 * 1488, "/");

	return header('Location: /profile/');
}

function registerAction($smarty){
	$site_name = GetSettingByName('site_name');
	$site_key = GetSettingByName('site_key');

	$smarty->assign('Title', $site_name);
	$smarty->assign('site_key', $site_key);
	$smarty->assign('status', htmlspecialchars($_GET['status']));


	loadTemplate($smarty, 'register');

}

function regAction(){

	$login = $_POST['login'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if(Captcha($_POST['g-recaptcha-response'], GetSettingByName('secret_key')) == false){
		return header('Location: /authorization/register/?status=Ошибка ввода капчи');
	}

	if(!$login || !$email){
		return header('Location: /authorization/register/?status=заполните все поля');
	}

	if(!$password || !$password2){
		return header('Location: /authorization/register/?status=заполните все поля');
	}

	if($password != $password2){
		return header('Location: /authorization/register/?status=Пароли не совпадают.');
	}


	if(!preg_match("/^[0-9a-zA-Z_]{5,50}$/", $login)){
		return header('Location:  /authorization/register/?status=Запрещённые символы');
	}

	if(!preg_match('/^[A-z0-9@.-_\/|)(!%]{5,50}$/', $email)){
		return header('Location:  /authorization/register/?status=Запрещённые символы');
	}

	$Check = GiveInfo($login);
	if($Check){
		return header('Location: /authorization/register/?status=такой пользователь уже есть');
	}


	$Check = GiveInfo($email);
		if($Check){
			return header('Location: /authorization/register/?status=такой пользователь уже есть');
		}


	$class = GetSettingByName('default_privilege');

	register($login, $email, $password, $class);

	set_log("Зарегистрировался", $login);

	setcookie('login', $login, time() + 60 * 60, "/");
	setcookie('password', $password, time() + 60 * 60, "/");

	return header('Location: /profile/');
}

function logoutAction(){

	setcookie('login', $login, time() - 60 * 60, "/");
	setcookie('password', $password, time() - 60 * 60, "/");


	return header('Location: /index/');
}

function validAction(){
	$result['status'] = 1;
	$result['message'] = "Минимальная длинна логина [5]";
	return print_r(json_encode($result));
}

function validloginAction(){
	$result['status'] = 1;
	$result['message'] = "Минимальная длинна логина [5]";
	return print_r(json_encode($result));
}

function validpasswordAction(){
	$result['status'] = 1;
	$result['message'] = "Минимальная длинна логина [5]";
	return print_r(json_encode($result));
}
