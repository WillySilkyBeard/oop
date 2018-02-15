<?php 
session_start();
if(!isset($_SESSION['auth'])) {
	if ($_COOKIE['login'] == 'user' && $_COOKIE['password'] == md5('123')) {
			$_SESSION['auth'] = true;
	} else {
		header('Location: index.php');
	}
} 
?>
<meta charset="UTF-8"> 
вижу секрет
<br>
<a href="index.php">назад</a> \
<a href="index.php">выход</a>
<hr>
<? 
echo "<br>";
echo $_SESSION['auth'];
echo "<br>";
echo $auth;
echo "<br>";
echo $_COOKIE["auth"];

?>