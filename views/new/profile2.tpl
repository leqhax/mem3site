<!DOCTYPE html>
<html lang="ru" class="page">
<head>
	<meta charset="UTF-8">
	<title>{$Title}</title>
	<meta property="og:image" content="https://qweeq1337.000webhostapp.com/main/templates/new/img/og_img.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="description" content="Чит для КСГО! Лучший легитный чит для КС ГО. Идеальное соотношение цены и качества. Cheat for csgo! Best legit cheat for counter strike. The best cheat on the market">
	<meta name="keywords" content="CSGO,CHEAT,HACK,FOR,HACK FOR CSGO,ЧИТ, чит, ксго, чит для ксго, лучший, легитный чит,легит,рейдж,legit,rage,visual,visuals,wh,aim,aimbot,trigger,triggerbot,best hack,perfect aim,killshot,aqua,aquacheat,legit cheat for csgo,counter strike, counter,strike,CS-GO,CS:GO,global,offensive,global offensive">
	<link rel="shortcut icon" href="https://qweeq1337.000webhostapp.com/main/templates/new/img/og_img.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="{$CSS}style.css"> 
	
</head>
{literal}<style type="text/css">.orange{color:orange;}</style>{/literal}

<div class="alerts"></div>

<body class="flex flex-column a-center j-spacebetween body t-6">

<form class="auth-block flex flex-column j-center __modalReset" data-id="reset" method="POST">
	<span class="auth-block__heading">Сброс пароля</span>
	<input type="password" class="auth-block__input auth-block__input_password old_password" style="margin-top: 60px;" placeholder="Старый пароль">
	<input type="password" class="auth-block__input auth-block__input_password new_password" placeholder="Новый пароль">
	<input type="password" class="auth-block__input auth-block__input_password new_password2" placeholder="Новый пароль еще раз">
	<div class="g-recaptcha" style="width: 75%;"></div>

	<button class="auth-block__button t-6" type="submit">Сменить</button>
</form>

 

<div class="__clicker" onclick="return closeModal_func()"></div>
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
		<a class="auth__reg f-medium t-6" href="/profile/">{$Me['login']}</a>
	</div>
</header>
<!-- MAIN ROOT CONTAINER -->
<main class="main main_account flex j-spacebetween flex-wrap">

	<strong class="section__heading f-bold">{$privel} - {$Me['login']}</strong>

	<form class="aside card-style flex flex-column j-center a-center">
		{if $Me['access_admin'] == 1}
		<a class="aside__button f-medium card-style t-6" href="/admin/">Админ панель</a>
		{/if}
		<a class="aside__button f-medium card-style __tabLink t-6 aside__button_active" data-id="0">Профиль</a>
		<a class="aside__button f-medium card-style __tabLink t-6" data-id="ref-sys">Реф. система</a>
		<a class="aside__button f-medium card-style __tabLink t-6" data-id="ref-top">Топ рефереров</a>
		<a class="aside__button f-medium card-style __tabLink t-6" data-id="reset-binding">Сброс привязки</a>
		<a class="aside__button f-medium card-style  t-6" href="//vk.com/im?sel=-97412480" target="_blank">Тех. Поддержка</a>
		<a class="aside__button f-medium card-style t-6" href="//vk.com/topic-97412480_39914461" target="_blank">Отзывы</a>
		<a href="/payment/" class="aside__button f-medium card-style t-6">Купить чит</a>
		<a class="aside__button f-medium card-style t-6">Радар</a>
		<a class="aside__button f-medium card-style t-6" href="/authorization/logout/">Выход</a>
	</form>

	<div class="inside flex card-style a-center j-center" style="height: auto;">
		<form class="inside__account-content flex a-center j-center flex-column __tab" data-id="reset-binding">
			<input type="text" class="account-content__input card-style account-content__input_reset message" placeholder="Укажите причину сброса...">
			<button class="account-content__button card-style t-6 account-content__button_reset">Оставить заявку на сброс HWID</button>
			{if $LastTicket}
			<br>
			<div class="account-content__input account-content__data card-style f-medium f-medium" >
				{if $LastTicket['status'] == 'active'}
					Статус тикета: <span class="__email orange f-medium f-medium">На рассмотрении</span>
				{elseif $LastTicket['status'] == 'accept'}
					Статус тикета: <span class="__email green f-medium f-medium">Принято</span>
				{else}
					Статус тикета: <span class="__email red f-medium f-medium">Отклонена</span>
				{/if}
				
			</div>
			{/if}
		</form>
		<form class="inside__account-content flex a-center j-center flex-column __tab" style="margin-left: auto;margin-right:auto;text-align:center;" data-id="ref-sys">
						<span class="f-medium">ПРИГЛАШАЙТЕ ДРУЗЕЙ И ПОЛУЧАЙТЕ ПОДПИСКУ!</span><br>
			<span class="f-medium">Если ваш друг купит приватный чит MEMPHIS по вашей ссылке,
			то на ваш аккаунт и аккаунт друга добавятся бонусные дни (подробнее ниже).</span>
			<br>
			<div class="account-content__setting flex a-center j-spacebetween flex-wrap" style="width: 80%;">
				<span class="f-medium" style="margin-bottom: 20px !important;">Cсылка:</span>
				<input type="text" style="width: auto !important; height:50px !important; margin-bottom:20px !important;" class="account-content__input card-style account-content__input_reset message" readonly value="https://qweeq1337.000webhostapp.com/?referal={$Me['login']}" id="referal_copy_input">  <a class="account-content__button card-style t-6 account-content__button_data f-medium" id="copy_ref">Скопировать</a>
			</div><br>
			<span class="f-medium">БОНУСНЫЕ ДНИ</span><br>
			<span class="f-medium">При покупке приватного чита MEMPHIS по реферальной ссылке,
			приглашенный и приглашающий получают бонусные дни подписки на аккаунт.</span>
			<br>
			<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">Покупка     <span class="green f-medium"> Бонус</span></div>
			<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">7 дней: <span class="green f-medium">Пригласившему 12 часов</span></div>
			<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">30 дней: <span class="green f-medium">Пригласившему 3 дня, приглашенному 1</span></div>
			<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">60 дней: <span class="green f-medium">Пригласившему 7 дней, приглашенному 3</span></div>
			<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">90 дней: <span class="green f-medium">Пригласившему 11 дней, приглашенному 4</span></div>
			<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">180 дней: <span class="green f-medium">Пригласившему 23 дня, приглашенному 10</span></div>
			<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">360 дней: <span class="green f-medium">Пригласившему 50 дней, приглашенному 20</span></div>
			<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">Навсегда: <span class="green f-medium">Пригласившему 60 дней</span></div>
			<span class="f-medium">Вы навсегда становитесь рефералом пригласившего вас пользователя покупая по его реферальной ссылке на этом аккаунте.</span>
		</form>
		<form class="inside__account-content flex a-center j-center flex-column __tab" style="margin-left: auto;margin-right:auto;text-align:center;" data-id="ref-top">
						<span class="f-medium">ТОП 25 ЛУЧШИХ РЕФЕРЕРОВ!</span><br>
			<span class="f-medium">ПРИГЛАШАЙ ДРУЗЕЙ НА ПРОЕКТ И ПОЛУЧАЙ ЦЕННЫЕ ПРИЗЫ!</span>
			<br>
			<span class="f-medium">Количество ваших рефералов - {$RefCount}</span><br>
			<br>
			<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">Реферер     <span class="green f-medium">           Кол-во приглашенных</span></div>
			{foreach $Top as $row}
				{if $row@iteration > 25}
					{break}
				{/if}
				<div class="account-content__input account-content__data card-style f-medium f-medium" style="margin-bottom: 5px; width:90%;">{$row['referer']} <span class="green f-medium">{$row['COUNT(`referer`)']}</span></div>
			{/foreach}
		</form>
		<form class="inside__account-content flex a-center j-spacebetween __tab account-content_active" data-id="0">

			{if $Me['subscription'] >= time() }
			<div class="account-content__setting flex a-center j-spacebetween flex-wrap">
			{else}
			<div class="account-content__setting flex a-center j-spacebetween flex-wrap" style="margin: auto;">
			{/if}
				<div class="account-content__input account-content__nickname card-style f-medium" >
					Ваш никнейм: <span class="__nickname f-medium">{$Me['login']}</span>
				</div>

				<div class="account-content__input account-content__data card-style f-medium f-medium"  style="overflow: hidden">
					Ваш email: <span class="__email f-medium f-medium">{$Me['email']}</span>
				</div>
				<a class="account-content__button card-style t-6 account-content__button_data __resetLink f-medium">Сбросить пароль</a>

				<div class="account-content__input account-content__data card-style f-medium" >
					Статус подписки: 
					{if $Me['freez_status'] == 1}
					<span class="__statusPodpiski orange f-medium">Заморожена</span>
					{elseif $Me['subscription'] >= time() }
					<span class="__statusPodpiski green f-medium">Активна</span>
					{else}
					<span class="__statusPodpiski red green f-medium">Неактивна</span>
					{/if}
				</div>
				<a class="account-content__button card-style t-6 account-content__button_data f-medium" href="/payment/">Купить</a> 

				{if $Me['subscription'] >= time() }
				<a class="account-content__button card-style t-6 account-content__button_download f-medium" href="/profile/download/">Скачать наш лоадер</a>
				<a class="account-content__button card-style t-6 account-content__button_download f-medium" href="/cfg.rar">Скачать наш конфиг</a>
				{else}
				<a class="account-content__button card-style t-6 account-content__button_download f-medium" onclick="return sendAlert(false, 'Недоступно!');">Скачать наш лоадер</a>
				<a class="account-content__button card-style t-6 account-content__button_download f-medium" onclick="return sendAlert(false, 'Недоступно!');">Скачать наш конфиг</a>
				{/if}
			</div>

			{if $Me['subscription'] >= time() || $Me['freez_status'] != 0}
			<div class="account-content__podpiska flex a-center j-center flex-column f-medium">
				{if $Me['freez_status'] == 0}
				<span class="podpiska__heading f-medium">Подписка активна до</span>
				<div class="podpiska__data f-medium">{date('d.m.Y H:i:s' , $Me['subscription'])}</div>
				<button class="account-content__button card-style t-6 podpiska__button t-6" id="freezon">Заморозить</button>
				{else}
				<span class="podpiska__heading f-medium">Дней подписки</span>
				<div class="podpiska__data f-medium">{$timePodpis}</div>
				<button class="account-content__button card-style t-6 podpiska__button t-6" id="freezoff">Разморозить</button>
				{/if}
			</div>
			{/if}

		</form>
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
			var widgetId = grecaptcha.render(el, { 'sitekey' : '{$captcha_sitekey}', 'theme' : 'dark'});
			$(this).attr('data-widget-id', widgetId);
		});
	}
	$('#copy_ref').on('click',function(){
		var $temp = $("#referal_copy_input").select();
		document.execCommand("copy");
	});
	$("form[data-id=reset]").submit(function(){
		var old_password = $(this).find('.old_password').val();
		var new_password = $(this).find('.new_password').val();
		var new_password2 = $(this).find('.new_password2').val();
		var g_recaptcha = $(this).find('.g-recaptcha').attr('data-widget-id');

		var sendData = { old_password: old_password, new_password: new_password, new_password2: new_password2, g_recaptcha: grecaptcha.getResponse(g_recaptcha) };

		$.ajax ({
			type: 'POST',
			url: "/profile/res_pass/",
			data: sendData,
			dataType: 'json',
			success: function(data)
			{
                if (data['status'] == 1) {
                    sendAlert(true, data['message']);
                    setTimeout(function() {
                        window.location.href = "/profile/";
                    }, 1000);
                } else {
                    grecaptcha.reset(g_recaptcha);
                    sendAlert(false, data['message']);
                }
				removeAlert();
			}
		});
		return false;
	});
	$("form[data-id=reset-binding]").submit(function(){
		var message = $(this).find('.message').val();

		var sendData = { message: message };

		$.ajax ({
			type: 'POST',
			url: "/profile/res_binding/",
			data: sendData,
			dataType: 'json',
			success: function(data)
			{
                if (data['status'] == 1) {
                    sendAlert(true, data['message']);
                    setTimeout(function() {
                        window.location.href = "/profile/";
                    }, 1000);
                } else {
                    sendAlert(false, data['message']);
                }
				removeAlert();
			}
		});
		return false;
	});
	$('#freezon').on("click", function(event){
		$.ajax ({
			type: 'POST',
			url: "/profile/freezon/",
			data: 0,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(data)
			{
				if(data['status'] == 1){
					sendAlert(true, data['message']);
					setTimeout(function(){
						window.location.href = "/profile/";
					}, 1000);
				}else{
					console.log(data['message']);
					sendAlert(false, data['message']);
				}
				removeAlert();
			}
		});
		return false;
	});
	$('#freezoff').on("click", function(event){
		$.ajax ({
			type: 'POST',
			url: "/profile/freezoff/",
			data: 0,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(data)
			{

				if(data['status'] == 1){
					sendAlert(true, data['message']);
					setTimeout(function(){
						window.location.href = "/profile/";
					}, 1000);
				}else{
					console.log(data['message']);
					sendAlert(false, data['message']);
				}
				removeAlert();
			}
		});
		return false;
	});



</script>
<script src="{$JS}script.js"></script>



<noscript>
	<div style="background-color: rgba(0,0,0,.8); width: 100%; height: 100vh; position: fixed; top: 0; left: 0; text-align: center; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #fff; padding: 10px">
		<span>Пожалуйста, включите JavaScript в настройках браузера</span>
	</div>
</noscript>	
</body>
</html>
