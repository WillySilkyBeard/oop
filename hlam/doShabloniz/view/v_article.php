<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Статья: <?php echo $article['title'];?></title>
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body>

	<?=$article['dt']?><strong> <?=$article['title']?></strong>
	<div><?=$article['content']?></div>

<br>
<? if ($auth): ?>
	<a href='edit.php?id=<?=$id?>'>Редактировать</a>
	<br>
	<a href='del.php?id=<?=$id?>'>Удалить</a>
	<br>
<? endif;?>

<a href="index.php">назад</a>
<a href="login.php"><?php echo ($auth ? 'Выйти':'Войти') ?></a>


</body>
</html>