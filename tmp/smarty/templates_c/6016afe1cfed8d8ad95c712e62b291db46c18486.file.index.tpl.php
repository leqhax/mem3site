<?php /* Smarty version Smarty-3.1.6, created on 2019-09-12 15:34:34
         compiled from "../views/new/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4053451295cad239add8e66-27015894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6016afe1cfed8d8ad95c712e62b291db46c18486' => 
    array (
      0 => '../views/new/index/index.tpl',
      1 => 1568291666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4053451295cad239add8e66-27015894',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5cad239ae9c07',
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
<?php if ($_valid && !is_callable('content_5cad239ae9c07')) {function content_5cad239ae9c07($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ru" class="page">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['Title']->value;?>
</title>
	<meta name="yandex-verification" content="b8b8d91f919db8cf" /> 
	<meta property="og:image" content="https://qweeq1337.000webhostapp.com/main/templates/new/img/og_img.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="description" content="MEMPHIS - Приватный чит №1 для CS:GO! Красивое вх, обход записи на видео и стримах, плавный легит, жетский рейдж, скинченджер. Становитесть богом CSGO прямо сейчас с приватным читом от MEMPHIS PROJECT">
	<meta name="keywords" content="MEMPHIS PROJECT, MEMPHIS, чит, ксго, чит для ксго, лучший, легитный чит,легит, рейдж MEMPHIS, приватный чит csgo, бесплатный чит csgo CSGO,CHEAT,HACK,FOR,HACK FOR CSGO,ЧИТ,legit,rage,visual,visuals,wh,aim,aimbot,trigger,triggerbot,best hack,perfect aim,killshot,memphis,legit cheat for csgo,counter strike, counter,strike,CS-GO,CS:GO,global,offensive,global offensive">
	<link rel="shortcut icon" href="https://qweeq1337.000webhostapp.com/main/templates/new/img/og_img.png">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	
</head>

<body class="flex flex-column a-center j-center body t-6">

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

 

<div class="__clicker"></div>
<div class="__wrap flex flex-column a-center j-center">
<!-- HEADER BLOCK =========== -->
<header class="header flex a-center container">
	<a href="/" class="header__logo f-black t-6">MEMPHIS</a>

	<nav class="header__menu flex a-center">
		<a href="/" class="menu__link menu__link_active t-6">Главная</a>
		<a href="/func" class="menu__link t-6">Функционал</a>
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
<main class="main flex flex-column j-center a-center">
<!-- WELCOME SECTION ========= -->
	<div class="welcome flex flex-column j-center container section" data-id="welcome">
		<h1 class="welcome__heading f-black">
			MEMPHIS — приватный <br> чит для СS:GO
		</h1>

		<h2 class="welcome__info">
			MEMPHIS - это новый и уникальный по своей стилистике чит, имеющий огромный функционал и хорошую защиту от бана. Понятный интерфейс и поддержка русского языка обеспечат вам удобство в настройке. Софт имеет отличный аим, красивейшие визуалы, обходящие запись на видео и инвентарь/профиль ченджеры.
		</h2>

		<div>
			<a href="/payment/" class="welcome__button t-6">Начать играть</a>
		</div>

		<strong class="welcome__working f-medium">Работает на Windows 7, 8-8.1, 10 - 64 BIT</strong>

		<div class="welcome__advantage flex a-center">
			<em class="advantage__plus advantage__plus_1 flex a-center">
				Постоянные обновления
			</em>

			<em class="advantage__plus advantage__plus_2 flex a-center">
				Большой функционал
			</em>

			<em class="advantage__plus advantage__plus_3 flex a-center">
				Большой <br> опыт в сфере
			</em>
		</div>

		<img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
logotype.png" alt="" class="welcome__wrap-img">
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

<noscript>
	<div style="background-color: rgba(0,0,0,.8); width: 100%; height: 100vh; position: fixed; top: 0; left: 0; text-align: center; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #fff; padding: 10px">
		<span>Пожалуйста, включите JavaScript в настройках браузера</span>
	</div>
</noscript>	
</body>
</html>
<?php }} ?>