<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{$Title}</title>
	<link href="/main/templates/default/css/bootstrap.min.css" rel="stylesheet">
	<link href="/main/templates/default/css/fontawesome.css" rel="stylesheet">
	<link href="/main/templates/default/css/datepicker3.css" rel="stylesheet">
	<link href="/main/templates/default/css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
			<li><a href="/admin/"><em class="fa fa-chart-line">&nbsp;</em> Статистика</a></li>
			<li><a href="/users/add/"><em class="fa fa-user-plus">&nbsp;</em> Добавить пользователя</a></li>
			<li><a href="/users/"><em class="fa fa-users">&nbsp;</em> Пользователи</a></li>
			<li><a href="/privilege/"><em class="fa fa-toggle-on">&nbsp;</em> Привилегии</a></li>
			<li><a href="/log/"><em class="fa fa-copy">&nbsp;</em> Логи</a></li>
			<li class="active"><a href="/resbinding/"><em class="fa fa-redo-alt">&nbsp;</em> Сброс привязки</a></li>
			<li><a href="/settings/"><em class="fa fa-cog">&nbsp;</em> Настройки</a></li>
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
				<li class="active"><a href="/Resbinding/">Сброс привязки</a></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Сброс привязки</h1>
				{if $status != false}
					<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {$status} </div>
				{/if}
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Сброс привязки
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="/resbinding/">
												<em class="fa fa-cog"></em> Сбросить
											</a></li>

											<li class="divider"></li>

											<li><a href="/resbinding/?sort=active">
												<em class="fa fa-cog"></em> Активные
											</a></li>

											<li class="divider"></li>

											<li><a href="/resbinding/?sort=accept">
												<em class="fa fa-cog"></em> Принятые
											</a></li>
											
											<li class="divider"></li>

											<li><a href="/resbinding/?sort=decline">
												<em class="fa fa-cog"></em> Отклонённые
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body articles-container">

				{if $GetAllTickets != false}

						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-1 col-md-1">
										<div class="large">#</div>
									</div>
									<div class="col-xs-2 col-md-2">
										<div class="large">Логин</div>
									</div>
									<div class="col-xs-2 col-md-2">
										<div class="large">Дата</div>
									</div>
									<div class="col-xs-2 col-md-2">
										<div class="large">Статус</div>
									</div>
									<div class="col-xs-4 col-md-4">
										<div class="large">Действие</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->

					{foreach $GetAllTickets as $key}	

						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-1 col-md-1">
										<h4>{$key['id']}</h4>
									</div>
									<div class="col-xs-2 col-md-2">
										<h4>{$key['login']}</h4>
									</div>
									<div class="col-xs-2 col-md-2">
										<h4>{date('d.m.Y H:i:s' , $key['date'])}</h4>
									</div>
									<div class="col-xs-2 col-md-2">
										<h4>{$key['status']}</h4>
									</div>
									<div class="col-xs-4 col-md-4">
										
										<a href="/users/profile/?login-id={$key['login']}" class="btn btn-md btn-primary">Открыть</a>
										
										{if $key['status'] == 'active'}
											<a href="/resbinding/accept/?id={$key['id']}&login={$key['login']}" class="btn btn-md btn-success">Принять</a>
											<a href="/resbinding/decline/?id={$key['id']}" class="btn btn-md btn-warning">Отклонить</a>
										{/if}

										{if $k['status'] == 'decline'}
											<a href="/resbinding/accept/?id={$key['id']}" class="btn btn-md btn-success">Принять</a>
										{/if}

										<a href="/resbinding/delete/?id={$key['id']}" class="btn btn-md btn-danger">Удалить</a>
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
										<a href="{$link}&page={$Back}" class="btn btn-md btn-info"><</a>
										<span>{$CurrentPage} / {$MaxList}</span>
										<a href="{$link}&page={$Next}" class="btn btn-md btn-info">></a>
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