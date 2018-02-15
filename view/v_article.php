<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Статья: <?php echo $article['title'];?></title>
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body>

	<?=$dt?><strong> <?=$title?></strong>
	<div><?=$content?></div>

<br>
<? if ($auth): ?>
	<a href='edit?id=<?=$id?>'>Редактировать</a>
	<br>
	<a href='del?id=<?=$id?>'>Удалить</a>
	<br>
<? endif;?>

<a href="/">назад</a>
<a href="/login"><?php echo ($auth ? 'Выйти':'Войти') ?></a>


</body>
</html>