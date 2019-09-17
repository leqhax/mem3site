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
                            <li class="active">
                                <a href="/">
                                    <span>Главная</span>
                                </a>
                            </li>
                            <li>
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
                <div class="page page-main">
                    <div class="content block flex column justify-center align-center">
                        <h1>ПРИВАТНЫЙ ЧИТ ДЛЯ CS:GO</h1>
                        <span>AIMBOT | TRIGGERBOT | WALLHACK | ESP | SKINCHANGER | BUNNYHOPE</span>
                        <div class="stats flex row justify-center align-center">
                            <div class="flex row align-center">
                                <i class="far fa-user"></i>
                                <span>С нами уже 3189<br>довольных пользователей</span>
                            </div>
                            <div class="flex row align-center">
                                <i class="far fa-thumbs-up"></i>
                                <span>Свыше 2551<br>положительных отзывов</span>
                            </div>
                            <div class="flex row align-center">
                                <i class="fa fa-shield-alt"></i>
                                <span>Больше нет<br>детектов</span>
                            </div>
                        </div>
                        <div class="button white">
                            <a href="/payment/">КУПИТЬ</a>
                        </div>
                    </div>
                </div>
                <div class="page page-advantages black">
                    <div class="content block flex column justify-center align-center">
                        <h1>НАШИ ПРЕИМУЩЕСТВА</h1>
                        <hr>
                        <div class="advantages flex row justify-around align-start wrap">
                            <div class="block">
                                <div class="logo">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <p>Многообразие функций</p>
                                <span>Множество функций для легитной игры.</span>
                            </div>
                            <div class="block">
                                <div class="logo">
                                    <i class="far fa-hand-point-up"></i>
                                </div>
                                <p>Простота использования</p>
                                <span>Простое меню<br>с возможностью переключения языка.</span>
                            </div>
                            <div class="block">
                                <div class="logo">
                                    <i class="far fa-comments"></i>
                                </div>
                                <p>Онлайн тех. поддержка</p>
                                <span>Наша тех. поддержка<br> всегда находится в сети и поможет вам.</span>
                            </div>
                            <div class="block">
                                <div class="logo">
                                    <i class="fa fa-dollar-sign"></i>
                                </div>
                                <p>Доступная цена</p>
                                <span>На основе цен всех читов<br> мы подобрали самые доступные цены.</span>
                            </div>
                            <div class="block">
                                <div class="logo">
                                    <i class="fa fa-hands-helping"></i>
                                </div>
                                <p>Гарантия качества</p>
                                <span>Проект поддерживается и<br> всегда находится в развитии.</span>
                            </div>
                            <div class="block">
                                <div class="logo">
                                    <i class="far fa-eye-slash"></i>
                                </div>
                                <p>Нет больше детектов</p>
                                <span>Переработанный инжектор<br> больше не даст задетектиться.</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="page page-functional">
                    <div class="content block flex column justify-center align-center">
                        <h1>ФУНКЦИОНАЛ</h1>
                        <hr>
                        <!-- Идея расположения блоков взята с spirthack.me , реализация @Mo1oF (tg) -->
                        <div class="functional flex row justify-center align-center wrap">
                            <div class="block" data-item="1">
                                <span>AIMBOT</span>
                                <div class="hover">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div class="block active" data-item="2">
                                <span>TRIGGERBOT</span>
                                <div class="hover">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div class="block" data-item="3">
                                <span>VISUALS</span>
                                <div class="hover">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div class="block" data-item="4">
                                <span>SKINCHANGER</span>
                                <div class="hover">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div class="block" data-item="5">
                                <span>RADAR HACK</span>
                                <div class="hover">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div class="block" data-item="6">
                                <span>MISC</span>
                                <div class="hover">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                        <div class="items flex column justify-center align-center">

                            <a href="{$IMG}screenshots/aimbot.png" target="_blank" class="item" data-item="1">
                                <img class="test" src="{$IMG}screenshots/aimbot.png" alt="AIMBOT">
                            </a>
                            <a href="{$IMG}screenshots/aimbot.png" target="_blank" class="item active" data-item="2">
                                <img class="test" src="{$IMG}screenshots/triggerbot.png" alt="TRIGGERBOT">
                            </a>
                            <a href="{$IMG}screenshots/aimbot.png" target="_blank" class="item" data-item="3">
                                <img class="test" src="{$IMG}screenshots/visuals.png" alt="VISUALS">
                            </a>
                            <a href="{$IMG}screenshots/aimbot.png" target="_blank" class="item" data-item="4">
                                <img class="test" src="{$IMG}screenshots/skinchanger.png" alt="SKINCHANGER">
                            </a>
                            <a href="{$IMG}screenshots/aimbot.png" target="_blank" class="item" data-item="5">
                                <img class="test" src="{$IMG}screenshots/radarhack.png" alt="RADARHACK">
                            </a>
                            <a href="{$IMG}screenshots/aimbot.png" target="_blank" class="item" data-item="6">
                                <img class="test" src="{$IMG}screenshots/misc.png" alt="MISC">
                            </a>

                        </div>
                    </div>
                </div>
            </main>
            <footer>
                <div class="content flex row align-center">
                    <div class="block">
                        <p><span>A<span>Q</span>UA</span></p>
                        <span id="ps">Пользовательское соглашение</span>
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
</html>
