<?php
session_start();
$data = $_POST;

if (count($data) > 0) {

	if ($_POST['login'] == 'user' && $_POST['password'] == '123') {
		$_SESSION['auth'] = true;
				
		if (isset($data['remember'])) {
			setcookie('login', 'user', time() + 3600);
			setcookie('password', md5('123'), time() + 3600);
		}
		header('Location: index.php');
		exit();
	} 
}
else {
	unset($_SESSION['auth']);
	setcookie('login', 'user', time() - 3600 * 24 * 7);
	setcookie('password', '123', time() - 3600 * 24 * 7);
}

?>
<meta charset="UTF-8">
<form method="post">
<label for="login">Логин</label>
<br>
<input id="login" type="text" name="login">
<br>
<label for="password">Пароль</label>
<br>
<input id="pass" type="text" name="password">
<br>
<label for="checkbox">Запомнить меня</label>
<input id="checkbox" type="checkbox" name="remember" checked>
<br>
<input type="submit" name="do_login">
</form>
<a href="index.php">назад</a>