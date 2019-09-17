<?php
if (!in_array($_SERVER['SERVER_NAME'], ['memphis-project.ru', 'l.memphis-project.ru']))
	exit($_SERVER['SERVER_NAME']. ' Домен не подключен!');

include_once '../config/config.php';        // Инициализация настроек
include_once '../config/db.php'; 
include_once '../library/mainFunctions.php'; // Основные функции

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
if(isset($_GET['referal']))
	setcookie('referal',$_GET['referal'], time() + 604800, '/');
loadPage($smarty, $controllerName, $actionName);
?>