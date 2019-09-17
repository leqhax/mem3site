<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{$Title}</title>
	<link href="/main/templates/default/css/bootstrap.min.css" rel="stylesheet">
	<link href="/main/templates/default/css/fontawesome.css" rel="stylesheet">
	<link href="/main/templates/default/css/font-awesome.min.css" rel="stylesheet">
	<link href="/main/templates/default/css/datepicker3.css" rel="stylesheet">
	<link href="/main/templates/default/css/styles.css" rel="stylesheet">
    <link href="/main/templates/default/css/radar.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="{$IMG}logotype.png" />
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>


    	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://icons.iconarchive.com/icons/artdesigner/tweet-my-web/256/single-bird-icon.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><a href="/profile/" class="color-black">{$Me['login']}</a></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>{$Me['class']}</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			{if $Me['access_admin'] == 1}
				<li><a href="/admin/"><em class="fa fa-circle-o-notch">&nbsp;</em> Админ панель</a></li>
			{/if}

			<li><a href="/profile/"><em class="fa fa-tachometer-alt">&nbsp;</em> Профиль</a></li>

			<li><a href="/buy/index/30/"><em class="fa fa-credit-card">&nbsp;</em> Оплатить</a></li>

			<li class="active"><a href="/profile/radar/"><em class="fas fa-map-marked-alt">&nbsp;</em> Радар</a></li>


			<li><a href="/auth/logout/"><em class="fa fa-power-off">&nbsp;</em> Выход</a></li>

		</ul>
	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main radar">
        <div class="canvas">
        	<canvas id="canvas" class="actions" width="1024" height="1024"></canvas>
        </div>
        <div class="navigation">
            <ul>
                <li class="" onclick="restart();"><em class="fas fa-power-off"></em></li>
				<li class="" onclick="rotate(90);"><em class="fas fa-sync-alt"></em></li>
				<li class="" onclick="radius();"><em class="fas fa-circle-notch"></em></li>
				<li class="" onclick="scale(+0.1);"><em class="fas fa-plus"></em></li>
				<li class="" onclick="scale(-0.1);"><em class="fas fa-minus"></em></li>
            </ul>
        </div>
	</div>	<!--/.main-->
	<script src="/main/js/jquery-1.11.1.min.js"></script>
	<script src="/main/js/bootstrap.min.js"></script>
	<script src="/main/js/custom.js"></script>
	<script>
		var nickname ="{$login}";
		var socket = new WebSocket("wss://memphis-project.ru/radar");
		</script>
    <script src="/main/js/radar.js"></script>

</body>
</html>
