<?php

define ('PathPrefix', '../controllers/');
define ('PathPostfix', 'Controller.php');


$template = 'new';

define ('TemplatePrefix', "../views/{$template}/");
define ('TemplatePostfix', '.tpl');


define ('CSS', "/main/templates/{$template}/css/");
define ('IMG', "/main/templates/{$template}/img/");
define ('JS', "/main/templates/{$template}/js/");


require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('Title', 'MEMPHIS - ПРИВАТНЫЙ ЧИТ ДЛЯ CS:GO');

$smarty->assign('CSS', CSS);
$smarty->assign('JS', JS);
$smarty->assign('IMG', IMG);
