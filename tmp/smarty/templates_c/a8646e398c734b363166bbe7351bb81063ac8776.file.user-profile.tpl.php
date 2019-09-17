<?php /* Smarty version Smarty-3.1.6, created on 2019-09-12 15:24:51
         compiled from "../views/new/user-profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153581995cad5e46dd81a2-59435319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8646e398c734b363166bbe7351bb81063ac8776' => 
    array (
      0 => '../views/new/user-profile.tpl',
      1 => 1568280255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153581995cad5e46dd81a2-59435319',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5cad5e46e72ce',
  'variables' => 
  array (
    'Title' => 0,
    'IMG' => 0,
    'Me' => 0,
    'User' => 0,
    'status' => 0,
    'GetNamePrivilege' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cad5e46e72ce')) {function content_5cad5e46e72ce($_smarty_tpl) {?><!DOCTYPE html>
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
				<img src="http://png-images.ru/wp-content/uploads/2014/11/parrot_PNG722-170x170.png" class="img-responsive" alt="">
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
			<li><a href="/admin/"><em class="fa fa-dashboard">&nbsp;</em> Статистика</a></li>
			<li><a href="/users/add/"><em class="fa fa-plus-square">&nbsp;</em> Добавить пользователя</a></li>
			<li class="active"><a href="/Users/"><em class="fa fa-calendar">&nbsp;</em> Пользователи</a></li>
			<li><a href="/Privilege/"><em class="fa fa-toggle-off ">&nbsp;</em> Привилегии</a></li>
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
				<li><a href="/users/">Пользователи</a></li>
				<li class="active"><a href="/users/profile/?login-id=<?php echo $_smarty_tpl->tpl_vars['User']->value['id'];?>
">Профиль</a></li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Профиль - <?php echo $_smarty_tpl->tpl_vars['User']->value['login'];?>
</h1>
				<?php if ($_smarty_tpl->tpl_vars['status']->value!=false){?>
					<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <?php echo $_smarty_tpl->tpl_vars['status']->value;?>
 </div>
				<?php }?>
			</div>
		</div><!--/.row-->

		<div class="row d-flex js-center">
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['User']->value['login'];?>
</div>
					<div class="panel-body">
						<div class="col-md-12">
							<form role="form" method="POST" action="/users/save/">
								<input type="hidden" name="id" class="input" value="<?php echo $_smarty_tpl->tpl_vars['User']->value['id'];?>
">
								<div class="form-group">
									<label>Логин</label>
									<input class="form-control" name="login" value="<?php echo $_smarty_tpl->tpl_vars['User']->value['login'];?>
">
								</div>
								<div class="form-group">
									<label>Почта</label>
									<input class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['User']->value['email'];?>
">
								</div>
								<div class="form-group has-warning">
									<label>Пароль</label>
									<input class="form-control" name="password" placeholder="Установить новый пароль">
								</div>
								<div class="form-group">
									<label>Привязка</label>
									<input class="form-control" name="binding" value="<?php echo $_smarty_tpl->tpl_vars['User']->value['binding'];?>
">
								</div>
								<div class="form-group">
									<label>Подписка</label>
									<input class="form-control" name="subscription" value="<?php echo $_smarty_tpl->tpl_vars['User']->value['subscription'];?>
">
								</div>
								<div class="form-group">
									<label>Класс</label>
									<select class="form-control" name="class">
											<option value="<?php echo $_smarty_tpl->tpl_vars['User']->value['class'];?>
">Текущее : <?php echo $_smarty_tpl->tpl_vars['User']->value['class'];?>
</option>

										<?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['GetNamePrivilege']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value['name'];?>
</option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Дата регистрации</label>
									<input class="form-control" name="date_register" value="<?php echo $_smarty_tpl->tpl_vars['User']->value['date_register'];?>
">
								</div>
								<div class="form-group txt-center">
									<input type="submit" class="btn  btn-lg  btn-primary" value="Сохранить">
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