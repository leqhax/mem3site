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
				<img src="http://png-images.ru/wp-content/uploads/2014/11/parrot_PNG722-170x170.png" class="img-responsive" alt="">
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
			<li class="active"><a href="/users/add/"><em class="fa fa-plus-square">&nbsp;</em> Добавить пользователя</a></li>
			<li><a href="/users/"><em class="fa fa-calendar">&nbsp;</em> Пользователи</a></li>
			<li><a href="/privilege/"><em class="fa fa-toggle-off ">&nbsp;</em> Привилегии</a></li>
			<li><a href="/log/"><em class="fa fa-clone">&nbsp;</em> Логи</a></li>
			<li><a href="/resbinding/"><em class="fa fa-envelope">&nbsp;</em> Сброс привязки</a></li>
			<li><a href="/settings/"><em class="fa fa-bar-chart">&nbsp;</em> Настройки</a></li>
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
				<li><a href="/users/">Пользователи</a></li>
				<li class="active"><a href="/users/add/">Добавить</a></li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Выдать подписку</h1>
				{if $status != false}
					<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {$status} </div>
				{/if}
			</div>
		</div><!--/.row-->

		<div class="row d-flex js-center">
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">Выдать подписку</div>
					<div class="panel-body">
						<div class="col-md-12">
							<form role="form" method="POST" action="/users/addnewuser/">
								<div class="form-group has-warning">
									<label>Логин</label>
									<input class="form-control" name="login">
								</div>
								<div class="form-group d-flex js-sp-a select-types">
									<button type="button" class="btn btn-sm btn-primary" data-toggle=".seconds">Секунда</button>
									<button type="button" class="btn btn-sm btn-primary" data-toggle=".minuts">Минуту</button>
									<button type="button" class="btn btn-sm btn-primary" data-toggle=".hours">Час</button>
									<button type="button" class="btn btn-sm btn-primary active" data-toggle=".days">День</button>
									<button type="button" class="btn btn-sm btn-primary" data-toggle=".weeks">Неделя</button>
									<button type="button" class="btn btn-sm btn-primary" data-toggle=".months">Месяц</button>
									<button type="button" class="btn btn-sm btn-primary" data-toggle=".years">Год</button>
								</div>
								<div class="selected">
									<div class="form-group d-none seconds">
										<label>Секунды</label>
										<input type="number" class="form-control" name="seconds">
									</div>
									<div class="form-group d-none minuts">
										<label>Минуты</label>
										<input type="number" class="form-control" name="minuts">
									</div>
									<div class="form-group d-none hours">
										<label>Часы</label>
										<input type="number" class="form-control" name="hours">
									</div>
									<div class="form-group days">
										<label>Дни</label>
										<input type="number" class="form-control" name="days">
									</div>
									<div class="form-group d-none weeks">
										<label>Недели</label>
										<input type="number" class="form-control" name="weeks">
									</div>
									<div class="form-group d-none months">
										<label>Месяцы</label>
										<input type="number" class="form-control" name="months">
									</div>
									<div class="form-group d-none years">
										<label>Год</label>
										<input type="number" class="form-control" name="years">
									</div>
								</div>

								<div class="form-group txt-center">
									<input type="submit" class="btn  btn-lg  btn-primary" value="Добавить">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


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

	<script type="text/javascript">

		$('.select-types button').click(function(){
			var toggle = $(this).attr('data-toggle');

			if($(this).hasClass('active')){
				$(this).removeClass('active');
			}else{
				$(this).addClass('active');
			}

			$(".selected").find(toggle).slideToggle(250);
		});

	</script>

</body>
</html>
