<?php 
/*include_once('functions.php'); */
include_once('model/m_articles.php'); 
session_start();
$db = connect_db();

$id = (int)$_GET['id'];
$auth = is_auth();

if($id != '') {
	
	$article = article_one($db, $id);

	include('view/v_article.php');
	} /*else {
	echo "404 error";
}*/