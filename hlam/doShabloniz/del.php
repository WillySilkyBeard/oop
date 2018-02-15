<?php 
/*include_once 'functions.php';*/
include_once 'model/m_articles.php';
$db = connect_db();

session_start();

if(!is_auth()) {
	header('Location: login.php');
	exit();
}

$id = (int)$_GET['id'];

if(isset($_GET['id'])) {

article_del($db, $id);
	
	header('Location: index.php');
	exit();
}
?>