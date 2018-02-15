<?php 
function is_auth() {
	if(!isset($_SESSION['auth']) && !$_SESSION['auth']) {
		if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
			if ($_COOKIE['login'] == 'user' &&  $_COOKIE['password']== md5('123')) {
				$_SESSION['auth'] = true;
			}
		} else {
			return false;
		}
	}
	return true;
}

function connect_db() {

	$db = new PDO('mysql:host=localhost;dbname=php1', 'root', '');
	$db->exec("SET NAMES UTF8");
	return $db;
}
?>
