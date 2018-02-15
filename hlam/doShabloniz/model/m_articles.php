<?php 

// шаблон
function themplate ($path, $var= []) {
	ob_start();
	include($path);
	ob_clean();
	return true;
}

//проверка на авторизацию
function is_auth() {
	if(!isset($_SESSION['auth'])) {
		
		if ($_COOKIE['login'] == 'user' &&  $_COOKIE['password']== md5('123')) {
			$_SESSION['auth'] = true;
		} 
		else {
			return false;
		}
	}
	return true;
}
//функция для очистки полей от пробелов, спец.символов и php/html тегов
function clean($var = "") {  
	$var = trim($var);
	$var = htmlspecialchars($var);
	return $var;
}
//подключение к БД
function connect_db() {

	$db = new PDO('mysql:host=localhost; dbname=php1', 'root', '');
	$db->exec("SET NAMES UTF8");
	return $db;
}
// проверка валидации
function validate($title, $content) {
	$errors = [];

	if($title == '') {
		$errors[] = 'Все поля должны быть заполнены!';
	}
	elseif(strlen($title) < 3) {
		$errors[] = 'Название не должно быть короче 3 символов!';
	}
	elseif(strlen($title) > 10) {
		$errors[] = 'Название не должно быть длинее 10 символов!';
	}
	if($content == '') {
		$errors[] = 'Контент пустой!';
	}
	return $errors;
}
// index все статьи
function articles_all($db) {
	$sql = "SELECT * FROM articles /*WHERE is_moderate='1'*/ ORDER BY dt DESC";
	$query = $db->prepare($sql);
	$query->execute();

	if ($query->errorCode() != PDO::ERR_NONE) {
		$info = $query->errorinfo();
		echo implode('<br>', $info);
		die();
	}

	$result = $query->fetchAll();
	return $result;
}
// article отображение одной статьи
function article_one($db, $id) {
	$sql = "SELECT * FROM articles WHERE id_article=$id";
	$query = $db->prepare($sql);
	$query->execute();

	if ($query->errorCode() != PDO::ERR_NONE) {
		$info = $query->errorinfo();
		echo implode('<br>', $info);
		die();
	}
	$article = $query->fetch();
	return $article;
}
// edit GET редактировать статью
function article_edit_show($db, $title, $content, $id) {
	$sql = "SELECT * FROM articles WHERE id_article=$id";
	$query = $db->prepare($sql);
	$query->execute();
	
	if ($query->errorCode() != PDO::ERR_NONE) {
		$info = $query->errorinfo();
		echo implode('<br>', $info);
		die();
	}
	$article = $query->fetch();
	return $article;
}
// add добавить статью
function article_add($db, $title, $content) {
	$sql = "INSERT INTO articles (title, content) VALUES (:title, :content)";
	$query = $db->prepare($sql);
	
	$params = ['title' => $title, 'content' => $content];
	$query->execute($params);

	if ($query->errorCode() != PDO::ERR_NONE) {
		$info = $query->errorinfo();
		echo implode('<br>', $info);
		die();
	}
	return $db->lastInsertId();
}
// edit изменить статью
function article_edit_update($db, $title, $content, $id) {
	$sql = "UPDATE articles SET title=:title, content=:content WHERE id_article=$id"; 
	$query = $db->prepare($sql);
	$params = ['title' => $title, 'content' => $content];
	$query->execute($params);

	if ($query->errorCode() != PDO::ERR_NONE) {
		$info = $query->errorinfo();
		echo implode('<br>', $info);
		die();
	}
	return true;
}
// del удаление статьи
function article_del($db, $id) {
	$sql = "DELETE FROM articles WHERE id_article=$id";
	$query = $db->prepare($sql);
	$query->execute();

	if ($query->errorCode() != PDO::ERR_NONE) {
		$info = $query->errorinfo();
		echo implode('<br>', $info);
		die();
	}
	return true;
}

