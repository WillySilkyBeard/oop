<?php 
session_start();
/*include_once('functions.php'); */
include_once('model/m_articles.php'); 
$db = connect_db();

if(!is_auth()) {
	header("Location: login.php");
	exit();
}

if (count($_POST) > 0 ) {
//когда нажали кнопку сохранить появился пост
	$id = (int)$_GET['id'];
	$title = clean($_POST['title']);
	$content = clean($_POST['content']);
	$errors = validate($title, $content);

	if(empty($errors)) {
		article_edit_update($db, $title, $content, $id);
		header("Location: index.php");
		exit();
	} 
} else {
// зашли по ссылке поста еще нет
	$id = (int)$_GET['id'];

	$article = article_edit_show($db, $title, $content, $id);

	$title = $article['title'];
	$content = $article['content'];
	$errors = [];
}
include('view/v_edit.php');