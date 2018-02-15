<meta charset="UTF-8">
<div class="comments">
	<?php foreach ($comments as $one) {?>
		<div class="item">
			<span><?php echo $one['dt']?></span>
			<strong><?php echo $one['name']?></strong>
			<div><?php echo $one['text']?></div>
		</div>
		<hr>
	<?php } ?>
</div>

<a href="add.php">add</a>