<?php /* Smarty version Smarty-3.1.6, created on 2019-09-12 12:31:42
         compiled from "../views/new/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177210125cad5e42f04042-75647407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eeede8e0241f7625519b0c00d65999c030cb0db5' => 
    array (
      0 => '../views/new/index.tpl',
      1 => 1568280253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177210125cad5e42f04042-75647407',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5cad5e4301281',
  'variables' => 
  array (
    'Title' => 0,
    'IMG' => 0,
    'Me' => 0,
    'status' => 0,
    'Status_Cheat' => 0,
    'array' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cad5e4301281')) {function content_5cad5e4301281($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $_smarty_tpl->tpl_vars['Title']->value;?>
</title>
	<link href="/main/templates/default/css/bootstrap.min.css" rel="stylesheet">
	<link href="/main/templates/default/css/font-awesome.min.css" rel="stylesheet">
	<link href="/main/templates/default/css/datepicker3.css" rel="stylesheet">
	<link href="/main/templates/default/css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
logotype.png" />
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="/"><span><?php echo $_smarty_tpl->tpl_vars['Title']->value;?>
</span></a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://icons.iconarchive.com/icons/artdesigner/tweet-my-web/256/single-bird-icon.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><a href="/profile/" class="color-black"><?php echo $_smarty_tpl->tpl_vars['Me']->value['login'];?>
</a></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span><?php echo $_smarty_tpl->tpl_vars['Me']->value['class'];?>
</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="/admin/"><em class="fa fa-dashboard">&nbsp;</em> Статистика</a></li>
			<li><a href="/users/add/"><em class="fa fa-plus-square">&nbsp;</em> Добавить пользователя</a></li>
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
				<li class="active"><a href="/admin/">Админ-панель</a></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Статистика</h1>
				<?php if ($_smarty_tpl->tpl_vars['status']->value!=false){?>
					<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <?php echo $_smarty_tpl->tpl_vars['status']->value;?>
 </div>
				<?php }?>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-power-off color-red"></em>
							<div class="large">
								<?php if ($_smarty_tpl->tpl_vars['Status_Cheat']->value!=1){?>
									Выключен
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['Status_Cheat']->value==1){?>
									Включён
								<?php }?>
							</div>
							<div class="text-muted">Статус чита</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-blue"></em>
							<div class="large"><?php echo $_smarty_tpl->tpl_vars['array']->value['all-p'];?>
</div>
							<div class="text-muted">Всего пользователей</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-orange"></em>
							<div class="large"><?php echo $_smarty_tpl->tpl_vars['array']->value['bought-p'];?>
</div>
							<div class="text-muted">Активных подписок</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?php echo $_smarty_tpl->tpl_vars['array']->value['default-p'];?>
</div>
							<div class="text-muted">Обычных пользователей</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>

		<div class="row">

		</div><!--/.row-->


			<div class="col-sm-12">
				<p class="back-link">MoloF SYSTEM</p>
			</div>

	</div>	<!--/.main-->

	<script src="/main/templates/default/js/jquery-1.11.1.min.js"></script>
	<script src="/main/templates/default/js/bootstrap.min.js"></script>
	<script src="/main/templates/default/js/chart.min.js"></script>
	<script src="/main/templates/default/js/chart-data.js"></script>
	<script src="/main/templates/default/js/easypiechart.js"></script>
	<script src="/main/templates/default/js/easypiechart-data.js"></script>
	<script src="/main/templates/default/js/bootstrap-datepicker.js"></script>
	<script src="/main/templates/default/js/custom.js"></script>
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
<?php }} ?>