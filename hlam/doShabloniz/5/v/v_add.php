<meta charset="UTF-8">
<form method="post">
	Имя<br>
	<input type="text" name="name" value="<?php echo $text;?>"><br>
	Комментарии<br>
	<textarea name="text"><?php echo $text; ?></textarea><br>
	<input type="submit" value="Отправить">
</form>