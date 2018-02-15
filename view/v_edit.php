	<!-- <?=$error?> -->
	<form method='post'>
	<input type="text" name="title" value="<?=$title?>">
	<br>
	<textarea name="content"><?=$content?></textarea>
	<br>
	<input type="submit" value="Save">
	</form>
	<div style='color:red;'>
		<? foreach($errors as $error):?>
			<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; top: 20px; left: 0px; right: 0px;">
				<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1033;">×</button>
				<i data-notify="icon" class="material-icons">notifications</i>
				<span data-notify="title"></span>
				<span data-notify="message"><?=$error?></span>
				<a href="#" target="_blank" data-notify="url"></a>
			</div>
		<? endforeach;?>
	</div>
	<a href="/">Назад</a>