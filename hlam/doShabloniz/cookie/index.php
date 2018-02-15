<?php 
include 'login.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>index</title>
</head>
<body>
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


<a href="article.php">article</a>
</div>
</div>
</body>
</html>
