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
				<img src="https://cdn1.savepice.ru/uploads/2019/8/30/08334de43475b2afe287b1bec111b5a0-full.png" class="img-responsive" alt="">
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
			<li class="active"><a href="/Privilege/"><em class="fa fa-toggle-off ">&nbsp;</em> Привилегии</a></li>
			<li><a href="/Log/"><em class="fa fa-clone">&nbsp;</em> Логи</a></li>
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
				<li><a href="/Privilege/">Привилегии</a></li>
				<li class="active"><a href="/Privilege/create/">Создание</a></li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Создание привилегии</h1>
				{if $status != false}
					<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {$status} </div>
				{/if}
			</div>
		</div><!--/.row-->

		<div class="row d-flex js-center">
			<div class="col-lg-6">
				<div class="panel panel-default">

				<form role="form" method="POST" action="/privilege/create/">
					<div class="panel-heading">
						<div class="form-group has-warning d-flex js-sb">
							<label>Название</label>
							<label><input type="input" name="name" class="form-control" >
							</label>
						</div>
					</div>
					<div class="panel-body">
						<div class="col-md-12">
								<div class="col-xs-12">

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Доступ к сайту</h4>
										</label>
										<label>
											<input type="checkbox"
											name="access_site" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Инжект</h4>
										</label>
										<label>
											<input type="checkbox"
											name="inject" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Доступ в админ-панель</h4>
										</label>
										<label>
											<input type="checkbox"
											name="access_adminpanel" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Доступ к пользователям</h4>
										</label>
										<label>
											<input type="checkbox"
											name="access_user" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Доступ к привилегиям</h4>
										</label>
										<label>
											<input type="checkbox"
											name="access_privilege" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Доступ к настройкам</h4>
										</label>
										<label>
											<input type="checkbox"
											name="access_settings" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Доступ к логам</h4>
										</label>
										<label>
											<input type="checkbox"
											name="access_log" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Выдача подписок</h4>
										</label>
										<label>
											<input type="checkbox"
											name="submission_sub" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Редактирование пользователей</h4>
										</label>
										<label>
											<input type="checkbox"
											name="edit_user" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Удаление пользователей</h4>
										</label>
										<label>
											<input type="checkbox"
											name="delete_user" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Сброс привязки</h4>
										</label>
										<label>
											<input type="checkbox"
											name="access_resbind" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>

									<div class="d-flex js-sp-b f-wrap">
										<label>
											<h4>Редактирование админ-пользователей</h4>
										</label>
										<label>
											<input type="checkbox"
											name="edit_admin" class="checkbox" >
											<div class="checkbox-custom"></div>
										</label>
									</div>
								</div>

								<div class="form-group txt-center">
									<input type="submit" class="btn  btn-lg  btn-primary" value="Создать">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
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
