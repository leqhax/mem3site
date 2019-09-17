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
			{if $Me['access_admin'] == 1}
				<li><a href="/admin/"><em class="fa fa-circle-notch">&nbsp;</em> Админ панель</a></li>
			{/if}

			<li><a href="/profile/"><em class="fa fa-dashboard">&nbsp;</em> Профиль</a></li>

			<li class="parent ">
				<a data-toggle="collapse" href="#sub-item-1" class="collapsed" aria-expanded="false">
					<em class="fa fa-wheelchair">&nbsp;</em> Конфиг <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1" aria-expanded="false" style="height: 0px;">
					<li><a class="" href="/profile/createConfig/">
						<span class="fa fa-arrow-right">&nbsp;</span> Создать конфиг
					</a></li>
					{if $GetConfig}
						<li><a class="" href="/profile/myconfig/">
							<span class="fa fa-arrow-right">&nbsp;</span> Мой конфиг
						</a></li>
					{/if}
					<li><a class="" href="/profile/configs/">
						<span class="fa fa-arrow-right">&nbsp;</span> Все конфиги
					</a></li>
					<li><a class="" href="/profile/settingsconfigs/">
						<span class="fa fa-arrow-right">&nbsp;</span> Настройка
					</a></li>
				</ul>
			</li>

			<li class="active"><a href="/profile/reset_binding/"><em class="fa fa-envelope">&nbsp;</em> Сброс привязки</a></li>

			<li><a href="/authorization/logout/"><em class="fa fa-power-off">&nbsp;</em> Выход</a></li>

		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="/profile/">Профиль</a></li>
				<li class="active"><a href="/profile/reset_binding/">Сброс привязки</a></li>
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
				
		<div class="row d-flex js-center">

			{if $TicketInfo == false}
				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading">Сброс</div>
						<div class="panel-body">
							<form role="form" method="POST" action="/profile/res_binding/">
								<div class="form-group txt-center">
									<input type="submit" class="btn  btn-lg  btn-primary" value="Сбросить">
								</div>
							</form>
						</div>
					</div>
				</div>
			{/if}
			{if $TicketInfo['status'] == 'active'}
				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">На рассмотрении</div>
						<div class="panel-body">
							Логин<p>{$TicketInfo['login']}</p>
							Дата создания<p>{date( 'd.m.Y H:i:s' ,$TicketInfo['date'])}</p>
						</div>
					</div>
				</div>
			{/if}
			{if $TicketInfo['status'] == 'accept'}
				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading">Сброс</div>
						<div class="panel-body">
							<form role="form" method="POST" action="/profile/res_binding/">
								<div class="form-group txt-center">
									<input type="submit" class="btn  btn-lg  btn-primary" value="Сбросить">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading">Принято</div>
						<div class="panel-body">
							Логин:<p>{$TicketInfo['login']}</p>
							Дата создания:<p>{date( 'd.m.Y H:i:s' ,$TicketInfo['date'])}</p>
							Принял:<p>{$TicketInfo['accepted']}</p>
						</div>
					</div>
				</div>
			{/if}
			{if $TicketInfo['status'] == 'decline'}
				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading">Сброс</div>
						<div class="panel-body">
							<form role="form" method="POST" action="/profile/res_binding/">
								<div class="form-group txt-center">
									<input type="submit" class="btn  btn-lg  btn-primary" value="Сбросить">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-danger">
						<div class="panel-heading">Отклонено</div>
						<div class="panel-body">
							Логин<p>{$TicketInfo['login']}</p>
							Дата создания<p>{date( 'd.m.Y H:i:s' ,$TicketInfo['date'])}</p>
							Отклонил<p>{$TicketInfo['accepted']}</p>
						</div>
					</div>
				</div>
			{/if}

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
		{if $User['subscription'] >= time() }	
			<script type="text/javascript">
				function LeftTime(){
					var Time = $('#subscription').html();
					Time--;
					if(Time >= 0)
					{
						$('#subscription').html(Time);
					}else{
						$('#status-subscription').html('Неактивна');
					}
				}
				setInterval("LeftTime();" , 1000);
			</script>
	{/if}
</body>
</html>