<?php 
session_start(); //старт сессии

/*include_once 'model/DB.php';
include_once 'model/ArticleModel.php';*/

//автоматом подключает требуемые классы
function __autoload($name)
	{
		include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
	}

/*$request = new Core\Request($_GET, $_POST, $_SERVER);

$ctrl = new Controller\ArticleController();
$ctrl->indexAction();

$ctrl->render();*/

$app = new Core\App(new Core\Request($_GET, $_POST, $_SERVER));
$app->go();

