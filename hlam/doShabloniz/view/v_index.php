<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
</head>
<body>
<div class="comments">
	<? foreach ($comments as $one): ?>
		<div class="item">
			<span><?=$one['dt']?></span>
			<strong><a href='article.php?id=<?=$one['id_article']?>'><?=$one['title']?></a></strong>
			<div><?=$one['content']?></div>
		</div>
		<hr>
	<? endforeach; ?>
</div>
<a href="add.php">add news</a>
<a href="login.php"><?php echo ($auth ? 'Выйти':'Войти' ) ?></a>
</div>
</div>
</body>
</html>