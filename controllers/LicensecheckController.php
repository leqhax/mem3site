<?php
include_once ('../models/UsersModel.php'); // UserModel
include_once ('../models/LicenseModel.php'); // LicenseModel
include_once ('../models/PrivilegeModel.php');
include_once ('../models/SettingsModel.php');


function indexAction(){

	$login 		= $_GET['login'];
	$password 	= $_GET['password'];
	$binding 	= $_GET['binding'];
	$token 		= $_GET['token'];

	if($binding == null){return print_r('error1440');}
	if($login == null){return print_r('error1440');}
	if($password == null || $token == null)
	{
		$User = CheckUserByLogHWID($login,$binding);
		if($User == false)
			return print_r('error1440'); //{return print_r('error1440');}
		if($User['binding'] == null){ 
		EnterBinding($User['login'], $binding);
		}
		$CheatStatus = GetSettingByName('cheat_status');
		if($CheatStatus != '1'){return print_r('error0');}

		if($User['subscription'] <= time()){
			return print_r('errorTIME');
		}

		if($User['freez_status'] != 0){
			return print_r('errorFreez');
		}
		
		$lefttime = intval(($GetUserInfo['subscription'] - time()) / 60 / 60 / 24);

		return print_r(md5($login . $binding . 'NuB50bdQeFzFbKZAkhLp'));
	}

	//$version = GetSettingByName('version');

	$TOKEN = TOKEN($login, $password, $binding, $token);//$version, 

	if($TOKEN == false){return print_r('gg');}


	$User = CheckUser($login, $password);
	if($User == false){return print_r('error1403');}

	$CheatStatus = GetSettingByName('cheat_status');
	if($CheatStatus != '1'){return print_r('error0');}

	
	if($User['binding'] != null){ 

		if($User['binding'] != $binding){return print_r('errorHWID');}

	}else{
		EnterBinding($User['login'], $binding);
	}

	if($User['subscription'] <= time()){
		return print_r('errorTIME');
	}
	
	if($User['freez_status'] != 0){
		return print_r('errorFreez');
	}

	$lefttime = intval(($GetUserInfo['subscription'] - time()) / 60 / 60 / 24);

	return print_r(md5($TOKEN . 'NuB50bdQeFzFbKZAkhLp'));
}

function timeAction(){

	return print_r(date('d.m.Y H:i'));
}

function injectAction(){
	$login 		= $_GET['login'];
	$password 	= $_GET['password'];
	$binding 	= $_GET['binding'];
	$token 		= $_GET['token'];

	if($binding == null){return print_r('error1440');}
	if($login == null){return print_r('error1440');}
	if($password == null || $token == null)
	{
		$User = CheckUserByLogHWID($login,$binding);
		if($User == false)
			return print_r('error1440'); //{return print_r('error1440');}
		if($User['binding'] == null){ 
		EnterBinding($User['login'], $binding);
		}
		$CheatStatus = GetSettingByName('cheat_status');
		if($CheatStatus != '1'){return print_r('error0');}

		if($User['subscription'] <= time()){
			return print_r('errorTIME');
		}
		
		if($User['freez_status'] != 0){
			return print_r('errorFreez');
		}

		$lefttime = intval(($GetUserInfo['subscription'] - time()) / 60 / 60 / 24);

	    return print_r(file_get_contents("../312asd1264as1sf23"));
	}

	//$version = GetSettingByName('version');

	$TOKEN = TOKEN($login, $password, $binding, $token);//$version, 

	if($TOKEN == false){return print_r('gg');}


	$User = CheckUser($login, $password);
	if($User == false){return print_r('error1403');}

	$CheatStatus = GetSettingByName('cheat_status');
	if($CheatStatus != '1'){return print_r('error0');}

	
	if($User['binding'] != null){ 

		if($User['binding'] != $binding){return print_r('errorHWID');}

	}else{
		EnterBinding($User['login'], $binding);
	}

	if($User['subscription'] <= time()){
		return print_r('errorTIME');
	}
	
	if($User['freez_status'] != 0){
		return print_r('errorFreez');
	}

	$lefttime = intval(($GetUserInfo['subscription'] - time()) / 60 / 60 / 24);

	return print_r(file_get_contents("../312asd1264as1sf23"));
}

?>