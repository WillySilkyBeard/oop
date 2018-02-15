<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>add</title>
</head>
<body>
	<form method="post">
		Название <br>
		<input type="text" name="title" value="<?=$data['title']?>"><br>
		Текст <br>
		<textarea name="content"><?$data['content']?></textarea><br>
		<input type="submit" value="GO"><br>
	</form>
	<div style='color:red;'>
		<? foreach($errors as $error):?>
			<p><?=$error?></p>
		<? endforeach;?>
	</div>
<a href="index.php">Назад</a>
</body>
</html>