<?php /* Smarty version Smarty-3.1.6, created on 2019-09-12 17:38:13
         compiled from "../views/new/agreements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7922238345cad8c06a0d335-42296802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cf4bbb37aa99c2cfb2aabc8f002e110a7cb1183' => 
    array (
      0 => '../views/new/agreements.tpl',
      1 => 1568280253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7922238345cad8c06a0d335-42296802',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5cad8c06a894b',
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
<?php if ($_valid && !is_callable('content_5cad8c06a894b')) {function content_5cad8c06a894b($_smarty_tpl) {?><!DOCTYPE html>
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

<div class="auth-block auth-block_instruction flex flex-column __modalInst" data-id="inst">
	<span class="auth-block__heading f-medium block__heading_instruction">Настройка чита</span>

	<span class="auth-block__info auth-block__info_instruction card-style f-medium t-6">
		Готовые настройки для чита Вы можете скачать
		<a href="./agreements.html" target="_blank" class="auth-block__agree t-6">здесь</a>
	</span>
</div>

<div class="__clicker"></div>
<div class="__wrap flex flex-column a-center j-center">
<!-- HEADER BLOCK =========== -->
<header class="header flex a-center container">
	<a href="/" class="header__logo f-black t-6">MEMPHIS</a>

	<nav class="header__menu flex a-center">
		<a href="/" class="menu__link t-6">Главная</a>
		<a href="/func" class="menu__link t-6">Функционал</a>
		<a href="/payment/" class="menu__link t-6">Купить</a>
		<a href="/instruction/" class="menu__link t-6" >Инструкция</a>
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
<main class="main flex j-center a-center">

	<div class="agreements flex flex-wrap container a-center j-center" data-id="youtube">
		<strong class="section__heading f-bold">Пользовательское соглашение</strong>

		<div class="agreements__text card-style">
Регистрируясь на сайте и используя наше программное обеспечение, вы соглашаетесь со следующими пунктами и признаете, что вы получили услугу в виде подписки на програмное обеспечение, пожертвовав ваши средства нам на развитие проекта: <br>
1. Запрещается: передавать, продавать или обменивать свой доступ к платным материалам сайта. Пытаться декомпилировать или реконструировать любое программное обеспечение, содержащееся на веб-сайте. Использовать материалы сайта в коммерческих целях.  <br>
2. Отвественность  <br>
Мы (в т.ч. наши партнеры) не несем ответственность за прямой, косвенный, случайный или иной вид ущерба вашему аккаунту.  <br>
3. Подписка  <br>
Вы можете обращаться в нашу техническую поддержку, в любой момент через сообщения группы ВКонтакте ( https://vk.com/memphis_project ). Подписка «навсегда» будет работать до тех пор, пока сайт и ПО MEMPHIS продолжат своё существование.  <br>
4. Наказание: пользователи, которые будут уличины в нарушение настоящего пользовательского соглашения, будут немедленно заблокированы на сайте, в программном обеспечении и других наших ресурсах. <br>
5. Подписка может быть в любой момент остановлена администрацией сайта за нарушение настоящих правил группы/соглашения. Возврат денег за подписку невозможен.  <br>
Дни подписки которые были утеряны по нашей вине, будут возвращены.  <br>
 <br>
Пользователь, регистрируясь на сайте, принимает настоящее согласие на обработку персональных данных (далее – Согласие). Действуя свободно, своей волей и в своем интересе, а также подтверждая свою дееспособность, Пользователь дает свое согласие на обработку своих персональных данных со следующими условиями: <br>
1. Данное Согласие дается на обработку персональных данных, как без использования средств автоматизации, так и с их использованием.  <br>
2. Согласие дается на обработку следующих моих персональных данных:  <br>
Персональные данные: адреса электронной почты; пользовательские данные (источник откуда пришел на сайт пользователь; с какого сайта или по какой рекламе; язык ОС и Браузера; какие страницы открывает и на какие кнопки нажимает пользователь; ip-адрес).  <br>
3. Персональные данные не являются общедоступными.  <br>
4. Цель обработки персональных данных: обработка входящих запросов физических лиц с целью аналитики действий физического лица на веб-сайте и функционирования веб-сайта; проведение рекламных компаний.<br>
5. Основанием для обработки персональных данных является: ст. 24 Конституции Российской Федерации; ст.6 Федерального закона №152-ФЗ «О персональных данных» настоящее согласие на обработку персональных данных<br>
6. В ходе обработки с персональными данными будут совершены следующие действия: сбор; запись; систематизация; накопление; хранение; уточнение (обновление, изменение); извлечение; использование; блокирование; удаление; уничтожение.  <br>
7. Обработка персональных данных может быть прекращена по запросу субъекта персональных данных. Хранение персональных данных, зафиксированных на бумажных носителях осуществляется согласно Федеральному закону №125-ФЗ «Об архивном деле в Российской Федерации» и иным нормативно правовым актам в области архивного дела и архивного хранения.  <br>
8. Настоящее согласие действует все время до момента прекращения обработки персональных данных.<br>
 <br>
Вы автоматически соглашаетесь с соглашением. <br>
Незнание правил, не освобождает от ответственности. <br>
		</div>
	</div>

	

</main>
	
<!-- FOOTER BLOCK ========== -->
<footer class="footer flex a-center">
	<span class="footer__copyright f-medium">MEMPHIS-PROJECT.RU ©2018-2019 Copyright</span>

	<div class="footer__social flex a-center">
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