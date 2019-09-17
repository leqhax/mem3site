<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>{$Title}</title>
        <meta name="description" content="Чит для КСГО! Лучший легитный чит для КС ГО. Идеальное соотношение цены и качества. Cheat for csgo! Best legit cheat for counter strike. The best cheat on the market">
        <meta name="keywords" content="CSGO,CHEAT,HACK,FOR,HACK FOR CSGO,ЧИТ, чит, ксго, чит для ксго, лучший, легитный чит,легит,рейдж,legit,rage,visual,visuals,wh,aim,aimbot,trigger,triggerbot,best hack,perfect aim,killshot,aqua,aquacheat,legit cheat for csgo,counter strike, counter,strike,CS-GO,CS:GO,global,offensive,global offensive,aqua,cheat,аквачит,аква,вх,аим,аимбот,триггер,триггербот,ПО,кеч,кеч скам,KECH,Kech skam,rofl,Kech ne skam,Кеч не скам">
        <meta name="author" content="AQUACHEAT.RU">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="shortcut icon" type="image/x-icon" href="{$IMG}logotype.png" />
        <link rel="stylesheet" href="{$CSS}custom.css">
        <link rel="stylesheet" href="{$CSS}fontawesome.css">
    </head>
    <body class="">
        <div class="alerts">

        </div>
        <div class="container">
            <div class="header-openmenu">
                <i class="fa fa-bars"></i>
            </div>
            <header>
                <div class="content">
                    <div class="logo">
                        <a href="#"><span>A<span>Q</span>UA</span></a>
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="/">
                                    <span>Главная</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="/payment/">
                                    <span>Купить</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Прочее</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="auth">
                        {if $User == false}
                        <a data-popup=".authorization">
                            <span>ВХОД</span>
                        </a>
                        <a data-popup=".sign-up">
                            <span>РЕГИСТРАЦИЯ</span>
                        </a>
                        {else}
                        <a href="/profile/">
                            <span>{$User['login']}</span>
                        </a>
                        {/if}
                    </div>
                </div>
            </header>
            <main>
                <div class="page page-payment black">
                    <div class="content block flex column justify-center align-center">
                        <h1>ВЫБЕРИ НАИЛУЧШИЙ ТАРИФ ДЛЯ СЕБЯ!</h1>
                        <hr>
                        <div class="payment flex column justify-center align-center">
                            <div class="block">
                                <p>Количество дней</p>
                                <div class="select">
                                    {foreach $prices as $key => $value}
                                        {if $value == '99999'}{break}{/if}
                                    <div class="option {if $value == '30'}active{/if}" data-days="{$value}" data-price="{$key}">
                                        <span>{$value}</span>
                                    </div>
                                    {/foreach}
                                </div>
                            </div>
                            <div class="block">
                                <p>Или может навсегда?</p>
                                <div class="select big">
                                    <div class="option" data-days="99999" data-price="1299">
                                        <span>НАВСЕГДА</span>
                                    </div>
                                </div>
                            </div>
                            <div class="block">
                                <p>Ваша цена</p>
                                <span id="price">149р</span>
                            </div>
                            <div class="block">
                                <a href="/payment/pay/30/" id="payment">ОПЛАТИТЬ</a>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
            <footer>
                <div class="content flex row align-center">
                    <div class="block">
                        <p><span>A<span>Q</span>UA</span></p>
                        <span>Пользовательское соглашение</span>
                    </div>
                    <div class="block">
                        <p>E-mail</p>
                        <span>Kech@ne.skam</span>
                    </div>
                    <div class="block community">
                        <a target="_blank" href="https://vk.com/aquacheat" class="cm-logo">
                            <i class="fab fa-vk"></i>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
        <div class="popup-window authorization">
            <div class="window">
                <i class="fa fa-times"></i>
                <p class="subject">Авторизация</p>
                <form class="auth" id="auth">
                    <label>
                        <input type="text" class="login" required placeholder="Введите логин">
                        <div class="lines">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <input type="password" class="password" required placeholder="Введите пароль">
                        <div class="lines">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <div class="g-recaptcha"></div>
                    </label>

                    <button type="submit" class="">
                        <i class="fab fa-cloudscale"></i>
                        <p>Войти</p>
                    </button>
                </form>
            </div>
        </div>
        <div class="popup-window sign-up">
            <div class="window">
                <i class="fa fa-times"></i>
                <p class="subject">Регистрация</p>
                <form class="auth" id="reg">
                    <label>
                        <input type="text" class="login" required placeholder="Введите логин">
                        <div class="lines">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <input type="text" class="email" required placeholder="Введите почту">
                        <div class="lines">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <input type="password" class="password" required placeholder="Введите пароль">
                        <div class="lines">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <input type="password" class="password2" required placeholder="Введите пароль ещё раз">
                        <div class="lines">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <div class="g-recaptcha"></div>
                    </label>
                    <button type="submit" class="">
                        <i class="fab fa-cloudscale"></i>
                        <p>Зарегистрироваться</p>
                    </button>
                </form>
            </div>
        </div>
    </body>
    <script src="{$JS}jQuery.js" charset="utf-8"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit" async defer></script>
    <script type="text/javascript">
        var recaptchaCallback = function() {
            $('.g-recaptcha').each(function(index, el) {
                var widgetId = grecaptcha.render(el, { 'sitekey' : '{$captcha_sitekey}'});
                $(this).attr('data-widget-id', widgetId);
            });
        }
    </script>
    <script src="{$JS}main.js" charset="utf-8"></script>
    <script type="text/javascript">
        $('.select .option').on('click', function(){
            $('.select .option').removeClass('active');
            $(this).addClass('active');
            var day     = $(this).attr('data-days');
            var price   = $(this).attr('data-price');
            $('#payment').attr('href', '/payment/pay/' + day + '/');
            $('.payment .block #price').html(price + 'р');
        });

        $('.payment a#payment').on('click', function(){
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
    </script>
</html>
