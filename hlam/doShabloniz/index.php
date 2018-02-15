<?php 
/*include_once 'functions.php';*/
include_once 'model/m_articles.php';
session_start();
$db = connect_db();
$auth = is_auth();
$counter = 1;
$comments = articles_all($db);
/*include('view/v_index.php');*/
include('view/table.php');
?>

