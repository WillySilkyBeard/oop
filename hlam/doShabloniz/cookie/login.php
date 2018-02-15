<? 


session_start();
$data = $_POST;

if (count($data) > 0) {

	if ($_POST['login'] == 'user' && $_POST['password'] == '123') {
		$_SESSION['auth'] = true;
		
		
		if ($data['remember']==true) {
			setcookie('login', 'user', time() + 3600 * 24 * 7);
			setcookie('password', md5('123'), time() + 3600 * 24 * 7);
		}
		header('Location: article.php');
		exit();
	} /*else {
		echo "login\password fail";
	}*/
} else {
	unset($_SESSION['auth']);
	setcookie('login', 'user', time() - 3600 * 24 * 7);
	setcookie('password', '123', time() - 3600 * 24 * 7);
}

if(isset($_COOKIE['auth'])){

	$_SESSION['auth'] = true;
}
?>
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