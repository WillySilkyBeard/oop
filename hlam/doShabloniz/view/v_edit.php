<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit <?php echo $article['title']; ?></title>
</head>
<body>
	<?=$error?>
	<form method='post'>
	<input type="text" name="title" value="<?=$title?>">
	<br>
	<textarea name="content"><?=$content?></textarea>
	<br>
	<input type="submit" value="Save">
	</form>
	<div style='color:red;'>
		<? foreach($errors as $error):?>
			<p><?=$error?></p>
		<? endforeach;?>
	</div>
	<a href="index.php">Назад</a>
</body>
</html>