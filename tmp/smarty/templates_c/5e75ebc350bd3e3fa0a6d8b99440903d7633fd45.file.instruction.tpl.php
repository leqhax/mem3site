<?php /* Smarty version Smarty-3.1.6, created on 2019-09-12 15:18:38
         compiled from "../views/new/instruction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12168879065cad4e4d1053e8-68895117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e75ebc350bd3e3fa0a6d8b99440903d7633fd45' => 
    array (
      0 => '../views/new/instruction.tpl',
      1 => 1568290716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12168879065cad4e4d1053e8-68895117',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5cad4e4d196d8',
  'variables' => 
  array (
    'Title' => 0,
    'CSS' => 0,
    'User' => 0,
    'captcha_sitekey' => 0,
    'JS' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cad4e4d196d8')) {function content_5cad4e4d196d8($_smarty_tpl) {?><!DOCTYPE html>
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



<div class="auth-block auth-block_instruction flex flex-column card-style __modalInst" data-id="0" style="height: 550px">
	<span class="auth-block__heading f-medium block__heading_instruction" style="margin-bottom: 30px">Запуск чита</span>

	<span class="auth-block__info auth-block__info_instruction f-medium t-6">
		1. Скачайте лоадер в профиле <br>
		2. Перенесите его в любую папку<br>
		3. Запустите CS:GO<br>
		4. Запустите лоадер<br>
		5. Введите логин и пароль<br>
		6. Нажмите на кнопку Inject<br>
	</span>
</div>

<div class="auth-block auth-block_instruction flex flex-column card-style __modalInst" data-id="1" style="height: 630px">
	<span class="auth-block__heading f-medium block__heading_instruction" style="margin-bottom: 30px">Драйвера для чита</span>

	<span class="auth-block__info auth-block__info_instruction f-medium t-6">
		Драйвера необходимые для работы чита: <br>
		1. Все что нужно для работы чита вы можете - скачать <a href="//vk.com/topic-97412480_40553686" target="_blank" class="auth-block__agree t-6">здесь</a> <br>
		2. Советуем отключить Антивирус/Брандмауэр <br>
		3. Советуем обновить драйвера видеокарты <br>
	</span>
</div>

<div class="auth-block auth-block_instruction flex flex-column card-style __modalInst" data-id="2">
	<span class="auth-block__heading f-medium block__heading_instruction">Настройка чита</span>

	<span class="auth-block__info auth-block__info_instruction f-medium t-6">
		Готовые настройки для чита Вы можете скачать
		<a href="/cfg.rar" target="_blank" class="auth-block__agree t-6">здесь</a>
	</span>
</div>

<div class="auth-block auth-block_instruction flex flex-column card-style __modalInst" data-id="3" style="height: 630px">
	<span class="auth-block__heading f-medium block__heading_instruction" style="margin-bottom: 30px">Решение ошибок</span>

	<span class="auth-block__info auth-block__info_instruction f-medium t-6" style="font-size: 25px;">
	Ошибки и их решение.  <br>
	1. Windows не удается получить доступ - Необходимо выключить антивирус и брандмауэр <br>
	2. При скачивание появляется "Удалено: вирус" - Скачивание лоадера блокирует анти-вирус на ПК или встроенный в браузер, Необходимо выключить антивирус и брандмауэр. <br>
	3. Wrong login or password/Wrong Hwid - Если Вы не можете зайти в лоадер, значит у вас сменился HWID или неверные данные. Сбросить пароль и привязку вы можете в <a href="/profile/" target="_blank" class="auth-block__agree t-6">профиле</a>
	</span>
</div>

<div class="__clicker"></div>
<div class="__wrap flex flex-column a-center j-center" style="min-height: 100%;">

	<style>
		@media all and (min-width: 1700px) {
			.main {
				margin: 220px 0;
			}
		}
	</style>
<!-- HEADER BLOCK =========== -->
<header class="header flex a-center container">
	<a href="/" class="header__logo f-black t-6">MEMPHIS</a>

	<nav class="header__menu flex a-center">
		<a href="/" class="menu__link t-6">Главная</a>
		<a href="/func" class="menu__link t-6">Функционал</a>
		<a href="/payment/" class="menu__link t-6">Купить</a>
		<a href="/instruction/" class="menu__link menu__link_active t-6" >Инструкция</a>
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
</header><!-- MAIN ROOT CONTAINER -->
<!-- MAIN ROOT CONTAINER -->

<strong class="section__heading f-bold" style="margin-top:100px;">Инструкция чита</strong>
<main class="main main_inst flex flex-wrap a-center j-spacebetween" style="margin: 150px 0">

	<div class="section__heading f-bold">
	<span class="auth-block__heading f-medium block__heading_instruction">Запуск чита</span>

	<span class="auth-block__info auth-block__info_instruction f-medium t-6">
	<br>	Запуск чита: <br>
		1. Скачайте лоадер в профиле <br>
		2. Перенесите его в любую папку<br>
		3. Запустите CS:GO<br>
		4. Запустите лоадер<br>
		5. Введите логин и пароль<br>
		6. Нажмите на кнопку Inject<br>
		</span>
	</div>


	<div class="section__heading f-bold">
	<span class="auth-block__heading f-medium block__heading_instruction">Драйвера для чита</span>

	<span class="auth-block__info auth-block__info_instruction f-medium t-6">
	<br>	Драйвера необходимые для работы чита: <br>
		1. Все что нужно для работы чита вы можете - скачать <a href="//vk.com/topic-97412480_40553686" target="_blank" class="auth-block__agree t-6">здесь</a> <br>
		2. Советуем отключить Антивирус/Брандмауэр <br>
		3. Советуем обновить драйвера видеокарты <br>
		</span>
	</div>
	
	
	<div class="section__heading f-bold">
	<span class="auth-block__heading f-medium block__heading_instruction">Настройки чита</span>

	<span class="auth-block__info auth-block__info_instruction f-medium t-6">
	<br>	Готовые настройки для чита Вы можете скачать <a href="/cfg.rar" target="_blank" class="auth-block__agree t-6">здесь</a>
		</span>
	</div>
	

	<div class="section__heading f-bold">
	<span class="auth-block__heading f-medium block__heading_instruction">Решение ошибок</span>

	<span class="auth-block__info auth-block__info_instruction f-medium t-6">
	<br>	Ошибки и их решение: <br>
	1. Windows не удается получить доступ - Необходимо выключить антивирус и брандмауэр <br>
	2. При скачивание появляется "Удалено: вирус" - Скачивание лоадера блокирует анти-вирус на ПК или встроенный в браузер, Необходимо выключить антивирус и брандмауэр. <br>
	3. Wrong login or password/Wrong Hwid - Если Вы не можете зайти в лоадер, значит у вас сменился HWID или неверные данные. Сбросить пароль и привязку вы можете в <a href="/profile/" target="_blank" class="auth-block__agree t-6">профиле</a>
		</span>
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
inst.js"></script>


<noscript>
	<div style="background-color: rgba(0,0,0,.8); width: 100%; height: 100vh; position: fixed; top: 0; left: 0; text-align: center; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #fff; padding: 10px">
		<span>Пожалуйста, включите JavaScript в настройках браузера</span>
	</div>
</noscript>	
</body>
</html>
<?php }} ?>