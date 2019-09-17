<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{$Title}</title>
	<link href="/main/templates/default/css/bootstrap.min.css" rel="stylesheet">
	<link href="/main/templates/default/css/font-awesome.min.css" rel="stylesheet">
	<link href="/main/templates/default/css/datepicker3.css" rel="stylesheet">
	<link href="/main/templates/default/css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="{$IMG}logotype.png" />
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="/"><span>{$Title}</span></a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
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
			<li><a href="/admin/"><em class="fa fa-dashboard">&nbsp;</em> Статистика</a></li>
			<li><a href="/users/add/"><em class="fa fa-plus-square">&nbsp;</em> Добавить пользователя</a></li>
			<li><a href="/Users/"><em class="fa fa-calendar">&nbsp;</em> Пользователи</a></li>
			<li><a href="/Privilege/"><em class="fa fa-toggle-off ">&nbsp;</em> Привилегии</a></li>
			<li class="active"><a href="/Log/"><em class="fa fa-clone">&nbsp;</em> Логи</a></li>
			<li><a href="/Resbinding/"><em class="fa fa-envelope">&nbsp;</em> Сброс привязки</a></li>
			<li><a href="/Settings/"><em class="fa fa-bar-chart">&nbsp;</em> Настройки</a></li>
			<li><a href="/authorization/logout/"><em class="fa fa-power-off">&nbsp;</em> Выход</a></li>

		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="/admin/">Админ-панель</a></li>
				<li><a href="/Log/">Логи</a></li>
				<li class="active"><a href="/log/profile/?login={$login}">Профиль</a></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Логи - {$login}</h1>
				{if $status != false}
					<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {$status} </div>
				{/if}
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						{$login}
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><form method="POST" action="/log/deletelogbylogin/">
												<input type="hidden" name="login" value="{$login}">
                       							<input type="submit" class="btn btn-md btn-danger" value="Удалить всё">
											</form></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body articles-container">

				{if $GetLogs != false}

						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-5">
										<div class="large">Описание</div>
									</div>
									<div class="col-xs-2 col-md-2">
										<div class="large">IP</div>
									</div>
									<div class="col-xs-2 col-md-2">
										<div class="large">Время</div>
									</div>
									<div class="col-xs-3 col-md-3">
										<div class="large">Действие</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->

					{foreach $GetLogs as $key}

						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-5">
										<h4>{$key['action']}</h4>
									</div>
									<div class="col-xs-2 col-md-2">
										<h4>{$key['ip']}</h4>
									</div>
									<div class="col-xs-2 col-md-2">
										<h4>{date('d.m.Y H:i:s' , $key['time'])}</h4>
									</div>
									<div class="col-xs-3 col-md-3">
										<a href="/log/delete/?id={$key['id']}" class="btn btn-md btn-danger">Удалить</a>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
					{/foreach}

						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-5 col-md-5">
									</div>
									<div class="col-xs-2 col-md-2">
										<a href="/log/profile/?login={$login}&page={$Back}" class="btn btn-md btn-info"><</a>
										<span>{$CurrentPage} / {$MaxList}</span>
										<a href="/log/profile/?login={$login}&page={$Next}" class="btn btn-md btn-info">></a>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->

				{/if}

					</div>
				</div><!--End .articles-->



			<div class="col-sm-12">
				<p class="back-link">MoloF SYSTEM</p>
			</div>

	</div>	<!--/.main-->

	<script src="/main/js/jquery-1.11.1.min.js"></script>
	<script src="/main/js/bootstrap.min.js"></script>
	<script src="/main/js/chart.min.js"></script>
	<script src="/main/js/chart-data.js"></script>
	<script src="/main/js/easypiechart.js"></script>
	<script src="/main/js/easypiechart-data.js"></script>
	<script src="/main/js/bootstrap-datepicker.js"></script>
	<script src="/main/js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

</body>
</html>
