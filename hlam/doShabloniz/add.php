<?php 
session_start();

/*include_once('functions.php'); */
include_once('model/m_articles.php'); 
$db = connect_db();

if(!is_auth()) {
	header("Location: login.php");
	exit();
}
$msg ='';
$data = $_POST;

if(count($_POST) > 0) {
// POST
	$title = clean($data['title']);
	$content = clean($data['content']);

	$errors = validate($title, $content);

	if(empty($errors)) {
		article_add($db, $title, $content);
		header("Location: index.php");
		exit();
	}  
}else {
//GET
	$title = '';
	$content = '';
	$errors = [];
}
include('view/v_add.php');

