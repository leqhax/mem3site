<?php /* Smarty version Smarty-3.1.6, created on 2019-09-12 16:20:30
         compiled from "../views/new/func.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19352512095cad2bc4eace86-43800409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0423123eea7192b8eafb5ad75c5ae1a7b1d1b61' => 
    array (
      0 => '../views/new/func.tpl',
      1 => 1568294424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19352512095cad2bc4eace86-43800409',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5cad2bc4f2725',
  'variables' => 
  array (
    'Title' => 0,
    'CSS' => 0,
    'User' => 0,
    'IMG' => 0,
    'captcha_sitekey' => 0,
    'JS' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cad2bc4f2725')) {function content_5cad2bc4f2725($_smarty_tpl) {?>﻿<!DOCTYPE html>
<html lang="ru" class="page">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['Title']->value;?>
</title>
	<meta property="og:image" content="https://qweeq1337.000webhostapp.com/main/templates/new/img/og_img.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="description" content="Чит для КСГО! Лучший легитный чит для КС ГО. Идеальное соотношение цены и качества. Cheat for csgo! Best legit cheat for counter strike. The best cheat on the market">
	<meta name="keywords" content="CSGO,CHEAT,HACK,FOR,HACK FOR CSGO,ЧИТ, чит, ксго, чит для ксго, лучший, легитный чит,легит,рейдж,legit,rage,visual,visuals,wh,aim,aimbot,trigger,triggerbot,best hack,perfect aim,killshot,aqua,aquacheat,legit cheat for csgo,counter strike, counter,strike,CS-GO,CS:GO,global,offensive,global offensive">
	<link rel="shortcut icon" href="https://qweeq1337.000webhostapp.com/main/templates/new/img/og_img.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
style.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
cocoen.min.css">
	<style>
		.cocoen {
			width: 1000px;
			height: 500px;
			border: 25px solid rgb(24, 26, 37);
			position: relative;
		}

		.cocoen-drag {
			width: 5px;
			background: -moz-linear-gradient(to top, #5933e5 0%, #e63336 100%);
			background: -webkit-linear-gradient(to top, #5933e5 0%,#e63336 100%); 
			background: linear-gradient(to top, #5933e5 0%,#e63336 100%);
		}
		
		.cocoen-drag::before {
			border: 5px solid #fff;
			border-radius: 20px;
			background: -moz-linear-gradient(to top, #5933e5 0%, #e63336 100%);
			background: -webkit-linear-gradient(to top, #5933e5 0%,#e63336 100%); 
			background: linear-gradient(to top, #5933e5 0%,#e63336 100%);
			width: 25px;
			height: 25px;
			margin-left: -12px;
			margin-top: -12px;			
		}

	</style>
	
</head>

<body class="flex flex-column a-center j-spacebetween body t-6">

<div class="alerts"></div>

<?php if ($_smarty_tpl->tpl_vars['User']->value==false){?>
<form class="auth-block flex flex-column __modalLogin" data-id="login" id="auth">
	<span class="auth-block__heading">Вход</span>
	<input type="text" class="auth-block__input auth-block__input_login login" placeholder="Логин">
	<input type="password" class="auth-block__input auth-block__input_password password" placeholder="Пароль">
	<div class="g-recaptcha"></div>
	<button class="auth-block__button t-6" type="submit">Войти</button>
	<!--<a href="#" class="auth-block__reset t-6">Забыл пароль?</a>-->
</form> 

<form class="auth-block flex flex-column __modalReg" data-id="reg" id="reg">
	<span class="auth-block__heading __Register">Регистрация</span>
	<input type="text" class="auth-block__input auth-block__input_login login" placeholder="Логин">
	<input type="text" class="auth-block__input auth-block__input_login email" placeholder="E-mail">
	<input type="password" class="auth-block__input auth-block__input_password password" placeholder="Пароль">
	<input type="password" class="auth-block__input auth-block__input_password password2" placeholder="Пароль еще раз">
	<div class="g-recaptcha"></div>
	<button class="auth-block__button t-6 __RegisterBtn">Зарегистрироваться</button>
	<span class="auth-block__info f-medium t-6">
		Нажимая на кнопку “Зарегистрироваться” вы соглашаетесь с условиями
		<a href="/agreements/" target="_blank" class="auth-block__agree t-6">соглашения</a>
	</span>
</form>
<?php }?>

 

	<div class="func-modal __funcModal card-style f-medium" data-id="1" style="max-height: 46.5%;">
		<img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
func-modal__img-1.png" alt="" class="func-modal__img">
	</div>

	<div class="func-modal __funcModal card-style f-medium" data-id="2" style="max-height: 46.5%;">
		<img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
func-modal__img-2.png" alt="" class="func-modal__img">
	</div>

	<div class="func-modal __funcModal card-style f-medium" data-id="4" style="height: 690px;max-height: 46.5%;">
		<img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
func-modal__img-4.png" alt="" class="func-modal__img">
	</div>

	<div class="func-modal card-style __funcModal f-medium" data-id="5" style="max-height: 46.5%;">
		<img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
func-modal__img-5.png" alt="" class="func-modal__img">
	</div>

	<div class="func-modal card-style __funcModal f-medium" data-id="6"  style="height: 735px;max-height: 46.5%;">
		<img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
func-modal__img-6.png" alt="" class="func-modal__img">
	</div>

<div class="__clicker"></div>
<div class="__wrap flex flex-column a-center j-center">
<!-- HEADER BLOCK =========== -->
<header class="header flex a-center container">
	<a href="/" class="header__logo f-black t-6">MEMPHIS</a>

	<nav class="header__menu flex a-center">
		<a href="/" class="menu__link t-6">Главная</a>
		<a href="/func" class="menu__link menu__link_active t-6">Функционал</a>
		<a href="/payment/" class="menu__link t-6">Купить</a>
	</nav>

	<div class="header__auth flex a-center">
		<?php if ($_smarty_tpl->tpl_vars['User']->value==false){?>
		<a class="auth__login f-medium t-6 __Login" data-id="login">Вход</a>
		<a class="auth__reg f-medium t-6 __Reg" data-id="reg">Регистрация</a>
		<?php }else{ ?>
		<a class="auth__reg f-medium t-6" href="/profile/"><?php echo $_smarty_tpl->tpl_vars['User']->value['login'];?>
</a>
		<?php }?>
	</div>
</header>
<!-- MAIN ROOT CONTAINER -->
<!-- MAIN ROOT CONTAINER -->
<main class="main main_func flex flex-wrap a-center">

	<strong class="section__heading f-bold">Функционал чита</strong>

	<div class="slider-func flex j-center a-center">
		<div class="cocoen card-style">
		  <img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
nohack.png" alt="">
		  <img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
withhack.png" alt="">
		</div>
	  <span class="cocean__info card-style">Как видит игрок</span>
		<span class="cocean__info card-style">Как видите Вы</span>
	</div>


	<div class="func f-medium __funcButton func_1 t-6 card-style" data-id="1">
		LEGITBOT
	</div>
	
	<div class="func f-medium __funcButton func_6 t-6 card-style" data-id="6">
		VISUALS	
	</div>

	<div class="func f-medium __funcButton func_4 t-6 card-style" data-id="4">
		INVENTORY
	</div>

	<div class="func f-medium __funcButton func_5 t-6 card-style" data-id="5">
		MISC
	</div>
	
	<div class="func f-medium __funcButton func_2 t-6 card-style" data-id="2">
		PROFILE
	</div>




</main>
	
<!-- FOOTER BLOCK ========== -->
<footer class="footer flex a-center">
	<span class="footer__copyright f-medium">MEMPHIS-PROJECT.RU ©2018-2019 Copyright</span>

	<div class="footer__social flex a-center">
		<a href="//www.free-kassa.ru/"><img src="//www.free-kassa.ru/img/fk_btn/18.png"></a>
		<a href="//vk.com/memphis_project" class="social__link social__link_vk t-6" target="_blank"></a>
	</div>
</footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit" async defer></script>
<script type="text/javascript">
	var recaptchaCallback = function() {
		$('.g-recaptcha').each(function(index, el) {
			var widgetId = grecaptcha.render(el, { 'sitekey' : '<?php echo $_smarty_tpl->tpl_vars['captcha_sitekey']->value;?>
', 'theme' : 'dark'});
			$(this).attr('data-widget-id', widgetId);
		});
	}
</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
script.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
cocoen.min.js"></script>
<script>
		new Cocoen(document.querySelector('.cocoen'));
</script>


<noscript>
	<div style="background-color: rgba(0,0,0,.8); width: 100%; height: 100vh; position: fixed; top: 0; left: 0; text-align: center; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #fff; padding: 10px">
		<span>Пожалуйста, включите JavaScript в настройках браузера</span>
	</div>
</noscript>	
</body>
</html>
<?php }} ?>