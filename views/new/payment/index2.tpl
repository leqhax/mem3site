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

<body class="flex flex-column a-center j-spacebetween body t-6">

<div class="alerts"></div>

{if $User == false}
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
{/if}

<div class="__clicker"></div>
<div class="__wrap flex flex-column a-center j-center">
<!-- HEADER BLOCK =========== -->
<header class="header flex a-center container">
	<a href="/" class="header__logo f-black t-6">MEMPHIS</a>

	<nav class="header__menu flex a-center">
		<a href="/" class="menu__link t-6">Главная</a>
		<a href="/func" class="menu__link t-6">Функционал</a>
		<a href="/payment/" class="menu__link menu__link_active t-6">Купить</a>
	</nav>

	<div class="header__auth flex a-center">
		{if $User == false}
		<a class="auth__login f-medium t-6 __Login" data-id="login">Вход</a>
		<a class="auth__reg f-medium t-6 __Reg" data-id="reg">Регистрация</a>
		{else}
		<a class="auth__reg f-medium t-6" href="/profile/">{$User['login']}</a>
		{/if}
	</div>
</header>
<!-- MAIN ROOT CONTAINER -->
<main class="main flex j-center a-center">

	<form class="flex flex-wrap container a-center j-center container" data-id="youtube">
		<strong class="section__heading f-bold">Оформление заказа</strong>


		<div class="slider">
			<a class="ui-slider-handle" href="#">
				<div hidden="true" id="slider-result">0</div>
			</a>
			<input id="znch" name="znch" type="hidden" />
		</div>

		<div class="price-table flex column j-spacebetween">
			<div class="price-table__price f-black">7</div>
			<div class="price-table__price f-black">30</div>
			<div class="price-table__price f-black">60</div>
			<div class="price-table__price f-black">90</div>
			<div class="price-table__price f-black">180</div>
			<div class="price-table__price f-black">360</div>
			<div class="price-table__price f-black">∞</div>
		</div>

		<em class="section__info">
			Перетащите ползунок, чтобы выбрать<br>
			нужный тарифный план
		</em>

		<div class="price-info flex j-spacebetween a-center" style="margin-top: 10px;">
			<div class="price-info__result __priceResult">30 дней</div>

			<div class="price-info__topay"><span class="__priceTopay f-medium">{intval(199*(100-$Referer['ref_discount'])/100)}</span> <br> Рублей</div>

			<a class="price-info__button t-6" id="payment" href="/payment/pay/30/">Оплатить</a>
		</div>
		{if $Referer['ref_discount'] > 0}
		<div class="price-info flex j-spacebetween a-center" style="margin-top: 10px;">
			<div class="price-info__topay" style="margin-left: 43%;"><span class="__priceTopay f-medium">{$Referer['ref_discount']}% Скидка</span></div>
		</div>
		{/if}
	</form>

	

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
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit" async defer></script>
<script type="text/javascript">
	var recaptchaCallback = function() {
		$('.g-recaptcha').each(function(index, el) {
			var widgetId = grecaptcha.render(el, { 'sitekey' : '{$captcha_sitekey}', 'theme' : 'dark'});
			$(this).attr('data-widget-id', widgetId);
		});
	}
</script>
<script src="{$JS}script.js"></script>
<script>
$(document).ready(function(){
	$( ".slider" ).slider({
		animate: true,
		range: "min",
		value: 2,
		min: 1,
		max: 7,
		step: 1,
		 
		slide: function( event, ui ) {
			$( "#slider-result" ).html(ui.value);
		},
		 
		change: function(event, ui) {
			$('#znch').attr('value', ui.value);
		}
	 
	});


const handle = document.querySelector(".ui-slider-handle")
const priceValue = document.querySelector("#slider-result");
const priceResult = document.querySelector(".__priceResult");

const price = document.querySelector(".__priceTopay");
const discount = Math.max(0,Math.min(30,{if $Referer['ref_discount']}{$Referer['ref_discount']}{else}0{/if}));
handle.addEventListener("mouseover", ()=> {

	if(priceValue.innerText === "1") {
		priceResult.innerText = "7 дней";
		$('#payment').attr('href', '/payment/pay/7/');
		return price.innerText = parseInt((59* (100-discount)/100).toString()).toString();
	}

	if(priceValue.innerText === "2") {
		priceResult.innerText = "30 дней";
		$('#payment').attr('href', '/payment/pay/30/');
		return price.innerText = parseInt((199* (100-discount)/100).toString()).toString();
	}

	if(priceValue.innerText === "3") {
		priceResult.innerText = "60 дней";
		$('#payment').attr('href', '/payment/pay/60/');
		return price.innerText = parseInt((349* (100-discount)/100).toString()).toString();
	}

	if(priceValue.innerText === "4") {
		priceResult.innerText = "90 дней";
		$('#payment').attr('href', '/payment/pay/90/');
		return price.innerText = parseInt((549* (100-discount)/100).toString()).toString();
	}

	if(priceValue.innerText === "5") {
		priceResult.innerText = "180 дней";
		$('#payment').attr('href', '/payment/pay/180/');
		return price.innerText = parseInt((859* (100-discount)/100).toString()).toString();
	}

	if(priceValue.innerText === "6") {
		priceResult.innerText = "360 дней";
		$('#payment').attr('href', '/payment/pay/360/');
		return price.innerText = parseInt((1399* (100-discount)/100).toString()).toString();
	}

	if(priceValue.innerText === "7") {
		priceResult.innerText = "Навсегда";
		$('#payment').attr('href', '/payment/pay/9999/');
		return price.innerText = parseInt((1999* (100-discount)/100).toString()).toString();
	}
});


$('#payment').on('click', function(){
    var check = validUser();
    if(!check){
        sendAlert(false, 'Авторизуйтесь!');
        return false;
    }
});
function validUser(){
    var res;
    $.ajax({
        type: 'POST',
        url: "/auth/check/",
        data: null,
        async: false,
        dataType: 'json',
        success: function(data)
            {
                if(data['status'] == false){
                    return res = false;
                }
                return res = true;
            }
    });
    return res;
};

});
</script>

<noscript>
	<div style="background-color: rgba(0,0,0,.8); width: 100%; height: 100vh; position: fixed; top: 0; left: 0; text-align: center; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #fff; padding: 10px">
		<span>Пожалуйста, включите JavaScript в настройках браузера</span>
	</div>
</noscript>	
</body>
</html>
